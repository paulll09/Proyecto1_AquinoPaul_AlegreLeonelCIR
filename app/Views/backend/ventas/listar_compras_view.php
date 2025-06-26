<?= $this->extend('plantillas/base') ?>

<?= $this->section('titulo') ?>
<?= esc($titulo) ?>
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="sales-container">

    <h1 class="sales-title"><?= esc($titulo) ?></h1>

    <div class="sales-table-container">
        <?php if (isset($compras) && count($compras) > 0): ?>
            <table class="sales-table table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Fecha</th>
                        <th>Detalles</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compras as $compra): ?>
                        <tr>
                            <td>
                                <span class="sales-date"><?= esc(date('d/m/Y H:i', strtotime($compra['fecha']))) ?></span>
                            </td>
                            <td>
                                <?php if (isset($compra['detalles']) && count($compra['detalles']) > 0): ?>
                                    <ul class="sales-details-list">
                                        <?php foreach ($compra['detalles'] as $detalle): ?>
                                            <li>
                                                <strong>Producto:</strong> <?= esc($detalle['nombre']) ?> |
                                                <strong>Cantidad:</strong> <?= esc($detalle['detalle_cantidad']) ?> |
                                                <strong>Precio:</strong> $<?= number_format($detalle['detalle_precio'], 2) ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <em style="color: #6c757d;">Sin detalles</em>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong>$<?= number_format($compra['total'], 2) ?></strong>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="sales-alert-info alert alert-warning text-center">
                <i class="fas fa-info-circle"></i> No hay compras registradas.
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
