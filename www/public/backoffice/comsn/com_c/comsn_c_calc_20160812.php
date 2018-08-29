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
set_time_limit(0);
ini_set("memory_limit","2000M");
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

		//ลบข้อมูลใน ambonus ที่อยู่ในรอบ $ro
		
		$option = "Recal - transfer to pay(ถอน Ecom) "; 
		$sql = "SELECT ecom,mcode from ".$dbprefix."cmbonus  where rcode = '$ro' order by rcode asc  ";
		$rsxx = mysql_query($sql);
		if(mysql_num_rows($rsxx) > 0){
			for($xx=0;$xx<mysql_num_rows($rsxx);$xx++){
				$sqlObjxx = mysql_fetch_object($rsxx);
				$ecom =$sqlObjxx->ecom;
				$mcode=$sqlObjxx->mcode;
				mysql_query("update ali_member set ecom=ecom+'$ecom' where mcode = '$mcode' ");
				log_ewallet('ecom',$mcode,$ro,$mcode,'TI',date("Y-m-d"),$option);

			}
		}

		$sql="delete from ".$dbprefix."cmbonus where rcode>= '".$ro."'";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
		$text="uid=".$_SESSION["adminuserid"]." action=comsn_c_calc =>$sql";
		writelogfile($text);

		fnc_calc_status($dbprefix,$ro,$fdate,$tdate,$fpdate,$tpdate,$mcode,$paydate,$cstatus);
		//exit;
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
echo "<font color=green><b>";
echo "สิ้นสุดการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR>";
echo "</b></font>";

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

	$fdate = $strfdate;
	$tdate = $strtdate;

	if($fpdate!=""&&$tpdate!=""&&$fmcode!=""){
		$whereclass = " AND fdate>= '$fpdate' and tdate<= '$tpdate' and m.mcode='".$fmcode."'";
	}else if($fpdate!=""&&$tpdate!=""){
		$whereclass = " AND fdate>= '$fpdate' and tdate<= '$tpdate' ";
	}else if($fmcode!=""){
		$whereclass = " AND m.mcode='".$fmcode."'";
	}
	$fpdate = $fdate;
	$tpdate = $tdate;

	if($fpdate!=""&&$tpdate!=""&&$fmcode!=""){
		$whereclass1 = " fdate>= '$fpdate' and tdate<= '$tpdate' and mcode='".$fmcode."'";
	}else if($fpdate!=""&&$tpdate!=""){
		$whereclass1 = " fdate>= '$fpdate' and tdate<= '$tpdate' ";
	}else if($fmcode!=""){
		$whereclass1 = " mcode='".$fmcode."'";
	}
	$sql = "SELECT m.mcode,m.locationbase,m.name_t,m.bankcode,m.status_suspend,m.status_terminate,m.mtype,m.mvat,m.pos_cur,m.sp_code,m.cmp,m.status,m.cmp2,m.cmp3,m.acc_no,m.name_f as title,m.id_tax,m.id_card 
	from ".$dbprefix."member m ";
	$sql .= "where m.pos_cur <> 'MB'  and m.status_terminate <> '1' ";
	$rs1 = mysql_query($sql);
	$monthmonth  = explode("-",$strtdate);
	$name_t = array();
	$name_f = array();
	$id_card = array();
	$id_tax = array();
	$totalamt1 = array();
	$totalfast[$j] = $totalbinary[$j] = $totalmatching[$j] = $totalonetime[$j] = $totalstar[$j] = 	$totalamt = array();
	if(mysql_num_rows($rs1) > 0){
		for($j=0;$j<mysql_num_rows($rs1);$j++){
			$sqlObj1 = mysql_fetch_object($rs1);
			$mcode[$j] =$sqlObj1->mcode;	
			$com_transfer_chagre = 30;
			$totalamt1[$j] = 0;
			$totalamt[$j] = 0;
			$mtype[$j] = $sqlObj1->mtype;
			$mvat[$j] = $sqlObj1->mvat;
			$bankcode[$j] = $sqlObj1->bankcode;

			$totalfast[$j] = $totalbinary[$j] = $totalmatching[$j] = $totalonetime[$j] = $totalstar[$j] = 0;

			$sqlfast = "SELECT ifnull(sum(total),0) as totalbinary from ".$dbprefix."ambonus  where   ".$whereclass1."   and total > 0  and mcode = '".$mcode[$j]."' group by mcode";
			$rsfast = mysql_query($sqlfast);
			if(mysql_num_rows($rsfast) > 0){
				$sqlObjfast = mysql_fetch_object($rsfast);
				$totalfast[$j] =$sqlObjfast->totalbinary;	
			}

			$sqlfast = "SELECT ifnull(sum(total),0) as totalbinary from ".$dbprefix."bmbonus  where   ".$whereclass1."  and total > 0  and mcode = '".$mcode[$j]."' group by mcode";
			$rsfast = mysql_query($sqlfast);
			if(mysql_num_rows($rsfast) > 0){
				$sqlObjfast = mysql_fetch_object($rsfast);
				$totalbinary[$j] =$sqlObjfast->totalbinary;	
			}

			$sqlfast = "SELECT ifnull(sum(total),0) as totalkey from ".$dbprefix."dmbonus  where   ".$whereclass1."  and total > 0  and mcode = '".$mcode[$j]."' group by mcode";
			$rsfast = mysql_query($sqlfast);
			if(mysql_num_rows($rsfast) > 0){
				$sqlObjfast = mysql_fetch_object($rsfast);
				$totalmatching[$j] =$sqlObjfast->totalkey;	
			}

			$sqlfast = "SELECT ifnull(sum(total_r),0) as totalregister from ".$dbprefix."fmbonus  where   ".$whereclass1."  and total_r > 0 and mcode = '".$mcode[$j]."' group by mcode";
			$rsfast = mysql_query($sqlfast);
			if(mysql_num_rows($rsfast) > 0){
				$sqlObjfast = mysql_fetch_object($rsfast);
				$totalstar[$j] =$sqlObjfast->totalregister;	
			}

			$sql = "SELECT ifnull(sum(txtCommission),0) as ecom from ".$dbprefix."ecommision  where  sadate BETWEEN '$fdate' and '$tdate'  and txtCommission > 0 and status_tranfer=0 and cancel=0 and mcode = '".$mcode[$j]."' group by mcode";
			//echo $sql;
			$rsfast = mysql_query($sql);
			if(mysql_num_rows($rsfast) > 0){
				$sqlObjfast = mysql_fetch_object($rsfast);
				$ecom[$j] =$sqlObjfast->ecom;	 // ecom คงเหลือ
			}

			$sql ="SELECT ifnull(sum(txtCommission),0) as ecom_tranfer from ".$dbprefix."ecommision  where  sadate BETWEEN '$fdate' and '$tdate'  and txtCommission > 0 and status_tranfer=1 and cancel=0 and mcode = '".$mcode[$j]."' group by mcode";
			//echo $sql;
			$rsfast = mysql_query($sql);
			if(mysql_num_rows($rsfast) > 0){
				$sqlObjfast = mysql_fetch_object($rsfast);
				$ecom_tranfer[$j] =$sqlObjfast->ecom_tranfer;	 // ecom โอน
			}


			$sql = "SELECT ifnull(sum(txtCommission),0) as ecom from ".$dbprefix."ecommision  where  sadate BETWEEN '$fdate' and '$tdate'  and txtCommission > 0  and cancel=0 and mcode = '".$mcode[$j]."' group by mcode";
			//echo $sql;
			$rsfast = mysql_query($sql);
			if(mysql_num_rows($rsfast) > 0){
				$sqlObjfast = mysql_fetch_object($rsfast);
				$xecom[$j] =$sqlObjfast->ecom;	/// ecom ทั้งหมด
			}
			//////////// Ecom to cmbonus ////////////
			$sql2 = "update ".$dbprefix."ecommision set cmbonus =1  WHERE status_tranfer =0 and sadate BETWEEN '$strfdate' and '$strtdate' and mcode = '".$mcode[$j]."'";
			mysql_query($sql2);
			///////// log Ecom ///////////////////////////
			$option = "transfer to pay(ถอน Ecom) "; 
			mysql_query("update ali_member set ecom = ecom-'".$ecom[$j]."' where mcode = '".$mcode[$j]."'");
			log_ewallet('ecom',$mcode[$j],$ro,$ecom[$j],'TO',date("Y-m-d"),$option);

			$sqlfast = "SELECT ifnull(sum(txtWithdraw),0) as totalewallet from ".$dbprefix."ewallet  where  sadate between '$fpdate' and '$tpdate' and txtWithdraw > 0 and cancel = 0 and mcode = '".$mcode[$j]."' and sa_type = 'W' group by mcode";
			$rsfast = mysql_query($sqlfast);
			if(mysql_num_rows($rsfast) > 0){
				$sqlObjfast = mysql_fetch_object($rsfast);
				$totalonetime[$j] =$sqlObjfast->totalewallet;	
			}
			//if($mcode[$j]=='0000034')echo "Ecom ทั้งหมด".$xecom[$j]." เหลือ".$ecom[$j];

			$locationbase[$j] = $sqlObj1->locationbase;
			$status_suspend[$j] = $sqlObj1->status_suspend;
			$name_t[$j] = $sqlObj1->name_t;
			$name_f[$j] = $sqlObj1->title;
			$id_card[$j] = $sqlObj1->id_card;
			$id_tax[$j] = $sqlObj1->id_tax;
			$atoship[$j] = 0;
			$totalamt[$j]=$ecom[$j]+$totalonetime[$j];
			$totalamt1[$j]=$ecom[$j]+$totalonetime[$j];  
			
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
			$totalamt1[$j] =  $moneyb[$j]+$totalamt[$j];
			$crate[$j] = '1';
				
			$vat[$j] = 0;
			$name_t[$j] =$sqlObj1->name_t;
			$title[$j] =$sqlObj1->title;
			$tax[$j] = $totalamt1[$j]*0.05;
			if($xecom[$j] > 0 or $totalamt1[$j] >0){
				//echo $mcode[$j].' : '.$cmp[$j].' : '.$cmp2[$j],' : '.$cmp3[$j].'<br>';
				if($cmp[$j] == 'ครบ' and $cmp2[$j] == 'ครบ'   and !empty($acc_no[$j]) and $status_suspend[$j] <> '1'  ){
					
					if($totalpv> 0 or $totalamt1[$j] >0 or $xecom[$j] >0 ){
						if($totalamt1[$j] >= 100){
							$total12 = $total12+$totalamt1[$j];
							if($mtype[$j] == '1'){
								$totalamt[$j] = $totalamt[$j]+$vat[$j]-$tax[$j];
								$totalamt1[$j] = $totalamt1[$j]+$vat[$j]-$tax[$j];
									$btotal = $btotal+$vat[$j]-$tax[$j];
							}else{
								$totalamt[$j] = $totalamt[$j]-$tax[$j];
								$totalamt1[$j] = $totalamt1[$j]-$tax[$j];
								$btotal = $btotal-$tax[$j];
							}
						if($cmp[$j] == 'ครบ')$c_note1 = 1;else $c_note1 = "";
						if($cmp2[$j] == 'ครบ')$c_note2 = 1;else $c_note2 = "";
						if($cmp3[$j] == 'ครบ')$c_note5 = 1;else $c_note5 = "";
						if(!empty($acc_no[$j]))$c_note3 = 1;else $c_note3 = "";
							$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,name_f,name_t,id_card,id_tax,atoship,fdate,tdate,bankcode,ecom,ecom_round,ecomtranfer) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','1','".$moneyb[$j]."','".$totalamt[$j]."','0','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','".$totalamt1[$j]."','".$total12."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','$com_transfer_chagre','".$name_f[$j]."','".$name_t[$j]."','".$id_card[$j]."','".$id_tax[$j]."','".$atoship[$j]."','$fdate','$tdate','".$bankcode[$j]."','".$ecom[$j]."','".$xecom[$j]."','".$ecom_tranfer[$j]."')";
										
						//	echo $sql.'<br>';
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
						$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,c_note5,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,name_f,name_t,id_card,id_tax,atoship,fdate,tdate,bankcode,ecom,ecom_round,ecomtranfer) ";
							$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$moneyb[$j]."','0','".$totalamt1[$j]."','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','0','".$btotal."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$c_note1."','".$c_note2."','".$c_note3."','".$c_note4."','".$c_note5."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','0','".$name_f[$j]."','".$name_t[$j]."','".$id_card[$j]."','".$id_tax[$j]."','".$atoship[$j]."','$fdate','$tdate','".$bankcode[$j]."','".$ecom[$j]."','".$xecom[$j]."','".$ecom_tranfer[$j]."')";
						}
						//if($mcode[$j] == '0000420')echo $sql.'<br>';
						//echo $sql.'<br>';
						mysql_query($sql);
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

					$sql = "INSERT INTO ".$dbprefix."cmbonus (rcode,mcode,status,pv,pvb,pvh,fob,cycle,smb,matching,onetime,total,totaly,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,c_note5,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,name_f,name_t,id_card,id_tax,atoship,fdate,tdate,bankcode,ecom,ecom_round,ecomtranfer) ";
					$sql .= "VALUES('$ro','".$mcode[$j]."','0','".$moneyb[$j]."','0','".$totalamt1[$j]."','".$totalfast[$j]."','".$totalbinary[$j]."','".$totalstar[$j]."','".$totalmatching[$j]."','".$totalonetime[$j]."','0','".$btotal."','".$strfdate."','".$month[0].$month[1]."','".$pos_cur[$j]."','".$c_note1."','".$c_note2."','".$c_note3."','".$c_note4."','".$c_note5."','".$vat[$j]."','".$tax[$j]."','".$title[$j]."','$paydate','$totalpv','".$locationbase[$j]."','".$crate[$j]."','".$mtype[$j]."','0','".$name_f[$j]."','".$name_t[$j]."','".$id_card[$j]."','".$id_tax[$j]."','".$atoship[$j]."','$fdate','$tdate','".$bankcode[$j]."','".$ecom[$j]."'
					,'".$xecom[$j]."','".$ecom_tranfer[$j]."'
					)";
					mysql_query($sql);
					//if($mcode[$j] == '0001242')echo $sql.'<br>';
												
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
	}
}

 function backmonthpv($dbprefix,$mcode,$ro){
	$sql2 = "select mcode,pvh,status from ".$dbprefix."cmbonus WHERE  mcode='$mcode'  order by rcode desc limit 0,1 ";
	
	//if($mcode == '0007243')echo $sql2.'<br>';
	$rs2=mysql_query($sql2);
	if (mysql_num_rows($rs2)>0) {
		$sqlObj2 = mysql_fetch_object($rs2);
		if($sqlObj2->status == '0')$pv= $sqlObj2->pvh;
		else $pv=0;
		//$pv= $sqlObj2->pvh;
	}else{
		$pv = 0;
	}
	//echo $mcode.' : '.$pv.'<br>';
	return $pv;
}

 function backallpv($dbprefix,$mcode,$ro,$tdate){
	$chkdate = explode('-',$tdate);
	$chkdate1 = $chkdate[0];
	$sql2 = "select totaly from ".$dbprefix."cmbonus WHERE  mcode='$mcode' and paydate like '%".$chkdate1."%' order by id desc limit 0,1 ";
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
function backmonthpv3($dbprefix,$mcode,$ro,$paydate){
	$chkdate = explode('-',$tdate);
	$chkdate1 = $chkdate[0];
	$sql2 = "select totaly as total_y from ".$dbprefix."cmbonus WHERE  mcode='$mcode' and paydate like '%".$chkdate1."%'   and rcode <= $ro order by rcode desc limit 0,1 ";
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