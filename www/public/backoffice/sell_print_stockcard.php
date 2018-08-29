<?
session_start();
?><meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>MLM</title>
<link rel="stylesheet" type="text/css" href="./../style.css" />

<? include("prefix.php");?>
<?
	if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
	if(isset($_POST["tdate"]))
		$tdate = $_POST["tdate"];
	else if(isset($_GET["tdate"]))
		$tdate = $_GET["tdate"];

	if(isset($_POST["strSearch"]))
		$strSearch = $_POST["strSearch"];
	else if(isset($_GET["strSearch"]))
		$strSearch = $_GET["strSearch"];

	if(isset($_POST["strSearch1"]))
		$strSearch1 = $_POST["strSearch1"];
	else if(isset($_GET["strSearch1"]))
		$strSearch1 = $_GET["strSearch1"];

	if(isset($_POST["strSearch2"]))
		$strSearch2 = $_POST["strSearch2"];
	else if(isset($_GET["strSearch2"]))
		$strSearch2 = $_GET["strSearch2"];
		

	if(isset($_POST["inv_code"]))
		$inv_code = $_POST["inv_code"];
	else if(isset($_GET["inv_code"]))
		$inv_code = $_GET["inv_code"];

	if(isset($_POST["inv_code1"]))
		$inv_code1 = $_POST["inv_code1"];
	else if(isset($_GET["inv_code1"]))
		$inv_code1 = $_GET["inv_code1"];

	if(isset($_POST["pcode"]))
		$pcode = $_POST["pcode"];
	else if(isset($_GET["pcode"]))
		$pcode = $_GET["pcode"];

	if(isset($_POST["pcode1"]))
		$pcode1 = $_POST["pcode1"];
	else if(isset($_GET["pcode1"]))
		$pcode1 = $_GET["pcode1"];

	if(isset($_POST["group_id"]))
		$group_id = $_POST["group_id"];
	else if(isset($_GET["group_id"]))
		$group_id = $_GET["group_id"];

	if(isset($_POST["group_id1"]))
		$group_id1 = $_POST["group_id1"];
	else if(isset($_GET["group_id1"]))
		$group_id1 = $_GET["group_id1"];

	if(isset($_POST["inv_code1"]))
		$inv_code1 = $_POST["inv_code1"];
	else if(isset($_GET["inv_code1"]))
		$inv_code1 = $_GET["inv_code1"];

	if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
	}
	$inv_code = $_SESSION["admininvent"];
	
?>
<table align="center"><tr>	<td align="center"><b>ข้อมูล Stockcardระหว่างวันที่ <?=$fdate?> ถึง <?=$tdate?></b></td></tr>
    <tr>	<td align="center">พิมพ์วันที่ <?=date("d-m-Y")?></td></tr>
</table>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");
if($fdate!=""){
	$sqlwhere .= " and ".$dbprefix."stockcard.sadate BETWEEN '$fdate' AND '$tdate' ";
	$where = 1;
}else $where = 0;

if($inv_code !="" and $inv_code1 !=""){
	$sqlwhere .= " and (";
	$rs3 = mysql_query("SELECT * FROM ".$dbprefix."invent  where inv_code = '$inv_code' ");
    if(mysql_num_rows($rs3)>0){
				$data = mysql_fetch_object($rs3);
				$startid = $data->id;
	}else $startid = 0;

	$rs3 = mysql_query("SELECT * FROM ".$dbprefix."invent  where inv_code = '$inv_code1' ");
    if(mysql_num_rows($rs3)>0){
				$data = mysql_fetch_object($rs3);
				$finishid = $data->id;
	}else $finishid = 0;

	$rs = mysql_query("SELECT * FROM ".$dbprefix."invent where id between '$startid' and '$finishid' ");
    for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlwhere .= " ".$dbprefix."stockcard.inv_action = '".mysql_result($rs,$i,'inv_code')."' or  ";
	}

	$sqlwhere .= " ".$dbprefix."stockcard.inv_action = '9999' ) ";
}

if($strSearch1!=""){
	$sqlwhere .= " and ".$dbprefix."stockcard.pcode = '$strSearch1'  ";
}
if($strSearch2!=""){
	$sqlwhere .= " and ".$dbprefix."stockcard.sano = '$strSearch2'  ";
}

$sql = "SELECT * FROM ".$dbprefix."stockcard where 1=1 $sqlwhere ";
//echo $sql;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		$rec->setLimitPage("1000");	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=".$_GET['sub']."&fdate=$fdate&tdate=$tdate&satype=$satype&stype=$stype&strSearch1=$strSearch1&strSearch2=$strSearch2");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sadate,mcode,inv_code,inv_ref,sano,pcode,in_qty,in_price,in_amount,out_qty,out_price,out_amount,balance,price,amount");

		$rec->setFieldFloatFormat(",,,,,,0,2,2,0,2,2,0,2,2");
		$rec->setFieldDesc("วันเดือนปี,รหัสสมาชิก,รหัสสาขารับ,รหัสสาขาคีย์,เลขที่ใบสำคัญ,รหัสสินค้า,รับ,ราคาต่อหน่วย,มูลค่า,จ่าย,ราคาต่อหน่วย,มูลค่า,จำนวนคงเหลือ,ราคาต่อหน่วย,มูลค่าคงเหลือ");
		$rec->setFieldAlign("center,center,center,center,center,center,right,right,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("7%,7%,6%,6%,10%,9%,5%,7%,5%,5%,7%,5%,7%,7%,7%");
		$rec->setSum(true,false,",,,,,,true,true,true,true,true,true,true,true,true,true");

		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
?>