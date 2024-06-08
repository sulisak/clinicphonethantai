<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportcontact extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();

if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }
        
$this->load->model('analyticall_model');
$this->load->model('analyticallexcel_model');
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
		

if(isset($_SESSION['owner_id'])){
$data['tab'] = 'reportcontact';
$data['title'] = 'Report Contact';
		$this->ownerlayout('ownerbody/reportcontact',$data);

}
}





    function Get()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

if($data['optionchart']=='1'){
 $list = $this->analyticall_model->Getproduct($data);
}else if($data['optionchart']=='2'){
$list = $this->analyticall_model->Getcustomergroup($data);
}else if($data['optionchart']=='3'){
$list = $this->analyticall_model->Getcustomerlevel($data);
}else if($data['optionchart']=='4'){
$list = $this->analyticall_model->Getcustomersex($data);
}else if($data['optionchart']=='5'){
$list = $this->analyticall_model->Getcontactfrom($data);
}else if($data['optionchart']=='6'){
$list = $this->analyticall_model->Getcontactgrade($data);
}else if($data['optionchart']=='7'){
$list = $this->analyticall_model->Getreasonbuy($data);
}else if($data['optionchart']=='8'){
$list = $this->analyticall_model->Getreasonnotbuy($data);
}else if($data['optionchart']=='9'){
$list = $this->analyticall_model->Getprovince($data);
}else if($data['optionchart']=='10'){
$list = $this->analyticall_model->Getamphur($data);
}else if($data['optionchart']=='11'){
$list = $this->analyticall_model->Getdistrict($data);
}else{
	$list = 'null';
}			
		
		if($list)
		{
			echo '{ "chart" : '.$list.'}';
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

if($data['optionchart']=='1'){
 $list = $this->analyticallexcel_model->Getproduct($data);
}else if($data['optionchart']=='2'){
$list = $this->analyticallexcel_model->Getcustomergroup($data);
}else if($data['optionchart']=='3'){
$list = $this->analyticallexcel_model->Getcustomerlevel($data);
}else if($data['optionchart']=='4'){
$list = $this->analyticallexcel_model->Getcustomersex($data);
}else if($data['optionchart']=='5'){
$list = $this->analyticallexcel_model->Getcontactfrom($data);
}else if($data['optionchart']=='6'){
$list = $this->analyticallexcel_model->Getcontactgrade($data);
}else if($data['optionchart']=='7'){
$list = $this->analyticallexcel_model->Getreasonbuy($data);
}else if($data['optionchart']=='8'){
$list = $this->analyticallexcel_model->Getreasonnotbuy($data);
}else if($data['optionchart']=='9'){
$list = $this->analyticallexcel_model->Getprovince($data);
}else if($data['optionchart']=='10'){
$list = $this->analyticallexcel_model->Getamphur($data);
}else if($data['optionchart']=='11'){
$list = $this->analyticallexcel_model->Getdistrict($data);
}else{
	$list = 'null';
}	

    $this->to_excel($list, 'brands-excel');

 

}





	}

