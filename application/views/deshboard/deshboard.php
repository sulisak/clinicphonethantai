<?php

date_default_timezone_set('Asia/Bangkok');
$date_expire='2025-05-20';
$datenow=date("Y-m-d ",time()); 



if  ($date_expire >= $datenow){

 echo '<span style="font-weight: bold; color: white;font-size: 20px;">Program Active</span>';


}


else {

    header("Location: expirenotice.php"); 

}


?>

	<?php
if($_SESSION['user_type']>'199'){
	echo '<script>
window.location = "'.$base_url.'/deshboardc2m";
	</script>';
	}?>
	
	
	
	<?php
if($_SESSION['user_type']=='1'){
	echo '<script>
window.location = "'.$base_url.'/sale/salepic";
	</script>';
	}?>


<?php
if($_SESSION['user_type']=='2'){
		echo '<script>
window.location = "'.$base_url.'/warehouse/productlist";
	</script>';
	}
	?>

	<?php
	if($_SESSION['user_type']=='8'){
			echo '<script>
	window.location = "'.$base_url.'/warehouse/productlist_foranyone";
		</script>';
		}
		?>


		<?php
			if($_SESSION['user_type']=='9'){
					echo '<script>
			window.location = "'.$base_url.'/vendor/productlist";
				</script>';
				}
				?>


				<?php
				if($_SESSION['user_type']=='10'){
						echo '<script>
				window.location = "'.$base_url.'/warehouse/check_productlist_foranyone";
					</script>';
					}
					?>




<style type="text/css">
	body{
		background-color: #ffffff;
	}
	.btn{
    margin-bottom: 10px;
}
</style>
<font style="font-family:Phetsarath OT">
<div class="container text-center" ng-app="firstapp" ng-controller="Index"style="width:90%">

<div class="col-md-12">




<div class="col-md-4">

<div class="col-md-12">
<a href="<?php echo $base_url;?>/sale/salelist" title="<?=$lang_clickthissalesummary?>">
<div class="panel" style="height: 180px;background-color: rgba(0,0,0,.5);color: #ffffff;">
<br />
<b><?php echo $lang_db_1;?></b>
<br />
<img ng-if="!saletoday" src="<?php echo $base_url;?>/pic/loading.gif">
<span ng-if="saletoday" ng-repeat="x in saletoday" style="font-size:30px;font-weight:bold;">
<b>{{x.allbill | number}}</b> <?php echo $lang_db_2;?>
<br />
	<?php echo $lang_qty;?>
	<b>{{x.sumnum | number}}</b>
	<br />
	<?php echo $lang_income;?>
	<b>{{x.sumprice-x.sumdiscount | number:2}}</b>
</span>



</div>
</a>
</div>


<div class="col-md-12">
<a style="text-decoration:none" href="<?php echo $base_url;?>/sale/salereport" title="<?=$lang_clickthissaleitem?>">
<div class="panel" style="text-align: left;height: 190px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<center><b><?php echo $lang_db_3;?></b>
<img ng-if="!productsaletoday" src="<?php echo $base_url;?>/pic/loading.gif">
<table ng-if="productsaletoday" width="90%" style="font-size:12px;color:white;">
<tr ng-repeat="x in productsaletoday">
	<td>
	{{$index+1}}.	{{x.product_name}}
	</td>
<td align="right">
	{{x.product_numall | number}}
	</td>
</tr>

 </table>

</center>

</div>
</a>
</div>





<div class="col-md-6">
<a style="text-decoration:none" href="<?php echo $base_url;?>/sale/product_value" title="<?=$lang_clickthisstockall?>">
<div class="panel"  style="text-align: left;height: 400px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<center><b><?=$lang_productwillout?></b>
<img ng-if="!productoutofstock" src="<?php echo $base_url;?>/pic/loading.gif">
<table ng-if="productoutofstock" width="90%" style="font-size:12px;color:white;">
<tr ng-repeat="x in productoutofstock">
<td >{{$index+1}}. {{x.product_name | limitTo:25}}</td>
<td align="right">{{x.product_stock_num | number}}</td>
</tr>

 </table>

 </center>

</div>
</a>
</div>




<div class="col-md-6">
<a style="text-decoration:none;" href="<?php echo $base_url;?>/warehouse/dateend" title="<?=$lang_clickthisalllist?>">
<div class="panel"  style="text-align: left;height: 400px;background-color: rgba(0,0,0,.5);color: #fff;">

<br />
<center><b><?php echo $lang_db_4;?></b>
<img ng-if="!productdateend" src="<?php echo $base_url;?>/pic/loading.gif">
<table ng-if="productdateend" width="90%" style="font-size:12px;">
<tr ng-repeat="x in productdateend">
	<td >
	{{x.product_name | limitTo:25}}
	</td>
	<td ng-if="x.date_end2 > '<?php echo time();?>' && x.date_end!=''" align="right">
<?php echo $lang_db_5;?> {{x.date_end}}
	</td>
	<td ng-if="x.date_end2 < '<?php echo time();?>'  && x.date_end!=''" align="right"  style="color:red;">
<?php echo $lang_db_5;?> {{x.date_end}}
	</td>
</tr>

 </table>

 </center>

</div>
</a>
</div> 


<!-- ===================== -->



<!-- ======================== -->


<!--
 <div class="col-md-12">
<a style="text-decoration:none" href="<?php echo $base_url;?>/pawn/pawnenddate" title="คลิกเพื่อดู สินค้ารับฝากเลยกำหนด ทั้งหมด">
<div class="panel"  style="text-align: left;height: 280px;background-color: rgba(0,0,0,.5);color: #fff;">
<br />
<center><b>สินค้ารับฝากเลยกำหนด</b>
<img ng-if="!productpawnenddate" src="<?php echo $base_url;?>/pic/loading.gif">
<table ng-if="productpawnenddate" width="90%">
<tr ng-repeat="x in productpawnenddate">
	<td>
		{{$index+1}}. {{x.product_name}}
	</td>
	<td align="right">
		{{x.end_date_date}}
	</td>
</tr>

 </table>

 </center>


</div>
</a>
</div>
-->



</div>








<div class="col-md-8">


<a href="<?php echo $base_url;?>/sale/salepic" class="btn btn-success"  style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-blackboard" aria-hidden="true" style="font-size: 80px;"></span><br />
<?=$lang_salepic?>
</a>




<a href="<?php echo $base_url;?>/mycustomer" class="btn btn-primary" style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_6;?>
</a>




	 <a href="<?php echo $base_url;?>/sale/salebill" class="btn btn-default"  style="font-size: 25px;font-weight: bold;width: 250px;height:170px;">
<span class="glyphicon glyphicon-align-justify" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_7;?>
</a>




<a href="<?php echo $base_url;?>/warehouse/productlist" class="btn btn-primary"  style="font-size: 25px;font-weight: bold;width: 250px;height:170px;">
<span class="glyphicon glyphicon-home" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_8;?>
</a>




<a href="<?php echo $base_url;?>/warehouse/product_pricebase" class="btn btn-primary"  style="font-size: 25px;font-weight: bold;width: 250px;height:170px;">
<span class="glyphicon glyphicon-home" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_9;?>
</a>









<a class="btn btn-primary btn-lg" href="<?php echo $base_url;?>/warehouse/barcode_ds_full" style="font-size: 26px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-barcode" aria-hidden="true" style="font-size: 80px;"></span><br /> 
	<?php echo $lang_db_10;?>
</a>




<a href="<?php echo $base_url;?>/purchase/buy" class="btn btn-default" style="font-size: 25px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="font-size: 80px;"></span><br /> 
<?php echo $lang_db_10_2;?> 
</a>








<a href="<?php echo $base_url;?>/sale/salelist" class="btn btn-info"  style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_11;?>
</a>




<!-- <a href="<?php echo $base_url;?>/produce/produce_list" class="btn btn-warning"  style="font-size: 25px;font-weight: bold;width: 250px;height:170px;">
<span class="glyphicon glyphicon-home" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_12;?>
</a> -->






<!-- <a href="<?php echo $base_url;?>/employee/employee_list" class="btn btn-primary"  style="font-size: 18px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_13;?>
</a> -->




<a href="<?php echo $base_url;?>/salesetting/pay_type" class="btn btn-danger"  style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 80px;"></span><br />
<?=$lang_salesetting?>
</a>






<a href="<?php echo $base_url;?>/storemanager/user_owner" class="btn btn-default"  style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_14;?>
</a>




<a href="<?php echo $base_url;?>/storemanager/brand" class="btn btn-warning"  style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 80px;"></span><br />
ຈັດການຮ້ານ
</a>








<a href="<?php echo $base_url;?>/printer/printercategory" class="btn btn-default"  style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-print" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_16;?>
</a>




<a class="btn btn-default btn-lg" href="<?php echo $base_url;?>/home/showcus2mer" style="font-size: 30px;font-weight: bold; width: 500px;height:170px;" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;">
<span class="glyphicon glyphicon-blackboard" aria-hidden="true" style="font-size: 80px;"></span><br />
	<?php echo $lang_db_17;?>
</a>





<!-- <a href="<?php echo $base_url;?>/backup_all" class="btn btn-info"  style="font-size: 25px;font-weight: bold; width: 500px;height:170px;">
<span class="glyphicon glyphicon-save" aria-hidden="true" style="font-size: 80px;"></span><br />
Backup Database
</a> -->








</div>


<div class="col-md-12">
<center>





<br /><br />

<a href="#" class="btn btn-danger" ng-click="Delsaleall()"  style="font-size: 16px;font-weight: bold; width: 200px;">
	<span class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size: 30px;"></span><br />
	<?php echo $lang_db_18;?>
	</a>
	
	

<!-- <a href="#" class="btn btn-danger" ng-click="Delall_product()"  style="font-size: 16px;font-weight: bold; width: 200px;">
	<span class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size: 30px;"></span><br />
	<?php echo $lang_db_19;?>
</a> -->


</center>
</div>













<!-- <div class="modal fade" id="C2m_bd_noti_modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h1 class="modal-title" style="color:green;"><b><?php echo $lang_db_20;?></b></h1>
				<a href="<?php echo $base_url;?>/mycustomer/Remove_bd_noti_modal" class="btn btn-default">
			<?php echo $lang_db_21;?></a>
			
			</div>
			<div class="modal-body" style="font-size:20px;">
			
			
			<table class="table table-hover table-bordered">
			<tr ng-repeat="x in c2m_db_noti_list">
			<td ng-if="x.bdday=='0'" style="color:#fff;background-color:#5cb85c;">
		<?php echo $lang_db_22;?>
			</td>
			<td ng-if="x.bdday=='0'" style="color:#fff;background-color:#5cb85c;">{{x.cus_birthday}}</td>
			<td ng-if="x.bdday=='0'" style="color:#fff;background-color:#5cb85c;">
				{{x.cus_name}} {{x.cus_address}} <br /> {{x.cus_tel}} {{x.cus_remark}}		
				</td>
			
			
			
			<td ng-if="x.bdday=='1'" style="color:#fff;background-color:#5bc0de;">
		<?php echo $lang_db_23;?>
			</td>
			<td ng-if="x.bdday=='1'" style="color:#fff;background-color:#5bc0de;">{{x.cus_birthday}}</td>
			<td ng-if="x.bdday=='1'" style="color:#fff;background-color:#5bc0de;">
				{{x.cus_name}} {{x.cus_address}} <br /> {{x.cus_tel}} {{x.cus_remark}}
				</td>
			
			
			
			<td ng-if="x.bdday>'1'">
			<?php echo $lang_db_24;?> {{x.bdday}} <?php echo $lang_db_25;?>
			</td>
			<td ng-if="x.bdday>'1'">{{x.cus_birthday}}</td>
			<td ng-if="x.bdday>'1'">
				{{x.cus_name}} {{x.cus_address}} <br /> {{x.cus_tel}} {{x.cus_remark}}
				</td>
			
			
			
			
			
			
			</tr>
			</table>
			
			
			</div>
			<div class="modal-footer">
				
						<center>
			<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" aria-hidden="true">Close</button>
</center>

			</div>
		</div>
	</div>
</div>
 -->











<<!-- div class="modal fade" id="Product_num_min_noti_modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">


<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h1 class="modal-title" style="color:red;"><b><?php echo $lang_db_26;?></b></h1>
				<a href="<?php echo $base_url;?>/warehouse/stock/Remove_num_min_noti_modal" class="btn btn-default">
			<?php echo $lang_db_27;?></a>
			</div>
			
			
			<div class="modal-body">

	
	
<table id="headerTable" class="table table-hover table-bordered">
	<thead style="font-size:14px;">
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>
			<th style="text-align: center;"><?=$lang_category?></th>
<th style="text-align: center;">Zone</th>

			<th style="text-align: center;"><?=$lang_total?></th>
			<th style="text-align: center;"><?=$lang_unit?></th>
			<th style="text-align: center;"><?php echo $lang_db_28;?></th>
			<th style="text-align: center;"><?php echo $lang_db_29;?></th>

		</tr>
	</thead>
	<tbody>


		<tr ng-repeat="x in product_num_min_noti_list">
			<td class="text-center">{{($index+1)}}</td>
			
			<td align="center">
				{{x.product_code}}</td>
				
			<td>{{x.product_name}}</td>

<td>{{x.product_category_name}}</td>
	<td>{{x.zone_name}}</td>
	
		<td align="right">{{x.product_stock_num | number}}</td>
			
			
			<td align="right">{{x.product_unit_name}}</td>
			
			
			
		
		<td align="right">
		<span ng-if="x.product_num_min=='0'"><?php echo $_SESSION['stock_noti'];?></span>
		<span ng-if="x.product_num_min>'0'">
		{{x.product_num_min}}</span>
		
		
		</td>

		
		
		
		<td align="right">
		<span ng-if="x.product_num_min=='0'">{{x.numdiff2}}</span>
		<span ng-if="x.product_num_min>'0'">{{x.numdiff}}</span>
		
		</td>

		</tr>
		
	
		
		
	

	</tbody>
</table>
<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>



			</div>
			<div class="modal-footer">

				<center>
			<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" aria-hidden="true">close</button>
</center>

			</div>
		</div>
	</div>
</div>
 -->






<!--
<div class="modal fade" id="Product_orderprint_modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">


<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h1 class="modal-title" style="color:blue;"><b><?php echo $lang_db_30;?></b></h1>
				<a href="<?php echo $base_url;?>/purchase/buy/Remove_orderprint_modal" class="btn btn-default">
			<?php echo $lang_db_31;?></a>
			</div>
			
			
			<div class="modal-body">

	<center>
		
		<button class="btn btn-lg btn-success" onClick="Openprintdiv1()">
		<?php echo $lang_db_32;?></button>
		
		<select ng-model="settingpaper" ng-init="settingpaper='1'" class="form-control" style="width:150px;">
			<option value="1"><?php echo $lang_db_33;?></option>
			<option value="2"><?php echo $lang_db_34;?></option>
			
			</select>
		</center>
	
	<div id="openprint1">
	
	<center><h3><b><?php echo $lang_db_35;?></b></h3></center>
<table class="table table-hover table-bordered">
	<thead  ng-if="settingpaper=='1'" style="font-size:14px;">
		<tr class="trheader">
		<th style="width: 50px;">Check</th>
		<th style="width: 50px;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>
			<th style="text-align: center;"><?php echo $lang_db_36;?></th>

			<th style="text-align: center;"><?php echo $lang_db_37;?></th>
			<th style="text-align: center;"><?=$lang_category?></th>
<th style="text-align: center;">Zone</th>




			<th style="text-align: center;"><?=$lang_total?></th>
			<th style="text-align: center;"><?=$lang_unit?></th>
			<th style="text-align: center;"><?php echo $lang_db_38;?></th>
			<th style="text-align: center;"><?php echo $lang_db_39;?></th>

		</tr>
	</thead>
	<tbody>


		<tr ng-repeat="x in product_orderprint_list">
		
		<td align="center">
		<input type="checkbox" disabled>
		</td>
		
			<td ng-if="settingpaper=='1'" class="text-center">{{($index+1)}}</td>
			
			<td ng-if="settingpaper=='1'" align="center">
				{{x.product_code}}</td>
				
			<td>{{x.product_name}}</td>

<td align="right">{{x.num_buy | number}}</td>

<td ng-if="settingpaper=='1'">{{x.product_pricebase}}</td>

<td ng-if="settingpaper=='1'">{{x.product_category_name}}</td>
	<td ng-if="settingpaper=='1'">{{x.zone_name}}</td>
	
	
	
			
			
			
		<td align="right" ng-if="settingpaper=='1'">{{x.product_stock_num | number}}</td>
			
			
			<td align="right" ng-if="settingpaper=='1'">{{x.product_unit_name}}</td>
			
			
			
		<td ng-if="settingpaper=='1'" align="right">
		
		{{x.stock_min}}
		
		
		</td>

		

		<td ng-if="settingpaper=='1'" align="right">{{x.numdiff}}
		
		</td>

		</tr>
		
	
		
		
	

	</tbody>
</table>

<center><b><?php echo $lang_db_40;?> <?php echo date('d-m-Y H:i:s');?></b></center>
</div>


			</div>
			<div class="modal-footer">

				<center>
			<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" aria-hidden="true">close</button>
</center>

			</div>
		</div>
	</div>
</div> -->





<div class="modal fade" id="Delsaleall">
	<div class="modal-dialog modal-xs">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" >&times;</button>
				<h4 class="modal-title"><?php echo $lang_db_41;?></h4>
			</div>
			<div class="modal-body">
			<center>


			<h3><b><?php echo $lang_db_42;?></b></h3>
<font style="color:red;"><?php echo $lang_db_43;?></font>
<br />
<form class="form-inline">
<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
</form>
<br />
<a ng-if="dayfrom!='' && dayto!=''" ng-click="Delsalesomecheck()" class="btn btn-warning"  style="font-size: 16px;font-weight: bold; width: 200px;border-radius: 20px;">
<?php echo $lang_db_44;?>	
	</a>
	
	
	<span ng-if="delsalesomenum =='0'">
	<br />
<?php echo $lang_db_45;?>	 {{delsalesomenum}}
<?php echo $lang_db_46;?>   
<?php echo $lang_db_47;?>
	</span>
	
	
	<span ng-if="delsalesomenum =='ok'" style="color:green;">
	<br />
	<?php echo $lang_db_48;?>
	</span>
	
	
	




	<span ng-if="delsalesomenum >'0' && delsalesomenum !='ok'" style="color:red;">
	<br />
	<?php echo $lang_db_49;?> {{delsalesomenum}} <?php echo $lang_db_46;?>
	<br />
<a  ng-click="Delsalesomeok()" ng-disabled="delsalesomeclick" class="btn btn-success"  style="font-size: 16px;font-weight: bold; width: 200px;border-radius: 20px;">
	<?php echo $lang_db_50;?>
	</a>
	<br />
	<img ng-if="delsalesomeclick" src="<?php echo $base_url;?>/pic/loading.gif">

	</span>
	
	
	


	
	
	
			
			<hr />
			<h3><b><?php echo $lang_db_51;?></b></h3>
<font style="color:red;"><?php echo $lang_db_52;?></font>
<br />
<a href="<?php echo $base_url;?>/c2mhelper/delsaleall" class="btn btn-success"  style="font-size: 16px;font-weight: bold; width: 200px;border-radius: 20px;">
<?php echo $lang_db_50;?>	
	</a>

</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Delall_product">
	<div class="modal-dialog modal-xs">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_db_53;?></h4>
			</div>
			<div class="modal-body">
			
			
									<center>
						<h3><b><?php echo $lang_db_54;?></b></h3>
<font style="color:red;"><?php echo $lang_db_55;?></font>
<br />
<a href="<?php echo $base_url;?>/c2mhelper/delstockall" class="btn btn-success"  style="font-size: 16px;font-weight: bold; width: 200px;border-radius: 20px;">
<?php echo $lang_db_50;?>	
	</a>

</center>

<hr />




			<center>
			<h3><b><?php echo $lang_db_56;?></b></h3>
<font style="color:red;"><?php echo $lang_db_57;?></font>
<br />
<a href="<?php echo $base_url;?>/c2mhelper/delall_product" class="btn btn-success"  style="font-size: 16px;font-weight: bold; width: 200px;border-radius: 20px;">
<?php echo $lang_db_50;?>	
	</a>

</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>











</div>
</div>




</font>




<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {




$("#dayfrom").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$("#dayto").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$scope.dayfrom = '';
$scope.dayto = '';






$scope.delsalesomenum = '';
$scope.Delsalesomecheck = function(){
   $http.post("<?php echo $base_url;?>/c2mhelper/Delsalesomecheck",{
dayfrom: $scope.dayfrom,
dayto: $scope.dayto
}).success(function(data){
$scope.delsalesomenum = data;
        });

   };
   
   
   

$scope.Delsalesomeok = function(){
	$scope.delsalesomeclick = true;
   $http.post("<?php echo $base_url;?>/c2mhelper/Delsalesomeok",{
dayfrom: $scope.dayfrom,
dayto: $scope.dayto
}).success(function(data){
$scope.delsalesomenum = data;
$scope.delsalesomeclick = false;
        });

   };
   
   



$scope.Saletoday = function(){

$http.get('Home/Saletoday')
		 .then(function(response){
				$scope.saletoday = response.data;

			});
 };
$scope.Saletoday();




$scope.Productsaletoday = function(){

$http.get('Home/Productsaletoday')
		 .then(function(response){
				$scope.productsaletoday = response.data;

			});
 };
$scope.Productsaletoday();


$scope.Productoutofstock = function(){

$http.get('Home/Productoutofstock')
		 .then(function(response){
				$scope.productoutofstock = response.data;

			});
 };
$scope.Productoutofstock();


$scope.Productdateend = function(){

$http.get('Home/Productdateend')
		 .then(function(response){
				$scope.productdateend = response.data;

			});
 };
$scope.Productdateend();


$scope.Productpawnenddate = function(){

$http.get('Home/Productpawnenddate')
		 .then(function(response){
				$scope.productpawnenddate = response.data;

			});
 };
$scope.Productpawnenddate();



$scope.Product_orderprint = function(){

   $http.post("<?php echo $base_url;?>/purchase/buy/Product_orderprint",{
}).success(function(data){
	
	$scope.product_orderprint_list = data;
	if($scope.product_orderprint_list.length > 0){
		$('#Product_orderprint_modal').modal('show');
	}
	
        });

};

$scope.Product_orderprint();




// $scope.Product_num_min_noti = function(){

//    $http.post("<?php echo $base_url;?>/warehouse/stock/Product_num_min_noti",{
// }).success(function(data){
	
// 	$scope.product_num_min_noti_list = data;
// 	if($scope.product_num_min_noti_list.length > 0){
// 		$('#Product_num_min_noti_modal').modal('show');
// 	}
	
//         });

// };

// $scope.Product_num_min_noti();



// $scope.C2m_bd_noti = function(){

// $http.get('<?php echo $base_url;?>/mycustomer/C2m_bd_noti')
// 		 .then(function(response){
// 				$scope.c2m_db_noti_list = response.data;
// if($scope.c2m_db_noti_list.length > 0){
// 	$('#C2m_bd_noti_modal').modal('show');
// }


// 			});
//  };
// $scope.C2m_bd_noti();





$scope.Delsaleall = function(){

$('#Delsaleall').modal('show');
 };



$scope.Delall_product = function(){

$('#Delall_product').modal('show');
 };




});
	</script>
