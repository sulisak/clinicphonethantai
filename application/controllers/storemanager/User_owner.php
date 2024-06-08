<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_owner extends MY_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('storemanager/store_user_owner_model');

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

		$data['tab'] = 'user_owner';
		$data['title'] = 'Store Manager User Owner';
		$this->storemanagerlayout('storemanager/user_owner',$data);
	}


function Add()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}


$md5password =  $data['user_password'].$this->c2m_key;
$data['user_password'] = md5($md5password);

$success = $this->store_user_owner_model->Add($data);
if($success == true){

}else{
	echo 'dup';
}

}



function Getvendor()
    {

echo $this->store_user_owner_model->Getvendor();

}




	function Edit()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

if($data['user_password']!=''){
$md5password =  $data['user_password'].$this->c2m_key;
$data['user_password'] = md5($md5password);
}else{
unset($data['user_password']);
}

$success = $this->store_user_owner_model->Edit($data);

}


function Get()
    {

echo $this->store_user_owner_model->Get();

}





function Deleteuser()
  {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$this->store_user_owner_model->Deleteuser($data);

}








}
