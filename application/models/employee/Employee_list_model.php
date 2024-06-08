<?php

class Employee_list_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {


if ($this->db->insert("employee_list", $data)){
		return true;
	}

  }


           public function Update($data)
        {
		
$where = array(
        'em_id'  => $data['em_id']
);

$this->db->where($where);
if ($this->db->update("employee_list", $data)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT * FROM employee_list as el
LEFT JOIN employee_position as ep on ep.p_id=el.position_id
ORDER BY el.em_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM employee_list  WHERE em_id="'.$data['em_id'].'" ');
return true;

        }




    }