<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produce_formula extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('produce/produce_formula_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }

	public function index()
	{


$data['tab'] = 'produce_formula';
$data['title'] = 'produce formula';
		$this->producelayout('produce/produce_formula',$data);
}



function Getpn_detail()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }
  
  echo  $this->produce_formula_model->Getpn_detail($data);

  	}
	
	

 function Add()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$header_code = 'PF'.time();

for($i=1;$i<=count($data['productimportlist']) ;$i++){

	if($data['productimportlist'][$i-1]['product_id_mat']!='' && $data['productimportlist'][$i-1]['product_num_mat']!='0'){
$data['productimportlist'][$i-1]['des'] = $data['des'];
$data['productimportlist'][$i-1]['produce_formula_name'] = $data['produce_formula_name'];
$data['productimportlist'][$i-1]['product_id'] = $data['product_id'];
$data['productimportlist'][$i-1]['product_code'] = $data['product_code'];
$data['productimportlist'][$i-1]['product_name'] = $data['product_name'];
$data['productimportlist'][$i-1]['produce_formula_no'] = $header_code;

$this->produce_formula_model->Adddetail($data['productimportlist'][$i-1]);


}

}



}



function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->produce_formula_model->Get($data);

	}







    function Getimportone()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->produce_formula_model->Getimportone($data);

}



  function Deleteimportlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


$this->produce_formula_model->Deleteimportlist($data);

}



function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->produce_formula_model->Findproduct($data);

    }



    function Findproduct2()
            {

        $data = json_decode(file_get_contents("php://input"),true);
        echo  $this->produce_formula_model->Findproduct2($data);

            }



	}
