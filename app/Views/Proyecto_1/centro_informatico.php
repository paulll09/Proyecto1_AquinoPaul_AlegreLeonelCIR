<!doctype html>
<html lang="es">


<!-- leo balín -->

<header class="shadow-sm bg-white sticky-top">
  <nav class="navbar navbar-expand-lg navbar-light container py-3">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <!-- Logo o ícono (puede ser una imagen también) -->
      <img src="assets/img/CIR color-fondo.jpg" alt="Logo" width="40" height="40" class="me-2">
      <span class="fw-bold fs-5">Centro Informático Regional</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Menú">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto</a>
        </li>
      </ul>
      <!-- Botón destacado a la derecha -->
      <a href="#" class="btn btn-primary ms-lg-3 mt-2 mt-lg-0">Consultanos</a>
    </div>
  </nav>

  
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/estilos.css'); ?>">
</header>

<body>

  <!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Principal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Quienes Somos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Comercialización</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Carrusel de imágenes -->
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/informatica.avif" class="d-block w-100" alt="Imagen 1">
      </div>
      <div class="carousel-item">
        <img src="assets/img/muebles.jpg" class="d-block w-100" alt="Informática">
      </div>
      <div class="carousel-item">
        <img src="assets/img/electrodomesticos.jpg" class="d-block w-100" alt="Imagen 3">
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>



  <!--pie de pagina-->

  
<footer class="footer">
  <div class="footer-content">
    <p>&copy; 2025 Centro Informatico Regional. Todos los derechos reservados.</p>
    <P> hola </p>
    <div class="socials">
      <a href="https://www.instagram.com/paulc_aquino">Instagram</a>
    </div>
  </div>
</footer>

  <!-- Scripts de Bootstrap -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>
