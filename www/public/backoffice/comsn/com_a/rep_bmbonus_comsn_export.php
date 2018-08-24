				 <?
include("rpdialog.php");
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$type_report = $_POST['type_report']==""?$_GET['type_report']:$_POST['type_report'];
$bonus = $_POST['bonus']==""?$_GET['bonus']:$_POST['bonus'];
$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];

if(empty($fdate))$fdate = $strfdate;
if(empty($tdate))$tdate = $strtdate;

if (strpos($bonus,"-")===false){
		$arr_bonus[0]=$bonus;
		$arr_bonus[1]=$bonus;
}else{
	$arr_bonus = explode('-',$bonus);
}

if($arr_bonus[0] > $arr_bonus[1]){ 
  echo "<center><FONT COLOR=#ff0000>กรุณากรอกช่วงร่ายได้ให้ถูก เช่น 0-500</FONT></center>";
}

if($fdate!=""){
	$sql="select min(rcode) as fdate1,max(rcode) as tdate1 from ".$dbprefix."around a where a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$ftrc2[0]=$row["fdate1"];
		$ftrc2[1]=$row["tdate1"];	
	}
}

$ftrcode = $_POST['ftrcode']==""?$_GET['ftrcode']:$_POST['ftrcode'];
$ftrcode2 = $_POST['ftrcode2']==""?$_GET['ftrcode2']:$_POST['ftrcode2'];
$vip = $_POST['vip']==""?$_GET['vip']:$_POST['vip'];
if (strpos($ftrcode,"-")===false){
		//รอบเริ่มต้น == รอบสิ้นสุด
		$ftrc[0]=$ftrcode;
		$ftrc[1]=$ftrcode;
}else{
	$ftrc = explode('-',$ftrcode);
}

rpdialog_alls($_GET['sub'],$fdate,$tdate,$fmcode);
require("connectmysql.php");

		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT m.mcode,m.name_t,sum(b.total) as total FROM `ali_bmbonus` as b left join ali_member as m on (m.mcode=b.mcode) WHERE 
b.fdate >= '2016-12-01' and b.tdate <= '2017-11-07' and total != 0 group by b.mcode HAVING sum(b.total) >= 130000 ";
		echo $sql;
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		//$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		//$rec->setOrder(($_GET['ord']==""?"a.mcode,rcode":$_GET['ord']));
		//$rec->setLimitPage('5');
		if($_GET['excel']==1){$rec->setLimitPage("ALL");}
		else{$rec->setLimitPage("1000");}
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("mcode,name_t,total");
		$rec->setFieldDesc("รหัส,ชื่อ,โบนัส");
		$rec->setFieldAlign("center,center,left,center,right,right,right,right,right,right,right,right,right,right,right");
	//	$rec->setFieldSpace("8%,6%,24%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%");//10
		$rec->setSum(true,false,",,,,true,true,true,true,true,true,true,true,true,true");
		$rec->setFieldFloatFormat(",,,,0,0,0,0,0,0,0,0,0,2");
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		//$rec->setSearch("a.mcode,lb.cshort");
		//$rec->setSearchDesc("รหัส,LB");
		//$rec->setFieldLink("");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","WS_Bonus".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","WS_Bonus".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		//$rec->setSpecial("","","","","NUMROW","ลำดับ");
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setFieldLink(",,,,,,index.php?sessiontab=4&sub=5&lr=1&strtdate=$strtdate&strfdate=,index.php?sessiontab=4&sub=5&lr=2&strtdate=$strtdate&strfdate=,,,,,,,,,,,,");
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

?>
