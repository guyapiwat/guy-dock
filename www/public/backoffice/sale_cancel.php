<?
require_once("logtext.php");
require_once("function.php");
require_once("global.php");
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
		$mcode =$dataS->mcode;
		$tot_pv =$dataS->tot_pv;
		$total =$dataS->total;
		$tot_pv =$dataS->tot_pv;
		$txtInternet =$dataS->txtInternet;
		$txtFuture =$dataS->txtFuture;
		$sa_type =$dataS->sa_type;
		$bprice =$dataS->bprice;
		$inv_code =$dataS->inv_code;
		$uid =$dataS->uid;
		$lid =$dataS->lid;
		$inv_ref =$dataS->lid;
		$inv_code =$dataS->inv_code;
		$sadate =$dataS->sadate;
		$receive =$dataS->receive;
		$checkportal =$dataS->checkportal;

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
	 $sqlC = "select calc from ".$dbprefix."around where '$sadate' between fdate and tdate  and calc = 1";
	$sqlSC = mysql_query($sqlC);

	if(mysql_num_rows($sqlSS) > 0 or mysql_num_rows($sqlSC) > 0){
			echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้');window.location='index.php?sessiontab=3&sub=6'</script>";	
			exit;
	}	
	//exit;
//	exit;

	//	$arr_member = array();
	//	$arr_member = searchlocationbase($dbprefix,$locationbase);
	//	$bprice = $arr_member["crate"]*$txtMoney;


		/*if($txtInternet > 0){
			$bewallet = $txtInternet;
			if($checkportal == '3')$update = "update ".$dbprefix."member set ewallet = ewallet+$txtInternet,bewallet = bewallet+$bewallet where mcode = '$uid'";
			else $update = "update ".$dbprefix."member set ewallet = ewallet+$txtInternet,bewallet = bewallet+$bewallet where mcode = '$mcode'";
			mysql_query($update);
		}
		if($txtFuture > 0){
			//$bvoucher = $GLOBALS["crate"]*$txtFuture;
			$bvoucher = $txtFuture;
			if($checkportal == '3')$update = "update ".$dbprefix."member set voucher = voucher+$txtFuture,bvoucher = bvoucher+$bvoucher where mcode = '$uid'";
			else $update = "update ".$dbprefix."member set voucher = voucher+$txtFuture,bvoucher = bvoucher+$bvoucher where mcode = '$mcode'";
			mysql_query($update);
		}*/

		if($txtInternet > 0){
			$bewallet = $txtInternet;
			if($checkportal == '3'){
				$update = "update ".$dbprefix."member set ewallet = ewallet+$txtInternet,bewallet = bewallet+$bewallet where mcode = '$uid'";
				mysql_query($update);
			}else if($checkportal == '5'){
				$update = "update ".$dbprefix."invent set ewallet = ewallet-$txtInternet,bewallet = bewallet-$bewallet where inv_code = '$lid'";
				mysql_query($update);
				$update ="update ".$dbprefix."member set ewallet = ewallet+$txtInternet,bewallet = bewallet+$bewallet where mcode = '$mcode'";
				mysql_query($update);
			}else {
				$update ="update ".$dbprefix."member set ewallet = ewallet+$txtInternet,bewallet = bewallet+$bewallet where mcode = '$mcode'";
				mysql_query($update);
			}
		}
		if($txtFuture > 0){
			//$bvoucher = $GLOBALS["crate"]*$txtFuture;
			$bvoucher = $txtFuture;
			if($checkportal == '3'){
				$update = "update ".$dbprefix."member set voucher = voucher+$txtFuture,bvoucher = bvoucher+$bvoucher where mcode = '$uid'";
				mysql_query($update);
			}else if($checkportal == '5'){
				$update = "update ".$dbprefix."invent set voucher = voucher-$txtFuture,bvoucher = bvoucher-$bvoucher where inv_code = '$lid'";
				mysql_query($update);
				$update ="update ".$dbprefix."member set voucher = voucher+$txtFuture,bvoucher = bvoucher+$bvoucher where mcode = '$mcode'";
				mysql_query($update);
			}else {
				$update = "update ".$dbprefix."member set voucher = voucher+$txtFuture,bvoucher = bvoucher+$bvoucher where mcode = '$mcode'";
				mysql_query($update);
			}
		}

	//	$update ="delete from ".$dbprefix."expdate where sano = '$bid' ";
	//	mysql_query($update);


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
				$price =$data->price;
				$totalprice = $price*$qty;
				//$inv_codeold =$data->inv_code;
				updatestockcard1($dbprefix,$inv_code,$inv_code,$inv_ref,$sano,$sanox,$sadate,$rccode,$satype,$pcode,$uid,$qty,$price,$totalprice);

				if(empty($inv_code))plusProduct($dbprefix,$pcode,$_SESSION['adminusercode'],$qty,$sano);
				else plusProduct1($dbprefix,$pcode,$inv_code,$qty,$sano,$_SESSION['adminusercode'],$receive);
				//minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
			}
		//mysql_query("delete from ".$dbprefix."calc_poschange where mcode ='$mcode' and date_change = '$sadate' ");
		//mysql_query("update ".$dbprefix."member set pos_cur = 'MB' where mcode ='$mcode'  ");
		downdatePos($dbprefix,$mcode,$sadate,$tot_pv);
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