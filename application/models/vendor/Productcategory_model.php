<?php

class Productcategory_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {



$data2['product_category_name'] = $data['product_category_name'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

if ($this->db->insert("wh_product_category", $data2)){
		return true;
	}

  }


           public function Update($data)
        {



$data2['product_category_name'] = $data['product_category_name'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'product_category_id'  => $data['product_category_id']
);

$this->db->where($where);
if ($this->db->update("wh_product_category", $data2)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT product_category_id,product_category_name FROM wh_product_category WHERE owner_id="'.$_SESSION['owner_id'].'" ORDER BY product_category_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM wh_product_category  WHERE product_category_id="'.$data['product_category_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }




    }