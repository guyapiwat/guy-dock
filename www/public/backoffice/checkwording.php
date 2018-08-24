<?
$_SESSION["lan"] = 'TH';
if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
		if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
		else $_SESSION["lan"] = $_GET["lan"];
	}else{
		if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
	}
	include_once("wording".$_SESSION["lan"].".php");
?>