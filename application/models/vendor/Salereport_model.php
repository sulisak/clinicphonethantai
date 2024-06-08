<?php

class Salereport_model extends CI_Model {



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
    (SELECT sum(sd.product_sale_num) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.product_id=sld.product_id AND wl.supplier_id="'.$_SESSION['supplier_id'].'"  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_numall,
    (SELECT sum(sd.product_price * sd.product_sale_num) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.product_id=sld.product_id AND wl.supplier_id="'.$_SESSION['supplier_id'].'"   AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_pricesaleall,
    (SELECT sum(sd.product_price_discount*sd.product_sale_num) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.product_id=sld.product_id AND wl.supplier_id="'.$_SESSION['supplier_id'].'"   AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_pricediscountall,
    (SELECT sum((sd.product_price - sd.product_price_discount) * sd.product_sale_num) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id WHERE sd.product_id=sld.product_id AND wl.supplier_id="'.$_SESSION['supplier_id'].'"  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_priceall,
    (SELECT wid.product_pricebase FROM wh_product_list as wid WHERE wid.product_id=sld.product_id AND wid.supplier_id="'.$_SESSION['supplier_id'].'" AND wid.owner_id="'.$_SESSION['owner_id'].'") as product_pricebaseall

FROM sale_list_datail as sld
LEFT JOIN wh_product_list as wpl on wpl.product_id=sld.product_id
WHERE sld.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
AND sld.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
GROUP BY wpl.product_id,wpl.product_code,wpl.product_name ORDER BY product_priceall DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




public function Salelistdatail($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT *, from_unixtime(sld.adddate,"%d-%m-%Y %H:%i:%s") as adddate
FROM sale_list_datail as sld
LEFT JOIN wh_product_list as wpl on wpl.product_id=sld.product_id
WHERE sld.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
AND sld.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
AND sld.product_id="'.$data['product_id'].'" ORDER BY ID DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }



public function Salelistdatailinlist($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT *, from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as adddate,
sh.cus_name
FROM sale_list_datail as sd
LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
LEFT JOIN sale_list_header as sh on sh.sale_runno=sd.sale_runno
WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
AND sd.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"  ORDER BY sd.ID DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





public function Discountlastlist($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT *, from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
FROM sale_list_header
WHERE owner_id="'.$_SESSION['owner_id'].'"
AND  discount_last!="0.00" AND adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"  ORDER BY ID DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }



public function Pawnlist($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT *,
 from_unixtime(add_time,"%d-%m-%Y %H:%i:%s") as adddate,
 pawnadd_cutmoney,
 pawnadd_permoney
FROM pawnadddate
WHERE add_time
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"  ORDER BY p_id ASC');

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
