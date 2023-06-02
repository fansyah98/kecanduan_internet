<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		// check_admin();
		check_not_login();
        $this->load->model(['gejala_m','Konsultasi_m']);
		$this->load->library('form_validation');
    }

	public function index()
	{
		$data['row'] = $this->gejala_m->get();
		$this->template->load('template' , 'pasien/konsultasi/rekam_medis' , $data);
	}

	public function hasil()
	{
		//kosongkan temporary sebelum dimulainya konsultasi_m
		$this->Konsultasi_m->kosongkanTemp();
		$this->Konsultasi_m->kosongkanTempFinal();
		//tangkap checkbox gejala
		$gejala = $this->input->post('gejala');
		foreach ($gejala as $g) {
		  $data = [
			'user_id' => $this->session->userdata('userid'),
			'id_gejala' => $g
		  ];
		  //insert checked checkbox ke temporary
		  $this->db->insert('temporary', $data);
		}
		//dari id_gejala yg ada ditemporary, insert ke temporary final with id_penyakit & probabiliasnya
		$temp = $this->Konsultasi_m->insertTempFinal();
		$this->db->insert_batch('temporary_final', $temp);

		$probRingan = $this->Konsultasi_m->getProbRingan();
		$probTidak = $this->Konsultasi_m->getProbTidak();
		$probSedang = $this->Konsultasi_m->getProbSedang();
		$probBerat = $this->Konsultasi_m->getProbBerat();


		$data = [
			'ringan' => $probRingan,
			'tidak' => $probTidak,
			'sedang' => $probSedang,
			'berat' => $probBerat,
		 ];

		  //jumlah probabilitas setiap penyakit atas gejala yang dipilih
  		  //∑P(F|Hk)xP(Hk)
    	 $jmlProb = array_sum($data);
    	//pembagian ini sebagai pembanding antara bobot probabilitas dgn jml probabilitas
    	//untuk mendapatkan nilai/hasil Konsultasi_m terbesarnya
		
    	$ringan = @($probRingan / $jmlProb) . '<br>';
   		$tidak = @($probTidak / $jmlProb) . '<br>';
  		$sedang = @($probSedang / $jmlProb) . '<br>';
    	$berat = @($probBerat / $jmlProb) . '<br>';

    	//passing data utk di query ke field hasil_probabilitas
		 $this->Konsultasi_m->hasilprobRingan($ringan);
		 $this->Konsultasi_m->hasilprobTidak($tidak);
		 $this->Konsultasi_m->hasilprobSedang($sedang);
		 $this->Konsultasi_m->hasilprobBerat($berat);

		   //query utk passing data penyakit ke halaman Hasil Konsultasi_m User
		   $data['diagnosa'] = $this->Konsultasi_m->diagnosis();
		   $data['tertinggi'] = $this->Konsultasi_m->diagnosisMax();
		   $data['detail'] =  $this->Konsultasi_m->detailDiagnosa();
		   $data['penyakit'] = $this->db->get('tb_tipe_kecanduan')->result_array();
		   $data['gejala'] = $this->Konsultasi_m->getGejalaAll();

		   $this->Konsultasi_m->insertDaftarKonsult();
		   $this->template->load('template' , 'pasien/konsultasi/hasil_rekam_medis' , $data);
	}

	public function del($id)
    {
        $this->Konsultasi_m->delete($id);
        if($this->db->affected_rows() > 0 ) {
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('konsultasi/data_konsultasi');
    }

	public function data_konsultasi()
	{
		$data['row'] = $this->Konsultasi_m->getKonsul();
		$this->template->load('template' , 'admin/konsultasi/data_konsultasi' , $data);
	}
	
}?>