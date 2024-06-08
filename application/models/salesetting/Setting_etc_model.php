<?php

class Setting_etc_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }




           public function Updatediscountfrombuy($data)
        {


$where = array(
'id' => '1'
);

$this->db->where($where);
if ($this->db->update("discount_from_buy_rule", $data)){
        return true;
    }

}



           public function Update_owner($data)
        {


$where = array(
'owner_id' => $_SESSION['owner_id']
);

$this->db->where($where);
if ($this->db->update("owner", $data)){
        return true;
    }

}




public function Updatemoneytopoint($data)
{

$where = array(
'id' => '1'
);

$this->db->where($where);
if ($this->db->update("money_to_point_rule", $data)){
return true;
}

}




public function Updatepointtomoney($data)
{

$where = array(
'id' => '1'
);

$this->db->where($where);
if ($this->db->update("point_to_money_rule", $data)){
return true;
}

}





public function Updateservicecharge($data)
{

$where = array(
'id' => '1'
);

$this->db->where($where);
if ($this->db->update("service_charge_rule", $data)){
return true;
}

}





public function Updatevat($data)
{

$where = array(
'id' => '1'
);

$this->db->where($where);
if ($this->db->update("vat_rule", $data)){
return true;
}

}



public function Update_stock_rule($data)
{

$where = array(
'id' => '1'
);

$this->db->where($where);
if ($this->db->update("stock_rule", $data)){
return true;
}

}







           public function Getdiscountfrombuy()
        {

$query = $this->db->query('SELECT * FROM discount_from_buy_rule ORDER BY id DESC');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
return $encode_data;

        }





        public function Getmoneytopoint()
     {

     $query = $this->db->query('SELECT * FROM money_to_point_rule ORDER BY id DESC');
     $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
     return $encode_data;

     }
	 
	 
	 
	    public function Getpointtomoney()
     {

     $query = $this->db->query('SELECT * FROM point_to_money_rule ORDER BY id DESC');
     $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
     return $encode_data;

     }
	 
	 
	 
	 



     public function Getservicecharge()
     {

     $query = $this->db->query('SELECT * FROM service_charge_rule ORDER BY id DESC');
     $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
     return $encode_data;

     }



     public function Getvat()
     {

     $query = $this->db->query('SELECT * FROM vat_rule ORDER BY id DESC');
     $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
     return $encode_data;

     }
	 
	 
	 
	      public function Get_stock_rule()
     {

     $query = $this->db->query('SELECT * FROM stock_rule ORDER BY id DESC');
     $encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
     return $encode_data;

     }





    }
