<?
 if($_GET['id']){
 	$sql = "UPDATE ".$dbprefix."member SET status_blacklist=1 WHERE id='".$_GET['aid']."' ";
	mysql_query($sql);
 }else{
 	$sql = "UPDATE ".$dbprefix."member SET status_blacklist=0 WHERE id='".$_GET['aid']."' ";
	mysql_query($sql);
 }
 
 echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";	
?>