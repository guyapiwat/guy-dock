<?php
require './connectmysql.php';
require_once ("function.log.inc.php");
//echo $_SESSION["userpass"];
?>
	<script type="text/javascript" language="javascript">
		var desc = new Array('���ʼ�ҹ���','��������','�׹�ѹ��������');
		var box = new Array("old","new","cnew");
		function check(){
		//var chpass = document.getElementById("cpass");
			for(i=0;i<3;i++)
				if(document.getElementById(box[i]).value==""){
					alert(	"������������ "+desc[i]);
					document.getElementById(box[i]).focus();
					return;
				}

			if(document.getElementById(box[1]).value == document.getElementById(box[0]).value){
				alert(	desc[1]+"��ͧ�����ҡѺ "+desc[0]);
				document.getElementById(box[1]).focus();
				return;
			}

			if(document.getElementById(box[2]).value != document.getElementById(box[1]).value){
				alert(	desc[2]+"��ͧ��ҡѺ "+desc[1]);
				document.getElementById(box[2]).focus();
				return;
			}
			conf = confirm("    ���ʼ�ҹ�դ����Ӥѭ㹡�������ҹ�к�\n�س��ͧ�ӡ������¹�ŧ���ʼ�ҹ��������Ź���������");
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
					<td align="center">���ʼ�ҹ������١��ͧ <br /><a href="<?=$PHP_SELF ?>?sessiontab=0">�ͧ����</a></td>
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
							<td align="center">�������¹���ʼ�ҹ�ռ���ҹ�ѹ��<br />��س��������к�����<br />
							  <a href="index.php">�������к�</a></td>
						  </tr>
						</table>
					<? }else{ ?>
					
						<table align="center" width="200" border="0" bgcolor="#CC0000">
						  <tr>
							<td align="center">�Դ��ͼԴ��Ҵ㹡����䢰ҹ������ <br /><a href="<?=$PHP_SELF ?>?sessiontab=0">�ͧ����</a></td>
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
      <td width="119" align="right">����</td>
      <td width="9">&nbsp;</td>
      <td width="172"><?=$_SESSION["adminusercode"]?></td>
    </tr>
    <tr>
      <td width="119" align="right">����-���ʡ��</td>
      <td width="9">&nbsp;</td>
      <td width="172"><?=$_SESSION["adminusername"]?></td>
    </tr>
    <tr>
      <td align="right">���ʼ�ҹ���</td>
      <td>&nbsp;</td>
      <td><input type="password" name="old" id="old" /></td>
    </tr>
    <tr>
      <td align="right">��������</td>
      <td>&nbsp;</td>
      <td><input type="password" name="new" id="new" /></td>
    </tr>
    <tr>
      <td align="right">�׹�ѹ���ʼ�ҹ����</td>
      <td>&nbsp;</td>
      <td><input type="password" name="cnew" id="cnew" /></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="button" value="��ŧ" onclick="check()" /></td>
    </tr>
  </table>

</form>
	<? }?>
	</td>
  </tr>
</table>
