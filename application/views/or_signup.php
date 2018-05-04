<div class="row omb_row-sm-offset-3 omb_loginOr">
			<div class="col-xs-12 col-sm-6">
				<hr class="omb_hrOr">
				<span class="omb_spanOr">or</span>
			</div>
		</div>

		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">	
			    <form class="omb_loginForm" action="<?php echo base_url() ?>auth/check_signup" autocomplete="off" method="POST">
            <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="first_name" required placeholder="First Name">
            <input type="text" class="form-control" name="last_name" required placeholder="Last Name">
          </div>
          <br>
           
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="email" class="form-control" name="email" required placeholder="Email address">
					</div>
					<br>
           <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <input type="date" class="form-control" name="birthday" required placeholder="Birthday">
          </div>
          <br>
					<span class="help-block"></span>
										
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="password" required placeholder="Password">
					</div>
          <br>
              
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input  type="password" class="form-control" name="repassword" required placeholder="Re-enter Password">
          </div>
          <br>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
				</form>
			</div>
    	</div>