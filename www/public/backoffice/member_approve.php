<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	$date_now = date("Y-m-d");
	$sqlSelect = "select * from ".$dbprefix."member where id = '{$_GET["cmc"]}' ";
	$rs = mysql_query($sqlSelect);
	if(mysql_num_rows($rs) > 0){
		$sqlObj = mysql_fetch_object($rs);
		$approve =$sqlObj->approve;		
	}
	mysql_free_result($rs);
	if($approve == 0)$approve = 1;
	else $approve = 0;
	$sqlUpdate = "update ".$dbprefix."member set approve = '$approve' where id = '{$_GET["cmc"]}'";
	//echo $sqlUpdate;
	//exit;
	$rs = mysql_query($sqlUpdate);
}

echo "<script language='JavaScript'>window.location='index.php?sessiontab=1&sub=2'</script>";	

?>