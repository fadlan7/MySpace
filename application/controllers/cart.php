<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_transaction');
    }

    public function index()
    {
        if (empty($this->cart->contents())) {
            redirect('home');
        }
        $data = array(
            'title' => 'Shopping Cart',
            'isi' => 'v_cart'
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');

        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
        );

        $this->cart->insert($data);

        redirect($redirect_page, 'refresh');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('cart');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {

            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]'),
            );
            $this->cart->update($data);
            $i++;
        }
        redirect('cart');
    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('cart');
    }

    public function checkout()
    {
        //page protect
        $this->customer_login->page_protection();

        $this->form_validation->set_rules(
            'province',
            'Province',
            'required',
            array('required' => '%s Must be filled')
        );

        $this->form_validation->set_rules(
            'city',
            'City',
            'required',
            array('required' => '%s Must be filled')
        );

        $this->form_validation->set_rules(
            'courier',
            'Courier',
            'required',
            array('required' => '%s Must be filled')
        );

        $this->form_validation->set_rules(
            'delivery',
            'Delivery',
            'required',
            array('required' => '%s Must be filled')
        );



        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Checkout',
                'isi' => 'v_checkout'
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $data = array(
                'no_order' => $this->input->post('no_order'),
                'date_order' => $this->input->post('date_order'),
                'recipient_name' => $this->input->post('recipient_name'),
                'tel' => $this->input->post('tel'),
                'province' => $this->input->post('province'),
                'city' => $this->input->post('city'),
                'address' => $this->input->post('address'),
                'postal_code' => $this->input->post('postal_code'),
                'courier' => $this->input->post('courier'),
                'delivery' => $this->input->post('delivery'),
                'shipping' => $this->input->post('shipping'),
                'estimation' => $this->input->post('estimation'),
                'weight' => $this->input->post('weight'),
                'subtotal' => $this->input->post('subtotal'),
                'payment_status' => '0',
                'order_status' => '0',
            );
            $this->m_transaction->save_transaction($data);
            $this->session->set_flashdata('message', 'Order successfully processed!!');
            redirect('my_order', 'refresh');
        }
    }
}
