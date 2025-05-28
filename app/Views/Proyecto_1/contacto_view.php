<?= $this->extend('plantillas/base') ?>



<?= $this->section('contenido') ?>
<!-- Sección de Contacto -->
<section class="contact-info py-5">
  <div class="container">
    <?= $this->include('contenido/formulario') ?>
  </div>
</section>

<!-- Sección de Ubicación -->
<?= $this->include('contenido/ubicacion') ?>
<?= $this->endSection() ?>


