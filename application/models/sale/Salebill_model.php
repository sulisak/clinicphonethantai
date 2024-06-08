<?php

class Salebill_model extends CI_Model {



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

if($data['showall']=='1'){
	
$querynum = $this->db->query('SELECT *, 
from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
from_unixtime(sh.adddate+(co.credit_day*86400),"%d-%m-%Y") as date_for_pay,
(sh.adddate+(co.credit_day*86400)) as date_for_pay_timestamp,
(SELECT name FROM user_owner WHERE user_id=sh.user_id) as name
    FROM sale_list_header as sh
	LEFT JOIN customer_owner as co on co.cus_id=sh.cus_id
	LEFT JOIN user_owner as uo on uo.user_id=sh.user_id
	LEFT JOIN branch as b on b.branch_id=sh.branch_id
    WHERE  sh.pay_type="4" AND sh.cus_name LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" 
    OR sh.pay_type="4" AND sh.sale_runno LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" 
    OR sh.pay_type="4" AND b.branch_name LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" 
    OR sh.pay_type="4" AND uo.name LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" 
    
	ORDER BY ID DESC ');
$query = $this->db->query('SELECT *, 
from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
from_unixtime(sh.adddate+(IFNULL(co.credit_day,"0")*86400),"%d-%m-%Y") as date_for_pay,
(sh.adddate+(IFNULL(co.credit_day,"0")*86400)) as date_for_pay_timestamp,
IFNULL(co.credit_day,"0") AS credit_day,
(SELECT name FROM user_owner WHERE user_id=sh.user_id) as name
    FROM sale_list_header as sh
	LEFT JOIN customer_owner as co on co.cus_id=sh.cus_id
	LEFT JOIN user_owner as uo on uo.user_id=sh.user_id
	LEFT JOIN branch as b on b.branch_id=sh.branch_id
    WHERE  sh.pay_type="4" AND sh.cus_name LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" 
    OR sh.pay_type="4" AND sh.sale_runno LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" 
    OR sh.pay_type="4" AND b.branch_name LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" 
    OR sh.pay_type="4" AND uo.name LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" 
    
	ORDER BY date_for_pay_timestamp ASC LIMIT '.$start.' , '.$perpage.' ');		
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
$num_rows = $querynum->num_rows();

}else{
	
$querynum = $this->db->query('SELECT *, 
from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
from_unixtime(sh.adddate+(co.credit_day*86400),"%d-%m-%Y") as date_for_pay,
(sh.adddate+(co.credit_day*86400)) as date_for_pay_timestamp,
(SELECT name FROM user_owner WHERE user_id=sh.user_id) as name
    FROM sale_list_header as sh
	LEFT JOIN customer_owner as co on co.cus_id=sh.cus_id
	LEFT JOIN user_owner as uo on uo.user_id=sh.user_id
	LEFT JOIN branch as b on b.branch_id=sh.branch_id
    WHERE sh.pay_type="4" AND sh.cus_name LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"  AND money_changeto_customer!="0.00"
    OR sh.pay_type="4" AND sh.sale_runno LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND money_changeto_customer!="0.00"
	OR sh.pay_type="4" AND b.branch_name LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND money_changeto_customer!="0.00"
    OR sh.pay_type="4" AND uo.name LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND money_changeto_customer!="0.00"
    
	ORDER BY ID DESC ');
	
$query = $this->db->query('SELECT *, 
from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
from_unixtime(sh.adddate+(IFNULL(co.credit_day,"0")*86400),"%d-%m-%Y") as date_for_pay,
(sh.adddate+(IFNULL(co.credit_day,"0")*86400)) as date_for_pay_timestamp,
IFNULL(co.credit_day,"0") AS credit_day,
(SELECT name FROM user_owner WHERE user_id=sh.user_id) as name
    FROM sale_list_header as sh
	LEFT JOIN customer_owner as co on co.cus_id=sh.cus_id
	LEFT JOIN user_owner as uo on uo.user_id=sh.user_id
	LEFT JOIN branch as b on b.branch_id=sh.branch_id
    WHERE sh.pay_type="4" AND sh.cus_name LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"  AND money_changeto_customer!="0.00"
    OR sh.pay_type="4" AND sh.sale_runno LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND money_changeto_customer!="0.00"
	OR sh.pay_type="4" AND b.branch_name LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND money_changeto_customer!="0.00"
    OR sh.pay_type="4" AND uo.name LIKE "%'.$data['searchtext'].'%" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND money_changeto_customer!="0.00"
    
	ORDER BY date_for_pay_timestamp ASC LIMIT '.$start.' , '.$perpage.' ');		
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
$num_rows = $querynum->num_rows();
	
}





$pageall = ceil($num_rows/$perpage);




$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;


        }




public function Get_detail_salebill($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT *, from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_datail  as sh
	LEFT JOIN sale_list_header as she on she.sale_runno=sh.sale_runno
    WHERE she.cus_name LIKE "%'.$data['searchtext'].'%" AND she.pay_type="4" AND she.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
ORDER BY sh.ID ASC ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );




$json = '{"list": '.$encode_data.'}';

return $json;


        }
		




public function Opencusfind($data)
        {

$query = $this->db->query('SELECT *,sh.cus_id,sh.cus_name,sh.cus_address_all,
sum(sh.sumsale_price) as sumsale_price,
sum(sh.money_from_customer) as money_from_customer,
sum(sh.money_changeto_customer) as money_changeto_customer,
sum(sh.discount_last) as discount_last
    FROM sale_list_header as sh
    WHERE sh.pay_type="4" AND sh.cus_id>"0" 
	AND sh.cus_name LIKE "%'.$data['searchcusname'].'%"
	AND sh.money_changeto_customer <"0"
	OR sh.pay_type="4" AND sh.cus_id>"0" 
	AND sh.cus_address_all LIKE "%'.$data['searchcusname'].'%"
	AND sh.money_changeto_customer <"0"
	GROUP BY sh.cus_id
    ORDER BY sh.ID ASC LIMIT 100');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }
		
		
		
		
		
		public function Getallbycus($data)
        {

$query = $this->db->query('SELECT sd.*,
from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
sum(sd.product_sale_num) as sum_product_sale_num,
sum((sd.product_price-sd.product_price_discount)*product_sale_num) as sum_product_price
    FROM sale_list_datail as sd
LEFT JOIN sale_list_header as sh on sh.sale_runno=sd.sale_runno
    WHERE sh.cus_id="'.$data['cus_id'].'" AND sh.pay_type="4"
	AND sh.money_changeto_customer < "0"
	GROUP BY sd.product_name,sd.product_price
    ORDER BY sd.ID ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }
		
		
		
		
		

public function Getone($data)
        {

$query = $this->db->query('SELECT *, from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_datail as sd
    LEFT JOIN sale_list_header as sh on sh.sale_runno=sd.sale_runno
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.sale_runno="'.$data['sale_runno'].'"
    ORDER BY sd.ID ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Getone2($data)
        {

$query = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM sale_list_datail
    WHERE owner_id="'.$_SESSION['owner_id'].'" AND sale_runno="'.$data['sale_runno'].'"
    ORDER BY ID ASC');

return $query->result();

        }



  public function Deletelist($data)
        {

$query = $this->db->query('DELETE FROM sale_list_datail  WHERE sale_runno="'.$data['sale_runno'].'" and  owner_id="'.$_SESSION['owner_id'].'"');

if($query){
$query2 = $this->db->query('DELETE FROM sale_list_header  WHERE sale_runno="'.$data['sale_runno'].'" and  owner_id="'.$_SESSION['owner_id'].'"');


$this->db->query('UPDATE customer_owner
    SET product_score_all=product_score_all - '.$data['product_score_all'].' WHERE cus_id="'.$data['cus_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
}


return true;

        }



 public function Updateproductaddstock($data)
        {

$price_value = $data['product_price'] * $data['product_sale_num'];
$query = $this->db->query('UPDATE wh_product_list
    SET product_stock_num=product_stock_num + '.$data['product_sale_num'].'
    WHERE product_id="'.$data['product_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }



 public function Billsalesave($data)
        {


if($data['cus_id']==null){
	$data['cus_id'] ='0';
}

if($data['cus_name']==null){
	$data['cus_name'] ='';
}


$data2['sale_runno'] = $data['sale_runno'];
$data2['cus_id'] = $data['cus_id'];
$data2['cus_name'] = $data['cus_name'];
$data2['pay_money'] = $data['pay_money'];
$data2['pay_date'] = $data['pay_date'];
$data2['pay_type'] = $data['pay_type'];
$data2['des'] = $data['des'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['name'] = $_SESSION['name'];
$data2['adddate'] = time();
$this->db->insert("credit_payed", $data2);


$query = $this->db->query('UPDATE sale_list_header
    SET money_from_customer=money_from_customer+'.$data['pay_money'].',
    money_changeto_customer=money_changeto_customer+'.$data['pay_money'].'

    WHERE ID="'.$data['ID'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
	
	
	
	$this->db->query('UPDATE morepay
    SET money=money+'.$data['pay_money'].' 
    WHERE sale_runno="'.$data['sale_runno'].'"');
	
	
	
	
	
$querycc = $this->db->query('SELECT COUNT(*) as num
    FROM credit_payed
    WHERE sale_runno="'.$data['sale_runno'].'"');
	
$encode_data = json_encode($querycc->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }
		
	
	
	
	
	
	



 public function Payallbill($data)
        {


$queryfirst = $this->db->query('SELECT * FROM sale_list_header
    WHERE cus_id="'.$data['cus_id'].'" AND pay_type="4" AND money_changeto_customer!="0.00"
	ORDER BY ID ASC
	');


unset($_SESSION['paymoneymore_mc']);

$time = time();
$timedate = date('d-m-Y H:i:s');

foreach ($queryfirst->result() as $row) {

$mc = -1*$row->money_changeto_customer;



if(isset($_SESSION['paymoneymore_mc'])){
	
	
	
if($_SESSION['paymoneymore_mc']>$mc){
$data['pay_money'] = $mc;
echo '1';
}else{
$data['pay_money'] = $_SESSION['paymoneymore_mc'];
echo '2';
}



}else{

if($data['paymoneymore']>$mc){
$data['pay_money'] = $mc;
echo '3';
}else{
$data['pay_money'] = $data['paymoneymore'];
echo '4';
}

}




$data2['sale_runno'] = $row->sale_runno;
$data2['cus_id'] = $data['cus_id'];
$data2['cus_name'] = $row->cus_name;
$data2['pay_money'] = $data['pay_money'];
$data2['pay_date'] = $timedate;
$data2['pay_type'] = '1';
$data2['des'] = 'จ่ายแบบรวมบิล';
$data2['user_id'] = $_SESSION['user_id'];
$data2['name'] = $_SESSION['name'];
$data2['adddate'] = $time;
$this->db->insert("credit_payed", $data2);


$this->db->query('UPDATE sale_list_header
    SET money_from_customer=money_from_customer+'.$data['pay_money'].',
    money_changeto_customer=money_changeto_customer+'.$data['pay_money'].'

    WHERE ID="'.$row->ID.'" and  owner_id="'.$_SESSION['owner_id'].'"');
	
	
	
	$this->db->query('UPDATE morepay
    SET money=money+'.$data['pay_money'].' 
    WHERE sale_runno="'.$row->sale_runno.'"');
	
	


if($data['paymoneymore']<=$mc){
	echo '5';
exit();	
}


if(isset($_SESSION['paymoneymore_mc']) && $_SESSION['paymoneymore_mc']<=$mc){
	echo '6';
exit();	
}


if(!isset($_SESSION['paymoneymore_mc'])){
		$newdata = array(
        'paymoneymore_mc' => $data['paymoneymore']-$mc	
);
$this->session->set_userdata($newdata);
}else{
$newdata = array(
        'paymoneymore_mc' => $_SESSION['paymoneymore_mc']-$mc		
);
$this->session->set_userdata($newdata);
}


}
	


        }
	
	
	
	
		
		
 public function Listpayed($data)
        {
	
$query = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM credit_payed
    WHERE sale_runno="'.$data['sale_runno'].'" ORDER BY id ASC');
	
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }
		
		
		
		
		
		 public function Listpayedall($data)
        {
	
	$dayfrom = strtotime($data['dayfrom_l']);
$dayto = strtotime($data['dayto_l'])+86400;


$query = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
    FROM credit_payed
     WHERE cus_name LIKE "%'.$data['searchtext'].'%" AND adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
    OR sale_runno LIKE "%'.$data['searchtext'].'%" AND adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
	OR name LIKE "%'.$data['searchtext'].'%" AND adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
	OR des LIKE "%'.$data['searchtext'].'%" AND adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
     ORDER BY id DESC');
	
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





  }
