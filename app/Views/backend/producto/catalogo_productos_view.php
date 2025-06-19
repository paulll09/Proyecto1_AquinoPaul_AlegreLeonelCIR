<?php $this->extend('plantillas/base') ?>

<?= $this->section('titulo') ?>
Catálogo de Productos
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="catalogo-contenedor">
    <h1 class="catalogo-titulo">Catálogo de Productos</h1>
    <div class="catalogo-grid">
        
        <?php foreach ($producto as $row) { ?>
            <div class="producto-tarjeta <?php echo ($row['stock'] <= 0) ? 'producto-agotado' : ''; ?>">
                <div class="producto-imagen-contenedor">
                    <img class="producto-imagen" 
                         src="<?php echo base_url('public/assets/uploads/' . $row['imagen']) ?>" 
                         alt="<?php echo $row['nombre']; ?>" 
                         loading="lazy">
                </div>
                <div class="producto-contenido">
                    <h5 class="producto-titulo"><?php echo $row['nombre']; ?></h5>
                    <p class="producto-descripcion"><?php echo $row['descripcion']; ?></p>
                    
                    <div class="producto-info">
                        <p class="producto-precio">$<?php echo number_format($row['precio'], 2); ?></p>
                        <span class="producto-categoria"><?php echo $row['categoria_descripcion']; ?></span>
                        <p class="producto-stock">Stock disponible: <strong><?php echo $row['stock']; ?></strong></p>
                    </div>
                    
                    <?php if (session('login') && $row['stock'] > 0): ?>
                        <?= form_open('add_cart') ?>
                        <?= form_hidden('id_producto', $row['id_producto']) ?>
                        <?= form_hidden('nombre', $row['nombre']) ?>
                        <?= form_hidden('precio', $row['precio']) ?>
                        <?= form_submit('comprar', 'Agregar al carrito', ['class' => 'producto-boton']) ?>
                        <?= form_close() ?>
                    <?php elseif (session('login') && $row['stock'] <= 0): ?>
                        <button class="producto-boton" disabled>Producto Agotado</button>
                    <?php endif; ?>
                </div>
            </div>
        <?php } ?>
        
    </div>
</div>

<?= $this->endSection() ?>