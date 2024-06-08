<?php

class Discount_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

  


           public function Update($data)
        {


$data2['product_name'] = $data['product_name'];
$data2['product_price'] = $data['product_price'];
$data2['product_price_discount'] = $data['product_price_discount'];
$data2['product_category_id'] = $data['product_category_id'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'product_id'  => $data['product_id']
);

$this->db->where($where);
if ($this->db->update("wh_product_list", $data2)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT 
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_price as product_price,
    wl.product_price_discount as product_price_discount,
    wl.product_stock_num as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name
    FROM wh_product_list  as wl 
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" 
    ORDER BY wl.product_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }







    }