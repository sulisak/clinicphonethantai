<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importproduct_sn extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('warehouse/importproduct_sn_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }

	public function index()
	{


$data['tab'] = 'importproduct_sn';
$data['title'] = 'Import Product SN';
		$this->warehouselayout('warehouse/importproduct_sn',$data);
}



function Getpn_detail()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }
  
  echo  $this->importproduct_sn_model->Getpn_detail($data);

  	}
	
	
	
	function Confirm()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }
  
  echo  $this->importproduct_sn_model->Confirm($data);

  	}
	
	
	
	

 function Add()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$ids = explode("\n", str_replace("\r", "", $data['sn_code']));

$now = time();


foreach($ids as $value){
$data['sn_code'] = $value;
$xxx1 =  $this->importproduct_sn_model->Checksn($data);
$items1[]['sn'] = $xxx1;
}



foreach($ids as $value){
$data['sn_code'] = $value;
$numsn =  $this->importproduct_sn_model->Checksnnum($data);
if($numsn>0){
echo json_encode($items1);
exit();	
}
}





foreach($ids as $value){

$data['im_no'] = 'IMSN'.$now;
$data['adddate'] = $now;
$data['sn_code'] = $value;
$data['user_id'] = $_SESSION['user_id'];
$data['branch_id'] = $_SESSION['branch_id'];
$data['product_id'] = $data['product_id'];

$this->importproduct_sn_model->Updateproductimportstock_sn($data);
$this->importproduct_sn_model->Add($data);


}
//echo json_encode($items);





}



function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->importproduct_sn_model->Get($data);

	}


  function Getdateend()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }

  echo  $this->importproduct_sn_model->Getdateend($data);

  	}

    function Updatestatusdateend()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }

    echo  $this->importproduct_sn_model->Updatestatusdateend($data);

    }




    function Salestatusdateend3()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }

    echo  $this->importproduct_sn_model->Salestatusdateend3($data);

    }





    function Getimportone()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->importproduct_sn_model->Getimportone($data);

}



  function Deleteimportlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


$resault =  $this->importproduct_sn_model->Getimportone2($data);


foreach ($resault as $row)
{

 $data2['product_id'] = $row->product_id;
$this->importproduct_sn_model->Updateproductdeletestock($data2);


    }

$this->importproduct_sn_model->Deleteimportlist($data);

}



function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->importproduct_sn_model->Findproduct($data);

    }



    function Findproduct2()
            {

        $data = json_decode(file_get_contents("php://input"),true);
        echo  $this->importproduct_sn_model->Findproduct2($data);

            }



	}
