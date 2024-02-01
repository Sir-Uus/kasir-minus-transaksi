.<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="data-table" width="100%" collspacing="0">
                <thead class="text-center">
                    <tr>
                    <th>No</th>
                    <th>Penjualan ID</th>
                    <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
                    $no =1;
                    foreach ($penjualans as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['penjualanid'] ?></td>
                        <td><?= $row['totalharga'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?= $this->endsection(); ?>