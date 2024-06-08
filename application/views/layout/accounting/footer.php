<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #265a88;
}
a{
	color: #000000;
}
.panel{
  border-radius: 0px;
}
.btn{
 border-radius: 0px;
}
.form-control{
 border-radius: 0px;
}
</style>

﻿<br />
<div class="text-center" style="color: #fff;">
<!-- Language <a href="<?php echo $base_url;?>/?lang=th">ภาษาไทย</a>
| <a href="<?php echo $base_url;?>/?lang=lao">ພາສາລາວ</a>
<br /> -->




<?php if($_SESSION['user_type']=='20'){ ?>
<a href="<?php echo $base_url; ?>/logout" style="color: #fff;"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> <?=$lang_logout?></a>
<br />
<?php } ?>







<!-- Support: <a style="color: #fff;" href="https://www.facebook.com/cus2merpage" target="_blank">
  C2M Fackbook Page
</a> -->
</div>




<script src="<?php echo $base_url; ?>/js/excel-export.js"></script>


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
		background-color: #f5f5f5;
	}
</style>

<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

<style>
body{
font-family: 'Prompt', sans-serif;
background-color: #337ab7;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	    padding: 3px;
}
.panel{
	border-radius: 15px;
}
</style>
