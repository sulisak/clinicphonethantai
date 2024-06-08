
<div class="col-md-12 col-sm-12" ng-app="firstapp" ng-controller="Index">

<div class="panel panel-default">
	<div class="panel-body">


<h2><?=$lang_printer?>/<?php echo $lang_slip;?></h2>
<table width="100%" class="table table-hover table-bordered">
	<tr>

		
		<!--<td colspan="1" class="text-center">

<select type="hidden" class="form-control" ng-model="printer_ul" ng-change="Cashierprinteripsave()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
	USB ปริ้นเบราเซอร์
	</option>
  <option value="1">
USB Standalone
</option>

<option value="2">
LAN Network Wifi
</option> 
</select>-->

		</td>

		<td colspan="2" class="text-center" ng-show="printer_ul!='0'">

<select class="form-control" ng-model="printer_type" ng-change="Cashierprinteripsave()"  style="width:200px;font-size:16px;font-weight:bold;height:50px;">
<option value="1">
58mm
</option>
<option value="2">
80mm
</option>
</select>

		</td>





	</tr>


<tr ng-show="printer_ul=='1'">
	<td>Printer Name</td>
	<td>
		<input type="text" ng-model="printer_name" class="form-control" placeholder="ชื่อ เครื่องปริ้น" style="font-size:16px;font-weight:bold;height:50px;">
	</td>
	<td>
		<button class="btn btn-success btn-lg" ng-click="Cashierprinteripsave()">บันทึก</button>
		<!-- <button class="btn btn-default" ng-click="printDiv2()">ทดสอบปริ้น</button> -->
	</td>
	</tr>


	<tr ng-show="printer_ul=='2'">
		<td>IP Printer</td>
		<td>
			<input type="text" ng-model="cashier_printer_ip" class="form-control" placeholder="192.168.0.250" style="font-size:16px;font-weight:bold;height:50px;">
		</td>
		<td>
			<button class="btn btn-success btn-lg" ng-click="Cashierprinteripsave()">บันทึก</button>
			<!-- <button class="btn btn-default" ng-click="printDiv2()">ทดสอบปริ้น</button> -->
		</td>
	</tr>

<tr>
<td>
<?php echo $lang_ptpc_1;?>
<select class="form-control" ng-model="print_preview" ng-change="Print_preview_save()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
 <?php echo $lang_ptpc_notshow;?>
	</option>
<option value="1">
	<?php echo $lang_ptpc_show;?>
	</option>
</select>

</td>





<td>
<?php echo $lang_ptpc_4;?>
<select class="form-control" ng-model="decimal_print" ng-change="Print_preview_save()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
 <?php echo $lang_ptpc_5;?>
	</option>
<option value="1">
	1 <?php echo $lang_ptpc_6;?>
	</option>
	
	<option value="2">
	2 <?php echo $lang_ptpc_6;?>
	</option>
	
	<option value="3">
	3 <?php echo $lang_ptpc_6;?>
	</option>
	
</select>

</td>


	
	
	
	
<td>

<?php if($_SESSION['picunderslip']!=''){?>
	<img src="<?php echo $base_url.'/'.$_SESSION['picunderslip'];?>" style="height: 50px;">
<?php } ?>

<button class="btn btn-info" ng-click="Updatepicmodal()"><?php echo $lang_ptpc_7;?> </button>
<button class="btn btn-default" ng-click="Nopic()"><?php echo $lang_ptpc_8;?></button>



	</td>
	
	
	
	
	
	
</tr>


</table>

<table class="table table-hover">

<tr>
<td>
<?php echo $lang_ptpc_9;?>
<select class="form-control" ng-model="showstorename" ng-change="Print_preview_save()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
 <?php echo $lang_ptpc_notshow;?>
	</option>
<option value="1">
	<?php echo $lang_ptpc_show;?>
	</option>
</select>	
</td>
<td>
<?php echo $lang_ptpc_10;?>
<select class="form-control" ng-model="showstoreaddress" ng-change="Print_preview_save()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
 <?php echo $lang_ptpc_notshow;?>
	</option>
<option value="1">
	<?php echo $lang_ptpc_show;?>
	</option>
</select>	
</td>
<td>
<?php echo $lang_ptpc_11;?>
<select class="form-control" ng-model="showstorevatnumber" ng-change="Print_preview_save()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
 <?php echo $lang_ptpc_notshow;?>
	</option>
<option value="1">
	<?php echo $lang_ptpc_show;?>
	</option>
</select>	
</td>
</tr>


<tr>
<td>
<?php echo $lang_ptpc_12;?>
<select class="form-control" ng-model="showrunno" ng-change="Print_preview_save()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
 <?php echo $lang_ptpc_notshow;?>
	</option>
<option value="1">
	<?php echo $lang_ptpc_show;?>
	</option>
</select>	
</td>
<td>
<?php echo $lang_ptpc_13;?>
<select class="form-control" ng-model="showadddate" ng-change="Print_preview_save()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
 <?php echo $lang_ptpc_notshow;?>
	</option>
<option value="1">
	<?php echo $lang_ptpc_show;?>
	</option>
</select>	
</td>
<td>
<?php echo $lang_ptpc_14;?>
<select class="form-control" ng-model="showsalesname" ng-change="Print_preview_save()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
 <?php echo $lang_ptpc_notshow;?>
	</option>
<option value="1">
	<?php echo $lang_ptpc_show;?>
	</option>
</select>	
</td>
</tr>





<tr>
<td>
<?php echo $lang_ptpc_15;?>
<select class="form-control" ng-model="showcusname" ng-change="Print_preview_save()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
 <?php echo $lang_ptpc_notshow;?>
	</option>
<option value="1">
	<?php echo $lang_ptpc_show;?>
	</option>
</select>	
</td>
<td>
<?php echo $lang_ptpc_16;?>
<select class="form-control" ng-model="showcusaddress" ng-change="Print_preview_save()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
 <?php echo $lang_ptpc_notshow;?>
	</option>
<option value="1">
	<?php echo $lang_ptpc_show;?>
	</option>
</select>	
</td>
<td>
<?php echo $lang_ptpc_17;?>
<select class="form-control" ng-model="showcustel" ng-change="Print_preview_save()"  style="width:300px;font-size:16px;font-weight:bold;height:50px;">
	<option value="0">
 <?php echo $lang_ptpc_notshow;?>
	</option>
<option value="1">
	<?php echo $lang_ptpc_show;?>
	</option>
</select>	
</td>
</tr>





</table>


</div>
</div>

<div class="panel panel-default">
	<div class="panel-body">


<span ng-repeat="x in list">
<h3 style="font-weight:bold;"><?php echo $lang_ptpc_18;?></h3>



<table class="table">
	<tr>
		<td>

			

		</td>
		<td>

		


		</td>
		<td>

<!-- เริ่มนับเลขที่ใบเสร็จใหม่ (Runno)
<select class="form-control" style="width:150px;" ng-model="x.reset_runno">
	<option value="0">
		ไม่รีเซ็ต
	</option>
	<option value="1">
		รีเซ็ตใหม่
	</option>
</select> -->

		</td>
	</tr>
</table>


<?php echo $lang_ptpc_19;?>
<textarea class="form-control" ng-model="x.header_slip"></textarea>
<br /><br />
<?php echo $lang_ptpc_20;?>
<textarea class="form-control" ng-model="x.footer_slip"></textarea>
<br /><br />
<?php echo $lang_ptpc_21;?>
<textarea class="form-control" ng-model="x.header_a4"></textarea>
<br /><br />
<?php echo $lang_ptpc_22;?>
<textarea class="form-control" ng-model="x.footer_a4"></textarea>
<br /><br />
<button class="btn btn-success btn-lg" ng-click="Updatefooter_slip(x)"><?php echo $lang_save;?></button>


</span>


<div style="position: absolute; opacity: 0.0;">
<span id="printtest" style="text-align: left;font-size: 20px;font-weight: bold;width: 400px;">
<br />

<br />
</span>
</div>




	</div>
	</div>
	
	
	
	
	



<div class="modal fade" id="updatepicmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Upload</h4>
			</div>
			<div class="modal-body">


<form id="uploadImg"  enctype="multipart/form-data" method="POST">
	<div class="form-group">

<input type="file" name="picunderslip" accept="image/*" class="form-control" value="">
</div>
<div class="form-group">
<button class="btn btn-success" type="submit"><?=$lang_save?></button>
</div>
</form>


			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>


	
	
	
	
	
	
	
	
	
	
	

	</div>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {



$scope.getcashier = function(){

$http.get('Printercategory/getcashier')
       .then(function(response){
          $scope.cashier_printer_ip = response.data[0].cashier_printer_ip;
					$scope.printer_type = response.data[0].printer_type;
					$scope.printer_ul = response.data[0].printer_ul;
					$scope.printer_name = response.data[0].printer_name;

        });
   };
$scope.getcashier();


$scope.Cashierprinteripsave = function(){
$http.post("Printercategory/Cashierprinteripupdate",{
	cashier_printer_ip: $scope.cashier_printer_ip,
	printer_type: $scope.printer_type,
	printer_ul: $scope.printer_ul,
	printer_name: $scope.printer_name
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.getcashier();

        });
};



$scope.Print_preview_save = function(){
$http.post("Printercategory/print_preview_save",{
	print_preview: $scope.print_preview,
	showstorename: $scope.showstorename,
	showstoreaddress: $scope.showstoreaddress,
	showstorevatnumber: $scope.showstorevatnumber,
	showsalesname: $scope.showsalesname,
	showadddate: $scope.showadddate,
	showrunno: $scope.showrunno,
	showcusname: $scope.showcusname,
	showcusaddress: $scope.showcusaddress,
	showcustel: $scope.showcustel,
	decimal_print: $scope.decimal_print
	}).success(function(data){
		if($scope.print_preview){
toastr.success('<?=$lang_success?>');
		}
console.log(data[0].print_preview);
$scope.print_preview = data[0].print_preview;
$scope.showstorename = data[0].showstorename;
$scope.showstoreaddress = data[0].showstoreaddress;
$scope.showstorevatnumber = data[0].showstorevatnumber;
$scope.showsalesname = data[0].showsalesname;
$scope.showadddate = data[0].showadddate;
$scope.showrunno = data[0].showrunno;
$scope.showcusname = data[0].showcusname;
$scope.showcusaddress = data[0].showcusaddress;
$scope.showcustel = data[0].showcustel;
$scope.decimal_print = data[0].decimal_print;
        });
};
$scope.Print_preview_save();






$scope.Updatepicmodal = function(){
$('#updatepicmodal').modal('show');

};



$scope.Nopic = function(){

$http.post("Printercategory/nopic",{

	}).success(function(data){

location.reload();

});

}




$(document).ready(function (e) {
    $('#uploadImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'Printercategory/Addimg',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
$( "#uploadImg" )[0].reset();
location.reload();
$('#updatepicmodal').modal('hide');
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));


});






$scope.printDiv2 = function(x){
	window.scrollTo(0, 0);

toastr.info('กำลังปริ้น...');

	var element = $("#printtest");

var getCanvas; // global variable
         html2canvas(element, {
         onrendered: function (canvas) {
               // $("#previewImage").append(canvas);
                getCanvas = canvas;



 var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/(png|jpg);base64,/, "");



    $.ajax({
      url: '<?php echo $base_url;?>/printer/example/interface/lan.php',
      data: {
             imgdata:newData,
             cashier_printer_ip: $scope.cashier_printer_ip
           },
      type: 'post',
      success: function (response) {
               console.log(response);

      }
    });



             }
         });





    //$("#btn-Convert-Html2Image").attr("download", "your_pic_name.png").attr("href", newData);



};




$scope.get = function(){

$http.get('<?php echo $base_url;?>/storemanager/Brand/get')
       .then(function(response){
          $scope.list = response.data;

        });
   };
$scope.get();



$scope.Updatefooter_slip = function(x){
$http.post("<?php echo $base_url;?>/storemanager/Brand/Updatefooter_slip",{
	owner_id: x.owner_id,
	header_slip: x.header_slip,
	footer_slip: x.footer_slip,
	header_a4: x.header_a4,
	footer_a4: x.footer_a4,
	befor_runno: x.befor_runno,
	runno_digit: x.runno_digit,
	reset_runno: x.reset_runno,
	youtube_url_forcus: x.youtube_url_forcus
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.get();
        });


};







});
	</script>
