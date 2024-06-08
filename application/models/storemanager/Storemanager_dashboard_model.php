<?php

class Storemanager_dashboard_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }

        public function get_num_owner_all()
        {
        $this->db->select('*')
       ->from('store_manager')
       ->where('store_id', $_SESSION['store_id']);
   return $this->db->count_all_results();
        }


        public function get_list_owner()
        {
      
        $this->db->select('owner_id,status_pay,aff_income,aff_tag,from_unixtime(add_time,"%H:%i  , %d-%m-%Y") as time')
        ->from('owner')
        ->where('aff_id', $_SESSION['aff_id'])
        ->order_by('add_time','DESC');
        $query = $this->db->get();
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;   
        }






     

}