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
if($ftrcode!=""){
	$sql="select fdate,tdate,paydate from ".$dbprefix."cround a where a.rcode ='$ftrcode' ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$fdate=$fdate11=$row["paydate"];
		$tdate=$tdate11=$row["paydate"];	
	}
}
rpdialog_alls($_GET['sub'],$fdate,$tdate,$fmcode);
require("connectmysql.php");
$wwhere = ($fdate[0]=="" ? " a.rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and a.status = 1 "  : " a.paydate between '".$fdate."' and  '".$tdate."' and a.status = 1 ");
$wwhere1 = " (a.total-a.tot_vat+a.tot_tax)/a.crate between '".$arr_bonus[0]."' and '".$arr_bonus[1]."' ";

if($fdate != ''){

		require("connectmysql.php");	 
		//require("./cls/repGenerator.php");
		if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
		if($_GET['state']==1){
		include("comsn/com_c/rep_change.php");
		}
		$sql = "SELECT *,@num := @num + 1 b FROM (SELECT lb.cshort,m.acc_no,m.id_card,m.mobile,m.email,'' as ref1,'' as ref2,m.bankcode,b.bankname,'N' as Yes,a.com_transfer_chagre,(a.total-a.com_transfer_chagre)/a.crate as ttttt,(a.total-a.tot_vat+a.tot_tax)/a.crate as alltotal,(a.tot_tax)/a.crate as tot_tax,(a.tot_vat)/a.crate as tot_vat ";
	//	$sql .= ",if(m.caddress <> '',if(m.caddress <> '0',CONCAT(m.caddress,' �.',m.cdistrictId,' �.',m.camphurId,' �.',m.cprovinceId,' ',m.czip),''),'') AS address ";
		//$sql .= ",CONCAT(m.caddress,' �.',m.cdistrictId,' �.',m.camphurId,' �.',m.cprovinceId,' ',m.czip) AS address ";
		$sql .= ",CONCAT(m.address,' �.',m.districtId,' �.',m.amphurId,' �.',m.provinceId,' ',m.zip) AS address ";
		$sql .= ",a.id,a.rcode,a.mcode,concat(a.name_f,' ',a.name_t) as fullname,b.code as bcode,a.pv,a.pvb,a.total/a.crate as total  ";
		$sql .= ",CASE m.mtype WHEN '1' THEN ((a.total-a.tot_vat+a.tot_tax)/a.crate)*0.03 WHEN '0' THEN (a.tot_tax)/a.crate  END AS tax_new ";
		$sql .= "FROM ".$dbprefix."cmbonus a ";
		$sql .= " LEFT JOIN ".$dbprefix."member m ON a.mcode=m.mcode ";
		$sql .= " LEFT JOIN ".$dbprefix."bank b ON m.bankcode=b.bankcode ";
		$sql .= " LEFT JOIN ".$dbprefix."location_base lb ON lb.cid=a.locationbase ";
		$sql .= " where $wwhere "; 
		if(!empty($fmcode))$sql .= " and a.mcode = '$fmcode' ";
		$sql .= "    ) as a,(SELECT @num := 0) d where 1=1 ";
		 
		//echo $sql;

		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort(($_GET['srt']==""?"UP":$_GET['srt']));
		$rec->setOrder(($_GET['ord']==""?"rcode":$_GET['ord']));
		if($_GET['excel']==1){$rec->setLimitPage("ALL");}
		else{$rec->setLimitPage("1000");}
		$rec->setSize("100%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&ftrcode=$ftrcode&ftrcode2=$ftrcode2&fdate=$fdate&tdate=$tdate&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode&bonus=$bonus&type_report=$type_report");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("b,mcode,bcode,acc_no,fullname,ttttt,id_card,ref1,ref2,email,mobile,address,bankname,alltotal,tax_new,com_transfer_chagre");
		$rec->setFieldDesc("�ӴѺ,������Ҫԡ,���ʸ�Ҥ��,�Ţ���ѭ��,���ͼ���Ѻ�Թ,�ӹǹ�Թ,&nbsp;�Ţ�ѵû�ЪҪ�&nbsp;,ref1,ref2,������,��Ͷ��,�������,���͸�Ҥ��,�ʹ⺹��,�ѡ����,�ѡ����͹");
		$rec->setFieldAlign("center,center,center,center,left,right,center,center,center,left,center,center,left,right,right,right");
		$rec->setFieldSpace("2%,6%,3%,7%,10%,6%,8%,2%,2%,10%,7%,10%,5%,5%,5%,5%");//10
		$rec->setSum(true,false,",,,,,true,,,,,,,,true,true,true,true");
		$rec->setFieldFloatFormat(",,,,,0,,,,,,,,2,2,2,");
			if($_GET['excel']==1){
			logtext(true,$_SESSION["adminusercode"],'Export Excel : ��������Ҫԡ','');
			$text="uid=".$_SESSION["adminusercode"]." action=member_export_excel =>$sql";
			writelogfile($text);

			$rec->exportXls("ExportXls","Pack_file".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","Pack_file".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>��Ŵ Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>���ҧ Excel</a></fieldset>";
  		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');		//---------------------------------

		mysql_close($link);
	}
 
?>