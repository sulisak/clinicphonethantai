<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="<?php echo $base_url; ?>/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
<script src="<?php echo $base_url; ?>/js/jquery.min.js"></script>
<script src="<?php echo $base_url; ?>/bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="<?php echo $base_url; ?>/js/angular.min.js" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>/js/datetimepicker/jquery.datetimepicker.css"/ >
<script src="<?php echo $base_url; ?>/js/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>

<link rel="stylesheet" href="<?php echo $base_url; ?>/css/morris.css">
<script src="<?php echo $base_url; ?>/js/raphael-min.js"></script>
<script src="<?php echo $base_url; ?>/js/morris.min.js"></script>

<link rel="stylesheet" href="<?php echo $base_url; ?>/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>/css/toastr.css">

<script src="<?php echo $base_url; ?>/js/toastr.js"></script>
<script src="<?php echo $base_url; ?>/js/html2canvas.js"></script>
<link rel="stylesheet" href="<?php echo $base_url; ?>/css/css.css">

<meta  name='viewport' content='user-scalable=0' />


	<title><?php echo $_SESSION['owner_name']; ?></title>
</head>

<body>





<nav class="navbar navbar-default" role="navigation" style="color:#fff;background-image: linear-gradient(to bottom,#f0ad4e 0,#f0ad4e 100%);">

	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo $base_url; ?>/" style="color: #fff;">
<b><?php echo $_SESSION['owner_name']; ?> </b>
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">

			<li>
					<a href="<?php echo $base_url; ?>" style="color: #fff;"> <b><?=$lang_index?></b></a>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right">



				<li>
					<a style="color: #fff;"><?php echo $_SESSION['name']; ?> </a>
					</li>


						<li> <a href="<?php echo $base_url; ?>/logout" style="color: #fff;"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> <?=$lang_logout?></a></li>



			</ul>
		</div><!-- /.navbar-collapse -->
	</div>




</nav>
