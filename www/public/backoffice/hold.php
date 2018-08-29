<?
include("rpdialog.php");
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];

if(!empty($_GET['s_list'])){$s_list = $_GET['s_list'];}else {if(!empty($_POST['s_list'])){$s_list = $_POST['s_list'];}else{$s_list='500';}}
if(!empty($_GET['bills'])){$bills = $_GET['bills'];}else {if(!empty($_POST['bills'])){$bills = $_POST['bills'];}else{$bills='';}}


$where_bills = findBills("hono","ali_holdhead",$bills);
//echo $where_bills;





rpdialog_sale_hold_list($_GET['sub'],$fdate,$tdate,$sale,$s_list,$fmcode);
?>
<script language="javascript" type="text/javascript">
	function sale_print(id){
		var wlink = '../invoice/hprint_sale_backoffice.php?bid='+id;
		window.open(wlink);
	}
	function sale_cancel(id){
		if(confirm("ต้องการยกเลิกบิลนี้")){
			window.location='index.php?sessiontab=3&sub=10&state=3&bid='+id;
		}
	}
</script>
<?
if(!empty($_GET["sano"]))$sano = $_GET["sano"];
require("connectmysql.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT ".$dbprefix."holdhead.cancel,".$dbprefix."holdhead.id,".$dbprefix."holdhead.inv_code,".$dbprefix."holdhead.hono,".$dbprefix."holdhead.sano,DATE_FORMAT(".$dbprefix."holdhead.sadate, '%Y-%m-%d') as sadate,".$dbprefix."holdhead.tot_pv,".$dbprefix."holdhead.total,".$dbprefix."holdhead.name_t,".$dbprefix."holdhead.mcode AS smcode,".$dbprefix."holdhead.uid,".$dbprefix."holdhead.sano,".$dbprefix."holdhead.sp_code,".$dbprefix."holdhead.sp_pos,".$dbprefix."holdhead.remark  ";
$sql .= $sqlWhere_satypeh1;
$sql .= " FROM ".$dbprefix."holdhead ";
$sql .= " WHERE 1=1 ";
//$wherecause = " WHERE ";
if(!empty($sano)){
	$sql .= " where hono = '$sano' ";
}

if($sale!=''){
	if($sale == 'A')$sql .= " and ".$dbprefix."holdhead.cancel = '0' ";
	else $sql .= " and ".$dbprefix."holdhead.cancel = '$sale' ";
}
if($sa_type!='')$sql .= " and ".$dbprefix."holdhead.sa_type = '$sa_type' ";

if(!empty($fdate)){
$sql .= " and ".$dbprefix."holdhead.sadate >= '$fdate'  and ".$dbprefix."holdhead.sadate <= '$tdate'  ";
}

if(!empty($fmcode)){
$sql .= " and ".$dbprefix."holdhead.uid = '$fmcode' ";
}
if(!empty($where_bills))$sql .= " and ".$where_bills." ";
//echo $sql;
if($_GET['print_all']==true){
	echo '<script type="text/javascript">
			function printDiv(divName) {
				 var printContents = document.getElementById(divName).innerHTML;
				 var originalContents = document.body.innerHTML;
				 document.body.innerHTML = printContents;
				 window.print();
			}
			 
			</script>
		';
	echo "<div id='divprint'>";
	
	include("hold_print_all.php");
	echo "</div>";
	 echo "<script type='application/javascript'>window.onload=function(){printDiv('divprint');}</script>";
	exit;
} 

 
	$sql11 = $sql;
	$result11 = mysql_query($sql11);
	
	for($i=0;$i<mysql_num_rows($result11);$i++){
		$data = mysql_fetch_object($result11);
		$id .= $data->id.',';		   
	}	
 	if($_GET['state']==1){
		include("hold_del.php");
	}else if($_GET['state']==2){
		//echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=9'</script>";	
		include("hold_editadd.php");
	}else if($_GET['state']==3){
		include("hold_cancel.php");
	}else{
 		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		if($_GET["excel"]==1){		
		$rec->setLimitPage('ALL');
		}else{
		$rec->setLimitPage($s_list);
		}
	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&sale=$sale&s_list=$s_list&fmcode=$fmcode&sa_type=$sa_type&bills=$bills");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("hono,sadate,preserve,smcode,name_t,tot_pv,total,uid,remark");
		$rec->setFieldFloatFormat(",,,,,2,2");
		$rec->setFieldDesc("เลขบิล,วันที่ซื้อ,ประเภทบิล
		,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,ผู้บันทึก,หมายเหตุ");
		$rec->setFieldAlign("center,center,center,center,left,right,right,center,lefts,left,left");
		//$rec->setFieldSpace("5%,5%,8%,20%,7%,7%,7%,7%,10%,10%,20%");
		//$rec->setFieldLink(",,index.php?sessiontab=1&sub=4&cmc=,");
		$rec->setSearch("hono,".$dbprefix."holdhead.mcode,".$dbprefix."holdhead.name_t,".$dbprefix."holdhead.sadate,".$dbprefix."holdhead.tot_pv,".$dbprefix."holdhead.total,".$dbprefix."holdhead.uid");
		$rec->setSearchDesc("เลขบิล,รหัสผู้ถูกแจง,ชื่อผู้ถูกแจง,วันที่ซื้อ,จำนวนรวม  PV,จำนวนเงินรวม,ผู้บันทึก");
		$rec->setSum(true,false,",,,,,true,true");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","hono","IMAGE","พิมพ์");
		//$rec->setSpecial("./images/cancel.gif","","sale_cancel","id","IMAGE","ยกเลิก");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=3&sub=10");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=10&state=1","post","delfield");
		}*/
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","hold".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","hold".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);

		//$str1 = "<fieldset><a href='invoice_pdf_hold.php?hid=$id' //target='_self'>";
		//$str1 .= "<img border='0' src='./images/excel.gif'>สร้าง //PDF</a></fieldset>";
		//$rec->setSpace($str1);
		
		$str2 = "<fieldset ><a href='http:../invoice/hprint_sale_backoffice.php?bid=$bills' target='_blank'>";
		$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
		$rec->setSpace($str2);
	 
//		if($acc->isAccess(2))
		//	$rec->setEdit("index.php","bid,id","sano,id","sessiontab=3&sub=10&state=2");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}


?>