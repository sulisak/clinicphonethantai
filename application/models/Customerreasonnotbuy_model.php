<?php

class Customerreasonnotbuy_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {



$data2['customer_reasonnotbuy_name'] = $data['customer_reasonnotbuy_name'];
$data2['customer_reasonnotbuy_remark'] = $data['customer_reasonnotbuy_remark'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

if ($this->db->insert("customer_reasonnotbuy", $data2)){
		return true;
	}

  }


           public function Update($data)
        {



$data2['customer_reasonnotbuy_name'] = $data['customer_reasonnotbuy_name'];
$data2['customer_reasonnotbuy_remark'] = $data['customer_reasonnotbuy_remark'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'customer_reasonnotbuy_id'  => $data['customer_reasonnotbuy_id']
);

$this->db->where($where);
if ($this->db->update("customer_reasonnotbuy", $data2)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT customer_reasonnotbuy_id,customer_reasonnotbuy_name,customer_reasonnotbuy_remark FROM customer_reasonnotbuy WHERE owner_id="'.$_SESSION['owner_id'].'" ORDER BY customer_reasonnotbuy_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM customer_reasonnotbuy  WHERE customer_reasonnotbuy_id="'.$data['customer_reasonnotbuy_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }




    }