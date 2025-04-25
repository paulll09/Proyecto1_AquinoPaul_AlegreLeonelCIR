<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-2">
        <!-- Logo y nombre de la empresa -->
        <a class="navbar-brand d-flex align-items-center ms-1" href="<?php echo base_url('inicio'); ?>">
            <img src="<?php echo base_url('assets/img/logoCIR.png'); ?>" alt="Logo" width="70" height="70" class="me-2">
            <span class="fw-bold fs-5">Centro Informático Regional</span>
        </a>

        <!-- Botón para menú responsive -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú de navegación -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Enlaces del menú principal -->
                <li class="nav-item">
                    <a class="nav-link <?= ($pagina_actual ?? '') === 'inicio' ? 'active fw-bold' : '' ?>" 
                       href="<?php echo base_url('inicio'); ?>">
                        <i class="fas fa-home me-1"></i>Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($pagina_actual ?? '') === 'nosotros' ? 'active fw-bold' : '' ?>" 
                       href="<?php echo base_url('nosotros'); ?>">
                        <i class="fas fa-users me-1"></i>Nosotros
                    </a>
                </li>
                <!-- Botón de Servicios -->
                <li class="nav-item">
                    <a class="nav-link <?= ($pagina_actual ?? '') === 'servicios' ? 'active fw-bold' : '' ?>" 
                       href="<?php echo base_url('comercializacion'); ?>">
                        <i class="fas fa-laptop me-1"></i>Servicios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($pagina_actual ?? '') === 'contacto' ? 'active fw-bold' : '' ?>" 
                       href="<?php echo base_url('contacto'); ?>">
                        <i class="fas fa-envelope me-1"></i>Contacto
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($pagina_actual ?? '') === 'terminos' ? 'active fw-bold' : '' ?>" 
                       href="<?php echo base_url('terminos'); ?>">
                        <i class="fas fa-home me-1"></i>Terminos y Usos
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav> 