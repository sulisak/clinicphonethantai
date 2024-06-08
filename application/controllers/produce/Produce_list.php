<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produce_list extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('produce/produce_list_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }

	public function index()
	{


$data['tab'] = 'produce_list';
$data['title'] = 'produce list';
		$this->producelayout('produce/produce_list',$data);
}



function Getpn_detail()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }
  
  echo  $this->produce_list_model->Getpn_detail($data);

  	}
	
	

 function Add()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$header_code = time();

for($i=1;$i<=count($data['productimportlist']) ;$i++){


	if($data['productimportlist'][$i-1]['product_id']!='' && $data['productimportlist'][$i-1]['product_num']!='0'){
$data['productimportlist'][$i-1]['pl_code'] = 'PL'.$header_code;
$data['productimportlist'][$i-1]['adddate'] = $header_code;
$data['productimportlist'][$i-1]['pl_title'] = $data['pl_title'];
$data['productimportlist'][$i-1]['pl_des'] = $data['pl_des'];

$this->produce_list_model->Adddetail($data['productimportlist'][$i-1]);


}

}


}



function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->produce_list_model->Get($data);

	}


  function Getdateend()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }

  echo  $this->produce_list_model->Getdateend($data);

  	}

    function Updatestatusdateend()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }

    echo  $this->produce_list_model->Updatestatusdateend($data);

    }




    function Salestatusdateend3()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }

    echo  $this->produce_list_model->Salestatusdateend3($data);

    }





    function Getimportone()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->produce_list_model->Getimportone($data);

}


    function Getimportone_formula_list()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->produce_list_model->Getimportone_formula_list($data);

}




   function Confirmproduce()
    {

$data = json_decode(file_get_contents("php://input"),true);

$importproduct_header_remark = $data['headdata']['pl_title'].' '.$data['headdata']['pl_des'];
$importproduct_header_refcode = $data['headdata']['pl_code'];
$importproduct_header_num_im = $data['headdata']['product_numall'];
$importproduct_header_num_ex = $data['sumnum_formula_mat'];
$now = time();
$owner_id = $_SESSION['owner_id'];
$user_id = $_SESSION['user_id'];
$store_id = $_SESSION['store_id'];

////////////// By C2MPOS // 

$headim['importproduct_header_code'] = 'IM'.$now;
$headim['importproduct_header_remark'] = $importproduct_header_remark;
$headim['importproduct_header_refcode'] = $importproduct_header_refcode;
$headim['importproduct_header_num'] = $importproduct_header_num_im;
$headim['importproduct_header_date'] = $now;
$headim['owner_id'] = $owner_id;
$headim['user_id'] = $user_id;
$headim['store_id'] = $store_id;
/////////////////
$headex['importproduct_header_code'] = 'EX'.$now;
$headex['importproduct_header_remark'] = $importproduct_header_remark;
$headex['importproduct_header_refcode'] = $importproduct_header_refcode;
$headex['importproduct_header_num'] = $importproduct_header_num_ex;
$headex['importproduct_header_date'] = $now;
$headex['owner_id'] = $owner_id;
$headex['user_id'] = $user_id;
$headex['store_id'] = $store_id;
//////////////////
$this->produce_list_model->Addheader_imex_produce($headim,$headex);
/////////////////

for($i=1;$i<=count($data['imdata']) ;$i++){
$imdetail['importproduct_header_code'] = 'IM'.$now;
$imdetail['product_id'] = $data['imdata'][$i-1]['product_id'];
$imdetail['importproduct_detail_num'] = $data['imdata'][$i-1]['product_num'];
$imdetail['importproduct_detail_date'] = $now;
$imdetail['owner_id'] = $owner_id;
$imdetail['user_id'] = $user_id;
$imdetail['store_id'] = $store_id;
$this->produce_list_model->Adddetail_im_produce($imdetail);
}



for($i=1;$i<=count($data['exdata']) ;$i++){
$exdetail['importproduct_header_code'] = 'EX'.$now;
$exdetail['product_id'] = $data['exdata'][$i-1]['product_id_mat'];
$exdetail['importproduct_detail_num'] = $data['exdata'][$i-1]['product_num']*$data['exdata'][$i-1]['product_num_mat'];
$exdetail['importproduct_detail_date'] = $now;
$exdetail['owner_id'] = $owner_id;
$exdetail['user_id'] = $user_id;
$exdetail['store_id'] = $store_id;
$this->produce_list_model->Adddetail_ex_produce($exdetail);
}




}





function Createproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$this->produce_list_model->Delete_produce_formula_list($data);

$now = time();
$pldata =  $this->produce_list_model->Getpllist($data);

foreach ($pldata as $key => $value) {


$formula = $this->produce_list_model->Getproductformula($value['product_id']);

foreach ($formula as $key => $fmvalue) {
$fmvalue['product_num'] =	$value['product_num'];
$fmvalue['pl_code'] =	$data['pl_code'];
$fmvalue['createproducedate'] =	$now;
$fmvalue['create_by'] =	$_SESSION['name'];

$this->produce_list_model->Createproduceall($fmvalue);
}




  }


 

}




  function Deleteimportlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


$resault =  $this->produce_list_model->Getimportone2($data);


foreach ($resault as $row)
{

 $data2['product_id'] = $row->product_id;
 $data2['detailpricebase'] = $row->importproduct_detail_pricebase;
  $data2['detailnum'] =   $row->importproduct_detail_num;

$this->produce_list_model->Updateproductdeletestock($data2);


    }

$this->produce_list_model->Deleteimportlist($data);

}



function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->produce_list_model->Findproduct($data);

    }



    function Findproduct2()
            {

        $data = json_decode(file_get_contents("php://input"),true);
        echo  $this->produce_list_model->Findproduct2($data);

            }



	}
