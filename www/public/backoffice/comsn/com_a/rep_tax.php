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
	$sql="select min(rcode) as fdate1,max(rcode) as tdate1 from ".$dbprefix."cround a where a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ";
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

rpdialog_alls($_GET['sub'],$fdate,$tdate);
require("connectmysql.php");
$wwhere = ($fdate[0]=="" ? " c.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' " : " c.paydate >= '".$fdate."' and c.paydate <= '".$tdate."' ");
$wwhereee = ($fdate[0]=="" ? " c1.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' " : " c1.paydate >= '".$fdate."' and c1.paydate <= '".$tdate."' ");

if($fmcode != '' )$wwhere .= " and m.mcode = ".$fmcode."";
if($_POST['bonus'] != '' )$wwhere .= " and c.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
if($type_report == 1 )$wwhere .= " ";
if($type_report == 2 )$wwhere .= " and m.mtype2 = '1' ";
if($type_report == 3 )$wwhere .= " and m.bankcode = '52'";
if($type_report == 4 )$wwhere .= " and m.bankcode != '52'";
if($type_report == 5 )$wwhere .= " and m.bankcode != '52' and m.mtype2 != '1' ";


if($fmcode != '' )$wwhereee .= " and m.mcode = ".$fmcode."";
if($_POST['bonus'] != '' )$wwhereee .= " and c1.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
if($type_report == 1 )$wwhereee .= " ";
if($type_report == 2 )$wwhereee .= " and m.mtype2 = '1' ";
if($type_report == 3 )$wwhereee .= " and m.bankcode = '52'";
if($type_report == 4 )$wwhereee .= " and m.bankcode != '52'";
if($type_report == 5 )$wwhereee .= " and m.bankcode != '52' and m.mtype2 != '1' ";


$wwhere1 = " a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";

if($fdate != ''){
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$sql = "SELECT m.mcode,m.name_t,
		(SELECT ifnull(sum(tot_tax),0) from ".$dbprefix."cmbonus c where c.mcode=m.mcode and ".$wwhere." )+ 
		(SELECT ifnull(sum(tot_tax),0) from ".$dbprefix."cmbonus1 c1 where c1.mcode=m.mcode and ".$wwhereee."  ) as tax
		from ".$dbprefix."member m 

		where (SELECT ifnull(sum(tot_tax),0) from ".$dbprefix."cmbonus c where c.mcode=m.mcode and ".$wwhere." and c.total>0   )+ 
		(SELECT ifnull(sum(tot_tax),0) from ".$dbprefix."cmbonus1 c1 where c1.mcode=m.mcode and ".$wwhereee." and c1.total>0   )>0 ";

		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"m.mcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
			if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("mcode,name_t,tax");
		$rec->setFieldDesc("รหัส,ชื่อ,ภาษี");
		$rec->setFieldAlign("center,left,right");
		$rec->setFieldSpace("15%,70%,15%");//10
		$rec->setSum(true,false,",,true,true,true,true,true,true,true");
		$rec->setFieldFloatFormat(",,2,2,2,2,2,2,2");
		/*if($acc->isAccess(4)){
			$rec->setDel("index.php","id","id","sessiontab=4&sub=57");
			$rec->setFromDelAttr("maindel","./index.php?sessiontab=4&sub=57&state=1&ftrcode=$ftrcode&fmcode=$fmcode","post","delfield");
		}*/
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		//$rec->setSearch("m.mcode");
		//$rec->setSearchDesc("รหัส");
		$rec->setFieldLink("");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","taxfile".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","taxfile".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
 
?>