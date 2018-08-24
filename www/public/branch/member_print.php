<link rel="stylesheet" type="text/css" href="./../style.css" />
<?
require("connectmysql.php");
require("./cls/piority.php");
$dbprefix ='gug_';
$acc = new piority();
if(isset($_POST['skey'])){
	$key = $_POST['skey'];
	$cause = $_POST['scause'];
}else if(isset($_GET['skey'])){
	$key = $_GET['skey'];
	$cause = $_GET['scause'];
}
	//$sql = "SELECT count(*) FROM ".$dbprefix."member ";
	//$rs = mysql_query($sql);
	//$num_member = mysql_num_rows($rs);
	//mysql_free_result($rs);
	//=============
	$sql1 = "SELECT mcode FROM ".$dbprefix."asaleh WHERE GROUP BY mcode ";
	$rs1 = mysql_query($sql1);
	for($i=0;$i<mysql_num_rows($rs1);$i++){
			$sqlObj1 = mysql_fetch_object($rs);
			$mcode[$i] =$sqlObj->mcode;
	}
	mysql_free_result($rs1);
	for($j=0;$j<sizeof($mcode);$j++){
		$sql1 = "SELECT SUM(tot_pv) AS tot_pv FROM ".$dbprefix."asaleh WHERE mcode='".$mcode[$j]."' ";
		$rs1 = mysql_query($sql1);
		for($i=0;$i<mysql_num_rows($rs1);$i++){
				$sqlObj1 = mysql_fetch_object($rs);
				$tot_pv[$mcode[$j]]=$sqlObj1->tot_pv;
		}
		mysql_free_result($rs1);
	}
	//===================================
	$sql = "SELECT * FROM ".$dbprefix."member ";
	//$sql .= "LEFT JOIN (SELECT mcode AS mc1,SUM(tot_pv) AS tot_pv FROM ".$dbprefix."asaleh GROUP BY mcode )  AS tabb ON (".$dbprefix."member.mcode=tabb.mc1) ";
if(($key!='')||($cause!='')){
	if(strcmp($key,'mcode')==0)
		$sql .= "WHERE  ".$key." = ".$cause." ";
	else
		$sql .= "WHERE  ".$key." ='".$cause."'";
}
$sql .= " ORDER BY id DESC";
//echo $sql;
	if($_GET['state']==1){
		include("member_del.php");
	}else if($_GET['state']==2){
		include("member_editadd.php");
	}else{
		$rs = mysql_query($sql);
		$num_row = mysql_num_rows($rs);
		if($num_row>0){
	?><br>
	<table align='center' width='95%'  border='0' cellpadding='0' cellspacing='0'>
		<tr>
			<td colspan="11" align="center"><h4><b>รายงาน รายละเอียดสมาชิก</b></h4></td>
		</tr>
		<tr><td colspan="11"><? echo "พิมพ์วันที่ ".date("Y-m-d h:i:s");?></td></tr>
		<tr bgcolor='#999999' align='center'>
		<form name='maindel' id='maindel' action='./index.php?sessiontab=1&sub=2&state=1' method='post'>
			<td width='5%' bgcolor='#99CCCC' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>ลำดับ</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>รหัสสมาชิก</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>ชื่อ</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>รหัสผู้แนะนำ</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>ชื่อผู้แนะนำ</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>รหัสอัพไลน์</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>ชื่ออัพไลน์</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>PV สะสม</td>
			<td width='10%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>วันที่สมัคร</td>
			<td width='5%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>สต๊อกคีป</td>
			<td width='5%' style='border-left:1 solid #FFFFFF;border-top:1 solid #000000;border-bottom:1 solid #000000;'>โมบาย</td>
		</tr>
		<?
		//รหัสผู้แนะนำ,ชื่อผู้แนะนำ,รหัสอัพไลน์,ชื่ออัพไลน์,PV สะสม,วันที่สมัคร,สต๊อกคีป,โมบาย
		//mcode,name_t,sp_code,sp_name,upa_code,upa_name,tot_pv,mdate,stockist,mo
		$onmouseover = array("this.style.background='#FFCC99'","this.style.background='#FFCC99'");
		$onmouseout = array("this.style.background='#EDEDED'","this.style.background='#FFFFFF'");
		
		for($i=0;$i<mysql_num_rows($rs);$i++){
		//for($i=0;$i<100000;$i++){
			$sqlObj = mysql_fetch_object($rs);
			
		?>
		<tr id='trtab[]' bgcolor='#EDEDED'  onmouseover="<?=$onmouseover[$i%2]?>"  onmouseout="<?=$onmouseout[$i%2]?>" >
			<td align='center' style='border-left:1 solid #FFFFFF;'><?=$i+1?></td>
			<td align='center' style='border-left:1 solid #FFFFFF;'><a href='index.php?sessiontab=1&sub=4&cmc=<?=$sqlObj->mcode?>'><?=$sqlObj->mcode?></a></td>
			<td align='left' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->name_t?></td>
			<td align='center' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->sp_code?></td>
			<td align='left' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->sp_name?></td>
			<td align='center' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->upa_code?></td>
			<td align='left' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->upa_name?></td>
			<td align='right' style='border-left:1 solid #FFFFFF;'><?=$tot_pv[$sqlObj->mcode]?></td>
			<td align='center' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->mdate?></td>
			<td align='center' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->stockist?></td>
			<td align='center' style='border-left:1 solid #FFFFFF;'><?=$sqlObj->mo?></td>
		</tr>
	<?
		}//for($i=0;$i<mysql_num_rows($rs);$i++){
			mysql_free_result($rs);
		}//if(($key!='')||($cause!='')){
		else{
		?>
		</form><table align='center' width='95%'  border='0' cellpadding='0' cellspacing='0'><br /><tr><td bgcolor='#990000' align='center'><font color='#FFFFFF'>ไม่พบข้อมูลตามเงื่อนไข</font></td></tr><tr></tr><td align='center'>[<a href='javascript:history.back()'>Back</a>]</td></tr></table>
		<?
		}
	?>
	</table>
	<?	
	}

?>