<?php

class Exchangerate_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {



if ($this->db->insert("exchangerate", $data)){
		return true;
	}

  }


           public function Update($data)
        {



$where = array(
        'e_id'  => $data['e_id']
);

$this->db->where($where);
if ($this->db->update("exchangerate", $data)){
        return true;
    }

}





           public function Showonslip($data)
        {

$newdata = array(
        'exchangerateonslip'     => $data['exchangerateonslip']
);

$this->session->set_userdata($newdata);


$where = array(
        'owner_id'  => $_SESSION['owner_id']
);

$this->db->where($where);
if ($this->db->update("owner", $data)){
        return true;
    }

}





      



           public function Get()
        {

$query = $this->db->query('SELECT * FROM exchangerate ORDER BY e_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM exchangerate  WHERE e_id="'.$data['e_id'].'"');
return true;

        }




    }