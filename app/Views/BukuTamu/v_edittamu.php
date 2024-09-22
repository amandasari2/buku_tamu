<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title"><?= $judul ?></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <?= form_open_multipart('Tamu/UpdateData/' . $tamu['id']) ?>

        <div class="form-group row">
            <label for="nama" class="col-4 col-form-label">Nama Tamu</label>
            <div class="col-8">
                <input id="nama" name="nama" placeholder="Masukan Nama Anda" type="text" class="form-control" value="<?= set_value('nama', $tamu['nama']) ?>">
                <p class="text-danger"><?= $validation->getError('nama') ?></p>
            </div>
        </div>
        <div class="form-group row">
            <label for="jenis_kelamin" class="col-4 col-form-label">Jenis Kelamin</label>
            <div class="col-8">
                <select id="jenis_kelamin" name="jenis_kelamin" class="custom-select">
                    <option value="">-- Pilih Jenis Kelamin Anda --</option>
                    <option value="Laki - Laki" <?= set_select('jenis_kelamin', 'Laki - Laki', $tamu['jenis_kelamin'] == 'Laki - Laki') ?>>Laki - Laki</option>
                    <option value="Perempuan" <?= set_select('jenis_kelamin', 'Perempuan', $tamu['jenis_kelamin'] == 'Perempuan') ?>>Perempuan</option>
                </select>
                <p class="text-danger"><?= $validation->getError('jenis_kelamin') ?></p>
            </div>
        </div>
        <div class="form-group row">
            <label for="instansi" class="col-4 col-form-label">Instansi/Perusahaan</label>
            <div class="col-8">
                <input id="instansi" name="instansi" placeholder="Masukan Instansi/Perusahaan Anda" type="text" class="form-control" value="<?= set_value('instansi', $tamu['instansi']) ?>">
                <p class="text-danger"><?= $validation->getError('instansi') ?></p>
            </div>
        </div>
        <div class="form-group row">
            <label for="no_telp" class="col-4 col-form-label">Nomor Telepon</label>
            <div class="col-8">
                <input id="no_telp" name="no_telp" placeholder="Masukan Nomor Telepon Anda" type="number" class="form-control" value="<?= set_value('no_telp', $tamu['no_telp']) ?>">
                <p class="text-danger"><?= $validation->getError('no_telp') ?></p>
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-4 col-form-label">Alamat</label>
            <div class="col-8">
                <input id="alamat" name="alamat" placeholder="Masukan Alamat Anda" type="text" class="form-control" value="<?= set_value('alamat', $tamu['alamat']) ?>">
                <p class="text-danger"><?= $validation->getError('alamat') ?></p>
            </div>
        </div>
        <div class="form-group row">
            <label for="keperluan" class="col-4 col-form-label">Kunjungan/Keperluan</label>
            <div class="col-8">
                <textarea id="keperluan" name="keperluan" cols="40" rows="5" class="form-control"><?= set_value('keperluan', $tamu['keperluan']) ?></textarea>
                <p class="text-danger"><?= $validation->getError('keperluan') ?></p>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('Tamu') ?>" class="btn btn-success btn-flat">Kembali</a>
            </div>
        </div>

        <?= form_close() ?>
    </div>
</div>