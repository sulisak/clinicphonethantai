<?php

class Linenotify_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }




           public function Updatelinenotify($data)
        {


$where = array(
'id' => '1'
);
$this->db->where($where);
if ($this->db->update("line_notify", $data)){
        return true;
    }

}

	 
	      public function Getlinenotify()
     {

     $query = $this->db->query('SELECT * FROM line_notify limit 1');
     $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
     return $encode_data;

     }





    }
