<?php

class Pay_type_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {



$data2['pay_type_name'] = $data['pay_type_name'];

if ($this->db->insert("pay_type", $data2)){
		return true;
	}

  }


           public function Update($data)
        {



$data2['pay_type_name'] = $data['pay_type_name'];

$where = array(
        'pay_type_id'  => $data['pay_type_id']
);

$this->db->where($where);
if ($this->db->update("pay_type", $data2)){
        return true;
    }

}



      



           public function Get()
        {

$query = $this->db->query('SELECT * FROM pay_type ORDER BY pay_type_id ASC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM pay_type  WHERE pay_type_id="'.$data['pay_type_id'].'"');
return true;

        }




    }