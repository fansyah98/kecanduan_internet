<?php
function check_already_login()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('userid');
    if ($user_session) {
        redirect('dashboard');
    }
}

function check_not_login()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('userid');
    if (!$user_session) {
        redirect('auth/login');
    }
}

function check_admin()
{
    $CI = &get_instance();
    // load library dari function fungsi
    $CI->load->library('fungsi');
    if($CI->fungsi->user_login()->level != 1 ) {
        echo "<script> 
                    alert('Maaf Akses Anda di tolak ');
                    window.location='" . site_url('dashboard') . "';
                </script>";
    }

}

?>