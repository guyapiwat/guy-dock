<?
session_start();
//var_dump($_POST);
$_SESSION["pcode"] = "";
$_SESSION["qty"] = "";
$_SESSION["totalpv"] = "";
$_SESSION["sumtotal"] = "";
$_SESSION["sumpv"] = "";
$_SESSION["radsend"] = "";
$_SESSION["cprovince"] = "";
$_SESSION["pcode"] = $_POST["pcode"];
$_SESSION["qty"] = $_POST["qty"];
$_SESSION["totalpv"] = $_POST["totalpv"];
$_SESSION["sumtotal"] = $_POST["sumtotal"];
$_SESSION["sumpv"] = $_POST["sumpv"];
$_SESSION["radsend"] = $_POST["radsend"];
$_SESSION["cprovince"] = $_POST["cprovince"];
//exit;
?>
<html>
<body>
<form id=frm name=frm action='c.php' >
</form>
<img src="../member/images/ProgressBar.gif">
กรุณารอซักครู่
</body>
</html>
<?
//echo "<script language='javascript'>document.getElementById('frm').submit();window.close();</script>";

echo "<script language='javascript'>setTimeout('window.close()',500)</script>";

?>
