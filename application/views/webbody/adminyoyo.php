
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">

<div class="row">
<div class="col-md-12">

<div class="col-md-12 panel panel-body panel-default text-center">






<?php if(isset($_POST['pass']) && $_POST['pass']=='000'){
	$newdata = array(
        'adminyoyo' => $_POST['pass']
);

$this->session->set_userdata($newdata);
	}?>

<?php if(!isset($_SESSION['adminyoyo'])){

echo '<form method="post" action="adminyoyo">
<input type="text" name="pass">
<button type="submit">กด</button>
</form>';

	exit();
	}?>

<h3>
รายการแจ้งโอนเงินต่ออายุ

  </h3>



<table class="table table-hover">
	<thead style="background-color: #eee;">
		<tr>
		<th class="text-center">#</th>
		
			<th class="text-center">จำนวนเงินที่โอน</th>
			<th class="text-center">วันที่โอน</th>
			<th class="text-center">รูป</th>
			<th class="text-center">ชื่อคนโอนในระบบ</th>
			<th class="text-center">โทรติดต่อ</th>
			<th class="text-center">หมายเหตุ</th>
			<th class="text-center">ชำระครั้งแรก</th>
			<th class="text-center">วันที่ทำรายการ</th>
			<th class="text-center">#</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in renewlist">
		<td align="center">			
			<button class="btn btn-success" ng-click="Update_renew(x)">ยืนยัน</button>
		</td>
		
		<td align="center">{{x.total_amount}}</td>
		<td align="center">{{x.time_transfer}}</td>
		<td align="center"><img ng-src="<?php echo $base_url;?>/file/slip/{{x.image}}" style="max-width: 200px;"></td>
		<td align="center">{{x.name}}</td>
		<td align="center">{{x.tel}}</td>
		<td align="center">{{x.remark}}</td>
		<td align="center">
		<span ng-if="x.status_pay=='0'">ครั้งแรก</span>
		<span ng-if="x.status_pay=='1'">ไม่ใช่ครั้งแรก</span>
		</td>
		<td align="center">{{x.create_date}}</td>
		<td align="center">
			
			<button class="btn btn-danger" ng-click="Delete_renew(x)">ลบ</button>
		</td>
		</tr>
	</tbody>
</table>



<hr />


<h3>
รายการเบิกถอนเงิน

  </h3>



<table class="table table-hover">
	<thead style="background-color: #eee;">
		<tr>
		<th class="text-center">#</th>
			<th class="text-center">Affiliate Name</th>
			<th class="text-center">จำนวนที่ถอน</th>
			<th class="text-center">บัญชีธนาคารรับโอน</th>
			<th class="text-center">วันที่เบิก</th>
			
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in withdrawallist">
		<td align="center">			
			<button class="btn btn-success" ng-click="Update_with(x)">โอนแล้ว</button>
		</td>		
		<td align="center">{{x.aff_name}} {{x.aff_tel}}</td>
		<td align="center">{{x.amount | number}}</td>
		<td align="center">{{x.bankaccount}}</td>
		<td align="center">{{x.create_date}}</td>

		</tr>
	</tbody>
</table>



</div>
</div>








</div>


<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$scope.get_renew = function(){
   
$http.get('Adminyoyo/get_renew')
       .then(function(response){
          $scope.renewlist = response.data; 
                 
        });
   };
$scope.get_renew();

$scope.Update_renew = function(x){
$http.post("Adminyoyo/update_renew",{
	owner_id: x.owner_id,
	renew_id: x.renew_id,
	aff_id: x.aff_id,
	aff_income: x.aff_income,
	add_time: x.add_time,
	end_time: x.end_time,
	status_pay: x.status_pay
	}).success(function(data){
toastr.success('เรียบร้อย');
$scope.get_renew();
        });	
};

$scope.Delete_renew = function(x){
$http.post("Adminyoyo/delete_renew",{	
	renew_id: x.renew_id	
	}).success(function(data){
toastr.success('เรียบร้อย');
$scope.get_renew();
        });	
};




$scope.get_with = function(){
   
$http.get('Adminyoyo/get_with')
       .then(function(response){
          $scope.withdrawallist = response.data; 
                 
        });
   };
$scope.get_with();



$scope.Update_with = function(x){
$http.post("Adminyoyo/Update_with",{
	w_id: x.w_id
	}).success(function(data){
toastr.success('เรียบร้อย');
$scope.get_with();
        });	
};

   


});
	</script>