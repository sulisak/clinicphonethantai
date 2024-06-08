
<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #f0ad4e;
}
a{
	color: #000000;
}
</style>
<div class="col-md-2 col-sm-3">


	 <div class="panel panel-default">
		<div class="panel-body">


<ul class="nav nav-pills">


	<li style="width: 100%;" <?php if($tab === 'employee_list'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/employee/employee_list"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
	<?php echo $lang_loep_1;?> </a></li>


	<li style="width: 100%;" <?php if($tab === 'employee_position'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/employee/employee_position"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
	<?php echo $lang_loep_2;?></a></li>


</ul>


</div>
	</div>


	
	
	 <div class="panel panel-default">
		<div class="panel-body">


<ul class="nav nav-pills">

<li style="width: 100%;" <?php if($tab === 'employee_leave'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/employee/employee_leave"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
	<?php echo $lang_loep_3;?></a></li>
	
<li style="width: 100%;" <?php if($tab === 'employee_salary'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/employee/employee_salary"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>
	<?php echo $lang_loep_4;?></a></li>
	


</ul>


</div>
	</div>















	</div>
