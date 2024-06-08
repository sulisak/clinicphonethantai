
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
			<th>Size</th>
			<th style="width: 120px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>
	<tr>
	<td></td>
			<td><input type="text" class="form-control" placeholder="Size" ng-model="product_size_name"></td>
			<td><button class="btn btn-success" ng-click="Savesize(product_size_name)"><?=$lang_save?></button></td>
	</tr>

		<tr ng-repeat="x in sizelist">

		<td align="center">{{$index+1}}</td>

			<td ng-show="product_size_id==x.product_size_id"><input type="text" ng-model="x.product_size_name" class="form-control"></td>

			<td ng-show="product_size_id!=x.product_size_id">{{x.product_size_name}}</td>

			<td ng-show="product_size_id!=x.product_size_id">

				<button class="btn btn-xs btn-warning" ng-click="Editinputsize(x.product_size_id)"><?=$lang_edit?></button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deletesize(x.product_size_id)">
				<?=$lang_delete?></button>
			</td>

			<td ng-show="product_size_id==x.product_size_id">

				<button class="btn btn-xs btn-success" ng-click="Editsavesize(x.product_size_id,x.product_size_name)">
				<?=$lang_save?></button>
				<button class="btn btn-xs btn-default" ng-click="Cancelsize(x.product_size_id)"><?=$lang_cancel?></button>
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
   
$http.get('Productsize/get')
       .then(function(response){
          $scope.sizelist = response.data.list; 
                 
        });
   };
$scope.get();

$scope.Savesize = function(product_size_name){
$http.post("Productsize/Add",{
	product_size_name: product_size_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });	
};

$scope.Editinputsize = function(product_size_id){
$scope.product_size_id = product_size_id;
};

$scope.Cancelsize = function(product_size_id){
$scope.product_size_id = '';
$scope.get();
};

$scope.Editsavesize = function(product_size_id,product_size_name){
$http.post("Productsize/Update",{
	product_size_id: product_size_id,
	product_size_name: product_size_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.product_size_id = '';
$scope.get();

        });	
};


$scope.Deletesize = function(product_size_id){
$http.post("Productsize/Delete",{
	product_size_id: product_size_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });	
};




});
	</script>
