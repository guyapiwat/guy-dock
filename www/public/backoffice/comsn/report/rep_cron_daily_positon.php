<?
include("rpdialog.php");
require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

$sql = "SELECT * ";
$sql .= " FROM ".$dbprefix."report_cron ";
$sql .= " WHERE 1=1 ";

$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
$rec->setOrder(($_GET['ord']==""?"start_cron_cal":$_GET['ord']));
if($_GET['excel']==1){$rec->setLimitPage("ALL");}
else{$rec->setLimitPage("1000");}
$rec->setSize("99%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");
$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]);
$rec->setBackLink($PHP_SELF,"sessiontab=4");
if(isset($page))
	$rec->setCurPage($page);
//$rec->setShowIndex(true);
$rec->setShowField("start_cron_cal,finish_cron_cal");
$rec->setFieldDesc("วัน-เวลาที่เริ่ม,วัน-เวลาที่สิ้นสุด");
$rec->setFieldAlign("center,center");
//$rec->setFieldSpace("5%,15%,15%,40%,10%,20%");//10
$rec->setSum(true,false,",,");
$rec->setFieldFloatFormat(",,");
if($_GET['excel']==1){
	$rec->exportXls("ExportXls","cron_daily_positon".date("Ymd").".xls","SH_QUERY");
	$str = "<fieldset><a href='".$rec->download("ExportXls","cron_daily_positon".date("Ymd").".xls")."' >";
	$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
	$rec->getParam();
	$rec->setSpace($str);
}
//		$rec->setSpecial("","","","","NUMROW","ลำดับ");

$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
if(isset($_POST['skey']))
	$rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))
	$rec->setCause($_GET['skey'],$_GET['scause']);
$rec->setSpace($str);
$rec->showRec(1,'SH_QUERY');
mysql_close($link);
?> 

