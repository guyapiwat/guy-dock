<?php
include_once("config.php");
include_once("functions.php");
include_once("paypal.class.php");

$paypal= new MyPayPal();

if(_GET('token')!=''&&_GET('PayerID')!=''){

	$data = $paypal->DoExpressCheckoutPayment();
	echo '<pre>';
	print_r($data);
	echo '</pre>';
}
else{
	
 

}