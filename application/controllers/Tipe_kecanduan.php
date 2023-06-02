<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe_kecanduan extends CI_Controller {


	function __construct()
	{
    	parent::__construct();
		check_admin();
		check_not_login();
		$this->load->model('tipe_kecanduan_m');
		$this->load->library('form_validation');
    }
	
	public function index()
	{
		$data['row'] = $this->tipe_kecanduan_m->get();
		$this->template->load('template' , 'admin/kecanduan/tipe_kecanduan' , $data);
	}

	public function edit($id = null )
	{

		$this->form_validation->set_rules('kode_penyakit', 'kode_penyakit', 'trim|required');
        $this->form_validation->set_rules('nama_penyakit', 'nama_penyakit', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_rules('solusi', 'solusi', 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			$query = $this->tipe_kecanduan_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'admin/kecanduan/edit_tipe_kecanduan', $data);
			} else {
				$this->session->set_flashdata('warning', 'data tidak bisa di simpan');
				redirect('tipe_kecanduan');
			}
		}else{ 
			$post = $this->input->post(null , TRUE);
			$this->tipe_kecanduan_m->edit($post);
		  	if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil diubah ');
			  }
		 	 redirect('tipe_kecanduan');		
		}
	}

	public function detail($id)
	{
		$data['row'] = $this->tipe_kecanduan_m->get($id)->row();
		$this->template->load('template' , 'admin/kecanduan/detail_kecanduan' , $data);	
	}


	public function add()
	{

		$this->form_validation->set_rules('kode_penyakit', 'kode_penyakit', 'trim|required');
        $this->form_validation->set_rules('nama_penyakit', 'nama_penyakit', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_rules('solusi', 'solusi', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = array (
				'kode' => $this->tipe_kecanduan_m->kode_unik(),
			);
			
			$this->template->load('template' , 'admin/kecanduan/tambah_kecanduan'  ,$data);
		}else{
			$post = $this->input->post(null , TRUE);
			$this->tipe_kecanduan_m->add($post);
		  if($this->db->affected_rows() > 0) {
			  $this->session->set_flashdata('success', 'Data Berhasil di simpan !!!');
		  }
		  redirect('tipe_kecanduan');
		}
	}

	public function del($id)
    {
        $this->tipe_kecanduan_m->delete($id);
        if($this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data Berhasil dihapus !!!');
		}
        redirect('tipe_kecanduan');
    }

}
