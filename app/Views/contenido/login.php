<div class="container mt-5" style="max-width: 400px;">
    <h3 class="mb-4 text-center">Iniciar Sesión</h3>

    <?php if (isset($_GET['cerrada']) && $_GET['cerrada'] == 1): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'sesion cerrada correctamente.',
                confirmButtonColor: '#FF0033'
            });
        </script>
    <?php endif; ?>

    <?php if (!empty($validation)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($validation as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?= form_open('login/validar') ?>
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@correo.com" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Tu contraseña" required>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-sign-in-alt me-2"></i> Iniciar Sesión
        </button>
    </div>

    <div class="mt-3 text-center">
        <a href="registrar" class="btn btn-secondary">
            <i class="fas fa-user-plus me-2"></i> Registrarme
        </a>
    </div>

    <?= form_close() ?>
</div>