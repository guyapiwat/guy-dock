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


$sql = "SELECT * FROM ".$dbprefix."product ";
//echo $sql;
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){

?>
<fieldset style="background-color:#FFFFCC">
<table width="60%" cellpadding="0" cellspacing="0"><tr bgcolor="#CCCCCC">
    <td>รหัสสินค้า <?=mysql_result($rs,$i,'pcode')?></td>
    <td>ชื่อสินค้า <?=mysql_result($rs,$i,'pdesc')?></td>
</tr><tr>
    <td>ราคา ต่อหน่วย <?=mysql_result($rs,$i,'price')?></td>
    <td>pv ต่อหน่วย <?=mysql_result($rs,$i,'pv')?></td>
</tr></table>
<?
//$sql = "SELECT pcode,pdesc,price,SUM(qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."asaled "; 
	$sql = "SELECT id,sano,mcode,name_t,pcode,pv,price,qty,amt FROM ".$dbprefix."asaled ";
	$sql .= "LEFT JOIN (SELECT sano AS sno,mcode,sadate FROM ".$dbprefix."asaleh) AS taba ON (".$dbprefix."asaled.sano=taba.sno) ";
	$sql .= "LEFT JOIN (SELECT mcode AS mc,name_t FROM ".$dbprefix."member) AS tabb ON (taba.mcode=tabb.mc) ";
	//$sql .= "LEFT JOIN (SELECT mcode,mcode AS smcode,name_t FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."asaleh.mcode=tabname.mcode) ";
	//sql .= "LEFT JOIN (SELECT mcode,mcode AS smcode,name_t FROM ".$dbprefix."member) AS tabname ON (".$dbprefix."asaleh.mcode=tabname.mcode) ";
	$sql .= "WHERE pcode='".mysql_result($rs,$i,'pcode')."' ";
	if($fdate!=""){
		$sql .= "AND sadate BETWEEN '$fdate' AND '$tdate' ";
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
			if(isset($_POST['skey']))
				$rec->setCause($_POST['skey'],$_POST['scause']);
			else if(isset($_GET['skey']))
				$rec->setCause($_GET['skey'],$_GET['scause']);
			$rec->setSize("95%","");
			$rec->setAlign("center");
			$rec->setPageLinkAlign("right");
			$rec->setLimitPage("ALL");
			$rec->setLink($PHP_SELF,"sessiontab=3&sub=".$_GET['sub']."&fdate=$fdate&tdate=$tdate&stype=$stype");
			$rec->setBackLink($PHP_SELF,"sessiontab=3");
			if(isset($page))
				$rec->setCurPage($page);
			$rec->setShowField("sano,mcode,name_t,qty,amt");
			$rec->setFieldDesc("เลขบิล,รหัสสมาชิก,ชื่อสมาชิก,จำนวน,จำนวนเงินรวม");
			$rec->setFieldAlign("center,center,left,right,center,right,right,right");
			$rec->setFieldSpace("10%,15%,45%,5%,10%");
			//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
			//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
			//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
			//$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE");
			$rec->setSum(true,false,",,,true,true");
			//$rec->setSearch("pcode,pdesc,price,qty,amt");
			//$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
			//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
			$rec->showRec(1,'SH_QUERY');
			//---------------------------------
		//}
		?></fieldset><hr width="60%" align="center" /><br /><?
}

?>