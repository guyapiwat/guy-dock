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
			$sql = "select * from ".$dbprefix."cround where rcode between '".$rof."' and '".$rot."' and calc='1'";
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
echo "1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน cround<BR>";
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
	$step="1.1";
	$bonusperpair = 500;
	$cpercenD	= 0.05;
	$cpercenS	= 0.07;
	$cpercenP	= 0.09;
	$sql="select * from ".$dbprefix."cround where  rcode='".$ro."'  ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>'0') {
		$row= mysql_fetch_array($result, MYSQL_ASSOC);
		$fsano=$row["fsano"];
		$tsano=$row["tsano"];
		$tdate=$row["tdate"];
		$fdate=$row["fdate"];
		$tpdate=$row["tpdate"];
		$fpdate=$row["fpdate"];
		$rdate=$row["rdate"];
		$paydate=$row["paydate"];
		//เริ่มต้น
		$pfdate = explode("-",$fdate);
		$pfyear=$pfdate[0];
		$pfmonth=$pfdate[1];
		$pfday=$pfdate[2];
		//สิ้นสุด
		$ptdate = explode("-",$tdate);
		$ptyear=$ptdate[0];
		$ptmonth=$ptdate[1];
		$ptday=$ptdate[2];
		//ปีัเดือน
		$psmonth=$pfdate[0].$pfdate[1];
		///////////////////////////////////////////////////////////////////////
		//คำนวณ แต่ละรอบ $ro
		echo "<BR><BR>คำนวณโบนัสรอบที่ RO=$ro<BR>";
		//			 1.4 ใช้ ambonus = เก็บคะแนนสำหรับ 3 ขา L-C-R

		//ลบข้อมูลใน apv ที่อยู่ในรอบ $ro
		$sql="delete from ".$dbprefix."cpv where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$text="uid=".$_SESSION["adminuserid"]." action=comsn_c_calc =>$sql";
		writelogfile($text);
		
		//ลบข้อมูลใน ambonus ที่อยู่ในรอบ $ro
		$sql="delete from ".$dbprefix."cmbonus where rcode= '".$ro."'";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$text="uid=".$_SESSION["adminuserid"]." action=comsn_c_calc =>$sql";
		writelogfile($text);
		
		//ลบข้อมูลใน am ที่อยู่ในรอบ $ro
		$sql="delete from ".$dbprefix."cm where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$text="uid=".$_SESSION["adminuserid"]." action=comsn_c_calc =>$sql";
		writelogfile($text);
		
		//ลบข้อมูลใน ad ที่อยู่ในรอบ $ro
		$sql="delete from ".$dbprefix."cc where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}		
		$text="uid=".$_SESSION["adminuserid"]." action=comsn_c_calc =>$sql";
		writelogfile($text);
		
		//    2. เลือกบิลขายทั้งหมดในรอบนี้
		//       2.1 สำหรับแต่ละบิลขาย เก็บไว้ในตาราง Total PV
		echo "            2. สำหรับบิลของ sMC ทุกคนใน asaleh ในรอบ $ro นี้<BR>";
		//-=- update21082008 
		
		fnc_calc_status($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate,$mcode);

			//ปรับ calc ของ around ให้เป็น '1'
			$sql="update ".$dbprefix."cround set calc='1' where rcode='$ro' ";
			if(mysql_query($sql)){
				mysql_query("COMMIT");
			}else{
				echo "error $sql<BR>";
			//}
			}

		}
		//คำนวณ แต่ละรอบ $ro
		///////////////////////////////////////////////////////////////////////
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
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=26">
<table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">กรอกรอบการคำนวณรอบการจ่าย แผน A ที่ต้องการคำนวนเช่น 1-12</td>
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
function fnc_calc_status($dbprefix,$ro,$strfdate,$strtdate,$fpdate,$tpdate,$fmcode){
	if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
		$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' and m.mcode='".$fmcode."'";
	}else if($strfdate!=""&&$strtdate!=""){
		$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' ";
	}else if($fmcode!=""){
		$whereclass = " AND m.mcode='".$fmcode."'";
	}
	$sql = "SELECT m.mcode,m.name_t,m.pos_cur,m.sp_code,m.cmp,m.cmp2,m.acc_no,	 
	((SELECT ifnull(sum(a.total),0) from ".$dbprefix."ambonus a where a.mcode=m.mcode  ".$whereclass." )+
	(SELECT ifnull(sum(b.total),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass." )+
	(SELECT ifnull(sum(e.total),0) from ".$dbprefix."embonus e where e.mcode=m.mcode  ".$whereclass." )+
	(SELECT ifnull(sum(d.total),0) from ".$dbprefix."dmbonus d where d.mcode=m.mcode  ".$whereclass." ))*0.95 as totalamt 
	from ".$dbprefix."member m ";
	$rs1 = mysql_query($sql);
	if(mysql_num_rows($rs1) > 0){
		for($j=0;$j<mysql_num_rows($rs1);$j++){
			$sqlObj1 = mysql_fetch_object($rs1);
				$totalamt1[$j] = 0;
				$totalamt[$j] = 0;
			$totalamt[$j] = $sqlObj1->totalamt;
			//if($totalamt[$j] > 0){
				$mcode[$j] =$sqlObj1->mcode;		
				$name_t[$j] =$sqlObj1->name_t;
				$pos_cur[$j] =$sqlObj1->pos_cur;
				$sp_code[$mcode[$j]] = $sqlObj1->sp_code;
				$acc_no[$j] =$sqlObj1->acc_no;
				$cmp[$j] =$sqlObj1->cmp;
				$cmp2[$j] =$sqlObj1->cmp2;
				$moneyb[$j] = 0;
				$moneyb[$j] = backmonthpv($dbprefix,$mcode[$j],$ro);
				//$totalamt =$sqlObj->totalamt;
				$totalamt1[$j] =  $moneyb[$j]+$totalamt[$j];
				//if($totalamt1 >= 200){
				echo $mcode[$j].' '.$cmp[$j].' '.$cmp2[$j].' '.$accno[$j].' '.$totalamt1[$j].' '.$moneyb[$j].' '.$totalamt[$j].'<br>';
				if($totalamt1[$j] > 0){
					if($cmp[$j] == 'ครบ' and $cmp2[$j] == 'ครบ' and !empty($acc_no[$j])){
						if($pos_cur != 'CM' ){
							$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,total,mdate,month_pv,mpos) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','1','".$moneyb[$j]."','".$totalamt[$j]."','".$totalamt1[$j]."','".$fdate."','".$month[0].$month[1]."','".$pos_cur[$j]."')";
						}else if($totalamt1 >= 200){
							$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,total,mdate,month_pv,mpos) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','1','".$moneyb[$j]."','".$totalamt[$j]."','".$totalamt1[$j]."','".$fdate."','".$month[0].$month[1]."','".$pos_cur[$j]."')";
						}else{
							$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,total,mdate,month_pv,mpos) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$totalamt1[$j]."','".$totalamt[$j]."','0','".$fdate."','".$month[0].$month[1]."','".$pos_cur[$j]."')";
						}
						mysql_query($sql);
					}else{
						$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,total,mdate,month_pv,mpos) ";
						$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$totalamt1[$j]."','".$totalamt[$j]."','0','".$fdate."','".$month[0].$month[1]."','".$pos_cur[$j]."')";
						mysql_query($sql);
					}
				//	echo $sql.'<br>';
				}
			//}
		}
	}
}
 function backmonthpv($dbprefix,$mcode,$ro){
	$sql2 = "select mcode,pv,status from ".$dbprefix."cmbonus WHERE  mcode='$mcode'  order by rcode desc limit 0,1 ";
	//echo $sql2.'<br>';
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		if($sqlObj2->status == '0')$pv= $sqlObj2->pv;
		else $pv=0;
	}else{
		$pv = 0;
	}
	return $pv;
}

 function get_sp_code($dbprefix,$n_mcode,$pos_cur){
	$sql4="SELECT COUNT(mcode) as cnt FROM ".$dbprefix."member where sp_code='".$n_mcode."' and pos_cur='$pos_cur' ";
	//echo "$sql4<br>";
	$rs4 = mysql_query($sql4);
	if(mysql_num_rows($rs4)>0){
		$row4 = mysql_fetch_object($rs4);
		$cnt=$row4->cnt;
		return $cnt;
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

function checkpvformcode($pvmcode,$dbpre){
global $gpv_new,$pv_new;
	$sql="SELECT mcode,gpv,pv FROM ".$dbpre."cm Where mcode='$pvmcode' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$row = mysql_fetch_object($rs);
		$gpv_new = $row->gpv;
		$pv_new  = $row->pv;
		echo "คำแนน : สะสม  $gpv_new ใหม $pv_new รหัส $pvmcode<BR> ";
	}else{
		$gpv_new = 0;
		$pv_new = 0;
	}
	//mysql_free_result($sql);
}

function getpositionnow($posmcode,$dbpre){
global $pos_new;
	$sql="SELECT mcode,pos_cur FROM ".$dbpre."member Where mcode='$posmcode' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$row = mysql_fetch_object($rs);
		$pos_new = $row->pos_cur;
		echo "ตำแหน่งปัจจุบัน : $pos_new รหัส $posmcode <BR>";
	}else{
		$pos_new = "";
	}
	//mysql_free_result($sql);
}

function getlastpvcmbonus($pmcode,$prcode,$dbpre){
global $pcarry_l, $pcarry_r;
	$sql="SELECT rcode,mcode,carry_l,carry_r FROM ".$dbpre."cmbonus WHERE rcode=(SELECT max(rcode) FROM ".$dbpre."cmbonus WHERE rcode<".$prcode.") and mcode='$pmcode' ";
	//echo "ตรวจสอบ คะแนนก่อนหน้า : $sql <BR>";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$row = mysql_fetch_object($rs);
		$pcarry_l = $row->carry_l;
		$pcarry_r = $row->carry_r;
		echo "คะแนนคงเหลือก่อนหน้า : $pcarry_l   $pcarry_r รหัส $pmcode<BR> ";
	}else {
		$pcarry_l=0;
		$pcarry_r=0;
		echo "ไม่มีคะแนนคงเหลือ : $pcarry_l   $pcarry_r รหัส $pmcode<BR>";
	}
	//mysql_free_result($sql);
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