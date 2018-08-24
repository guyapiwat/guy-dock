<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?


require_once("logtext.php");
require_once("global.php");
require_once("function.php");
require_once("gencode.php");
require_once ("function.log.inc.php");



if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code=$GLOBALS["main_inv_code"];}
	if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
	if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
	if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
	if (isset($_POST["sumpv"])){$tot_pv=0;}else{$tot_pv=0;}
	if (isset($_POST["sumweight"])){$tot_weight=$_POST["sumweight"];}else{$tot_weight="";}
	if (isset($_POST["sumfv"])){$tot_fv=$_POST["sumfv"];}else{$tot_fv="";}
	if (isset($_POST["sano_ref"])){$sano_ref=$_POST["sano_ref"];}else{$sano_ref="";}
	
	
	$bid = $_GET['id'];

	$sqlS = "select * from ".$dbprefix."asaleh where id='$bid' and cancel = 0 ";
	$sqlSS = mysql_query($sqlS);
	if(mysql_num_rows($sqlSS) > 0){
		$dataS = mysql_fetch_object($sqlSS);
		$inv_code =$dataS->inv_code;
		$sano_ref =$dataS->sano;
		$mcode =$dataS->mcode;
		$inv_code =$dataS->inv_code;
		$lid =$dataS->lid;
		$uid =$dataS->uid;
		$sadate =$dataS->sadate;
	}
	
	
	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$weight=$_POST['weight'];
		$fv=$_POST['fv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}

	for($i=0;$i<sizeof($pcode);$i++){
		$sql2 = "SELECT sum(qty) as qty FROM ".$dbprefix."asaled_refund WHERE sano_ref='$sano_ref' and pcode='$pcode[$i]' ";
		$rs2 = mysql_query($sql2);
		if(mysql_num_rows($rs2)>0){
			$sumtotal = 0;
			$sumpv = 0;
			for($iii=0;$iii<mysql_num_rows($rs2);$iii++){
				$proobj2 = mysql_fetch_object($rs2);
				 
				$qqty1 = $proobj2->qty;
			}
		}
 

		$sql = "SELECT * FROM ".$dbprefix."asaled WHERE sano='$bid' and pcode='$pcode[$i]' ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$sumtotal = 0;
			$sumpv = 0;
			for($iii=0;$iii<mysql_num_rows($rs);$iii++){
				$proobj = mysql_fetch_object($rs);
				$ppcode = $proobj->pcode;
				$pprice = $proobj->price;
				$ppv = $proobj->pv;
				$qqty = $proobj->qty;
			}
		}
		if($qty[$i]>$proobj->qty or $qqty1>=$qqty){
			echo "<script language='JavaScript'>alert('คืนสินค้าเกินจำนวน สินค้ารหัส ".$pcode[$i]." คืนได้ไม่เกิน ".$qqty." ชิ้น  คินไปแล้วทั้งหมด ".$qqty1." ชิ้น');window.history.back();</script>";
			exit;
		}
	}
  

//////////////////////// PRODUCT REFUND  ///////////////////////////////

	for($i=0;$i<sizeof($pcode);$i++){
			 
		//echo $pcode[$i]." | ".$pdesc[$i]." | ".$price[$i]." | ".$qty[$i]."<br/>";
		plusProduct1($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION['admininvent'],$receive);	
	
	}

//////////////////////// INSERT BILL VOUCHER ///////////////////////////////

	$sql = "SELECT pos_cur,name_t,mdate,caddress,czip,cdistrictId,camphurId,cprovinceId,pos_cur,name_f,sp_code,mtype1 from ".$dbprefix."member WHERE mcode='$mcode' ";
	$rs = mysql_query($sql);
	$pos_old = '';
	if(mysql_num_rows($rs)>0) {
		$pos_old = mysql_result($rs,0,'pos_cur');
		$name_t = mysql_result($rs,0,'name_t');
		$name_f = mysql_result($rs,0,'name_f');
		$sp_code = mysql_result($rs,0,'sp_code');
		$pos_cur = mysql_result($rs,0,'pos_cur');
		$mdate = mysql_result($rs,0,'mdate');
		$mtype = mysql_result($rs,0,'mtype1');
	}
	mysql_free_result($rs);

	$sql2 = "SELECT MAX(id) AS id FROM ".$dbprefix."asaleh_refund   ";
	$rs2 = mysql_query($sql2);
	$mid = mysql_result($rs2,0,'id')+1;

	$sql = "SELECT MAX(sano) as sano FROM ".$dbprefix."asaleh_refund   ";
	$rs = mysql_query($sql);
	$max_sano = mysql_result($rs,0,'sano');
	$max_code = substr($max_sano, -6, 6);  
	$sano = gencodesale_CN($sanof,$table='asaleh',$_SESSION["bill_ref"]);
 
	mysql_free_result($rs);

	logtext(true,$_SESSION['inv_usercode'],'เพิ่มบิลลดหนี้',$mid);

	$chdate  = explode('-',date("Y-m-15", strtotime("+1 months")));
 	$d = new DateTime($_SESSION["datetimezone"]);
	$d->modify( 'last day of next month' ); 
	$hdate = $d->format( 'Y-m-d' );

	for($i=0;$i<sizeof($pcode);$i++){
		$qqty_v = explode(".",$qty[$i]);
		$pprice_v = explode(".",$price[$i]);
		$total = ($pprice_v[0]*$qqty_v[0]) ;
		$total_v = $total;
		//echo "[".$pcode[$i]."] - ".$pdesc[$i]." | QTY : ".$qqty[0]." | TOT : ".$total_v." <br/>";
	}

	$sql="insert into ".$dbprefix."asaleh_refund (id,  sano,sano1, sadate,  mcode,sp_code,  sa_type, inv_code,  total, tot_pv, tot_bv,tot_weight,tot_fv, uid,lid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
	optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther,trnf,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,hpv,htotal,hdate,checkportal,locationbase,bprice ,name_f,cname,cmobile,mbase,crate) values ('$mid' ,'$sano' ,'$sano_ref' ,'$sadate' ,'$mcode','$sp_code', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv','$tot_bv','$tot_weight','$tot_fv' ,'".$_SESSION['inv_usercode']."','".$_SESSION['admininvent']."','$radsend','$txtoption','$selectcash','$selectFuture','$selectTransfer','$selectCredit1','$selectCredit2','$selectCredit3','$selectInternet','$selectDiscount','$chkOther','$txtCash','$txtFuture',
	'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$txtInternet','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','$trnf','$name_t','$caddress','$cdistrictId','$camphurId','$cprovinceId','$czip','$tot_pv','$total','$hdate','2','".$_SESSION["inv_locationbase"]."','$tot_base','$name_f','$cname','$cmobile','".$arr_member["locationbase"]."','".$_SESSION["inv_crate"]."') ";
 

	//====================LOG===========================
	$text="uid=".$_SESSION["inv_usercode"]." action=bill_refund_operate =>$sql";
	writelogfile($text);
	//=================END LOG===========================
	if (! mysql_query($sql)) {
		//echo  "$sql";		
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."');window.history.back();</script>";
		exit;
	}	
	
	$voucher_n = "VOUCHER (ref.".$sano_ref.")";
	$voucher_tot = $total;
	
	 
	 
	$c_plus = sizeof($pcode);

	for($i=0;$i<=$c_plus;$i++){
		$qqty_v = explode(".",$qty[$i]);
		$pprice_v = explode(".",$price[$i]);
		$total_v = ($pprice_v[0]*$qqty_v[0]) ;
		 //echo "i :".$i." | c_plus :".$total_v."<br/>";
		
		if($i==$c_plus){
			$sql="insert into ".$dbprefix."asaled_refund (sano,sano_ref,pcode,pdesc,price,bprice,pv,bv,weight,fv,qty,amt,inv_code,locationbase) values ('$mid','$sano_ref','-','$voucher_n','$voucher_tot','0' ,'0','0','0','0','1','$voucher_tot','$inv_code','".$_SESSION["inv_locationbase"]."') ";
		}else if($qty[$i]>0){
			$sql="insert into ".$dbprefix."asaled_refund (sano,sano_ref,pcode,pdesc,price,bprice,pv,bv,weight,fv,qty,amt,inv_code,locationbase) values ('$mid','$sano_ref','$pcode[$i]','$pdesc[$i]','0','0' ,'0','0','0','0','$qty[$i]','0','$inv_code','".$_SESSION["inv_locationbase"]."') ";
		}
		
		//====================LOG===========================
		$text="uid=".$_SESSION["adminuserid"]." action=bill_refund_operate =>$sql";
		writelogfile($text);
		//=================END LOG===========================

		mysql_query($sql);
	}
 
 echo "<script language='JavaScript'>alert('ดำเนินการเปิดบิลลดหนี้เรียบร้อยแล้ว');window.location='index.php?sessiontab=3&sub=179';</script>";
 exit;
	
//////////////////////// FUNCTION //////////////////////////////

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