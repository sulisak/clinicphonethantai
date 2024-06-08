<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('purchase/buy_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }

	public function index()
	{


$data['tab'] = 'buy';
$data['title'] = 'Buy Product';
		$this->purchaselayout('purchase/buy',$data);
}



 function Add()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$now = time();


//$header_code = $now;


$adddate = $now;



$runnolast = $this->buy_model->Getrunnolast_purchase();

$runnonow = $runnolast[0]['importproduct_header_code'];

$runnoplus = (int)$runnonow + 1;
$header_code = str_pad($runnoplus, 6, "0", STR_PAD_LEFT);


$data['importproduct_header_code'] = $header_code;
$data['importproduct_header_date'] = $adddate;
$data['importproduct_header_adddate'] = $adddate;




for($i=1;$i<=count($data['productimportlist']) ;$i++){







	if($data['productimportlist'][$i-1]['product_id']!='' && $data['productimportlist'][$i-1]['importproduct_detail_num']!='0'){
$data['productimportlist'][$i-1]['importproduct_header_code'] = $header_code;
$data['productimportlist'][$i-1]['importproduct_detail_date'] = $header_code;
$data['productimportlist'][$i-1]['importproduct_detail_adddate'] = $adddate;
$data['productimportlist'][$i-1]['vendor_name'] = $data['vendor_name'];
$data['productimportlist'][$i-1]['vat_type'] = $data['vat_type'];

if($this->buy_model->Adddetail($data['productimportlist'][$i-1])){
//$this->buy_model->Updateproductimportstock($data['productimportlist'][$i-1]);
}




if($i==1){
$this->buy_model->Addheader($data);

}

}

}



unset($_SESSION['purchase_buy_productimportlist']);


}



function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->buy_model->Get($data);

	}








    function Getimportone()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->buy_model->Getimportone($data);

}



  function Deleteimportlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


$resault =  $this->buy_model->Getimportone2($data);


foreach ($resault as $row)
{

 $data2['product_id'] = $row->product_id;
 $data2['detailpricebase'] = $row->importproduct_detail_pricebase;
  $data2['detailnum'] =   $row->importproduct_detail_num;

//$this->buy_model->Updateproductdeletestock($data2);


    }

$this->buy_model->Deleteimportlist($data);

}



function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->buy_model->Findproduct($data);

    }




    function Findproduct2()
        {

    $data = json_decode(file_get_contents("php://input"),true);
    echo  $this->buy_model->Findproduct2($data);

        }





function Findproductforsetting()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->buy_model->Findproductforsetting($data);

    }
	
	
	
	
	function Savesettingproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->buy_model->Savesettingproduct($data);

    }
	
	
	
	
	function Product_orderprint()
    {

if(!isset($_SESSION['remove_orderprint_modal'])){
echo  $this->buy_model->Product_orderprint();
}

	}
	
	
	function Product_orderprint2()
    {
if(!isset($_SESSION['remove_orderprint_modal2'])){
echo  $this->buy_model->Product_orderprint();
}
	}
	
	
	
	
	function Remove_orderprint_modal()
    {

$data = array(
           'remove_orderprint_modal' => '1'
         );

$this->session->set_userdata($data);
header( "location: ".$this->base_url );

	}
	
	
	
	
	function Remove_orderprint_modal2()
    {

$data = array(
           'remove_orderprint_modal2' => '1'
         );

$this->session->set_userdata($data);
header( "location: ".$_SERVER["HTTP_REFERER"] );

	}
	
	
	
	
	
	
	
	function Savedraffsess()
    {
$data = json_decode(file_get_contents("php://input"),true);
$data = array(
           'purchase_buy_productimportlist' => $data['productimportlist']
         );
$this->session->set_userdata($data);

	}
	


        function Getproductautofordraff()
            {

echo  $this->buy_model->Getproductautofordraff();

            }
	
	


        function Findvendor()
            {

        $data = json_decode(file_get_contents("php://input"),true);
        echo  $this->buy_model->Findvendor($data);

            }





	}
