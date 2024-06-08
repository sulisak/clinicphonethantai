
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="row">
<div class="col-md-12">

<div class="col-md-3 panel panel-body panel-default text-center">
<h3>
<span style="color: red;font-weight: bold;">  </span> บาท
<br />
ยอดเงินที่ถอนได้   </h3>
</div>



<div class="col-md-3 panel panel-body panel-default text-center">
<h3> บาท 
<br />  รายได้รวม </h3>
</div>


<div class="col-md-3 panel panel-body panel-default text-center">
<h3>
   คน
  <br /> 
ผู้สมัครที่ชำระเงิน </h3>
</div>

<div class="col-md-3 panel panel-body panel-default text-center">
<h3>
 คน
<br /> 
ผู้สมัครทั้งหมด 

</h3>
</div>








</div>
</div>



<div class="panel panel-default">
	<div class="panel-body">

<span style="font-size: 15px;font-weight: bold;">รายการผู้สมัครที่สมัครผ่านลิงค์ของคุณ</span>
<table class="table table-hover">
	<thead style="background-color: #eee;">
		<tr>
		<th style="width: 5px;"></th>
		<th class="text-center">Tag ติดตาม</th>
			<th class="text-center">id ผู้สมัคร</th>
			<th class="text-center">สถานะการจ่ายค่าบริการ</th>
			<th class="text-center">วันที่สมัครสมาชิก</th>
			<th class="text-center">รายได้ของคุณ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in datalist">
		<td  align="center"><span class="glyphicon glyphicon-ok" aria-hidden="true" style="color: green;font-weight: bold;" ng-if="x.status_pay == '1'"></span></td>
		<td align="center">{{x.aff_tag}}</td>
			<td align="center">{{x.owner_id}}</td>
			<td align="center">
			<span ng-if="x.status_pay=='1'" style="color: green;font-weight: bold;">ชำระเงินแล้ว</span>
			<span ng-if="x.status_pay=='0'">-</span>
			</td>
			<td align="center">{{x.time}}</td>
			<td align="center">
			<span ng-if="x.status_pay=='1'"  style="color: green;font-weight: bold;">{{x.aff_income}}</span>
			<span ng-if="x.status_pay=='0'">-</span>
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



$scope.get = function(){
   
$http.get('Dashboard/get_list_owner')
       .then(function(response){
          $scope.datalist = response.data; 
                 
        });
   };
$scope.get();




   


});
	</script>