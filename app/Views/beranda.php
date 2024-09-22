<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('admin/dist/img/logoa.png') ?>">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('admin/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('admin/dist/css/adminlte.min.css') ?>">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-blue sticky-top">
            <div class="container">
                <a href="<?= base_url('/') ?>" class="navbar-brand">
                    <img src="<?= base_url('admin/dist/img/logoa.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-white" style="color: white;">Pengadilan Negeri Kisaran</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?= base_url('Auth/Login') ?>">
                            <i class="fas fa-sign-in-alt" style="color: white;"></i> <span class="brand-text font-weight-white" style="color: white;">Login</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1> <?= $judul ?> <small>Isilah Formulir Dengan Benar</small></h1>
                            <hr>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">

                        <!-- /.col-md-6 -->
                        <div class="col-lg-12">
                            <?php if (session()->getFlashdata('insert')) : ?>
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: '<?= session()->getFlashdata('insert') ?>',
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                </script>
                            <?php endif; ?>

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title m-0"><?= $judul ?></h5>
                                </div>
                                <div class="card-body">
                                    <?php $validation = \Config\Services::validation(); ?>
                                    <?= form_open_multipart('Home/InsertData') ?>

                                    <div class="form-group row">
                                        <label for="nama" class="col-4 col-form-label">Nama Tamu</label>
                                        <div class="col-8">
                                            <input id="nama" name="nama" placeholder="Masukan Nama Anda" type="text" class="form-control">
                                            <p class="text-danger"><?= isset($validation) ? $validation->showError('nama') : '' ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jenis_kelamin" class="col-4 col-form-label">Jenis Kelamin</label>
                                        <div class="col-8">
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="custom-select">
                                                <option value="">-- Pilih Jenis Kelamin Anda --</option>
                                                <option value="Laki - Laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <p class="text-danger"><?= isset($validation) ? $validation->showError('jenis_kelamin') : '' ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="instansi" class="col-4 col-form-label">Instansi/Perusahaan</label>
                                        <div class="col-8">
                                            <input id="instansi" name="instansi" placeholder="Masukan Instansi/Perusahaan Anda" type="text" class="form-control">
                                            <p class="text-danger"><?= isset($validation) ? $validation->showError('instansi') : '' ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_telp" class="col-4 col-form-label">Nomor Telepon</label>
                                        <div class="col-8">
                                            <input id="no_telp" name="no_telp" placeholder="Masukan Nomor Telepon Anda" type="number" class="form-control">
                                            <p class="text-danger"><?= isset($validation) ? $validation->showError('no_telp') : '' ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-4 col-form-label">Alamat</label>
                                        <div class="col-8">
                                            <input id="alamat" name="alamat" placeholder="Masukan Alamat Anda" type="text" class="form-control">
                                            <p class="text-danger"><?= isset($validation) ? $validation->showError('alamat') : '' ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="keperluan" class="col-4 col-form-label">Kunjungan/Keperluan</label>
                                        <div class="col-8">
                                            <textarea id="keperluan" name="keperluan" cols="40" rows="5" class="form-control"></textarea>
                                        </div>
                                        <p class="text-danger"><?= isset($validation) ? $validation->showError('keperluan') : '' ?></p>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                            <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>

                                    <?= form_close() ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Tentang Kami</h5>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">Buku Tamu | Pengadilan Negeri Kisaran</h6>

                                    <p class="card-text">Jl. Ahmad Yani No. 33 Kisaran - Kab. Asahan 21214 - Sumatera Utara - Indonesia</p>
                                    <p class="card-text">Telp. 0623-41389</p>
                                    <p class="card-text">Fax. 0623-41396</p>
                                    <p class="card-text">
                                        <a href="mailto:mail@pn-kisaran.go.id">mail@pn-kisaran.go.id</a>
                                    </p>
                                    <p class="card-text">Email khusus delegasi Pengadilan Negeri Kisaran</p>
                                    <p class="card-text">
                                        <a href="mailto:delegasi.pnkisaran@gmail.com">delegasi.pnkisaran@gmail.com</a>
                                    </p>
                                    <p class="card-text">Email khusus Pidana Pengadilan Negeri Kisaran</p>
                                    <p class="card-text">
                                        <a href="mailto:pidana@pn-kisaran.go.id">pidana@pn-kisaran.go.id</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    Anything you want
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; <?= date('Y') ?> <a href="https://www.pn-kisaran.go.id/">Pengadilan Negeri Kisaran</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="<?= base_url('admin/plugins/jquery/jquery.min.js') ?>"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('admin/dist/js/adminlte.min.js') ?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url('admin/dist/js/demo.js') ?>"></script>
</body>

</html>