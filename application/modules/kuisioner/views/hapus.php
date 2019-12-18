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
        <h3 class="box-title">List Penilaian, Tahun : <?= $tahunpenilaian ?>, Bulan : <?= $bulanpenilaian ?></h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Guru</th>
                <th scope="col">Nilai</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($listuser as $dt) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $dt['name']; ?></td>
                  <?php 
                  $jumlahjawaban=get_jumlahnilaiguru($dt['id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahsoal=get_jumlahsoalguru($dt['id'],$tahunpenilaian,$bulanpenilaian);
                  $jumlahmaksnilai=$jumlahsoal*4;
                  $penilaian = round(($jumlahjawaban/$jumlahmaksnilai)*100);
                  ?>
                  <td>
                  <?= ($penilaian) ?>
                  </td>
                  <td>
                  <?php if($penilaian>'0'){?>
                    <a href="<?= base_url('kuisioner/hapus_nilai/') . $dt['id']; ?>" class="btn btn-danger btn-xs"onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Hapus</a>&nbsp;&nbsp;
                    <a href="<?= base_url('kuisioner/detailuser_nilai/') . $dt['id']; ?>" class="btn btn-warning btn-xs">DetailUser</a>
                  <?php } ?>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->