<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analycusdayly extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('analycusdayly_model');

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

$data['tab'] = 'analycusdayly';
$data['title'] = 'Analytic Customer';
		$this->ownerlayout('ownerbody/analycusdayly',$data);


}




    function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

 $list = $this->analycusdayly_model->Get($data);
				
		
		if($list)
		{
			echo '{ "list" : '.$list.'}';
		}
		else{
			echo 'no';
		}
      
}

    function Getm()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

 $list = $this->analycusdayly_model->Getm($data);
				
		
		if($list)
		{
			echo '{ "list" : '.$list.'}';
		}
		else{
			echo 'no';
		}
      
}



function Excel() {
       
    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
exit();
}


if($data['excel']=='1'){
 $list = $this->analycusdayly_model->Exportexcel($data);
}else{
	$list = 'null';
}	

    $this->to_excel($list, 'brands-excel');

 

}

function Excelm() {
       
    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
exit();
}


if($data['excel']=='1'){
 $list = $this->analycusdayly_model->Exportexcelm($data);
}else{
	$list = 'null';
}	

    $this->to_excel($list, 'brands-excel');

 

}


function Excelthisday() {
       
    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
exit();
}


if($data['excel']=='1'){
 $list = $this->analycusdayly_model->Exportexcelthisday($data);
}else{
	$list = 'null';
}	

    $this->to_excel($list, 'brands-excel');

 

}


function Excelthism() {
       
    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
exit();
}


if($data['excel']=='1'){
 $list = $this->analycusdayly_model->Exportexcelthism($data);
}else{
	$list = 'null';
}	

    $this->to_excel($list, 'brands-excel');

 

}






	}

