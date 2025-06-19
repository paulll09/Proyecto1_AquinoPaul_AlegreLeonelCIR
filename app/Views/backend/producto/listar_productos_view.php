<?php $this->extend('plantillas/base') ?>

<?= $this->section('titulo') ?>
Gestionar Productos
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="products-container">
    <?php if (session('mensaje')) : ?>
        <div class="products-alert-success">
            <?= session('mensaje') ?>
        </div>
    <?php endif; ?>

    <h1 class="products-title">Listado de Productos</h1>
    
    <div class="products-table-container">
        <table id="mytable" class="products-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Categoría</th>
                    <th>Editar</th>
                    <th>Activar/Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $row) { ?>
                    <tr>
                        <td><?php echo ($row['nombre']) ?></td>
                        <td>$<?php echo number_format($row['precio'], 2) ?></td>
                        <td><?php echo ($row['descripcion']) ?></td>
                        <td><?php echo ($row['stock']) ?></td>
                        <td>
                            <img src="<?php echo base_url('public/assets/uploads/' . $row['imagen']) ?>" 
                                 alt="Imagen del producto" 
                                 class="products-img-thumbnail">
                        </td>
                        <td><?php echo ($row['categoria_descripcion']) ?></td>
                        <td>
                            <a class="products-btn-edit" 
                               href="<?php echo base_url('editar_producto/' . $row['id_producto']); ?>">
                               Editar Producto
                            </a>
                        </td>
                        <?php if ($row['producto_estado'] == 1) { ?>
                            <td>
                                <a class="products-btn-delete" 
                                   href="<?php echo base_url('eliminar_producto/' . $row['id_producto']) ?>">
                                   Eliminar
                                </a>
                            </td>
                        <?php } else { ?>
                            <td>
                                <a class="products-btn-activate" 
                                   href="<?php echo base_url('activar_producto/' . $row['id_producto']) ?>">
                                   Activar
                                </a>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>