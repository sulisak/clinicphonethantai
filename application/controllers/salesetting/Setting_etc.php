<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_etc extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('salesetting/setting_etc_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }

    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{


$data['tab'] = 'setting_etc';
$data['title'] = 'Setting Etc';
		$this->salesettinglayout('salesetting/setting_etc',$data);
}







 function Updatediscountfrombuy()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

		$success = $this->setting_etc_model->Updatediscountfrombuy($data);

}



function Updatemoneytopoint()
   {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

   $success = $this->setting_etc_model->Updatemoneytopoint($data);

}



function Updatepointtomoney()
   {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

   $success = $this->setting_etc_model->Updatepointtomoney($data);

}






function Updateservicecharge()
   {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

   $success = $this->setting_etc_model->Updateservicecharge($data);

}





function Updatevat()
   {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

   $success = $this->setting_etc_model->Updatevat($data);

}



function Update_stock_rule()
   {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

 $newdata = array(
        'stock_noti' => $data['stock_noti'],
		'stock_nosale' => $data['stock_nosale']
		
);
$this->session->set_userdata($newdata);


   $success = $this->setting_etc_model->Update_stock_rule($data);

}




function Update_owner()
   {
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}
      $newdata = array(
        'playbeep' => $data['playbeep'],
		'open_number_for_cus' => $data['open_number_for_cus'],
		'show_price_per_one' => $data['show_price_per_one'],
		'vat' => $data['vat'],
		'open_vat_on_slip' => $data['open_vat_on_slip'],
		'show_order_on_slip' => $data['show_order_on_slip'],
		'c2m_bd_noti' => $data['c2m_bd_noti'],
		'have_product_course' => $data['have_product_course']
		
);
$this->session->set_userdata($newdata);
$success = $this->setting_etc_model->Update_owner($data);

}




    function Getdiscountfrombuy()
    {


 $list = $this->setting_etc_model->Getdiscountfrombuy();

echo $list;

}



function Getmoneytopoint()
{


$list = $this->setting_etc_model->Getmoneytopoint();

echo $list;

}


function Getpointtomoney()
{


$list = $this->setting_etc_model->Getpointtomoney();

echo $list;

}




function Getservicecharge()
{


$list = $this->setting_etc_model->Getservicecharge();

echo $list;

}



function Getvat()
{


$list = $this->setting_etc_model->Getvat();

echo $list;

}


function Get_stock_rule()
{


$list = $this->setting_etc_model->Get_stock_rule();

echo $list;

}




	}
