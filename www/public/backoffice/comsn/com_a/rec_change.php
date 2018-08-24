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
		$s_receive =$sqlObj->receive;		
	}
	mysql_free_result($rs);
	if($s_sender == 0)$s_sender = 1;
	else $s_sender = 0;
	$sqlUpdate = "update ".$dbprefix."isaleh set receive = '$s_receive',receive_date = '$date_now' where id = '{$_GET["sender"]}'";
	$rs = mysql_query($sqlUpdate);
}

echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=138'</script>";	

?>