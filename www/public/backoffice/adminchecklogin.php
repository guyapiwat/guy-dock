<? include("prefix.php");?>
<?
//var_dump($_SESSION["adminusercode"]);
//exit;
if (isset($_SESSION["adminusercode"])) {$usercode=$_SESSION["adminusercode"];} 
else {$usercode="";$_SESSION["adminusercode"]=$usercode;};
if (isset($_SESSION["adminusername"])) {$username=$_SESSION["adminusername"];} 
else {$username="";$_SESSION["adminusername"]=$username;};
if (isset($_SESSION["adminpassword"])) {$password=$_SESSION["adminpassword"];} 
else {$password="";$_SESSION["adminpassword"]=$password;};
require_once('function.php');
require_once('connectmysql.php');
$result=mysql_query("select * from ".$dbprefix."user where usercode='".$usercode."'");
if (@mysql_num_rows($result)>0) {
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
    $DePwd=DecodePwd($row["password"]);
			$usercode=$row["usercode"];
			$object1=$row["object1"];
			$object2=$row["object2"];
			$object3=$row["object3"];
			$object4=$row["object4"];
			$object5=$row["object5"];
			$object6=$row["object6"];
			$object7=$row["object7"];
			$object8=$row["object8"];
			$object9=$row["object9"];
			//$inv_code=$row["inv_code"];
	if (!($_SESSION["adminusercode"] == $usercode and $_SESSION["adminpassword"] == $DePwd and $DePwd <> "" )) {
		/*if (! headers_sent()) {
			//header ("Location: http://".$_SERVER["HTTP_HOST"]. dirname($_SERVER["PHP_SELF"])."/login.php");
			//header ("Location: http://".$_SERVER["HTTP_HOST"]."/login.php");
			header ("Location: login.php");
		}*/
		include "login.php";
		exit;
	}
}
else {
		if (! headers_sent()) {
			//header ("Location: http://".$_SERVER["HTTP_HOST"]. dirname($_SERVER["PHP_SELF"])."/login.php");
			//header ("Location: http://".$_SERVER["HTTP_HOST"]."/login.php");
			header ("Location: login.php");
		}
		include "login.php";
		exit;
}
function chkuser($usercode,$no){
global $dbprefix;
$result=mysql_query("select * from ".$dbprefix."user where usercode='".$usercode."' and object". $no . " ='1'");
	if (mysql_num_rows($result) <= 0) {	
		header ("Location: login.php");	
	}
}
?>
