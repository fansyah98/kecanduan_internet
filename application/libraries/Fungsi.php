<?php
class Fungsi
{

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function user_login()
    {
        $this->CI->load->model('user_m');
        $user_id = $this->CI->session->userdata('userid');
        $user_data = $this->CI->user_m->get($user_id)->row();
        return $user_data;
    }

    

    public function count_gejala()
    {
        $this->CI->load->model('gejala_m');
        return $this->CI->gejala_m->get()->num_rows();
    }

    public function count_aturan()
    {
        $this->CI->load->model('aturan_m');
        return $this->CI->aturan_m->get()->num_rows();
    }

    public function count_kecanduan()
    {
        $this->CI->load->model('tipe_kecanduan_m');
        return $this->CI->tipe_kecanduan_m->get()->num_rows();
    }

    public function count_user()
    {
        $this->CI->load->model('user_m');
        return $this->CI->user_m->get()->num_rows();
    }
}
?>