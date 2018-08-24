<?
session_start();
//var_dump($_SESSION);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<title>PHP AJAX Image Upload, Truly Web 2.0!</title>
		<meta name="description" content="PHP AJAX Image Upload, Truly Web 2.0!" />
		<meta name="keywords" content="PHP AJAX Image Upload, Truly Web 2.0!" />
		<meta name="robots" content="index,follow" />
		<meta name="revisit-after" content="10 days" />
		<meta name="author" content="AT Web Results, Inc. - http://www.atwebresults.com" />
		<meta name="copyright" content="AT Web Results, Inc." />
		<meta name="distribution" content="global" />
		<meta name="resource-type" content="document" />
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
		<!-- MAKE SURE TO REFERENCE THIS FILE! -->
		<script type="text/javascript" src="scripts/ajaxupload.js"></script>
		<!-- END REQUIRED JS FILES -->
	</head>
<body>
	<div id="container">
<script type="text/javascript"><!--
				google_ad_client = "pub-0563899222267716";
				/* AJAX Image Upload Page */
				google_ad_slot = "4310161700";
				google_ad_width = 728;
				google_ad_height = 90;
				//-->
				</script>
			</script>
			<!-- THIS IS THE IMPORTANT STUFF! -->
	  <div id="demo_area">
				<div id="left_col">
					<fieldset>
						<legend>Standard Use</legend>
						<form action="scripts/ajaxupload.php?filename=name&amp;rename=<?=$_GET["rename"]?>&amp;maxSize=10000&amp;maxW=200&amp;fullPath=uploads/&amp;relPath=../uploads/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300" method="post">
							<p><input type="file" name="name" /></p>
							<!-- 
									ajaxUpload fields
										1. form - the form to submit or the ID of a form .
										2. url_action - url to submit the form. like 'action' parameter of forms.
										3. id_element - element that will receive return of upload.
										4. html_show_loading - Text (or image) that will be show while loading
										5. html_error_http - Text (or image) that will be show if HTTP error.
									-->
							<p><button onclick="ajaxUpload(this.form,'scripts/ajaxupload.php?filename=name&amp;rename=<?=$_GET["rename"]?>&amp;maxSize=9999999999&amp;maxW=200&amp;fullPath=uploads/&amp;relPath=../uploads/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300','upload_area','File Uploading Please Wait...&lt;br /&gt;&lt;img src=\'images/loader_light_blue.gif\' width=\'128\' height=\'15\' border=\'0\' /&gt;','&lt;img src=\'images/error.gif\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;" type="button">Upload Image</button></p>
						</form>
					  <form action="scripts/ajaxupload.php?filename=name&amp;rename=<?=$_GET["rename"]?>&amp;maxSize=9999999999&amp;maxW=200&amp;fullPath=../uploads/&amp;relPath=uploads/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=300" method="post">
					    <noscript></noscript>
				      </form>
				  </fieldset>
					<br /><small style="font-weight: bold; font-style:italic;">Supported File Types: gif, jpg, png</small>
				</div>
		<div id="right_col">
		  <div id="upload_area">
		  <? 
		// echo 'upload/uploads/'.$_GET["rename"].'.jpg';
				if(!file_exists('uploads/'.$_GET["rename"].'.jpg'))$img_logo = "../logo.gif";
				 else $img_logo = "uploads/".$_GET["rename"].".jpg";
		  ?>
						<img src="<?=$img_logo?>">
			</div>
			<div id="donate_now"></div>
		  </div>
				<div class="clear"> </div>
			</div>
			<!-- END IMPORTANT STUFF -->
</div>
</body>
</html>