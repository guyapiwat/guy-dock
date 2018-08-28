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
 
function gencode_new($text,$source){
	for($i=strlen($source);$i<9;$i++)
		$source = "0".$source;
	return $text.$source;
}
function gencode_member_personal($text,$source){
	$year = substr(date("Y"),2,2);
	for($i=strlen($source);$i<7;$i++)
		$source = "0".$source;
	return $text.$year.$source;
}


function gen_month($id){
	$thai_day =array("จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์","อาทิตย์");
	$thai_month =array(
		"01"=>"มกราคม",
		"02"=>"กุมภาพันธ์",
		"03"=>"มีนาคม",
		"04"=>"เมษายน",
		"05"=>"พฤษภาคม",
		"06"=>"มิถุนายน",
		"07"=>"กรกฎาคม",
		"08"=>"สิงหาคม",
		"09"=>"กันยายน",
		"10"=>"ตุลาคม",
		"11"=>"พฤศจิกายน",
		"12"=>"ธันวาคม"
	);
	
	return $thai_month[$id];
}
function gencode_date($source){
	$year = substr(date("Y"),2,2);
	for($i=strlen($source);$i<9;$i++)
		$source = "0".$source;
	return $year.$source;
}

function gencodesale_news_hq($sanof='S',$table='ali_asaleh',$inv_code='ONLIN',$locationbase='',$sadate=""){
    $num = 6;
	require_once 'connectmysql.php';
	if(empty($sanof))$sano_f = 'S';
    if($locationbase != ''):
        $lb = locationbase::get_location($locationbase); 
    else:
        $lb = locationbase::get_location(1); 
    endif;
	
	if(empty($sadate))$sadate = date("Y-m-d");

	$year  = date('y',strtotime($sadate));
	$month  = date('m',strtotime($sadate));
     
	if(empty($inv_code)){$inv_code = "ONLIN";}else{$inv_code = $inv_code;}
	$bill_head = $sanof.$lb['cshort'].$inv_code.$year.$month;
	if($sanof == 'H'){$colnumn = 'hono';}else{$colnumn = 'sano';}
	$last_bill = query('*',$table,$colnumn." LIKE '".$bill_head."%' ORDER BY id DESC LIMIT 0,1 ");
	$test = $bill_head.gencode_search_bill(1,$num);
	if(count($last_bill)){
		$count_bill = intval(substr($last_bill[0][$colnumn],-$num))+1;
		$gencode6 = gencode_search_bill($count_bill,$num);
	}
	else{
		$gencode6 = gencode_search_bill(1,$num);
	}
	$bill_head = $bill_head.$gencode6;
	return $bill_head;
}
function gencodesale($sanof='S',$table='asaleh'){

	require_once 'connectmysql.php';

		//$sano_f = $_SESSION["inv_cshort"].$sanof.'HEADQ';
		$sano_f = 'TH'.$sanof.'HEADQ';
		//$inv_l = $_SESSION["inv_locationbase"];  

		//echo $sano_f.' : '.$table.'<br>';
			
		$sql = "SELECT  id , sano  FROM ali_".$table." where sano like '%".$inv_l.$sano_f."%' order by id DESC limit 0,1 ";
		//echo $sql.'<br>';
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$csano = substr(mysql_result($rs,0,'sano'),-10);
		}
		$csano = explode('-',$csano);
		//var_dump($csano);
		$sano = $csano[1]+1;
		$tsano = $csano[0];
	//echo '<br>';
		//$tsano = substr($sano, 0, 6);
		//$sano = substr($sano, 6, 6);
		$year = date('Y');
		$month = date('m');
		//$day = date('d');
		//$year = $year;
		$year = substr($year,2,2);
		$fsano = $year.$month.$day;
		//echo $fsano.' '.$tsano.'<br>';
		
		if($tsano != $fsano)$sano = '000001';
		$sano = gencode6($sano);
		$sano = $inv_l.$sano_f.$year.$month.$day.'-'.$sano;
		//echo $sano;
		//exit;
		return $sano;
}

function gencode_bbsale($dbprefix,$inv_ref,$sano_f){
		$year = date('Y');
		$month = date('m');
		$day = date('d');
		$year = $year+543;
		$year = substr($year,2,2);
		$sano_f = $sano_f.''.$inv_ref.$year.$month;
 		$sql = "SELECT sano FROM ".$dbprefix."istockh where sano like '".$sano_f."%' order by sano DESC limit 0,1 ";
	
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
			$csano = substr(mysql_result($rs,0,'sano'),-4);
			$csano = $csano+1;
			$csano = gencode4($csano);
			$sano = $sano_f.$csano;
		}else{
			$sano = $sano_f.'0001';
		}	
		return $sano;
}
function gencode4($source){
	for($i=strlen($source);$i<4;$i++)
		$source = "0".$source;
	return $source;
}

function gencode_bsale($dbprefix,$inv_ref,$sano_f){

		$year = date('Y');
		$month = date('m');
		$day = date('d');
		$year = $year+543;
		$year = substr($year,2,2);
		$sano_f = $sano_f.''.$inv_ref.$year.$month;
 		$sql = "SELECT sano FROM ".$dbprefix."ostockh where sano like '".$sano_f."%' order by sano DESC limit 0,1 ";
	
			$rs = mysql_query($sql);
		if(@mysql_num_rows($rs) > 0){
			$csano = substr(mysql_result($rs,0,'sano'),-4);
			$csano = $csano+1;
			$csano = gencode4($csano);
			$sano = $sano_f.$csano;
		}else{
			$sano = $sano_f.'0001';
		}	
		return $sano;
}

	function sendsms($dbprefix,$msisdn,$message,$ScheduledDelivery="",$mcode){
		include("functionSMS.php");
		define(_SERVER, 'www.thaibulksms.com');
		define(_PORT, '80');
		define(_URI, '/sms_api.php');
		// Username and password for ThaiBulkSMS Account
		$username = "memberapp@successmore";
		$password = "memberapp1234";
		$sender = 'SUCCESSMORE';
		mysql_query("insert into  ".$dbprefix."sms (id,mcode,mobile,mobile_desc,mobile_date,mobile_status,mobile_credits) values('','".$mcode."','$msisdn','$message',now()+0,'','0') ");

	}


	function sendsms1234($dbprefix,$msisdn,$message,$ScheduledDelivery="",$mcode){
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
		//	die("Fatal Error: Unable to connect to server.\n\n");
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


?>