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
//select * from gug_ad WHERE (rcode_l >=367 and rcode_l <=367) or (rcode_r >=367 and rcode_r <=367) ORDER BY rcode_l,mcode 
set_time_limit( 0);
ini_set("memory_limit","200M");
ob_start();

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
			$sql = "select * from ".$dbprefix."dround where rcode between '".$rof."' and '".$rot."' and calc='1'";
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
echo "1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน around<BR>";
$text="uid=".$_SESSION["adminuserid"]." action=binary calc rcode=$ftrc[0]-$ftrc[1]";
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
	$maxlv		=15;
	$taxrate 	= (5/100);
	$bonuslv1 = 0.50;
	$bonuslv2 = 0.25;
	$bonuslv3 = 0.25;
	$sql="select * from ".$dbprefix."dround where  rcode='".$ro."'  ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$fsano=$row["fsano"];
		$tsano=$row["tsano"];
		$tdate=$row["tdate"];
		$fdate=$row["fdate"];
		$rdate=$row["rdate"];
		$paydate=$row["paydate"];
		$pfdate = explode("-",$fdate);
		$psmonth=$pfdate[0].$pfdate[1];
		///////////////////////////////////////////////////////////////////////
		//คำนวณ แต่ละรอบ $ro
		echo "<BR><BR>คำนวณโบนัสรอบที่ RO=$ro<BR>";
		//			 1.4 ใช้ ambonus = เก็บคะแนนสำหรับ 3 ขา L-C-R

		//ลบข้อมูลใน apv ที่อยู่ในรอบ $ro
		$sql="delete from ".$dbprefix."dpv where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$text="uid=".$_SESSION["adminuserid"]." action=comsn_d_calc =>$sql";
		writelogfile($text);
		
		//ลบข้อมูลใน ambonus ที่อยู่ในรอบ $ro
		$sql="delete from ".$dbprefix."dmbonus where rcode= '".$ro."'";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$text="uid=".$_SESSION["adminuserid"]." action=comsn_d_calc =>$sql";
		writelogfile($text);
		
		//ลบข้อมูลใน am ที่อยู่ในรอบ $ro
		$sql="delete from ".$dbprefix."dc where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$text="uid=".$_SESSION["adminuserid"]." action=comsn_d_calc =>$sql";
		writelogfile($text);
		
		//ลบข้อมูลใน ad ที่อยู่ในรอบ $ro
		$sql="delete from ".$dbprefix."dm where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}		
		$text="uid=".$_SESSION["adminuserid"]." action=comsn_d_calc =>$sql";
		writelogfile($text);
		
		//    2. เลือกบิลขายทั้งหมดในรอบนี้
		//       2.1 สำหรับแต่ละบิลขาย เก็บไว้ในตาราง Total PV
		echo "            2. สำหรับบิลของ sMC ทุกคนใน asaleh ในรอบ $ro นี้<BR>";
		//-=- update21082008 
		//$cnt =0;
		//unset($mcode_chk);

		$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode[$i] =$sqlObj->mcode;		
			$name_t[$i] =$sqlObj->name_t;		
			$upa_code[$mcode[$i]] = $sqlObj->sp_code;
			$lr[$mcode[$i]] = $sqlObj->lr;
			$pos_cur[$mcode[$i]] = $sqlObj->pos_cur;
			$pos_buy[$mcode[$i]] = $sqlObj->pos_cur;

			$tot_pv[$mcode[$i]] = 0; 
			$sum_pv[$mcode[$i]][1] =0;
			$sum_pv[$mcode[$i]][2] =0;
			$sum_pv[$mcode[$i]][3] =0;
			
			$count[$mcode[$i]][1] =0;
			$count[$mcode[$i]][2] =0;
			$count[$mcode[$i]][3] =0;

			$pcarry_l[$mcode[$i]]= 0;
			$pcarry_r[$mcode[$i]] = 0;
			$pcarry_c[$mcode[$i]] = 0;

			$old_quota[$mcode[$i]] = 0;
		}
			

///////////////// Sum bill in round ////////////////////////  รวม PV ของทุกคนใน APV
		$sql = " insert into ".$dbprefix."dpv  (rcode, mcode, total_pv) ";
		$sql .= "	select '$ro', mcode, SUM(total) AS total_pv from ".$dbprefix."bmbonus WHERE fdate>='$fdate' and tdate<='$tdate' group by mcode ";
		mysql_query($sql) or die(mysql_error());
		//echo "$sql<br>";
		//exit;
		
		
	$maxlv=3;
	$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		for($m=0;$m<mysql_num_rows($rs);$m++){
			$sqlObj = mysql_fetch_object($rs);
			$n_mcode[$m] =$sqlObj->mcode;		
			$n_name_t[$m] =$sqlObj->name_t;		
			$n_upa_code[$n_mcode[$m]] = $sqlObj->sp_code;
			$n_lr[$n_mcode[$m]] = $sqlObj->lr;
		}
	mysql_free_result($rs);
	
	$sql="select * from ".$dbprefix."dpv where rcode = '$ro' "; 
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj			= mysql_fetch_object($rs);
			$apv_rcode		= $sqlObj->rcode;
			$apv_mcode	= $sqlObj->mcode;
			$apv_total_pv	= $sqlObj->total_pv;	
			//echo "dpv : $apv_total_pv = $i<BR> ";
			
			for($j=0;$j<sizeof($n_mcode);$j++){
				//echo "รหัสสมาชิก : $n_mcode[$j] = $apv_mcode<BR>";
				if($n_mcode[$j]<>$apv_mcode){
					//ไม่มี pv
				}else{
					//echo "มีบิลขาย : $up<BR>";
					$up	= $n_mcode[$j];
					$lv	 	= 0;
					$glv	=1;
					while($up <> "" ){
						//echo "up : $up<BR>";
						//echo "upa : $upa_code[$up]  $lv  $maxlv<BR>";
						if($n_upa_code[$up] <>"" && $glv <= $maxlv){
							$lv	= ($lv+1);
							$flg=0;
							switch ($glv) {
								case 1 :
										$sql1="SELECT mcode,pos_cur FROM ".$dbprefix."member where mcode='".$n_upa_code[$up]."' ";
										$rs1 = mysql_query($sql1);
										if (mysql_num_rows($rs1)>0) {
											$sqlObj1 = mysql_fetch_object($rs1);
											$d_mcode=$sqlObj1->mcode;
											$d_pos_cur=$sqlObj1->pos_cur;
										}
										mysql_free_result($rs1);
										//echo "ตรวจสอบรหัส <1> $d_mcode ตำแหน่ง $d_pos_cur";
										switch ($d_pos_cur){
											case 'S' :
													$flg=1;
													$bonus = 0.25;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'G' :
													$flg=1;
													$bonus = 0.50;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'P' :
													$flg=1;
													$bonus = 0.50;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'T' :
													$flg=1;
													$bonus = 0.50;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'D' :
													$flg=1;
													$bonus = 0.50;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'SD' :
													$flg=1;
													$bonus = 0.50;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'GE' :
													$flg=1;
													$bonus = 0.50;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'DE' :
													$flg=1;
													$bonus = 0.50;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'CD' :
													$flg=1;
													$bonus = 0.50;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											default :
													$flg=0;
													$bonus = 0;
													$apv_total =0;
												break;
										}
									break;
								case 2 :
										$sql1="SELECT mcode,pos_cur FROM ".$dbprefix."member where mcode='".$n_upa_code[$up]."' ";
										$rs1 = mysql_query($sql1);
										if (mysql_num_rows($rs1)>0) {
											$sqlObj1 = mysql_fetch_object($rs1);
											$d_mcode=$sqlObj1->mcode;
											$d_pos_cur=$sqlObj1->pos_cur;
										}
										mysql_free_result($rs1);
										//echo "ตรวจสอบรหัส <2> $d_mcode ตำแหน่ง $d_pos_cur";
										switch ($d_pos_cur){
											case 'P' :
													$flg=1;
													$bonus = 0.10;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'T' :
													$flg=1;
													$bonus = 0.10;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'D' :
													$flg=1;
													$bonus = 0.20;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'SD' :
													$flg=1;
													$bonus = 0.30;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'GE' :
													$flg=1;
													$bonus = 0.30;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'DE' :
													$flg=1;
													$bonus = 0.30;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'CD' :
													$flg=1;
													$bonus = 0.30;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											default :
													$flg=0;
													$bonus = 0;
													$apv_total =0;
												break;
										}
									break;
								case 3 :
										$sql1="SELECT mcode,pos_cur FROM ".$dbprefix."member where mcode='".$n_upa_code[$up]."' ";
										$rs1 = mysql_query($sql1);
										if (mysql_num_rows($rs1)>0) {
											$sqlObj1 = mysql_fetch_object($rs1);
											$d_mcode=$sqlObj1->mcode;
											$d_pos_cur=$sqlObj1->pos_cur;
										}
										mysql_free_result($rs1);
										//echo "ตรวจสอบรหัส <3> $d_mcode ตำแหน่ง $d_pos_cur";
										switch ($d_pos_cur){
											case 'T' :
													$flg=1;
													$bonus = 0.10;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'D' :
													$flg=1;
													$bonus = 0.10;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'SD' :
													$flg=1;
													$bonus = 0.10;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'GE' :
													$flg=1;
													$bonus = 0.20;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'DE' :
													$flg=1;
													$bonus = 0.20;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											case 'CD' :
													$flg=1;
													$bonus = 0.20;
													$apv_total = ($apv_total_pv*$bonus);
												break;
											default :
													$flg=0;
													$bonus = 0;
													$apv_total =0;
												break;
										}								
									break;
								default:
									$flg=0;
									$bonus = 0;
									$apv_total =0;
									break;
							}
							//echo "ตรวจสอบสถานะรหัส '".$n_mcode[$j]."' ผู้แนะนำ '".$n_upa_code[$up]."' รักษายอด $flg ตำแหน่ง $d_pos_cur <br>";

							//ตรวจสอบการรักษายอด
							//ตรวจสอบการขอรักษายอด
							$my_pv=0;
							$sql="select * from ".$dbprefix."my_pv where mcode='$d_mcode' and pmonth='$psmonth'  LIMIT 1 ";
							//echo "$sql<br>";
							$result=mysql_query($sql);
							if (mysql_num_rows($result)>'0') {
								$row= mysql_fetch_array($result, MYSQL_ASSOC);
								$status=$row["status"];
								$pos_cur=$row["pos_cur"];
								$pmonth=$row["pmonth"];
							}else{
								$status=0;
							}
							//echo "รหัส $d_mcode  ตำแหน่ง $pos_cur สถานะ $status<br>";
							if($status>=1){
								$sql = " INSERT INTO ".$dbprefix."dc (rcode, mcode, upa_code,pv,level, percer, total) VALUES ('$ro','".$n_mcode[$j]."','".$n_upa_code[$up]."','".$apv_total_pv."',".$glv.",'".$bonus."','".$apv_total."') ";
								mysql_query($sql) or die(mysql_error());
								//echo "$sql<br>";
							}
							$glv=($glv+1);
						}//$upa_code[$up] <>""){
						$up = $n_upa_code[$up];
					} //if($n_upa_code[$up] <>"" && $lv <= $maxlv){ END
				}//if($mcode[$j]<>$apv_mcode){END
			}//for($j=0;$j<sizeof($n_mcode);$j++){ END
		} //for($i=0;$i<mysql_num_rows($rs);$i++){ END
		mysql_free_result($rs);

		//คำนวณโบนัส สรุปจ่ายโบนัส		
		$sql = " insert into ".$dbprefix."dmbonus  (rcode, mcode, total,tax,bonus) ";
		$sql .= "	select '$ro', upa_code,sum(total) as totalpv,sum(total)*3/100 as tax,sum(total)-sum(total)*3/100 as bonus from ".$dbprefix."dc WHERE  rcode='$ro' group by upa_code ";
		mysql_query($sql) or die(mysql_error());

	//ปรับ calc ของ bround ให้เป็น '1'
	$sql="update ".$dbprefix."dround set calc='1' where rcode='$ro' ";
	//====================LOG===========================
	$text="uid=".$_SESSION["adminuserid"]." action=Matching calc =>$sql";
	writelogfile($text);
	//=================END LOG===========================
	if(mysql_query($sql)){
		mysql_query("COMMIT");
	}else{
		echo "error $sql<BR>";
	}
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
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=29">
<table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">กรอกรอบการคำนวณโบนัสแผน A (ไบนารี่) ที่ต้องการคำนวนเช่น 1-12</td>
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

function getpvprivate($dbprefix,$ro,$n_mcode){
	$value=0;
	$sql="select sum(total_pv) as pv from ".$dbprefix."apv where  rcode<='".$ro."' and mcode='".$n_mcode."'  ";
	//echo "$sql<br>";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$value=$row["pv"];
		return $value;
	}
	return $value;
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
 
 
?>