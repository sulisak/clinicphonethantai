<font style="font-family: Phetsarath OT !important;">
<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<div style="float: left;">
<input type="text" ng-model="searchtext" class="form-control" placeholder="
<?=$lang_search?> <?php echo $lang_srps_1;?>" ng-change="getlist(searchtext,'1')">
</div>
<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>

<br />

<center>
<img ng-if="!list" src="<?php echo $base_url;?>/pic/loading.gif">
</center>

<div id="openprint_table">


<table ng-if="list" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader" style="font-size:12px;">
			<th><?=$lang_shift?></th>
			<th><?php echo $lang_srps_2;?></th>
			<th><?=$lang_timeopenshift?></th>
			<th><?=$lang_timecloseshift?></th>
			<th><?=$lang_startmoney?></th>
<th><?=$lang_endmoney?></th>
<th><?=$lang_endstart?></th>
<th><?=$lang_salenum?></th>
<th><?=$lang_allsaleprice?></th>

			<th><?=$lang_discountlast?></th>
			
			<th><?php echo $lang_srps_3;?></th>
			
			<th><?php echo $lang_srps_4;?></th>
			<th><?php echo $lang_srps_5;?></th>
<th><?php echo $lang_srps_6;?></th>
<th><?php echo $lang_branch;?></th>

		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
	<td>
	<button class="btn btn-warning btn-lg" ng-click="Openbillcloseday(x)">
			{{x.shift_id | number}}
</button>
</td>
<td>{{x.user_name}}</td>
<td>{{x.shift_start_time}}</td>
<td>
<span ng-if="x.shift_end_time=='01-01-1970 07:00:00'"></span>
<span ng-if="x.shift_end_time!='01-01-1970 07:00:00'">	{{x.shift_end_time}}</span>
</td>
<td style="text-align:right;">{{x.shift_money_start  | number:2}}</td>
<td style="text-align:right;">{{x.shift_money_end  | number:2}}</td>
<td style="color:#fff;background-color:#f0ad4e;text-align:right;">{{x.shift_money_end-x.shift_money_start  | number:2}}</td>
<td style="text-align:right;">{{x.sumsale_num | number}}</td>
<td style="text-align:right;">{{x.sumsale_price | number:2}}</td>

<td style="text-align:right;">-{{x.discount_last | number:2}}</td>

<td style="text-align:right;">-{{x.money_from_customer | number:2}}</td>

<td style="text-align:right;color:#fff;background-color:#5bc0de;">{{x.sumsale_num-x.pr_num | number}}</td>
<td style="color:#fff;background-color:#f0ad4e;text-align:right;">{{x.sumsale_price-x.discount_last-x.pr_price-x.money_from_customer | number:2}}</td>

<td ng-if="(x.shift_money_end-x.shift_money_start)-(x.sumsale_price-x.discount_last-x.pr_price-x.money_from_customer) < '0.00'" style="color:#fff;background-color:red;text-align:right;">{{(x.shift_money_end-x.shift_money_start)-(x.sumsale_price-x.discount_last-x.pr_price-x.money_from_customer) | number:2}}</td>
<td ng-if="(x.shift_money_end-x.shift_money_start)-(x.sumsale_price-x.discount_last-x.pr_price-x.money_from_customer) > '0.00'" style="color:#fff;background-color:green;text-align:right;">{{(x.shift_money_end-x.shift_money_start)-(x.sumsale_price-x.discount_last-x.pr_price-x.money_from_customer) | number:2}}</td>
<td ng-if="(x.shift_money_end-x.shift_money_start)-(x.sumsale_price-x.discount_last-x.pr_price-x.money_from_customer) == '0.00'" style="color:#fff;background-color:blue;text-align:right;">{{(x.shift_money_end-x.shift_money_start)-(x.sumsale_price-x.discount_last-x.pr_price-x.money_from_customer) | number:2}}</td>


<td class="text-center">
				<span ng-if="x.branch_name!=null">{{x.branch_name}}</span>
				<span ng-if="x.branch_name==null">-</span>
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
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getlist(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>


</form>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport2();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?>
 </button>







 <div class="modal fade" id="Openbillcloseday">
 	<div class="modal-dialog modal-sm">
 		<div class="modal-content">
 	<button type="button" class="btn btn-primary" OnClick="Openprintdiv1()"><?=$lang_print?></button>


 	<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>
	
 			<div class="modal-body">
 <form class="form-inline">
 <div class="form-group">
 </div>

 <!-- <div class="form-group">
 <button type="submit" ng-click="Openbillcloseday()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
 </div> -->



 </form>
 		<div  id="openprint1">
 <center>
 
 <?php
if($_SESSION['logoonslip']=='0'){
?>
 					<table style="table-layout: fixed;">
 	<tr>
 <td width="150px" align="center">
 	<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
 </td>
 </tr>
 </table>
 
 <?php } ?>
 
 		<b><span style="font-size: 18px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>


 <?php if($_SESSION['owner_tax_number'] != ''){ ?>
 		<br />
 		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
 <?php } ?>


 	<br />

 <?php echo $_SESSION['owner_address']; ?>
 <br />
 <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

 <br />
 ________________
 <br />
<?php echo $lang_srps_7;?> {{shift_id | number}}
 <br/>
 <?php echo $lang_srps_8;?>: {{shift_start_time}}
 <br />
 <?php echo $lang_srps_9;?>: {{shift_end_time}}
 <br />
 ..............................
<br />
<?php echo $lang_srps_10;?> {{shift_money_end | number:2}}
 <br /> <?php echo $lang_srps_11;?> {{shift_money_start | number:2}}
 <br /><?php echo $lang_srps_12;?> {{shift_money_end-shift_money_start | number:2}}

 <br />

 ..............................
  <br />
<input type="checkbox" ng-model="hideproduct_shift"><b> <?php echo $lang_srps_13;?> </b>
</center>

 <table ng-if="!hideproduct_shift" class="table table-hover" style="width: 100%;">

 	<tbody>
 	
 		<tr ng-repeat="y in openbillclosedaylist_product" >
		 <td>{{y.product_sale_num2 | number}}</td>
 <td>  {{y.product_name2}} </td>

 <td align="right">{{y.product_price2 | number:2}}</td>
 		</tr>

 </tbody>
 </table>

 <center>..............................</center>
  <table class="" style="width: 100%;">

 	<tbody ng-repeat="x in openbillclosedaylistb">

<tr>
	
		
		<tr>
<td><?php echo $lang_allsaleprice;?></td>
 			<td align="right">{{x.sumsale_price2 | number:2}}</td>
 		</tr>
		
		<tr>
 			<td><?php echo $lang_discountlast;?></td>
 			<td align="right">-{{x.discount_last2 | number:2}}</td>

 		</tr>
		
		<tr>
<td><?php echo $lang_srps_3;?></td>
 			<td align="right">-{{x.money_from_customer | number:2}}</td>
 		</tr>
		
		
		
         <tr ng-repeat="x in openbillclosedaylistb">
 			<td align="right" style="font-weight:bold;"><?php echo $lang_sumall;?></td>
 			<td align="right" style="font-weight:bold;">{{x.sumsale_price2-x.discount_last2-x.money_from_customer | number:2}}</td>
 		</tr>
 
         
 	</tbody>
 </table>

 <center>..............................</center>
 <table class="" style="width: 100%;">

 	<tbody>
 		<tr ng-repeat="x in openbillclosedaylistc">
 			<td>
 			<div ng-repeat="y in pay_type_list">
		<span ng-if="x.pay_type==y.pay_type_id">{{y.pay_type_name}}</span>
	</div>
 		</td>

 			<td align="right" ng-if="x.pay_type=='1'" ng-repeat="y in openbillclosedaylistb">
			{{x.sumsale_price2-y.money_changeto_customer | number:2}}</td>
			
			<td align="right" ng-if="x.pay_type!='1'">{{x.sumsale_price2 | number:2}}</td>
			
			
		</tr>
		
		<tr>
		<td align="right" style="font-weight:bold;"><?php echo $lang_sp_83;?></td>
		<td align="right" style="font-weight:bold;" ng-repeat="y in openbillclosedaylistb">
		{{Summary_pay_type()-y.money_changeto_customer | number:2}}</td>
		</tr>
		
 
 
 
      </tbody>
 </table>
 <center>..............................</center>
   

 <center>
 ________________
 		<br />
 <?=$lang_sales?>: {{user_name}}
 <br />

 <?php echo $lang_dayprint;?>: <?php echo date('d-m-Y H:i:s',time())?>

 <br />
 ________________
 </center>


 </div>

 			</div>
 			<div class="modal-footer">

 			</div>
 		</div>
 	</div>
 </div>













	</div>


	</div>

	</div>
</font>

		<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


	$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};


$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();
};



$scope.printDivfullsend = function(x){
$('#Openonesend').modal('show');

$scope.dataprintsend = x;

setTimeout(function(){
$scope.printDiv();
 }, 1000);

};

$scope.lung = '1';
$scope.Selectlung = function(x){
$scope.lung = x;
};





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




$scope.perpage = '10';
$scope.getlist = function(searchtext,page,perpage){

$scope.list = false;
	
   if(!searchtext){
   	searchtext = '';
   }


if(searchtext!=''){
   $scope.dayfrom = '';
   $scope.dayto='';
   }






    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

   $http.post("Salereportshift/get",{
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






$scope.Openbillcloseday = function(x){
$('#Openbillcloseday').modal('show');


$scope.shift_id = x.shift_id;
$scope.shift_start_time = x.shift_start_time;
$scope.shift_end_time = x.shift_end_time;
$scope.shift_money_start = x.shift_money_start;
$scope.shift_money_end = x.shift_money_end;


$scope.user_name = x.user_name;




$http.post("Salereportshift/Openbillclosedaylist_product",{
shift_id: x.shift_id,
}).success(function(data){

	 $scope.openbillclosedaylist_product = data;

			});



	$http.post("Salereportshift/Openbillclosedaylista",{
	shift_id: x.shift_id,
	}).success(function(data){

     $scope.openbillclosedaylista = data;

        });

	$http.post("Salereportshift/Openbillclosedaylistb",{
	shift_id: x.shift_id,
	}).success(function(data){

     $scope.openbillclosedaylistb = data;

        });


	$http.post("Salereportshift/Openbillclosedaylistc",{
	shift_id: x.shift_id,
	}).success(function(data){

     $scope.openbillclosedaylistc = data;

        });






};




$scope.getpaytype = function(){
   
$http.get('<?php echo $base_url;?>/salesetting/pay_type/get')
       .then(function(response){
          $scope.pay_type_list = response.data.list; 
                 
        });
   };
$scope.getpaytype();





 $scope.Summary_pay_type = function(){
var total = 0;

 angular.forEach($scope.openbillclosedaylistc,function(item){
	 if(item.sumsale_price2 != null){
	 sumsale_price2 = item.sumsale_price2;
	 }else{
     sumsale_price2 = 0;
	 }
total += parseFloat(sumsale_price2);
 });
    return total;
};





});
	</script>
