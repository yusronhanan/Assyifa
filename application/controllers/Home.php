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
		$keyword =  urldecode($this->input->get('keyword'));
		$author = urldecode($this->input->get('author'));
		$tag = urldecode($this->input->get('tag'));
		$mulai = $this->input->get('per_page');
		$link = base_url();
		$list_post = count($this->post_model->get_listpost(0,0));
		if (!empty($author)) {
		$where['penjawab.hash_code'] = $author;
		$link .= '?author='.$author;
		}

		if (!empty($keyword)) {
		$where['title_post LIKE '] = '%'.$keyword.'%';
		$link .='?keyword='.$keyword;	
		}

		if (!empty($tag)) {
		$where['tag LIKE '] = '%'.$tag.'%';
		$link .='?tag='.$tag;	
		}
		
		if (!empty($where)) {
			$list_post = count($this->post_model->get_listpost_where(0,0,$where));
		}

		$this->load->library('pagination');
		$config['page_query_string'] = TRUE;
		$config['base_url'] = $link;
		$config['total_rows'] = $list_post;
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<ul class="pagination float-right">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&rarr;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_link'] = '&larr;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
		
		$this->pagination->initialize($config);
		
		if (!empty($where)) {
		$rows = $this->post_model->get_listpost_where($config['per_page'],$mulai,$where);	
		}
		else{
		$rows = $this->post_model->get_listpost($config['per_page'],$mulai);
		}
		
		$data =[
			'main' => 'beranda',
			'post'	   => $rows,
			'per_page'  => $mulai,
			'pagination'=> $this->pagination->create_links(),
		];
		$this->load->view('layout', $data);
	}
	
	public function postku(){
		if ($this->session->userdata('logged_in') == true) {
			if ($this->session->userdata('role') != 'user') {
		$keyword =  urldecode($this->input->get('keyword'));
		$tag = urldecode($this->input->get('tag'));
		$mulai = $this->input->get('per_page');
		$link = base_url().'postku/';
		$list_post = count($this->post_model->get_listpostku(0,0));
		if (!empty($keyword)) {
		$where['title_post LIKE '] = '%'.$keyword.'%';
		$link .='?keyword='.$keyword;	
		}

		if (!empty($where)) {
			$list_post = count($this->post_model->get_listpostku_where(0,0,$where));
		}

		$this->load->library('pagination');
		$config['page_query_string'] = TRUE;
		$config['base_url'] = $link;
		$config['total_rows'] = $list_post;
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<ul class="pagination float-right">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&rarr;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_link'] = '&larr;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
		
		$this->pagination->initialize($config);
		
		if (!empty($where)) {
		$rows = $this->post_model->get_listpostku_where($config['per_page'],$mulai,$where);	
		}
		else{
		$rows = $this->post_model->get_listpostku($config['per_page'],$mulai);
		}
		
		$data =[
			'main' => 'postku',
			'post'	   => $rows,
			'per_page'  => $mulai,
			'pagination'=> $this->pagination->create_links(),
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
	public function allpost(){
		if ($this->session->userdata('logged_in') == true) {
			if ($this->session->userdata('role') == 'admin') {
		
		$keyword =  urldecode($this->input->get('keyword'));
		$tag = urldecode($this->input->get('tag'));
		$mulai = $this->input->get('per_page');
		$link = base_url().'allpost/';
		$list_post = count($this->post_model->get_listpost_all(0,0));
		if (!empty($keyword)) {
		$where['title_post LIKE '] = '%'.$keyword.'%';
		$link .='?keyword='.$keyword;	
		}

		if (!empty($where)) {
			$list_post = count($this->post_model->get_listpost_all_where(0,0,$where));
		}

		$this->load->library('pagination');
		$config['page_query_string'] = TRUE;
		$config['base_url'] = $link;
		$config['total_rows'] = $list_post;
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<ul class="pagination float-right">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&rarr;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_link'] = '&larr;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
		
		$this->pagination->initialize($config);
		
		if (!empty($where)) {
		$rows = $this->post_model->get_listpost_all_where($config['per_page'],$mulai,$where);	
		}
		else{
		$rows = $this->post_model->get_listpost_all($config['per_page'],$mulai);
		}
		
		$data =[
			'main' 		=> 'postku',
			'post'	   => $rows,
			'per_page'  => $mulai,
			'pagination'=> $this->pagination->create_links(),
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

	public function pesantren(){
		$data =[
			'main' 		   => 'about',
			'aboutus_text' => $this->post_model->GetData(['type'=>'aboutus_text'],'config')->row()->text,
			'aboutus_maps' => $this->post_model->GetData(['type'=>'aboutus_maps'],'config')->row()->text, 
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
			'tags' => $this->post_model->GetData(['type'=>'tag'],'config')->result(),
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
			'tags' => $this->post_model->GetData(['type'=>'tag'],'config')->result(),
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
	public function editpost($hash_p){
		if ($this->session->userdata('logged_in') == true) {
			if ($this->session->userdata('role') != 'user') {
				$query = $this->post_model->GetData(['hash_post'=>$hash_p,'id_user'=>$this->session->userdata('logged_id')],'post');
            if ($query->num_rows()>0 || $this->session->userdata('role') == 'admin') {


		$data =[
			'main' => 'edit_post',
			'p'	   => $this->post_model->get_post_per_code($hash_p),
			'q'    => $this->post_model->get_q_data($hash_p),
			'tags' => $this->post_model->GetData(['type'=>'tag'],'config')->result(),
		];
		$this->load->view('layout', $data);
		 } else{
                    $this->session->set_flashdata('type_notif', 'danger');
                        $this->session->set_flashdata('notif', 'Maaf, anda tidak punya akses menuju laman tersebut');
                        redirect('');
                }
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
			$keyword =  urldecode($this->input->get('keyword'));
		$mulai = $this->input->get('per_page');
		$link = base_url().'pertanyaanku/';
		$list_post = count($this->ask_model->get_myquestion(0,0));
if (!empty($keyword)) {
		$where['text_question LIKE '] = '%'.$keyword.'%';
		$link .='?keyword='.$keyword;	
		}
if (!empty($where)) {
			$list_post = count($this->ask_model->get_myquestion_where(0,0,$where));
		}
		$this->load->library('pagination');
		$config['page_query_string'] = TRUE;
		$config['base_url'] = $link;
		$config['total_rows'] = $list_post;
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<ul class="pagination float-right">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&rarr;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_link'] = '&larr;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
		
		$this->pagination->initialize($config);
		
		if (!empty($where)) {
		$rows = $this->ask_model->get_myquestion_where($config['per_page'],$mulai,$where);	
		}
		else{
		$rows = $this->ask_model->get_myquestion($config['per_page'],$mulai);
		}



		$data =[
			'my_q' 		=> $rows,
			'main' 		=> 'my_question',
			'per_page'  => $mulai,
			'pagination'=> $this->pagination->create_links(),
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
			$keyword =  urldecode($this->input->get('keyword'));
		$mulai = $this->input->get('per_page');
		$link = base_url().'pertanyaan/';
		$list_post = count($this->ask_model->get_question(0,0));
if (!empty($keyword)) {
		$where['text_question LIKE '] = '%'.$keyword.'%';
		$link .='?keyword='.$keyword;	
		}
if (!empty($where)) {
			$list_post = count($this->ask_model->get_question_where(0,0,$where));
		}
		$this->load->library('pagination');
		$config['page_query_string'] = TRUE;
		$config['base_url'] = $link;
		$config['total_rows'] = $list_post;
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<ul class="pagination float-right">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&rarr;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_link'] = '&larr;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
		
		$this->pagination->initialize($config);
		
		if (!empty($where)) {
		$rows = $this->ask_model->get_question_where($config['per_page'],$mulai,$where);	
		}
		else{
		$rows = $this->ask_model->get_question($config['per_page'],$mulai);
		}

		$data =[
			'question'=>$rows,
			'main' => 'list_question',
			'per_page'  => $mulai,
			'pagination'=> $this->pagination->create_links(),
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