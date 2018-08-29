<? 
// exit;
session_start();
//var_dump($_SESSION["bill_ref"]);
//$star = '0000001';
//echo substr($star,-5);
//echo $_SESSION["datetimezone"].' '.$_SESSION["datetimezone_time"];

//echo $hdate;

	$chkcaptcha  = "";

$_SESSION["lan"] = "TH";
$_SESSION["perbuy"] = 1;
//var_dump($_SESSION);
//set_time_limit(0);
ini_set("memory_limit","100M");
?>

<? include("gencode.php");
	//echo $_SESSION["lan"].' '.$_GET["lan"];
	if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
		if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
		else $_SESSION["lan"] = $_GET["lan"];
	}else{
		if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
	}
	include_once("wording".$_SESSION["lan"].".php");
	
?>

<? require("adminchecklogin.php");
 
if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
		if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
		else $_SESSION["lan"] = $_GET["lan"];
	}else{
		if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
	}
	include_once("wording".$_SESSION["lan"].".php");
	?>
<? include("logtext.php")

?>
<? include("function.log.inc.php");

?>
<? require("./cls/repGenerator.php");

?>
<? require("./cls/piority.php");

 
  include("rpdialog.php"); 
  
//var_dump($_SESSION);
//session_destroy();
?>
<html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<title>Welcome To MLM SYSTEM</title>
<link rel="stylesheet" type="text/css" href="./../style.css" />
<meta name="robots" content="noindex,nofollow">
<meta name="googlebot" content="noindex,noarchieve">
<style>
fieldset {
   border: 1px solid #BEBEBE;
}
</style>
<script language="javascript" type="text/javascript">
	window.onload=function myFocus(){
		tag = window.parent.document.getElementsByTagName('input');
		var i=0;
		if(tag.length>0){
			//tag[0].type);
			while(true){
				if(tag[i].type=="hidden" || tag[i].disabled==true){
					i++;
					continue;
				}else{
					tag[i].focus();
					break;
				}
			}	
		}
	}
</script>
<script language="JavaScript"> 
 
function clock(lan) {
var date = new Date()
var year = <?=date('Y')?>;
var month = date.getMonth()
var day = date.getDate()
var day1 = date.getDay()
var hour = date.getHours()
var minute = date.getMinutes()
var second = date.getSeconds()

if(lan == 'EN'){
var months = new Array("January","Febuary","March","April","May","June","July","August","September","October","November","December")
var thday = new Array ("Sunday","Monday","Tuesday","Wednesday","Thurday","Friday","Satuday");
}else{
var months = new Array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม")
var thday = new Array ("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัส","ศุกร์","เสาร์");

}

var label1 = document.getElementById('lbltime')
var monthname = months[month]
var dayname = thday[day1]
 
if (hour < 10) {
hour = "0"+hour
}
if (minute < 10) {
minute = "0" + minute
}
 
if (second < 10) {
second = "0" + second
}
 
 
label1.innerHTML =""+dayname+" "+day+" "+monthname+" "+(year)+"  "+hour+":"+minute+":"+second
 
setTimeout("clock('"+lan+"')", 1000)
 
}
//  End -->
</script>
</head><!--bgcolor="#FFCC66"-->
<body onLoad="clock('<?=$_SESSION["lan"]?>')"  bgcolor="#FFFFFF" bgproperties="fixed" leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">

<?

include("header.php");

 ?>
<? include("prefix.php");?>
<? $acc = new piority();?>

<table cellpadding="0" cellspacing="0" height="440" width="100%"><tr valign="top"><td>
<br />
<? 
	//$logcode = $_GET['sessiontab']."-".$_GET['sub']."-".$_GET['state'];
	//logtext(true,$_SESSION["adminusercode"],$logcode,$_GET['id']);
	if(!isset($_GET['sessiontab']))
		include("firstPage.php");
	else{
		$sesstab = $_GET['sessiontab'];
		$acc->calc($_SESSION['inventobj'.$sesstab]);
		switch($sesstab){
			case 0 :
				include("change_pass.php");
				break;
			case 1 :
				include("mem_mainmenu.php");
				 
				break;
			case 3 :
				include("sales_mainmenu.php");
				break;
			case 4 :
				include("comsn_mainmenu.php");
				break;
			case 5 :
				include("sending_mainmenu.php");
				break;
			case 6 :
				include("supervisor_mainmenu.php");
				break;
			case 7 :
				include("stock_mainmenu.php");
				break;
			default :
				echo "<script language='JavaScript'>window.location='index.php'</script>";	
		}
	}
?>
</td></tr></table>
<? include "footer.php";?>
</body>
</html>

