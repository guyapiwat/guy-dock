<?
include("./functionSMS.php");
$url = "http://210.1.58.135/~cci/mobile_api/getmember.php";
$param =  "api_user=CCI.gotoapi";
$param .= "&api_pwd=CCI@gotoapi";
$param .= "&mem_code=TH5032311";
$param .= "&mem_mobile=0949978908";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
$result = curl_exec($ch);
curl_close($ch);
$xml = xml($result);
//echo $xml['CCI']['MEMBER'][0]['STATUS'];
var_dump($xml);
//echo $xml['CCI']['MEMBER'][0]['MEMBER_CODE'];
//echo $xml['CCI']['MEMBER'][0]['MEMBER_NAME'];
//echo $xml['CCI']['MEMBER'][0]['MEMBER_MOBILE'];

?>