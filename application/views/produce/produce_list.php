
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="pl_title" placeholder="<?php echo $lang_pdpl_1;?>" class="form-control" style="width: 200px;">
</div>
<div class="form-group">
<input class="form-control" style="width: 500px;" ng-model="pl_des" placeholder="<?php echo $lang_detail;?>">
</div>
</form>

<br />
<table width="100%">
	<tbody>
		<tr>
			<td>
			<form class="form-inline">
<div class="form-group">
				<input type="text" class="form-control" id="product_code" ng-model="product_code" style="font-size: 20px;text-align: right;height: 47px;width: 300px;background-color:#dff0d8;" placeholder="<?=$lang_barcode?>">
				</div>
				<div class="form-group">
				<button type="submit" ng-click="Addpushproductcode(product_code)" class="btn btn-default btn-lg"><?=$lang_enter?></button>
				</div>
				<div class="form-group" ng-show="cannotfindproduct" style="color: red;">
					<?=$lang_cannotfoundproduct?>
				</div>
	<div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

<div class="form-group">
<button ng-click="Searchproduct()" class="btn btn-primary btn-lg" placeholder="" title="">
<?php echo $lang_pdpl_2;?></button>
</div>
				</form>

			</td>
			<td align="right">

<!-- <button type="submit" ng-click="Openfull()" class="btn btn-default btn-lg">
<span class="glyphicon glyphicon-resize-full" aria-hidden="true">
<?=$lang_fullscreen?>
</button> -->

			</td>

		</tr>
	</tbody>
</table>


<hr />


<table class="table table-hover table-bordered">
<thead>
	<tr class="trheader">
	<th style="text-align: center;width: 50px;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?=$lang_productname?></th>
		<th style="text-align: center;"><?=$lang_barcode?></th>
		<th style="text-align: center;"><?php echo $lang_pdpl_3;?></th>
		<th style="text-align: center;"><?=$lang_productunit?></th>
		<th style="text-align: center;"><?=$lang_delete?></th>
	</tr>
</thead>
	<tbody>
		<tr ng-repeat="x in productimportlist">
		<td align="center">{{$index+1}}</td>
			<td>
{{x.product_name}}

			<input type="hidden" ng-model="x.product_id">
			</td>

			<td align="center">
			{{x.product_code}}
			</td>

			<td>
				<input style="text-align: right;" type="text" ng-model="x.product_num" class="form-control" placeholder="<?=$lang_unit?>">
			</td>
			<td>
{{x.product_unit_name}}
			</td>
			<!-- <td>
				<input style="text-align: right;" type="text" value="{{x.importproduct_detail_pricebase * x.importproduct_detail_num | number:2 }}" class="form-control" readonly>
			</td> -->
			<td><button  class="btn btn-sm btn-danger" ng-click="Deletepush($index)"><?=$lang_delete?></button></td>
		</tr>

		<tr>
			<td colspan="3" align="right"><?=$lang_all?></td>
			<td align="right" style="font-weight: bold;">{{Sumnum() | number}}</td>
<td></td>
			<!-- <td align="right" style="font-weight: bold;">{{Sumpricebasenum() | number:2}}</td>
			 -->
			<td></td>
		</tr>
	</tbody>
</table>





<button id="Saveimportproduct" class="btn btn-success btn-lg" style="float: right;" ng-click="Saveimportproduct()"><?=$lang_save?></button>




</div>
</div>


<div class="panel panel-default">
	<div class="panel-body">


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>


<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" ng-change="getlist(searchtext,'1')" class="form-control" 
placeholder="<?=$lang_search?><?php echo $lang_pdpl_3_1;?>" style="width: 300px;">
</div>

<!-- <div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1')" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->

</form>
<br />
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th style="text-align: center;width: 20px;"><?=$lang_rank?></th>
			<th style="text-align: center;"><?php echo $lang_pdpl_4;?></th>
			<th style="text-align: center;">No</th>
			<th style="text-align: center;"><?php echo $lang_pdpl_5;?></th>

			<th style="text-align: center;"><?php echo $lang_pdpl_3;?></th>
			<th style="text-align: center;"><?php echo $lang_detail;?></th>
			<th style="text-align: center;"><?php echo $lang_pdpl_6;?></th>
			<th style="text-align: center;"><?php echo $lang_status;?></th>
			<th style="text-align: center;width: 20px;" ng-show="showdeletcbut" >
			<?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			
			<td align="center">
				 
			
			
			<button ng-if="x.cc !=null && x.status=='0'" ng-click="Getimportone_formula_list(x)" class="btn btn-sm btn-primary">
							<?php echo $lang_pdpl_7;?>
							</button>
			<button ng-if="x.cc !=null && x.status=='1'" ng-click="Getimportone_formula_list(x)" class="btn btn-sm btn-default">
							<?php echo $lang_pdpl_8;?>
							</button>
							
						<button ng-if="x.cc ==null" ng-click="Producenowconfirm(x)" class="btn btn-sm btn-info">
							<?php echo $lang_pdpl_9;?>
							</button>	
			
			
			
			</td>
			
			
			<td align="center">
			{{x.pl_code}} 
			<button class="btn btn-warning btn-sm" ng-click="Getimportone(x)">
			<?php echo $lang_pdpl_10;?>
			</button></td>
			<td align="center">{{x.pl_title}}</td>

			<td align="right">{{x.product_numall | number}}</td>
			
			<td align="center">{{x.pl_des}}</td>
			<td align="center">{{x.adddate}}</td>
			
			
			<td align="center" ng-if="x.status=='0'">
				 <?php echo $lang_pdpl_11;?>

				</td>
				
				<td align="center" ng-if="x.status=='1'" style="color:#fff;background-color:green;font-weight:bold;">
				
		 <?php echo $lang_pdpl_12;?>
				
				</td>
				
				
			
			
			<td ng-show="showdeletcbut" align="center"><button class="btn btn-xs btn-danger" ng-click="Deleteimportlist(x)" id="delbut{{x.importproduct_header_id}}"><?=$lang_delete?></button></td>
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



<div class="modal fade" id="Searchproduct">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_search;?></h4>
			</div>
			<div class="modal-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="product_name" ng-change="Searchproductfind()" class="form-control" 
placeholder="<?php echo $lang_search;?>" style="height: 45px;font-size: 20px;">
</div>


</form>
<br />
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th style="text-align:center;"><?php echo $lang_select;?></th>
			<th style="text-align:center;"><?php echo $lang_productname;?></th>
			<th style="text-align:center;"><?php echo $lang_pdpl_13;?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in productlist" ng-if="x.produce_formula_name !=null">
			<td style="text-align:center;"><button class="btn btn-success" ng-click="Addpushproductcode(x.product_code)">
<?php echo $lang_select;?>			</button></td>
			<td style="text-align:center;">{{x.product_name}}</td>
			<td style="text-align:center;">
			<span style="color:green;font-weight:bold;">	{{x.produce_formula_name}} </span>
				
				</td>
		</tr>
	</tbody>
</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Openfull" style="padding-right:0px;">
	<div class="modal-dialog modal-lg" style="width: 100%;margin: 0px;">
		<div class="modal-content">
			<div class="modal-body">






<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="importproduct_header_refcode" placeholder="<?=$lang_refnumber?>" class="form-control" style="width: 200px;">
</div>
<div class="form-group">
<input class="form-control" style="width: 500px;" ng-model="importproduct_header_remark" placeholder="<?=$lang_remark?>">
</div>
</form>

<br />

<table width="100%">
	<tbody>
		<tr>

			<td>
			<form class="form-inline">
<div class="form-group">
				<input type="text" class="form-control" ng-model="product_code" style="font-size: 20px;text-align: right;height: 47px;width: 300px;background-color:#dff0d8;" placeholder="<?=$lang_barcode?>">
				</div>
				<div class="form-group">
				<button type="submit" ng-click="Addpushproductcode(product_code)" class="btn btn-default btn-lg"><?=$lang_enter?></button>
				</div>
				<div class="form-group" ng-show="cannotfindproduct" style="color: red;">
					<?=$lang_cannotfoundproduct?>
				</div>
				<div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>
				</form>

			</td>
			<td align="right">

<button type="button" class="btn btn-default btn-lg" data-dismiss="modal">x</button>

			</td>

		</tr>
	</tbody>
</table>


<hr />

<div style="height: 400px;overflow: auto;" id="Openfulltable">
<table class="table table-hover table-bordered">
<thead>
	<tr class="trheader">
	<th style="text-align: center;width: 50px;"><?=$lang_rank?></th>
		<th style="text-align: center;"><?=$lang_productname?></th>
		<th style="text-align: center;"><?=$lang_barcode?></th>
		<!-- <th style="text-align: center;"><?=$lang_costperunit?></th> -->
		<th style="text-align: center;"><?=$lang_unit?></th>
		<!-- <th style="text-align: center;"><?=$lang_allprice?></th> -->
		<th style="text-align: center;"><?=$lang_delete?></th>
	</tr>
</thead>
	<tbody>
		<tr ng-repeat="x in productimportlist">
		<td align="center">{{$index+1}}</td>
			<td>
{{x.product_name_title}}

			<input type="hidden" ng-model="x.product_id">
			</td>

			<td align="center">
			{{x.product_code}}
			</td>

			<!-- <td>
				<input style="text-align: right;" type="text" ng-model="x.importproduct_detail_pricebase" class="form-control" placeholder="<?=$lang_costperunit?>">
			</td> -->
			<td>
				<input style="text-align: right;" type="text" ng-model="x.importproduct_detail_num | number:2" class="form-control" placeholder="<?=$lang_unit?>">
			</td>
			<!-- <td>
				<input style="text-align: right;" type="text" value="{{x.importproduct_detail_pricebase * x.importproduct_detail_num | number:2 }}" class="form-control" readonly>
			</td> -->
			<td><button  class="btn btn-sm btn-danger" ng-click="Deletepush($index)"><?=$lang_delete?></button></td>
		</tr>


	</tbody>
</table>


</div>

<table width="100%">
	<tr>
			<td align="center" style="font-size: 16px;"><?=$lang_salenumall?> <span style="font-weight: bold;">{{Sumnum() | number}}</span>

			<!--  <?=$lang_allprice?> <span style="font-weight: bold;">{{Sumpricebasenum() | number:2}}</span> -->
			</td>

		</tr>
</table>


<table width="100%">
<tr><td align="right">
<button id="Saveimportproduct2" class="btn btn-success btn-lg" style="float: right;" ng-click="Saveimportproduct()"><?=$lang_save?></button>
</td></tr>
</table>




			</div>

		</div>
	</div>
</div>





<div class="modal fade" id="Getimportone">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">

<button class="btn btn-primary" onclick="Openprintdiv_table()"><?=$lang_print?></button>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


			</div>
			<div class="modal-body" id="openprint_table">

		<center style="font-size: 25px;font-weight: bold;">
	<b><?php echo $lang_pdpl_14;?>:: {{headdata.pl_title}}</b>

		</center>




			<table class="table table-bordered" width="100%">
	<tr>
	<td align="right">No:</td><td>{{headdata.pl_code}}</td>
	<td align="right"><?php echo $lang_pdpl_15;?>:</td><td>{{headdata.adddate}}</td>
	</tr>
	<tr>
	<td align="right"><?php echo $lang_pdpl_16;?>:</td><td>{{headdata.product_numall | number}}</td>
	<td align="right"><?php echo $lang_detail;?>:</td><td>{{headdata.pl_des}}</td></tr>
</table>
<center><h1><b><?php echo $lang_pdpl_17;?></b></h1></center>
<table  class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
			<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>


		<th style="text-align: center;"><?php echo $lang_pdpl_18;?></th>

			<th style="text-align: center;"><?=$lang_unit?></th>

			<!-- <th style="text-align: center;"><?=$lang_allprice?></th> -->

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in importone">
		<td align="center">{{$index+1}}</td>
		    <td align="center">{{x.product_code}}</td>
			<td>{{x.product_name}}</td>

			<td align="right">{{ x.product_num | number }}</td>
			
			<td align="center">{{x.product_unit_name}}</td>

		</tr>
		<tr>
			<td colspan="3" align="right"><?=$lang_all?></td>
			<td align="right" style="font-weight: bold;">{{ headdata.product_numall | number }}</td>
<td align="center"></td>
		</tr>
	</tbody>
</table>

<hr />


<div ng-if="formula_list_data=='1'">
<center><h2><b><?php echo $lang_pdpl_19;?></b></h2></center>
<table  class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
			<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>


		<th style="text-align: center;"><?php echo $lang_pdpl_20;?></th>
					<th style="text-align: center;"><?=$lang_unit?></th>
			
<th style="text-align: center;"><?php echo $lang_pdpl_21;?></th>

			<th style="text-align: center;"><?php echo $lang_pdpl_22;?></th>

			<!-- <th style="text-align: center;"><?=$lang_allprice?></th> -->

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in importone_formula_list">
		<td align="center">{{$index+1}}</td>
		    <td align="center">{{x.product_code_mat}}</td>
			<td>{{x.product_name_mat}}</td>

			<td align="right">{{ ParsefloatFunc(x.product_num)*ParsefloatFunc(x.product_num_mat) | number }}</td>
	
			<td align="center">{{x.product_unit_name_mat}}</td>
			
						<td align="right">
<span style="color:red;font-weight:bold;" ng-if="ParsefloatFunc(x.product_num)*ParsefloatFunc(x.product_num_mat) > x.product_stock_num_mat">
	{{ x.product_stock_num_mat | number }}
	
	(<i>  <?php echo $lang_pdpl_23;?>
	{{ (ParsefloatFunc(x.product_num)*ParsefloatFunc(x.product_num_mat))-ParsefloatFunc(x.product_stock_num_mat) | number }}
	</i>)</span>		
<span style="color:green;font-weight:bold;" ng-if="ParsefloatFunc(x.product_num)*ParsefloatFunc(x.product_num_mat) <= x.product_stock_num_mat">{{ x.product_stock_num_mat | number }}</span>		

							
							</td>

<td align="right">{{ ParsefloatFunc(x.product_num)*ParsefloatFunc(x.product_num_mat)*ParsefloatFunc(x.product_pricebase_mat) | number }}</td>
			
		</tr>
		<tr>
			<td colspan="6" align="right"><?=$lang_all?></td>
			<td align="right" style="font-weight: bold;">{{ Formula_product_pricebase_numall() | number }}</td>

		</tr>
	</tbody>
</table>

<center style="color:red;" ng-if="headdata.status=='0'">
	<?php echo $lang_pdpl_24;?>
	<br />
<button ng-disabled="confirmproduce_but" class="btn btn-lg btn-success" ng-click="Confirmproduce()">ยืนยันการผลิตสินค้า</button>	
</center>
</div>



			</div>
			<div class="modal-footer text-center">
				
	
			</div>
		</div>
	</div>
</div>





<div class="modal fade" id="Modalproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_productliststock?></h4>
			</div>
			<div class="modal-body">
	<input type="text" ng-model="searchproduct" placeholder="<?=$lang_search?>" style="width:300px;" class="form-control">
<br />
<div style="overflow: auto;height: 400px;">
<table class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			<th><?=$lang_select?></th>
			<th><?=$lang_barcode?></th>
			<th><?=$lang_productname?></th>
			<th><?=$lang_price?></th>
			<th><?=$lang_costperunit?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="y in productlist | filter:searchproduct" >
			<td><button ng-click="Selectproduct(y,indexrow)" class="btn btn-success"><?=$lang_select?></button></td>
			<td align="center">{{y.product_code}}</td><td>{{y.product_name}}</td>
			<td align="right">{{y.product_price | number:2}}</td>
			<td align="right">{{y.product_pricebase | number:2}}</td>
		</tr>
	</tbody>
</table>
</div>

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
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.productimportlist = [];
$scope.importproduct_header_refcode = '<?php if(isset($_GET['pn'])){echo $_GET['pn'];}?>';
$scope.importproduct_header_remark = '';
$scope.product_code = '';
$scope.pl_title = '';
$scope.pl_des = '';


$("#product_date_end").datetimepicker({
		timepicker:false,
				format:'d-m-Y',
		lang:'th'  // แสดงภาษาไทย
		//yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
		//inline:true

});




$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};



$scope.Getpn_detail = function(){
$http.post("produce_list/Getpn_detail",{
	importproduct_header_code: $scope.importproduct_header_refcode
	}).success(function(data){
$scope.productimportlist = data;

        });
};
<?php if(isset($_GET['pn'])){?>
$scope.Getpn_detail();
<?php } ?>






$scope.perpage = '100';
$scope.getlist = function(searchtext,page,perpage){
   if(!searchtext){
   	searchtext = '';
   }


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '100';
   }

   $http.post("produce_list/get",{
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




$scope.Searchproduct = function(){

$('#Searchproduct').modal('show');

};



$scope.Searchproductfind = function(){
$http.post("produce_list/Findproduct2",{
	product_name: $scope.product_name
	}).success(function(data){
$scope.productlist = data;

        });
};



$scope.Openmodalimport = function(){
	$scope.productimportlist = [];
	$('#Saveimportproduct').prop('disabled',false);
$('#Openmodalimport').modal({backdrop: "static", keyboard: false});
};


$scope.Addpushproduct = function(){
$scope.productimportlist.push({
	product_id: '',
	product_code: '',
	lotno: '',
	date_end: '',
	product_stock_num: '',
	product_name_title: '<?=$lang_selectproduct?>',
	importproduct_detail_pricebase: '0',
	importproduct_detail_num: '1',
	zone_name: ''
});
};

$scope.Refresh = function(){
$scope.productimportlist = [];
$('#product_code').prop('disabled',false);
$scope.pl_title = '';
$scope.pl_des = '';
};

$scope.Openfull = function(){
$('#Openfull').modal({backdrop: "static", keyboard: false});
};

$scope.Addpushproductcode = function(product_code){
$http.post("produce_list/Findproduct",{
	product_code: product_code
	}).success(function(data){
		$scope.Findproductone = data;
if(data==''){
$scope.cannotfindproduct = true;

}else{
$scope.productimportlist.push({
	product_id: data[0].product_id,
	product_code: data[0].product_code,
	product_name: data[0].product_name,
	product_pricebase: data[0].product_pricebase,
	product_unit_name: data[0].product_unit_name,
	product_num: '1'
});
$scope.cannotfindproduct = false;
}

		$scope.product_code = '';
$('#Openfulltable').scrollTop($('#Openfulltable')[0].scrollHeight,1000000);
        });
};



$scope.Modalproduct = function(index){
$('#Modalproduct').modal({show:true});
$scope.indexrow = index;
};


$scope.Selectproduct = function(y,index){
$scope.productimportlist[index].product_id = y.product_id;
$scope.productimportlist[index].product_code = y.product_code;
$scope.productimportlist[index].lotno = y.lotno;
$scope.productimportlist[index].date_end = y.date_end;
$scope.productimportlist[index].importproduct_detail_pricebase = y.product_pricebase;
$scope.productimportlist[index].product_name_title = y.product_name;
$('#Modalproduct').modal('hide');

};


$scope.Deletepush = function(index){
  $scope.productimportlist.splice(index, 1);
};

$scope.Sumnum = function(){
var total = 0;

 angular.forEach($scope.productimportlist,function(item){
total += parseFloat(item.product_num);
 });
    return total;
};

$scope.Sumpricebasenum = function(){
var total = 0;

 angular.forEach($scope.productimportlist,function(item){
total += ( item.importproduct_detail_pricebase * item.importproduct_detail_num );
 });
    return total;
};



$scope.Sumnum_formula_mat = function(){
var total = 0;

 angular.forEach($scope.importone_formula_list,function(item){
total += parseFloat(item.product_num_mat)*parseFloat(item.product_num);
 });
    return total;
};



$scope.Formula_product_pricebase_numall = function(){
	var total = 0;

 angular.forEach($scope.importone_formula_list,function(x){
total += ( parseFloat(x.product_num)*parseFloat(x.product_num_mat)*parseFloat(x.product_pricebase_mat) );
 });
    return total;
};



$scope.Saveimportproduct = function(){
	if($scope.productimportlist!=''){

		if($scope.pl_title!='' && $scope.productimportlist[0].product_id!='' && $scope.productimportlist[0].importproduct_detail_num!='0'){

$('#Saveimportproduct').prop('disabled',true);
$('#Saveimportproduct2').prop('disabled',true);
$('#product_code').prop('disabled',true);
$http.post("produce_list/add",{
	productimportlist: $scope.productimportlist,
	pl_title: $scope.pl_title,
	pl_des: $scope.pl_des
}).success(function(data){
toastr.success('<?=$lang_success?>');
$('#Saveimportproduct').prop('disabled',false);
$('#Saveimportproduct2').prop('disabled',false);
$('#product_code').prop('disabled',false);
$scope.productimportlist = [];
$scope.getlist();
$('#Openfull').modal('hide');
        });

}else{
	toastr.warning('<?=$lang_plz?>');
}

	}else{
		toastr.warning('<?=$lang_addproductlistplz?>');
	}

};



$scope.Getimportone = function(x,y){
	if(y=='1'){	
	$scope.formula_list_data = '1';
		}else{
	$scope.formula_list_data = '0';	
		}
	
$('#Getimportone').modal('show');
$http.post("produce_list/Getimportone",{
	pl_code: x.pl_code
}).success(function(response){
$scope.importone = response;
$scope.headdata = x;
        });

};


$scope.Getimportone_formula_list = function(x){

	$scope.Getimportone(x,'1');
$http.post("produce_list/Getimportone_formula_list",{
	pl_code: x.pl_code
}).success(function(response){
$scope.importone_formula_list = response;
        });

};




$scope.Producenowconfirm = function(x){

$http.post("produce_list/createproduct",{
	pl_code: x.pl_code
}).success(function(response){
$scope.productfromproductdata = response;
$scope.getlist('','1');
$scope.Getimportone_formula_list(x);
        });

};





$scope.Confirmproduce = function(){
$scope.confirmproduce_but = true;
$http.post("produce_list/confirmproduce",{
	headdata: $scope.headdata,
	imdata: $scope.importone,
	exdata: $scope.importone_formula_list,
	sumnum_formula_mat: $scope.Sumnum_formula_mat()
}).success(function(response){
	$('#Getimportone').modal('hide');
	$scope.confirmproduce_but = false;
$scope.getlist('','1');
        });

};




$scope.Deleteimportlist = function(x){
$('#delbut'+ x.pl_id).prop('disabled',true);
$http.post("produce_list/Deleteimportlist",{
	pl_code: x.pl_code
}).success(function(response){
$scope.getlist();
//$('#delbut'+ x.importproduct_header_id).prop('disabled',false);
        });

};






$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();
};




});
	</script>
