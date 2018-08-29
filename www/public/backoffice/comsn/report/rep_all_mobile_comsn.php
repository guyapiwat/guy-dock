<?
	if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
	if(isset($_POST["tdate"]))
		$tdate = $_POST["tdate"];
	else if(isset($_GET["tdate"]))
		$tdate = $_GET["tdate"];
		
	if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
	}
?>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<br />
<table style="margin-left:20;" width="350" border="0"><tr><td align="center"><fieldset>
<form style="margin-bottom:0;" action="index.php?sessiontab=4&sub=104" method="post">
	<input size="15" type="text" name="fdate" value="<?=$fdate?>" />
	<a href="javascript:NewCal('fdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a>  ถึง
	<input size="15" type="text" name="tdate" value="<?=$tdate?>" />
	<a href="javascript:NewCal('tdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a>
    <input type="submit" value="ค้น" />
</form>
</fieldset></td></tr></table>

<?
require("connectmysql.php");
//require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

if($fdate!=""&&$tdate!=""){
	$whereclass=" and fdate>= '$fdate' AND  fdate<='$tdate' ";
}else{
	$whereclass="";
}
$sql = "SELECT a.rcode, a.mcode,m.name_t,m.acc_name,m.acc_no,m.acc_type,m.branch,m.bankcode,b.bankname,a.total,a.tax,a.bonus,(a.total-30) as totalamt,30 as banktransfer ";
$sql .= " FROM ".$dbprefix."fmbonus a ";
$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";

if($fdate!=""){
	$sql .= "WHERE a.fdate BETWEEN '$fdate' AND '$tdate' ";
}
//echo $sql;

		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		$rec->setLimitPage($_GET['lp']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=104&fdate=$fdate&tdate=$tdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("mcode,name_t,bankcode,bankname,branch,acc_type,acc_no,acc_name,total,banktransfer,totalamt");
		$rec->setFieldFloatFormat(",,,,,,,,2,2,2");
		$rec->setFieldDesc("รหัส,ชื่อ,รหัสธนาคาร,ธนาคาร,สาขา,ประเภท,เลขที่บัญชี,ชื่อบัญชี,รายได้โมบาย,ค่าโอน,สุทธิ");
		$rec->setFieldAlign("center,left,center,left,left,left,left,left,right,right,right");
		$rec->setFieldSpace("7%,12%,7%,12%,12%,12%,7%,10%,7%,7%,7%");
		$rec->setSum(true,false,",,,,,,,,true,true,true");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","reportmatching".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","reportmatching".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	//}

?>
