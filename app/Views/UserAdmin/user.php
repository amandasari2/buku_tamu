<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data User/Admin</h3>

        <!-- Tombol Tambah Data -->
        <!-- <a href="<?= base_url('User/Input') ?>" class="btn btn-primary float-right">
            <i class="fas fa-plus"></i> Tambah Data User
        </a> -->
    </div>

    <!-- /.card-header -->
    <div class="card-body">

        <?php

        use CodeIgniter\I18n\Time; ?>
        <table id="example1" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="width:1px">No</th>
                    <th style="width:2px">Nama</th>
                    <th style="width:3px">Username</th>
                    <th style="width:2px">No Telepon</th>
                    <th style="width:5px">Email</th>
                    <th style="width:2px">Sebagai</th>
                    <th style="width:1px">Terdaftar</th>
                    <th style="width: 10px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($user as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nama'] ?></td>
                        <td><?= $value['username'] ?></td>
                        <td><?= $value['telpon'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <td><?= $value['level'] ?></td>
                        <td><?= Time::parse($value['terdaftar'])->toLocalizedString('d MMMM yyyy HH:mm:ss') ?></td>
                        <td>
                        <a href="<?= base_url('User/Profil/' . $value['id']) ?>" class="btn btn-primary btn-xs"><i class="fas fa-user-alt"></i> Show</a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
            <tfoot>
                <tr>
                    <th style="width:1px">No</th>
                    <th style="width:2px">Nama</th>
                    <th style="width:3px">Username</th>
                    <th style="width:2px">No Telepon</th>
                    <th style="width:5px">Email</th>
                    <th style="width:2px">Sebagai</th>
                    <th style="width:1px">Terdaftar</th>
                    <th style="width: 10px;">Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>