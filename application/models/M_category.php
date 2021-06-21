<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_category extends CI_Model
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tb_category');
        $this->db->order_by('id_category', 'desc');
        return $this->db->get()->result();
    }

    public function add($data){
        $this->db->insert('tb_category', $data);
        
    }

    
    public function update($data){
        $this->db->where('id_category', $data['id_category']);
        $this->db->update('tb_category', $data);
    }

    public function delete($data){
        $this->db->where('id_category', $data['id_category']);
        $this->db->delete('tb_category', $data);
    }
}
