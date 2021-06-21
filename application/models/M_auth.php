<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{

    public function user_login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where(array(
            'username' => $username, 
            'password' => $password
        ));
        return $this->db->get()->row();
    }
}
