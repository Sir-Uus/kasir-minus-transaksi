<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card-shadow mb-4">
    <div class="card-header py-3">
            <h1>Tambah user</h1>
        </div>
        <div class="card-body">
            <form action="<?= base_url('user/store') ?>" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" id="username" class="form-control"required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="password" id="password" class="form-control"required>
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" id="role" class="form-control">
                    <?php foreach ($users as $user) :?>
                        <option><?= $user['role'] ?></option>
                    <?php endforeach; ?>
                    </select>
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
            <table class="table table-bordered table-striped" id="data-table" width="100%" collspacing="0">
                <thead class="text-center">
                    <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php 
                    $no =1;
                    foreach ($users as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['password'] ?></td>
                        <td>
                        <a href="<?= base_url('user/edit').'/'.$row['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('user/delete').'/'.$row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Kah????')">Delete</a>
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
    text:  "User berhasil Ditambahakan!",
    icon:  "success",
    button: "OK",
        });
    });
});

</script>

<?= $this->endsection() ?>