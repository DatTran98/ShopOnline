<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->helper('login_helper');
        $this->load->model("product_model");
    }
	public function index()
	{
        $data["products"]  = $this->product_model->get_products();
        $data["isCartPage"]  = false;
        $this->load->view("frontend/index",$data);
    }

    public function cart()
	{
        $data["products"]  = $this->product_model->get_products();
        $data["isCartPage"]  = true;
        $this->load->view("frontend/cart",$data);
    }
    
    public function add_to_cart()
	{       
        $product_id = $this->input->post("product_id");
        $data = $this->product_model->get_product_by_id($product_id);
        echo json_encode($data);
    }
}