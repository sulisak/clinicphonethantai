<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salepage extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sale/salepage_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{


$data['tab'] = 'salepage';
$data['title'] = 'Sale Page';
		$this->deshboardlayout('sale/salepage',$data);
}




function Getproductlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Getproductlist($data);

	}

public	function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
$data['product_code'] = $this->C2mpos_barcode_th_to_en($data['product_code']);
echo  $this->salepage_model->Findproduct($data);

	}



function Customer()
    {

$data = json_decode(file_get_contents("php://input"),true);

if($data['getcourse']=='0'){
echo  $this->salepage_model->Customer($data);
}else{
echo  $this->salepage_model->Cuscourse($data);
}

	}
	

	
	
	
	function Allcuscourse()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Allcuscourse($data);
	}
	
	
		function Savethiscuscourse()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Savethiscuscourse($data);
	}
	
	
	



function Getquotation()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Getquotation($data);

	}




	function Gettoday()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->salepage_model->Gettoday($data);

	}

function Cususepoint()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(isset($data['customer_usepoint'])){
echo  $this->salepage_model->Cususepoint($data);
}

	}
	





function Savepopup_num()
    {

$data = json_decode(file_get_contents("php://input"),true);

echo  $this->salepage_model->Savepopup_num($data);


	}
	
	
	
	function Savepopup_price()
    {

$data = json_decode(file_get_contents("php://input"),true);

echo  $this->salepage_model->Savepopup_price($data);


	}
	
	
	
	
	

	function Updatemoneychange()
    {

$this->salepage_model->Updatemoneychange();


	}




function Savesale()
    {

	$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

unset($_SESSION['discount_last']);

$numforcuslast = $this->salepage_model->Getnumforcuslast();
$numforcusnow = $numforcuslast[0]['number_for_cus'];

$numforcusplus = $numforcusnow + 1;


$runnolast = $this->salepage_model->Getrunnolast();


$runnonow = $runnolast[0]['sale_runno'];

//$runnonow2 = substr($runnonow,-$_SESSION['runno_digit']);
//$runnoplus = $runnonow2 + 1;
//$header_code = $_SESSION['befor_runno'].str_pad($runnoplus, $_SESSION['runno_digit'], "0", STR_PAD_LEFT);
$runnoplus = (int)$runnonow + 1;
$header_code = str_pad($runnoplus, $_SESSION['runno_digit'], "0", STR_PAD_LEFT);


//Line notify
if($_SESSION['line_allbill']=='1'){
$saleallprice = $data['sumsale_price']-$data['discount_last'];
$text = $_SESSION['owner_name']."\nຍອດຂາຍ: ".number_format($saleallprice)."\nເລກບິນ: ".$header_code."\nໂດຍ: ".$_SESSION['name']."\nເວລາ " .date('H:i',time());
$this->Line_notify($text);
}
//Line notify



$datampt['user_id'] = $_SESSION['user_id'];
$datampt['name'] = $_SESSION['name'];
$datampt['shift_id'] = $_SESSION['shift_id'];
$datampt['branch_id'] = $_SESSION['branch_id'];
$datampt['sale_runno'] = $header_code;

if($data['morepaykey']=='0'){
$datampt['money'] = $data['money_from_customer'];
$datampt['pay_type'] = $data['pay_type'];
$this->salepage_model->Savemorepay($datampt);
$morepaynum = 1;
}else{

$cpt = count($data['pay_type_list']);
for($i=1;$i<=$cpt ;$i++){

	if(isset($data['pay_type_list'][$i-1]['pay_money']) && $data['pay_type_list'][$i-1]['pay_money'] != 0){
$datampt['money'] = $data['pay_type_list'][$i-1]['pay_money'];
$datampt['pay_type'] = $data['pay_type_list'][$i-1]['pay_type_id'];
$this->salepage_model->Savemorepay($datampt);
	}else{
	unset($data['pay_type_list'][$i-1]);
	}
	
	
}
$morepaynum = count($data['pay_type_list']);

 }




$now = time();

if($data['saledate']==''){
$adddate = $now;
}else{
$adddate = strtotime($data['saledate']);	
}
//$header_code = time();
$savedate = $now;


$data['number_for_cus'] = $numforcusplus;

$data['sale_runno'] = $header_code;
$data['adddate'] = $adddate;
$data['savedate'] = $savedate;



$this->salepage_model->Addheader($data,$morepaynum);
$price_value = $data['sumsale_price']-$data['discount_last'];
$this->salepage_model->Addmoneychange($data['money_changeto_customer'],$data['money_from_customer'],$price_value);





for($i=1;$i<=count($data['listsale']) ;$i++){



	if($data['listsale'][$i-1]['product_id']!='' && $data['listsale'][$i-1]['product_sale_num']!='0'){
$data['listsale'][$i-1]['sale_runno'] = $header_code;
$data['listsale'][$i-1]['adddate'] = $adddate;
$data['listsale'][$i-1]['savedate'] = $savedate;

$data['listsale'][$i-1]['ID'] = null;

$this->salepage_model->Adddetail($data['listsale'][$i-1]);

$this->salepage_model->Updateproductdeletestock($data['listsale'][$i-1]);

  $getrelationlist = $this->salepage_model->Getrelationlist($data['listsale'][$i-1]['product_id']);

  //print_r($getrelationlist);
  foreach ($getrelationlist as $key => $value) {
  $this->salepage_model->Updateproductdeletestock_relation($header_code,$value['product_id_relation'],$value['product_name_relation'],($value['product_num_relation']*$data['listsale'][$i-1]['product_sale_num']),$data['listsale'][$i-1]['product_id'],$value['product_type_relation']);

  }









}

}








$newdata = array(
        'cus_name_show' => '',
		'customer_score_show' => ''
);
$this->session->set_userdata($newdata); 



	}






function Line_stocknoti()
      {
	$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

for($i=1;$i<=count($data['listsale']) ;$i++){
	if($data['listsale'][$i-1]['product_id']!='' && $data['listsale'][$i-1]['product_sale_num']!='0'){

$stock_less = $this->salepage_model->Line_stocknoti($data['listsale'][$i-1]);
//Line notify
if($stock_less !=''){
if($_SESSION['line_stocknoti']=='1'){
	if($stock_less > 0){ $omgtext = 'ສະຕັອກເຫຼືອນ້ອຍ';}else{$omgtext = 'ສະຕັອກໝົດ';}
$text = $_SESSION['owner_name']."\n++".$omgtext."++\n".$data['listsale'][$i-1]['product_name']."\nເຫຼືອ: ".$stock_less."\nເວລາ " .date('H:i',time());
$this->Line_notify($text);
}

}
//Line notify


  $getrelationlist = $this->salepage_model->Getrelationlist($data['listsale'][$i-1]['product_id']);

  //print_r($getrelationlist);
  foreach ($getrelationlist as $key => $value) {
  //$this->salepage_model->Updateproductdeletestock_relation($header_code,$value['product_id_relation'],$value['product_name_relation'],($value['product_num_relation']*$data['listsale'][$i-1]['product_sale_num']),$data['listsale'][$i-1]['product_id'],$value['product_type_relation']);

  }









}

}

	
		  
	  }

















  function Savequotation()
      {

  	$data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }

  $numforcuslast = $this->salepage_model->Getnumforcuslast();
  $numforcusnow = $numforcuslast[0]['number_for_cus'];

  $numforcusplus = $numforcusnow + '1';


  //$runnolast = $this->salepage_model->Getrunnolast();



  $adddate = time();
  //$header_code = 'quo'.time();
  
  $runnolast = $this->salepage_model->Getrunnolast_quo();
$runnonow = $runnolast[0]['sale_runno'];
$runnoplus = (int)$runnonow + 1;
$header_code = str_pad($runnoplus, 5, "0", STR_PAD_LEFT);





  for($i=1;$i<=count($data['listsale']) ;$i++){

  $data['number_for_cus'] = $numforcusplus;

  $data['sale_runno'] = $header_code;
  $data['adddate'] = $adddate;



  	if($data['listsale'][$i-1]['product_id']!='' && $data['listsale'][$i-1]['product_sale_num']!='0'){
  $data['listsale'][$i-1]['sale_runno'] = $header_code;
  $data['listsale'][$i-1]['adddate'] = $adddate;

$data['listsale'][$i-1]['ID'] = null;

  if($this->salepage_model->Adddetailquotation($data['listsale'][$i-1])){
  	//$this->salepage_model->Updateproductdeletestock($data['listsale'][$i-1]);


    //$getrelationlist = $this->salepage_model->Getrelationlist($data['listsale'][$i-1]['product_id']);

    //print_r($getrelationlist);
    //foreach ($getrelationlist as $key => $value) {
    //$this->salepage_model->Updateproductdeletestock_relation($value['product_id_relation'],($value['product_num_relation']*$data['listsale'][$i-1]['product_sale_num']));

    //}

  }





  if($i==1){
  $this->salepage_model->Addheaderquotation($data);
  //$price_value = $data['sumsale_price']-$data['discount_last'];
  //$this->salepage_model->Addmoneychange($data['money_changeto_customer'],$data['money_from_customer'],$price_value);
  }

  }

  }



  	}






	}
