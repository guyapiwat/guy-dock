<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title></title>
<link rel="stylesheet" type="text/css" href="./../style.css" />

<? 
//session_start();  
include("prefix.php"); ?>
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

	if(isset($_POST["sregister"]))
		$sregister = $_POST["sregister"];
	else if(isset($_GET["sregister"]))
		$sregister = $_GET["sregister"];

	if(isset($_POST["locationbase"]))
		$locationbase = $_POST["locationbase"];
	else if(isset($_GET["locationbase"]))
		$locationbase = $_GET["locationbase"];

	if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
	} 
?>
<table align="center"><tr>	<td align="center"><b>ข้อมูลบิลระหว่างวันที่ <?=$fdate?> ถึง <?=$tdate?></b></td></tr>
    <tr>	<td align="center">พิมพ์วันที่ <?=date("d-m-Y")?></td></tr>
</table>
<?
require("connectmysql.php");
require("./cls/repGenerator.php");

if($fdate!=""){
	$sqlwhere = " and sadate BETWEEN '$fdate' AND '$tdate' and cancel=0 ";
}
if(!empty($struid)){
	$sqlwhere .= " and uid like '%".$struid."%' ";
}
if(!empty($sspv)){
	$sqlwhere .= " and checkportal like '%".$sspv."%' ";

}
if($inv_code !=""){
	 $sqlwhere .= " and  lid = '$inv_code' ";
}

if($locationbase !=""){
	 $sqlwhere .= " and  locationbase = '$locationbase' ";
}

$sql = "select *,'".$fdate."' as fdate,'".$tdate."' as tdate,
CASE '".$struid."' WHEN '' THEN '*' ELSE '".$struid."' END AS txtUser ,
CASE '".$sspv."' WHEN '' THEN '*'  WHEN '1' THEN 'HQ' WHEN '2' THEN 'Branch' WHEN '3' THEN 'ONLINE' WHEN '4' THEN 'ATO' END AS txtcheckPortal 
,CASE '".$inv_code."' WHEN '' THEN '*' ELSE '".$inv_code."' END AS txtInvcode 


from 
(select number1,mcode,cid, total,tot_pv,typee,txtCash,txtCredit,txtEwallet,txtFuture,txtTransfer,txtDiscount,'0' as txtUser,'0' as txtd,CASE inv_ref WHEN '' THEN '*' ELSE inv_ref END AS code_ref1,IFNULL(txtOther, 0) as txtOther from 
(
select '3' as number1,mcode,count(id) as cid,sum(total) as total,sum(tot_pv) as tot_pv,sum(txtCash) as txtCash,sum(txtCredit1+txtCredit2+txtCredit3) as txtCredit,sum(txtInternet) as txtEwallet,sum(txtTransfer) as txtTransfer,sum(txtFuture) as txtFuture,sum(txtDiscount) as txtDiscount,'บิลขาย'  as typee ,'0' as txtOther  from ali_asaleh where  (sa_type <> 'L' and sa_type <> 'Z')  $sqlwhere


union select '5' as number1,mcode,count(id) as cid, sum(txtMoney) as total,'0' as tot_pv,sum(txtCash) as txtCash,sum(txtCredit1+txtCredit2+txtCredit3) as txtCredit,'0' as txtEwallet,sum(txtTransfer)+sum(txtFuture) as txtTransfer,'0' as txtFuture,'0' as txtDiscount,'บิลเติมเงิน Ewallet' as typee,'0' as txtOther  from ali_ewallet where 1=1 $sqlwhere

union select '6' as number1,mcode,count(id) as cid, sum(total) as total,'0' as tot_pv,sum(txtCash) as txtCash,sum(txtCredit1+txtCredit2+txtCredit3) as txtCredit,sum(txtInternet) as txtEwallet,sum(txtTransfer) as txtTransfer,sum(txtFuture) as txtFuture,0 as txtDiscount,'บิลเติมเงิน Eautoship' as typee, '0' as txtOther from ali_eatoship where 1=1 and sa_type ='I' $sqlwhere




) as a LEFT JOIN ".$dbprefix."user ON (".$dbprefix."user.usercode like '%$struid%') where 1=1 group by a.typee) as a  " ;

//echo $sql;
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		$rec->setOrder($_GET['ord']==""?" a.typee ":$_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setPageLinkShow(false,false);
		$rec->setLimitPage("ALL");
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=10&fdate=$fdate&tdate=$tdate&satype=$satype&logistic=$logistic&strpv=$strpv&strtotal=$strtotal&struid=$struid&sspv=$sspv&inv_code=$inv_code&strSearch=$strSearch&strtype=$strtype");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("typee,fdate,tdate,cid,total,tot_pv,txtCash,txtCredit,txtEwallet,txtTransfer,txtFuture,txtDiscount,txtUser,txtInvcode,txtcheckPortal");
		$rec->setFieldDesc("ชนิด,จากวันที่,ถึงวันที่,จำนวนบิล,จำนวนเงินรวม,PV,เงินสด,เครดิต,Ewallet,เงินโอน,Voucher,ส่วนลด,User,สาขา,ช่องทาง");
		$rec->setFieldFloatFormat(",,,,2,2,2,2,2,2,2,2");
		$rec->setFieldAlign("left,center,center,right,right,right,right,right,right,right,right,right,center,center,center,center,center");
		//$rec->setFieldSpace("5%,7%,7%,5%,6%,6%,6%,6%,6%,6%,6%,6%,6%,6%,5%");
		$rec->setFieldLink(",");
		//$rec->setSearch("sano,hono,sadate,smcode,inv_code,tot_pv");
		//$rec->setSearchDesc("เลขบิล,เลขบิลแจง,วันที่,รหัสผู้ซื้อ,ผู้บันทึก,จำนวน PV");
		$rec->setSum(true,false,",,,,true,true,true,true,true,true,true,true");
		$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		$rec->showRec(1,'SH_QUERY');


?>