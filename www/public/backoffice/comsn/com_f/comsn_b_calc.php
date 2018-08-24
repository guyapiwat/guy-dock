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
<? require_once ("function.log.inc.php");?>
<?

set_time_limit( 0);
ini_set("memory_limit","1024M");
ob_start();
?><font color="#ff0000">Demo ไม่สาามารถคำนวณได้<br /></font><?
				//showdialog();
				exit;
if(!isset($_POST["ftrcode"])){
	showdialog();
}else{ ?>
<br />
<table width="95%" border="0" align="center">
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
		$rof = $ftrc[0];
		$rot = $ftrc[1];

//================================================================================
			$sql = "select * from ".$dbprefix."fround where rcode between '".$rof."' and '".$rot."' and calc='1'";
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
echo "1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน fround<BR>";
$text="uid=".$_SESSION["adminuserid"]." action=Unilivel calc rcode=$ftrc[0]-$ftrc[1]";
writelogfile($text);
//       1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน around
//           1.1 อ่าน Ro, FSaNo, TSaNo
//           1.2 สร้างไฟล์ BM+rcode, BC+rcode
//           1.3 ลบข้อมูล BTOTSALE ในรอบ RO นี้ออกก่อน
for($ro=$ftrc[0];$ro<=$ftrc[1];$ro++){

	///////////////////////////////////////////////////////////////////////
	//$ro ระหว่าง Frcode-Trcode/////////////////////////////////////////
	//           1.1 อ่าน ro, FSaNo, TSaNo
	//$step="1.1";
	//echo "***ro=$ro<BR>";
	//$bonusperpair = 500;
	$maxlv		=20;
	$taxrate 	= (5/100);
	$bonuslv		= 0.08;
	$topuppv	= 250;
	$sql="select * from ".$dbprefix."fround where  rcode='".$ro."'  ";
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
		$paydate=$row["paydate"];
		$pmon=explode("-",$row["tdate"]);
		$pmonth=$pmon[0].$pmon[1];
		$month=explode("-",$row["tdate"]);
		$pmonth=$month[0].$month[1];
		///////////////////////////////////////////////////////////////////////
		//คำนวณ แต่ละรอบ $ro
		echo "<BR><BR>คำนวณโบนัสรอบที่ RO=$ro<BR>";
		//			 1.4 ใช้ ambonus = เก็บคะแนนสำหรับ 3 ขา L-C-R

		//ลบข้อมูลใน fpv ที่อยู่ในรอบ $ro
				$sql="delete from ".$dbprefix."fpv where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$sql="delete from ".$dbprefix."fc where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$sql="delete from ".$dbprefix."fm where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$sql="delete from ".$dbprefix."fmbonus where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}


	//	$sql="delete from ".$dbprefix."bmpersonal where rcode= ".$ro." ";
		//if(mysql_query($sql)){
		//	mysql_query("COMMIT");
		//}else{
		//	echo "error $sql<BR>";
		//}

		//$sql="delete from ".$dbprefix."upv where rcode= ".$ro." ";
		//if(mysql_query($sql)){
		//	mysql_query("COMMIT");
		//}else{
		//	echo "error $sql<BR>";
		//}
		
		//    2. เลือกบิลขายทั้งหมดในรอบนี้
		//       2.1 สำหรับแต่ละบิลขาย เก็บไว้ในตาราง Total PV
		echo "            2. สำหรับบิลของ sMC ทุกคนใน asaleh ในรอบ $ro นี้<BR>";
		//-=- update21082008 
		//$cnt =0;
		//unset($mcode_chk);

fnc_calc_fast_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);
		
//exit;
	//ปรับ calc ของ bround ให้เป็น '1'
	$sql="update ".$dbprefix."fround set calc='1' where rcode='$ro' ";
	if(mysql_query($sql)){
		mysql_query("COMMIT");
	}else{
		echo "error $sql<BR>";
	}
		///////////////////////////////////////////////////////////////////////
 
	}
	//mysql_free_result($result);
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
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=39">
<table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">กรอกรอบการคำนวณสาขา ที่ต้องการคำนวนเช่น 1-12</td>
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
function fnc_calc_fast_bonus($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){
	//????????????????????
	//?????????????????????????????
	$sql = "select  inv_code,sano,'A' as status,tot_pv,total,sadate,sa_type from ".$dbprefix."asaleh WHERE sadate>='$fdate' AND sadate<='$tdate' AND inv_code <> '' and cancel=0 and trnf =0  ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$inv_code= $sqlObj->inv_code;
			$sano= $sqlObj->sano;
			$status= $sqlObj->status;
			$tot_pv= $sqlObj->tot_pv;
			$total= $sqlObj->total;
			$sadate= $sqlObj->sadate;
			$sa_type= $sqlObj->sa_type;
			$sqlInsert = "insert into ".$dbprefix."fm(rcode,inv_code,sano,status,tot_pv,tot_price,mdate,sa_type) values
			('$ro','$inv_code','$sano','$status','$tot_pv','$total','$sadate','$sa_type')";
			mysql_query($sqlInsert) or die(mysql_error());
		}
		mysql_free_result($rs);
	}
	$sql 	= "select  inv_code,hono,'H' as status,tot_pv,total,sadate,sa_type from ".$dbprefix."holdhead  WHERE sadate>='$fdate' AND sadate<='$tdate' AND inv_code <> '' and cancel=0 and trnf =0  ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$inv_code= $sqlObj->inv_code;
			$hono= $sqlObj->hono;
			$status= $sqlObj->status;
			$tot_pv= $sqlObj->tot_pv;
			$total= $sqlObj->total;
			$sadate= $sqlObj->sadate;
			$sa_type= $sqlObj->sa_type;
			$sqlInsert = "insert into ".$dbprefix."fm(rcode,inv_code,sano,status,tot_pv,tot_price,mdate,sa_type) values
			('$ro','$inv_code','$hono','$status','$tot_pv','$total','$sadate','$sa_type')";
			mysql_query($sqlInsert) or die(mysql_error());
			mysql_free_result($rs);
		}
		mysql_free_result($rs);
	}
	$sql 	= "select  inv_code,sano,'E' as status,tot_pv,total,sadate,sa_type,inv_ref from ".$dbprefix."esaleh  WHERE sadate>='$fdate' AND sadate<='$tdate' AND inv_code <> 'I' and cancel=0 and trnf =0  ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$inv_code= $sqlObj->inv_code;
			$inv_ref= $sqlObj->inv_ref;
			$sano= $sqlObj->sano;
			$status= $sqlObj->status;
			$tot_pv= $sqlObj->tot_pv;
			$total= $sqlObj->total;
			$sadate= $sqlObj->sadate;
			$sa_type= $sqlObj->sa_type;
			$sqlInsert = "insert into ".$dbprefix."fm(rcode,inv_code,inv_ref,sano,status,tot_pv,tot_price,mdate,sa_type) values
			('$ro','$inv_code','$inv_ref','$sano','$status','$tot_pv','$total','$sadate','$sa_type')";
			mysql_query($sqlInsert) or die(mysql_error());
			mysql_free_result($rs);
		}
		mysql_free_result($rs);
	}






	$sql = " insert into ".$dbprefix."fpv  (rcode, mcode,total_pv,mpos) ";//Mobile
	$sql .= "	select '$ro', inv_code, SUM(tot_pv) AS total_pv,'S' from ".$dbprefix."asaleh WHERE sadate>='$fdate' AND sadate<='$tdate' AND inv_code <> '' and cancel=0 and trnf =0 group by mcode ";
	//echo $sql.'<br>';
	//exit;
	mysql_query($sql) or die(mysql_error());

	$sql = " insert into ".$dbprefix."fpv  (rcode, mcode,total_pv,mpos) ";// Mobile or Invent
	$sql .= "	select '$ro', inv_code, SUM(tot_pv) AS total_pv,'E' from ".$dbprefix."holdhead WHERE sadate>='$fdate' AND sadate<='$tdate'   and cancel=0 and trnf =0 group by mcode ";
	mysql_query($sql) or die(mysql_error());

	$sql = " insert into ".$dbprefix."fpv  (rcode, mcode,total_pv,mpos) ";// Invent Sell Mobile
	$sql .= "	select '$ro', inv_ref, SUM(tot_pv) AS total_pv,'I' from ".$dbprefix."esaleh WHERE sadate>='$fdate' AND sadate<='$tdate'   and cancel=0 and trnf =0 group by mcode ";
	mysql_query($sql) or die(mysql_error());
	//exit;
	$sql 	= "SELECT mcode,sum(total_pv) as pv FROM ".$dbprefix."fpv ";
	$sql .= "WHERE rcode='$ro' group by mcode";
	$rs = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlObj = mysql_fetch_object($rs);
		$nmcode= $sqlObj->mcode;
		$ntot_pv= $sqlObj->pv;
			//??????????????????????????????????
			$sp_code="";
			$exp_per = array('2'=>0.10,'12'=>0.02,'1'=>0.12);
			$sql1 = "SELECT inv_code,inv_type from ".$dbprefix."invent WHERE inv_code='$nmcode' ";
			//echo  "$sql1<br>";
			$rs1=mysql_query($sql1);
			if (mysql_num_rows($rs1)>0) {
				$sqlObj1 = mysql_fetch_object($rs1);
				$inv_code = $sqlObj1->inv_code;
				$inv_type= $sqlObj1->inv_type;
			}
			mysql_free_result($rs1);

				$sql1 = "select inv_code, SUM(tot_pv) AS total_bv from ".$dbprefix."asaleh WHERE  sadate>='$fdate' AND sadate<='$tdate' AND inv_code = '$inv_code'  and cancel=0 and trnf =0 group by inv_code ";
				$rs1=mysql_query($sql1);
				if (mysql_num_rows($rs1)>0) {
					$sqlObj1 = mysql_fetch_object($rs1);
					$total_bv1= $sqlObj1->total_bv;
					mysql_free_result($rs1);
					if($inv_type == '1')$per = 0.12;else $per = 0.10;
				}else{
					$total_bv1=0;
				}
				if($total_bv1>0){
					$ntot_pv = $total_bv1;
					$total=($ntot_pv*($per));
					$tax=($total*0.05);
					$totalamt=($total-$tax);
					$sql="";
					$sql = "INSERT INTO ".$dbprefix."fc (rcode,mcode,upa_code,pv,level,percer,total,fdate,tdate,pos_cur) VALUES";
						$sql .= "(".$ro.",'$nmcode','".$inv_code."','".$ntot_pv."','1','$per','".$total."','$fdate','$tdate','A') ";
						//echo  "$sql<br>";
						if (! mysql_query($sql)) {
							echo "<font color='#FF0000'>error</font><br>";
							echo  "$sql<br>";
							echo  die(mysql_error());
							exit;
						}
				}
				
				
				$sql2 = "select inv_code, SUM(tot_pv) AS total_bv from ".$dbprefix."esaleh  WHERE sadate>='$fdate' AND sadate<='$tdate'  and inv_ref  = '$inv_code'  and cancel=0 and trnf =0  group by inv_ref  ";
				$rs2=mysql_query($sql2);
				if (mysql_num_rows($rs2)>0) {
					$sqlObj2 = mysql_fetch_object($rs2);
					$total_bv2= $sqlObj2->total_bv;
					mysql_free_result($rs2);
					$per = 0.02;
				}else{
					$total_bv2=0;
				}
				if($total_bv2>0){
					$ntot_pv = $total_bv2;
					$total=($ntot_pv*($per));
					$tax=($total*0.05);
					$totalamt=($total-$tax);
					$sql = "INSERT INTO ".$dbprefix."fc (rcode,mcode,upa_code,pv,level,percer,total,fdate,tdate,pos_cur) VALUES";
						$sql .= "(".$ro.",'$nmcode','".$inv_code."','".$ntot_pv."','1','$per','".$total."','$fdate','$tdate','E') ";
						//echo  "$sql<br>";
						if (! mysql_query($sql)) {
							echo "<font color='#FF0000'>error</font><br>";
							echo  "$sql<br>";
							echo  die(mysql_error());
							exit;
						}
				}
				

				$sql3 = "select inv_code, SUM(tot_pv) AS total_bv from ".$dbprefix."holdhead WHERE sadate>='$fdate' AND sadate<='$tdate' and inv_code = '$inv_code'  and cancel=0 and trnf =0  group by inv_code ";
				//echo $sql3.'<br>';
				$rs3=mysql_query($sql3);
				if (mysql_num_rows($rs3)>0) {
					$sqlObj3 = mysql_fetch_object($rs3);
					$total_bv3= $sqlObj3->total_bv;
					mysql_free_result($rs3);
					if($inv_type == '1')$per = 0.12;else $per = 0.10;
				}else{
					$total_bv3=0;
				}
				if($total_bv3>0){
					$ntot_pv = $total_bv3;
					$total=($ntot_pv*($per));
					$tax=($total*0.05);
					$totalamt=($total-$tax);
					$sql = "INSERT INTO ".$dbprefix."fc (rcode,mcode,upa_code,pv,level,percer,total,fdate,tdate,pos_cur) VALUES";
						$sql .= "(".$ro.",'$nmcode','".$inv_code."','".$ntot_pv."','1','$per','".$total."','$fdate','$tdate','H') ";
						//echo  "$sql<br>";
						if (! mysql_query($sql)) {
							echo "<font color='#FF0000'>error</font><br>";
							echo  "$sql<br>";
							echo  die(mysql_error());
							exit;
						}
				}
					
						
				//}
	}
		$sql = " insert into ".$dbprefix."fmbonus  (rcode, mcode, total,tax,bonus,fdate,tdate,pos_cur) ";
		$sql .= "	select '$ro', upa_code,sum(total) as totalpv,sum(total)*5/100 as tax,sum(total)-sum(total)*5/100 as bonus,'$fdate','$tdate',pos_cur from ".$dbprefix."fc WHERE  rcode='$ro' and upa_code<>'' group by upa_code ";
		if (! mysql_query($sql)) {
			echo "<font color='#FF0000'>error</font><br>";
			echo  "$sql<br>";
			echo  die(mysql_error());
			exit;
		}
}

function getregis($dbprefix,$c_mcode) {
	$sql = "SELECT mdate from ".$dbprefix."member WHERE mcode='$c_mcode' ";
	$rs = mysql_query($sql);
	$mdate = '';
		if(mysql_num_rows($rs)>0){
			$mdate = mysql_result($rs,0,'mdate');
			return $mdate;
		}else{
			return $mdate;
		}
}

function getpossition($dbprefix,$c_mcode) {
	$sql = "SELECT pos_cur from ".$dbprefix."member WHERE mcode='$c_mcode' ";
	$rs = mysql_query($sql);
	$pos_old = '';
		if(mysql_num_rows($rs)>0){
			$pos_old = mysql_result($rs,0,'pos_cur');
			return $pos_old;
		}else{
			return $pos_old;
		}
}

function checkingdatepv($dbprefix,$nmcode,$tdate,$fdate){
global $flag,$sum_pv;
		$flag = 0;
		$sum_pv = 0;
		$month=explode("-",$fdate);
		$flag =1;
		$sql1="SELECT * from ".$dbprefix."status WHERE mcode='$nmcode' and month_pv='".$month[0].$month[1]."' and status='1' ";
		//echo "ตรวจสอบบิลรักษายอด รหัส $mcode >>>> $sql1<br>";
		$rs1=mysql_query($sql1);
		if (mysql_num_rows($rs1)>'0') {
			$row1= mysql_fetch_array($rs1, MYSQL_ASSOC);
			$sum_pv = 1;
			return $sum_pv;
		}else{
			return 0;
		}
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

function createTree($ro, $mcode){
	//ฟังก์ชั่นสำหรับคำนวณ
	global $dbprefix,$ro;
	
	$sql = "select mcode from ".$dbprefix. " where upa_code = '$mcode' ";
	for($i= 0; $i < 2; $i++){
				
	}
}

function getPair($cur_r, $cur_l,$remain_r, $remain_l ){
global $cut, $tot_l, $tot_r , $strongside, $sumright, $sumleft;
	$sumleft = ($cur_l + $remain_l);
	$sumright = ($cur_r + $remain_r);
	$lsum = floor(($sumleft - fmod($sumleft,1000))/1000);
	$rsum = floor(($sumright - fmod($sumright,1000))/1000);
 	
	$cut = min($lsum, $rsum);
	
	if($lsum == $rsum){
		//------ 2:1 สลับ 1:2 ---------//
	 	$t1 = floor($lsum / 3);
	 	$tot_l = $sumleft - ($t1 * 3)*1000;
	 	$tot_r = $sumright - ($t1 * 3)*1000;
	 	$cut = $t1 * 2;
	 	if(($lsum - ($t1 * 3)) ==2)  { // left high priority
	 	  $tot_l = 0;
	 	  $tot_r = 1000;
	 	  $cut += 1;
	 	}
		echo "จากฝั่งซ้าย $lsum ฝั่งขวา $rsum ตัด $cut เหลือซ้าย $tot_l เหลือขวา $tot_r <br>";   
	 	$strongside = "E";
	 	
	}else if($lsum > $rsum){
		 
		$t1  = floor($lsum / 2 ) ;
		if($t1 > $rsum)	$t1 = $rsum;
		$tot_l = $sumleft - ($t1 * 2)*1000;
		$tot_r = $sumright - ($t1)*1000;
		$cut= $t1;
		$strongside = "L";
		echo "จากฝั่งซ้าย $lsum ,ฝั่งขวา $rsum ตัด $cut เหลือซ้าย $tot_l เหลือขวา $tot_r <br>";   
				
	}else { // rsum > lsum
		$t1  = floor($rsum / 2  );
		if($t1 > $lsum)	$t1 = $lsum;
		$tot_r = $sumright - ($t1 * 2)*1000;
		$tot_l = $sumleft - ($t1)*1000;
		$cut= $t1;
		$strongside = "R";
	 	echo "จากฝั่งซ้าย $lsum  , ฝั่งขวา $rsum ตัด $cut เหลือซ้าย $tot_l เหลือขวา $tot_r <br>";   
	}
 
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
 function gettotalfv($dbprefix,$mcode,$fpdate,$tpdate){
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
				//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_fv3;
} 
function gettotalbv($dbprefix,$mcode,$fpdate,$tpdate){
	$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ".$dbprefix."special_point WHERE sadate>='$fpdate' AND sadate<='$tpdate' AND sa_type='VA' AND mcode='$mcode' group by mcode ";
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
 function checkpositionback($dbprefix,$mcode,$fpdate,$tpdate){
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
	$sql2 = "select mcode,mpos  from ".$dbprefix."status WHERE month_pv = '$month1' AND mcode='$mcode' ";
				//echo "$sql2<BR>";
				$rs2=mysql_query($sql2);
				if (mysql_num_rows($rs2)>0) {
					$sqlObj2 = mysql_fetch_object($rs2);
					$mpos= $sqlObj2->mpos;
				}else{
					$mpos = 0;
				}
	return $mpos;
}

?>