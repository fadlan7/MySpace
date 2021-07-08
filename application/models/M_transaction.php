<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_transaction extends CI_Model
{

    public function save_transaction($data)
    {
        $this->db->insert('tb_transaction', $data);
    }

    public function save_transaction_details($details)
    {
        $this->db->insert('tb_transaction_details', $details);
    }
}
