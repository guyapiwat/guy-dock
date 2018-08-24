<?

require("./cls/repGenerator.php");
if(isset($_POST["ftrcode1"]))$ftrcode1 = $_POST["ftrcode1"];
else if(isset($_GET["ftrcode1"]))
	$ftrcode1 = $_GET["ftrcode1"];


if(isset($_POST["cmc"]))$mcode = $_POST["cmc"];
else if(isset($_GET["cmc"]))
$mcode = $_GET["cmc"];
$mcode = $_SESSION["usercode"];
if (isset($_GET["strfdate"])){$strfdate=$_GET["strfdate"];} else {$strfdate="";}
if (isset($_GET["strtdate"])){$strtdate=$_GET["strtdate"];} else {$strtdate="";}
if (isset($_GET["fmcode"])){$fmcode=$_GET["fmcode"];} else {$fmcode="";}
if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if (isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="";}
require("connectmysql.php");

if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}

$sql  = "SELECT tb.id,tb.sano,tb.smcode1,m.name_t,tb.sadate,tb.type,tb.tot_pv,tb.total,tb.uid  FROM ( ";
$sql .= "SELECT ah.cancel, ah.id, ah.uid, ah.sano as sano, DATE_FORMAT(ah.sadate, '%Y-%m-%d') as sadate, ah.tot_pv, ah.tot_bv, ah.tot_fv, ah.total";
$sql .= ", ah.mcode as smcode1, '<img src=./images/false.gif>' AS sendsend";
$sql .= ", CASE ah.inv_code WHEN '' THEN 'บริษัท' ELSE ah.inv_code END AS inv_code, 'บิลขายแจงยอด' as type ";
$sql .= ", '<img src=./images/false.gif>' AS asend, ah.sa_type, ah.ref ";
$sql .= "FROM ali_asaleh ah ";
$sql .= "UNION ALL ";
$sql .= "SELECT hh.cancel, hh.id, hh.uid, hh.sano as sano, DATE_FORMAT(hh.sadate, '%Y-%m-%d') as sadate, hh.tot_pv, hh.tot_bv, hh.tot_fv, hh.total";
$sql .= ", hh.mcode as smcode1, '<img src=./images/false.gif>' AS sendsend";
$sql .= ", CASE hh.inv_code WHEN '' THEN 'บริษัท' ELSE hh.inv_code END AS inv_code, 'บิลขายแจงยอด' as type ";
$sql .= ", '<img src=./images/false.gif>' AS asend, hh.sa_type, hh.ref ";
$sql .= "FROM ali_holdhead hh ";
$sql .= ") as tb ";
$sql .= "LEFT JOIN ali_member m ON (tb.smcode1=m.mcode) ";
$sql .= "WHERE tb.cancel = '0' and tb.sa_type = 'A' ";
if(!empty($fmcode))$sql .= " and tb.smcode1 = '".$fmcode."' " ;
//if(!empty($mcode))$sql .= " and tb.ref = '".$mcode."' " ;
if(!empty($strfdate))$sql .= " and tb.sadate >= '".$strfdate."'  and tb.sadate <= '".$strtdate."'  ";




//echo $sql;

		
	$rec = new repGenerator();
		
	$rec->setQuery($sql);
		
	$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
		
	$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
		
	$rec->setLimitPage($_GET['lp']);	
		
	if(isset($_POST['skey']))$rec->setCause($_POST['skey'],$_POST['scause']);
		
	else if(isset($_GET['skey']))$rec->setCause($_GET['skey'],$_GET['scause']);
		
	$rec->setSize("95%","");
		
	$rec->setAlign("center");
		
	$rec->setPageLinkAlign("right");
		
	$rec->setLink($PHP_SELF,"sessiontab=$tab&sub=$sub&strfdate=$strfdate&strtdate=$strtdate&fmcode=$fmcode");
		$rec->setBackLink($PHP_SELF,"sessiontab=$tab");
		
	if(isset($page))$rec->setCurPage($page);
		$rec->setShowField("sano,smcode1,name_t,sadate,type,tot_pv,total,uid");
	$rec->setFieldDesc("เลขบิล,รหัสผู้ซื้อ,ชื่อผู้ซื้อ,วันที่ซื้อ,ชนิด,PV,จำนวนเงินรวม,ผู้บันทึก");
		
	$rec->setFieldFloatFormat(",,,,,2,2,");
		$rec->setFieldAlign("center,center,left,center,center,right,right,right");
	
	$rec->setFieldSpace("10%,10%,30%,10%,10%,10%,10%,10%");
 		
	//$rec->setSearch("sano,sadate,".$dbprefix."holdhead.mcode");
		
	//$rec->setSearchDesc("เลขบิล,วันที่,รหัสผู้ซื้อ");
		
	$rec->setSum(true,false,",,,,,true,true,");
		
	$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
		
	$rec->showRec(1,'SH_QUERY');
	
	


?>