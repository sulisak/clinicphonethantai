<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountsetting extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('accountsetting_model');

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
		

$data['tab'] = 'accountsetting';
$data['title'] = 'Account Setting';
		$this->ownerlayout('ownerbody/accountsetting',$data);
}




 function Update()
    {
 
$data2 = json_decode(file_get_contents("php://input"),true);
if(!isset($data2)){
exit();
}

$data['owner_name'] = $data2['owner_name'];
$data['owner_tax_number'] = $data2['owner_tax_number'];
$data['owner_pass'] = md5($data2['owner_password']);

$this->accountsetting_model->Update($data);


      
}





	}

