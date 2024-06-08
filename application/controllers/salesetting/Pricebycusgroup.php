<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricebycusgroup extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('salesetting/pricebycusgroup_model');

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


$data['tab'] = 'pricebycusgroup';
$data['title'] = 'Price by Customer Group';
		$this->salesettinglayout('salesetting/pricebycusgroup',$data);
}






function Getproduct()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

		echo  $this->pricebycusgroup_model->Getproduct($data);

}

function Getproductcusgroup()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

		echo  $this->pricebycusgroup_model->Getproductcusgroup($data);

}






    function Get()
    {
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$list = $this->pricebycusgroup_model->Mycustomergroup($data);
 $all = $this->pricebycusgroup_model->Allmycustomergroup();


		if($list)
		{
			echo '{ '.$list.',
			"all": '.$all.' }';
		}
		else{
			echo 'no';
		}

}




    function Saveprice()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->pricebycusgroup_model->Saveprice($data);


}








    function Savediscountpercent()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->pricebycusgroup_model->savediscountpercent($data);


}





    function Deleteprice()
    {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->pricebycusgroup_model->Deleteprice($data);


}










	}
