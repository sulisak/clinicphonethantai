<?php

class Returnreport_model extends CI_Model {



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


$query = $this->db->query('SELECT *,
    wpl.product_code as product_code,
    wpl.product_name as product_name,
	from_unixtime(sld.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
    sum(sld.product_sale_num) as product_numall,
    sum(sld.product_price * sld.product_sale_num) as product_pricesaleall,
    sum(sld.product_price_discount*sld.product_sale_num) as product_pricediscountall,
    sum((sld.product_price - sld.product_price_discount) * sld.product_sale_num) as product_priceall,
    (SELECT wid.product_pricebase FROM wh_product_list as wid WHERE wid.product_id=wpl.product_id AND wid.owner_id="'.$_SESSION['owner_id'].'") as product_pricebaseall


    FROM product_return_datail2 as sld 
LEFT JOIN wh_product_list as wpl on wpl.product_id=sld.product_id
LEFT JOIN branch as b on b.branch_id=sld.branch_id
WHERE sld.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND wpl.product_name LIKE "%'.$data['searchtext'].'%" 
OR sld.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND wpl.product_code LIKE "%'.$data['searchtext'].'%"
OR sld.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
GROUP BY sld.product_id ORDER BY product_priceall DESC');


$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Exportexcel($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query = $this->db->query('SELECT 
    sh.cus_name as "ชื่อผู้คืน",
    sd.product_code as "รหัสสินค้า",
	sd.product_name as "ชื่อสินค้า",
	sd.product_price as "ราคาขายต่อหน่วย",
    sd.product_price_discount as "ส่วนลดต่อหน่วย",
	sd.product_sale_num as "จำนวนที่คืน",
	(sd.product_price*sd.product_sale_num)-(sd.product_sale_num*sd.product_price_discount) as "คืนเงิน",
	from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as "วันที่"
FROM product_return_datail as sd
LEFT JOIN product_return_header as sh on sh.return_runno=sd.return_runno
WHERE sh.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
order by sd.ID DESC 
 ');
return $query;

        }



    }