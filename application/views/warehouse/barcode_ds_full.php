


<div class="col-md-12" ng-app="firstapp" ng-controller="Index">

	<div class="noprint" style="">
		<div class="panel-body">

			<center>


</center>

</div>
</div>




<div class="col-md-12 noprint">

<div class="panel panel-default" style="box-shadow: 0px 0px 10px 0px;">
	<div class="panel-body">
	
<b><?php echo $lang_bcd_1;?></b>
<br />


<table class="table table-bordered">
  <thead>
    <tr class="trheader">
      
      <th><?php echo $lang_bcd_2;?></th>
						<th><?php echo $lang_bcd_3;?></th>
						<th><?php echo $lang_bcd_4;?></th>
						
      
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td><input type="number" class="form-control" ng-model="marginright"></td>
      <td><input type="number" class="form-control" ng-model="marginbottom" ></td>
      <td><input type="number" class="form-control" ng-model="margintop" ></td>
    </tr>
  </tbody>
</table>

<table class="table table-bordered">
  <thead>
    <tr class="trheader">
      <th><?php echo $lang_bcd_5;?></th>
						<th><?php echo $lang_bcd_6;?></th>
						<th><?php echo $lang_bcd_7_1;?></th>
						<th><?php echo $lang_bcd_7;?></th>
						<th><?php echo $lang_bcd_8;?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><input type="text" class="form-control" ng-model="storenamelabel"></td>
      <td style="width:20%;"><input type="number" class="form-control" ng-model="storenamesizelabel"></td>
	  
      <td><input type="number" class="form-control" ng-model="sizeprice" ></td>
      <td><input type="number" class="form-control" ng-model="sizepname" ></td>
	  <td><input type="number" class="form-control" ng-model="outline" ></td>
    </tr>
  </tbody>
</table>


<table class="table table-bordered">
  <thead>
    <tr class="trheader">
     <th><?php echo $lang_bcd_9;?></th>
						<th><?php echo $lang_bcd_10;?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><textarea class="form-control" ng-model="footer"></textarea></td>
      <td style="width:20%;"><input type="number" class="form-control" ng-model="footersize"></td>
	  

    </tr>
  </tbody>
</table>


<br />
<button class="btn btn-success"  ng-click="Savesetting()"><?php echo $lang_bcd_12;?></button>



</div>
</div>
</div>



<div class="col-md-12">

<div class="panel panel-default" style="box-shadow: 0px 0px 10px 0px;min-height:838px;">
	<div class="panel-body">





<center class="noprint">

	<button class="btn btn-primary btn-lg" ng-click="Openproduct()">
		<?php echo $lang_selectproduct;?>
	</button>
	
	<button class="btn btn-success btn-lg" ng-click="Saveall()">
	<?php echo $lang_save;?>
	</button>
<br />
<font color="red"><?php echo $lang_saveforbarcode;?></font>

</center>

<hr />





<span ng-show="tcode=='1'" class="noprint">


<form class="form-inline">
	<div class="form-group">
<input type="text" ng-model="product_name" placeholder="<?php echo $lang_productname;?>" class="form-control" style="font-size:18px;"/>
</div>
<div class="form-group">
<input type="text" ng-model="product_code" placeholder="<?php echo $lang_barcode;?>" class="form-control" style="font-size:18px;"/>
</div>
<br /><p></p>
<div class="form-group">
<input type="text" ng-model="product_price" placeholder="<?php echo $lang_price;?>" class="form-control" style="font-size:18px;"/>
</div>
<div class="form-group">
<input type="number" ng-model="num" ng-change="Addnum(num)" placeholder="<?php echo $lang_qty;?>" class="form-control" style="width:70px;font-size:18px;"/>
</div>
</form>


</span>


<span ng-show="tcode=='2'" class="noprint">


<i ng-repeat="x in datac2">


	<form class="form-inline">
		<div class="form-group">
		{{$index+1}}.
	</div>
		<div class="form-group">
<input type="text" ng-model="x.product_name2" placeholder="<?php echo $lang_productname;?>" class="form-control" style="font-size:18px;width:180px;" disabled>
</div>
<div class="form-group">
<input type="text" ng-model="x.product_code2" placeholder="<?php echo $lang_barcode;?>" class="form-control" style="font-size:18px;width:180px;" disabled>
</div>
<div class="form-group">
<input type="text" ng-model="x.product_price2" placeholder="<?php echo $lang_price;?>" class="form-control" style="font-size:18px;width:100px" disabled>
</div>
<div class="form-group">
<button class="btn btn-warning" ng-click="Delete($index)"><span class="glyphicon glyphicon-minus"></span></button>
</div>
</form>

</i>

</span>



<hr />
<button class="btn btn-success noprint"  onclick="Openprintdiv1()">
<span class="glyphicon glyphicon-print"></span>

	<?php echo $lang_bcd_13;?></button>
<br /><br />


<div id="openprint1" >






<?php

foreach ($barcode_array as $value) {
	?>
	
<div style="margin-right: {{marginright/2}}px;margin-left: {{marginright/2}}px;margin-bottom: {{marginbottom}}px;margin-top: {{margintop}}px;overflow: hidden;float: left;width: {{widthlabel}}px;height: {{heightlabel}}px;text-align:left;border: dotted;border-width: {{outline}}px;">

<center style="padding-left: 10px;padding-right: 10px;">
	 <span ng-if="storenamelabel !=''" style="font-size: {{storenamesizelabel}}px;font-weight:bold;">	
	 {{storenamelabel}}
	 <br />
	 </span>

 <span style="font-size: {{sizepname}}px;">	<?php echo $value['product_name2']?>
<br />
</span>

<?php
//echo file_get_contents($base_url.'/bc/c2mbarcode.php?barcode='.$value["product_code2"]);

							

       echo '<img width="200px" height="50px" src="'.$base_url.'/bc/c2mbarcode.php?barcode='.$value["product_code2"].'">';
echo '<br /><b style="font-size: {{sizepname}}px;">'.$value["product_code2"].'</b><br />';
 
	
	
	?>						
							

<span style="font-weight:bold;font-size:{{sizeprice}}px;">
	
<?php echo $lang_price;?> 
{{ParsefloatFunc('<?php echo $value['product_price2']?>') | number}} 
<?php echo $lang_currency;?>
</span>


<span ng-if="footer !=''" style="font-size: {{footersize}}px;">
<br />
{{footer}}
</span>

</center>

</div>


<?php
}
?>












</div>



</div>










<div class="modal fade" id="Openproduct">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_selectproduct;?> </h4>
			</div>
			<div class="modal-body">
<input type="text" ng-model="searchproduct" placeholder="<?php echo $lang_search;?>" class="form-control" ng-change="Searching(searchproduct)">

<table class="table table-bordered">
<tr ng-repeat="x in list">
<td><button type="button" class="btn btn-success" ng-click="Addproduct(x)"><?php echo $lang_select;?></button></td>
<td>({{x.product_code}}){{x.product_name}} ราคา {{x.product_price}}</td>
</tr>
</table>



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>














</div>


</div>







<div class="col-md-3" style="padding-left: 0px;overflow-y: auto;height:100%;width:300px;overflow-x: hidden;">





	



	




</div>










</div>

















<!-- Modal -->
<div id="about" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">About</h4>
      </div>
      <div class="modal-body">
    <center>    <b>
This is free service for create or design barcode online and print.
<br />You can design and print your barcode on this website service.
<br />Now we have service for barcode code128 only,
<br />If you need any code send something to us.
</b>
<center>

</center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>





<!-- Modal -->
<div id="howtouse" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">How To Use?</h4>
      </div>
      <div class="modal-body">

<b>First Step</b><br />
Select One Product Or More Product
<hr />
<b>If Select One Product</b><br />
Step 1 Put text into the box ,header,footer, product name, code, price.<br />
Step 2 Put number for qty of barcode you need.<br />
Step 3 Click print button for print all barcode to paper you need. <br />

<hr />
<b>If Select More Product</b><br />
Step 1 Put text into the box ,header,footer<br />
Step 2 Click Add Barcode button if you need more product.<br />
Step 3 Put text into the box, product name, code, price.<br />
Step 4 Click print button for print all barcode to paper you need. <br />

<hr />
<b>Left Menu Design Barcode</b><br />
You can put number for design your barcode.

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>






<!-- Modal -->
<div id="contact" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Contact Us</h4>
      </div>
      <div class="modal-body">
    <center>
          <p>Contact Us On Facebook And you Can Send Message To Us.</p>
        <a href="https://fb.com/freeonlinebarcodegenerator" target="_blank">
    <b> >>Click Here<<  </b>
  </a>

</center>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>






</div>






<div class="col-md-12">
  <hr />
</div>


<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


 $scope.widthlabel = '';
  $scope.heightlabel = '';
  $scope.marginright = '';
  $scope.marginbottom = '';
  $scope.margintop = '';
  $scope.heightbarcode = '';
  $scope.widthbarcode = '';
  $scope.sizeprice = '';
  $scope.sizepname = '';
  
  $scope.storenamelabel = '';
  $scope.storenamesizelabel = '';
  $scope.outline = '';
  $scope.num = '';
  
  $scope.footer = '';
  $scope.footersize = '';
  
  
  
  $scope.Openproduct = function(){
	  $('#Openproduct').modal('show');
  }
  
  
$scope.Searching = function(searchtext){
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

 $http.post("<?php echo $base_url;?>/warehouse/Productlist/get",{
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
  
  
  
  $scope.Getsetting = function(s){
  $http.post("<?php echo $base_url;?>/warehouse/Barcode_ds/getsetting",{

  }).success(function(data){

  $scope.widthlabel = parseFloat(data[0].widthlabel);
  $scope.heightlabel = parseFloat(data[0].heightlabel);
  $scope.marginright = parseFloat(data[0].marginright);
  $scope.marginbottom = parseFloat(data[0].marginbottom);
  $scope.margintop = parseFloat(data[0].margintop);
  $scope.heightbarcode = parseFloat(data[0].heightbarcode);
  $scope.widthbarcode = parseFloat(data[0].widthbarcode);
  $scope.sizeprice = parseFloat(data[0].sizeprice);
  $scope.sizepname = parseFloat(data[0].sizepname);
  
  $scope.storenamelabel = data[0].storenamelabel;
  $scope.storenamesizelabel = parseFloat(data[0].storenamesizelabel);
  $scope.outline = parseFloat(data[0].outline);
  $scope.num = parseFloat(data[0].num);

$scope.Addnum(parseFloat(data[0].num));

$scope.footer = data[0].footer;
$scope.footersize = parseFloat(data[0].footersize);


  });

  }
$scope.Getsetting();


$scope.Savesetting = function(s){
$http.post("<?php echo $base_url;?>/warehouse/Barcode_ds/savesetting",{
widthlabel: $scope.widthlabel,
heightlabel: $scope.heightlabel,
marginright: $scope.marginright,
marginbottom: $scope.marginbottom,
margintop: $scope.margintop,
heightbarcode: $scope.heightbarcode,
widthbarcode: $scope.widthbarcode,
sizeprice: $scope.sizeprice,
sizepname: $scope.sizepname,
storenamelabel: $scope.storenamelabel,
storenamesizelabel: $scope.storenamesizelabel,
outline: $scope.outline,
num: $scope.num,
footer: $scope.footer,
footersize: $scope.footersize
}).success(function(data){
toastr.success('บันทึกสำเร็จ');
$scope.Getsetting();

});

}


$scope.ParsefloatFunc = function(data){
return parseFloat(data);
};





<?php if(isset($_GET["product_name"])){ ?>
$scope.product_name = '<?php echo $_GET["product_name"]?>';
$scope.product_price = '<?php echo $_GET["product_price"]?>';
$scope.product_code='<?php echo $_GET["product_code"]?>';
<?php }else{ ?>
$scope.product_name = '';
$scope.product_price = '';
$scope.product_code='';
<?php } ?>



$scope.header = '';


$scope.tcode = '2';



$scope.datac =[];
$scope.datac.push(
	{count: '1'}
);

$scope.Addnum = function(n){
	$scope.datac = [];
	for(i=1;i<=n;i++){
	$scope.datac.push({count: i});
}


}


$scope.Typecode = function(t) {
	$scope.tcode = t;
}


$scope.datac2 = [];
$scope.datac2.push({product_name2: '',product_code2: '',product_price2: ''});
$scope.Addproduct = function(x) {
	$scope.datac2.push({product_name2: x.product_name,product_code2: x.product_code,product_price2: x.product_price});
}


$scope.Delete = function(index){
	$scope.datac2.splice(index, 1);
}




$scope.Saveall = function(){
	$http.post("barcode_ds_full/saveall",{
data: $scope.datac2
}).success(function(data){
	toastr.success('<?=$lang_success?>');
	location.reload();
});
}


$scope.Getall = function(){
	$http.post("barcode_ds_full/getall",{
}).success(function(data){
	$scope.datac2 = data;
	console.log($scope.datac2);
});
}

$scope.Getall();






});




</script>
<style>
@media print
{
    .noprint {
        display:none !important;
        height:0px !important;
    }
}
.form-control{
    border: 1px solid #171616;
}
.btn-default{
    border: 1px solid #171616;
}
.trheader{
	background-color: rgba(255,255,255,.15);
	color: #000;
}
</style>


