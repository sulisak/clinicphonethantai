

<div class="col-md-10 col-sm-10 lodingbefor" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">
		

<font size="4">รายงานลูกค้า  <a class="btn btn-primary"  style="float: right" ng-click="Openaddnewcus()">เพิ่มระดับลูกค้าใหม่</a></font>

<hr />





<br />
<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee">
			
			<th>ชื่อระดับ</th>
			<th>หมายเหตุ</th>
			
			<th>จัดการ</th>
		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in customerlevel">
			



			<td>{{x.customer_level_name}}</td>
			<td>{{x.customer_level_remark}}</td>
			<td width="90px">
<button class="btn btn-warning btn-xs" ng-click="Editrow(x)">แก้ไข</button>
<button ng-if="Showdelbut" class="btn btn-danger btn-xs" id="deletecustomer" ng-click="Delete(x.customer_level_id)">ลบ</button>
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
				<h4 class="modal-title">เพิ่มระดับลูกค้าใหม่</h4>
			</div>
			<div class="modal-body">


<div class="row">
<div class="col-md-12">
	<input type="text" placeholder="ชื่อระดับลูกค้า" name="" class="form-control" ng-model="customer_level_name" required>

</div>


	<div class="col-md-12">
	<br />
</div>	

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="หมายเหตุ" ng-model="customer_level_remark">
</textarea> 
</div>

				

		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
<button type="submit" class="btn btn-success" id="savenewcustomer" ng-click="SaveSubmit(customer_level_name,customer_level_remark)">บันทึก</button>
			</div>
		</div>



	</div>
</div>








</div>






<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {



$scope.Openaddnewcus = function(){
	$('#modal-id').modal('show');

};








});
	</script>