<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	$bid = $_GET['bid'];
	 $sqlS = "select * from ".$dbprefix."rsaleh where id='$bid' and cancel = 0 ";
	$sqlSS = mysql_query($sqlS);
	if(mysql_num_rows($sqlSS) > 0){
		$dataS = mysql_fetch_object($sqlSS);
		$inv_code =$dataS->inv_code;
		$ssend =$dataS->send;
		$total =$dataS->total;
		$uid =$dataS->uid;
	}
	 $sqlS = "select * from ".$dbprefix."rsaleh where id='$bid' and cancel = 1";
	$sqlSS = mysql_query($sqlS);
	//echo $sqlS;
	//exit;
	if(mysql_num_rows($sqlSS) > 0 ){
			echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้');window.location='index.php?sessiontab=3&sub=39'</script>";	
			exit;
	}		
	$sql = "UPDATE ".$dbprefix."rsaleh SET cancel='1' WHERE id='$bid' ";
	mysql_query($sql);
	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=sale_cancel=>$sql";
writelogfile($text);
//=================END LOG===========================
	//echo $sql;
	
	logtext(true,$_SESSION['adminuserid'],'ยกเลิกบิล',$bid);
	$sql = "select * from ".$dbprefix."rsaled where sano='$bid'";
			$result = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($result);$i++){
				$data = mysql_fetch_object($result);
				$pcode =$data->pcode;
				$qty =$data->qty;
				$inv_codeold =$data->inv_code;
				minusProduct($dbprefix,$pcode,$_SESSION['adminusercode'],$qty);
				plusInvent($dbprefix,$pcode,$inv_code,$qty);
			}
			//exit;
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=39'</script>";	
function minusInvent($dbprefix,$pcode,$invent,$qty){
		
		$sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE inv_code = '$invent' and pcode='$pcode' ";
		//exit;
		$rs = mysql_query($sql);
}
function plusInvent($dbprefix,$pcode,$invent,$qty){
		
		$sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE inv_code = '$invent' and pcode='$pcode' ";
		$rs = mysql_query($sql);
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
?>
