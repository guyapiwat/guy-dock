<?
require("connectmysql.php");
require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if (isset($_GET["lr"])){$lr=$_GET["lr"];} else {$lr="";}

?>
<table width='100%' ><tr>
<td width='33%' valign="top"><h2 align="center"><a href="index.php?sessiontab=2&sub=3&lr=1">ขาซ้าย</a></h2><hr/>
</td>
<td width='33%' valign="top"><h2 align="center"><a href="index.php?sessiontab=2&sub=3">ทั้งหมด</a></h2><hr/>
</td>
<td width='33%' valign="top"><h2 align="center"><a href="index.php?sessiontab=2&sub=3&lr=2">ขาขวา</a></h2><hr/>

</td></tr></table>

<?
if(empty($_SESSION["mcode_index"]) or $lr > 2)exit;

$sql="select * from (select mcode,name_t,pos_cur,mdate,pos_cur2,tot_pv,sp_code,sp_name,level-'".$_SESSION["mcode_level"]."' as level";
$sql .= ",CASE lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS lr1 ";
$sql .= "from ".$dbprefix."member left join ".$dbprefix."structure_binary as mi on (mcode = mi.mcode_ref) where mcode_index like '".$_SESSION["mcode_index"]."".$_GET["lr"]."%' and mcode_ref != '".$_SESSION["usercode"]."') as a where 1=1  ";

?>
<?
$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" a.level ":$_GET['ord']);
//$rec->setLimitPage($_GET['lp']);
$rec->setLimitPage("5000");
if(isset($_POST['skey']))
	$rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))
	$rec->setCause($_GET['skey'],$_GET['scause']);
$rec->setSize("95%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");
//$rec->setPageLinkShow(false,false);
$rec->setLink($PHP_SELF,"sessiontab=2&sub=3&lr=$lr");
$rec->setBackLink($PHP_SELF,"sessiontab=2");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("mcode,name_t,mdate,lr1,pos_cur,pos_cur2,tot_pv,sp_code,sp_name,level");
$rec->setFieldDesc("".$wording_lan["mcode"].",".$wording_lan["name"].",".$wording_lan["startdate"].",".$wording_lan["rep_25"].",".$wording_lan["pos_cur"].",".$wording_lan["tab2_1_10"].",".$wording_lan["sub21_1"].",".$wording_lan["rep_4"].",".$wording_lan["tab1_mem_6"].",".$wording_lan["lv"]."");
$rec->setFieldAlign("center,left,center,center,center,center,center,center,left,center");
$rec->setFieldSpace("8%,25%,8%,4%,8%,8%,8%,8%,25%,8%");
$rec->setFieldFloatFormat(",,,,,,0,,,0");
$rec->setSearch("b.mcode,name_t,mdate,pos_cur,pos_cur2,pvall,sp_code,sp_name,level");
$rec->setSearchDesc("รหัสสมาชิก,ชื่อสมาชิก,วันสมัคร,ตำแหน่ง,เกียรติยศ,คะแนนส่วนตัว,รหัสผู้แนะนำ,ชื่อผู้แนะนำ,ชั้นที่");
	$rec->setFieldLink("index.php?sessiontab=2&sub=1&cmc=,");

$rec->showRec(1,'SH_QUERY');
?>
