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
      <?php $nomor= generatekodeinc4('surat_masuk',$tahunskrg,'nomor');?>
        <div class="row">
          <div class="col-md-4">
            <form action="" method="post">
              <div class="form-group <?php echo form_error('tahun') ? 'has-error' : '' ?>">
                <label for="name">Tahun</label>
                <input class="form-control" type="text" name="tahun" value="<?= set_value('tahun', isset($tahun) ? $tahun : $tahunskrg); ?>" />
                <?= form_error('tahun', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('nomor') ? 'has-error' : '' ?>">
                <label for="name">Nomor</label>
                <input class="form-control" type="text" name="nomor" value="<?= set_value('nomor', isset($nomor) ? $nomor : ''); ?>" />
                <?= form_error('nomor', '<span class="help-block">', '</small>'); ?>
              </div>        
              <div class="form-group <?php echo form_error('pengirim') ? 'has-error' : '' ?>">
                <label for="name">Pengirim</label>
                <input class="form-control" type="text" name="pengirim" value="<?= set_value('pengirim', isset($pengirim) ? $pengirim : ''); ?>" />
                <?= form_error('pengirim', '<span class="help-block">', '</small>'); ?>
              </div>  
              <div class="form-group <?php echo form_error('alamat_pengirim') ? 'has-error' : '' ?>">
                <label for="name">Alamat Pengirim</label>
                <input class="form-control" type="text" name="alamat_pengirim" value="<?= set_value('alamat_pengirim', isset($alamat_pengirim) ? $alamat_pengirim : ''); ?>" />
                <?= form_error('alamat_pengirim', '<span class="help-block">', '</small>'); ?>
              </div>  
              <div class="form-group <?php echo form_error('tanggal_masuk') ? 'has-error' : '' ?>">
                <label for="name">Tanggal Masuk</label>
                <input class="form-control" type="text" id="tanggal_masuk" name="tanggal_masuk" value="<?= set_value('tanggal_masuk', isset($tanggal_masuk) ? $tanggal_masuk : $tanggalskrg); ?>" />
                <?= form_error('tanggal_masuk', '<span class="help-block">', '</small>'); ?>
              </div>  
              <div class="form-group <?php echo form_error('nomor_surat') ? 'has-error' : '' ?>">
                <label for="name">Nomor Surat</label>
                <input class="form-control" type="text" name="nomor_surat" value="<?= set_value('nomor_surat', isset($nomor_surat) ? $nomor_surat : ''); ?>" />
                <?= form_error('nomor_surat', '<span class="help-block">', '</small>'); ?>
              </div>  
              <div class="form-group <?php echo form_error('perihal') ? 'has-error' : '' ?>">
                <label for="name">Perihal</label>
                <input class="form-control" type="text" name="perihal" value="<?= set_value('perihal', isset($perihal) ? $perihal : ''); ?>" />
                <?= form_error('perihal', '<span class="help-block">', '</small>'); ?>
              </div>    
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('surat/surat_masuk'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tahun</th>
                    <th>Nomor</th>
                    <th>Pengirim</th>
                    <th>Alamat</th>
                    <th>Tanggal</th>
                    <th>Nomor</th>
                    <th>Perihal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($surat_masuk as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['tahun']; ?></td>
                      <td><?= $dt['nomor']; ?></td>
                      <td><?= $dt['pengirim']; ?></td>
                      <td><?= $dt['alamat_pengirim']; ?></td>
                      <td><?= $dt['tanggal_masuk']; ?></td>
                      <td><?= $dt['nomor_surat']; ?></td>
                      <td><?= $dt['perihal']; ?></td>
                      <td>
                        <a href="<?= base_url('surat/edit_surat_masuk/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('surat/hapus_surat_masuk/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
                      </td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->