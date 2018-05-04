<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_authentication extends CI_Controller
{
    function __construct(){
        parent::__construct();
        
        //load google login library
        $this->load->library('google');
        
        //load user model
        $this->load->model('user_model');
        $this->load->model('auth_model');

    }
    
    public function index(){
        //redirect to profile page if user already logged in
        if($this->session->userdata('logged_in') == true){
            redirect('');
        }
        
        // if(isset($_GET['code'])){
        if(!empty($this->input->get('code'))){
            //authenticate user
            $this->google->getAuthenticate();
            
            //get user info from google
            $gpInfo = $this->google->getUserInfo();
            
            //preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid']      = $gpInfo['id'];
            // $userData['first_name']     = $gpInfo['given_name'];
            // $userData['last_name']      = $gpInfo['family_name'];
            $userData['email']          = $gpInfo['email'];
            $userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:'';
            $userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:'';
            $userData['birthday']       = !empty($gpInfo['birthday'])?$gpInfo['birthday']:'';
            $userData['profile_url']    = !empty($gpInfo['link'])?$gpInfo['link']:'';
            $userData['picture_url']    = !empty($gpInfo['picture'])?$gpInfo['picture']:'';

            //insert or update user data to the database
            $userID = $this->user_model->checkUser($userData);
            
            $pass_ada = $this->user_model->GetUser(array('oauth_uid'=>$gpInfo['id']))->row('password');
            if ($pass_ada != '') {
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata($userData);     
            $this->session->set_userdata('role',$this->auth_model->GetUser(['email'=>$gpInfo['email']])->row()->role);
            
             } 
             else{
            $this->session->set_userdata('pass_need', true);
            $this->session->set_userdata($userData);         
            }
            //store status & user info in session
            $this->session->set_userdata('logged_id', $userID);
            
            //redirect to profile page
            if ($this->session->userdata('pass_need') == true) {
                redirect('user_authentication/pass_need/');    
            }
            else{
                 $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil login');
                        $this->session->set_userdata('role',$this->auth_model->GetUser(['email'=>$gpInfo['email']])->row()->role);
                redirect('');
            }
            
        } 
        
        //google login url
        $data['loginURL'] = $this->google->loginURL();
        $data['main'] = 'user_authentication/index';
        
        //load google login view
        $this->load->view('layout',$data);
    }
    public function signup(){
         if($this->session->userdata('logged_in') == true){
            redirect('');
        }
        
        // if(isset($_GET['code'])){
        if(!empty($this->input->get('code'))){
            //authenticate user
            $this->google->getAuthenticate();
            
            //get user info from google
            $gpInfo = $this->google->getUserInfo();
            
            //preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid']      = $gpInfo['id'];
            // $userData['first_name']     = $gpInfo['given_name'];
            // $userData['last_name']      = $gpInfo['family_name'];
            $userData['email']          = $gpInfo['email'];
            $userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:'';
            $userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:'';
            $userData['birthday']       = !empty($gpInfo['birthday'])?$gpInfo['birthday']:'';
            $userData['profile_url']    = !empty($gpInfo['link'])?$gpInfo['link']:'';
            $userData['picture_url']    = !empty($gpInfo['picture'])?$gpInfo['picture']:'';

            //insert or update user data to the database
            $userID = $this->user_model->checkUser($userData);
            
            $pass_ada = $this->user_model->GetUser(array('oauth_uid'=>$gpInfo['id']))->row('password');
            if ($pass_ada != '') {
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata($userData);     
            $this->session->set_userdata('role',$this->auth_model->GetUser(['email'=>$gpInfo['email']])->row()->role);
             } 
             else{
            $this->session->set_userdata('pass_need', true);
            $this->session->set_userdata($userData);         
            }
            //store status & user info in session
            $this->session->set_userdata('logged_id', $userID);
            
            //redirect to profile page
            if ($this->session->userdata('pass_need') == true) {
                redirect('user_authentication/pass_need/');    
            }
            else{
                $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil login');
                redirect('');
            }
            
        } 
        
        //google login url
        $data['loginURL'] = $this->google->loginURL();
        $data['main'] = 'signup';
        
        //load google login view
        $this->load->view('layout',$data);
    }
    
    // public function profile(){
    //     //redirect to login page if user not logged in
    //     if(!$this->session->userdata('logged_in')){
    //         redirect('/user_authentication/');
    //     }
        
    //     //get user info from session
    //     // $data['userData'] = $this->session->userdata('userData');
        
    //     //load user profile view
    //     $this->load->view('user_authentication/profile');
    // }
    public function pass_need(){
         $data['main'] = 'user_authentication/pass_need';
        
        //load google login view
        $this->load->view('layout',$data);
    }
    public function pass_need_in(){
            if ($this->session->userdata('logged_in') == true) {
            redirect('');
        }
        else {
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                
                $this->form_validation->set_rules('birthday', 'Birthday', 'required');
                
               $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('repassword', 'Re-Enter Password', 'required');

                if ($this->form_validation->run() == TRUE ) {
                    if (md5($this->input->post('password')) == md5($this->input->post('repassword'))) {

                    if ($this->user_model->pass_need_in() == TRUE) {
                        $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil melengkapi data');
                        redirect('');
                    } else {

                        $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, Anda gagal melengkapi data');
                        redirect('user_authentication/pass_need');
                    }
                }
                else {
                    $this->session->set_flashdata('type_notif', 'danger');
                $this->session->set_flashdata('notif', 'Maaf, Re-Enter password tidak sama dengan password yang anda masukkan');
                        redirect('user_authentication/pass_need');
                  
                }
            } 
                 else {
                    $this->session->set_flashdata('type_notif', 'danger');
                $this->session->set_flashdata('notif', validation_errors());
                        redirect('user_authentication/pass_need');
                  
                }
        }
        
    }
    
    public function logout(){
        //delete login status & user info from session
        // $this->session->unset_userdata('logged_in');
        // $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        
        //redirect to login page
        redirect('/user_authentication/');
    }
}