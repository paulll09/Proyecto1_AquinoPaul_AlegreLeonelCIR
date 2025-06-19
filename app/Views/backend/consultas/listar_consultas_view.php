
<?= $this->extend('plantillas/base') ?>

<?= $this->section('titulo') ?>
Consultas de Clientes
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="consultations-container">
    <h2 class="consultations-title">Consultas de Clientes</h2>

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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultas as $consulta): ?>
                        <tr>
                            <td>
                                <span class="consultations-id"><?= esc($consulta['id_mensajes_contacto']) ?></span>
                            </td>
                            <td>
                                <span class="consultations-name"><?= esc($consulta['nombre_completo']) ?></span>
                            </td>
                            <td>
                                <span class="consultations-email"><?= esc($consulta['correo_electronico']) ?></span>
                            </td>
                            <td>
                                <span class="consultations-phone"><?= esc($consulta['telefono']) ?></span>
                            </td>
                            <td>
                                <div class="consultations-subject"><?= esc($consulta['asunto']) ?></div>
                            </td>
                            <td>
                                <div class="consultations-message"><?= esc($consulta['mensaje']) ?></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>