<? 
session_start();
include("connectmysql.php");
	if(!empty($_GET['sender'])){$mid = $_GET['sender'];}else{$mid = "";}
	$object_stocks = new stocks ();
	$object_stocks->set_data($mid,"ostock","receive","2"); 
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=561'</script>";	

?>