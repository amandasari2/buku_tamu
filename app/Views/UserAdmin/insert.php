<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">Tambah Data User/Admin</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <?= form_open_multipart('User/InsertData') ?>

        <div class="form-group row">
            <label for="nama" class="col-4 col-form-label">Nama User/Admin</label>
            <div class="col-8">
                <input id="nama" name="nama" placeholder="Masukan Nama Anda" type="text" class="form-control">
                <p class="text-danger"><?= isset($validation) ? $validation->showError('nama') : '' ?></p>
            </div>
        </div>
        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Username</label>
            <div class="col-8">
                <input id="username" name="username" placeholder="Masukan Username Anda" type="text" class="form-control">
                <p class="text-danger"><?= isset($validation) ? $validation->showError('username') : '' ?></p>
            </div>
        </div>
        <div class="form-group row">
            <label for="telpon" class="col-4 col-form-label">Nomor Telepon</label>
            <div class="col-8">
                <input id="telpon" name="telpon" placeholder="Masukan Nomor Telepon Anda" type="number" class="form-control">
                <p class="text-danger"><?= isset($validation) ? $validation->showError('telpon') : '' ?></p>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-4 col-form-label">Email</label>
            <div class="col-8">
                <input id="email" name="email" placeholder="Masukan Email Anda" type="email" class="form-control">
                <p class="text-danger"><?= isset($validation) ? $validation->showError('email') : '' ?></p>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-4 col-form-label">Password</label>
            <div class="col-8">
                <input id="password" name="password" placeholder="Masukan Password Anda" type="password" class="form-control">
                <p class="text-danger"><?= isset($validation) ? $validation->showError('password') : '' ?></p>
            </div>
        </div>
        <div class="form-group row">
            <label for="foto" class="col-4 col-form-label">Foto</label>
            <div class="col-8">
                <input id="foto" accept=".image, .jpg, .png, .jpeg" name="foto" placeholder="Masukan Foto Anda" type="file" class="form-control">
                <p class="text-danger"><?= isset($validation) ? $validation->showError('foto') : '' ?></p>
            </div>
        </div>
        <div class="form-group row">
            <label for="level" class="col-4 col-form-label">Sebagai</label>
            <div class="col-8">
                <input id="level" name="level" value="Admin" type="text" class="form-control" readonly>
                <p class="text-danger"><?= isset($validation) ? $validation->showError('level') : '' ?></p>
            </div>
        </div>


        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('User') ?>" class="btn btn-success btn-flat">Kembali</a>
            </div>
        </div>

        <?= form_close() ?>

        <!-- /.row -->
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>