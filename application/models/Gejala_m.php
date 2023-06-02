<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gejala_m extends CI_Model
{

  
    public function get_id($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_gejala');
        $this->db->join('tb_tipe_kecanduan', 'tb_tipe_kecanduan.id_penyakit = tb_gejala.penyakit');

        if ($id != null) {
            $this->db->where('id_gejala', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('tb_gejala');
        $this->db->join('tb_tipe_kecanduan', 'tb_tipe_kecanduan.id_penyakit = tb_gejala.penyakit');

        if ($id != null) {
            $this->db->where('id_gejala', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'kode_gejala' => $post['kode_gejala'],
            'nama_gejala' => $post['nama_gejala'],
            'penyakit' => $post['penyakit'],
            'nilai' => $post['probabilitas'],
        ];
        $this->db->insert('tb_gejala', $params);
    }

    public function kosongkanTemp()
  {
    return $this->db->truncate('temporary');
  }

  public function kosongkanTempFinal()
  {
    return $this->db->truncate('temporary_final');
  }

    public function edit($post)
    {
        $params = [
            'kode_gejala' => $post['kode_gejala'],
            'nama_gejala' => $post['nama_gejala'],
            'penyakit' => $post['penyakit'],
            'nilai' => $post['probabilitas'],
        ];
        $this->db->where('id_gejala', $post['id']);
        $this->db->update('tb_gejala', $params);

    }

    public function delete($id)
    {
        $this->db->where('id_gejala', $id);
        $this->db->delete('tb_gejala');
    }

 

}

?>