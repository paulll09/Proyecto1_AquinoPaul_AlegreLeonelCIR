<?= $this->extend('plantillas/base') ?>

<?= $this->section('contenido') ?>
  <!-- Carrusel de imágenes -->
  <?= $this->include('contenido/carrusel') ?>

  <!-- Sección de servicios -->
  <?= $this->include('contenido/servicios') ?>

  <!-- Sección de contacto rápido -->
  <?= $this->include('contenido/contactoRapido') ?>

  <!-- Sección de ubicación -->
  <?= $this->include('contenido/ubicacion') ?>
<?= $this->endSection() ?>

<?= $this->section('scripts_adicionales') ?>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<?= $this->endSection() ?>
