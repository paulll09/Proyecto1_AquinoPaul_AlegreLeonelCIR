<?= $this->extend('plantillas/base') ?>

<?= $this->section('titulo') ?>
Carrito de Compras
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<!-- Mensajes de éxito -->
<?php if (session('mensaje_exito')) : ?>
    <div class="alert alert-success cart-alert-success">
        <div class="alert-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="alert-content">
            <h4>¡Excelente!</h4>
            <p><?= session('mensaje_exito') ?></p>
        </div>
        <span class="alert-close-icon">
            <i class="fas fa-times"></i>
        </span>
    </div>
<?php endif; ?>

<!-- Mensajes de error -->
<?php if (session('mensaje_error')) : ?>
    <div class="alert alert-danger cart-alert-error">
        <div class="alert-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="alert-content">
            <h4>¡Atención!</h4>
            <p><?= session('mensaje_error') ?></p>
        </div>
        <span class="alert-close-icon">
            <i class="fas fa-times"></i>
        </span>
    </div>
<?php endif; ?>

<!-- Mensajes de advertencia -->
<?php if (session('mensaje_warning')) : ?>
    <div class="alert alert-warning cart-alert-warning">
        <div class="alert-icon">
            <i class="fas fa-exclamation-circle"></i>
        </div>
        <div class="alert-content">
            <h4>¡Importante!</h4>
            <p><?= session('mensaje_warning') ?></p>
        </div>
        <span class="alert-close-icon">
            <i class="fas fa-times"></i>
        </span>
    </div>
<?php endif; ?>

<!-- Mensajes informativos -->
<?php if (session('mensaje_info')) : ?>
    <div class="alert alert-info cart-alert-info">
        <div class="alert-icon">
            <i class="fas fa-info-circle"></i>
        </div>
        <div class="alert-content">
            <h4>Información</h4>
            <p><?= session('mensaje_info') ?></p>
        </div>
        <span class="alert-close-icon">
            <i class="fas fa-times"></i>
        </span>
    </div>
<?php endif; ?>

<!-- Mensaje de compra exitosa -->
<?php if (session('compra_exitosa')) : ?>
    <div class="alert alert-success cart-alert-purchase-success">
        <div class="alert-icon">
            <i class="fas fa-shopping-bag"></i>
        </div>
        <div class="alert-content">
            <h4>¡Compra Realizada con Éxito!</h4>
            <p>Tu pedido #<?= session('numero_pedido') ?? 'N/A' ?> ha sido procesado correctamente.</p>
        </div>
        <span class="alert-close-icon">
            <i class="fas fa-times"></i>
        </span>
    </div>
<?php endif; ?>

<!-- Mensaje de stock insuficiente -->
<?php if (session('stock_insuficiente')) : ?>
    <div class="alert alert-warning cart-alert-stock">
        <div class="alert-icon">
            <i class="fas fa-box-open"></i>
        </div>
        <div class="alert-content">
            <h4>Stock Insuficiente</h4>
            <p>Algunos productos en tu carrito no tienen stock suficiente:</p>
            <ul class="stock-list">
                <?php foreach (session('productos_sin_stock') ?? [] as $producto): ?>
                    <li><strong><?= $producto['nombre'] ?></strong> - Disponible: <?= $producto['stock_disponible'] ?> unidades</li>
                <?php endforeach; ?>
            </ul>
            <small>Las cantidades han sido ajustadas automáticamente.</small>
        </div>
        <span class="alert-close-icon">
            <i class="fas fa-times"></i>
        </span>
    </div>
<?php endif; ?>

<?php $cart = \Config\Services::cart(); ?>

<h1 class="text-center cart-main-title">Carrito de compras</h1>

<?php if ($cart->contents() == NULL) { ?>
    <div class="cart-empty-container">
        <div class="cart-empty-icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <h2 class="cart-empty-title">Tu carrito está vacío</h2>
        <p class="cart-empty-text">¡Agrega algunos productos increíbles para comenzar tu compra!</p>
        <a href="productos" class="btn cart-empty-btn">
            <i class="fas fa-arrow-left"></i>
            Explorar Productos
        </a>
    </div>
<?php } else { ?>

    <table id="mytable" class="table cart-shopping-table">
        <?php if ($cart1 = $cart->contents()): ?>
            <thead>
                <tr>
                    <td>N° Item</td>
                    <td>Nombre</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Subtotal</td>
                    <td>Acción</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                $i = 1;
                foreach ($cart1 as $item): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $item['name'] ?></td>
                        <td>$ <?= number_format($item['price'], 2) ?></td>
                        <td>
                            <form action="<?= base_url('actualizar_item') ?>" method="post">
                                <input type="hidden" name="rowid" value="<?= $item['rowid'] ?>">
                                <input
                                    type="number"
                                    name="qty"
                                    value="<?= $item['qty'] ?>"
                                    min="1"
                                    class="form-control form-control-sm text-center"
                                    style="width: 70px;"
                                    onchange="this.form.submit()" 
                                >
                            </form>
                        </td>
                        <td>$ <?= number_format($item['subtotal'], 2);
                                $total += $item['subtotal']; ?></td>
                        <td>
                            <?= anchor('eliminar_item/' . $item['rowid'], '<i class="fas fa-trash"></i> Eliminar', [
                                'class' => 'cart-remove-btn',
                                'title' => 'Eliminar producto'
                            ]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="cart-total-cell">
                        <i class="fas fa-calculator"></i>
                        Total Compra: $<?= number_format($total, 2); ?>
                    </td>
                    <td>
                        <a href="<?= base_url('vaciar_carrito'); ?>" class="btn btn-danger cart-clear-btn"
                            title="Vaciar carrito completo">
                            <i class="fas fa-trash-alt"></i>
                            Vaciar Carrito
                        </a>
                    </td>
                </tr>
                <div class="cart-actions-container">
                    <a href="productos" class="btn cart-continue-btn" role="button">
                        <i class="fas fa-arrow-left"></i>
                        Continuar comprando
                    </a>
                </div>
            </tbody>
        <?php endif; ?>
    </table>

<form action="<?= base_url('guardar_venta') ?>" method="post" class="metodo-pago-form">

    <div class="form-group">
        <label for="metodo_pago">Selecciona un método de pago:</label>
        <select name="metodo_pago" id="metodo_pago" class="metodo-pago-select" required>
            <option value="" disabled selected>Elige un método de pago</option>
            <?php foreach ($metodos_pago as $metodo): ?>
                <option value="<?= esc($metodo['id_metodo_pago']) ?>">
                    <?= esc($metodo['descripcion']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit">
        <i class="fas fa-credit-card"></i> Confirmar Compra
    </button>
</form>


<?php } ?>


<?= $this->endSection() ?>