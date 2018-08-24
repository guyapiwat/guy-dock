<? require("date_picker.php"); ?>
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
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<br /><center>
<table style="margin-left:20;" width="580" border="0" ><tr><td align="center"><fieldset>
<form style="margin-bottom:0;" action="index.php?sessiontab=<?=$sesstab?>&sub=<?=$_GET["sub"]?>" method="post">
	ตั้งแต่วันที่ <input size="15" type="text" name="fdate" id="dateInput1" value="<?=$fdate?>" />
	  ถึง
	<input size="15" type="text" name="tdate" id="dateInput2" value="<?=$tdate?>" />
    <input type="submit" value="ค้น" />
</form>
</fieldset></td></tr></table><br/><br/>
</center>

<?
require("connectmysql.php");
//require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

echo '<center><font size=4>รายงานยอดขายสินค้า</font></center>';
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT ".$dbprefix."asaled.pcode,".$dbprefix."asaled.price,".$dbprefix."product.cost_price,";
$sql .= "CASE ifnull(".$dbprefix."product.pdesc,0) WHEN '0' THEN ".$dbprefix."product_package.pdesc ELSE ".$dbprefix."product.pdesc END AS pdesc, ";
$sql .= "SUM(".$dbprefix."asaled.qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."asaled "; 
$sql .= "LEFT JOIN ".$dbprefix."asaleh ON (".$dbprefix."asaled.sano=".$dbprefix."asaleh.id) "; 
$sql .= "RIGHT JOIN ".$dbprefix."product ON (".$dbprefix."product.pcode=".$dbprefix."asaled.pcode) "; 
$sql .= "LEFT JOIN ".$dbprefix."product_package ON (".$dbprefix."product_package.pcode=".$dbprefix."asaled.pcode) "; 

if($fdate!=""){
	$sql .= "WHERE ".$dbprefix."asaleh.sadate BETWEEN '$fdate' AND '$tdate' and ".$dbprefix."asaleh.sa_type <> 'I'";
}else{
	$sql .= "WHERE ".$dbprefix."asaleh.sa_type <> 'I'";
}
//$sql .= " and ".$dbprefix."asaleh.inv_code = ''  and ".$dbprefix."asaleh.cancel = '0' ";
$sql .= "    and ".$dbprefix."asaleh.cancel = '0' ";
$sql .= "GROUP BY ".$dbprefix."asaled.pcode";// LEFT JOIN ".$dbprefix."bank ON ".$dbprefix."member.bankcode=".$dbprefix."bank.bankcode";
//echo $sql;

		$rec = new repGenerator();
		$rec->setQuery($sql);
		$rec->setSort($_GET['srt']);
		$rec->setOrder($_GET['ord']);
		//$rec->setLimitPage($_GET['lp']);
		$rec->setLimitPage('ALL');
		if(isset($_POST['skey']))
			$rec->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec->setCause($_GET['skey'],$_GET['scause']);
		$rec->setSize("95%","");
		$rec->setAlign("center");
		$rec->setPageLinkAlign("right");
		//$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("pcode,pdesc,cost_price,price,qty,amt");
		$rec->setFieldFloatFormat(",,2,2,2,2");
		$rec->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคาต้นทุน,ราคา,จำนวน,เป็นเงิน");
		$rec->setFieldAlign("center,left,right,right,right,right");
		$rec->setFieldSpace("10%,50%,10%,10%,10%,10%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		$rec->setSum(true,true,",,true,true,true,true");
		//$rec->setSearch("pcode,pdesc,price,qty,amt");
		//$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
		if($_GET['excel']==1){
			logtext(true,$_SESSION["adminusercode"],'Export Excel : ข้อมูลสมาชิก','');
			$text="uid=".$_SESSION["adminusercode"]." action=member_export_excel =>$sql";
			writelogfile($text);

			$rec->exportXls("ExportXls","member".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec->download("ExportXls","member".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
  		$rec->setSpace($str);
		$rec->showRec(1,'SH_QUERY');		//---------------------------------
	//}



if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

echo '<center><font size=4>รายงานยอดขาย Package</font></center>';
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT ".$dbprefix."asaled.pcode,".$dbprefix."asaled.price,";
$sql .= "CASE ifnull(".$dbprefix."product.pdesc,0) WHEN '0' THEN ".$dbprefix."product_package.pdesc ELSE ".$dbprefix."product.pdesc END AS pdesc, ";

$sql .= "SUM(".$dbprefix."asaled.qty) AS qty,SUM(amt) AS amt FROM ".$dbprefix."asaled "; 
$sql .= "LEFT JOIN ".$dbprefix."asaleh ON (".$dbprefix."asaled.sano=".$dbprefix."asaleh.id) "; 
$sql .= "LEFT JOIN ".$dbprefix."product ON (".$dbprefix."product.pcode=".$dbprefix."asaled.pcode) "; 
$sql .= "RIGHT JOIN ".$dbprefix."product_package ON (".$dbprefix."product_package.pcode=".$dbprefix."asaled.pcode) "; 

if($fdate!=""){
	$sql .= "WHERE ".$dbprefix."asaleh.sadate BETWEEN '$fdate' AND '$tdate' and ".$dbprefix."asaleh.sa_type <> 'I'";
}else{
	$sql .= "WHERE ".$dbprefix."asaleh.sa_type <> 'I'";
}
//$sql .= " and ".$dbprefix."asaleh.inv_code = ''  and ".$dbprefix."asaleh.cancel = '0' ";
$sql .= "    and ".$dbprefix."asaleh.cancel = '0' ";
$sql .= "GROUP BY ".$dbprefix."asaled.pcode";// LEFT JOIN ".$dbprefix."bank ON ".$dbprefix."member.bankcode=".$dbprefix."bank.bankcode";
//echo $sql;

		$rec_2 = new repGenerator();
		$rec_2->setQuery($sql);
		$rec_2->setSort($_GET['srt']);
		$rec_2->setOrder($_GET['ord']);
		//$rec_2->setLimitPage($_GET['lp']);
		$rec_2->setLimitPage('ALL');
		if(isset($_POST['skey']))
			$rec_2->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec_2->setCause($_GET['skey'],$_GET['scause']);
		$rec_2->setSize("95%","");
		$rec_2->setAlign("center");
		$rec_2->setPageLinkAlign("right");
		//$rec_2->setPageLinkShow(false,false);
		$rec_2->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate");
		$rec_2->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec_2->setCurPage($page);
		$rec_2->setShowField("pcode,pdesc,price,qty,amt");
		$rec_2->setFieldFloatFormat(",,2,0,2");
		$rec_2->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		$rec_2->setFieldAlign("center,left,right,right,right");
		$rec_2->setFieldSpace("10%,50%,15%,10%,15%");
		//$rec_2->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec_2->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec_2->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		$rec_2->setSum(true,true,",,,true,true");
		//$rec_2->setSearch("pcode,pdesc,price,qty,amt");
		//$rec_2->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		//$rec_2->setEdit("index.php","id","id","sessiontab=1&sub=2");
		if($_GET['excel_2']==1){
			logtext(true,$_SESSION["adminusercode"],'Export Excel : รายงานยอดขาย Package','');
			$text="uid=".$_SESSION["adminusercode"]." action=member_export_excel =>$sql";
			writelogfile($text);

			$rec_2->exportXls("ExportXls","รายงานยอดขาย Package".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec_2->download("ExportXls","รายงานยอดขาย Package".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec_2->setSpace($str);
		}
		$str = "<fieldset><a href='".$rec->getParam()."&excel_2=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec_2->setSpace($str);
		$rec_2->showRec(1,'SH_QUERY');
		//---------------------------------
	//}


$sql = "select * from ".$dbprefix."invent LIMIT 0,1 ";
$result = mysql_query($sql);
for($i=0;$i<mysql_num_rows($result);$i++){
	$data = mysql_fetch_object($result);
	$lid = $data->inv_code;
	$inv_desc = $data->inv_desc;

echo '<center><font size=4>รายงานยอดขายสินค้าใน Package</font></center>';
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT p.pdesc,p.pcode,SUM(p.qty*d.qty),SUM(p.qty*d.qty) as qty FROM ".$dbprefix."asaled d
			left JOIN ".$dbprefix."asaleh h on (h.id= d.sano )
			RIGHT JOIN ".$dbprefix."product_package1 p on (p.package= d.pcode)";
if($fdate!=""){
	$sql .= "WHERE h.cancel = 0 and h.sadate BETWEEN '$fdate' AND '$tdate'";
}else{
	$sql .= "	WHERE h.cancel = 0";
}

$sql .= "	GROUP by p.pcode
			ORDER BY p.pcode  DESC";
//echo $sql;

		$rec_3 = new repGenerator();
		$rec_3->setQuery($sql);
		$rec_3->setSort($_GET['srt']);
		$rec_3->setOrder($_GET['ord']);
		//$rec_3->setLimitPage($_GET['lp']);
		$rec_3->setLimitPage('ALL');
		if(isset($_POST['skey']))
			$rec_3->setCause($_POST['skey'],$_POST['scause']);
		else if(isset($_GET['skey']))
			$rec_3->setCause($_GET['skey'],$_GET['scause']);
		$rec_3->setSize("95%","");
		$rec_3->setAlign("center");
		$rec_3->setPageLinkAlign("right");
		//$rec_3->setPageLinkShow(false,false);
		$rec_3->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate");
		$rec_3->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec_3->setCurPage($page);
		$rec_3->setShowField("pcode,pdesc,qty");
		$rec_3->setFieldFloatFormat(",,2,0,2");
		$rec_3->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,จำนวน");
		$rec_3->setFieldAlign("center,left,right,right,right");
		$rec_3->setFieldSpace("10%,80%,15%,10%,15%");
		//$rec_3->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec_3->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec_3->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		$rec_3->setSum(true,true,",,,true,true");
		//$rec_3->setSearch("pcode,pdesc,price,qty,amt");
		//$rec_3->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		//$rec_3->setEdit("index.php","id","id","sessiontab=1&sub=2");
		if($_GET['excel_3']==1){
			logtext(true,$_SESSION["adminusercode"],'Export Excel : รายงานยอดขายสินค้าใน Package','');
			$text="uid=".$_SESSION["adminusercode"]." action=member_export_excel =>$sql";
			writelogfile($text);

			$rec_3->exportXls("ExportXls","รายงานยอดขายสินค้าใน Package".date("Ymd").".xls","SH_QUERY");
			$str = "<fieldset><a href='".$rec_3->download("ExportXls","รายงานยอดขายสินค้าใน Package".date("Ymd").".xls")."' >";
			$str .= "<img border='0' src='./images/download.gif'>โหลด Excel</a></fieldset>";
			//$rec->getParam();
			$rec_3->setSpace($str);
		}

		$str = "<fieldset><a href='".$rec->getParam()."&excel_3=1' target='_self'>";
		$str .= "<img border='0' src='./images/excel.gif'>สร้าง Excel</a></fieldset>";
		$rec_3->setSpace($str);
		$rec_3->showRec(1,'SH_QUERY');
		//---------------------------------
	//}
}
  
	?>