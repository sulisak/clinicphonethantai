<?php

class Employee_salary_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }

        public function Add($data)
        {

$data['user_id'] = $_SESSION['user_id'];
$data['name'] = $_SESSION['name'];
$data['adddate'] = time();

if ($this->db->insert("employee_salary", $data)){
		return true;
	}

  }


           public function Update($data)
        {
		
$where = array(
        's_id'  => $data['s_id']
);

$this->db->where($where);
if ($this->db->update("employee_salary", $data)){
        return true;
    }

}



           public function Confirmpay($data)
        {
	
	$data['confirmdate'] = time();
$where = array(
        's_id'  => $data['s_id']
);

$this->db->where($where);
if ($this->db->update("employee_salary", $data)){
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
from_unixtime(confirmdate,"%d-%m-%Y %H:%i:%s") as confirmdate,
    from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
FROM employee_salary as es
LEFT JOIN employee_list as el on el.em_id=es.employee_id
WHERE es.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'" AND el.em_name LIKE "%'.$data['searchtext'].'%"
ORDER BY es.s_id DESC ');
	
	
	
			
$query = $this->db->query('SELECT *,
from_unixtime(confirmdate,"%d-%m-%Y %H:%i:%s") as confirmdate2,
    from_unixtime(adddate,"%d-%m-%Y %H:%i:%s") as adddate
FROM employee_salary as es
LEFT JOIN employee_list as el on el.em_id=es.employee_id
WHERE es.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'" AND el.em_name LIKE "%'.$data['searchtext'].'%"
ORDER BY es.s_id DESC  LIMIT '.$start.' , '.$perpage.'');

$num_rows = $querynum->num_rows();

$pageall = ceil($num_rows/$perpage);

$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );


$json = '{"list": '.$encode_data.',
"numall": '.$num_rows.',"perpage": '.$perpage.', "pageall": '.$pageall.'}';

return $json;

        }




    public function Delete($data)
        {

$query = $this->db->query('DELETE FROM employee_salary  WHERE s_id="'.$data['s_id'].'" ');
return true;

        }
		
		
		
		
		
		
		
		
		
		
		         public function Getdataleave($data)
        {
	
			
$query = $this->db->query('SELECT count(el.l_id) as allleave,
(SELECT count(*) FROM employee_leave as ee WHERE ee.status_id=1 AND ee.employee_id="'.$data['employee_id'].'"  AND from_unixtime(ee.leavedate,"%m-%Y")="'.$data['month_pay'].'") as status1,
(SELECT count(*) FROM employee_leave as ee WHERE ee.status_id=2 AND ee.employee_id="'.$data['employee_id'].'"  AND from_unixtime(ee.leavedate,"%m-%Y")="'.$data['month_pay'].'") as status2,
(SELECT count(*) FROM employee_leave as ee WHERE ee.status_id=3 AND ee.employee_id="'.$data['employee_id'].'"  AND from_unixtime(ee.leavedate,"%m-%Y")="'.$data['month_pay'].'") as status3,
(SELECT count(*) FROM employee_leave as ee WHERE ee.status_id=4 AND ee.employee_id="'.$data['employee_id'].'"  AND from_unixtime(ee.leavedate,"%m-%Y")="'.$data['month_pay'].'") as status4
FROM employee_leave as el
WHERE from_unixtime(el.leavedate,"%m-%Y")="'.$data['month_pay'].'"
AND el.employee_id="'.$data['employee_id'].'" ');

$query2 = $this->db->query('SELECT es.p_salary  as salary
FROM employee_list as el
LEFT JOIN employee_position as es on es.p_id=el.position_id
WHERE el.em_id="'.$data['employee_id'].'"
');



$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
$encode_data2 = json_encode($query2->result(),JSON_UNESCAPED_UNICODE );


$json = '{"leave": '.$encode_data.',
"salary": '.$encode_data2.'}';

return $json;

        }
		
		




    }