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
        <h3 class="box-title">Tujuan : <?= $namagurutujuan;?>, Tahun : <?= $tahunpenilaian ?>, Bulan : <?= getbulanindo($bulanpenilaian) ?></h3>
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
                <th scope="col">Jawaban</th>
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
                  <input type="hidden" name="kategori_id[]" value="<?= $dt['kategori_id'] ?>">
                  <input type="hidden" name="soal_id[]" value="<?= $dt['id'] ?>">
                        <select name='jawaban[]' class='form-control'>
                          <?php $stats = array('','Kurang', 'Sedang', 'Baik', 'BaikSekali');
                                for ($n = 1; $n <= 4; $n++) {
                                    echo "<option value='$n'>$stats[$n]</option>";
                                  }
                                
                                ?>
                        </select>
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
                <a href="<?= base_url('kuisioner/penilaian')?>" class="btn btn-warning">Kembali</a>
                &nbsp;&nbsp;<input type="submit" value="Simpan" name="submit" class="btn btn-success"></td>
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