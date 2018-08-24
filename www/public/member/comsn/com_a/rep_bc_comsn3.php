<? 
include("./global.php");
require("connectmysql.php");
require("./cls/repGenerator.php");
if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_GET["fdate"])){$fdate=$_GET["fdate"];}else{$fdate="";}
if (isset($_GET["lr"])){$lr=$_GET["lr"];}else{$lr="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	//$cmc=$_SESSION["usercode"];
}

$sql="SELECT rcode,fdate,tdate FROM ".$dbprefix."around WHERE calc='1'  ORDER BY rcode DESC LIMIT 1";
$rs = mysql_query($sql);
$where_cause = "";
$max_rcode = 0;
if(mysql_num_rows($rs)>0){
	$where_cause = "AND fdate>'".mysql_result($rs,0,'tdate')."' ";
}
$where_cause .= " and lr = '$lr' ";
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "select * from ".$dbprefix."bm1 where upa_code = '$cmc' $where_cause ";
//echo $sql;

$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" fdate ":$_GET['ord']);
$_GET['lp'] = "500";
$rec->setLimitPage($_GET['lp']);
$rec->setSize("95%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");
//$rec->setPageLinkShow(false,false);
$rec->setLink($PHP_SELF,"sessiontab=5&sub=116&cmc=$cmc&lr=$lr&fdate=$fdate");
$rec->setBackLink($PHP_SELF,"sessiontab=5");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("sano,mcode,fdate,pv");
$rec->setFieldDesc("".$wording_lan["tab4"]["10_1"].",".$wording_lan["mcode"].",".$wording_lan["Date"].",".$wording_lan["sub21_2"]."");
$rec->setFieldAlign("center,center,center,right,right");
//$rec->setFieldSpace("9%,9%,53%,9%,9%,9%,9%,9%,10%");//10
$rec->setFieldFloatFormat(",,,2");
$rec->setSum(true,false,",,,true");
$rec->showRec(1,'SH_QUERY');
mysql_close($link);
?>