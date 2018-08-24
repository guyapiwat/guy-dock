<?
function gencode($source){
	for($i=strlen($source);$i<7;$i++)
		$source = "0".$source;
	return $source;
}	
function gencode2($source){
	for($i=strlen($source);$i<2;$i++)
		$source = "0".$source;
	return $source;
}	

function gencode6($source){
	for($i=strlen($source);$i<6;$i++)
		$source = "0".$source;
	return $source;
}
function gencode7($source){
	for($i=strlen($source);$i<7;$i++)
		$source = "0".$source;
	return $source;
}
function gencode_new($text,$source){
	for($i=strlen($source);$i<7;$i++)
		$source = "0".$source;
	return $text.$source;
}
function gencode_date($source){
	$year = substr(date("Y"),2,2);
	for($i=strlen($source);$i<9;$i++)
		$source = "0".$source;
	return $year.$source;
}


function gen_month($id){
	$thai_day =array("¨Ñ¹·Ãì","ÍÑ§¤ÒÃ","¾Ø¸","¾ÄËÑÊº´Õ","ÈØ¡Ãì","àÊÒÃì","ÍÒ·ÔµÂì");
	if($_SESSION["wording"] == "EN"){
		$thai_month =array(
			"01"=>"January",
			"02"=>"February",
			"03"=>"March",
			"04"=>"April",
			"05"=>"May",
			"06"=>"June",
			"07"=>"July",
			"08"=>"August",
			"09"=>"September",
			"10"=>"October",
			"11"=>"November",
			"12"=>"December"
		);
	}
	else{
		$thai_month =array(
			"01"=>"Á¡ÃÒ¤Á",
			"02"=>"¡ØÁÀÒ¾Ñ¹¸ì",
			"03"=>"ÁÕ¹Ò¤Á",
			"04"=>"àÁÉÒÂ¹",
			"05"=>"¾ÄÉÀÒ¤Á",
			"06"=>"ÁÔ¶Ø¹ÒÂ¹",
			"07"=>"¡Ã¡®Ò¤Á",
			"08"=>"ÊÔ§ËÒ¤Á",
			"09"=>"¡Ñ¹ÂÒÂ¹",
			"10"=>"µØÅÒ¤Á",
			"11"=>"¾ÄÈ¨Ô¡ÒÂ¹",
			"12"=>"¸Ñ¹ÇÒ¤Á"
		);
	}
	return $thai_month[$id];
}

function gencodesale($sanof,$table='asaleh'){

        require_once 'connectmysql.php';

		$sano_f = $sanof.$_SESSION["m_cshort"].'ONLIN';

		$sql = "SELECT  id , sano  FROM ali_".$table." where sano like '%".$sano_f."%' order by id DESC limit 0,1 ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$csano = substr(mysql_result($rs,0,'sano'),-10);
			$tsano = substr(mysql_result($rs,0,'sano'),8,4);
			$sano = substr(mysql_result($rs,0,'sano'),-6)+1;
		}

		$year = date('Y');
		$month = date('m');
		$year = substr($year,2,2);
		$fsano = $year.$month.$day;
		if($tsano != $fsano)$sano = '000001';
		$sano = gencode6($sano);
		$sano = $inv_l.$sano_f.$year.$month.$day.$sano;
		return $sano;
}


function gencodesale1($sanof,$table,$sano){
	//$sanof = 'ONLINE';
	$table ='asaleh';
	$sano = 'sano';
	require_once 'connectmysql.php';
		$sano_f = $sanof.$_SESSION["m_cshort"];
		$sql = "SELECT  id ,".$sano."  FROM ali_".$table." where ".$sano." like '%".$sano_f."%' order by id DESC limit 0,1 ";
//	echo $sql;
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$csano = substr(mysql_result($rs,0,$sano),-10);
		}
		$tsano = substr($csano,0,4);
		$csano = substr($csano,4,11);
		$sano = $csano+1;	
		$year = date('Y');
		$month = date('m');
		$year = substr($year,2,2);
		$fsano = $year.$month.$day;
		if($tsano != $fsano)$sano = '000001';
		$sano = gencode6($sano);
		$sano = $sano_f.$fsano.$sano;
		return $sano;

}

function gencodesale_REGIS($sanof,$table='asaleh'){
    //    require_once 'connectmysql.php';    
    //    global $_SESSION["bill_ref"];
        @session_start();
        $bill_ref = "001";
        $year = date('Y');
        $year = $year;
        $year = substr($year,2,2);
        $sano_f = $year.$bill_ref.'ON';    //IV0157
        $sql = "SELECT  sano  FROM ali_".$table." where sano like '".$sano_f."%'  order by sano DESC limit 0,1 ";
        
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs) > 0){
            $csano = substr(mysql_result($rs,0,'sano'),-5);
            $csano = $csano+1;
            $csano = gencode6($csano);
            $sano = $sano_f.$csano;
        }else{
            $sano = $sano_f.'000001';
        }     
        return $sano;
    }

function gencodesale_ON($sanof,$table='asaleh'){
		$year = date('Y')+543;
		$year = substr($year,2,2);
		$month = date('m');
		$sano_f = $year.$month.$sanof;	//IV0157
		$sql = "SELECT  sano  FROM ali_".$table." where sano like '".$sano_f."%'  order by sano DESC limit 0,1 ";

		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$csano = substr(mysql_result($rs,0,'sano'),-4);
			$csano = $csano+1;
			$csano = gencode7($csano);
			$sano = $sano_f.$csano;
		}else{
			$sano = $sano_f.'0000001';
		}	 
		return $sano;
	}

function gencodesale_OL($sanof,$table='transfersale_h'){
	//	require_once 'connectmysql.php';	
	//	global $_SESSION["bill_ref"];
		$sanof = explode('LA0',$sanof);
		$bill_ref = '001';
		$year = date('Y');
		$year = $year;
		$year = substr($year,2,2);
		$sano_f = $year.$bill_ref.'OL';
		
		$sql = "SELECT  sano1  FROM ali_".$table." where sano1 like '".$sano_f."%'  order by sano1 DESC limit 0,1 ";
		
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$csano = substr(mysql_result($rs,0,'sano1'),-6);
			$csano = $csano+1;
			$csano = gencode6($csano);
			$sano = $sano_f.$csano;
		}else{
			$sano = $sano_f.'000001';
		}	 
		return $sano;
	}

function gencodesale_HO($sanof,$table){
	//	require_once 'connectmysql.php';	
	//	global $_SESSION["bill_ref"];
		
		$bill_ref = '001';
		$year = date('Y');
		$year = $year;
		$year = substr($year,2,2);
		$sano_f = $year.$bill_ref.'SO';	//IV0157
		$sql = "SELECT  hono as sano  FROM ali_holdhead where hono like '".$sano_f."%'  order by hono DESC limit 0,1 ";
	 
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$csano = substr(mysql_result($rs,0,'sano'),-6);
			$csano = $csano+1;
			$csano = gencode6($csano);
			$sano = $sano_f.$csano;
		}else{
			$sano = $sano_f.'000001';
		}	 
		return $sano;
	}


function gencodesale_online($locationbase,$sanof='S',$table='asaleh'){

require_once 'connectmysql.php';

		//$sano_f = 'IV';
		$sano_f = $sanof.$locationbase.'ONLIN';

		$sql = "SELECT  id , sano  FROM ali_asaleh where sano like '%".$sano_f."%' order by id DESC limit 0,1 ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$csano = substr(mysql_result($rs,0,'sano'),-11);
		}
		$csano = explode('-',$csano);
		//var_dump($csano);
		$sano = $csano[1]+1;
		$tsano = $csano[0];

	//echo '<br>';
		$year = date('Y');
		$month = date('m');
		//$day = date('d');
		//$year = $year;
		$year = substr($year,2,2);
		$fsano = $year.$month.$day;
		//echo $fsano.' '.$tsano.'<br>';
		//exit;
		if($tsano != $fsano)$sano = '000001';
		$sano = gencode6($sano);
		$sano = $inv_l.$sano_f.$year.$month.$day.'-'.$sano;
		//exit;
		//exit;
		return $sano;

//echo $sano;
//exit;
	//mysql_free_result($rs);
}

function gencodesale_online1($locationbase,$sanof='E',$table='asaleh'){

		require_once 'connectmysql.php';

		//$sano_f = 'IV';
		$sano_f = $sanof.$locationbase.'ONLIN';

		$sql = "SELECT  id , sano  FROM ali_ewallet where sano like '%".$sano_f."%' order by id DESC limit 0,1 ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$csano = substr(mysql_result($rs,0,'sano'),-11);
		}
		$csano = explode('-',$csano);
		//var_dump($csano);
		$sano = $csano[1]+1;
		$tsano = $csano[0];

		//echo '<br>';
		$year = date('Y');
		$month = date('m');
		//$day = date('d');
		//$year = $year;
		$year = substr($year,2,2);
		$fsano = $year.$month.$day;
		//echo $fsano.' '.$tsano.'<br>';
		//exit;
		if($tsano != $fsano)$sano = '000001';
		$sano = gencode6($sano);
		$sano = $inv_l.$sano_f.$year.$month.$day.'-'.$sano;
		//exit;
		//exit;
		return $sano;


}
	function sendsms($dbprefix,$msisdn,$message,$ScheduledDelivery="",$mcode){

		mysql_query("insert into  ".$dbprefix."sms (id,mcode,mobile,mobile_desc,mobile_date,mobile_status,mobile_credits) values('','".$mcode."','$msisdn','$message',now()+0,'','0') ");

	}
	function sendsms_bak($dbprefix,$msisdn,$message,$ScheduledDelivery="",$mcode){
		include("functionSMS.php");
		define(_SERVER, 'www.thaibulksms.com');
		define(_PORT, '80');
		define(_URI, '/sms_api.php');
		// Username and password for ThaiBulkSMS Account
				$username = "memberapp@successmore";
				$password = "memberapp1234";
					$sender = 'SUCCESSMORE';
					$data_string = "username=" . urlencode($username) . "&password=" . urlencode($password) . "&msisdn=" . urlencode($msisdn) . "&message=" . urlencode($message) . "&sender=" . urlencode($sender) . "&ScheduledDelivery=" . urlencode($ScheduledDelivery);
					$result = httpPost( _SERVER , _PORT , _URI, $data_string);
					if (!is_string($result)) {
//						die("Fatal Error: Unable to connect to server.\n\n");
					echo "Fatal Error: Unable to connect to server.\n\n";

					} else {
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
								}else{
									$count_fail++;
								}
							}
							if($count_pass > 0){echo "Success: $count_pass messages, Total: $used_credit credits\n";
							mysql_query("insert into  ".$dbprefix."sms (id,mcode,mobile,mobile_desc,mobile_date,mobile_status,mobile_credits) values('','".$mcode."','$msisdn','$message',now()+0,'Success','$used_credit') ");
							//mysql_query("update ".$dbprefix."oon set sms_credits = sms_credits-$used_credit ");							
							}
							if($count_fail > 0){echo "Fail: $count_fail messages\n";
							mysql_query("insert into  ".$dbprefix."sms (id,mcode,mobile,mobile_desc,mobile_date,mobile_status) values('','".$mcode."','$msisdn','$message',now()+0,'Fail') ");}
						}else{
							echo ("Error: ".$xml['SMS']['Detail']."\n\n");
							mysql_query("insert into  ".$dbprefix."sms (id,mcode,mobile,mobile_desc,mobile_date,mobile_status) values('','".$mcode."','$msisdn','$message',now()+0,'Error') ");
						}	 
					}
	}
	function sendsms1($dbprefix,$msisdn,$message,$ScheduledDelivery="",$mcode){
		//include("functionSMS.php");
		define(_SERVER, 'www.thaibulksms.com');
		define(_PORT, '80');
		define(_URI, '/sms_api.php');
		// Username and password for ThaiBulkSMS Account
				$username = "memberapp@successmore";
				$password = "memberapp1234";
				$sender = 'SUCCESSMORE';
			mysql_query("insert into  ".$dbprefix."sms (id,mcode,mobile,mobile_desc,mobile_date,mobile_status,mobile_credits) values('','".$mcode."','$msisdn','$message',now()+0,'','0') ");

	}

	function sendsms1_db($dbprefix,$msisdn,$message,$ScheduledDelivery="",$mcode){
		//include("functionSMS.php");
		define(_SERVER, 'www.thaibulksms.com');
		define(_PORT, '80');
		define(_URI, '/sms_api.php');
		// Username and password for ThaiBulkSMS Account
				$username = "memberapp@successmore";
				$password = "memberapp1234";
				$sender = 'SUCCESSMORE';
				//echo $_POST["optional"].'ssss';
				// Destination mobile number
				//$msisdn = $row->mcode;


				// Message to send, please ensure that your message has a UTF-8 charset.
				//$message = "ÊÇÑÊ´Õ¤èĞ¤Ø³ ".$row->name_t.' '.$_POST["optional"] ;
				//$message = $_POST["optional"] ;


				// ScheduledDelivery, please read API document
				//$ScheduledDelivery = '';

				// Sender Name, please read API document
					//$sender = 'BIOCROP';
					$data_string = "username=" . urlencode($username) . "&password=" . urlencode($password) . "&msisdn=" . urlencode($msisdn) . "&message=" . urlencode($message) . "&sender=" . urlencode($sender) . "&ScheduledDelivery=" . urlencode($ScheduledDelivery);
					$result = httpPost( _SERVER , _PORT , _URI, $data_string);
					if (!is_string($result)) {
						die("Fatal Error: Unable to connect to server.\n\n");
					//echo "Fatal Error: Unable to connect to server.\n\n";

					} else {
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
								}else{
									$count_fail++;
								}
							}
							if($count_pass > 0){echo "Success: $count_pass messages, Total: $used_credit credits\n";
							mysql_query("insert into  ".$dbprefix."sms (id,mcode,mobile,mobile_desc,mobile_date,mobile_status,mobile_credits) values('','".$mcode."','$msisdn','$message',now()+0,'Success','$used_credit') ");
							mysql_query("update ".$dbprefix."oon set sms_credits = sms_credits-$used_credit ");							
							}
							if($count_fail > 0){echo "Fail: $count_fail messages\n";
							mysql_query("insert into  ".$dbprefix."sms (id,mcode,mobile,mobile_desc,mobile_date,mobile_status) values('','".$mcode."','$msisdn','$message',now()+0,'Fail') ");}
						}else{
							echo ("Error: ".$xml['SMS']['Detail']."\n\n");
							mysql_query("insert into  ".$dbprefix."sms (id,mcode,mobile,mobile_desc,mobile_date,mobile_status) values('','".$mcode."','$msisdn','$message',now()+0,'Error') ");
						}	 
					}
	}
?>