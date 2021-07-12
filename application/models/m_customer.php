<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {

    public function register($data){
        $this->db->insert('tb_customer', $data);
        
    }

    public function get_data($id_customer)
    {
        $this->db->select('*');
        $this->db->from('tb_customer');
        $this->db->where('id_customer', $id_customer);
        return $this->db->get()->row();
    }

    public function update($data){
        $this->db->where('id_customer', $data['id_customer']);
        $this->db->update('tb_customer', $data);
    }
}

