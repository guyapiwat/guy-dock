<?session_start();?>

<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("../function/function_pos.php");
require_once("logtext.php");
require_once("function.log.inc.php");

if(isset($_GET['state']))getDataForm();

if($status_member == '1'){$s_status_mb='เปิดระบบ Member';}else{$s_status_mb='ปิดระบบ Member';}
if($status_regis_mb == '1'){$s_status_regis_mb='เปิดฟังก์ชั่นสมัคร Member';}else{$s_status_regis_mb='ปิดฟังก์ชั่นสมัคร Member';}
if($status_sale_mb == '1'){$s_status_sale_mb='เปิดฟังก์ชั่นสั่งซื้อ Member';}else{$s_status_sale_mb='ปิดฟังก์ชั่นสั่งซื้อ Member';}
if($status_swap_mb == '1'){$s_status_swap_mb='เปิดฟังก์ชั่นแลกของ Member';}else{$s_status_swap_mb='ปิดฟังก์ชั่นแลกของ Member';}
if($status_hold_mb == '1'){$s_status_hold_mb='เปิดฟังก์ชั่นแจงยอด Member';}else{$s_status_hold_mb='ปิดฟังก์ชั่นแจงยอด Member';}

if($status_member <> $status_member_old){logtext(true,$_SESSION["adminusercode"],$s_status_mb,'');}
if($status_regis_mb <> $status_regis_mb_old){logtext(true,$_SESSION["adminusercode"],$s_status_regis_mb,'');}
if($status_sale_mb <> $status_sale_mb_old){logtext(true,$_SESSION["adminusercode"],$s_status_sale_mb,'');}
if($status_swap_mb <> $status_swap_mb_old){logtext(true,$_SESSION["adminusercode"],$s_status_swap_mb,'');}
if($status_hold_mb <> $status_hold_mb_old){logtext(true,$_SESSION["adminusercode"],$s_status_hold_mb,'');}
if($status_remark <> $status_remark_old){logtext(true,$_SESSION["adminusercode"],"ฟังก์ชั่นตั้งค่าแก้ไขข้อความ : ".$status_remark,'');}

$update = array(
	"status_member" 			=> $status_member,
	"status_member_remark" 		=> $status_member_remark,
	"status_regis_mb" 			=> $status_regis_mb,
	"status_regis_mb_remark" 	=> $status_regis_mb_remark,
	"status_sale_mb" 			=> $status_sale_mb,
	"status_sale_mb_remark" 	=> $status_sale_mb_remark,
	"status_swap_mb" 			=> $status_swap_mb,
	"status_swap_mb_remark" 	=> $status_swap_mb_remark,
	"status_hold_mb" 			=> $status_hold_mb, 
	"status_hold_mb_remark" 	=> $status_hold_mb_remark,
	"status_remark" 			=> $status_remark,
);
$global = update('ali_global',$update,"1=1"); 
echo "<script language='JavaScript'>alert('ทำรายการเรียบร้อย');window.location='index.php?sessiontab=".$sessiontab."&sub=".$sub."';</script>";        
exit; 

?> 