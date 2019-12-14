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
        <h3 class="box-title">Guru : <?= $namagurutujuan;?></h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
        <table class="table table-hover">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Kategori</th>
                <?php foreach ($list_role as $dtr) : ?>
                  <th scope="col">
                  <?= $dtr['role'] ?></th>
                  <?php endforeach; ?>
                <th scope="col">Penilaian</th>
              </tr>
              <?php $i = 1; ?>
              <?php foreach ($listkategori as $dt) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $dt['kategori']; ?></td>
                  <?php foreach ($list_role as $dtr) : ?>
                    <?php
                  $jumlahjawabanrole=get_jumlahnilaiguru_role($dt['user_tujuan'],$dt['kategori_id'],$dtr['id']);
                  $jumlahsoalrole=get_jumlahsoalguru_role($dt['user_tujuan'],$dt['kategori_id'],$dtr['id']);
                  $jumlahmaksnilairole=$jumlahsoalrole*4;
                   $penilaianrole = round(($jumlahjawabanrole/$jumlahmaksnilairole)*100);
                   
                  ?>
                  <th scope="col"><?= $penilaianrole ?></th>
                  <?php endforeach; ?>
                  <td>
                  <?php 
                   $jumlahjawaban=get_jumlahnilaiguru_det($dt['user_tujuan'],$dt['kategori_id']);
                   $jumlahsoal=get_jumlahsoalguru_det($dt['user_tujuan'],$dt['kategori_id']);
                   $jumlahmaksnilai=$jumlahsoal*4;
                   $penilaian = round(($jumlahjawaban/$jumlahmaksnilai)*100);
                   $total +=$penilaian;
                  ?>
                  <?= ($penilaian) ?>
                  </td>
                  </tr>
                  <?php $rata= round($total/$i); ?>
                  <?php $i++; ?>
              <?php endforeach; ?>
              <tr>
              <?php foreach ($list_role as $dtr) : ?>
                  <td scope="col"></td>
                  <?php endforeach; ?>  
              <td colspan="2"align="right"><b>Rata</b></td><td><b><?= $rata; ?></b></td></tr>
    </table>
    <a href="<?= base_url('kuisioner/laporan')?>"target="new"class="btn btn-success">Kembali</a>&nbsp;&nbsp;
    <a href="<?= base_url('kuisioner/cetaklaporandetail/'.$dt['user_tujuan'])?>"target="new"class="btn btn-primary">Cetak</a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->