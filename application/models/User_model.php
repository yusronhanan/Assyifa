<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
    function __construct() {
        $this->tableName = 'users';
        $this->primaryKey = 'id_user';

        $this->load->helper('string');
    }
    public function checkUser($data = array()){
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('email'=>$data['email']));
        $query = $this->db->get();
        $check = $query->num_rows();
        
        if($check > 0){
            $result = $query->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName,$data,array('id_user'=>$result['id_user']));
            $this->session->set_userdata('role',$result['role']);
            $userID = $result['id_user'];
        }else{
            
            
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified']= date("Y-m-d H:i:s");
            $data['role']= 'user';
            $data['hash_code']= random_string('alnum',11);
            
            $insert = $this->db->insert($this->tableName,$data);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:false;
    }

    public function pass_need_in(){
        $password = md5($this->input->post('password'));
        $email = $this->session->userdata('email');
        $query = $this->db->where('email',$email)->update('users',['password'=>$password]);
        if ($this->db->affected_rows() > 0) {
            $this->session->unset_userdata('pass_need');
            $this->session->set_userdata('logged_in',true);
            return TRUE;
        } 
         else {
            return FALSE;
        }
    }

    public function GetUser($where){
        return $this->db->where($where)->get('users');
    }
}