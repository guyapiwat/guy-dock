<?
$fdate = $_POST['strfdate']==""?$_GET['strfdate']:$_POST['strfdate'];
$tdate = $_POST['strtdate']==""?$_GET['strtdate']:$_POST['strtdate'];
$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
$level = $_POST['level']==""?$_GET['level']:$_POST['level'];
$lr = $_POST['lr']==""?$_GET['lr']:$_POST['lr'];
$cmc = $_POST['cmc']==""?$_GET['cmc']:$_POST['cmc'];
if (isset($_GET["lr"])){$lr=$_GET["lr"];}else{$lr="";}

require("connectmysql.php");
require("./cls/repGenerator_b.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql  = "select mcode,upa_code,fdate ";
$sql .= ",CASE lr WHEN '1' THEN pv ELSE '0' END AS lcl ";
$sql .= ",CASE lr WHEN '2' THEN pv ELSE '0' END AS lcc ";
$sql .= "  from ".$dbprefix."bm as a  where 1=1	";
if($fdate !=""){
	$sql .= " and  a.fdate >= '$fdate' and a.tdate <= '$tdate' ";
}
if($fmcode!=""){
	$sql .= " and a.rcode='".$fmcode."' ";
}
if($lr !=""){
 $sql .=" and a.lr = '$lr' ";
}
$cmc = $_SESSION["usercode"];
$sql .=" and a.upa_code = '$cmc' ";

$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" id ":$_GET['ord']);
$rec->setLimitPage($_GET['lp']);	
if(isset($_POST['skey']))
	$rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))
	$rec->setCause($_GET['skey'],$_GET['scause']);
$rec->setSize("95%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");
//$rec->setPageLinkShow(false,false);
$rec->setLink($PHP_SELF,"sessiontab=5&sub=66&ftrcode=$ftrcode&fmcode=$fmcode&strfdate=$fdate&strtdate=$tdate&lr=$lr");
$rec->setBackLink($PHP_SELF,"sessiontab=5");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("fdate,mcode,upa_code,lcl,lcc");
$rec->setFieldDesc($wording_lan["Date"].",".$wording_lan["tab4"]["10_2"].",".$wording_lan["get_id"].",".$wording_lan["PVLeft"].",".$wording_lan["PVRight"]);
$rec->setFieldAlign("center,center,center,right,right");
//	$rec->setFieldLink(",index.php?sessiontab=2&sub=1&cmc=,,");
$rec->setFieldSpace("10%,25%,25%,25%,25%");//10
$rec->setFieldFloatFormat(",,,2,2");
$rec->setSum(true,false,",,,true,true");
$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");
$rec->showRec(1,'SH_QUERY');

?>