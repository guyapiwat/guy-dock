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
  echo "<center><FONT COLOR=#ff0000>��سҡ�͡��ǧ���������١ �� 0-500</FONT></center>";
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
		//�ͺ������� == �ͺ����ش
		$ftrc[0]=$ftrcode;
		$ftrc[1]=$ftrcode;
}else{
	$ftrc = explode('-',$ftrcode);
}

rpdialog_alls($_GET['sub'],$fdate,$tdate);
require("connectmysql.php");
$wwhere = ($fdate[0]=="" ? " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' " : " a.paydate >= '".$fdate."' and a.paydate <= '".$tdate."' and  a.status = 1 ");
$wwhere1 = " a.total between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";

if($fdate != ''){
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($_GET['state']==1){
		include("comsn/com_c/rep_change.php");
		}
		$sql = "SELECT m.acc_no,m.bankcode";
		$sql .= ",a.id,a.rcode,a.mcode,m.name_t,a.pv,a.pvb,a.tot_tax,a.total+a.tot_tax as total1,a.id_card  ";
		$sql .= ",CASE a.status WHEN '1' THEN '����' WHEN '0' THEN '������'  END AS status ";
		$sql .= ",CONCAT(address,' �.',districtId,' �.',amphurId,' �.',provinceId,' ',zip) AS address ";
		$sql .= "FROM ".$dbprefix."cmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
	
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
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"a.rcode":$_GET['ord']));
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
		$rec->setShowField("rcode,id,mcode,total1,tot_tax,name_t,address,id_card");
		$rec->setFieldDesc("�ͺ,�ӴѺ,����,�ӹǹ���⺹��,�ѡ � ������,����,�������,�Ţ���ѵû�ЪҪ�");
		$rec->setFieldAlign("center,center,center,right,right,left,left,left,center");
		$rec->setFieldSpace("3%,3%,5%,10%,10%,20%,40%,10%");//10
		$rec->setSum(true,false,",,,true,true");
		//$rec->setFieldFloatFormat(",,,2,2,2,2,2,2");
		if($acc->isAccess(4)){
		//	$rec->setDel("index.php","id","id","sessiontab=4&sub=2828");
		//	$rec->setFromDelAttr("maindel","./index.php?sessiontab=4&sub=2828&state=1&ftrcode=$ftrcode&fmcode=$fmcode","post","delfield");
		}
/*		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSearch("a.mcode");
		$rec->setSearchDesc("����");
*/
		$rec->setFieldLink("");
		if($_GET['excel']==1){
			$rec->exportXls("ExportXls","packfile100".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","packfile100".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>��Ŵ Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>���ҧ Excel</a></fieldset>";
		
		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');
		mysql_close($link);
	}
?>