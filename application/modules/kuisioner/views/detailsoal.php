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
      <table>
      <tr><td><img src="<?= base_url('assets/images/profile/'.$imagegurutujuan) ?>"height="100px"></td>
      <td>&nbsp;&nbsp;</td>
      <td valign="top">        <h3 class="box-title">
        Tujuan : <?= $namagurutujuan;?><br>
        Tahun : <?= $tahunpenilaian ?><br>
        Bulan : <?= getbulanindo($bulanpenilaian) ?>
        </h3></td></tr>
      </table>       
      </div>
      <div class="box-body">
        <div class="table-responsive">
        <form method="post" action="<?= base_url('kuisioner/penilaian_addjawaban') ?>">
        <input type="hidden" name="user_asal" value="<?= $user_asal ?>">
        <input type="hidden" name="user_tujuan" value="<?= $user_tujuan ?>">
          <table class="table table-hover">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Pertanyaan</th>
                <th scope="col">Nilai</th>
              </tr>
              <?php foreach ($listkategori as $dtk) : ?>
              <?php $i = 1; ?>
              <tr>
                  <td colspan='2'><b><?= $dtk['kategori'] ?></b></td>
                  <td>
                  </td>
                </tr>
              <?php foreach ($listquestion as $dt) : ?>
                <?php if($dtk['id']==$dt['kategori_id']){ ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $dt['soal']; ?></td>
                  <td>
                  <?php
                  $soal_id=$dt['id'];
                  ?>
                  <?=
                  get_jumlahnilai_usertujuan($soal_id,$user_tujuan,$tahunpenilaian,$bulanpenilaian);
                  ?>
                  </td>
                </tr>
                <?php } ?>
                <?php $i++; ?>
              <?php endforeach; ?>
              <?php endforeach; ?>
              <tr>
                <td colspan="3"align="right">
                <input type="hidden" name="role_id" value="<?= $role_id ?>">
                <input type="hidden" name="tahunpenilaian" value="<?= $tahunpenilaian ?>">
                <input type="hidden" name="bulanpenilaian" value="<?= $bulanpenilaian ?>">
                <a href="<?= base_url('kuisioner/laporan')?>" class="btn btn-warning">Kembali</a></td>
                    </tr>
                  </tbody>
                </table>
              </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->