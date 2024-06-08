<?php

class Log_round_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


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


$querynum = $this->db->query('SELECT  *,
    from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM log_round as lr
	LEFT JOIN sale_list_header as sh on sh.sale_runno=lr.sale_runno
	LEFT JOIN user_owner as uo on uo.user_id=sh.user_id
    WHERE sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"  AND uo.name LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"  AND lr.sale_runno LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"  AND sh.cus_name LIKE "%'.$data['searchtext'].'%"

ORDER BY lr.lr_id DESC ');


$query = $this->db->query('SELECT *,
    from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
	from_unixtime(sh.savedate,"%d-%m-%Y %H:%i:%s") as savedate
    FROM log_round as lr
	LEFT JOIN sale_list_header as sh on sh.sale_runno=lr.sale_runno
	LEFT JOIN user_owner as uo on uo.user_id=sh.user_id
    WHERE sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"  AND uo.name LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"  AND lr.sale_runno LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"  AND sh.cus_name LIKE "%'.$data['searchtext'].'%"

ORDER BY lr.lr_id DESC LIMIT '.$start.' , '.$perpage.' ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }







  }
