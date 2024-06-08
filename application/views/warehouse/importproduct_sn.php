
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<table width="100%">
	<tbody>
		<tr>
			<td>
			<form class="form-inline">

<div class="form-group">
<button ng-click="Searchproduct()" class="btn btn-primary btn-lg" placeholder="" title="">
	<?php echo $lang_imsn_1;?> </button>
</div>

<div class="form-group" style="float:right;">
	<input type="number" class="form-control" placeholder="<?php echo $lang_imsn_2;?>"   ng-model="numsnauto">
	<input type="number" class="form-control" placeholder="<?php echo $lang_imsn_3;?>"   ng-model="numsnauto2">
<button ng-click="Createsncodeauto()" class="btn btn-warning btn-lg" placeholder="" title="">
	<?php echo $lang_imsn_4;?></button>
</div>

				</form>

			</td>


		</tr>
	</tbody>
</table>


<hr />
<h3><b> {{product_name}} {{product_code}} </b></h3>

<textarea class="form-control" style="height:300px;width:50%;font-size:20px;" 
ng-model="sn_code" placeholder="Serial Number"></textarea>
<?php echo $lang_qty;?> {{sncodelineCount()}}


<button id="Saveimportproduct" class="btn btn-success btn-lg" ng-click="Saveimportproduct()">
	<?=$lang_save?> <?php echo $lang_imsn_5;?>
	</button>




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
placeholder="<?=$lang_search?> <?php echo $lang_imsn_6;?>" style="width: 300px;">
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
			<th style="text-align: center;"><?php echo $lang_imsn_7;?></th>
			<th style="text-align: center;">No.</th>
            <th style="text-align: center;"><?php echo $lang_imsn_8;?></th>
			<th style="text-align: center;"><?=$lang_day?></th>
			<th style="text-align: center;"><?php echo $lang_branch;?></th>
			<th style="text-align: center;width: 20px;" ng-show="showdeletcbut" >
			<?=$lang_delete?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			
			<td align="right">{{x.csn | number}}</td>
			
			<td align="center">
		<button class="btn btn-success" ng-click="Confirm(x)" ng-if="x.confirm=='0'"><?php echo $lang_exp_4;?></button>
		<span class="badge badge-success" style="background-color: #1fb71f;" ng-if="x.confirm=='1'"><?php echo $lang_exp_5;?></span>
		
		{{x.im_no}} <br />
			<button class="btn btn-default btn-sm" ng-click="Getimportone(x)">
			<?php echo $lang_imsn_9;?>
			</button>
			
			
			
			
			<a href="<?php echo $base_url; ?>/warehouse/barcode_ds_sn?type=1&im_no={{x.im_no}}&product_name={{x.product_name}}" class="btn btn-xs btn-default c2mforhide" 
	onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;">
<span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>
 <?php echo $lang_pl_14;?> </a>
 
 	<a href="<?php echo $base_url; ?>/warehouse/barcode_ds_sn?type=2&im_no={{x.im_no}}&product_name={{x.product_name}}" class="btn btn-xs btn-default c2mforhide" 
	onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;">
<span class="glyphicon glyphicon-barcode" aria-hidden="true"></span>
 QRCODE </a>
			
			</td>
<td align="center">{{x.product_name}}</td>
			<td align="center">{{x.adddate}}</td>
			<td align="center">{{x.branch_name}}</td>
			<td ng-show="showdeletcbut" align="center">
			<button class="btn btn-xs btn-danger" ng-if="x.confirm=='0'" ng-click="Deleteimportlist(x)" id="delbut{{x.importproduct_header_id}}"><?=$lang_delete?></button></td>
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
				<h4 class="modal-title"><?php echo $lang_exp_7;?></h4>
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
			<th style="text-align:center;"><?php echo $lang_exp_8;?></th>
			<th style="text-align:center;"><?php echo $lang_exp_9;?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in productlist">
			<td style="text-align:center;"><button class="btn btn-success" ng-click="Selectproductcode(x)">
<?php echo $lang_exp_8;?>			</button></td>
			<td style="text-align:center;">{{x.product_name}}</td>
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










<div class="modal fade" id="Sndup">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">

<center>
	<h2>
	<b>
	<?php echo $lang_imsn_10;?>
	<br /><br />
	<span ng-repeat="x in snduplist" ng-if="x.sn!=''">
	{{x.sn}}<br />
	</span>
	</b>
	</h2>
	</center>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>









<div class="modal fade" id="Getimportone">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">

<button class="btn btn-primary" onclick="Openprintdiv_table()"><?=$lang_print?></button>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


			</div>
			<div class="modal-body">



<div  id="openprint_table">
		<center style="font-size: 20px;font-weight: bold;">
	<b><?php echo $lang_imsn_11;?>
		<br />{{product_name}}</b>
<br />
<b>{{im_no}}</b>
<br />
<b><?php echo $lang_imsn_12;?>: {{adddate}}</b>
<br />
<b><?php echo $lang_branch;?>: {{branch_name}}</b>
		</center>

<table  class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
			<th style="text-align: center;">SN</th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in importone">
		<td align="center">{{$index+1}}</td>
		    <td align="center">{{x.sn_code}}</td>
			
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



$("#product_date_end").datetimepicker({
		timepicker:false,
				format:'d-m-Y',
		lang:'th'  // แสดงภาษาไทย
		//yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
		//inline:true

});



$scope.sn_code = '';


$scope.Createsncodeauto = function(){
$scope.sn_code = '';
for(i=$scope.numsnauto;i<=$scope.numsnauto2;i++){

if(i!=$scope.numsnauto2){
$scope.sn_code += $scope.product_code+i+'\n';
}else{
$scope.sn_code += $scope.product_code+i;
}


}

$scope.sncodelines = function() { return $scope.sn_code.split(/\r*\n/); }
$scope.sncodelineCount = function() { return $scope.sncodelines().length; }


};


$scope.sncodelines = function() { return $scope.sn_code.split(/\r*\n/); }
$scope.sncodelineCount = function() { return $scope.sncodelines().length; }









$scope.Getpn_detail = function(){
$http.post("Importproduct/Getpn_detail",{
	importproduct_header_code: $scope.importproduct_header_refcode
	}).success(function(data){
$scope.productimportlist = data;

        });
};




$scope.getproductlist = function(){

$http.get('Productlist/get')
       .then(function(response){
          $scope.productlist = response.data.list;

        });
   };
$scope.getproductlist();

$scope.perpage = '10';
$scope.page = '1';
$scope.searchtext = '';
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

   $http.post("Importproduct_sn/get",{
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

$scope.selectpage = page;
$scope.selectthispage = page;

        });

   };
$scope.getlist('','1');




$scope.Searchproduct = function(){

$('#Searchproduct').modal('show');

};


$scope.Confirm = function(x){
$http.post("Importproduct_sn/Confirm",{
	header_id: x.im_no
	}).success(function(data){
$scope.getlist();

        });
};






$scope.Selectproductcode = function(x){

$scope.product_id = x.product_id;
$scope.product_code = x.product_code;
$scope.product_name = x.product_name;
$('#Searchproduct').modal('hide');

};



$scope.Searchproductfind = function(){
$http.post("Importproduct/Findproduct2",{
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
};

$scope.Openfull = function(){
$('#Openfull').modal({backdrop: "static", keyboard: false});
};

$scope.Addpushproductcode = function(sn_code){
$http.post("Importproduct/Findproduct",{
	product_code: $scope.product_code
	}).success(function(data){
		$scope.Findproductone = data;
if(data==''){
$scope.cannotfindproduct = true;

}else{
$scope.productimportlist.push({
	sn_code: $scope.sn_code,
	product_id: data[0].product_id,
	product_code: data[0].product_code,
	pricebase: data[0].product_pricebase
});

}

		$scope.sn_code = '';

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
total += parseFloat(item.importproduct_detail_num);
 });
    return total;
};

$scope.Sumpricebasenum = function(){
var total = 0;

 angular.forEach($scope.productimportlist,function(item){
total += ( item.pricebase );
 });
    return total;
};



$scope.Saveimportproduct = function(){
	if($scope.sn_code!='' && $scope.product_id){

$('#Saveimportproduct').prop('disabled',true);
$http.post("Importproduct_sn/add",{
	sn_code: $scope.sn_code,
	product_id: $scope.product_id
}).success(function(data){
toastr.success('<?=$lang_success?>');
$('#Saveimportproduct').prop('disabled',false);

if(data!=''){
$scope.snduplist = data;
$('#Sndup').modal('show');
}

if(data==''){
$scope.product_id = '';
$scope.product_code = '';
$scope.product_name = '';
$scope.sn_code = '';
$scope.getlist();
}

        });


	}else{
		toastr.warning('<?php echo $lang_imsn_13;?>');
	}

};



$scope.Getimportone = function(x){
$('#Getimportone').modal('show');
$http.post("Importproduct_sn/Getimportone",{
	im_no: x.im_no
}).success(function(response){
$scope.importone = response;
$scope.product_name = x.product_name;
$scope.branch_name = x.branch_name;
$scope.adddate = x.adddate;
$scope.im_no = x.im_no;
        });

};


$scope.Deleteimportlist = function(x){
$('#delbut'+ x.importproduct_header_id).prop('disabled',true);
$http.post("Importproduct_sn/Deleteimportlist",{
	im_no: x.im_no
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
