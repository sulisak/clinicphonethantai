<?php

class Dateend_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }






         public function Getstock($data)
        {


 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_price as product_price,
    wl.product_date_end as product_date_end,
    wl.product_date_end2 as product_date_end2,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
    IFNULL((SELECT s.product_stock_num FROM stock as s WHERE s.product_id=wl.product_id AND s.branch_id="'.$_SESSION['branch_id'].'"), "0") as product_stock_num,
    wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    z.zone_name as zone_name
    FROM wh_product_list  as wl
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_date_end2 != "" AND wl.product_stock_num > "0"   AND wl.product_code LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_date_end2 != "" AND wl.product_stock_num > "0" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_date_end2 != "" AND wl.product_stock_num > "0" AND z.zone_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY wl.product_date_end2 ASC');


$query = $this->db->query('SELECT
  wl.product_id as product_id,
  wl.product_code as product_code,
  wl.product_name as product_name,
  wl.product_price as product_price,
  wl.product_date_end as product_date_end,
  wl.product_date_end2 as product_date_end2,
  wl.product_wholesale_price as product_wholesale_price,
  wl.product_price_discount as product_price_discount,
  IFNULL((SELECT s.product_stock_num FROM stock as s WHERE s.product_id=wl.product_id AND s.branch_id="'.$_SESSION['branch_id'].'"), "0") as product_stock_num,
  wl.product_price_value as product_price_value,
  wc.product_category_id as product_category_id,
  wc.product_category_name as product_category_name,
  z.zone_name as zone_name
  FROM wh_product_list  as wl
  LEFT JOIN zone as z on z.zone_id=wl.zone_id
  LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
  WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_date_end2 != "" AND wl.product_stock_num > "0"   AND wl.product_code LIKE "%'.$data['searchtext'].'%"
  OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_date_end2 != "" AND wl.product_stock_num > "0" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
  OR wl.owner_id="'.$_SESSION['owner_id'].'" AND wl.product_date_end2 != "" AND wl.product_stock_num > "0" AND z.zone_name LIKE "%'.$data['searchtext'].'%"
  ORDER BY wl.product_date_end2 ASC  LIMIT '.$start.' , '.$perpage.'  ');



$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }
























    }
