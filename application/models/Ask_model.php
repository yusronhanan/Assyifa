<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ask_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->helper('date');
	}
	public function question_in(){
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d');
		// $now = date('Y-m-d H:i:s');
		$hash_code= random_string('alnum',11);
        $type = $this->input->post('type_question');
        if (!empty($type)) {
        	$type_question = $type;
        }
        else{
        	$type_question = 'non-anonim';
        }
        $query = $this->db->insert('question', array(
            'id_questioner'  => $this->session->userdata('logged_id'),
            'text_question'  => $this->input->post('text_question'),
            'date_question'  => $now,
            'status_question'=> 'proses',
            'type_question'  => $type_question,
            'hash_question'      => $hash_code,
        ));
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    
	}
	public function answering_in($hash_q){

		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d');
		// $now = date('Y-m-d H:i:s');
		$hash_code= random_string('alnum',11);
        $type = $this->input->post('type_answering');
         $publish = $this->input->post('publish');
        if ($publish != 'yes') {
            $publish = 'no';
        }
        if (!empty($type)) {
        	$type_answering = $type;
        }
        else{
        	$type_answering = 'show_q';
        }
        $question_id = $this->db->where('hash_question',$hash_q)->get('question')->row()->id_question;
        $query = $this->db->insert('post', array(
            'id_user'    => $this->session->userdata('logged_id'),
            'question_id'=> $question_id,
            'text_post'  => $this->input->post('text_post'),
            'desc_post'  => $this->input->post('desc_post'),
            'date_post'  => $now,
            'status_q'   => $type_answering,
            'publish'    => $publish,
            'hash_post'  => $hash_code,
            'title_post' =>$this->input->post('title_post'),

        ));

        $query2 = $this->db->where('id_question',$question_id)->update('question', array(
            'id_answering'    => $this->session->userdata('logged_id'),
            'status_question'    => 'selesai',

        ));
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	public function get_myquestion(){
		return $this->db->where('id_questioner',$this->session->userdata('logged_id'))
						->join('post', 'post.question_id = question.id_question', 'left')
						->order_by('question.date_question','DESC')
						->get('question')
						->result();
	}
	public function get_question(){
		return $this->db
					->select('*, CONCAT(penanya.first_name, " ", penanya.last_name ) as name_questioner')
		// , penjawab.full_name as name_answering
						->join('users as penanya','question.id_questioner = penanya.id_user')
						->join('post', 'post.question_id = question.id_question', 'left')
                        // ->join('user as penjawab','question.id_answering = penjawab.id_user')
						// ->group_by('question.id_question')
						->order_by('question.status_question','ASC')
						->get('question')
						->result();
	}
	public function get_question_for_answer($hash_q){
		return $this->db
					->select('*, CONCAT(penanya.first_name, " ", penanya.last_name ) as name_questioner')
					->where('hash_question',$hash_q)
						->join('users as penanya','question.id_questioner = penanya.id_user')
						->get('question')
						->row();
	}
    public function question_delete($hash_q){
        $query = $this->db->where('hash_question',$hash_q)->delete('question');
           
if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

/* End of file Bertanya_model.php */
/* Location: ./application/models/Bertanya_model.php */