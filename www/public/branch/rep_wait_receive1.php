<?  
//include("rpdialog.php");
require("date_picker.php");
if(!empty($_POST["fdate"])){$fdate = $_POST["fdate"];}else{$fdate = "";}
if(!empty($_POST["tdate"])){$tdate = $_POST["tdate"];}else{$tdate = "";}
if(!empty($_POST["mcode"])){$mcode = $_POST["mcode"];}else{$mcode = "";}
if(!empty($_POST["sano"])){$sano = $_POST["sano"];}else{$sano = "";}
if(!empty($_POST["name_t"])){$name_t = $_POST["name_t"];}else{$name_t = "";}
if(!empty($_POST["s_list"])){$s_list = $_POST["s_list"];}else{$s_list = "";}
rpdialog_wait_receive($fdate,$tdate,$mcode,$sano,$name_t,$s_list);

require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

	$sql  = "SELECT ";
	$sql .= "CASE WHEN tb.pdesc IS NULL THEN CONCAT('<b>',tb.mcode,'</b>') ELSE '' END AS mcode ";
	$sql .= ",CASE WHEN tb.pdesc IS NULL THEN CONCAT('<b>',tb.name_t,'</b>') ELSE '' END AS name_t ";
	$sql .= ",CASE WHEN tb.pdesc IS NOT NULL THEN CONCAT('',tb.pcode,'') ELSE '' END AS pcode ";
	$sql .= ",tb.pdesc ";
	$sql .= ", CASE WHEN tb.pdesc IS NULL THEN CONCAT('<font color=red>',tb.qq,'</font>') ELSE tb.qq END AS qq ";
	$sql .= "FROM ( ";
	$sql .= "SELECT r.mcode, r.name_t, r.pcode, r.pdesc, SUM(r.qq) as qq FROM ( ";
	$sql .= "SELECT m.mcode, m.name_t, d.pcode, d.pdesc, SUM(d.qty) AS qq ";
	$sql .= "FROM ali_asaled d LEFT JOIN ali_asaleh h ON (d.sano = h.id) ";
	$sql .= "LEFT JOIN ali_member m ON (h.mcode = m.mcode) ";
	$sql .= "WHERE h.receive = '0' ";
	$sql .= "GROUP BY h.mcode,d.pcode ";
	$sql .= ") as r GROUP BY r.mcode,r.pdesc WITH ROLLUP ";
	$sql .= ") tb ";
	$sql .= "WHERE tb.mcode <> '' ";
	if(!empty($fdate))$sql .= "and tb.sadate >= '".$fdate."' ";
	if(!empty($tdate))$sql .= "and tb.sadate <= '".$tdate."' ";
	if(!empty($mcode))$sql .= "and tb.mcode LIKE '".$mcode."' ";
	if(!empty($sano))$sql .= "and tb.sano LIKE '".$sano."' ";
	if(!empty($name_t))$sql .= "and tb.name_t LIKE '".$name_t."' ";
	//$sql .= "ORDER BY tb.mcode,tb.qq DESC,tb.pdesc";
	
//echo $sql;

$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" tb.mcode,tb.qq DESC,tb.pdesc ":$_GET['ord']);
//$rec->setLimitPage($_GET['lp']);
$rec->setLimitPage('1000');
if(isset($_POST['skey'])) 
	$rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))
	$rec->setCause($_GET['skey'],$_GET['scause']);
$rec->setSize("95%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");
$rec->setPageLinkShow(true,true);
$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&fdate=$fdate&tdate=$tdate&inv=$inv&pcode=$pcode");
$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("mcode,name_t,pcode,pdesc,qq");
$rec->setFieldDesc("รหัสสมาชิก,ชื่อสมาชิก,รหัสสินค้า,ชื่อสินค้า,จำนวน");
$rec->setFieldFloatFormat(",,,,");
$rec->setFieldAlign("center,left,center,left,right");
$rec->setFieldSpace("15%,45%,10%,20%,10%");
$rec->showRec(1,'SH_QUERY');


  
?>