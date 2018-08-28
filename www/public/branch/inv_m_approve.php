<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	$chk_ewallet = 1;
	$chk_product = 1;
	$bid = $_GET['bid'];
	//var_dump($_REQUEST);
	$sql="SELECT * FROM ".$dbprefix."esaleh WHERE id='$bid' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		$sqlObj = mysql_fetch_object($rs);
		$sano =$sqlObj->sano;
		$inv_code =$sqlObj->inv_code;
		$inv_ref =$sqlObj->inv_ref;
		$status =$sqlObj->status;
		$total =$sqlObj->total;
	}

	$sql = "select * from ".$dbprefix."esaled where sano='$sano'";
	$result = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($result);$i++){
		$data = mysql_fetch_object($result);
		$c_pcode =$data->pcode;
		$c_qty =$data->qty;
		if(chk_product($dbprefix,$inv_ref,$c_pcode,$c_qty) == '0')$chk_status = 0;
		if($chk_status == '0')$chk_product = 0;
	}
	
	$sql="SELECT * FROM ".$dbprefix."invent WHERE inv_code='$inv_code' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		$sqlObj = mysql_fetch_object($rs);
		$ewallet =$sqlObj->ewallet;
	}

	if($total > $ewallet)$chk_ewallet = 0;

	if($chk_ewallet == '0'){
		//echo 'Ewallet ของท่านไม่เพียงพอ';
		//exit;
	}
	if($chk_product == '0'){
		echo 'สินค้าของทาง Center ไม่เพียงพอ';
		exit;
	}
	if($status == '1'){
		echo "ไม่สามารถยืนยันสินค้า ซ่ำได้";	
		exit;
	}else{	
		$sql = "select * from ".$dbprefix."esaled where sano='$sano'";
				$result = mysql_query($sql);
				for($i=0;$i<mysql_num_rows($result);$i++){
					$data = mysql_fetch_object($result);
					$pcode =$data->pcode;
					$qty =$data->qty;
					$inv_codeold =$data->inv_code;
					plusProduct($dbprefix,$pcode,$inv_code,$qty,$sano,$_SESSION["admininvent"],$_SESSION["inv_usercode"]);
					minusProduct($dbprefix,$pcode,$inv_ref,$qty,$sano,$inv_code,$_SESSION["inv_usercode"]);										
				}
		$sqlewallet = " select ewallet from ".$dbprefix."invent where inv_code = '".$inv_ref."'";
		$rsewallet = mysql_query($sqlewallet);
		$ewallet_before=mysql_result($rsewallet,0,'ewallet');
		$ewallet_after = $ewallet_before+$total;
		$sqlewallet = " select ewallet from ".$dbprefix."invent where inv_code = '".$inv_code."'";
		$rsewallet = mysql_query($sqlewallet);
		$ewallett_before=mysql_result($rsewallet,0,'ewallet');
		$ewallett_after = $ewallett_before-$total;

		
		$sql = "UPDATE ".$dbprefix."esaleh SET status='1',ewallet_before = '$ewallet_before',ewallet_after = '$ewallet_after',ewallett_before = '$ewallett_before',ewallett_after = '$ewallett_after' WHERE id='$bid' ";
		//mysql_query($sql);
		mysql_query($sql);
		minusEwallet($dbprefix,$inv_code,$total);
		plusEwallet($dbprefix,$inv_ref,$total);

		
		//====================LOG===========================
		$text="uid=".$_SESSION["admininvent"]." action=easale_cancel=>$sql";
		writelogfile($text);
			logtext(true,$_SESSION['admininvent'],'ยืนยันการสั่งซื้อ '.$bid,$bid);
		//=================END LOG===========================
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=140'</script>";	
	}

function chk_product($dbprefix,$inv_ref,$c_pcode,$c_qty){
	$sql = "select * from ".$dbprefix."product_invent where qty>='$c_qty' and pcode = '$c_pcode' and inv_code = '$inv_ref'";
	$result = mysql_query($sql);
	if(mysql_num_rows($result) > 0)$chk_chk = 1;
	else $chk_chk = 0;
	return $chk_chk;
}
function minusProduct($dbprefix,$pcode,$invent,$qty,$sano,$inv_code,$uid){
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
				$qty_after=$qty_before-$qty2;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','$inv_code','$invent','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','รับสาขา','$uid')";
				mysql_query($sql);

				
				$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode2' and inv_code = '$invent'";
				$rs1 = mysql_query($sql);
				if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";
				else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode2','-$qty2','$invent')";
			//	echo $sql;
			//	exit;
				mysql_query($sql);
			
			}
		}else{


				$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode."' and inv_code = '$invent'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before-$qty;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','$inv_code','$invent','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','รับสาขา','$uid')";
				mysql_query($sql);



			$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
			$rs1 = mysql_query($sql);
			if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
			else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode','-$qty','$invent')";
			mysql_query($sql);

		}
}
function minusEwallet($dbprefix,$invent,$total){
	 $sql = "update ".$dbprefix."invent set ewallet = ewallet-$total WHERE  inv_code = '$invent' ";
	$rs = mysql_query($sql);
}
function plusEwallet($dbprefix,$invent,$total){

	$sql = "update ".$dbprefix."invent set ewallet = ewallet+$total WHERE  inv_code = '$invent' ";
	$rs = mysql_query($sql);
}
function plusProduct($dbprefix,$pcode,$invent,$qty,$sano,$inv_code,$uid){


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
				  values('$sano','$inv_code','$invent','$pcode2','$qty_before','$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','โอนสาขารับ','$uid')";
				mysql_query($sql);

				
				$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode2' and inv_code = '$invent'";
				$rs1 = mysql_query($sql);
				if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty+$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";
				else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode2','$qty2','$invent')";
			//	echo $sql;
			//	exit;
				mysql_query($sql);
			
			}
		}else{


				$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode."' and inv_code = '$invent'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before+$qty;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','$inv_code','$invent','$pcode','$qty_before','$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','โอนสาขารับ','$uid')";
				mysql_query($sql);



			$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
			$rs1 = mysql_query($sql);
			if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
			else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode','$qty','$invent')";
			mysql_query($sql);

		}

}
?>
