<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricebystep extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('salesetting/pricebystep_model');

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
		

$data['tab'] = 'pricebystep';
$data['title'] = 'Price by Step';
		$this->salesettinglayout('salesetting/pricebystep',$data);
}






function Get()
    {
 
	 $list = $this->pricebystep_model->Get();
			
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

		echo  $this->pricebystep_model->Getproductstep($data);
      
}






 




    function Saveprice()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->pricebystep_model->Saveprice($data);
   

}






    function Deleteprice()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->pricebystep_model->Deleteprice($data);
      

}











	}

