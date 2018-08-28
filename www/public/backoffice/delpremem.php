<? require "adminchecklogin.php";?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php"); ?>
<html>
<head>
<title>ลบผู้สมัคร</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</head>

<body>
<?

$id = $_GET['did'];
$date = $_GET['dt'];
echo $_POST['del'];
if($_GET['del']==1){
	//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=delpremem =>DELETE FROM ".$dbprefix."premember WHERE id='$id' ";
writelogfile($text);
//=================END LOG===========================
	mysql_query("DELETE FROM ".$dbprefix."premember WHERE id='$id' ");
					//echo "SELECT id FROM ".$dbprefix."premember WHERE mdate='".$_GET['dt']."' ORDER BY mdate LIMIT 1";
					$rs = mysql_query("SELECT id FROM ".$dbprefix."premember WHERE id>'$oid' AND mdate='".$_GET['dt']."' ORDER BY id LIMIT 1");
					if(mysql_num_rows($rs)>0){
						echo "<script type='text/javascript' language='javascript'>";
						echo "window.opener.opener.location.reload();window.opener.location = './confirm.php?dt=".$_GET['dt']."&mid=".mysql_result($rs,0,'id')."';" ;
						mysql_free_result($rs);
						echo "window.close();";
						echo "</script>";
						//echo "window.location='./confirm.php?dt=".$_GET['dt']."&mid=".mysql_result($rs,0,'id');
						exit;
					}
					$rs = mysql_query("SELECT id FROM ".$dbprefix."premember WHERE id<'$oid' AND mdate='".$_GET['dt']."' ORDER BY id DESC LIMIT 1");
					//echo "SELECT id FROM ".$dbprefix."premember WHERE id<'$oid' AND mdate='".$_GET['dt']."' ORDER BY id,mdate DESC LIMIT 1";
					if(mysql_num_rows($rs)>0){
						echo "<script type='text/javascript' language='javascript'>";
						echo "window.opener.opener.location.reload();window.opener.location = './confirm.php?dt=".$_GET['dt']."&mid=".mysql_result($rs,0,'id')."';" ;
						mysql_free_result($rs);
						echo "window.close();";
						echo "</script>";
						mysql_free_result($rs);
						exit;
					}
						echo "<script type='text/javascript' language='javascript'>";
						echo "window.opener.opener.location.reload();window.opener.close();window.close();";
						echo "</script>";
exit;
}
$sql = "SELECT * FROM ".$dbprefix."premember WHERE id='$id' LIMIT 1";
$rs = mysql_query($sql);
if(mysql_num_rows($rs)>0){
	echo "<table width='180'><tr><td align='center'>ต้องการที่จะลบผู้สมัครชื่อ<br />".mysql_result($rs,0,'name_t')."</td></tr>";
	echo "<tr><td align='center'>";
	?>
	<input type="submit" value="ยืนยัน" onClick="window.location = '<?=$PHP_SELF?>?dt=<?=$date?>&did=<?=$id?>&del=1'">
	<input type="button" value="ยกเลิก" onClick="window.close()">
	<?	
	echo "</td></tr></table>";
}else{
	echo "<script type='text/javascript' language='javascript'>window.opner.close();window.close();</script>";
}
?>

</body>
</html>
