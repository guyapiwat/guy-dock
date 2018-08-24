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
?><font color="#ff0000"><br /></font><?
				//showdialog();
				//exit;
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
			$sql = "select * from ".$dbprefix."cround1 where rcode between '".$rof."' and '".$rot."' and calc='1'";
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
echo "1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน cround1<BR>";
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
	$sql="select * from ".$dbprefix."cround1 where  rcode='".$ro."'  ";
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
		$sql="delete from ".$dbprefix."cmbonus1 where rcode= '".$ro."'";
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
		
		//fnc_calc_adjust($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);

		fnc_calc_status($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate,$mcode,$paydate);

//		fnc_calc_adjust($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);
			//ปรับ calc ของ around ให้เป็น '1'
			$sql="update ".$dbprefix."cround1 set calc='1' where rcode='$ro' ";
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
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=49">
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
function fnc_calc_status($dbprefix,$ro,$strfdate,$strtdate,$fpdate,$tpdate,$fmcode,$paydate){
	$selectpackfile = " select * from ".$dbprefix."cround1 where rcode = '$ro'";
	$rs2 = mysql_query($selectpackfile);
	if(mysql_num_rows($rs2) > 0){
		$objpack = mysql_fetch_object($rs2);
		$adjust_binary =$objpack->adjust_binary;		
		$adjust_matching =$objpack->adjust_matching;		
		$adjust_pool =$objpack->adjust_pool;
	}
	if($strfdate!=""&&$strtdate!=""&&$fmcode!=""){
		$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' and m.mcode='".$fmcode."'";
	}else if($strfdate!=""&&$strtdate!=""){
		$whereclass = " AND fdate>= '$strfdate' and tdate<= '$strtdate' ";
	}else if($fmcode!=""){
		$whereclass = " AND m.mcode='".$fmcode."'";
	}
	$sql = "SELECT m.mcode,m.name_t,m.pos_cur,m.sp_code,m.cmp,m.status,m.cmp2,m.acc_no,m.name_f as title,
	(SELECT ifnull(sum(a.total),0) from ".$dbprefix."dmbonus a where a.mcode=m.mcode  ".$whereclass." and a.total > 0 group by a.mcode) as totalmatch,
	(SELECT ifnull(sum(b.total),0) from ".$dbprefix."ombonus b where b.mcode=m.mcode  ".$whereclass." and b.total > 0 group by b.mcode) as totalonetime,
	(SELECT ifnull(sum(s.total),0) from ".$dbprefix."smbonus s where s.mcode=m.mcode  ".$whereclass." and s.total > 0 group by s.mcode) as totalstar
	from ".$dbprefix."member m ";
	$sql .= "LEFT JOIN (SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate GROUP BY mid) AS taba ON (m.id=taba.mid)";
	//echo $sql;
	//exit;
	$rs1 = mysql_query($sql);

	$sql3 = "select * from ".$dbprefix."cround1 where calc =1 order by rid asc limit 0,1";
	$rs3 = mysql_query($sql3);
	if(mysql_num_rows($rs3)>0){
		$tdate = mysql_result($rs3,0,"tdate");
		$monthmonth  = explode("-",$tdate);
	}	
	
	if(mysql_num_rows($rs1) > 0){
		for($j=0;$j<mysql_num_rows($rs1);$j++){
			$sqlObj1 = mysql_fetch_object($rs1);
				$totalamt1[$j] = 0;
				$totalamt[$j] = 0;
			$totalmatch[$j] = $sqlObj1->totalmatch;
			$totalonetime[$j] = $sqlObj1->totalonetime;
			$totalstar[$j] = $sqlObj1->totalstar;
			$totalamt[$j] = $totalmatch[$j]+$totalonetime[$j]+$totalstar[$j];
			//if($totalamt[$j] > 0){
				$mcode[$j] =$sqlObj1->mcode;		
				$name_t[$j] =$sqlObj1->name_t;
				$pos_cur[$j] =$sqlObj1->pos_cur;
				$sp_code[$mcode[$j]] = $sqlObj1->sp_code;
				$acc_no[$j] =$sqlObj1->acc_no;
				$cmp[$j] =$sqlObj1->cmp;
				$cmp2[$j] =$sqlObj1->cmp2;
				$mstatus[$j] =$sqlObj1->status;
				$moneyb[$j] = 0;
				$moneyb[$j] = backmonthpv($dbprefix,$mcode[$j],$ro);
				$exp_date[$j] =$sqlObj->exp_date;
				$mem_cntday[$j]=dateDiff($paydate, $exp_date[$j]);

				$title[$j] =$sqlObj1->title;
				if($title[$j] == 'บริษัทจำกัด' or $title[$j] == 'ห้างหุ้นส่วนจำกัด' ){
					$tax[$j] = $totalamt[$j]*0.03;
					$totalamt[$j] = $totalamt[$j]-$tax[$j];
				}else{

					$sql = "select 
					sum(ifnull(b.total,0))+sum(ifnull(d.total,0))+sum(ifnull(s.total,0))+sum(ifnull(a.total,0)) as total1 ";
					$sql .= " from ".$dbprefix."member m
					left join ".$dbprefix."ambonus a on(a.mcode=m.mcode and a.total > 0 and a.fdate like '%".$monthmonth[0]."%' and a.fdate < '$fdate' )
					left join ".$dbprefix."bmbonus b on(b.mcode=m.mcode and b.total > 0 and b.fdate like '%".$monthmonth[0]."%' and b.fdate < '$fdate'  )
					left join ".$dbprefix."dmbonus d on(d.mcode=m.mcode and d.total > 0 and d.fdate like '%".$monthmonth[0]."%' and d.fdate < '$fdate'  ) 
					left join ".$dbprefix."smbonus s on(s.mcode=m.mcode and s.total > 0 and s.fdate like '%".$monthmonth[0]."%' and s.fdate < '$fdate' ) 
					";
					$sql .= " WHERE  m.mcode = '".$mcode[$j]."' ";
					$rs1234 = mysql_query($sql);
					if(mysql_num_rows($rs1234) > 0){
						$sqlObj123 = mysql_fetch_object($rs1234);
						$total1 =$sqlObj123->total1;
					}			
					if($total1 >= 500000)$tax[$j] = $totalamt[$j]*0.1;
					else if($total1+$totalamt[$j] >= 500000)$tax[$j] = ($total1+$totalamt[$j]-500000)*0.1;
					else $tax[$j] = 0;
					$totalamt[$j] = $totalamt[$j]-$tax[$j];
				}

				//$totalamt =$sqlObj->totalamt;
				$totalamt1[$j] =  $moneyb[$j]+$totalamt[$j];
				//if($totalamt1 >= 200){
				//echo $adjust_binary.' '.$adjust_matching.' '.$adjust_pool.' '.$totalfast[$j].' '.$totalbinary[$j].' '.$totalmatching[$j].' '.$totalpool[$j].' '.$mcode[$j].' '.$cmp[$j].' '.$cmp2[$j].' '.$accno[$j].' '.$totalamt1[$j].' '.$moneyb[$j].' '.$totalamt[$j].'<br>';
				if($totalamt1[$j] > 0 and $mstatus[$j] == '0'){
					if($cmp[$j] == 'ครบ' and $cmp2[$j] == 'ครบ' and !empty($acc_no[$j]) and $mem_cntday[$j] > -90){
						if($totalamt1[$j] >= 300){
							$sql = "INSERT INTO ".$dbprefix."cmbonus1 (rcode,mcode,status,pv,pvb,total,mdate,month_pv,mpos,tot_tax,title,paydate) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','1','".$moneyb[$j]."','".$totalamt[$j]."','".$totalamt1[$j]."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$tax[$j]."','".$title[$j]."','$paydate')";
						}else{
						if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
						if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
						if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
						if($mem_cntday[$j] <= -90){
							$c_note4 = 1;
							mysql_query("update ".$dbprefix."member set status = '1' where mcode = '".$mcode[$j]."'");
						}else $c_note4 = "";
						$sql = "INSERT INTO ".$dbprefix."cmbonus1 (rcode,mcode,status,pv,pvb,total,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,tot_tax,title,paydate) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$totalamt1[$j]."','".$totalamt[$j]."','0','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$c_note1."','".$c_note2."','".$c_note3."','".$tax[$j]."','".$title[$j]."','$paydate')";
						}
						mysql_query($sql);
					}else{
						if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
						if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
						if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
						if($mem_cntday[$j] <= -90){
							$c_note4 = 1;
							mysql_query("update ".$dbprefix."member set status = '1' where mcode = '".$mcode[$j]."'");
						}else $c_note4 = "";
						$sql = "INSERT INTO ".$dbprefix."cmbonus1 (rcode,mcode,status,pv,pvb,total,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,tot_tax,title,paydate) ";
						$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$totalamt1[$j]."','".$totalamt[$j]."','0','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$c_note1."','".$c_note2."','".$c_note3."','".$c_note4."','".$tax[$j]."','".$title[$j]."','$paydate')";
						mysql_query($sql);
					}
				//	echo $sql.'<br>';
				}
			//}
		}
	}
}
 function backmonthpv($dbprefix,$mcode,$ro){
	$sql2 = "select mcode,pv,status from ".$dbprefix."cmbonus1 WHERE  mcode='$mcode'  order by rcode desc limit 0,1 ";
	//echo $sql2.'<br>';
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		if($sqlObj2->status == '0')$pv= $sqlObj2->pv;
		else $pv=0;
	}else{
		$pv = 0;
	}
	//echo $mcode.' : '.$pv.'<br>';
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
	$sql="SELECT rcode,mcode,carry_l,carry_r FROM ".$dbpre."cmbonus1 WHERE rcode=(SELECT max(rcode) FROM ".$dbpre."cmbonus1 WHERE rcode<".$prcode.") and mcode='$pmcode' ";
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



//adjust
function fnc_calc_adjust($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){

	// 45% $total_45
	// fast $total_fast
	// invent $total_invent
	// binary $total_binary
	// matching $total_matching
	// pool $total_pool

	///////////////////////// 45% A,Q ///////////////////////////////////////////////////////////////////////
	$total_45 = 0;
	$total_fv1 = 0;
	$total_fv2 = 0;
	$sql2 = "select SUM(total) AS total_fv from ".$dbprefix."asaleh WHERE sadate>='$fdate' AND sadate<='$tdate' AND (sa_type='Q' or sa_type='A' or sa_type='C')  and cancel=0  and tot_pv > 0 ";
	//if($mcode == '0000030')echo "$sql2<BR>";
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		$total_fv1= $sqlObj2->total_fv;
		mysql_free_result($rs2);
	}else{
		$total_fv1=0;
	}				
	$sql2 = "select SUM(total) AS total_fv from ".$dbprefix."holdhead WHERE sadate>='$fdate' AND sadate<='$tdate' AND (sa_type='Q' or sa_type='A' or sa_type='C')  and cancel=0  and tot_pv > 0   ";
	//echo "$sql2<BR>";g
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		$total_fv2= $sqlObj2->total_fv;
		mysql_free_result($rs2);
	}else{
		$total_fv2=0;
	}				
	$total_45=($total_fv1+$total_fv2)*0.50;

	/////////////////////////  45% A,Q ///////////////////////////////////////////////////////////////////////

	///////////////////////// ค่าแนะนำ + ค่า invent ///////////////////////////////////////////////////////////////////////
	$sql = "SELECT sum(a.fast) as total ";
	$sql .= " FROM ".$dbprefix."around a WHERE fdate>= '$fdate' and tdate<= '$tdate'";
	$rs2=mysql_query($sql);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		$total_fast= $sqlObj2->total;
		mysql_free_result($rs2);
	}

	$sql = "SELECT sum(a.invent) as total ";
	$sql .= " FROM ".$dbprefix."around a WHERE fdate>= '$fdate' and tdate<= '$tdate'";
	$rs2=mysql_query($sql);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		$total_invent= $sqlObj2->total;
		mysql_free_result($rs2);
	}

	///////////////////////// ค่าแนะนำ + ค่า invent ///////////////////////////////////////////////////////////////////////

	///////////////////////// binary + matching + pool ///////////////////////////////////////////////////////////////////////

	$sql = "SELECT sum(a.binaryt) as total ";
	$sql .= " FROM ".$dbprefix."around a WHERE fdate>= '$fdate' and tdate<= '$tdate'";
	$rs2=mysql_query($sql);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		$total_binary= $sqlObj2->total;
		mysql_free_result($rs2);
	}

	$sql = "SELECT sum(a.matching) as total ";
	$sql .= " FROM ".$dbprefix."around a WHERE fdate>= '$fdate' and tdate<= '$tdate'";
	$rs2=mysql_query($sql);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		$total_matching= $sqlObj2->total;
		mysql_free_result($rs2);
	}

	$sql = "SELECT sum(a.total) as total ";
	$sql .= " FROM ".$dbprefix."embonus a WHERE fdate>= '$fdate' and tdate<= '$tdate'";
	$rs2=mysql_query($sql);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		$total_pool= $sqlObj2->total;
		mysql_free_result($rs2);
	}

	///////////////////////// binary + matching + pool ///////////////////////////////////////////////////////////////////////
	//echo 'adjust 45% : '.$total_45.' fast : '.$total_fast.' invent : '.$total_invent.' binary : '.$total_binary.' matching : '.$total_matching.' pool : '.$total_pool; 

	$total_1 = $total_45-$total_fast-$total_invent;
	$total_2 = $total_binary+$total_matching+$total_pool;
	$total_3 = $total_binary+$total_matching;
	if($total_1 >= $total_2)$total_percent = 1;
	else $total_percent = ($total_1)/$total_2;
	
	if($total_percent < 0)$total_percent=0;
	//echo ' total_1 : '.$total_1.' total_2 : '.$total_2.' total_3 : '.$total_3.' percent : '.$total_percent;

	if($total_percent < 1){
		$total_percent = (1-(1-$total_percent)*2);
		$adjust_pool = (floor($total_percent*100)/100);
		$final_pool = $total_pool*$adjust_pool;
		$adjust_binary = (floor((($total_1-$final_pool)/$total_3)*100)/100);
		$adjust_matching = (floor((($total_1-$final_pool)/$total_3)*100)/100);
		$final_matching = $total_matching*$adjust_matching;
		$final_binary = $total_binary*$adjust_binary;
		echo ' total_percent : '.$total_percent.' final_pool : '.$final_pool.' total_3 : '.$total_3.' adjust_pool : '.$total_percent;
	}else{
		$adjust_pool = 1;
		$adjust_matching = 1;
		$adjust_binary= 1;
		$final_binary = $total_binary*$adjust_binary;
		$final_matching = $total_matching*$adjust_matching;
		$final_pool = $total_pool*$adjust_pool;
	}

	if($adjust_pool < 0)$adjust_pool = 0;
	if($adjust_matching < 0)$adjust_matching = 0;
	if($adjust_binary < 0)$adjust_binary = 0;
	$update_cround1 = "update ".$dbprefix."cround1 set total_a = '$total_fv1',total_h = '$total_fv2',fast = '$total_fast',invent = '$total_invent',binaryt = '$total_binary',matching = '$total_matching',pool = '$total_pool',adjust_binary = '$adjust_binary',adjust_matching = '$adjust_matching',adjust_pool = '$adjust_pool' where rcode = '$ro'";
	//$update_binary = "update ".$dbprefix."bmbonus set adjust = '$adjust_binary' where rcode = '$ro'";
	//$update_matching = "update ".$dbprefix."dmbonus set adjust = '$adjust_matching' where rcode = '$ro'";
	//$update_pool = "update ".$dbprefix."embonus set adjust = '$adjust_pool' where rcode = '$ro'";

//	$update_binary = "update ".$dbprefix."bmbonus set adjust = '1' where rcode = '$ro'";
//	$update_matching = "update ".$dbprefix."dmbonus set adjust = '1' where rcode = '$ro'";
//	$update_pool = "update ".$dbprefix."embonus set adjust = '1' where rcode = '$ro'";
	//echo '<br>'.$update_cround1;
	mysql_query($update_cround1);
//	mysql_query($update_binary);
//	mysql_query($update_matching);
//	mysql_query($update_pool);
	
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

?>