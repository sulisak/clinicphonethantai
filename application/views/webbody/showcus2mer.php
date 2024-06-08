
<font style="font-family: Phetsarath OT !important;">
<style>
.video-container {
	position:relative;
	padding-bottom:56.25%;
	padding-top:30px;
	height:0;
	overflow:hidden;
}
  
 

.video-container iframe, .video-container object, .video-container embed {
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
}
</style>



<div  id="money_change_showcus" class="container" ng-app="firstapp" ng-controller="Index" style="display:none;margin-left: 0px; padding-left: 0px; padding-right: 0px; margin-right: 0px;width: 100%;">

<div ng-if="money_change_showcus[0].money_change_showcus =='0.01' && listsale==''">

  <?php
  $url = $_SESSION['youtube_url_forcus'];
  parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
  //echo $my_array_of_vars['v'];
    // Output: C4kxS1ksqtw
  ?>




<!-- <hr />
<center>
<h1 style="font-weight:bold;font-size:40px;color:orange;">
   <?=$lang_welcomecusnext?>
</h1>
</center> -->


</div>







<div class="col-md-8">
<table width="100%" height="100%">
<tr>
<td>


  <?php if($image1!=''){ ?>
  <div id="myCarousel" class="carousel slide" data-ride="carousel"
data-interval="<?php echo $changetime;?>"
  style="display:none;">
    <!-- Indicators -->
  

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php echo $base_url;?>/<?php echo $image1;?>" style="width:100%;height:<?php echo $picheight;?>px;">

      </div>

      <div ng-if="bannerlist[0].image2!=''" class="item">
     <img src="<?php echo $base_url;?>/<?php echo $image2;?>"  style="width:100%;height:<?php echo $picheight;?>px;">
</div>
    
      <div ng-if="bannerlist[0].image3!=''" class="item">
     <img src="<?php echo $base_url;?>/<?php echo $image3;?>"  style="width:100%;height:<?php echo $picheight;?>px;">
</div>

 <div  ng-if="bannerlist[0].image4!=''" class="item">
     <img src="<?php echo $base_url;?>/<?php echo $image4;?>"  style="width:100%;height:<?php echo $picheight;?>px;">
</div>

 <div ng-if="bannerlist[0].image5!=''" class="item">
     <img  src="<?php echo $base_url;?>/<?php echo $image5;?>"  style="width:100%;height:<?php echo $picheight;?>px;">
</div>



    </div>

   
  </div>
  <?php } ?>
  
  
  
  
  
<div ng-if="bannerlist[0].image1==''" class="video-container">
<?php if(isset($my_array_of_vars['v']) && $my_array_of_vars['v'] != ''){ ?>
<iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $my_array_of_vars['v'];?>?autoplay=1&loop=1&playlist=<?php echo $my_array_of_vars['v'];?>" frameborder="0" allow="autoplay; encrypted-media"></iframe>
<?php } ?>


<?php if(!isset($my_array_of_vars['v'])){ ?>
<center>
<img ng-if="listsale[listsale.length-1].product_image != ''" ng-src="<?php echo $base_url?>/{{listsale[listsale.length-1].product_image}}" class="img img-responsive" >
</center>
<?php } ?>

</div>




</td>
</tr>
</table>
</div>

<div class="panel panel-default col-md-4" style="font-size:20px;font-weight:bold;">
		<div class="panel-body">


<div ng-if="showcusnamescore!='' && showcusnamescore.cus_name_show!=''">
	<b>
<center>ຊື່ລູກຄ້າ: {{showcusnamescore.cus_name_show}}  ມີ {{showcusnamescore.customer_score_show | number}} point
</center>
</b>
	</div>
 <table class="table table-hover" width="100%">
      	<thead style="background-color:orange;color:#fff;">
      		<tr>

      			<th width="<?php if($show_pricepernum=='0'){echo '35%';}else{echo '60%';}?>"> <?=$lang_productname?></th>
            <th  width="20%" class="text-center"> QTY</th>
			
			<?php if($show_pricepernum=='0'){?>
      			<th width="25%" class="text-right"> <?=$lang_price?>/ໜ່ວຍ</th>
				<?php } ?>
				
				
				
      			<th width="25%" class="text-right"> <?=$lang_all?></th>

      		</tr>
      	</thead>
		</table>
<div id="salebox" style="height: <?php echo $saleboxheight;?>px;overflow: auto;">

      <table class="table table-hover" width="100%">
      	<tbody style="color:#000;">
      		<tr ng-repeat="x in listsale" >



      			<td  width="<?php if($show_pricepernum=='0'){echo '35%';}else{echo '60%';}?>" >
<img ng-if="x.product_image!=''" ng-src="<?php echo $base_url?>/{{x.product_image}}" width="80px" height="80px">

      {{x.product_name}}


      <input type="hidden" ng-model="x.product_id">

      			</td>




            <td  width="15%" align="center">
					
			<?php if($show_discount_text=='0'){?>
			 <span ng-if="x.product_price_discount=='0.00'">  {{x.product_sale_num | number}} </span>
    <span ng-if="x.product_price_discount!='0.00'" style="font-size:30px;">  {{x.product_sale_num | number}} </span>
      <?php }else{ ?>
	   {{x.product_sale_num | number}}  
	  <?php } ?>
	  	  
	  </td>
	  
	   
	   
<?php if($show_pricepernum=='0'){?>
      			<td width="20%" class="text-right">
      				{{x.product_price-x.product_price_discount | number:<?php echo $_SESSION['decimal_print']; ?>}}
					
					<?php if($show_discount_text=='0'){?>
					<p ng-if="x.product_price_discount!='0.00'" style="font-size:12px;">
		<span style="color:green;">	{{x.product_price | number:<?php echo $_SESSION['decimal_print']; ?>}}	 </span>
		<span style="color:red;">	-{{x.product_price_discount | number:2}} </span> </p>
		<?php } ?>
		
</td>
 <?php } ?>



      			<td  width="20%" class="text-right">
				
				{{(x.product_price - x.product_price_discount) * x.product_sale_num  | number:<?php echo $_SESSION['decimal_print']; ?> }}
				
				
				
				<?php if($show_discount_text=='0'){?>
				<p ng-if="x.product_price_discount!='0.00'" style="font-size:12px;">
			<span style="color:green;">	{{x.product_price* x.product_sale_num | number:<?php echo $_SESSION['decimal_print']; ?>}} 
			<span style="color:red;">	-{{x.product_price_discount* x.product_sale_num | number:2}} </span> </p>
				<?php } ?>
			
			
      
				</td>



      		</tr>

        </tbody>
      </table>

    </div>

<table class="table" style="background-color: #fcf8e3;">
<tr>
<td style="font-size:30px;font-weight:bold;">ລວມ</td>
<td align="right" style="font-size:30px;font-weight: bold;">{{Sumsalenum() | number }} </td>
<td align="right" style="font-size:30px;font-weight:bold;">{{Sumsaleprice() | number:<?php echo $_SESSION['decimal_print']; ?> }}</td>
</tr>
<tr>
<td colspan="2" style="font-size:30px;font-weight:bold;">ສ່ວນຫຼຸດທ້າຍບິນ</td>
<td align="right" style="font-size:30px;font-weight:bold;color:red;">-{{discount_last | number:<?php echo $_SESSION['decimal_print']; ?>}}</td>
</tr>
  <tbody>

      		<tr style="font-size:20px;background-color:orange;color:#fff;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
      		<td align="left"><?=$lang_sumall?></td>

      			
      			<td colspan="2" align="right" style="color:#000;font-size:60px;font-weight: bold;border:1px solid orange;">{{Sumsaleprice()-discount_last | number:<?php echo $_SESSION['decimal_print']; ?> }} </td>

      		</tr>

<tr>
<td colspan="2" >
ຍອດຊື້ກ່ອນຫຼຸດ {{Sumsaleall() | number:2}}
</td>

<td class="text-right">
ສ່ວນຫຼຸດທັ້ງໝົດ <span style="color:red;">-{{Sumsalediscount() | number:2}}</span>
</td>
</tr>
      	</tbody>
      </table>



	  

		</div>
	</div>
	
	
	
	<?php if($_SESSION['user_type']=='4'){?>
	<div class="col-md-12" >
	<center>
	<button class="btn btn-default btn-xs" ng-click="Updateimagemodal()">
	<span class="glyphicon glyphicon-cog" aria-hidden="true"> ຕັ້ງຄ່າ</button>
	<div>
	</center>
	<?php } ?>
	
	
	
	
<div class="modal fade" id="updateimagemodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">ຕັ້ງຄ່າ</h4>
			</div>
			<div class="modal-body">
<img ng-if="bannerlist[0].image1!=''" src="<?php echo $base_url;?>/<?php echo $image1;?>"  style="width:50px;height:50px;">
<button ng-if="bannerlist[0].image1!=''
&& bannerlist[0].image2==''
&& bannerlist[0].image3==''
&& bannerlist[0].image4==''
&& bannerlist[0].image5==''
" class="btn btn-danger btn-xs" ng-click="Delimage('1')">x</button>

	<img ng-if="bannerlist[0].image2!=''" src="<?php echo $base_url;?>/<?php echo $image2;?>"  style="width:50px;height:50px;">
<button ng-if="bannerlist[0].image2!=''" class="btn btn-danger btn-xs" ng-click="Delimage('2')">x</button>


	<img ng-if="bannerlist[0].image3!=''" src="<?php echo $base_url;?>/<?php echo $image3;?>"  style="width:50px;height:50px;">
<button ng-if="bannerlist[0].image3!=''" class="btn btn-danger btn-xs" ng-click="Delimage('3')">x</button>




	<img ng-if="bannerlist[0].image4!=''" src="<?php echo $base_url;?>/<?php echo $image4;?>"  style="width:50px;height:50px;">
<button ng-if="bannerlist[0].image4!=''" class="btn btn-danger btn-xs" ng-click="Delimage('4')">x</button>




	<img ng-if="bannerlist[0].image5!=''" src="<?php echo $base_url;?>/<?php echo $image5;?>"  style="width:50px;height:50px;">
<button ng-if="bannerlist[0].image5!=''" class="btn btn-danger btn-xs" ng-click="Delimage('5')">x</button>





<form id="uploadImg"  enctype="multipart/form-data" method="POST">
	<div ng-if="bannerlist[0].image1==''" class="form-group">
<input type="file"  name="image1" accept="image/*" class="form-control" value="" >
</div>
	<div ng-if="bannerlist[0].image2==''" class="form-group">
<input type="file"  name="image2" accept="image/*" class="form-control" value="" >
</div>
	<div ng-if="bannerlist[0].image3==''" class="form-group">
<input type="file"  name="image3" accept="image/*" class="form-control" value="" >
</div>
	<div ng-if="bannerlist[0].image4==''" class="form-group">
<input type="file"  name="image4" accept="image/*" class="form-control" value="" >
</div>
	<div ng-if="bannerlist[0].image5==''" class="form-group">
<input type="file"  name="image5" accept="image/*" class="form-control" value="">
</div>
	<div class="form-group">
	ຄວາມສູງຂອງພາບ ຄ່າປົກກະຕິ 945
<input type="text" id="picheight" name="picheight"   class="form-control" placeholder="945" style="width:100px;">
</div>

	<div class="form-group">
	ເວລາໃນການປ່ຽນພາບ ວິນາທີ ຄ່າປົກກະຕິ 5
<input type="text" id="changetime" name="changetime"   class="form-control" placeholder="5" style="width:100px;">
</div>


	<div class="form-group">
	ຄວາມສູງຂອງກ່ອງສະແດງລາຍການສິນຄ້າ ຄ່າປົກກະຕິ 560
<input type="text" id="saleboxheight" name="saleboxheight"   class="form-control" placeholder="560" style="width:100px;">
</div>


<div class="form-group">
	ສະແດງລາຄາຕໍ່ໜ່ວຍ
	<select class="form-control" id="show_pricepernum" name="show_pricepernum" style="width:100px;">
	<option value="0">ສະແດງ</option>
	<option value="1">ບໍ່ສະແດງ</option>
	</select>
</div>

<div class="form-group">
	ສະແດງຕົວເລກ ລາຄາປົກກະຕິ ແລະ ສ່ວນຫຼຸດຂອງແຕ່ລະລາຍການເມື່ອສິນຄ້າມີສ່ວນຫຼຸດ

	<select class="form-control" id="show_discount_text" name="show_discount_text" style="width:100px;">
	<option value="0">ສະແດງ</option>
	<option value="1">ບໍ່ສະແດງ</option>
	</select>
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

























<div class="modal fade" id="openchangmoney">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body" ng-if="money_change_showcus[0].money_change_showcus!='0.01' && listsale==''">



<center>
<?=$lang_moneyback?> <br />
  <span class="text-right" style="color:green;font-size:200px;font-weight:bold;"> {{money_change_showcus[0].money_change_showcus | number:2}}</span>

</center>

<table class="table" style="font-size:40px;font-weight:bold;">


<tr>


  <td class="text-right">
   <?=$lang_getmoneycus?></td>
  <td class="text-right">{{money_change_showcus[0].money_from_cus_showcus | number:2}}</td>
  
</tr>
<tr>
  <td class="text-right"> <?=$lang_moneyallget?></td>
  <td class="text-right">-{{money_change_showcus[0].price_value_showcus | number:2}}</td>
  
</tr>

</table>

<br />







			</div>
			<div class="modal-footer">

			</div>
		</div>
	</div>
</div>








</div>

      </font>
<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http) {

$scope.money_change_showcus = [{money_change_showcus:''}];
$scope.money_change_showcus[0].money_change_showcus = '0.01';
$scope.discount_last = '0.00';
$scope.listsale = [];

  $scope.Showlistorder = function(){

  	$http.post("<?php echo $base_url;?>/sale/Salepic/showlistorder",{
  		}).success(function(data){
  	$scope.listsale = data;
  		});


  };
  $scope.Showlistorder();


  setInterval(function () {
    $scope.Showlistorder();
  }, 2000);





$scope.Updateimagemodal = function(){
$('#updateimagemodal').modal('show');
$("#changetime").val($scope.bannerlist[0].changetime);
$("#picheight").val($scope.bannerlist[0].picheight);
$("#saleboxheight").val($scope.bannerlist[0].saleboxheight);	
	$("#show_discount_text").val($scope.bannerlist[0].show_discount_text);
$("#show_pricepernum").val($scope.bannerlist[0].show_pricepernum);		
};




$(document).ready(function (e) {
    $('#uploadImg').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: '<?php echo $base_url;?>/Home/Addimgbanner',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
$( "#uploadImg" )[0].reset();

$('#updateimagemodal').modal('hide');
location.reload();

            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));


});



 
$scope.bannerlist = [];
  $scope.Showbannerlist = function(){

      $http.post("<?php echo $base_url;?>/home/Getimgbanner",{
    		}).success(function(data){
    	$scope.bannerlist = data;
		$("#myCarousel").css("display","block");
		
$("#money_change_showcus").css("display","block");


    		});
			
			
  }
$scope.Showbannerlist();




  $scope.Delimage = function(x){

      $http.post("<?php echo $base_url;?>/home/Delimage",{
		  image: x
    		}).success(function(data){
$scope.Showbannerlist();

    		});
			
			
  }
  
  
  
  


  $scope.Showmoney_change = function(){


      $http.post("<?php echo $base_url;?>/sale/Salepic/showmoneychange",{
    		}).success(function(data){
    	$scope.money_change_showcus = data;
    		});
			
	$http.post("<?php echo $base_url;?>/sale/Salepic/Sesdiscount2",{
    		}).success(function(data){
    	$scope.discount_last = data;
    		});
			
			
			 $http.post("<?php echo $base_url;?>/sale/Salepic/showcusnamescore",{
    		}).success(function(data){
    	$scope.showcusnamescore = data;
    		});
			
	

	


  };
  setInterval(function () {
    $scope.Showmoney_change();
	
	if($scope.money_change_showcus[0].money_change_showcus!='0.01' && $scope.listsale==''){
	$('#openchangmoney').modal('show');
}else{
	$('#openchangmoney').modal('hide');
}

	
	setTimeout(function() {
	var objDiv = document.getElementById("salebox");
	objDiv.scrollTop = objDiv.scrollHeight;
}, 10);

  }, 2000);








   $scope.Sumsalenum = function(){
  var total = 0;

   angular.forEach($scope.listsale,function(item){
  total += parseFloat(item.product_sale_num);
   });
      return total;
  };
  
  
  
     $scope.Sumsalediscount = function(){
  var total = 0;

   angular.forEach($scope.listsale,function(item){
  total += parseFloat(item.product_sale_num*item.product_price_discount);
   });
      return total+parseFloat($scope.discount_last);
  };




    $scope.Sumsaleall = function(){
  var total = 0;

   angular.forEach($scope.listsale,function(item){
  total += parseFloat(item.product_sale_num*item.product_price);
   });
      return total;
  };
  
  
  





$scope.Getround = function(){
$http.post("<?php echo $base_url;?>/salesetting/round_setting/getround",{
	}).success(function(data){
$scope.roundlist = data;
        });
};
$scope.Getround();



  
$scope.digits_count = function(n) {
  var count = 0;
  if (n >= 1) ++count;

  while (n / 10 >= 1) {
    n /= 10;
    ++count;
  }

  return count;
}



 $scope.Sumsaleprice = function(){
var total = 0;
var xxx = 'f';
var sum = 0;
var cdigi = "";
$scope.round_money = '';
$scope.round_money_is = '';

 angular.forEach($scope.listsale,function(item){
total += parseFloat((item.product_price - item.product_price_discount) * item.product_sale_num);
 });
 
total = total.toFixed(8);
var x = total;
var decimals = x - Math.floor(x);

angular.forEach($scope.roundlist,function(item){
	if(item.rs_from <= decimals && item.rs_to >= decimals){
		xxx = parseFloat(item.rs_is);
	$scope.round_money = decimals;	
	$scope.round_money_is = xxx;
		}
	cdigi = $scope.digits_count(item.rs_to);
 });

if($scope.roundlist != '' && xxx !='f' ){
sum = total-decimals+xxx;
}


 if(xxx == 'f'){
var str = total;

str = parseInt(str).toFixed(0);
//console.log(str);
//console.log("Original data: ",str);
str = str.slice(str.length-cdigi);
//console.log(cdigi);
str = parseInt(str);
//console.log("After truncate: ",str);


angular.forEach($scope.roundlist,function(item){
	if(item.rs_from <= str && item.rs_to >= str){
		xxx = parseFloat(item.rs_is);
		$scope.round_money = str;
		$scope.round_money_is = xxx;
		}
		
 });
 //console.log(xxx);
 
if($scope.roundlist != '' && xxx !='f' ){
sum = parseInt(total-str+xxx);
}else{
sum = total;
}
 }


    return sum;
};






});

</script>
