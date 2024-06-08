<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C2mhelper extends MY_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('C2mhelper_model');
		
	
	
    }


	public function index()
	{


echo 'Dummy';



	}


function Updateall()
{

echo $this->C2mhelper_model->Stockupdate();
echo $this->C2mhelper_model->Paytypeupdate();
echo 'success';

}



function Revertreturn()
{

echo $this->C2mhelper_model->Revertreturn();
echo 'success';

}





function Delsalesomecheck()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }
  
  echo  $this->C2mhelper_model->Delsalesomecheck($data);

  	}
	
	
	
	
	function Delsalesomeok()
      {

  $data = json_decode(file_get_contents("php://input"),true);
  if(!isset($data)){
  exit();
  }
  
  echo  $this->C2mhelper_model->Delsalesomeok($data);

  	}
	
	
	
	


function Delsaleall()
{

echo $this->C2mhelper_model->Delsaleall();
$this->session->sess_destroy();		
header( "location: ".$this->base_url."" );

}


function Delstockall()
{

echo $this->C2mhelper_model->Delstockall();	
header( "location: ".$this->base_url."" );

}


function Delall_product()
{

echo $this->C2mhelper_model->Delall_product();	
//echo $this->C2mhelper_model->Delstockall();
header( "location: ".$this->base_url."" );

}



function Checklogin()
{

if(!isset($_SESSION['user_id'])){	
echo '0';
}else{
echo '1';
}

}







}
