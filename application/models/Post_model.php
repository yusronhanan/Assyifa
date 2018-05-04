<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function get_listpost($limit,$mulai){
		return $this->db
					->select('*,  CONCAT(penjawab.first_name, " ", penjawab.last_name ) as name_answering,CONCAT(penanya.first_name, " ", penanya.last_name ) as name_questioner, penjawab.hash_code as hash_penjawab')
					->where('publish','yes')
					->join('question','question.id_question = post.question_id', 'left')
					->join('users as penanya','question.id_questioner = penanya.id_user', 'left')
					->join('users as penjawab','post.id_user = penjawab.id_user', 'left')
					->group_by('post.id_post')
					->order_by('date_post','DESC')
					->limit($limit,$mulai)
					->get('post')
						->result();
	}
	public function get_listpost_where($limit,$mulai,$where){
		return $this->db
					->select('*,  CONCAT(penjawab.first_name, " ", penjawab.last_name ) as name_answering,CONCAT(penanya.first_name, " ", penanya.last_name ) as name_questioner, penjawab.hash_code as hash_penjawab')
					->where('publish','yes')
					->where($where)
					->join('question','question.id_question = post.question_id', 'left')
					->join('users as penanya','question.id_questioner = penanya.id_user', 'left')
					->join('users as penjawab','post.id_user = penjawab.id_user', 'left')
					->group_by('post.id_post')
					->order_by('date_post','DESC')
					->limit($limit,$mulai)
					->get('post')
						->result();
	}

	public function get_listpostku($limit,$mulai){
		return $this->db
					->select('*,  CONCAT(penjawab.first_name, " ", penjawab.last_name ) as name_answering,CONCAT(penanya.first_name, " ", penanya.last_name ) as name_questioner, penjawab.hash_code as hash_penjawab')
					->where('penjawab.id_user',$this->session->userdata('logged_id'))
					->join('question','question.id_question = post.question_id', 'left')
					->join('users as penanya','question.id_questioner = penanya.id_user', 'left')
					->join('users as penjawab','post.id_user = penjawab.id_user', 'left')
					->group_by('post.id_post')
					->order_by('date_post','DESC')
					->order_by('publish','ASC')
					->limit($limit,$mulai)
					->get('post')
						->result();
	}
	public function get_listpostku_where($limit,$mulai,$where){
		return $this->db
					->select('*,  CONCAT(penjawab.first_name, " ", penjawab.last_name ) as name_answering,CONCAT(penanya.first_name, " ", penanya.last_name ) as name_questioner, penjawab.hash_code as hash_penjawab')
					->where('penjawab.id_user',$this->session->userdata('logged_id'))
					->where($where)
					->join('question','question.id_question = post.question_id', 'left')
					->join('users as penanya','question.id_questioner = penanya.id_user', 'left')
					->join('users as penjawab','post.id_user = penjawab.id_user', 'left')
					->group_by('post.id_post')
					->order_by('date_post','DESC')
					->order_by('publish','ASC')
					->limit($limit,$mulai)
					->get('post')
						->result();
	}
	public function get_listpost_all($limit,$mulai){
		return $this->db
					->select('*,  CONCAT(penjawab.first_name, " ", penjawab.last_name ) as name_answering,CONCAT(penanya.first_name, " ", penanya.last_name ) as name_questioner, penjawab.hash_code as hash_penjawab')
					->join('question','question.id_question = post.question_id', 'left')
					->join('users as penanya','question.id_questioner = penanya.id_user', 'left')
					->join('users as penjawab','post.id_user = penjawab.id_user', 'left')
					->group_by('post.id_post')
					->order_by('date_post','DESC')
					->order_by('publish','ASC')
					->limit($limit,$mulai)
					->get('post')
						->result();
	}
	public function get_listpost_all_where($limit,$mulai,$where){
		return $this->db
					->select('*,  CONCAT(penjawab.first_name, " ", penjawab.last_name ) as name_answering,CONCAT(penanya.first_name, " ", penanya.last_name ) as name_questioner, penjawab.hash_code as hash_penjawab')
					->where($where)
					->join('question','question.id_question = post.question_id', 'left')
					->join('users as penanya','question.id_questioner = penanya.id_user', 'left')
					->join('users as penjawab','post.id_user = penjawab.id_user', 'left')
					->group_by('post.id_post')
					->order_by('date_post','DESC')
					->order_by('publish','ASC')
					->limit($limit,$mulai)
					->get('post')
						->result();
	}
	public function get_post_per_code($hash_p){
		return $this->db
					->select('*, CONCAT(penjawab.first_name, " ", penjawab.last_name ) as name_answering')
					->where('hash_post',$hash_p)
						->join('users as penjawab','post.id_user = penjawab.id_user')
						->get('post')
						->row();
	}

	public function get_q_data($hash_p){
		$id_q = $this->db->where('hash_post',$hash_p)->get('post')->row()->question_id;
		return $this->db
					->select('*, CONCAT(penanya.first_name, " ", penanya.last_name ) as name_questioner')
					->where('id_question',$id_q)
						->join('users as penanya','question.id_questioner = penanya.id_user')
						->get('question')
						->row();
	}

	public function post_in(){
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d');
		// $now = date('Y-m-d H:i:s');
		$hash_code= random_string('alnum',11);
        $publish = $this->input->post('publish');
		if ($publish != 'yes') {
			$publish = 'no';
		}
		$tags = '';
        $tag = array();
		$tag = $this->input->post('tags');
		for($i=0;$i<count($tag);$i++){
		if ($i == 0) {
		$tags .= $tag[$i];	
		}
		else{
			$tags .=','.$tag[$i];
		}
		}
		if ($tags == '') {
			$tags = NULL;
		}
        $query = $this->db->insert('post', array(
            'id_user'    => $this->session->userdata('logged_id'),
            'text_post'  => $this->input->post('text_post'),
            'desc_post'  => $this->input->post('desc_post'),
            'question_id'=> NULL,
            'status_q'   => NULL,
            'date_post'  => $now,
            'hash_post'  => $hash_code,
            'publish'	 => $publish,
            'title_post' =>$this->input->post('title_post'),
            'tag'		 => $tags,
        ));

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}
	public function post_delete($hash_p){
		$query = $this->db->where('hash_post',$hash_p)->delete('post');
           
if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}
	public function post_edit($hash_p){
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d');
		// $now = date('Y-m-d H:i:s');
		$question_id = $this->db->where('hash_post',$hash_p)->get('post')->row()->question_id;
		$publish = $this->input->post('publish');
		if ($publish != 'yes') {
			$publish = 'no';
		}
		if ($question_id != '0') {
		if (!empty($type)) {
        	$type_answering = $type;
        }
        else{
        	$type_answering = 'show_q';
        }
        $tags = '';
        $tag = array();
		$tag = $this->input->post('tags');
		for($i=0;$i<count($tag);$i++){
		if ($i == 0) {
		$tags .= $tag[$i];	
		}
		else{
			$tags .=','.$tag[$i];
		}
		}
		if ($tags == '') {
			$tags = NULL;
		}
			$query = $this->db->where('hash_post',$hash_p)->update('post', array(
            'text_post'  => $this->input->post('text_post'),
            'desc_post'  => $this->input->post('desc_post'),
            'date_post'  => $now,
            'status_q'   => $type_answering,
            'publish'	 => $publish,
            'title_post' =>$this->input->post('title_post'),
            'tag'		 => $tags,
        ));
		}
		else{
			$query = $this->db->where('hash_post',$hash_p)->update('post', array(
            'text_post'  => $this->input->post('text_post'),
            'desc_post'  => $this->input->post('desc_post'),
            'date_post'  => $now,
            'publish'	 => $publish,
            'title_post' =>$this->input->post('title_post'),
            'tag'		 => $tags,
        ));
		}
        
        

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	public function GetAllData($table){
		return $this->db->get($table)->result();
	}
	public function GetData($where,$table){
		return $this->db->where($where)->get($table);
	}
	public function GetLikeData($where,$table){
		return $this->db->like($where)->get($table);
	}

}

/* End of file Post_model.php */
/* Location: ./application/models/Post_model.php */