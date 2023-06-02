<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aturan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		check_admin();
		check_not_login();
        $this->load->model(['gejala_m' , 'aturan_m' , 'tipe_kecanduan_m']);
		$this->load->library('form_validation');
    }

	public function index()
	{
		$data['row'] = $this->aturan_m->get();
		$this->template->load('template' , 'admin/aturan/data_basis_aturan' , $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('penyakit', 'penyakit', 'trim|required');
        $this->form_validation->set_rules('gejala', 'gejala', 'trim|required');
        $this->form_validation->set_rules('probabilitas', 'probabilitas', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = array (
				'penyakit' => $this->tipe_kecanduan_m->get(),
				'gejala' => $this->gejala_m->get(),
			);
			$this->template->load('template' , 'admin/aturan/tambah_aturan' , $data);	
		}else{
			$post = $this->input->post(null , TRUE);
			$this->aturan_m->add($post);
		  if($this->db->affected_rows() > 0) {
			  $this->session->set_flashdata('success', 'Data Berhasil di simpan !!!');
		  }
		  redirect('aturan');
		}
	}

	public function edit($id = null )
	{
		$this->form_validation->set_rules('penyakit', 'penyakit', 'trim');
        $this->form_validation->set_rules('gejala', 'gejala', 'trim');
        $this->form_validation->set_rules('probabilitas', 'probabilitas', 'trim|required');


		if ($this->form_validation->run() == FALSE) {
			$query = $this->aturan_m->get($id);
			if ($query->num_rows() > 0) {
				$data = $query->row();

					$query_penyakit = $this->tipe_kecanduan_m->get();
					$penyakit[null] = '- pilih data - ';
					foreach ($query_penyakit->result() as $st) {
						$penyakit[$st->id_penyakit] = $st->kode_penyakit .'  |  '. $st->nama_penyakit;
					}

					$query_gejala = $this->gejala_m->get();
					$gejala[null] = '- pilih data - ';
					foreach ($query_gejala->result() as $st) {
						$gejala[$st->id_gejala] = $st->kode_gejala .'  |  '. $st->nama_gejala;
					}

					
					$data = array(
						'row' => $data,
						'penyakit' => $penyakit, 'selectedpenyakit' => $data->penyakit,
						'gejala' => $gejala, 'selectedgejala' => $data->gejala,
					);

				$this->template->load('template', 'admin/aturan/edit_basis_aturan', $data);
			} else {
				$this->session->set_flashdata('warning', 'data tidak bisa di simpan');
				redirect('aturan');
			}
		}else{ 
			$post = $this->input->post(null , TRUE);
			$this->aturan_m->edit($post);
		  	if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil di simpan !!!');
			  }
		 	 redirect('aturan');		
		}
	}

	public function del($id)
    {
        $this->aturan_m->delete($id);
        if($this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('aturan');
    }

}
