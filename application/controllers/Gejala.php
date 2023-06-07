<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {



	function __construct()
    {
        parent::__construct();
		check_admin();
		check_not_login();
        $this->load->model(['gejala_m','tipe_kecanduan_m']);
		$this->load->library('form_validation');
    }

	public function index()
	{
		$data['row'] = $this->gejala_m->get();
		$this->template->load('template' , 'admin/gejala/data_gejala' , $data);
	}

	public function del($id)
    {
        $this->gejala_m->delete($id);
        if($this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('gejala');
    }

	public function add()
	{
		$this->form_validation->set_rules('kode_gejala', 'kode_gejala', 'trim|required');
        $this->form_validation->set_rules('nama_gejala', 'nama_gejala', 'trim|required');
        // $this->form_validation->set_rules('penyakit', 'penyakit', 'trim|required');
        $this->form_validation->set_rules('probabilitas', 'probabilitas', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = array (
				'row' => $this->tipe_kecanduan_m->get(),
			);
			$this->template->load('template' , 'admin/gejala/tambah_gejala' , $data);	
		}else{
			$post = $this->input->post(null , TRUE);
			$this->gejala_m->add($post);
		  if($this->db->affected_rows() > 0) {
			  $this->session->set_flashdata('success', 'Data Berhasil di simpan !!!');
		  }
		  redirect('gejala');
		}

		
	}

	public function edit($id = null)
	{
		// $this->form_validation->set_rules('penyakit', 'penyakit', 'trim');
        // $this->form_validation->set_rules('gejala', 'gejala', 'required');
        $this->form_validation->set_rules('probabilitas', 'probabilitas', 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			$query = $this->gejala_m->get($id);
			if ($query->num_rows() > 0) {
				$data = $query->row();

					// $query_penyakit = $this->tipe_kecanduan_m->get();
					// $penyakit[null] = '- pilih data - ';
					// foreach ($query_penyakit->result() as $st) {
					// 	$penyakit[$st->id_penyakit] = $st->kode_penyakit .'  |  '. $st->nama_penyakit;
					// }
					
					$data = array(
						'row' => $data,
						// 'penyakit' => $penyakit, 'selectedpenyakit' => $data->penyakit,
					);

				$this->template->load('template', 'admin/gejala/edit_gejala', $data);
			} else {
				$this->session->set_flashdata('warning', 'data tidak bisa di simpan');
				redirect('gejala');
			}
		}else{ 
			$post = $this->input->post(null , TRUE);
			$this->gejala_m->edit($post);
		  	if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil di ubah!');
			  }
		 	 redirect('gejala');		
		}
	}

}
