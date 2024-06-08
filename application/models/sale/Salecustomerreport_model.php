<?php

class Salecustomerreport_model extends CI_Model {



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

$query = $this->db->query('SELECT sh.cus_id,
sh.cus_name,
sum(sh.sumsale_num) as salenum,
sum(sh.sumsale_price) as saleprice,
sum(sh.discount_last) as discount_last
    FROM sale_list_header as sh
     WHERE sh.cus_id > "0" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.cus_name LIKE "%'.$data['searchtext'].'%"
GROUP BY sh.cus_id
      ORDER BY saleprice DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }


public function Salelistdatail($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$query = $this->db->query('SELECT * , from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as adddate
FROM sale_list_datail as sd
LEFT JOIN sale_list_header as sh on sh.sale_runno=sd.sale_runno
LEFT JOIN branch as b on b.branch_id=sh.branch_id
WHERE sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND sh.cus_id="'.$data['cus_id'].'"
ORDER BY sd.ID DESC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }
		
		
		
		
		
		
		
		
		
		

        public function Exportexcel($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query = $this->db->query('SELECT
    cus_name as "ชื่อลูกค้า",
	sumsale_num as "รวมจำนวนที่ซื้อ",
	sumsale_price as "รวมยอดเงินที่ซื้อ",
	from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as "วันที่"
FROM sale_list_header
WHERE cus_id > "0" AND adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
 ');
return $query;

        }



         public function Exportexcelcus($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query = $this->db->query('SELECT
    sh.cus_name as "Customer Name",
    wl.product_name as "Product Name",
    sd.product_price as "Price/Unit",
    sd.product_price_discount as "Discount/Unit",
    sd.product_sale_num as "QTY",
    (sd.product_price-sd.product_price_discount)*sd.product_sale_num as "Summary",
    from_unixtime(sd.adddate,"%d-%m-%Y %H:%i:%s") as "Date"
FROM sale_list_datail as sd
LEFT JOIN sale_list_header as sh on sh.sale_runno=sd.sale_runno
LEFT JOIN wh_product_list as wl on wl.product_id=sd.product_id
WHERE sh.cus_id="'.$data['cus_id'].'" AND sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" order by sd.ID DESC  ');
return $query;

        }





    }
