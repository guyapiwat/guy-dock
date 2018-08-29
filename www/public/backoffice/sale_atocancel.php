<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	$bid = $_GET['bid'];
	 $sqlS = "select * from ".$dbprefix."atoasaleh where id='$bid' and cancel = 0 ";
	$sqlSS = mysql_query($sqlS);
	if(mysql_num_rows($sqlSS) > 0){
		$dataS = mysql_fetch_object($sqlSS);
		$inv_code =$dataS->inv_code;
		$ssend =$dataS->send;
		$total =$dataS->total;
		$uid =$dataS->uid;
		$selectmember = "select * from ".$dbprefix."member where mcode = '$uid' ";
		$querymember = mysql_query($selectmember);
		if(mysql_num_rows($querymember) > 0){
			$datamember = mysql_fetch_object($querymember);
			$mcode =$datamember->mcode;
		//	$update = "update ".$dbprefix."member set ewallet = ewallet+$total where mcode = '$mcode'";
		//	mysql_query($update);
			
		}
		$sadate =$dataS->sadate;
		if($ssend == '1'){
		//	$update = "update ".$dbprefix."invent set ewallet = ewallet+$total where inv_code = '$inv_code'";
		//	mysql_query($update);
		}
	}
	 $sqlS = "select * from ".$dbprefix."atoasaleh where id='$bid' and cancel = 1";
	$sqlSS = mysql_query($sqlS);
	$sql = "UPDATE ".$dbprefix."atoasaleh SET cancel='1' WHERE id='$bid' ";
	mysql_query($sql);
	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=sale_cancel=>$sql";
writelogfile($text);
//=================END LOG===========================
	//echo $sql;
	
	logtext(true,$_SESSION['adminuserid'],'ยกเลิกบิล',$bid);
	$sql = "select * from ".$dbprefix."atoasaled where sano='$bid'";
			$result = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($result);$i++){
				$data = mysql_fetch_object($result);
				$pcode =$data->pcode;
				$qty =$data->qty;
				$inv_codeold =$data->inv_code;
				//plusProduct($dbprefix,$pcode,$_SESSION['adminusercode'],$qty);
				//minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
			}
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=144'</script>";	


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
