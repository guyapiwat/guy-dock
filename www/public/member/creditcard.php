<?
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once ("function.log.inc.php");
require_once ("checklogin.php");

if(empty($_GET["pid"]) & empty($_GET["type"])){
	echo "<script language='javascript'>window.close();</script>";
	exit;
}else{
	$id = $_GET["pid"];
	$type = $_GET["type"];
}

if($type == 'ewallet'){
//	$link1 = 'http://203.146.170.60/~lachuleas/member/index.php?sessiontab=4&sub=23';
//	$link2 = 'http://203.146.170.60/~lachuleas/member/index.php?sessiontab=4&sub=22';
//	$link3 = 'http://203.146.170.60/~lachuleas/member/index.php?sessiontab=4&sub=22';
	$link1 = 'http://203.146.170.60/~lachuleas/member/index.php?sessiontab=99&sub=1';
	$link2 = 'http://203.146.170.60/~lachuleas/member/index.php?sessiontab=99&sub=2';
	$link3 = 'http://203.146.170.60/~lachuleas/member/index.php?sessiontab=99&sub=3';
	$sql = "SELECT *,".$dbprefix."transferewallet_h.total as bprice1 ";
	$sql .= "FROM ".$dbprefix."transferewallet_h ";
	$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."transferewallet_h.mcode=".$dbprefix."member.mcode)  where ".$dbprefix."transferewallet_h.uid = '".$_SESSION['usercode']."' and ".$dbprefix."transferewallet_h.id = '$id' and cancel = 0 and paytype = 0 and credittype = 0 ";
	//echo $sql;
	//exit;
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$sano = 'ewallet-'.mysql_result($rs,0,'id');
		$total = mysql_result($rs,0,'bprice1');
	}else{
		echo "<script language='javascript'>window.close();</script>";
		exit;
	}
}else{


$sql = "SELECT *,".$dbprefix."transfersale_h.total as total ";
$sql .= "FROM ".$dbprefix."transfersale_h ";
$sql .= "LEFT JOIN ".$dbprefix."member ON (".$dbprefix."transfersale_h.mcode=".$dbprefix."member.mcode)  where ".$dbprefix."transfersale_h.uid = '".$_SESSION['usercode']."' and ".$dbprefix."transfersale_h.id = '$id' and cancel = 0 and paytype = 0 and credittype = 0 "; 
$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$sano = 'sale-'.mysql_result($rs,0,'id');
		$total = mysql_result($rs,0,'total');
		$mid = mysql_result($rs,0,'id');
		$mcode = mysql_result($rs,0,'mcode');
		if($mcode == $_SESSION["usercode"])$link1 = 'http://203.146.170.60/~lachuleas/member/index.php?sessiontab=4&sub=1';
		else $link1 = 'http://203.146.170.60/~lachuleas/member/index.php?sessiontab=4&sub=7';
		$link2 = 'http://203.146.170.60/~lachuleas/member/index.php?sessiontab=4&sub=21';
		$link3 = 'http://203.146.170.60/~lachuleas/member/index.php?sessiontab=4&sub=21';
	}else{
		echo "<script language='javascript'>window.close();</script>";
		exit;
	}
}

//exit;
//echo $mid.' | '.$total.' | '.$mid.' | '.$mid.' | '.$mid.' | '.$mid.' | '.$mid.' | ';
?>
<!--!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title></title>

</head>

<body onload="Javascript:frm11.submit()" style="display:none;">

<form name="frm11" id="frm11" method="post" action="https://paygate.ktc.co.th/ktc/eng/payment/payForm.jsp">

<input type="hidden" name="merchantId" value="981300005">  

<input type="hidden" name="amount" value="<?=$total?>" > 

<input type="hidden" name="orderRef" value="<?=$sano?>"> 

<input type="hidden" name="currCode" value="764" > 

<input type="hidden" name="successUrl" 

value="<?=$link1?>">

<input type="hidden" name="failUrl" value="<?=$link2?>"> 

<input type="hidden" name="cancelUrl" value="<?=$link3?>"> 

<input type="hidden" name="payType" value="N"> 

<input type="hidden" name="lang" value="E"> 

</form>                         
 </body>
</html-->
 
<html>
<body onload="document.sendform.submit();"> 
<!-- url for recieving CUP card-->
<!--<form name=sendform method=post action="https://rt05.kasikornbank.com/pggroup/payment.aspx">-->
<!-- url for mobile site -->
<!--<form name=sendform method=post action="https://rt05.kasikornbank.com/mobilepay/payment.aspx">-->
<!-- normal url for visa,master -->

<?
$MERCHANT2 = "401001810694001";
$TERM2="74401994";
$AMOUNT2=$total*100;
$URL2=$link1;
$RESPURL="https://203.146.170.60/~lachuleas/member/pay_success.php";
$IPCUST2="203.146.170.60";
$DETAIL2=$sano;
$INVMERCHANT=$mid;
$md5="SzabTAGU5fQYgHkVGU5f4re8pLw5423Q";
$checksum=$MERCHANT2.$TERM2.$AMOUNT2.$URL2.$RESPURL.$IPCUST2.$DETAIL2.$INVMERCHANT.$md5;
?>
<form name=sendform method=post action="https://rt05.kasikornbank.com/pgpayment/payment.aspx">
<INPUT type="hidden" id=MERCHANT2 name=MERCHANT2 value="<?=$MERCHANT2?>">
<INPUT type="hidden" id=TERM2 name=TERM2 value="<?=$TERM2?>">
<INPUT type="hidden" id=AMOUNT2 name=AMOUNT2 value="<?=$AMOUNT2?>">
<INPUT type="hidden" id=URL2 name=URL2 value="<?=$URL2?>">
<INPUT type="hidden" id=RESPURL name=RESPURL value="<?=$RESPURL?>">
<INPUT type="hidden" id=IPCUST2 name=IPCUST2 value="<?=$IPCUST2?>"> 
<INPUT type="hidden" id=DETAIL2 name=DETAIL2 value="<?=$DETAIL2?>"> 
<INPUT type="hidden" id=INVMERCHANT name=INVMERCHANT value="<?=$INVMERCHANT?>">
<!-- this input checksum you have to do md5 hash as description in integration guide -->
<INPUT type="hidden" id=checksum name=checksum value="<?=MD5($checksum)?>"> 
</form>
 
<!--<script>document.sendform.submit();</script>-->
</body>
</html>