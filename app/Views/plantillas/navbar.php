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

        <!-- Botón menu responsive -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido del navbar -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if ($perfil == 0 || $perfil == 2): ?>
                    <!-- ítems comunes para visitante y cliente -->
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
                        <a class="nav-link <?= ($pagina_actual ?? '') === 'comercializacion' ? 'active fw-bold' : '' ?>" href="<?= base_url('comercializacion'); ?>">
                            <i class="fas fa-laptop me-1"></i>Servicios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($pagina_actual ?? '') === 'terminos' ? 'active fw-bold' : '' ?>" href="<?= base_url('terminos'); ?>">
                            <i class="fas fa-file-contract me-1"></i>Términos
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($login): ?>
                    <?php if ($perfil == 1): ?>
                        <!-- Navbar del Administrador -->
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="<?= base_url('admin/registrar_producto'); ?>">
                                <i class="fas fa-plus-circle me-2"></i> Registrar Producto
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="<?= base_url('admin/gestionar_productos'); ?>">
                                <i class="fas fa-cogs me-2"></i> Gestionar Productos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="<?= base_url('admin/ventas'); ?>">
                                <i class="fas fa-file-invoice me-2"></i> Listar Ventas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="<?= base_url('admin/consultas'); ?>">
                                <i class="fas fa-question-circle me-2"></i> Ver Consultas
                            </a>
                        </li>
                        <!-- Botón salir -->
                        <li class="nav-item">
                            <a class="nav-link text-danger d-flex align-items-center" href="<?= base_url('logout'); ?>">
                                <i class="fas fa-sign-out-alt me-2"></i>
                            </a>
                        </li>
                    <?php elseif ($perfil == 2): ?>
                        <!-- Navbar del Cliente -->
                        <!-- Opciones principales a la izquierda -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($pagina_actual ?? '') === 'contacto' ? 'active fw-bold' : '' ?>" href="<?= base_url('contacto'); ?>">
                                <i class="fas fa-envelope me-1"></i>Contacto
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($pagina_actual ?? '') === 'productos' ? 'active fw-bold' : '' ?>" href="<?= base_url('admin/productos'); ?>">
                                <i class="fas fa-boxes me-2"></i> Catálogo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($pagina_actual ?? '') === 'carrito' ? 'active fw-bold' : '' ?>" href="<?= base_url('carrito'); ?>">
                                <i class="fas fa-shopping-cart me-2"></i>Carrito
                            </a>
                        </li>

                        <!-- Espacio automático -->
                        <li class="nav-item flex-grow-1"></li>

                        <!-- Icono de usuario con nombre  -->


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarUserDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user fa-lg mb-1 me-2"></i>
                                <span class="fw-bold"><?= esc($nombreUsuario); ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarUserDropdown">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('perfil/editar'); ?>">
                                        <i class="fas fa-user-edit me-2"></i> Editar perfil
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('mis-compras'); ?>">
                                        <i class="fas fa-shopping-bag me-2"></i> Mis compras
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="<?= base_url('logout'); ?>">
                                        <i class="fas fa-sign-out-alt me-2"></i> Cerrar sesión
                                    </a>
                                </li>
                            </ul>
                        </li>


                    <?php endif; ?>


                <?php else: ?>
                    <!-- Botón iniciar sesión -->
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="<?= base_url('login'); ?>">
                            <i class="fas fa-sign-in-alt me-2"></i> Iniciar Sesión
                        </a>
                    </li>
                <?php endif; ?>