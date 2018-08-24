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
			$sql = "select * from ".$dbprefix."bround where rcode between '".$rof."' and '".$rot."' and calc='1'";
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
	$maxlv		=10;
	$taxrate 	= (5/100);
	$bonuslv		= 0.08;
	$topuppv	= 250;
	$sql="select * from ".$dbprefix."bround where  rcode='".$ro."'  ";
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

		//ลบข้อมูลใน apv ที่อยู่ในรอบ $ro
		$sql="delete from ".$dbprefix."mpv where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		
		//ลบข้อมูลใน ambonus ที่อยู่ในรอบ $ro
		$sql="delete from ".$dbprefix."mmbonus where rcode= '".$ro."'";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		
		//ลบข้อมูลใน am ที่อยู่ในรอบ $ro
		$sql="delete from ".$dbprefix."mc where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		
		//ลบข้อมูลใน ad ที่อยู่ในรอบ $ro
		$sql="delete from ".$dbprefix."mm where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		
		$sql="delete from ".$dbprefix."ec where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."ed where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."em where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."embonus where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."epv where rcode= ".$ro." ";
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

		/*$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode[$i] =$sqlObj->mcode;		
			$name_t[$i] =$sqlObj->name_t;		
			$upa_code[$mcode[$i]] = $sqlObj->upa_code;
			$lr[$mcode[$i]] = $sqlObj->lr;
			$pos_cur[$mcode[$i]] = $sqlObj->pos_cur;

			$tot_pv = 0; 
		}*/
			

		/*$sql 	= "SELECT * FROM ".$dbprefix."asaleh ";
		$sql .= "WHERE sadate>='$fdate' AND sadate<='$tdate' AND sa_type='Q'   ORDER BY sadate";
		echo "$sql <br>";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;
			$sano[$sqlObj->mcode] = $sqlObj->sano;	//เลขที่บิล เก็บไว้ที่ array
			$ptdate = $sqlObj->sadate;
		}
		mysql_free_result($rs);*/
		
		//exit;
		//echo 's';
		
		checkstatus1($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);
		
		///////////////// Sum bill in round ////////////////////////  รวม PV ของทุกคนใน APV
		$sql = " insert into ".$dbprefix."mpv  (rcode, mcode, total_pv) ";
		$sql .= "	select '$ro', mcode, SUM( tot_fv )/2 AS total_fv from ".$dbprefix."asaleh WHERE  sadate>='$fdate' and sadate<='$tdate' and sa_type = 'Q'  group by mcode ";
		mysql_query($sql) or die(mysql_error());

		$sql = " insert into ".$dbprefix."mpv  (rcode, mcode,total_pv) ";
		$sql .= "	select '$ro', mcode,SUM(tot_fv)/2 AS total_fv from ".$dbprefix."holdhead WHERE  sadate>='$fdate' and sadate<='$tdate' and sa_type = 'Q' and cancel=0 group by mcode ";
		mysql_query($sql) or die(mysql_error());
		
		$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		for($m=0;$m<mysql_num_rows($rs);$m++){
			$sqlObj = mysql_fetch_object($rs);
			$n_mcode[$m] =$sqlObj->mcode;		
			$n_name_t[$m] =$sqlObj->name_t;		
			//$n_upa_code[$n_mcode[$m]] = $sqlObj->upa_code;
			$n_upa_code[$n_mcode[$m]] = $sqlObj->sp_code;
			$n_lr[$n_mcode[$m]] = $sqlObj->lr;
			//echo "upcode :  $sqlObj->mcode    $sqlObj->upa_code<BR>";
		}
		mysql_free_result($rs);
		/*$max_percent = array('1'=>0.10,'2'=>0.10,'3'=>0.10,'4'=>0.05,'5'=>0.05,'6'=>0.04,'7'=>0.03,'8'=>0.02,'9'=>0.01);*/
		$max_percent = array('1'=>0.05,'2'=>0.05,'3'=>0.05,'4'=>0.05,'5'=>0.05,'6'=>0.05,'7'=>0.05,'8'=>0.05,'9'=>0.05);
		//เก็บ PV ของบิลขายเข้า Array เพื่อคำนวณให้ sp_code
		$sql="select rcode,mcode,sum(total_pv) as total_pv from ".$dbprefix."mpv where rcode = '$ro' group by mcode  "; 
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj			= mysql_fetch_object($rs);
			$apv_rcode		= $sqlObj->rcode;
			$apv_mcode	= $sqlObj->mcode;
			$apv_total_pv	= $sqlObj->total_pv;	
			if($apv_total_pv>1000){
				//$apv_total_pv=1000;
			}
			//echo "apv : $apv_total_pv = $i<BR> ";
			
			for($j=0;$j<sizeof($n_mcode);$j++){
				//echo "รหัสสมาชิก : $n_mcode[$j] = $apv_mcode<BR>";
				if($n_mcode[$j]<>$apv_mcode){
					//ไม่มี pv
				}else{
					//echo "มีบิลขาย : $up<BR>";
					//exit;
					$up	= $n_mcode[$j];
					$lv	 	= 0;
					$gpv	= 1;
					while($up <> "" ){
						//echo "up : $up<BR>";
						//echo "upa : $upa_code[$up]  $lv  $maxlv<BR>";
						if($n_upa_code[$up] <> "" && $gpv <= $maxlv){
							$lv	= ($lv+1);
								$flag = 0;
								$sum_pv = 0;
								
								$pos_ncur = getpossition($dbprefix,$n_upa_code[$up]); //ตรวจสอบตำแหน่งผู้ที่มีสิทธิ์รับคอมมิชชั่น
								//echo $pos_ncur;
								//exit;
								//$pvmcode=checkingdatepv($dbprefix,$n_upa_code[$up],$tdate,$fdate);
								
								//echo "รหัส ".$n_upa_code[$up]." ตำแหน่ง > $pos_ncur < คะแนนรักษายอด > $sum_pv < สถานะ > $flag < <br><br><br>";
									$chkpv=0;
									switch ($pos_ncur) {
										case 'S':
												if($gpv<=5){
													$percent = $max_percent[$gpv];
												}
											break;
										case 'G':
												if($gpv<=5){
													$percent = $max_percent[$gpv];
												}
											break;
										case 'P':
												if($gpv<=7){
													$percent = $max_percent[$gpv];
												}
											break;
										case 'D':
												if($gpv<=10){
													$percent = $max_percent[$gpv];
												}
											break;
										case 'SD':
												if($gpv<=10){
													$percent = $max_percent[$gpv];
												}
											break;
										case 'DD':
												if($gpv<=10){
													$percent = $max_percent[$gpv];
												}
											break;
										case 'TD':
												if($gpv<=10){
													$percent = $max_percent[$gpv];
												}
											break;
										case 'EDM':
												if($gpv<=10){
													$percent = $max_percent[$gpv];
												}
											break;
										case 'GDM':
												if($gpv<=10){
													$percent = $max_percent[$gpv];
												}
											break;
										default:
											$chkpv=0;
											$percent = 0;
											break;
									}
									$sql2 = "select mcode, SUM(tot_pv) AS total_pv from ".$dbprefix."asaleh WHERE sadate>='$fdate' AND sadate<='$tdate' AND sa_type='Q'  and cancel=0 AND mcode='$n_upa_code[$up]' group by mcode ";
									//echo "$sql2<BR>";
									$rs2=mysql_query($sql2);
									if (mysql_num_rows($rs2)>0) {
										$sqlObj2 = mysql_fetch_object($rs2);
										$total_pv1= $sqlObj2->total_pv;
									}else{
										$total_pv1=0;
									}
									mysql_free_result($rs2);
									
									$sql2 = "select mcode, SUM(tot_pv) AS total_pv from ".$dbprefix."holdhead WHERE sadate>='$fdate' AND sadate<='$tdate' AND sa_type='Q'  and cancel=0 AND mcode='$n_upa_code[$up]' group by mcode ";
									//echo "$sql2<BR>";
									$rs2=mysql_query($sql2);
									if (mysql_num_rows($rs2)>0) {
										$sqlObj2 = mysql_fetch_object($rs2);
										$total_pv2= $sqlObj2->total_pv;
									}else{
										$total_pv2=0;
									}
									mysql_free_result($rs2);
									$total_pv=($total_pv1+$total_pv2);
									//echo "รหัส : $n_upa_code[$up] ตำแหน่ง : $pos_ncur   pv : $total_pv <BR>";
									/*if($pos_ncur=="S" || $pos_ncur=="P" ){
										if($total_pv>=500){
											$chkpv=1;
										}else{
											$chkpv=0;
										}
									}else{
										if($total_pv>=1000){
											$chkpv=1;
										}else{
											$chkpv=0;
										}
									}*/
									$chkpv = 0;
									/*if($total_pv>=1000){
											$chkpv=1;
										}else{
											$chkpv=0;
										}*/
										$month=explode("-",$fdate);
									$sql2 = "SELECT * from ".$dbprefix."status1 WHERE mcode='".$n_mcode[$j]."' and month_pv='".$month[0].$month[1]."' and status='1' ";
									//echo $sql2.'<br>';
									$rs2=mysql_query($sql2);
									if(mysql_num_rows($rs2)>0) {
										$chkpv = 1;
									}									
									if($gpv<=10&&$chkpv==1){

										//$selectsql  = " select * from ".$dbprefix."mc rcode";
										$sql = " INSERT INTO ".$dbprefix."mc (rcode, mcode, upa_code,level, gen, pv, percer, total,fdate,tdate) VALUES ";
										$sql .= "('$ro','".$n_mcode[$j]."','".$n_upa_code[$up]."','$lv','$gpv','".$apv_total_pv."','".$percent."','".($apv_total_pv*$percent)."' ,'$fdate','$tdate')";
										mysql_query($sql) or die(mysql_error());
										
										//if($n_mcode[$j] == '0000005')echo "IN : $sql <BR>";
										$gpv=($gpv+1);
									}
						}
						$up = $n_upa_code[$up];
					}
				}
			}
		} 
		mysql_free_result($rs);
		//คำนวณโบนัส สรุปจ่ายโบนัส		
		$sql = " insert into ".$dbprefix."mmbonus  (rcode, mcode, total,tax,bonus,fdate,tdate,pmonth) ";
		$sql .= "	select '$ro', upa_code,sum(total) as totalpv,(sum(total)*0.05) as tax,(sum(total)-(sum(total)*0.03)) bonus,'$fdate','$tdate','$pmonth' from ".$dbprefix."mc WHERE  rcode='$ro' group by upa_code ";
		mysql_query($sql) or die(mysql_error());
	//exit;	
		calc_pool_bunus($dbprefix,$ro,$tdate,$fdate);
//exit;
	//ปรับ calc ของ bround ให้เป็น '1'
	$sql="update ".$dbprefix."bround set calc='1' where rcode='$ro' ";
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
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=12">
<table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">กรอกรอบการคำนวณยูนิเลเวล ที่ต้องการคำนวนเช่น 1-12</td>
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

function calc_pool_bunus($dbprefix,$ro,$tdate,$fdate){

	$month=explode("-",$fdate);

	//exit;
	//หายอด PV ของทั้งบริษัท
	$sql = " insert into ".$dbprefix."epv  (rcode, mcode, sano,sadate,fdate,tdate,total_pv) ";
	$sql .= "	select '$ro', mcode,sano,sadate,'$fdate','$tdate',SUM(tot_fv)/2 AS total_fv from ".$dbprefix."asaleh WHERE  sadate>='$fdate' and sadate<='$tdate' and sa_type = 'Q' and cancel=0 group by mcode ";
	//echo $sql;
	mysql_query($sql) or die(mysql_error());
	
	$sql = " insert into ".$dbprefix."epv  (rcode, mcode, sano,sadate,fdate,tdate,total_pv) ";
	$sql .= "	select '$ro', mcode,sano,sadate,'$fdate','$tdate',SUM(tot_fv)/2 AS total_fv from ".$dbprefix."holdhead WHERE  sadate>='$fdate' and sadate<='$tdate' and sa_type = 'Q' and cancel=0 group by mcode ";
	mysql_query($sql) or die(mysql_error());

	$sql = "SELECT sum(total_pv) as total_pv from ".$dbprefix."epv WHERE rcode='$ro' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$total_pv = mysql_result($rs,0,'total_pv');
	}

	//echo $sql.'<br>';
	//หาคนที่ผ่านคุณสมบัติ
	$sql="SELECT * FROM ".$dbprefix."member where (pos_cur <> 'MB' and  pos_cur <> '') ORDER BY lr DESC";
	$rs = mysql_query($sql);
	//echo $sql.'<br>';
	//echo "$sql<BR>";
	$pos_S = 0;
	$pos_G = 0;
	$pos_P = 0;
	$pos_DD = 0;
	$pos_D = 0;
	$pos_SD = 0;
	$pos_TD = 0;
	$pos_EDM = 0;
	$pos_GDM = 0;
	if(mysql_num_rows($rs)>0){
		for($m=0;$m<mysql_num_rows($rs);$m++){
			$sqlObj = mysql_fetch_object($rs) or die("desad");
			
			$n_mcode[$m] =$sqlObj->mcode;		
			$n_name_t[$m] =$sqlObj->name_t;		
			$n_upa_code[$n_mcode[$m]] = $sqlObj->sp_code;
			$n_pos_cur[$n_mcode[$m]] = $sqlObj->pos_cur;
			//echo $n_pos_cur[$n_mcode[$m]].'<br>';
			$sql2 = "SELECT * from ".$dbprefix."status1 WHERE mcode='".$n_mcode[$m]."' and month_pv='".$month[0].$month[1]."' and status='1' ";
			$rs2=mysql_query($sql2);
			if(mysql_num_rows($rs2)>0) {
				switch ($n_pos_cur[$n_mcode[$m]]){
							case 'S': $pos_S = $pos_S+3;
								break;
							case 'G':$pos_G = $pos_G+5;
								break;
							case 'P':$pos_P = $pos_P+10;
								break;
							case 'D':$pos_D = $pos_D+15;
								break;
							case 'SD':$pos_SD = $pos_SD+15;
								break;
							case 'DD':$pos_DD = $pos_DD+15;
								break;
							case 'TD':$pos_TD = $pos_TD+15;
								break;
							case 'EDM':$pos_EDM = $pos_EDM+25;
								break;
							case 'GDM':$pos_GDM = $pos_GDM+25;
								break;
							default:
									$endQuota=0;
								break;
						}
			}
			$n_lr[$n_mcode[$m]] = $sqlObj->lr;
			
		}mysql_free_result($rs);
	}
	//var_dump($n_pos_cur);
	//exit;
	//ทำอยู่
	echo $pos_S.' '.$pos_G.' '.$pos_P.' '.$pos_D.' '.$pos_SD.' '.$pos_DD.' '.$pos_TD.' '.$pos_EDM.' '.$pos_GDM.' ';
//echo $total_pv.'<br>';
	$tot1 = ($total_pv*20/100);
	//if(!empty($pos_S) and !empty($pos_G) and !empty($pos_P) and !empty($pos_DD) and !empty($pos_EDM) and !empty($pos_GDM))
	$per1 = $tot1/($pos_S+$pos_G+$pos_P+$pos_DD+$pos_D+$pos_TD+$pos_SD+$pos_EDM+$pos_GDM);//กองทุนท่องเที่ยว
	$tot2 = ($total_pv*10/100);
	//if(!empty($pos_DD) and !empty($pos_EDM) and !empty($pos_GDM))
	$per2 = $tot2/($pos_DD+$pos_D+$pos_SD+$pos_TD+$pos_EDM+$pos_GDM);//กองทุนรถยนต์
	$tot3 = ($total_pv*5/100);
	//if(!empty($pos_EDM) and !empty($pos_GDM))
	$per3 = $tot3/($pos_EDM+$pos_GDM);//กองทุนบ้าน
	$tot4 = ($total_pv*2/100);
	//if(!empty($pos_EDM) and !empty($pos_GDM))
	$per4 = $tot4/($pos_EDM+$pos_GDM);//กองทุนทั่วโลก
	$tot5 = ($total_pv*1/100);
	//if(!empty($pos_GDM))
	$per5 = $tot5/($pos_GDM);//กองทุนคนเดียว GDM สะสม
	$tot6 = ($total_pv*2/100);
	//if(!empty($pos_S) and !empty($pos_G) and !empty($pos_P) and !empty($pos_DD) and !empty($pos_EDM) and !empty($pos_GDM))
	$per6=$tot6/($pos_S+$pos_G+$pos_P+$pos_DD+$pos_D+$pos_SD+$pos_TD+$pos_EDM+$pos_GDM);//กองทุนการกุศล	
	echo $per1.' '.$per2.' '.$per3.' '.$per4.' '.$per5.' '.$per6.' <br>';
		echo $tot1.' '.$tot2.' '.$tot3.' '.$tot4.' '.$tot5.' '.$tot6.' <br>';

	for($j=0;$j<sizeof($n_mcode);$j++){
		
		$sql2 = "SELECT * from ".$dbprefix."status1 WHERE mcode='".$n_mcode[$j]."' and month_pv='".$month[0].$month[1]."' and status='1' ";
		//var_dump($_mcode);
		//echo $sql2;
		
		
		// ถึงตรงนี้แล้ว
		//echo  "$sql2<br>";
		$rs2=mysql_query($sql2);
		//echo mysql_num_rows($rs2);
		
		if(mysql_num_rows($rs2)>0) {
			//echo $j.'<br>';
			//echo $n_pos_cur[$n_mcode[$j]].'<br>';
			//exit;
			if($n_pos_cur[$n_mcode[$j]] == 'GDM' or $n_pos_cur[$n_mcode[$j]] == 'gdm')
			{
				$per11 = $per1*30;
				$per21 = $per2*30;
				$per31 = $per3*30;
				$per41 = $per4*30;
				$per51 = $per5*30;
				$per61 = $per6*30;
				$sql1 = " insert into ".$dbprefix."em  (rcode,mcode,pershare,total1,total2,total3,total4,total5,total6,fdate,tdate,pv_world,pools) VALUES ";
				$sql1 .= " ('$ro','$n_mcode[$j]','20','$per11','$per21','$per31','$per41','$per51','$per61','$fdate','$tdate','$total_pv','1')";
				mysql_query($sql1) or die(mysql_error());
			}
			if($n_pos_cur[$n_mcode[$j]] == 'EDM' or $n_pos_cur[$n_mcode[$j]] == 'edm')
			{
				$per11 = $per1*25;
				$per21 = $per2*25;
				$per31 = $per3*25;
				$per41 = $per4*25;
				$per51 = $per5*25;
				$per61 = $per6*25;
				$sql1 = " insert into ".$dbprefix."em  (rcode,mcode,pershare,total1,total2,total3,total4,total5,total6,fdate,tdate,pv_world,pools) VALUES ";
				$sql1 .= " ('$ro','$n_mcode[$j]','20','$per11','$per21','$per31','$per41','0','$per61','$fdate','$tdate','$total_pv','1')";
				mysql_query($sql1) or die(mysql_error());
			}
			if($n_pos_cur[$n_mcode[$j]] == 'DD' or $n_pos_cur[$n_mcode[$j]] == 'dd' or
				$n_pos_cur[$n_mcode[$j]] == 'D' or $n_pos_cur[$n_mcode[$j]] == 'd' or
				$n_pos_cur[$n_mcode[$j]] == 'SD' or $n_pos_cur[$n_mcode[$j]] == 'sd' or
				$n_pos_cur[$n_mcode[$j]] == 'TD' or $n_pos_cur[$n_mcode[$j]] == 'td')
			{
				$per11 = $per1*15;
				$per21 = $per2*15;
				$per31 = $per3*15;
				$per41 = $per4*15;
				$per51 = $per5*15;
				$per61 = $per6*15;
				$sql1 = " insert into ".$dbprefix."em  (rcode,mcode,pershare,total1,total2,total3,total4,total5,total6,fdate,tdate,pv_world,pools) VALUES ";
				$sql1 .= " ('$ro','$n_mcode[$j]','20','$per11','$per21','0','0','0','$per61','$fdate','$tdate','$total_pv','1')";
				mysql_query($sql1) or die(mysql_error());
			}
			if($n_pos_cur[$n_mcode[$j]] == 'P' or $n_pos_cur[$n_mcode[$j]] == 'p')
			{
				$per11 = $per1*10;
				$per21 = $per2*10;
				$per31 = $per3*10;
				$per41 = $per4*10;
				$per51 = $per5*10;
				$per61 = $per6*10;
				$sql1 = " insert into ".$dbprefix."em  (rcode,mcode,pershare,total1,total2,total3,total4,total5,total6,fdate,tdate,pv_world,pools) VALUES ";
				$sql1 .= " ('$ro','$n_mcode[$j]','20','$per11','0','0','0','0','$per61','$fdate','$tdate','$total_pv','1')";
				mysql_query($sql1) or die(mysql_error());
			}
			if($n_pos_cur[$n_mcode[$j]] == 'G' or $n_pos_cur[$n_mcode[$j]] == 'g')
			{
				$per11 = $per1*5;
				$per21 = $per2*5;
				$per31 = $per3*5;
				$per41 = $per4*5;
				$per51 = $per5*5;
				$per61 = $per6*5;
				$sql1 = " insert into ".$dbprefix."em  (rcode,mcode,pershare,total1,total2,total3,total4,total5,total6,fdate,tdate,pv_world,pools) VALUES ";
				$sql1 .= " ('$ro','$n_mcode[$j]','20','$per11','0','0','0','0','$per61','$fdate','$tdate','$total_pv','1')";
				mysql_query($sql1) or die(mysql_error());
			}
			if($n_pos_cur[$n_mcode[$j]] == 'S' or $n_pos_cur[$n_mcode[$j]] == 's')
			{
				$per11 = $per1*3;
				$per21 = $per2*3;
				$per31 = $per3*3;
				$per41 = $per4*3;
				$per51 = $per5*3;
				$per61 = $per6*3;
				$sql1 = " insert into ".$dbprefix."em  (rcode,mcode,pershare,total1,total2,total3,total4,total5,total6,fdate,tdate,pv_world,pools) VALUES ";
				$sql1 .= " ('$ro','$n_mcode[$j]','20','$per11','0','0','0','0','$per61','$fdate','$tdate','$total_pv','1')";
				mysql_query($sql1) or die(mysql_error());
			}		
						//echo "$sql <br>";
			//mysql_query($sql) or die(mysql_error());
			//echo "upcode :  $sqlObj->mcode    $sqlObj->upa_code<BR>";
		}
	}
	$sql = " insert into ".$dbprefix."embonus  (rcode, mcode, total,tax,bonus,fdate,tdate) ";
	$sql .= "select '$ro',mcode,sum(total1+total2+total3+total4+total5+total6) as total,(sum(total1+total2+total3+total4+total5+total6)*0.03) as tax,(sum(total1+total2+total3+total4+total5+total6)-(sum(total1+total2+total3+total4+total5+total6)*0.05)) as bonus,'$fdate','$tdate' from ".$dbprefix."em  where rcode='$ro' group by mcode";
	//echo "$sql <br>";
	mysql_query($sql) or die(mysql_error());		

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

function checkstatus1($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){
	$month=explode("-",$fdate);
	$sql="SELECT * FROM ".$dbprefix."member ";
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		for($m=0;$m<mysql_num_rows($rs);$m++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode =$sqlObj->mcode;		
			$name_t =$sqlObj->name_t;
			$pos_cur =$sqlObj->pos_cur;
			$sp_code = $sqlObj->sp_code;
			$lr = $sqlObj->lr;
			$mdate = $sqlObj->mdate;
			$mem_cntday=dateDiff($mdate, $fdate);
			/*if($mem_cntday<=60){
				//????????????????????????????????????
				$sql1 = "select * from ".$dbprefix."status WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
				$rs1=mysql_query($sql1);
				if (mysql_num_rows($rs1)<=0) {
					$sqlObj1 = mysql_fetch_object($rs1);
					$sql = "INSERT INTO ".$dbprefix."status (rcode,mcode,status,pv,mdate,month_pv) ";
					$sql .= "VALUES('$ro','".$mcode."','1','0','".$fdate."','".$month[0].$month[1]."')";
					mysql_query($sql);
				}
				mysql_free_result($rs1);
			}else{*/
				$sql2 = "select mcode, SUM(tot_fv) AS total_fv from ".$dbprefix."asaleh WHERE sadate>='$fpdate' AND sadate<='$tpdate' AND sa_type='Q'  and cancel=0 AND mcode='$mcode' group by mcode ";
				//echo "$sql2<BR>";
				$rs2=mysql_query($sql2);
				if (mysql_num_rows($rs2)>0) {
					$sqlObj2 = mysql_fetch_object($rs2);
					$total_fv1= $sqlObj2->total_fv;
				}else{
					$total_fv1=0;
				}
				mysql_free_result($rs2);
				
				$sql2 = "select mcode, SUM(tot_fv) AS total_fv from ".$dbprefix."holdhead WHERE sadate>='$fpdate' AND sadate<='$tpdate' AND sa_type='Q'  and cancel=0 AND mcode='$mcode' group by mcode ";
				//echo "$sql2<BR>";
				$rs2=mysql_query($sql2);
				if (mysql_num_rows($rs2)>0) {
					$sqlObj2 = mysql_fetch_object($rs2);
					$total_fv2= $sqlObj2->total_fv;
				}else{
					$total_fv2=0;
				}
				mysql_free_result($rs2);

				$sql2 = "select mcode, SUM(tot_bv) AS total_bv from ".$dbprefix."asaleh WHERE sadate>='$fpdate' AND sadate<='$tpdate' AND sa_type='A'  and cancel=0 AND mcode='$mcode' group by mcode ";
				//echo "$sql2<BR>";
				$rs2=mysql_query($sql2);
				if (mysql_num_rows($rs2)>0) {
					$sqlObj2 = mysql_fetch_object($rs2);
					$total_bv1= $sqlObj2->total_bv;
				}else{
					$total_bv1=0;
				}
				mysql_free_result($rs2);
				
				$sql2 = "select mcode, SUM(tot_bv) AS total_bv from ".$dbprefix."holdhead WHERE sadate>='$fpdate' AND sadate<='$tpdate' AND sa_type='A'  and cancel=0 AND mcode='$mcode' group by mcode ";
				//echo "$sql2<BR>";
				$rs2=mysql_query($sql2);
				if (mysql_num_rows($rs2)>0) {
					$sqlObj2 = mysql_fetch_object($rs2);
					$total_bv2= $sqlObj2->total_bv;
				}else{
					$total_bv2=0;
				}
				mysql_free_result($rs2);
				
				$total_fv3 = gettotalfv($dbprefix,$mcode,$fpdate,$tpdate);
				$total_bv3 = gettotalbv($dbprefix,$mcode,$fpdate,$tpdate);	
				$total_bv=($total_bv1+$total_bv2+$total_bv3);
				$total_fv=($total_fv1+$total_fv2+$total_fv3);
				$array_mpos = array('MB'=>0,'S'=>200,'G'=>300,'P'=>600,'D'=>1200,'SD'=>1200,'DD'=>1200,'TD'=>1200,'EDM'=>4000,'GDM'=>5000);

					if($total_fv>=5000 and $pos_cur == 'GDM'){
						$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
						$rs1=mysql_query($sql1);
						if (mysql_num_rows($rs1)<=0) {
							$sqlObj1 = mysql_fetch_object($rs1);
							$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv,mpos) ";
							$sql .= "VALUES('$ro','".$mcode."','1','".$array_mpos[$pos_cur]."','".$fdate."','".$month[0].$month[1]."','$pos_cur')";
							mysql_query($sql);
						}
						mysql_free_result($rs1);
					}else{
						if($pos_cur=="S"&&$total_fv>=200){
							$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
							$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv,mpos) ";
							$sql .= "VALUES('$ro','".$mcode."','1','".$array_mpos[$pos_cur]."','".$fdate."','".$month[0].$month[1]."','$pos_cur')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);
						}else{
							/*$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
								$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv) ";
								$sql .= "VALUES('$ro','".$mcode."','0','".$total_pv."','".$fdate."','".$month[0].$month[1]."')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);*/
						}
						if($pos_cur=="G"&&$total_fv>=300){
							$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
							$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv,mpos) ";
							$sql .= "VALUES('$ro','".$mcode."','1','".$array_mpos[$pos_cur]."','".$fdate."','".$month[0].$month[1]."','$pos_cur')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);
						}else{
							/*$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
								$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv) ";
								$sql .= "VALUES('$ro','".$mcode."','0','".$total_pv."','".$fdate."','".$month[0].$month[1]."')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);*/
						}
						/*if($mcode == '0000075'){
								echo 'pos :'.$pos_cur.'total_fv :'.$total_fv;
						}*/
						if($pos_cur=="P"&&$total_fv>=600){
							$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							//if($mcode == '0000075')echo  "$sql1 $total_fv<br>";
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
							$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv,mpos) ";
							$sql .= "VALUES('$ro','".$mcode."','1','".$array_mpos[$pos_cur]."','".$fdate."','".$month[0].$month[1]."','$pos_cur')";
								//if($mcode == '0000075')echo  "$sql<br>";
								mysql_query($sql);
							}
							mysql_free_result($rs1);
						}else{
							/*$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
								$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv) ";
								$sql .= "VALUES('$ro','".$mcode."','0','".$total_pv."','".$fdate."','".$month[0].$month[1]."')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);*/
						}
						if($pos_cur=="D"&&$total_fv>=1200){
							$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
							$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv,mpos) ";
							$sql .= "VALUES('$ro','".$mcode."','1','".$array_mpos[$pos_cur]."','".$fdate."','".$month[0].$month[1]."','$pos_cur')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);
						}else{
							/*$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
								$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv) ";
								$sql .= "VALUES('$ro','".$mcode."','0','".$total_pv."','".$fdate."','".$month[0].$month[1]."')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);*/
						}
						if($pos_cur=="SD"&&$total_fv>=1200){
							$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
							$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv,mpos) ";
							$sql .= "VALUES('$ro','".$mcode."','1','".$array_mpos[$pos_cur]."','".$fdate."','".$month[0].$month[1]."','$pos_cur')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);
						}else{
							/*$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
								$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv) ";
								$sql .= "VALUES('$ro','".$mcode."','0','".$total_pv."','".$fdate."','".$month[0].$month[1]."')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);*/
						}
						if($pos_cur=="DD"&&$total_fv>=1200){
							$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
							$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv,mpos) ";
							$sql .= "VALUES('$ro','".$mcode."','1','".$array_mpos[$pos_cur]."','".$fdate."','".$month[0].$month[1]."','$pos_cur')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);
						}else{
							/*$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
								$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv) ";
								$sql .= "VALUES('$ro','".$mcode."','0','".$total_pv."','".$fdate."','".$month[0].$month[1]."')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);*/
						}
						if($pos_cur=="TD"&&$total_fv>=1200){
							$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
							$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv,mpos) ";
							$sql .= "VALUES('$ro','".$mcode."','1','".$array_mpos[$pos_cur]."','".$fdate."','".$month[0].$month[1]."','$pos_cur')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);
						}else{
							/*$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
								$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv) ";
								$sql .= "VALUES('$ro','".$mcode."','0','".$total_pv."','".$fdate."','".$month[0].$month[1]."')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);*/
						}
						if($pos_cur=="EDM"&&$total_fv>=4000){
							$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
							$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv,mpos) ";
							$sql .= "VALUES('$ro','".$mcode."','1','".$array_mpos[$pos_cur]."','".$fdate."','".$month[0].$month[1]."','$pos_cur')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);
						}else{
							$sql1 = "select * from ".$dbprefix."status1 WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
							$rs1=mysql_query($sql1);
							if (mysql_num_rows($rs1)<=0) {
								$sqlObj1 = mysql_fetch_object($rs1);
								$sql = "INSERT INTO ".$dbprefix."status1 (rcode,mcode,status,pv,mdate,month_pv,mpos) ";
								$sql .= "VALUES('$ro','".$mcode."','0','".$total_fv."','".$fdate."','".$month[0].$month[1]."','$pos_cur')";
								mysql_query($sql);
							}
							mysql_free_result($rs1);
						}
					//}
				
			}
		}
		mysql_free_result($rs);
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
	}else{
		$month[1] = $month[1]-1;
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
 h
?>