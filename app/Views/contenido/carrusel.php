<!-- Sección del Carrusel -->
<section class="carousel-section">
  <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= base_url('assets/img/informatica.avif') ?>" class="d-block w-100" alt="Servicios Informáticos">
        <div class="carousel-caption">
          <h2 class="display-4 fw-bold">Servicios Informáticos</h2>
          <p class="lead">Soluciones tecnológicas integrales para tu negocio</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('assets/img/muebles.jpg') ?>" class="d-block w-100" alt="Muebles de Oficina">
        <div class="carousel-caption">
          <h2 class="display-4 fw-bold">Muebles de Oficina</h2>
          <p class="lead">Ergonomía y diseño para tu espacio de trabajo</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= base_url('assets/img/electrodomesticos.jpg') ?>" class="d-block w-100" alt="Electrodomésticos">
        <div class="carousel-caption">
          <h2 class="display-4 fw-bold">Electrodomésticos</h2>
          <p class="lead">Las mejores marcas para tu hogar</p>

        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
</section> 