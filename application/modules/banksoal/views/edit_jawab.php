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
          <div class="col-md-4">
            <form action="" method="post">
              <div class="form-group <?php echo form_error('jawab') ? 'has-error' : '' ?>">
                <label for="name">Jawab*</label>
                <input class="form-control" type="text" name="jawab" value="<?= $get_jawab['jawab']; ?>"/>
                <?= form_error('jawab', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('skor') ? 'has-error' : '' ?>">
                <label for="name">Skor*</label>
                <input class="form-control" type="number" name="skor" value="<?= $get_jawab['skor']; ?>"/>
                <?= form_error('skor', '<span class="help-block">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('banksoal/jawab'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
            <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Jawab</th>
                    <th>Skor</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($jawab as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                    <td><?= $dt['jawab']; ?></td>                    
                    <td><?= $dt['skor']; ?></td>                    
                      <td>
                        <a href="<?= base_url('banksoal/edit_jawab/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('banksoal/hapus_jawab/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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