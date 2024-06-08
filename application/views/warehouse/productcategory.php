
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
			<th><?=$lang_categoryname?></th>
			<th style="width: 120px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>
	<tr>
	<td></td>
			<td><input type="text" class="form-control" placeholder="<?=$lang_categoryname?>" ng-model="product_category_name"></td>
			<td><button class="btn btn-success" ng-click="Savecategory(product_category_name)"><?=$lang_save?></button></td>
	</tr>

		<tr ng-repeat="x in categorylist">

		<td align="center">
			<input type="text" class="form-control" ng-model="x.cat_rank" ng-change="Updaterank(x)">
			
		</td>

			<td ng-show="product_category_id==x.product_category_id"><input type="text" ng-model="x.product_category_name" class="form-control"></td>

			<td ng-show="product_category_id!=x.product_category_id">{{x.product_category_name}}</td>

			<td ng-show="product_category_id!=x.product_category_id">

<button class="btn btn-xs btn-warning" ng-click="Editinputcategory(x.product_category_id)"><?=$lang_edit?></button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deletecategory(x.product_category_id)">
				<?=$lang_delete?></button>
			</td>

			<td ng-show="product_category_id==x.product_category_id">

				<button class="btn btn-xs btn-success" ng-click="Editsavecategory(x.product_category_id,x.product_category_name)">
				<?=$lang_save?></button>
				<button class="btn btn-xs btn-default" ng-click="Cancelcategory(x.product_category_id)"><?=$lang_cancel?></button>
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
   
$http.get('Productcategory/get')
       .then(function(response){
          $scope.categorylist = response.data.list; 
                 
        });
   };
$scope.get();

$scope.Savecategory = function(product_category_name){
$http.post("Productcategory/Add",{
	product_category_name: product_category_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
$scope.product_category_name = '';
        });	
};

$scope.Editinputcategory = function(product_category_id){
$scope.product_category_id = product_category_id;
};

$scope.Cancelcategory = function(product_category_id){
$scope.product_category_id = '';
$scope.get();
};

$scope.Editsavecategory = function(product_category_id,product_category_name){
$http.post("Productcategory/Update",{
	product_category_id: product_category_id,
	product_category_name: product_category_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.product_category_id = '';
$scope.get();

        });	
};


$scope.Deletecategory = function(product_category_id){
$http.post("Productcategory/Delete",{
	product_category_id: product_category_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });	
};



$scope.Updaterank = function(x){
$http.post("Productcategory/Updaterank",{
	cat_rank: x.cat_rank,
	product_category_id: x.product_category_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
setTimeout(function(){ 
	$scope.get();
	}, 5000);

        });	
};







});
	</script>
