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
    	<h3 class="omb_authTitle">Login or <a href="<?php echo base_url() ?>signup">Sign up</a></h3>
		<div class="row omb_row-sm-offset-3 omb_socialButtons ">
    	   
        	<div class="col-lg-6 col-xs-4 col-sm-2">
		        <a href="aa" class="btn btn-lg btn-block omb_btn-google">
			        <i class="fa fa-google-plus visible-xs"></i>
			        <span class="hidden-xs">Google+</span>
		        </a>
	        </div>	
		</div>

		<div class="row omb_row-sm-offset-3 omb_loginOr">
			<div class="col-xs-12 col-sm-6">
				<hr class="omb_hrOr">
				<span class="omb_spanOr">or</span>
			</div>
		</div>

		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">
				<form class="omb_loginForm" action="<?php echo base_url() ?>auth/check_in" autocomplete="off" method="POST">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="email" class="form-control" name="email" placeholder="email address">
					</div>
					<br>
					<span class="help-block"></span>
										
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="password" placeholder="Password">
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
			<!-- <div class="col-xs-12 col-sm-3">
				<p class="omb_forgotPwd">
					<a href="#">Forgot password?</a>
				</p>
			</div> -->
		</div>	    	
	</div>



        </div>