<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ask_model');
        $this->load->model('post_model');
	}
	// public function index()
	// {
		
	// }
	public function post_in(){
		  if ($this->session->userdata('logged_in') == true) {
            
               $this->form_validation->set_rules('text_post', 'Form Jawaban', 'required');
               $this->form_validation->set_rules('title_post', 'Judul Post', 'required');
               $this->form_validation->set_rules('desc_post', 'Deskripsi Post', 'required');
               
                if ($this->form_validation->run() == TRUE ) {
                    if ($this->post_model->post_in() == TRUE) {
                        $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil membuat post baru');
                        redirect('pertanyaan');
                    } else {

                        $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, anda gagal membuat post baru. Coba lagi');
                        redirect('pertanyaan');
                    }
                } else {
                    $this->session->set_flashdata('type_notif', 'danger');
                $this->session->set_flashdata('notif', validation_errors());
                        redirect('pertanyaan');
                  
                }
        }
        else{
            $this->session->set_flashdata('type_notif', 'danger');
            $this->session->set_flashdata('notif', 'Maaf, anda harus login terlebih dahulu');
            redirect('login');
        }
        
	}
    public function editposting($hash_p){
         if ($this->session->userdata('logged_in') == true) {
            
               $this->form_validation->set_rules('text_post', 'Form Jawaban', 'required');
               $this->form_validation->set_rules('title_post', 'Judul Post', 'required');
               $this->form_validation->set_rules('desc_post', 'Deskripsi Post', 'required');
                $query = $this->post_model->GetData(['hash_post'=>$hash_p,'id_user'=>$this->session->userdata('logged_id')],'post');
            if ($query->num_rows()>0 || $this->session->userdata('role') == 'admin') {
                if ($this->form_validation->run() == TRUE ) {
                    if ($this->post_model->post_edit($hash_p) == TRUE) {
                        $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil edit post');
                        redirect('editpost/'.$hash_p);
                    } else {

                        $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, anda gagal edit post. Coba lagi');
                        redirect('editpost/'.$hash_p);
                    }
                } else {
                    $this->session->set_flashdata('type_notif', 'danger');
                $this->session->set_flashdata('notif', validation_errors());
                        redirect('editpost/'.$hash_p);
                  
                }
                } else{
                    $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, anda tidak punya akses menuju laman tersebut');
                        redirect('');
                }
        }
        else{
            $this->session->set_flashdata('type_notif', 'danger');
            $this->session->set_flashdata('notif', 'Maaf, anda harus login terlebih dahulu');
            redirect('login');
        }
    }
    public function deletepost($hash_p){
        if ($this->session->userdata('logged_in') == true) {
            
            $query = $this->post_model->GetData(['hash_post'=>$hash_p,'id_user'=>$this->session->userdata('logged_id')],'post');
            if ($query->num_rows()>0 || $this->session->userdata('role') == 'admin') {

               if ($this->post_model->post_delete($hash_p) == TRUE) {
                        $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil menghapus post');
                        redirect('');
                    } else {

                        $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, anda gagal menghapus post. Coba lagi');
                        redirect('');
                    }
                } else{
                    $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, anda tidak punya akses melakukan aksi tersebut');
                        redirect('');
                }
        }
        else{
            $this->session->set_flashdata('type_notif', 'danger');
            $this->session->set_flashdata('notif', 'Maaf, anda harus login terlebih dahulu');
            redirect('login');
        }
    }

}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */