<div class="container" style="width: 500px;" ng-app="mytee" ng-controller="teeCtrl">

<div class="panel panel-default">
		<div class="panel-body">

		<center>
<span style="font-weight: bold;font-size: 20px;color: orange;">C2M POS and Inventory Solution</span>
<br />
(Payment)
</center>
<hr />
ชื่อบัญชี <span style="font-weight: bold;">อาณัติ ปัสสาสัย</span>
        <table class="table table-hover">
        	<thead>
        		<tr style="background-color: #eee;">
        			<th>ธนาคาร</th><th>เลขที่บัญชี</th><th>สาขา</th>
        		</tr>
        	</thead>
        	<tbody>
        		<tr>
        			<td><img src="<?php echo $base_url; ?>/pic/kasikorn.jpg"  width="32px"> กสิกรไทย</td>
        			<td>657-2-14820-1</td>
        			<td>บิ้กซี ร่มเกล้า กทม.</td>
        		</tr>
        		
        	</tbody>
        </table>
		</div>
		</div>


	<div class="panel panel-default">
		<div class="panel-body">
			แจ้งโอนเงิน (Payment Confirm)

<br />
<center><h2>
<?php if(isset($_GET['n'])){ echo  $_GET['n'];} ?>	
	</h2></center>
<form action="add" method="post" enctype="multipart/form-data" >
	
<input type="hidden"  name="owner_id" value="<?php if(isset($_GET['o'])){ echo  $_GET['o'];} ?>">

<hr />
<select class="form-control">
	<option value="1">
		3000 บาท / 1 ปี
	</option>
</select>
<br />
<input type="number" name="total_amount" placeholder="จำนวนเงินที่โอน" class="form-control" required>
<br />
<input type="text" name="time_transfer" placeholder="เวลา วันที่โอนเงิน" class="form-control" required>
<br />
	หลักฐานการโอนเงิน
<input type="file" name="image" class="form-control" accept="image/*">
<br />
<textarea type="text" name="remark" placeholder="หมายเหตุ"  class="form-control"></textarea> 
<br />

<center>
<button class="btn btn-success" type="submit" >ยืนยันการทำรายการ</button>
</center>

</form>



<div class="modal fade" id="success">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				
			</div>
			<div class="modal-body">
		<center>		

<span class="glyphicon glyphicon-ok-sign" aria-hidden="true" style="color: green;font-weight: bold;font-size: 200px;" ></span>
<br />
<span style="font-size: 30px;font-weight: bold;color: green">แจ้งโอนเงินเรียบร้อย</span>

</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>



		</div>
	</div>
</div>


<script>
var app = angular.module('mytee', []);
app.controller('teeCtrl', function($scope,$http) {


<?php 
if(isset($_GET['success'])){
	echo "$('#success').modal('show');";
}
?>

});

</script>