<?
require("connectmysql.php");
require("./cls/repGenerator.php");
if (isset($_GET["pg"])){$page=$_GET["pg"];} else {$page="1";}
if (isset($_GET["lr"])){$lr=$_GET["lr"];} else {$lr="";}

?>

<?

//$sql = "SELECT * FROM ".$dbprefix."member ";
// JOIN เมื่อต้องการข้อมูลวันหมดอายุในโปรแกรม
$mm = date("Y-m");
//$mm = date("Y");
/*$sql = "SELECT *,";
$sql .= "CASE lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS lr1 from ".$dbprefix."member_show where uid = '{$_SESSION["usercode"]}' ";
if($_GET["lr"]){
$sql .= " and lr = '".$_GET["lr"]."' ";
}*/
//echo $sql;
$sql = "SELECT b.mcode,m.name_t,m.pos_cur,m.pos_cur2,m.pos_cur1,m.sp_code,m.sp_name, ";
//$sql .= "CASE lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS lr1 from ".$dbprefix."member_show where uid = '{$_SESSION["usercode"]}' ";
$sql .= "CASE b.lr WHEN '1' THEN 'ซ้าย' WHEN '2' THEN 'ขวา'  END AS lr1 from ".$dbprefix."bm_chart as b  ";
$sql .= " left join ".$dbprefix."member as m on (m.mcode = b.mcode) ";
$sql .= " where b.upa_code = '{$_SESSION["usercode"]}' ";
if($_GET["lr"]){
$sql .= " and b.lr = '".$_GET["lr"]."' ";
}
//$sql .= " group by b.mcode ";

if(empty($lr)){

$_SESSION[countMB] = $_SESSION[countDI] = $_SESSION[countBU] = $_SESSION[countSU] = $_SESSION[countMG] = $_SESSION[countD] = $_SESSION[countAD] = $_SESSION[countRD] = $_SESSION[countND] = $_SESSION[countCD] =  $_SESSION[countGD] = $_SESSION[countGEP] =0;


$sql1 = "delete from ".$dbprefix."member_show where uid = '{$_SESSION["usercode"]}' ";
mysql_query($sql1);
/*	$rs=mysql_query("select mcode,upa_code,sp_code,name_t,sp_name,upa_name,mdate,pos_cur,pos_cur2,pos_cur1 from ".$dbprefix."member where mcode='".$_SESSION[usercode]."' ");
	//echo "select * from ".$dbprefix."member where mcode='$mcode[$k]' ";
	if(mysql_num_rows($rs) > 0){
		$lv = 0;
		$mcode1 = mysql_result($rs,0,'mcode');
		$name_t1 = mysql_result($rs,0,'name_t');
		$upa_code1 = mysql_result($rs,0,'upa_code');
		$sp_code1 = mysql_result($rs,0,'sp_code');
		$sp_name1 = mysql_result($rs,0,'sp_name');
		$upa_name1 = mysql_result($rs,0,'upa_name');
		$mdate1 = mysql_result($rs,0,'mdate');
		$pos_cur = mysql_result($rs,0,'pos_cur');
		$pos_cur2 = mysql_result($rs,0,'pos_cur2');
		$pos_cur1 = mysql_result($rs,0,'pos_cur1');
		if($pos_cur == 'MB')$_SESSION[countMB]++;
		if($pos_cur == 'DI')$_SESSION[countDI]++;
		if($pos_cur == 'BU')$_SESSION[countBU]++;
		if($pos_cur == 'SU')$_SESSION[countSU]++;
		if($pos_cur == 'MG')$_SESSION[countMG]++;
		if($pos_cur == 'D')$_SESSION[countD]++;
		if($pos_cur == 'AD')$_SESSION[countAD]++;
		if($pos_cur == 'RD')$_SESSION[countRD]++;
		if($pos_cur == 'ND')$_SESSION[countND]++;
		if($pos_cur == 'CD')$_SESSION[countCD]++;
		if($pos_cur == 'GD')$_SESSION[countGD]++;
		if($pos_cur == 'GEP')$_SESSION[countGEP]++;
		$totpv = gettotpv($dbprefix,$mcode1);
		mysql_query("insert into  ".$dbprefix."member_show (mcode,name_t,upa_code,sp_code,lv,lr,uid,sp_name,upa_name,mdate,totpv,pos_cur,pos_cur2,pos_cur1)
		values('$mcode1','$name_t1','$upa_code1','$sp_code1','$lv','$lr','".$_SESSION[usercode]."','$sp_name1','$upa_name1','$mdate1','$totpv','$pos_cur','$pos_cur2','$pos_cur1') ");
		//isLine($dbprefix,$mcode1,$lv,$fdate,$tdate,$_SESION[usercode]);	
	}

	$rs=mysql_query("select mcode,upa_code,sp_code,name_t,sp_name,upa_name,mdate,pos_cur,pos_cur2,pos_cur1 from ".$dbprefix."member where upa_code='".$_SESSION[usercode]."' and lr = 1 ");
	//echo "select * from ".$dbprefix."member where mcode='$mcode[$k]' ";
	if(mysql_num_rows($rs) > 0){
		$lv = 1;
		$mcode1 = mysql_result($rs,0,'mcode');
		$name_t1 = mysql_result($rs,0,'name_t');
		$upa_code1 = mysql_result($rs,0,'upa_code');
		$sp_code1 = mysql_result($rs,0,'sp_code');
		$sp_name1 = mysql_result($rs,0,'sp_name');
		$upa_name1 = mysql_result($rs,0,'upa_name');
		$mdate1 = mysql_result($rs,0,'mdate');
		$pos_cur = mysql_result($rs,0,'pos_cur');
		$pos_cur2 = mysql_result($rs,0,'pos_cur2');
		$pos_cur1 = mysql_result($rs,0,'pos_cur1');
		if($pos_cur == 'MB')$_SESSION[countMB]++;
		if($pos_cur == 'DI')$_SESSION[countDI]++;
		if($pos_cur == 'BU')$_SESSION[countBU]++;
		if($pos_cur == 'SU')$_SESSION[countSU]++;
		if($pos_cur == 'MG')$_SESSION[countMG]++;
		if($pos_cur == 'D')$_SESSION[countD]++;
		if($pos_cur == 'AD')$_SESSION[countAD]++;
		if($pos_cur == 'RD')$_SESSION[countRD]++;
		if($pos_cur == 'ND')$_SESSION[countND]++;
		if($pos_cur == 'CD')$_SESSION[countCD]++;
		if($pos_cur == 'GD')$_SESSION[countGD]++;
		if($pos_cur == 'GEP')$_SESSION[countGEP]++;
		$totpv = gettotpv($dbprefix,$mcode1);
		mysql_query("insert into  ".$dbprefix."member_show (mcode,name_t,upa_code,sp_code,lv,lr,uid,sp_name,upa_name,mdate,pos_cur,totpv,pos_cur2,pos_cur1)
		values('$mcode1','$name_t1','$upa_code1','$sp_code1','$lv','1','".$_SESSION[usercode]."','$sp_name1','$upa_name1','$mdate1','$pos_cur','$totpv','$pos_cur2','$pos_cur1') ");
		isLine($dbprefix,$mcode1,$lv,$fdate,$tdate,$_SESSION[usercode],'1');	
	}

	$rs=mysql_query("select mcode,upa_code,sp_code,name_t,sp_name,upa_name,mdate,pos_cur,pos_cur2,pos_cur1 from ".$dbprefix."member where upa_code='".$_SESSION[usercode]."' and lr = 2 ");
	//echo "select * from ".$dbprefix."member where mcode='$mcode[$k]' ";
	if(mysql_num_rows($rs) > 0){
		$lv = 1;
		$mcode1 = mysql_result($rs,0,'mcode');
		$name_t1 = mysql_result($rs,0,'name_t');
		$upa_code1 = mysql_result($rs,0,'upa_code');
		$sp_code1 = mysql_result($rs,0,'sp_code');
		$sp_name1 = mysql_result($rs,0,'sp_name');
		$upa_name1 = mysql_result($rs,0,'upa_name');
		$mdate1 = mysql_result($rs,0,'mdate');
		$pos_cur = mysql_result($rs,0,'pos_cur');
		$pos_cur2 = mysql_result($rs,0,'pos_cur2');
		$pos_cur1 = mysql_result($rs,0,'pos_cur1');
		if($pos_cur == 'MB')$_SESSION[countMB]++;
		if($pos_cur == 'DI')$_SESSION[countDI]++;
		if($pos_cur == 'BU')$_SESSION[countBU]++;
		if($pos_cur == 'SU')$_SESSION[countSU]++;
		if($pos_cur == 'MG')$_SESSION[countMG]++;
		if($pos_cur == 'D')$_SESSION[countD]++;
		if($pos_cur == 'AD')$_SESSION[countAD]++;
		if($pos_cur == 'RD')$_SESSION[countRD]++;
		if($pos_cur == 'ND')$_SESSION[countND]++;
		if($pos_cur == 'CD')$_SESSION[countCD]++;
		if($pos_cur == 'GD')$_SESSION[countGD]++;
		if($pos_cur == 'GEP')$_SESSION[countGEP]++;

		$totpv = gettotpv($dbprefix,$mcode1);
		mysql_query("insert into  ".$dbprefix."member_show (mcode,name_t,upa_code,sp_code,lv,lr,uid,sp_name,upa_name,mdate,pos_cur,totpv,pos_cur2,pos_cur1)
		values('$mcode1','$name_t1','$upa_code1','$sp_code1','$lv','2','".$_SESSION[usercode]."','$sp_name1','$upa_name1','$mdate1','$pos_cur','$totpv','$pos_cur2','$pos_cur1') ");
		isLine($dbprefix,$mcode1,$lv,$fdate,$tdate,$_SESSION[usercode],'2');	
	}
*/
}

?>
<?
//$left = mysql_num_rows(mysql_query("SELECT * from ".$dbprefix."member_show where uid = '".$_SESSION["usercode"]."' and lr=1 "));
//$right = mysql_num_rows(mysql_query("SELECT * from ".$dbprefix."member_show where uid = '".$_SESSION["usercode"]."' and lr=2 "));
$left = mysql_num_rows(mysql_query("SELECT * from ".$dbprefix."bm_chart where upa_code = '".$_SESSION["usercode"]."' and lr=1 group by mcode "));
$right = mysql_num_rows(mysql_query("SELECT * from ".$dbprefix."bm_chart where upa_code = '".$_SESSION["usercode"]."' and lr=2 group by mcode"));

?>
<table width=60% align=center><tr><td align=center>

 <a href="?sessiontab=2&sub=6&lr=1" <?if($lr =='1'){?> style="background-color: #F00;padding: 5px;color: #FFF;font-size:22px"<?}?>  >รายชื่อฝั่งซ้าย   <?=$left?>  คน</a>
</td>

<td align=center>

<a href="?sessiontab=2&sub=6&lr=2" <?if($lr =='2'){?> style="background-color: #F00;padding: 5px;color: #FFF;font-size:22px"<?}?>  >รายชื่อฝั่งขวา   <?=$right?>  คน</a>
</td>

</tr></table>
<font color="#FF0000" size='5'><b><center><? echo 'โครงสร้างในการ Show จะมีการ update ข้อมูลใหม่ๆ ทุกสิ้นวัน';?><br><?=$wording_lan["Info11"]?> <?=$_SESSION["fdate_show"]?>
</center></b></font>
<br>
<table align=center width="100%" style="display:none">
<tr>
    <td ><img src="images/mb.gif" height="20" ><font size = 4> Member : <?=$_SESSION[countMB]?> รหัส</td>
    <td ><img src="images/di.gif" height="20" ><font size = 4>Distributor : <?=$_SESSION[countDI]?>  รหัส</td>
    <td ><img src="images/bu.gif" height="20"><font size = 4>Business : <?=$_SESSION[countBU]?> รหัส</td>
	<td ><img src="images/su.gif" height="20"><font size = 4>Supervisor  : <?=$_SESSION[countSU]?>  รหัส</td>
</td>
<tr>    
    <td ><img src="images/mg.gif" height="20"><font size = 4>Manager : <?=$_SESSION[countMG]?>  รหัส</td>
    <td ><img src="images/d.gif" height="20"><font size = 4>Director : <?=$_SESSION[countD]?>  รหัส</td>
    <td ><img src="images/ad.gif" height="20"><font size = 4>Area Director : <?=$_SESSION[countAD]?>  รหัส </td>
	<td ><img src="images/rd.gif" height="20"><font size = 4>Regional Director : <?=$_SESSION[countRD]?>  รหัส</td>
</tr>
<tr> 
    <td ><img src="images/nd.gif" height="20"><font size = 4>National Director : <?=$_SESSION[countND]?>  รหัส</td>
    <td ><img src="images/gd.gif" height="20"><font size = 4>Continental Director : <?=$_SESSION[countCD]?>  รหัส</td>
	<td ><img src="images/gd.gif" height="20"><font size = 4>Global  Director : <?=$_SESSION[countGD]?>  รหัส</td>
    <td ><img src="images/gep.gif" height="20"><font size = 4>Global Executive President : <?=$_SESSION[countGEP]?>  รหัส</font></td>
</tr>
</table>

<?
$rec = new repGenerator();
$rec->setQuery($sql);
$rec->setSort($_GET['srt']==""?"DOWN":$_GET['srt']);
$rec->setOrder($_GET['ord']==""?" mcode ":$_GET['ord']);
//$rec->setLimitPage($_GET['lp']);
$rec->setLimitPage("2000");
if(isset($_POST['skey']))
	$rec->setCause($_POST['skey'],$_POST['scause']);
else if(isset($_GET['skey']))
	$rec->setCause($_GET['skey'],$_GET['scause']);
$rec->setSize("95%","");
$rec->setAlign("center");
$rec->setPageLinkAlign("right");
//$rec->setPageLinkShow(false,false);
$rec->setLink($PHP_SELF,"sessiontab=2&sub=6&lr=$lr");
$rec->setBackLink($PHP_SELF,"sessiontab=2");
if(isset($page))
	$rec->setCurPage($page);
$rec->setShowField("mcode,name_t,pos_cur,pos_cur2,pos_cur1,lr1");
$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,จับคู่,แนะนำ,เกรียติยศ,ฝั่ง");
//$rec->setShowField("mcode,name_t,mdate,pos_cur,upa_code,sp_code");
//$rec->setFieldDesc("รหัสสมาชิก,ชื่อ,วันที่สมัคร,ตำแหน่ง,รหัสอัพไลน์,รหัสผู้แนะนำ");
$rec->setFieldAlign("center,left,center,center,center,center,center,left,center");
$rec->setFieldSpace("8%,25%,8%,4%,8%,8%,8%,25%,8%");
	$rec->setFieldLink("index.php?sessiontab=2&sub=1&cmc=,");
//$rec->setSum(true,false,",,,,,,true,true");	
//$rec->setFieldFloatFormat(",,,,,,0,,0");

$rec->setSearch("mcode");
$rec->setSearchDesc("รหัสสมาชิก");
	


$rec->showRec(1,'SH_QUERY');

function isLine($dbprefix,$mcode,$lv,$fdate,$tdate,$uid,$lr){
$sql = "SELECT mcode,upa_code,sp_code,name_t,sp_name,upa_name,mdate,pos_cur,pos_cur1,pos_cur2 FROM ".$dbprefix."member WHERE upa_code='$mcode'  ";
$rs = mysql_query($sql);
	if(mysql_num_rows($rs)> 0){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$lv++;
			$sqlObj = mysql_fetch_object($rs);
			$mcode = $sqlObj->mcode;
			//$lr = $sqlObj->lr;
			$upa_code = $sqlObj->upa_code;
			$sp_code = $sqlObj->sp_code;
			$name_t = $sqlObj->name_t;
			$sp_name = $sqlObj->sp_name;
			$upa_name = $sqlObj->upa_name;
			$mdate = $sqlObj->mdate;
			$pos_cur = $sqlObj->pos_cur;
			$pos_cur1 = $sqlObj->pos_cur1;
			$pos_cur2 = $sqlObj->pos_cur2;
			if($pos_cur == 'MB')$_SESSION[countMB]++;
			if($pos_cur == 'DI')$_SESSION[countDI]++;
			if($pos_cur == 'BU')$_SESSION[countBU]++;
			if($pos_cur == 'SU')$_SESSION[countSU]++;
			if($pos_cur == 'MG')$_SESSION[countMG]++;
			if($pos_cur == 'D')$_SESSION[countD]++;
			if($pos_cur == 'AD')$_SESSION[countAD]++;
			if($pos_cur == 'RD')$_SESSION[countRD]++;
			if($pos_cur == 'ND')$_SESSION[countND]++;
			if($pos_cur == 'CD')$_SESSION[countCD]++;
			if($pos_cur == 'GD')$_SESSION[countGD]++;
			if($pos_cur == 'GEP')$_SESSION[countGEP]++;
			$totpv = gettotpv($dbprefix,$mcode);
			//echo $mcode.' : '.$name_t.' : '.$upa_code.' : '.$lv.' : '.$lr.'<br>';

			mysql_query("insert into  ".$dbprefix."member_show (mcode,name_t,upa_code,sp_code,lv,lr,uid,mdate,upa_name,sp_name,totpv,pos_cur,pos_cur2,pos_cur1)
							values('$mcode','$name_t','$upa_code','$sp_code','$lv','$lr','$uid','$mdate','$upa_name','$sp_name','$totpv','$pos_cur','$pos_cur2','$pos_cur1') ");
			isLine($dbprefix,$mcode,$lv,$fdate,$tdate,$uid,$lr);
		}
	}
}
function gettotpv($dbprefix,$mcode){
	$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_asaleh WHERE mcode='$mcode' and  (sa_type='A') and cancel = 0 ";
			//echo $sql;
			$rs = mysql_query($sql);
			$all_Apv = mysql_result($rs,0,'all_pv'); 
			mysql_free_result($rs);

			$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_holdhead WHERE mcode='$mcode' and (sa_type='A') and cancel = 0  ";
			//echo $sql;
			$rs = mysql_query($sql);
			$all_Apv = ($all_Apv+mysql_result($rs,0,'all_pv')); 
			mysql_free_result($rs);


			$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ali_special_point WHERE  sa_type='VA' AND mcode='$mcode' group by mcode ";
			$rs3=mysql_query($sql3);
			if (mysql_num_rows($rs3)>0) {
				$sqlObj3 = mysql_fetch_object($rs3);
				$total_fv3= $sqlObj3->tot_pv;
				 mysql_free_result($rs3);
			}else{
				$total_fv3=0;
			}
			return $all_Apv = $all_Apv+$total_fv3;
}

?>
