<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {


public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('storemanager/storemanager_dashboard_model');

 if(!isset($_SESSION['store_manager_id']) || $_SESSION['store_type']!='0'){
            header( "location: ".$this->base_url."/storemanager/login" );
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

		$data['tab'] = 'dashboard';
		$data['title'] = 'Dashboard';


		$this->storemanagerlayout('storemanager/dashboard',$data);
	}


	public function get_list_owner()
	{
echo $this->storemanager_dashboard_model->get_list_owner();

	}





}
