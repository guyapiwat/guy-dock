<?
require_once("logtext.php");
require_once ("function.log.inc.php");
require_once ("function.php");
	$bid = $_GET['bid'];
	$sql = "select * from ".$dbprefix."tsaleh where id='$bid' and cancel=1";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0){
		echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้ ...บิลนี้ถูกยกเลิกไปเรียบร้อยแล้ว');window.location='index.php?sessiontab=6&sub=2323'</script>";
		exit;
	}

	$sql = "select * from ".$dbprefix."tsaleh where id='$bid' and receive=1";
	$result = mysql_query($sql);
	if(mysql_num_rows($result)>0){
		echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้ ...บิลนี้รับของไปเรียบร้อยแล้ว');window.location='index.php?sessiontab=6&sub=2323'</script>";
		exit;
	}

	$object_stocks = new stocks ();
	$object_stocks->set_data($bid,"tsale","cancel","2"); 
	
	//mysql_query("DELETE FROM ".$dbprefix."stockcard_s WHERE sano = '".$sano."' " );
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=6&sub=2323'</script>";	
	
	
	$sql = "UPDATE ".$dbprefix."tsaleh SET cancel='1',cancel_date='".date('Y-m-d')."',uid_cancel='".$_SESSION["adminusercode"]."' WHERE id='$bid' ";
	//====================LOG===========================
	$text="uid=".$_SESSION["adminusercode"]." action=tsale_cancel=>$sql";
	writelogfile($text);
	//=================END LOG===========================
	//echo $sql;
	mysql_query($sql);
	logtext(true,$_SESSION["adminusercode"],'ยกเลิกคืนบิล',$bid);

	$sqlS = "select * from ".$dbprefix."tsaleh where id='$bid' ";
	$sqlSS = mysql_query($sqlS);
	if(mysql_num_rows($sqlSS) > 0){
		$dataS = mysql_fetch_object($sqlSS);
		$inv_code =$dataS->inv_code;
		$id =$dataS->id; 
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
		$lid =$dataS->lid;
		$uid =$dataS->uid;
		$sadate =$dataS->sadate;
		$receive =$dataS->receive;
		$checkportal =$dataS->checkportal;
	}

	$sql = "select * from ".$dbprefix."tsaled where sano='$id'";
	$result = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($result);$i++){
		$data = mysql_fetch_object($result);
		$pcode =$data->pcode;
		$qty =$data->qty;
		$price = $data->price;
		$inv_codeold =$data->inv_code;
		$totalprice = $price*$qty;
		
		//plusProduct1($dbprefix,$pcode,$_SESSION['adminusercode'],$qty);
		//minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);

		//updatestockcard1($dbprefix,$mcode,$inv_code,$_SESSION["adminusercode"],$sano,$sanox,$sadate,$rccode,$sa_type,$pcode,$_SESSION["adminusercode"],$qty,$price,$totalprice,$s_sender);
		//plusProduct1($dbprefix,$pcode,$inv_code,$qty,$sano,$_SESSION['adminusercode'],$receive);	

	}
	
	
	



function minusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
	$rs = mysql_query($sql);
}
function minusProduct1($dbprefix,$pcode,$invent,$qty){
	echo $sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	exit;
	$rs = mysql_query($sql);
	//$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
	//$rs = mysql_query($sql);
}

function plusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
	$rs = mysql_query($sql);
}
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

?>
