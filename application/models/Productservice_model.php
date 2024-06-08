<?php

class Productservice_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {



$data2['product_service_name'] = $data['product_service_name'];
$data2['product_service_price'] = $data['product_service_price'];
$data2['product_service_remark'] = $data['product_service_remark'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

if ($this->db->insert("product_service", $data2)){
		return true;
	}

  }


           public function Update($data)
        {



$data2['product_service_name'] = $data['product_service_name'];
$data2['product_service_price'] = $data['product_service_price'];
$data2['product_service_remark'] = $data['product_service_remark'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'product_service_id'  => $data['product_service_id']
);

$this->db->where($where);
if ($this->db->update("product_service", $data2)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT product_service_id,product_service_name,product_service_price,product_service_remark FROM product_service WHERE owner_id="'.$_SESSION['owner_id'].'" ORDER BY product_service_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM product_service  WHERE product_service_id="'.$data['product_service_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }




    }