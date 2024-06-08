<?php

class Round_setting_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

       



  


    







 public function Getround()
        {

$query = $this->db->query('SELECT *
    FROM round_setting
    ORDER BY rs_ID ASC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

return $encode_data;

        }




public function Saveround($data)
        {

      $this->db->insert("round_setting", $data);

        }



public function Deleteround($data)
        {

$query_delete = $this->db->query('DELETE FROM round_setting  WHERE rs_ID="'.$data['rs_ID'].'" ');


        }












    }