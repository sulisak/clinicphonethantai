
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>
<?php echo $lang_sspp_1;?>
<br />
<button class="btn btn-primary" ng-click="Openmodalproduct()"><?php echo $lang_sspp_2;?></button>
<br /><br />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;"><?=$lang_rank?></th>
			<th><?php echo $lang_barcode;?></th>
			<th><?php echo $lang_productname;?></th>
			<th><?php echo $lang_qty;?></th>
<th><?php echo $lang_sspp_3;?></th>
			<th style="width: 120px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>


		<tr ng-repeat="x in categorylist">

		<td align="center">{{$index+1}}</td>



<td>{{x.product_code}}</td>
			<td>{{x.product_name}}</td>

			<td>1</td>

				<td ng-show="gift_id!=x.gift_id">{{x.point_use | number}}</td>

<td ng-show="gift_id==x.gift_id">
	<input type="text" class="form-control" ng-model="x.point_use" />
</td>

			<td ng-show="gift_id!=x.gift_id">

				<button class="btn btn-xs btn-warning" ng-click="Editinputcategory(x.gift_id)"><?=$lang_edit?></button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deletecategory(x.gift_id)">
				<?=$lang_delete?></button>
			</td>

			<td ng-show="gift_id==x.gift_id">

				<button class="btn btn-xs btn-success" ng-click="Editsavecategory(x.gift_id,x.point_use)">
				<?=$lang_save?></button>
				<button class="btn btn-xs btn-default" ng-click="Cancelcategory(x.gift_id)"><?=$lang_cancel?></button>
			</td>

		</tr>
	</tbody>
</table>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>

	</div>


	</div>











	<div class="modal fade" id="Openmodalproduct">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
				
<input type="text" placeholder="<?php echo $lang_search;?>" class="form-control" ng-model="searchproduct" ng-change="Findproduct(searchproduct)">

<br />

<table class="table">
<tbody>
<tr ng-repeat="x in product_list">
<td><button class="btn btn-success" ng-click="Selectproduct(x)"><?php echo $lang_save;?></button></td>
<td>{{x.product_name}}</td>
<td><input type="number" class="form-control" placeholder="คะแนน" ng-model="x.point_use">
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

$http.get('Product_point/get')
       .then(function(response){
          $scope.categorylist = response.data.list;

        });
   };
$scope.get();



$scope.Openmodalproduct = function(){
$('#Openmodalproduct').modal('show');
};



$scope.Findproduct = function(search){
$http.post("Product_point/Findproduct",{
	search: search
	}).success(function(data){
$scope.product_list = data;
        });
};




$scope.Selectproduct = function(x){
$http.post("Product_point/Add",{
	product_id: x.product_id,
	product_code: x.product_code,
	product_name: x.product_name,
	point_use: x.point_use
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
$('#Openmodalproduct').modal('hide');
        });
};

$scope.Editinputcategory = function(gift_id){
$scope.gift_id = gift_id;
};

$scope.Cancelcategory = function(gift_id){
$scope.gift_id = '';
$scope.get();
};

$scope.Editsavecategory = function(gift_id,point_use){
$http.post("Product_point/Update",{
	gift_id: gift_id,
	point_use: point_use
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.gift_id = '';
$scope.get();

        });
};


$scope.Deletecategory = function(gift_id){
$http.post("Product_point/Delete",{
	gift_id: gift_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });
};




});
	</script>
