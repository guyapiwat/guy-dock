<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	$bid = $_GET['bid'];
	
	
	$object_stocks = new stocks ();
	$object_stocks->set_data($bid,"import","cancel","1");
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=60'</script>";
	
	
	$sql="SELECT * FROM ".$dbprefix."import_stock_h WHERE id='$bid' and cancel = 0 ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
		$sqlObj = mysql_fetch_object($rs);
		$sano =$sqlObj->sano;
		$inv_code =$sqlObj->inv_code;
		$inv_ref =$sqlObj->inv_ref;
		$status =$sqlObj->status;
		$total =$sqlObj->total;
		$cancel = $sqlObj->cancel;
	}
	if($cancel == '0'){
		$sql = "UPDATE ".$dbprefix."import_stock_h SET cancel='1' WHERE id='$bid' ";
		//mysql_query($sql);
		//====================LOG===========================
		$text="uid=".$_SESSION["admininvent"]." action=easale_cancel=>$sql";
		writelogfile($text);
			logtext(true,$_SESSION['admininvent'],'ยกเลิกบิลโอน '.$bid,$bid);
		//=================END LOG===========================
		$sql = "select * from ".$dbprefix."import_stock_d where sano='$bid'";
			$result = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($result);$i++){
				$data = mysql_fetch_object($result);
				$pcode =$data->pcode;
				$qty =$data->qty;
				$inv_codeold =$data->inv_code;
				//plusProduct1($dbprefix,$pcode,$inv_ref,$qty);
				//minusProduct1($dbprefix,$pcode,"",$qty);
			}
		
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=60'</script>";	
	}else{
		echo 'บิลนี้ได้ยกเลิกไปแล้ว ไม่สามารถยกเลิกบิลได้ ';
		exit;
	}

function minusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	//$pcode1 = explode('_',$pcode);
	//if($pcode1[0] == 'PD'){
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
function plusProduct($dbprefix,$pcode,$invent,$qty){
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
				$sql = "update ".$dbprefix."product set qty = qty+$qty2 WHERE pcode='$pcode2' ";
				$rs1 = mysql_query($sql);
			}
		}else{
			$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
			$rs = mysql_query($sql);
		}
}
function plusProduct1($dbprefix,$pcode,$invent,$qty){
	$sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	$rs = mysql_query($sql);
	//$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
//	$rs = mysql_query($sql);
}
function minusProduct1($dbprefix,$pcode,$invent,$qty){
	
	$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
	$rs = mysql_query($sql);
}

function minusEwallet($dbprefix,$mcode,$txtInternet){
	$sql3 = "update ".$dbprefix."invent set ewallet = $txtInternet-ewallet where inv_code = '$inv_code' ";
	$rs3=mysql_query($sql3);
} 
function plusEwallet($dbprefix,$mcode,$txtInternet){
	$sql3 = "update ".$dbprefix."invent set ewallet = $txtInternet+ewallet where inv_code = '$inv_code' ";
	$rs3=mysql_query($sql3);
} 
function updateEwallet1($dbprefix,$mcode,$oldInternet,$id){
	$sql = "select * from ".$dbprefix."asaleh where sano='$id'";
	$result = mysql_query($sql);
		$data = mysql_fetch_object($result);
		$txtInternet= $data->txtInternet;
	if($oldInternet > $txtInternet){
	$internet = $oldInternet-$txtInternet;
	$sql3 = "update ".$dbprefix."member set ewallet = ewallet+$internet where mcode = '$mcode' ";
	}
	else{
	$internet = $txtInternet-$oldInternet;
	$sql3 = "update ".$dbprefix."member set ewallet = ewallet-$internet where mcode = '$mcode' ";
	}	
	$rs3=mysql_query($sql3);
} 

?>
