<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>netman pro</title>
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
//require("./cls/sqlAnalizer.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
//$sql = "SELECT pcode,pdesc,price,SUM(qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."asaled "; 
//$sql = "SELECT id,sano,sadate,tot_pv,total,name_t,smcode FROM ".$dbprefix."asaleh ";
//$sql .= "LEFT JOIN (SELECT mcode,mcode AS smcode,name_t FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."asaleh.mcode=tabname.mcode) ";
$sql = "SELECT ".$dbprefix."asaleh.id,sano,
txtFuture+txtCash+txtCredit1+txtCredit2+txtCredit3+txtOption+txtDiscount+txtInternet+txtOther as AllCredit,txtFuture,txtCash,txtInternet,txtDiscount,txtOther,
' '+optionCash+optionFuture+optionCredit1+optionCredit2+optionCredit3+optionInternet+optionDiscount+optionOther as optionAll,txtCredit1,txtCredit2,txtCredit3,name_t,".$dbprefix."asaleh.mcode AS smcode ";
//$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
//$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= "FROM ".$dbprefix."asaleh ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
if($fdate!=""){
	$sql .= "WHERE ".$dbprefix."asaleh.sadate BETWEEN '$fdate' AND '$tdate'";
	$where = 1;
}else $where = 0;
if($satype !=""){
	if($where == 1)$sql .= " and  ".$dbprefix."asaleh.sa_type = '$satype'";
	else $sql .= " where  ".$dbprefix."asaleh.sa_type = '$satype'";
}
//$sql .= "GROUP BY pcode";// LEFT JOIN ".$dbprefix."bank ON ".$dbprefix."member.bankcode=".$dbprefix."bank.bankcode";
//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
	/*if($_GET['state']==1){
		include("member_del.php");
	}else if($_GET['state']==2){
		include("member_editadd.php");
	}else{*/
	//echo $sql;
		//$rec = new sqlAnalizer();
		//echo "<br />";
		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		$rec->setLimitPage($_GET['lp']);	
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=3&sub=".$_GET['sub']."&fdate=$fdate&tdate=$tdate&satype=$satype&stype=$stype");
		$rec->setBackLink($PHP_SELF,"sessiontab=3");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("sano,txtAll,txtCash,txtFuture,AllCredit,txtTransfer,txtInternet,txtDiscount,txtOther,optionAll");
		$rec->setFieldFloatFormat(",0,0,0,0,0,0,0,0");
		$rec->setFieldDesc("เลขบิล,จำนวนรวม,เงินสด,รับล่วงหน้า,บัตรเครดิต,เงินโอน,Ewallet,ส่วนลด,อื่นๆ,หมายเหตุ");
		$rec->setFieldAlign("center,right,right,right,right,right,right,right,right,right,right,right");
		$rec->setFieldSpace("5%,8%,8%,8%,8%,8%,8%,8%,8%,50%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE","พิมพ์");
		$rec->setSum(true,false,",true,true,true,true,true,true,true,true,");
		//$rec->setSearch("pcode,pdesc,price,qty,amt");
		//$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		//$rec->setEdit("index.php","id","id","sessiontab=3&sub=6");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	//}


?>
<?
$sql = "
SELECT 
sum(txtInternet) as sumInternet,
sum(txtCash) as sumCash,
sum(txtCredit1+txtCredit2+txtCredit3) as sumCredit,
sum(txtTransfer) as sumTransfer,
sum(txtDiscount) as SumDiscount,
sum(txtOther) as sumOther,
sum(txtFuture) as sumFuture ";
//$sql .= ",CASE sa_type WHEN 'Q' THEN '<img src=./images/true.gif>' ELSE '' END AS preserve ";
//$sql .= ",CASE sa_type WHEN 'A' THEN '<img src=./images/true.gif>' ELSE '' END AS ability ";
$sql .= "FROM ".$dbprefix."asaleh ";
//$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."asaleh.mcode=".$dbprefix."member.mcode) "; //WHERE smcode='".$_SESSION['usercode']."' 
if($fdate!=""){
	$sql .= "WHERE sadate BETWEEN '$fdate' AND '$tdate'";
	$where = 1;
}else $where = 0;
if($satype !=""){
	if($where == 1)$sql .= " and  sa_type = '$satype'";
	else $sql .= " where  sa_type = '$satype'";
}
//$sql .= " group by ";
//echo $sql;
$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$data = mysql_fetch_object($result);
		$toto = $data->sumCash+$data->sumCredit+$data->sumTransfer+$data->sumInternet+$data->sumFuture+$data->sumDiscount+$data->sumOther;
		if(empty($data->sumCash))$sumCash = 0;
		if(empty($data->sumCredit))$sumCredit = 0;
		if(empty($data->sumTransfer))$sumTransfer = 0;
		if(empty($data->sumInternet))$sumInternet = 0;
		if(empty($data->sumFuture))$sumFuture = 0;
		if(empty($data->sumDiscount))$sumDiscount = 0;
		if(empty($data->sumOther))$sumOther = 0;
?>
<!--<td width="10">&nbsp;</td>-->
<table width="100%"><tr><td width="50"></td><td>
<table cellpadding="0" cellspacing="0" border="1" width="150" align="left">
<tr><td width="72">&nbsp;เงินสด&nbsp;</td><td width="33">&nbsp;<?=$sumCash?>&nbsp;</td><td width="37">&nbsp;บาท&nbsp;</td></tr>
<tr><td nowrap>&nbsp;บัตรเครดิต&nbsp;</td><td>&nbsp;<?=$sumCredit?>&nbsp;</td><td>&nbsp;บาท&nbsp;</td></tr>
<tr><td nowrap>&nbsp;เงินโอน&nbsp;</td><td>&nbsp;<?=$sumTransfer?>&nbsp;</td><td>&nbsp;บาท&nbsp;</td></tr>
<tr><td nowrap>&nbsp;Ewallet&nbsp;</td><td>&nbsp;<?=$sumInternet?>&nbsp;</td><td>&nbsp;บาท&nbsp;</td></tr>
<tr><td nowrap>&nbsp;รับล่วงหน้า&nbsp;</td><td>&nbsp;<?=$sumFuture?>&nbsp;</td><td>&nbsp;บาท&nbsp;</td></tr>
<tr><td nowrap>&nbsp;ส่วนลด&nbsp;</td><td>&nbsp;<?=$sumDiscount?>&nbsp;</td><td>&nbsp;บาท&nbsp;</td></tr>
<tr><td nowrap>&nbsp;OV&nbsp;</td><td>&nbsp;<?=$sumOther?>&nbsp;</td><td>&nbsp;บาท&nbsp;</td></tr>
<tr><td nowrap>&nbsp;จำนวนรวม&nbsp;</td><td>&nbsp;<? echo $toto;?>&nbsp;</td><td>&nbsp;บาท&nbsp;</td></tr></table>
</td></tr></table>
<br><br><br>