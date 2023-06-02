<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
      public function login($post)
    {
        $this->db->select('*');
        $this->db->from('tb_user', 'acs');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null )
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('tb_user');
    }

    public function registrasi($post)
    {
        $data['username'] = $post['username'];
        $data['password'] = sha1($post['password']);
        $data['name'] = $post['name'];
        $data['alamat']  = $post['alamat'] != '' ? $post['alamat'] : null;
        $data['level'] = 2;
        $this->db->insert('tb_user', $data);
    }
}

?>