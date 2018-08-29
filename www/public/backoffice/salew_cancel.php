<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	$bid = $_GET['bid'];
	$sql = "UPDATE ".$dbprefix."asaleh SET cancel='1' WHERE id='$bid' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=sale_cancel=>$sql";
writelogfile($text);
//=================END LOG===========================
	//echo $sql;
	mysql_query($sql);
	logtext(true,$_SESSION['adminuserid'],'ยกเลิกบิล',$bid);
	$sql = "select * from ".$dbprefix."asaled where sano='$id'";
			$result = mysql_query($sql);
			for($i=0;$i<mysql_num_rows($result);$i++){
				$data = mysql_fetch_object($result);
				$pcode =$data->pcode;
				$qty =$data->qty;
				$inv_codeold =$data->inv_code;
				//plusProduct($dbprefix,$pcode,$_SESSION['adminusercode'],$qty);
				//minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
			}
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=6'</script>";	


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
function plusProduct1($dbprefix,$pcode,$invent,$qty){
	$sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	$rs = mysql_query($sql);
	//$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
//	$rs = mysql_query($sql);
}

?>
