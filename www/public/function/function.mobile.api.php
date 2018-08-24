<?php
function api_mobileMember($user_name,$pwd,$user_fullname,$user_address,$register_date,$user_citizen_no,$user_invite,$user_upline,$LeftRight,$user_zipcode,$user_account_number,$user_account_name,$user_level,$user_bank_branch,$user_birth_date,$user_gender,$user_email,$user_tel) {
	
	$url = "http://member.fli.in.th/api/fli_syncuser/";
	//$url = "http://demoflimember.ipoll.in.th/api/fli_syncuser/";
	$api_user = "fli.lite";
	$api_pwd = "fli@lite";

	$register_date = explode('-',$register_date);
	$register_date = $register_date[2]."/".$register_date[1]."/".$register_date[0];

	$user_birth_date = explode('-',$user_birth_date);
	$user_birth_date = $user_birth_date[2]."/".$user_birth_date[1]."/".$user_birth_date[0];

	if($LeftRight=="1"){$LeftRight="L";}else if($LeftRight=="2"){$LeftRight="R";}
	if($user_gender=="ชาย"){$user_gender="M";}else if($user_gender=="หญิง"){$user_gender="F";}

	$param = "api_user=$api_user&api_pwd=$api_pwd&user_name=$user_name&pwd=$pwd&user_fullname=$user_fullname&user_address=$user_address&register_date=$register_date&user_citizen_no=$user_citizen_no&user_invite=$user_invite&user_upline=$user_upline&LeftRight=$LeftRight&user_zipcode=$user_zipcode&user_account_number=$user_account_number&user_account_name=$user_account_name&user_level=$user_level&user_bank_branch=$user_bank_branch&user_birth_date=$user_birth_date&user_gender=$user_gender&user_email=$user_email&user_tel=$user_tel";

	$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	$result = curl_exec($ch);
	curl_close ($ch);
	
	$status = getData($result,"STATUS");
	$message = getData($result,"MESSAGE");
	$reference_id = getData($result,"REFERENCE_ID");
	
	api_log('add_member',$user_name,$status,$message,$reference_id);
}

function api_mobileChekEwallet($user_name,$pwd) {
	
	$url = "http://member.fli.in.th/api/fli_CheckEWallet/";
	//$url = "http://demoflimember.ipoll.in.th/api/fli_CheckEWallet/";
	$api_user = "fli.lite";
	$api_pwd = "fli@lite";

	$param = "api_user=$api_user&api_pwd=$api_pwd&user_name=$user_name&pwd=$pwd";
	$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	$result = curl_exec($ch);
	curl_close ($ch);
	
	$status = getData($result,"STATUS");
	$message = getData($result,"MESSAGE");
	$reference_id = getData($result,"REFERENCE_ID");
	
	api_log('check_ewallet',$user_name,$status,$message,$reference_id);

	return $message;
}

function api_mobileUpdateEwallet($user_name,$pwd,$amount_used) {
	
	$url = "http://member.fli.in.th/api/fli_UpdateEWallet/";
	//$url = "http://demoflimember.ipoll.in.th/api/fli_UpdateEWallet/";
	$api_user = "fli.lite";
	$api_pwd = "fli@lite";

	$param = "api_user=$api_user&api_pwd=$api_pwd&user_name=$user_name&pwd=$pwd&amount_used=$amount_used";
	$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	$result = curl_exec($ch);
	curl_close ($ch);
	
	$status = getData($result,"STATUS");
	$message = getData($result,"MESSAGE");
	$reference_id = getData($result,"REFERENCE_ID");
	
	api_log('update_ewallet',$user_name,$status,$message,$reference_id);
}

function api_mobileAddProduct($PRODUCT_CODE,$PRODUCT_NAME,$PRODUCT_ACTUAL_PRICE,$PRODUCT_DISCOUNT_PRICE,$PRODUCT_NON_MEMBER_PRICE,$PRODUCT_PV,$PRODUCT_HAVE_DISCOUNT ) {
	
	$url = "http://member.fli.in.th/api/fli_product/add/";
	//$url = "http://demoflimember.ipoll.in.th/api/fli_product/add/";
	$api_user = "fli.lite";
	$api_pwd = "fli@lite";

	$param = "api_user=$api_user";
	$param .= "&api_pwd=$api_pwd";
	$param .= "&PRODUCT_CODE=$PRODUCT_CODE";
	$param .= "&PRODUCT_NAME=$PRODUCT_NAME";
	$param .= "&PRODUCT_ACTUAL_PRICE=$PRODUCT_ACTUAL_PRICE";
	$param .= "&PRODUCT_DISCOUNT_PRICE=$PRODUCT_DISCOUNT_PRICE";
	$param .= "&PRODUCT_NON_MEMBER_PRICE=$PRODUCT_NON_MEMBER_PRICE";
	$param .= "&PRODUCT_PV=$PRODUCT_PV";
	$param .= "&PRODUCT_HAVE_DISCOUNT=$PRODUCT_HAVE_DISCOUNT";

	$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	$result = curl_exec($ch);
	curl_close ($ch);
	
	$status = getData($result,"STATUS");
	$message = getData($result,"MESSAGE");
	$reference_id = getData($result,"REFERENCE_ID");
	
	api_log('add_product',$user_name,$status,$message,$reference_id);
}

function api_mobileUpdateProduct($PRODUCT_CODE,$PRODUCT_NAME,$PRODUCT_ACTUAL_PRICE,$PRODUCT_DISCOUNT_PRICE,$PRODUCT_NON_MEMBER_PRICE,$PRODUCT_PV,$PRODUCT_HAVE_DISCOUNT ) {
	
	$url = "http://member.fli.in.th/api/fli_product/update/";
	//$url = "http://demoflimember.ipoll.in.th/api/fli_product/update/";
	$api_user = "fli.lite";
	$api_pwd = "fli@lite";

	$param = "api_user=$api_user";
	$param .= "&api_pwd=$api_pwd";
	$param .= "&PRODUCT_CODE=$PRODUCT_CODE";
	$param .= "&PRODUCT_NAME=$PRODUCT_NAME";
	$param .= "&PRODUCT_ACTUAL_PRICE=$PRODUCT_ACTUAL_PRICE";
	$param .= "&PRODUCT_DISCOUNT_PRICE=$PRODUCT_DISCOUNT_PRICE";
	$param .= "&PRODUCT_NON_MEMBER_PRICE=$PRODUCT_NON_MEMBER_PRICE";
	$param .= "&PRODUCT_PV=$PRODUCT_PV";
	$param .= "&PRODUCT_HAVE_DISCOUNT=$PRODUCT_HAVE_DISCOUNT";

	$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	$result = curl_exec($ch);
	curl_close ($ch);
	
	$status = getData($result,"STATUS");
	$message = getData($result,"MESSAGE");
	$reference_id = getData($result,"REFERENCE_ID");
	
	api_log('update_product',$user_name,$status,$message,$reference_id);
}

function api_mobileSuspendProduct($PRODUCT_CODE,$PRODUCT_SUSPEND) {
	
	$url = "http://member.fli.in.th/api/fli_product/suspend/";
	//$url = "http://demoflimember.ipoll.in.th/api/fli_product/update/";
	$api_user = "fli.lite";
	$api_pwd = "fli@lite";

	$param = "api_user=$api_user";
	$param .= "&api_pwd=$api_pwd";
	$param .= "&user_name=$user_name";
	$param .= "&pwd=$pwd";
	$param .= "&PRODUCT_CODE=$PRODUCT_CODE";
	$param .= "&PRODUCT_SUSPEND=$PRODUCT_SUSPEND";

	$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.4) Gecko/20030624 Netscape/7.1 (ax)";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
	$result = curl_exec($ch);
	curl_close ($ch);
	
	$status = getData($result,"STATUS");
	$message = getData($result,"MESSAGE");
	$reference_id = getData($result,"REFERENCE_ID");
	
	api_log('suspend_product',$user_name,$status,$message,$reference_id);
}

function api_log($action,$mcode,$status,$message,$reference_id ) {
	global $_POST;
	foreach ($_GET as &$v) $v = inputToUtf8($v); unset($v);
	$sql="INSERT INTO ali_log_api (action, mcode, status, message, reference_id,ip,data_send)VALUES ('$action', '$mcode', '$status', '$message' ,'$reference_id','".get_client_ip_env()."','".iconv("utf-8","tis-620",serialize($_POST))."')";
	mysql_query($sql);
}

function get_post(){
	global $_POST;
	if($_POST){
		$data_send = array();
		foreach ($_POST as $key=>$val){
			$data_send[$key]=iconv("utf-8","tis-620",trim(strip_tags($val)));
		}
		return json_encode($data_send);
	}
}

function getData($result,$tag) {
	$xml = simplexml_load_string($result);
	return $xml->$tag;
}

function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}
?>