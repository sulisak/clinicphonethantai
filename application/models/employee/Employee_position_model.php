<?php

class Employee_position_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {


if ($this->db->insert("employee_position", $data)){
		return true;
	}

  }


           public function Update($data)
        {
		
$where = array(
        'p_id'  => $data['p_id']
);

$this->db->where($where);
if ($this->db->update("employee_position", $data)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT * FROM employee_position ORDER BY p_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM employee_position  WHERE p_id="'.$data['p_id'].'" ');
return true;

        }




    }