<?php

class Barcode_ds_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Savesetting($data)
        {
          $where = array(
                  'ds_id' => '1'
          );

          $this->db->where($where);
if ($this->db->update("barcode_ds", $data)){
		return true;
	}

  }





           public function Getsncode($imno)
        {


$query = $this->db->query('SELECT *
     FROM serial_number WHERE im_no="'.$imno.'"');
$ret = $query->result_array();

return $ret;

        }
		
		
		




           public function Getsetting($data)
        {


$query = $this->db->query('SELECT *
     FROM barcode_ds');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );

return $encode_data;

        }




        public function Getlist()
        {


$query = $this->db->query('SELECT *
     FROM zone
    WHERE owner_id="'.$_SESSION['owner_id'].'"
    ORDER BY zone_id DESC ');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );





$json = '{"list": '.$encode_data.'}';

return $json;

        }











    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM supplier  WHERE supplier_id="'.$data['supplier_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
return true;

        }




    }
