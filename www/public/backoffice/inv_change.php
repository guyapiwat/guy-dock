<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");

if(isset($_GET['sender']) and isset($_GET['status'])){
	if($_GET['status'] == "sender"){$checkportal = "1";}else{$checkportal = "2";}
	$object_stocks = new stocks ();
	$object_stocks->set_data($_GET['sender'],"isale",$_GET['status'],$checkportal); 
}

echo "<script language='JavaScript'>window.location='index.php?sessiontab=6&sub=138'</script>";	

?>