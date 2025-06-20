<?= $this->extend('plantillas/base') ?>

<?= $this->section('contenido') ?>
<!-- Seccion Hero - Carrusel -->
<section class="hero-section">
  <div class="hero-container">
    <!-- Imagen Principal -->
    <div class="hero-background">
        <img src="<?= base_url('assets/img/logofinal.jpeg') ?>" alt="Centro Informatico Regional" class="hero-image">
    </div>
    
    <!-- Título Principal -->
    <div class="hero-content">
      <h1 class="hero-title">
        <span class="hero-title-line">Un lugar donde conocer los desafios de las nuevas <span class="highlight-text">Tecnologías</span></span>
      </h1>
      <div class="hero-description">
      </div>
    </div>
  </div>
</section>
  
<?= $this->endSection() ?>
