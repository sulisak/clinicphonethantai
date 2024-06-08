<?php
class Customerscore extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('sale/customerscore_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }
        
    }

    public function index()
  {
    

$data['tab'] = 'customerscore';
$data['title'] = 'Customer Score';
    $this->salelayout('sale/customerscore',$data);

}


    function Save()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		$success = $this->customerscore_model->Addnewcustomer($data);
      
}


function Update()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		$success = $this->customerscore_model->Update($data);
      
}





    function Get()
    {
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$list = $this->customerscore_model->Mycustomer($data);
 $all = $this->customerscore_model->Allmycustomer();
				
		
		if($list)
		{
			echo '{ '.$list.',
			"all": '.$all.' }';
		}
		else{
			echo 'no';
		}
      
}






    function Delete()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->customerscore_model->Deletecustomer($data);
      if($success){
      	return true;
      }else{
      	return false;
      }

}



function Excel() {
       
    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
exit();
}


if($data['excel']=='1'){
 $list = $this->customerscore_model->Exportexcel($data);
}else{
	$list = 'null';
}	

    $this->to_excel($list, 'brands-excel');

 

}



}