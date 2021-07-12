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
                'isi' => './frontend/v_regist'
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
            'title' => 'Sign In',
            'isi' => './frontend/v_customer_login'
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
            // 'customer' => $this->m_customer->get_data(),    
            'isi' => './frontend/v_customer_account'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function update($id_customer = NULL)
    {
        $this->form_validation->set_rules(
            'full_name',
            'Full Name',
            'required',
            array('required' => '%s Must be filled')
        );


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/img/customer/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "photo";

            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'customer' => $this->m_customer->get_data($id_customer),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => './frontend/v_customer_account'
                );
                $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
            } else {
                //delete images
                $customer = $this->m_customer->get_data($id_customer);
                if ($customer->photo != "") {
                    unlink('./assets/img/customer/' . $customer->photo);
                }

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/customer/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_customer' => $id_customer,
                    'full_name' => $this->input->post('full_name'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'photo' => $upload_data['uploads']['file_name'],
                );
                $this->m_customer->update($data);
                // $this->session->set_flashdata('messages', 'My Account has been updated successfully !!');
                redirect('customer/account');
            }
            //tanpa edit gambar
            $data = array(
                'id_customer' => $id_customer,
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            $this->m_customer->update($data);
            // $this->session->set_flashdata('messages', 'My Account has been updated successfully !!');
            redirect('customer/account');
        }

        $data = array(
            'customer' => $this->m_customer->get_data($id_customer),
            'isi' => './frontend/v_customer_account'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}
