<?php

class Supplierreport_model extends CI_Model {



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
$supplier_id = $data['supplier_id'];

$query = $this->db->query('SELECT
    wpl.product_code as product_code,
    wpl.product_name as product_name,
    sp.supplier_name as supplier_name,
    sum(sld.product_sale_num) as product_numall,
    sum(sld.product_price * sld.product_sale_num) as product_pricesaleall,
    sum(sld.product_price_discount*sld.product_sale_num) as product_pricediscountall,
    sum((sld.product_price - sld.product_price_discount) * sld.product_sale_num)  as product_priceall,
    sum(wpl.product_pricebase*sld.product_sale_num) as product_pricebaseall

FROM sale_list_datail as sld
LEFT JOIN wh_product_list as wpl on wpl.product_id=sld.product_id
LEFT JOIN supplier as sp on sp.supplier_id=wpl.supplier_id
WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
AND sp.supplier_id="'.$supplier_id.'"
AND sld.adddate BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
GROUP BY sld.product_id ORDER BY product_priceall DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


        public function Exportexcel($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;
$supplier_id = $data['supplier_id'];

$query = $this->db->query('SELECT
    sp.supplier_name as "Supplier",
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
LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
LEFT JOIN supplier as sp on sp.supplier_id=wpl.supplier_id
WHERE sh.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$supplier_id.'"
AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
order by sd.ID DESC
 ');
return $query;

        }



    }
