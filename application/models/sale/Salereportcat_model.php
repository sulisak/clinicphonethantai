<?php

class Salereportcat_model extends CI_Model {



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
    IFNULL(wpc.product_category_id,"0") as product_category_id,
    IFNULL(wpc.product_category_name,"ບໍ່ມີໝວດໝູ່") as product_category_name,
    sum(sld.product_sale_num) as product_numall,
    sum(sld.product_price * sld.product_sale_num) as product_pricesaleall,
    sum(sld.product_price_discount*sld.product_sale_num) as product_pricediscountall,
    sum((sld.product_price - sld.product_price_discount) * sld.product_sale_num) as product_priceall,
    wpl.product_pricebase as product_pricebaseall

FROM sale_list_datail as sld
LEFT JOIN wh_product_list as wpl on sld.product_id=wpl.product_id
LEFT JOIN wh_product_category as wpc on wpl.product_category_id=wpc.product_category_id
WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
AND sld.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
GROUP BY wpl.product_category_id ORDER BY product_priceall DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




public function Salelistdatail($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT 
sld.product_name,
sld.product_code,
SUM(sld.product_sale_num) as product_sale_num,
SUM((sld.product_price-sld.product_price_discount)*sld.product_sale_num) as priceall,
IFNULL(s.product_stock_num,"0") AS stock_now,
IFNULL(wpu.product_unit_name,"") AS product_unit_name
FROM sale_list_datail as sld
LEFT JOIN wh_product_list as wpl on sld.product_id=wpl.product_id
LEFT JOIN wh_product_unit as wpu on wpl.product_unit_id=wpu.product_unit_id
LEFT JOIN stock as s on s.product_id=wpl.product_id
LEFT JOIN wh_product_category as wpc on wpl.product_category_id=wpc.product_category_id
WHERE sld.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND wpl.product_category_id="'.$data['cat_id'].'"
GROUP BY sld.product_name
ORDER BY CONVERT( sld.product_name USING tis620 ) ASC');

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
