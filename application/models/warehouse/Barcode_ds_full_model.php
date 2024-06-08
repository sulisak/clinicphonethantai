<?php

class Barcode_ds_full_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Saveall($data)
        {
          $where = array(
                  'id' => '1'
          );

          $this->db->where($where);
if ($this->db->update("barcode_ds_full", $data)){
		return true;
	}

  }





           public function Getall($data)
        {


$query = $this->db->query('SELECT *
     FROM barcode_ds_full');
$ret = $query->row();
//$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

return $ret->data;

        }






           public function Getall_array()
        {


$query = $this->db->query('SELECT *
     FROM barcode_ds_full');
$ret = $query->row();
$decode_data = json_decode($ret->data,JSON_UNESCAPED_UNICODE );

return $decode_data;

        }
		
		


     




    }
