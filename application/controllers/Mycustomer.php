<?php
class Mycustomer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('customer_model');

     if(!isset($_SESSION['owner_id'])){
		 header( "location: ".$this->base_url ); 
        }
        
    }
 
    public function index()
  {
    

$data['tab'] = 'mycustomer';
$data['title'] = 'My Customer';
    $this->ownerlayout('ownerbody/mycustomer',$data);

}


    function Save()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		$success = $this->customer_model->Addnewcustomer($data);
      
}


function Update()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		$success = $this->customer_model->Update($data);
      
}



function Checktel()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

if($data['custel']!=''){
		echo $this->customer_model->Checktel($data);
}else{
echo '0';
}
      
}




function C2m_bd_noti()
    {
	
 if(!isset($_SESSION['remove_bd_noti_modal']) && $_SESSION['c2m_bd_noti']!='0'){
		echo $this->customer_model->C2m_bd_noti(); 
 }
 
}




function Remove_bd_noti_modal()
    {
	
$data = array(
           'remove_bd_noti_modal' => '1'
         );

$this->session->set_userdata($data);
header( "location: ".$this->base_url ); 
 
}







    function Get()
    {
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$list = $this->customer_model->Mycustomer($data);
 $all = $this->customer_model->Allmycustomer();
				
		
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

$success = $this->customer_model->Deletecustomer($data);
      if($success){
      	return true;
      }else{
      	return false;
      }

}








   function Uploadexcel()
    {
$time = time().$_SESSION['owner_id'];

if(move_uploaded_file($_FILES["excel"]["tmp_name"], "upload/" . $time.'.csv'))
{
$file = 'upload/'.$time.'.csv';

$fileopen = fopen($file, "r");
//$data = fgetcsv( $fileopen , 3, ',' );

$i=0;
while (($dataexcel = fgetcsv($fileopen, 1000, ",")) !== FALSE) {
if($i>0){



if($dataexcel[0] ==null){
$data['cus_name'] = 'xxx';
}else{
	$data['cus_name'] = $dataexcel[0];
}

if($dataexcel[1] ==null){
$data['cus_address'] = '';
}else{
	$data['cus_address'] = $dataexcel[1];
}

if($dataexcel[2] ==null){
	$data['cus_tel'] = '';
}else{
	$data['cus_tel']  = $dataexcel[2];
}


if($dataexcel[3] ==null){
$data['cus_email'] = '';
}else{
	$data['cus_email'] = $dataexcel[3];
}

if($dataexcel[4] ==null){
$data['cus_add_time'] = '';
}else{
	$data['cus_add_time'] = $dataexcel[4];
}


$data['user_id'] = $_SESSION['user_id'];
$data['owner_id'] = $_SESSION['owner_id'];
$data['store_id'] = $_SESSION['store_id'];

 $success = $this->customer_model->Addexcel($data);

}
$i=1;
}

fclose($fileopen);
echo 'ok';


}else{
	echo 'no';
}

}













function Excel() {
       
    $data = json_decode(file_get_contents("php://input"),true);
    if(!isset($data)){
exit();
}


if($data['excel']=='1'){
 $list = $this->customer_model->Exportexcel($data);
}else{
	$list = 'null';
}	

    $this->to_excel($list, 'brands-excel');

 

}




}