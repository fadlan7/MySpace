<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'product' => $this->m_home->get_all_data(),
            'isi' => './frontend/v_home'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function category($id_category)
    {
        $category = $this->m_home->category($id_category);
        $data = array(
            'title' => $category->category_name,
            'product' => $this->m_home->get_all_data_product($id_category),
            'isi' => './frontend/v_category_fe'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function product_details($id_product){
        $data = array(
            'title' => 'Product Details',
            'images' => $this->m_home->product_images($id_product),
            'product' => $this->m_home->product_details($id_product),
            'isi' => './frontend/v_detail_fe'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
}
