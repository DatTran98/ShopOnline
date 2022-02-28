<?php
class Users_model extends CI_Model{
    public function get_users($filter=array()){
        $filter = "";
        if(!empty($filter))
        {
            if(key_exists("user_type")){
                $filter .=" and users.user_type_id = '".$filter["user_type"]."'";
            }
            if(key_exists("status")){
                $filter .=" and users.user_status = '".$filter["status"]."'";
            }
        }
        $q = $this->db->query("select * from users where 1 ".$filter);
        return $q->result();
    }

    public function get_alluser(){
        $q = $this->db->query("select * from users where user_type_id = 0 ");
        return $q->result();
    }

    public function get_user_by_id($id){
        $q = $this->db->query("select * from users where  user_id = '".$id."' limit 1");
        return $q->row();
    }

    public function get_user_type(){
        $q = $this->db->query("select * from user_types");
        return $q->result();
    }

    public function get_user_type_id($id){
        $q = $this->db->query("select * from user_types where user_type_id = '".$id."'");
        return $q->row();
    }
    // public function get_user_type_access($type_id){
    //     $q = $this->db->query("select * from user_type_access where user_type_id = '".$type_id."'");
    //     return $q->result();
    // }

    public function get_customer_by_id($id){
        $q = $this->db->query("select * from registers inner join socity on registers.socity_id = socity.socity_id  where  registers.user_id = '".$id."' limit 1");
        return $q->row();
    }

    public function get_location_by_id($id){
        $query = $this->db->get_where('user_location', array('location_id' => $id));
        return $query->row();
    }

    function get_all_users(){
        $sql = "Select registers.*, ifnull(sale_order.total_amount, 0) as total_amount,total_orders  from registers 
           
           left outer join (Select sum(total_amount) as total_amount, count(sale_id) as total_orders, user_id from sale group by user_id) as sale_order on sale_order.user_id = registers.user_id
           where 1 order by user_id DESC";
           $q = $this->db->query($sql);
           
           return $q->result();
     }
}
?>