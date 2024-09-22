<style>
    body {
        background: rgb(99, 39, 120)
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container rounded bg-white mt-5 mb-5">
    <?php if (session()->getFlashdata('update')) : ?>
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Updated',
                text: '<?= session()->getFlashdata('update') ?>',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="<?= base_url('foto') ?>/<?= session()->get('foto') ? session()->get('foto') : 'default.jpg' ?>">
                <span class="font-weight-bold"><?= session()->get('nama'); ?></span>
                <span class="text-black-50"><?= session()->get('level'); ?></span><span> </span>
            </div>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-5">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <?php $errors = validation_errors() ?>
                <?php echo form_open_multipart('User/UpdateData/' . $user['id']) ?>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label class="labels">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap" value="<?= $user['nama'] ?>">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Nomor Telepon</label>
                        <input type="text" class="form-control" name="telpon" placeholder="Masukan Nomor Telepon" value="<?= $user['telpon'] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan Email" value="<?= $user['email'] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukan Username" value="<?= $user['username'] ?>">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Password Baru</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password Baru" value="">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Level</label>
                        <input type="text" class="form-control" name="level" placeholder="Masukan Level" value="<?= $user['level'] ?>" readonly>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Foto</label>
                        <input type="file" accept=".image, .jpg, .png, .jpeg" name="foto" class="form-control" placeholder="Masukan Foto" value="<?= old('foto') ?>">
                    </div>

                </div>

                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" name="submit" type="submit">Save Profile</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>