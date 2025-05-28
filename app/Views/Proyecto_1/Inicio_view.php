<?= $this->extend('plantillas/base') ?>

<?= $this->section('contenido') ?>
  <!-- Sección de Carrusel -->
  <?= $this->include('contenido/carrusel') ?>


  <!-- Sección de Servicios -->
  <?= $this->include('contenido/servicios') ?>

  <!-- Sección de Contacto Rápido -->
  <?= $this->include('contenido/contactoRapido') ?>

  <!-- Sección de Ubicación -->
  <?= $this->include('contenido/ubicacion') ?>
<?= $this->endSection() ?>

