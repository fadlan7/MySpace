<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_product extends CI_Model
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tb_product');
        $this->db->join('tb_category', 'tb_category.id_category = tb_product.id_category', 'left');
        $this->db->order_by('tb_product.id_product', 'desc');
        return $this->db->get()->result();
    }

    public function get_data($id_product)
    {
        $this->db->select('*');
        $this->db->from('tb_product');
        $this->db->join('tb_category', 'tb_category.id_category = tb_product.id_category', 'left');
        $this->db->where('id_product', $id_product);
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('tb_product', $data);
        
    }

    
    public function update($data){
        $this->db->where('id_product', $data['id_product']);
        $this->db->update('tb_product', $data);
    }

    public function delete($data){
        $this->db->where('id_product', $data['id_product']);
        $this->db->delete('tb_product', $data);
    }
}
