<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
	<tr>
		<td width="5%" valign="top">&nbsp;</td>
		<td width="95%" align="left" valign="top">

			<table border="0" cellspacing="0" cellpadding="0" width="760">
				<tr>
					<td  valign="top" colspan="2"><img src="images/sysadmin.gif" border="0" align="absmiddle" /><FONT SIZE="+2" ><B>�������к� System Admin</B></FONT><br /><br />
				<tr >
					<td width="300" height="28"><img src="./images/user.gif" width="32" height="32" align="absmiddle" />&nbsp;<? echo  "<strong>���ʼ���� :</strong> ".$_SESSION["adminusercode"]." <strong>���ͼ���� :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
				</tr>
				<tr><td>
					<table width="50%" border="1" bordercolor="#FF7F00" cellSpacing="0" cellPadding="0" >
					  <tr>
						<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
						</tr>
						 <tr>
						<td width="16%">&nbsp;</td>
						<td width="84%">&nbsp;</td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/8_18s.gif" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=1">���ͧ������</a></td>
					  </tr>
					  <!--tr>
						<td width="16%" align="right"><img src="images/icrecycle.gif" width="16" height="16" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">��Ǩ�ͺ log</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/ICBOX.GIF" width="15" height="15" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">�����Ũѧ��Ѵ</a></td>
					  </tr-->
                      <tr>
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">�������Ң�</a></td>
                      </tr>
                      <tr>
                        <td width="16%" align="right"><img src="images/inv_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">�����ż�����Ң� / ������ʼ�ҹ</a></td>
                      </tr>
					  <tr>
						<td width="16%" align="right"><img src="./images/6_11.gif" width="25" height="25" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=3">�����Ÿ�Ҥ��</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/9_37s.gif" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">�����ż�����к� / ������ʼ�ҹ</a></td>
					  </tr>	
					 <!-- <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=5">��駤��</a></td>
					  </tr>-->
					 <!-- <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">�����͹������</a></td>
					  </tr>-->
					<!--  <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">��˹��������䫵�</a></td>
					  </tr>-->
					  <tr>
						<td width="16%" align="right">&nbsp;</td>
						<td width="84%">&nbsp;</td>
					  </tr>
					</table>
				</td></tr>
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
<a <?=($_GET['sub']==1?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=1"><img border="0" src="./images/8_18.gif" height="40" width="40" alt="���ͧ������" /></a>
<a <?=($_GET['sub']==2?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=2"><img border="0" src="./images/10_11.gif" height="40" width="40" alt="�������Ң�" /></a>
<a <?=($_GET['sub']==6?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=6"><img border="0" src="./images/inv.gif" height="40" width="40" alt="�����ż�����Ң�" /></a>
<!--a href="./index.php?sessiontab=<?=$sesstab?>&sub=2"><img border="0" src="./images/11_42.gif" height="40" width="40" alt="�����Ũѧ��Ѵ" /></a-->
<a <?=($_GET['sub']==3?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=3"><img border="0" src="./images/6_11.gif" height="40" width="40" alt="�����Ÿ�Ҥ��" /></a>
<a <?=($_GET['sub']==4?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=4"><img border="0" src="./images/9_37.gif" height="40" width="40" alt="�����ż�����к� / ������ʼ�ҹ" /></a>
<a <?=($_GET['sub']==5?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=5"><img border="0" src="./images/9_32.gif" height="40" width="40" alt="��駤��" /></a>
<!--a <?=($_GET['sub']==7?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=7"><img border="0" src="./images/9_32.gif" height="40" width="40" alt="��˹��������䫵�" /></a>
<!--a href="./index.php?sessiontab=<?=$sesstab?>&sub=6"><img border="0" src="./images/xxxx.gif" height="40" width="40" alt="��Ǩ�ͺ log" /></a-->

</td>
<td width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			case 1:
				?><legend><strong><font color="#666666">���ͧ������ </font></strong></legend><?
				include("sysadmin_backup.php");
				break;
			/*case 6:
				?><legend><strong><font color="#666666">��Ǩ�ͺ log </font></strong></legend><?
				include("syslog.php");
				break;
			case 2:
				?><legend><strong><font color="#666666">�����Ũѧ��Ѵ </font></strong></legend><?
				include("province_main.php");
				break;*/
			case 2:
				?>
				<legend>
		           <strong><font color="#666666">�������Ң�&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                	<img border="0" src="./images/add.gif" alt="�����������Ң�" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=2&state=2'>�����Ң�</a>
                   <? }?>              
      			</legend>
				<?
				include("invent.php");
				break;
			case 3:
				?><legend><strong><font color="#666666">�����Ÿ�Ҥ�� </font></strong><?
				 if($acc->isAccess(1)){?>
                    <img border="0" src="./images/add.gif" alt="���������Ÿ�Ҥ��" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=5&sub=3&state=2'>���������Ÿ�Ҥ��</a>
                   <? }?>              
                </legend><?
				include("bank.php");
				break;
			case 4:
				?><legend><strong><font color="#666666">�����ż�����к� / ������ʼ�ҹ</font></strong>
					<? if($acc->isAccess(1)){?>
                    <img border="0" src="./images/add.gif" alt="������������Ҫԡ" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=5&sub=4&state=2'>����������к�</a>
                   <? }?>              
                </legend><?
				include("sysuser.php");
				break;
			case 5:
				?><legend><strong><font color="#666666">��駤��</font></strong></legend><?
				include("config_mem_info.php");
				break;
			case 6:
				?><legend><strong><font color="#666666">�����ż�����Ң� / ������ʼ�ҹ</font></strong>
					<? if($acc->isAccess(1)){?>
                    <img border="0" src="./images/add.gif" alt="������������Ҫԡ" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=5&sub=6&state=2'>����������Ң�</a>
                   <? }?>              
                </legend><?
				include("invuser.php");
				break;
			case 7:
				?><legend><strong><font color="#666666">�����͹������</font></strong></legend><?
				include("convert_data.php");
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


