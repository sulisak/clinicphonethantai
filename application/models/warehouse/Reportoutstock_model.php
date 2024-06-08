<?php

class Reportoutstock_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


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


$querynum = $this->db->query('SELECT *
    FROM wh_product_list
    WHERE product_name LIKE "%'.$data['searchtext'].'%"');


$query = $this->db->query('SELECT *,
  (SELECT product_unit_name FROM wh_product_unit as wu WHERE wu.product_unit_id=sh.product_unit_id) AS product_unit_name,
  (SELECT product_category_name FROM wh_product_category as wu WHERE wu.product_category_id=sh.product_category_id) AS product_category_name,
  (SELECT sum(importproduct_detail_num) FROM wh_exportproduct_detail as wu WHERE wu.product_id=sh.product_id AND wu.importproduct_detail_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") AS product_out_num,
  (SELECT sum(product_sale_num) FROM 	sale_list_datail as wu WHERE wu.product_id=sh.product_id AND wu.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") AS product_saleout_num,
  (SELECT sum(product_sale_num) FROM product_return_datail as wu WHERE wu.product_id=sh.product_id AND wu.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") AS product_return_num

    FROM wh_product_list  as sh
    WHERE  sh.product_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY sh.product_id DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }












  }
