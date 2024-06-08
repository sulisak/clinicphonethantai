
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" placeholder="<?=$lang_search?> <?php echo $lang_productname;?> <?php echo $lang_branch;?> " style="width: 300px;" ng-change="getlist(searchtext,'1')">
</div>

<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>




</form>


<center>


<img ng-if="!list" src="<?php echo $base_url;?>/pic/loading.gif">
</center>


<div id="openprint_table">

<center>
	<h1><b><?php echo $lang_pdv_1;?></b></h1>
	<h3><b>{{searchtext}}</b></h3>
</center>
<hr />

<table id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?php echo $lang_pdv_2;?></th>
			
		<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>
			

<th style="text-align: center;"><?=$lang_category?></th>
<th style="text-align: center;">Zone</th>


			<th style="text-align: center;"><?=$lang_priceperunit?></th>
			<th style="text-align: center;"><?php echo $lang_cost;?></th>
			<th style="text-align: center;"><?=$lang_discount?></th>
			<th style="text-align: center;"><?=$lang_total?></th>
			
			<th style="text-align: center;"><?=$lang_estimatedrevenue?></th>
			<th style="text-align: center;background-color:#5bc0de;"><?php echo $lang_pdv_3;?></th>
			<th style="text-align: center;"><?php echo $lang_profit;?></th>
		</tr>
	</thead>
	<tbody>


		<tr ng-repeat="x in list">
			<td ng-if="selectthispage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectthispage!='1'" class="text-center">{{($index+1)+(perpage*(selectthispage-1))}}</td>
			
			
			<td>
				<button class="btn btn-default" ng-click="Openone2(x)">
				<?php echo $lang_pdv_4;?>
				</button>
				
				</td>
				
				
			<td align="center">
				{{x.product_code}}</td>
				
			<td>
			<button ng-if="x.csn!='0'" class="btn btn-default" ng-click="Opensn(x)">
			{{x.csn}} SN
			</button>
				<button class="btn btn-default" ng-click="Openone(x)">
				{{x.product_name}}
				</button>
				
				</td>
			
			<td>{{x.product_category_name}}</td>
	<td>{{x.zone_name}}</td>
			
			<td align="right">{{ x.product_price | number:2 }}</td>
			<td align="right">{{ x.product_pricebase | number:2 }}</td>
			<td align="right">{{ x.product_price_discount | number:2 }}</td>

			<td align="right">{{x.product_stock_num | number}}</td>
			
			
			<td align="right">{{ (x.product_price - x.product_price_discount) * x.product_stock_num | number:2}}</td>

<td align="right" style="background-color:#f0ad4e;font-weight:bold;">{{x.product_stock_num*x.product_pricebase | number:2}}</td>

<td align="right">{{x.product_stock_num*(x.product_price - x.product_price_discount-x.product_pricebase) | number:2}}</td>




		</tr>
		
		<tr>
		
		<td colspan="6" align="right" style="font-weight:bold;"><?php echo $lang_all;?></td>
		<td align="right" style="font-weight:bold;">{{Sumprice() | number:2}}</td>
		<td align="right" style="font-weight:bold;">{{Sumpricebase() | number:2}}</td>
		<td align="right" style="font-weight:bold;">{{Sumdiscount() | number:2}}</td>
		<td align="right" style="font-weight:bold;">{{Sumnum() | number}}</td>
		<td align="right" style="font-weight:bold;">{{Sumpriceget() | number:2}}</td>
		<td align="right" style="font-weight:bold;background-color:#5cb85c;">{{Sumproductvalue() | number:2}}</td>
		<td align="right" style="font-weight:bold;">{{Sumprofit() | number:2}}</td>
		
		
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
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getlist(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>


</form>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport2();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>


	</div>


	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<div class="modal fade" id="Getsnmodal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">

<button class="btn btn-primary" onclick="Openprintdiv1()"><?=$lang_print?></button>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


			</div>
			<div class="modal-body">



<div  id="openprint1">
		<center style="font-size: 20px;font-weight: bold;">
	<b><?php echo $lang_pdv_5;?>
		<br />{{product_name_sn}}</b>
		</center>

<table  class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
			<th style="text-align: center;">SN</th>
			<th style="text-align: center;"><?php echo $lang_branch;?></th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in snlist">
		<td align="center">{{$index+1}}</td>
		    <td align="center">{{x.sn_code}}</td>
			<td align="center">{{x.branch_name}}</td>
			
		</tr>
		
	</tbody>
</table>
</div>




			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>




	
	
	
	
	<div class="modal fade" id="Openone">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					
					<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv1()"><?=$lang_print?></button>
</div>

					</h4>
			</div>
			<div class="modal-body" id="openprint1">
<center>
	<h3>
	<?php echo $lang_pdv_6;?>
	<br />
	<b>{{onedata.product_name}}</b>
	</h3>
	</center>

<table class="table table-bordered table-hover">
	<tr ng-repeat="x in onelist">
	<td>{{x.branch_name}}</td>
	<td>{{x.product_name}}</td>
	<td class="text-right">{{x.product_stock_num | number}}</td>
	</tr>
	</table>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="modal fade" id="Openone2">
	<div class="modal-dialog modal-lg" style="width:70%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					
					<div class="form-group">
		
		
		<form class="form-inline">



<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="Openonedata2()" class="btn btn-success" placeholder="" title="<?=$lang_search?>">
<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
<?php echo $lang_search;?>
</button>
</div>


<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv2()"><?=$lang_print?></button>
</div>


</form>

</div>

					</h4>
			</div>
			<div class="modal-body" id="openprint2">
<center>
	<h3>
	<?php echo $lang_pdv_7;?>
	<br />
	<b>{{one2data.product_name}}</b>
	</h3>
	
	
	</center>

<table class="table table-bordered table-hover">
	<tr class="trheader">
	<td><?php echo $lang_branch;?></td>
	<td><?php echo $lang_productname;?></td>
	
	<td><?php echo $lang_pdv_8;?></td>
	<td><?php echo $lang_pdv_9;?></td>
	<td><?php echo $lang_pdv_10;?></td>
	<td><?php echo $lang_pdv_11;?></td>
	<td><?php echo $lang_pdv_12;?></td>
	<td><?php echo $lang_pdv_13;?></td>
	</tr>
	
	<tr ng-repeat="x in one2list">
	<td>{{x.branch_name}}</td>
	<td>{{x.product_name}}</td>
	
<td>{{x.importproduct_header_code}}</td>
<td>{{x.sale_runno}}</td>
	
	
	<td class="text-right">{{x.importproduct_detail_num | number}}</td>
	<td class="text-right">{{x.product_sale_num | number}}</td>
	
	<td class="text-right">{{x.importproduct_detail_date}}</td>
	<td class="text-right">{{x.savedate}}</td>
	</tr>
	<tr>
	<td colspan="4" class="text-right"><b><?php echo $lang_all;?></b></td>
	<td class="text-right"><b>{{Sum_importproduct_detail_num() | number}}</b></td>
	<td class="text-right"><b>{{Sum_product_sale_num() | number}}</b></td>
	<td class="text-right"><?php echo $lang_pdv_14;?> <b>{{Sum_importproduct_detail_num()-Sum_product_sale_num() | number}}</b></td>
	</tr>
	</table>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>
	
	
	
	
	
	
	
	
	
	
	

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.searchtext = '';
$scope.product_category_id = '0';
$scope.day_return = '1';



$scope.perpage = '10';
$scope.page = '1';
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

 $http.post("product_value/Getstock",{
searchtext:$scope.searchtext,
page: $scope.page,
perpage: $scope.perpage,
day_return: $scope.day_return
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





$scope.Openone = function(x){
	$('#Openone').modal('show');
	$scope.onedata = x;
	
	 $http.post("product_value/Openone",{
searchtext:$scope.searchtext,
product_id: x.product_id
}).success(function(data){
          $scope.onelist = data;

        });
	
	
}


$("#dayfrom").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$("#dayto").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$scope.dayfrom = '<?php echo date('01-m-Y',time());?>';
$scope.dayto = '<?php echo date('d-m-Y',time());?>';



$scope.Openonedata2 = function(){
	 $http.post("product_value/Openone2",{
searchtext:$scope.searchtext,
product_id: $scope.one2data.product_id,
dayfrom: $scope.dayfrom,
dayto: $scope.dayto
}).success(function(data){
          $scope.one2list = data;

        });
	
	
}






$scope.Opensn = function(x){
$http.post("Product_value/Opensn",{
	product_id: x.product_id,
	searchtext: $scope.searchtext
	}).success(function(data){
$scope.snlist = data;
$('#Getsnmodal').modal('show');
$scope.product_name_sn = x.product_name;
        });
};











$scope.Openone2 = function(x){
	$('#Openone2').modal('show');
	$scope.one2data = x;
$scope.Openonedata2();
	
}


 $scope.Sum_importproduct_detail_num = function(){
var total = 0;

 angular.forEach($scope.one2list,function(item){
	 if(item.importproduct_detail_num != null){
	 importproduct_detail_num = item.importproduct_detail_num;
	 }else{
     importproduct_detail_num = 0;
	 }
total += parseFloat(importproduct_detail_num);
 });
    return total;
};




 $scope.Sum_product_sale_num = function(){
var total = 0;

 angular.forEach($scope.one2list,function(item){
	 if(item.product_sale_num != null){
	 product_sale_num = item.product_sale_num;
	 }else{
     product_sale_num = 0;
	 }
total += parseFloat(product_sale_num);
 });
    return total;
};







 $scope.Sumprice = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_price != null){
	 product_price = item.product_price;
	 }else{
     product_price = 0;
	 }
total += parseFloat(product_price);
 });
    return total;
};




 $scope.Sumpricebase = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_pricebase != null){
	 product_pricebase = item.product_pricebase;
	 }else{
     product_pricebase = 0;
	 }
total += parseFloat(product_pricebase);
 });
    return total;
};



 $scope.Sumdiscount = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_price_discount != null){
	 product_price_discount = item.product_price_discount;
	 }else{
     product_price_discount = 0;
	 }
total += parseFloat(product_price_discount);
 });
    return total;
};



 $scope.Sumnum = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_stock_num != null){
	 product_stock_num = item.product_stock_num;
	 }else{
     product_stock_num = 0;
	 }
total += parseFloat(product_stock_num);
 });
    return total;
};




 $scope.Sumpriceget = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_price != null){
	 product_price = item.product_price;
	 }else{
     product_price = 0;
	 }
total += parseFloat((item.product_price - item.product_price_discount) * item.product_stock_num);
 });
    return total;
};



 $scope.Sumproductvalue = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_price != null){
	 product_price = item.product_price;
	 }else{
     product_price = 0;
	 }
total += parseFloat(item.product_stock_num*item.product_pricebase);
 });
    return total;
};



 $scope.Sumprofit = function(){
var total = 0;

 angular.forEach($scope.list,function(item){
	 if(item.product_price != null){
	 product_price = item.product_price;
	 }else{
     product_price = 0;
	 }
total += parseFloat(item.product_stock_num*(item.product_price - item.product_price_discount-item.product_pricebase));
 });
    return total;
};








});
	</script>
