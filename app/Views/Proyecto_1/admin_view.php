<?= $this->extend('plantillas/base') ?>

<?= $this->section('contenido') ?>
  <!-- Sección de Carrusel -->

  <!-- Sección de Contacto Rápido -->
  <?= $this->include('contenido/contactoRapido') ?>

  <!-- Sección de Ubicación -->
  <?= $this->include('contenido/ubicacion') ?>
<?= $this->endSection() ?>
