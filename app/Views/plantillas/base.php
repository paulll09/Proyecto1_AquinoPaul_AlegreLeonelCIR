<!doctype html>
<html lang="es">
<head>
  <!-- Meta tags para configuración básica de la página -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $titulo ?? 'Centro Informático Regional' ?></title>
  
  <!-- Enlaces a hojas de estilo -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>"> <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/estilos.css'); ?>"> <!-- Estilos personalizados -->
  <!-- Agregamos Font Awesome para íconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  
  <!-- Estilos adicionales específicos de la página -->
  <?php if (isset($estilos_adicionales)): ?>
    <?= $estilos_adicionales ?>
  <?php endif; ?>
</head>

<body>
  <!-- Encabezado con barra de navegación -->
  <?= $this->include('plantillas/header') ?>

  <!-- Contenido principal -->
  <main>
    <?= $this->renderSection('contenido') ?>
  </main>

  <!-- Pie de página -->
  <?= $this->include('plantillas/footer') ?>

  <!-- Scripts de Bootstrap para funcionalidad -->
  <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
  
  <!-- Scripts adicionales específicos de la página -->
  <?php if (isset($scripts_adicionales)): ?>
    <?= $scripts_adicionales ?>
  <?php endif; ?>
</body>
</html> 