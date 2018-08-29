<?
include("connectmysql.php");
include("prefix.php");
//require("adminchecklogin.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once("global.php");
//echo $GLOBALS["crate"];
//exit;
require_once ("function.log.inc.php");

$bid = $_GET['bid'];
	
	$sql = "select * from ".$dbprefix."isaleh where id='$bid'";
	$result = mysql_query($sql);
	$data = mysql_fetch_object($result);
	$cancel = $data->cancel;
	$mcode =$data->inv_code;
	$sano =$data->sano;
	$total =$data->total; 
	$send =$data->send;  
	$receive =$data->receive;
	$inv_code =$data->inv_code;
	$inv_from =$data->inv_from;

	if($receive != '0'){
		echo '<script type="text/javascript">alert("ไม่สามารถยกเลิกบิลนี้ได้ เนื่องจากรับของไปแล้ว ")</script>';
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=138'</script>";	
		exit;
	}
	if($cancel == '0'){
		$sql = "select * from ".$dbprefix."isaled where sano='$bid'";	
		$result = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($result);$i++){
			$data = mysql_fetch_object($result);
			//$mcode =$data->mcode;
			$pcode =$data->pcode;
			$qty =$data->qty;
			
			//echo $mcode;
			//echo 'ssss'.$receive;
			//exit;
			if($receive == 1){
				minusProduct1($dbprefix,$pcode,$inv_code,$qty,$sano,$_SESSION["admininvent"]);
				plusProduct($dbprefix,$pcode,$inv_from,$qty,$sano,$_SESSION["admininvent"]);
			}
		}
		$rs=mysql_query("SELECT * FROM ".$dbprefix."isaleh WHERE id='".$bid."' LIMIT 1");
			//echo "SELECT * FROM ".$dbprefix."member WHERE id='".$postval[$postkey[$i]]."' LIMIT 1";
			if (mysql_num_rows($rs)>0){
				$row = mysql_fetch_object($rs);
				$id=$row->id;
				$mcode =$row->inv_code;
				$txtInternet =$row->txtInternet; 
				$txtFuture =$row->txtFuture; 
				$receive =$row->receive;
				updateEwallet($dbprefix,$mcode,$txtInternet);
				updateVoucher($dbprefix,$mcode,$txtFuture);
			}
		echo 'ยกเลิกเรียบร้อย';
	}else{
		echo '<script type="text/javascript">alert("ไม่สามารถยกเลิกซ้ำได้")</script>';
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=138'</script>";	
		exit;
	}
		//echo $id;
		//exit;
		//echo "delete from ".$dbprefix."asaled where sano='$id' ";
		$sql = "UPDATE ".$dbprefix."isaleh SET cancel='1' WHERE id='$bid' ";
		mysql_query($sql);
	logtext(true,$_SESSION['admininvent'],'ลบบิล id : '.$id.' สาขา '.$mcode,$row->sano);
	mysql_free_result($rs);
	
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=138'</script>";	


	// แสดงรายการที่ลบ
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
function plusProduct($dbprefix,$pcode,$invent,$qty,$sano,$uid){

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
				  values('$sano','Head Office','$invent','$pcode2','$qty_before','$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิกโอนสินค้าโฮลด์','$uid')";
				mysql_query($sql);

				
				if(empty($invent)){
					$sql = "update ".$dbprefix."product set qty = qty+$qty2 WHERE pcode='$pcode2' ";
					$rs1 = mysql_query($sql);
				}else {
					$sql = "update ".$dbprefix."product_invent set qty = qty+$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";
					$rs1 = mysql_query($sql);

				}

				

			}
		}else{
			$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode."'";
			$rsewallet = mysql_query($sqlewallet);
			if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
			$qty_after=$qty_before+$qty;
			$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
			  values('$sano','Head Office','$invent','$pcode','$qty_before','$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิกโอนสินค้าโฮลด์','$uid')";
			mysql_query($sql);

			if(empty($invent)){
				$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
				mysql_query($sql);
			}else{
				$sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
				mysql_query($sql);
			}


		}
		
}
function minusProduct1($dbprefix,$pcode,$invent,$qty,$sano,$uid){

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
				  values('$sano','$invent','Head Office','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิกรับสินค้าโฮลด์','$uid')";
				mysql_query($sql);

				
				$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode2' and inv_code = '$invent'";
				$rs1 = mysql_query($sql);
				if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty2, qtys = qtys-$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";
				else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,qtys,inv_code) values('$pcode2','-$qty2','-$qty2','$invent')";
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
				  values('$sano','$invent','Head Office','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','ยกเลิกรับสินค้าโฮลด์','$uid')";
				mysql_query($sql);



			$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
			$rs1 = mysql_query($sql);
			if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty, qtys = qtys-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
			else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,qtys,inv_code) values('$pcode','-$qty','-$qty','$invent')";
			mysql_query($sql);

		}
}
function plusProduct1($dbprefix,$pcode,$invent,$qty){
	$sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	$rs = mysql_query($sql);
	//$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
//	$rs = mysql_query($sql);
}
function updateEwallet($dbprefix,$mcode,$txtInternet){
	$sql3 = "update ".$dbprefix."invent set ewallet = $txtInternet+ewallet where inv_code = '$mcode' ";
	//exit;
	$rs3=mysql_query($sql3);
} 
?>
