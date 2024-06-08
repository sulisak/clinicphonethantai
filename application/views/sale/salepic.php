<?php 
foreach ($Getpermission_rule as $value) {
 $arr =  json_decode($value['permission_rule']);
}
?>
<style type="text/css">
.product_box:hover {

    box-shadow: 0 1px 2px #000;

}

.div td,
.div tr,
.div table,
.div th,
.div tbody,
.div thead {
    font-family: "Phetsarath OT" !important;
}

.panel-body {
    font-family: "Phetsarath OT" !important;
}

.text-right {
    text-align: right;
}

* {
    font-family: "Phetsarath OT" !important;
}

/* add new to custom preview quotation */
.setrow_heigh tr {
    line-height: 0.8;
}

/* add new to custom preview quotation */

<?php if($_SESSION['printer_type']=='1') {
    $pt_width='380px';
}

else {
    $pt_width='550px';
}

?><?php if($_SESSION['printer_type']=='1') {
    $slipwidth='190px';
}

else {
    $slipwidth='250px';
}

?>
</style>

<audio id="play" src="<?php echo $base_url;?>/sound/beep.wav"></audio>

<font style="font-family: Phetsarath OT!important;">

    <div class="lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">



        <?php if(isset($_GET['mode'])){ ?>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <?php }else{ ?>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <?php } ?>


                <div style="overflow: auto;">

                    <select class="form-control" name="product_category_id" ng-model="product_category_id"
                        style="height: 45px;width: 130px;float: left;font-size: 20px;"
                        ng-change="Selectcat(product_category_id)">
                        <option value="0">
                            <?=$lang_producthavepic?>
                        </option>
                        <option ng-repeat="y in categorylist" value="{{y.product_category_id}}" style="font-size:30px;">
                            {{y.product_category_name}}
                        </option>
                    </select>


                    <div class="form-group" style="float: left;">
                        <input id="product_name_search" ng-model="product_name_search" class="form-control"
                            placeholder=" <?php echo $lang_searchname;?> <?php echo $lang_productname;?> <?php echo $lang_barcode;?>"
                            style="height: 45px;width: 300px;font-size: 20px;" ng-change="pregetlist()">


                    </div>



                    <?php if($_SESSION['have_product_course']=='1'){?>
                    <div class="form-group" style="float: left;">
                        <button ng-click="Opencourse()" class="btn btn-success btn-lg" placeholder=""
                            title="<?=$lang_search?>">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            <?php echo $lang_sp_1;?>
                        </button>

                    </div>
                    <?php } ?>


                    <!-- ================================= -->

                    <!-- <div class="modal fade" id="Opencustomer">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_searchcus?></h4>
			</div>
			<div class="modal-body">

<form class="form-inline">
<div class="form-group">
<input type="text" ng-model="customer_name" class="form-control" placeholder="<?=$lang_searchkeyword?>" style="height: 45px;width: 300px;font-size: 20px;">
</div>
<div class="form-group">
<button type="submit" ng-click="Searchcustomer()" class="btn btn-success btn-lg" placeholder="" title="<?=$lang_searchcus?>"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</div>
<div class="form-group">
<a href="<?php echo $base_url; ?>/mycustomer" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_addcus?>" target="_blank"><?=$lang_addcus?></a>
</div>
</form>
<br />
<table class="table table-hover">
	<thead>
		<tr class="trheader">
			<th><?=$lang_select?></th><th><?=$lang_memberid?></th
				><th><?=$lang_cusname?></th><th><?=$lang_group?></th><th><?=$lang_address?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="x in customerlist">
			<td><button class="btn btn-success" ng-click="Selectcustomer(x)">
<?=$lang_select?>
			</button></td>
			<td>{{x.cus_add_time}}</td>
			<td>{{x.cus_name}}</td>
			<td>{{x.customer_group_name}}</td>
			<td>{{x.cus_tel}} {{x.cus_address}}  {{x.district_name}} {{x.amphur_name}} {{x.province_name}} {{x.cus_address_postcode}} </td>
		</tr>
	</tbody>
</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div> -->


                    <div class="modal fade" id="Opencustomer">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><?=$lang_searchcus?></h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-inline">


                                        <!-- --------------- try -------------------- -->
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <input type="text" ng-model="search_customer_name" ng-change="
pregetlistcus()" class="form-control" placeholder="<?php echo $lang_sp_42;?>"
                                                    style="height: 45px;width: 300px;font-size: 20px;">
                                            </div>

                                            <div class="form-group">
                                                <a href="<?php echo $base_url; ?>/mycustomer" class="btn btn-primary"
                                                    placeholder="" title="<?=$lang_addcus?>"
                                                    target="_blank">+&nbsp;<?=$lang_addcus?></a>
                                            </div>
                                        </form>
                                        <!-- ----------------------------------- -->

                                    </div>


                                    <br />
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr class="trheader">
                                                <th ng-if="getcourse=='0'"><?=$lang_select?></th>
                                                <th ng-if="getcourse=='1'"><?php echo $lang_sp_43;?></th>
                                                <th><?=$lang_memberid?></th>
                                                <th><?=$lang_cusname?></th>
                                                <th><?php echo $lang_sp_44;?></th>
                                                <th><?php echo $lang_sp_45;?></th>
                                                <th><?=$lang_group?></th>
                                                <th><?=$lang_address?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="x in customerlist">
                                                <td ng-if="getcourse=='0'"><button class="btn btn-success"
                                                        ng-click="Selectcustomer(x)">
                                                        <?=$lang_select?>
                                                    </button></td>

                                                <td ng-if="getcourse=='1'">

                                                    <button ng-if="x.sumcourse >'0'" class="btn btn-info"
                                                        ng-click="Selectcourse(x)">
                                                        <?php echo $lang_sp_46;?> {{x.sumcourse | number}}
                                                        <?php echo $lang_sp_47;?>
                                                    </button>
                                                </td>


                                                <td>{{x.cus_add_time}}</td>
                                                <td><b style="font-size:20px;">{{x.cus_name}}</b>
                                                    <span ng-if="x.credit_limit !='0'">
                                                        <br />
                                                        <b style="color:green;"
                                                            ng-if="x.credit_limit_foruse !='' && x.credit_limit_foruse >'0.00'">
                                                            <?php echo $lang_sp_48;?>
                                                            {{x.credit_limit_foruse | number}}</b>

                                                        <b style="color:red;"
                                                            ng-if="x.credit_limit_foruse !='' && x.credit_limit_foruse <='0.00'">
                                                            <?php echo $lang_sp_48;?>
                                                            {{x.credit_limit_foruse | number}}</b>


                                                        <b style="color:green;" ng-if="x.credit_limit_foruse ==''">
                                                            <?php echo $lang_sp_48;?> {{x.credit_limit | number}}</b>
                                                        <br />
                                                        <b style="color:blue;">
                                                            <?php echo $lang_sp_49;?>
                                                            {{x.credit_limit | number}}</b>
                                                    </span>

                                                </td>
                                                <td>{{x.cus_tel}}</td>
                                                <td align="center">{{x.product_score_all | number}}</td>
                                                <td>{{x.customer_group_name}}</td>
                                                <td>{{x.cus_address}} {{x.cus_address_postcode}}
                                                    <span ng-if="x.taxnumber!=''"><br /><?php echo $lang_sp_50;?>
                                                        {{x.taxnumber}} </span>


                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- =========================================== -->


                    <form class="form-inline" style="float: right;">


                        <!--
<div class="form-group">
<input id="customer_name" ng-model="customer_name" class="form-control" placeholder="<?=$lang_cusname?>" style="height: 45px;width: 110px;font-size: 14px;" readonly="">
</div> -->

                        <div class="form-group">
                            <button type="submit" ng-click="Opencustomer()" class="btn btn-success btn-lg"
                                placeholder="" title="<?=$lang_search?>"><span class="glyphicon glyphicon-search"
                                    aria-hidden="true"></span>

                                <span ng-if="customer_name ==''"><?=$lang_cusname?></span>
                                <span ng-if="customer_name !=''">{{customer_name}} </span>
                            </button>

                            <div class="form-group" style="float: right;"
                                ng-if="customer_score && customer_score!='0.00'">

                                <button class="btn btn-lg btn-info" style="font-weight:bold"
                                    ng-click="Showproduct_pointmodal()">
                                    <?php echo $lang_sp_2;?> ({{customer_score | number}})
                                </button>

                            </div>

                        </div>
                        <div class="form-group">
                            <input type="hidden" id="cus_address_all" ng-model="cus_address_all" class="form-control"
                                placeholder="<?=$lang_address?>" style="height: 45px;font-size: 16px;width: 500px;">
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="cus_address_all" ng-model="cus_address_all" class="form-control"
                                placeholder="<?=$lang_address?>" style="height: 45px;font-size: 16px;width: 500px;">
                        </div>

                        <!-- <div class="form-group">
<button ng-click="Refresh()" class="btn btn-default btn-lg" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div> -->


                        <a href="<?php echo $base_url;?>/sale/product_return" class="btn btn-default btn-lg"
                            onclick="window.open(this.href, 'windowName', 'width=1300, height=700, left=24, top=24, scrollbars, resizable'); return false;"><?=$lang_productreturn?></a>

                        <a href="<?php echo $base_url;?>/warehouse/productlist_foranyone" class="btn btn-default btn-lg"
                            onclick="window.open(this.href, 'windowName', 'width=1000, height=700, left=24, top=24, scrollbars, resizable'); return false;"><?=$lang_stock?></a>


                        <!-- <div class="form-group" style="font-size: 20px;color: orange;border-color: #000;">
<input type="checkbox" ng-model="reserv" ng-true-value="1" ng-false-value="0" style="height: 35px;width: 35px;"><?=$lang_bookitem?>
</div> -->


                    </form>



                    <!-- </form> -->

                    <input type="hidden" name="" ng-model="customer_id">




                </div>





                <div style="height: 760px;overflow: auto;">


                    <div <?php if(isset($_GET['mode'])){?>
                        class="col-xs-3 col-sm-3 col-md-3 panel panel-default product_box product_box_button"
                        <?php }else{ ?>
                        class="col-xs-2 col-sm-2 col-md-2 panel panel-default product_box product_box_button" <?php } ?>
                        ng-repeat="x in productlist" title="{{x.product_name}} {{x.product_des}}"
                        style="height: 240px;width: 200px;cursor: pointer;padding-left: 0px;padding-right: 0px;"
                        ng-click="Addpushproductcode(x.product_code)">
                        <center style="font-size: 14px;">
                            {{x.product_code}} (<b style="color:red;"><?php echo $lang_sp_3;?>
                                {{x.product_stock_num |number}}</b>)
                        </center>
                        <div class="panel-body" style="padding: 0px;">


                            <center>
                                <img ng-if="x.product_image !=''" ng-src="<?php echo $base_url;?>/{{x.product_image}}"
                                    class="img img-responsive" style="height: 145px;"
                                    title="{{x.product_name}}  {{x.product_des}}">

                                <!-- <img ng-if="x.product_image ==''" ng-src="<?php echo $base_url;?>/pic/df.png" class="img img-responsive" style="height: 150px;" title="{{x.product_name}}"> -->

                                <div ng-if="x.product_image == ''"
                                    style="font-size:30px;font-weight:bold;height:140px;line-height: 140px;">
                                    <p style="line-height: 1.3;display: inline-block;vertical-align: middle;">
                                        {{x.product_name}} </p>
                                </div>


                                <p></p>

                                <span ng-if="x.product_image != ''"
                                    style="font-weight:bold;">{{x.product_name | limitTo:25}}</span>

                                <br />

                                <div ng-if="x.product_price_discount==0.00" style="color: red;font-weight: bold;">
                                    <span ng-if="sale_type=='1'">{{x.product_price | number:2}}</span>
                                    <span ng-if="sale_type=='2'">{{x.product_wholesale_price | number:2}}</span>
                                    <span ng-if="sale_type=='3'">{{x.product_price3 | number:2}}</span>
                                    <span ng-if="sale_type=='4'">{{x.product_price4 | number:2}}</span>
                                    <span ng-if="sale_type=='5'">{{x.product_price5 | number:2}}</span>
                                </div>

                                <span ng-if="x.product_price_discount!=0.00 && sale_type=='1'">
                                    <strike>
                                        {{x.product_price | number:2}}
                                    </strike>
                                </span>

                                <span ng-if="x.product_price_discount!=0.00 && sale_type=='2'">
                                    <strike>
                                        {{x.product_wholesale_price | number:2}}
                                    </strike>
                                </span>

                                <span ng-if="x.product_price_discount!=0.00 && sale_type=='3'">
                                    <strike>
                                        {{x.product_price3 | number:2}}
                                    </strike>
                                </span>

                                <span ng-if="x.product_price_discount!=0.00 && sale_type=='4'">
                                    <strike>
                                        {{x.product_price4 | number:2}}
                                    </strike>
                                </span>

                                <span ng-if="x.product_price_discount!=0.00 && sale_type=='5'">
                                    <strike>
                                        {{x.product_price5 | number:2}}
                                    </strike>
                                </span>

                                <span ng-if="x.product_price_discount!=0.00 && sale_type=='1'"
                                    style="color: red;font-weight: bold;">
                                    {{x.product_price-x.product_price_discount | number:2}}
                                </span>

                                <span ng-if="x.product_price_discount!=0.00 && sale_type=='2'"
                                    style="color: red;font-weight: bold;">
                                    {{x.product_wholesale_price-x.product_price_discount | number:2}}
                                </span>

                                <span ng-if="x.product_price_discount!=0.00 && sale_type=='3'"
                                    style="color: red;font-weight: bold;">
                                    {{x.product_price3-x.product_price_discount | number:2}}
                                </span>

                                <span ng-if="x.product_price_discount!=0.00 && sale_type=='4'"
                                    style="color: red;font-weight: bold;">
                                    {{x.product_price4-x.product_price_discount | number:2}}
                                </span>

                                <span ng-if="x.product_price_discount!=0.00 && sale_type=='5'"
                                    style="color: red;font-weight: bold;">
                                    {{x.product_price5-x.product_price_discount | number:2}}
                                </span>


                            </center>

                        </div>
                    </div>


                    <center>
                        <img ng-if="!productlist || !productlistkey" src="<?php echo $base_url;?>/pic/loading.gif">
                    </center>



                    <div class="col-sm-3 col-md-2">
                        <div ng-click="Addproductrank()" class="panel-body  panel panel-default product_box"
                            style="height: 90px;cursor: pointer;background-color: #eee;">


                            <center>
                                <?php echo $lang_sp_4;?><br />
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"
                                    style="font-size: 40px;"></span>

                            </center>

                        </div>


                        <div ng-show="productlist.length != '0'" ng-click="Delproductrank()"
                            class="panel-body  panel panel-default product_box"
                            style="height: 90px;cursor: pointer;background-color: #eee;">


                            <center>
                                <?php echo $lang_sp_5;?><br />
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"
                                    style="font-size: 40px;"></span>

                            </center>

                        </div>



                    </div>




                </div>







            </div>


            <?php if(isset($_GET['mode'])){ ?>
            <div class="col-xs-6 col-md-6 col-sm-6">
                <?php }else{ ?>
                <div class="col-xs-4 col-md-4 col-sm-4">
                    <?php } ?>

                    <table width="100%">
                        <tbody>
                            <tr>

                                <td>


                                    <div class="form-group" style="float: right;">

                                        <?php if(!isset($arr) || $arr[29]->status==true){?>
                                        <button ng-click="Opencashnow()" class="btn btn-lg btn-default"
                                            style="font-weight:bold">
                                            <?php echo $lang_sp_6;?> </button>
                                        <?php } ?>

                                        <?php if(isset($_SESSION['shift_user_id']) && $_SESSION['user_id']==$_SESSION['shift_user_id']){?>
                                        <button ng-click="Closeshiftnow()" class="btn btn-lg btn-info"
                                            style="font-weight:bold"><?=$lang_closeshif?>
                                            (<?php if(isset($_SESSION['shift_id'])){echo number_format($_SESSION['shift_id']);} ?>)</button>
                                        <?php } ?>
                                    </div>




                                    <form class="form-inline">
                                        <div class="form-group">
                                            <input type="text" id="product_code_id" class="form-control"
                                                ng-model="product_code"
                                                style="text-align: right;height: 47px;background-color:#dff0d8;font-size: 16px;width:150px;"
                                                placeholder="<?=$lang_barcode?>" autofocus>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" ng-click="Addpushproductcode(product_code)"
                                                class="btn btn-default btn-lg" ng-disabled="yingbarcode">Enter</button>
                                        </div>


                                    </form>



                                </td>
                            </tr>

                        </tbody>
                    </table>




                    <div class="panel panel-default">
                        <div class="panel-body">


                            <center>


                                <form class="form-inline">

                                    <div class="form-group">
                                        <select class="form-control" ng-model="sale_type"
                                            style="background-color:orange;color:#fff;">
                                            <option value="1">
                                                {{name_of_price_list[0].price1}}
                                            </option>
                                            <option value="2" ng-show="name_of_price_list[0].price2!=''">
                                                {{name_of_price_list[0].price2}}
                                            </option>
                                            <option value="3" ng-show="name_of_price_list[0].price3!=''">
                                                {{name_of_price_list[0].price3}}
                                            </option>
                                            <option value="4" ng-show="name_of_price_list[0].price4!=''">
                                                {{name_of_price_list[0].price4}}
                                            </option>
                                            <option value="5" ng-show="name_of_price_list[0].price5!=''">
                                                {{name_of_price_list[0].price5}}
                                            </option>
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <select class="form-control" ng-model="pay_type"
                                            style="background-color:orange;color:#fff;">
                                            <option ng-repeat="x in pay_type_list" value="{{x.pay_type_id}}">
                                                {{x.pay_type_name}}
                                            </option>
                                        </select>
                                    </div>





                                    <?php if(isset($_GET['mode'])){?>
                                    <a href="?" type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-resize-small"></span> 33%
                                    </a>
                                    <?php } ?>

                                    <?php if(!isset($_GET['mode'])){?>
                                    <a href="?mode=1" type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-resize-full"></span> 50%
                                    </a>
                                    <?php } ?>




                                </form>



                            </center>



                            <div id="salebox" style="height: 300px;overflow: auto;">





                                <div ng-if="listsale==''" style="height:100px;text-align:center;"><br /><br />
                                    ຍັງບໍ່ມີລາຍການທີ່ເລືອກ...</div>



                                <table class="table table-hover">
                                    <!-- <thead>
		<tr>
			<th style="text-align:center;"><?=$lang_num?></th>

			 <th style="text-align:center;">สินค้าเสริม</th>
			<th style="text-align:center;"><?=$lang_product?></th>
			<th style="text-align:center;"><?=$lang_productunit?></th>
			<th style="text-align:center;"><?=$lang_price?></th>
			<th class="text-right"><?=$lang_sum?></th>
			<th><?=$lang_delete?></th>
		</tr>
	</thead> -->
                                    <tbody>

                                        <tr ng-repeat="x in listsale" style="background-color:#eee;font-size:18px;">

                                            <td style="text-align:left;">



                                                <input type="text" onkeypress="validate(event)"
                                                    ng-model="x.product_sale_num"
                                                    ng-change="Updateproductnumber(x,$index)"
                                                    style="width:150px;text-align:center;float:left;">


                                                &nbsp; {{x.product_unit_name}}


                                                <button ng-repeat="y in getpotall2data"
                                                    ng-if="y.product_id==x.product_id" ng-click="Getpotmodal(x,$index)"
                                                    class="btn btn btn-default">
                                                    <span class="glyphicon glyphicon-plus">yyyyyy</span>
                                                </button>



                                            </td>



                                            <!-- <td>


</td> -->


                                            <td>

                                                {{x.product_name}}

                                                <?php if(!isset($arr) || $arr[22]->status==true){?>
                                                (<input type="text" onkeypress="validate(event)"
                                                    ng-model="x.product_price" ng-change="Updateproductprice(x)"
                                                    style="width:50px;height: 20px;font-size: 14px;">)
                                                <?php } ?>

                                                <?php if(isset($arr) && $arr[22]->status==false){?>
                                                ({{x.product_price}})
                                                <?php } ?>





                                                <?php if(!isset($arr) ||  $arr[21]->status==true){?>
                                                <br />
                                                <span style="font-size:10px;"><?php echo $lang_sp_13;?></span>
                                                <select ng-model="x.product_price_discount_percent"
                                                    ng-change="Price_discount_percent(x,$index)"
                                                    style="width:50px;height: 20px;font-size: 14px;">

                                                    <?php
for($i=0;$i<=100;$i++){
	echo '<option value="'.$i.'">'.$i.'</option>';
}
?>
                                                </select>
                                                %
                                                <!-- <input type="text" placeholder="%" ng-model="x.product_price_discount_percent" ng-change="Price_discount_percent(x,$index)" style="width:50px;height: 20px;font-size: 14px;"> -->

                                                <input type="text" onkeypress="validate(event)"
                                                    ng-model="x.product_price_discount"
                                                    style="width:50px;height: 20px;font-size: 14px;">
                                                <?php } ?>






                                                <input type="hidden" ng-model="x.product_id">

                                            </td>







                                            <td align="right">
                                                {{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2 }}
                                            </td>


                                            <td style="width: 1px;">

                                                <?php if(!isset($arr) || $arr[19]->status==true){?>
                                                <button class="btn btn-danger btn-xs"
                                                    ng-click="Deletepush(x)">x</button>
                                                <?php } ?>

                                                <?php if(isset($arr) && $arr[19]->status==false){?>
                                                <button class="btn btn-danger btn-xs"
                                                    ng-click="Deletepush_pass(x)">x</button>
                                                <?php } ?>

                                            </td>
                                        </tr>





                                        <tr style="font-size:20px;">
                                            <td colspan="1" align="right"><?=$lang_all?></td>

                                            <td style="font-weight: bold;">{{Sumsalenum() | number }}</td>
                                            <td align="right" style="font-weight: bold;">{{Sumsaleprice() | number:2 }}
                                            </td>
                                            <td></td>
                                        </tr>


                                        <!-- <tr>
		<td colspan="5" align="right">
<input type="checkbox" ng-model="addvat" ng-change="Addvatcontrol()">
		<?=$lang_vat?></td>

		</tr>  -->

                                        <?php
if($_SESSION['owner_vat_status']=='2'){
?>
                                        <tr>
                                            <td colspan="3" align="right">
                                                <?=$lang_vat?>
                                                {{vatnumber}} %
                                            <td align="right" style="font-weight: bold;">
                                                {{(Sumsaleprice() * vatnumber/100) | number:2 }}
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr>
                                            <td colspan="3" align="right"><?=$lang_pricesumvat?></td>
                                            <td align="right" style="font-weight: bold;">
                                                {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) | number:2 }}</td>
                                            <td></td>
                                        </tr>




                                        <?php
}
?>



                                    </tbody>
                                </table>

                            </div>

                            <center>


                                <div>
                                    <button ng-if="listsale != ''" id="savequotation" class="btn btn-warning btn-sm"
                                        ng-click="Savequotation()">
                                        <?php echo $lang_sp_14;?></button>
                                    <button ng-if="listsale == ''" ng-click="Showquotationlist()"
                                        class="btn btn-warning btn-sm">
                                        <?php echo $lang_sp_15;?></button>

                                    <span style="float:right;" ng-if="listsale!=''">

                                        <?php if(!isset($arr) || $arr[32]->status==true){?>
                                        <button class="btn btn-danger btn-xs" ng-click="Deletepush('all')">
                                            <?php echo $lang_sp_16;?></button>
                                        <?php } ?>

                                        <?php if(isset($arr) && $arr[32]->status==false){?>
                                        <button class="btn btn-danger btn-xs" ng-click="Deletepush_pass('all')">
                                            <?php echo $lang_sp_16;?>
                                        </button>
                                        <?php } ?>

                                        <span>

                                </div>

                            </center>

                            <table class="table">
                                <tbody>

                                    <?php if(!isset($arr) || $arr[20]->status==true){?>
                                    <tr>
                                        <td width="30%">
                                            <?=$lang_discountlast?>
                                            <select ng-model="discount_percent">
                                                <option value="0"><?=$lang_mo?></option>
                                                <option value="1">%</option>
                                            </select>

                                            <div ng-show="discount_percent=='0'">
                                                <input ng-change="Summarysale_change()" type="text"
                                                    onkeypress='validate(event)' class="form-control"
                                                    ng-model="discount_last" placeholder="<?=$lang_discount_last?>"
                                                    style="font-size: 20px;text-align: right;height: 47px;background-color:#dff0d8;">
                                                <span ng-if="discount_last!='0'"
                                                    style="font-weight: normal;">{{(discount_last*100)/(Sumsaleprice() + (Sumsaleprice() * vatnumber/100)) | number:2 }}
                                                    %</span>
                                            </div>
                                            <div ng-show="discount_percent=='1'">
                                                <input ng-change="Summarysale_change()" type="text"
                                                    onkeypress='validate(event)' class="form-control"
                                                    ng-model="discount_last_percent" placeholder="<?=$lang_dis?> %"
                                                    style="font-size: 20px;text-align: right;height: 47px;background-color:#dff0d8;">
                                                <span ng-if="discount_last_percent!='0'"
                                                    style="font-weight: normal;">{{(Sumsaleprice() + (Sumsaleprice() * vatnumber/100))*(discount_last_percent/100) | number:2 }}
                                                    <?=$lang_currency?></span>
                                            </div>

                                        </td>
                                    </tr>
                                    <?php } ?>


                                    <tr>

                                        <td
                                            style="font-weight: bold;font-size: 70px;color: red;text-align: center;vertical-align:middle;">
                                            <span ng-show="discount_percent=='0'">
                                                {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - discount_last | number:2 }}
                                            </span>

                                            <span ng-show="discount_percent=='1'">
                                                {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - ((Sumsaleprice() + (Sumsaleprice() * vatnumber/100))*(discount_last_percent/100)) | number:2 }}
                                            </span>

                                        </td>
                                    </tr>

                                    </tr>

                                </tbody>
                            </table>




                            <table class="table">

                                <tbody>

                                    <?php if(!isset($arr) || $arr[26]->status==true){?>
                                    <tr>
                                        <td>
                                            <input type="text" id="saledate" ng-model="saledate" class="form-control"
                                                placeholder="<?php echo $lang_sp_17;?>" autocomplete="off">
                                        </td>
                                    </tr>
                                    <?php } ?>

                                    <tr>



                                        <td align="right" style="width:100%;">

                                            <button ng-click="Opengetmoneymodal()" class="btn btn-lg btn-primary"
                                                style="width:100%;font-size:40px;height: 90px;">
                                                <?=$lang_getmoneyx?>(SpaceBar)
                                            </button>



                                        </td>
                                    </tr>

                                </tbody>
                            </table>




                            <div class="modal fade" id="Addproductrankmodal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><?=$lang_add?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="" ng-model="searchproductrank"
                                                ng-change="Searchproductranklist(searchproductrank)"
                                                placeholder="ค้นหาชื่อสินค้า" class="form-control">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr style="background-color: #ddd;">
                                                        <th><?=$lang_add?></th>
                                                        <th><?=$lang_productname?></th>
                                                        <th><?=$lang_price?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="x in productranklist" ng-if="x.product_rank=='0'">
                                                        <th><button class="btn btn-success btn-xs"
                                                                ng-click="Addproductranksave(x)">+
                                                                <?=$lang_add?></button>

                                                        </th>

                                                        <th>({{x.product_code}}) {{x.product_name}}</th>
                                                        <th>{{x.product_price}}</th>
                                                    </tr>
                                                </tbody>
                                            </table>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>











                            <div class="modal fade" id="Showproduct_pointmodal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><?php echo $lang_sp_18;?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <center>
                                                <h1><?php echo $lang_sp_19;?> {{customer_score | number}}</h1>
                                            </center>
                                            <font color="red"><?php echo $lang_sp_20;?> </font>
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr style="background-color: #ddd;">
                                                        <th><?php echo $lang_sp_21;?></th>
                                                        <th><?php echo $lang_sp_22;?></th>
                                                        <th><?php echo $lang_sp_23;?></th>
                                                        <th><?php echo $lang_sp_24;?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="x in product_point_list">

                                                        <th><button
                                                                ng-if="x.point_use <= ParsefloatFunc(customer_score)"
                                                                class="btn btn-success btn-sm"
                                                                ng-click="Addpushproductcode(x.product_code,x)"><?php echo $lang_sp_21;?></button>
                                                        </th>
                                                        <th>{{x.product_name}}</th>
                                                        <th>1</th>
                                                        <th>{{x.point_use | number}}</th>
                                                    </tr>
                                                </tbody>
                                            </table>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>











                            <!-- <div class="modal fade" id="Deletelist_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo $lang_sp_25;?>  {{deletelist_x.sale_runno}}</h4>
			</div>
			<div class="modal-body">
<center style="color:red;">
<?php echo $lang_sp_26;?> {{deletelist_x.sale_runno}} <?php echo $lang_sp_27;?> 
<br />
<textarea ng-model="whydel" placeholder="<?php echo $lang_sp_28;?>" class="form-control"></textarea>
<br />

<?php if(!isset($arr) || $arr[18]->status==true){?>	
<button ng-if="whydel" class="btn btn-success btn-lg" ng-click="Deletelist(deletelist_x)">
	<?php echo $lang_sp_29;?></button>
<?php } ?>


<?php if(isset($arr) && $arr[18]->status==false){?>	
	
<input type="password" class="form-control" ng-model="billpassword" 
placeholder="<?php echo $lang_sp_30;?> ">	
<br />	
<button ng-if="whydel" class="btn btn-success btn-lg" ng-click="Deletelist_pass(deletelist_x)">
	<?php echo $lang_sp_29;?></button>

<span ng-if="cannotdeletebill=='0'" style="color:red;"><br />
	<?php echo $lang_sp_31;?></span>
<?php } ?>

</center>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div> -->










                            <div class="modal fade" id="Showquotationlistmodal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"></h4>
                                        </div>
                                        <div class="modal-body">



                                            <input ng-model="search_quotationlist" type="text" placeholder="ค้นหา..."
                                                class="form-control" style="width:200px;">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr class="trheader">
                                                        <th><?=$lang_rank?></th>
                                                        <th><?php echo $lang_sp_32;?></th>
                                                        <th><?php echo $lang_sp_33;?></th>
                                                        <th><?php echo $lang_sp_34;?></th>
                                                        <th><?=$lang_cusname?></th>



                                                        <th><?=$lang_productnum?></th>
                                                        <th><?=$lang_pricesum?></th>


                                                        <?php
				if($_SESSION['owner_vat_status']=='2'){
				?>
                                                        <th><?=$lang_vat?> Exclude %</th>
                                                        <th><?=$lang_pricesumvat?></th>
                                                        <?php
				}
				?>


                                                        <th><?=$lang_discountlast?></th>
                                                        <th><?=$lang_sumall?></th>

                                                        <th><?=$lang_day?></th>
                                                        <th style="width: 50px;"><?php echo $lang_delete;?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="x in quotationlist | filter:search_quotationlist">
                                                        <td class="text-center">{{$index+1}}</td>

                                                        <td>
                                                            <button class="btn btn-primary btn-sm"
                                                                ng-click="Getonequotation2pay(x)">
                                                                <?php echo $lang_sp_36;?>
                                                            </button>
                                                        </td>
                                                        <td><button class="btn btn-info btn-sm"
                                                                ng-click="Getonequotation(x,'1')">

                                                                <span class="glyphicon glyphicon-print"></span>
                                                                <?php echo $lang_sp_37;?></button>


                                                        </td>

                                                        <td><button class="btn btn-info btn-sm"
                                                                ng-click="Getonequotation(x,'2')">

                                                                <span class="glyphicon glyphicon-print">
                                                                </span><?php echo $lang_sp_38;?>
                                                            </button>


                                                        </td>


                                                        <td>{{x.cus_name}}

                                                        </td>


                                                        <td align="right">{{x.sumsale_num | number}}</td>
                                                        <td align="right">{{x.sumsale_price | number:2}}</td>


                                                        <?php
				if($_SESSION['owner_vat_status']=='2'){
				?>
                                                        <td align="right">{{x.sumsale_price * (x.vat/100) | number:2}}
                                                        </td>
                                                        <td align="right">
                                                            {{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) | number:2}}
                                                        </td>
                                                        <?php
				}
				?>



                                                        <td align="right">{{x.discount_last | number:2}}</td>
                                                        <td align="right">
                                                            {{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) - x.discount_last | number:2}}
                                                        </td>



                                                        <td>{{x.adddate}}</td>

                                                        <td align="center"><button class="btn btn-xs btn-danger"
                                                                ng-click="Deletequotationlist(x)" id="delbut{{x.ID}}">
                                                                <?php echo $lang_delete;?></button></td>

                                                    </tr>
                                                </tbody>
                                            </table>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>






                            <div class="modal fade" id="Delproductrankmodal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><?=$lang_exdel?></h4>
                                        </div>
                                        <div class="modal-body">

                                            <table class="table table-hover">
                                                <thead>
                                                    <tr style="background-color: #ddd;">
                                                        <th><?=$lang_exdel?></th>
                                                        <th><?=$lang_productname?></th>
                                                        <th><?=$lang_price?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="x in productlist" ng-if="x.product_rank !='0'">
                                                        <th><button class="btn btn-default btn-xs"
                                                                ng-click="Delproductranksave(x)">-
                                                                <?=$lang_exdel?></button></th>
                                                        <th>{{x.product_name}}</th>
                                                        <th>{{x.product_price}}</th>
                                                    </tr>
                                                </tbody>
                                            </table>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="modal fade" id="Openfull">
                                <div class="modal-dialog modal-lg" style="width: 100%;margin: 0px;">
                                    <div class="modal-content">
                                        <div class="modal-body">





                                            <table width="100%">
                                                <tbody>
                                                    <tr>

                                                        <td align="left">
                                                            <form class="form-inline">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        ng-model="product_code"
                                                                        style="font-size: 20px;text-align: right;height: 47px;width: 300px;background-color:#dff0d8;"
                                                                        placeholder="<?=$lang_searchproductnameorscan?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                        ng-click="Addpushproductcode(product_code)"
                                                                        class="btn btn-default btn-lg"><?=$lang_enter?></button>
                                                                </div>
                                                                <div class="form-group" ng-show="cannotfindproduct"
                                                                    style="color: red;">
                                                                    <?=$lang_cannotfoundproduct?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button ng-click="Refresh()"
                                                                        class="btn btn-default btn-lg" placeholder=""
                                                                        title="refresh"><span
                                                                            class="glyphicon glyphicon-refresh"
                                                                            aria-hidden="true"></span></button>
                                                                </div>
                                                            </form>

                                                        </td>
                                                        <td style="font-size: 50px;font-weight: bold;">
                                                            <span
                                                                style="color: red">{{Sumsalepricevat() | number:2 }}</span>
                                                            <?=$lang_currency?>
                                                        </td>
                                                        <td align="right" width="10%">
                                                            <button type="button" class="btn btn-default btn-lg"
                                                                data-dismiss="modal">x</button>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>


                                            <hr />
                                            <div style="height: 350px;overflow: auto;" id="Openfulltable">

                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr class="trheader">
                                                            <th style="width: 50px;"><?=$lang_rank?></th>

                                                            <th style="text-align: center;width: 250px;">
                                                                <?=$lang_productname?></th>
                                                            <th style="text-align: center;width: 100px;">
                                                                <?=$lang_barcode?></th>
                                                            <th style="text-align: center;width: 150px;">
                                                                <?=$lang_saleprice?></th>

                                                            <th width="100px;" style="text-align: center;width: 100px;">
                                                                <?=$lang_discountperunit?></th>
                                                            <th style="text-align: center;width: 80px;"><?=$lang_qty?>
                                                            </th>
                                                            <th style="text-align: center;width: 80px;">
                                                                <?=$lang_priceall?></th>
                                                            <th style="width: 50px;"><?=$lang_delete?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-repeat="x in listsale" style="font-size: 20px;">
                                                            <td style="width: 50px;" align="center">{{$index+1}}</td>

                                                            <td style="width: 250px;">

                                                                {{x.product_name}}


                                                                <input type="hidden" ng-model="x.product_id">

                                                            </td>
                                                            <td align="center" style="width: 100px;">
                                                                {{ x.product_code }}</td>


                                                            <td align="right" style="width: 150px;">
                                                                {{x.product_price | number:2}}</td>
                                                            <td align="right" style="width: 100px;"><input type=""
                                                                    placeholder="<?=$lang_discount?>"
                                                                    class="form-control"
                                                                    ng-model="x.product_price_discount"
                                                                    style="text-align: right;"></td>
                                                            <td align="right" style="width: 80px;"><input type=""
                                                                    placeholder="<?=$lang_qty?>" class="form-control"
                                                                    ng-model="x.product_sale_num"
                                                                    style="text-align: right;width: 80px;"></td>

                                                            <td style="width: 50px;" align="right">
                                                                {{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2 }}
                                                            </td>
                                                            <td><button class="btn btn-danger"
                                                                    ng-click="Deletepush($index)">ลบ</button></td>
                                                        </tr>


                                                        <tr style="font-size: 20px;">
                                                            <td colspan="5" align="right"><?=$lang_all?></td>

                                                            <td align="right" style="font-weight: bold;">
                                                                {{Sumsalenum() | number }}</td>
                                                            <td align="right" style="font-weight: bold;">
                                                                {{Sumsaleprice() | number:2 }}</td>
                                                            <td></td>
                                                        </tr>

                                                        <tr style="font-size: 20px;">
                                                            <td colspan="8" align="right">
                                                                <input type="checkbox" ng-model="addvat"
                                                                    ng-change="Addvatcontrol()">
                                                                <?=$lang_addvat?>
                                                            </td>

                                                        </tr>


                                                        <tr style="font-size: 20px;" ng-show="addvat">
                                                            <td colspan="6" align="right">
                                                                vat
                                                                <input type="number" ng-model="vatnumber"
                                                                    style="width: 50px;text-align: right;">
                                                                %
                                                            </td>
                                                            <td align="right" style="font-weight: bold;">
                                                                {{(Sumsaleprice() * vatnumber/100) | number:2 }}
                                                            </td>
                                                            <td></td>
                                                        </tr>

                                                        <tr style="font-size: 20px;" ng-show="addvat">
                                                            <td colspan="6" align="right"><?=$lang_pricesumvat?></td>
                                                            <td align="right" style="font-weight: bold;">
                                                                {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) | number:2 }}
                                                            </td>
                                                            <td></td>
                                                        </tr>

                                                    </tbody>
                                                </table>


                                            </div>

                                            <hr />
                                            <table class="table table-hover" width="100%">
                                                <tbody>
                                                    <tr style="font-size: 20px;">
                                                        <td align="right"><?=$lang_all?></td>

                                                        <td align="right" style="font-weight: bold;"><?=$lang_qty?>
                                                            {{Sumsalenum() | number }}</td>
                                                        <td align="right" style="font-weight: bold;"><?=$lang_summary?>
                                                            <span
                                                                style="color: red">{{Sumsalepricevat() | number:2 }}</span>
                                                            <?=$lang_currency?>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table class="table table-hover" width="100%">
                                                <tbody>


                                                    <tr style="font-size: 20px;">
                                                        <td width="25%" align="right"><?=$lang_getmoney?>:</td>
                                                        <td>
                                                            <form>
                                                                <input type="text" id="money_from_customer2"
                                                                    class="form-control" ng-model="money_from_customer"
                                                                    placeholder="<?=$lang_moneyfromcus?>"
                                                                    style="font-size: 20px;text-align: right;height: 47px;background-color:#dff0d8;">



                                                        </td>
                                                        <td width="35%"> <?=$lang_moneychange?>:
                                                            <b>{{money_from_customer - Sumsalepricevat() | number:2}}
                                                                <?=$lang_currency?></b>
                                                        </td>
                                                        <td align="right" width="10%"><button type="submit"
                                                                class="btn btn-success btn-lg" id="savesale2"
                                                                ng-click="Savesale(money_from_customer,Sumsalepricevat())"><?=$lang_getmoneyenter?></button>
                                                        </td>
                                                        </form>

                                                    </tr>
                                                </tbody>
                                            </table>





                                        </div>

                                    </div>
                                </div>
                            </div>




                            <div class="modal fade" id="Openchangemoney">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h4 class="modal-title"><?=$lang_moneychange?></h4>
                                        </div>
                                        <div class="modal-body text-center">
                                            <h1 style="color: red;font-weight: bold;font-size: 100px;">
                                                {{changemoney | number:2}}
                                            </h1>
                                            <br />


                                            <center>

                                                <button ng-show="printer_ul =='0'" class="btn btn-primary btn-lg"
                                                    style="height:100px;font-size: 30px;font-weight: bold;"
                                                    ng-click="printDivmini()"><?=$lang_billmini?>(Slip)</button>

                                                <button ng-show="printer_ul !='0'" class="btn btn-primary btn-lg"
                                                    style="height:100px;font-size: 30px;font-weight: bold;"
                                                    ng-click="printDivminiip()"><?=$lang_billmini?>(Slip)</button>


                                                <button class="btn btn-primary btn-lg" ng-click="printDivfull()"
                                                    style="height:100px;font-size: 30px;font-weight: bold;"><?=$lang_billfull?>(A4)</button>


                                                <?php if($_SESSION['show_order_on_slip']=='1'){ ?>
                                                <br /><br />
                                                <button ng-show="printer_ul =='0'" class="btn btn-warning btn-lg"
                                                    style="height:100px;font-size: 30px;font-weight: bold;"
                                                    ng-click="printDivmini_order()">(Print Order)</button>

                                                <?php } ?>

                                            </center>

                                            <hr />
                                            <center>
                                                <?php echo $lang_sp_39;?>
                                                <select class="form-control" ng-model="print_preview"
                                                    ng-change="Print_preview_save()"
                                                    style="width:150px;font-size:16px;font-weight:bold;height:50px;">
                                                    <option value="0">
                                                        <?php echo $lang_sp_40;?>
                                                    </option>
                                                    <option value="1">
                                                        <?php echo $lang_sp_41;?>
                                                    </option>
                                                </select>
                                            </center>
                                            <hr>

                                            <button type="button" class="btn btn-danger btn-lg"
                                                ng-click="clickokafterpay()">Close(Esc)</button>



                                        </div>

                                    </div>
                                </div>
                            </div>













                            <hr />



                        </div>
                    </div>






                    <div class="modal fade" id="Opencustomer">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><?=$lang_searchcus?></h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-inline">
                                        <div class="form-group">
                                            <input type="text" ng-model="search_customer_name" ng-change="
pregetlistcus()" class="form-control" placeholder="<?php echo $lang_sp_42;?>"
                                                style="height: 45px;width: 300px;font-size: 20px;">
                                        </div>

                                        <!--
<div class="form-group">
<input type="submit" ng-click="Searchcustomer()" class="btn btn-success btn-lg" value="ค้นหา">
</div>

-->
                                    </div>

                                    <center>
                                        <img ng-if="!sctm" src="<?php echo $base_url;?>/pic/loading.gif">
                                    </center>

                                    <br />
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr class="trheader">
                                                <th ng-if="getcourse=='0'"><?=$lang_select?></th>
                                                <th ng-if="getcourse=='1'"><?php echo $lang_sp_43;?></th>
                                                <th><?=$lang_memberid?></th>
                                                <th><?=$lang_cusname?></th>
                                                <th><?php echo $lang_sp_44;?></th>
                                                <th><?php echo $lang_sp_45;?></th>
                                                <th><?=$lang_group?></th>
                                                <th><?=$lang_address?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="x in customerlist">
                                                <td ng-if="getcourse=='0'"><button class="btn btn-success"
                                                        ng-click="Selectcustomer(x)">
                                                        <?=$lang_select?>
                                                    </button></td>

                                                <td ng-if="getcourse=='1'">

                                                    <button ng-if="x.sumcourse >'0'" class="btn btn-info"
                                                        ng-click="Selectcourse(x)">
                                                        <?php echo $lang_sp_46;?> {{x.sumcourse | number}}
                                                        <?php echo $lang_sp_47;?>
                                                    </button>
                                                </td>


                                                <td>{{x.cus_add_time}}</td>
                                                <td><b style="font-size:20px;">{{x.cus_name}}</b>
                                                    <span ng-if="x.credit_limit !='0'">
                                                        <br />
                                                        <b style="color:green;"
                                                            ng-if="x.credit_limit_foruse !='' && x.credit_limit_foruse >'0.00'">
                                                            <?php echo $lang_sp_48;?>
                                                            {{x.credit_limit_foruse | number}}</b>

                                                        <b style="color:red;"
                                                            ng-if="x.credit_limit_foruse !='' && x.credit_limit_foruse <='0.00'">
                                                            <?php echo $lang_sp_48;?>
                                                            {{x.credit_limit_foruse | number}}</b>


                                                        <b style="color:green;" ng-if="x.credit_limit_foruse ==''">
                                                            <?php echo $lang_sp_48;?> {{x.credit_limit | number}}</b>
                                                        <br />
                                                        <b style="color:blue;">
                                                            <?php echo $lang_sp_49;?>
                                                            {{x.credit_limit | number}}</b>
                                                    </span>

                                                </td>
                                                <td>{{x.cus_tel}}</td>
                                                <td align="center">{{x.product_score_all | number}}</td>
                                                <td>{{x.customer_group_name}}</td>
                                                <td>{{x.cus_address}} {{x.cus_address_postcode}}
                                                    <span ng-if="x.taxnumber!=''"><br /><?php echo $lang_sp_50;?>
                                                        {{x.taxnumber}} </span>


                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>













                    <div class="modal fade" id="Allcuscourse">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <center>
                                        <h1><b>{{cus_name_course}}</b></h1>
                                    </center>
                                    <table class="table table-hover table-bordered" style="font-size:20px">
                                        <thead>
                                            <tr class="trheader">

                                                <th class="text-center"><?php echo $lang_sp_51;?></th>
                                                <th><?php echo $lang_sp_52;?></th>
                                                <th><?php echo $lang_sp_53;?></th>
                                                <th><?php echo $lang_sp_54;?></th>
                                                <th><?php echo $lang_sp_55;?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="x in cuscourselist">
                                                <td align="center">

                                                    <form ng-if="x.product_sale_num!=x.used_course_num"
                                                        class="form-inline">
                                                        <div class="form-group">

                                                            <input type="text" onkeypress="validate(event)"
                                                                style="height:45px;font-size:25px;width:100px;"
                                                                class="form-control" ng-model="x.use_course"
                                                                placeholder="<?php echo $lang_qty;?>">
                                                        </div>
                                                        <div class="form-group">

                                                            <button class="btn btn-success btn-lg"
                                                                ng-if="x.use_course && x.use_course!='' && x.use_course>'0' && x.use_course<=x.product_sale_num-x.used_course_num"
                                                                ng-click="Savethiscuscourse(x)">
                                                                <?php echo $lang_sp_56;?>
                                                            </button>
                                                        </div>

                                                    </form>

                                                    <span class="badge" style="font-size:20px;"
                                                        ng-if="x.product_sale_num==x.used_course_num">
                                                        <?php echo $lang_sp_57;?> </span>
                                                </td>


                                                <td>{{x.product_name}}</td>
                                                <td align="center">{{x.product_sale_num | number}} </td>
                                                <td align="center">{{x.used_course_num | number}} </td>
                                                <td align="center">{{x.product_sale_num-x.used_course_num | number}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>







                    <div class="modal fade" id="Modalproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><?=$lang_productlist?></h4>
                                </div>
                                <div class="modal-body">
                                    <input type="text" ng-model="searchproduct" placeholder="<?=$lang_barcode?>"
                                        style="width:300px;" class="form-control">
                                    <br />
                                    <div style="overflow: auto;height: 400px;">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr class="trheader">
                                                    <th><?=$lang_select?></th>
                                                    <th><?=$lang_barcode?></th>
                                                    <th><?=$lang_productname?></th>
                                                    <th><?=$lang_price?></th>
                                                    <th><?=$lang_discountperunit?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="y in productlist | filter:searchproduct">
                                                    <td><button ng-click="Selectproduct(y,indexrow)"
                                                            class="btn btn-success"><?=$lang_select?></button></td>
                                                    <td align="center">{{y.product_code}}</td>
                                                    <td>{{y.product_name}}</td>
                                                    <td align="right">{{y.product_price | number:2}}</td>
                                                    <td align="right">{{y.product_price_discount | number:2}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>







                    <div class="modal fade" id="Openone">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">

                                    <button class="btn btn-primary" onClick="Openprintdiv1()"><?=$lang_print?></button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


                                </div>

                                <div class="modal-body" id="openprint1">
                                    <center>


                                        <span ng-if="pay_type!='4'" style="font-size: 35px;font-weight: bold;">
                                            <span style="font-size: 35px;font-weight: bold;">
                                                <?php echo $_SESSION['header_a4'];?>
                                            </span>
                                        </span>

                                        <span ng-if="pay_type=='4'" style="font-size: 35px;font-weight: bold;">
                                            <?php echo $lang_sp_58;?></span>

                                        <br />

                                        <?php
if($_SESSION['logoonslip']=='0'){
?>
                                        <img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
                                        <br />
                                        <?php } ?>


                                        <b> <?php echo $_SESSION['owner_name']; ?> </b>
                                        <?php echo $_SESSION['owner_address']; ?>
                                        <br />
                                        <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>


                                        <?php if($_SESSION['owner_tax_number']!=''){ echo '<br />'.$lang_tax; ?>:<?php echo $_SESSION['owner_tax_number']; } ?>



                                    </center>
                                    <table class="table table-bordered" style="table-layout: fixed;">

                                        <tr>
                                            <td colspan="2">
                                                <?=$lang_runno?>:{{sale_runno}}
                                                <span ng-if="cus_name != null">
                                                    <br /><?=$lang_cusname?>: {{cus_name}} , <?=$lang_address?>:
                                                    {{cus_address_all}}
                                                    <span ng-if="taxnumber!=''"><br /><?php echo $lang_sp_59;?>
                                                        {{taxnumber}} </span>

                                                </span>

                                            </td>
                                        </tr>
                                    </table>

                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr class="trheader" style="font-size:12px;">
                                                <th style="width:10px;"></th>
                                                <!-- <th ><?=$lang_barcode?></th> -->
                                                <th><?=$lang_productname?></th>
                                                <th style="width:300px;"><?=$lang_detail?></th>

                                                <th><?=$lang_saleprice?></th>
                                                <th><?=$lang_discountperunit?></th>
                                                <th><?=$lang_qty?></th>
                                                <th><?=$lang_unit?></th>
                                                <th><?=$lang_priceall?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="x in listone">
                                                <td align="center" style="width:10px;">{{$index+1}}</td>

                                                <td style="width:500px;">
                                                    {{x.product_name}}
                                                </td>
                                                <td style="width:300px;">{{x.product_des}}</td>

                                                <td align="right" style="width:50px;">
                                                    {{x.product_price | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                                </td>
                                                <td align="right" style="width:50px;">
                                                    {{x.product_price_discount | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                                </td>
                                                <td align="right" style="width:5px;">{{x.product_sale_num | number}}
                                                </td>
                                                <td align="right">{{x.product_unit_name}}</td>
                                                <td align="right" style="width:50px;">
                                                    {{(x.product_price - x.product_price_discount) * x.product_sale_num | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" align="right" style="font-weight: bold;">
                                                    <?=$lang_all?></td>

                                                <td align="right" style="font-weight: bold;">{{sumsale_num | number}}
                                                </td>

                                                <td align="right" style="font-weight: bold;">
                                                    <u>{{sumsale_price | number:<?php echo $_SESSION['decimal_print']; ?>}}</u>
                                                </td>
                                            </tr>


                                            <!-- <tr ng-if="vat3 > '0'">
		<td align="right" colspan="6">VAT {{vat3}}%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-sumsale_price | number:2}}</td>
		</tr>


<tr ng-if="vat3 > '0'">
		<td align="right" colspan="6"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr> -->









                                            <?php
if($_SESSION['owner_vat_status']=='2'){
?>
                                            <tr ng-if="vat3!='0'">
                                                <td align="right" colspan="7"><?=$lang_vat?> {{vat3}}%</td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{sumsalevat-sumsale_price | number:2}}</td>
                                            </tr>




                                            <tr ng-if="vat3!='0'">
                                                <td align="right" colspan="7"><?=$lang_pricebeforvat?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{sumsalevat-(sumsalevat-sumsale_price) | number:2}}</td>
                                            </tr>

                                            <tr ng-if="vat3!='0'">
                                                <td align="right" colspan="7"><?=$lang_pricesumvat?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{sumsalevat | number:2}}</td>
                                            </tr>

                                            <?php
}
?>




                                            <tr ng-if="discount_last2 !='0.00'">
                                                <td align="right" colspan="7">
                                                    <?php echo $lang_sp_60;?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    -{{discount_last2 | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right" colspan="7"><?=$lang_sumall?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    <u>{{sumsalevat-discount_last2 | number:<?php echo $_SESSION['decimal_print']; ?>}}</u>
                                                </td>
                                            </tr>


                                            <tr ng-if="pay_type=='4'">
                                                <td align="right" colspan="7"><?=$lang_getmoney?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{money_from_customer3 | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                                </td>
                                            </tr>



                                            <tr ng-if="Sum_product_weight_bill() != '0'">
                                                <td align="right" colspan="7">
                                                    <?php echo $lang_sp_61;?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{Sum_product_weight_bill() | number}} kg</td>
                                            </tr>





                                            <tr ng-if="pay_type=='4'">
                                                <td align="right" colspan="7">
                                                    <span ng-if="pay_type=='4'"><?php echo $lang_sp_62;?></span>

                                                    <span ng-if="pay_type!='4'"><?=$lang_moneychange?></span>

                                                </td>

                                                <td style="font-weight: bold;" align="right">
                                                    {{money_from_customer3-(sumsalevat-discount_last2) | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                                </td>

                                            </tr>


                                            <?php
if($_SESSION['open_vat_on_slip']=='1'){
?>
                                            <tr>
                                                <td align="right" colspan="7">VAT</td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{price_vat_all | number:2}}</td>
                                            </tr>


                                            <tr>
                                                <td align="right" colspan="7">befor VAT</td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{sumsalevat-price_vat_all-discount_last2 | number:2}}</td>
                                            </tr>



                                            <?php
}
?>



                                        </tbody>
                                    </table>



                                    <?php
if($_SESSION['exchangerateonslip']=='1'){
?>

                                    <table class="table table-bordered">

                                        <tr ng-repeat="x in exchangeratelist">
                                            <td style="font-weight: bold;" align="right">{{x.title_name}}</td>
                                            <td style="font-weight: bold;" align="right">
                                                {{(sumsalevat-discount_last2)/x.rate | number:2}}</td>
                                        </tr>

                                    </table>
                                    <?php } ?>





                                    <table style="width: 100%">

                                        <tbody>
                                            <tr>
                                                <td style="width: 50%;">
                                                    <center> <b><?=$lang_payer?></b>
                                                        <br /><br />

                                                        <?=$lang_namezen?>............................................................
                                                        <br />
                                                        <?=$lang_day?> {{adddate}}
                                                    </center>

                                                </td>
                                                <td style="width: 50%;">
                                                    <center><b><?=$lang_geter?></b>
                                                        <br /><br />

                                                        <?=$lang_namezen?>............................................................
                                                        <br />
                                                        <?=$lang_day?> {{adddate}}
                                                    </center>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <?php echo $_SESSION['footer_a4'];?>



                                    <span ng-show="showremarkonslip=='1'">
                                        <br />
                                        {{saleremark}}
                                    </span>



                                </div>


                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
















                    <div class="modal fade" id="Openonequotation">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">


                                    <select ng-model="quo_type" class="form-control" style="width:200px;float:left;"
                                        ng-init="quo_type='1'">
                                        <option value="1">
                                            A4
                                        </option>
                                        <option value="2">
                                            Slip 58mm 80mm
                                        </option>
                                    </select>

                                    <button class="btn btn-primary" onClick="Openprintdiv2()"><?=$lang_print?></button>


                                    <button type="button" class="btn btn-default" style="float:right;"
                                        data-dismiss="modal">Close</button>


                                </div>



                                <div class="modal-body" ng-if="quo_type=='2'" id="openprint2">
                                    <center>
                                        <span ng-if="quotation_type=='1'" style="font-size: 25px;font-weight: bold;">
                                            <?php echo $lang_sp_63;?>
                                        </span>

                                        <span ng-if="quotation_type=='2'" style="font-size: 25px;font-weight: bold;">
                                            <?php echo $lang_sp_64;?>
                                        </span>
                                        <br />
                                        --------------------
                                        <br />
                                        <b style="font-size: 20px;font-weight: bold;">
                                            <?php echo $_SESSION['owner_name']; ?> </b>
                                        <br />
                                        --------------------
                                        <br />
                                        <?=$lang_runno?>:{{sale_runno}}
                                        <span ng-if="cus_name!=''"> <br />
                                            <?=$lang_cusname?>: {{cus_name}} <?=$lang_address?>: {{cus_address_all_2}}

                                            <span ng-if="taxnumber!=''"><br /><?php echo $lang_sp_65;?> {{taxnumber}}
                                            </span>

                                            <br />
                                        </span>

                                        --------------------
                                        <br />
                                    </center>


                                    <table width="100%">
                                        <tr ng-repeat="x in listone">

                                            <td width="70%">
                                                <?php if($_SESSION['show_price_per_one']!='1'){ ?>
                                                {{x.product_sale_num | number}}&nbsp;&nbsp;
                                                <?php } ?>
                                                {{x.product_name}}
                                                <?php if($_SESSION['show_price_per_one']=='1'){ ?>
                                                <br />
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                {{x.product_sale_num | number}} {{x.product_unit_name}} X
                                                {{x.product_price | number:<?php echo $_SESSION['decimal_print']; ?>}}

                                                <?php } ?>
                                            </td>
                                            <td align="right" width="30%">
                                                {{(x.product_price - x.product_price_discount) * x.product_sale_num | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                            </td>
                                        </tr>
                                        <tr>

                                            <td><?=$lang_summary?></td>


                                            <td align="right">
                                                {{sumsale_price | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                            </td>
                                        </tr>

                                        <tr ng-if="Sum_product_weight_bill() != '0' && quotation_type=='2'">
                                            <td><?php echo $lang_sp_66;?></td>
                                            <td style="font-weight: bold;" align="right">
                                                {{Sum_product_weight_bill() | number}} kg</td>
                                        </tr>


                                    </table>


                                    <center>
                                        --------------------
                                        <br />
                                        <?php echo $lang_sp_67;?> <?php echo date('d-m-Y H:i:s');?>
                                    </center>




                                </div>









                                <div class="modal-body" ng-if="quo_type=='1'" id="openprint2">
                                    <center>

                                        <span ng-if="quotation_type=='1'" style="font-size: 35px;font-weight: bold;">
                                            <?php echo $lang_sp_68;?>
                                        </span>

                                        <span ng-if="quotation_type=='2'" style="font-size: 35px;font-weight: bold;">
                                            <?php echo $lang_sp_69;?>
                                        </span>


                                        <!-- <span ng-if="pay_type!='4'" style="font-size: 35px;font-weight: bold;">
<?=$lang_billall?>
</span>

<span ng-if="pay_type=='4'" style="font-size: 35px;font-weight: bold;">ใบค้างชำระ</span> -->


                                    </center>
                                    <table class="table table-bordered" style="table-layout: fixed;">
                                        <tr>

                                            <?php
if($_SESSION['logoonslip']=='0'){
?>
                                            <td width="150px">
                                                <img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>" width="100px">
                                                <!-- <br />
	<center style="font-size:100px;font-weight:bold;">{{number_for_cus | number}}</center> -->
                                            </td>
                                            <?php } ?>
                                            <td>
                                                <b> <?php echo $_SESSION['owner_name']; ?> </b>
                                                <?php echo $_SESSION['owner_address']; ?>
                                                <br />
                                                <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
                                                <br />
                                                <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>

                                            </td>
                                        </tr>
                                    </table>


                                    <table class="table table-bordered" style="table-layout: fixed;">
                                        <tr>
                                            <td>
                                                <?=$lang_runno?>:{{sale_runno}} , <?=$lang_cusname?>: {{cus_name}} ,
                                                <?=$lang_address?>: {{cus_address_all_2}}

                                                <span ng-if="taxnumber!=''"><br />Tax: {{taxnumber}} </span>

                                            </td>
                                        </tr>
                                    </table>

                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr class="trheader" style="font-size:12px;">
                                                <th style="width:10px;"></th>

                                                <th><?=$lang_productname?></th>
                                                <th style="width:300px;"><?=$lang_detail?></th>

                                                <th><?=$lang_saleprice?></th>
                                                <th><?=$lang_discountperunit?></th>
                                                <th><?=$lang_qty?></th>
                                                <th><?=$lang_unit?></th>
                                                <th><?=$lang_priceall?></th>
                                            </tr>
                                        </thead>
                                        <tbody class="setrow_heigh">
                                            <tr ng-repeat="x in listone">
                                                <td align="center" style="width:10px;">{{$index+1}}</td>

                                                <td style="width:400px;">
                                                    {{x.product_name}}({{x.product_code}})
                                                </td>
                                                <td style="width:300px;">{{x.product_des}}</td>

                                                <td align="right" style="width:50px;">
                                                    {{x.product_price | number:<?php echo $_SESSION['decimal_print'];?>}}
                                                </td>
                                                <td align="right" style="width:50px;">
                                                    {{x.product_price_discount | number:<?php echo $_SESSION['decimal_print'];?>}}
                                                </td>
                                                <td align="right" style="width:5px;">{{x.product_sale_num | number}}
                                                </td>
                                                <td align="right">{{x.product_unit_name}}</td>
                                                <td align="right" style="width:50px;">
                                                    {{(x.product_price - x.product_price_discount) * x.product_sale_num | number:<?php echo $_SESSION['decimal_print'];?>}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" align="right" style="font-weight: bold;">
                                                    <?=$lang_all?></td>

                                                <td align="right" style="font-weight: bold;">{{sumsale_num | number}}
                                                </td>

                                                <td align="right" style="font-weight: bold;">
                                                    <u>{{sumsale_price | number:<?php echo $_SESSION['decimal_print'];?>}}</u>
                                                </td>
                                            </tr>


                                            <!-- <tr ng-if="vat3 > '0'">
		<td align="right" colspan="6">VAT {{vat3}}%</td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat-sumsale_price | number:2}}</td>
		</tr>


<tr ng-if="vat3 > '0'">
		<td align="right" colspan="6"><?=$lang_pricesumvat?></td>
		<td style="font-weight: bold;" align="right">
		{{sumsalevat | number:2}}</td>
		</tr> -->





                                            <?php
if($_SESSION['owner_vat_status']=='1'){
?>
                                            <tr ng-if="vat3=='0'">
                                                <td align="right" colspan="7"><?=$lang_vat?>
                                                    {{<?=$_SESSION['owner_vat']?>}}%</td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?php echo $_SESSION['owner_vat'];?>/100) | number:2}}
                                                </td>
                                            </tr>




                                            <tr ng-if="vat3=='0'">
                                                <td align="right" colspan="7"><?=$lang_pricebeforvat?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}
                                                </td>
                                            </tr>

                                            <tr ng-if="vat3=='0'">
                                                <td align="right" colspan="7"><?=$lang_pricesumvat?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{sumsalevat | number:2}}</td>
                                            </tr>


                                            <tr ng-if="vat3!='0'">
                                                <td align="right" colspan="7"><?=$lang_vat?> {{vat3}}%</td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{sumsalevat-sumsale_price | number:2}}</td>
                                            </tr>




                                            <tr ng-if="vat3!='0'">
                                                <td align="right" colspan="7"><?=$lang_pricebeforvat?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{sumsalevat-(sumsalevat-sumsale_price) | number:2}}</td>
                                            </tr>

                                            <tr ng-if="vat3!='0'">
                                                <td align="right" colspan="7"><?=$lang_pricesumvat?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{sumsalevat | number:2}}</td>
                                            </tr>



                                            <?php
}
?>



                                            <?php
if($_SESSION['owner_vat_status']=='2'){
?>
                                            <tr ng-if="vat3!='0'">
                                                <td align="right" colspan="7"><?=$lang_vat?> {{vat3}}%</td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{sumsalevat-sumsale_price | number:2}}</td>
                                            </tr>




                                            <tr ng-if="vat3!='0'">
                                                <td align="right" colspan="7"><?=$lang_pricebeforvat?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{sumsalevat-(sumsalevat-sumsale_price) | number:2}}</td>
                                            </tr>

                                            <tr ng-if="vat3!='0'">
                                                <td align="right" colspan="7"><?=$lang_pricesumvat?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{sumsalevat | number:2}}</td>
                                            </tr>

                                            <?php
}
?>




                                            <tr ng-if="discount_last2 !='0.00'">
                                                <td align="right" colspan="7"><?=$lang_discount?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{discount_last2 | number:<?php echo $_SESSION['decimal_print'];?>}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right" colspan="7"><?=$lang_sumall?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    <u>{{sumsalevat-discount_last2 | number:<?php echo $_SESSION['decimal_print'];?>}}</u>
                                                </td>
                                            </tr>


                                            <tr ng-if="Sum_product_weight_bill() != '0' && quotation_type=='2'">
                                                <td align="right" colspan="7"><?php echo $lang_sp_70;?></td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{Sum_product_weight_bill() | number}} kg</td>
                                            </tr>


                                        </tbody>
                                    </table>

                                    <table style="width: 100%" ng-if="quotation_type=='1'">

                                        <tbody>
                                            <tr>
                                                <td style="width: 50%;">
                                                    <center> <b><?php echo $lang_sp_71;?></b>
                                                        <br /><br />

                                                        <?=$lang_namezen?>............................................................
                                                        <br />
                                                        <?=$lang_day?> {{adddate}}
                                                    </center>

                                                </td>
                                                <td style="width: 50%;">
                                                    <center><b><?php echo $lang_sp_72;?></b>
                                                        <br /><br />

                                                        <?=$lang_namezen?>............................................................
                                                        <br />
                                                        <?=$lang_day?> {{adddate}}
                                                    </center>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>




                                    <table style="width: 100%" ng-if="quotation_type=='2'">

                                        <tbody>
                                            <tr>
                                                <td style="width: 50%;">
                                                    <center> <b><?php echo $lang_sp_73;?></b>
                                                        <br /><br />

                                                        <?=$lang_namezen?>............................................................
                                                        <br />
                                                        <?=$lang_day?>............................................................
                                                    </center>

                                                </td>
                                                <td style="width: 50%;">
                                                    <center><b><?php echo $lang_sp_74;?></b>
                                                        <br /><br />

                                                        <?=$lang_namezen?>............................................................
                                                        <br />
                                                        <?=$lang_day?>............................................................
                                                    </center>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>



                                    <?php echo $_SESSION['footer_a4'];?>



                                </div>


                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>
















                    <div class="modal fade" id="getpotmodal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><?=$lang_otlistof?> <br />
                                        <span style="color:red;"> {{potdata.product_name}}
                                        </span>
                                    </h4>
                                </div>
                                <div class="modal-body" style="height:450px;overflow: auto;">
                                    <?=$lang_otlistof?>
                                    <br />


                                    <div class="col-xs-4 col-sm-4 col-md-4 text-center btn btn-default"
                                        ng-repeat="x in getproductpotlist" ng-if="x.show_all=='0'">
                                        <center>
                                            <img ng-if="x.product_ot_image!=''"
                                                ng-src="<?php echo $base_url?>/{{x.product_ot_image}}"
                                                class="img img-responsive" style="max-height: 83px;" />
                                        </center>
                                        <p>
                                        </p>
                                        <b>
                                            <input type="text" ng-model="x.product_ot_name" class="form-control">
                                        </b>
                                        <br />


                                        <span ng-if="x.type=='0'"><?php echo $lang_sp_75;?></span>
                                        <span ng-if="x.type=='1'">%</span>
                                        <span ng-if="x.type=='2'"><?php echo $lang_sp_76;?></span>
                                        <input type="text" onkeypress="validate(event)" ng-model="x.product_ot_price"
                                            class="form-control">
                                        <br />
                                        <button class="btn btn-lg btn-success"
                                            ng-click="Selectpot(x)"><?=$lang_select?></button>
                                    </div>








                                    </center>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-lg"
                                        data-dismiss="modal">close</button>
                                </div>
                            </div>
                        </div>
                    </div>













                    <div class="modal fade" id="Openonesend">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <select ng-model="lung" ng-change="Selectlung(lung)" class="form-control"
                                    style="font-size: 20px;text-align: center;height: 40px;">
                                    <option value="1">
                                        <?=$lang_selectbiga4?>
                                    </option>
                                    <option value="2">
                                        <?=$lang_selectmini?>
                                    </option>
                                </select>
                                <button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
                                <div class="modal-body" id="section-to-print2">




                                    <table ng-if="lung=='2'" class="table table-bordered" width="100%">
                                        <tr>
                                            <td width="50%">
                                                <span style="font-size: 30px;"> <?=$lang_sender?> </span>

                                                <br />
                                                <span style="font-size: 20px;"><b>
                                                        <?php echo $_SESSION['owner_name']; ?> </b>
                                                    <br />
                                                    <?php echo $_SESSION['owner_address']; ?>
                                                    <br />
                                                    Tel: <?php echo $_SESSION['owner_tel']; ?>
                                                </span>

                                            </td>
                                            <td>
                                                <span style="font-size: 30px;"> <?=$lang_receiver?> </span>
                                                <br />
                                                <span style="font-size: 20px;">
                                                    <b>{{dataprintsend.cus_name}}</b>
                                                    <br />
                                                    <?=$lang_address?>: {{dataprintsend.cus_address_all}}

                                                </span>
                                            </td>
                                        </tr>
                                    </table>




                                    <table ng-if="lung=='1'" class="table table-bordered" width="100%">
                                        <tr>
                                            <td align="center">
                                                <span style="font-size: 40px;"><b> <?=$lang_sender?></b> </span>

                                                <br />
                                                <span style="font-size: 30px;"><b>
                                                        <?php echo $_SESSION['owner_name']; ?> </b>
                                                    <br />
                                                    <?php echo $_SESSION['owner_address']; ?>
                                                    <br />
                                                    <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
                                                </span>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <br />
                                                <span style="font-size: 60px;"><b> <?=$lang_receiver?></b> </span>
                                                <br />
                                                <span style="font-size: 30px;">
                                                    <b>{{dataprintsend.cus_name}}</b>
                                                    <br />
                                                    {{dataprintsend.cus_address_all}}

                                                </span>
                                            </td>
                                        </tr>
                                    </table>
                                    <center>
                                        <?php
		echo '<img width="300px" height="30px" src="'.$base_url.'/bc/c2mbarcode.php?barcode={{dataprintsend.sale_runno}}">';
echo '<br /><b>{{dataprintsend.sale_runno}}</b><br />';
  ?>

                                    </center>



                                </div>


                                <div class="modal-footer">
                                    <button class="btn btn-primary" ng-click="printDiv()"><?=$lang_print?></button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"
                                        aria-hidden="true">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
















                    <div class="modal fade" id="Openshiftmodal">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">


                                <div class="modal-body">




                                    <center>
                                        <?php if($_SESSION['user_type'] > '0'){?>


                                        <?php if(isset($_SESSION['shift_id_old'])){;?>

                                        <button ng-if="printer_ul =='0'" ng-click="Openbillcloseday()"
                                            class="btn btn-info btn-lg">
                                            <?=$lang_printbillshif?>
                                            <?php if(isset($_SESSION['shift_id_old'])){echo $_SESSION['shift_id_old'];} ?></button>

                                        <button ng-if="printer_ul !='0' " type="button" class="btn btn-info btn-lg"
                                            ng-click="Openbillclosedayip()">
                                            <?=$lang_printbillshif?>
                                            <?php if(isset($_SESSION['shift_id_old'])){echo $_SESSION['shift_id_old'];} ?></button>


                                        <hr />
                                        <?php } ?>

                                        <b><?=$lang_newopenshif?></b>
                                        <br />
                                        <input type="text" onkeypress="validate(event)" class="form-control"
                                            style="font-size:20px;font-weight:bold;height:50px;"
                                            ng-model="shift_money_start" placeholder="<?php echo $lang_startmoney;?>" />
                                        <br>
                                        <button ng-show="shift_money_start" class="btn btn-lg btn-info"
                                            ng-click="Openshiftnow()">
                                            <?=$lang_startsale?>
                                        </button>

                                        <?php }else{
	echo '<h1>'.$lang_waitopenshif.'</h1>';
}?>
                                    </center>






                                </div>


                                <div class="modal-footer">
                                    <center>
                                        <a href="<?php echo $base_url;?>" class="btn btn-xs btn-default">
                                            <?=$lang_goindex?>
                                        </a>


                                        <a href="<?php echo $base_url;?>/logout" class="btn btn-xs btn-default">
                                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                            <?=$lang_logout?></a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>







                    <div class="modal fade" id="Closeshiftnow">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">


                                <div class="modal-body">
                                    <center>
                                        <b><?=$lang_closeshifsendmoney?></b>
                                        <br />
                                        <input type="text" onkeypress="validate(event)" class="form-control"
                                            style="font-size:17px;font-weight:bold;height:50px;"
                                            ng-model="shift_money_end" placeholder="<?php echo $lang_getlastmoney;?>" />
                                        <br>
                                        <button ng-show="shift_money_end" class="btn btn-lg btn-info"
                                            ng-click="Closeshiftnowconfirm()">
                                            <?=$lang_confirmcloseshif?>
                                        </button>




                                        <hr />

                                        <input type="checkbox" ng-model="addmoneytoshift">
                                        <?php echo $lang_sp_77;?> <?php echo $_SESSION['shift_id']; ?>
                                        <form ng-if="addmoneytoshift" action="salepic/addshiftmoneystart" method="post">

                                            <input type="number" class="form-control"
                                                style="font-size:20px;font-weight:bold;height:50px;"
                                                name="addshiftmoneystart" placeholder="x.xx" />
                                            <?php echo $lang_sp_78;?>
                                            <?php if(isset($_SESSION['shift_money_start'])){ echo number_format($_SESSION['shift_money_start'],2); } ?>
                                            <br>
                                            <input type="submit" class="btn btn-success btn-lg"
                                                value="<?php echo $lang_add;?>">
                                        </form>


                                    </center>






                                </div>


                                <div class="modal-footer">

                                    <center>
                                        <a href="<?php echo $base_url;?>" class="btn btn-xs btn-default">
                                            <?=$lang_goindex?>
                                        </a>


                                        <a href="<?php echo $base_url;?>/logout" class="btn btn-xs btn-default">
                                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                            <?=$lang_logout?></a>


                                        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal"
                                            aria-hidden="true">close</button>


                                    </center>



                                </div>
                            </div>
                        </div>
                    </div>








                    <div class="modal fade" id="Openbillcloseday">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                                <div class="modal-header">

                                    <button class="btn btn-primary"
                                        onClick="Openprintdiv_table()"><?=$lang_print?></button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


                                </div>

                                <div class="modal-body" id="openprint_table">
                                    <form class="form-inline">
                                        <div class="form-group">

                                        </div>


                                    </form>


                                    <div id="section-to-print" style="font-size: 14px;background-color: #fff;">




                                        <center>
                                            <b><span style="font-size: 25px;">
                                                    <?php echo $_SESSION['owner_name']; ?></span> </b>

                                            <br />
                                            <?php echo $_SESSION['owner_address']; ?>
                                            <br />
                                            <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

                                            <h4 style="font-weight:bold;">
                                                <?=$lang_billcloseshif?>
                                                <?php if(isset($_SESSION['shift_id_old'])){ echo $_SESSION['shift_id_old'];}?>
                                            </h4>

                                        </center>

                                        <?=$lang_start?>:
                                        <?php if(isset($_SESSION['shift_start_time_old'])){ echo $_SESSION['shift_start_time_old'];}?>
                                        <br />
                                        <?=$lang_to?>:
                                        <?php if(isset($_SESSION['shift_end_time_old'])){ echo $_SESSION['shift_end_time_old'];}?>
                                        <br />
                                        <?php
if(isset($_SESSION['shift_id_old'])){
$moneyshiftchange = number_format($_SESSION['shift_money_end_old']-$_SESSION['shift_money_start_old'],'2');
echo ''.$lang_endmoney.' ( '.number_format($_SESSION['shift_money_end_old'],'2').' )
<br />'.$lang_startmoney.' ( '.number_format($_SESSION['shift_money_start_old'],'2').' )
<br />'.$lang_endstart.' ( '.$moneyshiftchange.' )';
}
?>

                                        <br />
                                        <center>..............................
                                            <br />
                                            <input type="checkbox" ng-model="hideproduct_shift"><b>ລາຍການສິນຄ້າ </b>
                                        </center>

                                        <table ng-if="!hideproduct_shift" class="table table-hover"
                                            style="width: 100%;">

                                            <tbody>

                                                <tr ng-repeat="y in openbillclosedaylistproduct">
                                                    <td>{{y.product_sale_num | number}}</td>
                                                    <td> {{y.product_name}} </td>

                                                    <td align="right">{{y.product_sale_price | number:2}}</td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <center><b><span style="color:blue;font-size:14px;">--------- &&& ໝວດໝູ່ &&&
                                                    ---------
                                            </b></span></center>


                                        <table class="table table-bordered">

                                            <tbody>
                                                <tr ng-repeat="x in openbillclosedaylista">
                                                    <td width="200px;">{{x.product_category_name2}}</td>

                                                    <td align="right">{{x.product_price2 | number:2}}</td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <table class="table table-bordered">

                                            <tbody>


                                                <tr ng-repeat="x in openbillclosedaylistb">
                                                    <td width="200px;">
                                                        <?php echo $lang_sp_80;?></td>
                                                    <td align="right">{{x.sumsale_price2 | number:2}}</td>
                                                </tr>


                                                <tr ng-repeat="x in openbillclosedaylistb">
                                                    <td width="200px;">
                                                        <?php echo $lang_sp_81;?></td>
                                                    <td align="right">-{{x.discount_last2 | number:2}}</td>

                                                </tr>

                                                <tr ng-repeat="x in openbillclosedaylistb">
                                                    <td width="200px;"><?php echo $lang_sp_82;?></td>
                                                    <td align="right">-{{x.money_from_customer | number:2}}</td>
                                                </tr>


                                                <tr ng-repeat="x in openbillclosedaylistb">
                                                    <td width="200px;" align="right" style="font-weight:bold;">
                                                        <?php echo $lang_sp_83;?></td>
                                                    <td align="right" style="font-weight:bold;">
                                                        {{x.sumsale_price2-x.discount_last2-x.money_from_customer | number:2}}
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>


                                        <table class="table table-bordered">

                                            <tbody>
                                                <tr ng-repeat="x in openbillclosedaylistc">
                                                    <td width="200px;">

                                                        <div ng-repeat="y in pay_type_list">
                                                            <span
                                                                ng-if="x.pay_type==y.pay_type_id">{{y.pay_type_name}}</span>
                                                        </div>



                                                    </td>

                                                    <td align="right" ng-if="x.pay_type=='1'"
                                                        ng-repeat="y in openbillclosedaylistb">
                                                        {{x.sumsale_price2-y.money_changeto_customer | number:2}}</td>

                                                    <td align="right" ng-if="x.pay_type!='1'">
                                                        {{x.sumsale_price2 | number:2}}</td>


                                                </tr>

                                                <tr>
                                                    <td width="200px;" align="right" style="font-weight:bold;">
                                                        <?php echo $lang_sp_83;?></td>
                                                    <td align="right" style="font-weight:bold;"
                                                        ng-repeat="y in openbillclosedaylistb">
                                                        {{Summary_pay_type()-y.money_changeto_customer | number:2}}</td>
                                                </tr>


                                            </tbody>
                                        </table>










                                        <table class="table table-bordered">
                                            <tr>
                                                <td width="200px;" style="text-align: left;"><?=$lang_sales?> </td>
                                                <td style="text-align: right;"><?php echo $_SESSION['name']; ?></td>

                                            </tr>

                                        </table>


                                        <center>
                                            <?php echo $lang_sp_87;?>
                                            : <?php echo date('d-m-Y H:i:s'); ?>
                                        </center>








                                    </div>

                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                    </div>













                    <div style="position: absolute; opacity: 0.0;">

                        <div class="modal fade" id="Openbillclosedayip">
                            <div class="modal-dialog" style="width: 790px;">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <form class="form-inline">
                                            <div class="form-group">

                                            </div>


                                        </form>


                                        <div id="section-to-print-billclose"
                                            style="width: <?php echo $pt_width;?>;font-size: 25px;text-align: left;background-color: #fff;overflow:visible !important;">

                                            <center>
                                                <td width="250px" align="center">
                                                    <img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>"
                                                        width="200px">
                                                </td>
                                                </tr>
                                                </table>
                                            </center>

                                            <b><span style="font-size: 25px;">
                                                    <?php echo $_SESSION['owner_name']; ?></span> </b>

                                            <br />
                                            <?php echo $_SESSION['owner_address']; ?>
                                            <br />
                                            <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>

                                            <br />
                                            ____________________________________________
                                            <br />
                                            <?=$lang_billcloseshif?>
                                            <?php if(isset($_SESSION['shift_id_old'])){ echo $_SESSION['shift_id_old'];}?>
                                            <br />
                                            <?=$lang_start?>:
                                            <?php if(isset($_SESSION['shift_start_time_old'])){ echo $_SESSION['shift_start_time_old'];}?>
                                            <br />
                                            <?=$lang_to?>:
                                            <?php if(isset($_SESSION['shift_end_time_old'])){ echo $_SESSION['shift_end_time_old'];}?>
                                            <br />
                                            <?php
if(isset($_SESSION['shift_id_old'])){
$moneyshiftchange = number_format($_SESSION['shift_money_end_old']-$_SESSION['shift_money_start_old'],'2');
echo ''.$lang_endmoney.' ( '.number_format($_SESSION['shift_money_end_old'],'2').' )
<br />'.$lang_startmoney.' ( '.number_format($_SESSION['shift_money_start_old'],'2').' )
<br />'.$lang_endstart.' ( '.$moneyshiftchange.' )';
}
?>
                                            <br />
                                            ____________________________________________


                                            <table style="width: 100%;">

                                                <tbody>
                                                    <tr ng-repeat="x in openbillclosedaylista">
                                                        <td>{{x.product_category_name2}}</td>

                                                        <td align="right">{{x.product_price2 | number:2}}</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            ____________________________________________
                                            <table style="width: 100%;">

                                                <tbody>

                                                    <tr ng-repeat="x in openbillclosedaylistb">
                                                        <td><?=$lang_discount?></td>
                                                        <td align="right">{{x.discount_last2 | number:2}}</td>

                                                    </tr>
                                                </tbody>
                                            </table>

                                            ____________________________________________
                                            <table style="width: 100%;">

                                                <tbody>
                                                    <tr ng-repeat="x in openbillclosedaylistc">
                                                        <td>
                                                            <div ng-repeat="y in pay_type_list">
                                                                <span
                                                                    ng-if="x.pay_type==y.pay_type_id">{{y.pay_type_name}}</span>
                                                            </div>
                                                        </td>

                                                        <td align="right">
                                                            {{x.sumsale_price2-x.discount_last2 | number:2}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            ____________________________________________
                                            <table style="width: 100%;">
                                                <tbody>
                                                    <tr ng-repeat="x in openbillclosedaylistb">
                                                        <td><?=$lang_all?></td>
                                                        <td align="right">
                                                            {{x.sumsale_price2-x.discount_last2 | number:2}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            ____________________________________________
                                            <table width="100%">
                                                <tr>
                                                    <td style="text-align: left;"><?=$lang_sales?> </td>
                                                    <td style="text-align: left;"><?php echo $_SESSION['name']; ?></td>
                                                    <td> </td>
                                                </tr>

                                            </table>
                                            <?=$lang_day?>: {{adddate}}
                                            <br />
                                            ____________________________________________


                                            <?=$lang_productlist?>
                                            <table style="width: 100%;">

                                                <tbody>

                                                    <tr>
                                                        <td><?=$lang_productlist?></td>
                                                        <td>
                                                            <?=$lang_num?>
                                                        </td>
                                                        <td><?=$lang_summary?></td>

                                                    </tr>
                                                    <tr ng-repeat="x in openbillclosedaylistproduct">
                                                        <td>{{x.product_name}}</td>
                                                        <td style="text-align:center;">
                                                            {{x.product_sale_num | number}}
                                                        </td>
                                                        <td align="right"> {{x.product_sale_price | number:2}}</td>

                                                    </tr>
                                                </tbody>
                                            </table>

                                            ____________________________________________



                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" ng-if="printer_ul =='0'" class="btn btn-primary"
                                            ng-click="printDiv2()"><?=$lang_print?></button>




                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal"><?=$lang_close?></button>
                                    </div>
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
                                    <div id="section-to-print-mini" style="font-size: 12px;">
                                        <center>


                                            <?php
if($_SESSION['open_number_for_cus']=='1'){
?>
                                            <br />
                                            <center style="font-size:60px;font-weight:bold;">{{number_for_cus | number}}

                                                <div style="font-size:12px;">
                                                    <?php echo $lang_sp_88;?>
                                                </div>
                                            </center>
                                            <br />
                                            <?php
}
?>



                                            <?php
if($_SESSION['logoonslip']=='0'){
?>
                                            <center>
                                                <table width="100%">
                                                    <tr>
                                                        <td width="150px" align="center">
                                                            <img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>"
                                                                style="width: 150px;">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </center>
                                            <?php
}
?>



                                            <?php if($_SESSION['showstorename']=='1'){ ?>
                                            <b><span style="font-size: 16px;">
                                                    <?php echo $_SESSION['owner_name']; ?></span> </b>
                                            <br />
                                            <?php } ?>

                                            <!--<br />
		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?> -->


                                            <?php if($_SESSION['showstoreaddress']=='1'){ ?>
                                            <?php echo $_SESSION['owner_address']; ?>
                                            <br />
                                            <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
                                            <br />
                                            <?php } ?>


                                            <?php if($_SESSION['showstorevatnumber']=='1'){ ?>
                                            <?php
if($_SESSION['owner_tax_number'] !=''){
 echo $lang_tax.':'.$_SESSION['owner_tax_number'].'<br />';
}
 ?>
                                            <?php } ?>


                                            <?php if($_SESSION['showrunno']=='1'){ ?>
                                            <?=$lang_runno?>:{{sale_runno}}
                                            <br />
                                            <?php } ?>

                                            ___________________________
                                            <br />

                                            <span ng-if="pay_type=='4'" style="font-weight: bold;">
                                                <?php echo $lang_sp_89;?></span>


                                            <span ng-if="pay_type!='4'" style="font-weight: bold;">
                                                <b><?php echo $_SESSION['header_slip'];?></b>
                                            </span>



                                            <!--<br />

 (VAT <span ng-if="vat3 == '0'">Included</span><span ng-if="vat3 > '0'">{{vat3}} %</span>)
 -->

                                            <br />
                                            <span ng-if="cus_name != null">

                                                <?php if($_SESSION['showcusname']=='1' || $_SESSION['showcusaddress']=='1' || $_SESSION['showcustel']=='1'){ ?>
                                                ___________________________
                                                <br />
                                                <?php } ?>

                                                <?php if($_SESSION['showcusname']=='1'){ ?>
                                                <?=$lang_cusname?>: {{cus_name}}
                                                <br />
                                                <?php } ?>


                                                <?php if($_SESSION['showcusaddress']=='1'){ ?>
                                                <?=$lang_address?>: {{cus_address_all}}
                                                <span ng-if="taxnumber!=''"><br />
                                                    <?php echo $lang_sp_90;?> {{taxnumber}} </span>

                                                <br />
                                                <?php } ?>


                                                <?php if($_SESSION['showcustel']=='1'){ ?>
                                                <span ng-if="product_score_all != '0.00'">
                                                    <?php echo $lang_sp_91;?> : {{product_score_all | number}}<br />
                                                </span>
                                                <span ng-if="cus_score != '0.00'">
                                                    <?php echo $lang_sp_92;?>: {{cus_score | number}}</span>
                                                <br />
                                                <?php } ?>

                                            </span>


                                            ___________________________
                                            <br />




                                            <?=$lang_productservice?>

                                        </center>

                                        <table class="table" style="width: 100%;font-size:14px;">
                                            <thead>
                                                <tr>
                                                    <th><?php echo $lang_productlist;?></th>
                                                    <th class="text-center"><?php echo $lang_price;?></th>
                                                    <th class="text-center"><?php echo $lang_qty;?></th>
                                                    <th class="text-right"><?php echo $lang_all;?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="x in listone">


                                                    <td>

                                                        {{x.product_name}}

                                                    </td>

                                                    <td align="right" width="30px">{{x.product_price | number:0}}</td>


                                                    <td width="30px" class="text-center">

                                                        {{x.product_sale_num | number}}&nbsp;&nbsp;
                                                    </td>


                                                    <td align="right" width="30px">
                                                        {{(x.product_price - x.product_price_discount) * x.product_sale_num | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td colspan="3"><?=$lang_summary?></td>


                                                    <td align="right">
                                                        {{sumsale_price | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                                    </td>
                                                </tr>








                                                <tr ng-if="discount_last2!='0.00'">

                                                    <td colspan="3"><?php echo $lang_sp_93;?>
                                                    </td>
                                                    <td align="right">
                                                        -{{discount_last2 | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                                    </td>
                                                </tr>

                                                <tr ng-if="discount_last2!='0.00'">

                                                    <td colspan="3"><?=$lang_sumall?></td>
                                                    <td align="right" style="font-weight: bold;">
                                                        {{sumsalevat-discount_last2 | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                                    </td>
                                                </tr>


                                                <tr>

                                                    <td colspan="3"><?=$lang_getmoney?></td>
                                                    <td align="right">
                                                        {{money_from_customer3 | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td colspan="3">
                                                        <span ng-if="pay_type=='4'" style="font-weight: bold;">
                                                            <?php echo $lang_sp_94;?></span>
                                                        <span ng-if="pay_type!='4'"
                                                            style="font-weight: bold;"><?=$lang_moneychange?></span>

                                                    </td>
                                                    <td align="right">
                                                        {{money_from_customer3 -(sumsalevat-discount_last2) | number:<?php echo $_SESSION['decimal_print']; ?>}}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>


                                        <?php
if($_SESSION['exchangerateonslip']=='1'){
?>
                                        <center>
                                            ___________________________
                                        </center>
                                        <table width="100%">

                                            <tr ng-repeat="x in exchangeratelist">
                                                <td>{{x.title_name}}</td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{(sumsalevat-discount_last2)/x.rate | number:2}}</td>
                                            </tr>

                                        </table>
                                        <?php } ?>



                                        <?php
if($_SESSION['open_vat_on_slip']=='1'){
?>
                                        <center>
                                            ___________________________
                                        </center>
                                        <table width="100%">

                                            <tr>
                                                <td>VAT</td>
                                                <td style="font-weight: bold;" align="right">
                                                    {{price_vat_all | number:2}}</td>
                                            </tr>


                                            <tr>
                                                <td>befor VAT</td>
                                                <td align="right">
                                                    {{sumsalevat-price_vat_all-discount_last2 | number:2}}</td>
                                            </tr>

                                        </table>
                                        <?php } ?>





                                        <center>
                                            ___________________________
                                        </center>
                                        <table width="100%">
                                            <tr ng-repeat="y in getonepaylist">
                                                <td>{{y.pay_type_name}}</td>
                                                <td align="right">
                                                    {{y.money | number:<?php echo $_SESSION['decimal_print']; ?>}}</td>

                                            </tr>



                                        </table>


                                        <center>
                                            ___________________________
                                            <br />
                                            <?php if($_SESSION['showsalesname']=='1'){ ?>

                                            <?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
                                            <br />
                                            <?php } ?>



                                            <?php if($_SESSION['showadddate']=='1'){ ?>
                                            <?=$lang_day?>: {{adddate}}
                                            <!-- <br />
<img src="<?php echo $base_url;?>/warehouse/barcode/png?barcode={{sale_runno}}" style="height: 70px;width: 160px;"> -->
                                            <br />

                                            <?php } ?>




                                            <?=$_SESSION['footer_slip']?>

                                            <br />
                                            ___________________________

                                            <br />


                                            <?php if($_SESSION['picunderslip']!=''){?>
                                            <img src="<?php echo $base_url.'/'.$_SESSION['picunderslip'];?>">
                                            <?php } ?>




                                            <center>


                                                <span ng-show="showremarkonslip=='1'">
                                                    <br />
                                                    {{saleremark}}
                                                </span>









                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" ng-click="printDiv()">
                                        <?=$lang_print?></button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"
                                        aria-hidden="true">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>












                    <div class="modal fade" id="Openonemini_order" style="visibility: hidden;">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <!-- <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_billmini?></h4>

			</div> -->
                                <div class="modal-body">
                                    <div id="section-to-print-mini-order" style="font-size: 12px;">
                                        <center>



                                            <?php if($_SESSION['show_order_on_slip']=='1'){?>
                                            <center>
                                                <br />


                                                <span style="font-size:20px;font-weight:bold;">
                                                    <?php echo $lang_sp_95;?></span>

                                                <?php
if($_SESSION['open_number_for_cus']=='1'){
?>
                                                <br />
                                                <center style="font-size:60px;font-weight:bold;">
                                                    {{number_for_cus | number}}

                                                    <div style="font-size:12px;">
                                                        <?php echo $lang_sp_96;?></div>
                                                </center>
                                                <br />
                                                <?php
}
?>


                                            </center>

                                            <table class="table" width="100%" style="font-size:20px;font-weight:bold;">

                                                <tr ng-repeat="x in listone">

                                                    <td width="70%">{{x.product_name}}
                                                    </td>
                                                    <td align="right" width="30%">{{x.product_sale_num | number}}</td>
                                                </tr>

                                            </table>

                                            <center>
                                                ------------
                                                <br />
                                                sale no: {{sale_runno}}
                                                <br />
                                                <?=$lang_sales?>: <?php echo $_SESSION['name']; ?>
                                                <br />


                                                <?=$lang_day?>: {{adddate}}
                                                <br />
                                                ------------



                                                <span ng-show="showremarkonslip=='1'">
                                                    <br />
                                                    {{saleremark}}
                                                </span>
                                            </center>






                                            <?php } ?>








                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" ng-click="printDiv()">
                                        <?=$lang_print?></button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"
                                        aria-hidden="true">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>







                    <div class="modal fade" id="Opengetmoneymodal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body" style="height:550px;">


                                    <center>

                                        <div class="form-group">
                                            <select class="form-control" ng-model="pay_type"
                                                style="background-color:orange;color:#fff;font-size:30px;height:60px;">
                                                <option ng-repeat="x in pay_type_list" value="{{x.pay_type_id}}">
                                                    {{x.pay_type_name}}
                                                </option>
                                            </select>
                                        </div>

                                        <input type="text" id="money_from_customer_id" class="form-control"
                                            ng-model="money_from_customer" placeholder="<?=$lang_getmoneyfromcus?>"
                                            onkeypress="validate(event)" autocomplete="off"
                                            style="text-align: right;height: 70px;background-color:#dff0d8;font-size: 40px;font-weight:bold;"
                                            autofocus>


                                        <br />

                                        <div ng-click="Addnumbermoney('c2m')"
                                            class="col-xs-12 col-sm-12 col-md-12 btn btn-primary"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_97;?> <span ng-show="discount_percent=='0'">
                                                {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - discount_last | number:2 }}
                                            </span>

                                            <span ng-show="discount_percent=='1'">
                                                {{Sumsaleprice() + (Sumsaleprice() * vatnumber/100) - ((Sumsaleprice() + (Sumsaleprice() * vatnumber/100))*(discount_last_percent/100)) | number:2 }}
                                            </span>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <br />
                                        </div>

                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_1;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_1_t;?>
                                        </div>
                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_2;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_2_t;?>
                                        </div>
                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_3;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_3_t;?>
                                        </div>
                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_4;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_4_t;?>
                                        </div>



                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_5;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_5_t;?>
                                        </div>
                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_6;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_6_t;?>
                                        </div>
                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_7;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_7_t;?>
                                        </div>
                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_8;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_8_t;?>
                                        </div>


                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_9;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_9_t;?>
                                        </div>
                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_0;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-default"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_0_t;?>
                                        </div>
                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_20;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-info"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_20_t;?>
                                        </div>
                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_50;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-info"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_50_t;?>
                                        </div>


                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_100;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-info"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_100_t;?>
                                        </div>
                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_500;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-info"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_500_t;?>
                                        </div>
                                        <div ng-click="Addnumbermoney('<?php echo $lang_sp_98_1000;?>')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-info"
                                            style="font-size:40px;font-weight:bold;height: 70px;">
                                            <?php echo $lang_sp_98_1000_t;?>
                                        </div>
                                        <div ng-click="Addnumbermoney('')"
                                            class="col-xs-3 col-sm-3 col-md-3 btn btn-warning"
                                            style="font-size:20px;font-weight:bold;height: 70px;">
                                            x <br /> <?=$lang_deleteall?>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <br />
                                        </div>


                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <input type="checkbox" ng-model="showremark">
                                            <?php echo $lang_sp_99;?>
                                            <textarea placeholder="<?php echo $lang_sp_99;?>" ng-show="showremark"
                                                ng-model="saleremark" class="form-control"
                                                style="height:200px;"></textarea>
                                            <span ng-show="showremark">
                                                <select ng-model="showremarkonslip">
                                                    <option value="0">
                                                        <?php echo $lang_sp_100;?>
                                                    </option>
                                                    <option value="1">
                                                        <?php echo $lang_sp_101;?>
                                                    </option>
                                                </select>
                                            </span>
                                            <br /><br />
                                        </div>

                                        <button type="submit" class="col-xs-12 col-sm-12 col-md-12 btn btn-success"
                                            style="font-size:40px;font-weight:bold;height: 70px;" id="savesale"
                                            ng-click="Savesale(money_from_customer,Sumsalepricevat(),discount_last )">
                                            <?=$lang_confirm?>(Enter)
                                        </button>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <br /><br />
                                        </div>



                                        <button class="col-xs-12 col-sm-12 col-md-12 btn btn-info"
                                            style="font-size:40px;font-weight:bold;height: 70px;" ng-click="Morepay()">
                                            <?php echo $lang_sp_102;?>
                                        </button>




                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <br /><br />
                                        </div>



                                    </center>



                                </div>
                                <div class="modal-footer">

                                    <center>
                                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"
                                            aria-hidden="true">ปิดหน้าต่าง(Esc)</button>
                                    </center>

                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="modal fade" id="popup_nummodal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <center>
                                        <h1 style="color:green;"><b>
                                                <span ng-if="popup_pricenum=='1'"><?php echo $lang_sp_103;?></span>
                                                <span ng-if="popup_pricenum=='3'"><?php echo $lang_sp_104;?></span>
                                            </b></h1>
                                        <span ng-if="popup_pricenum=='3'"
                                            style="color:red;"><?php echo $lang_sp_105;?></span>
                                        <form class="form-inline">
                                            <input type="number" id="popup_nummodal_focus" ng-model="popup_num_num"
                                                ng-change="Savepopup_num()" class="form-control" style="height: 100px;
    font-size: 100px;
	width: 100%;
    color: green;">
                                            <br />
                                            <br />
                                            <button type="submit" class="btn btn-success btn-lg" data-dismiss="modal"
                                                aria-hidden="true">
                                                Enter
                                            </button>
                                        </form>
                                    </center>

                                    <br />

                                </div>
                                <div class="modal-footer">

                                    <center>
                                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"
                                            aria-hidden="true">Close ESC</button>
                                    </center>

                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="modal fade" id="morepay">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">

                                <div class="modal-body">

                                    <center style="font-size:30px;">

                                        <b><?php echo $lang_sp_106;?></b>
                                        <br />

                                        :<?php echo $lang_sp_107;?>
                                        <b style="color:red;font-weight:bold;">
                                            {{Sumsaleprice() - discount_last | number }}

                                        </b>
                                        <br />



                                        :<?php echo $lang_sp_108;?> <b
                                            style="color:green;">{{Summorepaymoney() | number}}</b>
                                    </center>



                                    <div ng-repeat="x in pay_type_list" ng-if="x.pay_type_id!='4'">
                                        {{x.pay_type_name}}
                                        <input onkeypress="validate(event)" ng-model="x.pay_money"
                                            placeholder="{{x.pay_type_name}}" class="form-control"
                                            style="color:orange;font-size:30px;height: 50px;">
                                    </div>



                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <br />
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <input type="checkbox" ng-model="showremark">
                                        <?php echo $lang_sp_109;?>
                                        <textarea placeholder="<?php echo $lang_sp_109;?>" ng-if="showremark"
                                            ng-model="saleremark" class="form-control" style="height:200px;"></textarea>
                                        <span ng-show="showremark">
                                            <select ng-model="showremarkonslip">
                                                <option value="0">
                                                    <?php echo $lang_sp_110;?>
                                                </option>
                                                <option value="1">
                                                    <?php echo $lang_sp_111;?>
                                                </option>
                                            </select>
                                        </span>
                                        <br /><br />
                                    </div>


                                    <button
                                        ng-if="Summorepaymoney() >= Sumsaleprice() - discount_last && Countmorepaymoney() > '1'"
                                        type="submit" class="col-xs-12 col-sm-12 col-md-12 btn btn-success"
                                        style="font-size:40px;font-weight:bold;height: 70px;" id="savesalemorepay"
                                        ng-click="Savesale(money_from_customer,Sumsalepricevat(),discount_last )">
                                        <?=$lang_confirm?>(Enter)
                                    </button>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <br /><br />
                                    </div>


                                </div>
                                <div class="modal-footer">

                                    <center>
                                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"
                                            aria-hidden="true">Close</button>
                                    </center>

                                </div>
                            </div>
                        </div>
                    </div>







                    <div class="modal fade" id="Seemorepay">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">


                                <div class="modal-body">

                                    <center>
                                        <h2><b>{{sale_runno}}</b></h2>
                                    </center>

                                    <table class="table table-hover">
                                        <tr ng-repeat="x in morepaylist">
                                            <td>{{x.pay_type_name}}</td>
                                            <td align="right">{{x.money | number}}</td>
                                        </tr>
                                    </table>

                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-default" data-dismiss="modal"
                                        aria-hidden="true">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>







                    <div class="modal fade" id="popup_pricemodal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <center>
                                        <h1 style="color:blue;"><b>
                                                <?php echo $lang_sp_112;?>
                                            </b></h1>
                                        <form class="form-inline">
                                            <input type="number" id="popup_pricemodal_focus"
                                                ng-model="popup_price_price" ng-change="Savepopup_price()"
                                                class="form-control" style="height: 100px;
    font-size: 100px;
	width: 100%;
    color: blue;">
                                            <br />
                                            <br />
                                            <button type="submit" class="btn btn-success btn-lg" data-dismiss="modal"
                                                aria-hidden="true">
                                                Enter
                                            </button>
                                        </form>
                                    </center>

                                    <br />

                                </div>
                                <div class="modal-footer">

                                    <center>
                                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"
                                            aria-hidden="true">Close(Esc)</button>
                                    </center>

                                </div>
                            </div>
                        </div>
                    </div>






                    <div class="modal fade" id="Modalcannotfindproduct">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">


                                    <center>
                                        <h2 style="color:red;"><?php echo $lang_cannotfoundproduct;?></h2>
                                        <h1><b>
                                                {{cannotfindproduct_barcode}}
                                            </b></h1>

                                    </center>



                                </div>
                                <div class="modal-footer">

                                    <center>
                                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"
                                            aria-hidden="true">Close (Esc)</button>
                                    </center>

                                </div>
                            </div>
                        </div>
                    </div>













                    <div class="modal fade" id="Deleteorder_pass">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">


                                    <center>
                                        <h2 style="color:red;"><?php echo $lang_sp_113;?></h2>
                                        <h1><b>
                                                {{product_name_order}}
                                            </b></h1>

                                        <input type="password" placeholder="<?php echo $lang_sp_114;?>"
                                            ng-model="orderpass" class="form-control"
                                            style="height:50px;font-size50px;">
                                        <br />


                                        <button class="btn btn-success btn-lg"
                                            ng-click="Deletepush_pass_ok(deletepushdatax)">
                                            <?php echo $lang_sp_115;?></button>
                                        <span ng-if="cannotdeleteorder=='0'" style="color:red;"><br />
                                            <?php echo $lang_sp_116;?> </span>
                                    </center>



                                </div>
                                <div class="modal-footer">

                                    <center>
                                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"
                                            aria-hidden="true">ປິດໜ້າຕ່າງ(Esc)</button>
                                    </center>

                                </div>
                            </div>
                        </div>
                    </div>






















                    <div class="modal fade" id="Modalgetnumtoprice_noti">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">


                                    <center>

                                        <h1><b>
                                                {{getnumtoprice_noti}}
                                            </b></h1>

                                    </center>



                                </div>
                                <div class="modal-footer">

                                    <center>
                                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"
                                            aria-hidden="true">ປິດໜ້າຕ່າງ(Esc)</button>
                                    </center>

                                </div>
                            </div>
                        </div>
                    </div>















                    <div style="position: absolute; opacity: 0.0;">
                        <div class="modal fade" id="Openoneminiip">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <div id="section-to-print-slip"
                                            style="width: <?php echo $pt_width;?>;font-size: 25px;text-align: left;background-color: #fff;overflow:visible !important;">



                                            <?php
if($_SESSION['owner_logo']!=''){
?>

                                            <center>
                                                <table width="100%">
                                                    <tr>
                                                        <td width="250px" align="center">
                                                            <img src="<?=$base_url?>/<?=$_SESSION['owner_logo']?>"
                                                                style="width: 200px;">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </center>
                                            <?php
}
?>

                                            <!-- <br />
<center style="font-size:100px;font-weight:bold;">{{number_for_cus | number}}</center> -->

                                            <br />
                                            <b><span> <?php echo $_SESSION['owner_name']; ?></span> </b>
                                            <!--<br />
		 <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?> -->
                                            <br />
                                            <?php echo $_SESSION['owner_address']; ?>
                                            <br />
                                            <?=$lang_tel?>: <?php echo $_SESSION['owner_tel']; ?>
                                            <br />
                                            <?=$lang_tax?>:<?php echo $_SESSION['owner_tax_number']; ?>
                                            <br />
                                            <?=$lang_runno?>:{{sale_runno}}
                                            <br />
                                            __________________________________________

                                            <table width="100%">
                                                <tr>
                                                    <td width="30%"></td>
                                                    <td><?=$lang_billmini?></td>
                                                </tr>
                                            </table>


                                            <!--<br />

 (VAT <span ng-if="vat3 == '0'">Included</span><span ng-if="vat3 > '0'">{{vat3}} %</span>)
 -->

                                            <b ng-if="cus_id != null">
                                                __________________________________________
                                                <br />
                                                <?=$lang_cusname?>: {{cus_name}}
                                                <br />
                                                <?=$lang_address?>: {{cus_address_all}}
                                                <br />
                                            </b>
                                            __________________________________________
                                            <table width="100%">
                                                <tr>
                                                    <td width="30%"></td>
                                                    <td><?=$lang_productservice?></td>
                                                </tr>
                                            </table>
                                            <table style="width: 100%;font-size: 25px;">

                                                <tr ng-repeat="x in listone">

                                                    <td width="50%" style="text-align: left;">
                                                        {{x.product_name}}
                                                    </td>
                                                    <td valign="top">
                                                        {{x.product_sale_num | number}}
                                                    </td>
                                                    <td align="right" valign="top">
                                                        {{(x.product_price - x.product_price_discount) * x.product_sale_num | number:2}}
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td style="text-align: left;"><?=$lang_summary?></td>
                                                    <td></td>

                                                    <td align="right">{{sumsale_price | number:2}}</td>
                                                </tr>

                                                <tr ng-if="vat3 > '0'">
                                                    <td style="text-align: left;"><?=$lang_vat?> {{vat3}} %</td>
                                                    <td></td>
                                                    <td style="font-weight: bold;" align="right">
                                                        {{sumsale_price*(vat3/100) | number:2}}</td>
                                                </tr>


                                                <tr ng-if="vat3 > '0'">
                                                    <td style="text-align: left;"><?=$lang_pricesumvat?></td>
                                                    <td></td>
                                                    <td align="right">
                                                        {{sumsalevat | number:2}}</td>
                                                </tr>




                                                <?php
if($_SESSION['owner_vat_status']!='0'){
?>
                                                <tr>
                                                    <td><?=$lang_vat?> <?=$_SESSION['owner_vat']?> %</td>
                                                    <td style="font-weight: bold;" align="right">
                                                        {{((sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?>)*(<?=$_SESSION['owner_vat']?>/100) | number:2}}
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td><?=$lang_pricebeforvat?></td>
                                                    <td align="right">
                                                        {{(sumsalevat*100)/<?php echo $_SESSION['owner_vat']+100; ?> | number:2}}
                                                    </td>
                                                </tr>
                                                <?php } ?>



                                                <tr>

                                                    <td style="text-align: left;"><?=$lang_discount?></td>
                                                    <td></td>
                                                    <td align="right">{{discount_last2 | number:2}}</td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: left;"><?=$lang_sumall?></td>
                                                    <td></td>
                                                    <td align="right" style="font-weight: bold;">
                                                        {{sumsalevat-discount_last2 | number:2}}</td>
                                                </tr>


                                                <tr>

                                                    <td style="text-align: left;"><?=$lang_getmoney?></td>
                                                    <td></td>
                                                    <td align="right">{{money_from_customer3 | number:2}}</td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: left;"><?=$lang_moneychange?></td>
                                                    <td></td>
                                                    <td align="right">
                                                        {{money_from_customer3 -(sumsalevat-discount_last2) | number:2}}
                                                    </td>
                                                </tr>

                                            </table>

                                            __________________________________________

                                            <table width="100%">
                                                <tr>
                                                    <td><?=$lang_sales?></td>
                                                    <td><?php echo $_SESSION['name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?=$lang_day?></td>
                                                    <td> {{adddate}} </td>
                                                </tr>

                                            </table>
                                            <span style="text-align:left;"><?=$_SESSION['footer_slip']?></span>
                                            <br />
                                            __________________________________________



                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" ng-click="printDiv()">
                                            <?=$lang_print?></button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                            aria-hidden="true">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>







                </div>



                <?php if($_SESSION['user_type'] != '0'){?>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <hr />
                </div>

                <div class="col-xs-12  col-sm-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">


                            <center>
                                <h3><?php echo $lang_sp_117;?> : <b>
                                        <?php if(isset($_SESSION['shift_id'])){echo $_SESSION['shift_id'];}?> </b>
                                    <br /> in Today
                                    <?php echo $lang_sp_118;?>: <b><?php echo $_SESSION['name'];?></b>
                                </h3>
                            </center>




                            <div style="float: right;">
                                <input type="checkbox" ng-model="showdeletcbut">
                                <?=$lang_showdel?>
                            </div>






                            <form class="form-inline">

                                <div class="form-group">
                                    <input type="text" ng-model="searchtext" ng-change="getlist(searchtext,'1')"
                                        class="form-control" style="width:300px;"
                                        placeholder="<?=$lang_search?> Runno, <?=$lang_cusname?>">
                                </div>

                                <div class="form-group">
                                    <button type="submit" ng-click="getlist(searchtext,'1')" class="btn btn-success"
                                        placeholder="" title="<?=$lang_search?>"><span
                                            class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </div>
                                <div class="form-group">
                                    <button type="submit" ng-click="getlist('','1')" class="btn btn-default"
                                        placeholder="" title="<?=$lang_refresh?>"><span
                                            class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                                </div>

                            </form>
                            <br />




                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr class="trheader">
                                        <th><?=$lang_rank?></th>
                                        <th><?=$lang_runno?></th>
                                        <th><?=$lang_cusname?></th>

                                        <th><?php echo $lang_sp_119;?></th>



                                        <th><?=$lang_productnum?></th>
                                        <th><?=$lang_pricesum?></th>


                                        <?php
if($_SESSION['owner_vat_status']=='2'){
?>
                                        <th><?=$lang_vat?> Exclude %</th>
                                        <th><?=$lang_pricesumvat?></th>
                                        <?php
}
?>


                                        <th><?=$lang_discountlast?></th>
                                        <th><?=$lang_sumall?></th>
                                        <th><?=$lang_getmoney?></th>
                                        <th><?=$lang_moneychange?></th>
                                        <th><?=$lang_payby?></th>
                                        <th><?php echo $lang_sp_118;?></th>
                                        <th><?php echo $lang_sp_120;?></th>
                                        <th><?php echo $lang_sp_121;?></th>
                                        <th ng-show="showdeletcbut" style="width: 50px;"><?=$lang_delete?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="x in list">
                                        <td ng-show="selectpage=='1'" class="text-center">{{($index+1)}}</td>
                                        <td ng-show="selectpage!='1'" class="text-center">
                                            {{($index+1)+(perpage*(selectpage-1))}}</td>
                                        <td>


                                            <button ng-show="printer_ul =='0'" class="btn btn-primary btn-sm"
                                                ng-click="printDivmini2(x)">
                                                <?=$lang_print?></button>

                                            <button ng-show="printer_ul !='0'" class="btn btn-primary btn-sm"
                                                ng-click="printDivminiip2(x)">พิมพ์สลิป</button>


                                            <button class="btn btn-default btn-sm"
                                                ng-click="Getone(x)">{{x.sale_runno}}</button>


                                        </td>
                                        <td>{{x.cus_name}}

                                            <span ng-if="x.product_score_all !='0.00'"
                                                style="color:green;font-weight:bold;">
                                                +{{x.product_score_all | number}} <?php echo $lang_score;?> </span>
                                            <span ng-if="x.cus_name!=null">
                                                <br />
                                                <button class="btn btn-default btn-xs"
                                                    ng-click="printDivfullsend(x)"><?=$lang_printbox?></button>
                                            </span>
                                        </td>

                                        <td>
                                            {{x.saleremark}}
                                        </td>


                                        <td align="right">{{x.sumsale_num | number}}</td>
                                        <td align="right">{{x.sumsale_price | number:2}}</td>


                                        <?php
if($_SESSION['owner_vat_status']=='2'){
?>
                                        <td align="right">{{x.sumsale_price * (x.vat/100) | number:2}}</td>
                                        <td align="right">
                                            {{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) | number:2}}
                                        </td>
                                        <?php
}
?>



                                        <td align="right">{{x.discount_last | number:2}}</td>
                                        <td align="right">
                                            {{ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price) - x.discount_last | number:2}}
                                        </td>
                                        <td align="right">{{x.money_from_customer | number:2}}</td>
                                        <td align="right">
                                            {{x.money_from_customer - ((ParsefloatFunc(x.sumsale_price)  * (ParsefloatFunc(x.vat)/100) + ParsefloatFunc(x.sumsale_price)) - x.discount_last) | number:2}}
                                        </td>

                                        <td>

                                            <span ng-if="x.cmp=='1'">
                                                <span ng-repeat="y in pay_type_list"
                                                    ng-if="x.pay_type==y.pay_type_id">{{y.pay_type_name}}</span>
                                            </span>
                                            <span ng-if="x.cmp>'1'">
                                                <button class="btn btn-info btn-xs" ng-click="Seemorepay(x)">{{x.cmp}}
                                                    <?php echo $lang_sp_122;?></button>
                                            </span>
                                        </td>


                                        <td><b><?php echo $_SESSION['name'];?></b></td>

                                        <td>{{x.adddate}}</td>
                                        <td>{{x.savedate}}</td>
                                        <td ng-show="showdeletcbut" align="center">


                                            <!-- <button title="<?php echo $lang_sp_123;?>  {{x.sale_runno}}" class="btn btn-sm btn-danger" ng-click="Deletelist_modal(x)" id="delbut{{x.ID}}">
			<?=$lang_delete?> {{x.sale_runno}}</button> -->

                                            <button title="<?php echo $lang_sp_123;?> " class="btn btn-sm btn-danger"
                                                ng-click="Deletelist(x)" id="delbut{{x.ID}}">
                                                <?=$lang_delete?></button>






                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                            <form class="form-inline">
                                <div class="form-group">
                                    <?=$lang_show?>
                                    <select class="form-control" name="" id="" ng-model="perpage"
                                        ng-change="getlist(searchtext,'1',perpage)">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                        <option value="300">300</option>
                                    </select>

                                    <?=$lang_page?>
                                    <select name="" id="" class="form-control" ng-model="selectthispage"
                                        ng-change="getlist(searchtext,selectthispage,perpage)">
                                        <option ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
                                    </select>
                                </div>


                            </form>


                        </div>
                    </div>
                </div>
                <?php } ?>






            </div>



</font>
<script>
var app = angular.module('firstapp', []);
app.controller('Index', function($scope, $http, $location) {
    $scope.customer_name = '';
    $scope.cus_address_all = '';
    $scope.listsale = [];
    $scope.money_from_customer = '';
    $scope.customer_id = '0';
    $scope.product_code = '';
    $scope.listone = [];


    $scope.addvat = false;
    $scope.vatnumber = 0;

    $scope.sale_type = '1';
    $scope.pay_type = '1';
    $scope.discount_last = '0';
    $scope.reserv = '0';

    $scope.discount_percent = '0';
    $scope.discount_last_percent = 0;

    $scope.product_category_id = '0';

    $scope.showvatslit = '0';

    $scope.searchproductrank = '';

    $scope.ParsefloatFunc = function(data) {
        return parseFloat(data);
    };


    $scope.saledate = '';

    $("#saledate").datetimepicker({
        datetimepicker: false,
        format: 'd-m-Y H:i',
        lang: 'th' // แสดงภาษาไทย
        //yearOffset:543  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
        //inline:true

    });







    $scope.getpaytype = function() {

        $http.get('<?php echo $base_url;?>/salesetting/pay_type/get')
            .then(function(response) {
                $scope.pay_type_list = response.data.list;

            });
    };
    $scope.getpaytype();


    $scope.is_enter = true;

    $(window).keydown(function(event) {
        if (event.keyCode == 32) {
            console.log('SpaceBar was pressed');

            $scope.morepaykey = '0';
            $scope.product_code = '';

            $scope.Opengetmoneymodal();
            setTimeout(function() {
                $("#money_from_customer_id").focus();
            }, 1000);


        }

        if (event.keyCode == 27) {
            console.log('esc was pressed');

            $scope.clickokafterpay();
            $("#product_code_id").focus();
            //location.reload();

            setTimeout(function() {
                $("body").css("padding-right", "0px");
            }, 1000);



        }




        if (event.keyCode == 27) {
            console.log('esc was pressed');

            $('#Modalcannotfindproduct').modal('hide');



        }




        if (event.keyCode == 13) {
            console.log('Enter was pressed');

            $('#popup_nummodal').modal('hide');
            $('#popup_pricemodal').modal('hide');


            if ($scope.Summorepaymoney() >= $scope.Sumsaleprice() - $scope.discount_last && $scope
                .Countmorepaymoney() > '1') {
                if ($scope.morepaykey == '1') {
                    $scope.money_from_customer = $scope.Summorepaymoney();
                }
            }



            if ($scope.listsale == '' || $scope.listsale[0].product_id == '0') {
                //toastr.warning('<?=$lang_addproductlistplz?>');
            } else if ($scope.money_from_customer == '') {
                //toastr.warning('<?=$lang_getmoneyplz?>');
            } else if ($scope.pay_type != '4' && $scope.money_from_customer < $scope.Sumsalepricevat() -
                $scope.discount_last) {
                toastr.warning('<?=$lang_getmoneymoreplz?>');
            } else if ($scope.pay_type == '4' && $scope.money_from_customer > $scope.Sumsalepricevat() -
                $scope.discount_last) {
                toastr.warning('<?=$lang_getmoneymoreplz?>');
            } else if (isNaN($scope.money_from_customer) == true) {
                toastr.warning('<?=$lang_getmoneynumberplz?>');
            } else if ($scope.money_from_customer - $scope.Sumsalepricevat() >=
                100000000000000000000000000) {
                toastr.warning('<?=$lang_moneychangenotmore1000?>');
            } else {


                if ($scope.is_enter == true) {
                    $scope.is_enter = false;
                    $scope.Savesale();
                }




                setTimeout(function() {
                    if ($scope.printer_ul == '0') {
                        //$scope.printDivmini();
                    } else {
                        //$scope.printDivminiip();
                    }
                }, 1000);
            }

        }



    });








    <?php
if($_SESSION['owner_vat_status']=='0' || $_SESSION['owner_vat_status']=='1'){
?>

    $scope.vatnumber = 0;

    <?php
}else if($_SESSION['owner_vat_status']=='2'){
?>

    $scope.vatnumber = <?=$_SESSION['owner_vat']?>;

    <?php
}
?>





    $scope.Addproductrank = function() {
        $('#Addproductrankmodal').modal('show');
        $scope.getproductlist();
    };

    $scope.Searchproductranklist = function(s) {

        if (s == '') {

            $scope.productranklist = [];

        } else {
            $http.post("Salepic/Searchproductlist", {
                searchproduct: s
            }).success(function(data) {
                $scope.productranklist = data;

            });

        }

    };

    $scope.Addproductranksave = function(x) {

        console.log($scope.productlist);
        if ($scope.productlist.length != '0') {
            rank = $scope.productlist.length - 1;
            product_rank = $scope.productlist[rank].product_rank + 1;
        } else {
            product_rank = '1';
        }

        $http.post("Salepic/Addproductranksave", {
            product_rank: product_rank,
            product_id: x.product_id
        }).success(function(data) {
            toastr.success('<?=$lang_success?>');
            $scope.getproductlist();
            $scope.Searchproductranklist($scope.searchproductrank);
        });

    };


    $scope.Getnumtoprice = function(x) {

        $http.post("<?php echo $base_url;?>/salesetting/numtoprice/getproductbuy", {
            'product_code': x

        }).success(function(data) {

            if (data.length > 0) {
                var discount_numtoprice = Math.floor(data[0].product_sale_num / data[0].num) * ((
                    data[0].product_price * data[0].num) - data[0].price);


                if (data[0].remark != '' && data[0].product_sale_num == 1) {
                    $scope.getnumtoprice_noti = data[0].remark;
                    $('#Modalgetnumtoprice_noti').modal('show');
                    setTimeout(function() {
                        $('#Modalgetnumtoprice_noti').modal('hide');
                    }, 3000);
                }


                if (data[0].product_sale_num / data[0].num == 1) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last);
                } else if (data[0].product_sale_num / data[0].num == 2) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last) -
                        ((data[0].product_price * data[0].num) - data[0].price);
                } else if (data[0].product_sale_num / data[0].num == 3) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last) -
                        (2 * ((data[0].product_price * data[0].num) - data[0].price));
                } else if (data[0].product_sale_num / data[0].num == 4) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last) -
                        (3 * ((data[0].product_price * data[0].num) - data[0].price));
                } else if (data[0].product_sale_num / data[0].num == 5) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last) -
                        (4 * ((data[0].product_price * data[0].num) - data[0].price));
                } else if (data[0].product_sale_num / data[0].num == 6) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last) -
                        (5 * ((data[0].product_price * data[0].num) - data[0].price));
                } else if (data[0].product_sale_num / data[0].num == 7) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last) -
                        (6 * ((data[0].product_price * data[0].num) - data[0].price));
                } else if (data[0].product_sale_num / data[0].num == 8) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last) -
                        (7 * ((data[0].product_price * data[0].num) - data[0].price));
                } else if (data[0].product_sale_num / data[0].num == 9) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last) -
                        (8 * ((data[0].product_price * data[0].num) - data[0].price));
                } else if (data[0].product_sale_num / data[0].num == 10) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last) -
                        (9 * ((data[0].product_price * data[0].num) - data[0].price));
                }

                console.log($scope.discount_last);

            }




        });
    };








    $scope.Getnumtoprice_2 = function(x) {

        $http.post("<?php echo $base_url;?>/salesetting/numtoprice/getproductbuy", {
            'product_code': x

        }).success(function(data) {

            if (data.length > 0) {
                var discount_numtoprice = Math.floor(data[0].product_sale_num / data[0].num) * ((
                    data[0].product_price * data[0].num) - data[0].price);



                if (data[0].product_sale_num / data[0].num == 1) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last);
                } else if (data[0].product_sale_num / data[0].num == 2) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last);
                } else if (data[0].product_sale_num / data[0].num == 3) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last);
                } else if (data[0].product_sale_num / data[0].num == 4) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last);
                } else if (data[0].product_sale_num / data[0].num == 5) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last);
                } else if (data[0].product_sale_num / data[0].num == 6) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last);
                } else if (data[0].product_sale_num / data[0].num == 7) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last);
                } else if (data[0].product_sale_num / data[0].num == 8) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last);
                } else if (data[0].product_sale_num / data[0].num == 9) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last);
                } else if (data[0].product_sale_num / data[0].num == 10) {
                    $scope.discount_last = discount_numtoprice + parseFloat($scope.discount_last);
                }



            }




        });
    };







    $scope.Getnumtoprice_3 = function(x) {

        $http.post("<?php echo $base_url;?>/salesetting/numtoprice/getproductbuy", {
            'product_code': x

        }).success(function(data) {

            if (data.length > 0) {
                var discount_numtoprice = Math.floor(data[0].product_sale_num / data[0].num) * ((
                    data[0].product_price * data[0].num) - data[0].price);
                $scope.discount_last = parseFloat($scope.discount_last) - discount_numtoprice;

            }


        });
    };










    $scope.Delproductrank = function() {
        $('#Delproductrankmodal').modal('show');
        $scope.getproductlist();
    };


    $scope.Delproductranksave = function(x) {

        $http.post("Salepic/Delproductranksave", {
            product_id: x.product_id
        }).success(function(data) {
            toastr.success('<?=$lang_success?>');
            $scope.getproductlist();
        });

    };


    $scope.Openshiftmodal = function() {

        $('#Openshiftmodal').modal({
            backdrop: "static",
            keyboard: false
        });

    }
    <?php if(!isset($_SESSION['shift_id'])){?>
    $scope.Openshiftmodal();

    $.ajax({
        url: '<?php echo $base_url_local;?>/printer/example/interface/lan.php',
        data: {
            printer_ul: "1",
            printer_name: "XP-58",

        },
        type: 'post',
        success: function(response) {

        }
    });

    <?php } ?>




    $scope.Openshiftnow = function() {
        if (isNaN($scope.shift_money_start) == true) {
            toastr.warning('<?php echo $lang_sp_124;?>');
        } else {

            $http.post("Salepic/Openshiftnow", {
                shift_money_start: $scope.shift_money_start
            }).success(function(response) {

                window.location.href = '<?php echo $base_url;?>/sale/salepic';
            });

        }


    };






    $scope.Getround = function() {
        $http.post("<?php echo $base_url;?>/salesetting/round_setting/getround", {}).success(function(
            data) {
            $scope.roundlist = data;
        });
    };
    $scope.Getround();




    $scope.Opencashdrawer = function() {
        $.ajax({
            url: '<?php echo $base_url_local;?>/printer/example/interface/lan.php',
            data: {
                printer_ul: "1",
                printer_name: "XP-58",

            },
            type: 'post',
            success: function(response) {

            }
        });
    }



    $scope.Closeshiftnow = function() {
        $('#Closeshiftnow').modal({
            backdrop: "static",
            keyboard: false
        });


        $.ajax({
            url: '<?php echo $base_url_local;?>/printer/example/interface/lan.php',
            data: {
                printer_ul: "1",
                printer_name: "XP-58",

            },
            type: 'post',
            success: function(response) {

            }
        });


    };






    $scope.Opencashnow = function() {

        $.ajax({
            url: '<?php echo $base_url_local;?>/printer/example/interface/lan.php',
            data: {
                printer_ul: "1",
                printer_name: "XP-58",

            },
            type: 'post',
            success: function(response) {

            }
        });


    };








    $scope.Getdiscountfrombuy = function() {

        $http.get('<?php echo $base_url;?>/salesetting/setting_etc/getdiscountfrombuy')
            .then(function(response) {
                $scope.discountfrombuylist = response.data[0];
                console.log($scope.discountfrombuylist.money_if);
                console.log($scope.discountfrombuylist.money_will_discount);
            });
    };
    $scope.Getdiscountfrombuy();



    $scope.Getpointtomoney = function() {

        $http.get('<?php echo $base_url;?>/salesetting/setting_etc/getpointtomoney')
            .then(function(response) {
                $scope.pointtomoney = response.data[0];

            });
    };
    $scope.Getpointtomoney();



    $scope.Get_stock_rule = function() {

        $http.get('<?php echo $base_url;?>/salesetting/setting_etc/get_stock_rule')
            .then(function(response) {
                $scope.stock_rule = response.data[0];

            });
    };
    $scope.Get_stock_rule();






    $scope.Discount_lastfunc = function() {

        var total3 = 0;

        angular.forEach($scope.listsale, function(item) {
            total3 += parseFloat((item.product_price - item.product_price_discount) * item
                .product_sale_num);

        });

        if ($scope.discountfrombuylist && $scope.discountfrombuylist.money_will_discount != '0') {
            $scope.discount_last = Math.floor(Math.floor(parseFloat(total3) / parseFloat($scope
                .discountfrombuylist.money_if)) * parseFloat($scope.discountfrombuylist
                .money_will_discount));
            $scope.discount_money = Math.floor(Math.floor(parseFloat(total3) / parseFloat($scope
                .discountfrombuylist.money_if)) * parseFloat($scope.discountfrombuylist
                .money_will_discount));

        } else {
            $scope.discount_money = 0;
        }
        //console.log($scope.discount_last);
        $scope.total3 = total3;

    };



    $scope.Discount_lastfunc2 = function() {

        if ($scope.pointtomoney && $scope.pointtomoney.money_will != '0' && $scope.customer_score && $scope
            .total3 > '0') {

            $scope.discount_last = Math.floor(Math.floor(parseFloat($scope.customer_score) / parseFloat(
                    $scope.pointtomoney.cus_point_if)) * parseFloat($scope.pointtomoney.money_will) +
                Math.floor(Math.floor(parseFloat($scope.total3) / parseFloat($scope.discountfrombuylist
                    .money_if)) * parseFloat($scope.discountfrombuylist.money_will_discount)));

            if ($scope.discount_last > $scope.total3) {

                $scope.discount_last = $scope.total3;

            }
            $scope.customer_usepoint = Math.floor(Math.floor(parseFloat($scope.discount_last - $scope
                .discount_money) / parseFloat($scope.pointtomoney.money_will)) * parseFloat($scope
                .pointtomoney.cus_point_if));
            //alert($scope.customer_usepoint);
            console.log($scope.customer_id);
            //console.log($scope.discount_last);
        }


    };






    $scope.Closeshiftnowconfirm = function() {

        if (isNaN($scope.shift_money_end) == true) {
            toastr.warning('<?=$lang_numberplz?>');
        } else {
            $('#Closeshiftnow').modal('hide');
            $http.post("Salepic/Closeshiftnowconfirm", {
                shift_money_end: $scope.shift_money_end
            }).success(function(response) {
                window.location.href = '<?php echo $base_url;?>/sale/salepic';
            });
        }



    };




    $scope.Getpotmodal = function(x, index) {

        $('#getpotmodal').modal('show');
        $scope.potdataindex = index;
        $scope.potdata = x;
        $http.post("<?php echo $base_url;?>/warehouse/Productlist/getpotlist2", {
            product_id: x.product_id
        }).success(function(data) {

            $scope.getproductpotlist = data;


        });
        // ==========

        $http.post("<?php echo $base_url;?>/warehouse/Productlist/getpotlistshowall", {}).success(function(
            data) {

            $scope.getproductpotlistshowall = data;


        });


        // ---------------

    }





    $scope.getcategory = function() {

        $http.get('<?php echo $base_url;?>/warehouse/Productcategory/get')
            .then(function(response) {
                $scope.categorylist = response.data.list;

            });
    };
    $scope.getcategory();



    $scope.getpotall = function() {

        $http.get('<?php echo $base_url;?>/warehouse/Productlist/getpotall2')
            .then(function(response) {
                $scope.getpotall2data = response.data;

            });
    };
    $scope.getpotall();



    $scope.sctm = true;
    $scope.Searchcustomer = function() {
        // $scope.sctm = false;
        $http.post("Salepage/Customer", {
            cus_name: $scope.search_customer_name,
            getcourse: $scope.getcourse
        }).success(function(data) {
            $scope.customerlist = data;
            $scope.sctm = true;
        });
    };


    // $scope.Searchcustomer = function(){
    // $http.post("Salepage/Customer",{
    // 	cus_name: $scope.customer_name
    // 	}).success(function(data){
    // $scope.customerlist = data;

    //         });
    // };



    $scope.product_name_search = '';
    $scope.searchproductlist = function() {

        $scope.productlist = [];
        $scope.productlistkey = false;

        if ($scope.product_name_search == '') {

            $scope.getproductlist();

        } else {
            $http.post("Salepic/Searchproductlist", {
                searchproduct: $scope.product_name_search
            }).success(function(data) {
                $scope.productlist = data;
                $scope.productlistkey = true;

            });

        }


    };



    $scope.clickokafterpay = function() {
        $('#Openchangemoney').modal('hide');
        $('#Openonemini').modal('hide');
        $('#Openone').modal('hide');

        $scope.money_from_customer = '';

        setTimeout(function() {
            $("body").css("padding-right", "0px");
        }, 1000);

        $http.post("Salepage/Updatemoneychange", {}).success(function(data) {

        });

    };


    $scope.printDiv = function() {
        window.scrollTo(0, 0);
        window.print();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: 1,
            url: '127.0.0.1:8088/open',
            error: function() {
                //alert('Could not open cash drawer');
            },
            success: function() {
                //do something else
            }
        });


    };

    $scope.printDivfull = function() {
        //$('#Openone').modal('show');
        $('#Openonemini').modal('hide');
        $scope.Getone($scope.list[0]);
        // setTimeout(function(){
        // $scope.printDiv();
        //  }, 1000);
    };


    $scope.printDivfullsend = function(x) {
        $('#Openonesend').modal('show');

        $scope.dataprintsend = x;

        setTimeout(function() {
            $scope.printDiv();
        }, 1000);

    };

    $scope.lung = '1';
    $scope.Selectlung = function(x) {
        $scope.lung = x;
    };



    $scope.getcashierprinterip = function() {

        $http.get('<?php echo $base_url;?>/printer/Printercategory/getcashier')
            .then(function(response) {
                $scope.cashier_printer_ip = response.data[0].cashier_printer_ip;
                $scope.printer_ul = response.data[0].printer_ul;
                $scope.printer_name = response.data[0].printer_name;

            });
    };
    $scope.getcashierprinterip();







    $scope.Showproduct_pointmodal = function() {
        $('#Showproduct_pointmodal').modal('show');
        $http.get('<?php echo $base_url;?>/salesetting/Product_point/get')
            .then(function(response) {
                $scope.product_point_list = response.data.list;

            });

    }










    $scope.Openbillcloseday = function() {
        $('#Openbillcloseday').modal('show');



        $http.post("Salepic/Openbillclosedaylista", {
            daynow: $scope.daynow,
        }).success(function(data) {

            $scope.openbillclosedaylista = data;

        });

        $http.post("Salepic/Openbillclosedaylistb", {
            daynow: $scope.daynow,
        }).success(function(data) {

            $scope.openbillclosedaylistb = data;

        });


        $http.post("Salepic/Openbillclosedaylistc", {
            daynow: $scope.daynow,
        }).success(function(data) {

            $scope.openbillclosedaylistc = data;

        });



        $http.post("Salepic/openbillclosedaylistproduct", {
            daynow: $scope.daynow,
        }).success(function(data) {

            $scope.openbillclosedaylistproduct = data;

        });






        setTimeout(function() {
            //$scope.printDiv();
        }, 1000);



    };







    $scope.Summary_pay_type = function() {
        var total = 0;

        angular.forEach($scope.openbillclosedaylistc, function(item) {
            if (item.sumsale_price2 != null) {
                sumsale_price2 = item.sumsale_price2;
            } else {
                sumsale_price2 = 0;
            }
            total += parseFloat(sumsale_price2);
        });
        return total;
    };






    $scope.Openbillclosedayip = function() {
        $('#Openbillclosedayip').modal('show');



        $http.post("Salepic/Openbillclosedaylista", {
            daynow: $scope.daynow,
        }).success(function(data) {

            $scope.openbillclosedaylista = data;

        });

        $http.post("Salepic/Openbillclosedaylistb", {
            daynow: $scope.daynow,
        }).success(function(data) {

            $scope.openbillclosedaylistb = data;

        });


        $http.post("Salepic/Openbillclosedaylistc", {
            daynow: $scope.daynow,
        }).success(function(data) {

            $scope.openbillclosedaylistc = data;

        });



        $http.post("Salepic/openbillclosedaylistproduct", {
            daynow: $scope.daynow,
        }).success(function(data) {

            $scope.openbillclosedaylistproduct = data;

        });






        setTimeout(function() {
            $scope.printDiv2ip('billclose');
        }, 1000);



    };





    $scope.printDiv2ip = function(x) {
        window.scrollTo(0, 0);
        //window.print();
        toastr.info('<?=$lang_printing?>');
        //alert($scope.cus_id_one);


        if (x == 'billclose') {
            var element = $("#section-to-print-billclose");
            var print_section = 'billclose';
        } else {
            var element = $("#section-to-print-slip");
            var print_section = 'slip';
        }

        //$scope.Opencashdrawer();


        var getCanvas; // global variable
        html2canvas(element, {
            width: 1000,
            height: 5000,
            onrendered: function(canvas) {
                // $("#previewImage").append(canvas);
                getCanvas = canvas;



                var imgageData = getCanvas.toDataURL("image/png");
                // Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/(png|jpg);base64,/, "");


                ///  one /////
                $.ajax({
                    url: '<?php echo $base_url_local;?>/printer/example/interface/lan.php',
                    data: {
                        imgdata: newData,
                        cashier_printer_ip: $scope.cashier_printer_ip,
                        printer_ul: $scope.printer_ul,
                        printer_name: $scope.printer_name,
                        print_section: print_section
                    },
                    type: 'post',
                    success: function(response) {
                        console.log(response);

                        $('#Openoneminiip').modal('hide');
                    }
                });
                //$('#Openoneminiip').modal('hide');
                ///  one /////






            }
        });




    };






    $scope.printDivminiip = function() {
        $('#Openoneminiip').modal('show');
        window.scrollTo(0, 0);
        $scope.Getonemini($scope.list[0]);
        setTimeout(function() {
            $scope.printDiv2ip();
        }, 1000);

    };





    $scope.printDivmini = function() {
        $('#Openonemini').modal('show');
        $('#Openone').modal('hide');
        $scope.Getonemini($scope.list[0]);


    };



    $scope.printDivmini_order = function() {
        $('#Openonemini_order').modal('show');
        $('#Openone').modal('hide');
        $scope.Getonemini_order($scope.list[0]);


    };






    $scope.printDivminiip2 = function(x) {
        $('#Openoneminiip').modal('show');
        window.scrollTo(0, 0);
        $scope.Getonemini(x);
        setTimeout(function() {
            $scope.printDiv2ip();
        }, 1000);

    };





    $scope.printDivmini2 = function(x) {
        $('#Openonemini').modal('show');
        //$('#Openonemini').css('visibility','');
        $('#Openone').modal('hide');
        $scope.Getonemini(x);
        setTimeout(function() {
            //$scope.printDiv();
        }, 1000);

    };





    $scope.Openfull = function() {
        $('#Openfull').modal({
            backdrop: "static",
            keyboard: false
        });
    };

    $scope.search_customer_name = '';
    $scope.Opencustomer = function() {
        $('#Opencustomer').modal('show');
        $scope.getcourse = '0';
        //$scope.Searchcustomer();
        $scope.customerlist = [];
    };


    $scope.getcourse = '0';
    $scope.Opencourse = function() {
        $('#Opencustomer').modal('show');
        $scope.getcourse = '1';
        $scope.customerlist = [];
    };



    $scope.Selectcourse = function(x) {
        $('#Allcuscourse').modal('show');
        $http.post("Salepage/Allcuscourse", {
            cus_id: x.cus_id
        }).success(function(data) {
            $scope.cuscourselist = data;
            $scope.cus_name_course = x.cus_name;
        });
    };




    $scope.Savethiscuscourse = function(x) {
        $http.post("Salepage/Savethiscuscourse", {
            cus_id: x.cus_id,
            used_course_num: x.use_course,
            product_id: x.product_id,
            product_name: x.product_name,
            sale_runno: x.sale_runno
        }).success(function(data) {
            $scope.Selectcourse(x);
            toastr.success('<?php echo $lang_sp_125;?>');
        });
    };









    $scope.customer_group_discountpercent = false;
    $scope.Selectcustomer = function(x) {


        $scope.customer_id = x.cus_id;
        $scope.customer_name = x.cus_name;
        $scope.customer_score = x.product_score_all;
        $scope.customer_group_discountpercent = x.customer_group_discountpercent;
        $scope.cus_address_all = x.cus_address + ' ' + x.cus_address_postcode + ' ' +
            ' <?php echo $lang_tel;?>: ' + x.cus_tel;
        $('#Opencustomer').modal('hide');
        $('#customer_name').prop('disabled', true);
        $('#cus_address_all').prop('disabled', true);
        $scope.search_customer_name = '';



        $http.post("Salepic/update_customer_group_discountpercent", {
            customer_group_discountpercent: $scope.customer_group_discountpercent,
            customer_score: $scope.customer_score,
            customer_name: $scope.customer_name
        }).success(function(data) {
            $scope.Showlistorder();

        });




    };





    $scope.Refresh = function() {
        $scope.customer_id = '0';
        $scope.customer_name = '';
        $scope.customer_score = false;
        $scope.cus_address_all = '';
        $scope.customer_group_discountpercent = false;
        //$scope.listsale = [];
        //$scope.money_from_customer = '';

        $('#customer_name').prop('disabled', false);
        $('#cus_address_all').prop('disabled', false);
        $('#savesale').prop('disabled', false);
        $('#savesale2').prop('disabled', false);
        $('#money_from_customer').prop('disabled', false);
        $('#money_from_customer2').prop('disabled', false);
        $scope.sale_type = '1';

        $scope.discount_last = 0;
        $scope.reserv = '0';

        $scope.discount_percent = '0';
        $scope.discount_last_percent = 0;


        setTimeout(function() {
            $scope.pay_type = '1';
        }, 2000);


    };

    $scope.getproductlist = function() {

        $http.get('Salepage/Getproductlist')
            .then(function(response) {
                $scope.productlist = response.data;
                $scope.productlistkey = true;
            });
    };
    $scope.getproductlist();


    $scope.Selectcat = function(id) {
        if (id == '0') {
            $scope.getproductlist();
        } else {

            $http.post("Salepic/Getproductlistcat", {
                product_category_id: id
            }).success(function(data) {
                $scope.productlist = data;

            });

        }

    };


    $scope.Price_discount_percent = function(x, index) {
        $scope.listsale[index].product_price_discount = (x.product_price * x
            .product_price_discount_percent) / 100;

        $http.post("Salepic/Price_discount_percent", {
            product_id: x.product_id,
            product_code: x.product_code,
            product_name: x.product_name,
            product_image: x.product_image,
            product_unit_name: x.product_unit_name,
            product_des: x.product_des,
            product_score: x.product_score,
            product_price: x.product_price,
            product_sale_num: x.product_sale_num,
            product_price_discount: x.product_price_discount,
            product_price_discount_percent: x.product_price_discount_percent
        }).success(function(data) {
            $scope.listsale = data;
        });

    };


    $scope.Addpushproduct = function() {
        $scope.listsale.push({
            product_id: '0',
            product_name: '<?=$lang_selectproduct?>',
            product_des: '',
            product_price: '0',
            product_score: '0',
            product_sale_num: '1',
            product_price_discount: '0',
            product_price_discount_percent: '0'
        });
    };






    $scope.Savepopup_num = function() {
        if ($scope.popup_pricenum == '3') {
            numnum = $scope.popup_num_num / $scope.product_price_popupnum;
        } else {
            numnum = $scope.popup_num_num;
        }
        $http.post("Salepage/Savepopup_num", {
            product_name: $scope.product_name_popupnum,
            product_sale_num: numnum
        }).success(function(data) {
            //$('#popup_nummodal').modal('hide');
            $scope.Showlistorder();
        });

    }


    $scope.Savepopup_price = function() {
        $http.post("Salepage/Savepopup_price", {
            product_name: $scope.product_name_popupnum,
            product_price: $scope.popup_price_price
        }).success(function(data) {
            //$('#popup_nummodal').modal('hide');
            $scope.Showlistorder();
        });

    }








    $scope.Addpushproductcode = function(product_code, x) {
        $scope.yingbarcode = true;
        $scope.www = '0';

        $scope.money_from_customer = '';
        $scope.saledate = '';

        $http.post("Salepage/Findproduct", {
            cus_id: $scope.customer_id,
            product_code: product_code
        }).success(function(data) {
            $scope.yingbarcode = false;

            // ==== ori -----ລອງເອົາອອກ --------------
            // $scope.cansale = data.cansale;
            // ==== ori -----ລອງເອົາອອກ --------------

            if (data.list != '' && data.list[0].popup_pricenum == '1' || data.list != '' && data
                .list[0].popup_pricenum == '3') {
                //แสดง popup ให้ใส่จำนวนเอง
                $('#popup_nummodal').modal('show');
                $scope.product_name_popupnum = data.list[0].product_name;
                $scope.product_price_popupnum = data.list[0].product_price;
                $scope.popup_pricenum = data.list[0].popup_pricenum;
                $scope.popup_num_num = '';
                setTimeout(function() {
                    $("#popup_nummodal_focus").focus();
                }, 1000);

            }


            if (data.list != '' && data.list[0].popup_pricenum == '2') {
                //แสดง popup ให้ใส่ราคาเอง
                $('#popup_pricemodal').modal('show');
                $scope.product_name_popupnum = data.list[0].product_name;
                $scope.popup_price_price = '';
                setTimeout(function() {
                    $("#popup_pricemodal_focus").focus();
                }, 1000);

            }

            $scope.www = data.w;

            console.log(data.w);
            if (data.w != 0) {
                $scope.w_dws = data.w;
            } else {
                $scope.w_dws = 1;
            }


            if (data.sn != 0) {
                $scope.sn_code = data.sn;
            } else {
                $scope.sn_code = '';
            }




            $scope.Findproductone = data.list;
            data = data.list;

            if (data == '') {
                $scope.cannotfindproduct = true;

                if (product_code != '') {
                    $scope.cannotfindproduct_barcode = product_code;
                    $('#Modalcannotfindproduct').modal('show');
                }

            } else {

                if ($scope.sale_type == '1') {
                    product_price = data[0].product_price;
                } else if ($scope.sale_type == '2') {
                    product_price = data[0].product_wholesale_price;
                } else if ($scope.sale_type == '3') {
                    product_price = data[0].product_price3;
                } else if ($scope.sale_type == '4') {
                    product_price = data[0].product_price4;
                } else if ($scope.sale_type == '5') {
                    product_price = data[0].product_price5;
                }


                // ==== ori ============================
                if (data[0].product_stock_num <= -1000000000000000000000000000000000000000) {
                    toastr.warning('ສິນຄ້າຢູ່ໜ້າຮ້ານໝົດ');



                } else {

                    // -------------------- update new ---------------------
                    if (data[0].product_stock_num <= 0) {
                        toastr.warning('<?=$lang_outofstock?>');
                    }


                    if (parseFloat(data[0].product_stock_num) <= parseFloat(data[0]
                            .product_num_min)) {
                        toastr.info(data[0].product_name + ' ເຫຼືອ ' + data[0].product_stock_num +
                            ' ອັນ');
                    }

                    // -------------------- update new ---------------------

                    if (data[0].product_unit_name == null) {
                        data[0].product_unit_name = '';
                    }

                    $scope.listsale.push({
                        product_id: data[0].product_id,
                        product_code: data[0].product_code,
                        product_name: data[0].product_name,
                        product_image: data[0].product_image,
                        product_unit_name: data[0].product_unit_name,
                        product_des: data[0].product_des,
                        product_score: data[0].product_score,
                        product_price: product_price,
                        product_sale_num: '1',
                        product_price_discount: data[0].product_price_discount,
                        product_price_discount_percent: data[0]
                            .product_price_discount_percent
                    });


                    // ==================================================

                    $http.post("Salepic/saveshowcus", {
                        // product_id: data[0].product_id,
                        // product_code: data[0].product_code,
                        // product_name: psn,
                        // sn_code: $scope.sn_code,
                        // product_image: data[0].product_image,
                        // product_unit_name: data[0].product_unit_name,
                        // product_des: data[0].product_des,
                        // product_score: data[0].product_score,
                        // product_price: product_price,
                        // product_pricebase: data[0].product_pricebase,
                        // product_stock_num: data[0].product_stock_num,
                        // product_sale_num: $scope.w_dws,
                        // product_price_discount: data[0].product_price_discount,
                        // product_price_discount_percent: data[0].product_price_discount_percent
                        product_id: data[0].product_id,
                        product_code: data[0].product_code,
                        product_name: data[0].product_name,
                        product_image: data[0].product_image,
                        product_unit_name: data[0].product_unit_name,
                        product_des: data[0].product_des,
                        product_score: data[0].product_score,
                        product_price: product_price,
                        product_sale_num: '1',
                        product_price_discount: data[0].product_price_discount,
                        product_price_discount_percent: data[0]
                            .product_price_discount_percent
                    }).success(function(data) {




                        $scope.listsale = data;

                        // $scope.Getnumtoprice($scope.getnumtoprice_product_code);

                        // <?php if(isset($_SESSION['playbeep']) && $_SESSION['playbeep']=='1'){ ?>
                        // playbeep();
                        // <?php } ?>

                        // $scope.Discount_lastfunc();
                        // $scope.Discount_lastfunc2();

                        // $scope.Summarysale_change();

                        // setTimeout(function() {
                        // 	var objDiv = document.getElementById("salebox");
                        // 	objDiv.scrollTop = objDiv.scrollHeight;
                        // }, 10);

                    });




                    // }


                    // ============ ori ລອງເອົາອອກ ==================================
                    // else{
                    // 	// 
                    // 	if(data[0].count_stock==0 || $scope.cansale=='0'){

                    // 		// alert($scope.cansale);


                    // toastr.warning('ບໍ່ສາມາດສ້າງການຂາຍໄດ້ ເນື່ອງຈາກຕັ້ງຄ່າບໍ່ໃຫ້ຂາຍຖ້າສະຕັອກເຫຼືອນ້ອຍກວ່າທີ່ກຳໜົດ');
                    // }


                    // }


                    // ============ ori ລອງເອົາອອກ ==================================

                }





                $scope.cannotfindproduct = false;

            }
            $scope.product_code = '';
            $('#Openfulltable').scrollTop($('#Openfulltable')[0].scrollHeight, 1000000);
        });


    };






    $scope.getname_of_price = function() {

        $http.get('<?php echo $base_url;?>/salesetting/name_of_price/get')
            .then(function(response) {
                $scope.name_of_price_list = response.data.list;

            });
    };
    $scope.getname_of_price();





    $scope.Updateproductnumber = function(x, index) {
        $scope.listsaleindex = index;
        $http.post("Salepic/updateproductnumber", {
            product_id: x.product_id,
            product_code: x.product_code,
            product_name: x.product_name,
            product_image: x.product_image,
            product_unit_name: x.product_unit_name,
            product_des: x.product_des,
            product_score: x.product_score,
            product_price: x.product_price,
            product_sale_num: x.product_sale_num,
            product_price_discount: x.product_price_discount,
            product_price_discount_percent: x.product_price_discount_percent
        }).success(function(data) {

            $scope.Discount_lastfunc();
            $scope.Discount_lastfunc2();

            $scope.Summarysale_change();

            $scope.listsale[$scope.listsaleindex].product_price = data.list[$scope.listsaleindex]
                .product_price;

            // =============== ori ລອງເອົາອອກ ================ 
            // if(data.cansale=='0'){
            // $scope.listsale = data.list;

            // alert(data.cansale);



            // toastr.warning('ບໍ່ສາມາດສ້າງການຂາຍໄດ້ ເນື່ອງຈາກຕັ້ງຄ່າບໍ່ໃຫ້ຂາຍຖ້າສະຕັອກເຫຼືອນ້ອຍກວ່າທີ່ກຳໜົດ');
            // }
            // =============== ori ລອງເອົາອອກ ================ 

            //toastr.success('บันทึกจำนวน ' + x.product_sale_num + ' เรียบร้อย');
            $scope.Getnumtoprice_2(x.product_code);
        });
    }





    $scope.Updateproductprice = function(x) {
        $http.post("Salepic/updateproductprice", {
            product_id: x.product_id,
            product_code: x.product_code,
            product_name: x.product_name,
            product_image: x.product_image,
            product_unit_name: x.product_unit_name,
            product_des: x.product_des,
            product_score: x.product_score,
            product_price: x.product_price,
            product_sale_num: x.product_sale_num,
            product_price_discount: x.product_price_discount,
            product_price_discount_percent: x.product_price_discount_percent
        }).success(function(data) {

            $scope.Discount_lastfunc();
            $scope.Discount_lastfunc2();

            $scope.Summarysale_change();

            //$scope.listsale = data;
            //toastr.success('บันทึกจำนวน ' + x.product_sale_num + ' เรียบร้อย');
            $scope.Getnumtoprice_2(x.product_code);
        });
    }



    $scope.orderpass = '';
    $scope.Deletepush_pass = function(x) {
        $('#Deleteorder_pass').modal('show');
        if (x == 'all') {
            $scope.product_name_order = '<?php echo $lang_sp_128;?>';
        } else {
            $scope.product_name_order = x.product_name;
        }
        $scope.deletepushdatax = x;

    }


    $scope.Deletepush_pass_ok = function(x) {

        if ($scope.orderpass != '') {

            if (x == 'all') {
                xproduct_name = '';
            } else {
                xproduct_name = x.product_name;
                $scope.Getnumtoprice_3(x.product_code);
            }

            $http.post("Salepic/delshowcus_pass", {
                product_name: xproduct_name,
                orderpass: $scope.orderpass
                //sc_ID: x.sc_ID
            }).success(function(data) {

                if (data == 'no') {
                    $scope.cannotdeleteorder = '0';
                    $scope.orderpass = '';
                } else {
                    $('#Deleteorder_pass').modal('hide');
                    $scope.cannotdeleteorder = '1';
                    $scope.listsale = data;
                    $scope.orderpass = '';
                }


            });
        }

    }






    $scope.Deletepush = function(x) {

        if (x == 'all') {
            xproduct_name = '';
        } else {
            xproduct_name = x.product_name;
            $scope.Getnumtoprice_3(x.product_code);
        }

        $http.post("Salepic/delshowcus", {
            product_name: xproduct_name
            //sc_ID: x.sc_ID
        }).success(function(data) {

            $scope.listsale = data;
        });


    };



    $scope.Selectpot = function(x) {
        // 	if(x.product_ot_price == '0'){
        // 	p_name = $scope.potdata.product_name+' \n ('+x.product_ot_name+')';
        // 	pot_price = parseFloat($scope.potdata.product_price);		
        // }else{
        // 		if(x.type=='0'){
        // 		p_name = $scope.potdata.product_name+' \n ('+x.product_ot_name+' '+x.product_ot_price+')';
        // 		pot_price = parseFloat($scope.potdata.product_price)+parseFloat(x.product_ot_price);
        // 			}else if(x.type=='1'){
        // 		p_name = $scope.potdata.product_name+' \n ('+x.product_ot_name+' '+x.product_ot_price+'%)';
        // 		pot_price = parseFloat($scope.potdata.product_price)+(parseFloat($scope.potdata.product_price)*parseFloat(x.product_ot_price)/100);
        // 			}else{
        // 			p_name = $scope.potdata.product_name+' \n ('+x.product_ot_name+' '+x.product_ot_price+')';
        // 		pot_price = parseFloat($scope.potdata.product_price)*parseFloat(x.product_ot_price);;
        // 			}

        // 		}

        console.log($scope.potdata.product_name);
        $http.post("Salepic/updateshowcus", {
            sc_ID: $scope.potdata.sc_ID,
            product_name: $scope.potdata.product_name + ' \n (' + x.product_ot_name + ' ' + x
                .product_ot_price + ')',
            product_price: parseFloat($scope.potdata.product_price) + parseFloat(x.product_ot_price)
        }).success(function(data) {
            //toastr.success('&#3648;&#3614;&#3636;&#3656;&#3617;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;&#3648;&#3626;&#3619;&#3636;&#3617;&#3648;&#3619;&#3637;&#3618;&#3610;&#3619;&#3657;&#3629;&#3618;');
            //console.log($scope.potdataindex);
            $scope.Getpotmodal(data[$scope.potdataindex], $scope.potdataindex);

            $scope.listsale = data;
        });

    }


    $scope.Showlistorder = function(x) {

        $http.post("Salepic/showlistorder", {}).success(function(data) {
            $scope.listsale = data;
        });


    };
    $scope.Showlistorder();




    $scope.Seemorepay = function(x) {
        $http.post("Salelist/Seemorepay", {
            sale_runno: x.sale_runno
        }).success(function(response) {
            $('#Seemorepay').modal('show');
            $scope.morepaylist = response;
            $scope.sale_runno = x.sale_runno;
        });

    };



    $scope.morepaykey = '0';
    $scope.Morepay = function() {
        $('#morepay').modal({
            backdrop: "static",
            keyboard: false
        });
        $('#Opengetmoneymodal').modal('hide');
        $scope.morepaykey = '1';
        $scope.getpaytype();
    };


    $scope.Summorepaymoney = function() {
        var total = 0;

        angular.forEach($scope.pay_type_list, function(item) {
            if (item.pay_money != null) {
                if (item.pay_money == '') {
                    pay_money = 0;
                } else {
                    pay_money = item.pay_money;
                }
            } else {
                pay_money = 0;
            }
            total += parseFloat(pay_money);
        });
        return total;
    };



    $scope.Countmorepaymoney = function() {
        var total = 0;

        angular.forEach($scope.pay_type_list, function(item) {
            if (item.pay_money != null) {
                if (item.pay_money == '') {
                    pay_money = 0;
                } else {

                    if (item.pay_money != 0) {
                        pay_money = 1;
                    } else {
                        pay_money = 0;
                    }


                }
            } else {
                pay_money = 0;
            }
            total += parseInt(pay_money);
        });
        return total;
    };




    $scope.Modalproduct = function(index) {
        $('#Modalproduct').modal({
            show: true
        });
        $scope.indexrow = index;
    };

    $scope.Selectproduct = function(y, index) {
        $scope.listsale[index].product_id = y.product_id;
        $scope.listsale[index].product_code = y.product_code;
        $scope.listsale[index].product_name = y.product_name;
        $scope.listsale[index].product_des = y.product_des;
        $scope.listsale[index].product_price = y.product_price;
        $scope.listsale[index].product_price_discount = y.product_price_discount;
        $('#Modalproduct').modal('hide');

    };



    $scope.Sumsalenum = function() {
        var total = 0;

        angular.forEach($scope.listsale, function(item) {
            total += parseFloat(item.product_sale_num);
        });
        return total;
    };


    $scope.Sumsalediscount = function() {
        var total = 0;

        angular.forEach($scope.listsale, function(item) {
            total += parseFloat(item.product_price_discount);
        });
        return total;
    };


    $scope.Sumproduct_score = function() {
        var total = 0;

        angular.forEach($scope.listsale, function(item) {
            total += parseFloat(item.product_score * item.product_sale_num);
        });
        return total;
    };





    $scope.digits_count = function(n) {
        var count = 0;
        if (n >= 1) ++count;

        while (n / 10 >= 1) {
            n /= 10;
            ++count;
        }

        return count;
    }






    $scope.Sumsaleprice = function() {
        var total = 0;
        var xxx = 'f';
        var sum = 0;
        var cdigi = "";
        $scope.round_money = '';
        $scope.round_money_is = '';

        angular.forEach($scope.listsale, function(item) {
            total += parseFloat((item.product_price - item.product_price_discount) * item
                .product_sale_num);
        });

        total = total.toFixed(8);
        var x = total;
        var decimals = x - Math.floor(x);

        angular.forEach($scope.roundlist, function(item) {
            if (item.rs_from <= decimals && item.rs_to >= decimals) {
                xxx = parseFloat(item.rs_is);
                $scope.round_money = decimals;
                $scope.round_money_is = xxx;
            }
            cdigi = $scope.digits_count(item.rs_to);
        });

        if ($scope.roundlist != '' && xxx != 'f') {
            sum = total - decimals + xxx;
        }


        if (xxx == 'f') {
            var str = total;

            str = parseInt(str).toFixed(0);
            //console.log(str);
            //console.log("Original data: ",str);
            str = str.slice(str.length - cdigi);
            //console.log(cdigi);
            str = parseInt(str);
            //console.log("After truncate: ",str);


            angular.forEach($scope.roundlist, function(item) {
                if (item.rs_from <= str && item.rs_to >= str) {
                    xxx = parseFloat(item.rs_is);
                    $scope.round_money = str;
                    $scope.round_money_is = xxx;
                }

            });
            //console.log(xxx);

            if ($scope.roundlist != '' && xxx != 'f') {
                sum = parseInt(total - str + xxx);
            } else {
                sum = total;
            }
        }


        return sum;
    };













    $scope.Sumsalepricevat = function() {
        var total = 0;
        angular.forEach($scope.listsale, function(item) {
            total += (parseFloat(item.product_price) - parseFloat(item.product_price_discount)) *
                parseFloat(item.product_sale_num);
        });
        total2 = total + (total * ($scope.vatnumber / 100));

        //return parseFloat(total2).toFixed(2);

        return $scope.Sumsaleprice();

    };




    $scope.Print_preview_save = function() {
        $http.post("<?php echo $base_url;?>/printer/Printercategory/print_preview_save", {
            print_preview: $scope.print_preview
        }).success(function(data) {
            if ($scope.print_preview) {
                toastr.success('<?=$lang_success?>');
            }
            $scope.print_preview = data[0].print_preview
        });
    };
    $scope.Print_preview_save();




    $scope.saleremark = '';
    $scope.showremarkonslip = '0';
    $scope.Savesale = function(changemoney, sumsalepricevat, discount_last) {


        if ($scope.morepaykey == '1') {
            $scope.money_from_customer = $scope.Summorepaymoney();
        }



        if ($scope.discount_last_percent != 0) {
            $scope.discount_last = ($scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber /
                100)) * ($scope.discount_last_percent / 100);
        }

        if ($scope.listsale == '' || $scope.listsale[0].product_id == '0') {
            toastr.warning('<?=$lang_addproductlistplz?>');
        } else if ($scope.money_from_customer == '') {
            //toastr.warning('<?=$lang_getmoneyplz?>');
        } else if ($scope.pay_type != '4' && $scope.money_from_customer < $scope.Sumsalepricevat() - $scope
            .discount_last) {
            console.log($scope.Sumsalepricevat);
            toastr.warning('<?=$lang_getmoneymoreplz?>');
        } else if ($scope.pay_type == '4' && $scope.money_from_customer > $scope.Sumsalepricevat() - $scope
            .discount_last) {
            toastr.warning('<?=$lang_getmoneyplz?>');
        } else if (isNaN($scope.money_from_customer) == true) {
            toastr.warning('<?=$lang_getmoneynumberplz?>');
        } else if ($scope.money_from_customer - $scope.Sumsalepricevat() >= 100000000000000000000000000) {
            toastr.warning('<?=$lang_moneychangenotmore1000?>');
        } else {

            if ($scope.discount_last_percent != 0) {
                $scope.discount_last = ($scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber /
                    100)) * ($scope.discount_last_percent / 100);
            }

            toastr.info('<?=$lang_saving?>');

            $http.post("Salepage/cususepoint", {
                customer_usepoint: $scope.customer_usepoint,
                cus_id: $scope.customer_id
            }).success(function(data) {

            });

            $('#savesalemorepay').prop('disabled', true);
            $('#savesale').prop('disabled', true);
            $('#savesale2').prop('disabled', true);
            $('#money_from_customer').prop('disabled', true);
            $('#money_from_customer2').prop('disabled', true);
            $http.post("Salepage/Savesale", {
                listsale: $scope.listsale,
                cus_name: $scope.customer_name,
                cus_id: $scope.customer_id,
                cus_address_all: $scope.cus_address_all,
                sumsale_discount: $scope.Sumsalediscount(),
                sumsale_num: $scope.Sumsalenum(),
                vat: $scope.vatnumber,
                product_score_all: $scope.Sumproduct_score(),
                sumsale_price: $scope.Sumsaleprice(),
                money_from_customer: $scope.money_from_customer,
                money_changeto_customer: $scope.money_from_customer - ($scope.Sumsalepricevat() -
                    $scope.discount_last),
                sale_type: $scope.sale_type,
                pay_type: $scope.pay_type,
                pay_type_list: $scope.pay_type_list,
                morepaykey: $scope.morepaykey,
                saleremark: $scope.saleremark,
                round_money: $scope.round_money,
                round_money_is: $scope.round_money_is,
                showremarkonslip: $scope.showremarkonslip,
                reserv: $scope.reserv,
                saledate: $scope.saledate,
                discount_last: $scope.discount_last,
                shift_id: '<?php if(isset($_SESSION['shift_id'])){ echo $_SESSION['shift_id']; }?>'
            }).success(function(data) {
                //toastr.success('<?=$lang_success?>');


                //Line notify
                <?php if($_SESSION['line_stocknoti']=='1'){ ?>
                $http.post("Salepage/line_stocknoti", {
                    listsale: $scope.listsale
                }).success(function(data) {

                });
                <?php } ?>
                //Line notify


                $scope.morepaykey = '0';
                $('#morepay').modal('hide');
                $scope.saleremark = '';

                if ($scope.pay_type == '1' || $scope.pay_type == '4') {

                    $.ajax({
                        url: '<?php echo $base_url_local;?>/printer/example/interface/lan.php',
                        data: {
                            printer_ul: "1",
                            printer_name: "XP-58",

                        },
                        type: 'post',
                        success: function(response) {

                        }
                    });

                }


                $scope.saledate = '';



                $('#Opengetmoneymodal').modal('hide');

                toastr.success('<?=$lang_savingsuccess?>');

                $scope.changemoney = $scope.money_from_customer - ($scope.Sumsalepricevat() - $scope
                    .discount_last);

                $('#savesalemorepay').prop('disabled', false);
                $('#Openchangemoney').modal({
                    backdrop: "static",
                    keyboard: false
                });
                $('#savesale').prop('disabled', false);
                $('#savesale2').prop('disabled', false);
                $('#money_from_customer').prop('disabled', false);
                $('#money_from_customer2').prop('disabled', false);

                $scope.Refresh();

                if ($scope.print_preview == 0) {
                    $scope.getlist();
                    $scope.getproductlist();
                } else {
                    $scope.getlist('', '', '', 'printmini');
                }

                $scope.listsale = [];
                $scope.money_from_customer = '';






                $scope.is_enter = true;




            });
        }

    };
















    $scope.Savequotation = function(changemoney, sumsalepricevat, discount_last) {

        if ($scope.listsale == '' || $scope.listsale[0].product_id == '0') {
            toastr.warning('<?=$lang_addproductlistplz?>');
        } else {

            if ($scope.discount_last_percent != 0) {
                $scope.discount_last = ($scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber /
                    100)) * ($scope.discount_last_percent / 100);
            }

            toastr.info('<?php echo $lang_sp_129;?>...');

            $('#savequotation').prop('disabled', true);
            $('#savesale2').prop('disabled', true);
            $('#money_from_customer').prop('disabled', true);
            $('#money_from_customer2').prop('disabled', true);
            $http.post("Salepage/Savequotation", {
                listsale: $scope.listsale,
                cus_name: $scope.customer_name,
                cus_id: $scope.customer_id,
                cus_address_all: $scope.cus_address_all,
                sumsale_discount: $scope.Sumsalediscount(),
                sumsale_num: $scope.Sumsalenum(),
                vat: $scope.vatnumber,
                product_score_all: $scope.Sumproduct_score(),
                sumsale_price: $scope.Sumsaleprice(),
                money_from_customer: $scope.money_from_customer,
                money_changeto_customer: $scope.money_from_customer - ($scope.Sumsalepricevat() -
                    $scope.discount_last),
                sale_type: $scope.sale_type,
                pay_type: $scope.pay_type,
                reserv: $scope.reserv,
                discount_last: $scope.discount_last,
                shift_id: '<?php if(isset($_SESSION['shift_id'])){ echo $_SESSION['shift_id']; }?>'
            }).success(function(data) {
                //toastr.success('<?=$lang_success?>');

                $('#Opengetmoneymodal').modal('hide');

                toastr.success('<?php echo $lang_sp_130;?>');

                $scope.changemoney = $scope.money_from_customer - ($scope.Sumsalepricevat() - $scope
                    .discount_last);

                //$('#Openchangemoney').modal({backdrop: "static", keyboard: false});
                $('#savequotation').prop('disabled', false);
                $('#savesale2').prop('disabled', false);
                $('#money_from_customer').prop('disabled', false);
                $('#money_from_customer2').prop('disabled', false);

                $scope.Refresh();
                $scope.getlist();

                $scope.listsale = [];


            });
        }

    };









    $scope.Showquotationlist = function() {

        $http.post("Salepage/getquotation", {}).success(function(data) {
            $scope.quotationlist = data;
            $('#Showquotationlistmodal').modal('show');
        });

    };











    $scope.Addnumbermoney = function(x) {
        allprice = false;
        if (x == 'c2m') {
            if ($scope.discount_percent == '0') {
                x = $scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber / 100) - $scope
                    .discount_last;
            } else {
                x = $scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber / 100) - (($scope
                    .Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber / 100)) * ($scope
                    .discount_last_percent / 100))
            }



            if (x == 0) {
                //alert('000');
                allprice = true;
            }
            //console.log(x);

        }


        if (x == '') {
            $scope.money_from_customer = '';
        }



        if ($scope.money_from_customer == '' && x == 0 && $scope.pay_type != '4') {
            if (allprice == true) {
                $scope.money_from_customer = '0';
            } else {
                $scope.money_from_customer = '';
            }

        } else if (x < 10) {
            $scope.money_from_customer = $scope.money_from_customer + x;
        } else if (x => 10) {
            console.log(x);
            $scope.money_from_customer = x;
        } else {

        }



        allprice = false;



    };


    $scope.perpage = '10';
    $scope.getlist = function(searchtext, page, perpage, x) {
        $scope.list = [];
        if (!searchtext) {
            searchtext = '';
        }


        if (!page) {
            var page = '1';
        }

        if (!perpage) {
            var perpage = '10';
        }

        $http.post("Salepage/gettoday", {
            searchtext: searchtext,
            page: page,
            perpage: perpage
        }).success(function(data) {

            $scope.list = data.list;
            $scope.pageall = data.pageall;
            $scope.numall = data.numall;

            $scope.pagealladd = [];
            for (i = 1; i <= $scope.pageall; i++) {
                $scope.pagealladd.push({
                    a: i
                });
            }

            $scope.selectpage = page;
            $scope.selectthispage = page;

            if (x == 'printmini') {
                $scope.printDivmini();
            }

        });

    };
    $scope.getlist('', '1');



    $scope.Getone = function(x) {
        $('#Openone').modal('show');
        $http.post("Salelist/Getone", {
            sale_runno: x.sale_runno
        }).success(function(response) {
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
            $scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat) / 100)) +
                parseFloat(x.sumsale_price);
            $scope.money_changeto_customer = x.money_changeto_customer;
            $scope.adddate = x.adddate;
            $scope.discount_last2 = x.discount_last;
            $scope.pay_type = x.pay_type;
            $scope.number_for_cus = x.number_for_cus;
            $scope.saleremark = x.saleremark;
            $scope.showremarkonslip = x.showremarkonslip;
            $scope.taxnumber = x.taxnumber;
        });

        setTimeout(function() {
            //$scope.printDiv();
        }, 1000);

        setTimeout(function() {
            //$('#Openone').modal('hide');
        }, 1000);


    };









    //start ค้นหาสินค้าทั้งหมด
    $scope.searchtextarray = [];
    $scope.searchtextarray2 = [];
    $scope.pregetlist = function() {
        $scope.searchtextarray.push($scope.product_name_search);
        setTimeout(function() {
            $scope.searchtextarray2.push($scope.product_name_search);
            if ($scope.searchtextarray2[0] == $scope.searchtextarray[$scope.searchtextarray.length -
                    1]) {
                $scope.searchproductlist();
            }
            $scope.searchtextarray = [];
            $scope.searchtextarray2 = [];
        }, 1000);
    }
    //end ค้นหาสินค้าทั้งหมด





    //start ค้นหาลูกค้า
    $scope.csearchtextarray = [];
    $scope.csearchtextarray2 = [];
    $scope.pregetlistcus = function() {
        $scope.csearchtextarray.push($scope.search_customer_name);
        setTimeout(function() {
            $scope.csearchtextarray2.push($scope.search_customer_name);
            if ($scope.csearchtextarray2[0] == $scope.csearchtextarray[$scope.csearchtextarray
                    .length - 1]) {
                $scope.Searchcustomer();
            }
            $scope.csearchtextarray = [];
            $scope.csearchtextarray2 = [];
        }, 1000);
    }
    //end ค้นหาลูกค้า






    $scope.Getonemini = function(x) {



        $http.post("Salelist/Seemorepay", {
            sale_runno: x.sale_runno
        }).success(function(response) {
            $scope.getonepaylist = response;
        });


        $http.post("Salelist/Getone", {
            sale_runno: x.sale_runno
        }).success(function(response) {
            console.log(response);
            $scope.listone = [];

            $scope.listone = response;
            $scope.cus_name = x.cus_name;
            $scope.cus_score = x.cus_score;
            $scope.cus_address_all = x.cus_address_all;
            $scope.sale_runno = x.sale_runno;
            $scope.sumsale_discount = x.sumsale_discount;
            $scope.sumsale_num = x.sumsale_num;
            $scope.sumsale_price = x.sumsale_price;
            $scope.money_from_customer3 = x.money_from_customer;
            $scope.vat3 = x.vat;
            $scope.price_vat_all = x.price_vat_all;
            $scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat) / 100)) +
                parseFloat(x.sumsale_price);
            $scope.money_changeto_customer = x.money_changeto_customer;
            $scope.adddate = x.adddate;
            $scope.discount_last2 = x.discount_last;
            $scope.number_for_cus = x.number_for_cus;
            $scope.pay_type = x.pay_type;
            $scope.saleremark = x.saleremark;
            $scope.showremarkonslip = x.showremarkonslip;
            $scope.product_score_all = x.product_score_all;
            $scope.taxnumber = x.taxnumber;

            setTimeout(function() {

                Openprintdiv_mini();
                $('#Openonemini').modal('hide');
                $scope.getproductlist();
            }, 1000);


        });

    };




    $scope.Getonemini_order = function(x) {
        $http.post("Salelist/Getone", {
            sale_runno: x.sale_runno
        }).success(function(response) {
            console.log(response);
            $scope.listone = [];

            $scope.listone = response;
            $scope.cus_name = x.cus_name;
            $scope.cus_score = x.cus_score;
            $scope.cus_address_all = x.cus_address_all;
            $scope.sale_runno = x.sale_runno;
            $scope.sumsale_discount = x.sumsale_discount;
            $scope.sumsale_num = x.sumsale_num;
            $scope.sumsale_price = x.sumsale_price;
            $scope.money_from_customer3 = x.money_from_customer;
            $scope.vat3 = x.vat;
            $scope.price_vat_all = x.price_vat_all;
            $scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat) / 100)) +
                parseFloat(x.sumsale_price);
            $scope.money_changeto_customer = x.money_changeto_customer;
            $scope.adddate = x.adddate;
            $scope.discount_last2 = x.discount_last;
            $scope.number_for_cus = x.number_for_cus;
            $scope.pay_type = x.pay_type;
            $scope.saleremark = x.saleremark;
            $scope.showremarkonslip = x.showremarkonslip;
            $scope.taxnumber = x.taxnumber;

            setTimeout(function() {

                Openprintdiv_mini_order();
                $('#Openonemini_order').modal('hide');

            }, 1000);


        });

    };




    $scope.Opengetmoneymodal = function() {
        $('#Opengetmoneymodal').modal('show');
        $scope.morepaykey = '0';

        if ($scope.discount_last_percent != 0) {
            $scope.discount_last = ($scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber /
                100)) * ($scope.discount_last_percent / 100);
        }


        $http.post("Salepic/sesdiscount", {
            discount_last: $scope.discount_last
        }).success(function(data) {

        });

    };




    $scope.Summarysale_change = function() {
        if ($scope.discount_last_percent != 0) {
            $scope.discount_last = ($scope.Sumsaleprice() + ($scope.Sumsaleprice() * $scope.vatnumber /
                100)) * ($scope.discount_last_percent / 100);
        }
        $http.post("Salepic/sesdiscount", {
            discount_last: $scope.discount_last
        }).success(function(data) {

        });

    };
















    <?php if($_SESSION['exchangerateonslip']=='1'){?>

    $scope.getexchangerate = function() {

        $http.get('<?php echo $base_url;?>/salesetting/exchangerate/get')
            .then(function(response) {
                $scope.exchangeratelist = response.data.list;

            });
    };
    $scope.getexchangerate();

    <?php } ?>







    $scope.Getonequotation = function(x, y) {
        if (y == '1') {
            $scope.quotation_type = '1';
        } else {
            $scope.quotation_type = '2';
        }

        $('#Openonequotation').modal('show');

        $http.post("Salelist/Getonequotation", {
            show: '1',
            sale_runno: x.sale_runno
        }).success(function(response) {
            $scope.listone = response;
            $scope.cus_name = x.cus_name;
            $scope.cus_address_all_2 = x.cus_address_all;
            $scope.sale_runno = x.sale_runno;
            $scope.sumsale_discount = x.sumsale_discount;
            $scope.sumsale_num = x.sumsale_num;
            $scope.sumsale_price = x.sumsale_price;
            $scope.money_from_customer3 = x.money_from_customer;
            $scope.vat3 = x.vat;
            $scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat) / 100)) +
                parseFloat(x.sumsale_price);
            $scope.money_changeto_customer = x.money_changeto_customer;
            $scope.adddate = x.adddate;
            $scope.discount_last2 = x.discount_last;
            $scope.pay_type = x.pay_type;
            $scope.number_for_cus = x.number_for_cus;
            $scope.taxnumber = x.taxnumber;
        });

        setTimeout(function() {
            //$scope.printDiv();
        }, 1000);

        setTimeout(function() {
            //$('#Openonequotation').modal('hide');
        }, 1000);


    };







    $scope.Getonequotation2pay = function(x) {


        $scope.money_from_customer = '';
        $scope.saledate = '';


        $http.post("Salelist/Getonequotation", {
            sale_runno: x.sale_runno
        }).success(function(response) {
            $scope.listsale = response;

            if (x.cus_id == null) {
                $scope.customer_id = '';
            } else {
                $scope.customer_id = x.cus_id;
            }

            if (x.cus_name == null) {
                $scope.customer_name = '';
            } else {
                $scope.customer_name = x.cus_name;
            }

            $scope.cus_address_all = x.cus_address_all;

            $scope.vat3 = x.vat;
            $scope.sumsalevat = (parseFloat(x.sumsale_price) * (parseFloat(x.vat) / 100)) +
                parseFloat(x.sumsale_price);

            $scope.discount_last = x.discount_last;
            $scope.pay_type = x.pay_type;

        });

        $('#Showquotationlistmodal').modal('hide');


    };


    // $scope.delname = "<?php echo $_SESSION['name'];?>";

    // $scope.Deletelist = function(x){
    // $('#delbut'+ x.ID).prop('disabled',true);
    // $http.post("Salelist/Deletelist",{
    // 	ID: x.ID,
    // 	sale_runno: x.sale_runno,
    // 	product_score_all: x.product_score_all,
    // 	cus_id: x.cus_id,
    // 	whydel: $scope.whydel,
    // 	delname: $scope.delname
    // }).success(function(response){
    // toastr.success('<?=$lang_success?>');
    // $scope.getlist();
    // $scope.Refresh();
    // $('#Deletelist_modal').modal('hide');
    // $scope.delname = "<?php echo $_SESSION['name'];?>";
    //         });

    // };


    $scope.Deletelist = function(x) {
        $('#delbut' + x.ID).prop('disabled', true);
        $http.post("Salelist/Deletelist", {
            ID: x.ID,
            sale_runno: x.sale_runno,
            product_score_all: x.product_score_all,
            cus_id: x.cus_id
        }).success(function(response) {
            toastr.success('<?=$lang_success?>');
            $scope.getlist();
        });

    };


    $scope.billpassword = '';

    $scope.Deletelist_pass = function(x) {

        if ($scope.billpassword != '') {
            $('#delbut' + x.ID).prop('disabled', true);
            $http.post("Salelist/Deletelist_pass", {
                billpassword: $scope.billpassword
            }).success(function(response) {
                if (response != 'no') {
                    $scope.delname = response;
                    $scope.Deletelist(x);
                    $scope.cannotdeletebill = '';
                    $scope.billpassword = '';
                } else {
                    $('#delbut' + x.ID).prop('disabled', false);
                    $scope.cannotdeletebill = '0';
                    $scope.billpassword = '';
                }
            });

        }

    };




    $scope.Deletelist_modal = function(x) {

        $('#Deletelist_modal').modal('show');
        $scope.deletelist_x = x;

    };








    $scope.Sum_product_weight_bill = function() {
        var total = 0;
        angular.forEach($scope.listone, function(item) {
            if (item.product_weight == '') {
                product_weight = '0';
            } else {
                product_weight = item.product_weight;
            }
            total += parseFloat(product_weight);
        });

        return total;

    };







    $scope.Deletequotationlist = function(x) {
        $('#delbut' + x.ID).prop('disabled', true);
        $http.post("Salelist/Deletequotationlist", {
            ID: x.ID,
            sale_runno: x.sale_runno,
            product_score_all: x.product_score_all,
            cus_id: x.cus_id
        }).success(function(response) {
            toastr.success('<?=$lang_success?>');
            $scope.Showquotationlist();
        });

    };


    $scope.Checklogin = function() {
        $http.post("<?php echo $base_url;?>/c2mhelper/checklogin", {}).success(function(response) {
            if (response == '0') {
                window.location = "<?php echo $base_url;?>";
            };
        });
    };

    setInterval(function() {

        $scope.Checklogin();

    }, 60000);


    $('.lodingbefor').css('display', 'block');

});




function validate(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[-0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}


setTimeout(function() {
    $("#product_code_id").focus();
}, 1000);
</script>