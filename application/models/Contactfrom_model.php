<?php

class Contactfrom_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

       public function Add($data)
        {



$data2['contact_from_name'] = $data['contact_from_name'];
$data2['contact_from_remark'] = $data['contact_from_remark'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

if ($this->db->insert("contact_from", $data2)){
        return true;
    }

  }


           public function Update($data)
        {



$data2['contact_from_name'] = $data['contact_from_name'];
$data2['contact_from_remark'] = $data['contact_from_remark'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'contact_from_id'  => $data['contact_from_id']
);

$this->db->where($where);
if ($this->db->update("contact_from", $data2)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT contact_from_id,contact_from_name,contact_from_remark FROM contact_from WHERE owner_id="'.$_SESSION['owner_id'].'" ORDER BY contact_from_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM contact_from  WHERE contact_from_id="'.$data['contact_from_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }




    }