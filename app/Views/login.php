<link href="<?= base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <?php if (isset($validation)): ?>
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
            </div>
        </div>
    <?php endif; ?>
<div class="container mt-4 ">
    <div class="card shadow mb-4">
    <div class="card-header">
        <h2>Login</h2>
    </div>
    <div class="card-body">
        <form action="<?= base_url('login') ?>" method="post">
        <div>
            <label >username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div>
            <label >password</label>
            <input type="password" name="password" class="form-control" required>
        </div></br>
        <div>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        </form>
    </div>
    </div>
</div>