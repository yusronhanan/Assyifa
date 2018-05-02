<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
public function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
    }
	public function check_in(){
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        
        $query = $this->GetUser(['email'=>$email,'password'=>$password]);
        if ($query->num_rows() > 0) {
            $user = $query->row();
            $data = [
                'logged_id'     => $user->id_user,
                'email'          => $email,
                'role'      	=> $user->role,
                'logged_in'     => TRUE,
                'oauth_provider' => $user->oauth_provider,
                'oauth_uid'     => $user->oauth_uid,
                'first_name'    => $user->first_name,
                'last_name'     => $user->last_name,
                'gender'        => $user->gender,
                'locale'        => $user->locale,
                'birthday'      => $user->birthday,
                'profile_url'   => $user->profile_url,
                'picture_url'   => $user->picture_url,
            ];
            $this->session->set_userdata( $data );
            return TRUE;
        } 
         else {
            return FALSE;
        }
    }
    public function signup(){
        $email = $this->input->post('email');
        $hash_code= random_string('alnum',11);
        
        $query_email = $this->GetUser(['email'=>$email]);
        if($query_email->num_rows() > 0) {
            return "email_exist";
        }
        
        else{
        $query = $this->db->insert('users', array(
            'first_name'      => $this->input->post('first_name'),
            'last_name'      => $this->input->post('last_name'),
            'email'  	=> $this->input->post('email'),
            'birthday'   => $this->input->post('birthday'),
            'password'  => md5($this->input->post('password')),
            'hash_code'     => $hash_code,
            'role' => 'user'
        ));
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    }
//     public function add_user_merchant($foto){
//         $id = $this->session->userdata('logged_id');
        
//         $emailtsel = $this->input->post('email_tsel');
//         $emailtselfix =  $emailtsel.'@telkomsel.co.id';
//         $first_name = $this->input->post('first_name');
//         $last_name = $this->input->post('last_name');
       
 
//         $passValidasi = $this->input->post('password');
//         $password = $this->GetUser(['id'=>$id])->row('password');
//         $query2 = $this->db->where('id', $id)->where('password', md5($password))->where('is_merchant', '1')->get('users_merchant');
//         if($query2->num_rows() > 0) {
//             return FALSE;
//         }
//         else{
//         if($password == md5($passValidasi)){
//         $this->db->where(['id'=>$id])->update('users_merchant', array(
//             'name'                      => $first_name.' '.$last_name,
//             'usersname'                  => $this->input->post('usersname'),
//             'phone'                     => $this->input->post('phone'),
//             'email'                     => $this->input->post('email'),
//             'address'                   => $this->input->post('address'),
//             'telegram'                  => $this->input->post('telegram'),
//             'nik_tsel'                  => $this->input->post('nik_tsel'),
//             'email_tsel'                => $emailtselfix,
//             'location'                  => $this->input->post('location'),
//             'deskripsi_merchant'        => $this->input->post('deskripsi'),
//             'merchant_name'             => $this->input->post('merchant_name'),
//             'image_merchant'            => $foto['file_name'],
//             'last_update'=> $this->input->post('last_update'),
           
            

//             // 'deskripsi'  => $this->input->post('deskripsi'),
//             // 'last_update' => $this->input->post('last_update'),
//             'is_merchant' => '1',
//         ));

//         $data = [
//                 'level'         => '1'
//             ];
//             $this->session->set_userdata( $data );
    
//       // $this->load->library('email');    //load email library
//       // $this->email->from('yusronzain@gmail.com', 'MTT Test verify'); //sender's email
//       // $address = $this->input->post('email');   //receiver's email
//       // $subject="Welcome to Jual Beli MTT for Merchant!";    //subject
//       // $hash = md5($address+$passValidasi);
//       // $message= /*-----------email body starts-----------*/
//       //   'Terimakasih sudah mendaftar menjadi Merchant, '.$first_name.'!
      
//       //   Your account has been created. 
//       //   Here are your login details.
//       //   -------------------------------------------------
//       //   Email   : ' .$this->input->post('email'). '
//       //   Password: ' .substr($this->input->post('password'),0,2). '*******
//       //   -------------------------------------------------
                        
//       //   Please click this link to activate your account:
            
//       //   ' . base_url() . 'index.php/Auth/verify_merchant?' . 
//       //   'email=' . $this->input->post('email') . '&hash=' . $hash ;
//       //   /*-----------email body ends-----------*/             
//       // $this->email->to($address);
//       // $this->email->subject($subject);
//       // $this->email->message($message);
//       // $this->email->send();
//     if ($this->db->affected_rows() > 0) {
            
//             return TRUE;
//         } else {
//             return FALSE;
//         }
//     } else{
//         return FALSE;
//     }
// }
// }

//     public function Edit_profile(){
//         $id = $this->session->userdata('logged_id');
//         $name = $this->input->post('name');
//         $passValidasi = $this->input->post('password');
//         $password = $this->GetUser(['id'=>$id])->row('password');
//         $email_tsel = $this->input->post('emailTsel').'@telkomsel.co.id';
//         if($password == md5($passValidasi)){
//         $this->db->where(['id'=>$id])->update('users_merchant', array(
//             'name'      => $this->input->post('name'),
//             'usersname'  => $this->input->post('usersname'),
//             'phone'     => $this->input->post('phone'),
//             'email'     => $this->input->post('email'),
//             'address'   => $this->input->post('address'),
//             'telegram'  => $this->input->post('telegram'),
//             'nik_tsel'  => $this->input->post('nikTsel'),
//             'location'  => $this->input->post('location'),
//             'email_tsel'=> $email_tsel,
//             'last_update'=> $this->input->post('last_update'),
//         ));
//         if ($this->db->affected_rows() > 0) {
//             $this->session->set_userdata( array('logged_name' => $name) );
//             return TRUE;
//         } else {
//             return FALSE;
//         }
//     } else{
//         return FALSE;
//     }
// }

//     public function Edit_password(){
//         $id = $this->session->userdata('logged_id');
//         $this->db->where(['id'=>$id])->update('users_merchant', array(
//             'password'      => $this->input->post('password')
//         ));
//         if ($this->db->affected_rows() > 0) {
//             return TRUE;
//         } else {
//             return FALSE;
//         }
//     }


// public function updatefoto_user_merchant($foto){
//         $id = $this->session->userdata('logged_id');
//         $this->db->where(['id'=>$id])->update('users_merchant', array(
           
//             'image'     => $foto['file_name'],
//         ));
//         if ($this->db->affected_rows() > 0) {
//             return TRUE;
//         } else {
//             return FALSE;
//         }
//     }

    public function GetUser($where)
    {
      return $this->db->where($where)->get('users');
    }

}

/* End of file User_model */
/* Location: ./application/models/User_model */