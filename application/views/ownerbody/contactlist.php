

<div class="col-md-10 col-sm-9 lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">
	
<div class="panel panel-default">
	<div class="panel-body">
		

<font size="4"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> 
<?=$lang_cuscontactlist?> ( {{allcontact}}  <?=$lang_list?>)</font>
<hr />

<form class="form-inline">
<div class="form-group">
<input type="text" name="search" ng-model="searchtext" class="form-control" placeholder="<?=$lang_search?> <?=$lang_detail?>">
</div>
<div class="form-group">
<input type="text" id="datetime" name="searchdate" ng-model="searchdate" class="form-control" placeholder="<?=$lang_search?> <?=$lang_day?>">
</div>
<div class="form-group">
<button type="submit" ng-click="Searchsubmit(searchtext,'1')" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลดรายชื่อลูกค้า" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button> 
</div> -->
<div class="form-group">
<button type="submit" ng-click="Refreshsubmit(searchtype,searchtext,'1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>
<br /><br />
</form>
<table class="table table-hover">
	<thead>
		<tr style="background-color: #eee;">
		<th width="5px"><?=$lang_rank?></th>
		<th><?=$lang_cusname?></th>
			<th><?=$lang_detail?></th>
			<th><?=$lang_cuscontactchanel?></th>
			<th><?=$lang_cusgrade?></th>
			<th><?=$lang_cusproductservice?></th>
			<th><?=$lang_cusreasonbuy?></th>
			<th><?=$lang_cusreasonnotbuy?></th>
			<th><?=$lang_day?></th>
			
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="c in contactlistall">
		<td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-show="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>
		<td>{{c.cus_name}}</td>
			<td>{{c.contact_list_detail}}</td>
			<td>{{c.contact_from_name}}</td>
			<td>{{c.contact_grade_name}}</td>
			<td>{{c.product_service_name}}</td>
			<td>{{c.customer_reasonbuy_name}}</td>
			<td>{{c.customer_reasonnotbuy_name}}</td>
			<td>{{c.addtime}}</td>
			
		</tr>

	</tbody>
</table>

<form class="form-inline">
<div class="form-group">
<?=$lang_show?>
<select class="form-control" name="" id="" ng-model="perpage" ng-change="Contactlistallfunc(searchtext,'1',perpage)">
	<option value="10">10</option>
	<option value="20">20</option>
	<option value="30">30</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="200">200</option>
	<option value="300">300</option>
</select>

<?=$lang_page?>
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="Contactlistallfunc(searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>



</form>


	</div>
</div>









</div>




<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {

$scope.selectthispage = '1';

$("#datetime").datetimepicker({  
    timepicker:false,  
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย  
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ  
    //inline:true  

}); 


$scope.perpage = '10';
$scope.Contactlistallfunc = function(searchtext,page,perpage){
	 if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

$http.post("Contactlist/getall",{
'searchtext': searchtext || '',
'searchdate': $scope.searchdate || '',
'page': page,
'perpage': perpage
}).success(function(data){
$scope.contactlistall = data.list;
$scope.pageall = data.pageall; 
$scope.allcontact = data.all;
$('.lodingbefor').css('display','block');

$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.selectpage = page;
$scope.selectthispage = page;

        });	
};
$scope.Contactlistallfunc();

$scope.Refreshsubmit = function(){
$scope.searchtext = '';
$scope.searchdate = '';
$scope.perpage = '10';
$scope.Contactlistallfunc('','');
};

$scope.Searchsubmit = function(searchtext){
$scope.Contactlistallfunc(searchtext);
};


$scope.DownloadExcel = function(){

$http.post("Contactlist/excel",{
	'excel': '1',
	'searchtext': $scope.searchtext || '',
	'searchdate': $scope.searchdate || ''
	}).success(function(data){
var blob = new Blob([data], {type: "application/force-download"});
    var objectUrl = URL.createObjectURL(blob);
    window.location.assign(objectUrl);

        });

};


});
	</script>
