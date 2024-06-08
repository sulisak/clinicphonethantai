<?php

class Expen_report_model extends CI_Model {



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
    wpl.product_id as product_id,
    wpl.product_code as product_code,
    wpl.product_name as product_name,
    wpc.product_category_name as product_category_name,
    sum(sld.importproduct_detail_num)as product_numall,
    sum(sld.price_per_num * sld.importproduct_detail_num) as product_priceexpenall


FROM purchase_buy_detail as sld
LEFT JOIN wh_product_list as wpl on wpl.product_id=sld.product_id
LEFT JOIN wh_product_category as wpc on wpc.product_category_id=wpl.product_category_id
WHERE sld.vendor_name LIKE "%'.$data['searchtext'].'%" AND sld.importproduct_detail_adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
OR wpl.product_name LIKE "%'.$data['searchtext'].'%" AND sld.importproduct_detail_adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
GROUP BY sld.product_id ORDER BY product_priceexpenall DESC');




$querydata = $query->result();

$encode_data = json_encode($querydata,JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





public function Expenlistdatail($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT *, from_unixtime(importproduct_detail_adddate,"%d-%m-%Y %H:%i:%s") as adddate
FROM purchase_buy_detail
WHERE importproduct_detail_adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND product_id="'.$data['product_id'].'" AND vendor_name LIKE "%'.$data['searchtext'].'%" 
ORDER BY importproduct_detail_id ASC');


  $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


return $encode_data;

        }








        public function Exportexcel($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto']);

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
