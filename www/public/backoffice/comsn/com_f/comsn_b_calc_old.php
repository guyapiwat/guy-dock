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
	$maxlv		=25;
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

		$sql="delete from ".$dbprefix."bmpersonal where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."upv where rcode= ".$ro." ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		
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

		$sql = " insert into ".$dbprefix."upv  (rcode, mcode, sano,sadate,fdate,tdate,total_pv) ";
		$sql .= "	select '$ro', mcode,sano,sadate,'$fdate','$tdate',SUM(tot_pv) AS total_pv from ".$dbprefix."asaleh WHERE  sadate>='$fdate' and sadate<='$tdate' and sa_type = 'Q' and cancel=0 group by mcode ";
		mysql_query($sql) or die(mysql_error());
		
		$sql = " insert into ".$dbprefix."upv  (rcode, mcode, sano,sadate,fdate,tdate,total_pv) ";
		$sql .= "	select '$ro', mcode,sano,sadate,'$fdate','$tdate',SUM(tot_pv) AS total_pv from ".$dbprefix."holdhead WHERE  sadate>='$fdate' and sadate<='$tdate' and sa_type = 'Q' and cancel=0 group by mcode ";
		mysql_query($sql) or die(mysql_error());


		//คำนวน am สร้าง sum_pv ทาง L,R
		/*for($i=0;$i<sizeof($mcode);$i++){
			if($upa_code[$mcode[$i]] <>""){
				$sum_pv[$upa_code[$mcode[$i]]][$lr[$mcode[$i]]] += $tot_pv;
				if($tot_pv > 0)
					$count[$upa_code[$mcode[$i]]][$lr[$mcode[$i]]]++;
				$up = $upa_code[$mcode[$i]];
				while($up <> ""){
					if($upa_code[$up] <>""){
						$sum_pv[$upa_code[$up]][$lr[$up]] += $tot_pv;
						if($tot_pv > 0)
							$count[$upa_code[$up]][$lr[$up]]++;
					}
					$up = $upa_code[$up];
				}
			}
		}*/
		
		//คำนวน ad ไม่ใช้ในส่วน ambonus
		/*for($i=0;$i<sizeof($mcode);$i++){
			$sum_tot = $tot_pv + $sum_pv[$mcode[$i]][1] + $sum_pv[$mcode[$i]][2] + $sum_pv[$mcode[$i]][3] ;
			if($sum_tot > 0){	
				$sql = "INSERT INTO ".$dbprefix."bm (rcode,mcode,mname_t,sum_l,sum_c,sum_r,total_pv,upa_code,upa_name,lr) ";
				$sql .= "VALUES(".$ro.",'$mcode[$i]','$name_t[$i]','".$sum_pv[$mcode[$i]][1]."','".$sum_pv[$mcode[$i]][2]."','".$sum_pv[$mcode[$i]][3]."',";
				$sql .= "'".$tot_pv."','".$upa_code[$mcode[$i]]."','".$name_t[$upa_code[$mcode[$i]]]."','".$lr[$mcode[$i]]."')";
				mysql_query($sql);

				$text="uid=".$_SESSION["adminuserid"]." action=comsn_a_calc =>$sql";
				writelogfile($text);
			}
		}*/
		
		
		$sql 	= "SELECT mcode,sum(total_pv) as tot_pv FROM ".$dbprefix."upv ";
		$sql .= "WHERE rcode='$ro' GROUP BY mcode";
		echo "$sql <br>";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$umcode = $sqlObj->mcode;
			$tot_pv = $sqlObj->tot_pv;
			
			if($tot_pv > 0){
				$up = $umcode;
				$lev = 0;
				$newpv=0;
				$pdb=0;
				$per=0;
				//หาตำแหน่ง
				$upos_cur="";
				$sql1="SELECT pos_cur from ".$dbprefix."member WHERE mcode='$umcode' LIMIT 1";
				$rs1=mysql_query($sql1);
				if (mysql_num_rows($rs1)>'0') {
					$sqlObj1 = mysql_fetch_object($rs);
					$upos_cur = $sqlObj1->pos_cur;
				}

				//echo "รหัส ".$mcode[$i]." ตำแหน่ง  ".$pos_cur[$mcode[$i]]." <br>";
				switch ($upos_cur){
					case 'S':
							if($tot_pv>1000){
								$newpv=1000;
								$pnewpv=($tot_pv-1000);
								$per=0.10;
								$pdb=($pnewpv*$per);
								$tax=($pdb*0.03);
								$netamt=($pdb-$tax);
							}
						break;
					case 'G':
							if($tot_pv>1000){
								$newpv=1000;
								$pnewpv=($tot_pv-1000);
								$per=0.10;
								$pdb=($pnewpv*$per);
								$tax=($pdb*0.03);
								$netamt=($pdb-$tax);
							}
						break;
					case 'P':
							if($tot_pv>1000){
								$newpv=1000;
								$pnewpv=($tot_pv-1000);
								$per=0.15;
								$pdb=($pnewpv*$per);
								$tax=($pdb*0.03);
								$netamt=($pdb-$tax);
							}
						break;
					case 'D':
							if($tot_pv>1000){
								$newpv=1000;
								$pnewpv=($tot_pv-1000);
								$per=0.15;
								$pdb=($pnewpv*$per);
								$tax=($pdb*0.03);
								$netamt=($pdb-$tax);
							}
						break;
					case 'SD':
							if($tot_pv>1000){
								$newpv=1000;
								$pnewpv=($tot_pv-1000);
								$per=0.20;
								$pdb=($pnewpv*$per);
								$tax=($pdb*0.03);
								$netamt=($pdb-$tax);
							}
						break;
					case 'CD':
							if($tot_pv>1000){
								$newpv=1000;
								$pnewpv=($tot_pv-1000);
								$per=0.20;
								$pdb=($pnewpv*$per);
								$tax=($pdb*0.03);
								$netamt=($pdb-$tax);
							}
						break;
					default:
								$per=0;
								$pdb=0;
								$tax=0;
								$netamt=0;
						break;
				}

				if($pdb>0){
					$sql = "INSERT INTO ".$dbprefix."bmpersonal (rcode,mcode,pos_cur,pv_s,pv_o,percent,total,tax,netamt,fdate,tdate) VALUES";
					$sql .= "(".$ro.",'".$umcode."','".$upos_cur."','".$tot_pv."','".$pnewpv."','".$per."','".$pdb."','".$tax."','".$netamt."','$fdate','$tdate') ";
					mysql_query($sql);
				}
				/*while($up <> ""){
					if($upa_code[$up] <>""){
							$sql = "INSERT INTO ".$dbprefix."mm (rcode,mcode,upa_code,pv,lr) VALUES";
							$sql .= "(".$ro.",'$mcode[$i]','$upa_code[$up]','".$newpv."','$lr[$up]') ";
							mysql_query($sql);
					}
					$up = $upa_code[$up];
				}*/
			}
		}
		mysql_free_result($rs);
		
		///////////////// Sum bill in round ////////////////////////  รวม PV ของทุกคนใน APV
		$sql = " insert into ".$dbprefix."mpv  (rcode, mcode, total_pv) ";
		$sql .= "	select '$ro', mcode, SUM( tot_pv ) AS total_pv from ".$dbprefix."asaleh WHERE  sadate>='$fdate' and sadate<='$tdate' and sa_type = 'Q'  group by mcode ";
		mysql_query($sql) or die(mysql_error());

		$sql = " insert into ".$dbprefix."mpv  (rcode, mcode,total_pv) ";
		$sql .= "	select '$ro', mcode,SUM(tot_pv) AS total_pv from ".$dbprefix."holdhead WHERE  sadate>='$fdate' and sadate<='$tdate' and sa_type = 'Q' and cancel=0 group by mcode ";
		mysql_query($sql) or die(mysql_error());
		
		$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		for($m=0;$m<mysql_num_rows($rs);$m++){
			$sqlObj = mysql_fetch_object($rs);
			$n_mcode[$m] =$sqlObj->mcode;		
			$n_name_t[$m] =$sqlObj->name_t;		
			$n_upa_code[$n_mcode[$m]] = $sqlObj->upa_code;
			$n_lr[$n_mcode[$m]] = $sqlObj->lr;
			//echo "upcode :  $sqlObj->mcode    $sqlObj->upa_code<BR>";
		}
		mysql_free_result($rs);
		
		//เก็บ PV ของบิลขายเข้า Array เพื่อคำนวณให้ sp_code
		$sql="select rcode,mcode,sum(total_pv) as total_pv from ".$dbprefix."mpv where rcode = '$ro' group by mcode  "; 
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj			= mysql_fetch_object($rs);
			$apv_rcode		= $sqlObj->rcode;
			$apv_mcode	= $sqlObj->mcode;
			$apv_total_pv	= $sqlObj->total_pv;	
			if($apv_total_pv>1000){
				$apv_total_pv=1000;
			}
			//echo "apv : $apv_total_pv = $i<BR> ";
			
			for($j=0;$j<sizeof($n_mcode);$j++){
				//echo "รหัสสมาชิก : $n_mcode[$j] = $apv_mcode<BR>";
				if($n_mcode[$j]<>$apv_mcode){
					//ไม่มี pv
				}else{
					//echo "มีบิลขาย : $up<BR>";
					$up	= $n_mcode[$j];
					$lv	 	= 0;
					$gpv	= 1;
					while($up <> "" ){
						//echo "up : $up<BR>";
						//echo "upa : $upa_code[$up]  $lv  $maxlv<BR>";
						if($n_upa_code[$up] <>"" && $gpv <= $maxlv){
							$lv	= ($lv+1);
								$flag = 0;
								$sum_pv = 0;
								
								$pos_ncur = getpossition($dbprefix,$n_upa_code[$up]); //ตรวจสอบตำแหน่งผู้ที่มีสิทธิ์รับคอมมิชชั่น
								
								$pvmcode=checkingdatepv($dbprefix,$n_upa_code[$up],$tdate,$fdate);
								
								//echo "รหัส ".$n_upa_code[$up]." ตำแหน่ง > $pos_ncur < คะแนนรักษายอด > $sum_pv < สถานะ > $flag < <br><br><br>";
									$chkpv=0;
									switch ($pos_ncur) {
										case 'S':
												if($sum_pv>=1&&$gpv<=5){
													$percent = 0.05;
													$chkpv=1;
												}
											break;
										case 'G':
												if($sum_pv>=1&&$gpv<=15){
													$percent = 0.05;
													$chkpv=1;
												}
											break;
										case 'P':
												if($sum_pv>=1&&$gpv<=20){
													$percent = 0.05;
													$chkpv=1;
												}
											break;
										case 'D':
												if($sum_pv>=1&&$gpv<=20){
													$percent = 0.05;
													$chkpv=1;
												}
											break;
										case 'SD':
												if($sum_pv>=1&&$gpv<=20){
													$percent = 0.05;
													$chkpv=1;
												}
											break;
										case 'CD':
												if($sum_pv>=1&&$gpv<=25){
													$percent = 0.05;
													$chkpv=1;
												}
											break;
										default:
											$chkpv=0;
											break;
									}
									if($gpv<=25&&$chkpv==1){
										$sql = " INSERT INTO ".$dbprefix."mc (rcode, mcode, upa_code,level, gen, pv, percer, total,fdate,tdate) VALUES ";
										$sql .= "('$ro','".$n_mcode[$j]."','".$n_upa_code[$up]."','$lv','$gpv','".$apv_total_pv."','".$percent."','".($apv_total_pv*$percent)."' ,'$fdate','$tdate')";
										mysql_query($sql) or die(mysql_error());
										//echo "IN : $sql <BR>";
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
		$sql .= "	select '$ro', upa_code,sum(total) as totalpv,(sum(total)*0.03) as tax,(sum(total)-(sum(total)*0.03)) bonus,'$fdate','$tdate','$pmonth' from ".$dbprefix."mc WHERE  rcode='$ro' group by upa_code ";
		mysql_query($sql) or die(mysql_error());
		
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

	//หายอด PV ของทั้งบริษัท
	$sql = " insert into ".$dbprefix."epv  (rcode, mcode, sano,sadate,fdate,tdate,total_pv) ";
	$sql .= "	select '$ro', mcode,sano,sadate,'$fdate','$tdate',SUM(tot_pv) AS total_pv from ".$dbprefix."asaleh WHERE  sadate>='$fdate' and sadate<='$tdate' and sa_type = 'A' and cancel=0 group by mcode ";
	mysql_query($sql) or die(mysql_error());
	
	$sql = " insert into ".$dbprefix."epv  (rcode, mcode, sano,sadate,fdate,tdate,total_pv) ";
	$sql .= "	select '$ro', mcode,sano,sadate,'$fdate','$tdate',SUM(tot_pv) AS total_pv from ".$dbprefix."holdhead WHERE  sadate>='$fdate' and sadate<='$tdate' and sa_type = 'A' and cancel=0 group by mcode ";
	mysql_query($sql) or die(mysql_error());

	//หาคนที่ผ่านคุณสมบัติ
	$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
	$rs = mysql_query($sql);
	//echo "$sql<BR>";
	for($m=0;$m<mysql_num_rows($rs);$m++){
		$sqlObj = mysql_fetch_object($rs);
		$n_mcode[$m] =$sqlObj->mcode;		
		$n_name_t[$m] =$sqlObj->name_t;		
		$n_upa_code[$n_mcode[$m]] = $sqlObj->sp_code;
		$n_lr[$n_mcode[$m]] = $sqlObj->lr;
		//echo "upcode :  $sqlObj->mcode    $sqlObj->upa_code<BR>";
	}
	mysql_free_result($rs);
	
		$sql="select * from ".$dbprefix."epv where rcode = '$ro'  "; 
		//echo "$sql <br>";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj			= mysql_fetch_object($rs);
			$apv_rcode		= $sqlObj->rcode;
			$apv_mcode	= $sqlObj->mcode;
			$apv_total_pv	= $sqlObj->total_pv;	
			//echo "apv : $apv_total_pv = $i<BR> ";
			
			for($j=0;$j<sizeof($n_mcode);$j++){
				//echo "รหัสสมาชิก : $n_mcode[$j] = $apv_mcode<BR>";
				if($n_mcode[$j]<>$apv_mcode){
					//ไม่มี pv
				}else{
					//echo "มีบิลขาย : $up<BR>";
					$up	= $n_mcode[$j];
					$lv	 	= 0;
					$gpv	= 1;
					while($up <> "" ){
						//echo "up : $up<BR>";
						//echo "upa : $upa_code[$up]  $lv  $maxlv<BR>";
						if($n_upa_code[$up] <>"" && $gpv <= 1){
							$lv	= ($lv+1);
								$flag = 0;
								$sum_pv = 0;
								//echo "ผู้แนะนำ  ".$n_upa_code[$up]." ระดับ  $gpv<br>";
								$pos_ncur = getpossition($dbprefix,$n_upa_code[$up]); //ตรวจสอบตำแหน่งผู้ที่มีสิทธิ์รับคอมมิชชั่น
								
								$sql10 = "SELECT mcode,mdate from ".$dbprefix."member WHERE mdate>='$fdate' and mdate<='$tdate' and mcode='$n_mcode[$j]' ";
								//echo  "$sql10<br>";
								$rs10 = mysql_query($sql10);
								$mdate = '';
								$sflg=0;
								if(mysql_num_rows($rs10)>0){
									$mdate = mysql_result($rs10,0,'mdate');
									$sflg=1;
								}

								if($apv_total_pv>20000){
									$apv_total_pv=20000;
								}
								
								if($sflg>0){
									$sql2 = "SELECT * from ".$dbprefix."status WHERE mcode='".$n_upa_code[$up]."' and month_pv='".$month[0].$month[1]."' and status='1' ";
									//echo  "$sql2<br>";
									$rs2=mysql_query($sql2);
									if (mysql_num_rows($rs2)>0) {
										$sql = " insert into ".$dbprefix."ec  (rcode,mcode,sp_code,pv,fdate,tdate) VALUES ";
										$sql .= " ('$ro','$n_mcode[$j]','".$n_upa_code[$up]."','$apv_total_pv','$fdate','$tdate')";
										//echo "$sql <br>";
										mysql_query($sql) or die(mysql_error());
									}
									mysql_free_result($rs2);
								}
								$gpv=($gpv+1);
						}
						$up = $n_upa_code[$up];
					}
				}
			}
		} 
		mysql_free_result($rs);

	//คำนวณตามความสามารถของแต่ละคนจากขาย 3%
	$sql = "SELECT sum(total_pv) as total_pv from ".$dbprefix."epv WHERE rcode='$ro' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$total_pv = mysql_result($rs,0,'total_pv');
		$per3=($total_pv*3/100);
	}
	mysql_free_result($rs);

	//ตรวจสอบคนที่มีรายได้มากกว่าเท่ากับ 50,000 PV
	$sql="select sp_code,sum(pv) as tot_pv from ".$dbprefix."ec where rcode = '$ro' group by sp_code  "; 
	//echo "$sql <br>";
	$rs = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlObj			= mysql_fetch_object($rs);
		$t_sp_code	= $sqlObj->sp_code;
		$tot_pv		= $sqlObj->tot_pv;

		if($tot_pv>=50000){
			$sql = " insert into ".$dbprefix."ed  (rcode,mcode,pv,fdate) VALUES ";
			$sql .= " ('$ro','$t_sp_code','".$tot_pv."','$fdate')";
			//echo "$sql <br>";
			mysql_query($sql) or die(mysql_error());
		}
	}
	mysql_free_result($rs);
	//หายอดรวมเพิ่มหารยอด 3%
	$sql="select sum(pv) as p_tot_pv from ".$dbprefix."ed where rcode = '$ro'  "; 
	//echo "$sql <br>";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$p_tot_pv = mysql_result($rs,0,'p_tot_pv');
		//หา % เพิ่มหารายได้แต่ละคน
		echo "$per3     $p_tot_pv  <br>";
		if($p_tot_pv>0){
			$pershare=($per3/$p_tot_pv);
		}
	}
	mysql_free_result($rs);
	
	$sql="select * from ".$dbprefix."ed where rcode = '$ro'  "; 
	//echo "$sql <br>";
	$rs = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlObj			= mysql_fetch_object($rs);
		$em_mcode	= $sqlObj->mcode;
		$em_pv		= $sqlObj->pv;

		$sql = " insert into ".$dbprefix."em  (rcode,mcode,pv,pershare,total,fdate,tdate,pv_world,pools) VALUES ";
		$sql .= " ('$ro','$em_mcode','".$em_pv."','$pershare','".($em_pv*$pershare)."','$fdate','$tdate','$total_pv','$per3')";
		//echo "$sql <br>";
		mysql_query($sql) or die(mysql_error());
	}
	mysql_free_result($rs);

		$sql = " insert into ".$dbprefix."embonus  (rcode, mcode, total,tax,bonus,fdate,tdate) ";
		$sql .= "select '$ro',mcode,sum(total) as total,(sum(total)*0.03) as tax,(sum(total)-(sum(total)*0.03)) as bonus,'$fdate','$tdate' from ".$dbprefix."em group by mcode";
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
 
 
?>