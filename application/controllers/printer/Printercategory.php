<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printercategory extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('printer/printercategory_model');

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
		

$data['tab'] = 'printercategory';
$data['title'] = 'Printer Category';
		$this->deshboardlayout('printer/printercategory',$data);
}






 function Update()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		$success = $this->printercategory_model->Update($data);
      
}



function Print_preview_save()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		echo $this->printercategory_model->Print_preview_save($data);
      
}



    function Get()
    {


 $list = $this->printercategory_model->Get();
				
		
		if($list)
		{
			echo '{ "list" : '.$list.'}';
		}
		else{
			echo 'no';
		}
      
}



   function Getcashier()
    {


 $list = $this->printercategory_model->Getcashier();
				
echo $list;
      
}



function Cashierprinteripupdate()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		$success = $this->printercategory_model->Cashierprinteripupdate($data);
      
}








	function Addimg()
    {

if(isset($_FILES["picunderslip"]["name"]) && $_FILES["picunderslip"]["name"] != ''){

if(!file_exists("pic/picunderslip")){
	mkdir("pic/picunderslip",0777,true);
}

    $upload = move_uploaded_file($_FILES["picunderslip"]["tmp_name"],"pic/picunderslip/".time().md5($_FILES["picunderslip"]["name"]).'.jpg');

    $data['picunderslip'] = 'pic/picunderslip/'.time().md5($_FILES["picunderslip"]["name"]).'.jpg';

}else{
$data['picunderslip'] = '';
}



$success = $this->printercategory_model->Addimg($data);

}





	function Nopic()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->printercategory_model->Nopic();

$files = glob('pic/picunderslip/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)) {
    unlink($file); // delete file
  }
}



}






	}

