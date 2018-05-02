<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ask extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ask_model');
        $this->load->model('post_model');
	}

	public function ask_form(){
		if ($this->session->userdata('logged_in') == true) {
            
        	   $this->form_validation->set_rules('text_question', 'Form Pertanyaan', 'required');
                if ($this->form_validation->run() == TRUE ) {
                    if ($this->ask_model->question_in() == TRUE) {
                        $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil mengajukan pertanyaan');
                        redirect('bertanya');
                    } else {

                        $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, anda gagal mengajukan pertanyaan. Coba lagi');
                        redirect('bertanya');
                    }
                } else {
                    $this->session->set_flashdata('type_notif', 'danger');
                $this->session->set_flashdata('notif', validation_errors());
                        redirect('bertanya');
                  
                }
        }
        else{
        	$this->session->set_flashdata('type_notif', 'danger');
            $this->session->set_flashdata('notif', 'Maaf, anda harus login terlebih dahulu');
        	redirect('login');
        }
		
	}
    public function answering_form($hash_q){
        if ($this->session->userdata('logged_in') == true) {
            
               $this->form_validation->set_rules('text_post', 'Form Jawaban', 'required');
               $this->form_validation->set_rules('title_post', 'Judul Post', 'required');
               $this->form_validation->set_rules('desc_post', 'Deskripsi Post', 'required');
               
                if ($this->form_validation->run() == TRUE ) {
                    if ($this->ask_model->answering_in($hash_q) == TRUE) {
                        $this->session->set_flashdata('type_notif', 'success');
                        $this->session->set_flashdata('notif', 'Anda berhasil menjawab pertanyaan dan membuat post baru');
                        redirect('pertanyaan');
                    } else {

                        $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, anda gagal menjawab pertanyaan. Coba lagi');
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

	

}

/* End of file Bertanya.php */
/* Location: ./application/controllers/Bertanya.php */