<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->helper('login_helper');
        $this->load->model("product_model");
        $this->load->library('cart');
    }
	public function index()
	{
        $data["isCustomerPage"]= false;
        $data["products"]  = $this->product_model->get_products();
        $data["isCartPage"]  = false;
        $this->load->view("frontend/index",$data);
    }

	public function product()
	{
        $search = $this->input->get("search");
        $data["isCustomerPage"]= false;
        $this->load->model("category_model");
        $data["categories"] = $this->category_model->get_categories();
        $data["products"]  = $this->product_model->get_products("", $search);
        $data["isProductPage"]  = true;
        $this->load->view("frontend/product",$data);
    }
    
    public function search_category($category_id)
	{
        $data["isCustomerPage"]= false;
        $this->load->model("category_model");
        $data["categories"] = $this->category_model->get_categories();
        $data["products"]  = $this->product_model->get_products($category_id, "");
        $data["isProductPage"]  = true;
        $this->load->view("frontend/product",$data);
    }

    public function cart()
	{
        $data["isCustomerPage"]= true;
        $data["products"]  = $this->product_model->get_products();
        $data["isCartPage"]  = true;
        $data["socities"]  = $this->product_model->get_socities();
        $data["total_payment"]  = $this->cart->total();
        if(_is_frontend_user_login($this)){
        $user_socity = $this->product_model->get_socity_by_id(_get_current_user_socity_id($this));
        $data["user_socity"] = $user_socity;
        $user_id = _get_current_user_id($this);
                    
            $q = $this->db->query("Select user_location.*,
            socity.* from user_location 
            inner join socity on socity.socity_id = user_location.socity_id
            where user_id = '".$user_id."'");
            $data["user_address"] = $q->result();
       

            $query = $this->db->query("Select user_location.*,
            socity.* from user_location 
            inner join socity on socity.socity_id = user_location.socity_id
            where user_id = '".$user_id."'");
        $data["user_address"] = $query->result();
        $data["total_payment"] += $user_socity->delivery_charge;
        }
        
        $this->load->view("frontend/cart",$data);
    }
    
    public function add_to_cart()
	{       
        $product_id = $this->input->post("product_id");
        $data = $this->product_model->get_product_by_id($product_id);
        if($data->in_stock>=1){
            $dataCart = array(
                'id'      => $data->product_id,
                'qty'     => $data->in_stock,
                'price'   => $data->price,
                'name'    => $data->product_name,
                'image'   => $data->product_image,
                'description' => $data->product_description,
                'category' => $data->title,
                'unit' => $data->title,
                'unit_value' => $data->title
            );
            $this->cart->insert($dataCart);
        }
        
        echo json_encode($this->cart->total_items());
    }

    public function update_cart()
	{       
        $row_id = $this->input->post("row_id");
        $quantity = $this->input->post("quantity");

        $data = array(
            'rowid' => $row_id,
            'qty' => $quantity,
            );
        $this->cart->update($data);
        redirect('shopping/cart');
    }

    public function delete_cart_item()
	{       
        $row_id = $this->input->post("row_id_delete");
        $this->cart->remove($row_id);
        redirect('shopping/cart');
    }

    function send_order(){
        if(_is_frontend_user_login($this)){
             $data["isCartPage"]  = true;
            $this->load->library('form_validation');
            $this->form_validation->set_rules('date', 'Ngày dự kiến nhận hàng',  'trim|required');
            $this->form_validation->set_rules('time', 'Thời gian giao hàng',  'trim|required');
            $this->form_validation->set_rules('location_id', 'Địa chỉ nhận hàng',  'trim|required');
            $this->form_validation->set_rules('payment_radio', 'Phương thức thanh toán',  'trim|required');

            if ($this->form_validation->run() == FALSE) 
            {
                $this->session->set_flashdata("message",'<div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Cảnh báo!</strong> Kiểm tra lại dữ liệu:'.strip_tags($this->form_validation->error_string()).' </div>');
                redirect("shopping/cart");
            }else
            {
                $payment_radio = $this->input->post("payment_radio");

                if($this->cart->total_items()==0){
                    $this->session->set_flashdata("message",'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Cảnh báo!</strong> Không có sản phẩm trong giỏ hàng </div>');
                    redirect("shopping/cart");
                }

                $user_id = _get_current_user_id($this);
                $ld = $this->db->query("select user_location.*, socity.* from user_location
                inner join socity on socity.socity_id = user_location.socity_id
                where user_location.location_id = '".$this->input->post("location_id")."' limit 1");
                $location = $ld->row(); 

                $total_payment = $this->input->post("total_payment");
                $date = date("Y-m-d", strtotime($this->input->post("date")));
                $times = explode('-',$this->input->post("time"));
                $fromtime = date("H:i:s",strtotime(trim($times[0]))) ;
                $totime = date("H:i:s",strtotime(trim($times[1])));
                
                $insert_array = array("user_id"=>$user_id,
                "on_date"=>$date,
                "delivery_time_from"=>$fromtime,
                "delivery_time_to"=>$totime,
                "delivery_address"=>$location->house_no."\n, ".$location->house_no,
                "socity_id" => $location->socity_id, 
                "delivery_charge" => $location->delivery_charge,
                "location_id" => $location->location_id,
                "total_amount" => $total_payment
                );

                $this->load->model("common_model");
                $id = $this->common_model->data_insert("sale",$insert_array); 
                $total_price = 0;
                $total_kg = 0;
                $total_price = $this->cart->total();
                $total_items= $this->cart->total_items();
                foreach($this->cart->contents() as $dt){
                    $qty_in_kg = $dt['qty']; 
                    if($dt['unit']=="Gram"){
                        $qty_in_kg =  ($dt['qty'] * $dt['unit_value']) / 1000;     
                    }
                
                    $total_kg = $total_kg + $qty_in_kg;
                    
                    $array = array(
                    "sale_id"=>$id,
                    "product_id"=>$dt['id'],
                    "product_name"=>$dt['name'],
                    "qty"=>$dt['qty'],
                    "unit"=>$dt['unit'],
                    "unit_value"=>$dt['unit_value'],
                    "price"=>$dt['price'],
                    "qty_in_kg"=>$qty_in_kg
                    );
                    $this->common_model->data_insert("sale_items",$array);
                        
                    }

                $this->db->query("Update sale set total_kg = '".$total_kg."', total_items = '".$total_items."' where sale_id = '".$id."'");
                if($payment_radio==0){
                    $this->cart->destroy();
                    $this->session->set_flashdata("message",'<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Thành công!</strong> Đã đặt hàng thành công.<br>
                    Hãy thanh toán <strong>"'.$total_payment.' vnd"</strong> cho đơn vị vận chuyển.<br>
                    Cám ơn bạn đã mua hàng.</div>');
                    redirect("shopping/cart");
                }else{
                    $data['total_payment'] = $total_payment;
                    $data['sale_id'] = $id;
                    $this->load->view("frontend/checkout",$data);
                }
            }
        }else{
            redirect("customer/login");
        }
    }    

}