<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){

	$date_now = date("Y-m-d");
	$page = $_GET['page'];
	
	$object_stocks = new stocks ();
	$object_stocks->set_data($_GET["sender"],"isale","receive","2");
}
echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."&page=".$_GET["page"]."&chktype=".$_GET["chktype"]."'</script>";	

?>