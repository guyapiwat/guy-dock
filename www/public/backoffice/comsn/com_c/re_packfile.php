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
if($ftrcode!=""){
	$sql="select fdate,tdate,paydate from ".$dbprefix."cround a where a.rcode ='$ftrcode' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$fdate=$fdate11=$row["paydate"];
		$tdate=$tdate11=$row["paydate"];	
	}
}
rpdialog_alls($_GET['sub'],$fdate,$tdate);
require("connectmysql.php");
$wwhere = ($fdate[0]=="" ? " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and a.status = 1 "  : " a.paydate >= '".$fdate."' and a.paydate <= '".$tdate."' and a.status = 1 ");
$wwhere1 = " (a.total-a.tot_vat+a.tot_tax)/a.crate between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";

if($fdate != ''){

		require("connectmysql.php");
		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($_GET['state']==1){
		include("comsn/com_c/rep_change.php");
		}	
		$sql = "SELECT a.*,lb.cshort,a.fob+a.cycle+a.smb+a.matching+a.onetime as thiscom,a.fob+a.cycle+a.pv+a.smb+a.matching+a.onetime as thiscom1,c.fdate,c.tdate,m.acc_no,a.tot_tax as tax,m.mobile,'N' as Yes,";
		$sql .= "CASE c_note1 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note1 ";
		$sql .= ",CASE c_note2 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note2 ";
		$sql .= ",CASE c_note3 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note3 ";
		$sql .= ",CASE c_note4 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note4 ";
		$sql .= ",CASE c_note5 WHEN '' THEN 'NO' ELSE 'YES' END AS c_note5 ";		
		$sql .= ",CASE a.status WHEN '1' THEN a.com_transfer_chagre ELSE '0' END AS oon1 ,";
		$sql .= "CASE a.status WHEN '1' THEN a.total-a.com_transfer_chagre ELSE a.total END AS ttttt ";
		//$sql .= "oon";
		$sql .= ",a.id,a.rcode,a.tot_vat,a.mcode,CONCAT(m.name_f,' ',m.name_t) as name_tt,a.pv,a.pvb,a.total,a.status_pv  ";
		$sql .= "FROM ".$dbprefix."cmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."cround c ON c.rcode=a.rcode ";
		$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON lb.cid=a.locationbase ";
		
		$sql .= " WHERE $wwhere ";
		if($fmcode != '' )$sql .= " and a.mcode = ".$fmcode."";
		if($_POST['bonus'] != '' )$sql .= " and a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
		if($type_report == 1 )$sql .= " ";
		if($type_report == 2 )$sql .= " and m.mtype2 = '1' ";
		if($type_report == 3 )$sql .= " and m.bankcode = '52'";
		if($type_report == 4 )$sql .= " and m.bankcode != '52'";
		if($type_report == 5 )$sql .= " and m.bankcode != '52' and m.mtype2 != '1' ";
 
		 
		//echo $sql;

		//echo "SQL : $sql <BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"mcode,rcode":$_GET['ord']));
//		$rec->setLimitPage($_GET['lp']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setLimitPage(5000);
		$rec->setSize("99%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		//$rec->setShowField("rcode,name_t,acc_no,total,bankname,mobile,Yes,oon,ttttt");
		$rec->setFieldFloatFormat(",,,,,,2,2,2,2,2,2,2,2,2,2,2,0");
		$rec->setShowField("rcode,fdate,tdate,mcode,name_tt,pv,fob,cycle,thiscom,thiscom1,pvh,totaly,tot_vat,tax,oon1,voucher,ttttt,status_pv,cshort");
		$rec->setFieldDesc("รอบที่,ตั้งแต่วันที่,ถึงวันที่,รหัส,ชื่อ-นามสกุล,ยอดยกมา,ค่าแนะนำ,Balance<br>Team,Bonusรวม,Bonusรวม<br>+ยอดยกมา,Bonus ยกไป<br>(ไม่โอนรอบนี้),Bonus สะสมทั้งปี,vat,หักภาษี,หักค่าโอน,voucher,สรุปยอดโอน,PV,LB");
		$rec->setFieldAlign("center,left,center,right,left,right,right,right,right,right,right,right,right,right,right,right,right,right,right,right,right,center,center");
		$rec->setFieldSpace("2%,8%,8%,5%,20%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%,4%");//10
		$rec->setSum(true,false,",,,,,,true,true,true,,,true,true,true,true,true,true,true");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","packfileA".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","packfileA".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
	/*	if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("m.mcode,lb.cshort");
		$rec->setSearchDesc("รหัส,LB");
*/
 
		 $str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","mcode","IMAGE","พิมพ์");
			$rec->setSpace($str);
		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
?>