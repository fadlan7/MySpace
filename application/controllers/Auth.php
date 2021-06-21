<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function user_login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s are required!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s are required!!'
        ));


        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->user_login->login($username, $password);
        }

        $data = array(
            'title' => 'User Login',
        );
        $this->load->view('v_user_login', $data, FALSE);
    }

    public function user_logout(){
        $this->user_login->logout();
    }
}
