<? 
session_start();
//echo date("Y-m-d H:i:s");
//echo $_SERVER['SERVER_NAME'];
//set_time_limit(0);

echo date("Y-m-d H:i:s");
$_SESSION["chkhold"] = 0;
ini_set("memory_limit","200M");

?>

<? include("gencode.php");
	include("checkwording.php");
	$_SESSION["perbuy"] = '1';
?>
<? require("adminchecklogin.php");?>
<? include("logtext.php")?>
<? include("function.log.inc.php")?>
<? require("./cls/repGenerator.php");?>
<?require("../backoffice/date_picker.php"); ?>
<? require("./cls/piority.php");
   require("./date_picker.php"); 
   require("global.php");
 //  include_once("../member/safetySQL.php");	
   //include("../function/global_center.php");

?>
<html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title>Welcome To MLM SYSTEM</title>
<meta name="robots" content="noindex,nofollow">
<meta name="googlebot" content="noindex,noarchieve">
<link rel="stylesheet" type="text/css" href="./../style.css" />
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
</head><!--bgcolor="#FFCC66"-->
<body  bgcolor="#FFFFFF" bgproperties="fixed" leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">

<? include("header.php");?>
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
		//echo 'adminobj'.$sesstab;
		//echo $_SESSION['adminobj'.$sesstab];
		$acc->calc($_SESSION['adminobj'.$sesstab]);
		switch($sesstab){
			case 0 :
				include("change_pass.php");
				break;
			case 1 :
				include("mem_mainmenu.php");
				break;
			case 2 :
			 
				include("vip_mainmenu.php");
				break;
			case 3 :
				include("sales_mainmenu.php");
				break;
			case 4 :
				include("comsn_mainmenu.php");
				break;
			case 5 :
				include("sysadmin_mainmenu.php");
				break;
			case 6 :
				include("stock_mainmenu.php");
				break;
			case 7 :
				include("account_mainmenu.php");
				break;
			case 8 :
				include("marketing_mainmenu.php");
				break;
			case 9 :
				include("supervisor_mainmenu.php");
				break;
			case 10 :
				include("finance_mainmenu.php");
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

