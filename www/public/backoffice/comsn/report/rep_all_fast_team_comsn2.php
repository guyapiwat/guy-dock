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
//echo $ftrcode;
//exit;

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
		if(empty($fdate))exit;
		$whereclass = ($fdate[0]=="" ? " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' " : " and fdate >= '".$fdate."' and tdate <= '".$tdate."' ");

		$sql = "select *,kk.total*0.05 as tax,kk.total*0.95 as totalamt from (SELECT m.mcode,m.name_t,m.mobile,bk.bankcode,bk.bankname,m.branch,m.acc_type,m.acc_no,m.acc_name,m.id_card,";
		$sql .= "ifnull(CONCAT(address,' ต.',districtName,' อ.',amphurName,' จ.',provinceName,' ',zip),
		CONCAT(address,' ต.',m.districtId,' อ.',m.amphurId,' จ.',m.provinceId,' ',zip)) AS address ,";
		$sql .="
		(SELECT ifnull(sum(total),0) from ".$dbprefix."commission a where a.mcode=m.mcode  ".$whereclass." ) as total 
		from ".$dbprefix."member m 
		LEFT JOIN ".$dbprefix."bank bk ON m.bankcode=bk.bankcode ";
		$sql .= "LEFT JOIN district ON (m.districtId=district.districtId) ";
		$sql .= "LEFT JOIN amphur ON (m.amphurId=amphur.amphurId) ";
		$sql .= "LEFT JOIN province ON (m.provinceId=province.provinceId) ";
		$sql .=" ) as kk where kk.total > 0 ";

		
		//echo $sql;
		//exit;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"DOWN":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?" mcode ":$_GET['ord']));
		$rec->setLimitPage("ALL");
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=142&fdate=$fdate&tdate=$tdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("mcode,name_t,id_card,address,total,tax,totalamt");
		$rec->setFieldFloatFormat(",,,,2,2,2,2,2,2,2,2");
		$rec->setFieldDesc("รหัส,ชื่อ,บัตรประชาชน,ที่อยู่,รายได้,ภาษี(5%),สุทธิ");
		$rec->setFieldAlign("center,left,center,left,right,right,right,left,right,right,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("5%,15%,10%,50%,10%,10%,10%");
		$rec->setSum(true,false,",,,,true,true,true,true,true,true,true,true");
		$rec->setFieldLink("");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","allbonusteam142".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","allbonusteam142".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
?>

