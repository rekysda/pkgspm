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
        <?php $category_ids = $getpost['category_id']; ?>
        <form action="<?php base_url('post/') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Title*</label>
            <input class="form-control <?php echo form_error('title') ? 'is-invalid' : '' ?>" type="text" name="title" value="<?= $getpost['title']; ?>" />
            <div class="invalid-feedback">
              <?= form_error('title') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="name">Categories*</label>
            <select name="category_id" id="category_id" class="form-control <?= form_error('category_id') ? 'is-invalid' : '' ?>">
              <option value="">== Category ==</option>
              <?php foreach ($parent as $pr) : ?>
                <option value="<?= $pr['id']; ?>" disabled><?= $pr['name']; ?></option>
                <?php foreach ($post_cat as $cat) : ?>
                  <?php if ($cat['parent_id'] == $pr['id']) { ?>
                    <option value="<?= $cat['id']; ?>" <?= $cat['id'] == $category_ids ? ' selected="selected"' : ''; ?>> - <?= $cat['name']; ?></option>
                  <?php } ?>
                <?php endforeach; ?>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('category_id') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="name">Content*</label>
            <textarea name="content" id="id_textarea" cols="30" rows="10"><?= $getpost['content']; ?></textarea>
            <div class="invalid-feedback">
              <?php echo form_error('content') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="content">Images</label>
            <input type="file" class="custom-file-input" id="image" name="image">
          </div>
          <div class="form-group">
            <label for="name">Old Images</label><br>
            <img src="<?= base_url('/assets/images/post/original/') . $getpost['image']; ?> " class="img-thumbnail" width="100">
          </div>

          <div class="form-group">
            <div class="checkbox">
              <label>
                <input class="form-check-input" type="checkbox" value="1" name="is_publish" id="is_publish" <?= $getpost['is_publish'] == '1' ? 'checked' : ''; ?>> Publish?
              </label>
            </div>
          </div>
          <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>" />
          <input class="btn btn-success" type="submit" name="btn" value="Save" />&nbsp; <a href="<?= base_url('post'); ?> " class="btn btn-warning">Cancel</a>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->