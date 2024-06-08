<?php

class Product_value_model extends CI_Model {



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

$dayfrom = time()-(86400*$data['day_return']);
$dayto = time();


$querynum = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
wl.product_price_value as product_price_value,
SUM(s.product_stock_num) as product_stock_num,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    z.zone_name as zone_name
    FROM wh_product_list  as wl
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
	LEFT JOIN stock as s on s.product_id=wl.product_id
	LEFT JOIN branch as b on b.branch_id=s.branch_id
    WHERE s.product_stock_num > "0" AND wl.count_stock="0" AND wl.product_code LIKE "%'.$data['searchtext'].'%"
    OR s.product_stock_num > "0" AND wl.count_stock="0" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    OR s.product_stock_num > "0" AND wl.count_stock="0" AND z.zone_name LIKE "%'.$data['searchtext'].'%"
	OR s.product_stock_num > "0" AND wl.count_stock="0" AND wc.product_category_name LIKE "%'.$data['searchtext'].'%"
    OR s.product_stock_num > "0" AND wl.count_stock="0" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
	GROUP BY s.product_id
	ORDER BY s.product_stock_num ASC');


$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_price as product_price,
	s.product_stock_num as product_stock_num,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
SUM(s.product_stock_num) as product_stock_num,
IFNULL((SELECT COUNT(sn_id) FROM serial_number as s LEFT JOIN branch as b on b.branch_id=s.branch_id WHERE s.status="0" AND s.product_id=wl.product_id AND b.branch_name LIKE "%'.$data['searchtext'].'%"), "0") as csn,
	
wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    z.zone_name as zone_name,
	wl.product_pricebase as product_pricebase,
    wu.product_unit_name as product_unit_name
    FROM wh_product_list  as wl
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
	LEFT JOIN stock as s on s.product_id=wl.product_id
	LEFT JOIN branch as b on b.branch_id=s.branch_id
    WHERE s.product_stock_num > "0" AND wl.count_stock="0" AND wl.product_code LIKE "%'.$data['searchtext'].'%"
    OR s.product_stock_num > "0" AND wl.count_stock="0" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
    OR s.product_stock_num > "0" AND wl.count_stock="0" AND z.zone_name LIKE "%'.$data['searchtext'].'%"
	OR s.product_stock_num > "0" AND wl.count_stock="0" AND wc.product_category_name LIKE "%'.$data['searchtext'].'%"
    OR s.product_stock_num > "0" AND wl.count_stock="0" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
    GROUP BY s.product_id
    ORDER BY wc.product_category_id ASC,CONVERT( wl.product_name USING tis620 ) ASC  LIMIT '.$start.' , '.$perpage.'  ');



$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }






public function Opensn($data)
        {

$query = $this->db->query('SELECT sn.sn_code as sn_code,
b.branch_name as branch_name
    FROM serial_number as sn
	LEFT JOIN branch as b on b.branch_id=sn.branch_id
    WHERE b.branch_name LIKE "%'.$data['searchtext'].'%" and sn.product_id="'.$data['product_id'].'" AND sn.status="0"
    ORDER BY sn.sn_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }
		
		
		


public function Openone($data)
        {

$query = $this->db->query('SELECT s.product_stock_num as product_stock_num,
b.branch_name as branch_name,
wl.product_name as product_name
    FROM stock as s
    LEFT JOIN branch as b on b.branch_id=s.branch_id
	LEFT JOIN wh_product_list as wl on wl.product_id=s.product_id
    WHERE s.product_stock_num > "0" AND s.product_id="'.$data['product_id'].'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
	OR s.product_stock_num > "0" AND s.product_id="'.$data['product_id'].'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
	ORDER BY s.product_stock_num+0 ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }



public function Openone2($data)
        {
		
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT 
sd.savedate as ts,
from_unixtime(sd.savedate,"%d-%m-%Y %H:%i:%s") as savedate,
sd.sale_runno,
sd.product_sale_num,
b.branch_name as branch_name,
wl.product_name as product_name
    FROM sale_list_datail as sd
    LEFT JOIN branch as b on b.branch_id=sd.branch_id
    LEFT JOIN wh_product_list as wl on wl.product_id="'.$data['product_id'].'"
    WHERE sd.savedate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sd.product_id="'.$data['product_id'].'" AND sd.product_name LIKE "%'.$data['searchtext'].'%"
OR sd.savedate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sd.product_id="'.$data['product_id'].'" AND sd.product_code LIKE "%'.$data['searchtext'].'%"	
OR sd.savedate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sd.product_id="'.$data['product_id'].'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
	ORDER BY sd.savedate ASC');
	
$query2 = $this->db->query('SELECT 
wd.importproduct_detail_date as ts,
from_unixtime(wd.importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date,
wd.importproduct_header_code,
wd.importproduct_detail_num,
b.branch_name as branch_name,
wl.product_name as product_name
    FROM wh_importproduct_detail as wd
	LEFT JOIN branch as b on b.branch_id=wd.branch_id
	LEFT JOIN wh_product_list as wl on wl.product_id="'.$data['product_id'].'"
    WHERE wd.importproduct_detail_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND wd.product_id="'.$data['product_id'].'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
OR wd.importproduct_detail_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND wd.product_id="'.$data['product_id'].'" AND wl.product_code LIKE "%'.$data['searchtext'].'%"	
OR wd.importproduct_detail_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND wd.product_id="'.$data['product_id'].'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
	ORDER BY wd.importproduct_detail_date ASC');
	
	
$data_merge = array_merge($query->result(),$query2->result());

usort($data_merge, function ($a, $b) { //Sort the array using a user defined function
    return $a->ts < $b->ts ? -1 : 1; //Compare the scores
});

$data_json = json_encode($data_merge,JSON_UNESCAPED_UNICODE );

//print_r($data_merge);
return $data_json;

        }
		
		












   public function Updatematok($data)
        {


$query1 = $this->db->query('SELECT * FROM stock WHERE product_id="'.$data['product_id'].'" and  branch_id="'.$_SESSION['branch_id'].'"');
$num_rows = $query1->num_rows();

if($num_rows == 1){
	$this->db->query('UPDATE stock SET product_stock_num='.$data['product_stock_num_change'].'
WHERE product_id="'.$data['product_id'].'" and  branch_id="'.$_SESSION['branch_id'].'"');	
}else{ 
$data2['product_id'] = $data['product_id'];
$data2['branch_id'] = $_SESSION['branch_id'];
$data2['product_stock_num'] = $data['product_stock_num_change'];
$this->db->insert("stock", $data2);
}

	

// log update
$data['adddate'] = time();
$data['user_id'] = $_SESSION['user_id'];
$data['name'] = $_SESSION['name'];
$data['branch_id'] = $_SESSION['branch_id'];
$this->db->insert("log_edit_product_stock", $data);
	

}















    }
