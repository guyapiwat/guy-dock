<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
<tr>
<td width="5%" valign="top" >&nbsp;</td>
<td width="87%" align="left" valign="top" >
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td  valign="top" colspan="2"><img src="./images/mem.gif" border="0" align="absmiddle" /><FONT SIZE="+2" ><B>����¹��Ҫԡ Member</B></FONT><br /><br />
<tr >
<td width="50%" height="28"><img src="./images/user.gif" width="32" height="32" align="absmiddle">&nbsp;<? echo  "<strong>���ʼ���� :</strong> ".$_SESSION["adminusercode"]." <strong>���ͼ���� :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
	<td width="50%" align="right">&nbsp;	</td>
</tr>
<tr ><td valign="top">
	<table width="95%" border="1" bordercolor="#0099CC" cellSpacing="0" cellPadding="0" >
	  <tr>
		<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
		</tr>
		 <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%">&nbsp;</td>
	  </tr>
	  <!--tr>
		<td width="16%" align="right"><img src="./images/Animp.gif" width="19" height="18">&nbsp;&nbsp;</td>
		<td width="84%"><a href="./mem_position_main.php">�����ŵ��˹���Ҫԡ</a></td>
	  </tr-->
	  <tr>
		<td width="16%" align="right"><img src="./images/mem_s.gif" width="24" height="24">&nbsp;&nbsp;</td>
		<td width="84%"><strong>��Ҫԡ</strong></td>
	  </tr> 
	  <tr  style="display:none" >
		<td width="16%" align="right">&nbsp;</td>
		<td width="84%"><img src="./images/add.gif" align="absmiddle" width=24 />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2&state=2">������Ҫԡ (��ѡ�ҹ)</a></td>
	  </tr>	  <tr>
		<td width="16%" align="right">&nbsp;</td>
		<td width="84%"><img src="./images/Animp.gif" align="absmiddle" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">��ª�����Ҫԡ������</a></td>
	  </tr>
	  <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%"><img src="./images/upa_s.gif" align="absmiddle" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">Ἱ������§ҹ�Ѿ�Ź�</a></td>
	  </tr>
	  <tr>
        <td width="16%">&nbsp;</td>
        <td width="84%"><img src="./images/sp_s.gif" align="absmiddle" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=5">Ἱ������§ҹ����й�</a></td>
      </tr>
	<tr >
		<td width="16%" align="right">&nbsp;</td>
		<td width="84%"><img src="./images/treespsmall.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=26">��§ҹ�Ѿ�Ź�</a></td>
    </tr>
   <tr  >
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/treespsmall.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=23">��§ҹ����й�</a></td>
  </tr>
	  <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%">&nbsp;</td>
	  </tr>
	</table>
</td><td valign="top"><table width="95%" border="1"  bordercolor="#0099CC" cellSpacing="0" cellPadding="0" >
  <tr>
    <td colspan="2" background="./images/bar_box.gif">&nbsp;</td>
    </tr>
	 <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%">&nbsp;</td>
	  </tr>
  <tr>
    <td width="16%" align="right"><img src="./images/folder.gif">&nbsp;&nbsp;</td>
    <td width="84%"><strong>��§ҹ</strong></td>
  </tr>
  <!--tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/ICREPLY.GIF">&nbsp;<A HREF="./rep_mem_team_a_lev.php">��§ҹ�ʴ�����ҹ����Ъ�� Ἱ 1 (�ù����)</A></td>
  </tr>
  <tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/ICREPLY.GIF">&nbsp;<A HREF="./rep_mem_tree_b.php">�ʴ�����ҹẺ����� Ἱb(matching)</A></td>
  </tr>
  <tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/ICREPLY.GIF">&nbsp;<A HREF="./rep_mem_team_b_lev.php">�ʴ�����ҹ����Ъ�� Ἱb(matching)</A></td>
  </tr>
  <tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/ICREPLY.GIF">&nbsp;<A HREF="./rep_mem_children_b.php">�١����Դ�����Ҫԡ Ἱb(matching)</A></td>
  </tr-->
  <tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/bank_account_s.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=101">��§ҹ�͡��á����Ѥ�</A></td>
  </tr>
  <tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/bank_account_s.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=10">��Ҫԡ��Т����źѭ�� ��Ҥ��</A></td>
  </tr>
  <tr>
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/letter_s.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=11">����������������觨�����</A></td>
  </tr>
 <tr style="display:none">
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/letter_s.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=21">����������Ѥ�����</A></td>
  </tr>
  <tr style="display:none">
    <td width="16%" align="right">&nbsp;</td>
    <td width="84%"><img src="./images/letter_s.gif" align="absmiddle" />&nbsp;<A HREF="./index.php?sessiontab=<?=$sesstab?>&sub=21&stype=2">��������������</A></td>
  </tr>
  <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%"><img src="./images/noup_s.gif" align="absmiddle" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">��Ҫԡ���������Ѿ�Ź�</a></td>
	  </tr>
  <tr>
	<td width="16%">&nbsp;</td>
	<td width="84%"><img src="./images/nosp_s.gif" align="absmiddle" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">��Ҫԡ�������ռ���й� </a></td>
  </tr>
  <tr style="display:none">
                <td  align="right">&nbsp;</td>
                <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=36">SMS Commission </a></td>
              </tr>
	<tr   style="display:none">
    <td align="right">&nbsp;</td>
    <td><img src="./images/Animp.gif" align="absmiddle" />&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=19">Report SMS </a></td>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
  </tr>
</table>
</td></tr>
</table>
<br>
<br></td>
<td width="8%"></td>
</tr>
</table>


<?
	}else{
?>
<table border="0" height="395"  width="99%"><tr valign="top">
<td width="50">
<? $hl = "style='border:inset 1 #FF9933;'"; ?>
<a href="javascript:history.back()"><img border="0" src="./images/back.gif" height="40" width="40" alt="������Ҫԡ" /></a>
<a <?=($_GET['sub']==2?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=2"><img border="0" src="./images/users.gif" height="40" width="40" alt="��ª�����Ҫԡ" title="��ª�����Ҫԡ"/></a>
<a <?=($_GET['sub']==10?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=10"><img border="0" src="./images/bank_account.gif" height="40" width="40" alt="�����Ÿ�Ҥ�âͧ��Ҫԡ" title="�����Ÿ�Ҥ�âͧ��Ҫԡ" /></a>
<a <?=($_GET['sub']==11?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=11"><img border="0" src="./images/letter.gif" height="40" width="40" alt="�����ŷ������ͧ��Ҫԡ" title="�����ŷ������ͧ��Ҫԡ" /></a>
<a <?=($_GET['sub']==4?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=4"><img border="0" src="./images/upa.gif" height="40" width="40" alt="Ἱ������§ҹ��Ҫԡ" /></a>
<a <?=($_GET['sub']==5?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=5"><img border="0" src="./images/sp.gif" height="40" width="40" alt="Ἱ������§ҹ����й�" title="Ἱ������§ҹ����й�" /></a>
<a <?=($_GET['sub']==6?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=6"><img border="0" src="./images/noup.gif" height="40" width="40" alt="��Ҫԡ���������Ѿ�Ź�" /></a>
<a <?=($_GET['sub']==7?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=7"><img border="0" src="./images/nosp.gif" height="40" width="40" alt="��Ҫԡ�������ռ���й�" title="��Ҫԡ�������ռ���й�" /></a></td>
<td align="left" width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			case 2:
				?>
				<legend>
		           <strong><font color="#666666">��������Ҫԡ&nbsp;&nbsp;</font></strong>
				   <? if($acc->isAccess(1)){?>
                   
                   &nbsp;&nbsp;<a href='./index.php?sessiontab=1&sub=2&state=2' style="display:none" >������Ҫԡ</a>  
                   <? }?>              
                </legend>
				<?
				include("./member.php");
				break;
			case 4:
				?><legend><strong><font color="#666666">Ἱ������§ҹ�Ѿ�Ź�</font></strong></legend><?
				include("./mem_chart_f3c.php");
				break;
			case 5:
                ?><legend><strong><font color="#666666">Ἱ������§ҹ����й�</font></strong></legend><?
                include("./mem_chart_stairstep.php");
                break;
            case 55:
				?><legend><strong><font color="#666666">Ἱ������§ҹ�Ѿ�Ź�</font></strong></legend><?
				include("./mem_chart_stairstep2.php");
				break;
			case 6:
				?><legend><strong><font color="#666666">��������Ҫԡ ������Ѿ�Ź� </font></strong></legend><?
				include("rep_mem_no_upa_code.php");
				break;
			case 7:
				?><legend><strong><font color="#666666"> ��������Ҫԡ  ����ռ���й�</font></strong></legend><?
				include("rep_mem_no_sp_code.php");
				break;
			case 8:
				?><legend><strong><font color="#666666">Ἱ���Ե����ͧ��Ҫԡ</font></strong></legend><?
				include("mem_chart_tree.php");
				break;
			case 9:
                ?><legend><strong><font color="#666666">Ἱ���Ե����ͧ����й�</font></strong></legend><?
                include("mem_chart_tree_sp.php");
                break;
            case 99:
				?><legend><strong><font color="#666666">Ἱ���Ե����ͧ�Ѿ�Ź�</font></strong></legend><?
				include("mem_chart_tree_sp2.php");
				break;
			case 10:
				?><legend><strong><font color="#666666">�����Ÿ�Ҥ�âͧ��Ҫԡ</font></strong></legend><?
				include("member_bank.php");
				break;
			case 101:
				?><legend><strong><font color="#666666">��§ҹ�͡��á����Ѥ�</font></strong></legend><?
				include("member_doc.php");
				break;
			case 11:
				?><legend><strong><font color="#666666">�����ŷ������ͧ��Ҫԡ</font></strong></legend><?
				include("member_letter.php");
				break;
			case 15:
				?><legend><strong><font color="#666666">��������Ҫԡ��� SP �ç�ء���͹</font></strong></legend><?
				include("member_sp.php");
				break;
			case 16:
				?><legend><strong><font color="#666666">���µ���</font></strong></legend><?
				include("member_up.php");
				break;
			case 18:
				?><legend><strong><font color="#666666">SMS</font></strong></legend><?
				include("member_sms.php");
				break;
			case 36:
				?>
				<legend>
		           <strong><font color="#666666">SMS Commission</font></strong></legend>
				<?
				include("./comsn/com_c/packfile_sms.php");
				break;
			case 19:
				?><legend><strong><font color="#666666">Report SMS</font></strong></legend><?
				include("report_sms.php");
				break;
			case 20:
				?><legend><strong><font color="#666666">Member Reset Password</font></strong></legend><?
				include("member_reset.php");
				break;
			case 21:
				?><legend><strong><font color="#666666"><? if($_REQUEST["stype"] == '2')echo '��¡�������������'; else echo '��§ҹ����������Ѥ�����';?></font></strong></legend><?
				include("member_insure.php");
				break;
			case 22:
				?><legend><strong><font color="#666666">�Թ�յ�͹�Ѻ</font></strong></legend><?
				include("member_success.php");
				break;
            case 23:
                ?><legend><strong><font color="#666666">��§ҹ����й�</font></strong></legend><?
                include("team_list.php");
                break;			
            case 233:
				?><legend><strong><font color="#666666">��§ҹ�Ѿ�Ź�</font></strong></legend><?
				include("team_list2.php");
				break;
			case 24:
				?><legend><strong><font color="#666666">��§ҹ����ѵԤ�ṹ</font></strong></legend><?
				include("rep_all_fast_all_comsn.php");
				break;
			case 25:
				?>
				<legend>
		           <strong><font color="#666666">��ṹ pv �����ͧ��Ҫԡ&nbsp;&nbsp;</font></strong>
				           
                </legend>
				<?
				include("./member_pv.php");
				break;
			case 26:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ�Ѿ�Ź�</font></strong>
				           
                </legend>
				<?
				include("./team_list2.php");
				break;
			case 233:
				?><legend><strong><font color="#666666">��§ҹ��ṹ������� ����§ҹ</font></strong></legend><?
				include("binary_newpoint.php");
				break;
			case 771177:
				?><legend><strong><font color="#666666">��§ҹ��ṹ������� ����§ҹ</font></strong></legend><?
				include("test_bonus.php");
				break;
			case 28:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ Mobile Center</font></strong>
				           
                </legend>
				<?
				include("./rep_type_member.php");
				break;
			case 8001:
				$member = "";
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��������´��ṹ������</font></strong>
				           
                </legend>
				<?
				include("./floor_pv_all.php");
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
