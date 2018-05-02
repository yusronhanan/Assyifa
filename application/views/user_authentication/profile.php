<h1>CodeIgniter Sign In With Google Account</h1>
<div class="wrapper">
    <div class="info-box">
        <p class="image"><img src="<?php echo $this->session->userdata('picture_url'); ?>" width="300" height="220"/></p>
        <p><b>Google ID: </b><?php echo $this->session->userdata('oauth_uid'); ?></p>
        <p><b>Name: </b><?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?></p>
        <p><b>Email: </b><?php echo $this->session->userdata('email'); ?></p>
        <p><b>Gender: </b><?php echo $this->session->userdata('gender'); ?></p>

        <p><b>Birthday: </b><?php echo $this->session->userdata('birthday'); ?></p>
        <p><b>Locale: </b><?php echo $this->session->userdata('locale'); ?></p>
        <p><b>Google+ Link: </b><a href="<?php echo $this->session->userdata('profile_url'); ?>" target="_blank"><?php echo $this->session->userdata('profile_url'); ?></a></p>
        <p><b>Logout from <a href="<?php echo base_url().'user_authentication/logout'; ?>">Google</a></b></p>
    </div>
</div>
