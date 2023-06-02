<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tipe_kecanduan_m extends CI_Model
{

    public function get($id = null )
    {
        $this->db->select('*');
        $this->db->from('tb_tipe_kecanduan');
        if ($id != null) {
            $this->db->where('id_penyakit', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function edit($post)
    {
        $params = [
            'kode_penyakit' => $post['kode_penyakit'],
            'nama_penyakit' => $post['nama_penyakit'],
            'keterangan' => $post['keterangan'],
            'solusi' => $post['solusi'],
        ];
        $this->db->where('id_penyakit', $post['id']);
        $this->db->update('tb_tipe_kecanduan', $params);

    }

    public function add($post)
    {
        $params = [
            'kode_penyakit' => $post['kode_penyakit'],
            'nama_penyakit' => $post['nama_penyakit'],
            'keterangan' => $post['keterangan'],
            'solusi' => $post['solusi'],
        ];
        $this->db->insert('tb_tipe_kecanduan', $params);
    }

    public function kode_unik(){
        $this->db->select('RIGHT(tb_tipe_kecanduan.id_penyakit,2) as id_penyakit' , FALSE);
        $this->db->order_by('id_penyakit', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('tb_tipe_kecanduan');
        if($query->num_rows() <> 0 ){
            $data = $query->row();
            $kode = intval($data->id_penyakit) + 1 ;
        }else{
            $kode = 1 ;
        }
        date_default_timezone_set("Asia/Jakarta");
        // $tgl = date('dmy');
        $batas = str_pad($kode , 3 , "0" , STR_PAD_LEFT);
        $kodetampil = "P". $batas;
        return $kodetampil;
    }

    public function delete($id)
    {
        $this->db->where('id_penyakit', $id);
        $this->db->delete('tb_tipe_kecanduan');
    }


}

?>