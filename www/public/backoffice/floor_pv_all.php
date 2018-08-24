<?
if(isset($_POST["ftrcode1"]))$ftrcode1 = $_POST["ftrcode1"];else if(isset($_GET["ftrcode1"]))$ftrcode1 = $_GET["ftrcode1"];

$wwhere = " a.rcode between '".$ftrcode1."' and '".$ftrcode1."' ";
$sql="select min(fdate) as fdate1,max(tdate) as tdate1 from ".$dbprefix."around a where  $wwhere  ";
$result=mysql_query($sql);
if (mysql_num_rows($result)>'0') {
	$row= mysql_fetch_array($result, MYSQL_ASSOC);
	$fdate=$row["fdate1"];
	$tdate=$row["tdate1"];
}

if(isset($_POST["cmc"])){$mcode = $_POST["cmc"];}else if(isset($_GET["cmc"])){$mcode = $_GET["cmc"];}
if(isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if(isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="";}
if(isset($_GET["chklevel"])){$chklevel=$_GET["chklevel"];} else {$chklevel=0;}

$w1 = "(SELECT (mcode_level+'".$chklevel."') as level FROM ali_structure_binary WHERE mcode_ref = '".$mcode."' )";
$sql_index = "SELECT mcode_index FROM ali_structure_binary WHERE mcode_ref = '".$mcode."' ";
$rs_index = mysql_query($sql_index);
if(mysql_num_rows($rs_index) > 0){
	$obj_xx = mysql_fetch_object($rs_index);
	$w2 = $obj_xx->mcode_index;
}
$sqlxx = "SELECT mcode_ref  FROM ali_structure_binary WHERE mcode_level = ".$w1." and mcode_index LIKE '".$w2."%' ";
$rsxx = mysql_query($sqlxx);
$xx_rows = mysql_num_rows($rsxx);
if($xx_rows > 0){
	for($i=0;$i<$xx_rows;$i++){
		$object = mysql_fetch_object($rsxx);
		if($i == 0)$w_mcode = "and (";
		$w_mcode .= "mcode LIKE '".$object->mcode_ref."' "; 
		if($i != $xx_rows-1){$w_mcode .= "or ";}
		else{$w_mcode .= " )";}
	}
}
else{
	$w_mcode = "and mcode LIKE '9999999'";
}
$where1 = "and cancel = 0 ";
$where2 = "and cancel = 0 ";
$where3 = "";

require("connectmysql.php");
if($member == "on")require("../backoffice/cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

	$sql  = "SELECT tb.sano, tb.sadate, tb.sctime, tb.mcode, tb.total, tb.tot_pv, m.name_t, tb.uid ";
	$sql .= ",CASE tb.sa_type WHEN 'A' THEN 'บิลปกติ'  WHEN 'B' THEN 'รักษายอด' WHEN 'VA' THEN 'special point' WHEN 'D' THEN 'Dis.' WHEN 'H' THEN 'Hold' END AS ability ";
	$sql .= ",CASE tb.sa_type WHEN 'A' THEN tb.tot_pv WHEN 'D' THEN 0 WHEN 'H' THEN 0 END AS tot_pvxxx ";
	$sql .= "FROM ( ";
	$sql .= "SELECT sano, sadate, sctime, mcode, total, tot_pv, sa_type, uid FROM ali_asaleh WHERE 1=1 $where1 $w_mcode ";
	$sql .= "UNION ALL "; 
	$sql .= "SELECT hono as sano, sadate, sctime, mcode, total, tot_pv, sa_type, uid FROM ali_holdhead WHERE 1=1 $where2 $w_mcode ";
	//$sql .= "UNION ALL "; 
	//$sql .= "SELECT 'Special Point' as sano, sadate, '0000-00-00' as sctime, mcode, 0 as total, tot_pv FROM ali_special_point WHERE 1=1 $where3 $w_mcode ";
	$sql .= ") as tb ";
	$sql .= "LEFT JOIN ali_member m ON (tb.mcode = m.mcode) ";
	$sql .= "WHERE 1=1 ";

	//echo $sql;
		
	$rec = new repGenerator();
		
	$rec->setQuery($sql);
		
	$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		
	$rec->setOrder($_GET['ord']==""?" sano ":$_GET['ord']);
		
	$rec->setLimitPage($_GET['lp']);	
		
	if(isset($_POST['skey']))$rec->setCause($_POST['skey'],$_POST['scause']);
		
	else if(isset($_GET['skey']))$rec->setCause($_GET['skey'],$_GET['scause']);
		
	$rec->setSize("95%","");
		
	$rec->setAlign("center");
		
	$rec->setPageLinkAlign("right");
		
	$rec->setLink($PHP_SELF,"sessiontab=$tab&sub=$sub&cmc=$mcode&chklevel=$chklevel");
		$rec->setBackLink($PHP_SELF,"sessiontab=$tab");
		
	if(isset($page))$rec->setCurPage($page);
		$rec->setShowField("sano,mcode,name_t,sadate,ability,tot_pvxxx,total,uid");
	$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,ชนิด,PV,จำนวนเงินรวม,ผู้บันทึก");
		
	$rec->setFieldFloatFormat(",,,,,2,2,");
		$rec->setFieldAlign("left,center,left,center,center,right,right,center");
	
	$rec->setFieldSpace("10%,10%,30%,10%,10%,10%,10%,10%");
 		
	//$rec->setSearch("sano,sadate,mcode");
		
	//$rec->setSearchDesc("เลขบิล,วันที่,รหัสผู้ซื้อ");
		
	$rec->setSum(true,false,",,,,,true,true,");
		
	$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		
	$rec->showRec(1,'SH_QUERY');
	

?>