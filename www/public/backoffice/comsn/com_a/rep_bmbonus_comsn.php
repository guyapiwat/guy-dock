<?
include("rpdialog.php");
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$type_report = $_POST['type_report']==""?$_GET['type_report']:$_POST['type_report'];
$bonus = $_POST['bonus']==""?$_GET['bonus']:$_POST['bonus'];
$strfdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$strtdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
set_time_limit (0);
ini_set("memory_limit","3000M");

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
//$wwhere = ($fdate[0]=="" ? " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' " : " a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ");
if(!empty($fdate) and !empty($tdate))$wwhere = " a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ";
else  $wwhere = ' 1=1 ';
$wwhere1 = " a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";

if($fdate != ''){
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT a.name_t,"; 
		$sql .= " a.cycle_b,a.mpos,a.fdate,a.tdate,a.rcode,a.mcode,a.ro_l,a.ro_c,a.ro_r,a.total_pv_l,a.total_pv_r,a.pcrry_l,a.ro_l+a.pcrry_l as pcrry_ll,a.balance,
		a.ro_c+a.pcrry_c as pcrry_cc,a.point as point,a.pair_stop as pair_stop,
		a.pcrry_c,a.carry_l,a.carry_c,a.carry_r,a.total as total,a.tax as tax,a.totalamt as totalamt,a.quota/1000 as quota ,a.adjust,a.mpos as pos_cur,a.totalamt ";
		$sql .= ",CASE total WHEN '0' THEN '0' ELSE a.total_pv_ll END AS total_pv_lll ";
		$sql .= "FROM ".$dbprefix."bmbonus a ";
		

		$sql .= " WHERE $wwhere ";
		if($fmcode != '' )$sql .= " and a.mcode = '".$fmcode."' ";
		if($ftrcode != '')$sql .= " and a.rcode = '".$ftrcode."' "; 
		if($bonus != '' )$sql .= " and a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
		//echo $sql;
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"a.mcode,rcode":$_GET['ord']));
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
		$rec->setShowField("fdate,mcode,name_t,mpos,pcrry_l,pcrry_c,ro_l,ro_c,pcrry_ll,pcrry_cc,balance,carry_l,carry_c,total");
		$rec->setFieldDesc("วันที่,รหัส,ชื่อ,ตำแหน่ง,ซ้ายเก่า,ขวาเก่า,เข้าซ้าย,เข้าขวา,รวมซ้าย,รวมขวา,Balance,เหลือซ้าย,เหลือขวา,โบนัส");
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
}
?>
