<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card-shadow mb-4">
    <div class="card-header py-3">
            <h1>Tambah Produk</h1>
        </div>
        <div class="card-body">
            <form action="<?= base_url('produk/store') ?>" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
                <div class="form-group mb-2">
                    <label>Nama Produk :</label>
                    <input type="text" name="namaproduk" id="namaproduk" class="form-control"required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mb-2">
                    <label>Harga :</label>
                    <input type="text" name="harga" id="harga" class="form-control"required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="custom-file">
                    <label for="">Gambar :</label>
                    <input type="file" class="form-control" name="gambar" id="gambar">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mb-2">
                    <label>Stok :</label> 
                    <input type="text" name="stok" id="stok" class="form-control"required>
                </div>
            </div>
                <div class="form-group mb-2">
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
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Stok</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
                    $no =1;
                    foreach ($produks as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['namaproduk'] ?></td>
                        <td>Rp.<?= $row['harga'] ?></td>
                        <td><?= $row['gambar'] ?></td>
                        <td><?= $row['stok'] ?></td>
                        <td>
                        <a href="<?= base_url('produk/edit').'/'.$row['produkid']; ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('produk/delete').'/'.$row['produkid']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Kah????')">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#save').click(function(){
    
    swal.fire({
    title: "Berhasil!",
    text:  "Produk berhasil Ditambahakan!",
    icon:  "success",
    button: "OK",
        });
    });
});

</script>

<?= $this->endsection() ?>