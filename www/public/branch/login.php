<?session_start();?><head>

<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
</head>
<? 
?>

<?php

require_once ("function.php");
require_once ("function.log.inc.php");
require_once("logtext.php");

?>
<? include("prefix.php");?>
<html>
<link href="./../style.css" rel="stylesheet" type="text/css">
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
<body bgcolor="#FFFFFF">
<?php
//if the form was filled out, set the session variables
if (isset($_POST["usercode"]) and isset ($_POST["password"]) ) {
	///session_destroy();
 	$_SESSION["inv_usercode"] = $_POST["usercode"];
 	$_SESSION["inv_password"] = $_POST["password"];
}
else {
 	$_SESSION["inv_usercode"] = "";
 	$_SESSION["inv_password"] = "";
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
$DePdw="";
include("securimage.php");
$img = new Securimage();
  $valid = $img->check($_POST['code']);
  if($valid == true) {

				$sql = "SELECT *,a.uid,a.code_ref as code_ref1 FROM ".$dbprefix."user a,  ".$dbprefix."invent  b WHERE a.usertype='2' and  b.inv_type=1 and a.usercode='".$_POST["usercode"]."' and b.inv_code = a.inv_ref  ";
				$sql .= "AND a.password='".EncodePwd($_POST["password"])."' ";
				// echo $sql;
				// exit;
				$charset = "SET NAMES 'UTF8'"; 
    			mysql_query($charset) or die('Invalid query: ' . mysql_error()); 

				$result=mysql_query($sql);

				

				if (mysql_num_rows($result) > 0) {
					$row = mysql_fetch_array($result, MYSQL_ASSOC);
					//var_dump($row);
					//session_destroy();
					$usercode = $row["usercode"];
					$inv_ref = $row["inv_ref"];
					$bill_ref = $row["bill_ref"];
					$code_ref = $row["code_ref1"];
					$ewallet = $row["ewallet"];
					$discount = $row["discount"];
					if($ewallet == 0)$ewallet = 0;
					$inv_desc = $row["inv_desc"];

					//echo $inv_desc;
					//exit;

					$inv_code = $row["inv_code"];
					$inv_type = $row["inv_type"];
					$inv_locationbase = $row["locationbase"];
					$_SESSION["inv_locationbase"]  = $inv_locationbase;
					if($inv_locationbase == '1')$_SESSION["lan"] = 'TH';
					else $_SESSION["lan"] = 'EN';
					if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
					if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
					else $_SESSION["lan"] = $_GET["lan"];
					}else{
						if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
					}
					include_once("wording".$_SESSION["lan"].".php");
					$_SESSION['code_ref'] = $code_ref1;

					logtext(true,$usercode,'����к� : '.$usercode.'  �Ң� :  '.$inv_ref,'');
					$username = $row["username"];
					$userid= $row["uid"];
					$obj1 = $row["object1"];
					$obj2 = $row["object2"];
					$obj3 = $row["object3"];
					$obj4 = $row["object4"];
					$obj4  = $row["object4"];
					$obj5 = $row["object5"];
					$obj6 = $row["object6"];
					$obj7 = $row["object7"];
					$obj8 = $row["object8"];
					$checkbackdate = $row["checkbackdate"];				
					$invent = $row["inv_code"];
								
					$DePdw=DecodePwd($row["password"]);
						
					/*$sql = "TRUNCATE TABLE ".$dbprefix."asaleh_bm ";
					mysql_query($sql);
											$fdate =	date("Y-m")."-01";
											$tdate = date("Y-m")."-31";

					$sql="SELECT * FROM ".$dbprefix."member ORDER BY lr DESC";
					$rs = mysql_query($sql);
					for($i=0;$i<mysql_num_rows($rs);$i++){
						$sqlObj = mysql_fetch_object($rs);
						$mcode[$i] =$sqlObj->mcode;		
						$name_t[$i] =$sqlObj->name_t;		
						$upa_code[$mcode[$i]] = $sqlObj->upa_code;
						$lr1[$mcode[$i]] = $sqlObj->lr;
						$pos_cur[$mcode[$i]] = $sqlObj->pos_cur;
						$tot_pv[$mcode[$i]] = 0; 
						$sum_pv[$mcode[$i]][1] =0;
						$sum_pv[$mcode[$i]][2] =0;
						$sum_pv[$mcode[$i]][3] =0;
						$count[$mcode[$i]][1] =0;
						$count[$mcode[$i]][2] =0;
						$count[$mcode[$i]][3] =0;
						$old_quota[$mcode[$i]] = 0;
					}
					mysql_free_result($rs);

					$sql 	= "SELECT mcode,sum(tot_pv) as tot_pv FROM ".$dbprefix."holdhead ";
					$sql .= "WHERE sadate between '$fdate' and '$tdate'  and (sa_type = 'C' or sa_type = 'A' or sa_type = 'Q') AND cancel=0   group by mcode";
					$rs = mysql_query($sql);
					for($i=0;$i<mysql_num_rows($rs);$i++){
						$sqlObj = mysql_fetch_object($rs);
						$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;
					}
					mysql_free_result($rs);

					$sql 	= "SELECT mcode,sum(tot_pv) as tot_pv FROM ".$dbprefix."asaleh ";
					$sql .= "WHERE sadate between '$fdate' and '$tdate'  AND (sa_type = 'C' or sa_type = 'A' or sa_type = 'Q') and  cancel=0   group by mcode";
					$rs = mysql_query($sql);
					for($i=0;$i<mysql_num_rows($rs);$i++){
						$sqlObj = mysql_fetch_object($rs);
						$tot_pv[$sqlObj->mcode] += $sqlObj->tot_pv;
					}
					mysql_free_result($rs);
					$ro = 1;
					
					//�ӹǹ bm ��������ǹ bmbonus
					for($i=0;$i<sizeof($mcode);$i++){
						if($tot_pv[$mcode[$i]] > 0){
							$up = $mcode[$i];
							$lev = 0;
							while($up <> ""){
								if($upa_code[$up] <>""){
									if($tot_pv[$mcode[$i]]>0){
										$sql = "INSERT INTO ".$dbprefix."asaleh_bm (rcode,mcode,upa_code,pv,lr,fdate,tdate,mpos,satype) VALUES";
										$sql .= "(".$ro.",'$mcode[$i]','$upa_code[$up]','".$tot_pv[$mcode[$i]]."','$lr1[$up]','$fdate','$tdate','".$pos_cur[$mcode[$i]]."','A') ";
										mysql_query($sql);
									}
									//echo "�ҡ��Ţ�� : $sql <br>";
									//exit;
								}
								$up = $upa_code[$up];
							}
						}
					}
					*/
				}
  }else {
	  if(!empty($_POST)){
		  $chkcaptcha = "<center><font color='#FF0000'>Sorry, the code you entered was invalid.</font></center>";
	  }
  }


// ��Ǩ�ͺ�Է��
if	(  
 ($_SESSION["inv_usercode"]==$usercode) and ($_SESSION["inv_password"]==$DePdw) and (!($DePdw=="")) and (!($_SESSION["inv_usercode"]=="")) and (!($_SESSION["inv_password"]==""))
	) {
	$_SESSION["inv_ref"]=$inv_ref;
	$_SESSION["bill_ref"]=$bill_ref;
	$_SESSION["inv_ewallet"]=$ewallet;
	$_SESSION["inv_username"]=$username;
	$_SESSION["inv_userid"]=$userid;
	$_SESSION["admininvent"]=$inv_code;
	$_SESSION["admininvent"]=$_SESSION["inv_ref"];
	$_SESSION["admininventname"]=$inv_desc;
	$_SESSION["discount"]=$discount;
	$_SESSION["inv_type"]=$inv_type;
	$_SESSION["code_ref"]=$code_ref;
	$_SESSION["inventobj1"]=$obj1;
	$_SESSION["inventobj2"]=$obj2;
	$_SESSION["inventobj3"]=$obj3;
	$_SESSION["inventobj4"]=$obj4;
	$_SESSION["inventobj5"]=$obj5;
	$_SESSION["inventobj6"]=$obj6;
	$_SESSION["inventobj7"]=$obj7;
	$_SESSION["inventobj8"]=$obj8;
	$_SESSION["checkbackdate"]=$checkbackdate;
	require ("header.php");
	$text="uid=".$_SESSION["inv_userid"]." action=login";
	writelogfile($text);
	?>
	
	<table bgcolor="#FFFFFF" border="0" width="100%" align="center" height="410">
		<tr><td valign="top"><br /><br />
	<blockquote>
		<br>
	<strong><?=$wording_lan["word"]["usercode"]?></strong>&nbsp;:&nbsp;<?=$usercode?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?=$wording_lan["word"]["username"]?></strong>&nbsp;:&nbsp;<?=$username?><br>
	<?=$wording_lan["login_7"]?>
<!--
	<br>
	<br>	
<a href="index.php?sessiontab=0"><?=$wording_lan["login_8"]?></a>
-->
	<br><br>
	<br><br>
	[<a href="logout.php"><?=$wording_lan["word"]["logout"]?></a>]
	<br>
	<br>
	</blockquote>
	</td>
	</tr></table>
	<?php 
}
else {
	//	<!-- Log in fail -->
	$_SESSION["inv_usercode"]=""; 
	$_SESSION["inv_userid"]=""; 
	$_SESSION["inv_username"]="";
	$_SESSION["inv_password"]="";
	$_SESSION["admininvent"]="";
	$_SESSION["admininventname"]="";
	$_SESSION["inventobj1"]="";
	$_SESSION["inventobj2"]="";
	$_SESSION["inventobj3"]="";
	$_SESSION["inventobj4"]="";
	$_SESSION["inventobj5"]="";
	$_SESSION["inventobj6"]="";
	$_SESSION["inventobj7"]="";
	$_SESSION["inventobj8"]="";
	require ("header.php");
	?>
		<table bgcolor="#FFFFFF" border="0" width="300" align="center" height="410">
		<tr><td valign="top">
		<?=$chkcaptcha?>
		<br />
	<form method="POST" name="Form1" autocomplete="off">
	<center>
	<?=$wording_lan["login_9"]?><br><br />
	<table width="300" height="150" background="./images/log_banner.jpg" style="background-repeat:no-repeat">
		<tr>
		<td>
				<table border="0" cellpadding="0" cellspacing="1" width="300">

		
		<tr>
			<td width="7%" align="right"><?=$wording_lan["word"]["usercode"]?>&nbsp;:&nbsp;</td>
			<td width="93%"><input type="text" name="usercode" size="20" ></td>
		</tr>
		<tr>
			<td width="7%" align="right"><?=$wording_lan["login_4"]?>&nbsp;:&nbsp;</td>
			<td width="93%"><input type="password" name="password" size="20"></td>
		</tr>
		<tr>
			<td width="7%" align="right"></td>
			<td><table><tr><td><div style="width: 150px; float: left; height: 50px">
      
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
	<br>

        <!-- pass a session id to the query string of the script to prevent ie caching -->
        <a tabindex="-1" style="border-style: none" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = 'securimage_show.php?sid=' + Math.random(); return false"><img src="images/refresh.gif" alt="Reload Image" border="0" onclick="this.blur()" align="bottom" /></a></td></tr></table>
</div></a>
</div>
<div style="clear: both"></div>
<!--Code:<br />-->

<!-- NOTE: the "name" attribute is "code" so that $img->check($_POST['code']) will check the submitted form field -->
<input type="text" name="code" size="12" /></td>
		</tr>
		<tr>
			<td width="37%" align="right"></td>
			<td width="63%">
			  <input type="submit" value="<?=$wording_lan["loginbutton"]?>" name="B1">&nbsp;&nbsp;
			<input type="reset" value="<?=$wording_lan["cancel"]?>" name="B2"></td>
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



