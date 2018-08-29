<?php
require './connectmysql.php';
require_once ("function.log.inc.php");
//echo $_SESSION["userpass"];
?>
	<script type="text/javascript" language="javascript">
		var desc = new Array('รหัสผ่านเดิม','รหัสใหม่','ยืนยันรหัสใหม่');
		var box = new Array("old","new","cnew");
		function check(){
		//var chpass = document.getElementById("cpass");
			for(i=0;i<3;i++)
				if(document.getElementById(box[i]).value==""){
					alert(	"ไม่ใส่ข้อมูลใน "+desc[i]);
					document.getElementById(box[i]).focus();
					return;
				}

			if(document.getElementById(box[1]).value == document.getElementById(box[0]).value){
				alert(	desc[1]+"ต้องไม่เท่ากับ "+desc[0]);
				document.getElementById(box[1]).focus();
				return;
			}

			if(document.getElementById(box[2]).value != document.getElementById(box[1]).value){
				alert(	desc[2]+"ต้องเท่ากับ "+desc[1]);
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
	if($_GET['ed']==1){
		?><br /><?
		$result=mysql_query("select * from ".$dbprefix."user where uid='".$_SESSION["adminuserid"]."' LIMIT 1" );
		if(mysql_num_rows($result)>0){
			$pass = DecodePwd(mysql_result($result,0,'password'));
			$opass = $_POST['old'];
			$npass = $_POST['new'];
			$cpass = $_POST['cnew'];
			if($opass != $pass){ ?>
				<table align="center" width="200" border="0" bgcolor="#CC0000">
				  <tr>
					<td align="center">รหัสผ่านเดิมไม่ถูกต้อง <br /><a href="<?=$PHP_SELF ?>?sessiontab=0">ลองใหม่</a></td>
				  </tr>
				</table>

			<? }else{
			//====================LOG===========================
			$text="uid=".$_SESSION["adminuserid"]." action=mobile calc =>UPDATE ".$dbprefix."user SET password='".EncodePwd($npass)."' WHERE uid='".$_SESSION["adminuserid"]."'";
			writelogfile($text);
			//=================END LOG===========================
					if(mysql_query("UPDATE ".$dbprefix."user SET password='".EncodePwd($npass)."' WHERE uid='".$_SESSION["adminuserid"]."' ")){?>
						<table align="center" width="200" border="0" bgcolor="#00CC00">
						  <tr>
							<td align="center">การเปลี่ยนรหัสผ่านมีผลใช้งานทันที<br />กรุณาเข้าสู่ระบบใหม่<br />
							  <a href="index.php">เข้าสู่ระบบ</a></td>
						  </tr>
						</table>
					<? }else{ ?>
					
						<table align="center" width="200" border="0" bgcolor="#CC0000">
						  <tr>
							<td align="center">เกิดข้อผิดพลาดในการแก้ไขฐานข้อมูล <br /><a href="<?=$PHP_SELF ?>?sessiontab=0">ลองใหม่</a></td>
						  </tr>
						</table>
					<? }
			}
		}
	}else{
?>
<br />
<form name="chpass" id="chpass" action="<?=$PHP_SELF ?>?sessiontab=0&ed=1" method="post">
  <table cellpadding="0" cellspacing="0" align="center" width="300" height="150" border="0" background="./images/log_banner.jpg">
    <tr>
      <td width="119" align="right">รหัส</td>
      <td width="9">&nbsp;</td>
      <td width="172"><?=$_SESSION["adminusercode"]?></td>
    </tr>
    <tr>
      <td width="119" align="right">ชื่อ-นามสกุล</td>
      <td width="9">&nbsp;</td>
      <td width="172"><?=$_SESSION["adminusername"]?></td>
    </tr>
    <tr>
      <td align="right">รหัสผ่านเดิม</td>
      <td>&nbsp;</td>
      <td><input type="password" name="old" id="old" /></td>
    </tr>
    <tr>
      <td align="right">รหัสใหม่</td>
      <td>&nbsp;</td>
      <td><input type="password" name="new" id="new" /></td>
    </tr>
    <tr>
      <td align="right">ยืนยันรหัสผ่านใหม่</td>
      <td>&nbsp;</td>
      <td><input type="password" name="cnew" id="cnew" /></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="button" value="ตกลง" onclick="check()" /></td>
    </tr>
  </table>

</form>
	<? }?>
	</td>
  </tr>
</table>
