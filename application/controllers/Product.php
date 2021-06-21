<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_product');
        $this->load->model('m_category');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Product',
            'product' => $this->m_product->get_all_data(),
            'isi' => 'product/v_product'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules(
            'product_name',
            'Product Name',
            'required',
            array('required' => '%s Must be filled')
        );
        $this->form_validation->set_rules(
            'id_category',
            'Category',
            'required',
            array('required' => '%s Must be filled')
        );
        $this->form_validation->set_rules(
            'price',
            'Price',
            'required',
            array('required' => '%s Must be filled')
        );
        $this->form_validation->set_rules(
            'description',
            'Description',
            'required',
            array('required' => '%s Must be filled')
        );


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/img/product/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "product_images";

            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Product',
                    'category' => $this->m_category->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'product/v_add_product'
                );
                $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/product' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'product_name' => $this->input->post('product_name'),
                    'id_category' => $this->input->post('id_category'),
                    'price' => $this->input->post('price'),
                    'description' => $this->input->post('description'),
                    'product_images' => $upload_data['uploads']['file_name'],
                );
                $this->m_product->add($data);
                $this->session->set_flashdata('messages', 'Product has been added successfully !!');
                redirect('product');
            }
        }

        $data = array(
            'title' => 'Add Product',
            'category' => $this->m_category->get_all_data(),
            'isi' => 'product/v_add_product'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }

    //Update one item
    public function update($id_product = NULL)
    {
        $this->form_validation->set_rules(
            'product_name',
            'Product Name',
            'required',
            array('required' => '%s Must be filled')
        );
        $this->form_validation->set_rules(
            'id_category',
            'Category',
            'required',
            array('required' => '%s Must be filled')
        );
        $this->form_validation->set_rules(
            'price',
            'Price',
            'required',
            array('required' => '%s Must be filled')
        );
        $this->form_validation->set_rules(
            'description',
            'Description',
            'required',
            array('required' => '%s Must be filled')
        );


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/img/product/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "product_images";

            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Product',
                    'category' => $this->m_category->get_all_data(),
                    'product' => $this->m_product->get_data($id_product),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'product/v_update_product'
                );
                $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
            } else {
                //delete images
                $product = $this->m_product->get_data($id_product);
                if ($product->product_images != "") {
                    unlink('./assets/img/product/' . $product->product_images);
                }

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/product/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_product' => $id_product,
                    'product_name' => $this->input->post('product_name'),
                    'id_category' => $this->input->post('id_category'),
                    'price' => $this->input->post('price'),
                    'description' => $this->input->post('description'),
                    'product_images' => $upload_data['uploads']['file_name'],
                );
                $this->m_product->update($data);
                $this->session->set_flashdata('messages', 'Product has been updated successfully !!');
                redirect('product');
            }
            //tanpa edit gambar
            $data = array(
                'id_product' => $id_product,
                'product_name' => $this->input->post('product_name'),
                'id_category' => $this->input->post('id_category'),
                'price' => $this->input->post('price'),
                'description' => $this->input->post('description'),
            );
            $this->m_product->update($data);
            $this->session->set_flashdata('messages', 'Product has been updated successfully !!');
            redirect('product');
        }

        $data = array(
            'title' => 'Edit Product',
            'category' => $this->m_category->get_all_data(),
            'product' => $this->m_product->get_data($id_product),
            'isi' => 'product/v_update_product'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }

    //Delete one item
    public function delete($id_product = NULL)
    {
        //delete images
        $product = $this->m_product->get_data($id_product);
        if ($product->product_images != "") {
            unlink('./assets/img/product/' . $product->product_images);
        }

        $data = array('id_product' => $id_product);
        $this->m_product->delete($data);
        $this->session->set_flashdata('messages', 'Product has been deleted successfully !!');
        redirect('product');
    }
}

/* End of file Product.php */
