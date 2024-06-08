<?php
class Login_submit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('storemanager/store_manager_model');

    }

    function index()
    {
		header( "location: ".$this->base_url );
        // set form validation rules
      
/*if(!isset($_POST['email']))
{
    header( "location: ".$this->base_url."/storemanager/login" );

}else*/ 



if($_POST['email']=='' || $_POST['password']==''){

  // echo 'email is:'.$_POST['email']; 
header( "location: ".$this->base_url."/storemanager/login?email=not" );
}
else{

            //insert user details into db
            $data = array(
                'store_email' => $this->input->post('email'),
                'store_password' => md5($this->input->post('password'))
            );

            if ($this->store_manager_model->get_user($data) === true)
            {
               
               


if($_SESSION['store_type']=='0'){
    header( "location: ".$this->base_url."/storemanager/user_owner" );
}

if($_SESSION['store_type']=='1'){
    header( "location: ".$this->base_url."/foodmanager/user_owner" );
}


if($_SESSION['store_type']=='2'){
    header( "location: ".$this->base_url."/apartmentmanager/user_owner" );
}



            }
            else
            {
               header( "location: ".$this->base_url."/storemanager/login?login=cannot" );
            }

        }




        
    }









}