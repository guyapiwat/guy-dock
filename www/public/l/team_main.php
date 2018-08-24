<?
	if(!isset($_GET['sub'])){
?>
<table align="center" width="500" height="350" border="0"><tr align="center" valign="top">
    <td>
    <a href="index.php?sessiontab=3&sub=1">
    <img src="images/member.gif" width="140" height="140" border="0" alt="รายชื่อสมาชิกในทีม">
    </a><br>รายชื่อสมาชิกในทีม
    </td>
    <!--td>
	<a href="./index.php?sessiontab=1&sub=2"><img src="images/key_exchange.gif" width="140" height="140" border=0 alt="แก้ไขรหัสผ่าน">
    </a><br>แก้ไขรหัสผ่าน
    </td-->
</tr></table>
<br />
<?
	}else{
?>
<table border="0" height="390"><tr valign="top">
<td width="50">
<a href="javascript:history.back()"><img border="0" src="./images/back.gif" height="40" width="40" alt="เมนูสมาชิก" /></a>
<a href="./index.php?sessiontab=<?=$sesstab?>&sub=1"><img border="0" src="./images/users.gif" height="40" width="40" alt="ข้อมูลสมาชิก" /></a>
</td>
<td align="left" width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			case 1:
			?><legend><strong><font color="#666666">รายชื่อสมาชิกในทีม&nbsp;&nbsp;</font></strong></legend><?
				include("team_list.php");
				//include("capture_page.php");
				break;
			default :
				header("Location: index.php?sessiontab=$sesstab");
			break;
		}
?>
</fieldset>
</td>
</tr></table>
<?
	}
?>
