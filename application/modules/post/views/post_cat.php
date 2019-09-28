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
        <h3 class="box-title">Categories</h3>
        <div class="box-tools">
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-new-category">
            Add New Category
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-hover" id="dataTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Slug</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($parent as $pr) : ?>
                <tr>
                  <th><?= $i; ?></th>
                  <td><?= $pr['name']; ?></td>
                  <td><?= $pr['description']; ?></td>
                  <td><?= $pr['slug']; ?></td>
                  <td>
                    <a href="<?= base_url('post/editPostCat/' . $pr['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a href="<?= base_url('post/hapusPostCat/' . $pr['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
                  </td>
                </tr>
                <?php $i++; ?>
                <?php foreach ($post_cat as $pc) : ?>
                  <?php if ($pc['parent_id'] == $pr['id']) { ?>
                    <tr>
                      <th></th>
                      <td><?= $pc['name']; ?></td>
                      <td><?= $pc['description']; ?></td>
                      <td><?= $pc['slug']; ?></td>
                      <td>
                        <a href="<?= base_url('post/editPostCat/' . $pc['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('post/hapusPostCat/' . $pc['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                <?php endforeach; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <div class="modal fade" id="modal-new-category">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Add New Category</h4>
            </div>
            <div class="modal-body">

              <form action="<?php base_url('post/postcategories') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" value="<?= set_value('name'); ?>" placeholder="Name">
                  <div class="invalid-feedback">
                    <?= form_error('name') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="parent_id">Parent</label>
                  <select name="parent_id" id="parent_id" class="form-control <?= form_error('parent_id') ? 'is-invalid' : '' ?>">
                    <option value="0">None</option>
                    <?php foreach ($parent as $pr) : ?>
                      <option value="<?= $pr['id']; ?>"><?= $pr['name']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" class="form-control <?php echo form_error('description') ? 'is-invalid' : '' ?>" rows="3" placeholder="Description"><?= set_value('description'); ?></textarea>
                  <div class="invalid-feedback">
                    <?= form_error('description') ?>
                  </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->