<div class="login-container">
    <h3 class="login-title">Iniciar Sesión</h3>

    <?php if (isset($_GET['cerrada']) && $_GET['cerrada'] == 1): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sesión cerrada correctamente.',
                confirmButtonColor: '#FF0033'
            });
        </script>
    <?php endif; ?>

    <?php if (!empty($validation)): ?>
        <div class="login-alert">
            <ul>
                <?php foreach ($validation as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?= form_open('login/validar') ?>
    <?= csrf_field() ?>

    <div class="login-form-group">
        <label for="email" class="login-label">Correo Electrónico</label>
        <input type="email" name="email" id="email" class="login-input" placeholder="ejemplo@correo.com" required>
    </div>

    <div class="login-form-group">
        <label for="password" class="login-label">Contraseña</label>
        <input type="password" name="password" id="password" class="login-input" placeholder="Tu contraseña" required>
    </div>

    <button type="submit" class="login-btn-primary">
        <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
    </button>

    <div class="login-register-section">
        <a href="registrar" class="login-btn-secondary">
            <i class="fas fa-user-plus"></i> Registrarme
        </a>
    </div>

    <?= form_close() ?>
</div>