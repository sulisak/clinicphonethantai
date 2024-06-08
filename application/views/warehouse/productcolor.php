
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
			<th><?php echo $lang_color;?></th>
			<th style="width: 120px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>
	<tr>
	<td></td>
			<td><input type="text" class="form-control" placeholder="สี" ng-model="product_color_name"></td>
			<td><button class="btn btn-success" ng-click="Savecolor(product_color_name)"><?=$lang_save?></button></td>
	</tr>

		<tr ng-repeat="x in colorlist">

		<td align="center">{{$index+1}}</td>

			<td ng-show="product_color_id==x.product_color_id"><input type="text" ng-model="x.product_color_name" class="form-control"></td>

			<td ng-show="product_color_id!=x.product_color_id">{{x.product_color_name}}</td>

			<td ng-show="product_color_id!=x.product_color_id">

				<button class="btn btn-xs btn-warning" ng-click="Editinputcolor(x.product_color_id)"><?=$lang_edit?></button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deletecolor(x.product_color_id)">
				<?=$lang_delete?></button>
			</td>

			<td ng-show="product_color_id==x.product_color_id">

				<button class="btn btn-xs btn-success" ng-click="Editsavecolor(x.product_color_id,x.product_color_name)">
				<?=$lang_save?></button>
				<button class="btn btn-xs btn-default" ng-click="Cancelcolor(x.product_color_id)"><?=$lang_cancel?></button>
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
   
$http.get('Productcolor/get')
       .then(function(response){
          $scope.colorlist = response.data.list; 
                 
        });
   };
$scope.get();

$scope.Savecolor = function(product_color_name){
$http.post("Productcolor/Add",{
	product_color_name: product_color_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });	
};

$scope.Editinputcolor = function(product_color_id){
$scope.product_color_id = product_color_id;
};

$scope.Cancelcolor = function(product_color_id){
$scope.product_color_id = '';
$scope.get();
};

$scope.Editsavecolor = function(product_color_id,product_color_name){
$http.post("Productcolor/Update",{
	product_color_id: product_color_id,
	product_color_name: product_color_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.product_color_id = '';
$scope.get();

        });	
};


$scope.Deletecolor = function(product_color_id){
$http.post("Productcolor/Delete",{
	product_color_id: product_color_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });	
};




});
	</script>
