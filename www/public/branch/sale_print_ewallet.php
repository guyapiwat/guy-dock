<?
session_start();
?><meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>Noblelife</title>
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

if(empty($fdate))$fdate = date("Y-m-d");
if(empty($tdate))$tdate = date("Y-m-d");
		
	if(isset($_POST["satype"]))
		$satype = $_POST["satype"];
	else if(isset($_GET["satype"]))
		$satype = $_GET["satype"];


	if(isset($_POST["logistic"]))
		$logistic = $_POST["logistic"];
	else if(isset($_GET["logistic"]))
		$logistic = $_GET["logistic"];

	if(isset($_POST["strpv"]))
		$strpv = $_POST["strpv"];
	else if(isset($_GET["strpv"]))
		$strpv = $_GET["strpv"];

	if(isset($_POST["strtotal"]))
		$strtotal = $_POST["strtotal"];
	else if(isset($_GET["strtotal"]))
		$strtotal = $_GET["strtotal"];

	if(isset($_POST["struid"]))
		$struid = $_POST["struid"];
	else if(isset($_GET["struid"]))
		$struid = $_GET["struid"];

	if(isset($_POST["sspv"]))
		$sspv = $_POST["sspv"];
	else if(isset($_GET["sspv"]))
		$sspv = $_GET["sspv"];

	if(isset($_POST["inv_code"]))
		$inv_code = $_POST["inv_code"];
	else if(isset($_GET["inv_code"]))
		$inv_code = $_GET["inv_code"];


	if(isset($_POST["strtype"]))
		$strtype = $_POST["strtype"];
	else if(isset($_GET["strtype"]))
		$strtype = $_GET["strtype"];

	if(isset($_POST["strSearch"]))
		$strSearch = $_POST["strSearch"];
	else if(isset($_GET["strSearch"]))
		$strSearch = $_GET["strSearch"];

	if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
	}
$inv_code = $_SESSION["admininvent"];
?>
<table align="center"><tr>	<td align="center"><b>ข้อมูลบิลระหว่างวันที่ <?=$fdate?> ถึง <?=$tdate?></b></td></tr>
    <tr>	<td align="center">พิมพ์วันที่ <?=date("d-m-Y")?></td></tr>
</table>
<?
require("connectmysql.php");
	if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
		if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
		else $_SESSION["lan"] = $_GET["lan"];
	}else{
		if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
	}
	include_once("wording".$_SESSION["lan"].".php");

require("./cls/repGenerator.php");
$sql = "SELECT *,@num := @num + 1 b FROM (";
$sql .= "SELECT cancel,".$dbprefix."ewallet.id,".$dbprefix."ewallet.checkportal,".$dbprefix."ewallet.uid as uid,sano,txtCash,txtFuture,txtTransfer,txtCredit1+txtCredit2+txtCredit3 as txtCredit,sadate,txtMoney,".$dbprefix."ewallet.lid ";
$sql .= ",CASE checkportal WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'SMMS'  END AS checkportal1";
$sql .= ",CASE ".$dbprefix."ewallet.mcode WHEN '' THEN ".$dbprefix."ewallet.inv_code  ELSE ".$dbprefix."ewallet.mcode END AS smcode ";
$sql .= ",CASE ".$dbprefix."ewallet.mcode WHEN '' THEN ".$dbprefix."invent.inv_desc  ELSE ".$dbprefix."member.name_t END AS name_t ";
$sql .= " FROM ".$dbprefix."ewallet ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."ewallet.mcode=".$dbprefix."member.mcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."invent ON (".$dbprefix."ewallet.inv_code=".$dbprefix."invent.inv_code) where cancel = 0 "; 



//$sql .= " FROM ".$dbprefix."ewallet ";
//$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode)    "; 
//$sql .= "LEFT JOIN ".$dbprefix."user ON (".$dbprefix."asaleh.uid=".$dbprefix."user.usercode)  where cancel = 0  "; 


$sql .= " ) as a,(SELECT @num := 0) d where 1=1 " ;

if($fdate!=""){
	$sql .= " and a.sadate BETWEEN '$fdate' AND '$tdate' ";
	$where = 1;
}else $where = 0;
if($satype !=""){
	if($where == 1)$sql .= " and  a.sa_type = '$satype' ";
	else $sql .= " and  a.sa_type = '$satype' ";
}
if($logistic !=""){
	 $sql .= " and  a.send = '$logistic' ";
}
if($inv_code !=""){
	 $sql .= " and  lid = '$inv_code' ";
}
if($strpv !=""){
	 $sql .= " and  a.tot_pv $strpv ";
}
if($strtotal !=""){
	 $sql .= " and  a.txtMoney $strtotal ";
}
if($struid !=""){
	 $sql .= " and  a.uid like '%$struid%' ";
}
if($sspv !=""){
	 $sql .= " and  a.checkportal = '$sspv' ";
}
switch ($strtype) {
    case "sano":
       $sql .= " and  a.sano like '%$strSearch%' ";
        break;
     case "hono":
       $sql .= " and  a.hono like '%$strSearch%'   ";
        break;
	 case "sadate":
       $sql .= " and  a.sadate like '%$strSearch%' ";
        break;
	 case "mcode":
       $sql .= " and  a.smcode like '%$strSearch%' ";
        break;
	case "strinvent":
       $sql .= " and  a.strinvent like '%$strSearch%' ";
        break;
	 case "uid":
       $sql .= " and  a.uid like '%$strSearch%' ";
        break;
		 case "sp_code":
       $sql .= " and  a.sp_code like '%$strSearch' ";
        break;
}

//echo $sql;
//echo $sql;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" a.id ":$_GET['ord']);
		$rec->setLimitPage("5000");	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=4&sub=17&fdate=$fdate&tdate=$tdate&satype=$satype&logistic=$logistic&strpv=$strpv&strtotal=$strtotal&struid=$struid&sspv=$sspv&inv_code=$inv_code&strSearch=$strSearch&strtype=$strtype");
		$rec->setBackLink($PHP_SELF,"sessiontab=4");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("b,sano,smcode,name_t,sadate,txtMoney,txtCash,txtCredit,txtTransfer,uid,lid,checkportal1");
		$rec->setFieldDesc("ลำดับ,เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,จำนวนเงินรวม,เงินสด,เครดิต,เงินโอน,ผู้บันทึก,สาขา,ช่องทาง");
		$rec->setFieldFloatFormat(",,,,,2,2,2,2");
		$rec->setFieldAlign("center,center,center,left,center,right,right,right,right,center,center,center");
		$rec->setFieldSpace("3%,7%,6%,25%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%,7%");
		$rec->setFieldLink(",");
		//$rec->setSearch("sano,hono,sadate,smcode,inv_code,tot_pv");
		//$rec->setSearchDesc("เลขบิล,เลขบิลแจง,วันที่,รหัสผู้ซื้อ,ผู้บันทึก,จำนวน PV");
		$rec->setSum(true,true,",,,,,true,true,true,true,,");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		$rec->showRec(1,'SH_QUERY');


?>