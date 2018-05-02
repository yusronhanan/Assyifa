 		<link href="<?php echo base_url() ?>assets/css/login.min.css" rel="stylesheet">
		<link href="<?php echo base_url() ?>assets/css/login.css" rel="stylesheet">



<!-- Page Header -->
    <header class="masthead" style="height: 20%;background-image: url('<?php echo base_url() ?>assets/img/header_login.png')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <!-- <h1>Bertanyalah</h1> -->
              <!-- <span class="subheading">Malu bertanya, sesat di jalan.</span> -->
            </div>
          </div>
        </div>
      </div>
    </header>
<div class="container">
    

    <div class="omb_login">
    	<h3 class="omb_authTitle">Set your password</h3>
		
		<div class="row omb_row-sm-offset-3 omb_loginOr">
			<div class="col-xs-12 col-sm-6">
				<hr class="omb_hrOr">
				<span class="omb_spanOr">or</span>
			</div>
		</div>

		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">
				<form class="omb_loginForm" action="<?php echo base_url() ?>user_authentication/pass_need_in" autocomplete="off" method="POST">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<br>
					<span class="help-block"></span>
										
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="repassword" placeholder="Re-Enter Password">
					</div>
                    <!-- <span class="help-block">Password error</span> -->
                   <br> 
					<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				</form>
			</div>
    	</div>
		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-3">
				<!-- <label class="checkbox">
					<input type="checkbox" value="remember-me">Remember Me
				</label> -->
			</div>
			<div class="col-xs-12 col-sm-3">
				<p class="omb_forgotPwd">
					<a href="#">Forgot password?</a>
					<br>
					<a href="<?php echo base_url() ?>logout">Logout</a>
				</p>
			</div>
		</div>	    	
	</div>



        </div>