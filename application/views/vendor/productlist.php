
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<!--
 <div style="float: right;">
	<button class="btn btn-info" ng-click="Modalexcel()">
	<?=$lang_importproductexcel?></button>
</div> -->

<div class="form-group" style="float: left;">
<button class="btn btn-primary" ng-click="Modaladd()"><?=$lang_addproduct?></button>
</div>


<form class="form-inline">

<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="<?=$lang_search?> รหัสบาร์โค้ด, ชื่อสินค้า, หมวดหมู่" style="width: 350px;" ng-change="getlist(searchtext,'1')">
</div>

<!-- <div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->
<div class="form-group">

	<button ng-click="Openbarcodeprint()" class="btn btn-warning" ng-show="barcodeforprint.length > 0">
<span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>
ตัวอย่างก่อนพิมพ์ ({{barcodeforprint.length | number}})
</button>

</div>


</form>

<br />


 <!-- <div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div> -->

<table id="headerTable" class="table table-hover table-bordered" style="font-size: 14px;">
	<!-- <thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;"><?=$lang_rank?></th>
			<th style="text-align: center;"><?=$lang_barcode?><br />พิมพ์ Barcode</th>
			<th style="text-align: center;"><?=$lang_picproduct?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>

			<th style="text-align: center;">รายละเอียด</th>
			<th style="text-align: center;">จำนวน(แก้ไข)</th>

			 <th style="text-align: center;">สินค้าสัมพันธ์</th>


			 <th style="text-align: center;">สินค้าเสริม</th>

			<th style="text-align: center;"><?=$lang_category?></th>
			<th style="text-align: center;">Supplier</th>
			 <th style="text-align: center;"><?=$lang_costperunit?></th>
			<th style="text-align: center;"><?=$lang_priceperunit?></th>
			<th style="text-align: center;"><?=$lang_wholepriceperunit?></th>
			<th style="text-align: center;"><?=$lang_score?></th>
			<th style="text-align: center;"><?=$lang_wherestore?></th>
			<th style=""><?=$lang_manage?></th>
		</tr>
	</thead> -->



	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;"><?=$lang_rank?></th>
			<th style="text-align: center;"><?=$lang_barcode?><br />พิมพ์ Barcode</th>
			<th style="text-align: center;"><?=$lang_picproduct?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>

			<th style="text-align: center;">จำนวน</th>




			<!-- <th style="text-align: center;">สินค้าเสริม</th> -->

			<th style="text-align: center;"><?=$lang_category?></th>
			<th style="text-align: center;">Vendor</th>
			 <th style="text-align: center;"><?=$lang_costperunit?></th>
			<th style="text-align: center;"><?=$lang_priceperunit?></th>

 <th style="text-align: center;">จัดการ</th>
		</tr>
	</thead>





	<tbody>




		<tr ng-repeat="x in list">
		<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>



<td  align="center">
{{x.product_code}}
<br/>
<!-- <a href="<?php echo $base_url; ?>/warehouse/barcode?product_code={{x.product_code}}&product_name={{x.product_name}}&product_price={{x.product_price | number:2}}" class="btn btn-xs btn-default" target="_blank"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span></a> -->

<button ng-click="Select2barcode(x)" class="btn btn-xs">
	<span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>เลือกทีละอัน
</button>

</td>



<td align="center">
<img ng-if="x.product_image!=''" ng-src="<?php echo $base_url;?>/{{x.product_image}}" width="70px" height="70px;">

			</td>

			<td>{{x.product_name}}

			</td>


			<!-- <td>{{x.product_date_end}}</td> -->


			<!-- <td>{{x.product_des}}

			</td> -->



			<td>

	{{x.product_stock_num | number:0}} {{x.product_unit_name}}

<!-- <br />
<center>
เตือนเมื่อเหลือ
<br />
<b style="color:red">{{x.product_num_min | number}}</b>
</center> -->
</td>


 <!-- <td>
<button class="btn btn-default" ng-click="Updatepotmodal(x)" style="width: 50px;">
+({{x.product_num_other | number}})
</button>
</td> -->



<!-- <td>
<button class="btn btn-primary" ng-click="Updatepotmodal(x)" style="width: 120px;">
+สินค้าเสริม({{x.product_num_other | number}})
</button>
</td> -->


			<td>{{x.product_category_name}}</td>




<td>
{{x.supplier_name}}
</td>

			 <td align="right">{{x.product_pricebase | number:2}}</td>
			<td align="right">{{x.product_price | number:2}}</td>
			<!-- <td align="right">{{x.product_wholesale_price | number:2}}</td>
			<td align="right">{{x.product_score | number}}</td>

			<td align="right">{{x.zone_name}}</td> -->

			  <td>

				<button class="btn btn-xs btn-warning" ng-click="Editinputproduct(x)"><?=$lang_edit?></button>
			<!--	<button ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deleteproduct(x.product_id)"><?=$lang_delete?></button>
-->
			</td>



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





<div class="modal fade" id="barcodeprintmodal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ตัวอย่างก่อนพิมพ์

<button ng-click="Printdiv()" class="btn btn-primary">พิมพ์</button>
				</h4>
			</div>
			<div class="modal-body" id="section-to-print" style="">

<div class="col-md-4" ng-repeat="x in barcodeforprint" style="overflow: hidden;float: left;width: 2.425in;text-align:left;border: dotted;border-width: 1px;">
<b style="font-size:16px;"><?php echo $_SESSION['name'];?></b>
<br>
<span style="font-size:12px;">{{x.product_name}}</span>
<br />

<img style="width:210px;height:30px;" src="<?php echo $base_url;?>/warehouse/barcode/png?barcode={{x.product_code}}">

<span style="font-size:14px;float:right;">{{x.product_code}}</span>
<b>{{x.product_price | number:2}}</b>
</div>





			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>









<div class="modal fade" id="updatepotmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">รายการสินค้าสัมพันธ์ ของ {{potdata.product_name}} 1 {{potdata.product_unit_name}}</h4>
			</div>
			<div class="modal-body">
เช่น 1 ลัง มี 12 แพ็ค , 1 ลัง มี  144 ขวด
<input type="text" placeholder="ค้นหาสินค้า" class="form-control" ng-model="search_pot" ng-change="Searchpot(search_pot)">

<table class="table">
	<tr ng-repeat="x in getpotlist">
		<td><button ng-click="Addpot(x)" class="btn btn-xs btn-success" >เพิ่ม</button></td>

			<td>{{x.product_name}}</td>
				<td>
<input type="number" placeholder="จำนวน" ng-model="x.product_num_relation" class="form-control">
				</td>
				<td>{{x.product_unit_name}}</td>
	</tr>
</table>
<hr />
รายการ สินค้าสัมพันธ์ {{potdata.product_name}} 1 {{potdata.product_unit_name}}

<table class="table">
	<tr ng-repeat="x in getproductpotlist">
			<td>{{x.product_name_relation}}</td>
				<td>{{x.product_num_relation}}</td>
				<td>{{x.product_unit_relation}}</td>
				<td><button ng-click="Delpot(x)" class="btn btn-xs btn-danger" >ลบ</button></td>
	</tr>
</table>

</center>

			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>







<div class="modal fade" id="Openadd">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_addproduct?></h4>
			</div>
			<div class="modal-body">
				<form id="uploadImg"  enctype="multipart/form-data" method="POST">

<?=$lang_barcode?>
<input type="text" name="product_code"  placeholder="รหัสสินค้า" class="form-control">
<p></p>
<?=$lang_picproduct?>
<input type="file" name="product_image" accept="image/*" class="form-control" value="">
<p></p>
<?=$lang_productname?>
<input type="text" name="product_name"  placeholder="ชื่อสินค้า" class="form-control" required="required">
<p></p>


<input type="hidden" id="product_date_end" name="product_date_end"  placeholder="วันหมดอายุ" class="form-control">

หน่วยนับ
<select class="form-control" name="product_unit_id" >
<option value="0">เลือก</option>
					<option ng-repeat="y in unitlist" value="{{y.product_unit_id}}">
						{{y.product_unit_name}}
					</option>
				</select>
<p></p>

รายละเอียด
<textarea type="text" class="form-control" name="product_des">
</textarea>
<p></p>


<?=$lang_category?>
<select class="form-control" name="product_category_id" >
<option value="0"><?=$lang_selectcategory?></option>
					<option ng-repeat="y in categorylist" value="{{y.product_category_id}}">
						{{y.product_category_name}}
					</option>
				</select>
<p></p>

Vendor
<select class="form-control" name="supplier_id" disabled>
				<option value="<?php echo $_SESSION['supplier_id']; ?>"><?php echo $_SESSION['name']; ?></option>

				</select>



<p></p>
<?=$lang_cost?>
	<input type="text" name="product_pricebase"  placeholder="<?=$lang_cost?>" class="form-control text-right">



	<p></p>

ราคาขาย
	<input type="text" name="product_price"  placeholder="<?=$lang_priceperunit?>" class="form-control text-right">

	<input type="hidden" name="product_wholesale_price"  placeholder="<?=$lang_wholepriceperunit?>" class="form-control text-right">

<p></p>
	<?=$lang_score?>
	<input type="text" name="product_score"  placeholder="<?=$lang_score?>" class="form-control text-right">

	<p></p>

Zone
<select class="form-control" name="zone_id" >
				<option value="0"><?=$lang_select?></option>
					<option ng-repeat="x in zonelist" value="{{x.zone_id}}">
						{{x.zone_name}}
					</option>
				</select>

	<p></p>
		แจ้งเตือนเมื่อจำนวนเหลือน้อยกว่า
		<input type="text" name="product_num_min"  placeholder="0" class="form-control text-right">

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

<input type="hidden" name="product_id" id="product_id">
<?=$lang_barcode?>
<input type="text" name="product_code" id="product_code" placeholder="<?=$lang_barcode?>" class="form-control">
<p></p>
<input type="hidden" name="product_image2" id="product_image2">
<center>
<img ng-if="product_image!=''" ng-src="<?php echo $base_url;?>/{{product_image}}" width="70px" height="70px;">
</center>
<?=$lang_picproduct?>
<input type="file" name="product_image" accept="image/*" class="form-control" value="">
<p></p>
<?=$lang_productname?>
<input type="text" name="product_name" id="product_name" placeholder="<?=$lang_productname?>" class="form-control" required="required">
<p></p>


<input type="hidden" name="product_date_end" id="product_date_end2" placeholder="วันหมดอายุ" class="form-control">


หน่วยนับ
<select class="form-control" name="product_unit_id" id="product_unit_id" >
<option value="0">เลือก</option>
					<option ng-repeat="y in unitlist" value="{{y.product_unit_id}}">
						{{y.product_unit_name}}
					</option>
				</select>
<p></p>



รายละเอียด
<textarea type="text" class="form-control" name="product_des" id="product_des">
</textarea>
<p></p>
<?=$lang_category?>
<select class="form-control" name="product_category_id" id="product_category_id">
<option value="0"><?=$lang_selectcategory?></option>
					<option ng-repeat="y in categorylist" value="{{y.product_category_id}}">
						{{y.product_category_name}}
					</option>
				</select>
<p></p>

Vendor
<select class="form-control" name="supplier_id" id="supplier_id" disabled>
					<option value="<?php echo $_SESSION['supplier_id']; ?>"><?php echo $_SESSION['name']; ?></option>
					</select>



<p></p>
<?=$lang_cost?>
	<input type="text" name="product_pricebase" id="product_pricebase" placeholder="<?=$lang_cost?>" class="form-control text-right">


	<p></p>
ราคาขาย
	<input type="text" name="product_price" id="product_price" placeholder="<?=$lang_saleprice?>" class="form-control text-right">



	<input type="hidden" name="product_wholesale_price" id="product_wholesale_price" placeholder="<?=$lang_wholepriceperunit?>" class="form-control text-right">

<p></p>
	<?=$lang_score?>
	<input type="text" name="product_score" id="product_score" placeholder="<?=$lang_score?>" class="form-control text-right">

	<p></p>
	Zone
	<select class="form-control" name="zone_id" id="zone_id">
				<option value="0"><?=$lang_select?></option>
					<option ng-repeat="x in zonelist" value="{{x.zone_id}}">
						{{x.zone_name}}
					</option>
				</select>

	<p></p>
		แจ้งเตือนเมื่อจำนวนเหลือน้อยกว่า
		<input type="text" name="product_num_min" id="product_num_min"  placeholder="0" class="form-control text-right">

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




<div class="modal fade" id="Modalexcel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_productlistfromexcel?></h4>
			</div>
			<div class="modal-body text-center">

<form enctype="multipart/form-data" id="formexcel">
<input type="file" accept=".csv" id="excel" name="excel" class="btn btn-default">
<br />
<button class="btn btn-success" id="submitexcel" type="submit"><?=$lang_upload?></button>
</form>

<hr />
<font color="red"><?=$lang_csvexsample?>
<br />
<b>ใช้โปรแกรม  OpenOffice Calc</b>
</font>
<br />
<img src="<?php echo $base_url;?>/pic/imcsv.png">
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



	$("#product_date_end").datetimepicker({
	    timepicker:false,
	        format:'d-m-Y',
	    lang:'th'  // แสดงภาษาไทย
	    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
	    //inline:true

	});

	$("#product_date_end2").datetimepicker({
	    timepicker:false,
	        format:'d-m-Y',
	    lang:'th'  // แสดงภาษาไทย
	    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
	    //inline:true

	});





$scope.product_unit_id = '0';

$scope.product_category_id = '0';
$scope.supplier_id = '0';
$scope.zone_id = '0';
$scope.productlist = [];

$scope.Modalexcel = function(){
$('#Modalexcel').modal('show');
};

$scope.Modaladd = function(){
$('#Openadd').modal('show');
};

$scope.barcodeforprint = [];
$scope.Select2barcode = function(x){
	$scope.barcodeforprint.push({
		product_name: x.product_name,
		product_price: x.product_price,
		product_code: x.product_code,
	});

	toastr.success($scope.barcodeforprint.length+' เพิ่ม '+x.product_code+x.product_name+' ไปปริ้น');
};



$scope.Openbarcodeprint = function(){
	$('#barcodeprintmodal').modal('show');
};


$scope.Printdiv = function(){
	window.print();
};









$scope.getcategory = function(){

$http.get('Productcategory/get')
       .then(function(response){
          $scope.categorylist = response.data.list;

        });
   };
$scope.getcategory();


$scope.getsupplier = function(){

$http.get('Supplier/getlist')
       .then(function(response){
          $scope.supplierlist = response.data.list;

        });
   };
$scope.getsupplier();



$scope.getunit = function(){

$http.get('Productunit/get')
       .then(function(response){
          $scope.unitlist = response.data.list;

        });
   };
$scope.getunit();











$scope.getzone = function(){

$http.get('Zone/getlist')
       .then(function(response){
          $scope.zonelist = response.data.list;

        });
   };
$scope.getzone();










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

 $http.post("Productlist/get",{
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





$scope.Saveproduct = function(product_code,product_name,product_price,product_pricebase,product_category_id,supplier_id,product_score){
$http.post("Productlist/Add",{
	product_code: product_code,
	product_name: product_name,
	product_price: product_price,
	product_pricebase: product_pricebase,
	product_category_id: product_category_id,
	product_score: product_score,
	supplier_id: supplier_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.product_code = '';
$scope.product_name = '';
$scope.product_pricebase = '';
$scope.product_price = '';
$scope.product_score = '';
$scope.getlist();
        });
};



$(document).ready(function (e) {
    $('#uploadImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Productlist/Add',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){

							if(data=='1'){
								toastr.warning('รหัสสินค้า/บาร์โค้ด ซ้ำ');
							}else{
$( "#uploadImg" )[0].reset();
$('#Openadd').modal('hide');
$scope.getlist();
}


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
$("#product_id").val(x.product_id);
$("#product_code").val(x.product_code);
$("#product_name").val(x.product_name);
$("#product_date_end2").val(x.product_date_end);
$("#product_des").val(x.product_des);
$("#product_image2").val(x.product_image);
$("#product_price").val(x.product_price);
$("#product_wholesale_price").val(x.product_wholesale_price);
$("#product_pricebase").val(x.product_pricebase);
$("#product_category_id").val(x.product_category_id);
$("#product_unit_id").val(x.product_unit_id);
$("#product_score").val(x.product_score);
$("#zone_id").val(x.zone_id);
$("#supplier_id").val(x.supplier_id);
$("#product_num_min").val(x.product_num_min);

$scope.product_image = x.product_image;

};

$scope.Cancelproduct = function(product_id){
$scope.product_id = '';
$scope.getlist();
};

/*$scope.Editsaveproduct = function(product_id,product_code,product_name,product_price,product_pricebase,product_category_id,supplier_id){
$http.post("Productlist/Update",{
	product_id: product_id,
	product_code: product_code,
	product_name: product_name,
	product_pricebase: product_pricebase,
	product_price: product_price,
	product_category_id: product_category_id,
	supplier_id: supplier_id
	}).success(function(data){
toastr.success('บันทึกเรียบร้อย');
$scope.product_id = '';
$scope.getlist();

        });
};*/



$(document).ready(function (e) {
    $('#Updatedata').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Productlist/Update',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
							if(data=='1'){
								toastr.warning('รหัสสินค้า/บาร์โค้ด ซ้ำ');
							}else{
$( "#Updatedata" )[0].reset();
$scope.getlist($scope.searchtext,$scope.selectthispage,$scope.perpage);
$('#Openedit').modal('hide');
}
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

});





$scope.Deleteproduct = function(product_id){
$http.post("Productlist/Delete",{
	product_id: product_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getlist();
        });
};






    $("form#formexcel").submit(function () {
var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "Productlist/uploadexcel",
            data:formData,
            processData: false,
   		 	contentType: false,
            success: function () {
               toastr.success('<?=$lang_success?>');
               $('#Modalexcel').modal('hide');
               $scope.getlist('','1');
            }
        });
    });







$scope.Updatematmodal = function(x){
$('#updatematmodal').modal('show');
$scope.matdata = x;
}



$scope.Updatematok = function(){
$http.post("Stock/Updatematok",{
product_id: $scope.matdata.product_id,
product_stock_num: $scope.matdata.product_stock_num
}).success(function(data){
	$scope.getlist($scope.searchtext,$scope.selectthispage,$scope.perpage);
	$('#updatematmodal').modal('hide');
});


}







$scope.Updatepotmodal = function(x){
$('#updatepotmodal').modal('show');
$scope.potdata = x;
$http.post("Productlist/getpotlist",{
product_id: x.product_id
}).success(function(data){

$scope.getproductpotlist = data;

});

}



$scope.Addpot = function(x){
$http.post("Productlist/addpot",{
product_id: $scope.potdata.product_id,
product_name: $scope.potdata.product_name,
product_unit_name: $scope.potdata.product_unit_name,
product_id_relation: x.product_id,
product_num_relation: x.product_num_relation,
product_name_relation: x.product_name,
product_unit_relation: x.product_unit_name
}).success(function(data){


	$http.post("Productlist/getpotlist",{
	product_id: $scope.potdata.product_id
	}).success(function(data){

	$scope.getproductpotlist = data;

	});



});

}



$scope.Delpot = function(x){
$http.post("Productlist/delpot",{
prl_ID: x.prl_ID
}).success(function(data){


	$http.post("Productlist/getpotlist",{
	product_id: $scope.potdata.product_id
	}).success(function(data){

	$scope.getproductpotlist = data;

	});


});

}






$scope.Searchpot = function(s){
$http.post("Productlist/searchpot",{
searchtext: s
}).success(function(data){
$scope.getpotlist = data;
});

}





});
	</script>
