<div class="registro-contenedor">
    <h3 class="registro-titulo">Registro</h3>

    <?php if (!empty($validation)): ?>
        <div class="registro-alerta">
            <ul>
                <?php foreach ($validation as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
 
    <?= form_open('registro/guardar') ?>
    <?= csrf_field() ?>

    <div class="registro-grupo">
        <label for="nombre" class="registro-etiqueta">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="registro-campo" placeholder="Tu nombre" required>
    </div>

    <div class="registro-grupo">
        <label for="apellido" class="registro-etiqueta">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="registro-campo" placeholder="Tu apellido" required>
    </div>

    <div class="registro-grupo">
        <label for="telefono" class="registro-etiqueta">Teléfono</label>
        <input type="tel" name="telefono" id="telefono" class="registro-campo" placeholder="Tu teléfono" required>
    </div>

    <div class="registro-grupo">
        <label for="email" class="registro-etiqueta">Correo Electrónico</label>
        <input type="email" name="email" id="email" class="registro-campo" placeholder="ejemplo@correo.com" required>
    </div>

    <div class="registro-grupo">
        <label for="password" class="registro-etiqueta">Contraseña</label>
        <input type="password" name="password" id="password" class="registro-campo" placeholder="Tu contraseña" required>
    </div>

    <div class="registro-boton-contenedor">
        <button type="submit" class="registro-boton">
            <i class="fas fa-user-check registro-icono"></i> Registrarme
        </button>
    </div>

    <?= form_close() ?>
</div>