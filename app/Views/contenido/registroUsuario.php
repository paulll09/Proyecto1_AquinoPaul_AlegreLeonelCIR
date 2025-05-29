<div class="container mt-5" style="max-width: 400px;">
    <h3 class="mb-4 text-center">Registro</h3>

    <?php if (!empty($validation)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($validation as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?= form_open('registro/guardar') ?>
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Tu nombre" required>
    </div>

    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Tu apellido" required>
    </div>

    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="Tu teléfono" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@correo.com" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Tu contraseña" required>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-user-check me-2"></i> Registrarme
        </button>
    </div>

    <?= form_close() ?>
</div>