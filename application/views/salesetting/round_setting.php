<style>
	.ui-datepicker-year{
		display: none;
	}
</style>

<div class="col-md-10 col-sm-9 lodingbefor" ng-app="firstapp" ng-controller="Index" >

<div class="panel panel-default">
	<div class="panel-body">


<?php echo $lang_ssrs_1;?>
<br />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="text-align: center;"><?php echo $lang_ssrs_2;?></th>
			<th style="text-align: center;"><?php echo $lang_to;?></th>
			<th style="text-align: center;"> <?php echo $lang_ssrs_3;?></th>
			<th style="text-align: center;"><?php echo $lang_save;?></th>
			
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><input type="text" ng-model="rs_from" class="form-control"></td>
			<td><input type="text" ng-model="rs_to" class="form-control"></td>
			<td align="right"><input type="text" ng-model="rs_is" class="form-control"></td>

			<td align="center">

			<button  class="btn btn-success btn-xs" ng-click="Saveround()">
		<?=$lang_save?>
			</button>


			</td>



		</tr>
		
		<tr ng-repeat="x in roundlist">
			<td align="center">{{x.rs_from}}</td>
			<td align="center">{{x.rs_to}}</td>
			<td align="right">{{x.rs_is | number:2}}</td>

			<td align="center">


<button  class="btn btn-danger btn-xs" ng-click="Deleteround(x)">
		<?php echo $lang_delete;?>
			</button>

			</td>



		</tr>
		
	</tbody>
</table>




</div>
</div>





























</div>




<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {




$scope.rs_from  = '';
$scope.rs_to = '';
$scope.rs_is = '';






$scope.Getround = function(){

$http.post("round_setting/getround",{

	}).success(function(data){

$scope.roundlist = data;

        });

};

$scope.Getround();








$scope.Saveround = function(){

if($scope.rs_is != ''){

$http.post("round_setting/Saveround",{
	'rs_from': $scope.rs_from,
	'rs_to': $scope.rs_to,
	'rs_is': $scope.rs_is

	}).success(function(data){

toastr.success('<?=$lang_success?>');

$scope.rs_from  = '';
$scope.rs_to = '';
$scope.rs_is = '';


$scope.Getround();



        });
}else{
	toastr.warning('<?=$lang_plz?>');
}


};













$scope.Deleteround = function(x){

$http.post("round_setting/Deleteround",{
	'rs_ID': x.rs_ID
	}).success(function(data){

toastr.success('<?php echo $lang_success;?>');


$scope.Getround();


        });



};











});
	</script>
