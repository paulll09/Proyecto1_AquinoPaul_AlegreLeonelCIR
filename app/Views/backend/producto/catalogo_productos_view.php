<?php $this->extend('plantillas/base') ?>

<?= $this->section('titulo') ?>
Catálogo de Productos
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="catalogo-contenedor">
    <h1 class="catalogo-titulo">Catálogo de Productos</h1>

    <!-- FORMULARIO DE BÚSQUEDA Y FILTROS -->
    <form method="get" action="<?= base_url('productos/listar') ?>" class="formulario-filtros-productos mb-4">
        <div class="row g-3 align-items-end">
            <!-- Buscar -->
            <div class="col-md-4">
                <label for="buscar" class="form-label filtro-label">Buscar</label>
                <input type="text" name="buscar" id="buscar" class="form-control filtro-input" placeholder="Nombre del producto" value="<?= esc($buscar ?? '') ?>">
            </div>

            <!-- Categoría -->
            <div class="col-md-3">
                <label for="categoria" class="form-label filtro-label">Categoría</label>
                <select name="categoria" id="categoria" class="form-select filtro-select">
                    <option value="">Todas</option>
                    <?php foreach ($categorias as $cat): ?>
                        <option value="<?= $cat['id_categoria'] ?>" <?= ($categoria == $cat['id_categoria']) ? 'selected' : '' ?>>
                            <?= esc($cat['categoria_descripcion'] ?? 'Sin nombre') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Precio -->
            <div class="col-md-3">
                <label for="orden_precio" class="form-label filtro-label">Ordenar por precio</label>
                <select name="orden_precio" id="orden_precio" class="form-select filtro-select">
                    <option value="">Seleccionar</option>
                    <option value="asc" <?= ($orden_precio == 'asc') ? 'selected' : '' ?>>Menor a mayor</option>
                    <option value="desc" <?= ($orden_precio == 'desc') ? 'selected' : '' ?>>Mayor a menor</option>
                </select>
            </div>
            <!-- Grupo de botones -->
            <div class="col-md-3 d-flex justify-content-start align-items-end gap-2">
                <button type="submit" class="btn btn-primary filtro-boton">Filtrar</button>
                <a href="<?= base_url('productos/listar') ?>" class="btn btn-outline-secondary filtro-boton-limpiar">Limpiar</a>
            </div>


        </div>
    </form>
    <!-- FIN FORMULARIO -->

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