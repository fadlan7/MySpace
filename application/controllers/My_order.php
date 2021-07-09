<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_order extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaction');
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'My Orders',
            'not_yet_paid' => $this->m_transaction->not_yet_paid(),
            'isi' => 'v_myOrders'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    
    }

}
