<?php $this->extend('plantillas/base') ?>

<?= $this->section('titulo') ?>
Catálogo de Productos
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>


<div class="container py-5">
    <h1 class="display-4 text-center mb-5">Catálogo de Productos</h1>
    <div class="row g-4">

        <?php foreach ($producto as $row) { ?>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0">
                    <img class="card-img-top img-fluid" src="<?php echo base_url('public/assets/uploads/' . $row['imagen']) ?>" alt="Imagen del producto" style="height: 250px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary"><?php echo $row['nombre']; ?></h5>
                        <p class="card-text text-muted small mb-2"><?php echo $row['descripcion']; ?></p>
                        <p class="card-text fw-bold text-success fs-5 mb-1">$<?php echo $row['precio']; ?></p>
                        <p class="card-text mb-1"><span class="badge bg-secondary">Categoría: <?php echo $row['categoria_descripcion']; ?></span></p>
                        <p class="card-text mb-3">Stock disponible: <strong><?php echo $row['stock']; ?></strong></p>

                        <?php if (session('login')): ?>
                            <?= form_open('add_cart') ?>
                            <?= form_hidden('id_producto', $row['id_producto']) ?>
                            <?= form_hidden('nombre', $row['nombre']) ?>
                            <?= form_hidden('precio', $row['precio']) ?>
                            <?= form_submit('comprar', 'Agregar al carrito', ['class' => 'btn btn-success w-100']) ?>
                            <?= form_close() ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?= $this->endSection() ?>