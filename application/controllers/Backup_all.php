<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup_all extends MY_Controller {


 public function __construct()
    {
        parent::__construct();
        $this->load->database();
        //$this->load->model('warehouse/importproduct_model');

     if(!isset($_SESSION['owner_id']) && $_SESSION['$user_type'] !='4'){
            header( "location: ".$this->base_url );
        }

    }



	public function index()
	{

    $this->load->dbutil();

    $prefs = array(
        'format'      => 'zip',
        'filename'    => 'my_db_backup.sql'
        );


    $backup =& $this->dbutil->backup($prefs);

    $db_name = 'backup_db_'. date("d-m-Y_H-i-s") .'.zip';
    $save = 'pathtobkfolder/'.$db_name;

    $this->load->helper('file');
    write_file($save, $backup);


    $this->load->helper('download');
    force_download($db_name, $backup);




    }

    public function file()
    {


      $this->load->library('zip');
$path='pos9';
$this->zip->read_dir($path);
$this->zip->download('backup_file_'.date('d-m-Y_H-i-s').'.zip');


      }



}
