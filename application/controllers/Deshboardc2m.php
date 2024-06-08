<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deshboardc2m extends MY_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('home_model');
    }


	public function index()
	{



if(isset($_SESSION['store_manager_id'])){

	header("Location: ".$this->base_url."/storemanager/user_owner");
		//$data['title'] = 'C2M System';
		//$this->weblayout('webbody/home',$data);
	}




if(isset($_SESSION['store_type']) && $_SESSION['store_type']=='0' ){

//$data['saletoday'] = $this->home_model->Saletoday();

//$data['productsaletoday'] = $this->home_model->Productsaletoday();

//$data['customersaletoday'] = $this->home_model->Customersaletoday();

//$data['productoutofstock'] = $this->home_model->Productoutofstock();

//$data['productdateend'] = $this->home_model->Productdateend();


//$data['productpawnenddate'] = $this->home_model->Productpawnenddate();

//$data['Getpermission_rule'] = $this->home_model->Getpermission_rule();


$data['tab'] = 'deshboard';
$data['title'] = 'POS - manage';
		$this->deshboardlayout('deshboard/deshboardc2m',$data);

}else if(isset($_SESSION['store_type']) && $_SESSION['store_type']=='1'){

$data['tab'] = 'deshboard';
$data['title'] = 'Food - manage';
		$this->deshboardlayout('deshboard/food',$data);

}else if(isset($_SESSION['store_type']) && $_SESSION['store_type']=='2'){

$data['tab'] = 'deshboard';
$data['title'] = 'Apartment - manage';
		$this->deshboardlayout('deshboard/apartment',$data);

}else{
	header("Location: ".$this->base_url."/login");
		//$data['title'] = 'C2M System';
		//$this->weblayout('webbody/home',$data);
	}





if(isset($_GET['lang'])){

$sslang = array(
'lang' => $_GET['lang']
);

$this->session->set_userdata($sslang);
header("Location: ".$_SERVER['HTTP_REFERER']."");
}






	}


  function Saletoday()
  {

  echo $this->home_model->Saletoday();

  }



  function Productsaletoday()
{

echo $this->home_model->Productsaletoday();

}



function Productoutofstock()
{

echo $this->home_model->Productoutofstock();

}



function Productdateend()
{

echo $this->home_model->Productdateend();

}




function Productpawnenddate()
{

echo $this->home_model->Productpawnenddate();

}



  public function Showcus2mer()
  {

$data['title'] = 'จอลูกค้า';
$this->showcuslayout('webbody/showcus2mer',$data);


  }





}
