<?php

class Packing_list_model extends CI_Model {



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


$querynum = $this->db->query('SELECT *, 
from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
from_unixtime(savedate,"%d-%m-%Y %H:%i:%s") as savedate
    FROM sale_list_header  as sh
    LEFT JOIN user_owner as uo on uo.user_id=sh.user_id
	LEFT JOIN branch as b on b.branch_id=sh.branch_id
	LEFT JOIN pay_type as pt on pt.pay_type_id=sh.pay_type
    WHERE sh.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.cus_name LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.sale_runno LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND uo.name LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND pt.pay_type_name LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.saleremark LIKE "%'.$data['searchtext'].'%"
    
   ORDER BY ID DESC ');


$query = $this->db->query('SELECT sh.*,
from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
from_unixtime(sh.savedate,"%d-%m-%Y %H:%i:%s") as savedate,
b.branch_name,
(SELECT COUNT(m.morepay_id) FROM morepay as m WHERE m.sale_runno=sh.sale_runno) as cmp,
sh.checkproduct as checkproduct
FROM sale_list_header  as sh
    LEFT JOIN user_owner as uo on uo.user_id=sh.user_id
	LEFT JOIN branch as b on b.branch_id=sh.branch_id
	LEFT JOIN pay_type as pt on pt.pay_type_id=sh.pay_type
    WHERE sh.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.cus_name LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.sale_runno LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND uo.name LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND pt.pay_type_name LIKE "%'.$data['searchtext'].'%"
OR sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.saleremark LIKE "%'.$data['searchtext'].'%"

	ORDER BY sh.ID DESC LIMIT '.$start.' , '.$perpage.' ');
	
	
	
	
$querynum_no = $this->db->query('SELECT *, 
from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
from_unixtime(savedate,"%d-%m-%Y %H:%i:%s") as savedate
    FROM sale_list_header  as sh
    LEFT JOIN user_owner as uo on uo.user_id=sh.user_id
	LEFT JOIN branch as b on b.branch_id=sh.branch_id
	LEFT JOIN pay_type as pt on pt.pay_type_id=sh.pay_type
    WHERE sh.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND sh.tracking_number="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.cus_name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.sale_runno LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND uo.name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND pt.pay_type_name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.saleremark LIKE "%'.$data['searchtext'].'%"
    
   ORDER BY ID DESC ');


$query_no = $this->db->query('SELECT sh.*,
from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
from_unixtime(sh.savedate,"%d-%m-%Y %H:%i:%s") as savedate,
b.branch_name,
(SELECT COUNT(m.morepay_id) FROM morepay as m WHERE m.sale_runno=sh.sale_runno) as cmp,
sh.checkproduct as checkproduct
FROM sale_list_header  as sh
    LEFT JOIN user_owner as uo on uo.user_id=sh.user_id
	LEFT JOIN branch as b on b.branch_id=sh.branch_id
	LEFT JOIN pay_type as pt on pt.pay_type_id=sh.pay_type
    WHERE sh.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND sh.tracking_number="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.cus_name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.sale_runno LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND uo.name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND pt.pay_type_name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.saleremark LIKE "%'.$data['searchtext'].'%"

	ORDER BY sh.ID DESC LIMIT '.$start.' , '.$perpage.' ');
	
	
	
	
	
$querynum_yes = $this->db->query('SELECT *, 
from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
from_unixtime(savedate,"%d-%m-%Y %H:%i:%s") as savedate
    FROM sale_list_header  as sh
    LEFT JOIN user_owner as uo on uo.user_id=sh.user_id
	LEFT JOIN branch as b on b.branch_id=sh.branch_id
	LEFT JOIN pay_type as pt on pt.pay_type_id=sh.pay_type
    WHERE sh.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND sh.tracking_number!="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.cus_name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number!="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.sale_runno LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number!="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND uo.name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number!="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number!="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND pt.pay_type_name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number!="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.saleremark LIKE "%'.$data['searchtext'].'%"
    
   ORDER BY ID DESC ');


$query_yes = $this->db->query('SELECT sh.*,
from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
from_unixtime(sh.savedate,"%d-%m-%Y %H:%i:%s") as savedate,
b.branch_name,
(SELECT COUNT(m.morepay_id) FROM morepay as m WHERE m.sale_runno=sh.sale_runno) as cmp,
sh.checkproduct as checkproduct
FROM sale_list_header  as sh
    LEFT JOIN user_owner as uo on uo.user_id=sh.user_id
	LEFT JOIN branch as b on b.branch_id=sh.branch_id
	LEFT JOIN pay_type as pt on pt.pay_type_id=sh.pay_type
    WHERE sh.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND sh.tracking_number!="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.cus_name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number!="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.sale_runno LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number!="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND uo.name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number!="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number!="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND pt.pay_type_name LIKE "%'.$data['searchtext'].'%"
OR sh.tracking_number!="" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.saleremark LIKE "%'.$data['searchtext'].'%"

	ORDER BY sh.ID DESC LIMIT '.$start.' , '.$perpage.' ');
	
	
	
	
	if($data['showtype']=='all'){
	$qqq = $query;
	$qnn = $querynum;
		}else if($data['showtype']=='no'){
		$qqq = $query_no;
	$qnn = $querynum_no;
		}else if($data['showtype']=='yes'){
		$qqq = $query_yes;
	$qnn = $querynum_yes;
		}
	
	
	
$encode_data = json_encode($qqq->result(),JSON_UNESCAPED_UNICODE );
$num_rows = $qnn->num_rows();



$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }
		




 public function Get_product_notsend($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query = $this->db->query('SELECT 
SUM(sd.product_sale_num-sd.checkproduct) as allsum,
sd.product_name,
sd.product_unit_name
    FROM sale_list_datail  as sd
    WHERE sd.product_sale_num!=sd.checkproduct
AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
	GROUP BY sd.product_name
ORDER BY sd.product_id ASC ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


return $encode_data;


        }




	
		
 public function Get_product_notsend_mat($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query = $this->db->query('SELECT 
SUM(wrl.product_num_relation*(sd.product_sale_num-sd.checkproduct)) as allsum,
wrl.product_name_relation as product_name,
wrl.product_unit_relation as product_unit_name
    FROM sale_list_datail  as sd
	LEFT JOIN wh_product_relation_list as wrl on wrl.product_id=sd.product_id
    WHERE sd.product_sale_num!=sd.checkproduct
	AND wrl.product_type_relation="1"
AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
	GROUP BY wrl.product_name_relation
ORDER BY sd.product_id ASC ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


return $encode_data;


        }
		
		
		
		 public function Get_product_notsend_mat_fml($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query = $this->db->query('SELECT 
(wrl.product_num_relation*(sd.product_sale_num-sd.checkproduct))/pf.product_num_mat as allsum,
pf.produce_formula_name as produce_formula_name,
wrl.product_unit_relation as product_unit_name
    FROM sale_list_datail  as sd
	LEFT JOIN wh_product_relation_list as wrl on wrl.product_id=sd.product_id
	LEFT JOIN produce_formula as pf on pf.product_id_mat=wrl.product_id_relation
    WHERE sd.product_sale_num!=sd.checkproduct
	AND wrl.product_type_relation="1"
AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
	GROUP BY pf.produce_formula_no
ORDER BY sd.product_id ASC ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


return $encode_data;


        }
		


		
		

 public function Get_detail($data)
        {


$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query = $this->db->query('SELECT *, from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_datail  as sh
    WHERE sh.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
ORDER BY sh.ID ASC ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );




$json = '{"list": '.$encode_data.'}';

return $json;


        }




		
		




public function Getone($data)
        {

$query = $this->db->query('SELECT sd.*, 
z.zone_name,
from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
wpl.product_weight*sd.product_sale_num as product_weight
    FROM sale_list_datail as sd
LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
LEFT JOIN zone as z on z.zone_id=wpl.zone_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.sale_runno="'.$data['sale_runno'].'"
    ORDER BY sd.ID ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }
		
		
		
		
		
		
		public function Checkbarcode($data)
        {

$query = $this->db->query('SELECT sd.product_code
    FROM sale_list_datail as sd
    WHERE sd.product_sale_num>sd.checkproduct 
	AND sd.product_code="'.$data['product_code'].'" 
	AND sd.sale_runno="'.$data['sale_runno'].'" LIMIT 1');
	
	$query_sn = $this->db->query('SELECT sd.sn_code
    FROM sale_list_datail as sd
    WHERE sd.product_sale_num>sd.checkproduct 
	AND sd.sn_code="'.$data['product_code'].'" 
	AND sd.sale_runno="'.$data['sale_runno'].'"');
	
$nump = $query->num_rows();
$nump_sn = $query_sn->num_rows();



if($nump > '0'){
$findproduct = $data['product_code'];
$this->db->query('UPDATE sale_list_datail  
SET checkproduct=checkproduct+1
WHERE product_code="'.$data['product_code'].'" 
AND product_sale_num>checkproduct
	AND sale_runno="'.$data['sale_runno'].'"
	ORDER BY ID ASC LIMIT 1');
$this->db->query('UPDATE sale_list_header 
SET checkproduct=checkproduct+1
WHERE sale_runno="'.$data['sale_runno'].'"');
}else if($nump_sn > '0'){
$findproduct = $data['product_code'];
$this->db->query('UPDATE sale_list_datail  
SET checkproduct=checkproduct+1
WHERE sn_code="'.$data['product_code'].'" 
	AND sale_runno="'.$data['sale_runno'].'"');
$this->db->query('UPDATE sale_list_header 
SET checkproduct=checkproduct+1
WHERE sale_runno="'.$data['sale_runno'].'"');
		}else{
$findproduct = '0';
}

return $findproduct;

        }
		
		
		
		public function Checkbarcode_new($data)
        {

$this->db->query('UPDATE sale_list_datail  
SET checkproduct="0"
WHERE sale_runno="'.$data['sale_runno'].'"');

return true;

        }
		
		
		
		
		public function Checkbarcode_tkn_save($data)
        {

$this->db->query('UPDATE sale_list_header  
SET tracking_number="'.$data['tracking_number'].'"
WHERE sale_runno="'.$data['sale_runno'].'"');

return true;

        }
		
		
		
		
		
		
		



      





  }
