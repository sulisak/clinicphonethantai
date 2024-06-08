<?php

class Contactgrade_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {



$data2['contact_grade_name'] = $data['contact_grade_name'];
$data2['contact_grade_remark'] = $data['contact_grade_remark'];
$data2['owner_id'] = $_SESSION['owner_id'];
$data2['user_id'] = $_SESSION['user_id'];
$data2['store_id'] = $_SESSION['store_id'];

if ($this->db->insert("contact_grade", $data2)){
        return true;
    }

  }


           public function Update($data)
        {



$data2['contact_grade_name'] = $data['contact_grade_name'];
$data2['contact_grade_remark'] = $data['contact_grade_remark'];

$where = array(
        'owner_id' => $_SESSION['owner_id'],
        'contact_grade_id'  => $data['contact_grade_id']
);

$this->db->where($where);
if ($this->db->update("contact_grade", $data2)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT contact_grade_id,contact_grade_name,contact_grade_remark FROM contact_grade WHERE owner_id="'.$_SESSION['owner_id'].'" ORDER BY contact_grade_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM contact_grade  WHERE contact_grade_id="'.$data['contact_grade_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }




    }