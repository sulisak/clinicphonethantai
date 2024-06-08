
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">



<form class="form-inline">

<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" 
placeholder="<?=$lang_search?> <?php echo $lang_plf_1;?>" style="width: 350px;" ng-change="pregetlist(searchtext,'1')">
</div>

<!-- <div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->

</form>



<center>
<img ng-if="!listkey" src="<?php echo $base_url;?>/pic/loading.gif">
</center>
<br />
<table id="headerTable" class="table table-hover table-bordered" style="font-size: 14px;">
	<thead>
		<tr style="background-color: #eee;">
			<th style="width: 50px;"><?=$lang_rank?></th>
			<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_picproduct?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>
			<!-- <th style="text-align: center;">หมดอายุ</th> -->
			<th style="text-align: center;"><?php echo $lang_detail;?></th>
			<th style="text-align: center;"><?php echo $lang_qty;?></th>
			<!-- <th style="text-align: center;">สินค้าเสริม</th> -->

			<th style="text-align: center;"><?=$lang_category?></th>
			<!-- <th style="text-align: center;">Supplier</th> -->
			 <!-- <th style="text-align: center;"><?=$lang_costperunit?></th> -->
			<th style="text-align: center;"><?=$lang_priceperunit?></th>
			<!-- <th style="text-align: center;"><?=$lang_wholepriceperunit?></th> -->
			<th style="text-align: center;"><?=$lang_score?></th>
			<th style="text-align: center;"><?=$lang_wherestore?></th>

		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in list">
		<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>



<td  align="center">
{{x.product_code}}
</td>



<td align="center">
<img ng-if="x.product_image!=''" ng-src="<?php echo $base_url;?>/{{x.product_image}}" width="70px" height="70px;">

			</td>

			<td>{{x.product_name}}

			</td>


			<!-- <td>{{x.product_date_end}}</td> -->


			<td>{{x.product_des}}

			</td>



			<td align="center">

<span ng-if="x.product_stock_num < 1" style="color:red;">0</span>
<span ng-if="x.product_stock_num > 0" style="color:green;">{{x.product_stock_num | number}}</span>
</td>

<!-- <td>
<button class="btn btn-primary" ng-click="Updatepotmodal(x)" style="width: 120px;">
+สินค้าเสริม({{x.product_num_other | number}})
</button>
</td> -->


			<td>{{x.product_category_name}}</td>




<!-- <td>
{{x.supplier_name}}
</td> -->

			 <!-- <td align="right">{{x.product_pricebase | number:2}}</td> -->
			<td align="right">{{x.product_price | number:2}}</td>
			<!-- <td align="right">{{x.product_wholesale_price | number:2}}</td>   -->
			<td align="right">{{x.product_score | number}}</td>

			<td align="right">{{x.zone_name}}</td>





		</tr>
	</tbody>
</table>







<form class="form-inline">
<div class="form-group">
<?=$lang_show?>
<select class="form-control" name="" id="" ng-model="perpage" ng-change="getlist(searchtext,'1',perpage)">
	<!-- <option value="10">10</option>
	<option value="20">20</option>
	<option value="30">30</option>
	<option value="50">50</option> -->
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













<div class="modal fade" id="updatematmodal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">แก้ไขจำนวนของ {{matdata.product_name}}</h4>
			</div>
			<div class="modal-body">

				<center>
<h2>จำนวน</h2>
<input type="text" ng-model="matdata.product_stock_num" class="form-control" style="font-size: 25px;text-align: center;">
<br />
<button class="btn btn-success" ng-click="Updatematok()">บันทึก</button>

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







$scope.product_category_id = '0';
$scope.supplier_id = '0';
$scope.zone_id = '0';
$scope.productlist = [];


//start ค้นหาสินค้าทั้งหมด
$scope.searchtextarray = [];
$scope.searchtextarray2 = [];
$scope.pregetlist = function(){
$scope.searchtextarray.push($scope.searchtext);
setTimeout(function(){
$scope.searchtextarray2.push($scope.searchtext);
	if($scope.searchtextarray2[0]==$scope.searchtextarray[$scope.searchtextarray.length-1]){
		$scope.getlist();
		}		
$scope.searchtextarray = [];
$scope.searchtextarray2 = [];
	}, 1000);
}
//end ค้นหาสินค้าทั้งหมด




$scope.searchtext = '';
$scope.page = '1';
$scope.perpage = '100';
$scope.getlist = function(searchtext,page,perpage){
	$scope.listkey = false;
    if(!searchtext){
   	searchtext = '';
   }


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '100';
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

$scope.listkey = true;
$scope.selectpage = page;
$scope.selectthispage = page;
        });
   };
$scope.getlist('','1');









});
	</script>
