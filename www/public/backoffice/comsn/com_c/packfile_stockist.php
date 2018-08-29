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

rpdialog_alls($_GET['sub'],$fdate,$tdate);
require("connectmysql.php");
$wwhere = ($fdate[0]=="" ? " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."'  " : " a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."'  ");
$wwhere1 = " a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";

if($fdate != ''){
		if($_GET['state']==1){
		include("comsn/com_c/rep_change.php");
		}
		$sql = "SELECT *,@num := @num + 1 b FROM (SELECT a.*,b.bankname,lb.cshort ";
		$sql .= "FROM ".$dbprefix."fmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON a.bankcode=b.bankcode ";
		$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON lb.cid=a.locationbase ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON(a.mcode=m.mcode) ";
	
		$sql .= " WHERE $wwhere ";
		if($fmcode != '' )$sql .= " and a.mcode = ".$fmcode."";
		if($_POST['bonus'] != '' )$sql .= " and a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";
		if($type_report == 1 )$sql .= " ";
		if($type_report == 2 )$sql .= " and m.mtype2 = '1' ";
		if($type_report == 3 )$sql .= " and m.bankcode = '52'";
		if($type_report == 4 )$sql .= " and m.bankcode != '52'";
		if($type_report == 5 )$sql .= " and m.bankcode != '52' and m.mtype2 != '1' ";
 
		$sql .= "  ";
		$sql .= "  ) as a,(SELECT @num := 0) d where 1=1 ";

		echo "SQL : $sql <BR>";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"mcode":$_GET['ord']));
		$rec->setLimitPage($_GET['lp']);
		$rec->setLimitPage(5000);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		//$rec->setShowField("rcode,name_t,acc_no,total,bankname,mobile,Yes,oon,ttttt");
		$rec->setShowField("b,mcode,bankcode,acc_no,acc_name,bonus,id_tax,ref1,ref2,email,mobile,bankname,total,vat,tax,oon,cshort");
	//	$rec->setFieldDesc("ลำดับ,รหัสสมาชิก,รหัสธนาคาร,เลขที่บัญชี,ชื่อผู้รับเงิน,จำนวนเงิน,เลขบัตรประชาชน,ref1,ref2,อีเมล์,มือถือ,ชื่อธนาคาร,ยอดโบนัส,บวก vat,หักภาษี,หักค่าโอน,LB");

		$rec->setFieldDesc("ลำดับ,รหัสสมาชิก,รหัสธนาคาร,เลขที่บัญชี,ชื่อผู้รับเงิน,จำนวนเงิน,เลขนิติบุคคล,ref1,ref2,อีเมล์,มือถือ,ชื่อธนาคาร,ยอดโบนัส,บวก vat,หักภาษี,หักค่าโอน,LB");
		

		$rec->setFieldAlign("center,center,center,center,left,right,center,center,center,left,center,left,right,right,right,right");
		$rec->setFieldSpace("2%,6%,3%,7%,18%,6%,8%,2%,2%,10%,7%,10%,5%,5%,5%");//10
		$rec->setSum(true,false,",,,,,true,,,,,,,true,true,true,true");
		$rec->setFieldFloatFormat(",,,,,2,,,,,,,2,2,2,");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","packfileA".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","packfileA".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>".$wording_lan["Billjang_loding"]." Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>".$wording_lan["Billjang_cre"]." Excel</a></fieldset>";
		$rec->setSpace($str);
		
		$rec->setSearch("cshort");
		$rec->setSearchDesc("LB");

		$rec->setFieldLink("");
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}

?>