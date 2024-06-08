<?php

class Permission_group_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {



$data2['group_name'] = $data['group_name'];
$data2['group_des'] = $data['group_des'];
if ($this->db->insert("permission_group", $data2)){
		return true;
	}

  }


           public function Update($data)
        {



$data2['group_name'] = $data['group_name'];
$data2['group_des'] = $data['group_des'];
$where = array(
        'group_id'  => $data['group_id']
);

$this->db->where($where);
if ($this->db->update("permission_group", $data2)){
        return true;
    }

}




          public function Getpermission_rule_save($data)
        {

$data2['permission_rule'] = $data['permission_rule'];
$where = array(
        'group_id'  => $data['group_id']
);

$this->db->where($where);
if ($this->db->update("permission_group", $data2)){
        return true;
    }

}




      



           public function Get()
        {

$query = $this->db->query('SELECT * FROM permission_group ORDER BY group_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }
		
		
		
		           public function Getpermission_rule($data)
        {

$query = $this->db->query('SELECT * FROM permission_group WHERE group_id="'.$data['group_id'].'"');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }
		
		
		




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM permission_group  WHERE group_id="'.$data['group_id'].'"');
return true;

        }




    }