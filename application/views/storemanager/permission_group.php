
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
			<th style="width: 50px;"><?php echo $lang_smpg_1;?></th>
			<th><?php echo $lang_smpg_2;?></th>
			<th><?php echo $lang_smpg_3;?></th>
			<th style="width: 120px;"><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>
	<tr>
	<td></td>
	<td></td>
			<td><input type="text" class="form-control" placeholder="<?php echo $lang_smpg_2;?>" ng-model="group_name"></td>
			<td><input type="text" class="form-control" placeholder="<?php echo $lang_smpg_3;?>" ng-model="group_des"></td>
			
			<td><button class="btn btn-success" ng-click="Savecategory(group_name,group_des)"><?=$lang_save?></button></td>
	</tr>

		<tr ng-repeat="x in categorylist">

<td align="center">		{{$index+1}}</td>

<td align="center">
	
<button class="btn btn-success" ng-click="Setting_permission(x)">
	<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
	<?php echo $lang_smpg_1;?></button>
</td>

			<td ng-show="group_id==x.group_id"><input type="text" ng-model="x.group_name" class="form-control"></td>
<td ng-show="group_id==x.group_id"><input type="text" ng-model="x.group_des" class="form-control"></td>



			<td ng-show="group_id!=x.group_id">{{x.group_name}}</td>
			<td ng-show="group_id!=x.group_id">{{x.group_des}}</td>

			<td ng-show="group_id!=x.group_id">
				
				<button class="btn btn-xs btn-warning" ng-click="Editinputcategory(x.group_id)"><?=$lang_edit?></button>
				<button  ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deletecategory(x.group_id)">
				<?=$lang_delete?></button>
			</td>

			<td ng-show="group_id==x.group_id">

				<button class="btn btn-xs btn-success" ng-click="Editsavecategory(x.group_id,x.group_name,x.group_des)">
				<?=$lang_save?></button>
				<button class="btn btn-xs btn-default" ng-click="Cancelcategory(x.group_id)"><?=$lang_cancel?></button>
			</td>

		</tr>
	</tbody>
</table>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span> 
<?=$lang_downloadexcel?> </button>

	</div>


	</div>
	
	
	
	
	
	



<div class="modal fade" id="Setting_permission">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-body">


<b><?php echo $lang_smpg_4;?> {{grouplist.group_name}} </b>


<table class="table table-hover">
	<tr style="background-color:#ccc;">
		
		<th class="text-center"><?php echo $lang_smpg_5;?></th>
		<th class="text-center"><?php echo $lang_smpg_6;?></th></tr>
	
	<tr ng-repeat="x in mainmenu"  ng-if="!x.faid">
	

		
		
	
	<td>{{x.name}}
		
		<span ng-repeat="y in mainmenu" ng-if="y.faid==x.id">
		<br />
		<input type="checkbox" ng-checked="y.status" ng-model="y.status">
		{{y.name}}
		
		</span>
		
		
		</td>

	<td class="text-center">
		<input type="checkbox" ng-checked="x.status" ng-model="x.status">
		</td>
		
		</tr>
		
		
			
	
		
		</tr>
		
		
		
		
	</table>

<center>
<button class="btn btn-success" ng-click="Setting_permission_save()"><?php echo $lang_save;?></button>
</center>

			</div>
			<div class="modal-footer">

				<center>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">ปิดหน้าต่าง</button>
</center>

			</div>
		</div>
	</div>
</div>	
	
	
	
	
	
	
	
	
	
	

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.group_name = '';
$scope.group_des = '';




$scope.Setting_permission = function(x){
	$scope.grouplist = x;
	$http.post("permission_group/getpermission_rule",{
	group_id: x.group_id
	}).success(function(data){
	if(data[0].permission_rule==''){
	$scope.mainmenu = <?php echo $mainmenu;?>;
		}else{
	$scope.mainmenu = JSON.parse(data[0].permission_rule);		
		}
 
        });	
$('#Setting_permission').modal('show');
};


$scope.Setting_permission_save = function(){
	$scope.permission_rule = JSON.stringify($scope.mainmenu);
	$http.post("permission_group/getpermission_rule_save",{
	group_id: $scope.grouplist.group_id,
	permission_rule: $scope.permission_rule
	}).success(function(data){
$('#Setting_permission').modal('hide');
 toastr.success('<?=$lang_success?>');
        });	

};



$scope.get = function(){
   
$http.get('permission_group/get')
       .then(function(response){
          $scope.categorylist = response.data.list; 
                 
        });
   };
$scope.get();

$scope.Savecategory = function(group_name,group_des){
$http.post("permission_group/Add",{
	group_name: group_name,
	group_des: group_des
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
$scope.group_name = '';
$scope.group_des = '';
        });	
};

$scope.Editinputcategory = function(group_id){
$scope.group_id = group_id;
};

$scope.Cancelcategory = function(group_id){
$scope.group_id = '';
$scope.get();
};

$scope.Editsavecategory = function(group_id,group_name,group_des){
$http.post("permission_group/Update",{
	group_id: group_id,
	group_name: group_name,
	group_des: group_des
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.group_id = '';
$scope.get();
$scope.group_name = '';
$scope.group_des = '';

        });	
};


$scope.Deletecategory = function(group_id){
$http.post("permission_group/Delete",{
	group_id: group_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });	
};




});
	</script>
