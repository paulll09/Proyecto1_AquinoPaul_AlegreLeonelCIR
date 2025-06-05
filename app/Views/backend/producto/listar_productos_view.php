<h1 class="text-center">Listado de Productos</h1>
<div class="container">
    <table id="mytable" class="table table-bordred table-striped table-hover">
        <thead>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Categoria</th>
            <th>Editar</th>
            <th>Activar/Eliminar</th>
        </thead>
        <tbody>
            <?php foreach ($productos as $row) { ?>
                <tr>
                    <td><?php echo ($row['nombre']) ?></td>
                    <td><?php echo ($row['precio']) ?></td>
                    <td><?php echo ($row['descripcion']) ?></td>
                    <td><?php echo ($row['stock']) ?></td>
                    <td><img src="<?php echo base_url('uploads/' . $row['imagen']) ?>" alt="Imagen del producto" class="img-thumbnail" style="width: 100px;"></td>
                    <td>
                        <a class="btn btn-success" href="<?php echo base_url('ProductoController/editar_categoria/' . $row['id_categoria']); ?>">Editar Categoria</a>
                    </td>

                    <?php
                    if ($row['producto_estado'] == 1) { ?>
                        <td><a class="btn btn-danger" href="<?php echo base_url('ProductoController/eliminar_producto/' . $row['id_producto']) ?>">Eliminar</a></td>

                    <?php } else {
                    ?><td><a class="btn btn-success" href="<?php echo base_url('ProductoController/activar_producto/' . $row['id_producto']) ?>">Activar</a></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>