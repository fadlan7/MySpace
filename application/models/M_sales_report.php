<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_sales_report extends CI_Model
{

  public function daily_report($date, $month, $year)
  {
    $this->db->select('*');
    $this->db->from('tb_transaction_details');
    $this->db->join('tb_transaction', 'tb_transaction.no_order = tb_transaction_details.no_order', 'left');
    $this->db->join('tb_product', 'tb_product.id_product = tb_transaction_details.id_product', 'left');
    $this->db->where('DAY(tb_transaction.date_order)', $date);
    $this->db->where('MONTH(tb_transaction.date_order)', $month);
    $this->db->where('YEAR(tb_transaction.date_order)', $year);
    $this->db->where('order_status = 1');

    return $this->db->get()->result(); 
  }

  public function Monthly_report( $month, $year)
  {
    $this->db->select('*');
    $this->db->from('tb_transaction'); 
    $this->db->where('MONTH(date_order)', $month);
    $this->db->where('YEAR(date_order)', $year);
    $this->db->where('order_status = 1');
    

    return $this->db->get()->result(); 
  }

  public function Yearly_report($year)
  {
    $this->db->select('*');
    $this->db->from('tb_transaction'); 
    $this->db->where('YEAR(date_order)', $year);
    $this->db->where('order_status = 1');
    

    return $this->db->get()->result(); 
  }
}
