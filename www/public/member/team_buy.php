<script language="javascript" type="text/javascript">
	function sale_print(id,sa){
		if(sa == '1'){var wlink = 'invoice_aprint.php?bid='+id;}
		if(sa == '2'){var wlink = 'invoice_hprint.php?bid='+id;}
		wlink = 'invoice_aprint.php?bid='+id;
		//var wlink = 'http://yourbizasia.tua-lek.com/billprint.aspx?sano='+id;
		window.open(wlink);
	}
</script>
<?
if(($_REQUEST["fdate"]))$fdate = $_REQUEST["fdate"];
if(($_REQUEST["tdate"]))$tdate = $_REQUEST["tdate"];
if(empty($_REQUEST["fdate"]))$fdate = date("Y-m").'-01';
if(empty($_REQUEST["tdate"]))$tdate = date("Y-m-t");
?>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<br />
<table style="margin-left:20;" width="500" border="0"><tr><td align="center"><fieldset>
<form style="margin-bottom:0;" action="index.php?sessiontab=2&sub=7" method="post">
	<input size="15" type="text" name="fdate" id="fdate" value="<?=$fdate?>" />
	<a href="javascript:NewCal('fdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a>  ถึง
	<input size="15" type="text" name="tdate" id="tdate" value="<?=$tdate?>" />
	<a href="javascript:NewCal('tdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a>
    <input type="submit" value="ค้น" />
</form>
</fieldset></td></tr></table>


<?
require("connectmysql.php");
require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

$sql = "SELECT ".$dbprefix."asaled.pcode,".$dbprefix."asaled.price,";
//$sql .= "CASE ifnull(".$dbprefix."product.pdesc,0) WHEN '0' THEN ".$dbprefix."product_package.pdesc ELSE ".$dbprefix."product.pdesc END AS pdesc, ";
$sql .= "".$dbprefix."product_package.pdesc AS pdesc, ";

$sql .= "SUM(".$dbprefix."asaled.qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."asaled "; 
$sql .= "LEFT JOIN ".$dbprefix."asaleh ON (".$dbprefix."asaled.sano=".$dbprefix."asaleh.id) "; 
//$sql .= "LEFT JOIN ".$dbprefix."product ON (".$dbprefix."product.pcode=".$dbprefix."asaled.pcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."product_package ON (".$dbprefix."product_package.pcode=".$dbprefix."asaled.pcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."member.mcode=".$dbprefix."asaleh.mcode) "; 

if($fdate!=""){
	$sql .= "WHERE ".$dbprefix."asaleh.sadate BETWEEN '$fdate' AND '$tdate' and ".$dbprefix."asaleh.sa_type <> 'H'";
}else{
	$sql .= "WHERE ".$dbprefix."asaleh.sa_type <> 'H'";
}
//$sql .= " and ".$dbprefix."asaleh.inv_code = ''  and ".$dbprefix."asaleh.cancel = '0' ";
$sql .= " and (".$dbprefix."asaled.pcode like 'PK-Pro%' or ".$dbprefix."asaled.pcode like 'PK-Ex%' or ".$dbprefix."asaled.pcode like 'PK-Dis%') and ".$dbprefix."asaleh.cancel = '0' and ".$dbprefix."member.sp_code='".$_SESSION['usercode']."' ";
$sql .= "GROUP BY ".$dbprefix."asaled.pcode";

//echo $sql;

$sql .= " UNION SELECT ".$dbprefix."holddesc.pcode,".$dbprefix."holddesc.price,";
$sql .= "".$dbprefix."product_package.pdesc AS pdesc, ";
$sql .= "SUM(".$dbprefix."holddesc.qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."holddesc "; 
$sql .= "LEFT JOIN ".$dbprefix."holdhead ON (".$dbprefix."holddesc.hono=".$dbprefix."holdhead.hono) "; 
$sql .= "LEFT JOIN ".$dbprefix."product_package ON (".$dbprefix."product_package.pcode=".$dbprefix."holddesc.pcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."member.mcode=".$dbprefix."holdhead.mcode) "; 

if($fdate!=""){
	$sql .= "WHERE ".$dbprefix."holdhead.sadate BETWEEN '$fdate' AND '$tdate' and ".$dbprefix."holdhead.sa_type <> 'I'";
}else{
	$sql .= "WHERE ".$dbprefix."holdhead.sa_type <> 'I'";
}
$sql .= "  and (".$dbprefix."holddesc.pcode like 'PK-Pro%' or ".$dbprefix."holddesc.pcode like 'PK-Ex%' or ".$dbprefix."holddesc.pcode like 'PK-Dis%') and ".$dbprefix."holdhead.cancel = '0' and ".$dbprefix."member.sp_code='".$_SESSION['usercode']."'  ";
$sql .= "GROUP BY ".$dbprefix."holddesc.pcode";

//echo $sql;
//$wherecause = " WHERE ";

	//$link = mysql_connect('localhost', 'root', '1422528');
	//$charset = "SET NAMES 'tis620'"; 
    //mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
	//mysql_select_db('free_style',$link);
	//$rs = mysql_query("SELECT * FROM usaaba_member");
//	echo '<fieldset><legend><b>ข้อมูลการซื้อ</b></legend>';
	if($_GET['state']==1){
		include("serv_sale_del.php");
	}else if($_GET['state']==2){
		include("sale_editadd.php");
	}else{
		$rec = new repGenerator();
		$rec->setQuery($sql);
	//	$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
	//	$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=2&sub=7");
		$rec->setBackLink($PHP_SELF,"sessiontab=2");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("pcode,pdesc,price,qty,amt");
		$rec->setFieldFloatFormat(",,2,0,2");
		$rec->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		$rec->setFieldAlign("center,left,right,right,right");
		$rec->setFieldSpace("10%,50%,15%,10%,15%");
	//	$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id","IMAGE");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=3&sub=6&state=1","post","delfield");
		//$rec->setEdit("index.php","id","id","sessiontab=4&sub=21&state=1");
	//	$rec->setSpecial("./images/Amber-Printer.gif","","sale_print","id,checkcheck","IMAGE","พิมพ์");
		$rec->showRec(1,'SH_QUERY');
		//mysql_close($link);
	}
//	echo "</fieldset>";		
	
	
?>
