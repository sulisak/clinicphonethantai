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


$query = $this->db->query('SELECT 
    wpl.product_code as product_code,
    wpl.product_name as product_name,
    (SELECT sum(sd.product_sale_num) FROM product_return_datail as sd WHERE sd.product_id=wpl.product_id  AND sd.owner_id="'.$data['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_numall,
    (SELECT sum(sd.product_price * sd.product_sale_num) FROM product_return_datail as sd WHERE sd.product_id=wpl.product_id   AND sd.owner_id="'.$data['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_pricesaleall,
    (SELECT sum(sd.product_price_discount*sd.product_sale_num) FROM product_return_datail as sd WHERE sd.product_id=wpl.product_id   AND sd.owner_id="'.$data['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_pricediscountall,
    (SELECT sum((sd.product_price - sd.product_price_discount) * sd.product_sale_num) FROM product_return_datail as sd WHERE sd.product_id=wpl.product_id  AND sd.owner_id="'.$data['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_priceall,
    (SELECT wid.product_pricebase FROM wh_product_list as wid WHERE wid.product_id=wpl.product_id AND wid.owner_id="'.$data['owner_id'].'") as product_pricebaseall


    FROM wh_product_list as wpl WHERE wpl.owner_id="'.$data['owner_id'].'" ORDER BY product_priceall DESC');
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
	sh.sumsale_num as "จำนวนที่คืน",
	(sd.product_price*sd.product_sale_num)-(sd.product_sale_num*sd.product_price_discount) as "คืนเงิน",
	from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as "วันที่"
FROM product_return_datail as sd
LEFT JOIN product_return_header as sh on sh.return_runno=sd.return_runno
WHERE sh.owner_id="'.$data['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
order by sd.ID DESC 
 ');
return $query;

        }



    }