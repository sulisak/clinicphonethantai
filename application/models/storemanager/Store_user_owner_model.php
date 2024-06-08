<?php

class Store_user_owner_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');
        }





public function Add($data)
        {



$this->db->where('user_email', $data['user_email']);
$query = $this->db->get('user_owner');
$count_row = $query->num_rows();

    if ($count_row > 0) {
      //if count row return any row; that means you have already this email address in the database. so you must set false in this sense.
        return FALSE; // here I change TRUE to false.
     } else {

$data['store_id'] = $_SESSION['store_id'];
$this->db->insert("user_owner", $data);
      // doesn't return any row means database doesn't have this email
        return TRUE; // And here false to TRUE
     }




  }


   public function Edit($data)
        {

$this->db->where('user_id',$data['user_id']);
$this->db->where('store_id',$_SESSION['store_id']);
if ($this->db->update("user_owner", $data)){
        return true;
    }


  }




   public function Get()
        {

        $query = $this->db->query('SELECT 
ow.owner_id,
ow.owner_name,
  u.name,
  u.user_id,
  u.user_email,
  u.supplier_id,
  u.branch_id,
  u.user_type
  FROM user_owner as u
  LEFT JOIN branch as b on b.branch_id=u.branch_id
  LEFT JOIN owner as ow on ow.owner_id=u.owner_id
  ORDER BY user_id ASC');

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;
        }




        public function Getvendor()
                     {

                $this->db->select('supplier.supplier_id,
                supplier.supplier_name')
                     ->from('supplier')
                     ->order_by('supplier.supplier_id','ASC');
                     $query = $this->db->get();
                $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
                return $encode_data;
                     }





        public function Deleteuser($data)
                   {

               $query = $this->db->query('DELETE FROM user_owner  WHERE user_id="'.$data['user_id'].'" and  owner_id="'.$_SESSION['owner_id'].'"');
               return true;

                   }











}
