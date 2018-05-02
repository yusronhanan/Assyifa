<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ask_model');
		$this->load->model('post_model');
	}
	public function index()
	{

		$data =[
			'main' => 'beranda',
			'post'	   => $this->post_model->get_listpost(),
		];
		$this->load->view('layout', $data);
	}


	public function pesantren(){
		$data =[
			'main' => 'about',
		];
		$this->load->view('layout', $data);
	}

	public function bertanya(){
		if ($this->session->userdata('logged_in') == true) {
			if ($this->session->userdata('role') != 'ustad') {

		$data =[
			'main' => 'ask_form',
		];
		$this->load->view('layout', $data);
		}
        else{
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

	public function menjawab($hash_q){
		if ($this->session->userdata('logged_in') == true) {
			if ($this->session->userdata('role') != 'user') {


		$data =[
			'main' => 'answering_form',
			'q'	   => $this->ask_model->get_question_for_answer($hash_q),
		];
		$this->load->view('layout', $data);
	}
        else{
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
	public function newpost(){
		if ($this->session->userdata('logged_in') == true) {
			if ($this->session->userdata('role') != 'user') {


		$data =[
			'main' => 'new_post',
		];
		$this->load->view('layout', $data);
	}
        else{
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

	public function pertanyaanku(){
		if ($this->session->userdata('logged_in') == true) {
			if ($this->session->userdata('role') != 'ustad') {



		$data =[
			'my_q' => $this->ask_model->get_myquestion(),
			'main' => 'my_question',
		];
		$this->load->view('layout', $data);
	}
        else{
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

	public function pertanyaan(){
		if ($this->session->userdata('logged_in') == true) {
			if ($this->session->userdata('role') != 'user') {
		$data =[
			'question'=>$this->ask_model->get_question(),
			'main' => 'list_question',
		];
		$this->load->view('layout', $data);
	}
        else{
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

	public function post($hash_p){
		$data =[
			'p'	   => $this->post_model->get_post_per_code($hash_p),
			'q'    => $this->post_model->get_q_data($hash_p),
			'main' => 'post',
		];
		$this->load->view('layout', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */