<!DOCTYPE html>
<html>
<head>

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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-89792612-1', 'auto');
  ga('send', 'pageview');

</script>





<style type="text/css">
	body{
		font-family: Tahoma;
		background-color: #f5f5f5;
		font-color: #000;
		font-size: 14px;
	}
	.setting-tab{
		font-size: 12px;
	}
	.navbar-default{
		background-color: #000;
		border-radius: 0px;
		border-color: #f5f5f5;
	}
</style>


	<title><?php echo $title; ?></title>
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
			<a class="navbar-brand" href="<?php echo $base_url; ?>/" style="color: #000;"><b>C2M</b></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li>
					<a href="<?php echo $base_url; ?>" style="color: #000;"> <b><?=$lang_index?></b></a>
				</li>
			
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				


				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #000;"><?php echo $_SESSION['name'].'('.$_SESSION['owner_name'].')'; ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">

						<li> <a href="<?php echo $base_url; ?>/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> <?=$lang_logout?></a></li>
						
					</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>






</nav>



