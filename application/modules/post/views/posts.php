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
        <h3 class="box-title">All Posts</h3>
        <div class="box-tools">
          <a href="<?= base_url('post/add_post'); ?>" class="btn btn-primary btn-sm">
            Add New Post
          </a>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-hover" id="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Publish</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($posts as $po) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><img src="<?= base_url('./assets/images/post/original/') . $po['image']; ?> " class="direct-chat-img"></td>
                  <td><a href="<?= base_url('post/editPost/' . $po['id']); ?>" class="text-info"><?= $po['title']; ?></a></td>
                  <td><?= $po['category']; ?></td>
                  <td><?= $po['slug']; ?></td>
                  <td><?= $po['is_publish'] == 1 ? '<strong class="text-success">Yes</strong>' : '<strong class="text-danger">No</strong>' ?></td>
                  <td>
                    <a href="<?= base_url('post/editPost/' . $po['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a href="<?= base_url('post/hapusPost/' . $po['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->