

<div class="col-md-10 col-sm-9" ng-app="firstapp" ng-controller="Index">
	
<div class="panel panel-default">
	<div class="panel-body">
		

<font size="4"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> 
 <?php echo $lang_eyle_1;?>
	<a class="btn btn-primary"  style="float: right" ng-click="Openaddnew()"><span class="glyphicon glyphicon-plus" aria-hidden="true">
	<?php echo $lang_eyle_2;?>
	</a></font>

<hr />

<div class="form-group" style="float: left;">
<input type="text" ng-model="searchtext" class="form-control" placeholder="
<?=$lang_search?>" ng-change="getlist(searchtext,'1')">
</div>


<form class="form-inline">



<div class="form-group">
<input type="text" id="dayfrom" name="dayfrom" ng-model="dayfrom" class="form-control" placeholder="<?=$lang_fromday?>"> -
</div>
<div class="form-group">
<input type="text" id="dayto" name="dayto" ng-model="dayto" class="form-control" placeholder="<?=$lang_today?>">
</div>
<div class="form-group">
<button type="submit" ng-click="getlist()" class="btn btn-success" placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>


<div class="form-group">
<button type="submit" ng-click="getlist('','1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>

</form>
<br />


<div class="col-md-12 text-right">
<input type="checkbox" ng-model="Showdelbut"> <?=$lang_showdel?>
</div>




<br />
<table class="table table-hover" id="headerTable">
	<thead>
		<tr style="background-color: #eee">
			<th><?=$lang_rank?></th>
			<th><?php echo $lang_eyle_3;?></th>
			<th><?php echo $lang_status;?></th>
			<th><?php echo $lang_eyle_4;?></th>
			<th><?php echo $lang_detail;?></th>
			<th><?php echo $lang_eyle_5;?></th>
			<th><?php echo $lang_eyle_6;?></th>
			<th><?php echo $lang_manage;?></th>
		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in list">
			
<td ng-if="selectpage=='1'" class="text-center">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center">{{($index+1)+(perpage*(selectpage-1))}}</td>


			<td>{{x.em_name}}</td>
			<td>
			<span ng-if="x.status_id=='1'"><?php echo $lang_eyle_7;?></span>
			<span ng-if="x.status_id=='2'"><?php echo $lang_eyle_8;?></span>
			<span ng-if="x.status_id=='3'"><?php echo $lang_eyle_9;?></span>
			<span ng-if="x.status_id=='4'"><?php echo $lang_eyle_10;?></span>
			</td>
			<td>{{x.leavedate}}</td>
			<td>{{x.l_des}}</td>
			
			<td>{{x.adddate}}</td>
			<td>{{x.name}}</td>
			
			<td width="70px">
<button ng-if="Showdelbut" class="btn btn-danger btn-xs" id="delete" ng-click="Delete(x)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
			</td>
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
	<option value="500">500</option>
	<option value="1000">1000</option>
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
 
 
 
 
	</div>
</div>






<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">


<div class="row">
<div class="col-md-12">
	
		<select class="form-control" ng-model="employee_id">
		 <option value="0"><?php echo $lang_eyle_11;?></option>
		 <option ng-repeat="x in listemployee" value="{{x.em_id}}">{{x.em_name}}</option>
</select>

</div>


	<div class="col-md-12">
	<br />
</div>	


	<div class="col-md-12">
	<select class="form-control" ng-model="status_id">
		 <option value="1"><?php echo $lang_eyle_7;?></option>
		 <option value="2"><?php echo $lang_eyle_8;?></option>
		 <option value="3"><?php echo $lang_eyle_9;?></option>
		 <option value="4"><?php echo $lang_eyle_10;?></option>
</select>
</div>
	


	<div class="col-md-12">
	<br />
</div>	


<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?php echo $lang_detail;?>" ng-model="des">
</textarea> 
</div>

	<div class="col-md-12">
	<br />
</div>	

	<div class="col-md-12">
	<input type="text" placeholder="<?php echo $lang_day;?>" id="leavedate" name="" class="form-control" ng-model="leavedate">

</div>	
				

		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button type="submit" class="btn btn-success" id="savenew" ng-click="SaveSubmit()"><?=$lang_save?></button>
			</div>
		</div>



	</div>
</div>







<div class="modal fade" id="modaledit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_editgroup?></h4>
			</div>
			<div class="modal-body">


<div class="row">
<div class="col-md-12">
	<input type="text" placeholder="<?php echo $lang_eyle_12;?>" name="" class="form-control" ng-model="name" required>

</div>


	<div class="col-md-12">
	<br />
</div>	

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?php echo $lang_address;?>" ng-model="address">
</textarea> 
</div>


<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?php echo $lang_eyle_13;?>" ng-model="etc">
</textarea> 
</div>
				

		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button type="submit" class="btn btn-success" id="edit" ng-click="EditSubmit()"><?=$lang_save?></button>
			</div>
		</div>



	</div>
</div>






</div>




<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {



$("#leavedate").datetimepicker({
    datetimepicker:false,
        format:'d-m-Y H:i',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});


$("#dayfrom").datetimepicker({
    datetimepicker:false,
        format:'d-m-Y',
    lang:'th'  // แสดงภาษาไทย
    //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$("#dayto").datetimepicker({
    datetimepicker:false,
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


    if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

   $http.post("employee_leave/get",{
searchtext:searchtext,
page: page,
perpage: perpage,
dayfrom: $scope.dayfrom,
dayto: $scope.dayto
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





$scope.Openaddnew = function(){
	$('#modal-id').modal('show');
	$scope.employee_id = '0';
$scope.status_id ='1';
$scope.des ='';
$scope.leavedate ='';

};




$scope.getem = function(){
   
$http.get('<?php echo $base_url;?>/employee/employee_list/get')
       .then(function(response){
          $scope.listemployee = response.data.list; 
                 
        });
      

   };
$scope.getem();





$scope.SaveSubmit = function(){
	
	
if($scope.employee_id!=='0'){
$("#savenew").prop("disabled",true);
$http.post("employee_leave/add",{
	'employee_id': $scope.employee_id,
	'l_des': $scope.des,
	'status_id': $scope.status_id,
	'leavedate': $scope.leavedate
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$("#savenew").prop("disabled",false);

$('#modal-id').modal('hide');
$scope.getlist('','1');
        });	
		
}else{
alert('<?php echo $lang_eyle_14;?>');
}
	
	
};





$scope.Delete = function(x){
	

$http.post("employee_leave/delete",{
	'l_id': x.l_id
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getlist('','1');



        });	
	
	
};


$scope.Editrow = function(x){
$('#modaledit').modal('show');
$scope.em_id = x.em_id;
$scope.name = x.em_name;
$scope.address = x.em_address;
$scope.etc = x.em_etc;


};



$scope.EditSubmit = function(){
	
	

$("#edit").prop("disabled",true);
$http.post("employee_leave/update",{
	'em_id': $scope.em_id,
	'em_name': $scope.name,
	'em_address': $scope.address,
	'em_etc': $scope.etc
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$("#edit").prop("disabled",false);

$('#modaledit').modal('hide');
$scope.get();



        });	
	
	
};






});
	</script>