<?session_start();?>

<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("../function/function_pos.php");
require_once("logtext.php");
require_once("function.log.inc.php");

if(isset($_GET['state'])){
	getDataForm();
	if($vip_exp <> $vip_exp_old){logtext(true,$_SESSION["adminusercode"],"��Ѻ���͹䢢�� VIP �ҡ ".number_format($vip_exp_old,0,".",",")." �� ".number_format($vip_exp,0,".",","),'');}
	$update = array(
		"vip_exp" 			=> $vip_exp,
	);
	$global = update('ali_global',$update,"1=1"); 
	echo "<script language='JavaScript'>alert('����¡�����º����');window.location='index.php?sessiontab=".$sessiontab."&sub=".$sub."';</script>";        
	exit; 
}
?> 