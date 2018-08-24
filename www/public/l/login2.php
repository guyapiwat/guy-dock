<?
session_start();
if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
include_once("wording".$_SESSION["lan"].".php"); 

if(!empty($_SESSION["usercode"]) and 1!=1 ){
	$_SESSION["usercode"] = '';
	echo "<script language='javascript' type='text/javascript'>window.location='./index.php?sessiontab=1'</script>";
	exit;
}else {
	include_once("securimage.php");
	$img = new Securimage();
	?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?=$wording_lan["Title"]?></title>

		<!-- Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Favicon -->

		<!-- Web Fonts -->
		<link rel="stylesheet" type="text/css" href="login_asset/image/css.html">

		<!-- CSS Global Compulsory -->
		<link rel="stylesheet" href="login_asset/image/bootstrap.min.css">
		<link rel="stylesheet" href="login_asset/image/style.css">

		<!-- CSS Implementing Plugins -->
		<link rel="stylesheet" href="login_asset/image/animate.css">
		<link rel="stylesheet" href="login_asset/image/line-icons.css">
		<link rel="stylesheet" href="login_asset/image/font-awesome.min.css">

		<!-- CSS Page Style -->
		<link rel="stylesheet" href="login_asset/image/page_log_reg_v2.css">

		<!-- CSS Customization -->
		<link rel="stylesheet" href="login_asset/image/custom.css">
		<link href="login_asset/image/toastr.min.css" rel="stylesheet">

		<script type="text/javascript" src="login_asset/image/lang.js"></script>
		<style>
		.reg-block-header img { max-width:100%;}
		</style>
	</head>

	<body>

	<div style="margin-top: 15px;">
		<div class="container">
			<!--ul class="pull-right list-unstyled" style="border: 1px solid #ccc; background-color: rgba(255, 255, 255, 0.90); padding: 5px 10px;">
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle" style="text-decoration: none;">
					<span>MENU</span>&nbsp;<img src="login_asset/image/my24.png" alt="language" height="10"></a>
					<ul id="list-lang" class="dropdown-menu pull-right">
						<li class="active">
						<a href="#">
						<img src="login_asset/image/th24.png" alt="Website" height="16" class="img-rounded"> &nbsp;หน้าหลัก</a></li>
						<li class="">
						<a href="#">
						<img src="login_asset/image/en24.png" alt="Website" height="16" class="img-rounded"> &nbsp;เว็บรีครูด</a></li>
						<li class="">
						<a href="#">
						<img src="login_asset/image/my24.png" alt="Website" height="16" class="img-rounded"> &nbsp;เว็บสมาชิก</a></li>
					</ul>
				</li>
			</ul-->
		</div>
	</div>

	<!--=== Content Part ===-->
	<div class="container">
				   
		<!--Reg Block-->
		<form method="post" action="index.php" name="Form1" >
			<div class="reg-block">
				<div class="reg-block-header">
					<img class="center-block" src="images/logo.png" alt="">
				</div>

				<div class="input-group margin-bottom-20">
					<span class="input-group-addon">
						<img class="center-block" src="login_asset/image/us.png" alt="Username"  >
					</span>

					<input id="tbx-user" name="usercode" type="text" class="form-control" placeholder="Username" maxlength="9" style="height: 35px;padding: 0px 6px !important;">
				</div>

				<div class="input-group margin-bottom-20">
					<span class="input-group-addon">
						<img class="center-block" src="login_asset/image/pw.png" alt="Password">
					</span>
					<input id="tbx-pwd" name="password" type="password" class="form-control" placeholder="Password" style="height: 35px;padding: 0px 6px !important;">
				</div>
				<hr>
				<div class="input-group margin-bottom-20" style="width: 100%;">
					<div class="secur">
						<div class="im">
							<img  id="siimage" align="left" style="  border: 0" src="securimage_show.php?sid=<?php echo md5(time()) ?>" />
						 </div>
						 <div class="tx">
							 กรอกเลขด้านซ้าย<br>
							<input  class="code " type="text" name="code"  />
						</div>
					</div>
				</div>
				<div class="input-group margin-bottom-20"></div>
				<hr>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<button id="btn-logins" type="submit" class="btn-u btn-block">LOGIN</button>

						<div id="pnl-checking" style="display: none;">
							<h4><i class="fa fa-circle-o-notch fa-spin"></i> กำลังตรวจสอบข้อมูล...</h4>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!--End Reg Block-->
	</div>
	<!--/container-->

	<!--=== End Content Part ===-->

	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="login_asset/image/jquery.min.js"></script>
	<script type="text/javascript" src="login_asset/image/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="login_asset/image/bootstrap.min.js"></script>
		
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="login_asset/image/back-to-top.js"></script>
	<script type="text/javascript" src="login_asset/image/jquery.backstretch.min.js"></script>

	<!-- JS Customization -->

	<script type="text/javascript" src="login_asset/image/custom.js"></script>

	<!-- JS Page Level -->
	<script type="text/javascript" src="login_asset/image/app.js"></script>
	<script type="text/javascript" src="login_asset/image/underscore-min.js"></script>
	<script type="text/javascript" src="login_asset/image/cookies.js"></script>
	<script type="text/javascript" src="login_asset/image/custom-core.js"></script>
	<script src="login_asset/image/toastr.min.js"></script>

		<script type="text/javascript">
	 
			var allBackground = [
			  "login_asset/image/bg0.jpg",
			  "login_asset/image/bg2.jpg",
			  "login_asset/image/bg3.jpg",
			  "login_asset/image/bg4.jpg",
			];
			var bgLen = allBackground.length;
			var randomNumber = [];
			while (randomNumber.length < bgLen) {
				var d = parseInt($.randomNumber(2)) % bgLen;
				var existed = false;
				$.each(randomNumber, function (ind, value) {
					if (value == d) {
						existed = true;
					}
				});
				if (existed == false) {
					randomNumber.push(d);
				}
			}
			var randomBg = [];
			$.each(randomNumber, function (ind, value) {
				randomBg.push(allBackground[value]);
			});
	 
			$.backstretch(randomBg, {
				fade: 1000,
				duration: 15000
			});
	 
		</script>
		<!--[if lt IE 9]>
			<script src="login_asset/~/assets/plugins/respond.js"></script>
			<script src="login_asset/~/assets/plugins/html5shiv.js"></script>
			<script src="login_asset/~/assets/plugins/placeholder-IE-fixes.js"></script>
		<![endif]-->
	</body>
</html>

<? } ?>