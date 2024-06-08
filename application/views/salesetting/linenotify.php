
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">






<div class="panel panel-default col-md-12">
	<div class="panel-body">
<h4><b>ຕັ້ງຄ່າແຈ້ງເຕືອນສົ່ງເຂົ້າ  LINE Notify</b></h4>
<br />

Token
<input type="text" ng-model="linetoken" style="width:500px;" placeholder="Token" disabled>
<hr />  
 
<select ng-model="whenlogin"><option value="0">ປິດ</option><option value="1">ເປີດ</option></select>
<span ng-if="whenlogin=='1'" class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;"></span> 
ແຈ້ງການ  login 
<br />
<br />
<select ng-model="openshift"><option value="0">ປິດ</option><option value="1">ເປີດ</option></select> 
<span ng-if="openshift=='1'" class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;"></span> 
ແຈ້ງເຕືອນການເປີດກະ
<br />
<br />


<select ng-model="allbill"><option value="0">ປິດ</option><option value="1">ເປີດ</option></select>  
<span ng-if="allbill=='1'" class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;"></span> 
ແຈ້ງຍອດຂາຍທຸກບິນ
<br />
<br />

<select ng-model="stocknoti"><option value="0">ປິດ</option><option value="1">ເປີດ</option></select>  
<span ng-if="stocknoti=='1'" class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;"></span> 
ແຈ້ງເຕືອນ ສະຕັອກເຫຼືອນ້ອຍ/ສະຕັອກໝົດ 
<br />
<br />
<select ng-model="deletebill"><option value="0">ປິດ</option><option value="1">ເປີດ</option></select>  
<span ng-if="deletebill=='1'" class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;"></span> 
ແຈ້ງເຕືອນ ການລົບບິນ
<br />
<br />
<select ng-model="sumsaleshift"><option value="0">ປິດ</option><option value="1">ເປີດ</option></select>  
<span ng-if="sumsaleshift=='1'" class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;"></span> 
ແຈ້ງຍອດຂາຍເມື່ອປິດກະ
<br />
<br />
 
<select ng-model="deleteproduct"><option value="0">ປິດ</option><option value="1">ເປີດ</option></select>  
<span ng-if="deleteproduct=='1'" class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;"></span> 
ແຈ້ງເຕືອນ ເມື່ອມີການລົບລາຍການສິນຄ້າ
<br />
<br />
<select ng-model="editstock"><option value="0">ປິດ</option><option value="1">ເປີດ</option></select>  
<span ng-if="editstock=='1'" class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green;"></span> 
ແຈ້ງເຕືອນ ການແກ້ໄຂສະຕັອກ


<hr /> 


<button class="btn btn-success" ng-click="Saveall()">ບັນທຶກ</button>

</div>
</div>







































	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {
	
		

$scope.getall = function(){

$http.get('Linenotify/getlinenotify')
       .then(function(response){
		   $scope.linetoken = response.data[0].linetoken;
$scope.whenlogin = response.data[0].whenlogin;
$scope.openshift = response.data[0].openshift;
$scope.stocknoti = response.data[0].stocknoti;
$scope.allbill = response.data[0].allbill;
$scope.deletebill = response.data[0].deletebill;
$scope.sumsaleshift = response.data[0].sumsaleshift;
$scope.listsaleshift = response.data[0].listsaleshift;
$scope.deleteproduct = response.data[0].deleteproduct;
$scope.editstock = response.data[0].editstock;

        });
				

   };
$scope.getall();



$scope.Changecheckbox_whenlogin = function(){
	console.log('ddd');
	if($scope.whenlogin==1){
		$scope.whenlogin = 0;
	}else{
		$scope.whenlogin = 1;
	}
}



$scope.Saveall = function(){

$http.post("Linenotify/Updatelinenotify",{
	linetoken: $scope.linetoken,
whenlogin: $scope.whenlogin, 
openshift: $scope.openshift,
stocknoti: $scope.stocknoti,
allbill: $scope.allbill,
deletebill: $scope.deletebill,
sumsaleshift: $scope.sumsaleshift,
listsaleshift: $scope.listsaleshift,
deleteproduct: $scope.deleteproduct,
editstock: $scope.editstock
	}).success(function(data){
toastr.success('<?=$lang_success?>');
        });		

};
















});
	</script>
