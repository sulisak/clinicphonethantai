<?php

class Employee_leave_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {

$data2['status_id'] = $data['status_id'];
$data2['employee_id'] = $data['employee_id'];
$data2['l_des'] = $data['l_des'];

$data2['user_id'] = $_SESSION['user_id'];
$data2['name'] = $_SESSION['name'];

$data2['adddate'] = time();

if($data['leavedate'] !=''){
$data2['leavedate'] = strtotime($data['leavedate']);
}else{
$data2['leavedate'] = $data2['adddate'];
}

if ($this->db->insert("employee_leave", $data2)){
		return true;
	}

  }


           public function Update($data)
        {
		
$where = array(
        'l_id'  => $data['l_id']
);

$this->db->where($where);
if ($this->db->update("employee_leave", $data)){
        return true;
    }

}



      



           public function Get($data)
        {

$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;



 $perpage = $data['perpage'];

            if($data['page'] && $data['page'] != ''){
$page = $data['page'];
            }else{
          $page = '1';
            }


            $start = ($page - 1) * $perpage;
			
			
			
$querynum = $this->db->query('SELECT *,
from_unixtime(leavedate,"%d-%m-%Y %H:%i:%s") as leavedate,
    from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
FROM employee_leave as el
LEFT JOIN employee_list as em on em.em_id=el.employee_id
WHERE el.leavedate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'" AND em.em_name LIKE "%'.$data['searchtext'].'%"
ORDER BY el.l_id DESC ');
	
	
	
			
$query = $this->db->query('SELECT *,
from_unixtime(leavedate,"%d-%m-%Y %H:%i:%s") as leavedate,
    from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
FROM employee_leave as el
LEFT JOIN employee_list as em on em.em_id=el.employee_id
WHERE el.leavedate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'" AND em.em_name LIKE "%'.$data['searchtext'].'%"
ORDER BY el.l_id DESC  LIMIT '.$start.' , '.$perpage.'');

$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM employee_leave  WHERE l_id="'.$data['l_id'].'" ');
return true;

        }




    }