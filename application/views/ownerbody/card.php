<!DOCTYPE html>
<html>
<head>



<style>
    body {
        width: 8.5in;
        margin: 0in .1875in;
        }
    .labelx{
        /* Avery 5160 labels -- CSS and HTML by MM at Boulder Information Services */
        width: 100%; /* plus .6 inches from padding */
        /*height: .875in;  plus .125 inches from padding */
        padding: .125in .3in 0;
        margin-right: .125in; /* the gutter */

        float: left;

        text-align: center;
        overflow: hidden;

        outline: 1px dotted; /* outline doesn't occupy space like border does */
        }
    .page-break  {
        clear: left;
        display:block;
        page-break-after:always;
        }

        @media print {
    body * {
        visibility: hidden;
    }
    #section-to-print, #section-to-print * {
        visibility: visible;
   
    }
    #section-to-print {
        position: absolute;
        left: 0;
        top: 0;
    }
    </style>





	<title>Card <?php if(isset($_GET['cus_name'])){ echo $_GET['cus_name']; } ?> </title>
</head>

<body>
<button class="btn btn-success"  onclick="window.print()" style="font-size:26px;">พิมพ์</button>

<hr/>

<div id="section-to-print">



<?php
for($i=1;$i<=1;$i++){
    
     echo '<div class="labelx">
 <font size="2"> ';

echo '<span style="font-size:18px;font-weight:bold;">';
echo $_SESSION['owner_name']; 
echo '</span><br />';

   if(isset($_GET['cus_name'])){ echo $_GET['cus_name']; }  echo '</font>
<br />
    ';
			echo '<img width="200px" height="50px" src="'.$base_url.'/bc/c2mbarcode.php?barcode='.$_GET["code"].'">';
echo '<br /><b>'.$_GET["code"].'</b><br />';
 				
 }
  ?>

</div>

</body>
</html>


