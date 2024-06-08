<?php

class Product_dws_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

      


           public function Update($data)
        {




$where = array(
        'product_dws_id'  => 1
);

$this->db->where($where);
if ($this->db->update("wh_product_dws", $data)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT * FROM wh_product_dws');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





    }