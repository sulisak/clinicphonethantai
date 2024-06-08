<?php
class Email extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('marketing/email_model');

     if(!isset($_SESSION['owner_id'])){
            header( "location: ".$this->base_url );
        }
        
    }

    public function index()
  {
    

$data['tab'] = 'email';
$data['title'] = 'Email Marketing';
    //$this->marketinglayout('marketing/email',$data);

}



  public function send()
  {
$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}   


 if($data['text'] != '' && $data['subject'] != ''){  

$allemail = $this->email_model->Allmycustomeremail();


foreach ($allemail as $value) {

$this->sendmailfunc($value['cus_email'],$data['subject'],$data['text']);

}


}




}

    



}