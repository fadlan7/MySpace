<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_incoming_orders');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'total_products' => $this->m_admin->total_products(),
            'total_categories' => $this->m_admin->total_categories(),
            'isi' => 'v_admin'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }

    public function setting()
    {
        $this->form_validation->set_rules(
            'store_name',
            'Store Name',
            'required',
            array('required' => '%s Must be filled')
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'setting',
                'setting' => $this->m_admin->data_setting(),
                'isi' => 'v_setting'
            );
            $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
        } else {
            $data = array(
                'id' => 1,
                'location' => $this->input->post('city'),
                'store_name' => $this->input->post('store_name'),
                'address' => $this->input->post('address'),
                'tel' => $this->input->post('tel'),
            );
            $this->m_admin->edit($data);
            $this->session->set_flashdata('messages', 'Settings has been updated successfully !!');
            redirect('admin/setting');
        }
    }

    public function incoming_orders()
    {
        $data = array(
            'title' => 'Incoming Orders',
            'orders' => $this->m_incoming_orders->orders(),
            'order_processed' => $this->m_incoming_orders->order_processed(),
            'order_shipped' => $this->m_incoming_orders->order_shipped(),
            'isi' => 'v_incoming_orders'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }


    public function process($id_transaction)
    {
        $data = array(  
            'id_transaction ' => $id_transaction,
            'order_status' => '1'
        );
        $this->m_incoming_orders->order_updates($data);
        $this->session->set_flashdata('messages', 'Order successfully processed!!');
        redirect('admin/incoming_orders');
    }

    public function send_order($id_transaction)
    {
        $data = array(  
            'id_transaction ' => $id_transaction,
            'resi' => $this->input->post('resi'),            
            'order_status' => '2'
        );
        $this->m_incoming_orders->order_updates($data);
        $this->session->set_flashdata('messages', 'Order successfully shipped!!');
        redirect('admin/incoming_orders');
    }
}
