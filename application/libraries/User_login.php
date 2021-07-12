<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($username, $password)
    {
        $check = $this->ci->m_auth->user_login($username, $password);
        if ($check) {
            $full_name = $check->full_name;
            $username = $check->username;
            $user_level = $check->user_level;

            //session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('full_name', $full_name);
            $this->ci->session->set_userdata('user_level', $user_level);

            redirect('admin');
        } else {
            $this->ci->session->set_flashdata('incorrect_messages', 'Incorrect Username or Password');
            redirect('auth/user_login');
        }
    }

    public function page_protection()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('not_login_messages', 'you are not logged in !!');
            redirect('auth/user_login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('full_name');
        $this->ci->session->unset_userdata('user_level');
        // $this->ci->session->set_flashdata('messages', 'Logout successful !!');
        redirect('auth/user_login');
    }
}
