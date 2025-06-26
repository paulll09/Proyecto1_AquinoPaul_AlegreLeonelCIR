<?= $this->extend('plantillas/base') ?>

<?= $this->section('titulo') ?>
<?= esc($titulo) ?>
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="sales-container">

    <h1 class="sales-title"><?= esc($titulo) ?></h1>


    <div class="sales-table-container">
        <?php if (isset($ventas) && count($ventas) > 0): ?>
            <table class="sales-table table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID Venta</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Detalles</th>
                        <th>Venta Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventas as $venta): ?>
                        <tr>
                            <td>
                                <span class="consultations-id"><?= esc($venta['id_venta']) ?></span>
                            </td>
                            <td>
                                <span class="sales-client-id">
                                    Cliente #<?= esc($venta['id_cliente']) ?> - <?= esc($venta['cliente_nombre']) ?>
                                </span>
                            </td>
                            <td>
                                <span class="sales-date"><?= esc(date('d/m/Y H:i', strtotime($venta['venta_fecha']))) ?></span>
                            </td>
                            <td>
                                <?php if (isset($venta['detalles']) && count($venta['detalles']) > 0): ?>
                                    <ul class="sales-details-list">
                                        <?php foreach ($venta['detalles'] as $detalle): ?>
                                            <li>
                                                <strong>Producto:</strong> <?= esc($detalle['nombre']) ?> |
                                                <strong>Cantidad:</strong> <?= esc($detalle['detalle_cantidad']) ?> |
                                                <strong>Precio:</strong> $<?= esc(number_format($detalle['detalle_precio'], 2)) ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <em style="color: #6c757d;">Sin detalles</em>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php
                                $ventaTotal = 0;
                                foreach ($venta['detalles'] as $detalle) {
                                    $ventaTotal += $detalle['detalle_cantidad'] * $detalle['detalle_precio'];
                                }
                                ?>
                                <strong>$<?= number_format($ventaTotal, 2) ?></strong>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="sales-alert-info alert alert-warning text-center">
                <i class="fas fa-info-circle"></i> No hay ventas registradas.
            </div>
        <?php endif; ?>
        
    <?php if (isset($totalVentas)): ?>
        <div class="alert alert-info text-end mb-4">
            <strong>Total de ventas: $<?= number_format($totalVentas, 2) ?></strong>
        </div>
    <?php endif; ?>
        
    </div>
</div>

<?= $this->endSection() ?>