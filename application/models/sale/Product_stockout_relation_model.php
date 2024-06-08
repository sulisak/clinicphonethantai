<?php

class Product_stockout_relation_model extends CI_Model {



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
*
    FROM log_from_relation_when_sale  as ls
	LEFT JOIN branch as b on b.branch_id=ls.branch_id
    WHERE ls.product_name LIKE "%'.$data['searchtext'].'%"
	GROUP BY ls.product_id
	ORDER BY ls.product_id ASC');


$query = $this->db->query('SELECT
*
    FROM log_from_relation_when_sale  as ls
	LEFT JOIN branch as b on b.branch_id=ls.branch_id
    WHERE ls.product_name LIKE "%'.$data['searchtext'].'%"
	GROUP BY ls.product_id
	ORDER BY ls.product_id ASC  LIMIT '.$start.' , '.$perpage.'  ');



$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }






public function Openone($data)
        {


$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


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
from_unixtime(ls.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
ls.sale_runno,
ls.product_stock_num,
b.branch_name as branch_name,
ls.product_name as product_name,
wl.product_name as product_name2
    FROM log_from_relation_when_sale as ls
    LEFT JOIN branch as b on b.branch_id=ls.branch_id
	LEFT JOIN wh_product_list as wl on wl.product_id=ls.product_id_relation
    WHERE ls.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND ls.product_id="'.$data['product_id'].'" AND b.branch_name LIKE "%'.$data['searchtext2'].'%"
	ORDER BY ls.adddate ASC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

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
