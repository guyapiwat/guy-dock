<? 
session_start();
?>

<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php");?>
<?
include("function.php");
$arr_locationbase = searchlocationbase($dbprefix,$_SESSION[m_locationbase]);
set_time_limit (0);
ini_set("memory_limit","100M");

$fdate = $fpdate = date("Y-m").'-01';
$tdate = $tpdate = date("Y-m-t");

if($_POST){
	$sql="update ".$dbprefix."event set status = '".$_POST["status"]."',remark = '".$_POST["remark"]."',update_date = '".$arr_locationbase[datetimezone1]."' where mcode = '".$_SESSION["usercode"]."' ";
	$rs = mysql_query($sql);
	?>
		<table width = '500' border=1 align=center><tr>
	<td colspan=2 align=center><p>การยืนยันของคุณได้รับการบันทึกเรียบร้อยแล้ว</p>
	  <p><b><font color="orange" size="5">ขอบคุณครับ / Thank you</font></b></p></td></tr>
	</table>

	<?
	echo "<script language='javascript'>
	setTimeout(function() {
    		window.close();
	}, 4000);	
	</script>";	
exit;

}
$sql="SELECT * FROM ".$dbprefix."event where mcode = '".$_SESSION["usercode"]."'";
	$rs = mysql_query($sql);
	//echo "$sql<BR>";
	if(mysql_num_rows($rs) > 0){
		$data = mysql_fetch_object($rs);
		?>
		<form name='frm' method="post">
		<table width = '74%' border=1 align=center><tr>
		<td colspan=2 align=center><p><b><font color="orange" size="5">คุณได้รับเชิญเข้าร่วมงาน </font></b></p>
		  <p><b><font color="orange" size="5">Success Night Party</font></b></p>
		  <p><b><font size="5" color="orange">วันที่ 14 มีนาคม 2557</font></b> </p>
		  <p><b><font color="orange" size="5">กรุณายืนยันการเข้าร่วมงาน</font></b></p></td></tr>
		<tr>
		<td width="31%" height="40" align=left>กรุณาเลือกประเภทการยืนยัน :</td><td width="69%">
		
		  <p>
		     <select tabindex="69" name="status" id="status" >
		      <option   value="" >โปรดเลือก</option>
		      <option <? if($data->status == 'ยืนยันเข้าร่วมงาน')echo 'selected="selected"'; ?>  value="ยืนยันเข้าร่วมงาน">ยืนยันเข้าร่วมงาน</option>
		      <option <? if($data->status == 'ไม่สามารถไปร่วมงานได้')echo 'selected="selected"'; ?>  value="ไม่สามารถไปร่วมงานได้">ไม่สามารถไปร่วมงานได้</option>
            </select>
		  </p>


		</td></tr>
		<tr>
		<td colspan=2 align=left><p>หมายเหตุ : 
		  <br>
		  <textarea name="remark" id="remark" cols="100" rows="5"><?=$data->remark?>
		</textarea>
		  เงื่อนไข :</p>
		  <p>- งานเริ่มเวลา 17:30 น. ที่ โรงแรมโพธาลัย ห้อง Center Pond &lt;<a href="http://www.plp.co.th/mice/index.php/location#prettyPhoto/0/">แผนที่โรงแรม</a>&gt;</p>
		  <p>- การแต่งกาย ชุดราตรียาว/ทักซิโด้</p></td></tr>
			<td colspan=2 align=center>  <p>
			  <input type="submit" value="ยืนยัน / Confirm" name="ok"  id="ok"  tabindex="81" >
	      </p></td></tr></table>
			</form>
		<?
	}

if($_POST){
	
	?>
		<table width = '500' border=1 align=center><tr>
	<td colspan=2 align=center><p><b><font color="orange" size="5">Thank you</font></b></p></td></tr>
	</table>

	<?
}

function backmonthpv($dbprefix,$mcode,$fpdate,$tpdate){
	$month=explode("-",$fdate);
	if($month[1] == '01'){
		$month[0] = $month[0]-1;
		$month[1] = 12;
	}else if($month[1] >= 11){
		$month[1] = $month[1]-1;
		$month[0] = $month[0]-1;
	}else{
		$month[1] = $month[1]-1;
		$month[0] = $month[0]-1;
		$month[1] = '0'.$month[1];
	}
	$month1 = $month[0].$month[1];
	$sql2 = "select mcode,pv from ".$dbprefix."status WHERE month_pv = '$month1' AND mcode='$mcode' ";
				//echo "$sql2<BR>";
				$rs2=mysql_query($sql2);
				if (mysql_num_rows($rs2)>0) {
					$sqlObj2 = mysql_fetch_object($rs2);
					$pv= $sqlObj2->pv;
				}else{
					$pv = 0;
				}
	return $pv;
}

function dateDiff($startDate, $endDate) { 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 

} 

function gettotalfv12($dbprefix,$ro,$mcode,$fpdate,$tpdate,$backpv){
	$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ".$dbprefix."special_point WHERE sadate>='$fpdate' AND sadate<='$tpdate' AND sa_type='VQ' AND mcode='$mcode' group by mcode ";
				//if($mcode == '0000075')echo "$sql3<BR>";
				$rs3=mysql_query($sql3);
				if (mysql_num_rows($rs3)>0) {
					$sqlObj3 = mysql_fetch_object($rs3);
					$total_fv3= $sqlObj3->tot_pv;
				}else{
					$total_fv3=0;
				}
				mysql_free_result($rs3);
				//if($total_fv3 > 0)echo "$total_fv3<BR>";
				if($total_fv3 > 0)updateStatus($dbprefix,$ro,$mcode,$fpdate,$total_fv3,$backpv);
	//return $total_fv3;
} 

function getweakstrong($dbprefix,$mcode,$fdate,$tdate,$ro){

	$roto = $ro;
	//$rofrom = $ro-3;
	$sql3 = "select mcode, SUM(ro_l) AS tot_pv,SUM(ro_c) AS tot_pv1 from ".$dbprefix."bmbonus WHERE   mcode = '$mcode' and fdate between '$fdate' and '$tdate' group by mcode ";
			//if($mcode == '0000075')echo "$sql3<BR>";
	$rs3=mysql_query($sql3);
	$total_fv3=0;$total_fv31=0;$total_fv32=0;
	if (mysql_num_rows($rs3)>0) {
		$sqlObj3 = mysql_fetch_object($rs3);
		$total_fv31= $sqlObj3->tot_pv;
		$total_fv32= $sqlObj3->tot_pv1;
		//if($total_fv31 > $total_fv32)$total_fv3 = $total_fv32;
		//else $total_fv3 = $total_fv31;
		//$total_fv3= $total_fv3+$sqlObj3->tot_pv1;
	}else{
		$total_fv3=0;
	}
	//$fdateqq = explode('-',$tdate);
	//$rrcode = $ro-2;
	$sql="SELECT rcode FROM ".$dbprefix."around WHERE  fdate = '$fdate' ORDER BY rcode DESC LIMIT 1";
	//echo $sql;
	$rs = mysql_query($sql);
	$where_cause = "";
	$max_rcode = 0;
	if(mysql_num_rows($rs)>0){
		//$where_cause = "AND sadate>'".mysql_result($rs,0,'tdate')."' ";
		$max_rcodeo = mysql_result($rs,0,'rcode')-1;
	}
	
	//$max_rcodeo = $ro;
	$sql="SELECT * FROM ".$dbprefix."bmbonus WHERE rcode='$max_rcodeo' and mcode = '$mcode' ";
	//if($mcode == '0000229')echo $sql;
	$rs = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlObj = mysql_fetch_object($rs);
		$total_fv31 = $total_fv31+$sqlObj->carry_l;
		$total_fv32 = $total_fv32+$sqlObj->carry_c;
	}
	$total_fv3 = min($total_fv31,$total_fv32);
	$total_fv4 = max($total_fv31,$total_fv32);


	//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_fv3.'-'.$total_fv4;
} 
?>