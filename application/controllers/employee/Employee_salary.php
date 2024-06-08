<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_salary extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('employee/employee_salary_model');

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
		

$data['tab'] = 'employee_salary';
$data['title'] = 'employee salary';
		$this->employeelayout('employee/employee_salary',$data);

}




 function Add()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		$success = $this->employee_salary_model->Add($data);
      
}



 function Getdataleave()
    {
 
$data = json_decode(file_get_contents("php://input"),true);	
echo $this->employee_salary_model->Getdataleave($data);
      
}




 function Update()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		$success = $this->employee_salary_model->Update($data);
      
}



 function Confirmpay()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}		

		$success = $this->employee_salary_model->Confirmpay($data);
      
}



    function Get()
    {

$data = json_decode(file_get_contents("php://input"),true);
echo  $this->employee_salary_model->Get($data);	
 
      
}






    function Delete()
    {
 
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

$success = $this->employee_salary_model->Delete($data);
      if($success){
      	return true;
      }else{
      	return false;
      }

}



	}

