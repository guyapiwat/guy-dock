<?

$member = query("*","ali_member","id='".$_GET['aid']."'");
 if($_GET['id']){
 	$sql = "UPDATE ".$dbprefix."member SET status_suspend=1 WHERE id='".$_GET['aid']."' ";
	mysql_query($sql);
	logtext(true,$_SESSION['adminusercode'],"Suspend รหัสสมาชิก : ".$member[0]['mcode'],$_GET['mcode']);
 }else{
 	$sql = "UPDATE ".$dbprefix."member SET status_suspend=0 WHERE id='".$_GET['aid']."' ";
	mysql_query($sql);
	logtext(true,$_SESSION['adminusercode'],"ยกเลิก Suspend รหัสสมาชิก : ".$member[0]['mcode'],$_GET['mcode']);
 }
 
 echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";	
?>