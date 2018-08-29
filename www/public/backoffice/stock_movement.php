<?
include("rpdialog.php"); 
if(!empty($_GET['s_list'])){$s_list = $_GET['s_list'];}else {if(!empty($_POST['s_list'])){$s_list = $_POST['s_list'];}else{$s_list='50';}}

$inv = $_POST['inv']==""?$_GET['inv']:$_POST['inv'];
$pcode = $_POST['pcode']==""?$_GET['pcode']:$_POST['pcode'];
rpdialog_sale_xx($_GET['sub'],$fdate,$tdate,$sale,$s_list);

require("connectmysql.php");
if($fdate != ''){
 	if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
	
	$sql  = "SELECT r.inv_code,r.pcode,r.sadate,r.in_qty,r.out_qty,r.qty,IFNULL((SELECT rr.qty FROM ali_product_invent_log rr WHERE rr.sadate = DATE_ADD(r.sadate, INTERVAL - 1 DAY) and rr.inv_code = r.inv_code and rr.pcode = r.pcode LIMIT 0,1 ";
	$sql .= "),0) as qty_before, p.pdesc as pdesc FROM ali_product_invent_log r ";
	$sql .= "LEFT JOIN ali_product p ON (r.pcode = p.pcode) ";
	$sql .="WHERE r.sadate >= '".$fdate."' and r.sadate <= '".$tdate."' ";
	if(!empty($inv))$sql .= "and r.inv_code = '".$inv."' ";
	if(!empty($pcode))$sql .= "and r.pcode = '".$pcode."' ";
	//echo $sql; 

	$rec = new repGenerator_b();
	$rec->setQuery($sql);
	$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
	$rec->setOrder(($_GET['ord']==""?"r.sadate,r.inv_code":$_GET['ord']));
	if($_GET['excel']==1){$rec->setLimitPage("ALL");}
	else{$rec->setLimitPage("5000");}
	$rec->setSize("99%","");
	$rec->setAlign("center");
	$rec->setPageLinkAlign("right");
	$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report&inv=$inv&pcode=$pcode");
	$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab);
	if(isset($page))
		$rec->setCurPage($page);
	//$rec->setShowIndex(true);
	$rec->setShowField("sadate,inv_code,pcode,pdesc,qty_before,in_qty,out_qty,qty,remark");
	$rec->setFieldDesc("วันที่,รหัสสาขา,รหัสสินค้า,ชื่อสินค้า,ยอดยกมา,รับเข้า,เบิกออก,คงเหลือ,หมายเหตุ");
	$rec->setFieldAlign("center,center,center,left,right,right,right,right,left");
	$rec->setFieldSpace("8%,8%,8%,20%,10%,10%,10%,10%,16%");//10
//	$rec->setSum(true,false,",,,,,,,true,true,true");
//	$rec->setFieldFloatFormat(",,,,,,,2,2,2");
//	$rec->setFieldLink(",,,,,,,index.php?sessiontab=4&sub=4&strtdate=$strtdate&fmcode=$fmcode&strfdate=,,");
	if($_GET['excel']==1){
		$rec->exportXls("ExportXls","stock".date("Ymd").".xls","SH_QUERY");
		$str = "<fieldset><a href='".$rec->download("ExportXls","stock".date("Ymd").".xls")."' >";
		$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
		$rec->getParam();
		$rec->setSpace($str);
	}
			$rec->setSpecial("","","","","NUMROW","ลำดับ");

	$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
	$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";

	

	if(isset($_POST['skey']))
		$rec->setCause($_POST['skey'],$_POST['scause']);
	else if(isset($_GET['skey']))
		$rec->setCause($_GET['skey'],$_GET['scause']);
	//$rec->setSearch("a.mcode,lb.cshort");
	//$rec->setSearchDesc("รหัส,LB");
	$rec->setSpace($str);
	$str2 = "<fieldset ><a href='".$rec->getParam()."&print_all=true' target='_blank'>";
	$str2 .= "<img border='0' src='./images/Amber-Printer.gif'>พิมพ์ทั้งหมด</a></fieldset>";
	//$rec->setSpace($str2);
	$rec->showRec(1,'SH_QUERY');
	mysql_close($link);
}
?>