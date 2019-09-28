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
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">

        <?= $this->session->flashdata('message') ?>
        <?php $parent_id = $getpostcat['parent_id']; ?>

        <form action="<?php base_url('post/editPostCat') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="parent_id">Parent*</label>
            <select name="parent_id" id="parent_id" class="form-control <?= form_error('parent_id') ? 'is-invalid' : '' ?>">
              <option value="0">== Master ==</option>
              <?php foreach ($parent as $pr) : ?>
                <option value="<?= $pr['id']; ?>" <?= $pr['id'] == $parent_id ? ' selected="selected"' : ''; ?>><?= $pr['name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Name*</label>
            <input class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" value="<?= $getpostcat['name']; ?>" />
            <div class="invalid-feedback">
              <?= form_error('name') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input class="form-control <?php echo form_error('description') ? 'is-invalid' : '' ?>" type="text" name="description" value="<?= $getpostcat['description']; ?>" />
            <div class="invalid-feedback">
              <?= form_error('description') ?>
            </div>
          </div>
          <input class="btn btn-success" type="submit" name="btn" value="Save" />&nbsp; <a href="<?= base_url('post/postcategories'); ?> " class="btn btn-warning">Cancel</a>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->