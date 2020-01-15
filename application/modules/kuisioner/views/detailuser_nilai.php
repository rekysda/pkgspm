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
        <h3 class="box-title">List Penilaian , Tahun : <?= $tahunpenilaian ?>, Bulan : <?= getbulanindo($bulanpenilaian) ?></h3>
      </div>
      <div class="box-body">
      <div class="col-lg-2">
<img src="<?= base_url('./assets/images/profile/'.$imagegurutujuan) ?>"height="150px">
</div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Guru Penilai</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($listuserpenilai as $dt) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $dt['name']; ?></td>

                  <td>
                    <a href="<?= base_url('kuisioner/hapus_nilaiuser/') . $dt['user_asal'].'/'.$dt['user_tujuan']; ?>" class="btn btn-danger btn-xs"onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Hapus</a>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
          <a href="<?= base_url('kuisioner/hapus/')?>"class="btn btn-success">Kembali</a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->