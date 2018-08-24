<? 
session_start();

include("connectmysql.php");
include("prefix.php");
//require("checklogin.php");

if (isset($_POST["fmcode"])){$fmcode=$_POST["fmcode"];}else{$fmcode="";}
if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}
 
if(!empty($fmcode)){
	$mcode = $fmcode.$mcode;
	$sql = "SELECT concat('".$fmcode."',FLOOR( RAND( ) *10000000)) AS random_number FROM ".$dbprefix."member WHERE  'random_number' NOT IN ( SELECT mcode FROM ".$dbprefix."member ) Limit 0,1 ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0) {
		$data = mysql_fetch_object($rs);
		$random_number = substr($data->random_number,2,9);
		echo $random_number;	
		exit;
	} 
}else{
	echo "";	
	exit;
}

?>