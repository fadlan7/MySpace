<?php



defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    // List all your items
    public function index($offset = 0)
    {
        $data = array(
            'title' => 'User',
            'user' => $this->m_user->get_all_data(),
            'isi' => 'v_user'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'full_name' => $this->input->post('full_name'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'user_level' => $this->input->post('user_level'),
        );
        $this->m_user->add($data);
        $this->session->set_flashdata('messages', 'User has been added successfully !!');
        redirect('user');
    }

    //Update one item
    public function update($id_user = NULL)
    {
        $data = array(
            'id_user' => $id_user,
            'full_name' => $this->input->post('full_name'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'user_level' => $this->input->post('user_level'),
        );
        $this->m_user->update($data);
        $this->session->set_flashdata('messages', 'User has been updated successfully !!');
        redirect('user');
    } 

    //Delete one item
    public function delete($id_user = NULL)
    {
        $data = array('id_user' => $id_user );
        $this->m_user->delete($data);
        $this->session->set_flashdata('messages', 'User has been deleted successfully !!');
        redirect('user');
    }
}
