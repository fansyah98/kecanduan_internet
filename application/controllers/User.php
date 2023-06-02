<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		check_admin();
		check_not_login();
        $this->load->model('user_m');
		$this->load->library('form_validation');
    }


	public function index()
	{
		$data['row'] = $this->user_m->get();
		$this->template->load('template' , 'admin/user/data_user' , $data);
	}

	public function del($id)
	{
		$id = $this->input->post('user_id');
		$this->user_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('danger', 'Data Anda berhasil di hapus');
		}
		redirect('user');
	}
}
