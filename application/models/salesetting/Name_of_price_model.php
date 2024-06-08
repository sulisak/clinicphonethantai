<?php

class Name_of_price_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }




           public function Update($data)
        {


$where = array(
        'id'  => '1'
);

$this->db->where($where);
if ($this->db->update("name_of_price", $data)){
        return true;
    }
	
	$this->db->query('UPDATE name_of_price SET 
	price1='.$data['price1'].',
	price2='.$data['price2'].',
	price3='.$data['price3'].',
	price4='.$data['price4'].',
	price5='.$data['price5'].'
WHERE id="1"');	



}



      



           public function Get()
        {

$query = $this->db->query('SELECT * FROM name_of_price ORDER BY id ASC LIMIT 1');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }






    }