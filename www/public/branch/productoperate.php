<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}	
	if (isset($_POST["pcode"])){$pcode=$_POST["pcode"];}else{$pcode="";}	
	if (isset($_POST["pdesc"])){$pdesc=$_POST["pdesc"];}else{$pdesc="";}
	if (isset($_POST["unit"])){$unit=$_POST["unit"];}else{$unit="";}
	if (isset($_POST["price"])){$price=$_POST["price"];}else{$price="";}
	if (isset($_POST["pv"])){$pv=$_POST["pv"];}else{$pv="";}
	if (isset($_POST["bv"])){$bv=$_POST["bv"];}else{$bv="";}
	if (isset($_POST["fv"])){$fv=$_POST["fv"];}else{$fv="";}
	if (isset($_POST["qty"])){$qty=$_POST["qty"];}else{$qty="";}	
	if (isset($_POST["C1"])){$C1=$_POST["C1"];}else{$C1="";}
}
if($_GET['state']==0){
	logtext(true,$_SESSION['adminusercode'],'เพิ่มสินค้า',$pcode);
	$sql="insert into ".$dbprefix."product (pcode,  pdesc, unit,  price,   pv,  bv,fv, qty,st ) values ('$pcode' ,'$pdesc' ,'$unit' ,'$price' ,'$pv' ,'$bv' ,'$fv' ,'$qty',1) ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=productoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	if (! mysql_query($sql)) {
		echo "<font color='#FF0000'>error</font><br>";
		//echo  "$sql";		
	}else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=1'</script>";	
	}
}else if($_GET['state']==1){
	logtext(true,$_SESSION['adminusercode'],'แก้ไขสินค้า',$pcode);
	$sql="update ".$dbprefix."product set pcode='$pcode', pdesc='$pdesc', unit='$unit', price='$price' where pcode= '$oid' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=productoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
	$sql="update ".$dbprefix."product set pv='$pv', bv='$bv',fv='$fv', qty='$qty' where pcode= '$oid' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=productoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	if (!mysql_query($sql)) {
		ob_end_flush();
		echo "<font color='#FF0000'>error</font><br>";
		//echo "$sql<br>";
	}
	else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=1'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
?>