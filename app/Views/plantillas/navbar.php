<?php 
    $perfil = session()->get('perfil') ?? 0; // Perfil por defecto visitante (0)
    $login = session()->get('login') ?? false;
    $nombreUsuario = session()->get('nombre') ?? '';
?>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-2">
        <!-- Logo y nombre de la empresa -->
        <a class="navbar-brand d-flex align-items-center ms-1" href="<?= base_url('inicio'); ?>">
            <img src="<?= base_url('assets/img/logoCIR.png'); ?>" alt="Logo" width="70" height="70" class="me-2">
            <span class="fw-bold fs-5">Centro Informático Regional</span>
        </a>

        <!-- Botón menú responsive -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido del navbar -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if ($perfil == 0 || $perfil == 2): ?>
                    <!-- Ítems comunes para visitante y cliente -->
                    <li class="nav-item">
                        <a class="nav-link <?= ($pagina_actual ?? '') === 'inicio' ? 'active fw-bold' : '' ?>" href="<?= base_url('inicio'); ?>">
                            <i class="fas fa-home me-1"></i>Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($pagina_actual ?? '') === 'nosotros' ? 'active fw-bold' : '' ?>" href="<?= base_url('nosotros'); ?>">
                            <i class="fas fa-users me-1"></i>Nosotros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($pagina_actual ?? '') === 'servicios' ? 'active fw-bold' : '' ?>" href="<?= base_url('comercializacion'); ?>">
                            <i class="fas fa-laptop me-1"></i>Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($pagina_actual ?? '') === 'contacto' ? 'active fw-bold' : '' ?>" href="<?= base_url('contacto'); ?>">
                            <i class="fas fa-envelope me-1"></i>Contacto
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($pagina_actual ?? '') === 'terminos' ? 'active fw-bold' : '' ?>" href="<?= base_url('terminos'); ?>">
                            <i class="fas fa-file-contract me-1"></i>Términos y Usos
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($login): ?>
                    <?php if ($perfil == 1): ?>
                        <!-- Navbar del Administrador -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('admin/registrar_producto'); ?>">
                                <i class="fas fa-plus-circle"></i> Registrar Producto
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('admin/gestionar_productos'); ?>">
                                <i class="fas fa-cogs"></i> Gestionar Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('admin/productos'); ?>">
                                <i class="fas fa-boxes"></i> Listar Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('admin/ventas'); ?>">
                                <i class="fas fa-file-invoice"></i> Listar Ventas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('admin/consultas'); ?>">
                                <i class="fas fa-question-circle"></i> Ver Consultas
                            </a>
                        </li>
                    <?php elseif ($perfil == 2): ?>
                        <!-- Navbar del Cliente (Perfil 2) -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('carrito'); ?>">
                                <i class="fas fa-shopping-cart me-1"></i>Ver Carrito
                            </a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link text-success fw-bold">
                                <i class="fas fa-user me-1"></i><?= $nombreUsuario; ?>
                            </span>
                        </li>
                    <?php endif; ?>

                    <!-- Botón salir para usuarios logueados -->
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="<?= base_url('logout'); ?>">
                            <i class="fas fa-sign-out-alt me-1"></i>Salir
                        </a>
                    </li>
                <?php else: ?>
                    <!-- Botón Iniciar sesión para visitantes -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('login'); ?>">
                            <i class="fas fa-sign-in-alt me-1"></i>Iniciar Sesión
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>