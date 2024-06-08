<div class="col-md-12" ng-app="firstapp" ng-controller="Index">
	
	<div class="panel panel-default">
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
			
			<form class="form-inline">
				<div class="form-group">
					<?php echo $lang_bcd_11;?>
				</div>
				<div class="form-group">
					<input style="width:150px;" type="number" ng-model="num" ng-change="Addnum(num)" placeholder="จำนวน" class="form-control" style="width:70px;font-size:18px;"/>
				</div>
			</form>
			<br />
			<button class="btn btn-success"  ng-click="Savesetting()"><?php echo $lang_bcd_12;?></button>
			
			
			<hr />
			<button class="btn btn-warning"  onclick="Openprintdiv1()"><?php echo $lang_bcd_13;?></button>
			<br /><br />
			
			
			<div id="openprint1" >
				
				<div ng-repeat="x in datac" style="margin-right: {{x.marginright}}px;margin-left: {{marginright/2}}px;margin-bottom: {{marginbottom}}px;margin-top: {{margintop}}px;overflow: hidden;float: left;text-align:left;outline:{{outline}}px dotted;">
					
					<center style="padding-left: 10px;padding-right: 10px;">
						<span ng-if="storenamelabel !=''" style="font-size: {{storenamesizelabel}}px;font-weight:bold;">	
							{{storenamelabel}}
							<br />
						</span>
						
						<?php
							
							
							echo '
							
							<span style="font-size: {{sizepname}}px;">	';  if(isset($_GET['product_name'])){ echo $_GET['product_name']; }  echo '</span>
							<br />';
							
							//echo file_get_contents($base_url.'/bc/c2mbarcode.php?barcode='.$_GET["product_code"]);
							
	
	
	
	
	if($_GET['type']=='1'){
		
		echo '<img width="200px" height="50px" src="'.$base_url.'/bc/c2mbarcode.php?barcode='.$_GET["product_code"].'">';
echo '<br /><b style="font-size: {{sizepname}}px;">'.$_GET["product_code"].'</b><br />';
 
	}


if($_GET['type']=='0'){
		
		echo '<img src="'.$base_url.'/warehouse/barcode/png?barcode='.$_GET["product_code"].'">';
echo '<br /><b>'.$_GET["product_code"].'</b><br />';
 
	}
	
	if($_GET['type']=='2'){
		echo '<img src="'.$base_url.'/qr/?code='.$_GET["product_code"].'">';
		echo '<br /><b>'.$_GET["product_code"].'</b><br />';
	}
	
	
	
							echo  '
			
			
			
							
							<span ng-if="sizeprice !=0" style="font-weight:bold;font-size:{{sizeprice}}px;">
							';
if(isset($_GET['product_price'])){ echo $lang_bcd_14.' {{ParsefloatFunc('.$_GET['product_price'].')     | number}} 
	'.$lang_bcd_15.' '; }
							
							if(isset($_GET['w_price']) && $_GET['w_price']!='0.00'){ echo '/'.$_GET['w_price']; }
							
							echo '
							</span>
							
						' ?>
						
						<span ng-if="footer !=''" style="font-size: {{footersize}}px;">
					<br />
							{{footer}}
						</span>
						
						</center>
					
					</div>
					
					
					
			</div>
			
			<div class="col-md-12">
				<hr />
			</div>
			
			
			
			
			
			
			
			
		</div>
		
		
	</div>
	
</div>


<script>
	var app = angular.module('firstapp', []);
	app.controller('Index', function($scope,$http,$location) {
		
		
		$scope.datac =[];
		$scope.datac.push(
		{
		count: '1',
		marginright:$scope.maginright
		}
		
		);
		
		$scope.Addnum = function(n,m){
			$scope.datac = [];
			for(i=1;i<=n;i++){
			if(i==n){
				mgr = '0';
				}else{
				mgr = m/2;
				}
				
				$scope.datac.push({count: i,marginright:mgr});
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
				
				$scope.Addnum(parseFloat(data[0].num),parseFloat(data[0].marginright));
				
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
				toastr.success('<?php echo $lang_success;?>');
				$scope.Getsetting();
				
			});
			
		}
		
		
		$scope.ParsefloatFunc = function(data){
			return parseFloat(data);
		};
		
		
		
		
		
		
		
		
	});
</script>
