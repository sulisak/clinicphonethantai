<?php
class Signup extends MY_Controller
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
      
if($_POST['email']=='')
{
    header( "location: ".$this->base_url."/storemanager/register" );
}else{

            //insert user details into db
            $data = array(
                'store_name' => $this->input->post('owner'),
                'store_storename' => $this->input->post('name'),
                'store_tel' => $this->input->post('tel'),
                'store_email' => $this->input->post('email'),
                'store_password' => md5($this->input->post('password'))
            );

            if ($this->store_manager_model->insert_user($data) === true)
            {
               
               header( "location: ".$this->base_url."/storemanager/login?regis=ok" );
            }
            else
            {
               header( "location: ".$this->base_url."/storemanager/register?regis=cannot" );
            }

        }
        
    }
}