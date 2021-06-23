<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function total_products(){
        return $this->db->get('tb_product')->num_rows();
        
    }

    public function total_categories(){
        return $this->db->get('tb_category')->num_rows();
        
    }
}
