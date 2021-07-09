<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($email, $password)
    {
        $check = $this->ci->m_auth->customer_login($email, $password);
        if ($check) {
            $id_customer = $check->id_customer;
            $full_name = $check->full_name;
            $email = $check->email;
            $photo = $check->photo;

            //session
            $this->ci->session->set_userdata('id_customer', $id_customer);
            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('full_name', $full_name);
            $this->ci->session->set_userdata('photo', $photo);

            redirect('home');
        } else {
            $this->ci->session->set_flashdata('error', 'Incorrect email or Password');
            redirect('customer/login');
        }
    }

    public function page_protection()
    {
        if ($this->ci->session->userdata('full_name') == '') {
            $this->ci->session->set_flashdata('error', 'you are not logged in !!');
            redirect('customer/login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('id_customer');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('full_name');
        $this->ci->session->unset_userdata('photo');
        $this->ci->session->set_flashdata('messages', 'Logout successful !!');
        redirect('customer/login');
    }
}
