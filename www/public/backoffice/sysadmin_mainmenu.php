<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
	<tr>
		<td width="5%" valign="top">&nbsp;</td>
		<td width="95%" align="left" valign="top">

			<table border="0" cellspacing="0" cellpadding="0" width="760">
				<tr>
					<td  valign="top" colspan="3"><img src="images/sysadmin.gif" border="0" align="absmiddle" /><FONT SIZE="+2" ><B>�������к� System Admin</B></FONT><br /><br />
				<tr >
					<td height="28" colspan="2"><img src="./images/user.gif" width="32" height="32" align="absmiddle" />&nbsp;<? echo  "<strong>���ʼ���� :</strong> ".$_SESSION["adminusercode"]." <strong>���ͼ���� :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
				</tr>
				<tr>
				  <td width="368">
					<table width="90%" border="1" bordercolor="#0099CC" cellSpacing="0" cellPadding="0" >
					  <tr>
						<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
					  </tr>
						 <tr>
						<td width="16%">&nbsp;</td>
						<td width="84%">&nbsp;</td>
					  </tr>
					  <!--tr>
						<td width="16%" align="right"><img src="images/8_18s.gif" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=1">���ͧ������</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/icrecycle.gif" width="16" height="16" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">��Ǩ�ͺ log</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/ICBOX.GIF" width="15" height="15" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">�����Ũѧ��Ѵ</a></td>
					  </tr>

					    <tr>
                        <td width="16%" align="right"><img src="images/inv_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=66">�����š�ê����Թ�����Ң�</a></td>
                      </tr-->
					  <tr >
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=100">��駤���Դ/�Դ�к�</a></td>
                      </tr>
					  <tr >
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=1001">������蹵��˹�</a></td>
                      </tr>
                        <tr  style="display:none">
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=9">�����ż���˹����Թ���</a></td>
                      </tr>
                      <tr>
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">�������Ң�</a></td>
                      </tr>
                      <tr>
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=22">������ Payment �Ң�</a></td>
                      </tr>
                      <tr>
                        <td width="16%" align="right"><img src="images/inv_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">�����ż�����Ң� (Branch) / ������ʼ�ҹ</a></td>
                      </tr>
					  <tr>
						<td width="16%" align="right"><img src="./images/6_11.gif" width="25" height="25" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=3">�����Ÿ�Ҥ��</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/9_37s.gif" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">�����ż�����к� (Backoffice) / ������ʼ�ҹ</a></td>
					  </tr>	
					    <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=8">�к���Ǩ�ͺ��÷ӧҹ</a></td>
					  </tr>
                       <tr style="display:none">
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=10">��Ǩ�ͺ����Ѻ��¨���</a></td>
					  </tr>
					   <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=11">��Ǩ�ͺ����Ѻ��¨���</a></td>
					  </tr>
					   <tr style="display:none">
					     <td align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
					     <td><a href="./index.php?sessiontab=<?=$sesstab?>&sub=16">��Ǩ�ͺ�������������ٹ��</a></td>
				      </tr>
				      <tr  style="display:none">
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=12">��Ǩ�ͺ���������§ҹ</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="./images/6_11.gif" width="25" height="25" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=20">��С��</a></td>
					  </tr>
					<!--<tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=5">��駤��</a></td>
					  </tr>
					  < <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">�����͹������</a></td>
					  </tr>-->
					<!--  <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">��˹��������䫵�</a></td>
					  </tr>-->
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
					</table>
				</td>
				  <td width="392" valign="top"><table width="90%" style="display:none" border="1" bordercolor="#0099CC" cellSpacing="0" cellPadding="0" >
                    <tr>
                      <td colspan="2"  background="./images/bar_box.gif">�觢������</td>
                    </tr>
                    <tr>
                      <td width="16%">&nbsp;</td>
                      <td width="84%">&nbsp;</td>
                    </tr>
                    <!--tr>
						<td width="16%" align="right"><img src="images/8_18s.gif" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=1">���ͧ������</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/icrecycle.gif" width="16" height="16" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">��Ǩ�ͺ log</a></td>
					  </tr>
					  <tr>
						<td width="16%" align="right"><img src="images/ICBOX.GIF" width="15" height="15" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">�����Ũѧ��Ѵ</a></td>
					  </tr-->
                    <tr>
                      <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                      <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=13">�� Email</a></td>
                    </tr>
                    <tr>
                      <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                      <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=14">�� SMS</a></td>
                    </tr>

                    <!--< <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">�����͹������</a></td>
					  </tr>-->
                    <!--  <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">��˹��������䫵�</a></td>
					  </tr>-->
					  <tr>
						<td width="16%" align="right"><img src="./images/6_11.gif" width="25" height="25" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=20">��С��</a></td>
					  </tr>
                    <tr>
                      <td width="16%" align="right">&nbsp;</td>
                      <td width="84%">&nbsp;</td>
                    </tr>

                  </table></td>
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
                
            case 22:
				?>
				<legend>
		           <strong><font color="#666666">������ Payment �Ң�&nbsp;&nbsp;</font></strong>
      			</legend>
				<?
				include("invent_payment.php");
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

			case 66:
				?><legend><strong><font color="#666666">�����š�ê����Թ�����Ң�</font></strong>
					<? if($acc->isAccess(1)){?>
                    <img border="0" src="./images/add.gif" alt="���������š�ê����Թ" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=5&sub=66&state=2'>���������š�ê����Թ</a>
                   <? }?>              
                </legend><?
				include("payment_type.php");
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
			case 8:
				?><legend><strong><font color="#666666">�к���Ǩ�ͺ��÷ӧҹ
                </font></strong></legend><?
				include("report_log.php");
				break;
			case 9:
				?>
				<legend>
		           <strong><font color="#666666">�������Ң�&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                	<img border="0" src="./images/add.gif" alt="���������ż���˹����Թ���" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=9&state=2'>���������ż���˹����Թ���</a>
                   <? }?>              
      			</legend>
				<?
				include("supplier.php");
				break;
				case 10:
				?><legend><strong><font color="#666666">�ʹ���
                </font></strong></legend><?
				include("checkAll.php");
				break;
				case 11:
				?><legend><strong><font color="#666666">�ʹ���
                </font></strong></legend><?
				include("checkAll1.php");
				break;
				case 12:
				?><legend><strong><font color="#666666">��Ǩ�ͺ���������§ҹ
                </font></strong></legend><?
				include("checkdownline.php");
				break;
				case 14:
				?><legend><strong><font color="#666666">�� SMS
                </font></strong></legend><?
				include("sendsms.php");
				break;
				case 13:
				?><legend><strong><font color="#666666">�� Email
                </font></strong></legend><?
				include("sendemail.php");
				break;
				case 15:
				?><legend><strong><font color="#666666">������� ��� �Ԩ����
                </font></strong></legend><?
				include("news/index.php");
				break;
				case 16:
				?><legend><strong><font color="#666666">��Ǩ�ͺ���������ٹ��
                </font></strong></legend><?
				include("cost_branch.php");
				break;
				case 23:
				?>
				<legend>
       			    <strong><font color="#666666">   ��§ҹ�������Թ &nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(1)){?>
                   <img border="0" src="./images/add.gif" alt="���������š�ë��͢��" height="16" width="16" align="absmiddle" />&nbsp;&nbsp;<a href='./index.php?sessiontab=3&sub=23&state=2'>����Թ</a>
                   <? }?>              
                </legend>
				<?
				include("ewallet.php");
				break;
				case 20:
				?><legend><strong><font color="#666666">��С�� </font></strong><?
				 if($acc->isAccess(1)){?>
                    <img border="0" src="./images/add.gif" alt="��С��" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=5&sub=20&state=2'>��С��</a>
                   <? }?>              
                </legend><?
				include("news.php");
				break;
				case 99:
				?>
				<legend>
       			    <strong><font color="#666666">ᨧ�ʹ</font></strong>
                </legend>
				<?
				include("sale_hold1.php");
				break;
				case 100:
				?><legend><strong><font color="#666666">��駤���Դ/�Դ�к�
                </font></strong></legend><?
				include("system_editadd.php");
				break;
				case 1001:
				?><legend><strong><font color="#666666">������蹵��˹�
                </font></strong></legend><?
				include("pos_exp_editadd.php");
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


