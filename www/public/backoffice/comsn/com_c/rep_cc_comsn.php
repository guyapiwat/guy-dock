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
$wwhere = ($fdate[0]=="" ? " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and  a.status = 0  " : " a.paydate >= '".$fdate."' and a.paydate <= '".$tdate."' and  a.status = 0 ");
$wwhere1 = " a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";

if($fdate != ''){
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		
		$sql = "SELECT m.acc_no,m.bankcode,b.bankname,cr.paydate ";
		$sql .= ",a.id,a.rcode,a.mcode,m.name_t,a.pvh,a.pvb,a.total,a.c_remark,lb.cshort ";
		$sql .= ",CASE c_note1 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note1 ";
		$sql .= ",CASE c_note2 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note2 ";
		$sql .= ",CASE c_note3 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note3 ";
		$sql .= ",CASE c_note4 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note4 ";
		$sql .= ",CASE c_note5 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note5 ";
		$sql .= "FROM ".$dbprefix."cmbonus a ";
		$sql .= "left join ".$dbprefix."cround cr on a.rcode=cr.rcode ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";
		$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON a.locationbase=lb.cid ";
		
		 $sql .= " WHERE $wwhere ";
		if($fmcode != '' )$sql .= " and a.mcode = ".$fmcode."";
		if($_POST['bonus'] != '' )$sql .= " and a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
		if($type_report == 1 )$sql .= " ";
		if($type_report == 2 )$sql .= " and m.mtype2 = '1' ";
		if($type_report == 3 )$sql .= " and m.bankcode = '52'";
		if($type_report == 4 )$sql .= " and m.bankcode != '52'";
		if($type_report == 5 )$sql .= " and m.bankcode != '52' and m.mtype2 != '1' ";
 

		//echo "SQL : $sql <BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"a.mcode,a.rcode":$_GET['ord']));
		if($_GET['excel']==1){$rec->setLimitPage("ALL");}
		else{$rec->setLimitPage("100");}
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("rcode,paydate,mcode,name_t,pvh,c_note1,c_note2,c_note3,c_note5,c_remark,cshort");
		$rec->setFieldDesc("รอบ,วันจ่าย,รหัส,ชื่อ,ยอดยกไป,สำเนาบัตรประชาชน,สำเนาบัญชีธนาคาร,เลขที่บัญชี,ใบสมัคร,หมายเหตุ,LB");
		$rec->setFieldAlign("center,center,center,left,right,center,center,center,center,left,right,right,right,right");
		$rec->setFieldSpace("5%,7%,7%,20%,7%,8%,8%,8%,8%,50%,6%,10%,10%");//10
		$rec->setSum(true,false,",,,,true,");
		$rec->setFieldFloatFormat(",,,,2,");
		if($acc->isAccess(4)){
		//	$rec->setDel("index.php","id","id","sessiontab=4&sub=34");
		//	$rec->setFromDelAttr("maindel","./index.php?sessiontab=4&sub=34&state=1","post","delfield");
		}
	/*	if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("a.mcode,lb.cshort");
		$rec->setSearchDesc("รหัส,LB");
*/
	 $rec->setFieldLink("");
		if($acc->isAccess(2))
		//	$rec->setEdit("index.php","id","id","sessiontab=4&sub=34&ftrcode=".$ftrc[0]);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
 ?>