

<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">

<audio id="play" src="<?php echo $base_url;?>/sound/beep.wav"></audio>


<div style="float: left;">
<input type="text" ng-model="searchtext" style="width:500px;" class="form-control" placeholder="
<?=$lang_search?> <?php echo $lang_pkl_1;?>" ng-change="pregetlist(searchtext,'1',perpage)">
</div>


<form class="form-inline">


<div class="form-group">
<select class="form-control" ng-model="showtype" ng-change="getlist()">
	<option value="all"><?php echo $lang_pkl_2;?></option>
	<option value="no"><?php echo $lang_pkl_3;?></option>
	<option value="yes"><?php echo $lang_pkl_4;?></option>
	</select>
</div>




<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist(searchtext,'1',perpage)" class="btn btn-success" placeholder="" title="<?=$lang_search?>">
<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
<?php echo $lang_search;?>
</button>
</div>



<div class="form-group">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>


</form>
<br />

<center>
<img ng-if="!list" src="<?php echo $base_url;?>/pic/loading.gif">
</center>

<div id="openprint_table">


<table ng-if="list" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader" style="font-size:12px;">
			<th width="10px"><?=$lang_rank?></th>
			<th width="10px">Check</th>
			<th width="20px"><?php echo $lang_pkl_5;?></th>
			<th width="100px"><?=$lang_runno?> <?php echo $lang_pkl_6;?></th>
			<th><?=$lang_cusname?></th>
			<th><?php echo $lang_pkl_7;?></th>
			
<th><?php echo $lang_pkl_8;?></th>
			<th><?php echo $lang_branch;?></th>
			
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in list">
			<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
			
			
			<td align="center">
	

	<span class="badge" style="font-size: 20px;" 
	ng-if="x.checkproduct!='0' && x.checkproduct<x.sumsale_num">
	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		{{x.checkproduct | number}}</span>
		
	<span class="badge" ng-if="x.checkproduct==x.sumsale_num" 
	style="background-color: #5cb85c;font-size: 20px;">
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		{{x.checkproduct | number}}</span>
	
	
	</td>
	
	<td align="center">
	{{x.sumsale_num | number}}
	</td>
			
			<td>


	<button ng-if="ParsefloatFunc(x.checkproduct)<ParsefloatFunc(x.sumsale_num)" class="btn btn-default" ng-click="Getone(x)">{{x.sale_runno}}</button>
	<button ng-if="ParsefloatFunc(x.checkproduct)==ParsefloatFunc(x.sumsale_num)" class="btn btn-success" ng-click="Getone(x)">{{x.sale_runno}}</button>
	
	</td>
			
		
				<td>


		<b>	{{x.cus_name}} </b>


<span ng-if="x.cus_name!=''">
	<br />
<button class="btn btn-default btn-xs" ng-click="printDivfullsend(x)"><?php echo $lang_pkl_9;?></button>
</span>
			</td>
			
			
			<td align="center">
	{{x.tracking_number}}
	</td>
	
	
			
	

<td>
{{x.saleremark}}	
</td>

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











<div class="modal fade" id="Openone">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">

<span style="font-size:20px;">
<input type="radio" value="1" style="border: 0px;width: 5%;height: 2em;" ng-model="selectpapertype">
<?php echo $lang_pkl_10;?>

<input type="radio" value="2" style="border: 0px;width: 5%;height: 2em;" ng-model="selectpapertype">
<?php echo $lang_pkl_11;?>

<input type="radio" value="3" style="border: 0px;width: 5%;height: 2em;" ng-model="selectpapertype">
<?php echo $lang_pkl_12;?>

</span>

<button class="btn btn-primary btn-lg" ng-init="selectpapertype='1'" onClick="Openprintdiv1()"><?=$lang_print?></button>

				
				<button type="button" class="btn btn-default" style="float:right;" data-dismiss="modal">Close</button>


			</div>
			<div class="modal-body">
			
			
			<center>
			<form class="form-inline" ng-show="tracking_number==''">

<div class="form-group">
<input type="text" class="form-control" ng-model="product_code"
style="width:300px;font-size:30px;font-weight:bold;height:50px;" 
placeholder="<?php echo $lang_pkl_13;?>">
</div>
<div class="form-group">
<input type="submit" ng-click="Checkbarcode()" value="Enter" class="btn btn-success btn-lg">
</div>

<div class="form-group">
<button ng-click="Checkbarcode_new()" class="btn btn-warning btn-lg">
	<?php echo $lang_pkl_14;?></button>
</div>

</form>

<span ng-if="checkbarcodereturn=='0'" style="color:red;"><br />
	<?php echo $lang_pkl_15;?></span>

			</center>

<hr />
<div id="openprint1">
		
		
		
		<center ng-if="selectpapertype=='1'">
<span  style="font-size: 20px;font-weight: bold;"> <?php echo $lang_pkl_16;?>

<br />

	{{sale_runno}} 

</span>

<table class="table table-bordered">
<tr>
<td>
	<?=$lang_cusname?>: {{cus_name}}	<br />  {{cus_address_all}}
	


</td>
</tr>
</table>

</center>




<table ng-if="selectpapertype=='2' || selectpapertype=='3'" class="table table-bordered">
	<tr>
<td class="text-center">
	



	<span style="font-size: 30px;"> <b><?=$lang_sender?></b> </span>

<br />
	<span style="font-size: 20px;"><b>	<?php echo $_SESSION['owner_name']; ?> </b>
	<br />
		<?php echo $_SESSION['owner_address']; ?>
<br />
Tel: <?php echo $_SESSION['owner_tel']; ?>
</span>



</td>
</tr>
<tr>
<td class="text-center">
	
<br />	




			<span style="font-size: 40px;"><b>	<?=$lang_receiver?> </b> </span>
			<br />
	<span style="font-size: 30px;">
<b>{{cus_name}}</b>
	<br />
 {{cus_address_all}}

	</span>
</td>
</tr>
</table>


	<center>
	<span ng-if="Sum_product_weight_bill() != '0'" align="center">
	<h3><?php echo $lang_pkl_17;?> <b>{{Sum_product_weight_bill() | number}} kg</b></h3>
	</span>
<?php
		echo '<img width="300px" height="30px" src="'.$base_url.'/bc/c2mbarcode.php?barcode={{sale_runno}}">';
echo '<br /><b>{{sale_runno}}</b><br />';
  ?>

</center>


<table ng-if="selectpapertype=='1' || selectpapertype=='3'" class="table table-hover table-bordered">
	<thead>
		<tr class="trheader">
			
			<th class="text-center">Check</th> 
			<th class="text-center"><?=$lang_qty?></th>
			<th><?=$lang_productname?></th>
			
			
			<th class="text-center">zone</th>
			
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in listone">
			
<td align="center">
	

	<span class="badge" style="font-size: 20px;" 
	ng-if="ParsefloatFunc(x.checkproduct)!='0' && ParsefloatFunc(x.checkproduct)<ParsefloatFunc(x.product_sale_num)">
	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		{{x.checkproduct | number}}</span>
		
	<span class="badge" ng-if="ParsefloatFunc(x.checkproduct)==ParsefloatFunc(x.product_sale_num)" 
	style="background-color: #5cb85c;font-size: 20px;">
		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
		{{x.checkproduct | number}}</span>
	
	
	</td>
			<td align="center">{{x.product_sale_num | number}}</td>
			<td>{{x.product_name}}</td>
			
			
			<td align="center">{{x.zone_name}}</td>
		</tr>
		<tr>
			<td  align="right" style="font-weight: bold;">
			<?=$lang_all?></td>

			<td align="center" style="font-weight: bold;">{{sumsale_num | number}}</td>
			



		</tr>



	</tbody>
</table>






</div>


<hr />

<center>
<form class="form-inline">

<div class="form-group">
<input type="text" class="form-control" ng-model="tracking_number"
style="width:300px;font-size:30px;font-weight:bold;height:50px;" 
placeholder="<?php echo $lang_pkl_18;?>">
</div>
<div class="form-group">
<input type="submit" ng-click="Checkbarcode_tkn_save()" value="<?php echo $lang_save;?>" class="btn btn-success btn-lg">
</div>


</form>

</center>





			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>








<div class="modal fade" id="Openonesend">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

<form class="form-inline">
<div class="form-group">
	<select ng-model="lung" ng-change="Selectlung(lung)" class="form-control" style="font-size: 20px;text-align: center;height: 40px;">
		<option value="1">
		<?php echo $lang_pkl_19;?>
		</option>
		<option value="2">
		<?php echo $lang_pkl_20;?>
		</option>
	</select>
	</div>
<div class="form-group">
	<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
	</div>
	
	</form>
	
			<div class="modal-body" id="section-to-print2">




<table ng-if="lung=='2'" class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td>
	<span style="font-size: 30px;"> <?=$lang_sender?> </span>

<br />
	<span style="font-size: 20px;"><b>	<?php echo $_SESSION['owner_name']; ?> </b>
	<br />
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
</span>

</td>
<td>
			<span style="font-size: 30px;">	<?=$lang_receiver?> </span>
			<br />
	<span style="font-size: 20px;">
<b>{{dataprintsend.cus_name}}</b>
	<br />
<?=$lang_address?>: {{dataprintsend.cus_address_all}}

	</span>
</td>
</tr>
</table>




<table ng-if="lung=='1'" class="table table-bordered" style="table-layout: fixed;">
	<tr>
<td align="center" style="height: 150px;">
	<span style="font-size: 30px;"> <?=$lang_sender?> </span>

<br />
	<span style="font-size: 20px;"><b>	<?php echo $_SESSION['owner_name']; ?> </b>
	<br />
		<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
</span>

</td>
</tr>
<tr>
			<td align="center" style="height: 250px;">
			<span style="font-size: 60px;">	<b><?=$lang_receiver?></b> </span>
			<br />
	<span style="font-size: 30px;">
<b>{{dataprintsend.cus_name}}</b>
	<br />
<?=$lang_address?>: {{dataprintsend.cus_address_all}}

	</span>
</td>
</tr>
</table>

<center>
<?php
		echo '<img width="200px" height="50px" src="'.$base_url.'/bc/c2mbarcode.php?barcode={{dataprintsend.sale_runno}}">';
echo '<br /><b>{{dataprintsend.sale_runno}}</b><br />';
  ?>
</center>




			</div>


			<div class="modal-footer">
			<button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			</div>
		</div>
	</div>
</div>










<div class="modal fade" id="Openonemini" style="visibility: hidden;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_billmini?></h4>

			</div> -->
			<div class="modal-body">
			<div  id="openprint2" style="font-size: 12px;">
		<center>

	<?php
if($_SESSION['logoonslip']=='0'){
?>
<center>
<table width="100%">
	<tr>
<td width="100px" align="center">
<img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" style="width: 100px;">
</td>
</tr>
</table>
</center>
<?php
}
?>

		<b><span style="font-size: 14px;">	<?php echo $_SESSION['owner_name']; ?></span> </b>
		<!--<br />
		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?> -->
		<br />
<?php echo $_SESSION['owner_address']; ?>
<br />
<?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
<br />

<?php
if($_SESSION['owner_tax_number'] !=''){
 echo $lang_tax.':'.$_SESSION['owner_tax_number'].'<br />';
}
 ?>



<?=$lang_runno?>:{{sale_runno}}
<br />
			---------------------------------
				<br />
<b><?php echo $_SESSION['header_slip'];?></b>

<!--<br />

 (VAT <span ng-if="vat3 == '0'">Included</span><span ng-if="vat3 > '0'">{{vat3}} %</span>)
 -->

<br />
<span ng-if="cus_name != ''">
---------------------------------
<br />
<?=$lang_cusname?>: {{cus_name}}
<br />
 <?=$lang_address?>: {{cus_address_all}}
  <br />
 </span>

<span ng-if="product_score_all != '0.00'">
	  คะแนนบิลนี้: {{product_score_all | number}}<br />
	  </span>
 <span ng-if="cus_score != '0.00'">คะแนนสะสม: {{cus_score | number}}</span>
  <br />
 </span>


		---------------------------------
		<br />
	<?=$lang_productservice?>

</center>

<table width="100%">

		<tr ng-repeat="x in listone">

			<td width="70%">{{x.product_sale_num | number}}&nbsp;&nbsp; {{x.product_name}}
				<?php if($_SESSION['show_price_per_one']=='1'){ echo '<br />
				&nbsp;&nbsp;&nbsp;&nbsp;{{x.product_sale_num | number}} {{x.product_unit_name}} X {{x.product_price | number:2}}฿';}?>
				</td>
			<td align="right"  width="30%">{{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}</td>
		</tr>
		<tr>

			<td><?=$lang_summary?></td>


			<td align="right">{{sumsale_price | number:2}}</td>
		</tr>


<?php
if($_SESSION['owner_vat_status']!='0'){
?>
 <tr>
<td><?=$lang_vat?> <?=$_SESSION['owner_vat']?> %</td>
		<td  style="font-weight: bold;" align="right">
		{{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?php echo $_SESSION['owner_vat'];?>/100) | number:2}}</td>
		</tr>


		<tr>
		<td><?=$lang_pricebeforvat?></td>
		<td align="right">
		{{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}</td>
		</tr>

		<tr>
		<td><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr>


<?php } ?>





		<tr ng-if="discount_last2 != '0.00'">

		<td>ส่วนลดท้ายบิล</td>
		<td align="right">-{{discount_last2 | number:2}}</td></tr>

		<tr>

		<td><?=$lang_sumall?></td>
		<td align="right" style="font-weight: bold;">{{sumsalevat-discount_last2 | number:2}}</td></tr>


		<tr>

		<td><?=$lang_getmoney?></td>
		<td align="right">{{money_from_customer3 | number:2}}</td></tr>
		<tr>

		<td><?=$lang_moneychange?></td>
		<td align="right">{{money_from_customer3 -(sumsalevat-discount_last2) | number:2}}</td></tr>

</table>


		<?php
if($_SESSION['open_vat_on_slip']=='1'){
?>
<center>
	---------------------------------
	</center>
	<table width="100%">

 <tr>
<td>VAT</td>
		<td  style="font-weight: bold;" align="right">
		{{price_vat_all | number:2}}</td>
		</tr>


		<tr>
		<td>ก่อน VAT</td>
		<td align="right">
		{{sumsalevat-price_vat_all | number:2}}</td>
		</tr>

</table>
<?php } ?>


<center>

		---------------------------------
		<br />
<?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
<br />


<?=$lang_day?>: {{adddate}}
<!-- <br />
<img src="<?php echo $base_url;?>/warehouse/barcode/png?barcode={{sale_runno}}" style="height: 70px;width: 160px;"> -->


<br />
<br />
<?=$_SESSION['footer_slip']?>

<br />
___________________________<centter>
</div>

			</div>
			<div class="modal-footer">
			<button class="btn btn-primary" onClick="Openprintdiv2()">
			<?=$lang_print?></button>
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

			</div>
		</div>
	</div>
</div>







<div class="modal fade" id="Seemorepay">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			
			
			<div class="modal-body">
			
			<center><h2><b>{{sale_runno}}</b></h2> </center>
			
			<table class="table table-hover">
			<tr ng-repeat="x in morepaylist">
				<td>{{x.pay_type_name}}</td>
				<td align="right">{{x.money | number}}</td>
			</tr>
			</table>

			</div>
			<div class="modal-footer">
			
			<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>

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


	$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};


$scope.printDiv = function(){
	window.scrollTo(0, 0);
	window.print();
};




$scope.tracking_number ='';
$scope.showtype = 'all';





$scope.Getonemini = function(x){
$http.post("Salelist/Getone",{
	sale_runno: x.sale_runno
}).success(function(response){
$scope.listone = response;
$scope.cus_name = x.cus_name;
$scope.cus_address_all = x.cus_address_all;
$scope.sale_runno = x.sale_runno;
$scope.sumsale_discount = x.sumsale_discount;
$scope.sumsale_num = x.sumsale_num;
$scope.sumsale_price = x.sumsale_price;
$scope.money_from_customer3 = x.money_from_customer;
$scope.vat3 = x.vat;
$scope.price_vat_all = x.price_vat_all;
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
$scope.number_for_cus = x.number_for_cus;
$scope.product_score_all = x.product_score_all;
$scope.cus_score = x.cus_score;

setTimeout(function(){
Openprintdiv2();
 }, 1000);
 
 
        });

};



$scope.printDivmini2 = function(x){
$('#Openonemini').modal('show');
$('#Openonemini').css('visibility','');

$scope.Getonemini(x);


};





$scope.printDivfullsend = function(x){
$('#Openonesend').modal('show');

$scope.dataprintsend = x;



};

$scope.lung = '1';
$scope.Selectlung = function(x){
$scope.lung = x;
};







//start ค้นหา
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
//end ค้นหา






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

$scope.dayfrom = '<?php echo date('d-m-Y',time()-(7*86400));?>';
$scope.dayto = '<?php echo date('d-m-Y',time());?>';




$scope.perpage = '1000';
$scope.searchtext = '';
$scope.page = '1';

$scope.getlist = function(searchtext,page,perpage){
	
	if($scope.searchtext !=''){
	$scope.showtype = 'all';
		}
		
		
$scope.list = false;
	
   if(!searchtext){
   	searchtext = '';
   }


if(searchtext!=''){
   //$scope.dayfrom = '';
   //$scope.dayto='';
   }






    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '100';
   }

   $http.post("packing_list/get",{
searchtext:$scope.searchtext,
page: $scope.page,
perpage: $scope.perpage,
dayfrom: $scope.dayfrom,
dayto: $scope.dayto,
showtype: $scope.showtype
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









$scope.getlist_detail = function(){
	
$scope.list_detail = false;
	
   $http.post("Salelist/get_detail",{
dayfrom: $scope.dayfrom,
dayto: $scope.dayto
}).success(function(data){
$scope.list_detail = data.list;
        });

   };



$scope.product_code = '';
$scope.checkbarcodereturn = '';
$scope.Checkbarcode = function(){
	$scope.checkbarcodereturn = '';	
   $http.post("packing_list/Checkbarcode",{
product_code: $scope.product_code,
sale_runno: $scope.sale_runno
}).success(function(data){
$scope.checkbarcodereturn = data;


if(data!='0'){
	playbeep();
	$scope.getlist();
	$scope.Getone2();
$scope.product_code = '';
}

        });

   };
   
   
   
   
   $scope.Checkbarcode_new = function(){
   $http.post("packing_list/Checkbarcode_new",{
sale_runno: $scope.sale_runno
}).success(function(data){
$scope.Getone2();
        });

   };
   
   






$scope.Checkbarcode_tkn_save = function(){
   $http.post("packing_list/Checkbarcode_tkn_save",{
sale_runno: $scope.sale_runno,
tracking_number: $scope.tracking_number
}).success(function(data){
toastr.success('<?php echo $lang_success;?>');
$scope.Getone2();
$scope.getlist();

        });

   };
   
   



$scope.Getone2 = function(){
$http.post("packing_list/Getone",{
	sale_runno: $scope.sale_runno
}).success(function(response){
$scope.listone = response;
        });

};




$scope.Getone = function(x){
	$scope.checkbarcodereturn = '';
	$scope.product_code = '';
$('#Openone').modal('show');
$http.post("packing_list/Getone",{
	sale_runno: x.sale_runno
}).success(function(response){
$scope.listone = response;
$scope.cus_name = x.cus_name;
$scope.cus_address_all = x.cus_address_all;
$scope.sale_runno = x.sale_runno;
$scope.sumsale_discount = x.sumsale_discount;
$scope.sumsale_num = x.sumsale_num;
$scope.sumsale_price = x.sumsale_price;
$scope.money_from_customer = x.money_from_customer;
$scope.vat3 = x.vat;
$scope.price_vat_all = x.price_vat_all;
$scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat)/100)) + parseFloat(x.sumsale_price);
$scope.money_changeto_customer = x.money_changeto_customer;
$scope.adddate = x.adddate;
$scope.discount_last2 = x.discount_last;
$scope.tracking_number = x.tracking_number;
        });

};






$scope.Sum_product_weight_bill = function(){
var total = 0;
 angular.forEach($scope.listone,function(item){
 if(item.product_weight==''){
 product_weight = '0';
	 }else{
	product_weight =  item.product_weight;
	 }
total += parseFloat(product_weight);
 });

	return total;
	
};







});
	</script>
	
	
	
	
