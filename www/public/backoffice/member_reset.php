<?
require_once("logtext.php");
require_once ("function.log.inc.php");
include("global.php");
	$bid = $_GET['bid'];
	 $sqlS = "select * from ".$dbprefix."member where id='$bid' ";
	$sqlSS = mysql_query($sqlS);
	if(mysql_num_rows($sqlSS) > 0){
		$dataS = mysql_fetch_object($sqlSS);
		$id_card =$dataS->id_card;
		$mcode =$dataS->mcode;
		//echo $id_card;
		$sv_code =  substr($id_card, -4, 4); 
		if(empty($sv_code))	$sv_code =  substr($mcode, -4, 4); 

	}
	
	$sql = "UPDATE ".$dbprefix."member SET sv_code='$sv_code' WHERE id='$bid' ";
	mysql_query($sql);
	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=sale_hcancel=>$sql";
writelogfile($text);
//=================END LOG===========================
	//echo $sql;

		if($GLOBALS["status_member"] == 1){
			//if($GLOBALS["sms_credits"] > 0 ){
				if(!empty($mobile)){
					$msisdn = $mobile;
					$subname = substr($name_t,0,15);
					$message = "ขอรหัสผ่านใหม่
รหัสสมาชิก $mcode
รหัสผ่านใหม่ของคุณคือ $sv_code";
					//$message = "ยินดีต้อนรับสู่ ซัคเซสมอร์ บีอิ้ง รหัส : ".$mcode." รหัสผ่าน : ".$sv_code;
					sendsms($dbprefix,$msisdn,$message,$ScheduledDelivery="",$mcode);
				}
			//}
		}

	logtext(true,$_SESSION['adminusercode'],'reset password',$bid);
	echo "<script language='JavaScript'>window.location='index.php?sessiontab=1&sub=2'</script>";	


?>
