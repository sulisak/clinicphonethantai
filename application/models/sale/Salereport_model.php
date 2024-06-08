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



$query0 = $this->db->query('SELECT
	sld.price_vat as price_vat,
    sld.product_id as product_id,
	SUM(sld.price_vat) as sum_price_vat,
    sld.product_code as product_code,
    wl.product_name as product_name,
sld.product_stock_num as product_stock_num,
sld.adddate as sale_adddate,
    (SELECT SUM(im.importproduct_detail_num) FROM wh_importproduct_detail as im WHERE im.product_id=sld.product_id AND im.importproduct_detail_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as importproduct_detail_num,
    
(SELECT sum(sd.product_sale_num) FROM product_return_datail as sd WHERE sd.product_id=sld.product_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_numreturn,
    (SELECT im.importproduct_detail_date FROM wh_importproduct_detail as im WHERE im.product_id=sld.product_id AND im.importproduct_detail_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" ORDER BY im.importproduct_detail_id ASC LIMIT 1) as importproduct_detail_date,
   
	(SELECT SUM(im.importproduct_detail_num) FROM wh_importproduct_detail as im WHERE im.product_id=sld.product_id AND im.importproduct_detail_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND im.importproduct_detail_date < sale_adddate ORDER BY im.importproduct_detail_id ASC LIMIT 1) as importproduct_detail_num_beforsale,
       
	
	sum(sld.product_sale_num)  as product_numall,
    sum(sld.product_price * sld.product_sale_num) as product_pricesaleall,
    sum(sld.product_price_discount*sld.product_sale_num) as product_pricediscountall,
    sum((sld.product_price - sld.product_price_discount) * sld.product_sale_num)  as product_priceall,
    SUM(wl.product_pricebase*sld.product_sale_num) as product_pricebaseall

FROM sale_list_datail as sld
LEFT JOIN wh_product_list as wl on wl.product_id=sld.product_id
LEFT JOIN branch as b on b.branch_id=sld.branch_id
WHERE sld.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
OR sld.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
GROUP BY sld.product_id,sld.product_code ORDER BY product_numall DESC');


$query1 = $this->db->query('SELECT
	sld.price_vat as price_vat,
	SUM(sld.price_vat) as sum_price_vat,
    sld.product_id as product_id,
    sld.product_code as product_code,
    wl.product_name as product_name,
	sld.product_stock_num as product_stock_num,
sld.adddate as sale_adddate,
(SELECT SUM(im.importproduct_detail_num) FROM wh_importproduct_detail as im WHERE im.product_id=sld.product_id AND im.importproduct_detail_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as importproduct_detail_num,
    
(SELECT sum(sd.product_sale_num) FROM product_return_datail as sd WHERE sd.product_id=sld.product_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_numreturn,
	
	(SELECT im.importproduct_detail_date FROM wh_importproduct_detail as im WHERE im.product_id=sld.product_id AND im.importproduct_detail_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" ORDER BY im.importproduct_detail_id ASC LIMIT 1) as importproduct_detail_date,
   
	(SELECT SUM(im.importproduct_detail_num) FROM wh_importproduct_detail as im WHERE im.product_id=sld.product_id AND im.importproduct_detail_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND im.importproduct_detail_date < sale_adddate ORDER BY im.importproduct_detail_id ASC LIMIT 1) as importproduct_detail_num_beforsale,
       
	
	sum(sld.product_sale_num)  as product_numall,
    sum(sld.product_price * sld.product_sale_num) as product_pricesaleall,
    sum(sld.product_price_discount*sld.product_sale_num) as product_pricediscountall,
    sum((sld.product_price - sld.product_price_discount) * sld.product_sale_num)  as product_priceall,
    SUM(wl.product_pricebase*sld.product_sale_num) as product_pricebaseall

FROM sale_list_datail as sld
LEFT JOIN wh_product_list as wl on wl.product_id=sld.product_id
LEFT JOIN branch as b on b.branch_id=sld.branch_id
WHERE sld.price_vat!="0.00" AND sld.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
OR sld.price_vat!="0.00" AND sld.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
GROUP BY sld.product_id,sld.product_code ORDER BY product_numall DESC');



$query2 = $this->db->query('SELECT
	sld.price_vat as price_vat,
    sld.product_id as product_id,
	SUM(sld.price_vat) as sum_price_vat,
    sld.product_code as product_code,
    wl.product_name as product_name,
	sld.product_stock_num as product_stock_num,
sld.adddate as sale_adddate,
(SELECT SUM(im.importproduct_detail_num) FROM wh_importproduct_detail as im WHERE im.product_id=sld.product_id AND im.importproduct_detail_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as importproduct_detail_num,
    
(SELECT sum(sd.product_sale_num) FROM product_return_datail as sd WHERE sd.product_id=sld.product_id  AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as product_numreturn,
	
	(SELECT im.importproduct_detail_date FROM wh_importproduct_detail as im WHERE im.product_id=sld.product_id AND im.importproduct_detail_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" ORDER BY im.importproduct_detail_id ASC LIMIT 1) as importproduct_detail_date,
   
	(SELECT SUM(im.importproduct_detail_num) FROM wh_importproduct_detail as im WHERE im.product_id=sld.product_id AND im.importproduct_detail_date BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND im.importproduct_detail_date < sale_adddate ORDER BY im.importproduct_detail_id ASC LIMIT 1) as importproduct_detail_num_beforsale,
       
	
	sum(sld.product_sale_num)  as product_numall,
    sum(sld.product_price * sld.product_sale_num) as product_pricesaleall,
    sum(sld.product_price_discount*sld.product_sale_num) as product_pricediscountall,
    sum((sld.product_price - sld.product_price_discount) * sld.product_sale_num)  as product_priceall,
    SUM(wl.product_pricebase*sld.product_sale_num) as product_pricebaseall

FROM sale_list_datail as sld
LEFT JOIN wh_product_list as wl on wl.product_id=sld.product_id
LEFT JOIN branch as b on b.branch_id=sld.branch_id
WHERE sld.price_vat="0.00" AND sld.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
OR sld.price_vat="0.00" AND sld.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND wl.product_name LIKE "%'.$data['searchtext'].'%"
GROUP BY sld.product_id,sld.product_code ORDER BY product_numall DESC');

if($data['showproductvat']=='0'){
$query = $query0;	
}else if($data['showproductvat']=='1'){
$query = $query1;
}else if($data['showproductvat']=='2'){
$query = $query2;
}

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




public function Salelistdatail($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT * , 
sd.branch_id,
uo.name,
from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as adddate
FROM sale_list_datail as sd
LEFT JOIN sale_list_header as sh on sh.sale_runno=sd.sale_runno
LEFT JOIN branch as b on b.branch_id=sd.branch_id
LEFT JOIN user_owner as uo on uo.user_id=sd.user_id
WHERE sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sd.product_id="'.$data['product_id'].'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
OR sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sd.product_id="'.$data['product_id'].'" AND sd.product_name LIKE "%'.$data['searchtext'].'%"
ORDER BY sd.ID ASC');

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
LEFT JOIN sale_list_header as sh on sh.sale_runno=sd.sale_runno
LEFT JOIN branch as b on b.branch_id=sd.branch_id
WHERE sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
OR sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sd.product_name LIKE "%'.$data['searchtext'].'%"
ORDER BY sd.ID DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





public function Discountlastlist($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT *, 
from_unixtime(sh.adddate,"%d-%m-%Y %H:%i:%s") as adddate
FROM sale_list_header as sh
LEFT JOIN branch as b on b.branch_id=sh.branch_id
WHERE sh.discount_last!="0.00" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"  AND b.branch_name LIKE "%'.$data['searchtext'].'%"

ORDER BY sh.ID DESC');

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
