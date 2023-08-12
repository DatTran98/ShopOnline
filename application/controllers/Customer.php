<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {
    public function __construct()
    {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
                $this->load->helper('login_helper');
                $this->load->model("product_model");
                $this->load->model("users_model");
    }

	public function index()
	{
		if(_is_frontend_user_login($this)){
           
            $user_id = _get_current_user_id($this);
            $this->load->model("product_model");
            $data = array();
            $data["isCustomerPage"]= true;
            $data["orders"] = $this->product_model->get_sale_orders(" and sale.user_id = '".$user_id ."' ", " limit 10");
            $this->db->where('user_id =', $user_id);
            $count =$this->db->get("sale");
            $data["total_orders"]=$count->num_rows();

            $this->db->where('user_id =', $user_id);
            $this->db->where('status =', 0);
            $accept_orders =$this->db->get("sale");
            $data["accept_orders"] = $accept_orders->num_rows();
            $this->db->where('user_id =', $user_id);
            $this->db->where('status =', 1);
            $accept_orders1 =$this->db->get("sale");
            $data["accept_orders"] += $accept_orders1->num_rows();
           
            $this->db->where('user_id =', $user_id);
            $this->db->where('status =', 2);
            $delivery_orders =$this->db->get("sale");
            $data["delivery_orders"] = $delivery_orders->num_rows();

            $this->db->where('user_id =', $user_id);
            $this->db->where('status =', 3);
            $cancel_orders =$this->db->get("sale");
            $data["cancel_orders"]=$cancel_orders->num_rows();
        
            $this->load->view("frontend/customer",$data);
        }else{
            redirect("customer/login");
        }
    }
    
    function signout(){
        $this->session->sess_destroy();
        redirect("shopping");
    }
    
	public function login()
	{
        if(isset($_POST)){
            
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) 
            {
               if($this->form_validation->error_string()!=""){
                $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Cảnh báo!</strong> '.$this->form_validation->error_string().'
                            </div>';
                }
            }else
            {
                $q = $this->db->query("Select * from `registers` where (`user_email`='".$this->input->post("email")."') and user_password='".md5($this->input->post("password"))."'  Limit 1");
                
               // print_r($q) ; 
                if ($q->num_rows() > 0)
                {
                    $row = $q->row(); 
                    if($row->status == "0")
                    {
                        $data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Warning!</strong> Tài khoản của bạn chưa được kích hoạt.</div>';
                    }
                    else
                    {
                        $newdata = array(
                                               'user_name'  => $row->user_fullname,
                                               'user_email'     => $row->user_email,
                                               'logged_in' => TRUE,
                                               'user_id'=>$row->user_id,
                                               'socity_id'=>$row->socity_id
                                              );
                        $this->session->set_userdata($newdata);
                        redirect("shopping");
                     
                    }
                }
                else
                {
                    $data["error"] = '<div class="alert alert-danger alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>Cảnh báo!</strong> Sai tài khoản hoặc mật khẩu. </div>';
                }
            }
            $data["active"] = "login";
            $this->load->view("frontend/login",$data);
        }else{
              // $this->cart->destroy();
            $data["active"] = "login";
            $this->load->view("frontend/login",$data);
        }
    }

    public function register(){
        $data = array(); 
        // $_POST = $_REQUEST;      
        $this->load->library('form_validation');
        /* add registers table validation */
        $this->form_validation->set_rules('user_name', 'Họ tên', 'trim|required');
        $this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[registers.user_email]');
        $this->form_validation->set_rules('user_mobile', 'Số điện thoại', 'trim|required|is_unique[registers.user_phone]');
        $this->form_validation->set_rules('user_socity', 'Khu vực', 'trim|required');
        $this->form_validation->set_rules('user_address', 'Địa chỉ', 'trim');
        
        if ($this->form_validation->run() == FALSE) 
        {
            $data["error"] = strip_tags($this->form_validation->error_string());
            $data["socities"]  = $this->product_model->get_socities();
            $this->load->view("frontend/register",$data);
        }else
        {
            
            $this->db->insert("registers", array("user_phone"=>$this->input->post("user_mobile"),
                                    "user_fullname"=>$this->input->post("user_name"),
                                    "user_email"=>$this->input->post("email"),
                                    "user_password"=>md5($this->input->post("password")), 
                                    "socity_id"=>$this->input->post("user_socity"), 
                                    "house_no"=>$this->input->post("user_address"), 
                                    "status" => 1
                                    ));
            $user_id =  $this->db->insert_id();  
            $this->session->set_flashdata("message",'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Đăng ký!</strong> thành công. </div>');
            redirect("customer/login");
        }                  
        
    }     
    public function orders(){
        if(_is_frontend_user_login($this)){
            $user_id = _get_current_user_id($this);
            $data = array();
            $data["isCustomerPage"]= true;
            $this->load->model("product_model");
            $data["orders"] = $this->product_model->get_sale_orders(" and sale.user_id = '".$user_id ."' ");
            
            $this->load->view("frontend/customer_orders",$data);
        }else{
            redirect("shopping");
        }
    }

    public function cancle_order($order_id){
        if(_is_frontend_user_login($this)){
            $this->load->model("product_model");
            $order = $this->product_model->get_sale_order_by_id($order_id);
            if(!empty($order)){
                $this->db->query("update sale set status = 3 where sale_id = '".$order_id."'");
                $this->session->set_flashdata("message",'<div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Thành công!</strong> Đã hủy đơn đặt hàng. </div>');
            }
            redirect("customer/orders");
        }else{
            redirect("shopping");
        }
    }

    public function order_details($order_id){
        if(_is_frontend_user_login($this)){
            $data = array();
            $data["isCustomerPage"]= true;
            $this->load->model("product_model");
            $exists = $this->db->get_where('sale', array('sale_id' => $order_id));
            if($exists->num_rows() > 0 ){
            $data["order"] = $this->product_model->get_sale_order_by_id($order_id);
            $data["order_items"] = $this->product_model->get_sale_order_items($order_id);
            
            }else{
                $this->session->set_flashdata("message",'<div class="alert alert-danger alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                  <strong>Không tồn tại</strong> mã đơn hàng này. </div>');
            }
            $this->load->view("frontend/customer_orders_detail",$data);
        }else{
            redirect("shopping");
        }
    }

    function address(){
        if(_is_frontend_user_login($this)){
        
            $user_id = _get_current_user_id($this);
            $q = $this->db->query("Select user_location.*,
            socity.* from user_location 
            inner join socity on socity.socity_id = user_location.socity_id
            where user_location.user_id = '".$user_id."'");
            $data["addresses"] = $q->result();
            $data["isCustomerPage"]= true;
        $this->load->view("frontend/customer_address",$data);
        }else{
            redirect("shopping");
        }
    }

    public function delete_address()
	{
        if(_is_frontend_user_login($this)){
	    $this->load->library('form_validation');
                 $this->form_validation->set_rules('location_id', 'Location ID', 'trim|required');
       
        if ($this->form_validation->run() == FALSE)
        		{
                    $this->session->set_flashdata("message",'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Thất bại!</strong> Xóa địa chỉ nhận hàng. </div>');
        		}
       
	   else{
	        
            $this->db->delete("user_location",array("location_id"=>$this->input->post("location_id")));
             
            $this->session->set_flashdata("message",'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Thành công!</strong> Đã xóa địa chỉ nhận hàng. </div>');
        }
        redirect("customer/address");
        }else{
            redirect("shopping");
        }
    }

    function add_address(){
        if(_is_frontend_user_login($this)){
            $data["isCustomerPage"]= true;
            $user_id = _get_current_user_id($this);
    
            $this->load->library('form_validation');
            $this->form_validation->set_rules('receiver_name', 'Tên người nhận',  'trim|required');
            $this->form_validation->set_rules('receiver_mobile', 'Số điện thoại',  'trim|required');
            $this->form_validation->set_rules('socity_id', 'Khu vực',  'trim|required');
            $this->form_validation->set_rules('house_no', 'Địa chỉ',  'trim|required');
            $data["customer"] = $this->users_model->get_customer_by_id($user_id);
            $data["socities"]  = $this->product_model->get_socities();
            if ($this->form_validation->run() == FALSE) 
            {
                $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Cảnh báo!</strong> Kiểm tra lại thông tin.'.strip_tags($this->form_validation->error_string()).' </div>';
            }else
            {
                $socity_id = $this->input->post("socity_id");
                $house_no = $this->input->post("house_no");
                $receiver_name = $this->input->post("receiver_name");
                $receiver_mobile = $this->input->post("receiver_mobile");
                
                $array = array(
                "user_id" => $user_id,
                "socity_id" => $socity_id,
                "house_no" => $house_no,
                "receiver_name" => $receiver_name,
                "receiver_mobile" => $receiver_mobile
                );
                
                $this->db->insert("user_location",$array);
                $insert_id = $this->db->insert_id();
                $data["error"] = '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Thành công!</strong> Thêm địa chỉ nhận hàng. </div>';
            }
            $this->load->view("frontend/customer_add_address",$data);
        }else{
            redirect("shopping");
        }
    }
    public function edit_address($id){
        if(_is_frontend_user_login($this)){
            $data["isCustomerPage"]= true;
            $data["socities"]  = $this->product_model->get_socities();
            $data["location"] =$this->users_model->get_location_by_id($id);
            $this->load->view("frontend/customer_update_address",$data);
        }else{
            redirect("shopping");
        }
    }

    public function update_address(){
        if(_is_frontend_user_login($this)){
            $data = array(); 
            $data["isCustomerPage"]= true;
            $this->load->library('form_validation');
            $this->form_validation->set_rules('receiver_name', 'Tên người nhận',  'trim|required');
            $this->form_validation->set_rules('receiver_mobile', 'Số điện thoại',  'trim|required');
            $this->form_validation->set_rules('socity_id', 'Khu vực',  'trim|required');
            $this->form_validation->set_rules('house_no', 'Địa chỉ',  'trim|required');
            $this->form_validation->set_rules('location_id', 'Location ID', 'trim|required');
            
            $data["socities"]  = $this->product_model->get_socities();
            $data["location"] =$this->users_model->get_location_by_id($this->input->post("location_id"));
            if ($this->form_validation->run() == FALSE) 
            {
                $data["error"] = '<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Cảnh báo!</strong> Kiểm tra lại thông tin.'.strip_tags($this->form_validation->error_string()).' </div>';
            }else
            {
                $insert_array=  array(
                                        "socity_id"=>$this->input->post("socity_id"),
                                        "house_no"=>$this->input->post("house_no"),
                                        "receiver_name"=>$this->input->post("receiver_name"),
                                        "receiver_mobile"=>$this->input->post("receiver_mobile")
                                        );
                    
                $this->load->model("common_model");
                $this->common_model->data_update("user_location",$insert_array,array("location_id"=>$this->input->post("location_id")));
                    
                $data["error"] = '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Thành công!</strong> cập nhật địa chỉ nhận hàng. </div>'; 
                $data["location"] =$this->users_model->get_location_by_id($this->input->post("location_id"));
            }                  
        
            $this->load->view("frontend/customer_update_address",$data);
        }else{
            redirect("shopping");
        }
    }

    public function profile()
	{
        if(_is_frontend_user_login($this)){
            $user_id = _get_current_user_id($this);
            $data = array();
            $data["isCustomerPage"]= true;
            $this->load->model("users_model");
            $data["customer"] = $this->users_model->get_customer_by_id($user_id);
            $q = $this->db->query("Select user_location.*,
            socity.* from user_location 
            inner join socity on socity.socity_id = user_location.socity_id
            where user_location.user_id = '".$user_id."'");
            $data["addresses"] = $q->result();
            $this->load->view("frontend/customer_profile",$data);
        }else{
            redirect("shopping");
        }
    }

    public function update_profile(){
        $data = array(); 
        $this->load->library('form_validation');
        /* add users table validation */
        $user_id = _get_current_user_id($this);
        $this->form_validation->set_rules('user_fullname', 'Họ tên', 'trim|required');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('user_mobile', 'Số điện thoại', 'trim|required');
        $this->form_validation->set_rules('user_address', 'Địa chỉ', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) 
        {
        $this->session->set_flashdata("message",'<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Thất bại!</strong> Hãy kiểm tra lại thông tin.'.strip_tags($this->form_validation->error_string()).' </div>');
        redirect("customer/profile"); 
        }else
        {
            $insert_array=  array(
                                    "user_fullname"=>$this->input->post("user_fullname"),
                                    "user_email"=>$this->input->post("user_email"),
                                    "user_phone"=>$this->input->post("user_mobile"),
                                    "house_no"=>$this->input->post("user_address")
                                    );
            
            $this->load->model("common_model");
            if(isset($_FILES["avatar"]) && $_FILES["avatar"]["size"] > 0){
            $config['upload_path']          = './uploads/profile/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
                
                if ( ! $this->upload->do_upload('avatar'))
                {
                    $this->session->set_flashdata("message",'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <strong>Thất bại!</strong> Hãy kiểm tra lại file.'.strip_tags($this->form_validation->error_string()).' </div>');
                    redirect("customer/profile"); 
                }
                else
                {
                    $img_data = $this->upload->data();
                    $image_name = $img_data['file_name'];
                    $insert_array["user_image"]=$image_name;
                }
            } 
            
            $this->common_model->data_update("registers",$insert_array,array("user_id"=>$user_id));
            $this->session->set_flashdata("message",'<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <strong>Thành công!</strong> Chỉnh sửa thông tin cá nhân. </div>');
            redirect("customer/profile");   
        }                  
    
    }              

}