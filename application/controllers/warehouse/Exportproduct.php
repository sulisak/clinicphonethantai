<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exportproduct extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('warehouse/exportproduct_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }

	public function index()
	{


$data['tab'] = 'exportproduct';
$data['title'] = 'Export Product';
		$this->warehouselayout('warehouse/exportproduct',$data);
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
$data['importproduct_header_code'] = 'EX'.$header_code;
$data['importproduct_header_date'] = $header_code;

	if($data['productimportlist'][$i-1]['product_id']!='' && $data['productimportlist'][$i-1]['importproduct_detail_num']!='0'){
$data['productimportlist'][$i-1]['importproduct_header_code'] = 'EX'.$header_code;
$data['productimportlist'][$i-1]['importproduct_detail_date'] = $header_code;

$this->exportproduct_model->Adddetail($data['productimportlist'][$i-1]);
$this->exportproduct_model->Updateproductimportstock($data['productimportlist'][$i-1]);

if($data['branch_id']!='0'){
$this->exportproduct_model->Transferstock($data['productimportlist'][$i-1],$data['branch_id']);

if($data['productimportlist'][$i-1]['sn_code']!=''){
$this->exportproduct_model->Movesn($data['productimportlist'][$i-1],$data['branch_id']);
}


}else{

if($data['productimportlist'][$i-1]['sn_code']!=''){
$this->exportproduct_model->Delsn($data['productimportlist'][$i-1]);
}


}




$getrelationlist = $this->exportproduct_model->Getrelationlist($data['productimportlist'][$i-1]['product_id']);

echo $data['productimportlist'][$i-1]['product_id'];
//print_r($getrelationlist);
foreach ($getrelationlist as $key => $value) {
$this->exportproduct_model->Updateproductimportstock_relation($value['product_id_relation'],($value['product_num_relation']*$data['productimportlist'][$i-1]['importproduct_detail_num']));

}














if($i==1){
$this->exportproduct_model->Addheader($data);

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

echo  $this->exportproduct_model->Get($data);

	}
	
	
	
	
	function Confirm()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }
  
  echo  $this->exportproduct_model->Confirm($data);

  	}
	
	
	


  function Getdateend()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }

  echo  $this->exportproduct_model->Getdateend($data);

  	}

    function Updatestatusdateend()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }

    echo  $this->exportproduct_model->Updatestatusdateend($data);

    }




    function Salestatusdateend3()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }

    echo  $this->exportproduct_model->Salestatusdateend3($data);

    }





    function Getimportone()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->exportproduct_model->Getimportone($data);

}



  function Deleteimportlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


$resault =  $this->exportproduct_model->Getimportone2($data);


foreach ($resault as $row)
{

 $data2['product_id'] = $row->product_id;
 $data2['detailpricebase'] = $row->importproduct_detail_pricebase;
  $data2['detailnum'] =   $row->importproduct_detail_num;

$this->exportproduct_model->Updateproductdeletestock($data2);


    }

$this->exportproduct_model->Deleteimportlist($data);

}



function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->exportproduct_model->Findproduct($data);

    }







	}
