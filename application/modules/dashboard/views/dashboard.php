<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title; ?>
      <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Guru</span>
            <span class="info-box-number"><?= $jumlahguru?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-fw fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Siswa</span>
            <span class="info-box-number"><?= $jumlahsiswa?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>



      <!-- /.col -->
    </div>
    <!-- /.row -->
 <!-- /.box -->
             <!-- BAR CHART -->
             <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Bar Chart</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>

          </div>

          <!-- BAR CHART -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
 
<script src="<?php echo base_url().'assets/vendors/morris/js/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/morris/js/raphael-min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/morris/js/morris.min.js'?>"></script>
    <script>
        Morris.Bar({
          element: 'graph',
          data: <?php echo $dataaccount;?>,
          xkey: 'year',
          ykeys: ['purchase', 'sale', 'profit'],
          labels: ['Purchase', 'Sale', 'Profit']
        });
        Morris.Donut({
          element: 'donuts',
          data: <?php echo $dataaccount2;?>
        });
    </script>