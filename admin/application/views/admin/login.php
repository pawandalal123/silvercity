<?php 
$data = ['simple' => true, 'add_body_class' => 'login-page', 'title' => 'Login'];
$this->load->view('admin/parts/header', $data); ?>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Silverspoon</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?=base_url('login/do');?>" method="post" id="login">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email or username" name="USERNAME">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="PASSWORD">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember_me"> Remember Me
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!--<div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>-->
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br> -->
    <!--<a href="<?=base_url('register');?>" class="text-center">Register a new membership</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php 
$data = ['add' => '<!-- iCheck -->
<script src="'.asset_url('plugins/iCheck/icheck.min.js').'"></script>
<script>
  $(function () {
    $(\'input\').iCheck({
      checkboxClass: \'icheckbox_square-blue\',
      radioClass: \'iradio_square-blue\',
      increaseArea: \'20%\' // optional
    });

    $("#login").submit(function() {
      var $this = $(this);
      $.ajax({
        url: "'.base_url('login/do').'",
        data: $(this).serialize(),
        type: "post",
        dataType: "json",
        beforeSend: function() {
          $this.find(":input").attr("disabled", true);
        },
        complete: function() {
          $this.find(":input").attr("disabled", false);
        },
        error: function(xhr, statusText) {
          console.log(statusText)
        },
        success: function(data) {
          if(data.success == true) {
            document.location = "'.base_url('ourstory').'";
          }else{
            alert("Username or password incorrect.")
          }
        }
      })
      return false;
    });
  });
</script>'];
$this->load->view('admin/parts/footer', $data); ?>