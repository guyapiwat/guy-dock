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
if($ftrcode!=""){
	$sql="select fdate,tdate from ".$dbprefix."around a where a.rcode ='$ftrcode' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$fdate=$fdate11=$row["fdate"];
		$tdate=$tdate11=$row["tdate"];	
	}
}
rpdialog_alls($_GET['sub'],$fdate,$tdate,$fmcode);


require("connectmysql.php");
 if($fdate){
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";} 
		$sql = "SELECT a.mcode,a.mcode as smcode,a.tax,a.fdate,a.tdate,a.tranfer,a.total_net,a.unilevel,a.keysale,a.total,a.rcode,m.name_t"; 
		$sql .= " FROM ".$dbprefix."commission_b a  ";
 		$sql .= " LEFT JOIN ".$dbprefix."member m ON (a.mcode=m.mcode)";
		$sql .= " WHERE 1=1 ";
		//echo $arr_bonus[0];
		if($fmcode != '' )$sql .= " and a.mcode = ".$fmcode."";
		if($type_report == 1 )$sql .= " ";
		if($type_report == 2 )$sql .= " and m.mtype2 = '1' ";
		if($type_report == 3 )$sql .= " and m.bankcode = '52'";
		if($type_report == 4 )$sql .= " and m.bankcode != '52'";
		if($type_report == 5 )$sql .= " and m.bankcode != '52' and m.mtype2 != '1' ";
		if($fdate !="" and $tdate !="")$sql.=" and a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."'";
		
		$rec = new repGenerator_b();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"a.mcode":$_GET['ord']));
	//	if($_GET['excel']==1){$rec->setLimitPage("ALL");}
	//	else{$rec->setLimitPage("100");}		
	$rec->setLimitPage("ALL");
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("rcode,fdate,mcode,name_t,unilevel,keysale,total,tax,tranfer,total_net");
		$rec->setFieldDesc("รอบ,วันที่,รหัสมาชิก,ชื่อ,Unilevel,ค่าคีย์,คอมมิชชั่น,ภาษี,ค่าโอน,สุทธิ");
		$rec->setFieldAlign("center,center,center,left,right,right,right,right,right,right,right");
	//	$rec->setFieldSpace("10%,10%,10%,30%,5%,7%,7%,7%,7%,10%");//10
		$rec->setSum(true,false,",,,,true,true,true,true,true,true,true");
		$rec->setFieldFloatFormat(",,,,2,2,2,2,2,2,2");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","ambonus".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","ambonus".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		//$rec->setSearch("a.mcode,lb.cshort");
		//$rec->setSearchDesc("รหัส,LB");
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

 }
?>