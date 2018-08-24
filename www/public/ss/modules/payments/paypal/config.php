<?php

  //start session in all pages
  if (session_status() == PHP_SESSION_NONE) { session_start(); } //PHP >= 5.4.0
  //if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above

	// sandbox or live
	define('PPL_MODE', 'sandbox');

	if(PPL_MODE=='sandbox'){
		
		define('PPL_API_USER', 'bird.peemail-facilitator_api1.gmail.com');
		define('PPL_API_PASSWORD', 'HTNCZC2XEKQPS45Z');
		define('PPL_API_SIGNATURE', 'AFcWxV21C7fd0v3bYYYRCpSSRl31Ah.YGeTfQVd5EYawkqmIthuW3opv');
	}
	else{
		
		define('PPL_API_USER', 'somepaypal_api.yahoo.co.uk');
		define('PPL_API_PASSWORD', '123456789');
		define('PPL_API_SIGNATURE', 'opupouopupo987kkkhkixlksjewNyJ2pEq.Gufar');
	}
	
	define('PPL_LANG', 'EN');
	
	define('PPL_LOGO_IMG', 'http://www.sanwebe.com/wp-content/themes/sanwebe/img/logo.png');
	
	define('PPL_RETURN_URL', 'http://localhost/paypal-payment/modules/payments/paypal/success.php');
	define('PPL_CANCEL_URL', 'http://localhost/paypal-payment/modules/payments/paypal/cancel_url.php');

	define('PPL_CURRENCY_CODE', 'USD');
