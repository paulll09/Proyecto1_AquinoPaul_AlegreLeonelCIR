<?php $this->extend('plantillas/base') ?>

<?php $this->section('titulo') ?>
Editar Producto
<?php $this->endSection() ?>

<?php $this->section('contenido') ?>

<div class="edit-product-container">
    <?php if (session('mensaje')) : ?>
        <div class="edit-product-alert-success">
            <?= session('mensaje') ?>
        </div>
    <?php endif; ?>

    <h1 class="edit-product-title">Editar Producto</h1>
    
    <div class="edit-product-form-container">
        <?= form_open_multipart('actualizar_producto/' . $producto['id_producto']) ?>

        <div class="edit-product-form-group">
            <label for="nombre" class="edit-product-label">Nombre del Producto</label>
            <?php echo form_input([
                'name' => 'nombre', 
                'class' => 'edit-product-input', 
                'autofocus' => 'autofocus', 
                'value' => $producto['nombre']
            ]); ?>
        </div>

        <div class="edit-product-form-group">
            <label for="descripcion" class="edit-product-label">Descripción</label>
            <?php echo form_input([
                'name' => 'descripcion', 
                'class' => 'edit-product-input', 
                'rows' => 3, 
                'value' => $producto['descripcion']
            ]); ?>
        </div>

        <div class="edit-product-form-group">
            <label for="precio" class="edit-product-label">Precio</label>
            <?php echo form_input([
                'name' => 'precio', 
                'class' => 'edit-product-input', 
                'type' => 'number', 
                'step' => '0.01', 
                'value' => $producto['precio']
            ]); ?>
        </div>

        <div class="edit-product-form-group">
            <label for="stock" class="edit-product-label">Stock</label>
            <?php echo form_input([
                'name' => 'stock', 
                'class' => 'edit-product-input', 
                'type' => 'number', 
                'value' => $producto['stock']
            ]); ?>
        </div>

        <div class="edit-product-form-group">
            <label for="imagen" class="edit-product-label">Imagen del Producto</label>
            <img src="<?php echo base_url('public/assets/uploads/' . $producto['imagen']); ?>" 
                 alt="Imagen del Producto" 
                 class="edit-product-current-image">
            <?php echo form_input([
                'name' => 'imagen', 
                'type' => 'file',
                'class' => 'edit-product-file-input'
            ]); ?>
        </div>

        <div class="edit-product-form-group">
            <label for="producto_categoria" class="edit-product-label">Categoría del Producto</label>
            <?php
            $lista['0'] = 'Seleccione una categoría';
            foreach ($categorias as $row) {
                $lista[$row['id_categoria']] = $row['categoria_descripcion'];
            }
            $sel = $producto['producto_categoria'] ?? '0';
            echo form_dropdown('producto_categoria', $lista, $sel, 'class="edit-product-select"');
            ?>
        </div>

        <?php echo form_hidden('id_producto', $producto['id_producto']); ?>

        <div class="edit-product-form-group">
            <?php echo form_submit('Modificar', 'Modificar Producto', "class='edit-product-btn-submit'"); ?>
        </div>

        <?php if (isset($validation)) : ?>
            <div class="edit-product-alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>

        <?php echo form_close(); ?>
    </div>
</div>

<?= $this->endSection() ?>