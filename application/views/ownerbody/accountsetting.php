

<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">
		

<div class="row">
<div class="col-md-4">
	<input type="text" placeholder="ชื่อ" name="" class="form-control" ng-model="owner_name" >

</div>

<div class="col-md-12">
	<br />
</div>	

<div class="col-md-4">
	<input type="text" placeholder="TAX Number" name="" class="form-control" ng-model="owner_tax_number" >

</div>


	<div class="col-md-12">
	<br />
</div>	


	<div class="col-md-12">
	<br />
</div>	

<div class="col-md-4">
<input type="password" placeholder="รหัสผ่าน" name="" class="form-control" ng-model="owner_password" >
</div>

	<div class="col-md-12">
	<br />
</div>	

		<div class="col-md-12">	
<button type="submit" class="btn btn-success" id="editcustomer" ng-click="EditSubmit()">บันทึก</button>
	</div>	
		


</div>


</div>

</div>

</div>


<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.owner_name = '<?php echo $_SESSION['owner_name']; ?>';
$scope.owner_tax_number = '<?php echo $_SESSION['owner_tax_number']; ?>';
$scope.owner_password = '';

$scope.EditSubmit = function(){
	
	if($scope.owner_password != ''){
$http.post("Accountsetting/update",{
	'owner_name': $scope.owner_name,
	'owner_tax_number': $scope.owner_tax_number,
	'owner_password': $scope.owner_password
	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
        });	

}else{
	toastr.warning('กรุณากรอกรหัสผ่าน!!!');
}

	
	
};






});
	</script>