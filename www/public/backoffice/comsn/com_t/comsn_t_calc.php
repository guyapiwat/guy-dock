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
<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php");
require_once("gencode.php");?>
<?

set_time_limit( 0);
ini_set("memory_limit","1024M");
ob_start();
if(!isset($_REQUEST["ftrcode"])){
	showdialog();
}else{ ?>
<br />
<table width="95%" border="0" align="center">
  <tr>
    <td align="center">
	<?
		$ftrcode = $_REQUEST["ftrcode"];
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
		$rof = $ftrc[0];
		$rot = $ftrc[1];

//================================================================================

			$sql = "select * from ".$dbprefix."promotion where rcode between '".$rof."' and '".$rot."' and calc='1'";
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
$step="1";
$time_start = getmicrotime();
echo "เริ่มการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน promotion<BR>";
//$text="uid=".$_SESSION["adminuserid"]." action=binary calc rcode=$ftrc[0]-$ftrc[1]";
////writelogfile($text);

for($ro=$ftrc[0];$ro<=$ftrc[1];$ro++){
	$maxlv		=15;
	$taxrate 	= (5/100);
	$bonuslv1 = 0.50;
	$bonuslv2 = 0.25;
	$bonuslv3 = 0.25;
	$sql="select * from ".$dbprefix."promotion where  rcode='".$ro."'  ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$fsano=$row["fsano"];
		$tsano=$row["tsano"];
		$tdate=$row["tdate"];
		$fdate=$row["fdate"];
		$rdate=$row["rdate"];
		$fpdate=$row["fpdate"];
		$tpdate=$row["tpdate"];
		$firstseat=$row["firstseat"];
		$secondseat=$row["secondseat"];
		$rincrease=$row["rincrease"];
		$rtype=$row["rtype"];
		$paydate=$row["paydate"];
		
		echo "<BR><BR>คำนวณโบนัสรอบที่ RO=$ro<BR>";
		//ล้างข้อมูลรอบที่ระบุ
		$sql="delete from ".$dbprefix."tmbonus1 where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="update ".$dbprefix."global set statusformat ='close' ";
	mysql_query($sql);
	

	fnc_calc_travel($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate,$firstseat,$secondseat,$rincrease,$rtype);

	$sql="update ".$dbprefix."promotion set calc='1',calc_date = '".date("Y-m-d H:i:s")."' where rcode='$ro' ";
		echo $sql;
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$sql="update ".$dbprefix."global set statusformat ='open' ";
		mysql_query($sql);
		///////////////////////////////////////////////////////////////////////
	}
	mysql_free_result($result);
	//$ro ระหว่าง Frcode-Trcode/////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////
}

$time_end = getmicrotime();
$time = $time_end - $time_start;
echo "สิ้นสุดการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR>";

	} //end else 
	?>
	</td>
	</tr>
</table>
<br />
<?
}//end else
function showdialog(){
?>
<table width="95%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=116">
<table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">กรอกรอบการคำนวณโบนัสที่ต้องการคำนวนเช่น 1-9</td>
	<tr>
	<td colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.ตรวจสอบการปรับตำแหน่ง</td>
	</tr>
	<tr>
	<td colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.ตรวจสอบการรักษายอด</td>
	</tr>
	<tr>
	<td colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.คำนวณคอมมิชชั่นผู้แนะนำ</td>
	<tr>
	<td colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.คำนวณคอมมิชชั่นบริหารทีมขาย</td>
	</tr>
	<tr>
	<td colspan="2" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.คำนวณแมชชิ่ง</td>
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
  <tr align="center">
    <td colspan="2">&nbsp;&nbsp;<input type="button" name="Submit" value="คำนวณรายได้" onClick="checkround()"></td>
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

function fnc_calc_travel($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate,$firstseat,$secondseat,$rincrease,$rtype){
	global $pos_piority1;
	$sql="select mcode FROM ".$dbprefix."calc_poschange1  where date_change between '$fdate' and  '$tdate' and (pos_after = 'VP' or pos_after = 'SVP' or pos_after = 'EVP' or pos_after = 'SEVP' or pos_after = 'PEVP' or pos_after = 'P') group by mcode  "; 
	
	$rs = mysql_query($sql);
	for($j=0;$j<mysql_num_rows($rs);$j++){
		$sqlObj = mysql_fetch_object($rs);
		$cmcode[$j] = $sqlObj->mcode;
		$mdata = get_detail_meber($cmcode[$j],$tdate);
		$function_count = function_count_travel($dbprefix,$ro,$cmcode[$j],$fdate,$tdate);
		$groupvp = groupvp($dbprefix,$ro,$cmcode[$j],$fdate,$tdate);
		//echo $function_count.' : '.$mdata["pos_cur3"].' : '.$groupvp;
		$countseat = 0;
		if($function_count == '0'){
			if($pos_piority1["VP"]>=$pos_piority1[$mdata["pos_cur3"]] and $groupvp >=3 ){
				$countseat = 2;
			}
		}else if($function_count == '1'){
			if($pos_piority1["SVP"]>=$pos_piority1[$mdata["pos_cur3"]] and $groupvp >=4 ){
				$countseat = 2;
			}
		}else if($function_count == '2'){
			if($pos_piority1["EVP"]>=$pos_piority1[$mdata["pos_cur3"]] and $groupvp >=5 ){
				$countseat = 2;
			}
		}else if($function_count == '3'){
			if($pos_piority1["SEVP"]>=$pos_piority1[$mdata["pos_cur3"]] and $groupvp >=6 ){
				$countseat = 4;
			}
		}else if($function_count == '4'){
			if($pos_piority1["PEVP"]>=$pos_piority1[$mdata["pos_cur3"]] and $groupvp >=7 ){
				$countseat = 4;
			}
		}else{
			if($pos_piority1["P"]>=$pos_piority1[$mdata["pos_cur3"]] and $groupvp >=8 ){
				$countseat = 6;
			}
		}
			$sql = "SELECT locationbase,pos_cur,pos_cur2,name_f,name_t,id_card,cid_card from ".$dbprefix."member where mcode = '".$cmcode[$j]."' ";
			$rsmember = mysql_query($sql);
			$sqlObjmember = mysql_fetch_object($rsmember);
			$locationbase[$cmcode[$j]] = $sqlObjmember->locationbase;
			$pos_cur[$cmcode[$j]] = $sqlObjmember->pos_cur;
			$name_f[$cmcode[$j]] = $sqlObjmember->name_f;
			$name_t[$cmcode[$j]] = $sqlObjmember->name_t;
			$id_card[$cmcode[$j]] = $sqlObjmember->id_card;
			$cid_card[$cmcode[$j]] = $sqlObjmember->cid_card;

			$sqltrip = "insert into ".$dbprefix."tmbonus1(rcode,mcode,name_f,name_t,smallbig,point,seats,fdate,tdate,locationbase,function_count,groupvp,couple,pos_cur) values('$ro','".$cmcode[$j]."','".$name_f[$cmcode[$j]]."','".$name_t[$cmcode[$j]]."','$rtype','".$allpoint[$cmcode[$j]]."','$countseat','$fdate','$tdate','".$locationbase[$cmcode[$j]]."','$function_count','$groupvp','$chkincrease','".$mdata["pos_cur3"]."')";
			 mysql_query($sqltrip);
	}
	//exit;
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
function expdate($startdate,$datenum){
 $startdatec=strtotime($startdate); // ทำให้ข้อความเป็นวินาที
 $tod=$datenum*86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
 $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
 return $ndate; // ส่งค่ากลับ
}
function get_data_sql($field,$sql){
	//อ่านค่า จาก  select $field from $table where $field_and_value
	$result=mysql_query($sql);
	if($result){
		if($row=mysql_fetch_object($result)){
			$value=$row->$field;
			mysql_free_result($result);
			return $value;
		}
	}
	return false;
}
function get_data_object($field,$sql){
	//อ่านค่า จาก  select $field from $table where $field_and_value
	$result=mysql_query($sql);
	if($result){
		if($row=mysql_fetch_object($result)){
			$value=$row;
			mysql_free_result($result);
			return $value;
		}
	}
	return false;
}

function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 

function groupvp($dbprefix,$ro,$cmcode,$fdate,$tdate){
	
	$sql = "select * from ".$dbprefix."calc_poschange1 where mcode = '$cmcode' and date_change between '$fdate' and '$tdate' group by rcode ";
	$rs3=mysql_query($sql);
	$xcount = 0;
	if (mysql_num_rows($rs3)>0)$xcount = mysql_num_rows($rs3);
	return $xcount;
}

function function_count_travel($dbprefix,$ro,$cmcode,$fdate,$tdate){
	
	$sql = "select * from ".$dbprefix."tmbonus1 where mcode = '$cmcode'  and seats > 0  group by rcode ";
	$rs3=mysql_query($sql);
	$xcount = 0;
	if (mysql_num_rows($rs3)>0)$xcount = mysql_num_rows($rs3);
	return $xcount;
}

function gettotalfv($dbprefix,$ro,$mcode,$fpdate,$tpdate,$backpv){
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
function gettotalbv($dbprefix,$mcode,$fpdate,$tpdate){
	$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ".$dbprefix."special_point WHERE  sadate<='$tpdate' AND sa_type='VA' AND mcode='$mcode' group by mcode ";
				//if($mcode == '0000075')echo "$sql3<BR>";
				$rs3=mysql_query($sql3);
				if (mysql_num_rows($rs3)>0) {
					$sqlObj3 = mysql_fetch_object($rs3);
					$total_fv3= $sqlObj3->tot_pv;
				}else{
					$total_fv3=0;
				}
				mysql_free_result($rs3);
				//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_fv3;
} 
function gettotalpv($dbprefix,$mcode){
	$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ".$dbprefix."special_point WHERE  sa_type='VA' AND mcode='$mcode' group by mcode ";
				//if($mcode == '0000075')echo "$sql3<BR>";
		$rs3=mysql_query($sql3);
		if (mysql_num_rows($rs3)>0) {
			$sqlObj3 = mysql_fetch_object($rs3);
			$total_fv3= $sqlObj3->tot_pv;
		}else{
			$total_fv3=0;
		}
		mysql_free_result($rs3);
				//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_fv3;
} 
function backmonthpv($dbprefix,$mcode,$fpdate,$tpdate){
	//if($mcode == '0000006')
	//{ var_dump($fdate);}
	$month=explode("-",$fpdate);
	
	//$sql2 = "select mcode,pv from ".$dbprefix."status WHERE month_pv = '".$month[0].$month[1]."' and status = 1 AND mcode='$mcode' ";
	//$sql2 = "select mcode,pv from ".$dbprefix."status WHERE month_pv = '".$month[0].$month[1]."' and pv > 0 AND mcode='$mcode' order by month_pv desc limit 0,1  ";
	$sql2 = "select mcode,pv from ".$dbprefix."status WHERE    mcode='$mcode' order by month_pv desc limit 0,1  ";
	//echo "$sql2<BR>";
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		$pv= $sqlObj2->pv;
	}else{
		$pv = 0;
	}
	////if($mcode == '0000006')
	//{ echo $sql2.' '.$pv;}
	return $pv;
}
 function checkpositionback($dbprefix,$mcode,$fpdate,$tpdate){
		$month=explode("-",$fpdate);
	$fpdate11 = $month[0].'-'.$month[1].'-01';
	$sql2 = "select mcode,pos_before from ".$dbprefix."calc_poschange  WHERE date_change >= '$fpdate' and date_change <= '".date("Y-m-d")."' AND mcode='$mcode' ORDER BY rcode ASC ";
	//$sql2 = "select mcode,pos_before from ".$dbprefix."calc_poschange  WHERE  date_change <= '$tpdate' AND mcode='$mcode' and pos_after = '$pos_cur' ORDER BY id DESC";
				//if($mcode == '0027051')echo "$sql2<BR>";
				$rs2=mysql_query($sql2);
				if (mysql_num_rows($rs2)>0) {
					$sqlObj2 = mysql_fetch_object($rs2);
					$pos_before= $sqlObj2->pos_before;
				}else{
					$pos_before = "";
				}
	return $pos_before;
}
 function checkpositionDate($dbprefix,$mcode,$fpdate,$tpdate){
	$month=explode("-",$fpdate);
	$sql2 = "select mcode,pos_before,date_change from ".$dbprefix."calc_poschange  WHERE pos_before = 'CM'  AND mcode='$mcode' ";
				//if($mcode == '0001245')echo "$sql2<BR>";

				$rs2=mysql_query($sql2);
				if (mysql_num_rows($rs2)>0) {
					$sqlObj2 = mysql_fetch_object($rs2);
					$pos_before= $sqlObj2->date_change;
				}else{
					$pos_before = 0;
				}
	return $pos_before;
}
function getweak($dbprefix,$mcode){
	$sql3 = "select mcode, SUM(total_pv_ll) AS tot_pv from ".$dbprefix."bmbonus WHERE  mcode='$mcode' and total <> 0 group by mcode ";
				//if($mcode == '0000075')echo "$sql3<BR>";
		$rs3=mysql_query($sql3);
		if (mysql_num_rows($rs3)>0) {
			$sqlObj3 = mysql_fetch_object($rs3);
			$total_fv3= $sqlObj3->tot_pv;
		}else{
			$total_fv3=0;
		}
		mysql_free_result($rs3);
				//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_fv3;
} 
function getweakstrong($dbprefix,$mcode,$lastmonth,$lastmonth1){

	$sql = "select * from ".$dbprefix."status where mcode = '$mcode' and month_pv = '$lastmonth1' and status = 1";
	$rs=mysql_query($sql);
	if (mysql_num_rows($rs)>0) {
		$sql3 = "select mcode, SUM(total_pv_ll) AS tot_pv,SUM(total_pv_rr) AS tot_pv1 from ".$dbprefix."bmbonus WHERE  mcode='$mcode' and total <> 0 and fdate like '%$lastmonth%' group by mcode ";
				//if($mcode == '0000075')echo "$sql3<BR>";
		$rs3=mysql_query($sql3);
		if (mysql_num_rows($rs3)>0) {
			$sqlObj3 = mysql_fetch_object($rs3);
			$total_fv3= $sqlObj3->tot_pv;
			//$total_fv3= $total_fv3+$sqlObj3->tot_pv1;
		}else{
			$total_fv3=0;
		}
		mysql_free_result($rs3);		
	}else{
		$total_fv3=0;
	}
	//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_fv3;
} 
function minusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	//$pcode1 = explode('_',$pcode);
	//if($pcode1[0] == 'PD'){
		 $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
		//exit;
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$pcode2 =$sqlObj->pcode;	
				$qty2 =$sqlObj->qty*$qty;	
				$sql = "update ".$dbprefix."product set qty = qty-$qty2 WHERE pcode='$pcode2' ";
				$rs1 = mysql_query($sql);
			}
		}else{
			$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
			$rs = mysql_query($sql);
		}
	
}
function calc_searchlocationbase($dbprefix,$locationbase){
	$sql = "SELECT * from ".$dbprefix."location_base WHERE cid = '".$locationbase."' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$arr_locationbase = array();
		$arr_locationbase["cshort"] = mysql_result($rs,0,'cshort');
		$arr_locationbase["cname"] = mysql_result($rs,0,'cname');
		$arr_locationbase["csending"] = mysql_result($rs,0,'csending');
		$arr_locationbase["ctax"] = mysql_result($rs,0,'ctax');		
		$arr_locationbase["crate"] = mysql_result($rs,0,'crate');		
		$arr_locationbase["pcode_register"] = mysql_result($rs,0,'pcode_register');		
		$arr_locationbase["pcode_extend"] = mysql_result($rs,0,'pcode_extend');		
		$arr_locationbase["smssending"] = mysql_result($rs,0,'smssending');		
	}
	return $arr_locationbase;
}



function dateDiff1($startDate, $endDate) { 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 

} 
function expdate1($startdate,$datenum){
 $startdatec=strtotime($startdate); // ทำให้ข้อความเป็นวินาที
 $tod=$datenum*86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
 $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
 return $ndate; // ส่งค่ากลับ
}
function updatePos1($dbprefix,$mcode,$cur_date,$tot_pv){

	$pos_piority = array('EX'=>2,'SU'=>1,'MB'=>0);
	$pos_exp = array('EX'=>3000,'SU'=>750,'MB'=>0);

	$chkmonth=explode("-",$cur_date);
	$chkmonth= $chkmonth[0].'-'.$chkmonth[1];
	$sql = "SELECT pos_cur,mdate from ".$dbprefix."member WHERE mcode='$mcode' ";
	$rs = mysql_query($sql);
	$pos_old = '';
	if(mysql_num_rows($rs)>0) {
		$pos_old = mysql_result($rs,0,'pos_cur');
		$mdate = mysql_result($rs,0,'mdate');
		$expmdte = date('Y-m-d',expdate1($mdate,'60'));
			$month=explode("-",$mdate);
			$thismonth = $month[0].'-'.$month[1];
			if($month[1] >= 12){
			  $month_1 = $month[0]+1;
			  $month_2 = '01';
				$nextmonth = $month_1.'-'.$month_2;

			}else if($month[1] >= 9){
			  $month_1 = $month[0];
			  $month_2 = $month[1]+1;
				$nextmonth = $month_1.'-'.$month_2;

			}else{
				$month_1 = $month[0];
				$month_2 = $month[1]+1;
				$month_2 = '0'.$month_2;
				$nextmonth = $month_1.'-'.$month_2;
			}
	}
//	echo $expmdte.' : '.$cur_date.' : '.$nextmonth.' : '.$mdate;
//	exit;
	//if($chkmonth == $thismonth or $chkmonth == $nextmonth ){
	if($expmdte > $cur_date ){
		//-----เก็บคะแนนสูงสุดที่มีการซื้อ
		//$sql = "SELECT MAX(tot_pv) as pv from ".$dbprefix."asaleh WHERE mcode='$mcode' ";
		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and (sadate <= '$cur_date') and cancel=0 ";
		//echo $sql.'<br>';
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		//mysql_free_result($rs);

		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode."' and sa_type='A' and (sadate <= '$cur_date')  and cancel=0 ";
		$rs = mysql_query($sql);
		//echo $sql.'<br>';
		$mexph = 0;
		if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
		mysql_free_result($rs);
		$mexp=($mexp+$mexph);
		//echo 'sss'.$mexp.'<br>';
	}else{
		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and sadate like  '%".$cdate1."%' and cancel=0 ";
		//echo $sql.'<br>';
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		//mysql_free_result($rs);

		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode."' and sa_type='A' and sadate like  '%".$cdate1."%'  and cancel=0 ";
		$rs = mysql_query($sql);
		//echo $sql.'<br>';
		$mexph = 0;
		if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
		mysql_free_result($rs);
		$mexp=($mexp+$mexph);
		//$mexp = $tot_pv;
	}
//exit;
	//-----เก็บตำแหน่งปัจจุบัน
	//mysql_free_result($rs);
	//คำนวณตำแหน่ง
	$pos_new = $pos_old;
	foreach(array_keys($pos_exp) as $key){
		//echo $key;
		if($mexp>=$pos_exp[$key]){ $pos_new = $key; break;}
	}
	//echo $mexp.' : '.$mexph.' : '.$pos_old."=>".$pos_new;
	if($pos_new != $pos_old && $pos_piority[$pos_new]>$pos_piority[$pos_old]){
		$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 ";	
		mysql_query($sql);
		$sql = "INSERT INTO ".$dbprefix."poschange (mcode,pos_before,pos_after,date_change) ";
		$sql .= "VALUES('".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
		mysql_query($sql);

		$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
		$sql .= "VALUES('0','".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
		mysql_query($sql);
		//====================LOG===========================
		$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
		//writelogfile($text);
		//=================END LOG===========================
		
		
	}

}
?>