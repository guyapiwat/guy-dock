<?
include("rpdialog.php");
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$fdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$tdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
$type_report = $_POST['type_report']==""?$_GET['type_report']:$_POST['type_report'];
$bonus = $_POST['bonus']==""?$_GET['bonus']:$_POST['bonus'];
if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if (isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="";}
$cmc=$_SESSION["usercode"];
rpdialog_new($sub,$fdate,$tdate);

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


require("connectmysql.php");
require("./cls/repGenerator.php");
$wwhere = ($fdate[0]=="" ? " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' " : " a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ");
$wwhere1 = " a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";

 		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
			$sql = "SELECT a.fdate as fdate,a.tdate as tdate,a.rcode,a.pos_cur, a.mcode as smcode,m.name_t,m.acc_no,m.bankcode,b.bankname,a.total,a.tax,a.bonus ";
		$sql .= " FROM ".$dbprefix."ambonus2 a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode  WHERE a.mcode='".$cmc."'";
		if($fdate!="" and $tdate !=""){
			$sql.=" and a.fdate >= '".$fdate."' and a.tdate <= '".$tdate."' ";
		}
//echo $sql;
	
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
		if($_GET['excel']==1){$rec->setLimitPage("ALL");}
		else{$rec->setLimitPage("100");}
		$rec->setSize("99%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$fdate&strtdate=$tdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		//$rec->setShowIndex(true);
		$rec->setShowField("rcode,fdate,smcode,name_t,pos_cur,total");
		$rec->setFieldDesc($wording_lan["tab5"]['1_1'].",".$wording_lan["Date"].",".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["pos_cur"].",".$wording_lan["commission"]);
		$rec->setFieldAlign("center,center,center,left,center,right,right");
		$rec->setFieldSpace("5%,15%,15%,40%,10%,20%");//10
		$rec->setSum(true,false,",,,,,true");
		$rec->setFieldFloatFormat(",,,,,2");
		$rec->setFieldLink(",,,,,index.php?sessiontab=5&sub=777&strfdate=,,");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","ambonus2".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","ambonus2".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";

			$rec->setSpace($str);
		}
				//$rec->setSpecial("","","","","NUMROW","ลำดับ");

		//$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		//$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		//$rec->setSearch("a.mcode,lb.cshort");
		//$rec->setSearchDesc("รหัส,LB");
		//$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);

?>

