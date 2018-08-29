<script language="javascript">
function checkround(){
	if(document.getElementById("ftrcode").value==""){
		alert("กรุณาใส่รอบการคำนวณ");
		document.getElementById("ftrcode").focus();
		return false;
	}else{
		var numCheck = document.getElementById("ftrcode").value;
		var numVal = numCheck.split("-");
		if(numVal.length>2){
			alert("กรุณากรอกรูปแบบรอบการคำนวณให้ถูกต้อง");
			return false;
		}
	}
	document.rform.submit();
}
function chknum(key){
	if((key>=48&&key<=57)||key==45)
		return true;
	else
		return false;
}
</script>
<?
if(!isset($_POST["ftrcode"])){
	showdialog();
}else{ ?>
<br />
<table width="95%" border="1" align="center">
  <tr>
    <td align="center">
	<?
		$ftrcode = $_POST["ftrcode"];
		if (strpos($ftrcode,"-")===false){
			//รอบเริ่มต้น == รอบสิ้นสุด
			$ftrc[0]=$ftrcode;
			$ftrc[1]=$ftrcode;
		}else{
			$ftrc = explode('-',$ftrcode);
		}
		if($ftrc[0]>$ftrc[1]){
			?><FONT COLOR="#ff0000">รอบเริ่มต้น ต้องน้อยกว่าหรือเท่ากับ รอบสิ้นสุด กรุณาใส่รอบการคำนวณใหม่</FONT><?
			showdialog();
			exit;
		}else{
//================================================================================
			$sql = "select * from ".$dbprefix."around where rcode between '".$ftrc[0]."' and '".$ftrc[1]."' and calc='1'";
			$result = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($result);$i++){
				$data = mysql_fetch_object($result);
				?><font color="#ff0000">รอบ <?=$data->rcode?> คำนวณไปแล้ว <br /></font><?
			}
			mysql_free_result($result);
			if($i>0){
				?><font color="#ff0000">ต้องลบการคำนวณคอมมิชชั่น รอบนี้ก่อน จึงจะคำนวณใหม่ได้<br /></font><?
				showdialog();
				exit;
			}
			$sql="SELECT * FROM ".$dbprefix."around WHERE rcode BETWEEN ".$ftrc[0]." AND ".$ftrc[1]." ORDER BY rcode";
			//echo $sql;
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$brcode[$i] = $sqlObj->rcode;
				$rdate[$i] = explode("-",$sqlObj->rdate);
				$fdate[$brcode[$i]] = $sqlObj->fdate;
				$tdate[$brcode[$i]] = $sqlObj->tdate;
				//echo "--".$brcode[$i]."--".$frcodea[$brcode[$i]]."--".$trcodea[$brcode[$i]]."<br>";
			}
			mysql_free_result($rs);
			$trcolor = array(" bgcolor='#F2F2F2'", " bgcolor='#FFFFFF'");
			echo "<br>";
			echo "<table align='center' width='95%' border='0' cellspacing='0' cellpadding='0'>";
			for($j=0;$j<sizeof($brcode);$j++){
	//================================================================================
	//					รอบส่วนแรก การเก็บข้อมูลสมาชิก
	//================================================================================
mysql_query("DELETE FROM ".$dbprefix."poschange WHERE date_change BETWEEN '".$fdate[$brcode[$j]]."' AND '".$tdate[$brcode[$j]]."' AND type!=1");

ob_start();
echo "<table><tr valign='top'><td>";
	$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
	$rs = mysql_query($sql);
	//echo "<table>";
	//echo "<tr><td>ชื่อ</td><td>รหัส</td><td>upline</td><td>ทางด้าน</td></tr>";
	unset($sum_pv);
	unset($pcarry_l);
	unset($pcarry_r);
	unset($tot_pv);
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlObj = mysql_fetch_object($rs);
		$mcode[$i] =$sqlObj->mcode;		
		$name_t[$i] =$sqlObj->name_t;		
		$upa_code[$mcode[$i]] = $sqlObj->upa_code;
		$lr[$mcode[$i]] = $sqlObj->lr;
		$pos_cur[$mcode[$i]] = $sqlObj->pos_cur;
		$pos_new[$mcode[$i]] = $sqlObj->pos_cur;
		$sum_pv[$mcode[$i]][1] =0;
		$sum_pv[$mcode[$i]][2] =0;
		$pcarry_l[$mcode[$i]]= 0;
		$pcarry_r[$mcode[$i]] = 0;
		//$pos_buy[$mcode[$i]] = $sqlObj->pos_cur;
		//$vip[$mcode[$i]] = $sqlObj->vip;
		//ข้อมูลที่ถูกเตรียมเพื่อใช้ในการคำนวณ
		//$tot_pv[$mcode[$i]] = 0; 
		//$sum_pv[$mcode[$i]][0] =0;
		//$exp_date[$mcode[$i]]= $sqlObj->exp_date;
		//$count[$mcode[$i]][0] =0;
		//$count[$mcode[$i]][1] =0;
		//$count[$mcode[$i]][2] =0;
		//$pcarry_c[$mcode[$i]] = 0;
		//$old_quota[$mcode[$i]] = 0;
		//echo "<tr><td>".$name_t[$i]."</td><td>".$mcode[$i]."</td><td>".$upa_code[$mcode[$i]]."</td><td>".($lr[$mcode[$i]]=='L'?"ซ้าย":"ขวา")."</td></tr>";
	}
	// ------ปรับตำแหน่งก่อนการคำนวณ------

				$sql = "DELETE FROM ".$dbprefix."poschange ";
			$sql .= "WHERE date_change>='".$fdate[$brcode[$j]]."' AND type<=>NULL ";
			//echo $sql."<br />";
			mysql_query($sql);
			//comment
			//	เก็บข้อมูล ตำแหน่งล่าสุด ดูตาราง poschange โดยแบ่งออกเป็น สองส่วน
			//		1 ส่วนของตำแหน่งก่อนการคำนวณโดย การขึ้นตำแหน่งแบบปกติและ แบบพิเศษ
			//		2 ส่วนของการขึ้นตำแหน่งแบบพิเศษ ในช่วงคำนวณ เพ่ื่อไม่ให้เกิดการ ลดตำแหน่งพิเศษ
			//------------------------------------------------------------------------------------
			$sql = "SELECT mcode, id,pos_after AS pos FROM ".$dbprefix."poschange ";
			$sql .= "WHERE id IN (SELECT MAX(id) FROM ".$dbprefix."poschange ";
			$sql .= "WHERE date_change<'".$fdate[$brcode[$j]]."' GROUP BY mcode) ";
			//echo $sql;
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$pos_upold[mysql_result($rs,$i,'mcode')] = mysql_result($rs,$i,'pos');
				//if(mysql_result($rs,$i,'mcode')=='0101573') echo "--".$pos_upold[mysql_result($rs,$i,'mcode')];
			}
			$sql = "SELECT mcode, id,pos_after AS pos FROM ".$dbprefix."poschange ";
			$sql .= "WHERE id IN (SELECT MAX(id) FROM ".$dbprefix."poschange ";
			$sql .= "WHERE (date_change<'".$fdate[$brcode[$j]]."') ";
			$sql .= "AND type='1' GROUP BY mcode) ";
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$pos_upold[mysql_result($rs,$i,'mcode')] = mysql_result($rs,$i,'pos');
			}
			//comment
			//	เก็บคะแนนพิเศษ ของสมาชิกเดิม จากตาราง opv
			//------------------------------------------------------------------------------------
			$sql ="SELECT mcode, pv FROM ".$dbprefix."opv " ;
			$rs = mysql_query($sql);
			for($i = 0 ; $i < mysql_num_rows($rs) ; $i++){	
				$pos_exp[mysql_result($rs,$i,'mcode')] += mysql_result($rs,$i,'pv');
			}	
			//comment
			//	เก็บคะแนนรวมก่อนการคำนวณเดิม sum จาก asaleh 
			//------------------------------------------------------------------------------------
			$sql = "SELECT SUM(tot_pv) AS tot_pv, mcode FROM ".$dbprefix."asaleh WHERE sadate<'".$fdate[$brcode[$j]]."' ";
			$sql .= "AND sa_type='A' AND cancel!='1' GROUP BY mcode";
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$pos_exp[$sqlObj->mcode] += $sqlObj->tot_pv;
			}
			mysql_free_result($rs);
			//comment
			//	เก็บคะแนนรวมก่อนการคำนวณเดิม sum จาก  holdhead 
			//------------------------------------------------------------------------------------
			$sql = "SELECT SUM(tot_pv) AS tot_pv, mcode FROM ".$dbprefix."holdhead WHERE sadate<'".$fdate[$brcode[$j]]."' ";
			$sql .= "AND sa_type='A' AND cancel!='1'GROUP BY mcode";
			$rs = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($rs);$i++){
				$sqlObj = mysql_fetch_object($rs);
				$pos_exp[$sqlObj->mcode] += $sqlObj->tot_pv;
			}
			mysql_free_result($rs);
			//comment-----------------------------------------------------------------------------
			//	เก็บคะแนนในรอบปัจจุบัน โดย unino จาก asaleh,holdhead
			//	และทำการ update ตำแหน่งตามลำดับวันที่คำนวณ
			//------------------------------------------------------------------------------------
			$sql = "SELECT id,mcode, tot_pv, sadate, 1 AS TYPE FROM ".$dbprefix."asaleh ";
			$sql .= "WHERE sa_type='A' AND cancel!='1' ";
			$sql .= "AND sadate BETWEEN '".$fdate[$brcode[$j]]."' AND '".$tdate[$brcode[$j]]."' ";
			$sql .= "UNION SELECT id,mcode, tot_pv, sadate, 2 AS TYPE FROM ".$dbprefix."holdhead ";
			$sql .= "WHERE sa_type='A' AND cancel!='1' ";
			$sql .= "AND sadate BETWEEN '".$fdate[$brcode[$j]]."' AND '".$tdate[$brcode[$j]]."' ORDER BY sadate,id,type ASC";
			//echo $sql;
			$rs = mysql_query($sql);
			$pos_def = array('P'=>10000,'MO'=>7500,'D'=>5000,'M'=>1000,'L'=>500,'A'=>300,''=>0);

		for($i = 0 ; $i < mysql_num_rows($rs) ; $i++){		
			$billinfo = mysql_fetch_object($rs);
			$sadate[$billinfo->mcode] = $billinfo->sadate;
			$tot_pv[$billinfo->mcode] = $billinfo->tot_pv;
			//$pos_change[$mcode[$i]] = 'MC';
			
			$pos_exp[$billinfo->mcode] += $tot_pv[$billinfo->mcode];			
			//if($billinfo->mcode == '0101573'){
			//	echo $billinfo->mcode."--".$pos_exp[$billinfo->mcode]."<br />";
			//}
			foreach(array_keys($pos_def) as $posmin){
				if($pos_exp[$billinfo->mcode] >= $pos_def[$posmin]){		
					if($pos_def[$posmin] > $pos_def[$pos_change[$billinfo->mcode]]){
						//$pos_upold[$billinfo->mcode] = $pos_change[$billinfo->mcode];
						$pos_change[$billinfo->mcode] = $pos_def[$posmin]>$pos_def[$pos_upold[$billinfo->mcode]]?$posmin:$pos_upold[$billinfo->mcode];
						$date_change[$billinfo->mcode] = $sadate[$billinfo->mcode];						
						update_position($billinfo->mcode, $pos_upold[$billinfo->mcode], $pos_change[$billinfo->mcode], $date_change[$billinfo->mcode]);
						//update_member($billinfo->mcode, $pos_change[$billinfo->mcode]);
					}				
				}						
			}
		}
		//mysql_query("UPDATE ".$dbprefix."poschange set pos_before='MC' WHERE pos_before='' ");
		//mysql_query("UPDATE ".$dbprefix."poschange set pos_after='MC' WHERE pos_after='' ");
			//--------------end member data-------------

	$sql = "SELECT mcode, taba.id,pos_after AS pos FROM ";
	$sql .= "(SELECT MAX(id) AS id FROM ".$dbprefix."poschange ";
	$sql .= "WHERE date_change<='".$tdate[$brcode[$j]]."' AND type!='1' GROUP BY mcode) AS taba ";
	$sql .= "LEFT JOIN ".$dbprefix."poschange AS tabb ON( taba.id = tabb.id ) ";
	$rs = mysql_query($sql);
	//echo $sql;
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$pos_new[mysql_result($rs,$i,'mcode')] = mysql_result($rs,$i,'pos');
	}
	//================================================================================
	//					รอบส่วนสอง การเก็บข้อมูลการซื้อขาย (คะแนน PV) 
	//================================================================================
	$sql="SELECT * FROM ".$dbprefix."asaleh WHERE sadate>='".$fdate[$brcode[$j]]."' AND sadate<='".$tdate[$brcode[$j]]."' AND sa_type='A' ORDER BY sadate"; //AND (sa_type='T' OR sa_type='P')
	//echo $sql;
	$rs = mysql_query($sql);
	echo "<table border='1'>";
	echo "<tr><td>รอบที่</td><td>วันที่</td><td>รวมในเดือนนั้น</td><td>บิลเลขที่</td><td>รหัสสมาชิก</td><td>PV</td></tr>";
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlObj = mysql_fetch_object($rs);
		$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;
		$sano[$sqlObj->mcode] = $sqlObj->sano;	//เลขที่บิล เก็บไว้ที่ array

		echo "<tr><td>$brcode[$j]</td><td>".$rdate[$j][0].$rdate[$j][1].$rdate[$j][2]."</td><td>".$lim_qfy[$rdate[$j][1]][$sqlObj->mcode]."</td><td>".$sqlObj->sano."</td><td>".$sqlObj->mcode."</td><td>".$tot_pv[$sqlObj->mcode]."</td></tr>";
	
	}
	mysql_free_result($rs);
	echo "</table>";
	//echo "</td></tr></table>";
//ลบข้อมูลเก่าของ am, ad, ambonus ถ้ามี
		$sql="delete from ".$dbprefix."ambonus where rcode=".$brcode[$j];
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."am where rcode=".$brcode[$j];
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

	//================================================================================
	//					รอบส่วนสาม รวมคะแนนขึ้นไปหายอด
	//================================================================================
	for($i=0;$i<sizeof($mcode);$i++){
		//if($exp_date[$mcode[$i]]=='' || $exp_date[$mcode[$i]]<=0) continue; //ไม่รักษายอดทิ้งไปเลย
		$up = $mcode[$i];
		while($up <> ""){
			if($up == "") break;
			//if($exp_date[$upa_code[$up]]=='' || $exp_date[$upa_code[$up]]<=0){ $up = $upa_code[$up];continue;} //ไม่รักษายอดทิ้งไปเลย
			if($upa_code[$up] <>""){
				$sum_pv[$upa_code[$up]][$lr[$up]] += $tot_pv[$mcode[$i]];
				if($tot_pv[$mcode[$i]] > 0)
					$count[$upa_code[$up]][$lr[$up]]++;
			}
			$up = $upa_code[$up];
		}
	}
	echo "</td><td>";
	//================================================================================
	//					รอบส่วนสาม รวมคะแนนลงฐานข้อมมูล
	//================================================================================
echo "<table border='1'>";
echo "<tr><td>รอบ</td><td>รหัส</td><td>upline</td><td>ทางด้าน</td><td>PV รวม L,R</td><td>PV ส่วนตัว</td><td>รวมทั้งหมด</td></tr>";
	for($i=0;$i<sizeof($mcode);$i++){
		//if($exp_date[$mcode[$i]]=='' || $exp_date[$mcode[$i]]<=0) continue; //ไม่รักษายอดทิ้งไปเลย
		$sum_tot = $tot_pv[$mcode[$i]] + $sum_pv[$mcode[$i]][1] + $sum_pv[$mcode[$i]][2] ;
		if($sum_tot > 0){	
			$rep_sql = "INSERT INTO ".$dbprefix."am (rcode,mcode,total_pv,upa_code) VALUES('$brcode[$j]','$mcode[$i]',";
			$rep_sql .= "'$sum_tot','".$upa_code[$mcode[$i]]."')";
			//echo $rep_sql."<br>";
			mysql_query($rep_sql);
		echo "<tr><td>".$brcode[$j]."</td><td>".$mcode[$i]."</td><td>".$upa_code[$mcode[$i]]."</td><td>".$lr[$mcode[$i]]."</td><td>".($sum_pv[$mcode[$i]][1] + $sum_pv[$mcode[$i]][2])."</td><td>".$tot_pv[$mcode[$i]]."</td><td>".($tot_pv[$mcode[$i]] + $sum_pv[$mcode[$i]][1] + $sum_pv[$mcode[$i]][2])."</td></tr>";
		}
	}
echo "</table>";
	echo "</td></tr></table>";
	//================================================================================
	//					รอบส่วนสาม คำนวณเก็บค่าสะสมเดิม
	//================================================================================
	$sql="SELECT MAX(rcode) AS maxs FROM ".$dbprefix."ambonus WHERE rcode<".$brcode[$j];
	$rs = mysql_query($sql);
	$sql="SELECT * FROM ".$dbprefix."ambonus WHERE rcode='".mysql_result($rs,0,'maxs')."'";
	//echo $sql;
	$rs = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlObj = mysql_fetch_object($rs);
		$pcarry_l[$sqlObj->mcode] = $sqlObj->carry_l;
		$pcarry_r[$sqlObj->mcode] = $sqlObj->carry_r;
		//$pcarry_c[$sqlObj->mcode] = $sqlObj->carry_c;
		//$old_quota[$sqlObj->mcode] = $sqlObj->quota;
		//$aquota[$sqlObj->mcode] = $sqlObj->aquota;
	}
	mysql_free_result($rs);
	//================================================================================
	//					รอบส่วนสาม คำนวณคะแนน
	//================================================================================
	echo "<table>";
	echo "<tr height='30'><td colspan='15' align='center' bgcolor='#80c0ff'>weak strong<b>รอบที่ $brcode[$j] ".$fdate[$brcode[$j]]."-".$tdate[$brcode[$j]]."</b></td></tr>";
	echo "<tr align='center' bgcolor='#A5DEF2'><td>รหัสสมาชิก</td><td>ชื่อ</td><td>รวมเป็นเงิน</td>";
	echo "<td>เดิมซ้าย</td><td>เดิมขวา</td>";
	echo "<td>ปัจจุบันซ้าย</td><td>ปัจจุบันขวา</td>";
	echo "<td>คะแนนอ่อน</td><td>เหลือซ้าย</td>";
	echo "<td>เหลือขวา</td></tr>";
	//$quota = array('E'=>60, 'D'=>30,'P'=>15,'G'=>8,''=>0);
	$k=0;
	$per = 50;
	$weaklimit = array('A'=>500,'L'=>1000,'M'=>2000,'D'=>7500,'P'=>12000,''=>0); //''=>2000 เอาออกทีหลัง
	for($i=0;$i<sizeof($mcode);$i++){
		//if($exp_date[$mcode[$i]]=='' || $exp_date[$mcode[$i]]<=0) continue; //ไม่รักษายอดทิ้งไปเลย
		if( $sum_pv[$mcode[$i]][1] >0 || $sum_pv[$mcode[$i]][2] >0 || $pcarry_l[$mcode[$i]]>0 || $pcarry_r[$mcode[$i]]>0  ){
			$tot = min(($sum_pv[$mcode[$i]][1] + $pcarry_l[$mcode[$i]]),($sum_pv[$mcode[$i]][2] + $pcarry_r[$mcode[$i]]));
			$carry_l = ($sum_pv[$mcode[$i]][1] + $pcarry_l[$mcode[$i]])-$tot;
			$carry_r = ($sum_pv[$mcode[$i]][2] + $pcarry_r[$mcode[$i]])-$tot;
			if($pos_new[$mcode[$i]]!="" || $carry_l!=0 || $carry_r!=0){
				$weaktot = ($tot*$per/100)>$weaklimit[$pos_new[$mcode[$i]]]?$weaklimit[$pos_new[$mcode[$i]]]:($tot*$per/100);
				//$strongtot = ($tot*5/100)>$stronglimit?$stronglimit:($tot*5/100);
				$strongtot = 0;//$pos_new[$mcode[$i]]==''?0:$strongtot;
				//$aq = ($pos_new[$mcode[$i]] > $pos_buy?($quota[$pos_new[$mcode[$i]]] - $quota[$pos_buy[$mcode[$i]]]):0);
				$sql ="INSERT INTO ".$dbprefix."ambonus (rcode,mcode,total,weak,strong,pcarry_l,pcarry_r,ro_l,ro_r,counted,carry_l,carry_r) VALUES('$brcode[$j]',";
				$sql .= "'$mcode[$i]','".$weaktot."',$weaktot,$strongtot,'".$pcarry_l[$mcode[$i]]."','".$pcarry_r[$mcode[$i]]."',";
				$sql .= "'".$sum_pv[$mcode[$i]][1]."','".$sum_pv[$mcode[$i]][2]."','$co','".$carry_l."','".$carry_r."')";			
				//echo $sql;
				mysql_query($sql);
				
				echo "<tr align='right' ".$trcolor[$k++%2]."><td align='left'>".$mcode[$i]." (".($pos_new[$mcode[$i]]!=''?$pos_new[$mcode[$i]]:'-').")"."</td>";
				echo "<td align='left'>".$name_t[$i]."</td>";
				echo "<td>".$weaktot."+".$strongtot."=".($weaktot+$strongtot)."</td>";
				echo "<td>".$pcarry_l[$mcode[$i]]."</td>";
				echo "<td>".$pcarry_r[$mcode[$i]]."</td>";
				echo "<td>".$sum_pv[$mcode[$i]][1]."</td>";
				echo "<td>".$sum_pv[$mcode[$i]][2]."</td>";
				echo "<td>".$tot."</td>";
				echo "<td>".$carry_l."</td>";
				echo "<td>".$carry_r."</td></tr>";
			}
		}
	}
		echo "</table></td></tr></table>";
ob_end_flush();
$sql = "UPDATE ".$dbprefix."around SET calc='1' WHERE rcode=$brcode[$j] ";
logtext(true,$_SESSION['adminuserid'],$sql);
mysql_query($sql);
			//================================================================================
			} 
	?>
	</td>
	</tr>
</table>
<br />
<?
		}
}
function showdialog(){
?>
<table width="95%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=2">
<table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">กรอกรอบการคำนวณคอมมิชชั่น แผนทีมอ่อน ที่ต้องการคำนวนเช่น 1-12</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="40%" align="right">รอบ&nbsp;&nbsp;</td>
    <td width="60%">
      <input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td colspan="2"><input type="button" name="Submit" value="คำนวณรายได้" onClick="checkround()"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</td></tr></table>
<?
}
			//--------------edit position data----------
function update_position($mcode, $pos_old, $pos_new, $date_change){
	$dbprefix = "dl_";
	$sql = "INSERT INTO ".$dbprefix."poschange (mcode, pos_before, pos_after, date_change) VALUES (";
	$sql .= "'".$mcode."','".$pos_old."','".$pos_new."','".$date_change."')";
		
	if(!mysql_query($sql))
		echo mysql_error();
}

function update_member($mcode, $pos_cur){
	$dbprefix = "dl_";
	if($pos_cur=='') $pos_cur='';
	$sql = "UPDATE ".$dbprefix."member SET pos_cur='".$pos_cur."' WHERE mcode='".$mcode."' ";
	//echo $sql."<br />";
	if(!mysql_query($sql))
		echo mysql_error();
}
?>