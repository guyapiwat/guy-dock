<?
require_once("logtext.php");
require_once("global.php");
require_once("function.php");
require_once ("function.log.inc.php");
	$bid = $_GET['bid'];
	$sqlS = "select * from ".$dbprefix."transfersale_h where id='$bid' and sano='' and paytype=0 and cancel = 0 and credittype = 0 ";
	
	$sqlSS = mysql_query($sqlS);
	if(mysql_num_rows($sqlSS) > 0){
		$dataS = mysql_fetch_object($sqlSS);
		$del = "UPDATE ".$dbprefix."transfersale_h SET cancel='1' WHERE id='$bid' ";
		mysql_query($del);
		 
	}else {
		echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้ ');window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."'</script>";	
		exit;
	}
  
	//====================LOG===========================
	$text="uid=".$_SESSION["usercode"]." action=saleonline_cancel=>$sql";
	writelogfile($text);
	//=================END LOG===========================
	//echo $sql;
	
	logtext(true,$_SESSION["usercode"],'ยกเลิกบิล',$bid);
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."'</script>";	
 
?>
 