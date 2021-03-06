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
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group <?php echo form_error('kategori') ? 'has-error' : '' ?>">
                <label for="name">Kategori</label>
                <input class="form-control" type="text" name="kategori" value="<?= $get_kategori['kategori']; ?>"/>
                <?= form_error('kategori', '<span class="help-block">', '</small>'); ?>
              </div>

          <div class="form-group">
          <label for="name">Photo</label><br>
          <?php if($get_kategori['image']){ ?>
          <img src="<?= base_url('assets/images/banksoal/') . $get_kategori['image']; ?> " class="img-thumbnail">
          <?php } ?>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="file" class="custom-file-input" id="image" name="image">
            </div>
          </div>
          
          <br><br>
          <input class="form-control" type="hidden" name="old_image" value="<?= $get_kategori['image']; ?>"/>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('banksoal/kategori'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
            <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kategori</th>
                    <th>Gambar</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($kategori as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                    <td><?= $dt['kategori']; ?></td>                    
                    <td><img src="<?= base_url('assets/images/banksoal/') . $dt['image']; ?> " class="img-thumbnail"width="50"></td>                    
                      <td>
                        <a href="<?= base_url('banksoal/edit_kategori/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('banksoal/hapus_kategori/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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