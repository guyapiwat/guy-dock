<?php
@session_start();
require_once ("function.php");
require_once ("function.log.inc.php");
require_once("logtext.php");

?>
<? include("prefix.php");
	if(empty($_GET["lan"]))$_GET["lan"]= '';
	$chkcaptcha="";
	if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){		
		if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
		else $_SESSION["lan"] = $_GET["lan"];
	}else{
		if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
	}
	include("wording".@$_SESSION["lan"].".php");
	//var_dump($wording_lan);
	?>
<html>
<link href="./../style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<body bgcolor="#FFFFFF">
<?php
//if the form was filled out, set the session variables
if (isset($_POST["usercode"]) and isset ($_POST["password"]) ) {
	//session_destroy();
 	$_SESSION["adminusercode"] = $_POST["usercode"];
 	$_SESSION["adminpassword"] = $_POST["password"];
}
else {
 	$_SESSION["adminusercode"] = "";
 	$_SESSION["adminpassword"] = "";
}
?>

<?php
// connect to database 
require('connectmysql.php');
include_once("../member/safetySQL.php");	
$usercode="";
$username="";
$obj1="";
$obj2="";
$obj3="";
$obj4="";
$obj5="";
$obj6="";
$obj7="";
$obj8="";
$obj9="";
$obj10="";
$DePdw="";
include("securimage.php");
//echo DecodePwd("163175196084118053062099");
//exit;
$img = new Securimage();
  $valid = $img->check(@$_POST['code']);
  if($valid == true) {
		$sql = "SELECT * FROM ".$dbprefix."user WHERE usertype='1' AND usercode='".$_POST["usercode"]."' ";
		$sql .= "AND password='".EncodePwd($_POST["password"])."' ";
		//echo $sql;
		$result=mysql_query($sql);
		if (mysql_num_rows($result) > 0) {
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			//session_destroy();
			$usercode = $row["usercode"];
			logtext(true,$usercode,'เข้าระบบ : '.$usercode,'');
			$username = $row["username"];
			$userid= $row["uid"];
			$obj1 = $row["object1"];
			$obj2 = $row["object2"];
			$obj3 = $row["object3"];
			$obj4 = $row["object4"];
			$obj5 = $row["object5"];
			$obj6 = $row["object6"];
			$obj7 = $row["object7"];
			$obj8 = $row["object8"];
			$obj9 = $row["object9"];
			$obj10 = $row["object10"];
			//$invent = $row["inv_code"];

			mysql_query("delete from ".$dbprefix."calc_poschange where pos_before = 'MB' and pos_after = 'MB'");
			mysql_query("delete from ".$dbprefix."calc_poschange1 where pos_before = 'MB' and pos_after = 'MB'");
			mysql_query("delete from ".$dbprefix."calc_poschange2 where pos_before = 'MB' and pos_after = 'MB'");
			
			
			
			$DePdw=DecodePwd($row["password"]);
		}
  }else {
	  if(!empty($_POST)){
		  $chkcaptcha = "<center><font color='#FF0000'>".$wording_lan["w15"]."</font></center>";
		//    echo "<center>Sorry, the code you entered was invalid.</center>";
	  }
  }



// ตรวจสอบสิทธิ
if	(  
 ($_SESSION["adminusercode"]==$usercode) and ($_SESSION["adminpassword"]==$DePdw) and (!($DePdw=="")) and (!($_SESSION["adminusercode"]=="")) and (!($_SESSION["adminpassword"]==""))
	) {
	
	$_SESSION["adminusername"]=$username;
	$_SESSION["adminuserid"]=$userid;
	
	$_SESSION["adminobj1"]=$obj1;
	$_SESSION["adminobj2"]=$obj2;
	$_SESSION["adminobj3"]=$obj3;
	$_SESSION["adminobj4"]=$obj4;
	$_SESSION["adminobj5"]=$obj5;
	$_SESSION["adminobj6"]=$obj6;
	$_SESSION["adminobj7"]=$obj7;
	$_SESSION["adminobj8"]=$obj8;
	$_SESSION["adminobj9"]=$obj9;
	$_SESSION["adminobj10"]=$obj10;
	
	require ("header.php");
	$text="uid=".$_SESSION["adminuserid"]." action=login";
	writelogfile($text);
	?>
	
	<table bgcolor="#FFFFFF" border="0" width="100%" align="center" height="410">
		<tr><td valign="top"><br /><br />
	<blockquote>
		<br>

	<strong><?=$wording_lan["header"]["user"]?>&nbsp;</strong>&nbsp;:&nbsp;<?=$usercode?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?=$wording_lan["header"]["name"]?></strong>&nbsp;:&nbsp;<?=$username?><br>
	<br><?=$wording_lan["system"]["welcomeback"]?><br>
	<br>
	
<a href="index.php?sessiontab=0"><?=$wording_lan["system"]["changepassword"]?></a>
	<br><br>
	<br><br>
	[<a href="logout.php">Logout</a>]
	<br>
	<br>
	</blockquote>
	</td>
	</tr></table>
	<?php 
}
else {
	//	<!-- Log in fail -->
	$_SESSION["adminusercode"]=""; 
	$_SESSION["adminuserid"]=""; 
	$_SESSION["adminusername"]="";
	$_SESSION["adminpassword"]="";
//	$_SESSION["admininvent"]="";
//	$_SESSION["admininventname"]="";
	$_SESSION["adminobj1"]="";
	$_SESSION["adminobj2"]="";
	$_SESSION["adminobj3"]="";
	$_SESSION["adminobj4"]="";
	$_SESSION["adminobj5"]="";
	$_SESSION["adminobj6"]="";
	$_SESSION["adminobj7"]="";
	$_SESSION["adminobj8"]="";
	$_SESSION["adminobj9"]="";
	$_SESSION["adminobj10"]="";
	require ("header.php");

	?>
	<table bgcolor="#FFFFFF" border="0" width="100%" align="center" height="410">
		<tr><td valign="top">
		<?=$chkcaptcha?>
		<br />
	<form method="POST" name="Form1" autocomplete="off">
	<center><br />
	<table width="300" height="150" background="./images/log_banner.jpg" style="background-repeat:no-repeat">
		<tr>
		<td>
				<table border="0" cellpadding="0" cellspacing="1" width="100%">

		
		<tr>
			<td colspan="2" nowrap align="center"><?=$wording_lan["login"]["topic"] ?></td>
		</tr>
		
		<tr>
			<td width="7%" align="right"><?=$wording_lan["login"]["user"] ?>&nbsp;:&nbsp;</td>
			<td width="93%"><input type="text" name="usercode" size="20" ></td>
		</tr>
		<tr>
			<td width="7%" align="right"><?=$wording_lan["login"]["password"] ?>&nbsp;:&nbsp;</td>
			<td width="93%"><input type="password" name="password" size="20"></td>
		</tr>
		<tr>
			<td width="7%" align="right"></td>
			<td align="left"><table><tr><td><div style="width: 150px; float: left; height: 50px">
      
	  <img id="siimage" align="left" style="padding-right: 5px; border: 0" src="securimage_show.php?sid=<?php echo md5(time()) ?>" />

        </td><td>
                <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="19" height="19" id="SecurImage_as3" align="middle">
			    <param name="allowScriptAccess" value="sameDomain" />
			    <param name="allowFullScreen" value="false" />
			    <param name="movie" value="securimage_play.swf?audio=securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" />
			    <param name="quality" value="high" />
			
			    <param name="bgcolor" value="#ffffff" />
			    <embed src="securimage_play.swf?audio=securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" quality="high" bgcolor="#ffffff" width="19" height="19" name="SecurImage_as3" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			  </object>


        <!-- pass a session id to the query string of the script to prevent ie caching --><br>
        <a tabindex="-1" style="border-style: none" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = 'securimage_show.php?sid=' + Math.random(); return false"><img src="images/refresh.gif" alt="Reload Image" border="0" onclick="this.blur()" align="bottom" /></a></td></tr></table>
</div></a>
</div>
<div style="clear: both"></div>
<!--Code:<br />-->

<!-- NOTE: the "name" attribute is "code" so that $img->check($_POST['code']) will check the submitted form field -->
<input type="text" name="code" size="12" /><br /><br /></td>
		</tr>
		<tr>
			<td width="37%" align="right"></td>
			<td width="63%">
			  <input type="submit" value="<?=$wording_lan["login"]["ok"] ?>" name="B1">&nbsp;&nbsp;
			<input type="reset" value="<?=$wording_lan["login"]["cancel"] ?>" name="B2"></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		</table>
		
		</td>
		</tr>
		</table></center>
	</form></td></tr></table>
	<?php 
} 
?>
<? include "footer.php";?>
</body>
</head>



