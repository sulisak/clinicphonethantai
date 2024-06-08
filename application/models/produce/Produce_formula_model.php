<?php

class Produce_formula_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }




public function Getpn_detail($data)
                {

        $query = $this->db->query('SELECT
        wp.product_id as product_id,
        wp.product_name as product_name_title,
        wp.product_code as product_code,
        pd.importproduct_detail_pricebase as importproduct_detail_pricebase,
        pd.importproduct_detail_num as importproduct_detail_num,
        wu.product_unit_name,
        wp.product_stock_num,
		pd.lotno,
		pd.date_end
            FROM purchase_buy_detail as pd
            LEFT JOIN wh_product_list as wp on wp.product_id=pd.product_id
            LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wp.product_unit_id
            WHERE pd.owner_id="'.$_SESSION['owner_id'].'" and pd.importproduct_header_code="'.$data['importproduct_header_code'].'"
            ORDER BY pd.importproduct_detail_id ASC');
        $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
        return $encode_data;

                }
				
				
				
        public function Adddetail($data)
        {


$data['adddate'] = time();
$data['name'] = $_SESSION['name'];

if ($this->db->insert("produce_formula", $data)){

		return true;
	}

  }


      public function Addheader($data)
        {
$data2['importproduct_header_remark'] = $data['importproduct_header_remark'];
$data2['importproduct_header_refcode'] = $data['importproduct_header_refcode'];
$data2['importproduct_header_num'] = $data['importproduct_header_num'];
$data2['importproduct_header_amount'] = $data['importproduct_header_amount'];
$data2['importproduct_header_code'] = $data['importproduct_header_code'];
$data2['importproduct_header_date'] = $data['importproduct_header_date'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

$data2['lotno'] = $data['lotno'];
$data2['date_end'] = $data['date_end'];
$data2['date_end2'] = strtotime($data['date_end']);


if ($this->db->insert("wh_importproduct_header", $data2)){

//start PURCHASE INSTOCK
  $this->db->query('UPDATE purchase_buy_header
             SET status="1"
             WHERE importproduct_header_code="'.$data['importproduct_header_refcode'].'" ');
//end PURCHASE INSTOCK

        return true;
    }
	

  }







           public function Get($data)
        {


 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT *
    FROM produce_formula
    WHERE product_name LIKE "%'.$data['searchtext'].'%" 
	OR produce_formula_name LIKE "%'.$data['searchtext'].'%"
	OR des LIKE "%'.$data['searchtext'].'%"
	GROUP BY produce_formula_no
    ORDER BY adddate DESC LIMIT '.$start.' , '.$perpage.' ');


$query = $this->db->query('SELECT *,
    from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM produce_formula
    WHERE product_name LIKE "%'.$data['searchtext'].'%" 
	OR produce_formula_name LIKE "%'.$data['searchtext'].'%"
	OR des LIKE "%'.$data['searchtext'].'%"
	GROUP BY produce_formula_no
    ORDER BY adddate DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }









        public function Getdateend($data)
     {


     $perpage = $data['perpage'];

         if($data['page'] && $data['page'] != ''){
     $page = $data['page'];
         }else{
       $page = '1';
         }


         $start = ($page - 1) * $perpage;


     $querynum = $this->db->query('SELECT wl.product_name,
       wd.lotno,
       wd.date_end,
       wd.date_end2,
     from_unixtime(importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date2
     FROM wh_importproduct_detail as wd
     LEFT JOIN wh_product_list as wl on wl.product_id=wd.product_id
     WHERE  wd.date_end !="" AND wd.status="0"  AND wl.product_name LIKE "%'.$data['searchtext'].'%"
     OR  wd.date_end !="" AND wd.status="0" AND wd.lotno LIKE "%'.$data['searchtext'].'%"
     ORDER BY wd.date_end2 ASC LIMIT '.$start.' , '.$perpage.' ');


     $query = $this->db->query('SELECT wl.product_id,wl.product_name,wl.product_code,
       wd.lotno,
       wd.date_end,
       wd.date_end2,
       wd.importproduct_detail_num,
       wd.importproduct_detail_id,
     from_unixtime(importproduct_detail_date,"%d-%m-%Y %H:%i:%s") as importproduct_detail_date2
     FROM wh_importproduct_detail as wd
     LEFT JOIN wh_product_list as wl on wl.product_id=wd.product_id
     WHERE  wd.date_end !="" AND wd.status="0"  AND wl.product_name LIKE "%'.$data['searchtext'].'%"
     OR  wd.date_end !="" AND wd.status="0" AND wd.lotno LIKE "%'.$data['searchtext'].'%"
     ORDER BY wd.date_end2 ASC LIMIT '.$start.' , '.$perpage.' ');
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
* FROM produce_formula
    WHERE produce_formula_no="'.$data['produce_formula_no'].'"
    ORDER BY pf_id ASC');
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
    FROM wh_importproduct_detail as wi
    LEFT JOIN wh_product_list as wp on wp.product_id=wi.product_id
    WHERE wi.owner_id="'.$_SESSION['owner_id'].'" and wi.importproduct_header_code="'.$data['importproduct_header_code'].'"
    ORDER BY wi.importproduct_detail_id ASC');
$encode_data = $query->result();
return $encode_data;

        }





    public function Deleteimportlist($data)
        {

$query = $this->db->query('DELETE FROM produce_formula  WHERE produce_formula_no="'.$data['produce_formula_no'].'"');
return true;

        }




        public function Updatestatusdateend($data)
        {

        $query = $this->db->query('UPDATE wh_importproduct_detail
        SET status="1"
        WHERE importproduct_detail_id="'.$data['importproduct_detail_id'].'"');



        $query2 = $this->db->query('UPDATE wh_product_list
            SET product_stock_num=product_stock_num - '.$data['importproduct_detail_num'].'
            WHERE product_id="'.$data['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');

        return true;




        }






        public function Salestatusdateend3($data)
        {

        $query = $this->db->query('UPDATE wh_importproduct_detail
        SET status="3"
        WHERE importproduct_detail_id="'.$data['importproduct_detail_id'].'"');

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
	wl.product_stock_num as product_stock_num,
    wl.product_pricebase as product_pricebase,
    z.zone_name as zone_name,
	IFNULL(wu.product_unit_name, "") as product_unit_name
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
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
			   (SELECT product_id FROM produce_formula as pf WHERE pf.product_id=wl.product_id LIMIT 1) as pid, 
               z.zone_name as zone_name
               FROM wh_product_list  as wl
               LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
               LEFT JOIN zone as z on z.zone_id=wl.zone_id
               WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND  wl.product_name LIKE "%'.$data['product_name'].'%"
               ORDER BY wl.product_id DESC LIMIT 20');
               $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
               return $encode_data;

               }




        public function Getrelationlist($product_id)
        {

        $query = $this->db->query('SELECT
        *
        FROM wh_product_relation_list
        WHERE product_id="'.$product_id.'"');
        return $query->result_array();

        }




        public function Updateproductimportstock_relation($product_id,$numnow)
        {

        $query = $this->db->query('UPDATE wh_product_list
        SET product_stock_num=product_stock_num + '.$numnow.'
        WHERE product_id="'.$product_id.'" and  owner_id="'.$_SESSION['owner_id'].'"');
        return true;

        }






    }
