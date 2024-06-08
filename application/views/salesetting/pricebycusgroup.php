<style>
	.ui-datepicker-year{
		display: none;
	}
</style>

<div class="col-md-10 col-sm-9 lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">

<div class="panel panel-default">
	<div class="panel-body">


<font size="4"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
<?=$lang_settingspacial?>  ({{allmycustomer | number:0}} <?php echo $lang_group;?>) </font>

<hr />




<form class="form-inline">
<div class="form-group">
<input type="text" name="search" ng-model="searchtext" class="form-control"  placeholder="" ng-change="Searchsubmit()">
</div>


</form>


<br />
<table class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee">

			<th width="5px" class="visible-sm visible-md visible-lg">
			<?=$lang_rank?></th>
			<th style="text-align: center;"><?php echo $lang_group;?></th>

<th style="text-align: center;"><?php echo $lang_sspbcg_1;?> </th>

			<th style="text-align: center;"><?=$lang_settingpriceproduct?></th>
		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in mycustomer">
			<td ng-show="selectpage=='1'" class="text-center visible-sm visible-md visible-lg">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center visible-sm visible-md visible-lg">{{($index+1)+(perpage*(selectpage-1))}}</td>


<td align="center"><b style="font-size:20px;font-weight: bold;">
{{x.customer_group_name}}</b></td>
<td align="center">

<select class="form-control" style="font-size:20px;width:90px;font-weight: bold;height: 40px;" 
ng-model="x.customer_group_discountpercent" ng-change="Savediscountpercent(x)">

<?php for($i=0;$i<=100;$i++){
echo '<option value="'.$i.'">
'.$i.'
</option>';
} ?>

</select>
</td>



			<td width="300px" align="center">
<button class="btn btn-warning btn-xs" ng-click="Openmodal(x)"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button>


			</td>


		</tr>

	</tbody>
</table>

<form class="form-inline">
<div class="form-group">
<?=$lang_show?>
<select class="form-control" name="" id="" ng-model="perpage" ng-change="getmycustomer(searchtype,searchtext,'',perpage)">
	<option value="10">10</option>
	<option value="20">20</option>
	<option value="30">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="200">200</option>
	<option value="300">300</option>
</select>

<?=$lang_page?>
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getmycustomer(searchtype,searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>



</form>

	</div>
</div>








<div class="modal fade" id="modalproduct">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"> <?=$lang_settingpriceforcus?> : <b> {{customer_group_name}}  </b></h4>
			</div>
			<div class="modal-body">

<input type="text" ng-model="searchproduct" ng-change="Searchtext()" class="form-control" style="width: 200px;" placeholder="<?=$lang_search?>">
<br />
<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;">
			<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>
			<th style="text-align: center;"> <?=$lang_pricedefault?></th>
			<th style="text-align: center;"><?=$lang_pricecusgroup?></th>
			<th style="text-align: center;"> <?=$lang_editpricespacial?></th>
			<th style="text-align: center;"> <?=$lang_usepricedefault?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in productlist">
			<td>{{x.product_code}}</td>
			<td>{{x.product_name}}</td>
			<td align="right">{{x.product_price | number:2}}</td>
			<td align="right">



			<span ng-repeat="y in productcuslist" ng-show="x.product_id==y.product_id">{{y.product_price_cus_group | number:2}}</span>



<input ng-model="product_price_cus_group" ng-show="editshow && x.product_id==product_id" class="form-control" type="text"  placeholder=" <?=$lang_pricespacial?> 0.00" style="text-align: right;">
			</td>
			<td align="center">

			<button ng-hide="editshow && x.product_id==product_id" class="btn btn-warning btn-xs" ng-click="Editprice(x)">
		<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
			</button>


<button ng-show="editshow && x.product_id==product_id" class="btn btn-default btn-xs" ng-click="Cancelprice()">
		<?=$lang_cancel?></span>
			</button>
			<button ng-show="editshow && x.product_id==product_id" class="btn btn-success btn-xs" ng-click="Saveprice(product_price_cus_group)">
		<?=$lang_save?>
			</button>


			</td>



			<td align="center">

<button ng-repeat="y in productcuslist" ng-show="x.product_id==y.product_id" class="btn btn-default btn-xs" ng-click="Deleteprice(x)">
		<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
			</button>

			</td>
		</tr>
	</tbody>
</table>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>
			</div>
		</div>



	</div>
</div>





























</div>




<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.searchtype = '0';
$scope.searchtext = '';
$scope.selectthispage = '1';

$("#datetime").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th',  // แสดงภาษาไทย
    yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});
$("#datetime2").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th',  // แสดงภาษาไทย
    yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});
$("#datetime3").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th',  // แสดงภาษาไทย
    yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$scope.pagealladd = [];





$scope.perpage = '10';
$scope.getmycustomer = function(searchtype,searchtext,page,perpage){
   if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

$http.post('pricebycusgroup/get',{
'searchtype': searchtype || '',
'searchtext': searchtext || '',
'page': page,
'perpage': perpage
})
       .success(function(data){
          $scope.mycustomer = data.list;
          $scope.pageall = data.pageall;
           $scope.allmycustomer = data.all;
$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;

        });
$('.lodingbefor').css('display','block');

   };
$scope.getmycustomer();


$scope.Refreshsubmit = function(){
$scope.getmycustomer('','');
$scope.searchtype = '0';
$scope.searchtext = '';
$scope.perpage = '10';
};













$scope.Openmodal = function(x){
$('#modalproduct').modal('show');
$scope.customer_group_id = x.customer_group_id;
$scope.customer_group_name = x.customer_group_name;



	$http.post("pricebycusgroup/getproductcusgroup",{
	'customer_group_id': x.customer_group_id,

	}).success(function(data){

$scope.productcuslist = data;

        });



};

$scope.Searchtext =function(){

$http.post("pricebycusgroup/getproduct",{
	'customer_group_id': $scope.customer_group_id,
	'text': $scope.searchproduct

	}).success(function(data){

$scope.productlist = data;

        });	
	
}




$scope.Editprice = function(x){
$scope.product_id = x.product_id;
$scope.product_code = x.product_code;
$scope.product_price_cus_group = '';
$scope.editshow = true;

};

$scope.Cancelprice = function(){
$scope.product_id = '';
$scope.product_code = '';
$scope.product_price_cus_group = '';
$scope.editshow = false;

};




$scope.Saveprice = function(product_price_cus_group){

if(product_price_cus_group != ''){

$http.post("pricebycusgroup/saveprice",{
	'customer_group_id': $scope.customer_group_id,
	'product_id': $scope.product_id,
	'product_code': $scope.product_code,
	'product_price_cus_group': product_price_cus_group

	}).success(function(data){


$scope.product_id = '';
$scope.product_code = '';
$scope.product_price_cus_group = '';
$scope.editshow = false;


	$http.post("pricebycusgroup/getproductcusgroup",{
	'customer_group_id': $scope.customer_group_id,

	}).success(function(data){

$scope.productcuslist = data;
toastr.success('<?=$lang_success?>');

        });




        });
}else{
	toastr.warning('<?=$lang_plz?>');
}


};






$scope.Savediscountpercent = function(x){

$http.post("pricebycusgroup/savediscountpercent",{
	'customer_group_id': x.customer_group_id,
	'customer_group_discountpercent': x.customer_group_discountpercent

	}).success(function(data){


toastr.success('<?=$lang_success?>');


 });


}









$scope.Deleteprice = function(x){

$http.post("pricebycusgroup/deleteprice",{
	'customer_group_id': $scope.customer_group_id,
	'product_id': x.product_id
	}).success(function(data){




	$http.post("pricebycusgroup/getproductcusgroup",{
	'customer_group_id': $scope.customer_group_id,
	
	}).success(function(data){

$scope.productcuslist = data;
toastr.success('เรียบร้อย');

        });




        });



};














$scope.Searchsubmit = function(){
$scope.getmycustomer($scope.searchtype,$scope.searchtext,'1',$scope.perpage);
};



});
	</script>
