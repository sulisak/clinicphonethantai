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


$query1 = $this->db->query('SELECT * FROM sale_list_datail as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'" ');

$i=1;
$basecost = 0;
foreach ($query1->result() as $row)
{

    $qer = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer->result() as $rowx)
{
    //echo $rowx->product_pricebase;
    //echo '<br />';
    $basecost += $rowx->product_pricebase*$row->product_sale_num;


}


/*echo $i.'<br />';
        echo $row->product_id;
        echo '<br />';
        echo $row->product_sale_num;
        echo '<hr />';*/

        $i++;
}

//echo '----->'.$basecost;
//exit;

$query = $this->db->query('SELECT

    (SELECT sum(sd.product_sale_num*sd.product_price) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as getmoneyall,
    (SELECT sum(sd.product_price_discount) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as discount_item,
    (SELECT sum(sd.product_sale_num) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id  WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as num,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'") as discount_last



    FROM owner as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo '{"data":'.$encode_data.',"cost": "'.$basecost.'"}';

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
LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
LEFT JOIN sale_list_header as sh on sh.sale_runno=sd.sale_runno
WHERE sh.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND sd.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
order by sd.ID DESC
 ');
return $query;

        }




         public function Openbillclosedaylistc($data)
        {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

$query3 = $this->db->query('SELECT
    sh.pay_type,
    sum(sd.product_sale_num) as all_num,
    sum(sd.product_price*sd.product_sale_num) as all_product_price,
    sum(sd.product_price_discount*sd.product_sale_num) as all_discount_price,
    sum((sd.product_price-sd.product_price_discount)*sd.product_sale_num) as sumsale_price
    FROM sale_list_header as sh
LEFT JOIN sale_list_datail as sd on sd.sale_runno=sh.sale_runno
LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"
     GROUP BY sh.pay_type
     ');

$encode_data3 = json_encode($query3->result(),JSON_UNESCAPED_UNICODE );

return $encode_data3;

        }




        public function Showproduct($data)
       {
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;

if(isset($data['supplier_id'])){
  $supplier_id = $data['supplier_id'];
}else{
  $supplier_id = $_SESSION['supplier_id'];
}

$query3 = $this->db->query('SELECT
   sh.pay_type,
   sd.product_name,
   sd.product_sale_num,
   sd.product_price,
   sd.product_price_discount,
   from_unixtime(sd.adddate, "%d-%m-%Y %H:%i:%s") as dateadd
   FROM sale_list_datail as sd
LEFT JOIN sale_list_header as sh on sd.sale_runno=sh.sale_runno
LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
   WHERE wpl.supplier_id="'.$supplier_id.'"
   AND sh.pay_type="'.$data['pay_type'].'"
    AND sh.adddate BETWEEN "'.$dayfrom.'" AND "'.$dayto.'"

    ');

$encode_data3 = json_encode($query3->result(),JSON_UNESCAPED_UNICODE );

return $encode_data3;

       }




    }
