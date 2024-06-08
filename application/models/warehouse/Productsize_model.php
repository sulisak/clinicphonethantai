<?php

class Productsize_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {



$data2['product_size_name'] = $data['product_size_name'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

if ($this->db->insert("wh_product_size", $data2)){
		return true;
	}

  }


           public function Update($data)
        {



$data2['product_size_name'] = $data['product_size_name'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'product_size_id'  => $data['product_size_id']
);

$this->db->where($where);
if ($this->db->update("wh_product_size", $data2)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT product_size_id,product_size_name FROM wh_product_size 
WHERE owner_id="'.$_SESSION['owner_id'].'" ORDER BY product_size_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM wh_product_size  
WHERE product_size_id="'.$data['product_size_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }




    }