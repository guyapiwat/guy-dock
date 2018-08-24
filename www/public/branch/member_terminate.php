<?
$member = query("*","ali_member","id='".$_GET['aid']."'");

 if($_GET['id']){
 	$sql = "UPDATE ".$dbprefix."member SET status_terminate=1,id_card='',acc_type='',acc_no='',acc_name='',bankcode=''  WHERE id='".$_GET['aid']."' ";
	mysql_query($sql);
	logtext(true,$_SESSION['inv_usercode'],"ปรับตำแหน่ง รหัสสมาชิก : ".$member[0]['mcode']." จาก  ".$member[0]['pos_cur']." เป็น TN",$_GET['mcode']);
 }else{
 	$sql = "UPDATE ".$dbprefix."member SET status_terminate=0 WHERE id='".$_GET['aid']."' ";
	mysql_query($sql);
	logtext(true,$_SESSION['inv_usercode'],"ปรับตำแหน่ง รหัสสมาชิก : ".$member[0]['mcode']." จาก  TN เป็น ".$member[0]['pos_cur']."",$_GET['mcode']);
 }
 
 echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET['sessiontab']."&sub=".$_GET['sub']."'</script>";	
?>