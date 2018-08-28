<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	$date_now = date("Y-m-d");
	$page = $_GET['page'];
	$sqlSelect = "select * from ".$dbprefix."asaleh where id = '{$_REQUEST["sender"]}' ";
	$rs = mysql_query($sqlSelect);
	if(mysql_num_rows($rs) > 0){
		$sqlObj = mysql_fetch_object($rs);
		$asend =$sqlObj->sender;		
		$sano =$sqlObj->sano;		
		$send =$sqlObj->send;		
	}
	//exit;
	mysql_free_result($rs);
	if($send == '2'){
		echo "<script language='JavaScript'>alert('ไม่สามารถแก้ไขการส่งของได้');window.location='index.php?sessiontab=3&sub=6'</script>";	
		exit;
	}
	if($asend == '1'){
		//echo "<script language='JavaScript'>alert('ไม่สามารถแก้ไขการส่งของได้');window.location='index.php?sessiontab=3&sub=6'</script>";	
	//	exit;
	}
	if($_POST){

		if($asend == 0)$asend = 1;
		else $asend = 0;
		$sqlUpdate = "update ".$dbprefix."asaleh set remark='".$_POST["txtoption"]."' ,sender = '$asend',sender_date = '$date_now' where id = '{$_REQUEST["sender"]}'";
		//echo $sqlUpdate;
		//exit;
		$rs = mysql_query($sqlUpdate);
echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."&page=".$page."'</script>";	

	}
}
?>
<form action="" method="post">
เลขบิล : <?=$sano?>
<br>
กรอกข้อมูลอ้างอิงบริษัทจัดส่ง : <input type="textbox" name="txtoption">
<input type="submit" name="submit" value="update">
<input type="hidden" name="sender" value="<?=$_REQUEST["sender"]?>">
</form>