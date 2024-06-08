<?php

class Addnew_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



        public function Get_taxinvoice_runnolast()
               {

        $query = $this->db->query('SELECT taxinvoice_runno
           FROM accounting_taxinvoice_list
           WHERE owner_id="'.$_SESSION['owner_id'].'"
           ORDER BY ID DESC LIMIT 1');
        $encode_data = $query->result_array();
        return $encode_data;


               }


               public function Get_runno($data)
                      {

               $query = $this->db->query('SELECT sale_runno
                  FROM accounting_taxinvoice_list
                  WHERE owner_id="'.$_SESSION['owner_id'].'"
                  AND sale_runno="'.$data['sale_runno'].'"
                  ORDER BY ID DESC LIMIT 1');
               $encode_data = $query->result_array();
               return $encode_data;


                      }



        public function Add($data)
        {

$data2['sale_runno'] = $data['sale_runno'];
$data2['cus_id'] = $data['customer_id'];
$data2['buy_price'] = $data['sumsale_price']-$data['discount_last'];
$data2['discount_last'] = $data['discount_last'];
$data2['vat'] = $data['vat'];
$data2['remark'] = $data['remark'];
$data2['taxinvoice_runno'] = $data['taxinvoice_runno'];
$data2['adddate'] = time();
$data2['shift_id'] = $_SESSION['shift_id'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];
if ($this->db->insert("accounting_taxinvoice_list", $data2)){
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
$data2['allprice'] = $data['allprice'];
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
          $dayto = strtotime($data['dayto']);


 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;


$querynum = $this->db->query('SELECT *,
    from_unixtime(at.adddate,"%d-%m-%Y %H:%i:%s") as at_adddate
    FROM accounting_taxinvoice_list as at
    LEFT JOIN customer_owner as co on co.cus_id=at.cus_id
    WHERE at.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND at.sale_runno LIKE "%'.$data['searchtext'].'%"
    OR at.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND at.remark LIKE "%'.$data['searchtext'].'%"
    OR at.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND co.cus_name LIKE "%'.$data['searchtext'].'%"
    OR at.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND at.taxinvoice_runno LIKE "%'.$data['searchtext'].'%"
    ORDER BY at.ID DESC LIMIT '.$start.' , '.$perpage.' ');


$query = $this->db->query('SELECT *,
  at.ID,
  at.vat,
  at.sale_runno,
  at.remark,
  from_unixtime(at.adddate,"%d-%m-%Y %H:%i:%s") as at_adddate
  FROM accounting_taxinvoice_list as at
  LEFT JOIN customer_owner as co on co.cus_id=at.cus_id
  WHERE at.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND at.sale_runno LIKE "%'.$data['searchtext'].'%"
  OR at.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND at.remark LIKE "%'.$data['searchtext'].'%"
  OR at.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND co.cus_name LIKE "%'.$data['searchtext'].'%"
  OR at.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND at.taxinvoice_runno LIKE "%'.$data['searchtext'].'%"
    ORDER BY at.ID DESC LIMIT '.$start.' , '.$perpage.' ');
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
    wu.product_unit_name
    FROM wh_product_list  as wl
    LEFT JOIN wh_product_unit as wu on wu.product_unit_id=wl.product_unit_id
    LEFT JOIN wh_product_category as wc on wc.product_category_id=wl.product_category_id
    LEFT JOIN zone as z on z.zone_id=wl.zone_id
    WHERE wl.owner_id="'.$_SESSION['owner_id'].'" AND  wl.product_code="'.$data['product_code'].'"
    ORDER BY wl.product_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }



        public function Searchbillfind($data)
       {

       $query = $this->db->query('SELECT
       sh.sale_runno,
       sh.sumsale_num,
       sh.sumsale_price,
       sh.discount_last,
       ((sumsale_num*(sumsale_price-sumsale_discount))) AS sum,
       ((sumsale_price)-discount_last) AS sumall
       FROM sale_list_header  as sh
       WHERE sh.owner_id="'.$_SESSION['owner_id'].'" AND  sh.sale_runno LIKE "%'.$data['runno'].'%"
       ORDER BY sh.sale_runno DESC LIMIT 5');
       $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
       return $encode_data;

       }




       public function Findcustomer($data)
       {

       $query = $this->db->query('SELECT *
       FROM customer_owner WHERE cus_name LIKE "%'.$data['customer_name'].'%" ORDER BY cus_id DESC LIMIT 5');
       $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
       return $encode_data;

       }

       public function Addbill($data)
       {

       $query = $this->db->query('SELECT *,
         SUM(product_sale_num) as product_sale_num,
         (product_price-product_price_discount) AS product_price
       FROM sale_list_datail WHERE sale_runno="'.$data['sale_runno'].'" GROUP BY product_name ORDER BY ID ASC');
       $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
       return $encode_data;

       }





    }
