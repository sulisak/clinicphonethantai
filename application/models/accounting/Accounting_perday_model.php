<?php

class Accounting_perday_model extends CI_Model {



        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->library('session');


        }



 public function Daylist($data)
        {

$year = $data['year'];
$month = $data['month'];



$query = $this->db->query('SELECT

    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="01") as d1,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="02") as d2,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="03") as d3,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="04") as d4,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="05") as d5,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="06") as d6,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="07") as d7,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="08") as d8,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="09") as d9,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="10") as d10,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="11") as d11,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="12") as d12,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="13") as d13,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="14") as d14,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="15") as d15,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="16") as d16,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="17") as d17,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="18") as d18,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="19") as d19,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="20") as d20,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="21") as d21,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="22") as d22,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="23") as d23,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="24") as d24,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="25") as d25,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="26") as d26,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="27") as d27,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="28") as d28,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="29") as d29,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="30") as d30,
    (SELECT sum(buy_price*(vat/100)) FROM accounting_taxinvoice_list as sd WHERE sd.owner_id="'.$_SESSION['owner_id'].'" AND FROM_UNIXTIME(sd.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(sd.adddate, "%m")="'.$month.'" AND FROM_UNIXTIME(sd.adddate, "%d")="31") as d31






    FROM accounting_taxinvoice_list as wpl WHERE wpl.owner_id="'.$_SESSION['owner_id'].'"
    AND FROM_UNIXTIME(wpl.adddate, "%Y")="'.$year.'" AND FROM_UNIXTIME(wpl.adddate, "%m")="'.$month.'" GROUP BY FROM_UNIXTIME(wpl.adddate, "%m")
    ');
$encode_data = json_encode($query->result(),JSON_UNESCAPED_UNICODE );
echo $encode_data;
        }






    }
