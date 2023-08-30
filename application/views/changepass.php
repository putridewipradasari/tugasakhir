<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">


</html>
<title>Admin | Log in</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href=<?php echo base_url('assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>>
<!-- Font Awesome -->
<link rel="stylesheet" href=<?php echo base_url('assets/admin/bower_components/font-awesome/css/font-awesome.min.css'); ?>>
<!-- Ionicons -->
<link rel="stylesheet" href=<?php echo base_url('assets/admin/bower_components/Ionicons/css/ionicons.min.css'); ?>>
<!-- Theme style -->
<link rel="stylesheet" href=<?php echo base_url('assets/admin/dist/css/AdminLTE.min.css'); ?>>
<!-- iCheck -->
<link rel="stylesheet" href=<?php echo base_url('assets/admin/plugins/iCheck/square/blue.css'); ?>>

</head>
<style>
  body {
    /* background-color: lightblue; */
    background-image: url(<?php echo base_url('assets/bg.jpg'); ?>);
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>

<body class="hold-transition ">

  <div class="login-box">
    <!-- <div class="login-logo">
        <a href="<?php echo base_url(); ?>assets/index2.html"><b>LOGIN</b> APLIKASI</a>
      </div> -->

    <!-- /.login-logo -->

    <div class="box box-default collapsed-box box-solid">
      <div class="box-header with-border ">
        <span>
          <center>APLIKASI v1.0</center>
        </span>
      </div>

      <div class="login-box-body">
        <p class="login-box-msg">
          <img src="<?php echo base_url('assets/damri.png'); ?>" width='200' height='35'>
          <br>
          <span>Change your password</span>
        <h5 class="text-center"><?= $this->session->userdata('reset_email'); ?></h5>
        </p>

        <form action="<?php echo base_url('Auth/changepassword'); ?>" method="post">

          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder=" New Password" name="password1" id="password1">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <!-- <input type="checkbox" class="form-checkbox"> Show password -->
            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder=" Repeat Password" name="password2" id="password2">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
            <input type="checkbox" class="form-checkbox"> Show password
          </div>
          <div class="form-group has-feedback">
            <button type="submit" class="btn btn-block btn-info btn-lg">Change Password</button>
          </div>
          <div class="text-center">
            <a href="<?= base_url('auth') ?>"> Login</a>
          </div>
          <div class="login-box-msg">
            <span>Copyright © 2021 </span>
          </div>
          <!-- <div class="row">
           <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div>>
          <div class="col-xs-offset-8 col-xs-4">
            <button type="submit" class="btn btn-block btn-info btn-lg">Sign In</button>
          </div>
        </div> -->
        </form>
      </div>
    </div>
    <!-- /.login-box-body -->
    <?php
    echo show_err_msg($this->session->flashdata('error_msg'));
    ?>
  </div>


  <!-- /.login-box -->
  <!-- jQuery 3 -->
  <script src=<?php echo base_url('assets/admin/bower_components/jquery/dist/jquery.min.js'); ?>></script>
  <!-- Bootstrap 3.3.7 -->
  <script src=<?php echo base_url('assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>></script>
  <!-- iCheck -->
  <script src=<?php echo base_url('assets/admin/plugins/iCheck/icheck.min.js'); ?>></script>
  <script>
    $(function() {
      $(document).ready(function() {
        $('.form-checkbox').click(function() {
          if ($(this).is(':checked')) {
            $('#password1').attr('type', 'text');
            $('#password2').attr('type', 'text');
          } else {
            $('#password1').attr('type', 'password');
            $('#password2').attr('type', 'password');
          }
        });
      });
    });
  </script>
</body>

</html>