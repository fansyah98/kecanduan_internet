<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    function __construct()
	{
    	parent::__construct();
		$this->load->model('user_m');  
		$this->load->library('form_validation');
     
        
    }
	
	public function login()
	{
		// check_not_login();
		check_already_login();
	    $this->load->view('login');
	}
	public function registrasi()
	{
		

		//mendeklarasikan from validation
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('username', 'username', 'required|min_length[5]|is_unique[tb_user.username]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[5]');
		$this->form_validation->set_rules(
			'passconf',
			'passconf',
			'required|min_length[5]|matches[password]',
			array('matches' => '%s Password tidak sesuai ')
		);

		 //jika form di jalan kan nilai nya salah maka 
		 if ($this->form_validation->run() == FALSE) {
			//load kemabali template  nya
			$this->load->view('registrasi_user');
			//jika nilai nya benar 
		} else {

			//maka buat variabel post dan nilai nya benar
			$post = $this->input->post(null, TRUE);
			$this->user_m->registrasi($post);
			//jika data benar maka data di extrac 
			if ($this->db->affected_rows() > 0) {
				// dan di tampilkan pesan sukses
				echo "<script> 
					alert('selamat akun anda berhasil dibuat !!');
					window.location='" . site_url('auth/login') . "';
				</script>";
			}
			//dan di arahkan lagi ke menu data user
			// redirect('auth/login');
		}

	}

	public function process()
	{
        $post = $this->input->post(null, TRUE);
		if (isset($_POST['login'])) {
			$this->load->model('user_m', 'user');
			$query = $this->user->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'userid' => $row->user_id,
					'level'  => $row->level
				);
				$this->session->set_userdata($params);
				echo "<script> 
                    alert('Selamat Login Anda Berhasil ');
                    window.location='" . site_url('dashboard') . "';
                </script>";
			} else {
				echo "<script> 
                alert('Login gagal , Username / password salah');
                window.location='" . site_url('auth/login') . "';
            </script>";
			}
		}

    }

    public function logout()
	{
		$params = array(
			'userid',
			'level'
		);
		$this->session->unset_userdata($params);
		echo "<script> 
		alert('anda berhasil keluar');
		window.location='" . site_url('auth/login') . "';
		</script>";
				// $this->session->set_flashdata('success', 'anda berhasil keluar!!');
				// redirect('auth/login');
	}
      
 
}
