<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends MY_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('storemanager/store_brand_model');

 if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url."/storemanager/login" );
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

		$data['tab'] = 'brand';
		$data['title'] = 'Store Manager Brand';
		$this->deshboardlayout('storemanager/brand',$data);
	}


	function Add()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->store_brand_model->Add($data);

}





	function Addbranch()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->store_brand_model->Addbranch($data);

}



	function Editebranch()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->store_brand_model->Editebranch($data);

}





	function Getbranch()
    {

echo $this->store_brand_model->Getbranch();

}





	function Logoonslip()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->store_brand_model->Logoonslip($data);

}






	function Fontc2m()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->store_brand_model->Fontc2m($data);

}



	function Fontslip()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->store_brand_model->Fontslip($data);

}










	function Addimg()
    {

if(isset($_FILES["owner_logo"]["name"]) && $_FILES["owner_logo"]["name"] != ''){

if(!file_exists("pic/logo/".$_SESSION['store_id'])){
	mkdir("pic/logo/".$_SESSION['store_id'],0777,true);
}

    $upload = move_uploaded_file($_FILES["owner_logo"]["tmp_name"],"pic/logo/".$_SESSION['store_id']."/".time().md5($_FILES["owner_logo"]["name"]).'.jpg');

    $data['owner_logo'] = 'pic/logo/'.$_SESSION['store_id'].'/'.time().md5($_FILES["owner_logo"]["name"]).'.jpg';

}else{
$data['owner_logo'] = '';
}


$data['owner_id'] = $_POST['owner_id'];


$success = $this->store_brand_model->Addimg($data);

}




function Addbgimg()
    {

if(isset($_FILES["owner_bgimg"]["name"]) && $_FILES["owner_bgimg"]["name"] != ''){

if(!file_exists("pic/bg/".$_SESSION['store_id'])){
	mkdir("pic/bg/".$_SESSION['store_id'],0777,true);
}

    $upload = move_uploaded_file($_FILES["owner_bgimg"]["tmp_name"],"pic/bg/".$_SESSION['store_id']."/".time().md5($_FILES["owner_bgimg"]["name"]).'.jpg');

    $data['owner_bgimg'] = 'pic/bg/'.$_SESSION['store_id'].'/'.time().md5($_FILES["owner_bgimg"]["name"]).'.jpg';

}else{
$data['owner_bgimg'] = '';
}


$data['owner_id'] = $_POST['owner_id'];


$success = $this->store_brand_model->Addbgimg($data);

}




	function Edit()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->store_brand_model->Edit($data);

}



function Updatefooter_slip()
  {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->store_brand_model->Updatefooter_slip($data);

}



function Get()
    {

echo $this->store_brand_model->Get();

}



function Savecolortheme()
    {
$this->store_brand_model->Savecolortheme($_POST['color_theme']);
//echo $_POST['color_theme'];
header( "location: ".$_SERVER["HTTP_REFERER"]);
}






}
