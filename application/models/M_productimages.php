<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_productimages extends CI_Model
{

    public function get_all_data()
    {
        $this->db->select('tb_product.*,COUNT(tb_product_images.id_product) AS number_of_images');
        $this->db->from('tb_product');
        $this->db->join('tb_product_images', 'tb_product_images.id_product = tb_product.id_product', 'left');
        $this->db->group_by('tb_product.id_product');
        $this->db->order_by('tb_product.id_product', 'desc');
        return $this->db->get()->result();
    }

    public function get_images($id_product){
        $this->db->select('*');
        $this->db->from('tb_product_images');
        $this->db->where('id_product', $id_product);
        return $this->db->get()->result();
    }

    public function add($data){
        $this->db->insert('tb_product_images', $data);
    }

    public function delete($data){
        $this->db->where('id_images', $data['id_images']);
        $this->db->delete('tb_product_images', $data);
    }
}