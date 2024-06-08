<?php

class Used_course_report_model extends CI_Model {



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
    FROM used_course as uc
	LEFT JOIN customer_owner as c on c.cus_id=uc.cus_id
    WHERE uc.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND uc.product_name LIKE "%'.$data['searchtext'].'%"
	OR uc.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND c.cus_name LIKE "%'.$data['searchtext'].'%"');


$query = $this->db->query('SELECT uc.*,
c.cus_name,
from_unixtime(uc.adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM used_course as uc
	LEFT JOIN customer_owner as c on c.cus_id=uc.cus_id
    WHERE  uc.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND uc.product_name LIKE "%'.$data['searchtext'].'%"
	 OR uc.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND c.cus_name LIKE "%'.$data['searchtext'].'%"
    ORDER BY uc.uc_id DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }












  }
