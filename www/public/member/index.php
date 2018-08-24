<? 
session_start();
include("global.php");
ini_set("memory_limit","100M");
//include("safetySQL.php");

$_SESSION["chkewallet"] = 0;
$_SESSION["checkclick"] = 0;
$_SESSION["chkdouble"] = 1;
	include("gencode.php");
	if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
		if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
		else $_SESSION["lan"] = $_GET["lan"];
	}else{
		if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
	}
	include_once("wording".$_SESSION["lan"].".php"); 
?>
<? require("checklogin.php");?>
<? include("header.php");?>  
<? include("prefix.php");
include("function.php");
?>


<br />
<? if($GLOBALS["statusformat"] == "close" ){
	echo ' <font size="5" color="#FF0000" ><b><center>'.$wording_lan["UnderConstruction"].' 
	
	</b></center>
	</font>';
	exit;
}else if($GLOBALS["status_member"] == "0"){
	echo ' <font style="font-size:1.7em" color="#FF0000" ><b><center>'.$GLOBALS["status_remark"].' 
	</b></center>
	</font>';
	exit;
}
?>
<? 
	if(!isset($_GET['sessiontab']))
		include("info_main.php");
//		include("firstpage.php");
	else{
		$sesstab = $_GET['sessiontab'];
		switch($sesstab){
			case 1 :
				include("info_main.php");
				break;
			case 2 :
				include("chart_main.php");
				break;
			case 3 :
				include("ewallet_main.php");
				break;
			case 4 :
				include("sale_main.php");
				break;
			case 5 :
				include("comsn_main.php");
				break;
			case 99 :
				include("payment_main.php");
				break;
			case 0 :
				include("info_main.php");
				break;
			default :
				echo "<script language='JavaScript'>window.location='index.php?sessiontab=1'</script>";	
		}
	}
?>
<? include "footer.php";?>