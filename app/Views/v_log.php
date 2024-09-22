<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Log</h3>

        <!-- Tombol Tambah Data -->
        <!--  -->
    </div>

    <!-- /.card-header -->
    <div class="card-body">

        <?php

        use CodeIgniter\I18n\Time; ?>
        <table id="example1" class="table table-bordered table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="width:1px">No</th>
                    <th style="width:2px">Nama User</th>
                    <th style="width:3px">Ip Address</th>
                    <th style="width:2px">Device</th>
                    <th style="width:5px">Sebagai</th>
                    <th style="width:2px">Status</th>
                    <th style="width:1px">Terdaftar</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($log as $key => $value): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nama'] ?></td>
                        <td><?= $value['ipAddress'] ?></td>
                        <td><?= $value['device'] ?></td>
                        <td><?= $value['level'] ?></td>
                        <td>
                            <?php if ($value['status'] == 'Login'): ?>
                                <div class="label label-success"><?= $value['status'] ?></div>
                            <?php else: ?>
                                <div class="label label-danger"><?= $value['status'] ?></div>
                            <?php endif; ?>
                        </td>
                        <td><?= Time::parse($value['terdaftar'])->toLocalizedString('d MMMM yyyy HH:mm:ss') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th style="width:1px">No</th>
                    <th style="width:2px">Nama User</th>
                    <th style="width:3px">Ip Address</th>
                    <th style="width:2px">Device</th>
                    <th style="width:5px">Sebagai</th>
                    <th style="width:2px">Status</th>
                    <th style="width:1px">Terdaftar</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>