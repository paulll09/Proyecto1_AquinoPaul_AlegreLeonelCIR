<?= $this->extend('plantillas/base') ?>

<?= $this->section('titulo') ?>
Consultas de Clientes
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="consultations-container">
    <h2 class="consultations-title">Consultas de Clientes</h2>

    <?php if (session('mensaje')) : ?>
        <div class="consultations-alert-success">
            <i class="fas fa-check-circle"></i> <?= session('mensaje') ?>
        </div>
    <?php endif; ?>

    <?php if (empty($consultas)): ?>
        <div class="consultations-alert-info">
            <i class="fas fa-info-circle"></i> No hay consultas registradas.
        </div>
    <?php else: ?>
        <div class="consultations-table-container">
            <table class="consultations-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre Completo</th>
                        <th>Correo Electrónico</th>
                        <th>Teléfono</th>
                        <th>Asunto</th>
                        <th>Mensaje</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultas as $consulta): ?>
                        <tr>
                            <td><?= esc($consulta['id_mensajes_contacto']) ?></td>
                            <td><?= esc($consulta['nombre_completo']) ?></td>
                            <td><?= esc($consulta['correo_electronico']) ?></td>
                            <td><?= esc($consulta['telefono']) ?></td>
                            <td><?= esc($consulta['asunto']) ?></td>
                            <td><?= esc($consulta['mensaje']) ?></td>
                            <td>
                                <?php if ($consulta['leido']): ?>
                                    <span class="badge badge-success">Leído</span>
                                <?php else: ?>
                                    <span class="badge badge-warning">No leído</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!$consulta['leido']): ?>
                                    <a href="<?= base_url('consultas/marcar/' . $consulta['id_mensajes_contacto']) ?>" class="btn btn-sm btn-success">Marcar como leída</a>
                                <?php endif; ?>
                                <a href="<?= base_url('consultas/eliminar/' . $consulta['id_mensajes_contacto']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta consulta?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
