<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_customer');
    }

    public function register()
    {
        $this->form_validation->set_rules(
            'full_name',
            'Full name',
            'required',
            array('required' => '%s Must be filled')
        );

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[tb_customer.email]',
            array(
                'required' => '%s Must be filled',
                'is_unique' => '%s has been registered'
            )
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s Must be filled')
        );

        $this->form_validation->set_rules(
            'retype_password',
            'Retype password',
            'required|matches[password]',
            array(
                'required' => '%s Must be filled',
                'matches' => '%s, Password doesn\'t matches!!'
            )
        );


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Customer',
                'isi' => 'v_regist'
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $data = array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            $this->m_customer->register($data);
            $this->session->set_flashdata('messages', 'Register has been successfull !!');
            redirect('customer/register');
        }
    }
}
