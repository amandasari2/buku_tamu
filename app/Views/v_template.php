<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $judul ?> | Buku Tamu</title>
    <link rel="icon" type="image/png" href="<?= base_url('admin/dist/img/logoa.png') ?>">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('admin/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url('admin/plugins/jqvmap/jqvmap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('admin/dist/css/adminlte.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('admin/plugins/daterangepicker/daterangepicker.css') ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('admin/plugins/summernote/summernote-bs4.min.css') ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('admin/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url('admin/dist/img/logoa.png') ?>" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>



            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <?php
                        if (function_exists('date_default_timezone_set'))
                            date_default_timezone_set('Asia/Jakarta');
                        ?>
                        <span id="clock">&nbsp;</span>
                    </a>
                </li>

                <li class="nav-item dropdown user-menu">
                    <a href="<?= base_url('Dashboard/') ?>" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url('foto') ?>/<?= session()->get('foto') ? session()->get('foto') : 'default.jpg' ?>" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline"><?= session()->get('nama'); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="<?= base_url('foto') ?>/<?= session()->get('foto') ? session()->get('foto') : 'default.jpg' ?>" class="img-circle elevation-2" alt="User Image">

                            <p>
                                <?= session()->get('nama'); ?>
                                <small><?= session()->get('level'); ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="<?= base_url('User/Profil') ?>/<?= session()->get('id'); ?>" class="btn btn-default btn-flat">Profile</a>
                            <a href="<?= base_url('Auth/Logout') ?>" class="btn btn-default btn-flat float-right">Sign out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('Dashboard/') ?>" class="brand-link">
                <img src="<?= base_url('admin/dist/img/logoa.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light" style="font-size: 1rem;">Pengadilan Negeri Kisaran</span>

            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('foto') ?>/<?= session()->get('foto') ? session()->get('foto') : 'default.jpg' ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= session()->get('nama'); ?></a>
                    </div>
                </div>
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
                <?php if (session()->getFlashdata('delete')) : ?>
                    <script>
                        Swal.fire({
                            icon: 'warning',
                            title: 'Deleted',
                            text: '<?= session()->getFlashdata('delete') ?>',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    </script>
                <?php endif; ?>
                <?php if (session()->getFlashdata('logout')) : ?>
                    <script>
                        Swal.fire({
                            title: 'Apakah Anda yakin ingin keluar?',
                            text: '<?= session()->getFlashdata('logout') ?>',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, keluar!',
                            cancelButtonText: 'Tidak, tetap di sini!',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Pengguna memilih "Ya"
                                window.location.href = '<?= base_url('Auth/Logout') ?>'; // Ganti dengan URL logout sesuai aplikasi Anda
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                // Pengguna memilih "Tidak"
                                Swal.fire(
                                    'Dibatalkan',
                                    'Anda tetap berada di sini.',
                                    'info'
                                );
                            }
                        });
                    </script>
                <?php endif; ?>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('Dashboard/') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Tamu/') ?>" class="nav-link <?= $menu == 'tamu' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Data Tamu
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link <?= ($menu == 'User') ? 'active' : '' ?> | <?= ($menu == 'Log') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Pengaturan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('User/') ?>" class="nav-link <?= ($menu == 'User') ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manajemen User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Log/') ?>" class="nav-link <?= ($menu == 'Log') ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Log Status</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('User/Profil') ?>/<?= session()->get('id'); ?>" class="nav-link <?= ($menu == 'profil') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Auth/Logout') ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Sign Out
                                </p>
                            </a>

                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $judul ?></h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <?php if ($page) {
                        echo view($page);
                    } ?>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; <?= date('Y') ?> <a href="https://www.pn-kisaran.go.id/">Pengadilan Negeri Kisaran</a>.</strong>
            All rights reserved.

        </footer>

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery -->
    <script src="<?= base_url('admin/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('admin/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('admin/plugins/chart.js/Chart.min.js') ?>"></script>
    <!-- Sparkline -->
    <script src="<?= base_url('admin/plugins/sparklines/sparkline.js') ?>"></script>
    <!-- JQVMap -->
    <script src="<?= base_url('admin/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url('admin/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url('admin/plugins/moment/moment.min.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/daterangepicker/daterangepicker.js') ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
    <!-- Summernote -->
    <script src="<?= base_url('admin/plugins/summernote/summernote-bs4.min.js') ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('admin/dist/js/adminlte.js') ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('admin/dist/js/demo.js') ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url('admin/dist/js/pages/dashboard.js') ?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('admin/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/jszip/jszip.min.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/pdfmake/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/pdfmake/vfs_fonts.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
    <!-- Select2 -->
    <script src="<?= base_url('admin/plugins/select2/js/select2.full.min.js') ?>"></script>
    <script src="<?= base_url('admin/plugins/chart.js/Chart.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        function updateClock() {
            const now = new Date();
            const options = {
                weekday: 'long', // Hari dalam minggu
                day: '2-digit', // Tanggal
                month: 'long', // Bulan
                year: 'numeric', // Tahun
                hour: '2-digit', // Jam
                minute: '2-digit', // Menit
                second: '2-digit' // Detik
            };
            const formattedDate = now.toLocaleDateString('id-ID', options);
            document.getElementById('clock').textContent = formattedDate;
        }

        // Update clock every second
        setInterval(updateClock, 1000);

        // Initialize clock on page load
        updateClock();
    </script>
</body>

</html>