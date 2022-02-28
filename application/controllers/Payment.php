<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class Payment extends CI_Controller {
    
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
       $this->load->library('cart');
    }
    
    public function index()
    {
        $this->load->view('frontend/checkout');
    }
    
    public function handlePayment()
    {
        require_once('application/libraries/stripe-php/init.php');
    
        $sale_id=$this->input->post('sale_id');
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

        \Stripe\Charge::create ([
                "amount" => ($this->input->post('total_payment')),
                "currency" => "vnd",
                "source" => $this->input->post('stripeToken'),
                "description" => "Thanh toán đơn hàng mã: ".$sale_id
        ]);

        $this->db->query("Update sale set is_paid = 1 where sale_id =".$sale_id);
        $this->cart->destroy();
        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Thành công!</strong> Thanh toán đơn hàng. </div>');
             
        redirect("shopping/cart");
    }
}