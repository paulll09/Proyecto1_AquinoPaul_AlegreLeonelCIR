// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
  // Inicializar tooltips de Bootstrap
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });

  // Inicializar popovers de Bootstrap
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
  });

  // Efecto de scroll suave para los enlaces de anclaje
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;
      
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - 70,
          behavior: 'smooth'
        });
      }
    });
  });

  // Efecto de aparición al hacer scroll
  const elementosAnimados = document.querySelectorAll('.animate-on-scroll');
  
  function verificarElementosVisibles() {
    elementosAnimados.forEach(elemento => {
      const posicionElemento = elemento.getBoundingClientRect().top;
      const alturaVentana = window.innerHeight;
      
      if (posicionElemento < alturaVentana - 100) {
        elemento.classList.add('visible');
      }
    });
  }
  
  // Verificar elementos visibles al cargar la página
  verificarElementosVisibles();
  
  // Verificar elementos visibles al hacer scroll
  window.addEventListener('scroll', verificarElementosVisibles);

  // Mejorar la experiencia del carrusel
  const carrusel = document.getElementById('mainCarousel');
  if (carrusel) {
    // Pausar el carrusel al pasar el mouse por encima
    carrusel.addEventListener('mouseenter', function() {
      this.pause();
    });
    
    // Reanudar el carrusel al quitar el mouse
    carrusel.addEventListener('mouseleave', function() {
      this.cycle();
    });
  }

  // Validación de formularios
  const formularios = document.querySelectorAll('.needs-validation');
  
  Array.from(formularios).forEach(formulario => {
    formulario.addEventListener('submit', evento => {
      if (!formulario.checkValidity()) {
        evento.preventDefault();
        evento.stopPropagation();
      }
      
      formulario.classList.add('was-validated');
    }, false);
  });
}); 