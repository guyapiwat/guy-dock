<?
include("rpdialog.php");
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];
$type_report = $_POST['type_report']==""?$_GET['type_report']:$_POST['type_report'];
$bonus = $_POST['bonus']==""?$_GET['bonus']:$_POST['bonus'];


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
	$sql="select min(rcode) as fdate1,max(rcode) as tdate1 from ".$dbprefix."bround a where a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ";
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
$wwhere = ($fdate[0]=="" ? " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' " : " a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ");
$wwhere1 = " a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";

if($fdate != ''){
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT DATE_FORMAT(a.fdate, '%Y-%m-%d') as fdate,a.rcode, a.mcode,m.upa_code as smcode,m.name_t,m.acc_no,m.bankcode,b.bankname,a.total,a.tax,a.total-a.tax as bonus,a.pos_cur ";
		$sql .= " FROM ".$dbprefix."mmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";
		 $sql .= " WHERE $wwhere ";
       if($fmcode != '' )$sql .= " and a.mcode = ".$fmcode."";
		if($_POST['bonus'] != '' )$sql .= " and a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";


		//echo $sql;
		//exit;
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=17&fdate=$fdate&tdate=$tdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("fdate,mcode,name_t,pos_cur,total");
		$rec->setFieldDesc("วันที่,รหัสมาชิก,ชื่อ,ตำแหน่ง,โบนัสยูนิเลเวล");
		$rec->setFieldAlign("center,center,left,center,right,right,right");
		//$rec->setFieldSpace("10%,10%,45%,5%,10%,10%,10%");//10
		$rec->setSum(true,false,",,,,true");
		$rec->setFieldFloatFormat(",,,,2");
		$rec->setFieldLink("");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","mmbonus".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","mmbonus".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("a.mcode");
		$rec->setSearchDesc("รหัส");
		$rec->setFieldLink(",,,,index.php?sessiontab=4&sub=14&strfdate=,");
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
 
 ?>