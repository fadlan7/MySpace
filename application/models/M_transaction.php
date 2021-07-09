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

    public function not_yet_paid()
    {
        $this->db->select('*');
        $this->db->from('tb_transaction');
        $this->db->where('id_customer', $this->session->userdata('id_customer'));
        $this->db->order_by('id_transaction', 'desc');
        return $this->db->get()->result();
    }

    public function transaction_detail($id_transaction)
    {
        $this->db->select('*');
        $this->db->from('tb_transaction');
        $this->db->where('id_transaction', $id_transaction);
        return $this->db->get()->row();
    }

    public function rekening(){
        $this->db->select('*');
        $this->db->from('tb_rekening');
        return $this->db->get()->result();
    }

    public function proof_payments($data){
        $this->db->where('id_transaction', $data['id_transaction']);
        $this->db->update('tb_transaction', $data);
    }
}
