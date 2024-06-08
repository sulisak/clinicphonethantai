<?php

class Buy_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Adddetail($data)
        {

if($data['vat_type']=='0'){
	($data['price_per_num'])+($data['price_per_num'])*($_SESSION['vat']/100);
}

$data2['importproduct_header_code'] = $data['importproduct_header_code'];
$data2['product_id'] = $data['product_id'];
$data2['importproduct_detail_pricebase'] = $data['importproduct_detail_pricebase'];
$data2['importproduct_detail_num'] = $data['importproduct_detail_num'];
$data2['importproduct_detail_date'] = $data['importproduct_detail_date'];
$data2['importproduct_detail_adddate'] = $data['importproduct_detail_adddate'];
$data2['price_per_num'] = $data['price_per_num'];
$data2['vendor_name'] = $data['vendor_name'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
if ($this->db->insert("purchase_buy_detail", $data2)){
		return true;
	}

  }
  
  
  
   public function Getrunnolast_purchase()
        {

$query = $this->db->query('SELECT importproduct_header_code
    FROM purchase_buy_header
    WHERE owner_id="'.$_SESSION['owner_id'].'"
    ORDER BY importproduct_header_id DESC LIMIT 1');
$encode_data = $query->result_array();
return $encode_data;


        }
		
		
		


      public function Addheader($data)
        {
$data2['importproduct_header_remark'] = $data['importproduct_header_remark'];
$data2['importproduct_header_refcode'] = $data['importproduct_header_refcode'];
$data2['importproduct_header_num'] = $data['importproduct_header_num'];
$data2['importproduct_header_amount'] = $data['importproduct_header_amount'];
$data2['importproduct_header_code'] = $data['importproduct_header_code'];
$data2['importproduct_header_date'] = $data['importproduct_header_date'];
$data2['importproduct_header_adddate'] = $data['importproduct_header_adddate'];
$data2['allprice'] = $data['allprice'];
$data2['vatbuyall'] = $data['vatbuyall'];
$data2['vendor_id'] = $data['vendor_id'];
$data2['vendor_name'] = $data['vendor_name'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
if ($this->db->insert("purchase_buy_header", $data2)){
        return true;
    }

  }







           public function Get($data)
        {


$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT *,
    from_unixtime(importproduct_header_date,"%d-%m-%Y %H:%i:%s") as importproduct_header_date2
    FROM purchase_buy_header
    WHERE
	importproduct_header_date
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
    AND importproduct_header_refcode LIKE "%'.$data['searchtext'].'%" AND importproduct_header_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
    OR importproduct_header_remark LIKE "%'.$data['searchtext'].'%" AND importproduct_header_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
    OR importproduct_header_code LIKE "%'.$data['searchtext'].'%" AND importproduct_header_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
    OR vendor_name LIKE "%'.$data['searchtext'].'%" AND importproduct_header_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
    ORDER BY importproduct_header_id DESC LIMIT '.$start.' , '.$perpage.' ');


$query = $this->db->query('SELECT *,
  (SELECT name FROM user_owner as uo WHERE uo.user_id=ph.user_id) as user_name,
    from_unixtime(importproduct_header_date,"%d-%m-%Y %H:%i:%s") as importproduct_header_date2,
	from_unixtime(importproduct_header_adddate,"%d-%m-%Y %H:%i:%s") as importproduct_header_adddate2
    FROM purchase_buy_header as ph
    WHERE ph.importproduct_header_date
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
    AND importproduct_header_refcode LIKE "%'.$data['searchtext'].'%" AND ph.importproduct_header_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
    OR importproduct_header_remark LIKE "%'.$data['searchtext'].'%" AND ph.importproduct_header_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
    OR importproduct_header_code LIKE "%'.$data['searchtext'].'%" AND ph.importproduct_header_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
    OR vendor_name LIKE "%'.$data['searchtext'].'%" AND ph.importproduct_header_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
    ORDER BY importproduct_header_id DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }






public function Getimportone($data)
        {

$query = $this->db->query('SELECT
wp.product_name as product_name,
wp.product_code as product_code,
wi.importproduct_detail_pricebase as importproduct_detail_pricebase,
wi.importproduct_detail_num as importproduct_detail_num,
wi.price_per_num as price_per_num,
from_unixtime(wi.importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date
    FROM purchase_buy_detail as wi
    LEFT JOIN wh_product_list as wp on wp.product_id=wi.product_id
    WHERE wi.owner_id="'.$_SESSION['owner_id'].'" and wi.importproduct_header_code="'.$data['importproduct_header_code'].'"
    ORDER BY wi.importproduct_detail_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Getimportone2($data)
        {

$query = $this->db->query('SELECT
wp.product_id as product_id,
wp.product_name as product_name,
wi.importproduct_detail_pricebase as importproduct_detail_pricebase,
wi.importproduct_detail_num as importproduct_detail_num,
from_unixtime(wi.importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date
    FROM purchase_buy_detail as wi
    LEFT JOIN wh_product_list as wp on wp.product_id=wi.product_id
    WHERE wi.owner_id="'.$_SESSION['owner_id'].'" and wi.importproduct_header_code="'.$data['importproduct_header_code'].'"
    ORDER BY wi.importproduct_detail_id ASC');
$encode_data = $query->result();
return $encode_data;

        }





    public function Deleteimportlist($data)
        {

$query = $this->db->query('DELETE FROM purchase_buy_detail  WHERE importproduct_header_code="'.$data['importproduct_header_code'].'" and  owner_id="'.$_SESSION['owner_id'].'"');

if($query){
$query2 = $this->db->query('DELETE FROM purchase_buy_header  WHERE importproduct_header_code="'.$data['importproduct_header_code'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
}


return true;

        }


        public function Updateproductimportstock($data)
        {

$price_value = $data['importproduct_detail_pricebase'] * $data['importproduct_detail_num'];
$query = $this->db->query('UPDATE wh_product_list
    SET product_stock_num=product_stock_num + '.$data['importproduct_detail_num'].',product_num_all=product_num_all + '.$data['importproduct_detail_num'].',
    product_price_value=product_price_value + '.$price_value.'
    WHERE product_id="'.$data['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }

         public function Updateproductdeletestock($data2)
        {
$price_value = $data2['detailnum'] * $data2['detailpricebase'];
$query = $this->db->query('UPDATE wh_product_list
    SET product_stock_num=product_stock_num - '.$data2['detailnum'].',
    product_num_all=product_num_all - '.$data2['detailnum'].',
    product_price_value=product_price_value - '.$price_value.'
    WHERE product_id="'.$data2['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }



         public function Findproduct($data)
        {

$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_pricebase as product_pricebase,
    z.zone_name as zone_name,
    wu.product_unit_name,
	wl.have_vat as have_vat
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND  wl.product_code="'.$data['product_code'].'"
    ORDER BY wl.product_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }



        public function Findproduct2($data)
       {

       $query = $this->db->query('SELECT
       wl.product_id as product_id,
       wl.product_code as product_code,
       wl.product_name as product_name,
       wl.product_pricebase as product_pricebase,
       z.zone_name as zone_name,
       wu.product_unit_name
       FROM wh_product_list  as wl
       LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
       LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
       LEFT JOIN zone as z on z.zone_id=wl.zone_id
       WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND  wl.product_name LIKE "%'.$data['product_name'].'%"
       ORDER BY wl.product_id DESC LIMIT 100');
       $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
       return $encode_data;

       }





        public function Savesettingproduct($data)
        {

$query = $this->db->query('SELECT * FROM purchase_buy_product_stock_setting WHERE product_id="'.$data['product_id'].'" ');
$num_rows = $query->num_rows();

if($num_rows > 0){
	
$this->db->query('UPDATE purchase_buy_product_stock_setting 
SET stock_min="'.$data['stock_min'].'",num_buy="'.$data['num_buy'].'"
WHERE product_id="'.$data['product_id'].'"');
	
}else{ 
$this->db->insert("purchase_buy_product_stock_setting", $data);
}


  }
  




  

 public function Findproductforsetting($data)
        {

$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_pricebase as product_pricebase,
    z.zone_name as zone_name,
    wu.product_unit_name,
	wl.have_vat as have_vat,
	   IFNULL(pb.stock_min,"") as stock_min,
	   IFNULL(pb.num_buy,"") as num_buy
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
LEFT JOIN purchase_buy_product_stock_setting as pb on pb.product_id=wl.product_id
    WHERE wl.product_code LIKE "%'.$data['searchtextsetting'].'%"
	OR wl.product_name LIKE "%'.$data['searchtextsetting'].'%"
    ORDER BY wl.product_id DESC LIMIT 50');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }
		
	
	
	
	
	
	
	
	

public function Product_orderprint(){
	
	$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name,
    wl.product_price as product_price,
	s.product_stock_num as product_stock_num,
    wl.product_wholesale_price as product_wholesale_price,
    wl.product_price_discount as product_price_discount,
s.product_stock_num as product_stock_num,
wl.product_price_value as product_price_value,
    wc.product_category_id as product_category_id,
    wc.product_category_name as product_category_name,
    z.zone_name as zone_name,
	wl.product_pricebase as product_pricebase,
wu.product_unit_name as product_unit_name,
wl.product_num_min,
(s.product_stock_num-pbs.stock_min)*1 as numdiff,
pbs.num_buy,
pbs.stock_min
    
	FROM purchase_buy_product_stock_setting as pbs
	LEFT JOIN wh_product_list  as wl on wl.product_id=pbs.product_id
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
	LEFT JOIN stock as s on s.product_id=wl.product_id
    WHERE pbs.stock_min > "0"
	AND s.product_stock_num <= pbs.stock_min
	AND s.branch_id="'.$_SESSION['branch_id'].'" 
	AND wl.count_stock="0"
    ORDER BY numdiff ASC
	');
	
	
	
	$query_ss = $this->db->query('SELECT * FROM purchase_buy_product_stock_setting
	WHERE stock_min > "0"
	');
$num_rows_ss = $query_ss->num_rows();



if($num_rows_ss > '0'){
	$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;
}



}













public function Getproductautofordraff(){
	
	$query = $this->db->query('SELECT
    wl.product_id as product_id,
    wl.product_code as product_code,
    wl.product_name as product_name_title,
    z.zone_name as zone_name,
	wl.have_vat as have_vat,
	wl.product_pricebase as importproduct_detail_pricebase,
wu.product_unit_name as product_unit_name,
pbs.num_buy as importproduct_detail_num,
wl.product_pricebase as price_per_num    
	FROM purchase_buy_product_stock_setting as pbs
	LEFT JOIN wh_product_list  as wl on wl.product_id=pbs.product_id
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN stock as s on s.product_id=wl.product_id
    WHERE pbs.stock_min > "0"
	AND s.product_stock_num <= pbs.stock_min
	AND s.branch_id="'.$_SESSION['branch_id'].'" 
	AND wl.count_stock="0"
    ORDER BY (s.product_stock_num-pbs.stock_min) ASC
	');
	
	
	
	$query_ss = $this->db->query('SELECT * FROM purchase_buy_product_stock_setting
	WHERE stock_min > "0"
	');
$num_rows_ss = $query_ss->num_rows();



if($num_rows_ss > '0'){
	$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;
}



}







       public function Findvendor($data)
       {

       $query = $this->db->query('SELECT *
       FROM vendor WHERE vendor_name LIKE "%'.$data['vendor_name'].'%" ORDER BY vendor_id DESC LIMIT 5');
       $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
       return $encode_data;

       }





    }
