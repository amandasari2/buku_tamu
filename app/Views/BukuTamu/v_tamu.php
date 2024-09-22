<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Tamu</h3>

        <!-- Tombol Tambah Data -->
        <a href="<?= base_url('Tamu/Input') ?>" class="btn btn-primary float-right">
            <i class="fas fa-plus"></i> Tambah Data Tamu
        </a>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        
        <?php use CodeIgniter\I18n\Time; ?>
        <table id="example1" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="width:1px">No</th>
                    <th style="width:2px">Nama</th>
                    <th style="width:3px">Jenis Kelamin</th>
                    <th style="width:2px">Instansi/Perusahaan</th>
                    <th style="width:5px">No Telepon</th>
                    <th style="width:2px">Alamat</th>
                    <th style="width:1px">Kunjungan/Keperluan</th>
                    <th style="width:1px">Tanggal Kunjungan</th>
                    <th style="width: 10px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($tamu as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nama'] ?></td>
                        <td><?= $value['jenis_kelamin'] ?></td>
                        <td><?= $value['instansi'] ?></td>
                        <td><?= $value['no_telp'] ?></td>
                        <td><?= $value['alamat'] ?></td>
                        <td><?= $value['keperluan'] ?></td>
                        <td><?= Time::parse($value['terdaftar'])->toLocalizedString('d MMMM yyyy HH:mm:ss') ?></td>
                        <td>
                                <a href="<?= base_url('Tamu/EditTamu/' . $value['id']) ?>" class="btn btn-primary btn-xs"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('Tamu/Delete/' . $value['id']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus Data Tamu ?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
            <tfoot>
                <tr>
                    <th style="width:1px">No</th>
                    <th style="width:2px">Nama</th>
                    <th style="width:3px">Jenis Kelamin</th>
                    <th style="width:2px">Instansi/Perusahaan</th>
                    <th style="width:5px">No Telepon</th>
                    <th style="width:2px">Alamat</th>
                    <th style="width:1px">Kunjungan/Keperluan</th>
                    <th style="width:1px">Tanggal Kunjungan</th>
                    <th style="width: 10px;">Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>