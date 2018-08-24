<?
if(isset($_GET['operate'])){
		if (isset($_POST["sendby"])){$sendby=$_POST["sendby"];}else{$sendby="";}	
		if (isset($_POST["senddate"])){$senddate=$_POST["senddate"];}else{$senddate="";}	
		if (isset($_POST["sendcode"])){$sendcode=$_POST["sendcode"];}else{$sendcode="";}	
		if (isset($_POST["sendname"])){$sendname=$_POST["sendname"];}else{$sendname="";}	
		if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}

}
if($_GET['operate']==1){
		$sql = "UPDATE ".$dbprefix."onlinepoint_h SET sendby='".$sendby."',senddate='".$senddate."',sendcode='".$sendcode."',sendname='".$sendname."' WHERE id='".$oid."' ";
		mysql_query($sql);
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";	
		exit;
	}
?>