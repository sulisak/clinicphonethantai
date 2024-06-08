
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">

<?php echo $lang_ssecr_1;?>
<form class="form-inline">
<select class="form-control" ng-change="Showonslip()" ng-model="exchangerateonslip">
	<option value="0"><?php echo $lang_ssecr_2;?></option>
	<option value="1"><?php echo $lang_ssecr_3;?></option>
</select>
</form>
<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;"><?=$lang_rank?></th>
			<th><?php echo $lang_ssecr_4;?></th>
			<th><?php echo $lang_ssecr_5;?></th>
			<th style="width: 120px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>
	<tr>
	<td></td>
			<td><input type="text" class="form-control" placeholder="<?php echo $lang_ssecr_4;?>" ng-model="title_name"></td>
			<td><input type="text" class="form-control" placeholder="<?php echo $lang_ssecr_5;?>" ng-model="rate"></td>
			<td><button class="btn btn-success" ng-click="Savecategory()"><?=$lang_save?></button></td>
	</tr>

		<tr ng-repeat="x in categorylist">

		<td align="center">{{$index+1}}</td>

			<td ng-show="e_id==x.e_id"><input type="text" ng-model="x.title_name" class="form-control"></td>
<td ng-show="e_id==x.e_id"><input type="text" ng-model="x.rate" class="form-control"></td>


			<td ng-show="e_id!=x.e_id">{{x.title_name}}</td>
			<td ng-show="e_id!=x.e_id">{{x.rate}}</td>

			<td ng-show="e_id!=x.e_id">

				<button class="btn btn-xs btn-warning" ng-click="Editinputcategory(x.e_id)"><?=$lang_edit?></button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deletecategory(x.e_id)">
				<?=$lang_delete?></button>
			</td>

			<td ng-show="e_id==x.e_id">

				<button class="btn btn-xs btn-success" ng-click="Editsavecategory(x.e_id,x.title_name,x.rate)">
				<?=$lang_save?></button>
				<button class="btn btn-xs btn-default" ng-click="Cancelcategory(x.e_id)"><?=$lang_cancel?></button>
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



$scope.title_name = '';
$scope.rate = '';



$scope.get = function(){
   
$http.get('exchangerate/get')
       .then(function(response){
          $scope.categorylist = response.data.list; 
                 
        });
   };
$scope.get();

$scope.Savecategory = function(){
$http.post("exchangerate/Add",{
	title_name: $scope.title_name,
	rate: $scope.rate
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
$scope.title_name = '';
$scope.rate = '';
        });	
};

$scope.Editinputcategory = function(e_id){
$scope.e_id = e_id;
};

$scope.Cancelcategory = function(e_id){
$scope.e_id = '';
$scope.get();
};

$scope.Editsavecategory = function(e_id,title_name,rate){
$http.post("exchangerate/Update",{
	e_id: e_id,
	title_name: title_name,
	rate: rate
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.e_id = '';
$scope.get();

        });	
};


$scope.Deletecategory = function(e_id){
$http.post("exchangerate/Delete",{
	e_id: e_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });	
};


$scope.exchangerateonslip = '<?php echo $_SESSION["exchangerateonslip"]?>';

$scope.Showonslip = function(){

$http.post("exchangerate/showonslip",{
   exchangerateonslip: $scope.exchangerateonslip
	}).success(function(data){
toastr.success('<?=$lang_success?>');

});

}



});
	</script>
