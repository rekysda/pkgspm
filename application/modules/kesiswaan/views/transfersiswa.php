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

  <?= $this->session->flashdata('message') ?>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">
      <div class="col-md-6">
        <div class="table-responsive">
          <table class="display" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>No.Form</th>
                <th>Nama</th>
                <th>HP</th>
                <th>SekolahAsal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($calonsiswa as $dt) : ?>
                <tr>
                  <th><?= $i; ?></th>
                  <td><?= $dt['noformulir']; ?></td>
                  <td><?= $dt['namasiswa']; ?></td>
                  <td><?= $dt['hpsiswa']; ?></td>
                  <td><?= $dt['sekolahasal']; ?></td>
                  <td>
                  <a href="<?= base_url('kesiswaan/transfersiswaok/'.$dt['noformulir']) ?>"class="btn btn-success">Transfer</a>
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
      <div class="col-md-6">
        <div class="table-responsive">
          <table class="display" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>No.Form</th>
                <th>Nama</th>
                <th>HP</th>
                <th>SekolahAsal</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($siswa as $dt) : ?>
                <tr>
                  <th><?= $i; ?></th>
                  <td><?= $dt['noformulir']; ?></td>
                  <td><?= $dt['namasiswa']; ?></td>
                  <td><?= $dt['hpsiswa']; ?></td>
                  <td><?= $dt['sekolahasal']; ?></td>

                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->