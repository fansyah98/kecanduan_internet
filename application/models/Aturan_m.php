<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aturan_m extends CI_Model
{

    public function get($id = null )
    {
        $this->db->select('*');
        $this->db->from('tb_aturan');
        $this->db->join('tb_gejala', 'tb_gejala.id_gejala = tb_aturan.gejala');
        $this->db->join('tb_tipe_kecanduan', 'tb_tipe_kecanduan.id_penyakit = tb_aturan.penyakit');
        $this->db->order_by('id_rule', 'asc');
        if ($id != null) {
            $this->db->where('id_rule', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
   {
    $probabilitas = $this->input->post('probabilitas');
    if ($probabilitas == 0) {
      $probabilitas = 0.00001;
    }
    $data = [
      'penyakit' => $this->input->post('penyakit'),
      'gejala' => $this->input->post('gejala'),
      'probabilitas' => $probabilitas
    ];
    $this->db->insert('tb_aturan', $data);
   }

    public function edit($post)
    {
         $probabilitas = $this->input->post('probabilitas');
        if ($probabilitas == 0) {
            $probabilitas = 0.00001;
        }
        $data = [
            'penyakit' => $this->input->post('penyakit'),
            'gejala' => $this->input->post('gejala'),
            'probabilitas' => $probabilitas
        ];
        $this->db->where('id_rule', $post['id']);
        $this->db->update('tb_aturan', $data);

    }
 

    public function delete($id)
    {
        $this->db->where('id_rule', $id);
        $this->db->delete('tb_aturan');
    }


}

?>