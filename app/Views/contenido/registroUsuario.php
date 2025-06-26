<div class="registro-contenedor"> 
    <h3 class="registro-titulo">Registro</h3>

    <?php if (!empty($validation)) : ?>
        <div class="registro-alerta">
            <ul>
                <?php foreach ($validation->getErrors() as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (session('mensaje')) : ?>
        <div class="registro-alerta-exito">
            <?= session('mensaje') ?>
        </div>
    <?php endif; ?>

    <?= form_open('registro/guardar') ?>
    <?= csrf_field() ?>

    <input type="hidden" name="perfil_id" value="2">

    <div class="registro-grupo">
        <label for="nombre" class="registro-etiqueta">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="registro-campo" placeholder="Tu nombre" required value="<?= esc(set_value('nombre', '')) ?>">
    </div>

    <div class="registro-grupo">
        <label for="apellido" class="registro-etiqueta">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="registro-campo" placeholder="Tu apellido" required value="<?= esc(set_value('apellido', '')) ?>">
    </div>

    <div class="registro-grupo">
        <label for="dni" class="registro-etiqueta">DNI / CUIT</label>
        <input type="text" name="dni" id="dni" class="registro-campo" placeholder="Ej. 12345678" required value="<?= esc(set_value('dni', '')) ?>">
    </div>

    <div class="registro-grupo">
        <label for="fecha_nacimiento" class="registro-etiqueta">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="registro-campo" required value="<?= esc(set_value('fecha_nacimiento', '')) ?>">
    </div>

    <div class="registro-grupo">
        <label for="telefono" class="registro-etiqueta">Teléfono</label>
        <input type="text" name="telefono" id="telefono" class="registro-campo" placeholder="Tu teléfono" required value="<?= esc(set_value('telefono', '')) ?>">
    </div>

    <div class="registro-grupo">
        <label for="direccion" class="registro-etiqueta">Dirección</label>
        <input type="text" name="direccion" id="direccion" class="registro-campo" placeholder="Ej. Calle 123" required value="<?= esc(set_value('direccion', '')) ?>">
    </div>

    <div class="registro-grupo">
        <label for="ciudad" class="registro-etiqueta">Ciudad</label>
        <input type="text" name="ciudad" id="ciudad" class="registro-campo" placeholder="Tu ciudad" required value="<?= esc(set_value('ciudad', '')) ?>">
    </div>

    <div class="registro-grupo">
        <label for="provincia" class="registro-etiqueta">Provincia</label>
        <input type="text" name="provincia" id="provincia" class="registro-campo" placeholder="Tu provincia" required value="<?= esc(set_value('provincia', '')) ?>">
    </div>

    <div class="registro-grupo">
        <label for="codigo_postal" class="registro-etiqueta">Código Postal</label>
        <input type="text" name="codigo_postal" id="codigo_postal" class="registro-campo" placeholder="Ej. 3400" required value="<?= esc(set_value('codigo_postal', '')) ?>">
    </div>

    <div class="registro-grupo">
        <label for="email" class="registro-etiqueta">Correo Electrónico</label>
        <input type="email" name="email" id="email" class="registro-campo" placeholder="ejemplo@correo.com" required value="<?= esc(set_value('email', '')) ?>">
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