<?php

class Customerscoreproduct_model extends CI_Model {



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


$querynum = $this->db->query('SELECT
cupgl.shift_id,
from_unixtime(cupgl.add_time,"%d-%m-%Y %H:%i:%s") as add_time,
cupgl.product_name,
cupgl.point_use,
co.cus_name,
uo.name
    FROM customer_use_point_gift_list as cupgl
    LEFT JOIN user_owner as uo on uo.user_id=cupgl.user_id
    LEFT JOIN customer_owner as co on co.cus_id=cupgl.cus_id
    WHERE cupgl.add_time
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
    ORDER BY cupgl.cupgl_id DESC ');


$query = $this->db->query('SELECT
  cupgl.shift_id,
  from_unixtime(cupgl.add_time,"%d-%m-%Y %H:%i:%s") as add_time,
  cupgl.product_name,
  cupgl.point_use,
  co.cus_name,
  uo.name,
  b.branch_name
      FROM customer_use_point_gift_list as cupgl
      LEFT JOIN user_owner as uo on uo.user_id=cupgl.user_id
      LEFT JOIN customer_owner as co on co.cus_id=cupgl.cus_id
	  LEFT JOIN branch as b on b.branch_id=cupgl.branch_id
      WHERE cupgl.add_time
  BETWEEN "'.$dayfrom.'"
  AND "'.$dayto.'"
      ORDER BY cupgl.cupgl_id DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }










  }
