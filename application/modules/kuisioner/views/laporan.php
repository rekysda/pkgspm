<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title; ?>
      <small>to manage <?= $title; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">


    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">List <?= $title ?>, Tahun : <?= $tahunpenilaian ?>, Bulan : <?= $bulanpenilaian ?></h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Guru</th>
                <th scope="col">Penilaian%</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($listuser as $dt) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $dt['name']; ?></td>
                  <td>

                  <?php 
                  $jumlahjawaban=get_jumlahnilaiguru($dt['id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahsoal=get_jumlahsoalguru($dt['id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahmaksnilai=$jumlahsoal*4;
                  $penilaian = round(($jumlahjawaban/$jumlahmaksnilai)*100);
                  ?>
                  <?= ($penilaian) ?>
                  </td>
                  <td><a href='<?= base_url('kuisioner/detail/'.$dt['id']) ?>' class='btn btn-success'>Detail</a></td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
          <a href="<?= base_url('kuisioner/cetaklaporan')?>"target="new"class="btn btn-primary">Cetak</a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->