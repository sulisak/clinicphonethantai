<?php

class Store_stock_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        




         public function Getstock($data)
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
    wc.product_category_name as product_category_name,
    ow.owner_name as owner_name
    FROM wh_product_list  as wl 
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN owner as ow on ow.owner_id=wl.owner_id 
    WHERE wl.store_id="'.$_SESSION['store_id'].'" AND wl.owner_id="'.$data['owner_id'].'"   AND wl.product_code LIKE "%'.$data['searchtext'].'%" OR wl.store_id="'.$_SESSION['store_id'].'" AND wl.owner_id="'.$data['owner_id'].'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY wl.product_id DESC    ');



$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );




$json = '{"list": '.$encode_data.'}';

return $json;

        }






    }