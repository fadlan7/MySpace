<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function total_products()
    {
        return $this->db->get('tb_product')->num_rows();
    }

    public function total_categories()
    {
        return $this->db->get('tb_category')->num_rows();
    }

    public function data_setting()
    {
        $this->db->select('*');
        $this->db->from('tb_rajaongkir');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tb_rajaongkir', $data);
    }
}
