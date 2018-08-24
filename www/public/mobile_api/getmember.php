<?
ob_start("conv");
include("../backoffice/connectmysql.php");
require_once("../backoffice/gencode.php");
require_once("../backoffice/global.php");
require_once ("../backoffice/function.log.inc.php");
require_once ("../function/function_pos.php");
require_once ("../function/function.mobile.api.php");

$user_name = trim(strip_tags($_POST['mem_code']));
$user_mobile = trim(strip_tags($_POST['mem_mobile']));
$user_pwd = trim(strip_tags($_POST['user_pwd']));
$api_user = trim(strip_tags($_POST['api_user']));
$api_pwd = trim(strip_tags($_POST['api_pwd']));
$fdate = trim(strip_tags($_POST['start_date']));
$tdate = trim(strip_tags($_POST['end_date']));
$HardCode_user = "CCI.gotoapi";
$HardCode_pwd = "CCI@gotoapi";
$new_pass = trim(strip_tags($_POST['new_pass'])); 

if(($api_user!=$HardCode_user) or ($api_pwd!=$HardCode_pwd)) {
	$error = "API CREDENTIALS FAILED";
}else{
	if((isset($user_name) and $user_name != "") and (trim($user_mobile) <> '' or trim($user_name) <> '' )){

		$sql = "SELECT mcode,name_t,mobile FROM ali_member WHERE mcode='$user_name' or mobile='$user_mobile' or mobile='$user_name' or email='$user_name' or id_card='$user_name' ";
		
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0 ){
			$error = "USER OR START DATE OR END DATE DOES NOT EXISTS $sql";
		}else{
			$row = mysql_fetch_object($rs);
			//if($row->name_t <> ''){
			//if(($row->mcode==$user_name or $row->mobile==$user_name or $row->email==$user_name or $row->id_card==$user_name)){
				//header("Content-type:text/xml; charset=TIS-620");     
				$xml.='<CCI>'; 
				$xml.='<MEMBER> '; 
				$xml.='<STATUS>SUCCESS</STATUS>';
				$xml.='<MEMBER_CODE>'.$user_name.'</MEMBER_CODE>';
				$xml.='<MEMBER_NAME>'.conv($row->name_t).'</MEMBER_NAME>';
				$xml.='<MEMBER_MOBILE>'.$row->mobile.'</MEMBER_MOBILE>';
				$xml.='<MEMBER_SUCCESS>OK</MEMBER_SUCCESS>';
				$xml.='</MEMBER>'; 
				$xml.='</CCI> ';
				echo $xml;	
				api_log('get_bonus',$user_name,"SUCCESS","",$user_name);
				exit;
			//}else {
			//	$error = "USER NAME DOES NOT MATCH"; 
			//}
		}
	}else{
		$error = "USER LOGIN NAME/PASSWORD EMPTY"; 
	}
}
function conv($buffer) {
	//return $buffer;
  return iconv("UTF-8", "TIS-620", $buffer);
}

$xml.='<CCI>'; 
$xml.='<MEMBER> '; 
$xml.='<STATUS>FAIL</STATUS>';
$xml.='<MESSAGE>'.$error.'</MESSAGE>'; 
$xml.='<MEMBER_CODE>'.$user_name.'</MEMBER_CODE>';
$xml.='</MEMBER>'; 
$xml.='</CCI> ';
echo $xml;	
api_log('get_bonus',$user_name,"ERROR",$error,$user_name);
exit;

ob_end_flush();
?>