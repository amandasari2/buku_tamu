<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $totalTamu; ?></h3>
                <p>Total Tamu</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="<?= base_url('Tamu/') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $totalLakiLaki; ?></h3>
                <p>Total Laki-Laki</p>
            </div>
            <div class="icon">
                <i class="ion ion-man"></i>
            </div>
            <a href="<?= base_url('Tamu/') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $totalPerempuan; ?></h3>
                <p>Total Perempuan</p>
            </div>
            <div class="icon">
                <i class="ion ion-woman"></i>
            </div>
            <a href="<?= base_url('Tamu/') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $totalUser; ?></h3>
                <p>Total Administrator</p>
            </div>
            <div class="icon">
                <i class="far fa-user"></i>
            </div>
            <a href="<?= base_url('User/') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Grafik Kunjungan Tamu <?= date('Y')?></h3>
                <a href="javascript:void(0);">View Report</a>
            </div>
        </div>
        <div class="card-body">
            <div class="position-relative mb-4">
                <canvas id="tamuChart" height="200"></canvas>
            </div>

            <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Tahun <?= date('Y')?>
                </span>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('tamuChart').getContext('2d');
    var tamuChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Jumlah Tamu',
                data: <?= $tamuPerBulan ?>, // Data dari controller
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
