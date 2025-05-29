<?= $this->extend('plantillas/base') ?>

<?= $this->section('contenido') ?>
<?= $this->include('contenido/registroUsuario') ?>
<?= $this->endSection() ?>

<?= $this->section('scripts_adicionales') ?>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<?= $this->endSection() ?>