<?
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["pos"])){$pos=$_POST["pos"];}else{$pos="";}
	if (isset($_POST["opos"])){$opos=$_POST["opos"];}else{$opos="";}
	if (isset($_POST["carry_l"])){$carry_l=$_POST["carry_l"];}else{$carry_l=0.00;}
	if (isset($_POST["carry_r"])){$carry_r=$_POST["carry_r"];}else{$carry_r=0.00;}
	if (isset($_POST["posdate"])){$posdate=date("Y-m-d");}else{$posdate=date("Y-m-d");}
}
if($_GET['state']==1 && !system_code($mcode)){
	logtext(true,$_SESSION['adminusercode'],'แก้ไขตำแหน่งสมาชิก',$id);
	$sql = "SELECT mcode FROM ".$dbprefix."member WHERE id='$id' LIMIT 1 ";
	$rs  = mysql_query($sql);
	$sql = "INSERT INTO ".$dbprefix."poschange (mcode,pos_before,pos_after,date_change,type) ";
	$sql .= "VALUES('".mysql_result($rs,0,'mcode')."','$opos','$pos','posdate','1')";
	
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
	$sql="update ".$dbprefix."member set pos_cur='$pos' where id='$id' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
		
	if (!mysql_query($sql)) {
		ob_end_flush();
		echo "<font color='#FF0000'>error</font><br>";
		//echo "$sql<br>";
	}
	else {
		$sql = "SELECT * FROM ".$dbprefix."member WHERE id='$id' LIMIT 1";
	//echo $sql;
		$rs = mysql_query($sql);
		$mcode = mysql_result($rs,0,'mcode');
		$sql1 = "update ".$dbprefix."bmbonus set carry_l = '$carry_l',carry_r = '$carry_r' where mcode = '$mcode'";
		mysql_query($sql1) or die("no update");
		mysql_query("COMMIT");

		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=2&sub=1'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
function system_code($code){
	$sys_code = array('');
	$code = strtoupper($code);
	for($i=0;$i<sizeof($sys_code);$i++){
		if($sys_code===$code)
			return true;
	}
	return false;
}
?>
