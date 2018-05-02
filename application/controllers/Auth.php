<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
public function __construct()
	{
		parent::__construct();
	   $this->load->model('auth_model');
	}

    
	public function index()
	{
		 if ($this->session->userdata('logged_in') == true) {
            redirect('');
        } else {
            redirect('login');
        }
		
	}
    public function login(){
        if ($this->session->userdata('logged_in') == true) {
            redirect('');
        } else {
         
        // $data =[
        //     'main' => 'login',
        // ];
        // $this->load->view('layout', $data);
        redirect('User_authentication');
       }
     
    }

    public function signup(){
    if ($this->session->userdata('logged_in') == true) {
            redirect('');
        } else {
         
        // $data =[
        //     'main' => 'signup',
        // ];
        // $this->load->view('layout', $data);
            redirect('User_authentication/signup');
    }
    }

	public function check_in() {
		if ($this->session->userdata('logged_in') == true) {
            redirect('');
        }
        else {
        	   $this->form_validation->set_rules('email', 'Email', 'trim|required');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');

                if ($this->form_validation->run() == TRUE ) {
                    if ($this->auth_model->check_in() == TRUE) {
                        $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil login');
                        redirect('');
                    } else {

                        $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, email atau password anda salah');
                        redirect('login');
                    }
                } else {
                    $this->session->set_flashdata('type_notif', 'danger');
                $this->session->set_flashdata('notif', validation_errors());
                        redirect('login');
                  
                }
        }
		
	}
    public function check_signup(){
        if ($this->session->userdata('logged_in') == true) {
            redirect('');
        }
        else {
                $this->form_validation->set_rules('email', 'Email', 'trim|required');
                $this->form_validation->set_rules('first_name', 'First Name', 'required');
                $this->form_validation->set_rules('last_name', 'Last Name', 'required');
                
                $this->form_validation->set_rules('birthday', 'Birthday', 'required');
                
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('repassword', 'Re Enter Password', 'required');
                
                if ($this->form_validation->run() == TRUE ) {
                    if ($this->auth_model->signup() == TRUE) {
                        $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil registrasi, Harap cek email anda');
                        redirect('login');
                    } else {

                        $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, email atau password anda salah');
                        redirect('login');
                    }
                } else {
                    $this->session->set_flashdata('type_notif', 'danger');
                $this->session->set_flashdata('notif', validation_errors());
                        redirect('login');
                  
                }
        }
        
    }
	// public function send_email()  {  
 //   $config = Array(  
 //    'protocol' => 'smtp',  
 //    'smtp_host' => 'ssl://smtp.googlemail.com',  
 //    'smtp_port' => 465,  
 //    'smtp_user' => 'yusronzain@gmail.com',   
 //    'smtp_pass' => 'passwordgue',   
 //    'mailtype' => 'html',   
 //    'charset' => 'iso-8859-1'  
 //   );  
 //   $this->load->library('email', $config);  
 //   $this->email->set_newline("\r\n");  
 //   $this->email->from('yusronzain@gmail.com', 'Admin Re:Code');   
 //   $this->email->to('yusronzain@gmail.com');   
 //   $this->email->subject('Percobaan email');   
 //   $this->email->message('Ini adalah email percobaan untuk Tutorial CodeIgniter: Mengirim Email via Gmail SMTP menggunakan Email Library CodeIgniter @ recodeku.blogspot.com');  
 //   if (!$this->email->send()) {  
 //    show_error($this->email->print_debugger());   
 //   }else{  
 //    echo 'Success to send email';   
 //   }  
 //  }  
// 	public function Register(){
// 		if ($this->session->userdata('logged_in') == true) {
//             redirect('Page');
//         } else{
//         if ($this->input->post('submit')) {
//             $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
//             $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
//             $this->form_validation->set_rules('telp', 'Nomor Telepon', 'trim|required|numeric');
//             $this->form_validation->set_rules('email', 'Email', 'trim|required');
//             $this->form_validation->set_rules('location', 'Your Working Area', 'required');
//             $this->form_validation->set_rules('address', 'Address', 'required');
//             $this->form_validation->set_rules('password', 'Password', 'trim|required');
//             $this->form_validation->set_rules('password2', 'Second Password', 'trim|required');

//             if ($this->form_validation->run() == TRUE ) {
//                 $password = $this->input->post('password');
//                 $password2 = $this->input->post('password2');

//                 if ($password == $password2) {

//                 $config['upload_path'] = './assets/images';
//                 $config['allowed_types'] = 'jpg|png';
//                 $config['max_size']  = '2000';
                
//                 $this->load->library('upload', $config);
//                 $this->upload->initialize($config);
//                 if ($this->upload->do_upload('profil')){     
//                     $result = $this->user_model->add_user($this->upload->data());
//                     if ($result == "TRUE") {
//                         // jika sukses
//                         redirect('Auth/Login');
//                     }
//                     else if($result == "username_exist"){
//                         $data['modallogin'] = 'notnull';
//                         $data['notif'] = 'Sorry, Username already exist';
//                         $data['main_view']='signup';
//                         $this->load->view('template', $data);
//                     }
//                     else if($result == "email_exist"){
//                         $data['modallogin'] = 'notnull';
//                         $data['notif'] = 'Sorry, Email already exist';
//                         $data['main_view']='signup';
//                         $this->load->view('template', $data);
//                     }
//                      else {
//                         $data['modallogin'] = 'notnull';
//                         $data['notif'] = 'Signup Failed';
//                         $data['main_view']='signup';
// 						$this->load->view('template', $data);
//                     }
//                 } else{
//                     $data['notif']=$this->upload->display_errors();
//                     $data['modallogin'] = 'notnull';
//                     $data['main_view']='signup';
//                     $this->load->view('template', $data);
//                 }
//                 } else {
//                     $data['modallogin'] = 'notnull';
//                     $data['notif'] = "Password didn't match";
//                     $data['main_view']='signup';
// 					$this->load->view('template', $data);
//                 }
//             } else {
//                 // jika gagal
//                 $data['modallogin'] = 'notnull';
//                 $data['notif'] = validation_errors();
//                 $data['main_view']='signup';
// 				$this->load->view('template', $data);
//             }
//         } else {
//             $data['modallogin'] = 'notnull';
//             $data['notif'] = '';
//             $data['main_view']='signup';
// 			$this->load->view('template', $data);
//         }
//     }
    
		
// 	}
//     public function aktivasi_merchant(){
//         if ($this->session->userdata('logged_in') == true) {
//          if ($this->input->post('submit')) {
//             $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
//             $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
//             $this->form_validation->set_rules('username', 'Username', 'trim|required');
//             $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
//             $this->form_validation->set_rules('email', 'Email', 'trim|required'); 
//             $this->form_validation->set_rules('address', 'Address', 'required');
//             $this->form_validation->set_rules('nik_tsel', 'NIK Telkomsel', 'trim|required');
//             $this->form_validation->set_rules('email_tsel', 'Email Telkomsel', 'trim|required');
//             $this->form_validation->set_rules('telegram', 'Telegram', 'trim|required');
//             $this->form_validation->set_rules('location', 'Lantai dan Bagian', 'required');
//             $this->form_validation->set_rules('deskripsi', 'Deskripsi Merchant', 'required');
//             $this->form_validation->set_rules('merchant_name', 'Merchant Name', 'required');
//             $this->form_validation->set_rules('password', 'Password Validasi', 'trim|required');
//                 $config['upload_path'] = './assets/images';
//                 $config['allowed_types'] = 'jpg|png';
//                 $config['max_size']  = '2000';
                
//                 $this->load->library('upload', $config);
//                 $this->upload->initialize($config);
//                 if ($this->upload->do_upload('profil_merchant')){
//             if ($this->form_validation->run() == TRUE ) {
//                 // $password = $this->input->post('password');
//                 // $password2 = $this->input->post('password2');

//                 // if ($password == $password2) {
//                     if ($this->user_model->add_user_merchant($this->upload->data()) == TRUE) {
//                         // jika sukses
//                         $this->session->set_flashdata('notif_log_password', 'Selamat ! Anda telah menjadi Merchant di Jual Beli MTT, anda dapat langsung menuju laman merchant dengan klik ke laman merchant');
//                         redirect('page');
//                     } else {
//                         $id=$this->session->userdata('logged_id');
//                         $data['amountorder'] = $this->show_model->AmountOrder();
            
//                         $data['user']= $this->show_model->GetData(array("id"=>$id),'user_merchant');
//                         $data['modallogin'] = 'notnull';
//                         $data['notif'] = 'Aktivasi merchant gagal, periksa beberapa data input anda.';
//                         $data['main_view']='aktivasimerchant';
//                         $this->load->view('template_null', $data);
//                     }
//             } else {
//                 // jika gagal
//                 $data['amountorder'] = $this->show_model->AmountOrder();
            
//                 $id=$this->session->userdata('logged_id');
//                 $data['user']= $this->show_model->GetData(array("id"=>$id),'user_merchant');
//                 $data['modallogin'] = 'notnull';
//                 $data['notif'] = validation_errors();
//                 $data['main_view']='aktivasimerchant';
//                 $this->load->view('template_null', $data);
//             }
//         }
//             else {
//                 $id=$this->session->userdata('logged_id');
//                 $data['user']= $this->show_model->GetData(array("id"=>$id),'user_merchant');
//                 $data['notif']=$this->upload->display_errors();
//                 $data['amountorder'] = $this->show_model->AmountOrder();
            
//                 $data['modallogin'] = 'notnull';
//                 $data['main_view']='aktivasimerchant';
//                 $this->load->view('template_null', $data);
//              } 
//              } 
            

//          else {
//             $id=$this->session->userdata('logged_id');
//             $data['user']= $this->show_model->GetData(array("id"=>$id),'user_merchant');
//             $data['amountorder'] = $this->show_model->AmountOrder();
            
//             $data['modallogin'] = 'notnull';
//             $data['notif'] = '';
//             $data['main_view']='aktivasimerchant';
//             $this->load->view('template_null', $data);
//         }
//     }
//     else {
//         $this->session->set_flashdata('notif_log_password', 'Maaf, anda harus login terlebih dahulu.');
//         redirect('page');
//     }

// }

 	public function Logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

    

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */