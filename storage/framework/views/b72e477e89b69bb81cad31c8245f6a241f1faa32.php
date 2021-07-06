

<?php $__env->startSection('title', 'Aktivitas'); ?>

<?php $__env->startSection('content'); ?>


<div class="container-fluid">
  <div class="row">
        <div class="col-md-10">
          <?php if(session('pesan')): ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Berhasil</h5>
                Data Aktivitas Berhasil Disimpan
            </div>
          <?php endif; ?>
        </div>
  </div>

  <div class="row">
    <div class="col-md-10">
      <!-- AREA CHART -->
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Stok Ikan(dalam satuan ton)</h3>

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
          <div class="chart">
            <canvas id="lineChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

    <div class="row">
      <div class="col-md-5">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Aktivitas Ikan Masuk(dalam satuan ton)</h3>
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
              <div class="chart">
                <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      
      <div class="col-md-5">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Aktivitas Ikan Tejual(dalam satuan ton)</h3>
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
            <div class="chart">
              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
          </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-4">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Masukkan Data</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="POST" action="/aktivitas/insert">
             <?php echo csrf_field(); ?>
            <div class="card-body">
              <div class="form-group">
                <label>Pilih Ikan</label>
                <select class="form-control custom-select" name="id_ikan" :value="old('id_ikan')" required>
                  <option selected disabled>Select one</option>
                  <?php $__currentLoopData = $ikan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($item->id_ikan); ?>"><?php echo e($item->jenis); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
              <div class="form-group">
                <label>Banyak Ikan Masuk</label>
                <input type="text" class="form-control" name="aktivitas_masuk" :value="old('aktivitas_masuk')" required placeholder="dalam ton">
              </div>
              <div class="form-group">
                <label>Banyak Ikan Keluar</label>
                <input type="text" class="form-control" name="aktivitas_keluar" :value="old('aktivitas_keluar')" required placeholder="dalam ton">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Tanggal</label>
                <input type="date"  class="form-control" name="tanggal" :value="old('tanggal')" required >
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
        
    </div>
        <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Aktivitas Dalam Tabel</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Jenis Ikan</th>
                      <th>Ikan Masuk(ton)</th>
                      <th>Ikan Terjual(ton)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $aktivitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e(date('d M Y', strtotime($item->tanggal))); ?></td>
                      <td><?php echo e($item->jenis); ?></td>
                      <td><?php echo e($item->aktivitas_masuk); ?></td>
                      <td><?php echo e($item->aktivitas_keluar); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Total Ikan</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">

                    <div class="input-group-append">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Total Ikan(ton)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $totalIkan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e(date('d M Y', strtotime($item->tanggal))); ?></td>
                      <td><?php echo e($item->total_ikan); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>


       
</div>

  <div class="container-fluid">
    <div class="row">

        
      </div>
  </div>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>



<script>
$(function () {

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = {
      labels  : [
        <?php $__currentLoopData = $aktivitas1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          '<?php echo e($item->tanggal); ?>',
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      ],
      datasets: [
        {
          label               : 'Ikan Emas',
          backgroundColor     : 'rgba(235, 119, 52, 1)',
          borderColor         : 'rgba(235, 119, 52, 1)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
            <?php $__currentLoopData = $aktivitas1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              '<?php echo e($item->aktivitas_masuk); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]
        },
        {
          label               : 'Ikan Nila',
          backgroundColor     : 'rgba(235, 52, 89, 1)',
          borderColor         : 'rgba(235, 52, 89, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
            <?php $__currentLoopData = $aktivitas2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              '<?php echo e($item->aktivitas_masuk); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ]
        },
        {
          label               : 'Ikan Lele',
          backgroundColor     : 'rgba(78, 78, 82, 1)',
          borderColor         : 'rgba(78, 78, 82, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
            <?php $__currentLoopData = $aktivitas3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              '<?php echo e($item->aktivitas_masuk); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ]
        },
        {
          label               : 'Ikan Mujair',
          backgroundColor     : 'rgba(54, 145, 110, 1)',
          borderColor         : 'rgba(54, 145, 110, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
            <?php $__currentLoopData = $aktivitas4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              '<?php echo e($item->aktivitas_masuk); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ]
        },
      ]
    }
    var temp0 = barChartData.datasets[0]
    var temp1 = barChartData.datasets[1]
    var temp2 = barChartData.datasets[2]
    barChartData.datasets[0] = temp0
    barChartData.datasets[1] = temp1
    barChartData.datasets[2] = temp2

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : true,
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

// -----------------------------------------------------------

    var barChartCanvas = $('#barChart2').get(0).getContext('2d')
    var barChartData = {
      labels  : [
        <?php $__currentLoopData = $aktivitas1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          '<?php echo e($item->tanggal); ?>',
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      ],
      datasets: [
        {
          label               : 'Ikan Emas',
          backgroundColor     : 'rgba(235, 119, 52, 1)',
          borderColor         : 'rgba(235, 119, 52, 1)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
            <?php $__currentLoopData = $aktivitas1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              '<?php echo e($item->aktivitas_keluar); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]
        },
        {
          label               : 'Ikan Nila',
          backgroundColor     : 'rgba(235, 52, 89, 1)',
          borderColor         : 'rgba(235, 52, 89, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
            <?php $__currentLoopData = $aktivitas2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              '<?php echo e($item->aktivitas_keluar); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ]
        },
        {
          label               : 'Ikan Lele',
          backgroundColor     : 'rgba(78, 78, 82, 1)',
          borderColor         : 'rgba(78, 78, 82, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
            <?php $__currentLoopData = $aktivitas3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              '<?php echo e($item->aktivitas_keluar); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ]
        },
        {
          label               : 'Ikan Mujair',
          backgroundColor     : 'rgba(54, 145, 110, 1)',
          borderColor         : 'rgba(54, 145, 110, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
            <?php $__currentLoopData = $aktivitas4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              '<?php echo e($item->aktivitas_keluar); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ]
        },
      ]
    }
    var temp0 = barChartData.datasets[0]
    var temp1 = barChartData.datasets[1]
    var temp2 = barChartData.datasets[2]
    barChartData.datasets[0] = temp0
    barChartData.datasets[1] = temp1
    barChartData.datasets[2] = temp2

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })


    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart1').get(0).getContext('2d')
    var lineChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false,
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : true,
          }
        }],
        yAxes: [{
          gridLines : {
            display : true,
          }
        }]
      }
    }

    var lineChartData = {
      labels  : [
            <?php $__currentLoopData = $totalIkan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              '<?php echo e($item->tanggal); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ],
      datasets: [
        {
          label               : 'Total Ikan',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : 3,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
            <?php $__currentLoopData = $totalIkan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              '<?php echo e($item->total_ikan); ?>',
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          ]
        },
      ]
    } 

    lineChartData.datasets[0].fill = false;
    lineChartOptions.datasetFill = false;

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })


})
</script>
  



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.v_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\nambak\resources\views/v_aktivitas.blade.php ENDPATH**/ ?>