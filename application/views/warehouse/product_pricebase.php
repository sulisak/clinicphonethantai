
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">








<div class="form-inline">

<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" 
placeholder="<?=$lang_search?> <?php echo $lang_ppb_1;?>" style="width: 350px;" ng-change="getlist(searchtext,'1')">
</div>

<!-- <div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> 
-->



<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>



</div>


<br />
<center>
<img ng-if="!list" src="<?php echo $base_url;?>/pic/loading.gif">
</center>




<div id="openprint_table">



<table ng-if="list" id="headerTable" class="table table-hover table-bordered" style="font-size: 14px;">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;"><?=$lang_rank?></th>
			<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_picproduct?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>
			<!-- <th style="text-align: center;">หมดอายุ</th> -->
			<th style="text-align: center;"><?=$lang_detail?></th>
			<th style="text-align: center;"><?php echo $lang_ppb_2;?></th>



			<!-- <th style="text-align: center;">สินค้าเสริม</th> -->

			<th style="text-align: center;"><?=$lang_category?></th>
			<th style="text-align: center;">Vendor/Supplier</th>
			 <th style="text-align: center;background-color:#5bc0de;"><?=$lang_costperunit?></th>
			<th style="text-align: center;"><?php echo $lang_ppb_3;?></th>
			<!-- <th style="text-align: center;"><?=$lang_wholepriceperunit?></th> -->
			<th style="text-align: center;"><?=$lang_score?></th>
			<th style="text-align: center;"><?=$lang_wherestore?></th>
			
			<th style=""><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in list">
		<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>



<td  align="center">
<b>{{x.product_code}}</b>







</td>



<td align="center">
	<span ng-if="x.product_image!=''">
	<center>
<img ng-src="<?php echo $base_url;?>/{{x.product_image}}" width="70px" height="70px;">
<br />
<button class="btn btn-default btn-xs" ng-click="No_product_image(x)"> <?php echo $lang_ppb_4;?> </button>

</center>
</span>
			</td>

			<td>{{x.product_name}}

			</td>


			<!-- <td>{{x.product_date_end}}</td> -->


			<td>{{x.product_des}}

			</td>



			<td>
<center>
<?=$lang_alertwhen?> <b style="color:red">{{x.product_num_min | number}}</b>
</center>
</td>




<!-- <td>
<button class="btn btn-primary" ng-click="Updatepotmodal(x)" style="width: 120px;">
+สินค้าเสริม({{x.product_num_other | number}})
</button>
</td> -->


			<td>{{x.product_category_name}}</td>




<td>
{{x.supplier_name}}
</td>

			 <td align="right" style="background-color:#5cb85c;font-weight:bold;">{{x.product_pricebase | number:2}}</td>
			<td align="right">{{x.product_price | number:2}}</td>
			<!-- <td align="right">{{x.product_wholesale_price | number:2}}</td>  -->
			<td align="right">{{x.product_score | number}}</td>

			<td align="right">{{x.zone_name}}</td>
			
			

			<td>

				<button class="btn btn-xs btn-warning" ng-click="Editinputproduct(x)"><?=$lang_edit?></button>
				<button ng-show="showdeletcbut" class="btn btn-xs btn-danger" ng-click="Deleteproduct(x)"><?=$lang_delete?></button>
			</td>



		</tr>
	</tbody>
</table>

</div>





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
<select name="" id="" class="form-control" ng-model="page"  ng-change="getlist(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>


</form>




<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>













<div class="modal fade" id="updatematmodal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_edit?> {{matdata.product_name}}</h4>
			</div>
			<div class="modal-body">

				<center>
<h2><?=$lang_num?></h2>
<input type="text" ng-model="product_stock_num_change" class="form-control" style="font-size: 25px;text-align: center;">
<br />

<textarea class="form-control" ng-model="log_edit_des" placeholder="หมายเหตุ..."></textarea>

<br />
<button class="btn btn-success" ng-click="Updatematok()"><?=$lang_save?></button>

</center>

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
				<h4 class="modal-title"><?=$lang_productrelat?> {{potdata.product_name}} 1 {{potdata.product_unit_name}}</h4>
			</div>
			<div class="modal-body">
<?=$lang_relaydetail?>
<input type="text" placeholder="ค้นหาสินค้า" class="form-control" ng-model="search_pot" ng-change="Searchpot(search_pot)">

<table class="table">
	<tr ng-repeat="x in getpotlist">
		<td><button ng-click="Addpot(x)" class="btn btn-xs btn-success" ><?=$lang_add?></button></td>

			<td>{{x.product_name}}</td>
				<td>
<input type="number" placeholder="จำนวน" ng-model="x.product_num_relation" class="form-control">
				</td>
				<td>{{x.product_unit_name}}</td>
	</tr>
</table>
<hr />
<?=$lang_productrelat?> {{potdata.product_name}} 1 {{potdata.product_unit_name}}

<table class="table">
	<tr ng-repeat="x in getproductpotlist">
			<td>{{x.product_name_relation}}</td>
				<td>{{x.product_num_relation}}</td>
				<td>{{x.product_unit_relation}}</td>
				<td><button ng-click="Delpot(x)" class="btn btn-xs btn-danger" ><?=$lang_delete?></button></td>
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
<input type="text" name="product_code"  placeholder="<?=$lang_barcode?> a-z,0-9" class="form-control">
<p></p>
<?=$lang_picproduct?>
<input type="file" name="product_image" accept="image/*" class="form-control" value="">
<p></p>
<?=$lang_productname?>
<input type="text" name="product_name"  placeholder="<?=$lang_productname?>" class="form-control" required="required">
<p></p>


<input type="hidden" id="product_date_end" name="product_date_end"  placeholder="วันหมดอายุ" class="form-control">

<?=$lang_productunit?>
<select class="form-control" name="product_unit_id" >
<option value="0"><?=$lang_select?></option>
					<option ng-repeat="y in unitlist" value="{{y.product_unit_id}}">
						{{y.product_unit_name}}
					</option>
				</select>
<p></p>

<?=$lang_detail?>
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

Supplier
<select class="form-control" name="supplier_id" >
				<option value="0"><?=$lang_select?></option>
					<option ng-repeat="x in supplierlist" value="{{x.supplier_id}}">
						{{x.supplier_name}}
					</option>
				</select>



<p></p>
<?=$lang_cost?>
	<input type="text" name="product_pricebase"  placeholder="<?=$lang_cost?>" class="form-control text-right">



	<p></p>


	ราคา
	<input type="text" name="product_price"  placeholder="ราคา 1" class="form-control text-right">
<p></p>
	
	<input type="text" name="product_wholesale_price"  placeholder="ราคา 2" class="form-control text-right">
<p></p>
	
	<input type="text" name="product_price3"  placeholder="ราคา 3" class="form-control text-right">
<p></p>
	
	<input type="text" name="product_price4"  placeholder="ราคา 4" class="form-control text-right">
<p></p>
	
	<input type="text" name="product_price5"  placeholder="ราคา 5" class="form-control text-right">

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
		<p></p>

นับสต็อก?
<select class="form-control" name="count_stock" >
				<option value="0">นับสต็อก</option>
				<option value="1">ไม่นับสต็อก</option>
				</select>

	<p></p>
	<?=$lang_alertwhennum?>
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











<div class="modal fade" id="Openaddsizecolor">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_addproduct?></h4>
			</div>
			<div class="modal-body">
			
<?=$lang_productname?>
<input type="text" ng-model="product_name_sizecolor"  placeholder="<?=$lang_productname?>" class="form-control" >
<p></p>


	ราคาขาย
	<input type="text" ng-model="product_price_sizecolor"  placeholder="ราคาขาย" class="form-control text-right">
<p></p>

<?=$lang_category?>
<select class="form-control" ng-model="product_category_id_sizecolor" >
<option value="0"><?=$lang_selectcategory?></option>
					<option ng-repeat="y in categorylist" value="{{y.product_category_id}}">
						{{y.product_category_name}}
					</option>
				</select>
<p></p>


<table class="table table-bordered">
<tr>
<td><b>เลือก Size</b>
<br />
<span ng-repeat="x in sizelist">
<input ng-click="Addsizelist(x.product_size_name,price)" type="checkbox" value="1" name="sizename[]">{{x.product_size_name}}<br />
</span>
</td>
<td><b>เลือก สี </b>
<br />
<span ng-repeat="x in colorlist">
<input ng-click="Addcolorlist(x.product_color_name)" type="checkbox" value="1" name="colorname[]">{{x.product_color_name}}<br />
</span>
</td>

</tr>
</table>


	
<button ng-click="Addproductsizecolor()" class="btn btn-success"><?=$lang_save?></button>

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
<center ng-if="product_image!=''">
<img  ng-src="<?php echo $base_url;?>/{{product_image}}" width="70px" height="70px;">

</center>
<?=$lang_picproduct?>
<input type="file" name="product_image" accept="image/*" class="form-control" value="">
<p></p>
<?=$lang_productname?>
<input type="text" name="product_name" id="product_name" placeholder="<?=$lang_productname?>" class="form-control" required="required">
<p></p>


<input type="hidden" name="product_date_end" id="product_date_end2" placeholder="วันหมดอายุ" class="form-control">


<?=$lang_productunit?>
<select class="form-control" name="product_unit_id" id="product_unit_id" >
<option value="0"><?=$lang_select?></option>
					<option ng-repeat="y in unitlist" value="{{y.product_unit_id}}">
						{{y.product_unit_name}}
					</option>
				</select>
<p></p>



<?=$lang_detail?>
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

Vendor/Supplier
<select class="form-control" name="supplier_id" id="supplier_id">
	<option value="0"><?=$lang_select?></option>
					<option ng-repeat="x in supplierlist" value="{{x.supplier_id}}">
						{{x.supplier_name}}
					</option>
				</select>



<p></p>
<?=$lang_cost?>
	<input type="text" name="product_pricebase" id="product_pricebase" placeholder="<?=$lang_cost?>" class="form-control text-right">


	<p></p>
	<?=$lang_price?>
	<input type="text" name="product_price" id="product_price" placeholder="<?php echo $lang_pl_8;?>" class="form-control text-right">


	<p></p>
	<input type="text" name="product_wholesale_price" id="product_wholesale_price" placeholder="<?php echo $lang_pl_9;?>" class="form-control text-right">
<p></p>
	<input type="text" name="product_price3" id="product_price3" placeholder="<?php echo $lang_pl_10;?>" class="form-control text-right">
<p></p>
	<input type="text" name="product_price4" id="product_price4" placeholder="<?php echo $lang_pl_11;?>" class="form-control text-right">
<p></p>
	<input type="text" name="product_price5" id="product_price5" placeholder="<?php echo $lang_pl_12;?>" class="form-control text-right">

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
	
			<p></p>

<?php echo $lang_pl_40;?>
<select class="form-control" name="count_stock" id="count_stock" >
				<option value="0"><?php echo $lang_pl_41;?></option>
				<option value="1"><?php echo $lang_pl_42;?></option>
				</select>

	<p></p>
	
	
		<?=$lang_alertwhennum?>
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
	เลือก<?=$lang_category?>
	<select class="form-control" name="product_category_id" >
	<option value="0"><?=$lang_selectcategory?></option>
						<option ng-repeat="y in categorylist" value="{{y.product_category_id}}">
							{{y.product_category_name}}
						</option>
					</select>
	<p></p>
<input type="file" accept=".csv" id="excel" name="excel" class="btn btn-default">
<br />
<button class="btn btn-success" id="submitexcel" type="submit"><?=$lang_upload?></button>
</form>

<hr />
<font color="red">ใช้ GooGle Sheets
<br />
<b>ไฟล์ => ดาวน์โหลด => .csv</b>
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
$scope.count_stock = '0';
$scope.productlist = [];

$scope.Modalexcel = function(){
$('#Modalexcel').modal('show');
};

$scope.Modaladd = function(){
$('#Openadd').modal('show');
};


$scope.Modaladdsizecolor = function(){
$('#Openaddsizecolor').modal('show');

$http.get('<?php echo $base_url;?>/warehouse/Productcolor/get')
       .then(function(response){
          $scope.colorlist = response.data.list;                 
        });
		
$http.get('<?php echo $base_url;?>/warehouse/Productsize/get')
       .then(function(response){
          $scope.sizelist = response.data.list;           
        });
		
		
};


$scope.sizelist_checked = [];
$scope.Addsizelist = function(x){
$scope.sizelist_checked.push({size_name:x});		
};

$scope.colorlist_checked = [];
$scope.Addcolorlist = function(x){
$scope.colorlist_checked.push({color_name:x});		
};

$scope.product_name_sizecolor ='';
$scope.product_price_sizecolor='';
$scope.product_category_id_sizecolor='0';
$scope.Addproductsizecolor = function(){

$http.post("Productlist/Addsizecolor",{
	product_name: $scope.product_name_sizecolor,
	product_price: $scope.product_price_sizecolor,
	product_category_id: $scope.product_category_id_sizecolor,
	colorlist_checked: $scope.colorlist_checked,
	sizelist_checked: $scope.sizelist_checked
	}).success(function(data){
$('#Openaddsizecolor').modal('hide');

toastr.success('<?=$lang_success?>');
$scope.product_name_sizecolor ='';
$scope.product_price_sizecolor='';
$scope.product_category_id_sizecolor='0';
$scope.getlist();
$scope.sizelist_checked = [];
$scope.colorlist_checked = [];
        });
		
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


$scope.searchtext = '';
$scope.perpage = '10';
$scope.page = '1';
$scope.getlist = function(searchtext,page,perpage){
	$scope.list = false;
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
searchtext:$scope.searchtext,
page: $scope.page,
perpage: $scope.perpage
}).success(function(data){
          $scope.list = data.list;
                 $scope.pageall = data.pageall;
$scope.numall = data.numall;

$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = $scope.page;
$scope.selectthispage = $scope.page;
        });
   };
$scope.getlist();





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
		toastr.success('สำเร็จ');
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
$("#product_price3").val(x.product_price3);
$("#product_price4").val(x.product_price4);
$("#product_price5").val(x.product_price5);
$("#product_pricebase").val(x.product_pricebase);
$("#product_category_id").val(x.product_category_id);
$("#product_unit_id").val(x.product_unit_id);
$("#product_score").val(x.product_score);
$("#zone_id").val(x.zone_id);
$("#count_stock").val(x.count_stock);
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


$scope.No_product_image = function(x){
$http.post("Productlist/Updatenopic",{
	product_id: x.product_id
	}).success(function(data){
toastr.success('นำรูปออกเรียบร้อย');
$scope.getlist($scope.searchtext,$scope.selectthispage,$scope.perpage);

        });
}



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
								toastr.success('สำเร็จ');
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









$scope.Deleteproduct = function(x){
$http.post("Productlist/Delete",{
	product_id: x.product_id,
	product_code: x.product_code,
	product_name: x.product_name,
	product_stock_num: x.product_stock_num
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
$scope.product_stock_num_change = x.product_stock_num;
$scope.log_edit_des = '';
}



$scope.Updatematok = function(){
	if($scope.matdata.product_stock_num !=$scope.product_stock_num_change){
$http.post("Stock/Updatematok",{
product_id: $scope.matdata.product_id,
product_name: $scope.matdata.product_name,
product_code: $scope.matdata.product_code,
product_stock_num: $scope.matdata.product_stock_num,
product_stock_num_change: $scope.product_stock_num_change,
des: $scope.log_edit_des
}).success(function(data){
	$scope.getlist($scope.searchtext,$scope.selectthispage,$scope.perpage);
	$('#updatematmodal').modal('hide');
});

	}

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

$scope.getlist($scope.searchtext,$scope.selectthispage,$scope.perpage);

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
