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
//var_dump($_SESSION);
	if($_GET['ed']==1){
		?><br /><?
			
		$result=mysql_query("select * from ".$dbprefix."user where usercode='".$_SESSION["inv_usercode"]."' LIMIT 1" );
		if(mysql_num_rows($result)>0){
			$pass = DecodePwd(mysql_result($result,0,'password'));
			$opass = $_POST['old'];
			$npass = $_POST['new'];
			$cpass = $_POST['cnew'];
			if($opass != $pass){ ?>
				<table align="center" width="200" border="0" bgcolor="#CC0000">
				  <tr>
					<td align="center"><?=$wording_lan["sub12_4"]?> <br /><a href="<?=$PHP_SELF ?>?sessiontab=0"><?=$wording_lan["sub12_10"]?></a></td>
				  </tr>
				</table>

			<? }else{
			//====================LOG===========================
			$text="uid=".$_SESSION["inv_usercode"]." action=mobile calc =>UPDATE ".$dbprefix."user SET password='".EncodePwd($npass)."' WHERE usercode='".$_SESSION["inv_usercode"]."'";
			writelogfile($text);
			//=================END LOG===========================
					if(mysql_query("UPDATE ".$dbprefix."user SET password='".EncodePwd($npass)."' WHERE usercode='".$_SESSION["inv_usercode"]."' ")){?>
						<table align="center" width="200" border="0" bgcolor="#00CC00">
						  <tr>
							<td align="center"><?=$wording_lan["sub12_6"]?><br /><?=$wording_lan["sub12_7"]?><br />
							  <a href="index.php"><?=$wording_lan["sub12_8"]?></a></td>
						  </tr>
						</table>
					<? }else{ ?>
					
						<table align="center" width="200" border="0" bgcolor="#CC0000">
						  <tr>
							<td align="center"><?=$wording_lan["sub12_9"]?> <br /><a href="<?=$PHP_SELF ?>?sessiontab=0"><?=$wording_lan["sub12_10"]?></a></td>
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
      <td width="119" align="right"><?=$wording_lan["first_1"]?></td>
      <td width="9">&nbsp;</td>
      <td width="172"><?=$_SESSION["inv_usercode"]?></td>
    </tr>
    <tr>
      <td width="119" align="right"><?=$wording_lan["first_5"]?></td>
      <td width="9">&nbsp;</td>
      <td width="172"><?=$_SESSION["admininventname"]?></td>
    </tr>
    <tr>
      <td align="right"><?=$wording_lan["sub12_1"]?></td>
      <td>&nbsp;</td>
      <td><input type="text" name="old" id="old" /></td>
    </tr>
    <tr>
      <td align="right"><?=$wording_lan["sub12_2"]?></td>
      <td>&nbsp;</td>
      <td><input type="text" name="new" id="new" /></td>
    </tr>
    <tr>
      <td align="right"><?=$wording_lan["sub12_3"]?></td>
      <td>&nbsp;</td>
      <td><input type="text" name="cnew" id="cnew" /></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="button" value="<?=$wording_lan["word"]["ok"]?>" onclick="check()" /></td>
    </tr>
  </table>

</form>
	<? }?>
	</td>
  </tr>
</table>
