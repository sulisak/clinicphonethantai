
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">


<div class="panel panel-default">
	<div class="panel-body">


<button class="btn btn-primary" ng-click="Openmodal()"><?php echo $lang_smuo_12;?></button>
<hr />



<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut">
	<?=$lang_showdel?>
</div>


<input type="text" ng-model="search" name="" placeholder="<?=$lang_search?>" class="form-control" style="width: 200px;">
<br />
<table id="headerTable" class="table table-hover table-bordered">
	<thead  style="background-color: #eee;">
		<tr>
		<th class="text-center" style="width: 10px;"><?=$lang_rank?></th>
			<th class="text-center">ຊື່ຜູ້ໃຊ້ງານ</th>
			<th class="text-center">ກຸ່ມຜູ້ໃຊ້ງານ</th>
			<!-- <th class="text-center"><?php echo $lang_branch;?></th> -->
			<th class="text-center"><?=$lang_email?></th>
			<th><?=$lang_password?></th>

			<th style="width: 100px;"><?=$lang_edit?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list | filter:search">
		<td class="text-center">{{$index+1}}</td>
			<td>{{x.name}}</td>
			<td>
<!-- <span ng-if="x.user_type=='0'">พนักงานเปิดบิลสินค้า</span> -->
<span ng-if="x.user_type=='1'"><?=$lang_staffsale?></span>
<span ng-if="x.user_type=='2'"><?=$lang_staffstock?></span>
<span ng-if="x.user_type=='8'">ລູກຄ້າເບີ່ງສະຕັອກຮ້ານ</span>
<!-- <span ng-if="x.user_type=='3'">พนักงานคุมคลังสินค้าใหญ่</span> -->
<span ng-if="x.user_type=='9'">ໜ້າຈໍ Vendor

<b ng-repeat="v in vendorlist" ng-if="v.supplier_id==x.supplier_id">({{v.supplier_name}})</b>
</span>

<span ng-if="x.user_type=='4'" style="color: green;"><?=$lang_staffadmin?></span>

<span ng-if="x.user_type=='10'">ໜ້າຈໍລູກຄ້າເຊັກລາຄາສິນຄ້າ</span>

<!-- <span ng-repeat="y in grouplist" ng-if="x.user_type==y.group_id">{{y.group_name}}</span> -->


			</td>
			
			<!-- <td class="text-center">
				
				<span ng-repeat="y in branchlist" ng-if="x.branch_id==y.branch_id">
				{{y.branch_name}}
					</span>
					
					<span ng-repeat="y in branchlist" ng-if="x.branch_id=='0'">
				<span ng-if="$index=='0'">	- </span>
					</span>

				
				</td> -->
			
			
			<td>{{x.user_email}}</td>
			<td>***</td>

			<td>
				<button class="btn btn-warning btn-xs" ng-click="Openmodaledit(x)"><?=$lang_edit?></button>
				<button  ng-if="showdeletcbut && x.user_id!='1'" class="btn btn-xs btn-danger" ng-click="Deleteuser(x)">
					<?=$lang_delete?>
				</button>

			</td>
		</tr>

	</tbody>
</table>

<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>



</div>
</div>




<div class="modal fade" id="modalstore">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">



<fieldset ng-show="listbrand.length == '0'">
	<center>
<a href="<?=$base_url?>/storemanager/brand" class="btn btn-danger btn-lg">
	<?=$lang_addbrand?>
</a>
</center>
</fieldset>



<fieldset ng-show="listbrand.length != '0'">
                    <div class="form-group">
                    	<?=$lang_staffname?>
		<input class="form-control" placeholder="<?=$lang_staffname?>" ng-model="user_name" type="text" style="height: 50px;font-size: 20px;">
			    		</div>

<div class="form-group">
	<select ng-disabled="user_id=='1'" id="" class="form-control" ng-model="user_type" style="height: 50px;font-size: 20px;">
		<option value="4"><?=$lang_staffadmin?></option>
		<!-- <option value="0">พนักงานเปิดบิลสินค้า</option> -->
		<option value="1"><?=$lang_staffsale?></option>
		<option value="2"><?=$lang_staffstock?></option>
		<option value="9"> ໜ້າຈໍ Vendor</option>
		<option value="8">ລູກຄ້າເບີ່ງສະຕັອກຮ້ານ</option>
		<option value="10">ໜ້າຈໍລູກຄ້າເຊັກລາຄາສິນຄ້າ</option>
		
		<option ng-repeat="x in grouplist" value="{{x.group_id}}">{{x.group_name}}</option>

		<!-- <option value="3">พนักงานคลังสินค้าใหญ่</option> -->

	</select>
</div>

<div class="form-group" ng-show="user_type=='9'">
	<select class="form-control" ng-model="supplier_id" style="height: 50px;font-size: 20px;">
		<option value="0">ເລືອກ Vendor</option>
		<option ng-repeat="a in vendorlist" value="{{a.supplier_id}}">{{a.supplier_name}}</option>
	</select>
</div>

<!-- <div class="form-group">
	<select id="" class="form-control" ng-model="owner_id" style="height: 50px;font-size: 20px;">
		<option value="0"><?=$lang_selectbrand?></option>
		<option ng-repeat="a in listbrand" value="{{a.owner_id}}">{{a.owner_name}}</option>
	</select>
</div> -->

<!-- <div class="form-group">
	<select class="form-control" ng-model="branch_id" style="height: 50px;font-size: 20px;">
		<option ng-repeat="a in branchlist" value="{{a.branch_id}}">{{a.branch_name}}</option>
	</select>
</div> -->



			    		<!-- <input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Adduser()" value="<?=$lang_save?>" ng-hide="foredit">

<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Edituser()" value="<?=$lang_save?>" ng-show="foredit"> -->



<hr />

<center> <b style="color:red;" >   User ລະຫັດຜ່ານ ສຳຫຼັບ Login ເຂົ້າໂປແກມ</b></center>



<div class="form-group">
	<?=$lang_email?>
			    		    <input class="form-control" placeholder="<?=$lang_email?>" ng-model="user_email" type="text" style="height: 50px;font-size: 20px;">
			    		</div>


			    		<div class="form-group">
			    			<?=$lang_password?>
<i style="color:red;" ng-show="foredit">ວ່າງໄວ້ ຖ້າບໍ່ຕ້ອງການປ່ຽນ</i>
			    		    <input class="form-control" placeholder="<?=$lang_password?>" ng-model="user_password" type="text" style="height: 50px;font-size: 20px;">
			    		</div>



			    		<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Adduser()" value="<?=$lang_save?>" ng-hide="foredit">

<input id="submit" class="btn btn-lg btn-success btn-block" type="submit" ng-click="Edituser()" value="<?=$lang_save?>" ng-show="foredit">

			    	
					
					
					
					
					</fieldset>








			</div>
			<div class="modal-footer">


			</div>
		</div>
	</div>
</div>
















<div class="modal fade" id="showuserpass">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">




<center>
<b style="color:red;">	<?php echo $lang_smuo_8;?> </b>
<br />
<h1>
	
	<b>User: {{user_email}}</b>
	</h1>
	
	
<h1>	
	<b><?php echo $lang_smuo_9;?>: {{user_password}}</b>
	</h1>	

<br />
<button type="button" class="btn btn-success btn-lg" data-dismiss="modal" aria-hidden="true">
<?php echo $lang_smuo_10;?>
	</button>
				
				
</center>






			</div>
			<div class="modal-footer">


			</div>
		</div>
	</div>
</div>







</div>


<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {
$scope.bankaccount = '';
$scope.cfwd = false;
$scope.foredit = false;



$scope.Openmodal = function(){
$('#modalstore').modal('show');
$scope.foredit = false;
$scope.user_id = '';
$scope.owner_id = '1';
$scope.user_email = '';
$scope.user_name = '';
$scope.user_password = '';
$scope.user_type = '4';
$scope.supplier_id = '0';
$scope.branch_id = '1';
};


$scope.Openmodaledit = function(x){
$('#modalstore').modal('show');

$scope.foredit = true;

$scope.user_id = x.user_id;
$scope.owner_id = x.owner_id;
$scope.user_name = x.name;
$scope.user_email = x.user_email;
$scope.user_password = '';
$scope.user_type = x.user_type;
$scope.supplier_id = x.supplier_id;
$scope.branch_id = x.branch_id;

};


$scope.get = function(){

$http.get('User_owner/get')
       .then(function(response){
          $scope.list = response.data;

        });

				$http.get('User_owner/getvendor')
				       .then(function(response){
				          $scope.vendorlist = response.data;

				        });
						
						$http.get('permission_group/get')
       .then(function(response){
          $scope.grouplist = response.data.list; 
                 
        });

   };
$scope.get();


$scope.getbrand = function(){

$http.get('<?php echo $base_url;?>/storemanager/Brand/get')
       .then(function(response){
          $scope.listbrand = response.data;

        });
   };
$scope.getbrand();



$scope.getbranch = function(){

$http.get('<?php echo $base_url;?>/storemanager/Brand/getbranch')
       .then(function(response){
          $scope.branchlist = response.data;

        });
   };
$scope.getbranch();




$scope.Adduser = function(){


	if($scope.user_email != '' && $scope.owner_id != '0' && $scope.user_name != '' && $scope.user_password != ''){
$http.post("User_owner/Add",{
	owner_id: $scope.owner_id,
	name: $scope.user_name,
	user_email: $scope.user_email,
	user_password: $scope.user_password,
	user_type: $scope.user_type,
supplier_id: $scope.supplier_id,
branch_id: $scope.branch_id

	}).success(function(data){


if(data=='dup'){
	toastr.warning('<?=$lang_cannotusethisemail?>');
}else{
toastr.success('<?=$lang_success?>');
$scope.get();
$('#modalstore').modal('hide');
$scope.foredit = false;
}



        });


	}else{
	toastr.warning('<?=$lang_plz?>');
}




};




$scope.Edituser = function(){

	if($scope.user_email != '' && $scope.owner_id != '0' && $scope.user_name != ''){


$http.post("User_owner/Edit",{

    user_id: $scope.user_id,
    owner_id: $scope.owner_id,
	name: $scope.user_name,
	user_email: $scope.user_email,
	user_password: $scope.user_password,
	user_type: $scope.user_type,
supplier_id: $scope.supplier_id,
branch_id: $scope.branch_id

	}).success(function(data){
toastr.success('<?php echo $lang_success;?>');
$scope.get();
$('#modalstore').modal('hide');

if($scope.user_password!=''){
$('#showuserpass').modal({backdrop: "static", keyboard: false});;
}


        });

	}else{
	toastr.warning('<?php echo $lang_smuo_11;?>');
}




};







$scope.Deleteuser = function(x){
$http.post("User_owner/Deleteuser",{
	user_id: x.user_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });
};





});
	</script>
