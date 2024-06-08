<style>
	.ui-datepicker-year{
		display: none;
		}
</style>

<div class="col-md-10 col-sm-9 lodingbefor" ng-app="firstapp" ng-controller="Index" style="display: none;">

<div class="panel panel-default">
	<div class="panel-body">


<div style="float: right;">
<button class="btn btn-primary" onClick="Openprintdiv_table()"><?=$lang_print?></button>
</div>


 <div style="float: right;">
	<button class="btn btn-info" ng-click="Modalexcel()">
	<?php echo $lang_obmt_1;?></button>
</div>


<font size="4"><span class="glyphicon glyphicon-th" aria-hidden="true"></span>
<?=$lang_cusnamelist?> ({{allmycustomer | number:0}} <?=$lang_person?>) <a class="btn btn-primary"  style="float: right" ng-click="Openaddnewcus()">
<span class="glyphicon glyphicon-plus" aria-hidden="true"> <?php echo $lang_obmt_2;?></span></a>
</font>





<hr />

<div style="float: right">

<input type="checkbox" ng-model="Showdelbut"> <?=$lang_showdel?>
</div>


<form class="form-inline">

<div class="form-group">
<input type="text" ng-model="searchtext" class="form-control" 
placeholder="ค้นหา " ng-change="pregetlistcus()">
</div>

<!-- <div class="form-group">
<button class="btn btn-info"  ng-click="DownloadExcel()" title="ดาวน์โหลดรายชื่อลูกค้า" ><span class="glyphicon glyphicon-save" aria-hidden="true"></button>
</div> -->
<div class="form-group">
<button type="submit" ng-click="Refreshsubmit(searchtype,searchtext,'1')" class="btn btn-default" placeholder="" title="<?=$lang_refresh?>"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
</div>


<div class="form-group">

<select class="form-control" ng-model="bdm" ng-init="bdm='0'" ng-change="getmycustomer()">
	<option value="0">
		<?php echo $lang_obmt_3;?>
	</option>
	<option value="1">
		<?php echo $lang_jan;?>
	</option>
	<option value="2">
		<?php echo $lang_feb;?>
	</option>
	<option value="3">
		<?php echo $lang_mar;?>
	</option>
	<option value="4">
		<?php echo $lang_april;?>
	</option>
	<option value="5">
		<?php echo $lang_may;?>
	</option>
	<option value="6">
		<?php echo $lang_jun;?>
	</option>
	<option value="7">
		<?php echo $lang_july;?>
	</option>
	<option value="8">
		<?php echo $lang_orgus;?>
	</option>
	<option value="9">
		<?php echo $lang_sep;?>
	</option>
	<option value="10">
		<?php echo $lang_org;?>
	</option>
	<option value="11">
		<?php echo $lang_novem;?>
	</option>
	<option value="12">
		<?php echo $lang_desam;?>
	</option>
</select>

</div>


</form>

<center>
<img ng-if="!sctm" src="<?php echo $base_url;?>/pic/loading.gif">
</center>
<br />
<div id="openprint_table">

<table class="table table-hover" id="headerTable">
	<thead>
		<tr style="background-color: #eee">

			<th width="5px" class="visible-sm visible-md visible-lg">
			<?=$lang_rank?></th>
			<th width="5px"><?=$lang_contact?></th>
			<th><?=$lang_name?></th>
			<th><?php echo $lang_obmt_4;?></th>
<th><?php echo $lang_address;?></th>
			<th><?=$lang_tel?></th>
			<th class="visible-sm visible-md visible-lg">E-mail</th>
			<th class="visible-sm visible-md visible-lg"><?=$lang_birthday?></th>
			<th width="100px"><?php echo $lang_memberid;?></th>
			<th><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>




		<tr ng-repeat="x in mycustomer">
			<td ng-if="selectpage=='1'" class="text-center visible-sm visible-md visible-lg">{{($index+1)}}</td>
			<td ng-if="selectpage!='1'" class="text-center visible-sm visible-md visible-lg">{{($index+1)+(perpage*(selectpage-1))}}</td>
<td> <button class="btn btn-success btn-xs" ng-click="Contactmodal(x)">
<?=$lang_cuscontactlist?></button> </td>


			<td><button class="btn btn-default btn-xs" ng-click="Detail(x)">{{x.cus_name}}</button></td>
<td>{{x.customer_group_name}}</td>
<td>{{x.cus_address}} {{x.cus_address_postcode}}

<span ng-if="x.taxnumber!=''"><br /><?php echo $lang_obmt_8;?> {{x.taxnumber}} </span>
	
	</td>
			<td>{{x.cus_tel}}</td>
			<td class="visible-sm visible-md visible-lg">{{x.cus_email}}</td>
			<td class="visible-sm visible-md visible-lg">{{x.cus_birthday}}</td>


<td width="70px">

{{x.cus_add_time}}
<a ng-if="x.cus_add_time !=''" class="btn btn-default btn-xs c2mforhide" target="_blank" href="<?php echo $base_url;?>/card?code={{x.cus_add_time}}&cus_name={{x.cus_name}}"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> </a>


			</td>


			<td width="70px">
<button class="btn btn-warning btn-xs" ng-click="Editrow(x)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
<button ng-if="Showdelbut" class="btn btn-danger btn-xs" id="deletecustomer" ng-click="Delete(x.cus_id)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
			</td>

		</tr>

	</tbody>
</table>
</div>



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
<option value="500">500</option>
<option value="1000">1000</option>
<option value="10000">10000</option>
<option value="100000">100000</option>
<option value="1000000">1000000</option>
</select>

<?=$lang_page?>
<select name="" id="" class="form-control" ng-model="selectthispage"  ng-change="getmycustomer(searchtype,searchtext,selectthispage,perpage)">
	<option  ng-repeat="i in pagealladd" value="{{i.a}}">{{i.a}}</option>
</select>
</div>



</form>


<hr />
<button id="btnExport" class="btn btn-default" onclick="fnExcelReport();"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
<?=$lang_downloadexcel?> </button>





	</div>
</div>








<div class="modal fade" id="Modalexcel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_productlistfromexcel?></h4>
			</div>
			<div class="modal-body text-center">

<form enctype="multipart/form-data" id="formexcel">
	
<input type="file" accept=".csv" id="excel" name="excel" class="btn btn-default">
<br />

<center ng-if="uploadexcel=='1'">
	<b><?php echo $lang_obmt_5;?></b><br />
<img src="<?php echo $base_url;?>/pic/loading.gif">
<br />
</center>


<button class="btn btn-success" id="submitexcel" type="submit"><?=$lang_upload?></button>
</form>

<hr />
<font color="red"> GooGle Sheets
<br />
<b> .csv</b>
</font>
<br />
<img src="<?php echo $base_url;?>/pic/imcsvcus2mer.png" class="img img-responsive">
			</div>

		</div>
	</div>
</div>









<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_addcus?></h4>
			</div>
			<div class="modal-body">


<div class="row">

	<div class="col-md-12">
		<input type="text" placeholder="<?php echo $lang_memberid;?>" name=""  ng-model="cus_add_time" class="form-control" required>

	</div>


	<div class="col-md-12">
		<br />
	</div>


<div class="col-md-12">
	<input type="text" placeholder="<?=$lang_cusname?>" name="" class="form-control" ng-model="cusname" required>

</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_address?>" ng-model="cusaddress">
</textarea>
</div>



<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<input type="text" placeholder="<?php echo $lang_obmt_6;?>" name="" class="form-control" ng-model="cusaddresspostcode">

</div>




<div class="col-md-4">
	<input type="text" placeholder="<?=$lang_tel?>" onkeypress="validate(event)" ng-change="Checktel()"  name="" class="form-control" ng-model="custel">
<span ng-if="checktelstatus > '0'" style="color:red;"><?php echo $lang_obmt_7;?> </span>
</div>

<div class="col-md-4">

	<input  data-format="dd/MM/yyyy" type="text" placeholder="<?=$lang_birthday?>"  id="datetime" name="datetime" class="form-control" ng-model="cusbirthday">

</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-6">
	<input type="text" placeholder="<?php echo $lang_obmt_8;?>" name="" class="form-control" ng-model="taxnumber">

</div>



	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<input type="text" placeholder="E-mail" name="" class="form-control" ng-model="cusemail" >
</div>


<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_sex">
		<option value=""><?=$lang_selectsex?></option>
			<option ng-repeat="s in customersex" value="{{s.customer_sex_id}}">{{s.customer_sex_name}}</option>
	</select>
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_group">
		<option value=""><?=$lang_selectgroup?></option>
		<option ng-repeat="g in customergroup" value="{{g.customer_group_id}}">{{g.customer_group_name}}</option>
	</select>
</div>



<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_level">
		<option value=""><?=$lang_selectlevel?></option>
		<option ng-repeat="l in customerlevel" value="{{l.customer_level_id}}">{{l.customer_level_name}}</option>
	</select>
</div>



	<div class="col-md-12">
	<br />
</div>

<div class="col-md-6">
<center>
<?php echo $lang_obmt_9;?>
	<input type="text" style="width:70px;" placeholder="0 <?php echo $lang_date;?>" name="" class="form-control" ng-model="credit_day" >
	</center>
</div>


<div class="col-md-6">
<center>
<?php echo $lang_obmt_10;?>
	<input type="text" style="width:70px;" placeholder="<?php echo $lang_obmt_11;?>" name="" class="form-control" ng-model="credit_limit" >
	</center>
</div>


	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_remark?>" ng-model="cusremark">
</textarea>
</div>



		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button ng-if="checktelstatus == '0'" type="submit" class="btn btn-success" id="savenewcustomer" ng-click="SaveSubmit(cusname,cusaddress,custel,cusemail,cusremark)"><?=$lang_save?></button>
			</div>
		</div>



	</div>
</div>






<div class="modal fade" id="modaldetail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_cusdetail?></h4>
			</div>
			<div class="modal-body">


<div class="row">

	<div class="col-md-12">
		<input type="text" placeholder="<?php echo $lang_memberid;?>" name="" class="form-control" ng-model="cus_add_time"  disabled>

	</div>

	<div class="col-md-12">
		<br />
	</div>

<div class="col-md-12">
	<input type="text" placeholder="<?=$lang_cusname?>" name="" class="form-control" ng-model="cusname"  disabled>

</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_address?>" ng-model="cusaddress" disabled>
</textarea>
</div>



<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<input type="text" placeholder="<?php echo $lang_obmt_6;?>" name="" class="form-control" ng-model="cusaddresspostcode" disabled>

</div>

<div class="col-md-4">
	<input type="text" placeholder="<?=$lang_tel?>"  name="" class="form-control" ng-model="custel" disabled>
</div>

<div class="col-md-4">

	<input  data-format="dd/MM/yyyy" type="text" placeholder="<?=$lang_birthday?>"  id="datetime2" name="datetime2" class="form-control" ng-model="cusbirthday" disabled>

</div>


<div class="col-md-12">
	<br />
</div>

<div class="col-md-6">
	<input type="text" placeholder="<?php echo $lang_obmt_8;?>" name="" class="form-control" ng-model="taxnumber" disabled>

</div>


	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<input type="text" placeholder="E-mail" name="" class="form-control" ng-model="cusemail" disabled>
</div>


<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_sex" disabled>
		<option value=""><?=$lang_selectsex?></option>
			<option ng-repeat="s in customersex" value="{{s.customer_sex_id}}">{{s.customer_sex_name}}</option>
	</select>
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_group" disabled>
		<option value=""><?=$lang_selectgroup?></option>
		<option ng-repeat="g in customergroup" value="{{g.customer_group_id}}">{{g.customer_group_name}}</option>
	</select>
</div>



<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_level" disabled>
		<option value=""><?=$lang_selectlevel?></option>
		<option ng-repeat="l in customerlevel" value="{{l.customer_level_id}}">{{l.customer_level_name}}</option>
	</select>
</div>

	<div class="col-md-12">
	<br />
</div>

<div class="col-md-6">
<center>
<?php echo $lang_obmt_9;?>
	<input type="text" style="width:70px;" placeholder="0 <?php echo $lang_date;?>" name="" class="form-control" ng-model="credit_day" disabled>
	</center>
</div>


<div class="col-md-6">
<center>
<?php echo $lang_obmt_10;?>
	<input type="text" style="width:70px;" placeholder="<?php echo $lang_obmt_11;?>" name="" class="form-control" ng-model="credit_limit" disabled>
	</center>
</div>



	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_remark?>" ng-model="cusremark" disabled>
</textarea>
</div>



		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
			</div>
		</div>



	</div>
</div>







<div class="modal fade" id="modaledit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_cusedit?></h4>
			</div>
			<div class="modal-body">


<div class="row">
	<div class="col-md-12">
		<input type="text" placeholder="<?php echo $lang_memberid;?>" name="" class="form-control" ng-model="cus_add_time" required>

	</div>

	<div class="col-md-12">
		<br />
	</div>

<div class="col-md-12">
	<input type="text" placeholder="<?=$lang_cusname?>" name="" class="form-control" ng-model="cusname" required>

</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_address?>" ng-model="cusaddress">
</textarea>
</div>


<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<input type="text" placeholder="<?php echo $lang_obmt_6;?>" name="" class="form-control" ng-model="cusaddresspostcode">

</div>

<div class="col-md-4">
	<input type="text" placeholder="<?=$lang_tel?>" onkeypress="validate(event)" ng-change="Checktel()"  name="" class="form-control" ng-model="custel">
<span ng-if="checktelstatus > '0'" style="color:red;"><?php echo $lang_obmt_7;?> </span>

</div>

<div class="col-md-4">

	<input  data-format="dd/MM/yyyy" type="text" placeholder="<?=$lang_birthday?>"  id="datetime3" name="datetime3" class="form-control" ng-model="cusbirthday">

</div>


<div class="col-md-12">
	<br />
</div>

<div class="col-md-6">
	<input type="text" placeholder="<?php echo $lang_obmt_8;?>" name="" class="form-control" ng-model="taxnumber">

</div>



	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<input type="text" placeholder="E-mail" name="" class="form-control" ng-model="cusemail">
</div>


<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_sex">
		<option value=""><?=$lang_selectsex?></option>
			<option ng-repeat="s in customersex" value="{{s.customer_sex_id}}">{{s.customer_sex_name}}</option>
	</select>
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_group">
		<option value=""><?=$lang_selectgroup?></option>
		<option ng-repeat="g in customergroup" value="{{g.customer_group_id}}">{{g.customer_group_name}}</option>
	</select>
</div>



<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_level">
		<option value=""><?=$lang_selectlevel?></option>
		<option ng-repeat="l in customerlevel" value="{{l.customer_level_id}}">{{l.customer_level_name}}</option>
	</select>
</div>


	<div class="col-md-12">
	<br />
</div>

<div class="col-md-6">
<center>
<?php echo $lang_obmt_9;?>
	<input type="text" style="width:70px;" placeholder="0 <?php echo $lang_date;?>" name="" class="form-control" ng-model="credit_day">
	</center>
</div>



<div class="col-md-6">
<center>
<?php echo $lang_obmt_10;?>
	<input type="text" style="width:70px;" placeholder="<?php echo $lang_obmt_11;?>" name="" class="form-control" ng-model="credit_limit">
	</center>
</div>


	<div class="col-md-12">
	<br />
</div>

<div class="col-md-12">
	<textarea name="" class="form-control" placeholder="<?=$lang_remark?>" ng-model="cusremark">
</textarea>
</div>



		</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button ng-if="checktelstatus == '0'" type="submit" class="btn btn-success" id="editcustomer" ng-click="EditSubmit(cusid,cusname,cusaddress,custel,cusemail,cusremark)"><?=$lang_save?></button>
			</div>
		</div>



	</div>
</div>


<div class="modal fade" id="modalecontact">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
<button class="btn btn-primary" ng-click="Newcontactmodal(cusid)"><span class="glyphicon glyphicon-plus" aria-hidden="true"></button>
				<?=$lang_cuscontactlist?> / {{cusname}}</h4>

			</div>
			<div class="modal-body">

<div class="row">

<div class="col-md-12">
<div class="text-right"><input type="checkbox" ng-model="showdel">
<?=$lang_showdel?></div>
<table class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: #eee;font-size: 10px;">
			<th><?=$lang_detail?></th>
			<th><?=$lang_cuscontactchanel?></th>
			<th><?=$lang_cusgrade?></th>
			<th><?=$lang_cusproductservice?></th>
			<th><?=$lang_cusreasonbuy?></th>
			<th><?=$lang_cusreasonnotnuy?></th>
			<th><?=$lang_day?></th>
			<th><?=$lang_manage?></th>
		</tr>
	</thead>
	<tbody>
		<tr ng-repeat="c in contactlistone">
			<td>{{c.contact_list_detail}}</td>
			<td>{{c.contact_from_name}}</td>
			<td>{{c.contact_grade_name}}</td>
			<td>{{c.product_service_name}}</td>
			<td>{{c.customer_reasonbuy_name}}</td>
			<td>{{c.customer_reasonnotbuy_name}}</td>
			<td>{{c.addtime}}</td>
			<td width="70px"><button class="btn btn-warning btn-xs" ng-click="Contactedit(c)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button> <button class="btn btn-danger btn-xs" ng-show="showdel" ng-click="Contactdelete(c)"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
		</tr>
	</tbody>
</table>
</div>

</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>

			</div>
		</div>



	</div>
</div>







<div class="modal fade" id="modaleaddcontact">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_addnewcontact?> / {{cusname}}</h4>
			</div>
			<div class="modal-body">

<div class="row">
<div class="col-md-12">
	<textarea class="form-control" ng-model="contact_list_detail" placeholder="<?=$lang_detailcontact?>"></textarea>
</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="contact_from_id">
		<option value="">-<?=$lang_selectchanel?>-</option>
			<option ng-repeat="s in contactfrom" value="{{s.contact_from_id}}">{{s.contact_from_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="contact_grade_id">
		<option value="">-<?=$lang_selectgrade?>-</option>
			<option ng-repeat="s in contactgrade" value="{{s.contact_grade_id}}">{{s.contact_grade_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="product_service_id">
		<option value="">-<?=$lang_selectproductservice?>-</option>
			<option ng-repeat="s in productservice" value="{{s.product_service_id}}">{{s.product_service_name}}</option>
	</select>
</div>


<div class="col-md-12">
	<br />
</div>


<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_reasonbuy_id">
		<option value="">-<?=$lang_selectreasonbuy?>-</option>
			<option ng-repeat="s in customerreasonbuy" value="{{s.customer_reasonbuy_id}}">{{s.customer_reasonbuy_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_reasonnotbuy_id">
		<option value="">-<?=$lang_selectreasonnotbuy?>-</option>
			<option ng-repeat="s in customerreasonnotbuy" value="{{s.customer_reasonnotbuy_id}}">{{s.customer_reasonnotbuy_name}}</option>
	</select>
</div>

<div class="col-md-12">
	<br />
</div>

</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button type="submit" class="btn btn-success" id="editcustomer" ng-click="SaveContact()"><?=$lang_save?></button>
			</div>
		</div>



	</div>
</div>















<div class="modal fade" id="modaleditcontact">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?=$lang_editcontact?> / {{cusname}}</h4>
			</div>
			<div class="modal-body">

<div class="row">
<div class="col-md-12">
	<textarea class="form-control" ng-model="contact_list_detail" placeholder="<?=$lang_detailcontact?>"></textarea>
</div>

<div class="col-md-12">
	<br />
</div>

<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="contact_from_id">
		<option value=""><?=$lang_cuscontactchanel?></option>
			<option ng-repeat="s in contactfrom" value="{{s.contact_from_id}}">{{s.contact_from_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="contact_grade_id">
		<option value=""><?=$lang_cusgrade?></option>
			<option ng-repeat="s in contactgrade" value="{{s.contact_grade_id}}">{{s.contact_grade_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="product_service_id">
		<option value=""><?=$lang_cusproductserviceneed?></option>
			<option ng-repeat="s in productservice" value="{{s.product_service_id}}">{{s.product_service_name}}</option>
	</select>
</div>


<div class="col-md-12">
	<br />
</div>


<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_reasonbuy_id">
		<option value=""><?=$lang_cusreasonbuy?></option>
			<option ng-repeat="s in customerreasonbuy" value="{{s.customer_reasonbuy_id}}">{{s.customer_reasonbuy_name}}</option>
	</select>
</div>
<div class="col-md-4">
	<select name="" id="" class="form-control" ng-model="customer_reasonnotbuy_id">
		<option value=""><?=$lang_cusreasonnotnuy?></option>
			<option ng-repeat="s in customerreasonnotbuy" value="{{s.customer_reasonnotbuy_id}}">{{s.customer_reasonnotbuy_name}}</option>
	</select>
</div>

<div class="col-md-12">
	<br />
</div>

</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
<button type="submit" class="btn btn-success" id="editcustomer" ng-click="SaveContactedit()"><?=$lang_save?></button>
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
$scope.uploadexcel = '0';


$("#datetime").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th',  // แสดงภาษาไทย
    yearOffset:0  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});
$("#datetime2").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th',  // แสดงภาษาไทย
    yearOffset:0  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});
$("#datetime3").datetimepicker({
    timepicker:false,
        format:'d-m-Y',
    lang:'th',  // แสดงภาษาไทย
    yearOffset:0  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
    //inline:true

});

$scope.pagealladd = [];



$scope.Modalexcel = function(){
$('#Modalexcel').modal('show');
};



    $("form#formexcel").submit(function () {
	$scope.uploadexcel = '1';
var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "Mycustomer/uploadexcel",
            data:formData,
            processData: false,
   		 	contentType: false,
            success: function () {
               toastr.success('<?=$lang_success?>');
               $('#Modalexcel').modal('hide');
			   $scope.uploadexcel = '0';
               $scope.getmycustomer();
            }
        });
    });








//start ค้นหาลูกค้า
$scope.csearchtextarray = [];
$scope.csearchtextarray2 = [];
$scope.pregetlistcus = function(){
$scope.csearchtextarray.push($scope.searchtext);
setTimeout(function(){
$scope.csearchtextarray2.push($scope.searchtext);
	if($scope.csearchtextarray2[0]==$scope.csearchtextarray[$scope.csearchtextarray.length-1]){
		$scope.getmycustomer();
		}		
$scope.csearchtextarray = [];
$scope.csearchtextarray2 = [];
	}, 1000);
}
//end ค้นหาลูกค้า





$scope.Defaultdata = function(){

$http.get('Customergroup/get')
       .then(function(response){
          $scope.customergroup = response.data.list;

        });

$http.get('Customerlevel/get')
       .then(function(response){
          $scope.customerlevel = response.data.list;

        });

$http.get('Customersex/get')
       .then(function(response){
          $scope.customersex = response.data.list;

        });


};

$scope.sctm = true;
$scope.bdm = '0';
$scope.perpage = '10';
$scope.page = '1';
$scope.searchtext = '';
$scope.getmycustomer = function(searchtype,searchtext,page,perpage){
   if(!page){
   var	page = '1';
   }

 if(!perpage){
   var	perpage = '10';
   }

$scope.sctm = false;
$http.post('Mycustomer/get',{
'searchtext': $scope.searchtext,
'page': $scope.page,
'perpage': $scope.perpage,
'bdm': $scope.bdm
})
       .success(function(data){
          $scope.mycustomer = data.list;
          $scope.pageall = data.pageall;
           $scope.allmycustomer = data.all;
$scope.pagealladd = [];
           for(i=1;i<=$scope.pageall;i++){
$scope.pagealladd.push({a:i});
}

$scope.sctm = true;
$scope.selectpage = page;
$scope.selectthispage = page;

        });
$('.lodingbefor').css('display','block');

   };
$scope.getmycustomer();


$scope.Refreshsubmit = function(){
	$scope.searchtext = '';
$scope.perpage = '10';
$scope.page = '1';

$scope.getmycustomer();

};




$scope.Openaddnewcus = function(){
	$('#modal-id').modal({backdrop: "static", keyboard: false});
	$scope.cusname = '';
$scope.cusaddress ='';
$scope.custel ='';
$scope.cusemail = '';
$scope.cusremark = '';
$scope.cusbirthday = '';
$scope.customer_group = '';
$scope.customer_level = '';
$scope.customer_sex = '';
$scope.province = '';
$scope.amphur = '';
$scope.district = '';
$scope.cusaddresspostcode = '';
$scope.cus_add_time = '';
$scope.credit_day = '';
$scope.credit_limit = '';

$scope.taxnumber = '';

$scope.Defaultdata();
$scope.districtlist = [];
$scope.amphurlist = [];
$scope.checktelstatus = '0';
};






$scope.SaveSubmit = function(cusname,cusaddress,custel,cusemail,cusremark){

	if(cusname != ''){

$("#savenewcustomer").prop("disabled",true);
$http.post("Mycustomer/save",{
	'cus_add_time': $scope.cus_add_time,
	'cusname': cusname,
	'cusaddress': cusaddress,
	'custel': custel,
	'cusemail': cusemail,
	'cusbirthday': $scope.cusbirthday,
	'customer_group': $scope.customer_group,
	'customer_level': $scope.customer_level,
	'customer_sex': $scope.customer_sex,
	'province': $scope.province,
	'amphur': $scope.amphur,
	'district': $scope.district,
	'cusaddresspostcode': $scope.cusaddresspostcode,
	'cusremark': cusremark,
	'credit_day': $scope.credit_day,
	'credit_limit': $scope.credit_limit,
	'taxnumber': $scope.taxnumber
	}).success(function(data){

$("#savenewcustomer").prop("disabled",false);
toastr.success('<?=$lang_success?>');
$scope.cus_add_time = '';
$scope.cusname = '';
$scope.cusaddress ='';
$scope.custel ='';
$scope.cusemail = '';
$scope.cusremark = '';
$scope.cusbirthday = '';
$scope.customer_group = '';
$scope.customer_level = '';
$scope.customer_sex = '';
$scope.province = '';
$scope.amphur = '';
$scope.district = '';
$scope.cusaddresspostcode = '';
$scope.districtlist = [];
$scope.amphurlist = [];
$scope.credit_day = '';
$scope.credit_limit = '';
$scope.taxnumber = '';

$('#modal-id').modal('hide');
$scope.getmycustomer($scope.searchtype,$scope.searchtext,$scope.page,$scope.perpage);



        });
}else{
	toastr.warning('<?=$lang_plz?>');
}


};



$scope.checktelstatus = '0';
$scope.Checktel = function(){
$http.post("Mycustomer/Checktel",{
	'custel': $scope.custel
	}).success(function(data){
$scope.checktelstatus = data;
console.log(data);
        });


};






$scope.Delete = function(cusid){


$http.post("Mycustomer/delete",{
	'cus_id': cusid
	}).success(function(data){

toastr.success('<?=$lang_success?>');
$scope.getmycustomer($scope.searchtype,$scope.searchtext,$scope.page,$scope.perpage);



        });


};


$scope.Detail = function(x){
$('#modaldetail').modal('show');

$scope.Defaultdata();


$scope.cusid = x.cus_id;
$scope.cus_add_time = x.cus_add_time;
$scope.cusname = x.cus_name;
$scope.cusaddress = x.cus_address;
$scope.custel = x.cus_tel;
$scope.cusemail = x.cus_email;

$scope.cusbirthday = x.cus_birthday;
$scope.customer_group = x.customer_group_id;
$scope.customer_level = x.customer_level_id;
$scope.customer_sex = x.customer_sex_id;
$scope.province = x.province_id;
$scope.amphur = x.amphur_id;
$scope.district = x.district_id;
$scope.cusaddresspostcode = x.cus_address_postcode;

$scope.cusremark = x.cus_remark;
$scope.credit_day = x.credit_day;
$scope.credit_limit = x.credit_limit;
$scope.taxnumber = x.taxnumber;

};




$scope.Editrow = function(x){
$('#modaledit').modal('show');

$scope.Defaultdata();

$scope.checktelstatus = '0';

$scope.cusid = x.cus_id;
$scope.cus_add_time = x.cus_add_time;
$scope.cusname = x.cus_name;
$scope.cusaddress = x.cus_address;
$scope.custel = x.cus_tel;
$scope.cusemail = x.cus_email;

$scope.cusbirthday = x.cus_birthday;
$scope.customer_group = x.customer_group_id;
$scope.customer_level = x.customer_level_id;
$scope.customer_sex = x.customer_sex_id;
$scope.province = x.province_id;
$scope.amphur = x.amphur_id;
$scope.district = x.district_id;
$scope.cusaddresspostcode = x.cus_address_postcode;

$scope.cusremark = x.cus_remark;
$scope.credit_day = x.credit_day;
$scope.credit_limit = x.credit_limit;
$scope.taxnumber = x.taxnumber;

};



$scope.EditSubmit = function(cusid,cusname,cusaddress,custel,cusemail,cusremark){


$http.post("Mycustomer/update",{
	'cus_id': cusid,
	'cus_add_time': $scope.cus_add_time,
	'cus_name': cusname,
	'cus_address': cusaddress,
	'cus_tel': custel,
	'cus_email': cusemail,
	'cusbirthday': $scope.cusbirthday,
	'customer_group': $scope.customer_group,
	'customer_level': $scope.customer_level,
	'customer_sex': $scope.customer_sex,
	'province': $scope.province,
	'amphur': $scope.amphur,
	'district': $scope.district,
	'cusaddresspostcode': $scope.cusaddresspostcode,
	'cus_remark': cusremark,
	'credit_day': $scope.credit_day,
	'credit_limit': $scope.credit_limit,
	'taxnumber': $scope.taxnumber
	}).success(function(data){

toastr.success('<?=$lang_success?>');
$('#modaledit').modal('hide');
$scope.getmycustomer($scope.searchtype,$scope.searchtext,$scope.page,$scope.perpage);



        });


};




$scope.Getforcontact = function(){

$http.get('contactfrom/get')
       .then(function(response){
          $scope.contactfrom = response.data.list;

        });

$http.get('contactgrade/get')
       .then(function(response){
          $scope.contactgrade = response.data.list;

        });

$http.get('Productservice/get')
       .then(function(response){
          $scope.productservice = response.data.list;

        });


$http.get('Customerreasonbuy/get')
       .then(function(response){
          $scope.customerreasonbuy = response.data.list;

        });

$http.get('Customerreasonnotbuy/get')
       .then(function(response){
          $scope.customerreasonnotbuy = response.data.list;

        });
};


$scope.Contactlistonefunc = function(cus_id){
$http.post("Contactlist/getone",{
	'cus_id': cus_id
	}).success(function(data){
$scope.contactlistone = data.list;
        });
};

$scope.Contactmodal = function(x){
$('#modalecontact').modal('show');
$scope.cusname = x.cus_name;
$scope.cusid = x.cus_id;

$scope.Contactlistonefunc(x.cus_id);

};

$scope.Newcontactmodal = function(cusid){
$('#modaleaddcontact').modal({backdrop: "static", keyboard: false});

$scope.Getforcontact();
$scope.contact_list_id = '';
$scope.contact_list_detail = '';
$scope.contact_grade_id = '';
$scope.contact_from_id = '';
$scope.customer_reasonbuy_id = '';
$scope.customer_reasonnotbuy_id = '';
$scope.product_service_id = '';
$scope.cusid = cusid;

};

$scope.SaveContact = function(){
$http.post("Contactlist/add",{
	'contact_list_detail': $scope.contact_list_detail,
	'cus_id': $scope.cusid,
	'contact_from_id': $scope.contact_from_id,
	'contact_grade_id': $scope.contact_grade_id,
	'product_service_id': $scope.product_service_id,
	'customer_reasonbuy_id': $scope.customer_reasonbuy_id,
	'customer_reasonnotbuy_id': $scope.customer_reasonnotbuy_id

	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.Contactlistonefunc($scope.cusid);
$('#modaleaddcontact').modal('hide');


        });
};


$scope.Contactedit = function(c){
	$('#modaleditcontact').modal('show');
	$scope.Getforcontact();
	$scope.contact_list_id = c.contact_list_id;
$scope.contact_list_detail = c.contact_list_detail;
$scope.contact_grade_id = c.contact_grade_id;
$scope.contact_from_id = c.contact_from_id;
$scope.customer_reasonbuy_id = c.customer_reasonbuy_id;
$scope.customer_reasonnotbuy_id = c.customer_reasonnotbuy_id;
$scope.product_service_id = c.product_service_id;
$scope.cusid = c.cus_id;
};



$scope.SaveContactedit = function(){

$http.post("Contactlist/update",{
	'contact_list_id': $scope.contact_list_id,
	'contact_list_detail': $scope.contact_list_detail,
	'cus_id': $scope.cusid,
	'contact_from_id': $scope.contact_from_id,
	'contact_grade_id': $scope.contact_grade_id,
	'product_service_id': $scope.product_service_id,
	'customer_reasonbuy_id': $scope.customer_reasonbuy_id,
	'customer_reasonnotbuy_id': $scope.customer_reasonnotbuy_id

	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.Contactlistonefunc($scope.cusid);
$('#modaleditcontact').modal('hide');


        });
};


$scope.Contactdelete = function(c){

$http.post("Contactlist/delete",{
	'contact_list_id': c.contact_list_id,
	'cus_id': c.cus_id,
	}).success(function(data){
toastr.success('<?=$lang_success?>');
$scope.Contactlistonefunc(c.cus_id);

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
  var regex = /[0-9]/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}


	</script>
