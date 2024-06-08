<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: <?php echo $_SESSION['color_theme'];?>;
border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);
}
a{
	color: #000000;
}
.panel{
  border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);
}
.btn{
 border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);
}
.form-control{
 border-radius: 20px;
box-shadow: 5px 5px rgba(0,0,0,.3);
}
.img-responsive{
border-radius: 20px;
}
</style>

﻿<br />
<div class="text-center" style="color: #fff;">

<?php //include '../footer.php';?>

<!-- Language <a href="<?php echo $base_url;?>/?lang=th">ภาษาไทย</a>
| <a href="<?php echo $base_url;?>/?lang=lao">ພາສາລາວ</a>
<br /> -->

<!-- Support: <a style="color: #fff;" href="https://www.facebook.com/cus2merpage" target="_blank">
  C2M Fackbook Page
</a> -->
</div>

<?php

$modal_enddate =  '


<div class="modal fade" id="modal-enddate">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header text-left">

				<h4 class="modal-title">หมดอายุการใช้งาน</h4>
			</div>
			<div class="modal-body">

<center>
<h2>
การใช้งานของคุณหมดอายุแล้ว
			<br /><br />
			กรุณาต่ออายุ เพื่อใช้งาน
			<br /><br />
			 <a class="btn btn-success btn-lg" target="_blank" href="http://facebook.com/cus2merpage"> ติดต่อผู้ให้บริการ</a>

			 </h2>
			<hr />

			 <br />
			<a href="'.$base_url.'/logout"> ออกจากระบบ</a>
			</center>

		</div>

			</div>

		</div>



	</div></div>



<script>
$("#modal-enddate").modal({backdrop: "static", keyboard: false});
</script>

';

if(time() > strtotime($_SESSION['owner_end_time'])){
	//echo $modal_enddate;
}

?>




<center>
<span style="color: #fff;font-weight:bold;">

<br />


<a href="https://www.facebook.com/cus2merpage" target="_blank" style="color:#f5eeee;">
Power By  C2MPOS
</a>

</span>
<br />
<br />
</center>


<script src="<?php echo $base_url; ?>/js/excel-export.js"></script>
<script src="<?php echo $base_url; ?>/js/jspdf.min.js"></script>

</body>
</html>

<?php
if(!isset($_SERVER["HTTP_REFERER"])){
		echo '<script>
window.location = "'.$base_url.'";
	</script>';
	}
	?>




	<style type="text/css">
	body{
		font-family: Tahoma;
		background-image: url("<?php echo $base_url.'/'.$_SESSION['owner_bgimg'];?>");
		background-color: <?php echo $_SESSION['color_theme'];?>;
	}
</style>


<style>

.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	    padding: 3px;
}
</style>

<script>
	$("form :input").attr("autocomplete", "off");
</script>




<script>
	
function Openprintdiv1() {
        var divToPrint = document.getElementById('openprint1'); // เลือก div id ที่เราต้องการพิมพ์
	var html =  '<html>'+ // 
				'<head>'+
					'<link href="<?php echo $base_url;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/css2.css" rel="stylesheet" type="text/css">'+
					'<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">'+
				'</head>'+
					'<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
				'</html>';
				
	var popupWin = window.open();
	popupWin.document.open();
	popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
	popupWin.document.close();	
}



function Openprintdiv2() {
        var divToPrint = document.getElementById('openprint2'); // เลือก div id ที่เราต้องการพิมพ์
	var html =  '<html>'+ // 
				'<head>'+
					'<link href="<?php echo $base_url;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/css2.css" rel="stylesheet" type="text/css">'+
					'<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">'+
				'</head>'+
					'<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
				'</html>';
				
	var popupWin = window.open();
	popupWin.document.open();
	popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
	popupWin.document.close();	
}



function Openprintdiv_table() {
        var divToPrint = document.getElementById('openprint_table'); // เลือก div id ที่เราต้องการพิมพ์
	var html =  '<html>'+ // 
				'<head>'+
					'<link href="<?php echo $base_url;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/css2.css" rel="stylesheet" type="text/css">'+
					'<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">'+
				'</head>'+
					'<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
				'</html>';
				
	var popupWin = window.open();
	popupWin.document.open();
	popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
	popupWin.document.close();	
}


function Openprintdiv_mini() {
        var divToPrint = document.getElementById('section-to-print-mini'); // เลือก div id ที่เราต้องการพิมพ์
	var html =  '<html>'+ // 
				'<head>'+
					'<link href="<?php echo $base_url;?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">'+
					'<link href="<?php echo $base_url;?>/css/css2.css" rel="stylesheet" type="text/css">'+
					'<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">'+
				'</head>'+
					'<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
				'</html>';
				
	var popupWin = window.open();
	popupWin.document.open();
	popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
	popupWin.document.close();	
}





	</script>
	
	
	
	
