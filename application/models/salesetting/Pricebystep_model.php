<?php

class Pricebystep_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


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

  


    







 public function Getproductstep($data)
        {

$query = $this->db->query('SELECT *
    FROM product_price_step  
    WHERE product_code="'.$data['product_code'].'"
    ORDER BY ps_ID ASC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

return $encode_data;

        }




public function Saveprice($data)
        {

      $this->db->insert("product_price_step", $data);

        }



public function Deleteprice($data)
        {

$query_delete = $this->db->query('DELETE FROM product_price_step  WHERE ps_ID="'.$data['ps_ID'].'" ');


        }












    }