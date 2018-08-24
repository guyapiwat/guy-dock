<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");

if(isset($_GET['state'])){
	$date_now = date("Y-m-d");
	$sqlSelect = "select * from ".$dbprefix."isaleh where id = '{$_GET["sender"]}' ";
	$rs = mysql_query($sqlSelect);
	if(mysql_num_rows($rs) > 0){
		$sqlObj = mysql_fetch_object($rs);
		$s_sender =$sqlObj->sender;	
		$s_receive =$sqlObj->receive;	
		$sano =$sqlObj->sano;	
		$inv_from =$sqlObj->inv_from;	
		$inv_code =$sqlObj->inv_code;	
	}
	mysql_free_result($rs);
	$chkUpdate = 0;
	if($s_sender == 0)$s_sender = 1;
	else $s_sender = 0;
	if($s_receive == 0 and $_GET["status"] == 'receive')
	{
		$s_receive = 1;
		$chkUpdate = 1;
	}
	
	//else $s_receive = 0;
	if($_GET["status"] == 'sender')$sqlUpdate = "update ".$dbprefix."isaleh set sender = '$s_sender',sender_date = '$date_now' where id = '{$_GET["sender"]}'";
	else $sqlUpdate = "update ".$dbprefix."isaleh set receive = '$s_receive',receive_date = '$date_now' where id = '{$_GET["sender"]}'";
	//echo $sqlUpdate;
	//exit;

	$rs = mysql_query($sqlUpdate);
	
	if($chkUpdate == '1'){
		$sql = "SELECT * FROM ".$dbprefix."isaled WHERE sano='".$_GET['sender']."' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$proobj = mysql_fetch_object($rs);
					$pcode[$i]=$proobj->pcode;
					$pdesc[$i]=$proobj->pdesc;
					$price[$i]=$proobj->price;
					$pv[$i]=$proobj->pv;
					$bv[$i]=$proobj->bv;
					$fv[$i]=$proobj->fv;
					$qty[$i]=$proobj->qty;
				}
				for($i=0;$i<sizeof($pcode);$i++){
					/*	$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,bv,fv,qty,amt,inv_code) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$bv[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code') ";
						//====================LOG===========================
				$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
				writelogfile($text);
				//=================END LOG===========================
						//echo $sql."<br />";
						mysql_query($sql);*/
						//minusProduct($dbprefix,$pcode[$i],$_SESSION['adminusercode'],$qty[$i]);
				}
			}
	}
	
	for($i=0;$i<sizeof($pcode);$i++){
		$sql = "SELECT * from ".$dbprefix."product_invent  WHERE pcode='$pcode[$i]' and inv_code = '$inv_code' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				plusProduct2($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION["adminusercode"]);
			}else{
				$sql="insert into ".$dbprefix."product_invent (pcode,qty,qtys,ud,inv_code) values ('$pcode[$i]','$qty[$i]','$qty[$i]','".$_SESSION['adminusercode']."','$inv_code') ";
				mysql_query($sql);
			}
		//echo $sql.'<br>';exit;
			minusProduct($dbprefix,$pcode[$i],$inv_from,$qty[$i],$sano,$_SESSION["adminusercode"]);
	}
}
function plusProduct2($dbprefix,$pcode,$invent,$qty,$sano,$uid){
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
				  values('$sano','$invent','Head Office','$pcode2','$qty_before','$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','√—∫ ‘π§È“‚Œ≈¥Ï','$uid')";
				mysql_query($sql);

				
				$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode2' and inv_code = '$invent'";
				$rs1 = mysql_query($sql);
				if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty+$qty2,qtys = qtys+$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";
				else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,qtys,inv_code) values('$pcode2','$qty2','$qty2','$invent')";
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
				  values('$sano','$invent','Head Office','$pcode','$qty_before','$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','√—∫ ‘π§È“‚Œ≈¥Ï','$uid')";
				mysql_query($sql);



			$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
			$rs1 = mysql_query($sql);
			if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty+$qty ,qtys = qtys+$qty  WHERE pcode='$pcode' and inv_code = '$invent' ";
			else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,qtys,inv_code) values('$pcode','$qty','$qty','$invent')";
			mysql_query($sql);

		}
		
}
function minusProduct($dbprefix,$pcode,$invent,$qty,$sano,$uid){
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

				$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode2."'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before-$qty2;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','Head Office','$invent','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','‚Õπ ‘π§È“‚Œ≈¥Ï','$uid')";
				mysql_query($sql);


				if(!empty($invent)){
					$sql = "update ".$dbprefix."product_invent set qty = qty-$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";


				}else{
					$sql = "update ".$dbprefix."product set qty = qty-$qty2 WHERE pcode='$pcode2' ";

				}
				$rs1 = mysql_query($sql);

			}
		}else{
			$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode."'";
			$rsewallet = mysql_query($sqlewallet);
			if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
			$qty_after=$qty_before-$qty;
			$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
			  values('$sano','Head Office','$invent','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','‚Õπ ‘π§È“‚Œ≈¥Ï','$uid')";
			mysql_query($sql);

				if(!empty($invent)){
					$sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
				}else{
					$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
				}
			mysql_query($sql);


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


echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=138'</script>";	

?>