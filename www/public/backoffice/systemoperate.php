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

if($status_member == '1'){$s_status_mb='�Դ�к� Member';}else{$s_status_mb='�Դ�к� Member';}
if($status_regis_mb == '1'){$s_status_regis_mb='�Դ�ѧ������Ѥ� Member';}else{$s_status_regis_mb='�Դ�ѧ������Ѥ� Member';}
if($status_sale_mb == '1'){$s_status_sale_mb='�Դ�ѧ������觫��� Member';}else{$s_status_sale_mb='�Դ�ѧ������觫��� Member';}
if($status_swap_mb == '1'){$s_status_swap_mb='�Դ�ѧ�����š�ͧ Member';}else{$s_status_swap_mb='�Դ�ѧ�����š�ͧ Member';}
if($status_hold_mb == '1'){$s_status_hold_mb='�Դ�ѧ����ᨧ�ʹ Member';}else{$s_status_hold_mb='�Դ�ѧ����ᨧ�ʹ Member';}

if($status_member <> $status_member_old){logtext(true,$_SESSION["adminusercode"],$s_status_mb,'');}
if($status_regis_mb <> $status_regis_mb_old){logtext(true,$_SESSION["adminusercode"],$s_status_regis_mb,'');}
if($status_sale_mb <> $status_sale_mb_old){logtext(true,$_SESSION["adminusercode"],$s_status_sale_mb,'');}
if($status_swap_mb <> $status_swap_mb_old){logtext(true,$_SESSION["adminusercode"],$s_status_swap_mb,'');}
if($status_hold_mb <> $status_hold_mb_old){logtext(true,$_SESSION["adminusercode"],$s_status_hold_mb,'');}
if($status_remark <> $status_remark_old){logtext(true,$_SESSION["adminusercode"],"�ѧ���蹵�駤����䢢�ͤ��� : ".$status_remark,'');}

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
echo "<script language='JavaScript'>alert('����¡�����º����');window.location='index.php?sessiontab=".$sessiontab."&sub=".$sub."';</script>";        
exit; 

?> 