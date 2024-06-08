

<div class="col-md-10 col-sm-9 lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">
	
<div class="panel panel-default">
	<div class="panel-body">
		

<font size="4"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
<?=$lang_cusgrade?>  <a class="btn btn-primary"  style="float: right" ng-click="Openaddnewcus()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></a></font>

<hr />



<div class="col-md-12 text-right">
<input type="checkbox" ng-model="Showdelbut"> <?=$lang_showdel?>
</div>




<br />
<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee">
			
			<th><?=$lang_cusgrade?></th>
			<th><?=$lang_remark?></th>
			
			<th><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in contactgrade">
			



			<td>{{x.contact_grade_name}}</td>
			<td>{{x.contact_grade_remark}}</td>
			<td width="70px">
<button class="btn btn-warning btn-xs" ng-click="Editrow(x)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
<button ng-if="Showdelbut" class="btn btn-danger btn-xs" id="deletecontact" ng-click="Delete(x.contact_grade_id)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
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
				<h4 class="modal-title"><?=$lang_addnewgrade?></h4>
			</div>
			<div class="modal-body">


<div class="row">
<div class="col-md-12">
	<input type="text" placeholder="<?=$lang_cusgrade?>" name="" class="form-control" ng-model="contact_grade_name" required>

</div>


	<div class="col-md-12">
	<br />
</div>	

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_remark?>" ng-model="contact_grade_remark">
</textarea> 
</div>

				

		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button type="submit" class="btn btn-success" id="savenewcontact" ng-click="SaveSubmit(contact_grade_name,contact_grade_remark)"><?=$lang_save?></button>
			</div>
		</div>



	</div>
</div>







<div class="modal fade" id="modaledit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_editgrade?></h4>
			</div>
			<div class="modal-body">


<div class="row">
<div class="col-md-12">
	<input type="text" placeholder="<?=$lang_cusgrade?>" name="" class="form-control" ng-model="contact_grade_name" required>

</div>


	<div class="col-md-12">
	<br />
</div>	

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_remark?>" ng-model="contact_grade_remark">
</textarea> 
</div>


				

		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button type="submit" class="btn btn-success" id="editcontact" ng-click="EditSubmit(contact_grade_id,contact_grade_name,contact_grade_remark)"><?=$lang_save?></button>
			</div>
		</div>



	</div>
</div>






</div>




<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$scope.getcontact = function(){
   
$http.get('contactgrade/get')
       .then(function(response){
          $scope.contactgrade = response.data.list; 
                 
        });
       $('.lodingbefor').css('display','block');
   };
$scope.getcontact();


$scope.Openaddnewcus = function(){
	$('#modal-id').modal('show');
	$scope.contact_grade_name = '';
$scope.contact_grade_remark ='';

};


$scope.SaveSubmit = function(contact_grade_name,contact_grade_remark){
	
	

$("#savenewcontact").prop("disabled",true);
$http.post("contactgrade/add",{
	'contact_grade_name': contact_grade_name,
	'contact_grade_remark': contact_grade_remark,
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$("#savenewcontact").prop("disabled",false);

	$scope.contact_grade_name = '';
$scope.contact_grade_remark ='';

$('#modal-id').modal('hide');
$scope.getcontact();



        });	
	
	
};





$scope.Delete = function(contact_grade_id){
	

$http.post("contactgrade/delete",{
	'contact_grade_id': contact_grade_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getcontact();



        });	
	
	
};


$scope.Editrow = function(x){
$('#modaledit').modal('show');
$scope.contact_grade_id = x.contact_grade_id;
$scope.contact_grade_name = x.contact_grade_name;
$scope.contact_grade_remark = x.contact_grade_remark;


};



$scope.EditSubmit = function(contact_grade_id,contact_grade_name,contact_grade_remark){
	
	

$("#editcontact").prop("disabled",true);
$http.post("contactgrade/update",{
	'contact_grade_id': contact_grade_id,
	'contact_grade_name': contact_grade_name,
	'contact_grade_remark': contact_grade_remark,
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$("#editcontact").prop("disabled",false);

	$scope.contact_grade_name = '';
$scope.contact_grade_remark ='';

$('#modaledit').modal('hide');
$scope.getcontact();



        });	
	
	
};






});
	</script>