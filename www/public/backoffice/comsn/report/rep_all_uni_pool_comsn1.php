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

rpdialog_alls($_GET['sub'],$fdate,$tdate);
if($fdate != ''){
		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		$whereclass .= " and fdate between '$fdate' and '$tdate' ";
		if($fmcode != '' )$whereclass .= " and m.mcode = ".$fmcode."";
		if($_POST['bonus'] != '' )$whereclass .= " and c.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
		if($type_report == 1 )$whereclass .= " ";
		if($type_report == 2 )$whereclass .= " and m.mtype2 = '1' ";
		if($type_report == 3 )$whereclass .= " and m.bankcode = '52'";
		if($type_report == 4 )$whereclass .= " and m.bankcode != '52'";
		if($type_report == 5 )$whereclass .= " and m.bankcode != '52' and m.mtype2 != '1' ";


		$sql = "SELECT m.mcode,m.name_t,m.mobile,bk.bankcode,bk.bankname,m.branch,m.acc_type,m.acc_no,m.acc_name,
		(SELECT ifnull(sum(total),0) from ".$dbprefix."ambonus a where a.mcode=m.mcode ".$whereclass." ) as total_fast, 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass." ) as total_team,
		(SELECT ifnull(sum(total),0) from ".$dbprefix."dmbonus d where d.mcode=m.mcode  ".$whereclass." ) as total_matching,
		(SELECT ifnull(sum(total),0) from ".$dbprefix."embonus s where s.mcode=m.mcode  ".$whereclass." ) as total_pool,
		(SELECT ifnull(sum(total),0) from ".$dbprefix."fmbonus o where o.mcode=m.mcode  ".$whereclass." ) as total_stockiest,
		(SELECT ifnull(sum(total),0) from ".$dbprefix."ambonus a where a.mcode=m.mcode  ".$whereclass." )+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass." ) + 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."dmbonus d where d.mcode=m.mcode  ".$whereclass." ) + 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."smbonus s where s.mcode=m.mcode  ".$whereclass." ) + 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."ombonus o where o.mcode=m.mcode  ".$whereclass." ) as total

		from ".$dbprefix."member m 
		LEFT JOIN ".$dbprefix."bank bk ON m.bankcode=bk.bankcode 
		where (SELECT ifnull(sum(total),0) from ".$dbprefix."ambonus a where a.mcode=m.mcode  ".$whereclass." )+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass." )+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."dmbonus d where d.mcode=m.mcode  ".$whereclass." )+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."smbonus s where s.mcode=m.mcode  ".$whereclass." )+ 
		(SELECT ifnull(sum(total),0) from ".$dbprefix."ombonus o where o.mcode=m.mcode  ".$whereclass." )>0";

		
		//echo $sql;
	//	exit;
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?" mcode ":$_GET['ord']));
		$rec->setLimitPage("ALL");
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("mcode,name_t,bankname,branch,acc_type,acc_no,acc_name,total_fast,total_team,total_matching,total_pool,total_stockiest,total");
		$rec->setFieldFloatFormat(",,,,,,,2,2,2,2,2,2,2,2,2,2"); 
		$rec->setFieldDesc("รหัส,ชื่อ,ธนาคาร,สาขา,ประเภท,เลขที่บัญชี,ชื่อบัญชี,ค่าแนะนำ,จับคู่,แมชชิ่ง,กองทุน,stockiest,รายได้");
		$rec->setFieldAlign("center,left,left,left,center,left,left,right,right,right,right,right,right,right,right,right,right,right");
		//$rec->setFieldSpace("5%,12%,9%,11%,6%,7%,12%,7%,6%,6%,6%,6%,6%,6%");
		$rec->setSum(true,false,",,,,,,,true,true,true,true,true,true,true,true");
		$rec->setFieldLink(",,,,,,,index.php?sessiontab=4&sub=8&fdate=$fdate&tdate=$tdate,index.php?sessiontab=4&sub=9&fdate=$fdate&tdate=$tdate");
	 


		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","sale_bill".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","sale_bill".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		//$rec->setSpecial("./images/search.gif","","view","mcode","IMAGE","");
		$str = "<fieldset ><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
	}
 ?>