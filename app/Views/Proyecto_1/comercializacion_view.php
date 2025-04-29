<?= $this->extend('plantillas/base') ?>

<?= $this->section('contenido') ?>

<?= $this->include('contenido/comercializacion') ?>
<!-- Sección de Contacto Rápido -->
<?= $this->include('contenido/contactoRapido') ?>

<!-- Sección de Ubicación -->
<?= $this->include('contenido/ubicacion') ?>
<?= $this->endSection() ?>

<?= $this->section('scripts_adicionales') ?>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<?= $this->endSection() ?>
