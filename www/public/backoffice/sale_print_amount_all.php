<?
 
if(!empty($_GET['s_list'])){$s_list = $_GET['s_list'];}else {if(!empty($_POST['s_list'])){$s_list = $_POST['s_list'];}else{$s_list='50';}}
?><? require("date_picker.php"); ?>
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
if (isset($_GET["inv"])){$inv=$_GET["inv"];} else {$inv="";}

?>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<br />
<?
//require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

echo '<center><font size=4>รายงานยอดขายสินค้า</font></center>';
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT ".$dbprefix."asaled.pcode,".$dbprefix."asaled.price,";
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
if(!empty($inv))$sql .= " and ".$dbprefix."asaleh.inv_code = '$inv' ";
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
		$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("pcode,pdesc,price,qty,amt");
		$rec->setFieldFloatFormat(",,2,0,2");
		$rec->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		$rec->setFieldAlign("center,left,right,right,right");
		$rec->setFieldSpace("10%,50%,15%,10%,15%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		$rec->setSum(true,true,",,,true,true");
		//$rec->setSearch("pcode,pdesc,price,qty,amt");
		//$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
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

if(!empty($inv))$sql .= " and ".$dbprefix."asaleh.inv_code = '$inv' ";

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
		$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("pcode,pdesc,price,qty,amt");
		$rec->setFieldFloatFormat(",,2,0,2");
		$rec->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		$rec->setFieldAlign("center,left,right,right,right");
		$rec->setFieldSpace("10%,50%,15%,10%,15%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		$rec->setSum(true,true,",,,true,true");
		//$rec->setSearch("pcode,pdesc,price,qty,amt");
		//$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		//$rec->setEdit("index.php","id","id","sessiontab=1&sub=2");
		$rec->showRec(1,'SH_QUERY');
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
if(!empty($inv))$sql .= " and h.inv_code = '$inv' ";

$sql .= "	GROUP by p.pcode
			ORDER BY p.pcode  DESC";
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
		$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("pcode,pdesc,qty");
		$rec->setFieldFloatFormat(",,0,2");
		$rec->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,จำนวน");
		$rec->setFieldAlign("center,left,right,right,right");
		$rec->setFieldSpace("10%,80%,15%,10%,15%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		$rec->setSum(true,true,",,true");
		//$rec->setSearch("pcode,pdesc,price,qty,amt");
		//$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	//}
}
  $sqlwhere = "";
if($fdate!="")$sqlwhere .= " and h.sadate BETWEEN '$fdate' AND '$tdate'";
$sqlwhere .= " and h.cancel = 0 and h.sa_type <> 'TE'";
if(!empty($inv))$sqlwhere .= " and h.inv_code = '$inv' ";

$sql = "select * from ".$dbprefix."invent LIMIT 0,1 ";
$result = mysql_query($sql);
for($i=0;$i<mysql_num_rows($result);$i++){
	$data = mysql_fetch_object($result);
	$lid = $data->inv_code;
	$inv_desc = $data->inv_desc;

echo '<center><font size=4>รายงานยอดขายสินค้า และ สินค้าใน Package</font></center>';
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

$sql = "select pcode,pdesc,sum(qty) as qty from ( ";
$sql .= "SELECT p.pcode,p.pdesc,SUM(p.qty*d.qty) as qty FROM ".$dbprefix."asaled d
left JOIN ".$dbprefix."asaleh h on (h.id= d.sano )
RIGHT JOIN ".$dbprefix."product_package1 p on (p.package= d.pcode) where 1=1   ";
$sql .= $sqlwhere;
$sql .= " GROUP by p.pcode ";

$sql .= " UNION ALL ";

$sql .= "SELECT d.pcode,p.pdesc,SUM(d.qty) AS qty  FROM ".$dbprefix."asaled as d "; 
$sql .= "LEFT JOIN ".$dbprefix."asaleh as h ON (d.sano=h.id) "; 
$sql .= "RIGHT JOIN ".$dbprefix."product as p ON (p.pcode=d.pcode) "; 
$sql .= "where h.sa_type <> 'TE'  "; 

if($fdate!=""){
	$sql .= "and h.sadate BETWEEN '$fdate' AND '$tdate' and h.sa_type <> 'I'";
}else{
	$sql .= "and h.sa_type <> 'I'";
}
$sql .= "    and h.cancel = '0' ";
if(!empty($inv))$sql .= " and h.inv_code = '$inv'   ";
$sql .= " and ifnull(p.pdesc,0) != '0' GROUP BY d.pcode ";
$sql .= " ) as ppp where 1=1 group by ppp.pcode ";

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
		$rec->setPageLinkShow(false,false);
		$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate");
		$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
		if(isset($page))
			$rec->setCurPage($page);
		$rec->setShowField("pcode,pdesc,qty");
		$rec->setFieldFloatFormat(",,0,2");
		$rec->setFieldDesc("รหัสสินค้า,รายละเอียดสินค้า,จำนวน");
		$rec->setFieldAlign("center,left,right,right,right");
		$rec->setFieldSpace("10%,80%,15%,10%,15%");
		//$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
		//$rec->setDel("index.php","id","id","sessiontab=1&sub=2");
		//$rec->setFromDelAttr("maindel","./index.php?sessiontab=1&sub=2&state=1","post","delfield");
		$rec->setSum(true,true,",,true");
		//$rec->setSearch("pcode,pdesc,price,qty,amt");
		//$rec->setSearchDesc("รหัสสินค้า,รายละเอียดสินค้า,ราคา,จำนวน,เป็นเงิน");
		$rec->showRec(1,'SH_QUERY');
		//---------------------------------
	//}
}
  
	?>