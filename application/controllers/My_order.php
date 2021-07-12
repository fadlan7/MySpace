<?php

defined('BASEPATH') or exit('No direct script access allowed');

class My_order extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaction');
        $this->load->model('m_incoming_orders');
        
    }


    public function index()
    {
        $data = array(
            'title' => 'My Orders',
            'not_yet_paid' => $this->m_transaction->not_yet_paid(),
            'processed' => $this->m_transaction->processed(),
            'shipped' => $this->m_transaction->shipped(),
            'completed' => $this->m_transaction->completed(),
            'isi' => './frontend/v_myOrders'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function pay($id_transaction)
    {
        $this->form_validation->set_rules(
            'in_the_name_of',
            'Name',
            'required',
            array('required' => '%s Must be filled')
        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/img/payment/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '5000';
            $this->upload->initialize($config);
            $field_name = 'proof_payment';

            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Payment',
                    'orders' => $this->m_transaction->transaction_detail($id_transaction),
                    'rekening' => $this->m_transaction->rekening(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => './frontend/v_payment'
                );
                $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/payment/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_transaction' => $id_transaction,
                    'in_the_name_of' => $this->input->post('in_the_name_of'),
                    'bank_name' => $this->input->post('bank_name'),
                    'no_rek' => $this->input->post('no_rek'),
                    'payment_status' => '1',
                    'proof_payment' => $upload_data['uploads']['file_name'],
                );
                $this->m_transaction->proof_payments($data);
                $this->session->set_flashdata('messages', 'proof of payment has been uploaded successfully!!');
                redirect('my_order');
            }
        }

        $data = array(
            'title' => 'Payment',
            'orders' => $this->m_transaction->transaction_detail($id_transaction),
            'rekening' => $this->m_transaction->rekening(),
            'isi' => './frontend/v_payment'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function order_received($id_transaction){
        $data = array(  
            'id_transaction ' => $id_transaction,         
            'order_status' => 3
        );
        $this->m_transaction->order_finished($data);
        $this->session->set_flashdata('messages', 'Order Has Been Received!!');
        redirect('my_order');
    }
}
