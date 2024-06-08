<?php

class Store_manager_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }

        public function insert_user($data)
        {

                $this->db->where('store_email', $data['store_email']);

    $query = $this->db->get('store_manager');

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
        return FALSE; // here I change TRUE to false.
     } else {

         $this->db->insert('store_manager', $data);
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }


              
              
        }



           public function get_user($data)
        {

        $query =  $this->db->get_where('store_manager' , array('store_email' => $data['store_email'] , 'store_password' => $data['store_password']));

    $count_row = $query->num_rows();

    if ($count_row > 0) {
      


foreach ($query->result() as $row) {

        $store_id = $row->store_id;
         $store_name = $row->store_name;
        $store_email = $row->store_email;
        $store_storename = $row->store_storename;
        $store_type = $row->store_type;
}

      $newdata = array(
        'store_id' => $store_id,
        'store_manager_id' => $store_id,
        'store_email'     => $store_email,
        'store_name' => $store_name,
        'store_storename' => $store_storename,
        'store_type' => $store_type,
        'store_logged_in' => TRUE
);

$this->session->set_userdata($newdata);
return TRUE;

     } else {

       
        return FALSE; 
     }


              
              
        }


     

}