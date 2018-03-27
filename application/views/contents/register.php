<div class="register-box-body">
  <p class="login-box-msg">Register a new membership</p>

  <form action="<?php echo base_url() ?>auth/registerdata" method="post" onsubmit="validasi()">
    <div class="form-group has-feedback">
      <input type="text" class="form-control" placeholder="Full name" name ="name">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="text" class="form-control" placeholder="Username" name ="username">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="hidden" class="form-control" placeholder="role" name ="role" value="1" >
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="email" class="form-control" placeholder="Email" name="email">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="Password" name="password" id="pass1">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="Retype password" name="pass" id="pass2">
      <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
    </div>
    <div class="row">
      <div class="col-xs-8">
        <div class="checkbox icheck">
          <label>
            <input type="checkbox"> I agree to the <a href="#">terms</a>
          </label>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  <div class="social-auth-links text-center">
    <p>- OR -</p>
    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
      Facebook</a>
    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
      Google+</a>
  </div>

  <a href="login.html" class="text-center">I already have a membership</a>
</div>
<script type="text/javascript">
    function validasi(){
      var pass1 = document.getElementById("pass1").value;
  		var pass2 = document.getElementById("pass2").value;
      if (pass1 == pass2){
        return true;
      }else{
        alert('Repassword harus sama dengan Password !');
      }
    }
</script>
<!-- /.form-box -->
