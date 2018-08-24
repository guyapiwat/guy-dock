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
//echo 'รอการตรวจสอบ';
//exit;
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
				$sql = "SELECT * ";
				$sql .= " FROM ".$dbprefix."around a WHERE  calc = 1 order by rid DESC limit 0,1";
				$rs2=mysql_query($sql);
				if (mysql_num_rows($rs2)>0) {
					$sqlObj2 = mysql_fetch_object($rs2);
					$chktdate= $sqlObj2->tdate;
					mysql_free_result($rs2);
				}

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
					if($chktdate < $tdate){
						//echo '<font color="#ff0000" size=5>ต้องคำนวนรอบรายวันให้ครบเดือนก่อนถึงคำนวนรายเดือนได้ครับ  <br /></font>';
						//exit;
					}
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

								
					///////////////////////////////////////////////////////////////////
					/////////////////////// Delete ////////////////////////////////////

					//del_cals($dbprefix,$ro,array('apv','ac','ambonus')); // fast
					//del_cals($dbprefix,$ro,array('bm','bmbonus','bmbonus1'));		 /// w/s
					//del_cals($dbprefix,$ro,array('dc','dc1','dm','dpv','dmbonus','dmbonus1')); // matching
					del_cals($dbprefix,$ro,array('em','epv','embonus'));  // pool
					del_cals($dbprefix,$ro,array('fpv','fc','fm','fmbonus')); // boss,stockiest
					del_cals($dbprefix,$ro,array('cmbonus_b')); // status
					//del_cals($dbprefix,$ro,array('calc_poschange2')); /// position


					/////////////////////// Delete ////////////////////////////////////
					///////////////////////////////////////////////////////////////////
		
					//    2. เลือกบิลขายทั้งหมดในรอบนี้
					//       2.1 สำหรับแต่ละบิลขาย เก็บไว้ในตาราง Total PV
					echo "            2. สำหรับบิลของ sMC ทุกคนใน asaleh ในรอบ $ro นี้<BR>";
					//-=- update21082008 
					//$cnt =0;
					//unset($mcode_chk);

					$month=explode("-",$fdate);
						if($month[1] == 1){
						  $month_1 = $month[0]-1;
						  $month_2 = '12';
										$mdate = $month_1.$month_2;

						}else if($month[1] <= 10){
						  $month_1 = $month[0];
						  $month_2 = $month[1]-1;
						  $month_2 = '0'.$month_2;
										$mdate = $month_1.$month_2;

						}else{
							$month_1 = $month[0];
							$month_2 = $month[1]-1;
							//$month_2 = '0'.$month_2;
							$mdate = $month_1.$month_2;

						}

				
					///$sql = "UPDATE ".$dbprefix."member SET pos_cur2='' ";
					//mysql_query($sql);
					//fnc_calc_set_position2($dbprefix,$ro,$p_mcode,$p_name_t,$p_pos_cur,$p_sp_code,$p_lr,$fdate,$tdate,$fpdate,$ftdate);
					calc_pool_bunus($dbprefix,$ro,$tdate,$fdate);	
					fnc_calc_invent($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate);
					fnc_calc_packfile($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate,$fmcode,$paydate,$cstatus);
					
					//$update_matching = "update ".$dbprefix."dmbonus set adjust = '1' where rcode = '$ro'";
					//mysql_query($update_matching);

			//exit;
				//ปรับ calc ของ bround ให้เป็น '1'
				$sql="update ".$dbprefix."bround set calc='1',calc_date = '".date("Y-m-d H:i:s")."' where rcode='$ro' ";
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

function fnc_calc_set_position2($dbprefix,$ro,$mcode,$name_t,$pos_cur,$sp_code,$lr,$fdate,$tdate){
	$fdate1=explode("-",$fdate);
	$lastmonth = $fdate1[0].'-'.$fdate1[1];
	$lastmonth1 = $fdate1[0].$fdate1[1];
	
	$sql="SELECT mcode,mdate,name_t,pos_cur1,pos_cur2,sp_code,lr FROM ".$dbprefix."member WHERE ( pos_cur1 = 'GS' or pos_cur2 = 'JA'  or pos_cur2 = 'PL'  or pos_cur2 = 'SP'  or pos_cur2 = 'RB' or pos_cur2 = 'EM' or pos_cur2 = 'D' or pos_cur2 = 'DD' or pos_cur2 = 'TD' ) ORDER BY lr ASC";
	$rs = mysql_query($sql);
	//echo "$sql<BR>";
	$mcode = "";
	for($m=0;$m<@mysql_num_rows($rs);$m++){
		$sqlObj = mysql_fetch_object($rs);
		$mcode[$m] =$sqlObj->mcode;		
		$mdate[$mcode[$m]] =$sqlObj->mdate;		
		$name_t[$m] =$sqlObj->name_t;
		$pos_cur1[$m] =$sqlObj->pos_cur1;
		$pos_cur2[$m] =$sqlObj->pos_cur2;
		$sp_code[$mcode[$m]] = $sqlObj->sp_code;
		//echo $mcode[$m].' '.$pos_cur[$m].'<br>';
		$lr[$mcode[$m]] = $sqlObj->lr;
	}
	mysql_free_result($rs);
	$pos_piority = array('TD'=>8,'DD'=>7,'D'=>6,'EM'=>5,'RB'=>4,'SP'=>3,'PL'=>2,'JA'=>1,'GS'=>0);
	for($p=0;$p<1;$p++){
		$mpvmpv = 0;
		for($j=0;$j<sizeof($mcode);$j++){ 
				$cnt_l=0;
				$cnt_r=0;
				$cnt_c=0;
				$flg=false;
				$flg1 = false;
				//-----เก็บตำแหน่งปัจจุบัน
				$sql = "SELECT pos_cur1,pos_cur2 from ".$dbprefix."member WHERE mcode='".$mcode[$j]."'  ";
				$rs = mysql_query($sql);
				$pos_old = '';
				if(mysql_num_rows($rs)>0){
					$pos_old1 = mysql_result($rs,0,'pos_cur1');
					$pos_old2 = mysql_result($rs,0,'pos_cur2');
				}
				mysql_free_result($rs); 
				      // PL                       // GS
				if($pos_piority[$pos_old2]>$pos_piority[$pos_old1]) {
					$pos_old = $pos_old2 ; // PL
				}else {// GS   //GS
					$pos_old =  $pos_old1;
				}
				//คำนวณตำแหน่ง
				$pos_new = $pos_old;
				$weakstrong = getweakstrong($dbprefix,$mcode1[$j],$fdate,$tdate,$ro);				
				if($weakstrong >= 350000){
					$pos_new="RB";$flg=true;$flg1=true;
				}elseif($weakstrong >= 200000){
					$pos_new="SP";$flg=true;$flg1=true;
				}elseif($weakstrong >= 150000){
					$pos_new="PL";$flg=true;$flg1=true;
				}elseif($weakstrong >= 50000){
					$pos_new="JA";$flg=true;$flg1=true;
				}

				if($flg1==true&&$flg==true){					                  
					if($pos_new != $pos_old and $pos_piority[$pos_new]>$pos_piority[$pos_old] ){
						//echo "รหัส ".$mcode[$j]."'ตำแหน่งเก่า='".$pos_old."'ตำแห่นงใหม่='".$pos_new."   PVส่วนตัว=".$mexp."<br>";
						$sql = "UPDATE ".$dbprefix."member SET pos_cur2='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
						$sql = "INSERT INTO ".$dbprefix."calc_poschange2 (rcode,mcode,pos_before,pos_after,date_change,type) ";
						$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$fdate."','3')";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						$pos_cur[$j] = $pos_new;
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
					}
				}
				
		////////////////////////////////////////////////process RB///////////////////////////////////////////////////
		switch ($pos_cur2[$j]){
					case 'RB':
						$cnt_l=0;
						$cnt_r=0;
						$cnt_c=0;
						$flg=false;
						$flgpv=false;
						$flg1 = false;
						$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
						mysql_query($sql);

						$sql1="SELECT * FROM ".$dbprefix."member WHERE sp_code='".$mcode[$j]."' ";
						//echo "2 : $sql1<BR>";
						$rs1 = mysql_query($sql1);
						for($n=0;$n<mysql_num_rows($rs1);$n++){
							$sqlObj1 = mysql_fetch_object($rs1);
							$n_sp_code =$sqlObj1->mcode;
							$n_sp_pos_cur =$sqlObj1->pos_cur2; ///*****************
							
							$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
							//echo "3 : $sql2<BR>";
							$rs2 = mysql_query($sql2);
							for($i=0;$i<mysql_num_rows($rs2);$i++){
								$sqlObj2 = mysql_fetch_object($rs2);
								$up_mcode =$sqlObj2->upa_code;
								$uplr=$sqlObj2->lr;
								$up=$up_mcode;
								while($up <> ""){
									if($up==$mcode[$j]){
										$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
										$sql .= "(".$ro.",'$n_sp_code','$mcode[$j]','".$uplr."','$n_sp_pos_cur') ";
										mysql_query($sql);
										//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
										$up="";
									}else{
										$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
										$rs3 = mysql_query($sql3);
										if($row3 = mysql_fetch_object($rs3)){
											$up = $row3->upa_code;
											$uplr=$row3->lr;
										} else {
											$up = "";
										}
										mysql_free_result($rs3);
									}
								}
							}
							mysql_free_result($rs2);

						}
						mysql_free_result($rs1);

						$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
						$rs = mysql_query($sql);
						for($n=0;$n<mysql_num_rows($rs);$n++){
							$row = mysql_fetch_object($rs);
							$p_mcode=$row->mcode;
							$p_pos_cur=$row->pos_cur;
							$p_lr=$row->lr;
							switch ($p_pos_cur){
								case 'RB':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								case 'EM':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								case 'D':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								case 'DD':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								case 'TD':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								default:
									break;
							}
							
						}
						mysql_free_result($rs);
						if($cnt_l>=1&&$cnt_c>=1){
							$flg=true;
						}elseif($cnt_l>=1&&$cnt_r>=1){
							$flg=true;
						}elseif($cnt_c>=1&&$cnt_r>=1){
							$flg=true;
						}
						if($flg==true){
							$pos_new="EM";
							$pos_old=$pos_cur2[$j];
							$sql = "UPDATE ".$dbprefix."member SET pos_cur2='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
							//====================LOG===========================
							$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
							//writelogfile($text);
							//=================END LOG===========================
							mysql_query($sql);
							$sql = "INSERT INTO ".$dbprefix."calc_poschange2 (rcode,mcode,pos_before,pos_after,date_change,type) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$fdate."','3')";
							//====================LOG===========================
							$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
							//writelogfile($text);
							//=================END LOG===========================
							mysql_query($sql);
							$pos_cur2[$j] = $pos_new;
						}

				case 'EM':
						$cnt_l=0;
						$cnt_r=0;
						$cnt_c=0;
						$flg=false;
						$flgpv=false;
						$flg1 = false;
						$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
						mysql_query($sql);

						$sql1="SELECT * FROM ".$dbprefix."member WHERE sp_code='".$mcode[$j]."' ";
						//echo "2 : $sql1<BR>";
						$rs1 = mysql_query($sql1);
						for($n=0;$n<mysql_num_rows($rs1);$n++){
							$sqlObj1 = mysql_fetch_object($rs1);
							$n_sp_code =$sqlObj1->mcode;
							$n_sp_pos_cur =$sqlObj1->pos_cur2; ///*****************
							
							$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
							//echo "3 : $sql2<BR>";
							$rs2 = mysql_query($sql2);
							for($i=0;$i<mysql_num_rows($rs2);$i++){
								$sqlObj2 = mysql_fetch_object($rs2);
								$up_mcode =$sqlObj2->upa_code;
								$uplr=$sqlObj2->lr;
								$up=$up_mcode;
								while($up <> ""){
									if($up==$mcode[$j]){
										$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
										$sql .= "(".$ro.",'$n_sp_code','$mcode[$j]','".$uplr."','$n_sp_pos_cur') ";
										mysql_query($sql);
										//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
										$up="";
									}else{
										$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
										$rs3 = mysql_query($sql3);
										if($row3 = mysql_fetch_object($rs3)){
											$up = $row3->upa_code;
											$uplr=$row3->lr;
										} else {
											$up = "";
										}
										mysql_free_result($rs3);
									}
								}
							}
							mysql_free_result($rs2);

						}
						mysql_free_result($rs1);

						$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
						$rs = mysql_query($sql);
						for($n=0;$n<mysql_num_rows($rs);$n++){
							$row = mysql_fetch_object($rs);
							$p_mcode=$row->mcode;
							$p_pos_cur=$row->pos_cur;
							$p_lr=$row->lr;
							switch ($p_pos_cur){
								case 'EM':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								case 'D':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								case 'DD':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								case 'TD':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								default:
									break;
							}
							
						}
						mysql_free_result($rs);
						if($cnt_l>=1&&$cnt_c>=1){
							$flg=true;
						}elseif($cnt_l>=1&&$cnt_r>=1){
							$flg=true;
						}elseif($cnt_c>=1&&$cnt_r>=1){
							$flg=true;
						}
						if($flg==true){
							$pos_new="D";
							$pos_old=$pos_cur2[$j];
							$sql = "UPDATE ".$dbprefix."member SET pos_cur2='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
							//====================LOG===========================
							$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
							//writelogfile($text);
							//=================END LOG===========================
							mysql_query($sql);
							$sql = "INSERT INTO ".$dbprefix."calc_poschange2 (rcode,mcode,pos_before,pos_after,date_change,type) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$fdate."','3')";
							//====================LOG===========================
							$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
							//writelogfile($text);
							//=================END LOG===========================
							mysql_query($sql);
							$pos_cur2[$j] = $pos_new;
						}
				case 'D':
						$cnt_l=0;
						$cnt_r=0;
						$cnt_c=0;
						$flg=false;
						$flgpv=false;
						$flg1 = false;
						$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
						mysql_query($sql);

						$sql1="SELECT * FROM ".$dbprefix."member WHERE sp_code='".$mcode[$j]."' ";
						//echo "2 : $sql1<BR>";
						$rs1 = mysql_query($sql1);
						for($n=0;$n<mysql_num_rows($rs1);$n++){
							$sqlObj1 = mysql_fetch_object($rs1);
							$n_sp_code =$sqlObj1->mcode;
							$n_sp_pos_cur =$sqlObj1->pos_cur2; ///*****************
							
							$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
							//echo "3 : $sql2<BR>";
							$rs2 = mysql_query($sql2);
							for($i=0;$i<mysql_num_rows($rs2);$i++){
								$sqlObj2 = mysql_fetch_object($rs2);
								$up_mcode =$sqlObj2->upa_code;
								$uplr=$sqlObj2->lr;
								$up=$up_mcode;
								while($up <> ""){
									if($up==$mcode[$j]){
										$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
										$sql .= "(".$ro.",'$n_sp_code','$mcode[$j]','".$uplr."','$n_sp_pos_cur') ";
										mysql_query($sql);
										//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
										$up="";
									}else{
										$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
										$rs3 = mysql_query($sql3);
										if($row3 = mysql_fetch_object($rs3)){
											$up = $row3->upa_code;
											$uplr=$row3->lr;
										} else {
											$up = "";
										}
										mysql_free_result($rs3);
									}
								}
							}
							mysql_free_result($rs2);

						}
						mysql_free_result($rs1);

						$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
						$rs = mysql_query($sql);
						for($n=0;$n<mysql_num_rows($rs);$n++){
							$row = mysql_fetch_object($rs);
							$p_mcode=$row->mcode;
							$p_pos_cur=$row->pos_cur;
							$p_lr=$row->lr;
							switch ($p_pos_cur){
								case 'D':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								case 'DD':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								case 'TD':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								default:
									break;
							}
							
						}
						mysql_free_result($rs);
						if($cnt_l>=1&&$cnt_c>=1){
							$flg=true;
						}elseif($cnt_l>=1&&$cnt_r>=1){
							$flg=true;
						}elseif($cnt_c>=1&&$cnt_r>=1){
							$flg=true;
						}
						if($flg==true){
							$pos_new="DD";
							$pos_old=$pos_cur2[$j];
							$sql = "UPDATE ".$dbprefix."member SET pos_cur2='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
							//====================LOG===========================
							$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
							//writelogfile($text);
							//=================END LOG===========================
							mysql_query($sql);
							$sql = "INSERT INTO ".$dbprefix."calc_poschange2 (rcode,mcode,pos_before,pos_after,date_change,type) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$fdate."','3')";
							//====================LOG===========================
							$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
							//writelogfile($text);
							//=================END LOG===========================
							mysql_query($sql);
							$pos_cur2[$j] = $pos_new;
						}
				case 'DD':
						$cnt_l=0;
						$cnt_r=0;
						$cnt_c=0;
						$flg=false;
						$flgpv=false;
						$flg1 = false;
						$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
						mysql_query($sql);

						$sql1="SELECT * FROM ".$dbprefix."member WHERE sp_code='".$mcode[$j]."' ";
						//echo "2 : $sql1<BR>";
						$rs1 = mysql_query($sql1);
						for($n=0;$n<mysql_num_rows($rs1);$n++){
							$sqlObj1 = mysql_fetch_object($rs1);
							$n_sp_code =$sqlObj1->mcode;
							$n_sp_pos_cur =$sqlObj1->pos_cur2; ///*****************
							
							$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
							//echo "3 : $sql2<BR>";
							$rs2 = mysql_query($sql2);
							for($i=0;$i<mysql_num_rows($rs2);$i++){
								$sqlObj2 = mysql_fetch_object($rs2);
								$up_mcode =$sqlObj2->upa_code;
								$uplr=$sqlObj2->lr;
								$up=$up_mcode;
								while($up <> ""){
									if($up==$mcode[$j]){
										$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
										$sql .= "(".$ro.",'$n_sp_code','$mcode[$j]','".$uplr."','$n_sp_pos_cur') ";
										mysql_query($sql);
										//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
										$up="";
									}else{
										$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
										$rs3 = mysql_query($sql3);
										if($row3 = mysql_fetch_object($rs3)){
											$up = $row3->upa_code;
											$uplr=$row3->lr;
										} else {
											$up = "";
										}
										mysql_free_result($rs3);
									}
								}
							}
							mysql_free_result($rs2);

						}
						mysql_free_result($rs1);

						$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
						$rs = mysql_query($sql);
						for($n=0;$n<mysql_num_rows($rs);$n++){
							$row = mysql_fetch_object($rs);
							$p_mcode=$row->mcode;
							$p_pos_cur=$row->pos_cur;
							$p_lr=$row->lr;
							switch ($p_pos_cur){
								case 'DD':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								case 'TD':
										if($p_lr==1){
											$cnt_l=($cnt_l+1);
										}elseif($p_lr==2){
											$cnt_c=($cnt_c+1);
										}elseif($p_lr==3){
											$cnt_r=($cnt_r+1);
										}
									break;
								default:
									break;
							}
							
						}
						mysql_free_result($rs);
						if($cnt_l>=1&&$cnt_c>=1){
							$flg=true;
						}elseif($cnt_l>=1&&$cnt_r>=1){
							$flg=true;
						}elseif($cnt_c>=1&&$cnt_r>=1){
							$flg=true;
						}
						if($flg==true){
							$pos_new="TD";
							$pos_old=$pos_cur2[$j];
							$sql = "UPDATE ".$dbprefix."member SET pos_cur2='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
							//====================LOG===========================
							$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
							//writelogfile($text);
							//=================END LOG===========================
							mysql_query($sql);
							$sql = "INSERT INTO ".$dbprefix."calc_poschange2 (rcode,mcode,pos_before,pos_after,date_change,type) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$fdate."','3')";
							//====================LOG===========================
							$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
							//writelogfile($text);
							//=================END LOG===========================
							mysql_query($sql);
							$pos_cur2[$j] = $pos_new;
						}
					default:
				}

		}
	}
}
function fnc_calc_packfile($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate,$fmcode,$paydate,$cstatus){
	$cpaydate = explode('-',$paydate); 
	$whereclass = " AND fdate>= '$fdate' and tdate<= '$tdate' ";	
	$sql = "SELECT m.mcode,m.locationbase,m.name_t,m.status_suspend,m.status_terminate,m.mtype,m.mvat,m.pos_cur,m.sp_code,m.cmp,m.status,m.cmp2,m.cmp3,m.acc_no,m.name_f as title,m.id_tax,m.id_card 
	from ".$dbprefix."member m ";
	$sql .= "where m.pos_cur <> 'MB'  and m.status_terminate <> '1'  ";
	$rs1 = mysql_query($sql);	
	$monthmonth  = explode("-",$strtdate);
	$name_t = array();
	$name_f = array();
	$id_card = array();
	$id_tax = array();
	if(mysql_num_rows($rs1) > 0){
		for($j=0;$j<mysql_num_rows($rs1);$j++){
			$sqlObj1 = mysql_fetch_object($rs1);
			$mcode[$j] =$sqlObj1->mcode;	
			$com_transfer_chagre = 30;
			$totalamt1[$j] = 0;
			$totalamt[$j] = 0;
			$mtype[$j] = $sqlObj1->mtype;
			$mvat[$j] = $sqlObj1->mvat;
			$totalamt[$j] = 0; 
			$locationbase[$j] = $sqlObj1->locationbase;
			
			$totalamt[$j] = get_all_sum($dbprefix,$mcode[$j],$fdate,$tdate);
			$totalamt1[$j] = get_all_sum($dbprefix,$mcode[$j],$fdate,$tdate);
		
			$allplan[$j] = $totalamt1[$j];
			$totalamt[$j] = $totalamt1[$j];
			$totalamt1[$j] = $totalamt1[$j]; 
  			$status_suspend[$j] = $sqlObj1->status_suspend;
 			$name_t[$j] = $sqlObj1->name_t;
			$name_f[$j] = $sqlObj1->title;
			$id_card[$j] = $sqlObj1->id_card;
			$id_tax[$j] = $sqlObj1->id_tax;
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
			$total12 = $totaly = backallpv($dbprefix,$mcode[$j],$ro,$paydate);
			$exp_date[$j] =$sqlObj1->exp_date;
			$mem_cntday[$j]=dateDiff($paydate, $exp_date[$j]);
			//$totalamt =$sqlObj->totalamt;
			$totalamt1[$j] =  $moneyb[$j]+$totalamt[$j];
 
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
					$tax[$j] = $totalamt1[$j]*0.05;
					//if($mvat[$j] == '1')$vat[$j] = $totalamt1[$j]*0.07;
					
				}else{
					$tax[$j] = $totalamt1[$j]*0.05;
				}

				$sql2 = "SELECT sum(tot_pv) as totalpv from ".$dbprefix."asaleh WHERE mcode='".$mcode[$j]."' and cancel = 0 and  sadate >= '$fdate' and sadate <= '$tdate' and (sa_type='Q' or sa_type='A' or sa_type='C') group by mcode ";
				//echo $sql2.'<br>';
				//exit;
				$rs2=mysql_query($sql2);
				$totalpv = 0;
				if(mysql_num_rows($rs2)>0){
					$totalpv = mysql_result($rs2,0,"totalpv");
				}
				$sql2 = "SELECT sum(tot_pv) as totalpv from ".$dbprefix."holdhead WHERE mcode='".$mcode[$j]."' and cancel = 0 and  sadate >= '$fdate' and sadate <= '$tdate' and (sa_type='Q' or sa_type='A' or sa_type='C') group by mcode ";
				
				//exit;
				$rs2=mysql_query($sql2);
				//$totalpv = 0;
				if(mysql_num_rows($rs2)>0){
					$totalpv = $totalpv + mysql_result($rs2,0,"totalpv");
				}
				

						
			//echo " $totalamt[$j] :: $mcode[$j] :: $totalpv <br> ";
				if($totalpv>=0  or $mcode[$j] == '0000001' or $mcode[$j] == '0000002' or $mcode[$j] == '0000003'){
					if($totalamt1[$j] > 0){
						//if($totalpv>= 250 and $cmp[$j] == 'ครบ' and $cmp2[$j] == 'ครบ'  and  $cmp3[$j] == 'ครบ'  and !empty($acc_no[$j]) and $mem_cntday[$j] > -90 and $status_suspend[$j] <> '1'  ){
						if($cmp[$j] == 'ครบ' and $cmp2[$j] == 'ครบ'  and  $cmp3[$j] == 'ครบ'  and !empty($acc_no[$j]) and $status_suspend[$j] <> '1'  ){
							if($totalpv>= 0 ){
								if($totalamt1[$j] >= 1){
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
									/*if($mcode[$j] == '0000001'){
										echo $mcode[$j].' : '.$totalamt1[$j].' : '.$pos_piority[$pos_cur2[$j]].' : '.$pos_cur2[$j].' : <br>';
										exit;
									}*/
									if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
									if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
									if($cmp3[$j] == 'ครบ')$c_note5 = 1;else $c_note5 = "";
									if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
										//pvh ยอดยกไป
									//pv ยอดยกมา
									//pvb ยอดเดือนนี้
									$sql = "INSERT INTO ".$dbprefix."cmbonus_b (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,name_f,name_t,id_card,id_tax,vip,bankcode,acc_name,fdate,tdate) ";
									$sql .= "VALUES('$ro','".$mcode[$j]."','1','".$moneyb[$j]."','".$totalamt[$j]."','0','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','".$totalamt1[$j]."','".$total12."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre','".$name_f[$j]."','".$name_t[$j]."','".$id_card[$j]."','".$id_tax[$j]."','".$mtype2[$j]."','".$bankcode[$j]."','".$acc_name[$j]."','$fdate','$tdate')";
										
									

								}else{
									$btotal = $total12;
									$tax[$j] = 0;$vat[$j] = 0;
								if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
								if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
								if($cmp3[$j] == 'ครบ')$c_note5 = 1;else $c_note5 = "";
								if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
								if($mem_cntday[$j] <= -90){
									$c_note4 = 1;
									//mysql_query("update ".$dbprefix."member set status = '1' where mcode = '".$mcode[$j]."'");
								}else $c_note4 = "";
								$sql = "INSERT INTO ".$dbprefix."cmbonus_b (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,c_note5,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,name_f,name_t,id_card,id_tax,vip,bankcode,acc_name,fdate,tdate) ";
									$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$moneyb[$j]."','0','".$totalamt1[$j]."','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','0','".$btotal."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$c_note1."','".$c_note2."','".$c_note3."','".$c_note4."','".$c_note5."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre','".$name_f[$j]."','".$name_t[$j]."','".$id_card[$j]."','".$id_tax[$j]."','".$mtype2[$j]."','".$bankcode[$j]."','".$acc_name[$j]."','$fdate','$tdate')";
								}
								//if($mcode[$j] == '0000420')echo $sql.'<br>';
								//echo $sql.'<br>';
								mysql_query($sql);
							}else{
								
								$totalamt1[$j] = backmonthpv2($dbprefix,$mcode[$j],$ro);
									$total12 = $total12+$totalamt1[$j];
									$btotal = $moneyb[$j];

								if($moneyb[$j] >= 300 and $cstatus == 0){

									$totalamt1[$j] = $moneyb[$j];
									$tax[$j] = 0;$vat[$j] = 0;
									if($mtype[$j] == '1'){
										$tax[$j] = $totalamt1[$j]*0.03;
										if($mvat[$j] == '1')$vat[$j] = $totalamt1[$j]*0.07;
									}else{
										if($total1 >= 200000)$tax[$j] = $totalamt1[$j]*0.05;
										else if($total1+$totalamt1[$j] >= 200000)$tax[$j] = ($total1+$totalamt1[$j]-200000)*0.05;
										else $tax[$j] = 0;
									}

									if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
									if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
									if($cmp3[$j] == 'ครบ')$c_note5 = 1;else $c_note5 = "";
									if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";

									$total12 = backmonthpv3($dbprefix,$mcode[$j],$ro,$tdate)+$totalamt1[$j];
									if($mtype[$j] == '1'){
										//$totalamt[$j] = $totalamt[$j]+$vat[$j]-$tax[$j];
										$totalamt[$j] = $totalamt[$j];
										$totalamt1[$j] = $totalamt1[$j]+$vat[$j]-$tax[$j];
										$btotal = $totalamt[$j];
									}else{
										$totalamt[$j] = $totalamt[$j];
										//echo $mcode[$j].':'.$totalamt1[$j].':'.$tax[$j].'<br>';
										$totalamt1[$j] = $totalamt1[$j]-$tax[$j];
										$btotal = $totalamt[$j];
										//echo $mcode[$j].':'.$totalamt1[$j].':'.$tax[$j].'<br>';
									}
									

									

									//pvh ยอดยกไป
									//pv ยอดยกมา
									//pvb ยอดเดือนนี้
									$sql = "INSERT INTO ".$dbprefix."cmbonus_b (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,name_f,name_t,id_card,id_tax,vip,bankcode,acc_name,fdate,tdate) ";
									$sql .= "VALUES('$ro','".$mcode[$j]."','1','".$moneyb[$j]."','".$totalamt[$j]."','".$btotal."','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','".$totalamt1[$j]."','".$total12."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre','".$name_f[$j]."','".$name_t[$j]."','".$id_card[$j]."','".$id_tax[$j].",'".$mtype2[$j]."','".$bankcode[$j]."','".$acc_name[$j]."','$fdate','$tdate')";
									mysql_query($sql);
												

								}else{
									
									$tax[$j] = 0;$vat[$j] = 0;
									$totalamt1[$j] = $totalamt[$j]+$moneyb[$j];
									$btotal = backmonthpv3($dbprefix,$mcode[$j],$ro,$tdate);
								if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
								if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
								if($cmp3[$j] == 'ครบ')$c_note5 = 1;else $c_note5 = "";
								if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
								
								$c_note4 = "";
								$sql = "INSERT INTO ".$dbprefix."cmbonus_b (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,c_note5,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,name_f,name_t,id_card,id_tax,vip,bankcode,acc_name,fdate,tdate) ";
									$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$moneyb[$j]."','".$totalamt[$j]."','".$totalamt1[$j]."','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','0','".$btotal."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$c_note1."','".$c_note2."','".$c_note3."','".$c_note4."','".$c_note5."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre','".$name_f[$j]."','".$name_t[$j]."','".$id_card[$j]."','".$id_tax[$j]."','".$mtype2[$j]."','".$bankcode[$j]."','".$acc_name[$j]."','$fdate','$tdate')";
									mysql_query($sql);
								}
								
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
							
							$btotal = backmonthpv3($dbprefix,$mcode[$j],$ro,$tdate);

							
							$c_note4 = "";

							$sql = "INSERT INTO ".$dbprefix."cmbonus_b (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,c_note5,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,name_f,name_t,id_card,id_tax,vip,bankcode,acc_name,fdate,tdate) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$moneyb[$j]."','0','".$totalamt1[$j]."','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','0','".$btotal."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$c_note1."','".$c_note2."','".$c_note3."','".$c_note4."','".$c_note5."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre','".$name_f[$j]."','".$name_t[$j]."','".$id_card[$j]."','".$id_tax[$j]."','".$mtype2[$j]."','".$bankcode[$j]."','".$acc_name[$j]."','$fdate','$tdate')";
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


function get_all_sum($dbprefix,$mcode,$fdate,$tdate){
		$whereclass1 = " and fdate>= '$fdate' and tdate<= '$tdate' ";
		$whereclass = " and fdate>= '$fdate' and tdate<= '$tdate' ";
		//$whereclass = "  rcode = '$ro' ";
		
		$sql = "SELECT ifnull(sum(total),0) as totalamt from ".$dbprefix."dmbonus  where mcode = '".$mcode."' and total > 0 ".$whereclass."   ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				for($gg=0;$gg<mysql_num_rows($rs);$gg++){
					$sqlObj = mysql_fetch_object($rs);
					$pland =$sqlObj->totalamt;
				}
				mysql_free_result($rs);
			}	

		$sql = "SELECT ifnull(sum(total),0) as totalamt from ".$dbprefix."fmbonus  where mcode = '".$mcode."' and total > 0 ".$whereclass."  ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				for($gg=0;$gg<mysql_num_rows($rs);$gg++){
					$sqlObj = mysql_fetch_object($rs);
					$plana =$sqlObj->totalamt;
				}
				mysql_free_result($rs);
			}		

			$sql = "SELECT ifnull(sum(total),0) as totalamt from ".$dbprefix."embonus  where mcode = '".$mcode."' and total > 0 ".$whereclass."   ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0){
				for($gg=0;$gg<mysql_num_rows($rs);$gg++){
					$sqlObj = mysql_fetch_object($rs);
					$planb =$sqlObj->totalamt;
				}
				mysql_free_result($rs);
			}	
			
		 

			 
	$allplan = $plana+$planb+$planc+$pland+$plane+$planf; 	
	return $allplan;
}
function backmonthpv3($dbprefix,$mcode,$ro,$paydate){
	$chkdate = explode('-',$tdate);
	$chkdate1 = $chkdate[0];
	$sql2 = "select totaly as total_y from ".$dbprefix."cmbonus_b WHERE  mcode='$mcode' and paydate like '%".$chkdate1."%'   and rcode <= $ro order by rcode desc limit 0,1 ";
	//if($mcode[$j] == '0000007')
	if($mcode == '0000007')
	{
		//echo $sql2.'<br>';
		//exit;
	}
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

function fnc_calc_star_maker($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){
	$fpdate=explode("-",$fpdate);
	$lastmonth = $fpdate[0].'-'.$fpdate[1];
	$lastmonth1 = $fpdate[0].$fpdate[1];
	$month=explode("-",$fdate);
	$thismonth = $month[0].'-'.$month[1];
	$sql="SELECT * FROM ".$dbprefix."member where 1=1  ORDER BY lr ASC";
	$rs = mysql_query($sql);
	//echo "$sql<BR>";
	$mcode = "";
	for($m=0;$m<mysql_num_rows($rs);$m++){
		$sqlObj = mysql_fetch_object($rs);
		$mcode[$m] =$sqlObj->mcode;		
		$name_t[$m] =$sqlObj->name_t;
		$pos_cur1[$m] =$sqlObj->pos_cur1;
		$pos_cur2[$mcode[$m]] =$sqlObj->pos_cur1;
		if($pos_cur1[$m] == 'S')$pos_cur1[$m] = '';
		$pos_date[$m] = "";

		$rs123=mysql_query("select * from ".$dbprefix."bmbonus where mcode='".$mcode[$m]."' and tdate = '$tdate'");
		if(mysql_num_rows($rs123) > 0){
			$pos_cur[$mcode[$m]] = mysql_result($rs123,0,'mpos');
			//$pos_cur1[$m] =mysql_result($rs123,0,'mpos');
		}
		//$pos_cur[$mcode[$m]] =$sqlObj->pos_cur;
		$sp_code[$mcode[$m]] = $sqlObj->sp_code;
		$lr[$mcode[$m]] = $sqlObj->lr;
	}
	mysql_free_result($rs);
	$pos_piority = array('SM'=>2,'SX'=>1,'SS'=>0);
	$array_bonus = array('SX'=>1800,'SS'=>400);

	/////update star update star update star update star update star update star update star update star update star update star 
	for($p=0;$p<1;$p++){
		$mpvmpv = 0;
		for($j=0;$j<sizeof($mcode);$j++){
			
			if($pos_cur1[$j] == ''){
				$cnt_l=0;$cnt_ll=0;$chkl=0;
				$cnt_r=0;$cnt_rr=0;$chkc=0;
				$cnt_c=0;$cnt_cc=0;
				$chkcntpos= 0;
				$flg=false;
				$flgpv=false;$flg1 = false;
				
				$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
				mysql_query($sql);

				$sql1="SELECT * FROM ".$dbprefix."member WHERE sp_code='".$mcode[$j]."' ";
				//echo "2 : $sql1<BR>";
				$rs1 = mysql_query($sql1);
				for($n=0;$n<mysql_num_rows($rs1);$n++){
					$sqlObj1 = mysql_fetch_object($rs1);
					$n_sp_code =$sqlObj1->mcode;
					//$n_sp_pos_cur =$sqlObj1->pos_cur;
					$rs123=mysql_query("select * from ".$dbprefix."bmbonus where mcode='$n_sp_code' and tdate = '$tdate'");
					if(mysql_num_rows($rs123) > 0)$n_sp_pos_cur = mysql_result($rs123,0,'mpos');
					
					$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
					//echo "3 : $sql2<BR>";
					$rs2 = mysql_query($sql2);
					for($i=0;$i<mysql_num_rows($rs2);$i++){
						$sqlObj2 = mysql_fetch_object($rs2);
						$up_mcode =$sqlObj2->upa_code;
						$uplr=$sqlObj2->lr;
						$up=$up_mcode;
						while($up <> ""){
							if($up==$mcode[$j]){
								$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
								$sql .= "(".$ro.",'$n_sp_code','$mcode[$j]','".$uplr."','$n_sp_pos_cur') ";
								mysql_query($sql);
								//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
								$up="";
							}else{
								$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
								$rs3 = mysql_query($sql3);
								if($row3 = mysql_fetch_object($rs3)){
									$up = $row3->upa_code;
									$uplr=$row3->lr;
								} else {
									$up = "";
								}
								mysql_free_result($rs3);
							}
						}
					}
					mysql_free_result($rs2);

				}
				mysql_free_result($rs1);

				$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
				$rs = mysql_query($sql);
				for($n=0;$n<mysql_num_rows($rs);$n++){
					$row = mysql_fetch_object($rs);
					$p_mcode=$row->mcode;
//					$p_pos_cur=$row->pos_cur;
					$p_pos_cur = "";
					$rs123=mysql_query("select * from ".$dbprefix."bmbonus where mcode='$p_mcode' and tdate = '$tdate'");
					if(mysql_num_rows($rs123) > 0)$p_pos_cur = mysql_result($rs123,0,'mpos');
					$p_lr=$row->lr;
					if($p_pos_cur == 'SU'){
						  if($p_lr==1){
									$cnt_l=($cnt_l+1);
							}elseif($p_lr==2){
									$cnt_c=($cnt_c+1);
							}elseif($p_lr==3){
									$cnt_r=($cnt_r+1);
							}	
					}
					if($p_pos_cur == 'EX'){
						  if($p_lr==1){
									$cnt_ll=($cnt_ll+1);
							}elseif($p_lr==2){
									$cnt_cc=($cnt_cc+1);
							}elseif($p_lr==3){
									$cnt_rr=($cnt_rr+1);
							}	
					}
				}
				mysql_free_result($rs);
				$flg=false;
				$weakstrong = 0;
				$chkl = $cnt_ll+$cnt_l;
				$chkc = $cnt_cc+$cnt_c;
				$pos_old = $pos_cur[$mcode[$j]];
				if($cnt_ll>=1&&$cnt_cc>=1 and $pos_old == 'EX'){
					$flg=true;$pos_new = 'SX';
				}else if($chkl>=1&&$chkc>=1 and $pos_old != 'MB'){
					$flg=true;$pos_new = 'SS';
				}
				
				//echo $mcode[$j].' cnt_ll: '.$cnt_ll.' cnt_l: '.$cnt_l.' cnt_cc: '.$cnt_cc.' cnt_c: '.$cnt_c.'<br>';
				//if($mcode[$j] == '0001006')exit;
				$flg1=true;
				//if($mcode[$j] == '0000081')exit;
				//$cnt_all = $cnt_l+$cnt_r+$cnt_c;
				//if($cnt_all >= 4 )$flg=true;
				
				$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
				$rs = mysql_query($sql);
				
				if($flg1==true&&$flg==true){
					
					$sql = "UPDATE ".$dbprefix."member SET pos_cur1='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
					//====================LOG===========================
					$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
					//writelogfile($text);
					//=================END LOG===========================
					if($pos_cur1[$j] == 'SS' and $pos_new == 'SX')mysql_query($sql);
					if($pos_cur1[$j] == '' )mysql_query($sql);
					$sql = "INSERT INTO ".$dbprefix."calc_poschange1 (rcode,mcode,name_t,pos_before,pos_after,date_change) ";
					$sql .= "VALUES('$ro','".$mcode[$j]."','".$name_t[$j]."','".$pos_old."','".$pos_new."','".$tdate."')";
					//====================LOG===========================
					$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
					//writelogfile($text);
					//=================END LOG===========================
					if($pos_cur1[$j] == 'SS' and $pos_new == 'SX')mysql_query($sql);
					if($pos_cur1[$j] == '' )mysql_query($sql);
					//$pos_cur[$j] = $pos_new;
				}
			}
		}
	}
//exit;
	//exit;
	/////update star update star update star update star update star update star update star update star update star update star 

		$roo = $ro-1;
		$roo1 = $ro-2;
		$sql="select * from ".$dbprefix."calc_poschange1 where (rcode = '$roo' or rcode = '$roo1') and pos_after = 'SS' "; 
		//echo $sql;
		//exit;
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		$mcode = "";
		$mcode = array();
		for($m=0;$m<mysql_num_rows($rs);$m++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode[$m] =$sqlObj->mcode;		
		}

		for($j=0;$j<sizeof($mcode);$j++){
			if($pos_cur2[$mcode[$j]] == 'SS'){
				$cnt_l=0;$cnt_ll=0;$chkl=0;
				$cnt_r=0;$cnt_rr=0;$chkc=0;
				$cnt_c=0;$cnt_cc=0;
				$chkcntpos= 0;
				$flg=false;
				$flgpv=false;$flg1 = false;
				
				$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
				mysql_query($sql);

				$sql1="SELECT * FROM ".$dbprefix."member WHERE sp_code='".$mcode[$j]."' ";
				//echo "2 : $sql1<BR>";
				$rs1 = mysql_query($sql1);
				for($n=0;$n<mysql_num_rows($rs1);$n++){
					$sqlObj1 = mysql_fetch_object($rs1);
					$n_sp_code =$sqlObj1->mcode;
					$n_sp_pos_cur ="";
						$rs123=mysql_query("select * from ".$dbprefix."bmbonus where mcode='$n_sp_code' and tdate = '$tdate'");
						if(mysql_num_rows($rs123) > 0)$n_sp_pos_cur = mysql_result($rs123,0,'mpos');
					
					$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
					//echo "3 : $sql2<BR>";
					$rs2 = mysql_query($sql2);
					for($i=0;$i<mysql_num_rows($rs2);$i++){
						$sqlObj2 = mysql_fetch_object($rs2);
						$up_mcode =$sqlObj2->upa_code;
						$uplr=$sqlObj2->lr;
						$up=$up_mcode;
						while($up <> ""){
							if($up==$mcode[$j]){
								$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
								$sql .= "(".$ro.",'$n_sp_code','$mcode[$j]','".$uplr."','$n_sp_pos_cur') ";
								mysql_query($sql);
								//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
								$up="";
							}else{
								$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
								$rs3 = mysql_query($sql3);
								if($row3 = mysql_fetch_object($rs3)){
									$up = $row3->upa_code;
									$uplr=$row3->lr;
								} else {
									$up = "";
								}
								mysql_free_result($rs3);
							}
						}
					}
					mysql_free_result($rs2);

				}
				mysql_free_result($rs1);

				$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
				$rs = mysql_query($sql);
				for($n=0;$n<mysql_num_rows($rs);$n++){
					$row = mysql_fetch_object($rs);
					$p_mcode=$row->mcode;
					$p_pos_cur=$row->pos_cur;
					$p_lr=$row->lr;
					if($p_pos_cur == 'SU'){
						  if($p_lr==1){
									$cnt_l=($cnt_l+1);
							}elseif($p_lr==2){
									$cnt_c=($cnt_c+1);
							}elseif($p_lr==3){
									$cnt_r=($cnt_r+1);
							}	
					}
					if($p_pos_cur == 'EX'){
						  if($p_lr==1){
									$cnt_ll=($cnt_ll+1);
							}elseif($p_lr==2){
									$cnt_cc=($cnt_cc+1);
							}elseif($p_lr==3){
									$cnt_rr=($cnt_rr+1);
							}	
					}
				}
				mysql_free_result($rs);
				$flg=false;
				$weakstrong = 0;
				$chkl = $cnt_ll+$cnt_l;
				$chkc = $cnt_cc+$cnt_c;
				$pos_old = $pos_cur[$mcode[$j]];
				if($cnt_ll>=1&&$cnt_cc>=1 and $pos_old == 'EX'){
					$flg=true;$pos_new = 'SX';
				}/*else if($chkl>=1&&$chkc>=1 and $pos_old != 'MB'){
					$flg=true;$pos_new = 'SS';
				}*/
				//if($mcode[$j] == '0001006')echo $mcode[$j].' cnt_ll: '.$cnt_ll.' cnt_l: '.$cnt_l.' cnt_cc: '.$cnt_cc.' cnt_c: '.$cnt_c.' pos_new : '.$pos_new.' flg : '.$flg.'<br>';
				//$cnt_all = $cnt_l+$cnt_r+$cnt_c;
				//if($cnt_all >= 4 )$flg=true;
				$flg1=true;
				
				$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
				$rs = mysql_query($sql);
				
				if($flg1==true&&$flg==true){
					
					$sql = "UPDATE ".$dbprefix."member SET pos_cur1='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
					//====================LOG===========================
					$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
					//writelogfile($text);
					//=================END LOG===========================
					if($pos_cur1[$j] == 'SS' and $pos_new == 'SX')mysql_query($sql);
					if($pos_cur1[$j] == '' )mysql_query($sql);
					$sql = "INSERT INTO ".$dbprefix."calc_poschange1 (rcode,mcode,name_t,pos_before,pos_after,date_change) ";
					$sql .= "VALUES('$ro','".$mcode[$j]."','".$name_t[$j]."','SS','".$pos_new."','".$tdate."')";
					//====================LOG===========================
					$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
					//writelogfile($text);
					//if($mcode[$j] == '0001006')echo $sql;
					//=================END LOG===========================
					//if($pos_cur1[$j] == 'SS' and $pos_new == 'SX')mysql_query($sql);
					//if($pos_cur1[$j] == '' )mysql_query($sql);
					mysql_query($sql);
					$pos_cur2[$j] = $pos_new;
				}
			}
		//if($mcode[$j] == '0001006')exit;

		}




/*		$sql11 = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."asaleh ";
		$rs11 = mysql_query($sql11);
		$mid = mysql_result($rs11,0,'id')+1;
*/
		$sql="select * from ".$dbprefix."calc_poschange1 where rcode = '$ro' "; 
		//echo "$sql<BR>";
		//exit;
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj			= mysql_fetch_object($rs);
			$apv_rcode		= $sqlObj->rcode;
			$apv_mcode	= $sqlObj->mcode;
			$apv_date	= $sqlObj->date_change;	
			$apv_poscur	= $sqlObj->pos_after;	
			$apv_poscurf	= $sqlObj->pos_before;	
			//echo "dpv : $apv_total_pv = $i<BR> ";
			$sql11 = "SELECT date_change,pos_after FROM ".$dbprefix."calc_poschange1 where (pos_after = 'SS' or pos_after = 'SX') and mcode = '".$sp_code[$apv_mcode]."' order by id asc limit 0,1 ";
			$rs11 = mysql_query($sql11);
			//echo $sql11.'<bR>';
			//	exit;
			//echo $sql11.'<bR>';
				//	echo $apv_mcode.' : '.$sp_code[$apv_mcode].' : '.$apv_poscurf.' : '.$apv_poscur;
				//				exit;
			if(mysql_num_rows($rs11) > 0){
			$date_change = mysql_result($rs11,0,'date_change');
			$pos_after1 = mysql_result($rs11,0,'pos_after');
				$sql2 = "SELECT * from ".$dbprefix."status WHERE mcode='".$sp_code[$apv_mcode]."' and month_pv='".$month[0].$month[1]."' and (status='1' or status='2') ";
				$rs2=mysql_query($sql2);
				
				if(mysql_num_rows($rs2) > 0 ){
						if($sp_code[$apv_mcode] != '' and $date_change <= $apv_date){
							
								if($apv_poscurf == 'SS' and $apv_poscur == 'SX'){
									$bonus = 800;
									$cdate = explode("-",$fdate);
									$previous =  date("Y-m",strtotime($cdate[0]."-".$cdate[1]."-01 -1 months"));
									$sql11 = "SELECT * FROM ".$dbprefix."calc_poschange1 where rcode = '$roo' ";
									
									$rsc = mysql_query($sql11);
									if(mysql_num_rows($rsc)>0){
										$sql = " INSERT INTO ".$dbprefix."sc (rcode, mcode, upa_code, mpos, total,fdate,tdate) VALUES ('$ro','".$apv_mcode."','".$sp_code[$apv_mcode]."','".$apv_poscur."','".$bonus."','".$fdate."','".$tdate."') ";
										mysql_query($sql) or die(mysql_error());
									}
							}else{
									$bonus = $array_bonus[$apv_poscur];
									$sql = " INSERT INTO ".$dbprefix."sc (rcode, mcode, upa_code, mpos, total,fdate,tdate) VALUES ('$ro','".$apv_mcode."','".$sp_code[$apv_mcode]."','".$apv_poscur."','".$bonus."','".$fdate."','".$tdate."') ";
									mysql_query($sql) or die(mysql_error());
								}
								
								/*if($pos_after1 <> 'SM'){
									$sql = "INSERT INTO ".$dbprefix."calc_poschange1 (rcode,mcode,pos_before,pos_after,date_change) ";
									$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$fdate."')";
									//====================LOG===========================
									$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
									//writelogfile($text);
									//=================END LOG===========================
									mysql_query($sql);
								}*/
								//echo "$sql<br>";
						}
				}
			}

//			for($j=0;$j<sizeof($mcode);$j++){

//			}
		}

		$sql = " insert into ".$dbprefix."smbonus  (rcode, mcode, total,tax,bonus,fdate,tdate,pos_cur) ";
		$sql .= "	select '$ro', upa_code,sum(total) as totalpv,sum(total)*5/100 as tax,sum(total)-sum(total)*5/100 as bonus,'$fdate','$tdate',mpos from ".$dbprefix."sc WHERE  rcode='$ro' group by upa_code ";
		mysql_query($sql) or die(mysql_error());

	//////check money starmaker


}
function calc_pool_bunus($dbprefix,$ro,$tdate,$fdate){

	//$pos_quota = array('DR'=>100000,'RM'=>300000,'EM'=>700000,'DM'=>1500000,'CM'=>3000000);

//	$pos_piority =array('RD'=>17,'PD'=>16,'ID'=>15,'CD'=>14,'BL'=>13,'BD'=>12,'DI'=>11,'EM'=>10,'SA'=>9,'RU'=>8,'PE'=>7,'PL'=>6,'GO'=>5,'SI'=>4,'BR'=>3,'EX'=>2,'SU'=>1,'MB'=>0);
	
	$whereclass = " AND fdate>= '$fdate' and tdate<= '$tdate' ";
	$month=explode("-",$fdate);
	$thismonth = $mdate = $month[0].$month[1];
	$thismonth1 = $month[0].'-'.$month[1];

	$sql = " insert into ".$dbprefix."epv  (rcode, mcode, sano,sadate,fdate,tdate,total_pv) ";
	$sql .= "	select '$ro', mcode,sano,sadate,'$fdate','$tdate',SUM(tot_pv) AS total from ".$dbprefix."asaleh WHERE  sadate between '$fdate' and '$tdate' and cancel=0 and (sa_type = 'A' or sa_type = 'B' or sa_type = 'C'  or sa_type = 'Q') and tot_pv > 0 group by mcode ";
	//echo $sql;
	mysql_query($sql) or die(mysql_error());
	
	$sql = " insert into ".$dbprefix."epv  (rcode, mcode, sano,sadate,fdate,tdate,total_pv) ";
	$sql .= "	select '$ro', mcode,sano,sadate,'$fdate','$tdate',SUM(tot_pv) AS total from ".$dbprefix."holdhead WHERE  sadate between '$fdate' and '$tdate' and cancel=0 and (sa_type = 'A' or sa_type = 'Q') and tot_pv > 0 group by mcode ";
	mysql_query($sql) or die(mysql_error());

	$sql = "SELECT sum(total_pv) as total_pv from ".$dbprefix."epv WHERE rcode='$ro' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$total_pv = mysql_result($rs,0,'total_pv');
	}
	
	//$total_pv = $total_pv*0.05;  // 5 % ของยอดทั้งหมด
		
	$sql="SELECT * FROM ".$dbprefix."member where pos_cur2 = 'RB' or pos_cur2 = 'EM' or  pos_cur2 = 'D' or  pos_cur2 = 'DD' or  pos_cur2 = 'TD' ORDER BY lr DESC";
	//echo $sql;
	$rs = mysql_query($sql);
		$pos_RB = 0;
		$pos_EM = 0;
		$pos_D = 0;
		$pos_DD =0;
		$pos_TD = 0;
	
	if(mysql_num_rows($rs)>0){

		for($m=0;$m<mysql_num_rows($rs);$m++){		
			$sqlObj = mysql_fetch_object($rs) or die("desad");			
			$n_mcode[$m] =$sqlObj->mcode;		
			$n_name_t[$m] =$sqlObj->name_t;		
			$n_pos_cur[$n_mcode[$m]] = $sqlObj->pos_cur2;
			$weak[$n_mcode[$m]] = 0;
			//$pos_cur1 = checkpositionback($dbprefix,$n_mcode[$m],$fpdate,$tpdate);
			//if($n_pos_cur[$n_mcode[$m]] <> $pos_cur1 and $pos_cur1 != 0)$n_pos_cur[$n_mcode[$m]] = $pos_cur1;
			//echo $n_pos_cur[$n_mcode[$m]].'<br>';
			$sql2 = "SELECT * from ".$dbprefix."status WHERE mcode='".$n_mcode[$m]."' and month_pv='".$thismonth."' and status='1' ";
			//echo $sql2;
			//echo '<br>';
			$rs2=mysql_query($sql2);
			//echo $sql2.'<br>';
			if(@mysql_num_rows($rs2)>0 ) {
			$sqlObj1 = mysql_fetch_object($rs2) or die("desad");

				switch ($n_pos_cur[$n_mcode[$m]]){
					case 'RB':$pos_RB = $pos_RB+1;
						break;
					case 'EM':$pos_EM = $pos_EM+1;
						break;
					case 'D':$pos_D = $pos_D+1;
						break;
					case 'DD':$pos_DD = $pos_DD+1;
						break;
					case 'TD':$pos_TD = $pos_TD+1;
						break;
					default:
						$endQuota=0;
						break;
				}
			
			}
			$n_lr[$n_mcode[$m]] = $sqlObj->lr;
			
		}mysql_free_result($rs);
	}
	//echo 'PR:'.$pos_PR.'  SLP:'.$pos_SLP.'  GOP:'.$pos_GOP.'  EMP:'.$pos_EMP.'  DIP:'.$pos_DIP.'  CDP:'.$pos_CDP.'  SDP:'.$pos_SDP.'<br>';	
if ($pos_RB+$pos_EM+$pos_D+$pos_DD+$pos_TD > 0) {
	$tot1 = ($total_pv*2/100);
	$per1 = $tot1/($pos_RB+$pos_EM+$pos_D+$pos_DD+$pos_TD);
	
	$tot2 = ($total_pv*2/100);
	$per2 = $tot2/($pos_EM+$pos_D+$pos_DD+$pos_TD);

	$tot3 = ($total_pv*2/100);
	$per3 = $tot3/($pos_D+$pos_DD+$pos_TD);

	$tot4 = ($total_pv*2/100);
	$per4 = $tot4/($pos_DD+$pos_TD);

	$tot5 = ($total_pv*2/100);
	$per5 = $tot5/($pos_TD);
}
	
	for($j=0;$j<sizeof($n_mcode);$j++){		
		$sql2 = "SELECT * from ".$dbprefix."status WHERE mcode='".$n_mcode[$j]."' and month_pv='".$mdate."' and status='1' ";
		$rs2=mysql_query($sql2);
		if(mysql_num_rows($rs2)>0) {
			if($n_pos_cur[$n_mcode[$j]] == 'RB')
			{
				$per11 = $per1;
				$per21 = 0;
				$per31 = 0;
				$per41 = 0;
				$per51 = 0;
				$per61 = 0;
				$per71 = 0;
				$per81 = 0;
				$per91 = 0;
				$per101 = 0;
				$per111 = 0;
				$per121 = 0;
				$per131 = 0;
			$sql1 = " insert into ".$dbprefix."em  (rcode,mcode,pershare,total1,total2,total3,total4,total5,total6,fdate,tdate,pv_world,pools,pos_cur,weak) VALUES ";
				$sql1 .= " ('$ro','$n_mcode[$j]','20','$per11','$per21','$per31','$per41','$per51','$per61','$fdate','$tdate','$total_pv','1','".$n_pos_cur[$n_mcode[$j]]."','".$weak[$n_mcode[$j]]."')";
				mysql_query($sql1) or die(mysql_error());
			}
			
			if($n_pos_cur[$n_mcode[$j]] == 'EM')
			{
				$per11 = $per1;
				$per21 = $per2;
				$per31 = 0;
				$per41 = 0;
				$per51 = 0;
				$per61 = 0;
				$per71 = 0;
				$per81 = 0;
				$per91 = 0;
				$per101 = 0;
				$per111 = 0;
				$per121 = 0;
				$per131 = 0;
			$sql1 = " insert into ".$dbprefix."em  (rcode,mcode,pershare,total1,total2,total3,total4,total5,total6,fdate,tdate,pv_world,pools,pos_cur,weak) VALUES ";
				$sql1 .= " ('$ro','$n_mcode[$j]','20','$per11','$per21','$per31','$per41','$per51','$per61','$fdate','$tdate','$total_pv','1','".$n_pos_cur[$n_mcode[$j]]."','".$weak[$n_mcode[$j]]."')";
				mysql_query($sql1) or die(mysql_error());
			}
			if($n_pos_cur[$n_mcode[$j]] == 'D')
			{
				$per11 = $per1;
				$per21 = $per2;
				$per31 = $per3;
				$per41 = 0;
				$per51 = 0;
				$per61 = 0;
				$per71 = 0;
				$per81 = 0;
				$per91 = 0;
				$per101 = 0;
				$per111 = 0;
				$per121 = 0;
				$per131 = 0;
			$sql1 = " insert into ".$dbprefix."em  (rcode,mcode,pershare,total1,total2,total3,total4,total5,total6,fdate,tdate,pv_world,pools,pos_cur,weak) VALUES ";
				$sql1 .= " ('$ro','$n_mcode[$j]','20','$per11','$per21','$per31','$per41','$per51','$per61','$fdate','$tdate','$total_pv','1','".$n_pos_cur[$n_mcode[$j]]."','".$weak[$n_mcode[$j]]."')";
				mysql_query($sql1) or die(mysql_error());
			}
			if($n_pos_cur[$n_mcode[$j]] == 'DD')
			{
				$per11 = $per1;
				$per21 = $per2;
				$per31 = $per3;
				$per41 = $per4;
				$per51 = 0;
				$per61 = 0;
				$per71 = 0;
				$per81 = 0;
				$per91 = 0;
				$per101 = 0;
				$per111 = 0;
				$per121 = 0;
				$per131 = 0;
			$sql1 = " insert into ".$dbprefix."em  (rcode,mcode,pershare,total1,total2,total3,total4,total5,total6,fdate,tdate,pv_world,pools,pos_cur,weak) VALUES ";
				$sql1 .= " ('$ro','$n_mcode[$j]','20','$per11','$per21','$per31','$per41','$per51','$per61','$fdate','$tdate','$total_pv','1','".$n_pos_cur[$n_mcode[$j]]."','".$weak[$n_mcode[$j]]."')";
				mysql_query($sql1) or die(mysql_error());
			}
			if($n_pos_cur[$n_mcode[$j]] == 'TD')
			{
				$per11 = $per1;
				$per21 = $per2;
				$per31 = $per3;
				$per41 = $per4;
				$per51 = $per5;
				$per61 = 0;
				$per71 = 0;
				$per81 = 0;
				$per91 = 0;
				$per101 = 0;
				$per111 = 0;
				$per121 = 0;
				$per131 = 0;
			$sql1 = " insert into ".$dbprefix."em  (rcode,mcode,pershare,total1,total2,total3,total4,total5,total6,fdate,tdate,pv_world,pools,pos_cur,weak) VALUES ";
				$sql1 .= " ('$ro','$n_mcode[$j]','20','$per11','$per21','$per31','$per41','$per51','$per61','$fdate','$tdate','$total_pv','1','".$n_pos_cur[$n_mcode[$j]]."','".$weak[$n_mcode[$j]]."')";
				mysql_query($sql1) or die(mysql_error());
			}
		}
	}


$sql = " insert into ".$dbprefix."embonus  (rcode, mcode, total,tax,bonus,fdate,tdate,pos_cur,weak) ";
$sql .= "select '$ro',mcode,sum(total1+total2+total3+total4+total5+total6) as total,(sum(total1+total2+total3+total4+total5+total6)*0.05) as tax,(sum(total1+total2+total3+total4+total5+total6)-(sum(total1+total2+total3+total4+total5+total6)*0.05)) as bonus,'$fdate','$tdate',pos_cur,weak from ".$dbprefix."em  where rcode='$ro' group by mcode";
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
 function backmonthpv($dbprefix,$mcode,$ro){
	$sql2 = "select mcode,pvh,status from ".$dbprefix."cmbonus_b WHERE  mcode='$mcode'  order by rcode desc limit 0,1 ";
	
	//if($mcode == '0007243')echo $sql2.'<br>';
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		//if($sqlObj2->status == '0')$pv= $sqlObj2->pvh;
		//else $pv=0;
		$pv= $sqlObj2->pvh;
	}else{
		$pv = 0;
	}
	//echo $mcode.' : '.$pv.'<br>';
	return $pv;
}
 function backallpv($dbprefix,$mcode,$ro,$tdate){
	$chkdate = explode('-',$tdate);
	$chkdate1 = $chkdate[0];
	$sql2 = "select totaly from ".$dbprefix."cmbonus_b WHERE  mcode='$mcode' and paydate like '%".$chkdate1."%' order by id desc limit 0,1 ";
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
function fnc_calc_unilevel($dbprefix,$ro,$n_mcode,$n_name_t,$n_upa_code,$n_lr,$fdate,$tdate,$fpdate,$tpdate){
$month=explode("-",$fdate);
$maxlv = 15;
//$month=explode("-",$fdate);

$sql = " insert into ".$dbprefix."mpv  (rcode, mcode, total_pv) ";
		$sql .= "	select '$ro', mcode, sum(tot_pv) AS total_fv from ".$dbprefix."asaleh WHERE  sadate>='$fdate' and sadate<='$tdate' and (sa_type = 'Q' or sa_type = 'C' ) and cancel = 0  group by mcode ";
		mysql_query($sql) or die(mysql_error());

		$sql = " insert into ".$dbprefix."mpv  (rcode, mcode,total_pv) ";
		$sql .= "	select '$ro', mcode,SUM(tot_pv) AS total_fv from ".$dbprefix."holdhead WHERE  sadate>='$fdate' and sadate<='$tdate' and (sa_type = 'Q' or sa_type = 'C' ) and cancel=0 group by mcode ";
		mysql_query($sql) or die(mysql_error());
//echo "$sql<BR>";
		//mysql_query($sql) or die(mysql_error());
				$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
		$rs = mysql_query($sql);
		
		for($m=0;$m<mysql_num_rows($rs);$m++){
			$sqlObj = mysql_fetch_object($rs);
			$n_mcode[$m] =$sqlObj->mcode;		
			$n_name_t[$m] =$sqlObj->name_t;		
			//$n_upa_code[$n_mcode[$m]] = $sqlObj->upa_code;
			$n_upa_code[$n_mcode[$m]] = $sqlObj->upa_code;
			$n_lr[$n_mcode[$m]] = $sqlObj->lr;
			//echo "upcode :  $sqlObj->mcode    $sqlObj->upa_code<BR>";
		}
		mysql_free_result($rs);
		//$max_percent = 0.1;
		//เก็บ PV ของบิลขายเข้า Array เพื่อคำนวณให้ sp_code
		$sql="select rcode,mcode,sum(total_pv) as total_pv from ".$dbprefix."mpv where rcode = '$ro' group by mcode  "; 
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj			= mysql_fetch_object($rs);
			$apv_rcode		= $sqlObj->rcode;
			$apv_mcode	= $sqlObj->mcode;
			$apv_total_pv	= $sqlObj->total_pv;
			//echo 'apv : '.$apv_total_pv;
		//	if($apv_total_pv>1000){
				//$apv_total_pv=1000;
		//	}
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
					//	echo "up : $up<BR>";
					//	echo "upa : $upa_code[$up]  $lv  $maxlv<BR>";
						$checkcheck = 0;
						if($n_upa_code[$up] <> "" && $gpv <= $maxlv){
							$lv	= ($lv+1);
								$flag = 0;
								$sum_pv = 0;
								$sum_pv = 1;
								$pos_ncur = getpossition($dbprefix,$n_upa_code[$up]); //ตรวจสอบตำแหน่งผู้ที่มีสิทธิ์รับคอมมิชชั่น
								//$pos_cur1 = checkpositionback($dbprefix,$n_upa_code[$up],$fpdate,$tpdate);
								//if($pos_ncur <> $pos_cur1 and $pos_cur1 != 0)$pos_ncur = $pos_cur1;

								//echo $n_upa_code[$up].' '.$pos_ncur.'<br>';
								//exit;
								//$pvmcode=checkingdatepv($dbprefix,$n_upa_code[$up],$tdate,$fdate);
								
								//echo "รหัส ".$n_upa_code[$up]." ตำแหน่ง > $pos_ncur < คะแนนรักษายอด > $sum_pv < สถานะ > $flag < <br><br><br>";
									$chkpv=0;
									switch ($pos_ncur) {
										case 'B':
												if($sum_pv>=1&&$gpv<=7){
													$percent = 0.1;
													$chkpv=1;
												}
											break;
										case 'S':
												if($sum_pv>=1&&$gpv<=7){
													$percent = 0.1;
													$chkpv=1;
												}
											break;
										case 'G':
												if($sum_pv>=1&&$gpv<=10){
													$percent = 0.1;
													$chkpv=1;
												}
											break;
										case 'P':
												if($sum_pv>=1&&$gpv<=10){
													$percent = 0.1;
													$chkpv=1;
												}
											break;
										case 'D':
												if($sum_pv>=1&&$gpv<=15){
													$percent = 0.1;
													$chkpv=1;
												}
											break;
										case 'DD':
												if($sum_pv>=1&&$gpv<=15){
													$percent = 0.1;
													$chkpv=1;
												}
											break;
										case 'TD':
												if($sum_pv>=1&&$gpv<=15){
													$percent = 0.1;
													$chkpv=1;
												}
											break;
										case 'CD':
												if($sum_pv>=1&&$gpv<=15){
													$percent = 0.1;
													$chkpv=1;
												}
											break;
										default:
											$chkpv=0;
											$percent = 0;
											break;
									}
								//echo $n_upa_code[$up].' '.$pos_ncur.' '.$chkpv.'<br>';
									if($gpv<=15&&$chkpv==1){

										//$selectsql  = " select * from ".$dbprefix."mc rcode";
										//$sql2 = "SELECT * from ".$dbprefix."status WHERE mcode='".$n_upa_code[$up]."' and month_pv='".$mdate."' and status='1' and mpos <> 'M' ";
										$sql2 = "SELECT * from ".$dbprefix."status WHERE mcode='".$n_upa_code[$up]."' and month_pv='".$month[0].$month[1]."' and status='1'  ";
										//if($n_mcode[$j] == '0000485')echo $sql2.'<br>';
										//echo $sql2.'<br>';
										$rs2=mysql_query($sql2);
										if(mysql_num_rows($rs2)>0 or $n_upa_code[$up] == '0000001') {
											$sql = " INSERT INTO ".$dbprefix."mc (rcode, mcode, upa_code,level, gen, pv, percer, total,fdate,tdate) VALUES ";
											$sql .= "('$ro','".$n_mcode[$j]."','".$n_upa_code[$up]."','$lv','$gpv','".$apv_total_pv."','".$percent."','".($apv_total_pv*$percent)."' ,'$fdate','$tdate')";
											mysql_query($sql) or die(mysql_error());
											
											//if($n_mcode[$j] == '0000485')echo "IN : $sql <BR>";
											$gpv=($gpv+1);
										}else{
											
											/*$sql = " INSERT INTO ".$dbprefix."mc (rcode, mcode, upa_code,level, gen, pv, percer, total,fdate,tdate) VALUES ";
											$sql .= "('$ro','".$n_mcode[$j]."','".$n_upa_code[$up]."','$lv','$gpv','".$apv_total_pv."','".$percent."','".($apv_total_pv*$percent)."' ,'$fdate','$tdate')";
											//if($n_mcode[$j] == '0000485')echo "IN : $sql 1<BR>";
											mysql_query($sql) or die(mysql_error());*/
										}
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
		$sql .= "	select '$ro', upa_code,sum(total) as totalpv,(sum(total)*0.05) as tax,(sum(total)-(sum(total)*0.05)) bonus,'$fdate','$tdate','$pmonth' from ".$dbprefix."mc WHERE  rcode='$ro' group by upa_code ";
		mysql_query($sql) or die(mysql_error());

}

function fnc_calc_invent($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate){

	$sql 	= "select  uid,hono,'H' as status,tot_pv,total,sadate,sa_type from ".$dbprefix."holdhead  WHERE sadate>='$fdate' AND sadate<='$tdate'  and cancel=0  and uid like '%0%' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$inv_code= $sqlObj->uid;
			$hono= $sqlObj->hono;
			$status= $sqlObj->status;
			$tot_pv= $sqlObj->tot_pv;
			$total= $sqlObj->total;
			$sadate= $sqlObj->sadate;
			$sa_type= $sqlObj->sa_type;
			$sqlInsert = "insert into ".$dbprefix."fm(rcode,inv_code,sano,status,tot_pv,tot_price,mdate,sa_type) values
			('$ro','$inv_code','$hono','$status','$tot_pv','$total','$sadate','$sa_type')";
			mysql_query($sqlInsert) or die(mysql_error());
		}
		mysql_free_result($rs);
	}


	$sql = " insert into ".$dbprefix."fpv  (rcode, mcode,total_pv,mpos) ";// Mobile or Invent
	$sql .= "	select '$ro', uid, SUM(tot_pv) AS total_pv,'E' from ".$dbprefix."holdhead WHERE sadate>='$fdate' AND sadate<='$tdate'   and cancel=0  group by uid ";
	mysql_query($sql) or die(mysql_error());

	$sql 	= "SELECT mcode,sum(total_pv) as pv FROM ".$dbprefix."fpv ";
	$sql .= "WHERE rcode='$ro' group by mcode";
	$rs = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlObj = mysql_fetch_object($rs);
		$nmcode= $sqlObj->mcode;
		$ntot_pv= $sqlObj->pv;
			$sp_code="";
			$arr_per = array('1'=>0.05);
			$sql1 = "SELECT mtype1 from ".$dbprefix."member WHERE mcode='$nmcode' ";
			$rs1=mysql_query($sql1);
			if (mysql_num_rows($rs1)>0) {
				$sqlObj1 = mysql_fetch_object($rs1);
				$mtype= $sqlObj1->mtype1;
			}
			mysql_free_result($rs1);

			$sql3 = "select mcode, SUM(tot_pv) AS total_bv from ".$dbprefix."holdhead WHERE sadate>='$fdate' AND sadate<='$tdate' and uid = '$nmcode'  and cancel=0   group by uid ";
		
			$rs3=mysql_query($sql3);
			if (mysql_num_rows($rs3)>0) {
				$sqlObj3 = mysql_fetch_object($rs3);
				$total_bv3= $sqlObj3->total_bv;
				$mmcode= $sqlObj3->mcode;
				mysql_free_result($rs3);
				$per = $arr_per[$mtype];
			}else{
				$total_bv3=0;
			}
			//echo $mtype;
			//echo 'ssssssssssssssssssssssssssss';
			//exit;
			if($total_bv3>=3000){
				if($total_bv3>=18000)$per = 0.10;	
				$ntot_pv = $total_bv3;
				$total=($ntot_pv*($per));
				$tax=($total*0.05);
				$totalamt=($total-$tax);
				
				$sql = "INSERT INTO ".$dbprefix."fc (rcode,mcode,upa_code,pv,level,percer,total,fdate,tdate,pos_cur) VALUES";
					$sql .= "(".$ro.",'$mmcode','".$nmcode."','".$ntot_pv."','1','$per','".$total."','$fdate','$tdate','H') ";
					//echo  "$sql<br>";
					if (! mysql_query($sql)) {
						echo "<font color='#FF0000'>error</font><br>";
						echo  "$sql<br>";
						echo  die(mysql_error());
						exit;
					
				}
			}
					
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


function fnc_calc_set_position1($dbprefix,$ro,$mcode,$name_t,$pos_cur,$sp_code,$lr,$fdate,$tdate){
		$fdate1=explode("-",$fdate);
	$lastmonth = $fdate1[0].'-'.$fdate1[1];
	$lastmonth1 = $fdate1[0].$fdate1[1];
	
	$sql="SELECT * FROM ".$dbprefix."member WHERE ORDER BY lr ASC";
	$rs = mysql_query($sql);
	//echo "$sql<BR>";
	$mcode = "";
	for($m=0;$m<@mysql_num_rows($rs);$m++){
		$sqlObj = mysql_fetch_object($rs);
		$mcode[$m] =$sqlObj->mcode;		
		$mdate[$mcode[$m]] =$sqlObj->mdate;		
		$name_t[$m] =$sqlObj->name_t;
		$pos_cur[$m] =$sqlObj->pos_cur;
		$sp_code[$mcode[$m]] = $sqlObj->sp_code;
		//echo $mcode[$m].' '.$pos_cur[$m].'<br>';
		$lr[$mcode[$m]] = $sqlObj->lr;
	}
	mysql_free_result($rs);
	//echo 'sssss'.sizeof($mcode).'<br>';
	$pos_piority = array('CD'=>10,'DD'=>9,'DI'=>8,'EM'=>7,'RU'=>6,'SA'=>5,'PL'=>4,'GO'=>3,'SI'=>2,'BR'=>1,'MB'=>0);
	$pos_exp = array('CD'=>10000,'DD'=>10000,'DI'=>10000,'EM'=>10000,'RU'=>10000,'SA'=>10000,'PL'=>10000,'GO'=>3000,'SI'=>1000,'BR'=>500,'MB'=>350);
	$pv_exp=array(10000,5000,1000,300,100,0);

	//for($p=0;$p<5;$p++){
	for($p=0;$p<1;$p++){
		//echo 'sssss';
		$mpvmpv = 0;
		for($j=0;$j<sizeof($mcode);$j++){
			//if($mcode[$j] == '9999999'){echo $mcode[$j].' '.$pos_cur[$j].'okokokok<br>';
			//exit;
			//}
			//ตรวจสอบตำแหน่งปัจจุบัน
			$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='".$mcode[$j]."' and cancel=0 and sadate<='".$tdate."'";
			$rs = mysql_query($sql);
			$mexp = 0;
			if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
			$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode[$j]."' and sa_type='A' and cancel=0 and sadate<='".$tdate."' ";
			$rs = mysql_query($sql);
			$mexph = 0;
			if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
			mysql_free_result($rs);
			$mexp=($mexp+$mexph);
			$mexp = $mexp+gettotalpv($dbprefix,$mcode[$j]); // VIP poinrt

			//ตรวจสอบตำแหน่งปัจจุบัน
		
			//-----เก็บตำแหน่งปัจจุบัน
			$sql = "SELECT pos_cur from ".$dbprefix."member WHERE mcode='".$mcode[$j]."'  ";
			$rs = mysql_query($sql);
			$pos_old = '';
			if(mysql_num_rows($rs)>0) $pos_old = mysql_result($rs,0,'pos_cur');
			mysql_free_result($rs);
			//คำนวณตำแหน่ง
			$pos_new = $pos_old;
			foreach(array_keys($pos_exp) as $key){
				//echo $key;
				if($mexp>=$pos_exp[$key]){ $pos_new = $key; break;}
			}

			switch ($pos_cur[$j]){
				case 'PL':
					$cnt_l=0;
					$cnt_r=0;
					$cnt_c=0;
					$flg=false;
					$flgpv=false;$flg1 = false;
					
					$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
					mysql_query($sql);

					$sql1="SELECT * FROM ".$dbprefix."member WHERE sp_code='".$mcode[$j]."' ";
					//echo "2 : $sql1<BR>";
					$rs1 = mysql_query($sql1);
					for($n=0;$n<mysql_num_rows($rs1);$n++){
						$sqlObj1 = mysql_fetch_object($rs1);
						$n_sp_code =$sqlObj1->mcode;
						$n_sp_pos_cur =$sqlObj1->pos_cur;
						
						$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
						//echo "3 : $sql2<BR>";
						$rs2 = mysql_query($sql2);
						for($i=0;$i<mysql_num_rows($rs2);$i++){
							$sqlObj2 = mysql_fetch_object($rs2);
							$up_mcode =$sqlObj2->upa_code;
							$uplr=$sqlObj2->lr;
							$up=$up_mcode;
							while($up <> ""){
								if($up==$mcode[$j]){
									$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
									$sql .= "(".$ro.",'$n_sp_code','$mcode[$j]','".$uplr."','$n_sp_pos_cur') ";
									mysql_query($sql);
									//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
									$up="";
								}else{
									$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
									$rs3 = mysql_query($sql3);
									if($row3 = mysql_fetch_object($rs3)){
										$up = $row3->upa_code;
										$uplr=$row3->lr;
									} else {
										$up = "";
									}
									mysql_free_result($rs3);
								}
							}
						}
						mysql_free_result($rs2);

					}
					mysql_free_result($rs1);

					$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
					$rs = mysql_query($sql);
					for($n=0;$n<mysql_num_rows($rs);$n++){
						$row = mysql_fetch_object($rs);
						$p_mcode=$row->mcode;
						$p_pos_cur=$row->pos_cur;
						$p_lr=$row->lr;
						switch ($p_pos_cur){
							case 'PL':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'SA':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'RU':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'EM':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'DI':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'DD':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'CD':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							default:
								break;
						}
						
					}
					mysql_free_result($rs);
					if($cnt_l>=1&&$cnt_c>=1){
						$flg=true;
					}elseif($cnt_l>=1&&$cnt_r>=1){
						$flg=true;
					}elseif($cnt_c>=1&&$cnt_r>=1){
						$flg=true;
					}
					
					$weakstrong = getweakstrong($dbprefix,$mcode1[$j],$fdate,$tdate,$ro);
					if($weakstrong >= 100000)$flg1=true;
					if($flg1==true&&$flg==true){
						$pos_new="SA";
						$pos_old=$pos_cur[$j];
						$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
						$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
						$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$fdate."')";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
						$pos_cur[$j] = $pos_new;
					}
					
				case 'SA':
					$cnt_l=0;
					$cnt_r=0;
					$cnt_c=0;
					$flg=false;
					$flgpv=false;$flg1 = false;
					
					$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
					mysql_query($sql);

					$sql1="SELECT * FROM ".$dbprefix."member WHERE sp_code='".$mcode[$j]."' ";
					//echo "2 : $sql1<BR>";
					$rs1 = mysql_query($sql1);
					for($n=0;$n<mysql_num_rows($rs1);$n++){
						$sqlObj1 = mysql_fetch_object($rs1);
						$n_sp_code =$sqlObj1->mcode;
						$n_sp_pos_cur =$sqlObj1->pos_cur;
						
						$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
						//echo "3 : $sql2<BR>";
						$rs2 = mysql_query($sql2);
						for($i=0;$i<mysql_num_rows($rs2);$i++){
							$sqlObj2 = mysql_fetch_object($rs2);
							$up_mcode =$sqlObj2->upa_code;
							$uplr=$sqlObj2->lr;
							$up=$up_mcode;
							while($up <> ""){
								if($up==$mcode[$j]){
									$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
									$sql .= "(".$ro.",'$n_sp_code','$mcode[$j]','".$uplr."','$n_sp_pos_cur') ";
									mysql_query($sql);
									//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
									$up="";
								}else{
									$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
									$rs3 = mysql_query($sql3);
									if($row3 = mysql_fetch_object($rs3)){
										$up = $row3->upa_code;
										$uplr=$row3->lr;
									} else {
										$up = "";
									}
									mysql_free_result($rs3);
								}
							}
						}
						mysql_free_result($rs2);

					}
					mysql_free_result($rs1);

					$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
					$rs = mysql_query($sql);
					for($n=0;$n<mysql_num_rows($rs);$n++){
						$row = mysql_fetch_object($rs);
						$p_mcode=$row->mcode;
						$p_pos_cur=$row->pos_cur;
						$p_lr=$row->lr;
						switch ($p_pos_cur){
							case 'SA':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'RU':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'EM':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'DI':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'DD':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'CD':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							default:
								break;
						}
						
					}
					mysql_free_result($rs);
					if($cnt_l>=1&&$cnt_c>=1){
						$flg=true;
					}elseif($cnt_l>=1&&$cnt_r>=1){
						$flg=true;
					}elseif($cnt_c>=1&&$cnt_r>=1){
						$flg=true;
					}
					
					$weakstrong = getweakstrong($dbprefix,$mcode1[$j],$fdate,$tdate,$ro);
					if($weakstrong >= 250000)$flg1=true;
					if($flg1==true&&$flg==true){

						$pos_new="RU";
						$pos_old=$pos_cur[$j];
						$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
						$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
						$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$fdate."')";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
						$pos_cur[$j] = $pos_new;
					}
				case 'RU':
					$cnt_l=0;
					$cnt_r=0;
					$cnt_c=0;
					$flg=false;
					$flgpv=false;$flg1 = false;
					
					$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
					mysql_query($sql);

					$sql1="SELECT * FROM ".$dbprefix."member WHERE sp_code='".$mcode[$j]."' ";
					//echo "2 : $sql1<BR>";
					$rs1 = mysql_query($sql1);
					for($n=0;$n<mysql_num_rows($rs1);$n++){
						$sqlObj1 = mysql_fetch_object($rs1);
						$n_sp_code =$sqlObj1->mcode;
						$n_sp_pos_cur =$sqlObj1->pos_cur;
						
						$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
						//echo "3 : $sql2<BR>";
						$rs2 = mysql_query($sql2);
						for($i=0;$i<mysql_num_rows($rs2);$i++){
							$sqlObj2 = mysql_fetch_object($rs2);
							$up_mcode =$sqlObj2->upa_code;
							$uplr=$sqlObj2->lr;
							$up=$up_mcode;
							while($up <> ""){
								if($up==$mcode[$j]){
									$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
									$sql .= "(".$ro.",'$n_sp_code','$mcode[$j]','".$uplr."','$n_sp_pos_cur') ";
									mysql_query($sql);
									//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
									$up="";
								}else{
									$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
									$rs3 = mysql_query($sql3);
									if($row3 = mysql_fetch_object($rs3)){
										$up = $row3->upa_code;
										$uplr=$row3->lr;
									} else {
										$up = "";
									}
									mysql_free_result($rs3);
								}
							}
						}
						mysql_free_result($rs2);

					}
					mysql_free_result($rs1);

					$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
					$rs = mysql_query($sql);
					for($n=0;$n<mysql_num_rows($rs);$n++){
						$row = mysql_fetch_object($rs);
						$p_mcode=$row->mcode;
						$p_pos_cur=$row->pos_cur;
						$p_lr=$row->lr;
						switch ($p_pos_cur){
							case 'RU':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'EM':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'DI':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'DD':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'CD':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							default:
								break;
						}
						
					}
					mysql_free_result($rs);
					if($cnt_l>=1&&$cnt_c>=1){
						$flg=true;
					}elseif($cnt_l>=1&&$cnt_r>=1){
						$flg=true;
					}elseif($cnt_c>=1&&$cnt_r>=1){
						$flg=true;
					}
					
					$weakstrong = getweakstrong($dbprefix,$mcode1[$j],$fdate,$tdate,$ro);
					if($weakstrong >= 500000)$flg1=true;
					if($flg1==true&&$flg==true){

						$pos_new="EM";
						$pos_old=$pos_cur[$j];
						$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
						$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
						$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$fdate."')";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
						$pos_cur[$j] = $pos_new;
					}
				case 'EM':
					$cnt_l=0;
					$cnt_r=0;
					$cnt_c=0;
					$flg=false;
					$flgpv=false;$flg1 = false;
					
					$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
					mysql_query($sql);

					$sql1="SELECT * FROM ".$dbprefix."member WHERE sp_code='".$mcode[$j]."' ";
					//echo "2 : $sql1<BR>";
					$rs1 = mysql_query($sql1);
					for($n=0;$n<mysql_num_rows($rs1);$n++){
						$sqlObj1 = mysql_fetch_object($rs1);
						$n_sp_code =$sqlObj1->mcode;
						$n_sp_pos_cur =$sqlObj1->pos_cur;
						
						$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
						//echo "3 : $sql2<BR>";
						$rs2 = mysql_query($sql2);
						for($i=0;$i<mysql_num_rows($rs2);$i++){
							$sqlObj2 = mysql_fetch_object($rs2);
							$up_mcode =$sqlObj2->upa_code;
							$uplr=$sqlObj2->lr;
							$up=$up_mcode;
							while($up <> ""){
								if($up==$mcode[$j]){
									$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
									$sql .= "(".$ro.",'$n_sp_code','$mcode[$j]','".$uplr."','$n_sp_pos_cur') ";
									mysql_query($sql);
									//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
									$up="";
								}else{
									$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
									$rs3 = mysql_query($sql3);
									if($row3 = mysql_fetch_object($rs3)){
										$up = $row3->upa_code;
										$uplr=$row3->lr;
									} else {
										$up = "";
									}
									mysql_free_result($rs3);
								}
							}
						}
						mysql_free_result($rs2);

					}
					mysql_free_result($rs1);

					$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
					$rs = mysql_query($sql);
					for($n=0;$n<mysql_num_rows($rs);$n++){
						$row = mysql_fetch_object($rs);
						$p_mcode=$row->mcode;
						$p_pos_cur=$row->pos_cur;
						$p_lr=$row->lr;
						switch ($p_pos_cur){
							
							case 'EM':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'DI':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'DD':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'CD':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							default:
								break;
						}
						
					}
					mysql_free_result($rs);
					if($cnt_l>=1&&$cnt_c>=1){
						$flg=true;
					}elseif($cnt_l>=1&&$cnt_r>=1){
						$flg=true;
					}elseif($cnt_c>=1&&$cnt_r>=1){
						$flg=true;
					}
					
					$weakstrong = getweakstrong($dbprefix,$mcode1[$j],$fdate,$tdate,$ro);
					if($weakstrong >= 1000000)$flg1=true;
					if($flg1==true&&$flg==true){

						$pos_new="DI";
						$pos_old=$pos_cur[$j];
						$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
						$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
						$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$fdate."')";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
						$pos_cur[$j] = $pos_new;
					}
				case 'DI':
					$cnt_l=0;
					$cnt_r=0;
					$cnt_c=0;
					$flg=false;
					$flgpv=false;$flg1 = false;
					
					$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
					mysql_query($sql);

					$sql1="SELECT * FROM ".$dbprefix."member WHERE sp_code='".$mcode[$j]."' ";
					//echo "2 : $sql1<BR>";
					$rs1 = mysql_query($sql1);
					for($n=0;$n<mysql_num_rows($rs1);$n++){
						$sqlObj1 = mysql_fetch_object($rs1);
						$n_sp_code =$sqlObj1->mcode;
						$n_sp_pos_cur =$sqlObj1->pos_cur;
						
						$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
						//echo "3 : $sql2<BR>";
						$rs2 = mysql_query($sql2);
						for($i=0;$i<mysql_num_rows($rs2);$i++){
							$sqlObj2 = mysql_fetch_object($rs2);
							$up_mcode =$sqlObj2->upa_code;
							$uplr=$sqlObj2->lr;
							$up=$up_mcode;
							while($up <> ""){
								if($up==$mcode[$j]){
									$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
									$sql .= "(".$ro.",'$n_sp_code','$mcode[$j]','".$uplr."','$n_sp_pos_cur') ";
									mysql_query($sql);
									//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
									$up="";
								}else{
									$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
									$rs3 = mysql_query($sql3);
									if($row3 = mysql_fetch_object($rs3)){
										$up = $row3->upa_code;
										$uplr=$row3->lr;
									} else {
										$up = "";
									}
									mysql_free_result($rs3);
								}
							}
						}
						mysql_free_result($rs2);

					}
					mysql_free_result($rs1);

					$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
					$rs = mysql_query($sql);
					for($n=0;$n<mysql_num_rows($rs);$n++){
						$row = mysql_fetch_object($rs);
						$p_mcode=$row->mcode;
						$p_pos_cur=$row->pos_cur;
						$p_lr=$row->lr;
						switch ($p_pos_cur){
							
							case 'DI':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'DD':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'CD':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							default:
								break;
						}
						
					}
					mysql_free_result($rs);
					if($cnt_l>=1&&$cnt_c>=1){
						$flg=true;
					}elseif($cnt_l>=1&&$cnt_r>=1){
						$flg=true;
					}elseif($cnt_c>=1&&$cnt_r>=1){
						$flg=true;
					}
					
					$weakstrong = getweakstrong($dbprefix,$mcode1[$j],$fdate,$tdate,$ro);
					if($weakstrong >= 2000000)$flg1=true;
					if($flg1==true&&$flg==true){

						$pos_new="DD";
						$pos_old=$pos_cur[$j];
						$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
						$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
						$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$fdate."')";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
						$pos_cur[$j] = $pos_new;
					}
				case 'DD':
					$cnt_l=0;
					$cnt_r=0;
					$cnt_c=0;
					$flg=false;
					$flgpv=false;$flg1 = false;
					
					$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
					mysql_query($sql);

					$sql1="SELECT * FROM ".$dbprefix."member WHERE sp_code='".$mcode[$j]."' ";
					//echo "2 : $sql1<BR>";
					$rs1 = mysql_query($sql1);
					for($n=0;$n<mysql_num_rows($rs1);$n++){
						$sqlObj1 = mysql_fetch_object($rs1);
						$n_sp_code =$sqlObj1->mcode;
						$n_sp_pos_cur =$sqlObj1->pos_cur;
						
						$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
						//echo "3 : $sql2<BR>";
						$rs2 = mysql_query($sql2);
						for($i=0;$i<mysql_num_rows($rs2);$i++){
							$sqlObj2 = mysql_fetch_object($rs2);
							$up_mcode =$sqlObj2->upa_code;
							$uplr=$sqlObj2->lr;
							$up=$up_mcode;
							while($up <> ""){
								if($up==$mcode[$j]){
									$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
									$sql .= "(".$ro.",'$n_sp_code','$mcode[$j]','".$uplr."','$n_sp_pos_cur') ";
									mysql_query($sql);
									//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
									$up="";
								}else{
									$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
									$rs3 = mysql_query($sql3);
									if($row3 = mysql_fetch_object($rs3)){
										$up = $row3->upa_code;
										$uplr=$row3->lr;
									} else {
										$up = "";
									}
									mysql_free_result($rs3);
								}
							}
						}
						mysql_free_result($rs2);

					}
					mysql_free_result($rs1);

					$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode[$j]."' ";
					$rs = mysql_query($sql);
					for($n=0;$n<mysql_num_rows($rs);$n++){
						$row = mysql_fetch_object($rs);
						$p_mcode=$row->mcode;
						$p_pos_cur=$row->pos_cur;
						$p_lr=$row->lr;
						switch ($p_pos_cur){
							case 'DD':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							case 'CD':
									if($p_lr==1){
										$cnt_l=($cnt_l+1);
									}elseif($p_lr==2){
										$cnt_c=($cnt_c+1);
									}elseif($p_lr==3){
										$cnt_r=($cnt_r+1);
									}
								break;
							default:
								break;
						}
						
					}
					mysql_free_result($rs);
					if($cnt_l>=1&&$cnt_c>=1){
						$flg=true;
					}elseif($cnt_l>=1&&$cnt_r>=1){
						$flg=true;
					}elseif($cnt_c>=1&&$cnt_r>=1){
						$flg=true;
					}
					
					$weakstrong = getweakstrong($dbprefix,$mcode1[$j],$fdate,$tdate,$ro);
					if($weakstrong >= 5000000)$flg1=true;
					if($flg1==true&&$flg==true){

						$pos_new="CD";
						$pos_old=$pos_cur[$j];
						$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
						$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
						$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$fdate."')";
						//====================LOG===========================
						$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
						//writelogfile($text);
						//=================END LOG===========================
						mysql_query($sql);
						$pos_cur[$j] = $pos_new;
					}
				default:
			}

		}
	}

}

function fnc_calc_set_position($dbprefix,$ro,$mcode,$name_t,$pos_cur,$sp_code,$lr,$fdate,$tdate){


	$pos_piority = array('BU'=>0,'SU'=>1,'MG'=>2,'D'=>3,'AD'=>4,'RD'=>5,'ND'=>6,'CD'=>7,'GD'=>8,'GEP'=>9);
	$fdate1=explode("-",$fdate);
	$lastmonth = $fdate1[0].'-'.$fdate1[1];
	$lastmonth1 = $fdate1[0].$fdate1[1];
	$sql="SELECT * FROM ".$dbprefix."status WHERE rcode='$ro'  and (mpos <> 'MB' and mpos <> 'DI')  AND status='1' order by id DESC ";
	$rs = mysql_query($sql);
//	echo 'sql =  '. $sql.'<br>';
	echo 'Process 1 start <br>';
	for($m=0;$m<mysql_num_rows($rs);$m++){
		$sqlObj = mysql_fetch_object($rs);
		$mcode[$m] =$sqlObj->mcode;		
		$mdate[$mcode[$m]] =$sqlObj->mdate;		
		$pos_cur[$m] =$sqlObj->mpos;
		echo 'รักษายอด   mcode =  '. $mcode[$m].' // pos_cur ='.$pos_cur[$m].'<br>';
	}
	mysql_free_result($rs);
	
	echo 'Process 2 start <br>';
	for($j=0;$j<sizeof($mcode);$j++){  //110
			$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE mcode='".$mcode[$j]."' and cancel=0 and trnf = 0  and sadate<='".$tdate."' and sa_type='A' ";
			$rs = mysql_query($sql);
			$mexp = 0;
			if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
			mysql_free_result($rs);

			$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode[$j]."'  and sadate<='".$tdate."' and sa_type='A' and cancel=0 ";
			$rs = mysql_query($sql);
			$mexph = 0;
			if(mysql_num_rows($rs)>0) {
				$mexph = mysql_result($rs,0,'pv');
			}
			mysql_free_result($rs);
			$mexp=($mexp+$mexph);
			$mexp = $mexp+gettotalpv($dbprefix,$mcode[$j]);  
	
			//-----เก็บตำแหน่งปัจจุบัน
			$sql = "SELECT pos_cur from ".$dbprefix."member WHERE mcode='".$mcode[$j]."'  ";
			$rs = mysql_query($sql);
			$pos_old = '';
			if(mysql_num_rows($rs)>0) {
				$pos_old = mysql_result($rs,0,'pos_cur');
			}
			mysql_free_result($rs);
			$flg=false;
			$flgpv=false;
			$flg1 = false;	
			$weakstrong = 0;
	
			$weakstrong = getweakstrong($dbprefix,$mcode[$j],$fdate,$tdate,$ro);
			if($weakstrong >= 20000 and $mexp >= 5000) {
				$flg = true;
				$flg1= true;
			}
		 		
			if($flg1==true and $flg==true){
//echo 'mcode =  '. $mcode[$j].' // weakstrong ='.$weakstrong.' // mpv '.$mexp.' // pos_old '.$pos_old.' '.$flg.'  '.$flg1.'SUSUSUSUUSU<br>';
				$pos_new="SU";
				if($pos_new != $pos_old and $pos_piority[$pos_new]>$pos_piority[$pos_old] ){	
					$pos_old=$pos_cur[$j];
					$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new',pos_cur2='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
					//====================LOG===========================
					$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
					//writelogfile($text);
					//=================END LOG===========================
					mysql_query($sql);
					$sql = "INSERT INTO ".$dbprefix."calc_poschange1 (rcode,mcode,pos_before,pos_after,date_change) ";
					$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$fdate."')";
					//====================LOG===========================
					$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
					//writelogfile($text);
					//=================END LOG===========================
					mysql_query($sql);
					$sql = "INSERT INTO ".$dbprefix."pospv (rcode,mcode,opos,npos,sp_code,lr,fdate,tdate,status) ";
					$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$sp_code[$mcode[$j]]."','".$lr[$mcode[$j]]."','".$fdate."','".$tdate."','1')";
					//====================LOG===========================
					$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
					//writelogfile($text);
					//=================END LOG===========================
					mysql_query($sql);
		//			echo 'SQL up > SU '.$sql.'<br>';
		echo 'ขึ้่น SU mcode =  '. $mcode[$j].' // weakstrong ='.$weakstrong.' // mpv '.$mexp.' // cnt_all '.$cnt_all.'  // pos_old '.$pos_old.'  '.$flg1. '<br>';
					$pos_cur[$j] = $pos_new;
				}else{
					$sql = "UPDATE ".$dbprefix."member SET pos_cur2='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
					//====================LOG===========================
					$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
					//writelogfile($text);
					//=================END LOG===========================
					mysql_query($sql);
					$sql = "INSERT INTO ".$dbprefix."pospv (rcode,mcode,opos,npos,sp_code,lr,fdate,tdate,status) ";
					$sql .= "VALUES('$ro','".$mcode[$j]."','".$pos_old."','".$pos_new."','".$sp_code[$mcode[$j]]."','".$lr[$mcode[$j]]."','".$fdate."','".$tdate."','0')";
					//====================LOG===========================
					$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
					//writelogfile($text);
					//=================END LOG===========================
					mysql_query($sql);
		echo 'ยกไปหา MG mcode =  '.$mcode[$j].' // weakstrong ='.$weakstrong.' // mpv '.$mexp.' // cnt_all '.$cnt_all.'  // pos_old '.$pos_old.'  '.$flg1. '<br>';
				//	echo 'SQL NOup '.$sql.'<br>';
				}
			}

		/////////////////////////// Finish Process 2 Upgrade SU
	}
	echo 'Process 3 start <br>';
	/////////////////////////// Start Process 3 Upgrade MG
	$sqlProcess3="SELECT * FROM ".$dbprefix."pospv WHERE rcode='$ro'and npos = 'SU' and status='0'";
	$rsProcess3 = mysql_query($sqlProcess3);
//	echo 'SQL rsProcess3 '.$sqlProcess3.'<br>';
	for($j=0;$j<mysql_num_rows($rsProcess3);$j++){
			$sqlObj = mysql_fetch_object($rsProcess3);
			$pos_cur[$j] =$sqlObj->npos;
			$mcode1[$j] =$sqlObj->mcode;		
			$sqlProcess3 = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE mcode='".$mcode1[$j]."' and cancel=0 and trnf = 0  and sadate<='".$tdate."' and sa_type='A' ";
			$rsProcess31 = mysql_query($sqlProcess3);
			$mexp = 0;
			if(mysql_num_rows($rsProcess31)>0) $mexp = mysql_result($rsProcess31,0,'pv');
			mysql_free_result($rsProcess31);

			$sqlProcess32 = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode1[$j]."'  and sadate<='".$tdate."' and sa_type='A' and cancel=0 ";
			$rsProcess32 = mysql_query($sqlProcess32);
			$mexph = 0;
			if(mysql_num_rows($rsProcess32)>0) {
				$mexph = mysql_result($rsProcess32,0,'pv');
			}
			mysql_free_result($rsProcess32);
			$mexp=($mexp+$mexph);
			$mexp = $mexp+gettotalpv($dbprefix,$mcode1[$j]);  
			$mexp1=($mexp+$mexph);
			
			//-----เก็บตำแหน่งปัจจุบัน
			$sqlProcess33 = "SELECT pos_cur,sp_code,name_t,lr from ".$dbprefix."member WHERE mcode='".$mcode1[$j]."'  ";
			$rsProcess33  = mysql_query($sqlProcess33);
			$pos_old = '';
			if(mysql_num_rows($rsProcess33)>0) {
				$pos_old = mysql_result($rsProcess33,0,'pos_cur');
				$sp_code[$mcode1[$j]] = mysql_result($rsProcess33,0,'sp_code');
				$name_t[$j] = mysql_result($rsProcess33,0,'name_t');
				$lr1[$mcode1[$j]] = mysql_result($rsProcess33,0,'lr');
			}
			mysql_free_result($rsProcess33);
			
			$cnt_l=0;
			$cnt_r=0;
			$cnt_c=0;
			$flg=false;
			$flgpv=false;$flg1 = false;	

			$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
			mysql_query($sql);

//			$sql1="SELECT * FROM ".$dbprefix."pospv WHERE sp_code='".$mcode1[$j]."' and rcode = '$ro' ";
			$sql1="SELECT mcode,pos_cur2,lr FROM ".$dbprefix."member WHERE sp_code='".$mcode1[$j]."' ";
			//echo "2 : $sql1<BR>";
			$rs1 = mysql_query($sql1);
			for($n=0;$n<mysql_num_rows($rs1);$n++){
				$sqlObj1 = mysql_fetch_object($rs1);
				$n_sp_code =$sqlObj1->mcode;
				$n_sp_pos_cur =$sqlObj1->pos_cur2;
				
				$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
				//echo "3 : $sql2<BR>";
				$rs2 = mysql_query($sql2);
				for($i=0;$i<mysql_num_rows($rs2);$i++){
					$sqlObj2 = mysql_fetch_object($rs2);
					$up_mcode =$sqlObj2->upa_code;
					$uplr=$sqlObj2->lr;
					$up=$up_mcode;
					while($up <> ""){
						if($up==$mcode1[$j]){
							$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
							$sql .= "(".$ro.",'$n_sp_code','$mcode1[$j]','".$uplr."','$n_sp_pos_cur') ";
							mysql_query($sql);
							//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
							$up="";
						}else{
							$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
							$rs3 = mysql_query($sql3);
							if($row3 = mysql_fetch_object($rs3)){
								$up = $row3->upa_code;
								$uplr=$row3->lr;
							} else {
								$up = "";
							}
							mysql_free_result($rs3);
						}
					}
				}
				mysql_free_result($rs2);

			}
			mysql_free_result($rs1);

			$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode1[$j]."' ";
		
			$rs = mysql_query($sql);
			for($n=0;$n<mysql_num_rows($rs);$n++){
				$row = mysql_fetch_object($rs);
				$p_mcode=$row->mcode;
				$p_pos_cur=$row->pos_cur;
				$p_lr=$row->lr;
				switch ($p_pos_cur){
					case 'SU':
							if($p_lr==1){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==2){
								$cnt_c=($cnt_c+1);
							}elseif($p_lr==3){
								$cnt_r=($cnt_r+1);
							}
						break;
					case 'MG':
							if($p_lr==1){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==2){
								$cnt_c=($cnt_c+1);
							}elseif($p_lr==3){
								$cnt_r=($cnt_r+1);
							}
						break;
					
					default:
						break;
				}
				
			}
			mysql_free_result($rs);
			$cnt_all = $cnt_l+$cnt_r+$cnt_c;
			$flg=false;
			$flg1 = false;	
			$weakstrong = getweakstrong($dbprefix,$mcode1[$j],$fdate,$tdate,$ro);
			if($cnt_all>=1 and $weakstrong >= 50000 and $mexp >= 5000){
				$flg1=true;
				$pos_new="MG";
			}

	


		if($flg1==true){
			if($pos_new != $pos_old and $pos_piority[$pos_new]>$pos_piority[$pos_old] ){	
				$pos_old=$pos_cur[$j];
				$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new',pos_cur2='$pos_new' WHERE mcode='".$mcode1[$j]."' LIMIT 1 ";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$sql = "INSERT INTO ".$dbprefix."calc_poschange1 (rcode,mcode,pos_before,pos_after,date_change) ";
				$sql .= "VALUES('$ro','".$mcode1[$j]."','".$pos_old."','".$pos_new."','".$fdate."')";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$sql = "INSERT INTO ".$dbprefix."pospv (rcode,mcode,opos,npos,sp_code,lr,fdate,tdate,status) ";
				$sql .= "VALUES('$ro','".$mcode1[$j]."','".$pos_old."','".$pos_new."','".$sp_code[$mcode1[$j]]."','".$lr[$mcode1[$j]]."','".$fdate."','".$tdate."','1')";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
	echo 'ขึ้่น MG mcode =  '. $mcode1[$j].' // weakstrong ='.$weakstrong.' // mpv '.$mexp.' // cnt_all '.$cnt_all.'  // pos_old '.$pos_old.'  '.$flg1. '<br>';	
				$pos_cur[$j] = $pos_new;
			}else{
				$sql = "UPDATE ".$dbprefix."member SET pos_cur2='$pos_new' WHERE mcode='".$mcode1[$j]."' LIMIT 1 ";
				//echo $sql.'--------------agc<br>';
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$sql = "INSERT INTO ".$dbprefix."pospv (rcode,mcode,opos,npos,sp_code,lr,fdate,tdate,status) ";
				$sql .= "VALUES('$ro','".$mcode1[$j]."','".$pos_old."','".$pos_new."','".$sp_code[$mcode1[$j]]."','".$lr[$mcode1[$j]]."','".$fdate."','".$tdate."','0')";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
	echo 'ยกไปหา D  mcode =  '. $mcode1[$j].' // weakstrong ='.$weakstrong.' // mpv '.$mexp.' // cnt_all '.$cnt_all.'  // pos_old '.$pos_old.'  '.$flg1. '<br>';
				mysql_query($sql);
			}
		}
		
	}
	/////////////////////////// Finish Process 3 Upgrade MG
echo 'Process 4 start <br>';
	/////////////////////////// Start Process 4 Upgrade D,SP,RD
	$sql="SELECT * FROM ".$dbprefix."pospv WHERE rcode='$ro' AND npos = 'MG' and status='0'";
	$rs = mysql_query($sql);
	for($j=0;$j<mysql_num_rows($rs);$j++){

			$sqlObj = mysql_fetch_object($rs);
			$pos_cur[$j] =$sqlObj->npos;
			$mcode1[$j] =$sqlObj->mcode;		
			$name_t[$j] =$sqlObj->name_t;
			$sp_code1[$mcode1[$j]] = $sqlObj->sp_code;
			$lr1[$mcode1[$j]] = $sqlObj->lr;

			$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE mcode='".$mcode1[$j]."' and cancel=0 and trnf = 0  and sadate<='".$tdate."' and sa_type='A' ";
			$rs123 = mysql_query($sql);
			$mexp = 0;
			if(mysql_num_rows($rs123)>0) $mexp = mysql_result($rs123,0,'pv');
			mysql_free_result($rs123);

			$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode1[$j]."'  and sadate<='".$tdate."' and sa_type='A' and cancel=0 ";
			$rs123 = mysql_query($sql);
			$mexph = 0;
			if(mysql_num_rows($rs123)>0) {
				$mexph = mysql_result($rs123,0,'pv');
			}
			mysql_free_result($rs123);
			$mexp=($mexp+$mexph);
			$mexp = $mexp+gettotalpv($dbprefix,$mcode1[$j]);  
			$mexp1=($mexp+$mexph);
			
			//-----เก็บตำแหน่งปัจจุบัน
			$sql = "SELECT pos_cur,sp_code,name_t,lr,pos_cur2 from ".$dbprefix."member WHERE mcode='".$mcode1[$j]."'  ";
			$rs123 = mysql_query($sql);
			$pos_old = '';
			if(mysql_num_rows($rs123)>0) {
				$pos_old = mysql_result($rs123,0,'pos_cur');
				$sp_code[$mcode1[$j]] = mysql_result($rs123,0,'sp_code');
				$name_t[$j] = mysql_result($rs123,0,'name_t');
				$lr1[$mcode1[$j]] = mysql_result($rs123,0,'lr');
				$pos_cur2[$mcode1[$j]] = mysql_result($rs123,0,'pos_cur2');

			}
		//	echo  $mcode1[$j].' : '.$pos_cur2[$mcode1[$j]].'------------------XXXXXX<br>';
			mysql_free_result($rs123);

			$cnt_l=0;
			$cnt_r=0;
			$cnt_c=0;
			$cnt_all=0;
			$flg=false;
			$flgpv=false;$flg1 = false;	

			$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
			mysql_query($sql);

		//	echo 'mcode =  '. $mcode1[$j].' // weakstrong ='.$weakstrong.' // mpv '.$mexp.' // cnt_all '.$cnt_all.'  // pos_old '.$pos_old.'  '.$flg1. ' : '.$pos_cur2[$mcode1[$j]].'----- MGMGMG<br>';	
			$sql1="SELECT mcode,pos_cur2,lr FROM ".$dbprefix."member WHERE sp_code='".$mcode1[$j]."' ";
			//echo "2 : $sql1<BR>";
			$rs1 = mysql_query($sql1);
			for($n=0;$n<mysql_num_rows($rs1);$n++){
				$sqlObj1 = mysql_fetch_object($rs1);
				$n_sp_code =$sqlObj1->mcode;
				$n_sp_pos_cur =$sqlObj1->pos_cur2;
				
				$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
				//echo "3 : $sql2<BR>";
				$rs2 = mysql_query($sql2);
				for($i=0;$i<mysql_num_rows($rs2);$i++){
					$sqlObj2 = mysql_fetch_object($rs2);
					$up_mcode =$sqlObj2->upa_code;
					$uplr=$sqlObj2->lr;
					$up=$up_mcode;
					while($up <> ""){
						if($up==$mcode1[$j]){
							$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
							$sql .= "(".$ro.",'$n_sp_code','$mcode1[$j]','".$uplr."','$n_sp_pos_cur') ";
							mysql_query($sql);
							//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
							$up="";
						}else{
							$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
							$rs3 = mysql_query($sql3);
							if($row3 = mysql_fetch_object($rs3)){
								$up = $row3->upa_code;
								$uplr=$row3->lr;
							} else {
								$up = "";
							}
							mysql_free_result($rs3);
						}
					}
				}
				mysql_free_result($rs2);

			}
			mysql_free_result($rs1);
		//	echo 'mcode =  '. $mcode1[$j].' // weakstrong ='.$weakstrong.' // mpv '.$mexp.' // cnt_all '.$cnt_all.'  // pos_old '.$pos_old.'  '.$flg1. ' : '.$pos_cur2[$mcode1[$j]].'----- MGMGMG<br>';	
			$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode1[$j]."' ";
			$rs123 = mysql_query($sql);
			for($n=0;$n<mysql_num_rows($rs123);$n++){
				$row = mysql_fetch_object($rs123);
				$p_mcode=$row->mcode;
				$p_pos_cur=$row->pos_cur;
				$p_lr=$row->lr;
			
				switch ($p_pos_cur){
					case 'MG':
							if($p_lr==1){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==2){
								$cnt_c=($cnt_c+1);
							}elseif($p_lr==3){
								$cnt_r=($cnt_r+1);
							}
						break;
					case 'D':
							if($p_lr==1){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==2){
								$cnt_c=($cnt_c+1);
							}elseif($p_lr==3){
								$cnt_r=($cnt_r+1);
							}
						break;
					case 'AD':
							if($p_lr==1){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==2){
								$cnt_c=($cnt_c+1);
							}elseif($p_lr==3){
								$cnt_r=($cnt_r+1);
							}
						break;
					case 'RD':
							if($p_lr==1){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==2){
								$cnt_c=($cnt_c+1);
							}elseif($p_lr==3){
								$cnt_r=($cnt_r+1);
							}
						break;
								
					default:
						break;
				}
				
			}
			mysql_free_result($rs123);
			$cnt_all = $cnt_l+$cnt_r+$cnt_c;
		//	if($mcode1[$j])echo 'abc';
			$weakstrong = getweakstrong($dbprefix,$mcode1[$j],$fdate,$tdate,$ro);
			$flg=false;
			$flg1 = false;
			//echo 'mcode =  '. $mcode1[$j].' // weakstrong ='.$weakstrong.' // mpv '.$mexp.' // cnt_all '.$cnt_all.'  // pos_old '.$pos_old.'  '.$flg1. ' : '.$pos_cur2[$mcode1[$j]].'----- MGMGMG<br>';	
			if($cnt_all>=2 and $weakstrong >= 100000 and $mexp >= 5000 and $pos_old == 'MG'){
				$flg1=true;
				$pos_new="D";
			}
			//echo 'mcode =  '. $mcode1[$j].' // weakstrong ='.$weakstrong.' // mpv '.$mexp.' // cnt_all '.$cnt_all.'  // pos_old '.$pos_old.'  '.$flg1. ' : '.$pos_cur2[$mcode1[$j]].'----- MGMGMG<br>';	
			if($cnt_all>=3 and $weakstrong >= 200000 and $mexp >= 5000 and $pos_old == 'D'){
				$flg1=true;
				$pos_new="AD";
			}
			//echo 'mcode =  '. $mcode1[$j].' // weakstrong ='.$weakstrong.' // mpv '.$mexp.' // cnt_all '.$cnt_all.'  // pos_old '.$pos_old.'  '.$flg1. ' : '.$pos_cur2[$mcode1[$j]].'----- MGMGMG<br>';	
			if($cnt_all>=4 and $weakstrong >= 300000 and $mexp >= 5000 and $pos_old == 'AD'){
				$flg1=true;
				$pos_new="RD";
			}
			//echo 'mcode =  '. $mcode1[$j].' // weakstrong ='.$weakstrong.' // mpv '.$mexp.' // cnt_all '.$cnt_all.'  // pos_old '.$pos_old.'  '.$flg1. ' : '.$pos_cur2[$mcode1[$j]].'----- MGMGMG<br>';	

		if($flg1==true){
			if($pos_new != $pos_old and $pos_piority[$pos_new]>$pos_piority[$pos_old] ){	
				$pos_old=$pos_cur[$j];
				$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new',pos_cur2='$pos_new' WHERE mcode='".$mcode1[$j]."' LIMIT 1 ";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$sql = "INSERT INTO ".$dbprefix."calc_poschange1 (rcode,mcode,pos_before,pos_after,date_change) ";
				$sql .= "VALUES('$ro','".$mcode1[$j]."','".$pos_old."','".$pos_new."','".$fdate."')";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$sql = "INSERT INTO ".$dbprefix."pospv (rcode,mcode,opos,npos,sp_code,lr,fdate,tdate,status) ";
				$sql .= "VALUES('$ro','".$mcode1[$j]."','".$pos_old."','".$pos_new."','".$sp_code[$mcode1[$j]]."','".$lr[$mcode1[$j]]."','".$fdate."','".$tdate."','1')";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
		echo 'ขึ้นตำแหน่ง  mcode =  '. $mcode1[$j].' // weakstrong ='.$weakstrong.' // mpv '.$mexp.' // cnt_all '.$cnt_all.'  // pos_old '.$pos_old.'  '.$flg1. '<br>';

				$pos_cur[$j] = $pos_new;
			}else{

				$sql = "UPDATE ".$dbprefix."member SET pos_cur2='$pos_new' WHERE mcode='".$mcode1[$j]."' LIMIT 1 ";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$sql = "INSERT INTO ".$dbprefix."pospv (rcode,mcode,opos,npos,sp_code,lr,fdate,tdate,status) ";
				$sql .= "VALUES('$ro','".$mcode1[$j]."','".$pos_old."','".$pos_new."','".$sp_code[$mcode1[$j]]."','".$lr[$mcode1[$j]]."','".$fdate."','".$tdate."','0')";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
		echo 'ยกไป  mcode =  '. $mcode1[$j].' // weakstrong ='.$weakstrong.' // mpv '.$mexp.' // cnt_all '.$cnt_all.'  // pos_old '.$pos_old.'  '.$flg1. '<br>';

				mysql_query($sql);
			}
		}
		
	}
	/////////////////////////// Finish Process 4 Upgrade D,SP,RD

	/////////////////////////// Start Process 5 Upgrade ND,CD,GD,GEP
	$sql="SELECT * FROM ".$dbprefix."pospv WHERE rcode='$ro' AND npos = 'RD' and status='0'";
	$rs = mysql_query($sql);
	for($j=0;$j<mysql_num_rows($rs);$j++){

			$sqlObj = mysql_fetch_object($rs);
			$pos_cur[$j] =$sqlObj->npos;
			$mcode1[$j] =$sqlObj->mcode;		
			$name_t[$j] =$sqlObj->name_t;
			$sp_code1[$mcode1[$j]] = $sqlObj->sp_code;
			$lr1[$mcode1[$j]] = $sqlObj->lr;

			$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE mcode='".$mcode1[$j]."' and cancel=0 and trnf = 0  and sadate<='".$tdate."' and sa_type='A' ";
			$rs123 = mysql_query($sql);
			$mexp = 0;
			if(mysql_num_rows($rs123)>0) $mexp = mysql_result($rs123,0,'pv');
			mysql_free_result($rs123);

			$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode1[$j]."'  and sadate<='".$tdate."' and sa_type='A' and cancel=0 ";
			$rs123 = mysql_query($sql);
			$mexph = 0;
			if(mysql_num_rows($rs123)>0) {
				$mexph = mysql_result($rs123,0,'pv');
			}
			mysql_free_result($rs123);
			$mexp=($mexp+$mexph);
			$mexp = $mexp+gettotalpv($dbprefix,$mcode1[$j]);  
			$mexp1=($mexp+$mexph);
			
			//-----เก็บตำแหน่งปัจจุบัน
			$sql = "SELECT pos_cur,sp_code,name_t,lr,pos_cur2 from ".$dbprefix."member WHERE mcode='".$mcode1[$j]."'  ";
			$rs123 = mysql_query($sql);
			$pos_old = '';
			if(mysql_num_rows($rs123)>0) {
				$pos_old = mysql_result($rs123,0,'pos_cur');
				$sp_code[$mcode1[$j]] = mysql_result($rs123,0,'sp_code');
				$name_t[$j] = mysql_result($rs123,0,'name_t');
				$lr1[$mcode1[$j]] = mysql_result($rs123,0,'lr');
				$pos_cur2[$mcode1[$j]] = mysql_result($rs123,0,'pos_cur2');
			}
			mysql_free_result($rs123);

			$cnt_l=0;
			$cnt_r=0;
			$cnt_c=0;
			$cnt_l_D= 0;
			$cnt_r_D= 0;
			$cnt_c_D= 0;

			$flg=false;
			$flgpv=false;$flg1 = false;	

			$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
			mysql_query($sql);

//			$sql1="SELECT * FROM ".$dbprefix."pospv WHERE sp_code='".$mcode1[$j]."' and rcode = '$ro' ";
			$sql1="SELECT mcode,pos_cur2,lr FROM ".$dbprefix."member WHERE sp_code='".$mcode1[$j]."' ";
			//echo "2 : $sql1<BR>";
			$rs1 = mysql_query($sql1);
			for($n=0;$n<mysql_num_rows($rs1);$n++){
				$sqlObj1 = mysql_fetch_object($rs1);
				$n_sp_code =$sqlObj1->mcode;
				$n_sp_pos_cur =$sqlObj1->pos_cur2;
				
				$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
				//echo "3 : $sql2<BR>";
				$rs2 = mysql_query($sql2);
				for($i=0;$i<mysql_num_rows($rs2);$i++){
					$sqlObj2 = mysql_fetch_object($rs2);
					$up_mcode =$sqlObj2->upa_code;
					$uplr=$sqlObj2->lr;
					$up=$up_mcode;
					while($up <> ""){
						if($up==$mcode1[$j]){
							$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
							$sql .= "(".$ro.",'$n_sp_code','$mcode1[$j]','".$uplr."','$n_sp_pos_cur') ";
							mysql_query($sql);
							//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
							$up="";
						}else{
							$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
							$rs3 = mysql_query($sql3);
							if($row3 = mysql_fetch_object($rs3)){
								$up = $row3->upa_code;
								$uplr=$row3->lr;
							} else {
								$up = "";
							}
							mysql_free_result($rs3);
						}
					}
				}
				mysql_free_result($rs2);

			}
			mysql_free_result($rs1);

			$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode1[$j]."' ";
			$rs123 = mysql_query($sql);
			for($n=0;$n<mysql_num_rows($rs123);$n++){
				$row = mysql_fetch_object($rs123);
				$p_mcode=$row->mcode;
				$p_pos_cur=$row->pos_cur;
				$p_lr=$row->lr;
				switch ($p_pos_cur){
					case 'MG':
							if($p_lr==1){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==2){
								$cnt_c=($cnt_c+1);
							}elseif($p_lr==3){
								$cnt_r=($cnt_r+1);
							}
							break;
					case 'D':
							if($p_lr==1){
								$cnt_l_D=($cnt_r_D+1);
							}elseif($p_lr==2){
								$cnt_c_D=($cnt_r_D+1);
							}elseif($p_lr==3){
								$cnt_r_D=($cnt_r_D+1);
							}
							break;
					case 'AD':
							if($p_lr==1){
								$cnt_l_D=($cnt_r_D+1);
							}elseif($p_lr==2){
								$cnt_c_D=($cnt_r_D+1);
							}elseif($p_lr==3){
								$cnt_r_D=($cnt_r_D+1);
							}break;
					case 'RD':
							if($p_lr==1){
								$cnt_l_D=($cnt_r_D+1);
							}elseif($p_lr==2){
								$cnt_c_D=($cnt_r_D+1);
							}elseif($p_lr==3){
								$cnt_r_D=($cnt_r_D+1);
							}break;
					case 'ND':
							if($p_lr==1){
								$cnt_l_D=($cnt_r_D+1);
							}elseif($p_lr==2){
								$cnt_c_D=($cnt_r_D+1);
							}elseif($p_lr==3){
								$cnt_r_D=($cnt_r_D+1);
							}break;
					case 'CD':
							if($p_lr==1){
								$cnt_l_D=($cnt_r_D+1);
							}elseif($p_lr==2){
								$cnt_c_D=($cnt_r_D+1);
							}elseif($p_lr==3){
								$cnt_r_D=($cnt_r_D+1);
							}break;
					case 'GD':
							if($p_lr==1){
								$cnt_l_D=($cnt_r_D+1);
							}elseif($p_lr==2){
								$cnt_c_D=($cnt_r_D+1);
							}elseif($p_lr==3){
								$cnt_r_D=($cnt_r_D+1);
							}
					break;

								
					default:
						break;
				}
				
			}
			mysql_free_result($rs123);
			$cnt_all_MG = $cnt_l+$cnt_r+$cnt_c+$cnt_l_D+$cnt_r_D+$cnt_c_D;
			$cnt_all_D = $cnt_l_D+$cnt_r_D+$cnt_c_D;
			$weakstrong = getweakstrong($dbprefix,$mcode1[$j],$fdate,$tdate,$ro);
			$flg=false;
			$flg1 = false;
			if($cnt_all_MG>=5 and $cnt_all_D >=1 and $weakstrong >= 500000 and $mexp >= 5000 and $pos_old == 'RD'){
				$flg1=true;
				$pos_new="ND";
			}
			if($cnt_all_MG>=6 and $cnt_all_D >=1 and $weakstrong >= 1000000 and $mexp >= 5000 and $pos_old == 'ND'){
				$flg1=true;
				$pos_new="CD";
			}
			if($cnt_all_MG>=7 and $cnt_all_D >=1 and $weakstrong >= 2000000 and $mexp >= 5000 and $pos_old == 'CD'){
				$flg1=true;
				$pos_new="GD";
			}
		
		if($flg1==true){
			if($pos_new != $pos_old and $pos_piority[$pos_new]>$pos_piority[$pos_old] ){	
				$pos_old=$pos_cur[$j];
				$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new',pos_cur2='$pos_new' WHERE mcode='".$mcode1[$j]."' LIMIT 1 ";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$sql = "INSERT INTO ".$dbprefix."calc_poschange1 (rcode,mcode,pos_before,pos_after,date_change) ";
				$sql .= "VALUES('$ro','".$mcode1[$j]."','".$pos_old."','".$pos_new."','".$fdate."')";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$sql = "INSERT INTO ".$dbprefix."pospv (rcode,mcode,opos,npos,sp_code,lr,fdate,tdate,status) ";
				$sql .= "VALUES('$ro','".$mcode1[$j]."','".$pos_old."','".$pos_new."','".$sp_code[$mcode1[$j]]."','".$lr[$mcode1[$j]]."','".$fdate."','".$tdate."','1')";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$pos_cur[$j] = $pos_new;
			}else{
				$sql = "UPDATE ".$dbprefix."member SET pos_cur2='$pos_new' WHERE mcode='".$mcode1[$j]."' LIMIT 1 ";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$sql = "INSERT INTO ".$dbprefix."pospv (rcode,mcode,opos,npos,sp_code,lr,fdate,tdate,status) ";
				$sql .= "VALUES('$ro','".$mcode1[$j]."','".$pos_old."','".$pos_new."','".$sp_code[$mcode1[$j]]."','".$lr[$mcode1[$j]]."','".$fdate."','".$tdate."','0')";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
			}
		}
		
	}
	echo 'Process 5 start <br>';
	/////////////////////////// Finish Process 5 Upgrade D,SP,RD
/////////////////////////// Start Process 5 Upgrade ND,CD,GD,GEP
	$sql="SELECT * FROM ".$dbprefix."pospv WHERE rcode='$ro' AND  npos = 'GD' and status='0'";
	$rs = mysql_query($sql);
	for($j=0;$j<mysql_num_rows($rs);$j++){

			$sqlObj = mysql_fetch_object($rs);
			$pos_cur[$j] =$sqlObj->npos;
			$mcode1[$j] =$sqlObj->mcode;		
			$name_t[$j] =$sqlObj->name_t;
			$sp_code1[$mcode1[$j]] = $sqlObj->sp_code;
			$lr1[$mcode1[$j]] = $sqlObj->lr;

			$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE mcode='".$mcode1[$j]."' and cancel=0 and trnf = 0  and sadate<='".$tdate."' and sa_type='A' ";
			$rs123 = mysql_query($sql);
			$mexp = 0;
			if(mysql_num_rows($rs123)>0) $mexp = mysql_result($rs123,0,'pv');
			mysql_free_result($rs123);

			$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode1[$j]."'  and sadate<='".$tdate."' and sa_type='A' and cancel=0 ";
			$rs123 = mysql_query($sql);
			$mexph = 0;
			if(mysql_num_rows($rs123)>0) {
				$mexph = mysql_result($rs123,0,'pv');
			}
			mysql_free_result($rs123);
			$mexp=($mexp+$mexph);
			$mexp = $mexp+gettotalpv($dbprefix,$mcode1[$j]);  
			$mexp1=($mexp+$mexph);
			
			//-----เก็บตำแหน่งปัจจุบัน
			$sql = "SELECT pos_cur,sp_code,name_t,lr,pos_cur2 from ".$dbprefix."member WHERE mcode='".$mcode1[$j]."'  ";
			$rs123 = mysql_query($sql);
			$pos_old = '';
			if(mysql_num_rows($rs123)>0) {
				$pos_old = mysql_result($rs123,0,'pos_cur');
				$sp_code[$mcode1[$j]] = mysql_result($rs123,0,'sp_code');
				$name_t[$j] = mysql_result($rs123,0,'name_t');
				$lr1[$mcode1[$j]] = mysql_result($rs123,0,'lr');
				$pos_cur2[$mcode1[$j]] = mysql_result($rs123,0,'pos_cur2');
			}
			mysql_free_result($rs123);

			$cnt_l=0;
			$cnt_r=0;
			$cnt_c=0;
			$cnt_l_D= 0;
			$cnt_r_D= 0;
			$cnt_c_D= 0;
			$flg=false;
			$flgpv=false;$flg1 = false;	

			$sql = "TRUNCATE TABLE ".$dbprefix."cnt_spcode ";
			mysql_query($sql);

//			$sql1="SELECT * FROM ".$dbprefix."pospv WHERE sp_code='".$mcode1[$j]."' and rcode = '$ro' ";
			$sql1="SELECT mcode,pos_cur2,lr FROM ".$dbprefix."member WHERE sp_code='".$mcode1[$j]."' ";
			//echo "2 : $sql1<BR>";
			$rs1 = mysql_query($sql1);
			for($n=0;$n<mysql_num_rows($rs1);$n++){
				$sqlObj1 = mysql_fetch_object($rs1);
				$n_sp_code =$sqlObj1->mcode;
				$n_sp_pos_cur =$sqlObj1->pos_cur2;
				
				$sql2="SELECT * FROM ".$dbprefix."member WHERE mcode='".$n_sp_code."' ";
				//echo "3 : $sql2<BR>";
				$rs2 = mysql_query($sql2);
				for($i=0;$i<mysql_num_rows($rs2);$i++){
					$sqlObj2 = mysql_fetch_object($rs2);
					$up_mcode =$sqlObj2->upa_code;
					$uplr=$sqlObj2->lr;
					$up=$up_mcode;
					while($up <> ""){
						if($up==$mcode1[$j]){
							$sql = "INSERT INTO ".$dbprefix."cnt_spcode (rcode,mcode,sp_code,lr,pos_cur) VALUES";
							$sql .= "(".$ro.",'$n_sp_code','$mcode1[$j]','".$uplr."','$n_sp_pos_cur') ";
							mysql_query($sql);
							//echo "ตรวจสอบคุณสมบัติ : $sql <br>";
							$up="";
						}else{
							$sql3=" SELECT * from  ".$dbprefix."member where mcode = '$up' ";
							$rs3 = mysql_query($sql3);
							if($row3 = mysql_fetch_object($rs3)){
								$up = $row3->upa_code;
								$uplr=$row3->lr;
							} else {
								$up = "";
							}
							mysql_free_result($rs3);
						}
					}
				}
				mysql_free_result($rs2);

			}
			mysql_free_result($rs1);

			$sql="SELECT mcode,pos_cur,lr FROM ".$dbprefix."cnt_spcode WHERE sp_code='".$mcode1[$j]."' ";
			$rs123 = mysql_query($sql);
			for($n=0;$n<mysql_num_rows($rs123);$n++){
				$row = mysql_fetch_object($rs123);
				$p_mcode=$row->mcode;
				$p_pos_cur=$row->pos_cur;
				$p_lr=$row->lr;
				switch ($p_pos_cur){
					case 'MG':
							if($p_lr==1){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==2){
								$cnt_c=($cnt_c+1);
							}elseif($p_lr==3){
								$cnt_r=($cnt_r+1);
							}break;
					case 'D':
							if($p_lr==1){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==2){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==3){
								$cnt_l=($cnt_l+1);
							}break;
					case 'AD':
							if($p_lr==1){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==2){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==3){
								$cnt_l=($cnt_l+1);
							}break;
					case 'RD':
							if($p_lr==1){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==2){
								$cnt_l=($cnt_l+1);
							}elseif($p_lr==3){
								$cnt_l=($cnt_l+1);
							}break;
					case 'ND':
							if($p_lr==1){
								$cnt_l_D=($cnt_r_D+1);
							}elseif($p_lr==2){
								$cnt_c_D=($cnt_r_D+1);
							}elseif($p_lr==3){
								$cnt_r_D=($cnt_r_D+1);
							}break;
					case 'CD':
							if($p_lr==1){
								$cnt_l_D=($cnt_r_D+1);
							}elseif($p_lr==2){
								$cnt_c_D=($cnt_r_D+1);
							}elseif($p_lr==3){
								$cnt_r_D=($cnt_r_D+1);
							}break;
					case 'GD':
							if($p_lr==1){
								$cnt_l_D=($cnt_r_D+1);
							}elseif($p_lr==2){
								$cnt_c_D=($cnt_r_D+1);
							}elseif($p_lr==3){
								$cnt_r_D=($cnt_r_D+1);
							}break;
					case 'GEP':
							if($p_lr==1){
								$cnt_l_D=($cnt_r_D+1);
							}elseif($p_lr==2){
								$cnt_c_D=($cnt_r_D+1);
							}elseif($p_lr==3){
								$cnt_r_D=($cnt_r_D+1);
							}
					break;
								
					default:
						break;
				}
				
			}
			mysql_free_result($rs123);
			$cnt_all_MG = $cnt_l+$cnt_r+$cnt_c+$cnt_l_ND+$cnt_r_ND+$cnt_c_ND;
			$cnt_all_ND = $cnt_l_ND+$cnt_r_ND+$cnt_c_ND;
			$weakstrong = getweakstrong($dbprefix,$mcode1[$j],$fdate,$tdate,$ro);
			$flg=false;
			$flg1 = false;
			if($cnt_all_MG>=7 and $cnt_all_ND >=1 and $weakstrong >= 4000000 and $mexp >= 5000 and $pos_old == 'GD'){
				$flg1=true;
				$pos_new="GEP";
			}
		
		
		if($flg1==true){
			if($pos_new != $pos_old and $pos_piority[$pos_new]>$pos_piority[$pos_old] ){	
				$pos_old=$pos_cur[$j];
				$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new',pos_cur2='$pos_new' WHERE mcode='".$mcode1[$j]."' LIMIT 1 ";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$sql = "INSERT INTO ".$dbprefix."calc_poschange1 (rcode,mcode,pos_before,pos_after,date_change) ";
				$sql .= "VALUES('$ro','".$mcode1[$j]."','".$pos_old."','".$pos_new."','".$fdate."')";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$sql = "INSERT INTO ".$dbprefix."pospv (rcode,mcode,opos,npos,sp_code,lr,fdate,tdate,status) ";
				$sql .= "VALUES('$ro','".$mcode1[$j]."','".$pos_old."','".$pos_new."','".$sp_code[$mcode1[$j]]."','".$lr[$mcode1[$j]]."','".$fdate."','".$tdate."','1')";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$pos_cur[$j] = $pos_new;
			}else{
				$sql = "UPDATE ".$dbprefix."member SET pos_cur2='$pos_new' WHERE mcode='".$mcode1[$j]."' LIMIT 1 ";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
				$sql = "INSERT INTO ".$dbprefix."pospv (rcode,mcode,opos,npos,sp_code,lr,fdate,tdate,status) ";
				$sql .= "VALUES('$ro','".$mcode1[$j]."','".$pos_old."','".$pos_new."','".$sp_code[$mcode1[$j]]."','".$lr[$mcode1[$j]]."','".$fdate."','".$tdate."','0')";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);
			}
		}
		
	}
	/////////////////////////// Finish Process 5 Upgrade D,SP,RD

}

function fnc_calc_matching($dbprefix,$ro,$n_mcode,$n_name_t,$n_upa_code,$n_lr,$fdate,$tdate,$fpdate,$tpdate){
//อ่านข้อมูลรายได้จาก bmbonus
$month=explode("-",$fdate);
echo  '*******************   Start  == matching  **************************   <br> <br>';
$array_mpos =
$pos_explv1 = array('MB'=>0,'BR'=>0,'SI'=>0,'GO'=>0,'PL'=>1.0,'SA'=>1.0,'RU'=>1.0,'EM'=>1.0,'DI'=>1.0,'DD'=>1.0,'CD'=>1.0);
$pos_explv2 = array('MB'=>0,'BR'=>0,'SI'=>0,'GO'=>0,'PL'=>0,'SA'=>0.3,'RU'=>0.3,'EM'=>0.3,'DI'=>0.3,'DD'=>0.3,'CD'=>0.3);
$pos_explv3 = array('MB'=>0,'BR'=>0,'SI'=>0,'GO'=>0,'PL'=>0,'SA'=>0,'RU'=>0.2,'EM'=>0.2,'DI'=>0.2,'DD'=>0.2,'CD'=>0.2);

	$sql="select mcode, total_pv_l AS total_pvl,total_pv_r AS total_pvr from ".$dbprefix."bmbonus WHERE tdate >= '".$fdate."' and tdate <= '".$tdate."' and total > 0 ";
	echo $sql;
	$rs = mysql_query($sql);
		//echo "$sql<BR>";
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$bmcode =$sqlObj->mcode;		
			$btotal_pv_l = $sqlObj->total_pvl;
			$btotal_pv_r = $sqlObj->total_pvr;
			$btotal_pv = min($btotal_pv_l,$btotal_pv_r);			
			if($btotal_pv >0){
				$sql = " insert into ".$dbprefix."dpv  (rcode, mcode,total_pv) VALUES ('$ro','$bmcode','$btotal_pv') ";
				mysql_query($sql) or die(mysql_error());
			}
	}
	mysql_free_result($rs);

	$maxlv=3;
	$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
	$rs = mysql_query($sql);
		//echo "$sql<BR>";
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$n_mcode[$i] =$sqlObj->mcode;		
			$n_name_t[$i] =$sqlObj->name_t;		
			$n_poscur[$n_mcode[$i]] =$sqlObj->pos_cur;		
			$n_upa_code[$n_mcode[$i]] = $sqlObj->sp_code;
			$n_lr[$n_mcode[$i]] = $sqlObj->lr;
			$c_spcode[$n_mcode[$i]] = getsponsor($dbprefix,$n_mcode[$i]);
	}
	mysql_free_result($rs);

	
		$sql="select * from ".$dbprefix."dpv where rcode = '$ro' "; 
		//echo "$sql<BR>";
		//exit;
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj			= mysql_fetch_object($rs);
			$apv_rcode		= $sqlObj->rcode;
			$apv_mcode	= $sqlObj->mcode;
			$apv_total_pv	= $sqlObj->total_pv;	
			//echo "dpv : $apv_total_pv = $i<BR> ";
			for($j=0;$j<sizeof($n_mcode);$j++){
				if($n_mcode[$j]<>$apv_mcode){
					//ไม่มี pv
				}else{
					$up	= $n_mcode[$j];
					//echo "มีบิลขาย : $up<BR>";
					$lv	 	= 0;
					$glv	=1;
					//if($j == '5'){echo 'sssssssssss';exit;}
					while($up <> "" and $up != '0000000'){
						if($n_upa_code[$up] <>"" and $n_upa_code[$up] != '0000000' && $glv <= $maxlv){
							$lv	= ($lv+1);
							$flg=0;
								
							switch ($glv) {
								case 1 :
										$sql1="SELECT mcode,pos_cur FROM ".$dbprefix."member where mcode='".$n_upa_code[$up]."' and (pos_cur = 'PL' or pos_cur = 'SA' or pos_cur = 'RU' or pos_cur = 'EM' or pos_cur = 'DI' or pos_cur = 'DD' or pos_cur = 'CD' ) ";
										//echo  "$sql1<br>";
										$rs1 = mysql_query($sql1);
										if (mysql_num_rows($rs1)>0) {
											$sqlObj1 = mysql_fetch_object($rs1);
											$d_mcode=$sqlObj1->mcode;
											$d_pos_cur=$sqlObj1->pos_cur;
											$flg=1;
											}
																				
											$bonus = $pos_explv1[$d_pos_cur];
											$apv_total = ($apv_total_pv*$bonus);
									break;
								case 2 :
										$sql1="SELECT mcode,pos_cur FROM ".$dbprefix."member where mcode='".$n_upa_code[$up]."' and ( pos_cur = 'SA' or pos_cur = 'RU' or pos_cur = 'EM' or pos_cur = 'DI' or pos_cur = 'DD' or pos_cur = 'CD' ) ";
										//echo  "$sql1<br>";
										$rs1 = mysql_query($sql1);
										if (mysql_num_rows($rs1)>0 ) {
											$sqlObj1 = mysql_fetch_object($rs1);
											$d_mcode=$sqlObj1->mcode;
											$d_pos_cur=$sqlObj1->pos_cur;
											$flg=1;
										}
																						
											$bonus = $pos_explv2[$d_pos_cur];
											$apv_total = ($apv_total_pv*$bonus);
									break;
								case 3 :
										$sql1="SELECT mcode,pos_cur FROM ".$dbprefix."member where mcode='".$n_upa_code[$up]."' and ( pos_cur = 'RU' or pos_cur = 'EM' or pos_cur = 'DI' or pos_cur = 'DD' or pos_cur = 'CD' )";
										//echo  "$sql1<br>";
										$rs1 = mysql_query($sql1);
										if (mysql_num_rows($rs1)>0) {
											$sqlObj1 = mysql_fetch_object($rs1);
											$d_mcode=$sqlObj1->mcode;
											$d_pos_cur=$sqlObj1->pos_cur;
											$flg=1;
										}										
											$bonus = $pos_explv3[$d_pos_cur];
											$apv_total = ($apv_total_pv*$bonus);
									break;
								
								default:
									$flg=0;
									$bonus = 0;
									$apv_total =0;
									break;
							}
							//echo $c_spcode[$n_upa_code[$up]]." ตรวจสอบรหัส <1> $d_mcode ตำแหน่ง $d_pos_cur ssssssssssssssssssssssssssssssssss <br>";
							$sql2 = "SELECT * from ".$dbprefix."status WHERE mcode='".$d_mcode."' and month_pv='".$month[0].$month[1]."' and status='1' ";
							//
							//echo  "$sql2<br>";
							//exit;
							$rs2=mysql_query($sql2);
							//or $n_upa_code[$up] == 'TH0000000'
							if (mysql_num_rows($rs2)>0 and  $flg == 1 ) {

							//echo $c_spcode[$n_upa_code[$up]]." ตรวจสอบรหัส <1> $d_mcode ตำแหน่ง $d_pos_cur ssssssssssssssssssssssssssssssssss <br>";
								$sql = " INSERT INTO ".$dbprefix."dc (rcode, mcode, upa_code,pv,level,gen, percer, total,fdate,tdate,mposi) VALUES ('$ro','".$n_mcode[$j]."','".$n_upa_code[$up]."','".$apv_total_pv."','".$glv."','".$lv."','".$bonus."','".$apv_total."','$fdate','$tdate','$d_pos_cur') ";
								mysql_query($sql) or die(mysql_error());
								//echo "$sql<br>";
								
							}
							else {
								$sql = " INSERT INTO ".$dbprefix."dc1 (rcode, mcode, upa_code,pv,level,gen, percer, total,fdate,tdate,mposi) VALUES ('$ro','".$n_mcode[$j]."','".$n_upa_code[$up]."','".$apv_total_pv."','".$glv."','".$lv."','".$bonus."','".$apv_total."','$fdate','$tdate','$d_pos_cur') ";
								mysql_query($sql) or die(mysql_error());

							}
							$glv=($glv+1);
							
							//$lv = $lv+1;
							mysql_free_result($rs2);
						}
						$up = $n_upa_code[$up];
					}
				}
			}
			
		} 
		mysql_free_result($rs);

		//คำนวณโบนัส สรุปจ่ายโบนัส		
		$sql = " insert into ".$dbprefix."dmbonus  (rcode, mcode, total,tax,bonus,fdate,tdate,pos_cur) ";
		$sql .= "	select '$ro', upa_code,sum(total) as totalpv,sum(total)*5/100 as tax,sum(total)-sum(total)*5/100 as bonus,'$fdate','$tdate',mposi from ".$dbprefix."dc WHERE  rcode='$ro' group by upa_code ";
		mysql_query($sql) or die(mysql_error());

		$sql = " insert into ".$dbprefix."dmbonus1  (rcode, mcode, total,tax,bonus,fdate,tdate,pos_cur) ";
		$sql .= "	select '$ro', upa_code,sum(total) as totalpv,sum(total)*5/100 as tax,sum(total)-sum(total)*5/100 as bonus,'$fdate','$tdate',mposi from ".$dbprefix."dc1 WHERE  rcode='$ro' group by upa_code ";
		mysql_query($sql) or die(mysql_error());

}


function fnc_calc_onetimebonus($dbprefix,$ro,$n_mcode,$n_name_t,$n_upa_code,$n_lr,$fdate,$tdate,$fpdate,$tpdate){
//อ่านข้อมูลรายได้จาก bmbonus
$month=explode("-",$fdate);
	$pos_piority = array('RD'=>7,'PD'=>6,'ID'=>5,'CD'=>4,'BL'=>3,'BD'=>2,'DI'=>1,''=>0);
	$pos_total = array('RD'=>10000000,'PD'=>5000000,'ID'=>2400000,'CD'=>1200000,'BL'=>600000,'BD'=>300000,'DI'=>150000,''=>0);

	$sql="SELECT * FROM ".$dbprefix."member where pos_cur2 = 'DI' or  pos_cur2 = 'BD' or  pos_cur2 = 'BL' or  pos_cur2 = 'CD' or  pos_cur2 = 'ID' or  pos_cur2 = 'PD' or  pos_cur2 = 'RD' ORDER BY lr DESC";
	$rs = mysql_query($sql);
		//echo "$sql<BR>";
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode[$i] =$sqlObj->mcode;		
			$name_t[$mcode[$i]] =$sqlObj->name_t;		
			$upa_code[$mcode[$i]] = $sqlObj->sp_code;
			$pos_cur3[$mcode[$i]] = $sqlObj->pos_cur3;
			$pos_cur2[$mcode[$i]] = $sqlObj->pos_cur3;
			$lr[$n_mcode[$i]] = $sqlObj->lr;
	}
	mysql_free_result($rs);

		for($j=0;$j<sizeof($mcode);$j++){
			$sql = "SELECT pos_cur3 from ".$dbprefix."member WHERE mcode='".$mcode[$j]."' ";
			$rs = mysql_query($sql);
			//echo $sql.'<br>';
			$pos_old = '';
			if(mysql_num_rows($rs)>0) {
				$pos_old = mysql_result($rs,0,'pos_cur3');
				mysql_free_result($rs);
			}
			//คำนวณตำแหน่ง
			$pos_new = $pos_old;

			$sql = "SELECT * from ".$dbprefix."calc_poschange3 WHERE mcode='".$mcode[$j]."' order by id desc ";
			$rs = mysql_query($sql);
			//echo $sql.'<br>';
			//exit;
			if(mysql_num_rows($rs)>0) {
				$startrcode = mysql_result($rs,0,'rcode');
				mysql_free_result($rs);
			}

			$pos_new = calc_onetime($dbprefix,$mcode[$j],$lastmonth,$lastmonth1,$ro,$pos_old,$startrcode);
				
			if($pos_new != $pos_old and $pos_piority[$pos_new]>$pos_piority[$pos_old]){
				$sql = "UPDATE ".$dbprefix."member SET pos_cur3='$pos_new' WHERE mcode='".$mcode[$j]."' LIMIT 1 ";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);

				$sql = "UPDATE ".$dbprefix."calc_poschange2 SET status='1' WHERE mcode='".$mcode[$j]."' where rcode = '$ro' LIMIT 1 ";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);

				$sql = "INSERT INTO ".$dbprefix."calc_poschange3 (rcode,mcode,name_t,pos_before,pos_after,date_change) ";
				$sql .= "VALUES('$ro','".$mcode[$j]."','".$name_t[$mcode[$j]]."','".$pos_old."','".$pos_new."','".$tdate."')";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				$pos_cur[$j] = $pos_new;
				//writelogfile($text);
				//=================END LOG===========================
				$total = $pos_total[$pos_new];
				$tax = $total*0.05;
				$amt = $total-$tax;
				mysql_query($sql);
				$sql = " insert into ".$dbprefix."ombonus  (rcode, mcode, total,tax,bonus,fdate,tdate,pos_cur) ";
				$sql .= " value('$ro','".$mcode[$j]."','$total','$tax','$amt','$fdate','$tdate','$pos_new') ";
				mysql_query($sql) or die(mysql_error());

			}
		}

		//คำนวณโบนัส สรุปจ่ายโบนัส		

} 

function fnc_calc_honorbonus($dbprefix,$ro,$n_mcode,$n_name_t,$n_upa_code,$n_lr,$fdate,$tdate,$fpdate,$tpdate){
//อ่านข้อมูลรายได้จาก bmbonus
$month=explode("-",$fdate);
	$pos_piority = array('RD'=>7,'PD'=>6,'ID'=>5,'CD'=>4,'BL'=>3,'BD'=>2,'DI'=>1,''=>0);
	$pos_total = array('RD'=>10000000,'PD'=>5000000,'ID'=>2400000,'CD'=>1200000,'BL'=>600000,'BD'=>300000,'DI'=>150000,''=>0);
	$pos_piority = array('RD'=>17,'PD'=>16,'ID'=>15,'CD'=>14,'BL'=>13,'BD'=>12,'DI'=>11,'EM'=>10,'SA'=>9,'RU'=>8,'PE'=>7,'PL'=>6,'GO'=>5,'SI'=>4,'BR'=>3,'EX'=>2,'SU'=>1,'MB'=>0);
	$pos_piority1 = array('RDQ2'=>23,'RDQ1'=>22,'PDQ2'=>21,'PDQ1'=>20,'IDQ2'=>19,'IDQ1'=>18,'CDQ2'=>17,'CDQ1'=>16,'BLQ2'=>15,'BLQ1'=>14,'BDQ2'=>13,'BDQ1'=>12,'DIQ2'=>11,'DIQ1'=>10,'EMQ2'=>9,'EMQ1'=>8,'SAQ2'=>7,'SAQ1'=>6,'RUQ2'=>5,'RUQ1'=>4,'PEQ2'=>3,'PEQ1'=>2,'PLQ2'=>1,'PLQ1'=>0);



	$sql="SELECT * FROM ".$dbprefix."calc_poschange2 where rcode = '$ro' and (pos_after = 'BR' or pos_after = 'SI' or pos_after = 'GO' or pos_after = 'PL' or pos_after = 'PE' or pos_after = 'RU' or pos_after = 'SA' or pos_after = 'EM' or pos_after = 'DI' or pos_after = 'BD' or pos_after = 'BL' or pos_after = 'CD' or pos_after = 'ID' or pos_after = 'PD' or pos_after = 'RD') group by mcode ";
	//echo $sql;
	//exit;
	$rs = mysql_query($sql);
		//echo "$sql<BR>";
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode[$i] =$sqlObj->mcode;		
			$sql="SELECT * FROM ".$dbprefix."calc_poschange2 where rcode = '$ro' and (pos_after = 'BR' or pos_after = 'SI' or pos_after = 'GO' or pos_after = 'PL' or pos_after = 'PE' or pos_after = 'RU' or pos_after = 'SA' or pos_after = 'EM' or pos_after = 'DI' or pos_after = 'BD' or pos_after = 'BL' or pos_after = 'CD' or pos_after = 'ID' or pos_after = 'PD' or pos_after = 'RD') and mcode = '".$mcode[$i]."' order by id desc limit 0,1 ";
			$rs1= mysql_query($sql);
			$sqlObj1 = mysql_fetch_object($rs1);

			$name_t[$i] =$sqlObj1->name_t;		
			$pos_new = $pos_after[$mcode[$i]] = $sqlObj1->pos_after;
			$pos_before[$mcode[$i]] = $sqlObj1->pos_before;
			$sql = "SELECT pos_cur4,rpos_cur4,name_t,sp_code from ".$dbprefix."member WHERE mcode='".$mcode[$i]."' ";
			$rs123 = mysql_query($sql);
			$pos_old = '';
			$name_t = '';
			if(mysql_num_rows($rs123)>0) {
				$pos_old = mysql_result($rs123,0,'pos_cur4');
				$rpos_cur4 = mysql_result($rs123,0,'rpos_cur4');
				$name_t = mysql_result($rs123,0,'name_t');
				$sp_code = mysql_result($rs123,0,'sp_code');
				mysql_free_result($rs123);
			}
			if($mcode[$i] == '0000077')echo $mcode[$i].' : '.$pos_old.' : '.$pos_new.'<br>';
			//exit;
			if($pos_new != $pos_old and $pos_piority[$pos_new]>$pos_piority[$pos_old]){
				if($pos_piority[$pos_old] <= 5){
					if($mcode[$i] == '0000077')echo $mcode[$i].' : '.$pos_old.' : '.$pos_new.'<br>';
					//exit;
						if($pos_piority[$pos_new] >= 6)$pos_neww= 'GOQ2';
						else $pos_neww= $pos_new.'Q2';
			
						
						if(!empty($pos_old))$pos_old = $pos_old.'Q2';
						if($mcode[$i] == '0000077')echo $mcode[$i].' : '.$pos_old.' : '.$pos_new.' : '.$pos_neww.'dd<br>';
						if($pos_old != $pos_neww){
							$sql = "INSERT INTO ".$dbprefix."calc_poschange4 (rcode,mcode,pos_before,pos_after,name_t,date_change) ";
							$sql .= "VALUES('$ro','".$mcode[$i]."','".$pos_old."','".$pos_neww."','".$name_t."','".$tdate."')";
							//if($mcode[$i] == '0000008')echo $sql.'11<br>';
							
							mysql_query($sql);
							$sql = "UPDATE ".$dbprefix."member SET pos_cur4='".substr($pos_neww,0,2)."',rpos_cur4 = '$ro' WHERE mcode='".$mcode[$i]."' LIMIT 1 ";
						}
						$pos_old = $pos_neww;
						mysql_query($sql);
						if($pos_piority[$pos_new] >= 6){
							$sql = "INSERT INTO ".$dbprefix."calc_poschange41 (rcode,mcode,opos,npos,name_t,sp_code,lr,fdate,tdate,rpos_cur4) ";
							$sql .= "VALUES('$ro','".$mcode[$i]."','".substr($pos_old,0,2)."','".$pos_new."','".$name_t."','".$sp_code."','".$lr[$mcode[$j]]."','".$fdate."','".$tdate."','$rpos_cur4')";
							mysql_query($sql);
							//if($mcode[$i] == '0000008')echo $sql.'12<br>';
					}
				}else{
					$sql = "INSERT INTO ".$dbprefix."calc_poschange41 (rcode,mcode,opos,npos,name_t,sp_code,lr,fdate,tdate,rpos_cur4) ";
					$sql .= "VALUES('$ro','".$mcode[$i]."','".$pos_old."','".$pos_new."','".$name_t."','".$sp_code."','".$lr[$mcode[$j]]."','".$fdate."','".$tdate."','$rpos_cur4')";
					if($mcode[$i] == '0000077')echo $sql.'13<br>';

					mysql_query($sql);
				}
			}
	}
	mysql_free_result($rs);


		$sql="select * from ".$dbprefix."calc_poschange41 where rcode = '$ro' "; 
		//echo "$sql<BR>";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$nmcode= $sqlObj->mcode;
			$pos_old= $sqlObj->opos;
			//$pos_new= $sqlObj->npos;
			$npos= $sqlObj->npos;
			$name_t= $sqlObj->name_t;
			$sp_code= $sqlObj->sp_code;
			$startrcode= $sqlObj->rpos_cur4;
			//echo $nmcode.' : '.$npos.' : '.$pos_old.'sss<br>';
			if(!empty($npos) and empty($pos_old)){
				$sql = "INSERT INTO ".$dbprefix."calc_poschange4 (rcode,mcode,pos_before,pos_after,name_t,date_change) ";
				$sql .= "VALUES('$ro','".$nmcode."','".$pos_old."','".$npos."Q1','".$name_t."','".$tdate."')";
				//echo $sql;
				mysql_query($sql);				
			}else {
				$pos_old = calc_onetime1($dbprefix,$nmcode,$lastmonth,$lastmonth1,$ro,$pos_old,$npos,$startrcode);

//				if(!empty($pos_old))$pos_old = $pos_old.'Q2';
				$pos_new = $npos.'Q1';
				if($nmcode == '0000008'){
					echo $nmcode.' : '.$npos.' : '.$pos_old.' : '.$pos_new.' : '.$pos_piority1[$pos_new].' : '.$pos_piority1[$pos_old].'4<br>';
					//exit;
				}	
				if($pos_new == $pos_old){
					$sql = "INSERT INTO ".$dbprefix."calc_poschange4 (rcode,mcode,pos_before,pos_after,name_t,date_change) ";
					$sql .= "VALUES('$ro','".$nmcode."','".$pos_old."','".substr($pos_old,0,2)."Q2','".$name_t."','".$tdate."')";
					mysql_query($sql);
					$sql = "UPDATE ".$dbprefix."member SET pos_cur4='".substr($pos_old,0,2)."',rpos_cur4 = '$ro' WHERE mcode='".$nmcode."' LIMIT 1 ";
					mysql_query($sql);
				}else if($pos_new != $pos_old or $pos_piority1[$pos_new]>$pos_piority1[$pos_old]){
					$sql123 = "select  * from ".$dbprefix."member where mcode='".$nmcode."' and pos_cur4 = '".substr($pos_old,0,2)."'  LIMIT 1 ";
					$chkss  =  mysql_query($sql123);
					//if($nmcode == '0000008')echo $sql123.'<br>';
					if(substr($pos_old,2,2)=='Q1' or mysql_num_rows($chkss) <= 0){
						$sql = "INSERT INTO ".$dbprefix."calc_poschange4 (rcode,mcode,pos_before,pos_after,name_t,date_change) ";
						$sql .= "VALUES('$ro','".$nmcode."','".$pos_old."','".substr($pos_old,0,2)."Q2','".$name_t."','".$tdate."')";
						//echo $sql.'1<br>';
						mysql_query($sql);
					}
					$sql = "INSERT INTO ".$dbprefix."calc_poschange4 (rcode,mcode,pos_before,pos_after,name_t,date_change) ";
					$sql .= "VALUES('$ro','".$nmcode."','".substr($pos_old,0,2)."Q2','$pos_new','".$name_t."','".$tdate."')";
					mysql_query($sql);
											//if($nmcode == '0000008')echo $sql.'2<br>';

					$sql = "UPDATE ".$dbprefix."member SET pos_cur4='".substr($pos_old,0,2)."',rpos_cur4 = '$ro' WHERE mcode='".$nmcode."' LIMIT 1 ";
											//if($nmcode == '0000008')echo $sql.'2<br>';

					mysql_query($sql);
				}else {
					if($pos_piority1[$pos_new]<$pos_piority1[$npos.'Q1'])$pos_new1 = substr($npos,0,2)."Q2";
					else $pos_new1 = substr($pos_new,0,2)."Q2";//echo 'sssssss';
					if($pos_new1 != $pos_old or $pos_piority1[$pos_new1]>$pos_piority1[$pos_old]){
						$sql = "INSERT INTO ".$dbprefix."calc_poschange4 (rcode,mcode,pos_before,pos_after,name_t,date_change) ";
						$sql .= "VALUES('$ro','".$nmcode."','".$pos_new."','".$pos_new1."','".$name_t."','".$tdate."')";
						mysql_query($sql);
												//if($nmcode == '0000008')echo $sql.'3<br>';

						$sql = "UPDATE ".$dbprefix."member SET pos_cur4='".substr($pos_new1,0,2)."',rpos_cur4 = '$ro' WHERE mcode='".$nmcode."' LIMIT 1 ";
						mysql_query($sql);
					}
				}

			}
		}

		//คำนวณโบนัส สรุปจ่ายโบนัส		

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

function getweakstrong($dbprefix,$mcode,$fdate,$tdate,$ro){

	$roto = $ro;
	//$rofrom = $ro-3;
	$sql3 = "select mcode, SUM(total_pv_ll) AS tot_pv from ".$dbprefix."bmbonus WHERE   mcode = '$mcode' and fdate between '$fdate' and '$tdate' and total > 0 group by mcode ";
	//echo "$sql3<BR>";
	$rs3=mysql_query($sql3);
	$total_fv3=0;$total_fv31=0;$total_fv32=0;
	if (mysql_num_rows($rs3)>0) {
		$sqlObj3 = mysql_fetch_object($rs3);
		$total_pv_l= $sqlObj3->tot_pv;
		//if($total_fv31 > $total_fv32)$total_fv3 = $total_fv32;
		//else $total_fv3 = $total_fv31;
		//$total_fv3= $total_fv3+$sqlObj3->tot_pv1;
	}else{
		$total_pv_l=0;
	}
	//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_pv_l;
} 
function calc_onetime($dbprefix,$mcode,$lastmonth,$lastmonth1,$ro,$pos_old,$startrcode){
	$pos_piority = array('RD'=>7,'PD'=>6,'ID'=>5,'CD'=>4,'BL'=>3,'BD'=>2,'DI'=>1,''=>0);

/*if(empty($startrcode)){
}else{
	$roto = $ro+2;
	$rofrom = $startrcode+1;
}
*/
	$roto = $ro;
	$rofrom = $ro-1;

if($pos_old == ''){
	$where = " and (pos_after = 'DI' or pos_after = 'BD' or pos_after = 'BL' or pos_after = 'CD' or pos_after = 'ID' or pos_after = 'PD' or pos_after = 'RD')";
	$pos_new = 'DI';
}
else if($pos_old == 'DI'){
	$where = " and (pos_after = 'BD' or pos_after = 'BL' or pos_after = 'CD' or pos_after = 'ID' or pos_after = 'PD' or pos_after = 'RD')";
	$pos_new = 'BD';
}
else if($pos_old == 'BD'){
	$where = " and (pos_after = 'BL' or pos_after = 'CD' or pos_after = 'ID' or pos_after = 'PD' or pos_after = 'RD')";
	$pos_new = 'BL';
}
else if($pos_old == 'BL'){
	$where = " and (pos_after = 'CD' or pos_after = 'ID' or pos_after = 'PD' or pos_after = 'RD')";
	$pos_new = 'CD';
}
else if($pos_old == 'CD'){
	$where = " and (pos_after = 'ID' or pos_after = 'PD' or pos_after = 'RD')";
	$pos_new = 'ID';
}
else if($pos_old == 'ID'){
	$where = " and (pos_after = 'PD' or pos_after = 'RD')";
	$pos_new = 'PD';
}
else if($pos_old == 'PD'){
	$where = " and (pos_after = 'RD')";
	$pos_new = 'RD';
}
	$sql3 = "select * from ".$dbprefix."calc_poschange2 WHERE  mcode = '$mcode' and rcode between '$rofrom' and '$roto' $where and status <> '1'  ";

			//if($mcode == '0000075')echo "$sql3<BR>";
	$rs3=mysql_query($sql3);
	if(mysql_num_rows($rs3) < 2)$total_fv3 = $pos_old;
	else $total_fv3 = $pos_new;
	//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_fv3;
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
function calc_onetime1($dbprefix,$mcode,$lastmonth,$lastmonth1,$ro,$pos_old,$npos,$startrcode){
//	$pos_piority = array('RD'=>7,'PD'=>6,'ID'=>5,'CD'=>4,'BL'=>3,'BD'=>2,'DI'=>1,''=>0);
//	
	$pos_piority = array('RD'=>17,'PD'=>16,'ID'=>15,'CD'=>14,'BL'=>13,'BD'=>12,'DI'=>11,'EM'=>10,'SA'=>9,'RU'=>8,'PE'=>7,'PL'=>6,'GO'=>5,'SI'=>4,'BR'=>3,'EX'=>2,'SU'=>1,'MB'=>0);

	$pos_piority1 = array('RDQ2'=>26,'RDQ1'=>25,'PDQ2'=>24,'PDQ1'=>23,'IDQ2'=>22,'IDQ1'=>21,'CDQ2'=>20,'CDQ1'=>19,'BLQ2'=>18,'BLQ1'=>17,'BDQ2'=>16,'BDQ1'=>15,'DIQ2'=>14,'DIQ1'=>13,'EMQ2'=>12,'EMQ1'=>11,'SAQ2'=>10,'SAQ1'=>9,'RUQ2'=>8,'RUQ1'=>7,'PEQ2'=>6,'PEQ1'=>5,'PLQ2'=>4,'PLQ1'=>3,'BRQ2'=>2,'SIQ2'=>1,'GOQ2'=>0);

if($pos_old == 'EM' or $pos_old == 'DI' or $pos_old == 'BD' or $pos_old == 'BL' or $pos_old == 'CD' or $pos_old == 'ID' or $pos_old == 'PD' or $pos_old == 'RD'){
	$roto = $ro;
	$rofrom = $ro-1;
}else{
	$roto = $ro;
	$rofrom = $ro-6;
}
if($pos_old == '')$where = " and (pos_after = 'PLQ1' or pos_after = 'PEQ1' or pos_after = 'RUQ1' or pos_after = 'SAQ1' or pos_after = 'EMQ1' or pos_after = 'BDQ1' or pos_after = 'BLQ1' or pos_after = 'CDQ1' or pos_after = 'IDQ1' or pos_after = 'PDQ1')";
if($pos_old == 'PL')$where = " and (pos_after = 'PEQ1' or pos_after = 'RUQ1' or pos_after = 'SAQ1' or pos_after = 'EMQ1' or pos_after = 'DIQ1' or pos_after = 'BDQ1' or pos_after = 'BLQ1' or pos_after = 'CDQ1' or pos_after = 'IDQ1' or pos_after = 'PDQ1')";
if($pos_old == 'PE')$where = " and (pos_after = 'RUQ1' or pos_after = 'SAQ1' or pos_after = 'EMQ1' or pos_after = 'DIQ1' or pos_after = 'BDQ1' or pos_after = 'BLQ1' or pos_after = 'CDQ1' or pos_after = 'IDQ1' or pos_after = 'PDQ1')";
if($pos_old == 'RU')$where = " and (pos_after = 'SAQ1' or pos_after = 'EMQ1' or pos_after = 'DIQ1' or pos_after = 'BDQ1' or pos_after = 'BLQ1' or pos_after = 'CDQ1' or pos_after = 'IDQ1' or pos_after = 'PDQ1')";
if($pos_old == 'SA')$where = " and (pos_after = 'EMQ1' or pos_after = 'DIQ1' or pos_after = 'BDQ1' or pos_after = 'BLQ1' or pos_after = 'CDQ1' or pos_after = 'IDQ1' or pos_after = 'PDQ1')";
if($pos_old == 'DI')$where = " and (pos_after = 'DIQ1' or pos_after = 'BDQ1' or pos_after = 'BLQ1' or pos_after = 'CDQ1' or pos_after = 'IDQ1' or pos_after = 'PDQ1')";
if($pos_old == 'BD')$where = " and (pos_after = 'BDQ1' or pos_after = 'BLQ1' or pos_after = 'CDQ1' or pos_after = 'IDQ1' or pos_after = 'PDQ1')";
if($pos_old == 'BL')$where = " and (pos_after = 'BLQ1' or pos_after = 'CDQ1' or pos_after = 'IDQ1' or pos_after = 'PDQ1')";
if($pos_old == 'CD')$where = " and (pos_after = 'CDQ1' or pos_after = 'IDQ1' or pos_after = 'PDQ1')";
if($pos_old == 'ID')$where = " and (pos_after = 'IDQ1' or pos_after = 'PDQ1')";
if($pos_old == 'PD')$where = " and (pos_after = 'PDQ1')";

	//if($npos != $pos_old and $pos_piority[$npos]>$pos_piority[$pos_old]){
	//	$pos_old1 = $npos;
	//}
	$sql3 = "select * from ".$dbprefix."calc_poschange4 WHERE  mcode = '$mcode' and rcode between '$rofrom' and '$roto' $where order by id desc limit 0,1  ";
			//if($mcode == '0000008')echo $sql3.'1<br>';
	$rs = mysql_query($sql3);
	if(mysql_num_rows($rs) > 0){
	//	for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$pos_new =$sqlObj->pos_after;
			$pos_old = $pos_old.'Q2';
			if($mcode == '0000008'){
				//echo $mcode.' : '.$pos_old.' : '.$pos_new.' : '.$pos_piority1[$pos_new].' : '.$pos_piority1[$pos_old].'2<br>';
				//exit;
			}
			if($pos_new != $pos_old and $pos_piority1[$pos_new]>$pos_piority1[$pos_old]){
				$pos_old = $pos_new;
			}
			if($mcode == '0000008'){
				echo $mcode.' : '.$pos_old.' : '.$pos_new.' : '.$pos_piority1[$pos_new].' : '.$pos_piority1[$pos_old].'3<br>';
				//exit;
			}
			
	//	}
		//$pos_old = $pos_old.'Q2';
	}else{
		if(!empty($pos_old))$pos_old = $pos_old.'Q2';
		else $pos_old = '';
	}
	//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $pos_old;
} 
function gettotalfv123($dbprefix,$ro,$mcode,$fpdate,$tpdate,$backpv){
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
function getsponsor($dbprefix,$sp_code){
	$sql2 = "select count(mcode) as cspcode  from ".$dbprefix."member WHERE sp_code = '$sp_code' group by sp_code";
	//echo $sql2.'<br>';
		$rs2=mysql_query($sql2);
		if (mysql_num_rows($rs2)>0) {
			$sqlObj2 = mysql_fetch_object($rs2);
			$cspcode= $sqlObj2->cspcode;
		}else{
			$cspcode= 0;
		}
		//echo $sp_code.'dddd'.$mcode.'<br>';
	return $cspcode;
}
function updateStatus($dbprefix,$ro,$mcode,$cur_date,$tot_fv,$backpv){
	$month = explode('-',$cur_date);
	$select = "select pos_cur from ".$dbprefix."member where mcode = '$mcode'";
	$rs = mysql_query($select);
	$sqlObj = mysql_fetch_object($rs);
	$pos_cur =$sqlObj->pos_cur;
	mysql_free_result($rs);
	$array_mpos = array('MB'=>0,'SU'=>250,'EX'=>250,'BR'=>250,'SI'=>250,'GO'=>250,'PL'=>250,'PE'=>250,'RU'=>250,
						'SA'=>250,'EM'=>250,'DI'=>250,'BD'=>250,'BL'=>250,'CD'=>250,'ID'=>250,'PD'=>250,'RD'=>250);
	$array_mpos1 = array('MB'=>0,'SU'=>750,'EX'=>750,'BR'=>750,'SI'=>750,'GO'=>750,'PL'=>750,'PE'=>750,'RU'=>750,
						'SA'=>750,'EM'=>750,'DI'=>750,'BD'=>750,'BL'=>750,'CD'=>750,'ID'=>750,'PD'=>750,'RD'=>750);
		$month=explode("-",$cur_date);
		if($tot_fv >= $array_mpos1[$pos_cur] ){
			$sql1 = "select * from ".$dbprefix."status WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
			$rs1=mysql_query($sql1);
			//echo $sql1.'<br>';
			if (mysql_num_rows($rs1)<=0) {
				$sql = "INSERT INTO ".$dbprefix."status (rcode,mcode,status,pv,pvb,mdate,month_pv,mpos) ";
				 $sql .= "VALUES('$ro','".$mcode."','2','$backpv','0','".$cur_date."','".$month[0].$month[1]."','".$pos_cur."')";
			//	 echo $sql.'<br>';
				mysql_query($sql);
			}else{
				$sqlObjU = mysql_fetch_object($rs1);
				$pv =$sqlObjU->pv;
				//$sql = "update ".$dbprefix."status set status = 1,pv=$pv,pvb=0,mpos = '$pos_cur',mdate = '$cur_date' where mcode = '$mcode' and month_pv = '".$month[0].$month[1]."' ";
				$sql = "update ".$dbprefix."status set status = 2,pvb=0,mpos = '$pos_cur',mdate = '$cur_date' where mcode = '$mcode' and month_pv = '".$month[0].$month[1]."' ";
			//	if($mcode == '0020444') echo $sql.'<br>';
				mysql_query($sql);
				mysql_free_result($rs1);
			}
			//if($mcode == '0020444')exit;
			//echo $sql.'<br>d';
		}else if($tot_fv >= $array_mpos[$pos_cur] ){
			$sql1 = "select * from ".$dbprefix."status WHERE month_pv='".$month[0].$month[1]."' AND mcode='$mcode' ";
			$rs1=mysql_query($sql1);
			//echo $sql1.'<br>';
			if (mysql_num_rows($rs1)<=0) {
				$sql = "INSERT INTO ".$dbprefix."status (rcode,mcode,status,pv,pvb,mdate,month_pv,mpos) ";
				 $sql .= "VALUES('$ro','".$mcode."','1','$backpv','0','".$cur_date."','".$month[0].$month[1]."','".$pos_cur."')";
			//	 echo $sql.'<br>';
				mysql_query($sql);
			}else{
				$sqlObjU = mysql_fetch_object($rs1);
				$pv =$sqlObjU->pv;
				//$sql = "update ".$dbprefix."status set status = 1,pv=$pv,pvb=0,mpos = '$pos_cur',mdate = '$cur_date' where mcode = '$mcode' and month_pv = '".$month[0].$month[1]."' ";
				$sql = "update ".$dbprefix."status set status = 1,pvb=0,mpos = '$pos_cur',mdate = '$cur_date' where mcode = '$mcode' and month_pv = '".$month[0].$month[1]."' ";
			//	if($mcode == '0020444') echo $sql.'<br>';
				mysql_query($sql);
				mysql_free_result($rs1);
			}


		}
		//mysql_free_result($rs1);
	}

////////////////////////////////////////////// delete //////////////////

	function del_cals($dbprefix,$ro,$name=array()) {					
		foreach($name as $key => $value):				
		$sql="delete from ".$dbprefix.$value." where rcode= '".$ro."'";
		if($value == 'calc_poschange1'  or $value == 'calc_poschange2')$sql.=" and type = '3'";
		//echo $sql.'<br>';
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		endforeach;		
	}

////////////////////////////////////////////// delete //////////////////
?>