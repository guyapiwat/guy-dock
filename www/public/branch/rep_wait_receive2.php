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
	$sql .= "CASE WHEN r.pdesc IS NULL THEN CONCAT('<b>',r.sano,'</b>') ELSE '' END AS sano ";
	$sql .= ", CASE WHEN r.pdesc IS NULL THEN CASE r.sa_type WHEN 'A' THEN CONCAT('<b>บิลปกติ</b>') WHEN 'C' THEN CONCAT('<b>รักษายอดย้อนหลัง</b>') WHEN 'Q' THEN CONCAT('<b>รักษายอดปัจจุบัน</b>') WHEN 'H' THEN CONCAT('<b>Hold</b>') END ELSE '' END AS sa_type ";
	$sql .= ", CASE WHEN r.pdesc IS NULL THEN CONCAT('<b>',r.sadate,'</b>') ELSE '' END AS sadate ";
	$sql .= ", CASE WHEN r.pdesc IS NULL THEN CONCAT('<b>',r.total,'</b>') ELSE '' END AS total ";
	$sql .= ", CASE WHEN r.pdesc IS NULL THEN CONCAT('<b>',r.tot_pv,'</b>') ELSE '' END AS tot_pv ";
	$sql .= ", CASE WHEN r.pdesc IS NULL THEN CONCAT('<b>',r.inv_code,'</b>') ELSE '' END AS inv_code ";
	$sql .= ", CASE WHEN r.pdesc IS NULL THEN CONCAT('<b>',r.mcode,'</b>') ELSE '' END AS mcode ";
	$sql .= ", CASE WHEN r.pdesc IS NULL THEN CONCAT('<b>',r.name_t,'</b>') ELSE '' END AS name_t ";
	$sql .= ", CASE WHEN r.pdesc IS NOT NULL THEN CONCAT('',r.pcode,'') ELSE '' END AS pcode ";
	$sql .= ", CASE WHEN r.pdesc IS NULL THEN CONCAT('<font color=red>',r.qq,'</font>') ELSE r.qq END AS qq ";
	$sql .= ", r.pdesc ";
	$sql .= "FROM ( ";
	$sql .= "SELECT h.sano, d.pcode, d.pdesc, SUM(d.qty) AS qq, h.sadate, h.id, m.mcode, m.name_t, h.receive, h.inv_code, h.sa_type, h.total, h.tot_pv ";
	$sql .= "FROM ali_asaled d ";
	$sql .= "LEFT JOIN ali_asaleh h ON (d.sano = h.id) ";
	$sql .= "LEFT JOIN ali_member m ON (h.mcode = m.mcode) ";
	$sql .= "GROUP BY d.sano,d.pdesc WITH ROLLUP ";
	$sql .= ") r  ";
	$sql .= "WHERE 1=1 and r.receive = '0' ";
	if(!empty($fdate))$sql .= "and r.sadate >= '".$fdate."' ";
	if(!empty($tdate))$sql .= "and r.sadate <= '".$tdate."' ";
	if(!empty($mcode))$sql .= "and r.mcode LIKE '".$mcode."' ";
	if(!empty($sano))$sql .= "and r.sano LIKE '".$sano."' ";
	if(!empty($name_t))$sql .= "and r.name_t LIKE '".$name_t."' ";
	//$sql .= "ORDER BY r.id DESC,r.sadate DESC ,r.qq DESC,r.pdesc ";
//echo $sql;
$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" r.id,r.sadate,r.qq,r.pdesc ":$_GET['ord']);
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
$rec->setShowField("mcode,name_t,sano,sa_type,sadate,inv_code,total,tot_pv,pcode,pdesc,qq");
$rec->setFieldDesc("รหัสสมาชิก,ชื่อสมาชิก,เลขที่บิล,ประเภท,วันที่ซื้อ,สาขา,จำนวนเงิน,PV,รหัสสินค้า,ชื่อสินค้า,จำนวน");
$rec->setFieldFloatFormat(",,,,,,,,,,");
$rec->setFieldAlign("center,left,center,center,center,center,right,right,center,left,right");
$rec->setFieldSpace("6%,11%,13%,10%,7%,6%,7%,7%,7%,19%,7%");
$rec->showRec(1,'SH_QUERY');


  
?>