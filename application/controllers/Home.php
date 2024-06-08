<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('home_model');
		
    }


	public function index()
	{

//Line notify
if($_SESSION['line_whenlogin']=='1' && $_SESSION['line_whenlogin_check']=='1'){
$text = $_SESSION['owner_name']."\n".$_SESSION['name']." Login "."\nເວລາ ".date('H:i',time());
$this->Line_notify($text);

$newdataline = array(
		   'line_whenlogin_check' => "0"
         );
$this->session->set_userdata($newdataline);
}
//Line notify




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



$data['tab'] = 'deshboard';
$data['title'] = 'POS - manage';
		$this->deshboardlayout('deshboard/deshboard',$data);

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
  
  
  
  
  	function Addimgbanner()
    {


if(!file_exists("pic/banner/".$_SESSION['store_id'])){
	mkdir("pic/banner/".$_SESSION['store_id'],0777,true);
}


if($_FILES["image1"]["name"]!=''){
move_uploaded_file($_FILES["image1"]["tmp_name"],"pic/banner/".$_SESSION['store_id']."/".time().md5($_FILES["image1"]["name"]).'.jpg');
$data['image1'] = 'pic/banner/'.$_SESSION['store_id'].'/'.time().md5($_FILES["image1"]["name"]).'.jpg';
}


if($_FILES["image2"]["name"]!=''){
move_uploaded_file($_FILES["image2"]["tmp_name"],"pic/banner/".$_SESSION['store_id']."/".time().md5($_FILES["image2"]["name"]).'.jpg');
$data['image2'] = 'pic/banner/'.$_SESSION['store_id'].'/'.time().md5($_FILES["image2"]["name"]).'.jpg';
}



if($_FILES["image3"]["name"]!=''){
move_uploaded_file($_FILES["image3"]["tmp_name"],"pic/banner/".$_SESSION['store_id']."/".time().md5($_FILES["image3"]["name"]).'.jpg');
$data['image3'] = 'pic/banner/'.$_SESSION['store_id'].'/'.time().md5($_FILES["image3"]["name"]).'.jpg';
}



if($_FILES["image4"]["name"]!=''){
move_uploaded_file($_FILES["image4"]["tmp_name"],"pic/banner/".$_SESSION['store_id']."/".time().md5($_FILES["image4"]["name"]).'.jpg');
$data['image4'] = 'pic/banner/'.$_SESSION['store_id'].'/'.time().md5($_FILES["image4"]["name"]).'.jpg';
}



if($_FILES["image5"]["name"]!=''){
move_uploaded_file($_FILES["image5"]["tmp_name"],"pic/banner/".$_SESSION['store_id']."/".time().md5($_FILES["image5"]["name"]).'.jpg');
$data['image5'] = 'pic/banner/'.$_SESSION['store_id'].'/'.time().md5($_FILES["image5"]["name"]).'.jpg';
}



$data['changetime'] = $_POST['changetime'];
$data['picheight'] = $_POST['picheight'];
$data['saleboxheight'] = $_POST['saleboxheight'];
$data['show_discount_text'] = $_POST['show_discount_text'];
$data['show_pricepernum'] = $_POST['show_pricepernum'];

$success = $this->home_model->Addimgbanner($data);

}



 function Getimgbanner()
  {

  echo $this->home_model->Getimgbanner();

  }
  

 function Delimage()
  {
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}	
  echo $this->home_model->Delimage($data);

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

$query = $this->db->query('SELECT
*
 FROM banner_cus2mer');
 
 
	foreach($query->result() as $row){
	$data['changetime'] = $row->changetime*1000;
	$data['image1'] = $row->image1;
	$data['image2'] = $row->image2;
	$data['image3'] = $row->image3;
	$data['image4'] = $row->image4;
	$data['image5'] = $row->image5;
	
	$data['picheight'] = $row->picheight;
	$data['saleboxheight'] = $row->saleboxheight;
	$data['show_discount_text'] = $row->show_discount_text;
	$data['show_pricepernum'] = $row->show_pricepernum;
} 
 
$data['title'] = 'ຈໍລູກຄ້າ';
$this->showcuslayout('webbody/showcus2mer',$data);


  }





}
