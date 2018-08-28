<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	/*$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."product_package ";
	$rs = mysql_query($sql);
	$mid = $sano = mysql_result($rs,0,'package');
	mysql_free_result($rs);ppcode*/
	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["ppcode"])){$ppcode=$_POST["ppcode"];}else{$ppcode="";}
	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
	if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
	if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
	if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
	if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
	if (isset($_POST["sumbv"])){$tot_bv=$_POST["sumbv"];}else{$tot_bv="";}
	if (isset($_POST["sumfv"])){$tot_fv=$_POST["sumfv"];}else{$tot_fv="";}
}
if($_GET['state']==0){
	$mid = $ppcode;
	logtext(true,$_SESSION['adminusercode'],'เพิ่มสินค้าใน package : '.$mid,$mid);
	/*logtext(true,$_SESSION['adminuserid'],'เพิ่มสินค้า package',$mid);
	$sql="insert into ".$dbprefix."product_package1 (package, sadate,  mcode,  sa_type, inv_code,  total, tot_pv,tot_bv,tot_fv, uid ) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv','$tot_bv','$tot_fv' ,'".$_SESSION['adminusercode']."') ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=package product =>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);*/
	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$bv=$_POST['bv'];
		$fv=$_POST['fv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}
	for($i=0;$i<sizeof($pcode);$i++){
		$select = " select * from ".$dbprefix."product_package1 where  pcode = '$pcode[$i]' and package = '$mid'";
		$query = mysql_query($select);
		if(mysql_num_rows($query) > 0){
			$sql="update ".$dbprefix."product_package1 set qty = qty+$qty[$i] where
			pcode = '$pcode[$i]' and package = '$mid' ";
		}else{
			$sql="insert into ".$dbprefix."product_package1 (package,pcode,pdesc,qty) values ('$mid','$pcode[$i]','$pdesc[$i]','$qty[$i]') ";
		}
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=package product =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		//minusProduct($dbprefix,$pcode[$i],$_SESSION['adminusercode'],$qty[$i]);
	}
	//updatePos($dbprefix,$mcode,$sadate);
}else if($_GET['state']==1){
	logtext(true,$_SESSION['adminusercode'],'แก้ไขสินค้าใน package : '.$id,$id);

	mysql_query("DELETE FROM ".$dbprefix."product_package1 WHERE package='$id'");
	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$pv=$_POST['bv'];
		$pv=$_POST['fv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}
	for($i=0;$i<sizeof($pcode);$i++){
		$sql="insert into ".$dbprefix."product_package1 (package,pcode,pdesc,qty) values ('$mid','$pcode[$i]','$pdesc[$i]','$qty[$i]') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=package product =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		//minusProduct($dbprefix,$pcode[$i],$_SESSION['adminusercode'],$qty[$i]);
	}
	//updatePos($dbprefix,$mcode,$sadate);
}
echo "<script language='JavaScript'>window.location='index.php?sessiontab=6&sub=12'</script>";	

?>

<?
function minusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
	$rs = mysql_query($sql);
}
function plusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
	$rs = mysql_query($sql);
}

//update ตำแหน่ง แบบไม่สะสมคะแนน
	
?>