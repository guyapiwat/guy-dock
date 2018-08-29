<? include("global.php")?>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">
function checkround(){
	if(document.getElementById("fmcode").value==""){
			alert("กรุณากรอกรหัสสมาชิกที่ต้องการดู");
			return false;
	}
	document.rform.submit();
}
</script>
<link rel="stylesheet" type="text/css" href="./../style.css" />
<?
if(!(isset($_POST["sdate"]) || isset($_GET["edate"]))){
	rpdialog();
}else{
	if(isset($_POST["sdate"]))
		$sdate = $_POST["sdate"];
	else if(isset($_GET["sdate"]))
		$sdate = $_GET["sdate"];
	if(isset($_POST["edate"]))
		$edate = $_POST["edate"];
	else if(isset($_GET["edate"]))
		$edate = $_GET["edate"];
	$ftrc[0]=$sdate;
	$ftrc[1]=$edate;
	//session_unset(); 
	//echo $sdate.','.$edate.'=<br>';
	//$_SESSION['sdate']=$sdate;
	//$_SESSION['edate']=$edate;	
	//echo $_SESSION['sdate'].','.$_SESSION['edate'].'=<br>';
	if ($sdate=="") {
		$sdate_d="";
		$sdate_m="";
		$sdate_y="";
	}else {
		$dash1=strpos($sdate,"-");
		$dash2=strpos($sdate,"-",$dash1+1);
		$sdate_d=substr($sdate,8);
		$sdate_m=substr($sdate,5,2);
		$sdate_y=substr($sdate,0,4);
		if ($sdate_y>"0"){$sdate_y+=543;}else {$sdate_y="";}
	}
	if ($edate=="") {
		$edate_d="";
		$edate_m="";
		$edate_y="";
	}else {
		$dash1=strpos($edate,"-");
		$dash2=strpos($edate,"-",$dash1+1);
		$edate_d=substr($edate,8);
		$edate_m=substr($edate,5,2);
		$edate_y=substr($edate,0,4);
		if ($edate_y>"0"){$edate_y+=543;}else {$edate_y="";}
	}
	//$fmcode = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	$smc = $_POST['fmcode']==""?$_GET['fmcode']:$_POST['fmcode'];
	if($ftrc[0]>$ftrc[1]){
		?><table width="100%" border="1">
  <tr align="center">
    <td><FONT COLOR="#ff0000">วันเริ่มต้น ต้องน้อยกว่าหรือเท่ากับ วันสิ้นสุด กรุณาใส่วันการคำนวณใหม่</FONT></td>
  </tr>
</table>
<?
		rpdialog();
		exit;
	}else{
		require("connectmysql.php");
		require("./cls/repGenerator.php");
		if ($cmc=="") {$cmc=$smc;}
		if ($cmc==""){$cmc=$smc;}
		$cur=$cmc;
		for ($i=strlen($smc);$i<7;$i++){$smc="0".$smc;}
		for ($i=strlen($cmc);$i<7;$i++){$cmc="0".$cmc;}
		for ($i=strlen($cur);$i<7;$i++){$cur="0".$cur;}
		$sql_mem="SELECT * FROM ".$dbprefix."member WHERE mcode = '".$smc."'  ";
		$rs_mem = mysql_query($sql_mem);
		$r_name_t_up[ mysql_result($rs_mem,0,'mcode')] = mysql_result($rs_mem,0,'name_t');
		$name_t = mysql_result($rs_mem,0,'name_t');
	?>
		<br>
		<table width='100%' align='center'>
			<tr height='30'><td colspan='15' align='center'><b>รายงานสายงานสมาชิกแบบต้นไม้</b></td></tr>
			<tr height='30'><td colspan='15' align='center'><b>รหัส <?=$smc?> <?=$name_t?></b></td></tr>
			<tr height='30'><td colspan='15' align='center'><b>ยอดโบนัส จ่ายระหว่างวันที่ <?=$ftrc[0]?> ถึง <?=$ftrc[1]?></b></td></tr>
		</table>
	<?
		//if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
		set_time_limit(0);
		ini_set("memory_limit","200M");
		// ตรวจสอบว่า $cmc อยู่ในสายงานของ $smc หรือไม่
		do {
			$result=mysql_query("select * from ".$dbprefix."member where mcode='".$cur."' ");
			//echo "select * from ".$dbprefix."member where mcode='".$cur."' <br>";
			if (mysql_num_rows($result)>0) {
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				$cur_upa_code=$row["upa_code"];
				if ($cur==$smc){break;}else{$cur=$cur_upa_code;}
			}else{
				echo "<font color=c00000><br>ไม่สามารถดูข้อมูลได้เพราะ<br>";
				echo "รหัส $cmc ไม่อยู่ในสายงานของ $smc<br></font>";
				exit;
			}
			mysql_free_result($result);
		} while(1);
		
		// ใส่ข้อมูลสมาชิกและสายงานใน n_mcode[] เริ่มจาก $cmc
		// $cmc
		$s=0;
		$result=mysql_query("select * from ".$dbprefix."member where mcode='".$cmc."' ");
		//echo "select * from ".$dbprefix."member where mcode='".$cmc."' <br>";
		if (mysql_num_rows($result)>0) {
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			// push stack
			$s++;
			$s_level[$s]=0;
			$s_mcode[$s]=$row["mcode"];
			$s_name_t[$s]=$row["name_t"];
			$s_upa_code[$s]=$row["upa_code"];
			$s_lr[$s]=$row["lr"];
			$s_complete[$s]=$row["complete"];
			$s_mo[$s]=$row["mo"];
		}//if (mysql_num_rows($result)>0) {
		mysql_free_result($result);
		$r=0;
		do{
			if ($s<=0){break;};
			// read from stack mcode and put in result
			$r++;
			$r_level[$r]=$s_level[$s];
			$r_mcode[$r]=$s_mcode[$s];
			$r_name_t[$r]=$s_name_t[$s];
			$r_upa_code[$r]=$s_upa_code[$s];
			$r_lr[$r]=$s_lr[$s];
			$r_complete[$r]=$s_complete[$s];
			$r_mo[$r]=$s_mo[$s];
			// pop stack
			$s--;
			// find child of mcode and push in stack
			$result=mysql_query("select * from ".$dbprefix."member where upa_code='".$r_mcode[$r]."' order by lr desc");
			//echo "select * from ".$dbprefix."member where upa_code='".$r_mcode[$r]."' order by lr desc<br>";
			if (mysql_num_rows($result)>0) {
				for ($i=1;$i<=mysql_num_rows($result);$i++) {
					$row = mysql_fetch_array($result, MYSQL_ASSOC);
					// push stack
					$s++;
					$s_level[$s]=$r_level[$r]+1;
					$s_mcode[$s]=$row["mcode"];
					$s_name_t[$s]=$row["name_t"];
					$s_upa_code[$s]=$row["upa_code"];
					$s_lr[$s]=$row["lr"];
					$s_complete[$s]=$row["complete"];
					$s_mo[$s]=$row["mo"];
				}//for ($i=1;$i<=mysql_num_rows($result);$i++) {
			}//if (mysql_num_rows($result)>0) {
			mysql_free_result($result);
		} while(1);
		?>
		<br>
		<table border=0 cellpadding=0 cellspacing=0 width="100%">
			<tr><td width="100%" height=1 bgcolor=000000></td></tr>
		</table>
		<table border=0 cellpadding=0 cellspacing=0 width="100%">
			<tr>
				<td width="5%" align=left valign=top bgcolor='f0f0f0'>ลำดับ</td>
				<td width="5%" align=left valign=top bgcolor='f0f0f0'>ชั้น</td>
				<td width="5%" align=left valign=top bgcolor='f0f0f0'>ด้าน</td>
				<td width="10%" align=left valign=top bgcolor='f0f0f0'>รหัส</td>
				<td width="25%" align=left valign=top bgcolor='f0f0f0'>สมาชิก</td>
				<td width="5%" align=left valign=top bgcolor='f0f0f0'>ซ้าย</td>
				<td width="5%" align=left valign=top bgcolor='f0f0f0'>ขวา</td>
				<td width="10%" align=left valign=top bgcolor='f0f0f0'>ครบวันที่</td>
				<td width="10%" align=left valign=top bgcolor='f0f0f0'>อัพไลน์ A</td>
				<td width="20%" align=left valign=top bgcolor='f0f0f0'>ยอดโบนัส</td>
			</tr>
		</table>
		<table border=0 cellpadding=0 cellspacing=0 width="100%">
			<tr><td width="100%" height=1 bgcolor='000000'></td></tr>
		</table>
		<table border=0 cellpadding=0 cellspacing=0 width="100%">
		<?
		$num=0;
		for($i=1;$i<=$r;$i++){
			if ($r_level[$i]==1){$l1="*";}else{$l1="";}
			if ($r_level[$i]>20){
				$lxh=$r_level[$i]-($r_level[$i] % 20);
				$lx="<font color=808080>$lxh+</font>";
				for ($j=1;$j<=($r_level[$i] % 20);$j++) {$lx.=" .";}
			}else{
				$lx="";
				for ($j=1;$j<=($r_level[$i]);$j++) {$lx.=" .";}
			}
			if($r_lr[$i]=='1')
				$r_lr[$i] ='L';
			if($r_lr[$i]=='2')
				$r_lr[$i] ='R';
		//echo $r_mcode[$i].'<br>';
		//===========================
		$bonuslimit =2000;
				$sum_bill_a ="select SUM(tot_pv) as total from ".$dbprefix."asaleh WHERE  sadate <= '$edate' AND mcode='".$r_mcode[$i]."' ";
				$rs_sum_bill_a = mysql_query($sum_bill_a);
				$stotal_pv = mysql_result($rs_sum_bill_a,0,'total');
				$max_sano='';
				$max_sadate='0000-00-00';
				//echo $sum_bill_a.'<br>';
				if($stotal_pv>=$bonuslimit){
					$check_replete[$smc]=$smc;
					$sum_bill_a ="select MAX(sano) as sano from ".$dbprefix."asaleh WHERE  sadate <= '$edate' AND mcode='".$r_mcode[$i]."' ";
					$rs_sum_bill_a = mysql_query($sum_bill_a);
					$max_sano = mysql_result($rs_sum_bill_a,0,'sano');
					$sum_bill_a ="select * from ".$dbprefix."asaleh WHERE  sano='".$max_sano."' ";
					$rs_sum_bill_a = mysql_query($sum_bill_a);
					$max_sadate = mysql_result($rs_sum_bill_a,0,'sadate');
					$pv = mysql_result($rs_sum_bill_a,0,'tot_pv');
				}//if($stotal_pv>=$bonuslimit){
		//============================
		$sql = "SELECT  ".$dbprefix."ambonus.rcode,mcode,SUM(total) as total  ";
		$sql .= "FROM ".$dbprefix."ambonus ";
		$sql .= "LEFT JOIN ".$dbprefix."around ON (".$dbprefix."ambonus.rcode=".$dbprefix."around.rcode) "; 
		$sql .= " WHERE ".$dbprefix."around.paydate BETWEEN '$sdate' AND '$edate' AND ".$dbprefix."ambonus.mcode='".$r_mcode[$i]."' GROUP BY mcode";
		//echo $sql.'=<br>';
		$rs = mysql_query($sql);
		$bonus_tot = mysql_result($rs,0,'total');
		$sql = "SELECT  tot_l,tot_r,MAX(".$dbprefix."ambonus.rcode) as rcode  ";
		$sql .= "FROM ".$dbprefix."ambonus ";
		$sql .= "LEFT JOIN ".$dbprefix."around ON (".$dbprefix."ambonus.rcode=".$dbprefix."around.rcode) "; 
		$sql .= " WHERE ".$dbprefix."around.paydate <= '$edate' AND ".$dbprefix."ambonus.mcode='".$r_mcode[$i]."' GROUP BY mcode";
		//echo $sql.'=<br>';
		$rs = mysql_query($sql);
		$tot_l = mysql_result($rs,0,'tot_l');
		$tot_r = mysql_result($rs,0,'tot_r');
			if(($bonus_tot>0)){
				$num++;
				if (($num % 2)==0){$bgcolor="bgcolor=f0f0f0";}else{$bgcolor="";}
			?>
			<tr>
			<td width="5%" align=left valign=top <?=$bgcolor?>><?=$num?></td>
			<td width="5%" align=left valign=top <?=$bgcolor?>><?=$r_level[$i]?></td>
			<td width="5%" align=left valign=top <?=$bgcolor?>><?=$r_lr[$i]?></td>
			<td width="10%" align=left valign=top <?=$bgcolor?>><?=$r_mcode[$i]?></td>
			<td width="25%" align=left valign=top <?=$bgcolor?>><?=$r_name_t[$i]?></td>
			<td width="5%" align=left valign=top <?=$bgcolor?>><?=number_format($tot_l,0,'.',',')?></td>
			<td width="5%" align=left valign=top <?=$bgcolor?>><?=number_format($tot_r,0,'.',',')?></td>
			<td width="10%" align=left valign=top <?=$bgcolor?>><?=$max_sadate?></td>
			<td width="10%" align=left valign=top <?=$bgcolor?>><?=$r_upa_code[$i]?></td>
			<td width="20%" align=right valign=top <?=$bgcolor?>><?=$bonus_tot?></td>
			</tr>
	<?		}//if($r_name_t[$i]!='ยกเลิก'){
		}//for($i=1;$i<=$r;$i++){
	?>
		</table>
		<table border=0 cellpadding=0 cellspacing=0 width="100%">
			<tr><td width="100%" height=1 bgcolor=000000></td></tr>
		</table>
<?	}//else
}//else
function rpdialog(){?>
	<table width="100%"><tr><td><br />
	<form name="rform" method="post" action="memtree_bonus.php" target="_blank">
		<table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center" >
 			<tr><td colspan="2" align="center">&nbsp;</td></tr>
  			<tr><td colspan="2" align="center"><strong>เลือกวันที่ที่ต้องการดูรายงาน</strong></td></tr>
  			<tr><td colspan="2" align="center">&nbsp;</td></tr>
			<tr>
				<td align="right">เริ่มดูวันที่&nbsp;&nbsp;</td>
    			<td><input type="text" id="sdate" name="sdate" size="10" maxlength="10" value="<?=($sdate==""?date("Y-m-d"):$sdate)?>" />
&nbsp;<a href="javascript:NewCal('sdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a><font color="#808080">(ปปปป-ดด-วว)</font></td>
  			</tr>
  			<tr> 
				<td align="right">ถึงวันที่&nbsp;&nbsp;</td>
    			<td><input type="text" id="edate" name="edate" size="10" maxlength="10" value="<?=($edate==""?date("Y-m-d"):$edate)?>" />
&nbsp;<a href="javascript:NewCal('edate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a><font color="#808080">(ปปปป-ดด-วว)</font></td>
  			</tr>
  			<tr>
    			<td width="24%" align="right">รหัสสมาชิก&nbsp;&nbsp;</td>
    			<td width="76%"><input type="text" name="fmcode" id="fmcode" size="10"/></td>
  			</tr>
  			<tr align="center"><td colspan="2">&nbsp;</td></tr>
  			<tr><td colspan="2" align="center"><input  type="button" name="Submit" value="ดูรายงาน" onclick="checkround()"/></td></tr>
  			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
  			</tr>
		</table>
	</form>
	</td></tr></table>
<? }
?>