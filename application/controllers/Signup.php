<?php
class Signup extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('user_model');

    }

    function index()
    {
        // set form validation rules
 header( "location: ".$this->base_url );     
if(!isset($_POST['email']))
{
    header( "location: ".$this->base_url."/register" );
}else{


if(isset($_SESSION['aff_i'])){ 

$aff_i = $_SESSION['aff_i'];
$aff_income = $this->aff_income;

if(isset($_SESSION['aff_tag'])){
$aff_tag = $_SESSION['aff_tag'];
}else{
 $aff_tag = '';  
}

}else{
$aff_i = '0';
$aff_tag = '';
$aff_income = '0';
}



            //insert user details into db
            $data = array(
                'owner_name' => $this->input->post('name'),
                'owner_address' => $this->input->post('owner_address'),
                'province_id' => $this->input->post('province'),
                'amphur_id' => $this->input->post('amphur'),
                'district_id' => $this->input->post('postcode'),
                'postcode' => $this->input->post('postcode'),
                'tel' => $this->input->post('tel'),
                'owner_email' => $this->input->post('email'),
                'owner_pass' => md5($this->input->post('password')),
                'add_time' => time(),
                'aff_id' => $aff_i,
                'aff_tag' => $aff_tag,
                'aff_income' => $aff_income
            );

            if ($this->user_model->insert_user($data) === true)
            {
               
               header( "location: ".$this->base_url."/login?regis=ok" );
            }
            else
            {
               header( "location: ".$this->base_url."/register?regis=cannot" );
            }

        }
        
    }
}