<?= $this->extend('plantillas/base') ?>

<?= $this->section('titulo') ?>
Agregar Producto
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<h1 class="text-center mt-4">Registro de Productos</h1>

<div class="container mt-4">
    <?php if (!empty($validation)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($validation as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (session('mensaje')) : ?>
        <div class="alert alert-success">
            <?= session('mensaje') ?>
        </div>
    <?php endif; ?>

    <?= form_open_multipart('insertar_producto') ?>

        <div class="form-group mb-3">
            <label for="nombre">Nombre</label>
            <?= form_input([
                'name' => 'nombre',
                'id' => 'nombre',
                'class' => 'form-control',
                'value' => set_value('nombre')
            ]) ?>
        </div>

        <div class="form-group mb-3">
            <label for="precio">Precio</label>
            <?= form_input([
                'name' => 'precio',
                'id' => 'precio',
                'class' => 'form-control',
                'type' => 'number',
                'step' => '0.01',
                'value' => set_value('precio')
            ]) ?>
        </div>

        <div class="form-group mb-3">
            <label for="descripcion">Descripción</label>
            <?= form_textarea([
                'name' => 'descripcion',
                'id' => 'descripcion',
                'class' => 'form-control',
                'value' => set_value('categoria_descripcion')
            ]) ?>
        </div>

        <div class="form-group mb-3">
            <label for="stock">Stock</label>
            <?= form_input([
                'name' => 'stock',
                'id' => 'stock',
                'class' => 'form-control',
                'type' => 'number',
                'value' => set_value('stock')
            ]) ?>
        </div>

        <div class="form-group mb-3">
            <label for="producto_categoria">Categoría</label>
            <?php
                $lista['0'] = 'Seleccione una categoría';
                foreach ($categorias as $row) {
                    $categoria_id = $row['id_categoria'];
                    $categoria_descripcion = $row['categoria_descripcion'];
                    $lista[$categoria_id] = $categoria_descripcion;
                }
                echo form_dropdown('producto_categoria', $lista, '0', 'class="form-control"');
            ?>
        </div>

        <div class="form-group mb-3">
            <label for="imagen">Imagen</label>
            <?= form_upload([
                'name' => 'imagen',
                'id' => 'imagen',
                'class' => 'form-control'
            ]) ?>
        </div>



        <div class="form-group mb-4">
            <?= form_submit('Agregar', 'Agregar producto', ['class' => 'btn btn-primary']) ?>
        </div>

    <?= form_close() ?>


</div>

<?= $this->endSection() ?>
