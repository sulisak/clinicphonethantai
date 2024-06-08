
<?php 

foreach ($Getpermission_rule as $value) {
 $arr =  json_decode($value['permission_rule']);
}

if(!isset($arr)){
	echo '<br /><br /><br /><center><h1><b>Can Not USE !!!</b>
	<br />
	<a href="'.$base_url.'/logout">Logout</a>
	</h1></center>';
	exit();
}
?>


<style type="text/css">
	body{
		background-color: #eee;
	}
	.btn{
    margin-bottom: 10px;
}
</style>
<div class="container text-center" ng-app="firstapp" ng-controller="Index">

<div class="col-md-12">


<?php if($arr[0]->status==true){?>
<a href="<?php echo $base_url;?>/sale/salepic" class="btn btn-success"  style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-blackboard" aria-hidden="true" style="font-size: 80px;"></span><br />
<?=$lang_salepic?>
</a>
<?php } ?>


<?php if($arr[6]->status==true){?>
<a href="<?php echo $base_url;?>/mycustomer" class="btn btn-primary" style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_6;?>
</a>
<?php } ?>


<?php if($arr[2]->status==true){?>
	 <a href="<?php echo $base_url;?>/sale/salebill" class="btn btn-default"  style="font-size: 25px;font-weight: bold;width: 250px;height:170px;">
<span class="glyphicon glyphicon-align-justify" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_7;?>
</a>
<?php } ?>


<?php if($arr[1]->status==true){?>
<a href="<?php echo $base_url;?>/warehouse/productlist" class="btn btn-primary"  style="font-size: 25px;font-weight: bold;width: 250px;height:170px;">
<span class="glyphicon glyphicon-home" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_8;?>
</a>
<?php } ?>


<?php if($arr[17]->status==true){?>
<a href="<?php echo $base_url;?>/warehouse/product_pricebase" class="btn btn-primary"  style="font-size: 25px;font-weight: bold;width: 250px;height:170px;">
<span class="glyphicon glyphicon-home" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_9;?>
</a>
<?php } ?>







<?php if($arr[4]->status==true){?>
<a class="btn btn-primary btn-lg" href="<?php echo $base_url;?>/warehouse/barcode_ds_full" style="font-size: 26px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-barcode" aria-hidden="true" style="font-size: 80px;"></span><br />
	<?php echo $lang_db_10;?> 
</a>
<?php } ?>


<?php if($arr[5]->status==true){?>
<a href="<?php echo $base_url;?>/purchase/buy" class="btn btn-default" style="font-size: 25px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_10_2;?> 
</a>
<?php } ?>






<?php if($arr[7]->status==true){?>
<a href="<?php echo $base_url;?>/sale/salelist" class="btn btn-info"  style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_11;?> 
</a>
<?php } ?>


<?php if($arr[3]->status==true){?>
<a href="<?php echo $base_url;?>/produce/produce_list" class="btn btn-warning"  style="font-size: 25px;font-weight: bold;width: 250px;height:170px;">
<span class="glyphicon glyphicon-home" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_12;?> 
</a>
<?php } ?>




<?php if($arr[8]->status==true){?>
<a href="<?php echo $base_url;?>/employee/employee_list" class="btn btn-primary"  style="font-size: 18px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_13;?> 
</a>
<?php } ?>


<?php if($arr[9]->status==true){?>
<a href="<?php echo $base_url;?>/salesetting/pay_type" class="btn btn-danger"  style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 80px;"></span><br />
<?=$lang_salesetting?>
</a>
<?php } ?>




<?php if($arr[10]->status==true){?>
<a href="<?php echo $base_url;?>/storemanager/user_owner" class="btn btn-default"  style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_14;?> 
</a>
<?php } ?>




<?php if($arr[11]->status==true){?>
<a href="<?php echo $base_url;?>/storemanager/brand" class="btn btn-default"  style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_15;?> 
</a>
<?php } ?>






<?php if($arr[12]->status==true){?>
<a href="<?php echo $base_url;?>/printer/printercategory" class="btn btn-default"  style="font-size: 30px;font-weight: bold; width: 250px;height:170px;">
<span class="glyphicon glyphicon-print" aria-hidden="true" style="font-size: 80px;"></span><br />
<?php echo $lang_db_16;?> 
</a>
<?php } ?>


<?php if($arr[13]->status==true){?>
<a class="btn btn-default btn-lg" href="<?php echo $base_url;?>/home/showcus2mer" style="font-size: 30px;font-weight: bold; width: 250px;height:170px;" onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;">
<span class="glyphicon glyphicon-blackboard" aria-hidden="true" style="font-size: 80px;"></span><br />
	<?php echo $lang_db_17;?> 
</a>
<?php } ?>





</div>


<div class="col-md-12">
<center>


<?php if($arr[14]->status==true){?>
<br /><br />
	<a href="<?php echo $base_url;?>/backup_all" class="btn btn-info"  style="font-size: 16px;font-weight: bold; width: 200px;">
	<span class="glyphicon glyphicon-save" aria-hidden="true" style="font-size: 30px;"></span><br />
	Backup Database
	</a>
<?php } ?>



<?php if($arr[15]->status==true){?>
<br /><br />
<a href="#" class="btn btn-danger" ng-click="Delsaleall()"  style="font-size: 16px;font-weight: bold; width: 200px;">
	<span class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size: 30px;"></span><br />
	<?php echo $lang_db_18;?> 
	</a>
<?php } ?>


	
<?php if($arr[16]->status==true){?>
	<br /><br />
<a href="#" class="btn btn-danger" ng-click="Delall_product()"  style="font-size: 16px;font-weight: bold; width: 200px;">
	<span class="glyphicon glyphicon-remove" aria-hidden="true" style="font-size: 30px;"></span><br />
	<?php echo $lang_db_19;?> 
</a>

<?php } ?>

</center>
</div>




<div class="modal fade" id="Delsaleall">
	<div class="modal-dialog modal-xs">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_db_41;?> </h4>
			</div>
			<div class="modal-body">
			<center>
			<h3><b><?php echo $lang_db_41;?> </b></h3>
<font style="color:red;"><?php echo $lang_db_52;?>  </font>
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































<div class="modal fade" id="Product_orderprint_modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">


<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h1 class="modal-title" style="color:blue;"><b><?php echo $lang_db_30;?> </b></h1>
				<a href="<?php echo $base_url;?>/purchase/buy/Remove_orderprint_modal" class="btn btn-default">
			<?php echo $lang_db_31;?> </a>
			</div>
			
			
			<div class="modal-body">

	<center>
		
		<button class="btn btn-lg btn-success" onClick="Openprintdiv1()"><?php echo $lang_db_32;?> </button>
		
		<select ng-model="settingpaper" ng-init="settingpaper='1'" class="form-control" style="width:150px;">
			<option value="1"><?php echo $lang_db_33;?> </option>
			<option value="2"><?php echo $lang_db_34;?> </option>
			
			</select>
		</center>
	
	<div id="openprint1">
	
	<center><h3><b><?php echo $lang_db_35;?> </b></h3></center>
<table class="table table-hover table-bordered">
	<thead  ng-if="settingpaper=='1'" style="font-size:14px;">
		<tr class="trheader">
		<th style="width: 50px;">Check</th>
		<th style="width: 50px;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>
			<th style="text-align: center;"><?php echo $lang_db_36;?> </th>

			<th style="text-align: center;"><?php echo $lang_db_37;?> </th>
			<th style="text-align: center;"><?=$lang_category?></th>
<th style="text-align: center;">Zone</th>




			<th style="text-align: center;"><?=$lang_total?></th>
			<th style="text-align: center;"><?=$lang_unit?></th>
			<th style="text-align: center;"><?php echo $lang_db_38;?> </th>
			<th style="text-align: center;"><?php echo $lang_db_39;?> </th>

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

<center><b><?php echo $lang_db_40;?>  <?php echo date('d-m-Y H:i:s');?></b></center>
</div>


			</div>
			<div class="modal-footer">

				<center>
			<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" aria-hidden="true">close</button>
</center>

			</div>
		</div>
	</div>
</div>








<div class="modal fade" id="Delall_product">
	<div class="modal-dialog modal-xs">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_db_53;?> </h4>
			</div>
			<div class="modal-body">
			
			
									<center>
						<h3><b><?php echo $lang_db_54;?> </b></h3>
<font style="color:red;"><?php echo $lang_db_55;?>  </font>
<br />
<a href="<?php echo $base_url;?>/c2mhelper/delstockall" class="btn btn-success"  style="font-size: 16px;font-weight: bold; width: 200px;border-radius: 20px;">
	<?php echo $lang_db_50;?> 
	</a>

</center>

<hr />




			<center>
			<h3><b><?php echo $lang_db_56;?> </b></h3>
<font style="color:red;"><?php echo $lang_db_57;?>  </font>
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









<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$scope.Delsaleall = function(){

$('#Delsaleall').modal('show');
 };



$scope.Delall_product = function(){

$('#Delall_product').modal('show');
 };



// $scope.C2m_bd_noti = function(){

// $http.get('<?php echo $base_url;?>/mycustomer/C2m_bd_noti')
// 		 .then(function(response){
// 				$scope.c2m_db_noti_list = response.data;
// if($scope.c2m_db_noti_list.length > 0){
// 	$('#C2m_bd_noti_modal').modal('show');
// }


// 			});
//  };
 





// $scope.Product_num_min_noti = function(){

//    $http.post("<?php echo $base_url;?>/warehouse/stock/Product_num_min_noti",{
// }).success(function(data){
	
// 	$scope.product_num_min_noti_list = data;
// 	if($scope.product_num_min_noti_list.length > 0){
// 		$('#Product_num_min_noti_modal').modal('show');
// 		}
	
//         });

// };



$scope.Product_orderprint = function(){

   $http.post("<?php echo $base_url;?>/purchase/buy/Product_orderprint",{
}).success(function(data){
	
	$scope.product_orderprint_list = data;
	if($scope.product_orderprint_list.length > 0){
		$('#Product_orderprint_modal').modal('show');
	}
	
        });

};






<?php if($arr[28]->status==true){?>
$scope.C2m_bd_noti();
<?php } ?>

<?php if($arr[30]->status==true){?>
$scope.Product_num_min_noti();
<?php } ?>


<?php if($arr[31]->status==true){?>
$scope.Product_orderprint();
<?php } ?>


});
	</script>
