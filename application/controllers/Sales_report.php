<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Sales_report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sales_report');
    }


    public function index()
    {
        $data = array(
            'title' => 'Sales Report',
            'isi' => 'backend/v_sales_report'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }

    public function daily()
    {
        $date = $this->input->post('date');
        $month = $this->input->post('month');
        $year = $this->input->post('year');

        $data = array(
            'title' => 'Daily Sales Report',
            'date' => $date,
            'month' => $month,
            'year' => $year,
            'daily_report' => $this->m_sales_report->daily_report($date, $month, $year),
            'isi' => 'backend/v_daily_sales_report'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }

    public function monthly()
    {
        $month = $this->input->post('month');
        $year = $this->input->post('year');

        $data = array(
            'title' => 'Monthly Sales Report',
            'month' => $month,
            'year' => $year,
            'monthly_report' => $this->m_sales_report->monthly_report( $month, $year),
            'isi' => 'backend/v_monthly_sales_report'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }

    public function yearly()
    {
        $year = $this->input->post('year');

        $data = array(
            'title' => 'Yearly Sales Report',
            'year' => $year,
            'yearly_report' => $this->m_sales_report->yearly_report($year),
            'isi' => 'backend/v_yearly_sales_report'
        );
        $this->load->view('layout/backend/v_wrapper_backend', $data, FALSE);
    }    
}
