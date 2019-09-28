<!-- Login Baru -->
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>"><b>Welcome</b> Back!</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?= $this->session->flashdata('message'); ?>

    <form class="user" method="post" action="<?= base_url('auth'); ?>">
      <div class="form-group has-feedback <?= form_error('email') ? 'has-error' : '' ?>">
        <input type="email" name="email" value="<?= set_value('email'); ?>" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('email', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('password') ? 'has-error' : '' ?>">
        <input type="password" name="password" value="<?= set_value('password'); ?>" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
        
            <a href="<?= base_url('auth/forgotPassword'); ?>">Forgot Password?</a><br>
        
       
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->