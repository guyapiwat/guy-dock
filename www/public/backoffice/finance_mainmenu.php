<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
	<tr>
		<td width="5%" valign="top">&nbsp;</td>
		<td width="95%" align="left" valign="top">

			<table border="0" cellspacing="0" cellpadding="0" width="1260">
				<tr>
					<td  valign="top" colspan="3"><img src="images/sysadmin.gif" border="0" align="absmiddle" /><FONT SIZE="+2" ><B>����Թ Finance</B></FONT><br /><br />
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
					
					  	 <tr>
						<td width="16%" align="right"><img src="images/9_37s.gif" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=28">��§ҹ��ػ�ͺ��è���</a></td>
					  </tr>	
                       
                      <tr>
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=34">��§ҹ��ػ�ͺ���������</a></td>
                      </tr>
					   <tr>
                        <td width="16%" align="right"><img src="images/10_11_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=36">��Ҥ���¡ vip� �¡ ��Ҥ��</a></td>
                      </tr>
					    <tr>
						<td width="16%" align="right"><img src="./images/exec.gif" width="24" height="24">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./sell_print_uidp.php" target="_blank">��§ҹ����Ѻ�����Թ��Ш��ѹ  (�¡����ҹ�������л�������ê��� �¡�Ң�)</a></td>
					  </tr>
                      
					  <tr>
						<td width="16%" align="right"><img src="./images/6_11.gif" width="25" height="25" border="0">&nbsp;&nbsp;</td>
						<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=18">��§ҹ��è����Թ (�ѵ��ôԵ��Թ�͹)</a></td>
					  </tr>

					  <tr>
                        <td width="16%" align="right"><img src="images/inv_s.gif" />&nbsp;&nbsp;</td>
                        <td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2828">���. 3</a></td>
                      </tr>
					
					</table>
				</td>
				  <td width="392" valign="top"></td>
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

			 case 2:
				?>
				<legend>
		           	<strong><font color="#666666">�ѹ�֡�鹷ع�Թ���&nbsp;&nbsp;</font></strong>
                   <!--	<? if($acc->isAccess(1)){?>
               	   	<img border="0" src="./images/add.gif" alt="�����������Թ���" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=1&state=2'>�����Թ���</a>
                   <? }?>    -->          
				</legend>
				<?
				include("member_finance.php");
				break;
			 case 28:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�ͺ��è���</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cmbonus_comsn.php");
				break;
			 case 34:
				?>

				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�ͺ���������</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cc_comsn.php");
				break;
			 case 1:
				?>
				<legend>
		           	<strong><font color="#666666">�ѹ�֡�鹷ع�Թ���&nbsp;&nbsp;</font></strong>
                   <!--	<? if($acc->isAccess(1)){?>
               	   	<img border="0" src="./images/add.gif" alt="�����������Թ���" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=1&state=2'>�����Թ���</a>
                   <? }?>    -->          
				</legend>
				<?
				include("product.php");
				break;
			 case 7:
				?>
				<legend>
       			    <strong><font color="#666666">�ʹ��������ٹ��</font></strong>
                </legend>
				<?
				include("product_sale_amount.php");
				break;

			 case 60:
				?>
				<legend> <strong><font color="#666666">���Թ�������к�</font></strong>
				<? if($acc->isAccess(1)){?>
				<img border="0" src="./images/add.gif" alt="��������Ѻ�Թ������ [Ẻ�Դ���]" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=60&state=2'>��������Ѻ�Թ������ [Ẻ�Դ���]</a>
				<? }?>
				</legend>
				<?
				include("import_stockbill.php");
				break;
			 case 2828:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�ͺ��è��� ���. 3</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cmbonus_comsn_3.php");
				break;
			case 36:
				?>
				<legend>
		           <strong><font color="#666666">��Ҥ���¡ vip� �¡ ��Ҥ��</font></strong></legend>
				<?
				include("./comsn/com_c/packfile.php");
				break;
			case 18:
				?>
				<legend>
       			    <strong><font color="#666666">��§ҹ��è����Թ (�ѵ��ôԵ��Թ�͹)</font></strong>
                </legend>
				<?
				include("sale_bill_total.php");
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


