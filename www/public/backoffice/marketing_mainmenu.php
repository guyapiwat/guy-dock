<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
	<tr>
		<td width="5%" valign="top">&nbsp;</td>
		<td width="95%" align="left" valign="top">

			<table border="0" cellspacing="0" cellpadding="0" width="1260">
				<tr>
					<td  valign="top" colspan="3"><img src="images/sysadmin.gif" border="0" align="absmiddle" /><FONT SIZE="+2" ><B>Ἱ���õ�Ҵ</B></FONT><br /><br />
				<tr >
					<td height="28" colspan="2"><img src="./images/user.gif" width="32" height="32" align="absmiddle" />&nbsp;<? echo  "<strong>���ʼ���� :</strong> ".$_SESSION["adminusercode"]." <strong>���ͼ���� :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
				</tr>
				<tr>
				  <td width="368">
					<table width="90%" border="1" bordercolor="#FF7F00" cellSpacing="0" cellPadding="0" >
					  <tr>
						<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
					  </tr>
						 <tr>
						<td width="16%">&nbsp;</td>
						<td width="84%">&nbsp;</td>
					  </tr>
                        <tr >
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=9">��§ҹ����Թ����������</a></td>
                      </tr>
                      <tr>
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">��§ҹ�ʹ�Թ��ҷ��١���</a></td>
                      </tr>
                      <tr>
                        <td width="16%" align="right"><img src="images/inv_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=54">���˹觷ҧ��áԨ</a></td>
                      </tr>
                      <tr>
                        <td align="right"><img src="images/inv_s.gif" />&nbsp;&nbsp;</td>
                        <td><a href="./index.php?sessiontab=<?=$sesstab?>&sub=55">���˹����µ���</a></td>
                      </tr>
                      <tr>
						<td width="16%" align="right"><img src="./images/6_11.gif" width="25" height="25" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=8">��§ҹ��â�鹵��˹�</a></td>
					  </tr>
					</table>
				</td>
				  <td width="392" valign="top"> </td>
				</tr>
			</table>
      	</td>
</tr>
</table>
<?
	}else{
?>
<table border="0" height="395" width="99%"><tr valign="top">
<td width="50">
<? $hl = "style='border:inset 1 #FF9933;'"; ?>
<a href="javascript:history.back()"><img src="./images/back.gif" border="0"height="40" width="40" alt="���ٺ������к�" /></a>

</td>
<td width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			case 7:
				?>
				<legend>
       			    <strong><font color="#666666">��§ҹ�ʹ�Թ��ҷ��١���</font></strong>
                </legend>
				<?
				include("product_sale_amount.php");
				break;
			case 8:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ�ʴ�ʶҹС�û�Ѻ���˹觢ͧ��Ҫԡ</font></strong></legend>
				<?
				include("./comsn/com_a/rep_newpositon4.php");
				break;
			case 9:
				?>
				<legend>
       			    <strong><font color="#666666">��§ҹ�ʹ����Թ����������</font></strong>
                </legend>
				<?
				include("product_sale_amount_all.php");
				break;
			case 54:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ�ʴ�ʶҹС�û�Ѻ���˹觢ͧ��Ҫԡ</font></strong></legend>
				<?
				include("./comsn/com_a/rep_newpositon1.php");
				break;
			case 55:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ�ʴ�ʶҹС�û�Ѻ���˹觢ͧ��Ҫԡ</font></strong></legend>
				<?
				include("./comsn/com_a/rep_newpositon2.php");
				break;
			default :
				echo "<script language='JavaScript'>window.location='index.php?sessiontab=$sesstab'</script>";	
			break;
		}
?>
</fieldset>
</td>
</tr></table>
<?
	}
?>


