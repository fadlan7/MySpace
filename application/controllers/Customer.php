<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_customer');
        $this->load->model('m_auth');
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
                'title' => 'Register',
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
            $this->session->set_flashdata('regist', 'Register has been successfull !!');
            redirect('customer/register');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s are required!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s are required!!'
        ));


        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->customer_login->login($email, $password);
        }

        $data = array(
            'title' => 'Login',
            'isi' => 'v_customer_login'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function logout()
    {
        $this->customer_login->logout();
    }

    public function account()
    {
        //page protect
        $this->customer_login->page_protection();

        $data = array(
            'title' => 'My Account',
            'isi' => 'v_customer_account'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}
