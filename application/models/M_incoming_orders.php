<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_incoming_orders extends CI_Model
{

    public function orders()
    {
        $this->db->select('*');
        $this->db->from('tb_transaction');
        // $this->db->where('payment_status=1');
        $this->db->order_by('id_transaction', 'desc');
        return $this->db->get()->result();
        
    }
}
