
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;"><?=$lang_rank?></th>
			<th><?=$lang_productunit?></th>
			<th style="width: 120px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>
	<tr>
	<td></td>
			<td><input type="text" class="form-control" placeholder="<?=$lang_productunitdetail?>" ng-model="product_unit_name"></td>
			<td><button class="btn btn-success" ng-click="Save(product_unit_name)"><?=$lang_save?></button></td>
	</tr>

		<tr ng-repeat="x in unitlist">

		<td align="center">{{$index+1}}</td>

			<td ng-show="product_unit_id==x.product_unit_id"><input type="text" ng-model="x.product_unit_name" class="form-control"></td>

			<td ng-show="product_unit_id!=x.product_unit_id">{{x.product_unit_name}}</td>

			<td ng-show="product_unit_id!=x.product_unit_id">

				<button class="btn btn-xs btn-warning" ng-click="Editinput(x.product_unit_id)"><?=$lang_edit?></button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Delete(x.product_unit_id)">
				<?=$lang_delete?></button>
			</td>

			<td ng-show="product_unit_id==x.product_unit_id">

				<button class="btn btn-xs btn-success" ng-click="Editsave(x.product_unit_id,x.product_unit_name)">
				<?=$lang_save?></button>
				<button class="btn btn-xs btn-default" ng-click="Cancel(x.product_unit_id)"><?=$lang_cancel?></button>
			</td>

		</tr>
	</tbody>
</table>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>

	</div>


	</div>

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.get = function(){

$http.get('Productunit/get')
       .then(function(response){
          $scope.unitlist = response.data.list;

        });
   };
$scope.get();

$scope.Save = function(product_unit_name){
$http.post("Productunit/Add",{
	product_unit_name: product_unit_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });
};

$scope.Editinput = function(product_unit_id){
$scope.product_unit_id = product_unit_id;
};

$scope.Cancel = function(product_unit_id){
$scope.product_unit_id = '';
$scope.get();
};

$scope.Editsave = function(product_unit_id,product_unit_name){
$http.post("Productunit/Update",{
	product_unit_id: product_unit_id,
	product_unit_name: product_unit_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.product_unit_id = '';
$scope.get();

        });
};


$scope.Delete = function(product_unit_id){
$http.post("Productunit/Delete",{
	product_unit_id: product_unit_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });
};




});
	</script>
