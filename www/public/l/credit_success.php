<?
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once ("function.log.inc.php");
require_once ("checklogin.php");

$orderid = $_POST['ipayorderid'];
$inv_no = $_POST['inv_no'];
$amount = $_POST['amount'];
$pay_type = $_POST['pay_type'];
$pay_method = $_POST['pay_method'];
$resp_code = $_POST['resp_code'];
$resp_desc = $_POST['resp_desc'];

//For pay_type = 1 only
$coupon_status = $_POST['coupon_status'];
$coupon_serial = $_POST['coupon_serial'];
$coupon_password = $_POST['coupon_password'];
$coupon_ref = $_POST['coupon_ref'];

//For pay_type = 1 only
$coupon_status = $_POST['coupon_status'];
$coupon_serial = $_POST['coupon_serial'];
$coupon_password = $_POST['coupon_password'];
$coupon_ref = $_POST['coupon_ref'];
//$resp_code = 0;
if ($resp_code == 0 and !empty($inv_no)){
	 //do success process

}
else{
//do error process
echo 'do error process';
}





?>