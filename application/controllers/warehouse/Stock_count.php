<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_count extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('warehouse/stock_count_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }

	public function index()
	{


$data['tab'] = 'stock_count';
$data['title'] = 'Count Stock';
		$this->warehouselayout('warehouse/stock_count',$data);
}



function Getpn_detail()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }
  
  echo  $this->stock_count_model->Getpn_detail($data);

  	}
	
	
	
	
	
	
	
	function Updatestockok()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }
  
  echo  $this->stock_count_model->Updatestockok($data);

  	}
	
	
	
	
	

 function Add()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


for($i=1;$i<=count($data['productimportlist']) ;$i++){

	if($data['productimportlist'][$i-1]['product_id']!=''){

$data['productimportlist'][$i-1]['remark'] = $data['remark'];

$this->stock_count_model->Adddetail($data['productimportlist'][$i-1]);

}

}


}



function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->stock_count_model->Get($data);

	}


  function Getdateend()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }

  echo  $this->stock_count_model->Getdateend($data);

  	}

    function Updatestatusdateend()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }

    echo  $this->stock_count_model->Updatestatusdateend($data);

    }




    function Salestatusdateend3()
    {

    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
    exit();
    }

    echo  $this->stock_count_model->Salestatusdateend3($data);

    }





    function Getimportone()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo  $this->stock_count_model->Getimportone($data);

}



  function Deleteimportlist()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


$resault =  $this->stock_count_model->Getimportone2($data);


foreach ($resault as $row)
{

 $data2['product_id'] = $row->product_id;
 $data2['detailpricebase'] = $row->importproduct_detail_pricebase;
  $data2['detailnum'] =   $row->importproduct_detail_num;

$this->stock_count_model->Updateproductdeletestock($data2);


    }

$this->stock_count_model->Deleteimportlist($data);

}



function Findproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->stock_count_model->Findproduct($data);

    }






    function Findproduct2()
            {

        $data = json_decode(file_get_contents("php://input"),true);
        echo  $this->stock_count_model->Findproduct2($data);

            }



	




function Adddraft()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo $this->stock_count_model->Adddraft($data);

    }
	
	
	function Getdraft()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo $this->stock_count_model->Getdraft($data);

    }
	
	
		function Updatenum()
    {

$data = json_decode(file_get_contents("php://input"),true);
$this->stock_count_model->Updatenum($data);

    }
	
	
	
	
		function Deletedraft()
    {

$data = json_decode(file_get_contents("php://input"),true);
$this->stock_count_model->Deletedraft($data);

    }
	
	
	
	
	
	
	
	
    function Uploadexcel()
    {
$time = time().$_SESSION['owner_id'];

if(move_uploaded_file($_FILES["excel"]["tmp_name"], "upload/" . $time.'.csv'))
{
$file = 'upload/'.$time.'.csv';

$fileopen = fopen($file, "r");
//$data = fgetcsv( $fileopen , 3, ',' );

$i=0;
while (($dataexcel = fgetcsv($fileopen, 1000, ",")) !== FALSE) {
if($i>0){



if($dataexcel[0] ==null){
$data['product_code'] = time();
}else{
	$data['product_code'] = $dataexcel[0];
}


if($dataexcel[1] ==null){
$data['product_num'] = '1';
}else{
	$data['product_num'] = $dataexcel[1];
}




 $success = $this->stock_count_model->Addexcel($data);

}
$i=1;
}

fclose($fileopen);



}else{
	echo 'no';
}

}




	
	
	
	
	
	
	
	
	
	}