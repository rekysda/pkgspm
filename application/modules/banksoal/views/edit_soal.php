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
        <div class="row">
          <div class="col-md-12">
            <form action="" method="post">
            <div class="form-group">
            <label for="name">Kategori*</label>
            <select name="kategori_id" id="kategori_id" class="form-control <?= form_error('kategori_id') ? 'is-invalid' : '' ?>">
              <option value="">== Kategori ==</option>
              <?php foreach ($kategori as $k) : ?>
                <option value="<?= $k['id']; ?>" <?= $k['id'] == $get_soal['kategori_id'] ? ' selected="selected"' : ''; ?>><?= $k['kategori']; ?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('kategori_id') ?>
            </div>
          </div>

              <div class="form-group <?php echo form_error('soal') ? 'has-error' : '' ?>">
                <label for="name">Soal*</label>
                <input class="form-control" type="text" name="soal" value="<?= $get_soal['soal']; ?>" />
                <?= form_error('soal', '<span class="help-block">', '</small>'); ?>
              </div>  
           
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('banksoal/soal'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <br><br>
          <div class="col-md-12">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped"id="example1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kategori</th>
                    <th width="60%">Soal</th>
                    <th width="10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($soal as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['kategori']; ?></td>                    
                      <td><?= $dt['soal']; ?></td>                    
                      <td>
                        <a href="<?= base_url('banksoal/edit_soal/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('banksoal/hapus_soal/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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