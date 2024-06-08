<?php

class Customer_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {



$data2['vendor_name'] = $data['vendor_name'];
$data2['vendor_address'] = $data['vendor_address'];
$data2['id_vat'] = $data['id_vat'];
$data2['vat'] = $data['vat'];

if ($this->db->insert("vendor", $data2)){
		return true;
	}

  }


           public function Update($data)
        {



$data2['vendor_name'] = $data['vendor_name'];
$data2['vendor_address'] = $data['vendor_address'];
$data2['id_vat'] = $data['id_vat'];
$data2['vat'] = $data['vat'];

$where = array(
        'vendor_id' => $data['vendor_id']
);

$this->db->where($where);
if ($this->db->update("vendor", $data2)){
        return true;
    }

}







           public function Get()
        {

$query = $this->db->query('SELECT *
  FROM vendor  ORDER BY vendor_id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM vendor
  WHERE vendor_id="'.$data['vendor_id'].'" ');
return true;

        }




    }
