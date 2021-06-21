<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_category');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Category',
            'category' => $this->m_category->get_all_data(),
            'isi' => 'v_category'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'category_name' => $this->input->post('category_name'),
        );
        $this->m_category->add($data);
        $this->session->set_flashdata('messages', 'Category has been added successfully !!');
        redirect('category');
    }

    //Update one item
    public function update($id_category = NULL)
    {
        $data = array(
            'id_category' => $id_category,
            'category_name' => $this->input->post('category_name'),
        );
        $this->m_category->update($data);
        $this->session->set_flashdata('messages', 'Category has been updated successfully !!');
        redirect('category');
    }

    //Delete one item
    public function delete($id_category = NULL)
    {
        $data = array('id_category' => $id_category );
        $this->m_category->delete($data);
        $this->session->set_flashdata('messages', 'Category has been deleted successfully !!');
        redirect('category');
    }
}

/* End of file Category.php */
