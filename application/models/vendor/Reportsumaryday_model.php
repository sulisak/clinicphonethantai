<?php

class Reportsumaryday_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist($data)
        {

$year = $data['year'];
$month = $data['month'];

////////// 1
$query1 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="01" ');

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
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="02" ');

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
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="03" ');

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
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="04" ');

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
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="05" ');

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
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="06" ');

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
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="07" ');

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
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="08" ');

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
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="09" ');

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
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="10" ');

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
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="11" ');

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
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="12" ');

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

////////// 13
$query13 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="13" ');

$i13=1;
$basecost13 = 0;
foreach ($query13->result() as $row)
{

    $qer13 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer13->result() as $rowx)
{
    $basecost13 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i13++;
}
/////////

////////// 14
$query14 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="14" ');

$i14=1;
$basecost14 = 0;
foreach ($query14->result() as $row)
{

    $qer14 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer14->result() as $rowx)
{
    $basecost14 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i14++;
}
/////////

////////// 15
$query15 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="15" ');

$i15=1;
$basecost15 = 0;
foreach ($query15->result() as $row)
{

    $qer15 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer15->result() as $rowx)
{
    $basecost15 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i15++;
}
/////////

////////// 16
$query16 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="16" ');

$i16=1;
$basecost16 = 0;
foreach ($query16->result() as $row)
{

    $qer16 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer16->result() as $rowx)
{
    $basecost16 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i16++;
}
/////////

////////// 17
$query17 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="17" ');

$i17=1;
$basecost17 = 0;
foreach ($query17->result() as $row)
{

    $qer17 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer17->result() as $rowx)
{
    $basecost17 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i17++;
}
/////////

////////// 18
$query18 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="18" ');

$i18=1;
$basecost18 = 0;
foreach ($query18->result() as $row)
{

    $qer18 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer18->result() as $rowx)
{
    $basecost18 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i18++;
}
/////////

////////// 19
$query19 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="19" ');

$i19=1;
$basecost19 = 0;
foreach ($query19->result() as $row)
{

    $qer19 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer19->result() as $rowx)
{
    $basecost19 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i19++;
}
/////////

////////// 20
$query20 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="20" ');

$i20=1;
$basecost20 = 0;
foreach ($query20->result() as $row)
{

    $qer20 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer20->result() as $rowx)
{
    $basecost20 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i20++;
}
/////////

////////// 21
$query21 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="21" ');

$i21=1;
$basecost21 = 0;
foreach ($query21->result() as $row)
{

    $qer21 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer21->result() as $rowx)
{
    $basecost21 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i21++;
}
/////////

////////// 22
$query22 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="22" ');

$i22=1;
$basecost22 = 0;
foreach ($query22->result() as $row)
{

    $qer22 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer22->result() as $rowx)
{
    $basecost22 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i22++;
}
/////////

////////// 23
$query23 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="23" ');

$i23=1;
$basecost23 = 0;
foreach ($query23->result() as $row)
{

    $qer23 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer23->result() as $rowx)
{
    $basecost23 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i23++;
}
/////////

////////// 24
$query24 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="24" ');

$i24=1;
$basecost24 = 0;
foreach ($query24->result() as $row)
{

    $qer24 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer24->result() as $rowx)
{
    $basecost24 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i24++;
}
/////////

////////// 25
$query25 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="25" ');

$i25=1;
$basecost25 = 0;
foreach ($query25->result() as $row)
{

    $qer25 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer25->result() as $rowx)
{
    $basecost25 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i25++;
}
/////////

////////// 26
$query26 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="26" ');

$i26=1;
$basecost26 = 0;
foreach ($query26->result() as $row)
{

    $qer26 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer26->result() as $rowx)
{
    $basecost26 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i26++;
}
/////////

////////// 27
$query27 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="27" ');

$i27=1;
$basecost27 = 0;
foreach ($query27->result() as $row)
{

    $qer27 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer27->result() as $rowx)
{
    $basecost27 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i27++;
}
/////////

////////// 28
$query28 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="28" ');

$i28=1;
$basecost28 = 0;
foreach ($query28->result() as $row)
{

    $qer28 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer28->result() as $rowx)
{
    $basecost28 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i28++;
}
/////////

////////// 29
$query29 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="29" ');

$i29=1;
$basecost29 = 0;
foreach ($query29->result() as $row)
{

    $qer29 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer29->result() as $rowx)
{
    $basecost29 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i29++;
}
/////////

////////// 30
$query30 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="30" ');

$i30=1;
$basecost30 = 0;
foreach ($query30->result() as $row)
{

    $qer30 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer30->result() as $rowx)
{
    $basecost30 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i30++;
}
/////////

////////// 31
$query31 = $this->db->query('SELECT * FROM sale_list_datail as sd
  LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id
    WHERE sd.owner_id="'.$_SESSION['owner_id'].'"
AND wpl.supplier_id="'.$_SESSION['supplier_id'].'"
    AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'"
    AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="31" ');

$i31=1;
$basecost31 = 0;
foreach ($query31->result() as $row)
{

    $qer31 = $this->db->query('SELECT * FROM wh_product_list as w WHERE w.product_id="'.$row->product_id.'" ');
foreach ($qer31->result() as $rowx)
{
    $basecost31 += $rowx->product_pricebase*$row->product_sale_num;
}
        $i31++;
}
/////////



$query = $this->db->query('SELECT

    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="01") as d1,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="02") as d2,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="03") as d3,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="04") as d4,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="05") as d5,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="06") as d6,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="07") as d7,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="08") as d8,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="09") as d9,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="10") as d10,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="11") as d11,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="12") as d12,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="13") as d13,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="14") as d14,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="15") as d15,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="16") as d16,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="17") as d17,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="18") as d18,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="19") as d19,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="20") as d20,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="21") as d21,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="22") as d22,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="23") as d23,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="24") as d24,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="25") as d25,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="26") as d26,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="27") as d27,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="28") as d28,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="29") as d29,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="30") as d30,
    (SELECT sum((sd.product_sale_num*sd.product_price)-(sd.product_sale_num*sd.product_price_discount)) FROM sale_list_datail as sd LEFT JOIN wh_product_list as wpl on wpl.product_id=sd.product_id WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND wpl.supplier_id="'.$_SESSION['supplier_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="31") as d31,





    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="01") as dd1,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="02") as dd2,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="03") as dd3,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="04") as dd4,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="05") as dd5,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="06") as dd6,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="07") as dd7,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="08") as dd8,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="09") as dd9,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="10") as dd10,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="11") as dd11,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="12") as dd12,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="13") as dd13,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="14") as dd14,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="15") as dd15,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="16") as dd16,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="17") as dd17,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="18") as dd18,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="19") as dd19,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="20") as dd20,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="21") as dd21,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="22") as dd22,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="23") as dd23,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="24") as dd24,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="25") as dd25,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="26") as dd26,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="27") as dd27,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="28") as dd28,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="29") as dd29,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="30") as dd30,
    (SELECT sum(sd.discount_last) FROM sale_list_header as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="31") as dd31,








        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="01") as pm1,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="02") as pm2,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="03") as pm3,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="04") as pm4,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="05") as pm5,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="06") as pm6,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="07") as pm7,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="08") as pm8,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="09") as pm9,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="10") as pm10,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="11") as pm11,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="12") as pm12,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="13") as pm13,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="14") as pm14,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="15") as pm15,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="16") as pm16,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="17") as pm17,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="18") as pm18,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="19") as pm19,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="20") as pm20,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="21") as pm21,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="22") as pm22,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="23") as pm23,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="24") as pm24,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="25") as pm25,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="26") as pm26,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="27") as pm27,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="28") as pm28,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="29") as pm29,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="30") as pm30,
        (SELECT sum(sd.pawnadd_permoney) FROM pawnadddate as sd WHERE  FROM_UNIXTIME(sd.add_time, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.add_time, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.add_time, "%d")="31") as pm31




    FROM sale_list_header as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
    AND FROM_UNIXTIME(wpl.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(wpl.adddate, "%m")="'.$month.'" GROUP BY FROM_UNIXTIME(wpl.adddate, "%m")
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
"c12": "'.$basecost12.'",
"c13": "'.$basecost13.'",
"c14": "'.$basecost14.'",
"c15": "'.$basecost15.'",
"c16": "'.$basecost16.'",
"c17": "'.$basecost17.'",
"c18": "'.$basecost18.'",
"c19": "'.$basecost19.'",
"c20": "'.$basecost20.'",
"c21": "'.$basecost21.'",
"c22": "'.$basecost22.'",
"c23": "'.$basecost23.'",
"c24": "'.$basecost24.'",
"c25": "'.$basecost25.'",
"c26": "'.$basecost26.'",
"c27": "'.$basecost27.'",
"c28": "'.$basecost28.'",
"c29": "'.$basecost29.'",
"c30": "'.$basecost30.'",
"c31": "'.$basecost31.'"

}';

        }






    }
