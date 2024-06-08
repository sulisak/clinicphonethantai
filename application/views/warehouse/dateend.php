
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">




<div class="panel panel-default">
	<div class="panel-body">

 <div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showgoout?>
	<br />
	<input type="checkbox" ng-model="showsalebut"> <?=$lang_showgosale?>
</div>





<div class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" ng-change="getlist(searchtext,'1')" class="form-control" 
placeholder="<?=$lang_search?>  <?=$lang_barcode?> Lot.No, No Import" style="width: 300px;">
</div>

<!-- <div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1')" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->
<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>

</div>
<br />

<div id="openprint_table">


<table class="table table-hover table-bordered" id="headerTable">
	<thead>
		<tr class="trheader">
			<th style="text-align: center;width: 20px;"><?=$lang_rank?></th>


			<th style="text-align: center;"><?=$lang_barcode?></th>

			<th style="text-align: center;"><?=$lang_productname?></th>
			<th style="text-align: center;"><?=$lang_num?></th>

			<th style="text-align: center;">Lot.No</th>

			<th style="text-align: center;"><?=$lang_dateend?></th>

			<th style="text-align: center;"><?=$lang_dategetin?></th>
			<th style="text-align: center;">No.Import</th>
			<th style="text-align: center;"><?php echo $lang_branch;?></th>
			<th style="text-align: center;width: 20px;" ng-show="showdeletcbut" >
			<?=$lang_goout?></th>

			<th style="text-align: center;width: 40px;" ng-show="showsalebut" >
			<?=$lang_gosale?></th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>

				<td align="center">{{x.product_code}}</td>

			<td align="right">{{x.product_name}}</td>
			<td align="right">{{x.importproduct_detail_num | number}}</td>
			<td align="right">{{x.lotno}}</td>
			<td align="right">
<span ng-if="x.date_end2 < '<?php echo time();?>'" style="color:red;">{{x.date_end}}</span>
	<span ng-if="x.date_end2 > '<?php echo time();?>'">{{x.date_end}}</span>
			</td>

			<td align="center">{{x.importproduct_detail_date2}}</td>
			<td align="center">{{x.importproduct_header_code}}</td>
			<td align="center">{{x.branch_name}}</td>
			<td ng-show="showdeletcbut && x.date_end2 < '<?php echo time();?>'" align="center">
				<button class="btn btn-xs btn-danger" ng-click="Deleteimportlist(x)" id="delbut{{x.importproduct_header_id}}">
				<?=$lang_goout?></button>

			</td>

			<td ng-show="showsalebut" align="center">
				<button class="btn btn-xs btn-primary" ng-click="Saleimportlist(x)" id="salebut{{x.importproduct_header_id}}">
					<?=$lang_gosale?></button></td>


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
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>



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
				<input style="text-align: right;" type="text" ng-model="x.importproduct_detail_num" class="form-control" placeholder="<?=$lang_unit?>">
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

			</div>
			<div class="modal-body" id="section-to-print2">

		<center style="font-size: 25px;font-weight: bold;">
	<b>ใบนำเข้าสินค้า</b>

		</center>


<table class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td width="150px">
	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
</td>
		<td>
		<b>	<?php echo $_SESSION['owner_name']; ?> </b>
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
<br />
<?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>

</td>
</tr>

</table>



			<table class="table table-bordered" width="100%">
	<tr>
	<td align="right">No:</td><td>{{importproduct_header_code}}</td>
	<td align="right"><?=$lang_day?>:</td><td>{{importproduct_header_date2}}</td>
	</tr>
	<tr>
	<td align="right"><?=$lang_refnumber?>:</td><td>{{importproduct_header_refcode2}}</td>
	<td align="right"><?=$lang_remark?>:</td><td>{{importproduct_header_remark2}}</td></tr>
</table>

<table  class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
			<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>

			<th style="text-align: center;">Lot.No</th>

			<th style="text-align: center;">End date</th>
			<!-- <th style="text-align: center;"><?=$lang_costperunit?></th> -->

<th style="text-align: center;"><?=$lang_wherestore?></th>
			<th style="text-align: center;"><?=$lang_unit?></th>

			<!-- <th style="text-align: center;"><?=$lang_allprice?></th> -->

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in importone">
		<td align="center">{{$index+1}}</td>
		    <td align="center">{{x.product_code}}</td>
			<td>{{x.product_name}}</td>
			<td>{{x.lotno}}</td>
			<td>{{x.date_end}}</td>
			<!-- <td align="right">{{ x.importproduct_detail_pricebase | number:2 }}</td> -->
			<td align="right">{{ x.zone_name}}</td>
			<td align="right">{{ x.importproduct_detail_num | number }}</td>

			<!-- <td align="right">{{ x.importproduct_detail_pricebase * x.importproduct_detail_num | number:2 }}</td> -->

		</tr>
		<tr>
			<td colspan="6" align="right"><?=$lang_all?></td>
			<td align="right" style="font-weight: bold;">{{ importone_sumnum | number }}</td>
			<!-- <td align="right" style="font-weight: bold;">{{ importone_sumprice | number:2 }}</td> -->

		</tr>
	</tbody>
</table>

			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

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
$scope.importproduct_header_refcode = '';
$scope.importproduct_header_remark = '';
$scope.product_code = '';



$("#product_date_end").datetimepicker({
		timepicker:false,
				format:'d-m-Y',
		lang:'th'  // แสดงภาษาไทย
		//yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
		//inline:true

});


$scope.getproductlist = function(){

$http.get('Productlist/get')
       .then(function(response){
          $scope.productlist = response.data.list;

        });
   };
$scope.getproductlist();

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

   $http.post("Importproduct/getdateend",{
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
	product_name_title: '<?=$lang_selectproduct?>',
	importproduct_detail_pricebase: '0',
	importproduct_detail_num: '1',
	zone_name: ''
});
};

$scope.Refresh = function(){
$scope.productimportlist = [];
$('#product_code').prop('disabled',false);
};

$scope.Openfull = function(){
$('#Openfull').modal({backdrop: "static", keyboard: false});
};

$scope.Addpushproductcode = function(product_code){
$http.post("Importproduct/Findproduct",{
	product_code: product_code
	}).success(function(data){
		$scope.Findproductone = data;
if(data==''){
$scope.cannotfindproduct = true;

}else{
$scope.productimportlist.push({
	product_id: data[0].product_id,
	product_code: data[0].product_code,
	lotno: data[0].lotno,
	date_end: data[0].date_end,
	product_location: data[0].product_location,
	product_name_title: data[0].product_name,
	importproduct_detail_pricebase: data[0].product_pricebase,
	importproduct_detail_num: '1',
	zone_name: data[0].zone_name
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
total += parseInt(item.importproduct_detail_num);
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



$scope.Saveimportproduct = function(){
	if($scope.productimportlist!=''){

		if($scope.productimportlist[0].product_id!='' && $scope.productimportlist[0].importproduct_detail_num!='0'){

$('#Saveimportproduct').prop('disabled',true);
$('#Saveimportproduct2').prop('disabled',true);
$('#product_code').prop('disabled',true);
$http.post("Importproduct/add",{
	productimportlist: $scope.productimportlist,
	importproduct_header_refcode: $scope.importproduct_header_refcode,
	importproduct_header_remark: $scope.importproduct_header_remark,
	importproduct_header_num: $scope.Sumnum(),
	importproduct_header_amount: $scope.Sumpricebasenum()
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



$scope.Getimportone = function(x){
$('#Getimportone').modal('show');
$http.post("Importproduct/Getimportone",{
	importproduct_header_code: x.importproduct_header_code
}).success(function(response){
$scope.importone = response;
$scope.importproduct_header_code = x.importproduct_header_code;
$scope.importproduct_header_refcode2 = x.importproduct_header_refcode;
$scope.importproduct_header_remark2 = x.importproduct_header_remark;
$scope.importproduct_header_date2 = x.importproduct_header_date2;
$scope.importone_sumnum = x.importproduct_header_num;
$scope.importone_sumprice = x.importproduct_header_amount;
        });

};


$scope.Deleteimportlist = function(x){
$('#delbut'+ x.importproduct_header_id).prop('disabled',true);
$http.post("Importproduct/Updatestatusdateend",{
	importproduct_detail_id: x.importproduct_detail_id,
	importproduct_detail_num: x.importproduct_detail_num,
	product_id: x.product_id
}).success(function(response){
$scope.getlist();
//$('#delbut'+ x.importproduct_header_id).prop('disabled',false);
        });

};




$scope.Saleimportlist = function(x){
$('#salebut'+ x.importproduct_header_id).prop('disabled',true);
$http.post("Importproduct/Salestatusdateend3",{
	importproduct_detail_id: x.importproduct_detail_id,
	importproduct_detail_pricebase: x.importproduct_detail_pricebase,
	product_id: x.product_id
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
