

<div class="col-md-10 col-sm-9 lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">
	
<div class="panel panel-default">
	<div class="panel-body">
		

<font size="4"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> 
<?php echo $lang_eypt_1;?>
	<a class="btn btn-primary"  style="float: right" ng-click="Openaddnew()"><span class="glyphicon glyphicon-plus" aria-hidden="true">
	<?php echo $lang_eypt_2;?>
	</a></font>

<hr />



<div class="col-md-12 text-right">
<input type="checkbox" ng-model="Showdelbut"> <?=$lang_showdel?>
</div>




<br />
<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee">
			
			<th><?php echo $lang_eypt_3;?></th>
			<th><?php echo $lang_detail;?></th>
			<th><?php echo $lang_eypt_4;?></th>
			<th><?php echo $lang_manage;?></th>
		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in list">
			



			<td>{{x.p_title}}</td>
			<td>{{x.p_des}}</td>
			<td>{{x.p_salary | number}}</td>
			
			<td width="70px">
<button class="btn btn-warning btn-xs" ng-click="Editrow(x)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
<button ng-if="Showdelbut" class="btn btn-danger btn-xs" id="delete" ng-click="Delete(x)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
			</td>
		</tr>

	</tbody>
</table>


	</div>
</div>






<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">


<div class="row">
<div class="col-md-12">
	<input type="text" placeholder="<?php echo $lang_eypt_3;?>" name="" class="form-control" ng-model="title" required>

</div>


	<div class="col-md-12">
	<br />
</div>	

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?php echo $lang_detail;?>" ng-model="des">
</textarea> 
</div>

	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<input type="text" placeholder="<?php echo $lang_eypt_4;?>" name="" class="form-control" ng-model="salary">

</div>
				

		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button type="submit" class="btn btn-success" id="savenew" ng-click="SaveSubmit()"><?=$lang_save?></button>
			</div>
		</div>



	</div>
</div>







<div class="modal fade" id="modaledit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">


<div class="row">
<div class="col-md-12">
	<input type="text" placeholder="<?php echo $lang_eypt_3;?>" name="" class="form-control" ng-model="title" required>

</div>


	<div class="col-md-12">
	<br />
</div>	

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?php echo $lang_detail;?>" ng-model="des">
</textarea> 
</div>

	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<input type="text" placeholder="<?php echo $lang_eypt_4;?>" name="" class="form-control" ng-model="salary">

</div>
				

		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button type="submit" class="btn btn-success" id="edit" ng-click="EditSubmit()"><?=$lang_save?></button>
			</div>
		</div>



	</div>
</div>






</div>




<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$scope.get = function(){
   
$http.get('employee_position/get')
       .then(function(response){
          $scope.list = response.data.list; 
                 
        });
       $('.lodingbefor').css('display','block');

   };
$scope.get();


$scope.Openaddnew = function(){
	$('#modal-id').modal('show');
	$scope.title = '';
$scope.des ='';
$scope.salary ='';

};


$scope.SaveSubmit = function(){
	
	

$("#savenew").prop("disabled",true);
$http.post("employee_position/add",{
	'p_title': $scope.title,
	'p_des': $scope.des,
	'p_salary': $scope.salary
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$("#savenew").prop("disabled",false);

$('#modal-id').modal('hide');
$scope.get();



        });	
	
	
};





$scope.Delete = function(x){
	

$http.post("employee_position/delete",{
	'p_id': x.p_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();



        });	
	
	
};


$scope.Editrow = function(x){
$('#modaledit').modal('show');
$scope.p_id = x.p_id;
$scope.title = x.p_title;
$scope.des = x.p_des;
$scope.salary = x.p_salary;


};



$scope.EditSubmit = function(){
	
	

$("#edit").prop("disabled",true);
$http.post("employee_position/update",{
	'p_id': $scope.p_id,
	'p_title': $scope.title,
	'p_des': $scope.des,
	'p_salary': $scope.salary
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$("#edit").prop("disabled",false);

$('#modaledit').modal('hide');
$scope.get();



        });	
	
	
};






});
	</script>