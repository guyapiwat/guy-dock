<? include("prefix.php");?>
<?
if (isset($_SESSION["inv_usercode"])) {$usercode=$_SESSION["inv_usercode"];} 
else {$usercode="";$_SESSION["inv_usercode"]=$usercode;};
if (isset($_SESSION["inv_username"])) {$username=$_SESSION["inv_username"];} 
else {$username="";$_SESSION["inv_username"]=$username;};
if (isset($_SESSION["inv_password"])) {$password=$_SESSION["inv_password"];} 
else {$password="";$_SESSION["inv_password"]=$password;};
if (isset($_SESSION["admininvent"])) {$admininvent=$_SESSION["admininvent"];} 
else {$admininvent="";$_SESSION["admininvent"]=$admininvent;};
require_once('function.php');
require_once('connectmysql.php');
//echo "select * from ".$dbprefix."user where usercode='".$usercode."'<br>";
//echo "select * from ".$dbprefix."invent where inv_code='".$_SESSION["admininvent"]."'";
//if($usercode)$_SESSION["admininvent"] = $usercode;
 

$rs=mysql_query("select * from ".$dbprefix."invent where inv_code='".$_SESSION["admininvent"]."'");
if(!empty($_SESSION["admininvent"])){
	if(mysql_num_rows($rs)>0){
		$showewallet=mysql_result($rs,0,'ewallet');
		$_SESSION["admininvent"] =mysql_result($rs,0,'inv_code');
		$_SESSION["inv_locationbase"] =mysql_result($rs,0,'locationbase');
		$_SESSION["bill_ref"] = mysql_result($rs,0,'bill_ref');
			
//$_SESSION['code_ref'] = mysql_result($rs,0,'code_ref');;
		//var_dump($_SESSION['code_ref']);
	}
	
}


$rs=mysql_query("select * from ".$dbprefix."location_base where cid='".$_SESSION["inv_locationbase"]."'");
if(!empty($_SESSION["admininvent"])){
	if(mysql_num_rows($rs)>0){
	$_SESSION["inv_cname"] =mysql_result($rs,0,'cname');
	$_SESSION["inv_cshort"] = mysql_result($rs,0,'cshort');
	$_SESSION["inv_crate"] = mysql_result($rs,0,'crate');
	$timediff = mysql_result($rs,0,'timediff');	
	$_SESSION["datetimezone"] = date("Y-m-d", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
	$_SESSION["datetimezone_Ym"] = date("Y-m", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
	$_SESSION["datetimezone_time"] = date("H:i:s", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
	$_SESSION["datetimezone_last"] = date("Y-m-t", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
	$_SESSION["datetimezone_nmonth"] = date("Y-m-15", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+1 , date("d")+0, date("Y")+0));

		$_SESSION["datetimezone_F"] = date("F", mktime(date("H"), date("i")+0, date("s")+$timediff, date("m")+0 , date("d")+0, date("Y")+0));
	}
}
if(empty($_SESSION['admininvent']) or $_SESSION["inv_type"] <> '1'){
//session_destroy();
$usercode="";
$_SESSION["inv_usercode"] = "";
		include "login.php";
		exit;
}
//var_dump($showewallet);
$result=mysql_query("select * from ".$dbprefix."user where usercode='".$usercode."'");
if (mysql_num_rows($result)>0) {
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
			$_SESSION["limitcredit"]=$row["limitcredit"];
		/*	$object1_1=$row["object1_1"];
			$object1_2=$row["object1_2"];
			$object1_3=$row["object1_3"];
			$object1_4=$row["object1_4"];
			$object1_5=$row["object1_5"];
			$object1_6=$row["object1_6"];
			$object3_1=$row["object3_1"];
			$object3_2=$row["object3_2"];
			$object3_3=$row["object3_3"];
			$object3_4=$row["object3_4"];
			$object3_5=$row["object3_5"];
			$object3_6=$row["object3_6"];
			$object3_7=$row["object3_7"];
			$object3_8=$row["object3_8"];
			$object3_9=$row["object3_9"];
			$object3_10=$row["object3_10"];
			$object3_11=$row["object3_11"];
			$object6_1=$row["object6_1"];
			$object6_2=$row["object6_2"];
			$object6_3=$row["object6_3"];
			$object6_4=$row["object6_4"];
			$object6_5=$row["object6_5"];*/
			$inv_code=$row["inv_code"];
	if (!($_SESSION["inv_usercode"] == $usercode and $_SESSION["inv_password"] == $DePwd and $DePwd <> "")) {
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
