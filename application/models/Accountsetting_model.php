<?php

class Accountsetting_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



           public function Update($data)
        {

$where = array(
        'owner_id' => $_SESSION['owner_id']
);

$this->db->where($where);
if ($this->db->update("owner", $data)){
    $newdata = array(
        'owner_name' => $data['owner_name'],
        'owner_tax_number' => $data['owner_tax_number']
);

$this->session->set_userdata($newdata);

        return true;
    }

}



      



    }