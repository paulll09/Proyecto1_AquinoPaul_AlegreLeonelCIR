<?= $this->extend('plantillas/base') ?>

<?= $this->section('contenido') ?>
<!-- Sección de About -->
<?= $this->include('contenido/about') ?>
<?= $this->endSection() ?>

<?= $this->section('scripts_adicionales') ?>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<?= $this->endSection() ?>
