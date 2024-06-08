
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">




<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="<?=$lang_search?>" style="width: 300px;">
</div>


</form>


<br />


<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 60px;">เลขที่</th>
			<th>ผู้ฝาก</th>
			
			<th>สินค้า</th>
			<th>จำนวนเงิน</th>

				<th>วันที่ครบกำหนด</th>

			<th>วันที่เพิ่มข้อมูล</th>

			<th>จัดการ</th>
		</tr>
	</thead>
	<tbody>
	



		<tr ng-repeat="x in list | filter:searchtext">
		<td class="text-center">{{x.pawn_id}}</td>

			<td><b>ชื่อ-นามสกุล</b>:{{x.cus_name}}
				<br />
<b>เลขบัตรประชาชน</b>: {{x.cus_code}}
<br />
<b>ที่อยู่</b>: {{x.cus_address}}
<br />
<b>เบอร์โทร</b>: {{x.cus_tel}}
			</td>
			
			<td>{{x.product_name}}
<br />
<b>S/N</b>: {{x.product_sn}}
			</td>


<td>
{{x.pawn_money | number:2}}
</td>

		
			

				<td align="right">
		<span ng-if="x.end_date < '<?php echo time(); ?>'" style="color: red;font-weight: bold;">เลยกำหนด</span>
		<br />			
				{{x.end_date_date}}
			</td>


<td align="right">{{x.add_time_date}}</td>

			<td>

			<button ng-if="x.pawn_status=='0'"  class="btn btn-primary" ng-click="Pawngosalemodal(x)">นำไปขาย</button>
<span ng-if="x.pawn_status=='1'" style="color: orange;font-weight: bold;">
	นำไปขายแล้ว
	<br />
</span>

<button ng-if="x.pawn_status!='0'" class="btn btn-default" ng-click="Deleteproduct(x.pawn_id)"><?=$lang_delete?></button>
			</td>

		

		</tr>
	</tbody>
</table>











<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>





<div class="modal fade" id="Openadd">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เพิ่มรายการรับฝาก</h4>
			</div>
			<div class="modal-body">
				<form id="uploadImg"  enctype="multipart/form-data" method="POST">

ชื่อ-นามสกุล ผู้ฝาก
<input type="text" name="cus_name"  placeholder="" class="form-control">
<p></p>
เลขบัตรประชานชน ผู้ฝาก
<input type="text" name="cus_code"  placeholder="" class="form-control">
<p></p>
ที่อยู่ ผู้ฝาก
<textarea type="text" name="cus_address"  placeholder="" class="form-control"></textarea> 
<p></p>
เบอร์โทร ผู้ฝาก
<input type="text" name="cus_tel"  placeholder="" class="form-control">
<hr />

ชื่อสินค้า ที่ฝาก
<input type="text" name="product_name"  placeholder="" class="form-control">
<p></p>
S/N สินค้า ที่ฝาก
<input type="text" name="product_sn"  placeholder="" class="form-control">
<p></p>
จำนวนเงิน
<input type="text" name="pawn_money"  placeholder="" class="form-control">
<p></p>
ดอกเบี้ย %
<input type="text" name="pawn_percent"  placeholder="" class="form-control">

<p></p>
วันที่ครบกำหนด
<input type="text" id="end_date" name="end_date"  placeholder="" class="form-control">
<p></p>



<button class="btn btn-success" type="submit"><?=$lang_save?></button>
</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Openedit">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_edit?></h4>
			</div>
			<div class="modal-body">
				<form id="Updatedata"  enctype="multipart/form-data" method="POST">

<input type="hidden" name="pawn_id" id="pawn_id"  placeholder="" class="form-control">

ชื่อ-นามสกุล ผู้ฝาก
<input type="text" name="cus_name" id="cus_name"  placeholder="" class="form-control">
<p></p>
เลขบัตรประชานชน ผู้ฝาก
<input type="text" name="cus_code" id="cus_code"  placeholder="" class="form-control">
<p></p>
ที่อยู่ ผู้ฝาก
<textarea type="text" name="cus_address"  id="cus_address" placeholder="" class="form-control"></textarea> 
<p></p>
เบอร์โทร ผู้ฝาก
<input type="text" name="cus_tel" id="cus_tel"  placeholder="" class="form-control">
<hr />

ชื่อสินค้า ที่ฝาก
<input type="text" name="product_name" id="product_name"  placeholder="" class="form-control">
<p></p>
S/N สินค้า ที่ฝาก
<input type="text" name="product_sn" id="product_sn"  placeholder="" class="form-control">
<p></p>
จำนวนเงิน
<input type="text" name="pawn_money" id="pawn_money"  placeholder="" class="form-control">
<p></p>
ดอกเบี้ย %
<input type="text" name="pawn_percent" id="pawn_percent"  placeholder="" class="form-control">

<p></p>
วันที่ครบกำหนด
<input type="text" name="end_date" id="end_date_e"  placeholder="" class="form-control">
<p></p>



<button class="btn btn-success" type="submit"><?=$lang_save?></button>
</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				
			</div>
		</div>
	</div>
</div>






<div class="modal fade" id="Pawnadddatemodal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ต่อดอก / ตัดเงินต้น/ วันครบกำหนด</h4>
			</div>
			<div class="modal-body" style="font-size: 18px;font-weight: bold;">
ลูกค้า: {{pawnadd_cus_name}}				
<center>
ค่าดอก: {{pawnadd_permoney | number:2}}
<br />
ตัดเงินต้น :
<input type="text" ng-model="pawnadd_cutmoney" class="form-control" style="width: 150px;text-align: right;">
<br />
รวมเงิน : <span style="color: red;">{{ParsefloatFunc(pawnadd_permoney)+ParsefloatFunc(pawnadd_cutmoney) | number:2}}</span>
<br /><br />
เปลี่ยนวันครบกำหนด	
<input type="text" id="pawnadd_adddate" ng-model="pawnadd_adddate" class="form-control" style="width: 150px;">

<br />
<button type="button" class="btn btn-success" ng-click="Pawnadddateok()">รับเงิน</button>

				</center>

			</div>
			<div class="modal-footer">
		
				
			</div>
		</div>
	</div>
</div>








<div class="modal fade" id="Pawnprintmodal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				

<div class="modal-body" id="section-to-print">
		<center>
			<h1>ใบรับฝาก</h1>
			(สำหรับผู้ฝาก)
		</center>

<table class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td width="150px">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
</td>
		<td>
		<b>	<?php echo $_SESSION['owner_name']; ?> </b>
		<br />
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
<br />
<?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>

</td>
</tr>
<tr>
			<td colspan="2">
	<?=$lang_cusname?>: {{pawnprintdata.cus_name}}	
	<br />
	เลขบัตรประชาชน: {{pawnprintdata.cus_code}}
<br />
	 <?=$lang_address?>: {{pawnprintdata.cus_address}}
	 <br />
	 เบอร์โทร: {{pawnprintdata.cus_tel}}
</td>
</tr>
</table>

<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width:50px;">เลขที่</th>
			<th style="width:300px;"><?=$lang_productname?></th>
			<th style="width:100px;">S/N</th>
			<th style="width:100px;">เงิน</th>
			<th style="width:100px;">วันครบกำหนด</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{pawnprintdata.pawn_id}}</td>
			<td style="width:300px;">{{pawnprintdata.product_name}}</td>
			<td align="center" style="width:50px;">{{pawnprintdata.product_sn}}</td>
			<td align="right" style="width:50px;">{{pawnprintdata.pawn_money | number:2}}</td>
			<td align="right" style="width:50px;">{{pawnprintdata.end_date_date}}</td>
			
		</tr>
		



	</tbody>
</table>


<table width="100%">
<tr>
	<td style="width: 50%;text-align: center;">
		<b>ผู้ฝาก</b>
		<br /><br />
	-------------------------
		<br />
	(__________________)
	</td>

	<td style="width: 50%;text-align: center;">
		<b>ผู้รับฝาก</b>
		<br /><br />
	-------------------------
		<br />
	(__________________)
	</td>
</tr>
</table>


<br />
<center>
--------------------------------------------------------------------------------------------------------------
</center>



<center>
			<h1>ใบรับฝาก</h1>
			(สำหรับผู้รับฝาก)
		</center>

<table class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td width="150px">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
</td>
		<td>
		<b>	<?php echo $_SESSION['owner_name']; ?> </b>
		<br />
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
<br />
<?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>

</td>
</tr>
<tr>
			<td colspan="2">
	<?=$lang_cusname?>: {{pawnprintdata.cus_name}}	
	<br />
	เลขบัตรประชาชน: {{pawnprintdata.cus_code}}
<br />
	 <?=$lang_address?>: {{pawnprintdata.cus_address}}
	 <br />
	 เบอร์โทร: {{pawnprintdata.cus_tel}}
</td>
</tr>
</table>

<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="width:50px;">เลขที่</th>
			<th style="width:300px;"><?=$lang_productname?></th>
			<th style="width:100px;">S/N</th>
			<th style="width:100px;">เงิน</th>
			<th style="width:100px;">วันครบกำหนด</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{pawnprintdata.pawn_id}}</td>
			<td style="width:300px;">{{pawnprintdata.product_name}}</td>
			<td align="center" style="width:50px;">{{pawnprintdata.product_sn}}</td>
			<td align="right" style="width:50px;">{{pawnprintdata.pawn_money | number:2}}</td>
			<td align="right" style="width:50px;">{{pawnprintdata.end_date_date}}</td>
			
		</tr>
		



	</tbody>
</table>


<table width="100%">
<tr>
	<td style="width: 50%;text-align: center;">
		<b>ผู้ฝาก</b>
		<br /><br />
	-------------------------
		<br />
	(__________________)
	</td>

	<td style="width: 50%;text-align: center;">
		<b>ผู้รับฝาก</b>
		<br /><br />
	-------------------------
		<br />
	(__________________)
	</td>
</tr>
</table>









			</div>


			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-primary" ng-click="printDiv()">Print</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>












<div class="modal fade" id="Pawngosalemodal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">นำไปขาย เข้าระบบการขาย</h4>
			</div>
			<div class="modal-body">
				
<center><b>จำนวน 1 ชิ้น</b></center>
รหัสสินค้า
<input type="text" ng-model="pawngosaledata.product_sn" class="form-control">
<p></p>
ชื่อสินค้า
<input type="text" ng-model="pawngosaledata.product_name" class="form-control">

<input type="hidden" ng-model="pawngosaledata.pawn_money" class="form-control">
<p></p>
ราคาขาย
<input type="text" ng-model="pawngosaledata_saleprice" class="form-control">
<p></p>





<center>
<button type="button" class="btn btn-success btn-lg" ng-click="Pawngosaleconfirm()">ยืนยัน</button>
</center>


			</div>
			<div class="modal-footer">
				
				
			</div>
		</div>
	</div>
</div>










	</div>


	</div>

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.productlist = [];


$scope.Modaladd = function(){
$('#Openadd').modal('show');
};



$("#end_date").datetimepicker({  
    timepicker:false,  
        format:'d-m-Y',
    lang:'th' 
}); 

$("#end_date_e").datetimepicker({  
    timepicker:false,  
        format:'d-m-Y',
    lang:'th' 
}); 

$("#pawnadd_adddate").datetimepicker({  
    timepicker:false,  
        format:'d-m-Y',
    lang:'th' 
}); 



$("#end_date").val('<?php echo date('d-m-Y',time());?>');




$scope.getlist = function(){
    

 $http.post("Pawnlist/getenddate",{
}).success(function(data){
          $scope.list = data.list; 
                 
        });
   };
$scope.getlist();






$(document).ready(function (e) {
    $('#uploadImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Pawnlist/Add',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){ 
$( "#uploadImg" )[0].reset();
$('#Openadd').modal('hide');
$scope.getlist();


            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

 
});



$scope.Editinputproduct = function(x){
	$('#Openedit').modal('show');
$("#pawn_id").val(x.pawn_id);

$("#cus_name").val(x.cus_name);
$("#cus_code").val(x.cus_code);
$("#cus_address").val(x.cus_address);
$("#cus_tel").val(x.cus_tel);
$("#product_name").val(x.product_name);
$("#product_sn").val(x.product_sn);
$("#pawn_money").val(x.pawn_money);
$("#pawn_percent").val(x.pawn_percent);
$("#end_date_e").val(x.end_date_date);


};




$(document).ready(function (e) {
    $('#Updatedata').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Pawnlist/Update',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){ 
$( "#Updatedata" )[0].reset();
$scope.getlist('',$scope.selectthispage,$scope.perpage);
$('#Openedit').modal('hide');
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

});





$scope.Deleteproduct = function(pawn_id){
$http.post("Pawnlist/Delete",{
	pawn_id: pawn_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getlist();
        });	
};

   





$scope.Pawnadddatemodal = function(x){
$('#Pawnadddatemodal').modal('show');

$scope.pawn_id = x.pawn_id;
$scope.pawnadd_cutmoney = '0';
$scope.pawnadd_cus_name = x.cus_name;
$scope.pawnadd_permoney = (x.pawn_money*x.pawn_percent)/100;
$scope.pawnadd_adddate = x.end_date_date;

};


$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};



$scope.Pawnadddateok = function(){
$http.post("Pawnlist/Pawnadddateok",{
	pawn_id: $scope.pawn_id,
	pawnadd_cutmoney: $scope.pawnadd_cutmoney,
	pawnadd_permoney: $scope.pawnadd_permoney,
	pawnadd_adddate: $scope.pawnadd_adddate
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getlist();
$('#Pawnadddatemodal').modal('hide');
        });	
};









$scope.Pawnprintmodal = function(x){
$('#Pawnprintmodal').modal('show');

$scope.pawnprintdata = x;
setTimeout(function(){ 
$scope.printDiv();
 }, 1000);
};




$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();

};




$scope.Pawngosalemodal = function(x){
$('#Pawngosalemodal').modal('show');
$scope.pawngosaledata = x;
$scope.pawngosaledata_saleprice = $scope.pawngosaledata.pawn_money;
};




$scope.Pawngosaleconfirm = function(){
$http.post("Pawnlist/Pawngosaleconfirm",{
	pawn_id: $scope.pawngosaledata.pawn_id,
	product_code: $scope.pawngosaledata.product_sn,
	product_name: $scope.pawngosaledata.product_name,
	product_pricebase: $scope.pawngosaledata.pawn_money,
	product_price: $scope.pawngosaledata_saleprice
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getlist();
$('#Pawngosalemodal').modal('hide');
        });	
};





});
	</script>
