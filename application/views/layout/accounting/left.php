
<style type="text/css">
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #000;
}
a{
	color: #000000;
}
</style>
<div class="col-md-2 col-sm-3">


	<div class="panel panel-default">
		<div class="panel-body">

		<ul class="nav nav-pills">



<li style="width: 100%;" <?php if($tab == 'addnew'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/accounting/addnew">
<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
ใบกำกับภาษี </a></li>



</ul>


		</div>
	</div>


	 <div class="panel panel-default">
		<div class="panel-body">

รายงาน
<ul class="nav nav-pills">

			<li style="width: 100%;" <?php if($tab === 'accounting_perday'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/accounting/accounting_perday"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
		ภาษีรายวัน </a></li>

		<li style="width: 100%;" <?php if($tab === 'accounting_permonth'){ echo 'class="active"';} ?> ><a href="<?php echo $base_url; ?>/accounting/accounting_permonth"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>
	ภาษีรายเดือน </a></li>



</ul>


</div>
	</div>


	</div>
