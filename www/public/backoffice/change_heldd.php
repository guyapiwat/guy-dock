<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	$date_now = date("Y-m-d");
	$sqlSelect = "select * from ".$dbprefix."asaleh where id = '{$_GET["sender"]}' ";
	$rs = mysql_query($sqlSelect);
	if(mysql_num_rows($rs) > 0){
		$sqlObj = mysql_fetch_object($rs);
		$asend =$sqlObj->asend;		
	}
	mysql_free_result($rs);
	if($asend == 0)$asend = 1;
	else $asend = 0;
	$sqlUpdate = "update ".$dbprefix."asaleh set asend = '$asend',asend_date = '$date_now' where id = '{$_GET["sender"]}'";
	//echo $sqlUpdate;
	//exit;
	//$rs = mysql_query($sqlUpdate);
}

echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=6'</script>";	

?>