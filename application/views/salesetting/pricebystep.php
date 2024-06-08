<style>
	.ui-datepicker-year{
		display: none;
	}
</style>

<div class="col-md-10 col-sm-9 lodingbefor" ng-app="firstapp" ng-controller="Index" >

<div class="panel panel-default">
	<div class="panel-body">




<input type="text" ng-model="searchtext" placeholder="<?=$lang_search?>" style="width:300px;" class="form-control">
<br />
<center>
<img ng-if="!productlist" src="<?php echo $base_url;?>/pic/loading.gif">
</center>
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;text-align: center;"><?=$lang_rank?></th>
			<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>
			<th style="text-align: center;"><?=$lang_category?></th>
			<th style="text-align: center;"><?=$lang_priceperunit?></th>
			<th style="width: 120px;text-align: center;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in productlist | filter:searchtext">
		<td align="center">{{$index+1}}</td>
		<td align="center">{{x.product_code}}</td>
			<td>{{x.product_name}}</td>
			<td>{{x.product_category_name}}</td>
			
			<td align="right">{{x.product_price | number:2}}</td>


			

			<td width="130px" align="center">
<button class="btn btn-warning btn-xs" ng-click="Openmodal(x)"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button>


			</td>


		</tr>

	</tbody>
</table>



</div>
</div>






<div class="modal fade" id="modalproduct">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"> <b>( {{ product_name}} )</b></h4>
				<center><span style="color:red;">
				<?php echo $lang_sspbs_1;?>
				
				</span>
				<br />
			<span style="color:red;"><h3><?php echo $lang_sspbs_2;?>	</h3> </span>
				</center>
			</div>
			<div class="modal-body">


<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="text-align: center;"><?php echo $lang_sspbs_3;?></th>
			<th style="text-align: center;"><?php echo $lang_sspbs_4;?></th>
			<th style="text-align: center;"> <?php echo $lang_sspbs_5;?></th>
			<th style="text-align: center;"><?php echo $lang_save;?></th>
			
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><input type="text" ng-model="qty_more" class="form-control"></td>
			<td><input type="text" ng-model="qty_less" class="form-control"></td>
			<td align="right"><input type="text" ng-model="product_price" class="form-control"></td>

			<td align="center">

			<button  class="btn btn-success btn-xs" ng-click="Saveprice()">
		<?=$lang_save?>
			</button>


			</td>



		</tr>
		
		<tr ng-repeat="x in productliststep">
			<td align="center">{{x.qty_more}}</td>
			<td align="center">{{x.qty_less}}</td>
			<td align="right">{{x.product_price | number:2}}</td>

			<td align="center">


<button  class="btn btn-danger btn-xs" ng-click="Deleteprice(x)">
		<?php echo $lang_delete;?>
			</button>

			</td>



		</tr>
		
	</tbody>
</table>





			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>
			</div>
		</div>



	</div>
</div>





























</div>




<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {





$scope.get = function(){
  $scope.productlist = false; 
$http.get('pricebystep/get')
       .then(function(response){
          $scope.productlist = response.data.list; 
                 
        });
   };
$scope.get();










$scope.Openmodal = function(x){
$('#modalproduct').modal('show');
$scope.product_code = x.product_code;
$scope.product_name = x.product_name;

$http.post("pricebystep/getproductstep",{
	'product_code': x.product_code,

	}).success(function(data){

$scope.productliststep = data;

        });




};









$scope.Saveprice = function(){

if($scope.product_price != ''){

$http.post("pricebystep/saveprice",{
	'product_code': $scope.product_code,
	'qty_more': $scope.qty_more,
	'qty_less': $scope.qty_less,
	'product_price': $scope.product_price

	}).success(function(data){

toastr.success('<?=$lang_success?>');

$scope.qty_more  = '';
$scope.qty_less = '';
$scope.product_price = '';


$http.post("pricebystep/getproductstep",{
	'product_code': $scope.product_code,

	}).success(function(data){

$scope.productliststep = data;

        });






        });
}else{
	toastr.warning('<?=$lang_plz?>');
}


};













$scope.Deleteprice = function(x){

$http.post("pricebystep/deleteprice",{
	'ps_ID': x.ps_ID
	}).success(function(data){

toastr.success('เรียบร้อย');

$http.post("pricebystep/getproductstep",{
	'product_code': $scope.product_code,

	}).success(function(data){

$scope.productliststep = data;

        });






        });



};














$scope.Searchsubmit = function(){
$scope.getmycustomer($scope.searchtype,$scope.searchtext,'1',$scope.perpage);
};



});
	</script>
