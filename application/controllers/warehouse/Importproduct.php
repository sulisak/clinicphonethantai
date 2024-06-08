<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importproduct extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('warehouse/importproduct_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }

	public function index()
	{


$data['tab'] = 'importproduct';
$data['title'] = 'Import Product';
		$this->warehouselayout('warehouse/importproduct',$data);
}



function Getpn_detail()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }
  
  echo  $this->importproduct_model->Getpn_detail($data);

  	}
	
	
	
	
	function Confirm()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }
  
  echo  $this->importproduct_model->Confirm($data);

  	}
	
	
	
	

 function Add()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$header_code = time();

for($i=1;$i<=count($data['productimportlist']) ;$i++){

$data['lotno'] = $data['productimportlist'][$i-1]['lotno'];


$data['date_end'] = $data['productimportlist'][$i-1]['date_end'];
$data['importproduct_header_code'] = 'IM'.$header_code;
$data['importproduct_header_date'] = $header_code;

	if($data['productimportlist'][$i-1]['product_id']!='' && $data['productimportlist'][$i-1]['importproduct_detail_num']!='0'){
$data['productimportlist'][$i-1]['importproduct_header_code'] = 'IM'.$header_code;
$data['productimportlist'][$i-1]['importproduct_detail_date'] = $header_code;

$this->importproduct_model->Adddetail($data['productimportlist'][$i-1]);
$this->importproduct_model->Updateproductimportstock($data['productimportlist'][$i-1]);



$getrelationlist = $this->importproduct_model->Getrelationlist($data['productimportlist'][$i-1]['product_id']);

echo $data['productimportlist'][$i-1]['product_id'];
//print_r($getrelationlist);
foreach ($getrelationlist as $key => $value) {
$this->importproduct_model->Updateproductimportstock_relation($value['product_id_relation'],($value['product_num_relation']*$data['productimportlist'][$i-1]['importproduct_detail_num']));

}











if($i==1){
$this->importproduct_model->Addheader($data);

}

}

}


}



function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->importproduct_model->Get($data);

	}


  function Getdateend()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }

  echo  $this->importproduct_model->Getdateend($data);

  	}

    function Updatestatusdateend()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }

    echo  $this->importproduct_model->Updatestatusdateend($data);

    }




    function Salestatusdateend3()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }

    echo  $this->importproduct_model->Salestatusdateend3($data);

    }





    function Getimportone()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->importproduct_model->Getimportone($data);

}



  function Deleteimportlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


$resault =  $this->importproduct_model->Getimportone2($data);


foreach ($resault as $row)
{

 $data2['product_id'] = $row->product_id;
 $data2['detailpricebase'] = $row->importproduct_detail_pricebase;
  $data2['detailnum'] =   $row->importproduct_detail_num;

$this->importproduct_model->Updateproductdeletestock($data2);


    }

$this->importproduct_model->Deleteimportlist($data);

}



function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->importproduct_model->Findproduct($data);

    }



    function Findproduct2()
            {

        $data = json_decode(file_get_contents("php://input"),true);
        echo  $this->importproduct_model->Findproduct2($data);

            }



	}
