<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_order extends CI_Controller {

    public function index()
    {
        $data = array(
            'title' => 'My Orders',
            'isi' => 'v_myOrders'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    
    }

}
