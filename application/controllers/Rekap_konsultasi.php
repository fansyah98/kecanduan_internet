<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_konsultasi extends CI_Controller {


	function __construct()
    {
        parent::__construct();
		
		check_not_login();
        $this->load->model(['gejala_m','Konsultasi_m']);
		$this->load->library('form_validation');
    }

	public function index()
	{
        $user = $this->fungsi->user_login()->name;
        $data['row'] = $this->Konsultasi_m->get_all_keluhan($user);
        $this->template->load('template' , 'pasien/rekap/data_rekap_konsultasi' , $data);
	}

}
?>