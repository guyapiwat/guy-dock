<?
require("connectmysql.php");
require("./cls/repGenerator.php");
if (isset($_GET["sessiontab"])){$tab=$_GET["sessiontab"];} else {$tab="";}
if (isset($_GET["sub"])){$sub=$_GET["sub"];} else {$sub="sub";}
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
$sql = "SELECT l.mcode,m.name_t,l.sadate,l.sano,l._in,l._out,l.total,l._option  FROM ali_log_eatoship l "; 
$sql .= "LEFT JOIN ".$dbprefix."member m ON (l.mcode = m.mcode) ";                                                                
$sql .= "where l.mcode = '".$_SESSION["usercode"]."' ";
//$sql .= " and l._option NOT LIKE '%recom%' ";        

if($strfdate !="" and $strtdate !="")$sql.=" and l.sadate BETWEEN '$strfdate' and '$strtdate'";
$rec = new repGenerator();
$rec->setQuery($sql);  
if($_GET['report'] == '2'){
	$rec->setSort($_GET['srt']==""?"UP":$_GET['srt']);
	$rec->setOrder($_GET['ord']==""?" l.id ":$_GET['ord']);
}else{
	$rec->setSort("UP");
	$rec->setOrder("l.id");
}
$rec->setLink($PHP_SELF,"sessiontab=".$sesstab."&sub=".$_GET["sub"]."&strfdate=".$_GET["strfdate"]."&strtdate=".$_GET["strtdate"]."&report=2");
$rec->setBackLink($PHP_SELF,"sessiontab=".$sesstab."");                             
$rec->setLimitPage("1000");                       
$rec->setSize("95%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");                       
$rec->setShowField("sadate,_in,_out,total,_option");
$rec->setFieldFloatFormat(",2,2,2,");  
$rec->setFieldDesc("".$wording_lan["day"].",".$wording_lan["import"].",".$wording_lan["export"].",".$wording_lan["balances"].",".$wording_lan["Note"]."");  
$rec->setFieldAlign("center,right,right,right,left");
// $rec->setFieldSpace("5%,10%,5%,30%,10%,10%,10%,20%");    
$rec->setSum(true,false,",true,true,,");  
$rec->setHLight("cancel",1,array("#FF7777","#FF9999"),"HIDE");             
$rec->showRec(1,'SH_QUERY');             
/////////// LOG //////////////

?>