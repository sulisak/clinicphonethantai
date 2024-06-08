<?php

class Reportsumary_model extends CI_Model {



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

sum(sh.sumsale_price)as getmoneyall,
sum(sh.sumsale_num) as num,
sum(sh.discount_last) as discount_last,
sum(sh.money_changeto_customer) as money_changeto_customer,
(SELECT SUM(pr.sumsale_price) FROM product_return_header2 as pr LEFT JOIN branch as b on b.branch_id=pr.branch_id WHERE pr.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%") as money_from_customer
    FROM sale_list_header as sh
	LEFT JOIN branch as b on b.branch_id=sh.branch_id 
	WHERE sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
	');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo '{"data":'.$encode_data.'}';

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




        public function Openbillclosedaylistc($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query3 = $this->db->query('SELECT
    m.pay_type,
    sum(m.money) as sumsale_price2
	FROM morepay as m
    LEFT JOIN sale_list_header as sh on sh.sale_runno=m.sale_runno
LEFT JOIN branch as b on b.branch_id=m.branch_id
    WHERE sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" AND b.branch_name LIKE "%'.$data['searchtext'].'%"
    GROUP BY m.pay_type ORDER BY m.pay_type ASC
     ');

$encode_data3 = json_encode($query3->result(),JSON_UNESCAPED_UNICODE );

return $encode_data3;

        }



    }
