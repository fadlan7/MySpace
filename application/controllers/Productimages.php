<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productimages extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_productimages');
        $this->load->model('m_product');
    }


    public function index()
    {
        $data = array(
            'title' => 'Product Images',
            'productimages' => $this->m_productimages->get_all_data(),
            'isi' => 'productimages/v_index'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }

    public function add($id_product)
    {
        $this->form_validation->set_rules(
            'img_desc',
            'Image Description',
            'required',
            array('required' => '%s Must be filled')
        );


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/img/productimages/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "productimages";

            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Product Images',
                    'error_upload' => $this->upload->display_errors(),
                    'product' => $this->m_product->get_data($id_product),
                    'productimages' => $this->m_productimages->get_images($id_product),
                    'isi' => 'productimages/v_add'
                );
                $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/productimages/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_product' => $id_product,
                    'img_desc' => $this->input->post('img_desc'),
                    'product_images' => $upload_data['uploads']['file_name'],
                );
                $this->m_productimages->add($data);
                $this->session->set_flashdata('messages', 'Images has been added successfully !!');
                redirect('productimages/add/'.$id_product);
            }
        }

        $data = array(
            'title' => 'Add Product Images',
            'product' => $this->m_product->get_data($id_product),
            'productimages' => $this->m_productimages->get_images($id_product),
            'isi' => 'productimages/v_add'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }
}
