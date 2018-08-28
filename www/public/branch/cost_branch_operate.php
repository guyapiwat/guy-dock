<? 
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
if($_SESSION["perbuy"] == 0){
echo "<script language='JavaScript'>window.location='index.php?sessiontab=6&sub=146&state=2'</script>";
exit;
}
include("connectmysql.php");
include("prefix.php");
require("adminchecklogin.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
include("gencode.php");
include("global.php");

if(isset($_GET['state'])){
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
	if (isset($_POST["date"])){$date=$_POST["date"];}else{$date="";}
	if (isset($_POST["title"])){$title=$_POST["title"];}else{$title="";}
	if (isset($_POST["cost_1"])){$cost_1=$_POST["cost_1"];}else{$cost_1="";}
	if (isset($_POST["cost_2"])){$cost_2=$_POST["cost_2"];}else{$cost_2="";}
	if (isset($_POST["cost_3"])){$cost_3=$_POST["cost_3"];}else{$cost_3="";}
	if (isset($_POST["cost_4"])){$cost_4=$_POST["cost_4"];}else{$cost_4="";}
	if (isset($_POST["remark"])){$remark=$_POST["remark"];}else{$remark="";}
	$uid=$_SESSION["inv_usercode"];
	$total = $_POST["cost_1"]+$_POST["cost_2"]+$_POST["cost_3"]+$_POST["cost_4"];
}
 

 
if($_GET['state']==0){
	 

	 $sql = "
	 INSERT INTO  `ali_cost_branch` (
	`inv_code` ,
	`id` ,
	`date` ,
	`title` ,
	`cost_1` ,
	`cost_2` ,
	`cost_3` ,
	`cost_4` ,
	`total` ,
	`remark` ,
	`uid` 
	)
	VALUES (
	'$inv_code', NULL ,  '$date',  '$title',  '$cost_1',  '$cost_2',  '$cost_3', '$cost_4',  '$total ',  '$remark',  '$uid'
	);
	 ";


 
	if(mysql_query($sql)){
		echo "<script language='JavaScript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=6&sub=9'</script>";
	}

	//====================LOG===========================
	/*logtext(true,$_SESSION['adminuserid'],'  Ewallet รหัส : '.$mid.' จำนวน : '.$txtMoney.' ยอดเดิม :'.$ewallet_before.' คงเหลือ : '.$ewallet_after,$mid);
	$text="uid=".$_SESSION["inv_usercode"]." action=ewalletoperate =>$sql";
	writelogfile($text);
	 */
}
//echo "<script language='JavaScript'>window.open('invoice_aprintw.php?bid=".$mid."');window.location='index.php?sessiontab=6&sub=148'</script>";	

?>

