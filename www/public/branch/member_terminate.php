<?
$member = query("*","ali_member","id='".$_GET['aid']."'");

 if($_GET['id']){
 	$sql = "UPDATE ".$dbprefix."member SET status_terminate=1,id_card='',acc_type='',acc_no='',acc_name='',bankcode=''  WHERE id='".$_GET['aid']."' ";
	mysql_query($sql);
	logtext(true,$_SESSION['inv_usercode'],"��Ѻ���˹� ������Ҫԡ : ".$member[0]['mcode']." �ҡ  ".$member[0]['pos_cur']." �� TN",$_GET['mcode']);
 }else{
 	$sql = "UPDATE ".$dbprefix."member SET status_terminate=0 WHERE id='".$_GET['aid']."' ";
	mysql_query($sql);
	logtext(true,$_SESSION['inv_usercode'],"��Ѻ���˹� ������Ҫԡ : ".$member[0]['mcode']." �ҡ  TN �� ".$member[0]['pos_cur']."",$_GET['mcode']);
 }
 
 echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";	
?>