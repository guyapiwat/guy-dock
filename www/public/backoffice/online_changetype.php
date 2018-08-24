<?
$id = $_GET['id'];
 if(isset($_GET['tstype'])){
 	$sql = "UPDATE ".$dbprefix."onlinepoint_h SET transtype='".$_GET['tstype']."' WHERE id='".$id."' and cancel = 0 ";
	mysql_query($sql);
 }else if(isset($_GET['ptype'])){
	$sql = "UPDATE ".$dbprefix."onlinepoint_h SET paytype='".$_GET['ptype']."' WHERE id='".$id."' and cancel = 0 ";
	mysql_query($sql);
 }else if(isset($_GET['stype'])){
	$sql = "UPDATE ".$dbprefix."onlinepoint_h SET sendtype='".$_GET['stype']."' WHERE id='".$id."' and cancel = 0 ";
	mysql_query($sql);
 }
 
 echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";
?>