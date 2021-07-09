<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_incoming_orders extends CI_Model
{

    public function orders()
    {
        $this->db->select('*');
        $this->db->from('tb_transaction');
        $this->db->where('order_status=0');
        $this->db->order_by('id_transaction', 'desc');
        return $this->db->get()->result();
    }

    public function order_updates($data){
        $this->db->where('id_transaction', $data['id_transaction']);
        $this->db->update('tb_transaction', $data);
    }

    public function order_processed()
    {
        $this->db->select('*');
        $this->db->from('tb_transaction');
        $this->db->where('order_status=1');
        $this->db->order_by('id_transaction', 'desc');
        return $this->db->get()->result();
    }
}
