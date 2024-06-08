<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class numtoprice extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('salesetting/numtoprice_model');

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
		

$data['tab'] = 'numtoprice';
$data['title'] = 'Num to Price';
		$this->salesettinglayout('salesetting/numtoprice',$data);
}






function Get()
    {
 
 
 $data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

	
	 $list = $this->numtoprice_model->Get($data);
			
		if($list)
		{
			echo '{ "list" : '.$list.'}';
		}
		else{
			echo 'no';
		}	

      
}

function Getproductstep()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		echo  $this->numtoprice_model->Getproductstep($data);
      
}




function Getproductbuy()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		echo  $this->numtoprice_model->Getproductbuy($data);
      
}



function Findproduct()
   {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo $this->numtoprice_model->Findproduct($data);

}




function Getchild()
   {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo $this->numtoprice_model->getchild($data);

}

 



function Addchild()
   {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo $this->numtoprice_model->Addchild($data);

}





function Deletechild()
   {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

echo $this->numtoprice_model->Deletechild($data);

}




    function Saveprice()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->numtoprice_model->Saveprice($data);
   

}






    function Deleteprice()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->numtoprice_model->Deleteprice($data);
      

}











	}

