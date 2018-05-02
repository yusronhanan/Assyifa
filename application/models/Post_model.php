<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_listpost(){
		return $this->db
					->select('*, penjawab.full_name as name_answering,penanya.full_name as name_questioner')
					->join('question','question.id_question = post.question_id', 'left')
					->join('user as penanya','question.id_questioner = penanya.id_user', 'left')
					->join('user as penjawab','post.id_user = penjawab.id_user', 'left')
					->group_by('post.id_post')
					->order_by('date_post','DESC')
					->get('post')
						->result();
	}
	public function get_post_per_code($hash_p){
		return $this->db
					->select('*, penjawab.full_name as name_answering')
					->where('hash_post',$hash_p)
						->join('user as penjawab','post.id_user = penjawab.id_user')
						->get('post')
						->row();
	}

	public function get_q_data($hash_p){
		$id_q = $this->db->where('hash_post',$hash_p)->get('post')->row()->question_id;
		return $this->db
					->select('*, penanya.full_name as name_questioner')
					->where('id_question',$id_q)
						->join('user as penanya','question.id_questioner = penanya.id_user')
						->get('question')
						->row();
	}

	public function post_in(){
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d');
		// $now = date('Y-m-d H:i:s');
		$hash_code= random_string('alnum',11);
        
        $query = $this->db->insert('post', array(
            'id_user'    => $this->session->userdata('logged_id'),
            'text_post'  => $this->input->post('text_post'),
            'desc_post'  => $this->input->post('desc_post'),
            'date_post'  => $now,
            'hash_post'  => $hash_code,
            'title_post' =>$this->input->post('title_post'),
        ));

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

}

/* End of file Post_model.php */
/* Location: ./application/models/Post_model.php */