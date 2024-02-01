<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
<div class="card-shadow mb-4">
        <div class="card-header py-3">
            <h1>Tambah Pelanggan</h1>
        </div>
        <div class="card-body">
            <form action="<?= base_url('pelanggan/store') ?>" method="post">
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="namapelanggan" id="namapelanggan" class="form-control"required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control"required>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="nomortelepon" id="nomortelepon" class="form-control"required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" id="save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="data-table" width="100%" collspacing="0">
                <thead class="text-center">
                    <tr>
                    <th>No</th>
                    <th>Nama Pelannggan</th>
                    <th>alamat</th>
                    <th>Telepon</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
                    $no =1;
                    foreach ($pelanggans as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['namapelanggan'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['nomortelepon'] ?></td>
                        <td>
                        <a href="<?= base_url('pelanggan/edit').'/'.$row['pelangganid']; ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('pelanggan/delete').'/'.$row['pelangganid']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Kah????')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
$(document).ready(function(){
    $('#save').click(function(){
    swal.fire({
    title: "Berhasil!",
    text:  "Pelanggan berhasil Ditambahakan!",
    icon:  "success",
    button: "OK",
        });
    });
});

</script>

<?= $this->endsection(); ?>