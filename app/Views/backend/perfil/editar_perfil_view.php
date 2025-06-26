<?= $this->extend('plantillas/base') ?>

<?= $this->section('contenido') ?>

<?php if (session('mensaje')): ?>
    <div class="registro-alerta registro-alerta-exito">
        <?= session('mensaje') ?>
    </div>
<?php endif; ?>

<?php if (!empty($validation) && is_object($validation)): ?>
    <div class="registro-alerta registro-alerta-error">
        <ul>
            <?php foreach ($validation->getErrors() as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>


<div class="registro-contenedor">
    <h3 class="registro-titulo">Editar Perfil</h3>

    <?= form_open('usuario/actualizar_perfil') ?>
    <?= csrf_field() ?>

    <input type="hidden" name="id" value="<?= esc($usuario['id_persona']) ?>">

    <div class="registro-grupo">
        <label for="nombre" class="registro-etiqueta">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="registro-campo" required
               value="<?= esc(set_value('nombre', $usuario['persona_nombre'])) ?>">
    </div>

    <div class="registro-grupo">
        <label for="apellido" class="registro-etiqueta">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="registro-campo" required
               value="<?= esc(set_value('apellido', $usuario['persona_apellido'])) ?>">
    </div>

    <div class="registro-grupo">
        <label for="dni" class="registro-etiqueta">DNI / CUIT</label>
        <input type="text" name="dni" id="dni" class="registro-campo" required
               value="<?= esc(set_value('dni', $usuario['persona_dni'])) ?>">
    </div>

    <div class="registro-grupo">
        <label for="fecha_nacimiento" class="registro-etiqueta">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="registro-campo" required
               value="<?= esc(set_value('fecha_nacimiento', $usuario['persona_fecha_nacimiento'])) ?>">
    </div>

    <div class="registro-grupo">
        <label for="telefono" class="registro-etiqueta">Teléfono</label>
        <input type="text" name="telefono" id="telefono" class="registro-campo" required
               value="<?= esc(set_value('telefono', $usuario['persona_telefono'])) ?>">
    </div>

    <div class="registro-grupo">
        <label for="direccion" class="registro-etiqueta">Dirección</label>
        <input type="text" name="direccion" id="direccion" class="registro-campo" required
               value="<?= esc(set_value('direccion', $usuario['persona_direccion'])) ?>">
    </div>

    <div class="registro-grupo">
        <label for="ciudad" class="registro-etiqueta">Ciudad</label>
        <input type="text" name="ciudad" id="ciudad" class="registro-campo" required
               value="<?= esc(set_value('ciudad', $usuario['persona_ciudad'])) ?>">
    </div>

    <div class="registro-grupo">
        <label for="provincia" class="registro-etiqueta">Provincia</label>
        <input type="text" name="provincia" id="provincia" class="registro-campo" required
               value="<?= esc(set_value('provincia', $usuario['persona_provincia'])) ?>">
    </div>

    <div class="registro-grupo">
        <label for="codigo_postal" class="registro-etiqueta">Código Postal</label>
        <input type="text" name="codigo_postal" id="codigo_postal" class="registro-campo" required
               value="<?= esc(set_value('codigo_postal', $usuario['persona_codigo_postal'])) ?>">
    </div>

    <div class="registro-grupo">
        <label for="email" class="registro-etiqueta">Correo Electrónico</label>
        <input type="email" name="email" id="email" class="registro-campo" required
               value="<?= esc(set_value('email', $usuario['persona_mail'])) ?>">
    </div>

    <div class="registro-boton-contenedor">
        <button type="submit" class="registro-boton">
            <i class="fas fa-save registro-icono"></i> Guardar Cambios
        </button>
    </div>

    <?= form_close() ?>
</div>


<?= $this->endSection() ?>
