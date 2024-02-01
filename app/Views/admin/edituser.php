<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <h1>Edit user</h1>
        </div>
        <div class="card-body">
            <form action="<?= base_url('user/update')?>" method="post">
                <input type="hidden" value="<?= $datauser['id'] ?>" name="userid" id="userid">
                <div class="form-group">
                    <label>username</label>
                    <input type="text" value="<?= $datauser['username'] ?>" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="text" value="<?= $datauser['password'] ?>" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" id="save">Save</button> <a href="<?= base_url('user') ?>" class="btn btn-success">Back</a></a>
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
    text:  "User berhasil Diedit!",
    icon:  "success",
    button: "OK",
        });
    });
});

</script>

<?= $this->endSection() ?>