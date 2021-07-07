<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {

    public function register($data){
        $this->db->insert('tb_customer', $data);
        
    }
}

