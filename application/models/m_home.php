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

    public function get_all_data_category()
    {
        $this->db->select('*');
        $this->db->from('tb_category');
        $this->db->order_by('id_category', 'desc');
        return $this->db->get()->result();
    }

    public function category($id_category)
    {
        $this->db->select('*');
        $this->db->from('tb_category');
        $this->db->where('id_category', $id_category);
        return $this->db->get()->row();
    }

    public function get_all_data_product($id_category)
    {
        $this->db->select('*');
        $this->db->from('tb_product');
        $this->db->join('tb_category', 'tb_category.id_category = tb_product.id_category', 'left');
        $this->db->where('tb_product.id_category', $id_category);
        return $this->db->get()->result();
    }

    public function product_details($id_product){
        $this->db->select('*');
        $this->db->from('tb_product');
        $this->db->join('tb_category', 'tb_category.id_category = tb_product.id_category', 'left');
        $this->db->where('id_product', $id_product);
        return $this->db->get()->row();
    }

    public function product_images($id_product){
        $this->db->select('*');
        $this->db->from('tb_product_images');
        $this->db->where('id_product', $id_product);
        return $this->db->get()->result();
    }
}
