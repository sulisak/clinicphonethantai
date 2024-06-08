
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
			<th><?php echo $lang_sspt_1;?></th>
			<th style="width: 120px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>
	<tr>
	<td></td>
			<td><input type="text" class="form-control" placeholder="<?php echo $lang_sspt_1;?>" ng-model="pay_type_name"></td>
			<td><button class="btn btn-success" ng-click="Savecategory(pay_type_name)"><?=$lang_save?></button></td>
	</tr>

		<tr ng-repeat="x in categorylist">

		<td align="center">{{$index+1}}</td>

			<td ng-show="pay_type_id==x.pay_type_id"><input type="text" ng-model="x.pay_type_name" class="form-control"></td>

			<td ng-show="pay_type_id!=x.pay_type_id">{{x.pay_type_name}}</td>

			<td ng-show="pay_type_id!=x.pay_type_id">

				<button class="btn btn-xs btn-warning" ng-click="Editinputcategory(x.pay_type_id)"><?=$lang_edit?></button>
				<button  ng-show="showdeletcbut && x.pay_type_id>'5'" class="btn btn-xs btn-danger" ng-click="Deletecategory(x.pay_type_id)">
				<?=$lang_delete?></button>
			</td>

			<td ng-show="pay_type_id==x.pay_type_id">

				<button class="btn btn-xs btn-success" ng-click="Editsavecategory(x.pay_type_id,x.pay_type_name)">
				<?=$lang_save?></button>
				<button class="btn btn-xs btn-default" ng-click="Cancelcategory(x.pay_type_id)"><?=$lang_cancel?></button>
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
   
$http.get('pay_type/get')
       .then(function(response){
          $scope.categorylist = response.data.list; 
                 
        });
   };
$scope.get();

$scope.Savecategory = function(pay_type_name){
$http.post("pay_type/Add",{
	pay_type_name: pay_type_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });	
};

$scope.Editinputcategory = function(pay_type_id){
$scope.pay_type_id = pay_type_id;
};

$scope.Cancelcategory = function(pay_type_id){
$scope.pay_type_id = '';
$scope.get();
};

$scope.Editsavecategory = function(pay_type_id,pay_type_name){
$http.post("pay_type/Update",{
	pay_type_id: pay_type_id,
	pay_type_name: pay_type_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.pay_type_id = '';
$scope.get();

        });	
};


$scope.Deletecategory = function(pay_type_id){
$http.post("pay_type/Delete",{
	pay_type_id: pay_type_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });	
};




});
	</script>
