<style>
	.ui-datepicker-year{
		display: none;
	}
</style>

<div class="col-md-10 col-sm-9 lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">
	
<div class="panel panel-default">
	<div class="panel-body">
		

<font size="4"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> <?=$lang_cuspoint?> ({{allmycustomer | number:0}} <?=$lang_person?>) </font>

<hr />




<form class="form-inline">
<div class="form-group">
<select class="form-control" ng-model="searchtype">
<option value="0"><?=$lang_memberid?></option>
	<option value="1"><?=$lang_cusname?></option>
	<option value="2"><?=$lang_tel?></option>
	<option value="3"><?=$lang_email?></option>
	<option value="4"><?=$lang_birthday?></option>
</select>
</div>
<div class="form-group">
<input ng-show="searchtype != '4'" type="text" name="search" ng-model="searchtext" class="form-control" placeholder="<?=$lang_searchkeyword?>">
<input ng-show="searchtype == '4'" type="text" name="search" ng-model="searchtext" class="form-control"  placeholder="<?=$lang_daymonth?> 03-01">
</div>
<div class="form-group">
<button type="submit" ng-click="Searchsubmit()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลดรายชื่อลูกค้า" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button> 
</div> -->
<div class="form-group">
<button type="submit" ng-click="Refreshsubmit(searchtype,searchtext,'1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>

<center>
<img ng-if="!mycustomer" src="<?php echo $base_url;?>/pic/loading.gif">
</center>

<br />
<table ng-if="mycustomer" id="headerTable" class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee">
			
			<th width="5px" class="visible-sm visible-md visible-lg">
			<?=$lang_rank?></th>
			<th style="text-align: center;"><?=$lang_memberid?></th>

			<th style="text-align: center;"><?=$lang_cusname?></th>

			<th style="text-align: center;"><?=$lang_score?></th>
			
			<th style="text-align: center;"><?=$lang_tel?></th>
			<th class="visible-sm visible-md visible-lg" style="text-align: center;"><?=$lang_email?></th>
			
			
			<th><?=$lang_editscore?></th>
		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in mycustomer">
			<td ng-if="selectpage=='1'" class="text-center visible-sm visible-md visible-lg">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center visible-sm visible-md visible-lg">{{($index+1)+(perpage*(selectpage-1))}}</td>


<td align="right">{{x.cus_add_time}}</td>

			<td>{{x.cus_name}}</td>

			<td align="right" style="background-color: #fcf8e3;" >{{x.product_score_all | number}}</td>
			
			<td align="right">{{x.cus_tel}}</td>
			<td class="visible-sm visible-md visible-lg">{{x.cus_email}}</td>
			

			<td width="130px" align="center">
<button class="btn btn-warning btn-xs" ng-click="Editrow(x)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
<button ng-if="Showdelbut" class="btn btn-danger btn-xs" id="deletecustomer" ng-click="Delete(x.cus_id)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
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

<!-- <div class="form-group">
<nav>
 <ul class="pagination">
 <li>
 <a href="" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>

 <li ng-repeat="i in pagealladd" >
 <a  ng-show="selectpage == i.a" href="#" ng-click="getmycustomer(searchtype,searchtext,i.a,perpage)" style="background-color: #eee;">{{i.a}}</a>
  <a  ng-show="selectpage != i.a" href="#" ng-click="getmycustomer(searchtype,searchtext,i.a,perpage)">{{i.a}}</a>
 </li>


 <li>
 <a href="" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
 </div> -->

</form>



<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport2();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span> 
<?=$lang_downloadexcel?> </button>


	</div>
</div>








<div class="modal fade" id="modaledit">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_editscore?></h4>
			</div>
			<div class="modal-body">


<div class="row">

<div class="col-md-12">
	<input type="text" placeholder="<?=$lang_cusname?>" name="" class="form-control" ng-model="cusname" readonly>

</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
<input type="text" class="form-control" placeholder="<?=$lang_score?>" ng-model="product_score_all">
</div>


				

		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?=$lang_close?></button>
<button type="submit" class="btn btn-success" id="editcustomer" ng-click="EditSubmit(cusid,product_score_all)"><?=$lang_save?></button>
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
	$scope.mycustomer = false;
	
   if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

$http.post('customerscore/get',{
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













$scope.Editrow = function(x){
$('#modaledit').modal('show');

$scope.cusid = x.cus_id;
$scope.cusname = x.cus_name;
$scope.product_score_all = x.product_score_all;


};



$scope.EditSubmit = function(cusid,product_score_all){
	

$http.post("Customerscore/update",{
	'cus_id': cusid,
	'product_score_all': product_score_all
	
	}).success(function(data){

toastr.success('<?=$lang_success?>');
$('#modaledit').modal('hide');
$scope.getmycustomer($scope.searchtype,$scope.searchtext,$scope.page,$scope.perpage);



        });	
	
	
};





$scope.DownloadExcel = function(){

$http.post("Mycustomer/excel",{
	'excel': '1',
	'searchtype': $scope.searchtype || '',
	'searchtext': $scope.searchtext || ''
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};


$scope.Searchsubmit = function(){
$scope.getmycustomer($scope.searchtype,$scope.searchtext,'1',$scope.perpage);
};



});
	</script>