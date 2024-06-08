<?php

class Reportsumarymonth_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist($data)
        {

$year = $data['year'];

////////// 1
$query1 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="01" ');

$i1=1;
$basecost1 = 0;
foreach ($query1->result() as $row)
{

    $qer1 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer1->result() as $rowx)
{
    $basecost1 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i1++;
}
/////////

////////// 2
$query2 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="02" ');

$i2=1;
$basecost2 = 0;
foreach ($query2->result() as $row)
{

    $qer2 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer2->result() as $rowx)
{
    $basecost2 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i2++;
}
/////////


////////// 3
$query3 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="03" ');

$i3=1;
$basecost3 = 0;
foreach ($query3->result() as $row)
{

    $qer3 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer3->result() as $rowx)
{
    $basecost3 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i3++;
}
/////////

////////// 4
$query4 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="04" ');

$i4=1;
$basecost4 = 0;
foreach ($query4->result() as $row)
{

    $qer4 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer4->result() as $rowx)
{
    $basecost4 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i4++;
}
/////////

////////// 5
$query5 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="05" ');

$i5=1;
$basecost5 = 0;
foreach ($query5->result() as $row)
{

    $qer5 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer5->result() as $rowx)
{
    $basecost5 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i5++;
}
/////////


////////// 6
$query6 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="06" ');

$i6=1;
$basecost6 = 0;
foreach ($query6->result() as $row)
{

    $qer6 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer6->result() as $rowx)
{
    $basecost6 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i6++;
}
/////////

////////// 7
$query7 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="07" ');

$i7=1;
$basecost7 = 0;
foreach ($query7->result() as $row)
{

    $qer7 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer7->result() as $rowx)
{
    $basecost7 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i7++;
}
/////////

////////// 8
$query8 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="08" ');

$i8=1;
$basecost8 = 0;
foreach ($query8->result() as $row)
{

    $qer8 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer8->result() as $rowx)
{
    $basecost8 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i8++;
}
/////////

////////// 9
$query9 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="09" ');

$i9=1;
$basecost9 = 0;
foreach ($query9->result() as $row)
{

    $qer9 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer9->result() as $rowx)
{
    $basecost9 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i9++;
}
/////////

////////// 10
$query10 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="10" ');

$i10=1;
$basecost10 = 0;
foreach ($query10->result() as $row)
{

    $qer10 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer10->result() as $rowx)
{
    $basecost10 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i10++;
}
/////////

////////// 11
$query11 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="11" ');

$i11=1;
$basecost11 = 0;
foreach ($query11->result() as $row)
{

    $qer11 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer11->result() as $rowx)
{
    $basecost11 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i11++;
}
/////////

////////// 12
$query12 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="12" ');

$i12=1;
$basecost12 = 0;
foreach ($query12->result() as $row)
{

    $qer12 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer12->result() as $rowx)
{
    $basecost12 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i12++;
}
/////////


$query = $this->db->query('SELECT

    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="01") as m1,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="02") as m2,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="03") as m3,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="04") as m4,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="05") as m5,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="06") as m6,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="07") as m7,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="08") as m8,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="09") as m9,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="10") as m10,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="11") as m11,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="12") as m12,


    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="01") as mm1,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="02") as mm2,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="03") as mm3,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="04") as mm4,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="05") as mm5,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="06") as mm6,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="07") as mm7,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="08") as mm8,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="09") as mm9,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="10") as mm10,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="11") as mm11,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="12") as mm12,




    (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="01") as pm1,
    (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="02") as pm2,
    (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="03") as pm3,
    (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="04") as pm4,
    (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="05") as pm5,
    (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="06") as pm6,
    (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="07") as pm7,
    (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="08") as pm8,
    (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="09") as pm9,
    (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="10") as pm10,
    (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="11") as pm11,
    (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="12") as pm12





    FROM sale_list_header as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
    AND FROM_UNIXTIME(wpl.adddate, "%Y")="'.$year.'" GROUP BY FROM_UNIXTIME(wpl.adddate, "%Y")
    ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo '{
"data":'.$encode_data.',
"c1": "'.$basecost1.'",
"c2": "'.$basecost2.'",
"c3": "'.$basecost3.'",
"c4": "'.$basecost4.'",
"c5": "'.$basecost5.'",
"c6": "'.$basecost6.'",
"c7": "'.$basecost7.'",
"c8": "'.$basecost8.'",
"c9": "'.$basecost9.'",
"c10": "'.$basecost10.'",
"c11": "'.$basecost11.'",
"c12": "'.$basecost12.'"
}';

        }






    }
