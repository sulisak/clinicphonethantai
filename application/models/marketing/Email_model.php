<?php

class Email_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

       

   public function Allmycustomeremail()
        {

$query = $this->db->query('SELECT cus_email FROM customer_owner WHERE owner_id="'.$_SESSION['owner_id'].'" AND cus_email != ""  ');
return $query->result_array();

        }



    }