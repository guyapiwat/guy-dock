<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	$bid = $_GET['bid'];
	 $sqlS = "select * from ".$dbprefix."asaleh where id='$bid' and cancel = 0 ";
	$sqlSS = mysql_query($sqlS);
	//exit;
	if(mysql_num_rows($sqlSS) > 0){
		$dataS = mysql_fetch_object($sqlSS);
		$inv_code =$dataS->inv_code;
		$sano =$dataS->sano;
		$ssend =$dataS->send;
		$total =$dataS->total;
		$tot_pv =$dataS->tot_pv;
		$sa_type =$dataS->sa_type;
		$inv_code =$dataS->inv_code;
		$uid =$dataS->uid;
		$receive =$dataS->receive;
		$txtInternet =$dataS->txtInternet;
		
		$sadate =$dataS->sadate;
	/*	if($ssend == '1'){
			$update = "update ".$dbprefix."invent set ewallet = ewallet+$total where inv_code = '$inv_code'";
			mysql_query($update);
		}*/
	}

	 $sqlS = "select * from ".$dbprefix."asaleh where id='$bid' and receive='1' ";
	 $sqlSS = mysql_query($sqlS);
	if(mysql_num_rows($sqlSS) > 0){
			echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้ เนื่องจากรับของไปแล้ว');window.location='index.php?sessiontab=3&sub=6'</script>";	
			exit;
	}	
	
$sqlS = "select * from ".$dbprefix."asaleh where id='$bid' and sa_type = 'H' and hpv <> tot_pv ";
	 $sqlSS = mysql_query($sqlS);
	if(mysql_num_rows($sqlSS) > 0){
			echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้ เนื่องจากมีการแจงยอดไปแล้ว');window.location='index.php?sessiontab=3&sub=6'</script>";	
			exit;
	}	
	 
	 $sqlS = "select * from ".$dbprefix."asaleh where id='$bid' and cancel = 1";
	$sqlSS = mysql_query($sqlS);
	 $sqlC = "select calc from ".$dbprefix."around where fdate >= '$sadate' and tdate <= '$sadate' and calc = 1";
	$sqlSC = mysql_query($sqlC);
//	echo $sqlC;
//	exit;
	if(mysql_num_rows($sqlSS) > 0 or mysql_num_rows($sqlSC) > 0){
			echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้');window.location='index.php?sessiontab=3&sub=6'</script>";	
			exit;
	}	
	$selectmember = "select * from ".$dbprefix."member where mcode = '$uid' ";
		$querymember = mysql_query($selectmember);
		if(mysql_num_rows($querymember) > 0 and $txtInternet > 0){
			$datamember = mysql_fetch_object($querymember);
			$mcode =$datamember->mcode;
			$update = "update ".$dbprefix."member set ewallet = ewallet+$txtInternet where mcode = '$mcode'";
			mysql_query($update);
			
		}
	$sql = "UPDATE ".$dbprefix."asaleh SET cancel='1' WHERE id='$bid' ";
	mysql_query($sql);
	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=sale_cancel=>$sql";
writelogfile($text);
//=================END LOG===========================
	//echo $sql;
	
	logtext(true,$_SESSION['adminuserid'],'ยกเลิกบิล',$bid);
	$sql = "select * from ".$dbprefix."asaled where sano='$bid'";
			$result = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($result);$i++){
				$data = mysql_fetch_object($result);
				$pcode =$data->pcode;
				$qty =$data->qty;
				//$inv_codeold =$data->inv_code;
				if(empty($inv_code))plusProduct($dbprefix,$pcode,$_SESSION['adminusercode'],$qty,$sano);
				else plusProduct1($dbprefix,$pcode,$inv_code,$qty,$sano,$_SESSION['adminusercode'],$receive);
				//minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
			}
		//mysql_query("delete from ".$dbprefix."calc_poschange where mcode ='$mcode' and date_change = '$sadate' ");
		//mysql_query("update ".$dbprefix."member set pos_cur = 'MB' where mcode ='$mcode'  ");
		//updatePos1($dbprefix,$mcode,$sadate,$tot_pv);
//exit;
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=6'</script>";	
exit;
function plusProduct1($dbprefix,$pcode,$invent,$qty,$sano,$uid,$receive){

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

				$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode2."' and inv_code = '$invent'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before+$qty2;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','Head Office','$invent','$pcode2','$qty_before','$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิก คีย์รับที่สาขา','$uid')";
				mysql_query($sql);
				

				
				$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode2' and inv_code = '$invent'";
				$rs1 = mysql_query($sql);
				if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty+$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";
				else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode2','$qty2','$invent')";
			//	echo $sql;
			//	exit;
				mysql_query($sql);
				if($receive == '1')mysql_query("update ".$dbprefix."product_invent set qtys = qtys+$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ");
			
			}
		}else{


				$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode."' and inv_code = '$invent'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before+$qty;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','Head Office','$invent','$pcode','$qty_before','$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิก คีย์รับที่สาขา','$uid')";
				mysql_query($sql);



			$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
			$rs1 = mysql_query($sql);
			if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
			else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode','$qty','$invent')";
			mysql_query($sql);
			if($receive == '1')mysql_query("update ".$dbprefix."product_invent set qtys = qtys+$qty WHERE pcode='$pcode' and inv_code = '$invent' ");

		}

}
function plusProduct($dbprefix,$pcode,$invent,$qty,$sano){

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

				$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode2."'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before+$qty2;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','Head Office','Head Office','$pcode2','$qty_before','$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิก บิลขาย','$invent')";
				mysql_query($sql);


				$sql = "update ".$dbprefix."product set qty = qty+$qty2 WHERE pcode='$pcode2' ";
				$rs1 = mysql_query($sql);

			}
		}else{
			$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode."'";
			$rsewallet = mysql_query($sqlewallet);
			if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
			$qty_after=$qty_before+$qty;
			$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
			  values('$sano','Head Office','Head Office','$pcode','$qty_before','$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิก บิลขาย','$invent')";
			mysql_query($sql);

			$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
			mysql_query($sql);


		}
}
function minusProduct($dbprefix,$pcode,$invent,$qty,$sano){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";

		
		$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode."'";
	$rsewallet = mysql_query($sqlewallet);
	if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');
	$sqlewallet = " select qty from ".$dbprefix."product_package1 where package = '".$pcode."'";
	$rsewallet = mysql_query($sqlewallet);
	if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');
	$qty_after=$qty_before+$qty;
	//$ewallet_after = $ewallet_before-$total;
	
	$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
	  values('$sano','Head Office','Head Office','$pcode','$qty_before','$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิก บิลขาย','$uid')";
	$rs = mysql_query($sql);

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

?>
<?
function updatePos($dbprefix,$mcode,$cur_date,$tot_pv){
	
	$chkmonth=explode("-",$cur_date);
	$chkmonth= $chkmonth[0].'-'.$chkmonth[1];
	$sqlVIP = " select * from ".$dbprefix."calc_poschange where  type <> '1' order by id asc limit 0,1 ";
	$rsVIP = mysql_query($sqlVIP) or die(mysql_error());
	if(mysql_num_rows($rsVIP) >0){
		$sqlObj = mysql_fetch_object($rsVIP);
		$pos_after =$sqlObj->pos_after;		
		$mcode_vip =$sqlObj->mcode;	
		$pos_before =$sqlObj->pos_before;	
		mysql_query("update ".$dbprefix."member set pos_cur = '$pos_before' where mcode = '$mcode'");	
		mysql_query("delete ".$dbprefix."calc_poschange where date_change like '%".$chkmonth."%'  and type <> '1' and mcode = '$mcode'");
		updatePos1($dbprefix,$mcode,$cur_date,$tot_pv);
	}
}?>
<?
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
		$expmdte = date('Y-m-d',expdate($mdate,'60'));
		$cnt_date = dateDiff($mdate,$expmdte);
		$cnt_date1 = dateDiff($mdate,$cur_date);
	}
	$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and sadate <= '".$cnt_date."' and cancel=0 ";
	$rs = mysql_query($sql);
	$mexp = 0;
	if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
	//mysql_free_result($rs);

	$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode."' and sa_type='A' and sadate <= '".$cnt_date."'  and cancel=0 ";
	$rs = mysql_query($sql);
	$mexph = 0;
	if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
	mysql_free_result($rs);
	$mexp=($mexp+$mexph);
	$pos_new = $pos_old;
	foreach(array_keys($pos_exp) as $key){
		//echo $key;
		if($mexp>=$pos_exp[$key]){ $pos_new = $pos_new1 = $key; break;}
	}

	if($cnt_date1 <= $cnt_date){
		//-----เก็บคะแนนสูงสุดที่มีการซื้อ
		if($pos_new != $pos_old and $pos_piority[$pos_new]<$pos_piority[$pos_old]){
			/*$sql = "select * from ".$dbprefix."calc_poschange where date_change <= '".$cnt_date."' order by id desc ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0) {
				for($i=0;$i<mysql_num_rows($result);$i++){
					$data = mysql_fetch_object($result);
					$pos_check = $data->pos_after;
					if($pos_new == $pos_check)$pos_id = $data->id;
				}
			}*/
			$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 ";	
			mysql_query($sql);
			$sql = "INSERT INTO ".$dbprefix."poschange (mcode,pos_before,pos_after,date_change) ";
			$sql .= "VALUES('".$mcode."','".$pos_old."','".$pos_new."','".date("Y-m-d")."')";
			mysql_query($sql);
	
			$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
			$sql .= "VALUES('','".$mcode."','".$pos_old."','".$pos_new."','".date("Y-m-d")."')";
			mysql_query($sql);		
			/*if(empty($pos_id)){
				$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
				$sql .= "VALUES('','".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
				mysql_query($sql);		
			}else{
				$sql = "deletd from ".$dbprefix."calc_poschange where id > '$pos_id' and mcode = '$mcode' ";
				//====================LOG===========================
				$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
				//writelogfile($text);
				//=================END LOG===========================
				mysql_query($sql);		
			}*/
		}
	}else{
		$mexp = $tot_pv;
		if($mexp >= 750){
			if($mexp >= 3000)$mexp = 3000;else $mexp =750;
			foreach(array_keys($pos_exp) as $key){
				//echo $key;
				if($mexp>=$pos_exp[$key]){ $pos_new = $key; break;}
			}
			if($pos_new == $pos_old and $pos_old == 'SU' ){
				$sql = "SELECT tot_pv as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and sadate >= '".$cnt_date."' and tot_pv >= '$mexp' and cancel=0 UNION SELECT tot_pv as pv from ".$dbprefix."holdhead WHERE sa_type='A' and mcode='$mcode' and sadate >= '".$cnt_date."' and tot_pv >= '$mexp' and cancel=0 ";				
				$mexp = 0;
				if(mysql_num_rows($rs)<0 and $pos_new1 == 'MB'){
					$sql = "UPDATE ".$dbprefix."member SET pos_cur='MB' WHERE mcode='$mcode' LIMIT 1 ";	
					mysql_query($sql);
					$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
					$sql .= "VALUES('','".$mcode."','".$pos_old."','MB','".date("Y-m-d")."')";
					mysql_query($sql);
				}	
			}else if($pos_old == 'EX' and $pos_new == 'EX'){
				$sql = "SELECT tot_pv as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and sadate >= '".$cnt_date."' and tot_pv >= '3000' and cancel=0 UNION SELECT tot_pv as pv from ".$dbprefix."holdhead WHERE sa_type='A' and mcode='$mcode' and sadate >= '".$cnt_date."' and tot_pv >= '3000' and cancel=0 ";				
				$mexp = 0;
				if(mysql_num_rows($rs)<0 or $pos_new1 != 'EX'){
					$sql = "SELECT tot_pv as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and sadate >= '".$cnt_date."' and tot_pv >= '750' and cancel=0 UNION SELECT tot_pv as pv from ".$dbprefix."holdhead WHERE sa_type='A' and mcode='$mcode' and sadate >= '".$cnt_date."' and tot_pv >= '750' and cancel=0 ";
					if($pos_new1 == 'SU'){
							$sql = "UPDATE ".$dbprefix."member SET pos_cur='SU' WHERE mcode='$mcode' LIMIT 1 ";	
							mysql_query($sql);
							$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
							$sql .= "VALUES('','".$mcode."','".$pos_old."','SU','".date("Y-m-d")."')";
							mysql_query($sql);
							//$sql = "deletd from ".$dbprefix."calc_poschange where  date_change > '".$cnt_date."' and mcode = '$mcode' ";
							//mysql_query($sql);
					}else{
						if(mysql_num_rows($rs)<0 and $pos_new1 == 'MB'){
							$sql = "UPDATE ".$dbprefix."member SET pos_cur='MB' WHERE mcode='$mcode' LIMIT 1 ";	
							mysql_query($sql);
							$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
							$sql .= "VALUES('','".$mcode."','".$pos_old."','MB','".date("Y-m-d")."')";
							mysql_query($sql);
							//$sql = "deletd from ".$dbprefix."calc_poschange where  date_change > '".$cnt_date."' and mcode = '$mcode' ";
							//mysql_query($sql);
						}
						if(mysql_num_rows($rs)>0 ){
							$sql = "UPDATE ".$dbprefix."member SET pos_cur='SU' WHERE mcode='$mcode' LIMIT 1 ";	
							mysql_query($sql);
							$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
							$sql .= "VALUES('','".$mcode."','".$pos_old."','SU','".date("Y-m-d")."')";
							mysql_query($sql);
							//$sql = "deletd from ".$dbprefix."calc_poschange where  date_change > '".$cnt_date."' and pos_after = 'EX' and mcode = '$mcode' ";
							//mysql_query($sql);
						}
					}					
				}	
			}
		}	
	}

	//-----เก็บตำแหน่งปัจจุบัน
	//mysql_free_result($rs);
	//คำนวณตำแหน่ง
	/*$pos_new = $pos_old;
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
		$sql .= "VALUES('','".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
		//====================LOG===========================
		$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
		//writelogfile($text);
		//=================END LOG===========================
		mysql_query($sql);
		
	}*/

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

?>