<?php

class C2mhelper_model extends CI_Model {
	


        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }





public function Stockupdate()
        {


$aa = $this->db->query('SELECT * FROM wh_product_list');


foreach ($aa->result() as $row)
{

$data['product_id'] = $row->product_id;
$data['product_stock_num'] = $row->product_stock_num;
$data['branch_id'] = '1';

$this->db->insert("stock", $data);

}



}




public function Paytypeupdate()
        {


$aa = $this->db->query('SELECT * FROM sale_list_header');


foreach ($aa->result() as $row)
{

$querynum = $this->db->query('SELECT * FROM morepay WHERE sale_runno="'.$row->sale_runno.'"');
$num_rows = $querynum->num_rows();

if($num_rows==0){
$data['sale_runno'] = $row->sale_runno;
$data['money'] = $row->sumsale_price-$row->discount_last;
$data['shift_id'] = $row->shift_id;
$data['branch_id'] = '1';
$data['pay_type'] = $row->pay_type;
$data['user_id'] = $row->user_id;
$this->db->insert("morepay", $data);
}

}



}









public function Revertreturn()
        {


$aa = $this->db->query('SELECT * FROM product_return_datail2');


foreach ($aa->result() as $row)
{

$this->db->query('UPDATE sale_list_datail 
    SET product_sale_num=product_sale_num + '.$row->product_sale_num.'
    WHERE product_name="'.$row->product_name.'" AND sale_runno="'.$row->sale_runno.'"');
	
$price = $row->product_sale_num*$row->product_price;
$this->db->query('UPDATE sale_list_header 
    SET sumsale_num=sumsale_num + '.$row->product_sale_num.' ,
	sumsale_price=sumsale_price+'.$price.'
    WHERE sale_runno="'.$row->sale_runno.'"');

}



}







public function Delsalesomecheck($data)
        {
		
		$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


		$querynum = $this->db->query('SELECT * FROM sale_list_header  as sh
WHERE sh.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
ORDER BY ID DESC ');
		
return $querynum->num_rows();		
		
		}






public function Delsalesomeok($data)
        {
		
$dayfrom = strtotime($data['dayfrom']);
$dayto = strtotime($data['dayto'])+86400;


$datalog['type'] = '4';
$datalog['dayfrom'] = $data['dayfrom'];
$datalog['dayto'] = $data['dayto'];
$datalog['user_id'] = $_SESSION['user_id'];
$datalog['name'] = $_SESSION['name'];
$datalog['adddate'] = time();
$this->db->insert("log_c2mhelper", $datalog);



//delete morepay
$querysn = $this->db->query('SELECT * FROM sale_list_header  as sh
WHERE sh.adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"
ORDER BY ID DESC ');

  foreach ($querysn->result() as $row)
{	
$this->db->query('DELETE FROM morepay
WHERE sale_runno="'.$row->sale_runno.'"');
}
//delete morepay


$this->db->query('DELETE FROM sale_list_header
WHERE adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"');

$this->db->query('DELETE FROM sale_list_datail
WHERE adddate
BETWEEN "'.$dayfrom.'"
AND "'.$dayto.'"');

return 'ok';		
		
		}
		
		
		
		

      public function Delsaleall()
        {


$datalog['type'] = '1';
$datalog['user_id'] = $_SESSION['user_id'];
$datalog['name'] = $_SESSION['name'];
$datalog['adddate'] = time();
$this->db->insert("log_c2mhelper", $datalog);


$this->db->query('TRUNCATE TABLE sale_list_header');
$this->db->query('TRUNCATE TABLE sale_list_datail');
$this->db->query('TRUNCATE TABLE sale_list_header_bak');
$this->db->query('TRUNCATE TABLE sale_list_datail_bak');
$this->db->query('TRUNCATE TABLE shift');
$this->db->query('TRUNCATE TABLE accounting_taxinvoice_list');
$this->db->query('TRUNCATE TABLE product_return_header2');
$this->db->query('TRUNCATE TABLE product_return_datail2');
$this->db->query('TRUNCATE TABLE pawn');
$this->db->query('TRUNCATE TABLE pawnadddate');
$this->db->query('TRUNCATE TABLE wh_exportproduct_detail');
$this->db->query('TRUNCATE TABLE wh_exportproduct_header');
$this->db->query('TRUNCATE TABLE wh_importproduct_detail');
$this->db->query('TRUNCATE TABLE wh_importproduct_header');
$this->db->query('TRUNCATE TABLE purchase_buy_detail');
$this->db->query('TRUNCATE TABLE purchase_buy_header');
$this->db->query('TRUNCATE TABLE sale_list_cus2mer');
$this->db->query('TRUNCATE TABLE quotation_list_datail');
$this->db->query('TRUNCATE TABLE quotation_list_header');
$this->db->query('TRUNCATE TABLE credit_payed');
$this->db->query('TRUNCATE TABLE log_edit_product_stock');
$this->db->query('TRUNCATE TABLE log_from_relation_when_sale');
$this->db->query('TRUNCATE TABLE morepay');
$this->db->query('TRUNCATE TABLE log_round');
$this->db->query('TRUNCATE TABLE log_delete_order');
$this->db->query('TRUNCATE TABLE used_course');


    }


  public function Delstockall()
        {

$datalog['type'] = '2';
$datalog['user_id'] = $_SESSION['user_id'];
$datalog['name'] = $_SESSION['name'];
$datalog['adddate'] = time();
$this->db->insert("log_c2mhelper", $datalog);

$this->db->query('TRUNCATE TABLE stock');
$this->db->query('TRUNCATE TABLE serial_number');

    }
	
	

  public function Delall_product()
        {

$datalog['type'] = '3';
$datalog['user_id'] = $_SESSION['user_id'];
$datalog['name'] = $_SESSION['name'];
$datalog['adddate'] = time();
$this->db->insert("log_c2mhelper", $datalog);

$this->db->query('TRUNCATE TABLE wh_product_list');
$this->db->query('TRUNCATE TABLE wh_exportproduct_detail');
$this->db->query('TRUNCATE TABLE wh_exportproduct_header');
$this->db->query('TRUNCATE TABLE wh_importproduct_detail');
$this->db->query('TRUNCATE TABLE wh_importproduct_header');

$this->db->query('TRUNCATE TABLE stock');
$this->db->query('TRUNCATE TABLE serial_number');

    }
	
	
	

}
