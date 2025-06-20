<?php $this->extend('plantillas/base') ?>

<?= $this->section('titulo') ?>
Agregar Producto
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<h1 class="admin-producto-titulo">Registro de Productos</h1>

<div class="admin-producto-contenedor">
    <?php if (!empty($validation)) : ?>
        <div class="admin-alerta-error">
            <ul>
                <?php foreach ($validation as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (session('mensaje')) : ?>
        <div class="admin-alerta-exito">
            <?= session('mensaje') ?>
        </div>
    <?php endif; ?>

    <?= form_open_multipart('insertar_producto') ?>

    <div class="admin-producto-grupo">
        <label for="nombre" class="admin-producto-etiqueta">Nombre del Producto</label>
        <?= form_input([
            'name' => 'nombre',
            'id' => 'nombre',
            'class' => 'admin-producto-campo',
            'placeholder' => 'Ingresa el nombre del producto',
            'value' => set_value('nombre')
        ]) ?>
    </div>

    <div class="admin-producto-grupo">
        <label for="precio" class="admin-producto-etiqueta">Precio</label>
        <?= form_input([
            'name' => 'precio',
            'id' => 'precio',
            'class' => 'admin-producto-campo',
            'type' => 'number',
            'step' => '0.01',
            'placeholder' => '0.00',
            'value' => set_value('precio')
        ]) ?>
    </div>

    <div class="admin-producto-grupo">
        <label for="descripcion" class="admin-producto-etiqueta">Descripción</label>
        <?= form_textarea([
            'name' => 'descripcion',
            'id' => 'descripcion',
            'class' => 'admin-producto-campo admin-producto-textarea',
            'placeholder' => 'Describe las características del producto...',
            'value' => set_value('descripcion')
        ]) ?>
    </div>

    <div class="admin-producto-grupo">
        <label for="stock" class="admin-producto-etiqueta">Stock Disponible</label>
        <?= form_input([
            'name' => 'stock',
            'id' => 'stock',
            'class' => 'admin-producto-campo',
            'type' => 'number',
            'placeholder' => 'Cantidad disponible',
            'value' => set_value('stock')
        ]) ?>
    </div>

    <div class="admin-producto-grupo">
        <label for="producto_categoria" class="admin-producto-etiqueta">Categoría</label>
        <?php
        $lista['0'] = 'Seleccione una categoría';
        foreach ($categorias as $row) {
            $categoria_id = $row['id_categoria'];
            $categoria_descripcion = $row['categoria_descripcion'];
            $lista[$categoria_id] = $categoria_descripcion;
        }
        echo form_dropdown('producto_categoria', $lista, '0', 'class="admin-producto-campo admin-producto-select"');
        ?>
    </div>

    <div class="mb-3">
        <label for="imagen" class="form-label admin-producto-etiqueta">Imagen del Producto</label>
        <input class="form-control" type="file" name="imagen" id="imagen" accept="image/*">
    </div>

    <div class="admin-producto-boton-contenedor">
        <?= form_submit('Agregar', 'Agregar Producto', ['class' => 'admin-producto-boton']) ?>
    </div>

    <?= form_close() ?>

</div>

<?= $this->endSection() ?>