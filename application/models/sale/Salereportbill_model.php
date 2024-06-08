<?php

class Salereportbill_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT
    *,
	from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
FROM credit_payed
WHERE cus_name LIKE "%'.$data['searchtext'].'%"
AND UNIX_TIMESTAMP(STR_TO_DATE(pay_date, "%d-%m-%Y %H:%i"))
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
OR name LIKE "%'.$data['searchtext'].'%"
AND UNIX_TIMESTAMP(STR_TO_DATE(pay_date, "%d-%m-%Y %H:%i"))
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
OR des LIKE "%'.$data['searchtext'].'%"
AND UNIX_TIMESTAMP(STR_TO_DATE(pay_date, "%d-%m-%Y %H:%i"))
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
OR sale_runno LIKE "%'.$data['searchtext'].'%"
AND UNIX_TIMESTAMP(STR_TO_DATE(pay_date, "%d-%m-%Y %H:%i"))
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
ORDER BY id DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Exportexcel($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query = $this->db->query('SELECT 
    sh.cus_name as "ชื่อลูกค้า",
    sd.product_code as "รหัสสินค้า",
	sd.product_name as "ชื่อสินค้า",
	sd.product_price as "ราคาขายต่อหน่วย",
    sd.product_price_discount as "ส่วนลดต่อหน่วย",
	sd.product_sale_num as "จำนวนที่ซื้อ",
	(sd.product_price*sd.product_sale_num)-(sd.product_sale_num*sd.product_price_discount) as "รายรับ",
	from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as "วันที่"
FROM sale_list_datail as sd
LEFT JOIN sale_list_header as sh on sh.sale_runno=sd.sale_runno
WHERE sh.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
order by sd.ID DESC 
 ');
return $query;

        }



    }
