<?= $this->extend('plantillas/base') ?>

<?= $this->section('titulo') ?>
Carrito de Compras
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<?php if (session('mensaje')) : ?>
    <div class="alert alert-success">
        <?= session('mensaje') ?>
    </div>
<?php endif; ?>

<?php $cart = \Config\Services::cart(); ?>

<h1 class="text-center">Carrito de compras</h1>
<a href="productos" class="btn btn-success" role="button">Continuar comprando</a>

<?php if ($cart->contents() == NULL) { ?>
    <h2 class="text-center alert alert-danger">Carrito está vacío</h2>
<?php } ?>

<table id="mytable" class="table table-bordred table-striped">
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
                    <td>$ <?= $item['price'] ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td>
                        <?= $item['subtotal'];
                        $total += $item['subtotal']; ?>
                    </td>
                    <td><?= anchor('eliminar_item/' . $item['rowid'], 'Eliminar') ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3">Total Compra: $<?= $total; ?></td>
                <td><a href="<?= base_url('vaciar_carrito'); ?>" class="btn btn-success">Vaciar Carrito</a></td>
                <td><a href="ventas" class="btn btn-success" role="button">Ordenar compra</a></td>
            </tr>
        </tbody>
    <?php endif; ?>
</table>

<?= $this->endSection() ?>