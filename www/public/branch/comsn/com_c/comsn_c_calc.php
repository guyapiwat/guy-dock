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
		$cstatus=$row["cstatus"];
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
		
		//fnc_calc_adjust($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);

		fnc_calc_status($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate,$mcode,$paydate,$cstatus);
		fnc_calc_statusMM($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate,$mcode,$paydate,$cstatus);

//		fnc_calc_adjust($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);
			//ปรับ calc ของ around ให้เป็น '1'
			$sql="update ".$dbprefix."cround set calc='1' , calc_date = '".date("Y-m-d H:i:s")."' where rcode='$ro' ";
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
function fnc_calc_status($dbprefix,$ro,$strfdate,$strtdate,$fpdate,$tpdate,$fmcode,$paydate,$cstatus){
	$sql2 = "update ".$dbprefix."ambonus set pstatus =0 , prcode =0 WHERE prcode ='$ro' and locationbase = '1' ";
	mysql_query($sql2);
//	echo $sql2.'<br>';
	$sql2 = "update ".$dbprefix."bmbonus set pstatus =0 , prcode =0 WHERE prcode ='$ro' and locationbase = '1' ";
	mysql_query($sql2);
	$sql2 = "update ".$dbprefix."smbonus set pstatus =0 , prcode =0 WHERE prcode ='$ro' and locationbase = '1' ";
	mysql_query($sql2);
	$sql2 = "update ".$dbprefix."ombonus set pstatus =0 , prcode =0 WHERE prcode ='$ro' and locationbase = '1' ";
	mysql_query($sql2);
	$sql2 = "update ".$dbprefix."dmbonus set pstatus =0 , prcode =0 WHERE prcode ='$ro' and locationbase = '1' ";
	mysql_query($sql2);
//	echo $sql2.'<br>';
$fdate = $strfdate;
$tdate = $strtdate;

//var_dump($cstatus);

	if($cstatus == '1'){
	
		$sql2 = "update ".$dbprefix."bmbonus set carry_l =0 , carry_c =0 WHERE mpos = 'MB' and tdate = '$tdate'  ";
		//$sql2 = "update ".$dbprefix."bmbonus set carry_l =0 , carry_c =0 WHERE tdate = '$tdate'  ";
		//echo $sql2.'<br>';
		$rs2=mysql_query($sql2);

	}
//exit;


	$selectpackfile = " select * from ".$dbprefix."cround where rcode = '$ro'";
	$rs2 = mysql_query($selectpackfile);
	if(mysql_num_rows($rs2) > 0){
		$objpack = mysql_fetch_object($rs2);
		$adjust_binary =$objpack->adjust_binary;		
		$adjust_matching =$objpack->adjust_matching;		
		$adjust_pool =$objpack->adjust_pool;
	}
	if($fpdate!=""&&$tpdate!=""&&$fmcode!=""){
		$whereclass = " AND fdate>= '$fpdate' and tdate<= '$tpdate' and m.mcode='".$fmcode."'";
	}else if($fpdate!=""&&$tpdate!=""){
		$whereclass = " AND fdate>= '$fpdate' and tdate<= '$tpdate' ";
	}else if($fmcode!=""){
		$whereclass = " AND m.mcode='".$fmcode."'";
	}
	$sql = "SELECT m.mcode,m.locationbase,m.name_t,m.status_suspend,m.status_terminate,taba.exp_date,m.mtype,m.pos_cur,m.sp_code,m.cmp,m.status,m.cmp2,m.cmp3,m.acc_no,m.name_f as title,
	(SELECT ifnull(sum(a.total),0) from ".$dbprefix."ambonus a where a.mcode=m.mcode  ".$whereclass."  and a.total > 0 and a.pstatus =0  group by a.mcode) as totalfast,
	(SELECT ifnull(sum(b.total),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass." and b.total > 0 and b.pstatus =0  group by b.mcode) as totalbinary,
	(SELECT ifnull(sum(d.total),0) from ".$dbprefix."dmbonus d where d.mcode=m.mcode  ".$whereclass." and d.total > 0 and d.pstatus =0 group by d.mcode) as totalmatching,
	(SELECT ifnull(sum(o.total),0) from ".$dbprefix."ombonus o where o.mcode=m.mcode  ".$whereclass." and o.total > 0 and o.pstatus =0 group by o.mcode) as totalonetime,
	(SELECT ifnull(sum(s.total),0) from ".$dbprefix."smbonus s where s.mcode=m.mcode  ".$whereclass." and s.total > 0 and s.pstatus =0 group by s.mcode) as totalstar
	from ".$dbprefix."member m ";
	$sql .= "LEFT JOIN (SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate GROUP BY mid) AS taba ON (m.id=taba.mid) where m.pos_cur <> 'MB'  and m.status_terminate <> '1' and m.locationbase = '1' ";
	//echo $sql.'<br>';
	//exit;
	$rs1 = mysql_query($sql);
	
	/*$sql3 = "select * from ".$dbprefix."cround1 where calc =1 order by rid asc limit 0,1";
	$rs3 = mysql_query($sql3);
	if(mysql_num_rows($rs3)>0){
		$tdate = mysql_result($rs3,0,"tdate");*/
		$monthmonth  = explode("-",$strtdate);
	//}	
	
//	exit;
	
	if(mysql_num_rows($rs1) > 0){
		for($j=0;$j<mysql_num_rows($rs1);$j++){
			$sqlObj1 = mysql_fetch_object($rs1);
			$mcode[$j] =$sqlObj1->mcode;	
$com_transfer_chagre = 15;
				$totalamt1[$j] = 0;
				$totalamt[$j] = 0;
				$mtype[$j] = $sqlObj1->mtype;
			$totalfast[$j] = $sqlObj1->totalfast;
			$locationbase[$j] = $sqlObj1->locationbase;
			$totalbinary[$j] = $sqlObj1->totalbinary;
			$totalstar[$j] = $sqlObj1->totalstar;
			$status_suspend[$j] = $sqlObj1->status_suspend;
			$totalmatching[$j] = $sqlObj1->totalmatching;
			$totalonetime[$j] = $sqlObj1->totalonetime;
			$totalamt[$j] = $totalfast[$j]+$totalbinary[$j]+$totalstar[$j]+$totalmatching[$j]+$totalonetime[$j];
			$totalamt1[$j] = $totalfast[$j]+$totalbinary[$j]+$totalstar[$j]+$totalmatching[$j]+$totalonetime[$j];
			$total12 = 0;
			$pos_cur[$j] =$sqlObj1->pos_cur;
			$sp_code[$mcode[$j]] = $sqlObj1->sp_code;
			$acc_no[$j] =$sqlObj1->acc_no;
			$cmp[$j] =$sqlObj1->cmp;
			$cmp2[$j] =$sqlObj1->cmp2;
			$cmp3[$j] =$sqlObj1->cmp3;
			$mstatus[$j] =$sqlObj1->status;
			$moneyb[$j] = 0;
			$moneyb[$j] = backmonthpv($dbprefix,$mcode[$j],$ro);
		//	if($mcode[$j] == '0000415'){
		//		echo $totalamt1[$j]." : ".$moneyb[$j]." : ".$totalamt[$j];
		//		exit;
		//	}
			$total12 = $totaly = backallpv($dbprefix,$mcode[$j],$ro,$tdate);
			$exp_date[$j] =$sqlObj1->exp_date;
			$mem_cntday[$j]=dateDiff($paydate, $exp_date[$j]);
			//$totalamt =$sqlObj->totalamt;
			$totalamt1[$j] =  $moneyb[$j]+$totalamt[$j];
			//if($mcode[$j] == '0006513'){
			//	echo $totalamt1[$j]." : ".$moneyb[$j]." : ".$totalamt[$j];
			//	exit;
			//}
				$sql2 = "SELECT crate from ".$dbprefix."location_base WHERE cid = '".$locationbase[$j]."' ";
				
				//exit;
				$rs2=mysql_query($sql2);
				//$totalpv = 0;
				if(mysql_num_rows($rs2)>0){
					$crate[$j] = mysql_result($rs2,0,"crate");
				}
				
				$vat[$j] = 0;
				$name_t[$j] =$sqlObj1->name_t;
				$title[$j] =$sqlObj1->title;
				if($mtype[$j] == '1'){
					$tax[$j] = $totalamt1[$j]*0.03;
					$vat[$j] = $totalamt1[$j]*0.07;
					
				}else{

					$total1 = 0;
					$chkdate = explode('-',$fdate);
					$chkdate1 = $chkdate[0];
					$sql = "select sum(total) as total1 from ".$dbprefix."ambonus a where  a.total > 0 and a.tdate like '%".$chkdate1."%' and a.tdate < '$fdate' and mcode = '".$mcode[$j]."' group by mcode";

					//if($mcode[$j] == '0000008')echo $sql.'<br>';
					$rs1234 = mysql_query($sql);
					if(mysql_num_rows($rs1234) > 0){
						$sqlObj123 = mysql_fetch_object($rs1234);
						$total1 = $total1+$sqlObj123->total1;
					}
					$sql = "select sum(total) as total1 from ".$dbprefix."bmbonus a where  a.total > 0  and a.tdate like '%".$chkdate1."%'  and a.tdate < '$fdate' and mcode = '".$mcode[$j]."' group by mcode";
					//if($mcode[$j] == '0000008')echo $sql.'<br>';
					$rs1234 = mysql_query($sql);
					if(mysql_num_rows($rs1234) > 0){
						$sqlObj123 = mysql_fetch_object($rs1234);
						$total1 = $total1+$sqlObj123->total1;
					}
					//if($cstatus  == '1'){
						
						$sql = "select sum(total) as total1 from ".$dbprefix."dmbonus a where  a.total > 0 and a.tdate like '%".$chkdate1."%'   and a.tdate < '$fdate' and mcode = '".$mcode[$j]."' group by mcode";
						//if($mcode[$j] == '0000008')echo $sql.'<br>';
						$rs1234 = mysql_query($sql);
						if(mysql_num_rows($rs1234) > 0){
							$sqlObj123 = mysql_fetch_object($rs1234);
							$total1 = $total1+$sqlObj123->total1;
						}
						$sql = "select sum(total) as total1 from ".$dbprefix."smbonus a where  a.total > 0 and a.tdate like '%".$chkdate1."%'   and a.tdate < '$fdate' and mcode = '".$mcode[$j]."' group by mcode";
						//if($mcode[$j] == '0000008')echo $sql.'<br>';
						$rs1234 = mysql_query($sql);
						if(mysql_num_rows($rs1234) > 0){
							$sqlObj123 = mysql_fetch_object($rs1234);
							$total1 = $total1+$sqlObj123->total1;
						}
						$sql = "select sum(total) as total1 from ".$dbprefix."ombonus a where  a.total > 0 and a.tdate like '%".$chkdate1."%'   and a.tdate < '$fdate' and mcode = '".$mcode[$j]."' group by mcode";
						//if($mcode[$j] == '0000008')echo $sql.'<br>';
						$rs1234 = mysql_query($sql);
						if(mysql_num_rows($rs1234) > 0){
							$sqlObj123 = mysql_fetch_object($rs1234);
							$total1 = $total1+$sqlObj123->total1;
						}
					//}
					//if($mcode[$j] == '0000008')echo $mcode[$j].' : '.$total1.' : '.$totalamt[$j].' : '.$fdate.' : '.$tdate.'<br>';
					if($total1 >= 200000)$tax[$j] = $totalamt1[$j]*0.05;
					else if($total1+$totalamt[$j] >= 200000)$tax[$j] = ($total1+$totalamt1[$j]-200000)*0.05;
					else $tax[$j] = 0;
				}
				
				//if($totalamt1 >= 200){
				//echo $adjust_binary.' '.$adjust_matching.' '.$adjust_pool.' '.$totalfast[$j].' '.$totalbinary[$j].' '.$totalmatching[$j].' '.$totalpool[$j].' '.$mcode[$j].' '.$cmp[$j].' '.$cmp2[$j].' '.$accno[$j].' '.$totalamt1[$j].' '.$moneyb[$j].' '.$totalamt[$j].'<br>';
			//	if($totalamt1[$j] > 0 and $mstatus[$j] == '0'){
				$sql2 = "SELECT sum(tot_pv) as totalpv from ".$dbprefix."asaleh WHERE mcode='".$mcode[$j]."' and  sadate >= '$fpdate' and sadate <= '$tpdate' and (sa_type='Q' or sa_type='A' or sa_type='C') and (sa_type='Q' or sa_type='A' or sa_type='C')  group by mcode ";
				//echo $sql2.'<br>';
				//exit;
				$rs2=mysql_query($sql2);
				$totalpv = 0;
				if(mysql_num_rows($rs2)>0){
					$totalpv = mysql_result($rs2,0,"totalpv");
				}
				$sql2 = "SELECT sum(tot_pv) as totalpv from ".$dbprefix."holdhead WHERE mcode='".$mcode[$j]."' and  sadate >= '$fpdate' and sadate <= '$tpdate' and (sa_type='Q' or sa_type='A' or sa_type='C') group by mcode ";
				
				//exit;
				$rs2=mysql_query($sql2);
				//$totalpv = 0;
				if(mysql_num_rows($rs2)>0){
					$totalpv = $totalpv + mysql_result($rs2,0,"totalpv");
				}
				//echo $mcode[$j].' : '.$totalamt1[$j].' : '.$totalamt[$j].' : '.$totalpv.'<br>';
				//exit;
				if($totalpv>= 250 or $mcode[$j] == '0000001' or $mcode[$j] == '0000002' or $mcode[$j] == '0000003' ){
					if($cstatus == '1'){
						$sql2 = "select * from ".$dbprefix."bmbonus where mcode='".$mcode[$j]."' and  tdate = '$tdate'  ";
						//echo $sql2.'<br>';
						
						$rs2 = mysql_query($sql2);
						if(mysql_num_rows($rs2) >=0){
							$sqlObj11 = mysql_fetch_object($rs2);
							$carry_l =$sqlObj11->carry_l;
							$carry_c =$sqlObj11->carry_c;
							if($carry_c > $carry_l){
								if($carry_c > 2400000)$carry_c = 2400000;
								$sqlcc = "select sum(point) as ppoint from ".$dbprefix."bmbonus where mcode='".$mcode[$j]."' and  fdate >= '$fpdate' and tdate <= '$tpdate'  ";
								$rscc=mysql_query($sqlcc);
								if(mysql_num_rows($rscc)>0)$cpoint = mysql_result($rscc,0,"ppoint");else $cpoint=0;
								if($cpoint >= 1600)$carry_l = 0;
							}else{
								if($carry_l > 2400000)$carry_l = 2400000;
								//if($carry_c > 1500)$carry_c = 1499;
								$sqlcc = "select sum(point) as ppoint from ".$dbprefix."bmbonus where mcode='".$mcode[$j]."' and  fdate >= '$fpdate' and tdate <= '$tpdate'  ";
								//echo $sqlcc.'<br><Br>';
								$rscc=mysql_query($sqlcc);
								if(mysql_num_rows($rscc)>0)$cpoint = mysql_result($rscc,0,"ppoint");else $cpoint=0;
								if($cpoint >= 1600)$carry_c = 0;
							}
							mysql_query("update ".$dbprefix."bmbonus set carry_l ='$carry_l' , carry_c ='$carry_c' WHERE mcode='".$mcode[$j]."' and  tdate = '$tdate'  ");
						}
					}
				}else{
					if($cstatus == '1'){

						$clast = explode('-',$fpdate);
						if($clast[1]=="1" or $clast[1]=="01"){
							$clast[1]="12";
							$clast[0]=$clast[0]-1;	
						}else{
							$clast[1]=$clast[1]-1;
						}
						$last1 = $clast[0].'-'.gencode2($clast[1]);
						if($clast[1]=="1" or $clast[1]=="01"){
							$clast[1]="12";
							$clast[0]=$clast[0]-1;	
						}else{
							$clast[1]=$clast[1]-1;
						}
						$last2 = $clast[0].'-'.gencode2($clast[1]);

						$sql2 = "SELECT sum(tot_pv) as totalpv from ".$dbprefix."asaleh WHERE mcode='".$mcode[$j]."' and  sadate like '%".$last1."%' and (sa_type='Q' or sa_type='A' or sa_type='C') group by mcode ";
						$rs2=mysql_query($sql2);
						$totalpv1 = 0;
						if(mysql_num_rows($rs2)>0){
							$totalpv1 = mysql_result($rs2,0,"totalpv");
						}

						$sql2 = "SELECT sum(tot_pv) as totalpv from ".$dbprefix."holdhead WHERE mcode='".$mcode[$j]."' and  sadate like '%".$last1."%' and (sa_type='Q' or sa_type='A' or sa_type='C') group by mcode ";
						$rs2=mysql_query($sql2);
						if(mysql_num_rows($rs2)>0){
							$totalpv1 = $totalpv1 + mysql_result($rs2,0,"totalpv");
						}

						$sql2 = "SELECT sum(tot_pv) as totalpv from ".$dbprefix."asaleh WHERE mcode='".$mcode[$j]."' and  sadate like '%".$last2."%' and (sa_type='Q' or sa_type='A' or sa_type='C')  group by mcode ";
						$rs2=mysql_query($sql2);
						$totalpv2 = 0;
						if(mysql_num_rows($rs2)>0){
							$totalpv2 = mysql_result($rs2,0,"totalpv");
						}
						$sql2 = "SELECT sum(tot_pv) as totalpv from ".$dbprefix."holdhead WHERE mcode='".$mcode[$j]."' and  sadate like '%".$last2."%' and (sa_type='Q' or sa_type='A' or sa_type='C') group by mcode ";
						$rs2=mysql_query($sql2);
						if(mysql_num_rows($rs2)>0){
							$totalpv2 = $totalpv2 + mysql_result($rs2,0,"totalpv");
						}
						
									
						if($totalpv1 < 250 and $totalpv2 < 250){ 
							$sql2 = "update ".$dbprefix."bmbonus set carry_l =0 , carry_c =0 WHERE mcode='".$mcode[$j]."' and  tdate = '$tdate'  ";
						}else{
							if($totalpv1 < 250){
								$sql = "select carry_l,carry_c from ".$dbprefix."bmbonus  where  fdate like '%".$last1."%' and mcode='".$mcode[$j]."' order by  cid desc limit 0,1  ";
							   	if($mcode[$j] == '0000080'){
								// echo $sql.'<br>';

								}
								//if($mcode[$j] == '0000007')echo $sql.'<br>';
								$rs12345 = mysql_query($sql);
								if(mysql_num_rows($rs12345) > 0){
									$sqlObj1235 = mysql_fetch_object($rs12345);
									$carry_ll = ($sqlObj1235->carry_l)/2;
									$carry_cc = ($sqlObj1235->carry_c)/2;
								}

								$sql2 = "update ".$dbprefix."bmbonus set carry_l ='$carry_ll' , carry_c ='$carry_cc' WHERE mcode='".$mcode[$j]."' and  tdate = '$tdate'  ";
								if($mcode[$j] == '0000080'){
							//	 echo $sql2.'<br>';
								}
							}else{

								$sql = "select carry_l,carry_c from ".$dbprefix."bmbonus  where  fdate like '%".$last1."%' and mcode='".$mcode[$j]."' order by  cid desc limit 0,1  ";
							   	if($mcode[$j] == '0000080'){
								// echo $sql.'<br>';
								}
								//if($mcode[$j] == '0000007')echo $sql.'<br>';
								$rs12345 = mysql_query($sql);
								if(mysql_num_rows($rs12345) > 0){
									$sqlObj1235 = mysql_fetch_object($rs12345);
									$carry_ll = ($sqlObj1235->carry_l)/2;
									$carry_cc = ($sqlObj1235->carry_c)/2;
								}

								$sql2 = "update ".$dbprefix."bmbonus set carry_l ='$carry_ll' , carry_c = '$carry_cc' WHERE mcode='".$mcode[$j]."' and  tdate = '$tdate'  ";
								if($mcode[$j] == '0000080'){
								// echo $sql2.'<br>';
								}
							}
						}
						$rs2=mysql_query($sql2);
						if($mcode[$j] == '0000080'){
							//	 exit;
							}
					}
				}
				
				if($totalpv>=0 or $cstatus <> '1' or $mcode[$j] == '0000001' or $mcode[$j] == '0000002' or $mcode[$j] == '0000003'){
					if($totalamt1[$j] > 0){
						//if($totalpv>= 250 and $cmp[$j] == 'ครบ' and $cmp2[$j] == 'ครบ'  and  $cmp3[$j] == 'ครบ'  and !empty($acc_no[$j]) and $mem_cntday[$j] > -90 and $status_suspend[$j] <> '1'  ){
						if($cmp[$j] == 'ครบ' and $cmp2[$j] == 'ครบ'  and  $cmp3[$j] == 'ครบ'  and !empty($acc_no[$j]) and $mem_cntday[$j] > -90 and $status_suspend[$j] <> '1'  ){
							if($totalpv>= 250 ){
								if($totalamt1[$j] >= 300){
									$total12 = $total12+$totalamt1[$j];
									if($mtype[$j] == '1'){
										$totalamt[$j] = $totalamt[$j]+$vat[$j]-$tax[$j];
										$totalamt1[$j] = $totalamt1[$j]+$vat[$j]-$tax[$j];
											$btotal = $btotal+$vat[$j]-$tax[$j];
									}else{
										$totalamt[$j] = $totalamt[$j]-$tax[$j];
										//echo $mcode[$j].':'.$totalamt1[$j].':'.$tax[$j].'<br>';
										$totalamt1[$j] = $totalamt1[$j]-$tax[$j];
										$btotal = $btotal-$tax[$j];
										//echo $mcode[$j].':'.$totalamt1[$j].':'.$tax[$j].'<br>';
									}
								if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
								if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
								if($cmp3[$j] == 'ครบ')$c_note5 = 1;else $c_note5 = "";
								if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
									$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre) ";
									$sql .= "VALUES('$ro','".$mcode[$j]."','1','".$moneyb[$j]."','".$totalamt[$j]."','0','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','".$totalamt1[$j]."','".$total12."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre')";
												

								}else{
									$btotal = $total12;
									$tax[$j] = 0;$vat[$j] = 0;
								if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
								if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
								if($cmp3[$j] == 'ครบ')$c_note5 = 1;else $c_note5 = "";
								if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
								if($mem_cntday[$j] <= -90){
									$c_note4 = 1;
									mysql_query("update ".$dbprefix."member set status = '1' where mcode = '".$mcode[$j]."'");
								}else $c_note4 = "";
								$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,c_note5,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre) ";
									$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$moneyb[$j]."','0','".$totalamt1[$j]."','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','0','".$btotal."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$c_note1."','".$c_note2."','".$c_note3."','".$c_note4."','".$c_note5."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre')";
								}
								//if($mcode[$j] == '0000420')echo $sql.'<br>';
								//echo $sql.'<br>';
								mysql_query($sql);
							}else{
								
								//if($mcode[$j] == '0006513')echo $sql.'<br>';

								if($cstatus == '0'){
									$totalamt1[$j] = backmonthpv2($dbprefix,$mcode[$j],$ro);
									$total12 = $total12+$totalamt1[$j];
									$btotal = $moneyb[$j];
								}else if($cstatus == '1'){
									//if($mcode[$j] == '0000479')echo $totalamt1[$j]." : ".backmonthpvb($dbprefix,$mcode[$j],$ro)." : ".$totalamt[$j].'<br>';
									$totalamt1[$j] = $totalamt1[$j]-backmonthpvb($dbprefix,$mcode[$j],$ro)-$totalamt[$j];
									$btotal = 0;
									$total12 = $total12;
								}
								//if($mcode[$j] == '0000479')echo $totalamt1[$j]." : ".backmonthpvb($dbprefix,$mcode[$j],$ro)." : ".$totalamt[$j].'<br>';
					
								if($mtype[$j] == '1'){
									$tax[$j] = $totalamt1[$j]*0.03;
									$vat[$j] = $totalamt1[$j]*0.07;
								}else{
									if($total1 >= 200000)$tax[$j] = $totalamt1[$j]*0.05;
									else if($total1+$totalamt1[$j] >= 200000)$tax[$j] = ($total1+$totalamt1[$j]-200000)*0.05;
									else $tax[$j] = 0;
								}

								if($totalamt1[$j] >= 300){
									$total12 = $total12+$totalamt1[$j];
									if($mtype[$j] == '1'){
										$totalamt[$j] = $totalamt[$j]+$vat[$j]-$tax[$j];
										$totalamt1[$j] = $totalamt1[$j]+$vat[$j]-$tax[$j];
											$btotal = $btotal+$vat[$j]-$tax[$j];
									}else{
										$totalamt[$j] = $totalamt[$j]-$tax[$j];
										//echo $mcode[$j].':'.$totalamt1[$j].':'.$tax[$j].'<br>';
										$totalamt1[$j] = $totalamt1[$j]-$tax[$j];
										$btotal = $btotal-$tax[$j];
										//echo $mcode[$j].':'.$totalamt1[$j].':'.$tax[$j].'<br>';
									}
								if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
								if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
								if($cmp3[$j] == 'ครบ')$c_note5 = 1;else $c_note5 = "";
								if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
									//pvh ยอดยกไป
									//pv ยอดยกมา
									//pvb ยอดเดือนนี้
									$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre) ";
									$sql .= "VALUES('$ro','".$mcode[$j]."','1','".$moneyb[$j]."','".$totalamt[$j]."','".$btotal."','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','".$totalamt1[$j]."','".$total12."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre')";
									mysql_query($sql);
												

								}else{
									$btotal = $total12;
									$tax[$j] = 0;$vat[$j] = 0;
								if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
								if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
								if($cmp3[$j] == 'ครบ')$c_note5 = 1;else $c_note5 = "";
								if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
								if($mem_cntday[$j] <= -90){
									//pvh ยอดยกไป
									//pv ยอดยกมา
									//pvb ยอดเดือนนี้
									$c_note4 = 1;
									mysql_query("update ".$dbprefix."member set status = '1' where mcode = '".$mcode[$j]."'");
								}else $c_note4 = "";
								$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,c_note5,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre) ";
									$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$moneyb[$j]."','".$totalamt[$j]."','".$totalamt1[$j]."','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','0','".$btotal."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$c_note1."','".$c_note2."','".$c_note3."','".$c_note4."','".$c_note5."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre')";
									mysql_query($sql);
								}

								//if($mcode[$j] == '0000415')echo $sql.'<br>';
								//echo $sql.'<br>';
								
							}
							mysql_query("update ".$dbprefix."ambonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."bmbonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."dmbonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."ombonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."smbonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
						}else{
							$tax[$j] = 0;$vat[$j] = 0;
							if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
							if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
							if($cmp3[$j] == 'ครบ')$c_note5 = 1;else $c_note5 = "";
							if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
							
							if($mcode[$j] == '0000001' or $mcode[$j] == '0000002' or $mcode[$j] == '0000003'){
								$btotal = backmonthpv3($dbprefix,$mcode[$j],$ro);
							}else	if($totalpv< 250 ){
								if($cstatus == '0'){
									//$totalamt1[$j] = $totalamt1[$j]+$moneyb1[$j];
									$btotal = $total12;
								}else if($cstatus == '1'){
									//$moneyb1[$j] = backmonthpv1($dbprefix,$mcode[$j],$fpdate,$tpdate);
									//$moneyb[$j] = $moneyb[$j]+$moneyb1[$j];
									//$totalamt1[$j] = $totalamt1[$j]-$moneyb1[$j];
									$btotal = $total12;
									$totalamt1[$j] = backmonthpv2($dbprefix,$mcode[$j],$ro);
								}
							}else{
								$btotal = backmonthpv3($dbprefix,$mcode[$j],$ro);
							}
							if($mem_cntday[$j] <= -90){
								$c_note4 = 1;
								mysql_query("update ".$dbprefix."member set status = '1' where mcode = '".$mcode[$j]."'");
							}else $c_note4 = "";
							$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,c_note5,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$moneyb[$j]."','0','".$totalamt1[$j]."','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','0','".$btotal."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$c_note1."','".$c_note2."','".$c_note3."','".$c_note4."','".$c_note5."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre')";
							mysql_query($sql);
														
							mysql_query("update ".$dbprefix."ambonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."bmbonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."dmbonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."ombonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."smbonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							//echo $sql.'<br>';
							//exit;
						}
					}
				}
			//}
		}
	}
}


function fnc_calc_statusMM($dbprefix,$ro,$strfdate,$strtdate,$fpdate,$tpdate,$fmcode,$paydate,$cstatus){

	$sql = "select * from ".$dbprefix."voucher where rcode = '$ro' and cancel =0  ";
	$rs1 = mysql_query($sql);
	for($j=0;$j<mysql_num_rows($rs1);$j++){
		$sqlObj1 = mysql_fetch_object($rs1);
		$txtMoney = $sqlObj1->txtMoney;
		$bprice = $sqlObj1->bprice;
		$idi = $sqlObj1->id;
		$mmcode = $sqlObj1->mcode;
		mysql_query("update ".$dbprefix."member set voucher = voucher-".$txtMoney.", bvoucher = bvoucher-".$bprice." where mcode = '$mmcode' ");
		mysql_query("delete from ".$dbprefix."voucher where id = '$idi' ");
	}
	$bprice = array();
	$sql2 = "update ".$dbprefix."ambonus set pstatus =0 , prcode =0 WHERE prcode ='$ro' and locationbase = '2' ";
	mysql_query($sql2);
//	echo $sql2.'<br>';
	$sql2 = "update ".$dbprefix."bmbonus set pstatus =0 , prcode =0 WHERE prcode ='$ro' and locationbase = '2' ";
	mysql_query($sql2);
	$sql2 = "update ".$dbprefix."smbonus set pstatus =0 , prcode =0 WHERE prcode ='$ro' and locationbase = '2' ";
	mysql_query($sql2);
	$sql2 = "update ".$dbprefix."ombonus set pstatus =0 , prcode =0 WHERE prcode ='$ro' and locationbase = '2' ";
	mysql_query($sql2);
	$sql2 = "update ".$dbprefix."dmbonus set pstatus =0 , prcode =0 WHERE prcode ='$ro' and locationbase = '2' ";
	mysql_query($sql2);
//	echo $sql2.'<br>';
$fdate = $strfdate;
$tdate = $strtdate;

//var_dump($cstatus);

	if($cstatus == '1'){
	
		$sql2 = "update ".$dbprefix."bmbonus set carry_l =0 , carry_c =0 WHERE mpos = 'MB' and tdate = '$tdate'  ";
		//$sql2 = "update ".$dbprefix."bmbonus set carry_l =0 , carry_c =0 WHERE tdate = '$tdate'  ";
		//echo $sql2.'<br>';
		$rs2=mysql_query($sql2);

	}
//exit;


	$selectpackfile = " select * from ".$dbprefix."cround where rcode = '$ro'";
	$rs2 = mysql_query($selectpackfile);
	if(mysql_num_rows($rs2) > 0){
		$objpack = mysql_fetch_object($rs2);
		$adjust_binary =$objpack->adjust_binary;		
		$adjust_matching =$objpack->adjust_matching;		
		$adjust_pool =$objpack->adjust_pool;
	}
	if($fpdate!=""&&$tpdate!=""&&$fmcode!=""){
		$whereclass = " AND fdate>= '$fpdate' and tdate<= '$tpdate' and m.mcode='".$fmcode."'";
	}else if($fpdate!=""&&$tpdate!=""){
		$whereclass = " AND fdate>= '$fpdate' and tdate<= '$tpdate' ";
	}else if($fmcode!=""){
		$whereclass = " AND m.mcode='".$fmcode."'";
	}
	$sql = "SELECT m.mcode,m.name_t,m.pos_cur2,m.status_suspend,m.status_terminate,m.mtype,m.locationbase,taba.exp_date,m.pos_cur,m.sp_code,m.cmp,m.status,m.cmp2,m.cmp3,m.acc_no,m.name_f as title,
	(SELECT ifnull(sum(a.total),0) from ".$dbprefix."ambonus a where a.mcode=m.mcode  ".$whereclass." and a.total > 0 and a.pstatus =0  group by a.mcode) as totalfast,
	(SELECT ifnull(sum(b.total),0) from ".$dbprefix."bmbonus b where b.mcode=m.mcode  ".$whereclass." and b.total > 0 and b.pstatus =0  group by b.mcode) as totalbinary,
	(SELECT ifnull(sum(d.total),0) from ".$dbprefix."dmbonus d where d.mcode=m.mcode  ".$whereclass." and d.total > 0 and d.pstatus =0 group by d.mcode) as totalmatching,
	(SELECT ifnull(sum(o.total),0) from ".$dbprefix."ombonus o where o.mcode=m.mcode  ".$whereclass." and o.total > 0 and o.pstatus =0 group by o.mcode) as totalonetime,
	(SELECT ifnull(sum(s.total),0) from ".$dbprefix."smbonus s where s.mcode=m.mcode  ".$whereclass." and s.total > 0 and s.pstatus =0 group by s.mcode) as totalstar
	from ".$dbprefix."member m ";
	$sql .= "LEFT JOIN (SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate GROUP BY mid) AS taba ON (m.id=taba.mid) where m.pos_cur <> 'MB'  and m.status_terminate <> '1' and m.locationbase = '2' ";
	//echo $sql.'<br>';
	//exit;
	$rs1 = mysql_query($sql);
	
	/*$sql3 = "select * from ".$dbprefix."cround1 where calc =1 order by rid asc limit 0,1";
	$rs3 = mysql_query($sql3);
	if(mysql_num_rows($rs3)>0){
		$tdate = mysql_result($rs3,0,"tdate");*/
		$monthmonth  = explode("-",$strtdate);
	//}	
	
//	exit;
	
	if(mysql_num_rows($rs1) > 0){
	$pos_piority = array('RD'=>17,'PD'=>16,'ID'=>15,'CD'=>14,'BL'=>13,'BD'=>12,'DI'=>11,'EM'=>10,'SA'=>9,'RU'=>8,'PE'=>7,'PL'=>6,'GO'=>5,'SI'=>4,'BR'=>3,'EX'=>2,'SU'=>1,'MB'=>0);

		for($j=0;$j<mysql_num_rows($rs1);$j++){
			$sqlObj1 = mysql_fetch_object($rs1);
			$com_transfer_chagre = 0;
				$totalamt1[$j] = 0;
				$totalamt[$j] = 0;
			$totalfast[$j] = $sqlObj1->totalfast;
			$pos_cur2[$j] = $sqlObj1->pos_cur2;
			
			$mtype[$j] = $sqlObj1->mtype;
			$locationbase[$j] = $sqlObj1->locationbase;
			$totalbinary[$j] = $sqlObj1->totalbinary;
			$totalstar[$j] = $sqlObj1->totalstar;
			$status_suspend[$j] = $sqlObj1->status_suspend;
			$totalmatching[$j] = $sqlObj1->totalmatching;
			$totalonetime[$j] = $sqlObj1->totalonetime;
			$totalamt[$j] = $totalfast[$j]+$totalbinary[$j]+$totalstar[$j]+$totalmatching[$j]+$totalonetime[$j];
			$totalamt1[$j] = $totalfast[$j]+$totalbinary[$j]+$totalstar[$j]+$totalmatching[$j]+$totalonetime[$j];
			
				$mcode[$j] =$sqlObj1->mcode;	
				$sql2 = "SELECT crate from ".$dbprefix."location_base WHERE cid = '".$locationbase[$j]."' ";
				$rs2=mysql_query($sql2);
				if(mysql_num_rows($rs2)>0){
					$crate[$j] = mysql_result($rs2,0,"crate");
				}

				$vat[$j] = 0;
				$name_t[$j] =$sqlObj1->name_t;
				$title[$j] =$sqlObj1->title;
				
				$taxlocal = 0;
				$taxforeign = 0;
				$vatlocal = 0;
				$vatforeign = 0;
				if($mtype[$j] == '1'){
					//$tax[$j] = $totalamt[$j]*0.03;
					//$vat[$j] = $totalamt[$j]*0.07;

					$tax[$j] = 0;
					$vat[$j] = 0;
					
				}else{

					$total1 = 0;
					$chkdate = explode('-',$fdate);
					$chkdate1 = $chkdate[0];
					$sql = "select sum(total) as total1 from ".$dbprefix."ambonus a where  a.total > 0 and a.tdate like '%".$chkdate1."%' and a.tdate < '$fdate' and mcode = '".$mcode[$j]."' group by mcode";
					$rs1234 = mysql_query($sql);
					if(mysql_num_rows($rs1234) > 0){
						$sqlObj123 = mysql_fetch_object($rs1234);
						$total1 = $total1+$sqlObj123->total1;
					}
					$sql = "select sum(total) as total1 from ".$dbprefix."bmbonus a where  a.total > 0  and a.tdate like '%".$chkdate1."%'  and a.tdate < '$fdate' and mcode = '".$mcode[$j]."' group by mcode";
					$rs1234 = mysql_query($sql);
					if(mysql_num_rows($rs1234) > 0){
						$sqlObj123 = mysql_fetch_object($rs1234);
						$total1 = $total1+$sqlObj123->total1;
					}
					//if($cstatus  == '1'){
						
						$sql = "select sum(total) as total1 from ".$dbprefix."dmbonus a where  a.total > 0 and a.tdate like '%".$chkdate1."%'   and a.tdate < '$fdate' and mcode = '".$mcode[$j]."' group by mcode";
						$rs1234 = mysql_query($sql);
						if(mysql_num_rows($rs1234) > 0){
							$sqlObj123 = mysql_fetch_object($rs1234);
							$total1 = $total1+$sqlObj123->total1;
						}
						$sql = "select sum(total) as total1 from ".$dbprefix."smbonus a where  a.total > 0 and a.tdate like '%".$chkdate1."%'   and a.tdate < '$fdate' and mcode = '".$mcode[$j]."' group by mcode";
						$rs1234 = mysql_query($sql);
						if(mysql_num_rows($rs1234) > 0){
							$sqlObj123 = mysql_fetch_object($rs1234);
							$total1 = $total1+$sqlObj123->total1;
						}
						$sql = "select sum(total) as total1 from ".$dbprefix."ombonus a where  a.total > 0 and a.tdate like '%".$chkdate1."%'   and a.tdate < '$fdate' and mcode = '".$mcode[$j]."' group by mcode";
						$rs1234 = mysql_query($sql);
						if(mysql_num_rows($rs1234) > 0){
							$sqlObj123 = mysql_fetch_object($rs1234);
							$total1 = $total1+$sqlObj123->total1;
						}
					//}
					//if($mcode[$j] == '0002351')echo $mcode[$j].' : '.$total1.' : '.$totalamt[$j].' : '.$fdate.' : '.$tdate.'<br>';
					//if($total1 >= 200000)$tax[$j] = $totalamt[$j]*0.05;
					//else if($total1+$totalamt[$j] >= 200000)$tax[$j] = ($total1+$totalamt[$j]-200000)*0.05;
					//else $tax[$j] = 0;
					$tax[$j] = 0;
				}
					$total12 = 0;
				$pos_cur[$j] =$sqlObj1->pos_cur;
				$sp_code[$mcode[$j]] = $sqlObj1->sp_code;
				$acc_no[$j] =$sqlObj1->acc_no;
				$cmp[$j] =$sqlObj1->cmp;
				$cmp2[$j] =$sqlObj1->cmp2;
				$cmp3[$j] =$sqlObj1->cmp3;
				$mstatus[$j] =$sqlObj1->status;
				$moneyb[$j] = 0;
				$moneyb[$j] = backmonthpv($dbprefix,$mcode[$j],$ro);
				$total12 = $totaly = backallpv($dbprefix,$mcode[$j],$ro,$tdate);
				$exp_date[$j] =$sqlObj1->exp_date;
				$mem_cntday[$j]=dateDiff($paydate, $exp_date[$j]);
				//$totalamt =$sqlObj->totalamt;
				$totalamt1[$j] =  $moneyb[$j]+$totalamt[$j];
				//if($totalamt1 >= 200){
				//echo $adjust_binary.' '.$adjust_matching.' '.$adjust_pool.' '.$totalfast[$j].' '.$totalbinary[$j].' '.$totalmatching[$j].' '.$totalpool[$j].' '.$mcode[$j].' '.$cmp[$j].' '.$cmp2[$j].' '.$accno[$j].' '.$totalamt1[$j].' '.$moneyb[$j].' '.$totalamt[$j].'<br>';
			//	if($totalamt1[$j] > 0 and $mstatus[$j] == '0'){
				$sql2 = "SELECT sum(tot_pv) as totalpv from ".$dbprefix."asaleh WHERE mcode='".$mcode[$j]."' and  sadate >= '$fpdate' and sadate <= '$tpdate' and (sa_type='Q' or sa_type='A' or sa_type='C') and (sa_type='Q' or sa_type='A' or sa_type='C')  group by mcode ";
				//echo $sql2.'<br>';
				//exit;
				$rs2=mysql_query($sql2);
				$totalpv = 0;
				if(mysql_num_rows($rs2)>0){
					$totalpv = mysql_result($rs2,0,"totalpv");
				}
				$sql2 = "SELECT sum(tot_pv) as totalpv from ".$dbprefix."holdhead WHERE mcode='".$mcode[$j]."' and  sadate >= '$fpdate' and sadate <= '$tpdate' and (sa_type='Q' or sa_type='A' or sa_type='C') group by mcode ";
				
				//exit;
				$rs2=mysql_query($sql2);
				//$totalpv = 0;
				if(mysql_num_rows($rs2)>0){
					$totalpv = $totalpv + mysql_result($rs2,0,"totalpv");
				}
				//echo $mcode[$j].' : '.$totalamt1[$j].' : '.$totalamt[$j].' : '.$totalpv.'<br>';
				//exit;
				if($totalpv>= 250 or $mcode[$j] == '0000001' or $mcode[$j] == '0000002' or $mcode[$j] == '0000003' ){
					if($cstatus == '1'){
						$sql2 = "select * from ".$dbprefix."bmbonus where mcode='".$mcode[$j]."' and  tdate = '$tdate'  ";
						//echo $sql2.'<br>';
						
						$rs2 = mysql_query($sql2);
						if(mysql_num_rows($rs2) >=0){
							$sqlObj11 = mysql_fetch_object($rs2);
							$carry_l =$sqlObj11->carry_l;
							$carry_c =$sqlObj11->carry_c;
							if($carry_c > $carry_l){
								if($carry_c > 2400000)$carry_c = 2400000;
								$sqlcc = "select sum(point) as ppoint from ".$dbprefix."bmbonus where mcode='".$mcode[$j]."' and  fdate >= '$fpdate' and tdate <= '$tpdate'  ";
								$rscc=mysql_query($sqlcc);
								if(mysql_num_rows($rscc)>0)$cpoint = mysql_result($rscc,0,"ppoint");else $cpoint=0;
								if($cpoint >= 1600)$carry_l = 0;
							}else{
								if($carry_l > 2400000)$carry_l = 2400000;
								//if($carry_c > 1500)$carry_c = 1499;
								$sqlcc = "select sum(point) as ppoint from ".$dbprefix."bmbonus where mcode='".$mcode[$j]."' and  fdate >= '$fpdate' and tdate <= '$tpdate'  ";
								//echo $sqlcc.'<br><Br>';
								$rscc=mysql_query($sqlcc);
								if(mysql_num_rows($rscc)>0)$cpoint = mysql_result($rscc,0,"ppoint");else $cpoint=0;
								if($cpoint >= 1600)$carry_c = 0;
							}
							mysql_query("update ".$dbprefix."bmbonus set carry_l ='$carry_l' , carry_c ='$carry_c' WHERE mcode='".$mcode[$j]."' and  tdate = '$tdate'  ");
						}
					}
				}else{
					if($cstatus == '1'){

						$clast = explode('-',$fpdate);
						if($clast[1]=="1" or $clast[1]=="01"){
							$clast[1]="12";
							$clast[0]=$clast[0]-1;	
						}else{
							$clast[1]=$clast[1]-1;
						}
						$last1 = $clast[0].'-'.gencode2($clast[1]);
						if($clast[1]=="1" or $clast[1]=="01"){
							$clast[1]="12";
							$clast[0]=$clast[0]-1;	
						}else{
							$clast[1]=$clast[1]-1;
						}
						$last2 = $clast[0].'-'.gencode2($clast[1]);

						$sql2 = "SELECT sum(tot_pv) as totalpv from ".$dbprefix."asaleh WHERE mcode='".$mcode[$j]."' and  sadate like '%".$last1."%' and (sa_type='Q' or sa_type='A' or sa_type='C') group by mcode ";
						$rs2=mysql_query($sql2);
						$totalpv1 = 0;
						if(mysql_num_rows($rs2)>0){
							$totalpv1 = mysql_result($rs2,0,"totalpv");
						}

						$sql2 = "SELECT sum(tot_pv) as totalpv from ".$dbprefix."holdhead WHERE mcode='".$mcode[$j]."' and  sadate like '%".$last1."%' and (sa_type='Q' or sa_type='A' or sa_type='C') group by mcode ";
						$rs2=mysql_query($sql2);
						if(mysql_num_rows($rs2)>0){
							$totalpv1 = $totalpv1 + mysql_result($rs2,0,"totalpv");
						}
						
									
						if($totalpv1 < 250){
							$sql = "select carry_l,carry_c from ".$dbprefix."bmbonus  where  fdate like '%".$last1."%' and mcode='".$mcode[$j]."' order by  cid desc limit 0,1  ";
							if($mcode[$j] == '0000080'){
							// echo $sql.'<br>';

							}
							//if($mcode[$j] == '0000007')echo $sql.'<br>';
							$rs12345 = mysql_query($sql);
							if(mysql_num_rows($rs12345) > 0){
								$sqlObj1235 = mysql_fetch_object($rs12345);
								$carry_ll = ($sqlObj1235->carry_l);
								$carry_cc = ($sqlObj1235->carry_c);
							}

							if($carry_ll > 50000)$carry_ll = 50000;
							if($carry_cc > 50000)$carry_ll = 50000;

							$sql2 = "update ".$dbprefix."bmbonus set carry_l ='$carry_ll' , carry_c ='$carry_cc' WHERE mcode='".$mcode[$j]."' and  tdate = '$tdate'  ";
							if($mcode[$j] == '0000080'){
						//	 echo $sql2.'<br>';
							}
							$rs2=mysql_query($sql2);
						}
						
						if($mcode[$j] == '0000080'){
							//	 exit;
							}
					}
				}
				
				if($pos_piority[$pos_cur2[$j]] >=3){
					if($totalamt1[$j] >= 1000){
						$totalamt1[$j] = $totalamt1[$j]-1000;
						$bprice[$j] = 1000;
						$voucher[$j] = 1000/0.030303;
					}else {
						$bprice[$j] =$totalamt1[$j];
						$voucher[$j] = $totalamt1[$j]/0.030303;
						$totalamt1[$j] = 0;							
					}
				}else{
						$bprice[$j] = $totalamt1[$j]*0.2;
						$voucher[$j] = $totalamt1[$j]*0.2/0.030303;
						$totalamt1[$j] = $totalamt1[$j]-$bprice[$j];
						
				}

				//echo $mcode[$j].' : '.$voucher[$j].' : '.$totalamt1[$j].' : '.$pos_piority[$pos_cur2[$j]].' : '.$pos_cur2[$j].' : <br>';

				///////////////// VOUCHER //////////////////////////////////////////////
				if($voucher[$j] > 0){
					$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."voucher ";
					$rs = mysql_query($sql);
					$mid = $sano = mysql_result($rs,0,'id');
					mysql_free_result($rs);
					$mid = ++$sano;

					$txtMoney = $voucher[$j];
					$inv_code = 'YGN1';
					$sadate = $tdate;
					$sqlewallet = "select ewallet,mobile,name_f,name_t,mtype from ".$dbprefix."member where mcode = '".$mcode[$j]."'";
					$rsewallet = mysql_query($sqlewallet);
					$ewallet_before=mysql_result($rsewallet,0,'ewallet');
					$mobile=mysql_result($rsewallet,0,'mobile');
					$name_f=mysql_result($rsewallet,0,'name_f');
					$name_t=mysql_result($rsewallet,0,'name_t');
					$mbase=mysql_result($rsewallet,0,'mtype');
					$ewallet_after = $ewallet_before-$txtMoney;

					//$bprice = 0.030303*$txtMoney;
					$sql="insert into ".$dbprefix."voucher (id,  sano, sadate,  mcode,  sa_type, inv_code,  total,bprice,  uid,lid,send,txtoption,
					txtMoney,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,
					optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,ewallet_before,ewallet_after,checkportal,locationbase,name_f,name_t,mbase,rcode,crate
					
					) values ('$mid' ,'$sano' ,'$sadate' ,'".$mcode[$j]."', '$satype' ,'$inv_code' ,'$txtMoney','".$bprice[$j]."' ,'SYSTEM','".$inv_code."','$radsend','$txtoption'
					,'$txtMoney','on','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','$txtMoney','$txtFuture',
					'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','".$ewallet_before."','".$ewallet_after."','1','".$locationbase[$j]."','$name_f','$name_t','".$mbase."','$ro','0.030303'
					) ";

					mysql_query($sql);

					mysql_query("update ".$dbprefix."member set voucher = voucher+".$txtMoney.",bvoucher = bvoucher+".$bprice[$j]." where mcode = '".$mcode[$j]."' ");
				}

				///////////////// VOUCHER //////////////////////////////////////////////

				if($totalpv>=0 or $cstatus <> '1' or $mcode[$j] == '0000001' or $mcode[$j] == '0000002' or $mcode[$j] == '0000003'){
					if($totalamt1[$j] > 0){
						if($totalpv>= 0 and $cmp[$j] == 'ครบ' and $cmp2[$j] == 'ครบ'  and  $cmp3[$j] == 'ครบ'  and !empty($acc_no[$j]) and $mem_cntday[$j] > -90 and $status_suspend[$j] <> '1' and $cstatus == '1' ){
							
							if($totalamt1[$j] >= 300){
								$total12 = $total12+$totalamt1[$j]+$bprice[$j];
								if($mtype[$j] == '1'){
									$totalamt[$j] = $totalamt[$j]+$vat[$j]-$tax[$j];
									$totalamt1[$j] = $totalamt1[$j]+$vat[$j]-$tax[$j];
										$btotal = $btotal+$vat[$j]-$tax[$j];
								}else{
									$totalamt[$j] = $totalamt[$j]-$tax[$j];
									//echo $mcode[$j].':'.$totalamt1[$j].':'.$tax[$j].'<br>';
									$totalamt1[$j] = $totalamt1[$j]-$tax[$j];
									$btotal = $btotal-$tax[$j];
									//echo $mcode[$j].':'.$totalamt1[$j].':'.$tax[$j].'<br>';
								}
							if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
							if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
							if($cmp3[$j] == 'ครบ')$c_note5 = 1;else $c_note5 = "";
							if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
								$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,voucher) ";
								$sql .= "VALUES('$ro','".$mcode[$j]."','1','".$moneyb[$j]."','".$totalamt[$j]."','0','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','".$totalamt1[$j]."','".$total12."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre','".$bprice[$j]."')";
											

							}else{
								$btotal = $total12;
								$tax[$j] = 0;$vat[$j] = 0;
							if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
							if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
							if($cmp3[$j] == 'ครบ')$c_note5 = 1;else $c_note5 = "";
							if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
							if($mem_cntday[$j] <= -90){
								$c_note4 = 1;
								mysql_query("update ".$dbprefix."member set status = '1' where mcode = '".$mcode[$j]."'");
							}else $c_note4 = "";
							$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,c_note5,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,voucher) ";
								$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$moneyb[$j]."','0','".$totalamt1[$j]."','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','0','".$btotal."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$c_note1."','".$c_note2."','".$c_note3."','".$c_note4."','".$c_note5."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre','".$voucher[$j]."')";
							}
							//if($mcode[$j] == '0000420')echo $sql.'<br>';
							//echo $sql.'<br>';
							mysql_query($sql);
							mysql_query("update ".$dbprefix."ambonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."bmbonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."dmbonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."ombonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."smbonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
						}else{
							$tax[$j] = 0;$vat[$j] = 0;
							if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
							if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
							if($cmp3[$j] == 'ครบ')$c_note5 = 1;else $c_note5 = "";
							if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
							
							$btotal = backmonthpv3($dbprefix,$mcode[$j],$ro);
							if($mem_cntday[$j] <= -90){
								$c_note4 = 1;
								mysql_query("update ".$dbprefix."member set status = '1' where mcode = '".$mcode[$j]."'");
							}else $c_note4 = "";
							$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,c_note5,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,voucher) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$moneyb[$j]."','0','".$totalamt1[$j]."','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','0','".$btotal."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$c_note1."','".$c_note2."','".$c_note3."','".$c_note4."','".$c_note5."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre','".$bprice[$j]."')";
							mysql_query($sql);
														
							mysql_query("update ".$dbprefix."ambonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."bmbonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."dmbonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."ombonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							mysql_query("update ".$dbprefix."smbonus set pstatus =1 , prcode ='$ro' WHERE prcode =0 and mcode='".$mcode[$j]."' $whereclass ");
							//echo $sql.'<br>';
							//exit;
						}
					}
				}
			//}
		}
	}
}





 function backmonthpv($dbprefix,$mcode,$ro){
	$sql2 = "select mcode,pvh,status from ".$dbprefix."cmbonus WHERE  mcode='$mcode'  order by rcode desc limit 0,1 ";
	//echo $sql2.'<br>';
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		if($sqlObj2->status == '0')$pv= $sqlObj2->pvh;
		else $pv=0;
	}else{
		$pv = 0;
	}
	//echo $mcode.' : '.$pv.'<br>';
	return $pv;
}

 function backallpv($dbprefix,$mcode,$ro,$tdate){
	$chkdate = explode('-',$tdate);
	$chkdate1 = $chkdate[0];
	$sql2 = "select totaly from ".$dbprefix."cmbonus WHERE  mcode='$mcode' and mdate like '%".$chkdate1."%' order by id desc limit 0,1 ";
	//if($mcode == '0000008')echo $sql2.'<br>';
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		$pv= $sqlObj2->totaly;
	}else{
		$pv = 0;
	}
	//echo $mcode.' : '.$pv.'<br>';
	return $pv;
}

 function backmonthpv1($dbprefix,$mcode,$fpdate,$tpdate){
	$sql2 = "select sum(fob+cycle+smb+matching+onetime) as total_y from ".$dbprefix."cmbonus WHERE  mcode='$mcode'  and rcode <= '$ro' order by rcode desc limit 0,1 ";
	//echo $sql2.'<br>';
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
	//	if($sqlObj2->status == '0')$pv= $sqlObj2->pvh;
	//	else $pv=0;
		$pv = $sqlObj2->total_y;
	}else{
		$pv = 0;
	}
	//echo $mcode.' : '.$pv.'<br>';
	return $pv;
}

 function backmonthpv2($dbprefix,$mcode,$ro){
	$sql2 = "select pvh as total_y from ".$dbprefix."cmbonus WHERE  mcode='$mcode'  and rcode <= $ro-2 order by rcode desc limit 0,1 ";
	if($mcode == '0006437')echo $sql2.'<br>';
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
	//	if($sqlObj2->status == '0')$pv= $sqlObj2->pvh;
	//	else $pv=0;
		$pv = $sqlObj2->total_y;
	}else{
		$pv = 0;
	}
	//echo $mcode.' : '.$pv.'<br>';
	return $pv;
}
function backmonthpvb($dbprefix,$mcode,$ro){
	$sql2 = "select fob+cycle+smb+matching+onetime as total_y from ".$dbprefix."cmbonus WHERE  mcode='$mcode'  and rcode < $ro order by rcode desc limit 0,1 ";
	if($mcode == '0006437')echo $sql2.'<br>';
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
	//	if($sqlObj2->status == '0')$pv= $sqlObj2->pvh;
	//	else $pv=0;
		$pv = $sqlObj2->total_y;
	}else{
		$pv = 0;
	}
	//echo $mcode.' : '.$pv.'<br>';
	return $pv;
}
function backmonthpv3($dbprefix,$mcode,$ro){
	$sql2 = "select totaly as total_y from ".$dbprefix."cmbonus WHERE  mcode='$mcode'  and rcode <= $ro order by rcode desc limit 0,1 ";
	if($mcode == '0006437')echo $sql2.'<br>';
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
	//	if($sqlObj2->status == '0')$pv= $sqlObj2->pvh;
	//	else $pv=0;
		$pv = $sqlObj2->total_y;
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
	$update_cround = "update ".$dbprefix."cround set total_a = '$total_fv1',total_h = '$total_fv2',fast = '$total_fast',invent = '$total_invent',binaryt = '$total_binary',matching = '$total_matching',pool = '$total_pool',adjust_binary = '$adjust_binary',adjust_matching = '$adjust_matching',adjust_pool = '$adjust_pool' where rcode = '$ro'";
	//$update_binary = "update ".$dbprefix."bmbonus set adjust = '$adjust_binary' where rcode = '$ro'";
	//$update_matching = "update ".$dbprefix."dmbonus set adjust = '$adjust_matching' where rcode = '$ro'";
	//$update_pool = "update ".$dbprefix."embonus set adjust = '$adjust_pool' where rcode = '$ro'";

//	$update_binary = "update ".$dbprefix."bmbonus set adjust = '1' where rcode = '$ro'";
//	$update_matching = "update ".$dbprefix."dmbonus set adjust = '1' where rcode = '$ro'";
//	$update_pool = "update ".$dbprefix."embonus set adjust = '1' where rcode = '$ro'";
	//echo '<br>'.$update_cround;
	mysql_query($update_cround);
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