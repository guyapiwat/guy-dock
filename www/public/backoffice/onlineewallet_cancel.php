<?
require_once("logtext.php");
require_once ("function.log.inc.php");
	$bid = $_GET['bid'];
	 $sqlS = "select * from ".$dbprefix."transferewallet_h where id='$bid' and cancel = 0 ";
	$sqlSS = mysql_query($sqlS);
	if(mysql_num_rows($sqlSS) > 0){
		$dataS = mysql_fetch_object($sqlSS);
		$inv_code =$dataS->inv_code;
		$mcode =$dataS->mcode;
		$ssend =$dataS->send;
		$total =$dataS->total;
		$sadate =$dataS->sadate;
		$sendtype =$dataS->sendtype; 
	}
	 $sqlS = "select * from ".$dbprefix."transferewallet_h where id='$bid' and cancel = 1";
	$sqlSS = mysql_query($sqlS);

//	echo $sqlC;
//	exit;
	if(mysql_num_rows($sqlSS) > 0 ){
		 echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";
			exit;
	}		
	$sql = "UPDATE ".$dbprefix."transfersale_h SET cancel='1' WHERE id='$bid' ";
	mysql_query($sql);
	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=sale_cancel=>$sql";
writelogfile($text);
//=================END LOG===========================
	//echo $sql;
	
	logtext(true,$_SESSION['adminusercode'],'ยกเลิก Ewallet Online รหัส : '.$id.' รหัสสมาชิก : '.$mcode,$bid);

 echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";


?>
