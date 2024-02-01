<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h1>Edit Pelanggan</h1>
        </div>
        <div class="card-body">
            <form action="<?= base_url('pelanggan/update')?>" method="post">
                <input type="hidden" value="<?= $datapelanggan['pelangganid'] ?>" name="pelangganid" id="pelangganid">
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" value="<?= $datapelanggan['namapelanggan'] ?>" name="namapelanggan" id="namapelanggan" class="form-control">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" value="<?= $datapelanggan['alamat'] ?>" name="alamat" id="alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" value="<?= $datapelanggan['nomortelepon'] ?>" name="nomortelepon" id="nomortelepon" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" id="save">Save</button> <a href="<?= base_url('pelanggan') ?>" class="btn btn-success">Back</a></a>
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
    text:  "Pelanggan berhasil Diedit!",
    icon:  "success",
    button: "OK",
        });
    });
});

</script>

<?= $this->endSection() ?>