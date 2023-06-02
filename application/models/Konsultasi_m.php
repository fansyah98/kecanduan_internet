<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi_m extends CI_Model
{

  public function getKonsul( $id = null )
	{
		$this->db->select('*');
    $this->db->from('tb_hasil_diagnosa');
    if ($id != null) {
      $this->db->where('id_hasil', $id);
    }
    $query = $this->db->get();
    return $query;
	}

  public function getGejalaAll( $id = null )
	{
		$this->db->select('*');
    $this->db->from('temporary');
    $this->db->join('tb_gejala', 'tb_gejala.id_gejala = temporary.id_gejala');

    if ($id != null) {
      $this->db->where('id_gejala', $id);
    }
    $query = $this->db->get();
    return $query;
	}

  public function kosongkanTemp()
  {
    return $this->db->truncate('temporary');
  }

  public function kosongkanTempFinal()
  {
    return $this->db->truncate('temporary_final');
  }

 
  public function getProbRingan()
  {
    $this->db->select('*');
    $this->db->from('temporary_final');
    $this->db->where('penyakit', 1);
    $data = $this->db->get()->result();
    //inisialisasi untuk total probabilitas
    $jumlah = 1;
    foreach ($data as $row) {
      //perkalian antar setiap id_gejala x probabilitasnya
      $jumlah = $jumlah * $row->probabilitas;
    }
    $this->db->select('*');
    $this->db->from('tb_aturan');
    $this->db->where('penyakit', 1);
    $data = $this->db->get()->result();
    $hasil = "";
    foreach ($data as $rowku) {
      //P(H1|F)
      $hasil = $jumlah * $rowku->probabilitas;
    }
    return $hasil;
  }

  public function getProbTidak()
  {
    $this->db->select('*');
    $this->db->from('temporary_final');
    $this->db->where('penyakit', 2);
    $data = $this->db->get()->result();
    //inisialisasi untuk total probabilitas
    $jumlah = 1;
    foreach ($data as $row) {
      //perkalian antar setiap id_gejala x probabilitasnya
      $jumlah = $jumlah * $row->probabilitas;
    }
    $this->db->select('*');
    $this->db->from('tb_aturan');
    $this->db->where('penyakit', 2);
    $data = $this->db->get()->result();
    $hasil = "";
    foreach ($data as $rowku) {
      //P(H2|F)
      $hasil = $jumlah * $rowku->probabilitas;
    }
    return $hasil;
  }
  
  public function getProbSedang()
  {
    $this->db->select('*');
    $this->db->from('temporary_final');
    $this->db->where('penyakit', 3);
    $data = $this->db->get()->result();
    //inisialisasi untuk total probabilitas
    $jumlah = 1;
    foreach ($data as $row) {
      //perkalian antar setiap id_gejala x probabilitasnya
      $jumlah = $jumlah * $row->probabilitas;
    }
    $this->db->select('*');
    $this->db->from('tb_aturan');
    $this->db->where('penyakit', 3);
    $data = $this->db->get()->result();
    $hasil = "";
    foreach ($data as $rowku) {
      //P(H3|F)
      $hasil = $jumlah * $rowku->probabilitas;
    }
    return $hasil;
  }
  public function getProbBerat()
  {
    $this->db->select('*');
    $this->db->from('temporary_final');
    $this->db->where('penyakit', 4);
    $data = $this->db->get()->result();
    //inisialisasi untuk total probabilitas
    $jumlah = 1;
    foreach ($data as $row) {
      //perkalian antar setiap id_gejala x probabilitasnya
      $jumlah = $jumlah * $row->probabilitas;
    }
    $this->db->select('*');
    $this->db->from('tb_aturan');
    $this->db->where('penyakit', 4 );
    $data = $this->db->get()->result();
    $hasil = "";
    foreach ($data as $rowku) {
      //P(H4|F)
      $hasil = $jumlah * $rowku->probabilitas;
    }
    return $hasil;
  }


  public function insertTempFinal()
  {
    $query = "SELECT `tb_aturan`.`penyakit`,`tb_aturan`.`gejala`, `tb_aturan`.`probabilitas` from `tb_aturan` JOIN `temporary` ON `tb_aturan`.`gejala` = `temporary`.`id_gejala` ORDER BY `tb_aturan`.`penyakit` ASC";
    return $this->db->query($query)->result_array();
  }

  //fungsi hasilProb adalah untuk mengubah field hasil_probabilitas sebagai tempat
  //untuk menampung hasil/nilai perhitungan akhir daripada Metode Bayes
  //yang mana field hasil_probabilitas inilah yg akan diquery utk mengetahui penyakit apa

  public function hasilProbRingan($ringan)
  {
    $dataringan = [
      'hasil_probabilitas' => $ringan
    ];
    $this->db->where('penyakit', 1);
    $this->db->update('temporary_final', $dataringan);
  }

  public function hasilProbTidak($tidak)
  {
    $datatidak = [
      'hasil_probabilitas' => $tidak
    ];
    $this->db->where('penyakit', 2);
    $this->db->update('temporary_final', $datatidak);
  }

  public function hasilProbSedang($sedang)
  {
    $datasedang = [
      'hasil_probabilitas' => $sedang
    ];
    $this->db->where('penyakit', 3);
    $this->db->update('temporary_final', $datasedang);
  }

  public function hasilProbBerat($berat)
  {
    $dataBerat = [
      'hasil_probabilitas' => $berat
    ];
    $this->db->where('penyakit', 4);
    $this->db->update('temporary_final', $dataBerat);
  }

  //query ambil 3 penyakit tertinggi hasil_probabilitasnya
  public function diagnosis()
  {
    $query = "SELECT DISTINCT `penyakit`,`hasil_probabilitas`,`tb_tipe_kecanduan`.`nama_penyakit`
    FROM `temporary_final` JOIN `tb_tipe_kecanduan` ON `temporary_final`.`penyakit` = `tb_tipe_kecanduan`.`id_penyakit`
    ORDER BY `temporary_final`.`hasil_probabilitas` DESC LIMIT 3";
    return $this->db->query($query)->result_array();
  }

    //query ambil penyakit tertinggi yg menjadi penyakit utama daripada hasil diagnosa

  public function diagnosisMax()
  {
    $query = "SELECT `temporary_final`.`penyakit`, MAX(`hasil_probabilitas`) as `hasil_probabilitas`,`tb_tipe_kecanduan`.`nama_penyakit`, `tb_tipe_kecanduan`.`keterangan`,`tb_tipe_kecanduan`.`solusi` FROM `temporary_final` JOIN `tb_tipe_kecanduan` ON `temporary_final`.`penyakit` = `tb_tipe_kecanduan`.`nama_penyakit` GROUP BY `penyakit` ORDER BY `hasil_probabilitas` DESC LIMIT 1";
    return $this->db->query($query)->result_array();
  }

  public function detailDiagnosa()
  {
    $query = "SELECT `temporary_final`.`penyakit`, MAX(`hasil_probabilitas`) as `hasil_probabilitas`,`tb_tipe_kecanduan`.`nama_penyakit`, `tb_tipe_kecanduan`.`keterangan`,`tb_tipe_kecanduan`.`solusi` FROM `temporary_final` JOIN `tb_tipe_kecanduan` ON `temporary_final`.`penyakit` = `tb_tipe_kecanduan`.`id_penyakit` GROUP BY `id_penyakit` ORDER BY `hasil_probabilitas` DESC LIMIT 1";
    return $this->db->query($query)->result_array();
  }
  // End Menampilkan Hasil diagnosa 


  public function insertDaftarKonsult()
  {
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('user_id', $this->session->userdata('userid'));
    $data = $this->db->get()->result();
    foreach ($data as $row) {
      $nama = $row->name;
    }
    $kerusakan = $this->detailDiagnosa();
    foreach ($kerusakan as $k) {
      $kerusakannya = $k['nama_penyakit'];
      $nilai = floor($k['hasil_probabilitas'] * 100);
      $solusi = $k['solusi'];
    }
    $data = [
      'hasil_probabilitas' => $nilai,
      'penyakit' => $kerusakannya,
      'user' => $nama,
      'solusi' => $solusi,
      'waktu' =>  date("h:i:sa"),
      'tanggal' => date('Y-m-d'),

    ];
    return $this->db->insert('tb_hasil_diagnosa', $data);
  }

  public function get_all_keluhan($user)
    {
        $this->db->select('*');
        $this->db->from('tb_hasil_diagnosa');
        $this->db->where('user', $user);
        
        $query = $this->db->get();
        return $query ;
    
    }

    public function delete($id)
    {
        $this->db->where('id_hasil', $id);
        $this->db->delete('tb_hasil_diagnosa');
    }
  
}

?>