<?= $this->extend('plantillas/base') ?>

<?= $this->section('titulo') ?>
<?= esc($titulo) ?>
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="sales-container">
    <h1 class="sales-title"><?= esc($titulo) ?></h1>

    <div class="sales-table-container">
        <?php if (isset($ventas) && count($ventas) > 0): ?>
            <table class="sales-table">
                <thead>
                    <tr>
                        <th>ID Venta</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventas as $venta): ?>
                        <tr>
                            <td>
                                <span class="consultations-id"><?= esc($venta['id_venta']) ?></span>
                            </td>
                            <td>
                                <span class="sales-client-id">Cliente #<?= esc($venta['id_cliente']) ?></span>
                            </td>
                            <td>
                                <span class="sales-date"><?= esc(date('d/m/Y H:i', strtotime($venta['venta_fecha']))) ?></span>
                            </td>
                            <td>
                                <?php if (isset($venta['detalles']) && count($venta['detalles']) > 0): ?>
                                    <ul class="sales-details-list">
                                        <?php foreach ($venta['detalles'] as $detalle): ?>
                                            <li>
                                                <strong>Producto ID:</strong> <?= esc($detalle['id_producto']) ?> |
                                                <strong>Cantidad:</strong> <?= esc($detalle['detalle_cantidad']) ?> |
                                                <strong>Precio:</strong> $<?= esc(number_format($detalle['detalle_precio'], 2)) ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <em style="color: #6c757d;">Sin detalles</em>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="sales-alert-info">
                <i class="fas fa-info-circle"></i> No hay ventas registradas.
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>