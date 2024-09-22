<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $judul ?></title>
  <link rel="icon" type="image/png" href="<?= base_url('admin/dist/img/logoa.png') ?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('admin/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('admin/dist/css/adminlte.min.css') ?>">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="card card-outline card-primary">
    <?php if (session()->getFlashdata('pesan')) : ?>
                    <script>
                        Swal.fire({
                            icon: 'warning',
                            title: 'Pesan',
                            text: '<?= session()->getFlashdata('pesan') ?>',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    </script>
                <?php endif; ?>
      <div class="card-header text-center">
        <a href="<?= base_url('/') ?>" class="h1">Pengadilan Negeri Kisaran</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>

        <?php echo form_open('Auth/CekLogin') ?>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Masukan Email" value="<?= old('email') ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <p class="text-danger"><?= validation_show_error('email') ?></p>

          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Masukan Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <p class="text-danger"><?= validation_show_error('password') ?></p>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>

  <script src="<?= base_url('admin/plugins/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('admin/dist/js/adminlte.min.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
