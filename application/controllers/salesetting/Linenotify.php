<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linenotify extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('salesetting/linenotify_model');

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


$data['tab'] = 'linenotify';
$data['title'] = 'Line Noti Api';
		$this->salesettinglayout('salesetting/linenotify',$data);
}



function Updatelinenotify()
   {

$data = json_decode(file_get_contents("php://input"),true);
if(!isset($data)){
exit();
}

 $newdata = array(
        'line_linetoken' => $data['linetoken'],
		'line_whenlogin' => $data['whenlogin'],
		'line_openshift' => $data['openshift'],
		'line_stocknoti' => $data['stocknoti'],
		'line_allbill' => $data['allbill'],
		'line_deletebill' => $data['deletebill'],
		'line_sumsaleshift' => $data['sumsaleshift'],
		'line_listsaleshift' => $data['listsaleshift'],
		'line_deleteproduct' => $data['deleteproduct'],
		'line_editstock' => $data['editstock'],
		
);
$this->session->set_userdata($newdata);

$this->linenotify_model->Updatelinenotify($data);

}

function Getlinenotify()
{

echo $this->linenotify_model->Getlinenotify();

}



	}
