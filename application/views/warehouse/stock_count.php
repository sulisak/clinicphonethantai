
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<audio id="play" src="<?php echo $base_url; ?>/sound/beep.wav"></audio>

<div class="panel panel-default">
	<div class="panel-body">

<form class="form-inline">
<div class="form-group">
<input class="form-control" style="width: 500px;" ng-model="remark" placeholder="<?php echo $lang_detail;?>">
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
<button ng-click="Searchproduct()" class="btn btn-primary btn-lg" placeholder="" title="">
<?php echo $lang_stkc_1;?></button>
</div>

 <div class="form-group">
	<button class="btn btn-info btn-lg" ng-click="Modalexcel()">
	<?php echo $lang_stkc_2;?></button>
</div>


<div class="form-group">
<button id="Saveimportproduct" class="btn btn-success btn-lg" ng-click="Saveimportproduct()"><?=$lang_save?></button>
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


<table class="table table-hover table-bordered" style="font-size:18pt;">
<thead>
	<tr class="trheader">
	<th style="text-align: center;width: 50px;"><?=$lang_rank?></th>
	<th style="text-align: center;"><?php echo $lang_barcode;?></th>
		<th style="text-align: center;"><?=$lang_productname?></th>
		 
		<th style="text-align: center;"><?php echo $lang_qty;?></th> 
		<th style="text-align: center;"><?php echo $lang_unit;?></th>
		<th style="text-align: center;"><?=$lang_delete?></th>
	</tr>
</thead>
	<tbody>
		<tr ng-repeat="x in productimportlist">
		<td align="center">{{$index+1}}</td>
		
		
		
		
			<td align="center">
			{{x.product_code}}
			</td>
			
			<td>
{{x.product_name}}
			</td>		
			
			 <td align="center">
	
	<input type="text" onkeypress="validate(event)" class="form-control" ng-model="x.p_num" 
	ng-change="Updatenum(x)" 
	style="width:200px;text-align: center;font-size:30px;color:orange;font-weight:bold; ">
	
	</td> 
	
	<td align="center">
	{{x.product_unit_name}}
	</td> 
			<td align="center">
				
				<button ng-click="Deletedraft(x)"  class="btn btn-sm btn-danger" ng-click="Deletepush($index)"><?=$lang_delete?></button></td>
		</tr>

	
	</tbody>
</table>









</div>
</div>


<div class="panel panel-default">
	<div class="panel-body">


<div style="float: right;">
	<input type="checkbox" ng-model="showdeletcbut"> <?=$lang_showdel?>
</div>


<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="searchtext" ng-change="getlist(searchtext,'1')"
class="form-control" placeholder="<?=$lang_search?> <?php echo $lang_stkc_3;?>" style="width: 300px;">
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
			<th style="text-align: center;"><?php echo $lang_stkc_4;?></th>
			<th style="text-align: center;">SC CODE</th>
			<th style="text-align: center;"><?php echo $lang_detail;?></th>
			<th style="text-align: center;"><?=$lang_productnum?></th>
			<th style="text-align: center;"><?php echo $lang_stkc_5;?></th>
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
			
			
			<td align="center">
			<span ng-if="x.status=='1'" style="color:green;font-weight:bold;"><?php echo $lang_stkc_6;?></span>
			<button ng-if="x.status=='0'" class="btn btn-warning btn-sm" ng-click="Updatestockmodal(x)">
			<?php echo $lang_stkc_4;?>
			</button>
			</td>
			
			
			<td align="center">
			{{x.sc_code}} 
			<button ng-if="x.status=='0'"  class="btn btn-default btn-sm" ng-click="Getimportone(x,'0')">
			<?php echo $lang_stkc_7;?>
			</button>
			
			<button ng-if="x.status=='1'" class="btn btn-success btn-sm" ng-click="Getimportone(x,'1')">
			<?php echo $lang_stkc_1;?>
			</button>
			
			</td>
			
			<td align="center">{{x.remark}}</td>
			<td align="right">{{x.product_num | number}}</td>
			<td align="center">{{x.name}}</td>
			<td align="center">{{x.adddate}}</td>
			<td align="center">{{x.branch_name}}</td>
			<td ng-show="showdeletcbut" align="center"><button class="btn btn-xs btn-danger" 
		ng-click="Deleteimportlist(x)" ng-if="x.status=='0'" id="delbut{{x.stock_count_list_id}}"><?=$lang_delete?></button></td>
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
				<h4 class="modal-title"><?php echo $lang_stkc_8;?></h4>
			</div>
			<div class="modal-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="product_name" ng-change="Searchproductfind()" class="form-control" 
placeholder="<?php echo $lang_stkc_8_a3;?>" style="height: 45px;font-size: 20px;">
</div>


</form>
<br />
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th style="text-align:center;"><?php echo $lang_select;?></th>
			<th style="text-align:center;"><?php echo $lang_productname;?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in productlist">
			<td style="text-align:center;"><button class="btn btn-success" ng-click="Addpushproductcode(x.product_code)">
<?php echo $lang_select;?>			</button></td>
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












<div class="modal fade" id="Updatestockmodal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">

<center> <h3>
SC CODE: <b>{{sc_code2}}</b>
<br /><br />
<?php echo $lang_stkc_9;?>
<br /><br />
<button class="btn btn-success btn-lg" ng-click="Updatestockok()">
<?php echo $lang_confirm;?>			</button>
</h3>
</center>

<table  class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
			<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>

<th style="text-align: center;"><?php echo $lang_stkc_10;?></th>
<th style="text-align: center;"><?php echo $lang_stkc_11;?></th>
<th style="text-align: center;"><?php echo $lang_stkc_12;?></th>

			<th style="text-align: center;"><?=$lang_unit?></th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in importone">
		<td align="center">{{$index+1}}</td>
		    <td align="center">{{x.product_code}}</td>
			<td>{{x.product_name}}</td>
			
			<td align="right">{{ x.product_stock_num | number }}</td>
						
			<td align="right">{{ x.product_num | number }}</td>
						
			<td align="right">{{ x.product_num-x.product_stock_num | number }}</td>
			
			<td align="right">{{ x.product_unit_name}}</td> 
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















<div class="modal fade" id="Modalexcel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				
			</div>
			<div class="modal-body text-center">

<form enctype="multipart/form-data" id="formexcel">

<input type="file" accept=".csv" id="excel" name="excel" class="btn btn-default">
<br />
<button class="btn btn-success" id="submitexcel" type="submit"><?=$lang_upload?></button>
</form>

<hr />
<font color="red">ໃຊ້ ຈຳນວນທີ່ນັບໄດ້
<br />
<b>ໄຟລ໌ => ດາວໂຫຼດ => .csv</b>
</font>
<br />
<img src="<?php echo $base_url;?>/pic/imcsvcsnew.png">
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
	<b ng-if="stupdated=='0'"><?php echo $lang_stkc_15;?></b>
	<b ng-if="stupdated=='1'"><?php echo $lang_stkc_16;?></b>

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
	<td align="right">SC CODE:</td><td>{{sc_code2}}</td>
	<td align="right"><?=$lang_day?>:</td><td>{{adddate2}}</td>
	</tr>
	<tr>
	<td align="right"><?php echo $lang_stkc_17;?>:</td><td>{{name2}}</td>
	<td align="right"><?php echo $lang_detail;?>:</td><td>{{remark2}}</td></tr>
</table>

<table  class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
		<th style="width: 50px;"><?=$lang_rank?></th>
			<th style="text-align: center;"><?=$lang_barcode?></th>
			<th style="text-align: center;"><?=$lang_productname?></th>

<th  ng-if="stupdated=='1'" style="text-align: center;"><?php echo $lang_stkc_18;?></th>

<th  ng-if="stupdated=='1'" style="text-align: center;"><?php echo $lang_stkc_19;?></th>

<th  ng-if="stupdated=='1'" style="text-align: center;"><?php echo $lang_stkc_20;?></th>

<th  ng-if="stupdated=='0'" style="text-align: center;"><?php echo $lang_qty;?></th>

			<th style="text-align: center;"><?=$lang_unit?></th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in importone">
		<td align="center">{{$index+1}}</td>
		    <td align="center">{{x.product_code}}</td>
			<td>{{x.product_name}}</td>
			
			
			<td  ng-if="stupdated=='1'" align="right">{{ x.product_stock_num_befor | number }}</td>
			
		
			
			
			<td align="right">{{ x.product_num | number }}</td>
			
				<td  ng-if="stupdated=='1'" align="right">
	<span ng-if="x.product_num-x.product_stock_num_befor > '0'" style="color:green;font-weight:bold;">
	+{{ x.product_num-x.product_stock_num_befor | number }}
	</span>
	
	<span ng-if="x.product_num-x.product_stock_num_befor == '0'" style="color:green;font-weight:bold;">
	{{ x.product_num-x.product_stock_num_befor | number }}
	</span>
	
	<span ng-if="x.product_num-x.product_stock_num_befor < '0'" style="color:red;font-weight:bold;">
	{{ x.product_num-x.product_stock_num_befor | number }}
	</span>
	
	
	
	
	</td>
	
	
			
			<td align="right">{{ x.product_unit_name}}</td> 
		</tr>
		
	</tbody>
</table>




<center>
<table style="width:100%;">
	<tr>
<td align="center">
	..........................................
	<br />
	(..........................................)
	<br />
<?=$lang_stocker?>
</td>

</tr>
</table>
</center>




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
$scope.remark = '';
$scope.product_code = '';



$("#product_date_end").datetimepicker({
		timepicker:false,
				format:'d-m-Y',
		lang:'th'  // แสดงภาษาไทย
		//yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
		//inline:true

});



$scope.Getpn_detail = function(){
$http.post("stock_count/Getpn_detail",{
	importproduct_header_code: $scope.importproduct_header_refcode
	}).success(function(data){
$scope.productimportlist = data;

        });
};
<?php if(isset($_GET['pn'])){?>
$scope.Getpn_detail();
<?php } ?>






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

   $http.post("stock_count/get",{
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
$http.post("stock_count/Findproduct2",{
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




$scope.Modalexcel = function(){
$('#Modalexcel').modal('show');
};



$scope.Updatestockok = function(){
$http.post("stock_count/Updatestockok",{
	sc_code: $scope.sc_code2
	}).success(function(data){
$scope.getlist();
$('#Updatestockmodal').modal('hide');
        });
};





$scope.Updatestockmodal = function(x){
$scope.sc_code2 = x.sc_code;
$('#Updatestockmodal').modal('show');

$http.post("stock_count/Getimportone",{
	sc_code: x.sc_code
}).success(function(response){
$scope.importone = response;

        });
		
		
};










  $("form#formexcel").submit(function () {
var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "stock_count/uploadexcel",
            data:formData,
            processData: false,
   		 	contentType: false,
            success: function () {
               toastr.success('<?=$lang_success?>');
               $('#Modalexcel').modal('hide');
               $scope.getdraft();
            }
        });
    });
	
	
	
	

$scope.Refresh = function(){
$scope.productimportlist = [];
$('#product_code').prop('disabled',false);
};

$scope.Openfull = function(){
$('#Openfull').modal({backdrop: "static", keyboard: false});
};



$scope.getdraft = function(){
$http.post("stock_count/getdraft",{
	}).success(function(data){	
$scope.productimportlist = data;
	});
}
$scope.getdraft();




$scope.Addpushproductcode = function(product_code){
$http.post("stock_count/Findproduct",{
	product_code: product_code
	}).success(function(data){
		$scope.Findproductone = data;
if(data==''){
$scope.cannotfindproduct = true;

}else{
	
	
$http.post("stock_count/adddraft",{
	product_id: data[0].product_id
	}).success(function(data){	
$scope.getdraft();
playbeep();
	});

$scope.cannotfindproduct = false;
}

		$scope.product_code = '';
$('#Openfulltable').scrollTop($('#Openfulltable')[0].scrollHeight,1000000);
        });
};






$scope.Updatenum = function(x){
$http.post("stock_count/updatenum",{
product_id: x.product_id,
p_num: x.p_num
	}).success(function(data){	
//$scope.getdraft();
toastr.success('<?php echo $lang_success;?>');
	});
}



$scope.Deletedraft = function(x){
$http.post("stock_count/deletedraft",{
product_id: x.product_id
	}).success(function(data){	
$scope.getdraft();
	});
}





	

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
$http.post("stock_count/add",{
	productimportlist: $scope.productimportlist,
	remark: $scope.remark
}).success(function(data){
toastr.success('<?=$lang_success?>');
$('#Saveimportproduct').prop('disabled',false);
$('#Saveimportproduct2').prop('disabled',false);
$('#product_code').prop('disabled',false);
$scope.productimportlist = [];
$scope.getdraft();
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
$('#Getimportone').modal('show');
$http.post("stock_count/Getimportone",{
	sc_code: x.sc_code
}).success(function(response){
$scope.importone = response;
$scope.sc_code2 = x.sc_code;
$scope.remark2 = x.remark;
$scope.adddate2 = x.adddate;
$scope.name2 = x.name;
if(y=='1'){
$scope.stupdated = 1;	
}else{
$scope.stupdated = 0;
}


        });

};


$scope.Deleteimportlist = function(x){
$('#delbut'+ x.stock_count_list_id).prop('disabled',true);
$http.post("stock_count/Deleteimportlist",{
	sc_code: x.sc_code
}).success(function(response){
$scope.getlist();
//$('#delbut'+ x.importproduct_header_id).prop('disabled',false);
        });

};






$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();
};


function playbeep () {
    document.getElementById('play').play();
}

});

function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


	</script>
