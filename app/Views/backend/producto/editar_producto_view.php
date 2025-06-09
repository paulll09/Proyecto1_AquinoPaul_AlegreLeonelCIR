<?php $this->extend('plantillas/base') ?>

<?php $this->section('titulo') ?>
Editar Producto
<?php $this->endSection() ?>

<?php if (session('mensaje')) : ?>
    <div class="alert alert-success">
        <?= session('mensaje') ?>
    </div>
<?php endif; ?>

<?php $this->section('contenido') ?>

<h1 class="text-center">Editar Producto</h1>
<div class="container">
    <div class="w-50 mx-auto">
        <?= form_open_multipart('actualizar_producto/' . $producto['id_producto']) ?>

        <div class="form-group">
            <label for="nombre">Nombre del Producto</label>
            <?php echo form_input(['name' => 'nombre', 'class' => 'form-control', 'autofocus' => 'autofocus', 'value' => $producto['nombre']]); ?>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <?php echo form_input(['name' => 'descripcion', 'class' => 'form-control', 'rows' => 3, 'value' => $producto['descripcion']]); ?>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <?php echo form_input(['name' => 'precio', 'class' => 'form-control', 'type' => 'number', 'step' => '0.01', 'value' => $producto['precio']]); ?>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <?php echo form_input(['name' => 'stock', 'class' => 'form-control', 'type' => 'number', 'value' => $producto['stock']]); ?>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen del Producto</label>
            <img src="<?php echo base_url('public/assets/uploads/' . $producto['imagen']); ?>" alt="Imagen del Producto" class="img-thumbnail mb-2" style="max-width: 200px;">
            <?php echo form_input(['name' => 'imagen', 'type' => 'file']); ?>
        </div>

        <div class="form-group">
            <label for="producto_categoria">Categoría del Producto</label>
            <?php
            $lista['0'] = 'Seleccione una categoría';
            foreach ($categorias as $row) {
                $lista[$row['id_categoria']] = $row['categoria_descripcion'];
            }
            $sel = $producto['producto_categoria'] ?? '0';
            echo form_dropdown('producto_categoria', $lista, $sel, 'class="form-control"');
            ?>
        </div>

        <?php echo form_hidden('id_producto', $producto['id_producto']); ?>

        <div class="form-group">
            <?php echo form_submit('Modificar', 'Modificar', "class='btn btn-success'"); ?>
        </div>

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>


        <?php echo form_close(); ?>
    </div>
</div>

<?= $this->endSection() ?>