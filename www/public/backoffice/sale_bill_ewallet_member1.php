<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>

<?
require("connectmysql.php");
//echo 's';exit;
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
	if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
	if(isset($_POST["tdate"]))
		$tdate = $_POST["tdate"];
	else if(isset($_GET["tdate"]))
		$tdate = $_GET["tdate"];
		
	if(isset($_POST["satype"]))
		$satype = $_POST["satype"];
	else if(isset($_GET["satype"]))
		$satype = $_GET["satype"];

	if(isset($_POST["mcode"]))
		$mcode = $_POST["mcode"];
	else if(isset($_GET["mcode"]))
		$mcode = $_GET["mcode"];

		if(isset($_POST["inv_code"]))
		$inv_code = $_POST["inv_code"];
	else if(isset($_GET["inv_code"]))
		$inv_code = $_GET["inv_code"];

	if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
	}
searchbox($stype,$satype,$fdate,$tdate);
$sql = "SELECT * FROM ".$dbprefix."invent ";
if($inv_code != "")$sql .= "where inv_code = '$inv_code'";
//echo $sql;
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$inv_code = mysql_result($rs,$i,'inv_code');

$sql = "select * from (SELECT '' as sid,a.inv_code,
'' as txtMoney,a.txtInternet,
a.uid as uid,a.sano,a.sadate,a.total,
CONCAT( a.optionCash, ' ', a.optionFuture,'',a.optionCredit1,' ',a.optionCredit2,' ',a.optionCredit3,' ',a.optionInternet,' ',a.optionDiscount,' ',a.optionOther ) as optionAll,a.txtoption,
m.inv_desc,a.mcode AS smcode ";
$sql .= "FROM ".$dbprefix."asaleh as a ";
$sql .= "LEFT JOIN ".$dbprefix."invent as m ON (a.inv_code=m.inv_code) where  a.chkInternet <> ''   "; //WHERE smcode='".$_SESSION['usercode']."' 
//echo $sql;
	$sql .= "UNION ";
$sql .= "SELECT a.sano as sid, a.inv_code,
a.txtMoney,'' as txtInternet,
a.uid as uid,'' as sano,a.sadate,a.total,
CONCAT( a.optionCash, ' ', a.optionFuture,'',a.optionCredit1,' ',a.optionCredit2,' ',a.optionCredit3 ) as optionAll,a.txtoption,
m.inv_desc,a.mcode AS smcode ";
$sql .= "FROM ".$dbprefix."ewallet as a ";
$sql .= "LEFT JOIN ".$dbprefix."invent as m ON (a.inv_code=m.inv_code) ) as a where 1=1 "; //WHERE smcode='".$_SESSION['usercode']."' 
 $sql;
if($fdate!=""){
		$sql .= "AND a.sadate BETWEEN '$fdate' AND '$tdate' ";
	}
	if($inv_code !="")
	$sql .= " and  a.inv_code = '$inv_code' ";
	$rss = mysql_query($sql);
	//echo $sql;

if(mysql_num_rows($rs) > 0){
?>
<table border="0" width="60%" cellpadding="0" cellspacing="0"><tr bgcolor="#999999">
    <td width="15%"><strong>รหัสสมาชิก</strong> </td><td><?=mysql_result($rs,$i,'inv_code')?></td>
    <td width="15%"><strong>ชื่อสมาชิก</strong> </td><td><?=mysql_result($rs,$i,'inv_desc')?></td>
</tr></table>

<br>
<?
//$sql = "SELECT pcode,pdesc,price,SUM(qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."asaled "; 
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT inv_code,bill,mdate ,
CASE other WHEN '1' THEN 'บิลออนไลน์' WHEN '2' THEN 'บิลซือสินค้า' WHEN '3' THEN 'บิลโอนถ่าย' WHEN '4' THEN 'บิลโอนถ่าย' WHEN '5' THEN 'บิลเติมเงิน'  END AS other
,pv1,pv2,pv3,balance,uid,other1 ";
$sql .= "FROM ".$dbprefix."cnt_ewallet where 1=1 ";
if($fdate!=""){
		$sql .= "AND mdate  BETWEEN '$fdate' AND '$tdate' ";
	}
	if($inv_code !="")$sql .= " and  inv_code = '$inv_code' ";
	$sql .= " order by id asc";
//echo $sql;

	if($_GET['state']==1){
		include("sale_del.php");
	}else if($_GET['state']==2){
		include("sale_editadd.php");
	}else if($_GET['state']==3){
		include("sale_cancel.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
	//	$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		//$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);

		//$rec->setLimitPage($_GET['lp']);	
		$rec->setLimitPage("ALL");	
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		$rec->setPageLinkShow(false,false);
		if(isset($page))$rec->setCurPage($page);
		$rec->setShowField("mdate,bill,pv1,pv2,pv3,balance,uid,other");
		$rec->setFieldFloatFormat(",,2,2,2,2,,,,,,,");
		$rec->setFieldDesc("วันที่ซื้อ,บิล,ยอดยกมา,เงินเข้า,ใช้ไป,คงเหลือ,ผู้ดำเนินการ,ดำเนินการ,");
		$rec->setFieldAlign("center,center,right,right,center,right,center,right,left,right,right,right,center");
		$rec->setFieldSpace("11%,11%,11%,11%,11%,11%,11%,11%,11%,10%,10%,10%,7%,7%,10%,15%,15%,8%");
		//$rec->setSum(true,false,",,,,,,,,,,,");
		$rec->showRec(1,'SH_QUERY');
	}?><br><?
}

}

?>
<? function searchbox($stype,$satype,$fdate,$tdate){?>
<form style="margin-bottom:0;" action="index.php?sessiontab=3&sub=27" method="post">
<table style="margin-left:20;" width="562" border="0">
  <tr valign="top"><td width="600" align="center" ><fieldset>
	<input size="15" type="text" name="fdate" value="<?=$fdate?>" />
	<a href="javascript:NewCal('fdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a>  ถึง
	<input size="15" type="text" name="tdate" value="<?=$tdate?>" />
	<a href="javascript:NewCal('tdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a> รหัสสาขา : <input type="text" name="inv_code" value="<?=$_POST["inv_code"];?>">
    <input type="submit" value="ค้น" />
</td>
</tr></table>
</form>
<? }?>
