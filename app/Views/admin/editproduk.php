<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h1>Edit produk</h1>
        </div>
        <div class="card-body">
            <form action="<?= base_url('produk/update')?>" method="post">
                <input type="hidden" value="<?= $dataproduk['produkid'] ?>" name="produkid" id="produkid">
                <div class="form-group">
                    <label>Nama produk</label>
                    <input type="text" value="<?= $dataproduk['namaproduk'] ?>" name="namaproduk" id="namaproduk" class="form-control"required>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" value="<?= $dataproduk['harga'] ?>" name="harga" id="harga" class="form-control"required>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="text" value="<?= $dataproduk['stok'] ?>" name="stok" id="stok" class="form-control"required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" id="save">Save</button> <a href="<?= base_url('produk') ?>" class="btn btn-success">Back</a></a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#save').click(function(){
    swal.fire({
    title: "Berhasil!",
    text:  "Produk berhasil Diedit!",
    icon:  "success",
    button: "OK",
        });
    });
});

</script>
<?= $this->endSection() ?>