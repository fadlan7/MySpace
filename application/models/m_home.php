<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tb_product');
        $this->db->join('tb_category', 'tb_category.id_category = tb_product.id_category', 'left');
        $this->db->order_by('tb_product.id_product', 'desc');
        return $this->db->get()->result();
    }
}