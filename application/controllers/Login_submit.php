<?php
class Login_submit extends MY_Controller
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

if(!isset($_POST['email']))
{
    header( "location: ".$this->base_url."/login" );

}else if($_POST['email']=='' || $_POST['password']==''){
header( "location: ".$this->base_url."/login?email=not" );
}
else{

            //insert user details into db
            $data = array(
                'user_email' => $this->input->post('email'),
                'user_password' => $this->input->post('password')
            );


            $md5password =  $data['user_password'].$this->c2m_key;
            $data['user_password'] = md5($md5password);



            if ($this->user_model->get_user($data) === true)
            {

               header( "location: ".$this->base_url."" );
            }
            else
            {
               header( "location: ".$this->base_url."/login?login=cannot" );
            }

        }

    }
}
