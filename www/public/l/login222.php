<?
session_start();
 
if(!empty($_SESSION["usercode"]) and 1!= 1){
	echo "<script language='javascript' type='text/javascript'>window.location='./index.php'</script>";

	exit;
}else {
	include("securimage.php");
	$img = new Securimage();
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="UTF-8">
	<link href="css/style_login.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>

<body><br>
	<center><img src="../logo.png" width=200></center>
				 <!-----start-main---->
				<div class="login-form">
						<h1>Sign In</h1>
						<h2><a href="#">Create Account</a></h2>
				<form>
					<li>
						<input type="text" class="text" value="User Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User Name';}" ><a href="#" class=" icon user"></a>
					</li>
					<li>
						<input type="password" name="usercode" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon lock"></a>
					</li>
					<li>
						<input type="password" name="code" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon lock"></a>
					</li>
					<li>
						<img class="code_img" id="siimage" align="left" style="padding-right: 5px; border: 0" src="securimage_show.php?sid=<?php echo md5(time()) ?>" />
					</li><br><br>
					
					 <div class ="forgot">

						<h3><a href="#">Forgot Password?</a></h3>
						<input type="submit" onclick="myFunction()" value="Sign In" > <a href="#" class=" icon arrow"></a>                                                                                                                                                                                                                                 </h4>
					</div>
				</form>
			</div>
				<center><font color=#FFFFFF size=4><b>Power By @ 2015-2018</b></font></center> 
		 		
</body>


</body>
</html>

<?}?>