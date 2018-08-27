<?$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode']; ?>
<form name="rform" method="POST" action="./index.php?sessiontab=1&sub=26">
	 <table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
	  <tr><td colspan="6" align="center">&nbsp;</td></tr> 
	  <tr>	
		<td align="right">รหัสสมาชิก&nbsp;</td>
		<td><input type="text" name="cmc" id="cmc" placeholder="TH0000001" value="<?=$fmcode?>" maxlength='9'/>

	   <input type="submit" name="okok" value="ค้นหา">
		&nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
	  </tr>
	 <tr><td colspan="6" align="center">&nbsp;</td></tr>
	</table>
</form>

<?
require("connectmysql.php");

$cmc = $_POST['cmc']==""?$_GET['cmc']:$_POST['cmc'];
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if (isset($_GET["lr"])){$lr=$_GET["lr"];} else {$lr="";}
?>
<table width=60% align=center><tr><td align=center>

 <a href="?sessiontab=1&sub=26&lr=1&cmc=<?=$cmc?>" <?if($lr =='1'){?> style="background-color: #F00;padding: 5px;color: #FFF;"<?}?>>ซ้าย</a>
</td>
<td align=center>

<a href="?sessiontab=1&sub=26&cmc=<?=$cmc?>" <?if($lr ==''){?> style="background-color: #F00;padding: 5px;color: #FFF;"<?}?>>ทั้งหมด</a>
</td>
<td align=center>

<a href="?sessiontab=1&sub=26&lr=2&cmc=<?=$cmc?>" <?if($lr =='2'){?> style="background-color: #F00;padding: 5px;color: #FFF;"<?}?>>ขวา</a>
</td>

</tr></table>
</br>
<?
require("connectmysql.php");
//require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if (isset($_GET["lr"])){$lr=$_GET["lr"];} else {$lr="";}

$sql = "select mcode_index from ".$dbprefix."structure_binary where mcode_ref = '$cmc' ";
$rs = mysql_query($sql);
if(mysql_num_rows($rs)>0){
	$mcode_index = mysql_result($rs,0,"mcode_index");
}else $mcode_index = '';
				
if(empty($mcode_index) or $lr > 2)exit;

$sql="select * from (select mcode,name_t,pos_cur,mdate,pos_cur2,tot_pv,sp_code,sp_name,level-'".$_SESSION["mcode_level"]."' as level";
$sql .= ",CASE lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS lr1 ";
$sql .= "from ".$dbprefix."member left join ".$dbprefix."structure_binary as mi on (mcode = mi.mcode_ref) where mcode_index like '".$mcode_index."".$_GET["lr"]."%' and mcode_ref != '".$cmc."') as a where 1=1  ";
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
$rec->setLink($PHP_SELF,"sessiontab=1&sub=26&lr=$lr&cmc=$cmc");
$rec->setBackLink($PHP_SELF,"sessiontab=1");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("mcode,name_t,mdate,lr1,pos_cur,tot_pv,sp_code,sp_name,level");
$rec->setFieldDesc("รหัสสมาชิก,ชื่อสมาชิก,วันสมัคร,ด้าน,ตำแหน่ง,คะแนนสะสม,รหัสผู้แนะนำ,ชื่อผู้แนะนำ,ชั้น");
$rec->setFieldAlign("center,left,center,center,center,center,center,left,center");
$rec->setFieldFloatFormat(",,,,,0,,,0");
$rec->setSearch("mcode,name_t,mdate,lr1,pos_cur,tot_pv,sp_code,sp_name,level");
$rec->setSearchDesc("รหัสสมาชิก,ชื่อสมาชิก,วันสมัคร,ด้าน,ตำแหน่ง,คะแนนสะสม,รหัสผู้แนะนำ,ชื่อผู้แนะนำ,ชั้น");
$rec->setFieldLink("index.php?sessiontab=1&sub=4&cmc=,");
$rec->showRec(1,'SH_QUERY');
?>
