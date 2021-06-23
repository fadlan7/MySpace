<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        
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
}
