<meta http-equiv="Content-Language" content="th">
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<? 
//session_start();
exit;
//set_time_limit(0);
include("global.php");
ini_set("memory_limit","100M");
?>
<? include("header.php");?>
<? include("prefix.php");require './connectmysql.php';
?>
<? 
	include("gencode.php");
	//echo $_SESSION["lan"].' '.$_GET["lan"];
	if($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])){
		if(empty($_GET["lan"]))$_SESSION["lan"] = "TH";
		else $_SESSION["lan"] = $_GET["lan"];
	}else{
		if(empty($_SESSION["lan"]))$_SESSION["lan"] = "TH";
	}
	include_once("wording".$_SESSION["lan"].".php");
?>
<? include("logtext.php");
$txttype = "";
if(!empty($_POST[mcode]) and !empty($_POST["new"])){
	$mcode = gencode($_POST["mcode"]);
	$email = $_POST["new"];
	$mobile = $_POST["mobile"];
	$id_card = $_POST["id_card"];
	$mdate = $_POST["mdate"];

	$sql = "SELECT name_t FROM ".$dbprefix."member where mcode = '$mcode' and email = '$email' and mobile = '$mobile' and id_card = '$id_card' and birthday = '$mdate' ";
	//echo $sql;
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0){
	$name_t = mysql_result($rs,0,'name_t');
	$sv_code = rand(1000, 9999);
	$sql = "update ".$dbprefix."member set sv_code = '$sv_code' where mcode = '$mcode' and email = '$email' ";
	$rs = mysql_query($sql);
		if($email){

			logtext(true,$mcode,'ร้องขอการเปลี่ยนรหัสผ่าน  รหัสสมาชิก : '.$mcode." อีเมลล์ : ".$email,$mcode);


			$strTo = "$email";
			$strSubject = "=?UTF-8?B?".base64_encode("SUCCESSMORE : Reset Password")."?=";
			//$strHeader .= "MIME-Version: 1.0' . \r\n";
			$strHeader = "Content-type: text/html; charset=windows-874\r\n"; 
			$strHeader .= "From: SUCCESSMORE Information<info@successmore.com>";
			//$strVar = "ข้อความภาษาไทย";
			$strMessage = "รหัสสมาชิก : $mcode 
				<br> ชื่อผู้สมัครหลัก : $name_t
				<br> รหัสผ่าน (ใหม่) : $sv_code  
				<br><br>ท่านสามารถเข้าสู่ระบบ SUCCESSMORE Online Member Service เพื่อสั่งซื้อสินค้า,สมัครสมาชิกใหม่,เช็คโบนัส หรือดูแลองค์กรของท่านได้ที่
				<br> <a href='http://www.successmore.com'>www.succesmore.com/member</a>
				<br><br> หากมีคำถามหรือข้อสงสัยประการใด กรุณาติดต่อ
				<br><Br> แผนกดูแลลูกค้า ( Customer Support )
				<br> บริษัท ซัคเซสมอร์ บีอิ้งค์ จำกัด
				<br> โทรศัพท์ 02-5415655
				<br> Fax 02-5415653
				<br> Email : support@successmore.com
				<br><Br>SUCCESSMORE
				<br>“Inspiration for your Being”
				<br>“แรงบันดาลใจที่เปลี่ยนชีวิตคุณได้”
				";
			$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);
			$txttype = "<font color=#00FF00>ข้อมูลถูกต้อง ระบบได้ส่งรหัสผ่านใหม่ให้ทางอีเมลของคุณแล้ว กรุณาเช็คดูที่ Inbox , Spam email หรือ Junk email</font>";
			//	mail("$email","","From:Webmaster<webmaster@cabnetsystem.com>","webmaster@cabnetsystem.com");
		}

	}else{
		$txttype = "<font color=#FF000>ข้อมูลไม่ตรงกับที่เคยให้ไว้กับบริษัทฯ กรุณาติดต่อเจ้าหน้าที่</font>";
	}
	
	//$type = 1;
}



?>
<html>
<head>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<title><?=$wording_lan["Title"]?></title>
<link rel="stylesheet" type="text/css" href="./../style.css" />
</head>
<script language="JavaScript"> 
 
 function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
}
function clock(lan) {
var date = new Date()
var year = <?=date('Y')?>;
var month = date.getMonth()
var day = date.getDate()
var day1 = date.getDay()
var hour = date.getHours()
var minute = date.getMinutes()
var second = date.getSeconds()

if(lan == 'EN'){
var months = new Array("January","Febuary","March","April","May","June","July","August","September","October","November","December")
var thday = new Array ("Sunday","Monday","Tuesday","Wednesday","Thurday","Friday","Satuday");
}else{
var months = new Array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม")
var thday = new Array ("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");

}
var label1 = document.getElementById('lbltime')
var monthname = months[month]
var dayname = thday[day1]
 
if (hour < 12) {
hour = "0"+hour
}
 
if (minute < 10) {
minute = "0" + minute
}
 
if (second < 10) {
second = "0" + second
}
 
 
label1.innerHTML =""+dayname+" "+day+" "+monthname+" "+(year)+"  "+hour+":"+minute+":"+second
 
setTimeout("clock('"+lan+"')", 1000)
 
}
//  End -->
</script>
</head><!--bgcolor="#FFCC66"-->
<body onLoad="clock('<?=$_SESSION["lan"]?>')"  bgcolor="#FFFFFF" bgproperties="fixed" leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">

<?php
$mcode=$_SESSION["usercode"];
//echo $_SESSION["userpass"];

?>
	<script type="text/javascript" language="javascript">
		var desc = new Array('ช่องรหัสสมาชิก','ช่องอีเมล','อีเมล','ยืนยันอีเมล');
		var box = new Array("mcode","new","cnew");
		function check(){
		//var chpass = document.getElementById("cpass");
			for(i=0;i<2;i++)
				if(document.getElementById(box[i]).value==""){
					alert(	"ไม่ใส่ข้อมูลใน "+desc[i]);
					document.getElementById(box[i]).focus();
					return;
				}
			if(document.getElementById('id_card').value==""){
					alert(	"ไม่ใส่ข้อมูลใน เลขบัตรประชาชน");
					document.getElementById('id_card').focus();
					exit;
			}
			if(document.getElementById('mdate').value==""){
					alert(	"ไม่ใส่ข้อมูลใน วันเกิด");
					document.getElementById('mdate').focus();
					exit;
			}
			if(document.getElementById('mobile').value==""){
					alert(	"ไม่ใส่ข้อมูลใน เบอร์มือถือ");
					document.getElementById('mobile').focus();
					exit;
			}
			/*if(document.getElementById(box[1]).value == document.getElementById(box[0]).value){
				alert(	desc[1]+"ต้องไม่เท่ากับ "+desc[0]);
				document.getElementById(box[1]).focus();
				return;
			}*/

			if(document.getElementById(box[2]).value != document.getElementById(box[1]).value){
				alert(	desc[2]+"ต้องเท่ากับ "+desc[3]);
				document.getElementById(box[2]).focus();
				return;
			}
			conf = confirm("    รหัสผ่านมีความสำคัญในการเข้าใช้งานระบบ\nคุณต้องทำการเปลี่ยนแปลงรหัสผ่านตามข้อมูลนี้หรือไม่");
			if(conf){
				document.chpass.submit();
			}else{
				return;
			}	
		}
	</script>
<table width="100%" border="0">
  <tr>
    <td valign="top">

<?
//echo $mdate = date('Y-m-d');
//echo date("Y-m-d",strtotime("+1 Month",strtotime($mdate)));
	if($_GET['ed']==1){
		?><br /><?
		$name_t="";
		$sv_code="";
		$result=mysql_query("select * from ".$dbprefix."member where mcode='".$_SESSION["usercode"]."' LIMIT 1" );
		if(mysql_num_rows($result)>0){
			$pass = mysql_result($result,0,sv_code);
			$opass = $_POST['old'];
			$npass = $_POST['new'];
			$cpass = $_POST['cnew'];
			if($opass != $pass){ ?>
				<table align="center" width="200" border="0" bgcolor="#CC0000">
				  <tr>
					<td align="center"><?=$wording_lan["sub12_4"]?> <br /><a href="<?=$PHP_SELF ?>?sessiontab=1&sub=2"><?=$wording_lan["sub12_5"]?></a></td>
				  </tr>
				</table>

			<? }else{
					if(mysql_query("UPDATE ".$dbprefix."member SET sv_code='$npass' WHERE mcode='".$_SESSION["usercode"]."' ")){?>
						<table align="center" width="200" border="0" bgcolor="#00CC00">
						  <tr>
							<td align="center"><?=$wording_lan["sub12_6"]?><br /><?=$wording_lan["sub12_7"]?><br />
							  <a href="index.php"><?=$wording_lan["sub12_8"]?></a></td>
						  </tr>
						</table>
					<? $_SESSION["usercode"]=""; 
$_SESSION["username"]="";
$_SESSION["password"]="";
$_SESSION["ewallet"]="";
//include "index.php";
}else{ ?>
					
						<table align="center" width="200" border="0" bgcolor="#CC0000">
						  <tr>
							<td align="center"><?=$wording_lan["sub12_9"]?> <br /><a href="<?=$PHP_SELF ?>?sessiontab=1&sub=2"><?=$wording_lan["sub12_10"]?></a></td>
						  </tr>
						</table>
					<? }
			}
		}
	}else{
?>
<br />
<center><?=$txttype?></center>
<form name="chpass" id="chpass" action="" method="post">
  <table cellpadding="0" cellspacing="0" align="center" width="300" height="150" border="0" >
    <tr bgcolor="#FFCC33">
      <td colspan="3"><b>เปลี่ยนรหัสผ่าน</b></td>
    </tr>
    <tr>
      <td width="119" align="right"><?=$wording_lan["mcode"]?>
        : </td>
      <td width="9">&nbsp;</td>
      <td width="172"><input type="text" name="mcode" id="mcode" /></td>
    </tr>
    <tr>
      <td align="right">เลขบัตรประชาชน :</td>
      <td>&nbsp;</td>
      <td><input type="text" name="id_card" id="id_card"  maxlength="13" onKeyPress="return chknum(window.event.keyCode)" /></td>
    </tr>
    <tr>
      <td align="right">วันเกิด :</td>
      <td>&nbsp;</td>
      <td nowrap="nowrap"><input type="text" name="mdate" id="mdate" readonly="" />
        <a href="javascript:NewCal('mdate','yyyymmdd',false,24)"><img  src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="(&#3611;&#3611;&#3611;&#3611;-&#3604;&#3604;-&#3623;&#3623;)" /></a></td>
    </tr>
    <tr>
      <td align="right">เบอร์มือถือ :</td>
      <td>&nbsp;</td>
      <td><input type="text" name="mobile" id="mobile"  maxlength="10" onKeyPress="return chknum(window.event.keyCode)" /></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap">อีเมล (ที่ให้ไว้กับบริษัท) : </td>
      <td>&nbsp;</td>
      <td><input type="text" name="new" id="new" /></td>
    </tr>
    <tr>
      <td align="right">ยืนยันอีเมล : </td>
      <td>&nbsp;</td>
      <td><input type="text" name="cnew" id="cnew" /></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input name="button" type="button" onClick="check()" value="<?=$wording_lan["submit"]?>" /></td>
    </tr>
  </table>
</form>
	<? }?>
	</td>
  </tr>
</table>
<? include "footer.php";?>
</body>
</html>


