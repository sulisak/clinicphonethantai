
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default col-md-6">
	<div class="panel-body">
<h4><b><?php echo $lang_ssse_1;?></b></h4>
<br />
<?php echo $lang_ssse_2;?>
<input type="text" ng-model="discountfrombuylist.money_if" placeholder="0" class="form-control" style="width:100px;">
<br/ >
<?php echo $lang_ssse_3;?> 
(<font color="orange"><?php echo $lang_ssse_0;?></font>)
<input type="text" ng-model="discountfrombuylist.money_will_discount" placeholder="0" class="form-control" style="width:100px;">
<br />
<button class="btn btn-success" ng-click="Saveall()"><?php echo $lang_save;?></button>

</div>
</div>




<div class="panel panel-default col-md-6">
	<div class="panel-body">
	
<h4><b><?php echo $lang_ssse_4;?></b></h4>
<br />
<?php echo $lang_ssse_2;?>
<input type="text" ng-model="moneytopointlist.cus_money_if" placeholder="0" class="form-control" style="width:100px;">
<br/ >
<?php echo $lang_ssse_5;?> (<font color="orange"><?php echo $lang_ssse_0;?></font>)
<input type="text" ng-model="moneytopointlist.point_will" placeholder="0" class="form-control" style="width:100px;">
<br />
<button class="btn btn-success" ng-click="Saveall()"><?php echo $lang_save;?></button>

</div>
</div>


<div class="panel panel-default col-md-6">
	<div class="panel-body">


<h4><b><?php echo $lang_ssse_6;?></b></h4>
<br />
<?php echo $lang_ssse_7;?>
<input type="text" ng-model="pointtomoneylist.cus_point_if" placeholder="0" class="form-control" style="width:100px;">
<br/ >
<?php echo $lang_ssse_8;?> (<font color="orange"><?php echo $lang_ssse_0;?></font>)
<input type="text" ng-model="pointtomoneylist.money_will" placeholder="0" class="form-control" style="width:100px;">
<br />
<button class="btn btn-success" ng-click="Saveall()"><?php echo $lang_save;?></button>

</div>
</div>



<div class="panel panel-default col-md-6">
	<div class="panel-body">

<h4><b><?php echo $lang_ssse_9;?></b></h4>
<br />
<?php echo $lang_ssse_10;?>
<input type="text" ng-model="stock_rule.stock_noti" placeholder="0" class="form-control" style="width:100px;">
<br/ >
<?php echo $lang_ssse_11;?>
<input type="text" ng-model="stock_rule.stock_nosale" placeholder="0" class="form-control" style="width:100px;">

<br />
<button class="btn btn-success" ng-click="Saveall()"><?php echo $lang_save;?></button>

</div>
</div>


<div class="panel panel-default col-md-6">
	<div class="panel-body">

<h4><b><?php echo $lang_ssse_12;?></b></h4>
<br />
<select class="form-control" ng-model="playbeep" style="width:100px;">
<option value="0"><?php echo $lang_ssse_close;?></option>
<option value="1"><?php echo $lang_ssse_open;?></option>
</select>
<br />
<button class="btn btn-success" ng-click="Saveall()"><?php echo $lang_save;?></button>


</div>
</div>

<div class="panel panel-default col-md-6">
	<div class="panel-body">

<h4><b><?php echo $lang_ssse_13;?></b></h4>
<br />
<select class="form-control" ng-model="open_number_for_cus" style="width:100px;">
<option value="0"><?php echo $lang_ssse_close;?></option>
<option value="1"><?php echo $lang_ssse_open;?></option>
</select>

<br />
<button class="btn btn-success" ng-click="Saveall()"><?php echo $lang_save;?></button>

</div>
</div>




<div class="panel panel-default col-md-6">
	<div class="panel-body">

<h4><b><?php echo $lang_ssse_14;?></b></h4>
<br />
<select class="form-control" ng-model="show_price_per_one" style="width:100px;">
<option value="0"><?php echo $lang_ssse_close;?></option>
<option value="1"><?php echo $lang_ssse_open;?></option>
</select>

<br />
<button class="btn btn-success" ng-click="Saveall()"><?php echo $lang_save;?></button>

</div>
</div>




<div class="panel panel-default col-md-6">
	<div class="panel-body">

<h4><b><?php echo $lang_ssse_15;?></b></h4>
<br />
<select class="form-control" ng-model="show_order_on_slip" style="width:100px;">
<option value="0"><?php echo $lang_ssse_close;?></option>
<option value="1"><?php echo $lang_ssse_open;?></option>
</select>

<br />
<button class="btn btn-success" ng-click="Saveall()"><?php echo $lang_save;?></button>

</div>
</div>





<div class="panel panel-default col-md-6">
	<div class="panel-body">

<h4><b><?php echo $lang_ssse_16;?></b></h4>
<input type="text" ng-model="vat" placeholder="%" class="form-control" style="width:100px;">
<br />
<?php echo $lang_ssse_17;?>
<select class="form-control" ng-model="open_vat_on_slip" style="width:100px;">
<option value="0"><?php echo $lang_ssse_close;?></option>
<option value="1"><?php echo $lang_ssse_open;?></option>
</select>

<br />
<button class="btn btn-success" ng-click="Saveall()"><?php echo $lang_save;?></button>

</div>
</div>



<div class="panel panel-default col-md-6">
	<div class="panel-body">

<h4><b><?php echo $lang_ssse_18;?></b></h4>

<?php echo $lang_ssse_19;?>
<input type="text" ng-model="c2m_bd_noti" placeholder="" class="form-control" style="width:100px;">


<br />
<button class="btn btn-success" ng-click="Saveall()"><?php echo $lang_save;?></button>

</div>
</div>








<div class="panel panel-default col-md-6">
	<div class="panel-body">

<h4><b><?php echo $lang_ssse_20;?></b></h4>
<br />
<select class="form-control" ng-model="have_product_course" style="width:100px;">
<option value="0"><?php echo $lang_ssse_close;?></option>
<option value="1"><?php echo $lang_ssse_open;?></option>
</select>

<br />
<button class="btn btn-success" ng-click="Saveall()"><?php echo $lang_save;?></button>

</div>
</div>




































	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {
	
	
$scope.playbeep = "<?php echo $_SESSION['playbeep'];?>";	
$scope.open_number_for_cus = "<?php echo $_SESSION['open_number_for_cus'];?>";
$scope.show_price_per_one = "<?php echo $_SESSION['show_price_per_one'];?>";
$scope.vat = "<?php echo $_SESSION['vat'];?>";	
$scope.open_vat_on_slip = "<?php echo $_SESSION['open_vat_on_slip'];?>";
$scope.show_order_on_slip = "<?php echo $_SESSION['show_order_on_slip'];?>";
$scope.c2m_bd_noti = "<?php echo $_SESSION['c2m_bd_noti'];?>";
$scope.have_product_course = "<?php echo $_SESSION['have_product_course'];?>";
		
	
	

$scope.getall = function(){

$http.get('Setting_etc/getdiscountfrombuy')
       .then(function(response){
          $scope.discountfrombuylist = response.data[0];

        });

$http.get('Setting_etc/getmoneytopoint')
				 .then(function(response){
				 $scope.moneytopointlist = response.data[0];

				 });


$http.get('Setting_etc/getpointtomoney')
				 .then(function(response){
				 $scope.pointtomoneylist = response.data[0];

				 });
				 
$http.get('Setting_etc/get_stock_rule')
				 .then(function(response){
				 $scope.stock_rule = response.data[0];

				 });

				

   };
$scope.getall();



$scope.Saveall = function(){

	$http.post("Setting_etc/Updatediscountfrombuy",{
		money_if: $scope.discountfrombuylist.money_if,
		money_will_discount: $scope.discountfrombuylist.money_will_discount
		}).success(function(data){

	        });


$http.post("Setting_etc/Updatemoneytopoint",{
	cus_money_if: $scope.moneytopointlist.cus_money_if,
	point_will: $scope.moneytopointlist.point_will
	}).success(function(data){

$scope.getall();
toastr.success('<?=$lang_success?>');

        });



$http.post("Setting_etc/Updatepointtomoney",{
	cus_point_if: $scope.pointtomoneylist.cus_point_if,
	money_will: $scope.pointtomoneylist.money_will
	}).success(function(data){

        });


$http.post("Setting_etc/Update_stock_rule",{
	stock_nosale: $scope.stock_rule.stock_nosale,
	stock_noti: $scope.stock_rule.stock_noti
	}).success(function(data){

        });
		

$http.post("Setting_etc/Update_owner",{
	playbeep: $scope.playbeep,
	open_number_for_cus: $scope.open_number_for_cus,
	show_price_per_one: $scope.show_price_per_one,
	vat: $scope.vat,
	open_vat_on_slip: $scope.open_vat_on_slip,
	show_order_on_slip: $scope.show_order_on_slip,
	c2m_bd_noti: $scope.c2m_bd_noti,
	have_product_course: $scope.have_product_course
	}).success(function(data){

        });
		
		

			




};
















});
	</script>
