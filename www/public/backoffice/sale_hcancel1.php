<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	$bid = $_GET['bid'];
	 $sqlS = "select * from ".$dbprefix."asaleh where id='$bid' and hcancel = 0 ";
	$sqlSS = mysql_query($sqlS);
	if(mysql_num_rows($sqlSS) > 0){
		$dataS = mysql_fetch_object($sqlSS);
		$inv_code =$dataS->inv_code;
		$ssend =$dataS->send;
		$total =$dataS->total;
		$uid =$dataS->uid;
	}
	 $sqlS = "select * from ".$dbprefix."asaleh where id='$bid' and hcancel = 0";
	$sqlSS = mysql_query($sqlS);
	 $sqlC = "select calc from ".$dbprefix."around where fdate >= '$sadate' and tdate <= '$sadate' and calc = 1";
	$sqlSC = mysql_query($sqlC);
//	echo $sqlC;
//	exit;
	if(mysql_num_rows($sqlSS) > 0){
			echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้');window.location='index.php?sessiontab=5&sub=99'</script>";	
			exit;
	}		
	$sql = "UPDATE ".$dbprefix."asaleh SET hcancel='0' WHERE id='$bid' ";
	mysql_query($sql);
	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=sale_hcancel=>$sql";
writelogfile($text);
//=================END LOG===========================
	//echo $sql;
	
	logtext(true,$_SESSION['adminuserid'],'ยกเลิกบิล',$bid);
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=99'</script>";	


?>
