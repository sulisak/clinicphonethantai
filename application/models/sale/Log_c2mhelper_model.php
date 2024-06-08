<?php

class Log_c2mhelper_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }


 public function Get($data)
        {

$query = $this->db->query('SELECT *,
from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as deltime
    FROM log_c2mhelper
    ORDER BY deltime DESC  ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

$json = $encode_data;

return $json;


        }












  }
