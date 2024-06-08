
<center>
<div class="col-md-9 col-sm-9" ng-app="firstapp" ng-controller="Index">


<div class="col-md-3">

</div>
<div class="col-md-6">

	<div class="panel panel-default">
		<div class="panel-body">

<center style="font-size:30px;color:blue;font-weight:bold;">
	<?php echo $lang_sbw_1;?>
</center>

		</div>
	</div>

<form class="form-inline">
<div class="form-group">
<input type="text" id="sstt" ng-model="searchtext" 
placeholder="<?php echo $lang_sbw_2;?>" autofocus class="form-control" style="font-size:50px;width:600px;height:70px;" />
</div>
<div class="form-group">
<input type="submit" class="btn btn-lg btn-default" style="height:70px;font-size:30px;" ng-click="getlist(searchtext)" 
value="<?php echo $lang_search;?>(Enter)" />
</div>

</form>
<br />
<div class="panel panel-default">
	<div class="panel-body">


<table ng-if="list!=''" width="100%" class="table table-hover">

<tr  ng-repeat="x in list" style="font-size:30px;font-weight:bold;">
<td>
<button class="btn btn-primary btn-lg" ng-click="Openinputweight(x)">
<?php echo $lang_select;?>
</button>
</td>

<td>
{{x.product_code}}
</td>
<td>
{{x.product_name}}
</td>
<td>
	{{x.product_price | number}} <?php echo $lang_sbw_7;?>
</td>
<td>
	<img height="100px" ng-if="x.product_image!=''" ng-src="<?php echo $base_url;?>/{{x.product_image}}">
</td>

</tr>
</table>

<h1 ng-if="list==''" style="color:red;">
<?php echo $lang_sbw_3;?>
</h1>







	</div>

	<div class="col-md-3">

	</div>




	</div>

	</div>
	
	
	
	
	
	
	
	<div class="modal fade" id="Modalinputww">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				
			</div>
			<div class="modal-body">
			<center>
			<h1><b><?php echo $lang_sbw_4;?></b></h1>
			<h2>{{datapp.product_code}} {{datapp.product_name}}</h2>
<form class="form-inline">
<div class="form-group">
<input type="text" id="ww" ng-model="ww" placeholder="" class="form-control" 
style="font-size:120px;width:400px;height:150px;color:red;background-color: #ccc;" />
</div>
<br />
<div class="form-group">
<input type="submit" class="btn btn-lg btn-success" style="height:70px;font-size:30px;" ng-click="printbarcode()" value="(Enter)" />
</div>

</form>

<br />


<div id="openprint1" ng-if="ww!=''">
				
				<div ng-repeat="x in datac" style="outline:{{outline}}px dotted;">
					
					<center style="padding-left: 10px;padding-right: 10px;">
						<span ng-if="storenamelabel !=''" style="font-size: {{storenamesizelabel}}px;font-weight:bold;">	
							{{storenamelabel}}
							<br />
						</span>
						
						<?php
							
							
							echo '
							
							<span style="font-size: {{sizepname}}px;">	{{datapp.product_name}}</span>
							<br />';
							
	
echo '<img width="200px" height="50px;" src="'.$base_url.'/bc/c2mbarcode.php?barcode={{datapp.product_code}}{{productweight2()}}">';
echo '<br /><b>{{datapp.product_code}}{{productweight2()}}</b><br />';
 

//echo '<img width="300px" height="100px;" src="'.$base_url.'/warehouse/barcode/png?barcode={{datapp.product_code}}{{productweight2()}}">';
//echo '<br />';
 
	

	
	?>
			
			
							
							<span ng-if="sizeprice !=0" style="font-weight:bold;font-size:{{sizeprice}}px;">
							
							
							
							<div ng-if="ww!=''">
							<?php echo $lang_sbw_5;?> {{ww}} kg
							</div>
							
							
							
						<?php echo $lang_sbw_6;?> {{ParsefloatFunc(productweight3()*datapp.product_price)  | number}} 
						<?php echo $lang_sbw_7;?> 
							
							
							</span>
							
						
						
						<span ng-if="footer !=''" style="font-size: {{footersize}}px;">
					<br />
							{{footer}}
						</span>
						
						</center>
					
					</div>
					
					
					
			</div>
			
			

<hr />
<?php echo $lang_sbw_8;?> {{ParsefloatFunc2(productweight3()*datapp.product_price)}}
<select class="form-control" ng-model="math">
	<option value="1"><?php echo $lang_sbw_9;?></option>
	<option value="2"><?php echo $lang_sbw_10;?></option>
	</select>


</center>
			</div>
			
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</div>

	</center>


	<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope,$http,$location) {


$scope.list =[];
$scope.ww = '';

$scope.getlist = function(searchtext){

 $http.post("Check_productlist_foranyone/get",{
searchtext:searchtext
}).success(function(data){
          $scope.list = data;
$scope.searchtext = '';
        });
   };

$scope.Openinputweight = function(x){
	$('#Modalinputww').modal('show');
	$scope.datapp = x;

$scope.ww = '';

 setTimeout(function(){ 
  $("#ww").focus();
	  }, 1000);

	
}





$scope.printbarcode = function(){
	Openprintdiv1();
	
	 $('#Modalinputww').modal('hide');
 
setTimeout(function(){ 
  $("#sstt").focus();
	  }, 100);
	
}





		$scope.datac =[];
		$scope.datac.push(
		{count: '1'}
		
		);
		
		$scope.Addnum = function(n){
			$scope.datac = [];
			for(i=1;i<=1;i++){
				$scope.datac.push({count: i});
			}
			
			
		}
		
		
		
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
		
		$scope.productweight = $scope.ww;
		
		$scope.productweight2 = function(){
	
	if($scope.ww!=''){
	var d = '9'+$scope.ww;
var s = d + '';
s =s.replace('.', '');
s = parseInt(s);


return s;
}else{
return '';
}
			};
			
			
			
					$scope.productweight3 = function(){
if($scope.ww!=''){

return $scope.ww;
}else{
return 1;
}
			};
			
			
		
		
		$scope.Getsetting = function(s){
			$http.post("Barcode_ds/getsetting",{
				
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
			$http.post("Barcode_ds/savesetting",{
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
		
		
		$scope.math = '1';
		$scope.ParsefloatFunc = function(data){
		
		if($scope.math=='1'){
		data2 = Math.ceil(data.toFixed(2));
		}else{
		data2 = Math.floor(data.toFixed(2));
		}
		console.log(data2);
			return parseFloat(data2);
		};
		
		
		
	$scope.ParsefloatFunc2 = function(data){
		
		data2 = data.toFixed(2);
		
			return parseFloat(data2);
		};

	
	

});




	
	function validate(evt) {
 if(evt.keyCode!=8)
    {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key))
        {
            theEvent.returnValue = false;

            if (theEvent.preventDefault)
                theEvent.preventDefault();
            }
        }
}


	</script>
