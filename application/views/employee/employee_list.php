

<div class="col-md-10 col-sm-9 lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">
	
<div class="panel panel-default">
	<div class="panel-body">
		

<font size="4"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> 
  <?php echo $lang_eyli_1;?>
	<a class="btn btn-primary"  style="float: right" ng-click="Openaddnew()"><span class="glyphicon glyphicon-plus" aria-hidden="true">
	<?php echo $lang_eyli_2;?>
	</a></font>

<hr />



<div class="col-md-12 text-right">
<input type="checkbox" ng-model="Showdelbut"> <?=$lang_showdel?>
</div>




<br />
<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee">
			
			<th><?php echo $lang_eyli_3;?></th>
			<th><?php echo $lang_address;?></th>
			<th><?php echo $lang_eyli_4;?></th>
			<th><?php echo $lang_eyli_5;?></th>
			<th><?php echo $lang_eyli_6;?></th>
			<th><?php echo $lang_manage;?></th>
		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in list">
			



			<td>{{x.em_name}}</td>
			<td>{{x.em_address}}</td>
			<td>{{x.p_title}}</td>
			<td>{{x.em_bank}}</td>
			<td>{{x.em_etc}}</td>
			
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
	<input type="text" placeholder="<?php echo $lang_eyli_3;?>" name="" class="form-control" ng-model="name" required>

</div>


	<div class="col-md-12">
	<br />
</div>

	<div class="col-md-12">
	<select class="form-control" ng-model="position_id">
<option value="0"><?php echo $lang_eyli_7;?></option>
<option ng-repeat="x in listposition" value="{{x.p_id}}">{{x.p_title}}</option>
</select>
</div>


	<div class="col-md-12">
	<br />
</div>	

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?php echo $lang_address;?>" ng-model="address">
</textarea> 
</div>


	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?php echo $lang_eyli_5;?>" ng-model="bank">
</textarea> 
</div>


	<div class="col-md-12">
	<br />
</div>



<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?php echo $lang_eyli_6;?>" ng-model="etc">
</textarea> 
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
	<input type="text" placeholder="<?php echo $lang_eyli_3;?>" name="" class="form-control" ng-model="name" required>

</div>


	<div class="col-md-12">
	<br />
</div>


	<div class="col-md-12">
	<select class="form-control" ng-model="position_id">
<option value="0"><?php echo $lang_eyli_7;?></option>
<option ng-repeat="x in listposition" value="{{x.p_id}}">{{x.p_title}}</option>
</select>
</div>


	<div class="col-md-12">
	<br />
</div>	

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?php echo $lang_address;?>" ng-model="address">
</textarea> 
</div>


	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?php echo $lang_eyli_5;?>" ng-model="bank">
</textarea> 
</div>


	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?php echo $lang_eyli_6;?>" ng-model="etc">
</textarea> 
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
   
$http.get('employee_list/get')
       .then(function(response){
          $scope.list = response.data.list; 
                 
        });
       $('.lodingbefor').css('display','block');

   };
$scope.get();



$scope.getposition = function(){
   
$http.get('<?php echo $base_url;?>/employee/employee_position/get')
       .then(function(response){
          $scope.listposition = response.data.list; 
                 
        });
      

   };
$scope.getposition();





$scope.Openaddnew = function(){
	$('#modal-id').modal('show');
	$scope.name = '';
$scope.address ='';
$scope.bank ='';
$scope.etc ='';
$scope.position_id = '0';

};


$scope.SaveSubmit = function(){
	
	

$("#savenew").prop("disabled",true);
$http.post("employee_list/add",{
	'em_name': $scope.name,
	'em_address': $scope.address,
	'em_bank': $scope.bank,
	'em_etc': $scope.etc,
	'position_id': $scope.position_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$("#savenew").prop("disabled",false);

$('#modal-id').modal('hide');
$scope.get();



        });	
	
	
};





$scope.Delete = function(x){
	

$http.post("employee_list/delete",{
	'em_id': x.em_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();



        });	
	
	
};


$scope.Editrow = function(x){
$('#modaledit').modal('show');
$scope.em_id = x.em_id;
$scope.name = x.em_name;
$scope.address = x.em_address;
$scope.bank = x.em_bank;
$scope.etc = x.em_etc;

$scope.position_id = x.position_id;

};



$scope.EditSubmit = function(){
	
	

$("#edit").prop("disabled",true);
$http.post("employee_list/update",{
	'em_id': $scope.em_id,
	'em_name': $scope.name,
	'em_address': $scope.address,
	'em_bank': $scope.bank,
	'em_etc': $scope.etc,
	'position_id': $scope.position_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$("#edit").prop("disabled",false);

$('#modaledit').modal('hide');
$scope.get();



        });	
	
	
};






});
	</script>