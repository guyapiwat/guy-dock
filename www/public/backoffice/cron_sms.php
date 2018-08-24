<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? include("function.php");?>
<? require_once ("function.log.inc.php");?>
<?
set_time_limit (30);
include("functionSMS.php");
include("gencode.php");
 
//ini_set("memory_limit","100M");
	include("sms.class.php");

if($_POST){
	$sid = $_POST["sid"];
	$status = $_POST["status"];
	$used_credit = $_POST["UsedCredit"];
	$credit_balance = $_POST["RemainCredit"];
	if($status == '1')$status = 'Success';
	if($status == '0')$status = 'Fail';

//	mysql_query("update ".$dbprefix."sms set mobile_status = '$status' , recieve_date = now()+0 , mobile_credits = '$used_credit', credit_balance = '$credit_balance' where id = '$id'");
	mysql_query("update ".$dbprefix."sms set mobile_status = '$status' , recieve_date = now()+0   where id = '$sid'");

	exit;
}else{

mysql_query("update ".$dbprefix."cron(cron_detail,httppost,requesturl,phpself) values('cron_sms','".$_SERVER['REMOTE_ADDR']."','".$_SERVER['REMOTE_HOST']."','".$_SERVER['PHP_SELF']."')");
}
	

$sql="SELECT * FROM ".$dbprefix."sms where mobile_status = '' ";
$rs = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rs);$i++){
	$sqlObj = mysql_fetch_object($rs);
	$id =$sqlObj->id;		
	$msisdn =$sqlObj->mobile;		
	$message =$sqlObj->mobile_desc;		
	$ScheduledDelivery = date("Y-m-d H:i:s");		

		define(_SERVER, 'www.omc-mobile.com');
		define(_PORT, '80');
		define(_URI, '/receive/omcsmsapi.php');
		// Username and password for ThaiBulkSMS Account
		$username = "Noblelife";
		$password = "Noblelife19";
		$sender = 'noblelife';

		$resp_url = "http://203.146.170.60/~noblelife/backoffice/cron_sms.php";
		$data_string = "username=" . urlencode($username) . "&password=" . urlencode($password) . "&mobile=" . urlencode($msisdn) . "&message=" . urlencode($message) . "&sendername=" . urlencode($sender) . "&sdate=" . urlencode($ScheduledDelivery). "&sid=" . urlencode($id). "&resp_url=" . urlencode($resp_url);
		$count_pass = $result = httpPost( _SERVER , _PORT , _URI, $data_string);
		print($count_pass);
		if (!is_string($result)) {
			//	die("Fatal Error: Unable to connect to server.\n\n");
			echo "Fatal Error: Unable to connect to server.\n\n";
			exit;
		}else{
			$xml = xml($result);
			$count = count($xml['SMS']['QUEUE']);
			if($count > 0){
				$count_pass = 0;
				$count_fail = 0;
				$used_credit = 0;
				for($j=0;$j<$count;$j++){
					if($xml['SMS']['QUEUE'][$j]['Status']){
						$count_pass++;
						$used_credit +=
						$xml['SMS']['QUEUE'][$j]['UsedCredit'];
						$credit_balance =
						$xml['SMS']['QUEUE'][$j]['RemainCredit'];
					}else{
						$count_fail++;
					}
				}
				if($count_pass>0){
				//	echo "Success: $count_pass messages, Total: $used_credit credits\n";
					mysql_query("update ".$dbprefix."sms set mobile_status = 'Waiting' , send_date = now()+0 , mobile_credits = '$used_credit', credit_balance = '$credit_balance' where id = '$id'");
				}
			}
		}

}
?>