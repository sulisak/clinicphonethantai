
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">




<form class="form-inline">
<div class="form-group">
<button class="btn btn-primary" ng-click="Modaladd()">+ เพิ่มรายการรับฝาก</button>
</div>
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="<?=$lang_search?>" style="width: 300px;" ng-change="getlist(searchtext,'1')">
</div>

<div class="form-group">
<button ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>


<br />


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 60px;">เลขที่</th>
			<th>ผู้ฝาก</th>
			
			<th>สินค้า</th>
			<th>จำนวนเงิน</th>
		
			<th>ดอกเบี้ย%</th>

			<th>เงินดอก</th>

				<th>วันที่ครบกำหนด</th>

				<th><?=$lang_manage?></th>




				<th>สถานะ</th>



			<th style="width: 80px;">แก้ไข</th>

			<th>วันที่เพิ่มข้อมูล</th>
		</tr>
	</thead>
	<tbody>
	



		<tr ng-repeat="x in list">
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

		
			<td align="right">{{x.pawn_percent}}</td>
			<td align="right">{{(x.pawn_percent*x.pawn_money)/100 | number:2}}</td>

				<td align="right">
		<span ng-if="x.end_date < '<?php echo time(); ?>'" style="color: red;font-weight: bold;">เลยกำหนด <p></p></span>
				
				{{x.end_date_date}}
			</td>


			<td>

				<span ng-if="x.pawn_money > '0.00' && x.pawn_status=='0'">
<button class="btn btn-danger btn-sm"  ng-click="Pawnadddatemodal(x)">({{x.pawnnum}}) ต่อดอก</button>
<p></p>
</span>

<span ng-if="x.pawn_status=='0'">
<button class="btn btn-default btn-sm"  ng-click="Pawnprintmodal(x)">พิมพ์</button>
<p></p>
</span>

<span ng-if="x.pawn_money <= '0.00' && x.pawn_status=='0'">
<button   class="btn btn-primary btn-sm" ng-click="Pawnreturnmodal(x)">คืนสินค้า</button>
<p></p>
</span>

<span  ng-if="x.pawn_status!='0'">
<button class="btn btn-default btn-sm" ng-click="Pawnresetmodal(x)">เริ่มใหม่</button>
</span>


			</td>







<td>
	
	<span ng-if="x.pawn_status=='0'">ใหม่</span>
<span ng-if="x.pawn_status=='1'" style="color: orange;font-weight: bold;">นำไปขายแล้ว</span>
<span ng-if="x.pawn_status=='2'" style="color: green;font-weight: bold;">คืนแล้ว</span>
<p></p>
<button ng-if="x.pawn_status!='0'" class="btn btn-default" ng-click="Deleteproduct(x.pawn_id)"><?=$lang_delete?></button>
</td>


			<td>
<button ng-if="x.pawn_status=='0'" class="btn btn-xs btn-warning" ng-click="Editinputproduct(x)"><?=$lang_edit?></button>
<p></p>
<button ng-show="showdeletcbut" class="btn btn-xs btn-default" ng-click="Deleteproduct(x.pawn_id)"><?=$lang_delete?></button>
			</td>

		<td align="right">{{x.add_time_date}}</td>

		</tr>
	</tbody>
</table>







<form class="form-inline">
<div class="form-group">
<?=$lang_show?>
<select class="form-control" name="" id="" ng-model="perpage" ng-change="getlist(searchtext,'1',perpage)">
	<option value="10">10</option>
	<option value="20">20</option>
	<option value="30">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="200">200</option>
	<option value="300">300</option>
	<option value="1000">1000</option>
	<option value="3000">3000</option>
	<option value="5000">5000</option>
	<option value="10000">10000</option>
	<option value="100000">100000</option>
	<option value="1000000">1000000</option>
</select>

<?=$lang_page?>
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getlist(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>


</form>




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
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ต่อดอก / ตัดเงินต้น/ วันครบกำหนด</h4>
			</div>
			<div class="modal-body" style="font-size: 18px;font-weight: bold;">
ลูกค้า: {{pawnadd_cus_name}}				
<center>
ค่าดอก:
<input type="text" ng-model="pawnadd_permoney" class="form-control" style="width: 150px;text-align: right;">
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

<hr />

<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">
			<th>ดอก</th>
			<th>ตัดเงินต้น</th>
			<th>วันที่ทำรายการ</th>
			<th>ลบ</th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in pawnadddatelist">
			<td>{{x.pawnadd_permoney}}</td>
			<td>{{x.pawnadd_cutmoney}}</td>
			<td>{{x.add_time}}</td>
			<td><button ng-if="$index =='0'" class="btn btn-default btn-xs" ng-click="Pawnadddatedel(x)">x</button></td>
		</tr>
	</tbody>
</table>





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
				

<div class="modal-body" id="section-to-print2" style="font-size: 14px;">
		<center>
			<span style="font-size: 35px;font-weight: bold;">ใบขายสินค้า</span>
			<br />
			ร้านค้ายินดีขายคืนในราคาที่กำหนด หากเลยวันที่ครบกำหนดแล้ว
			<br />ทางร้านมีสิทธิในการนำสินค้าของลูกค้าไปขายทอดตลาดได้อย่างถูกต้องตามกฎหมาย
		</center>

<table class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td width="150px">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" height="80px">
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
			<th style="width:100px;">ราคาซื้อคืน</th>
			<th style="width:100px;">วันครบกำหนด</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{pawnprintdata.pawn_id}}</td>
			<td style="width:300px;">{{pawnprintdata.product_name}}</td>
			<td align="center" style="width:50px;">{{pawnprintdata.product_sn}}</td>
<td align="right" style="width:50px;">
{{ParsefloatFunc(pawnprintdata.pawn_money)+ParsefloatFunc((pawnprintdata.pawn_money*pawnprintdata.pawn_percent)/100) | number:2}}
</td>
			<td align="right" style="width:50px;">{{pawnprintdata.end_date_date}}</td>
			
		</tr>
		



	</tbody>
</table>


<table width="100%">
<tr>
	<td style="width: 50%;text-align: center;">
		<b>ผู้รับซื้อ</b>
		<br /><br />

	(x.............................................)
	</td>

	<td style="width: 50%;text-align: center;">
		<b>ผู้ขาย</b>
		<br /><br />
	(x.............................................) เบอร์โทร................
	</td>
</tr>
</table>

<center>
<br />
อนึ่ง ผู้รับซื้อเก็บสินค้าที่ผู้ขายนำมาขายให้อย่างปลอดภัยและไม่นำออกไปจัดจำหน่ายให้ผู้อื่นเมื่อก่อนถึงกำหนด
<br />
__________________________________________________________________
</center>





<center>
			<span style="font-size: 35px;font-weight: bold;">ใบขายสินค้า</span>
			<br />
			ร้านค้ายินดีขายคืนในราคาที่กำหนด หากเลยวันที่ครบกำหนดแล้ว
			<br />ทางร้านมีสิทธิในการนำสินค้าของลูกค้าไปขายทอดตลาดได้อย่างถูกต้องตามกฎหมาย
		</center>

<table class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td width="150px">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" height="80px">
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
			<th style="width:100px;">ราคาซื้อคืน</th>
			<th style="width:100px;">วันครบกำหนด</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{pawnprintdata.pawn_id}}</td>
			<td style="width:300px;">{{pawnprintdata.product_name}}</td>
			<td align="center" style="width:50px;">{{pawnprintdata.product_sn}}</td>
<td align="right" style="width:50px;">
{{ParsefloatFunc(pawnprintdata.pawn_money)+ParsefloatFunc((pawnprintdata.pawn_money*pawnprintdata.pawn_percent)/100) | number:2}}
</td>
			<td align="right" style="width:50px;">{{pawnprintdata.end_date_date}}</td>
			
		</tr>
		



	</tbody>
</table>


<table width="100%">
<tr>
	<td style="width: 50%;text-align: center;">
		<b>ผู้รับซื้อ</b>
		<br /><br />

	(x.............................................)
	</td>

	<td style="width: 50%;text-align: center;">
		<b>ผู้ขาย</b>
		<br /><br />
	(x.............................................) เบอร์โทร................
	</td>
</tr>
</table>

<center>
<br />
อนึ่ง ผู้รับซื้อเก็บสินค้าที่ผู้ขายนำมาขายให้อย่างปลอดภัยและไม่นำออกไปจัดจำหน่ายให้ผู้อื่นเมื่อก่อนถึงกำหนด

</center>









			</div>


			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-primary" ng-click="printDiv()">Print</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>












<div class="modal fade" id="Pawnreturnmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">คืนสินค้าให้ผู้ฝาก</h4>
			</div>
			<div class="modal-body">
				

<center>
<button type="button" class="btn btn-success btn-lg" ng-click="Pawnreturnconfirm()">ยืนยัน</button>
</center>


			</div>
			<div class="modal-footer">
				
				
			</div>
		</div>
	</div>
</div>









<div class="modal fade" id="Pawnresetmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">เริ่มทำรายการนี้ใหม่ ต่อดอก ตัดเงินต้น</h4>
			</div>
			<div class="modal-body">
				

<center>
<button type="button" class="btn btn-success btn-lg" ng-click="Pawnresetconfirm()">ยืนยัน</button>
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



$scope.perpage = '10';
$scope.getlist = function(searchtext,page,perpage){
    if(!searchtext){
   	searchtext = '';
   }


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

 $http.post("Pawnlist/get",{
searchtext:searchtext,
page: page,
perpage: perpage
}).success(function(data){
          $scope.list = data.list; 
                 $scope.pageall = data.pageall;
$scope.numall = data.numall;

$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;
        });
   };
$scope.getlist('','1');






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
$scope.pawnadd_product_name = x.product_name;
$scope.pawnadd_product_sn = x.product_sn;

$http.post("Pawnlist/Pawnadddatelist",{
	pawn_id: x.pawn_id
	}).success(function(data){
$scope.pawnadddatelist = data;
        });	


};




$scope.Pawnadddatedel = function(x){

$http.post("Pawnlist/Pawnadddatedel",{
	p_id: x.p_id,
	pawn_id: x.pawn_id,
	pawn_money: x.pawnadd_cutmoney
	}).success(function(data){

        });	


$http.post("Pawnlist/Pawnadddatelist",{
	pawn_id: x.pawn_id
	}).success(function(data){
$scope.pawnadddatelist = data;
        });	


$scope.getlist();

};




$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};



$scope.Pawnadddateok = function(){
$http.post("Pawnlist/Pawnadddateok",{
	pawn_id: $scope.pawn_id,
	product_name: $scope.pawnadd_product_name,
	product_sn: $scope.pawnadd_product_sn,
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




$scope.Pawnreturnmodal = function(x){
$('#Pawnreturnmodal').modal('show');
$scope.pawnreturndata = x;
};




$scope.Pawnreturnconfirm = function(){
$http.post("Pawnlist/Pawnreturnconfirm",{
	pawn_id: $scope.pawnreturndata.pawn_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getlist();
$('#Pawnreturnmodal').modal('hide');
        });	
};










$scope.Pawnresetmodal = function(x){
$('#Pawnresetmodal').modal('show');
$scope.pawnresetdata = x;
};




$scope.Pawnresetconfirm = function(){
$http.post("Pawnlist/Pawnresetconfirm",{
	pawn_id: $scope.pawnresetdata.pawn_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getlist();
$('#Pawnresetmodal').modal('hide');
        });	
};






});
	</script>
