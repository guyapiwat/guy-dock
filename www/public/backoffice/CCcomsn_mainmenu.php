<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
	<tr>
		<td width="5%">&nbsp;</td>
		<td width="95%" align="left" valign="top"><table border="0" cellspacing="4" cellpadding="0" width="90%">
          <tr>
            <td  valign="top" colspan="2"><img src="images/comsn.gif" align="absmiddle" border="0" /><font size="+2" ><b>����Ԫ��� Commission</b></font><br />
                <br /></td >
          </tr>
          <tr>
            <td height="28" width="50%"><img src="images/user.gif" width="32" height="32" align="absmiddle" />&nbsp;<? echo  "<strong>���ʼ���� :</strong> ".$_SESSION["adminusercode"]." <strong>���ͼ���� :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td width="50%" height="40"><table width="97%" border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" background="./images/bar_box.gif">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                  <td><strong>�ӹǳ亹����</strong></td>
                </tr>
                <tr>
                  <td width="16%"  align="right">&nbsp;</td>
                  <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=1">�������ͺ��äӹǳ亹����</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">�ӹǳ亹����</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=3">ź��äӹǳ亹����</a></td>
                </tr>
                <tr>
                  <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                  <td><strong>��§ҹ</strong></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">��§ҹ��������´��ṹ</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=5">��§ҹ��������´��èѺ���Ẻ亹����</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=6">��§ҹ��ػ����亹����</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=16">��§ҹ��è��¤����ʪ�蹼���й�</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=17">��§ҹ��ػ���¤���й�</a></td>
                </tr>                
                <tr>
                  <td colspan="2" >&nbsp;</td>
                </tr>
            </table></td>
			
            <td width="50%" height="50" valign="top">
<table width="97%" border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" background="./images/bar_box.gif">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                  <td><strong>�ӹǳ������</strong></td>
                </tr>
                <tr>
                  <td width="16%"  align="right">&nbsp;</td>
                  <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=7">�������ͺ��äӹǳ������</a></td>
                </tr> 
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=8">�ӹǳ������</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=9">ź��äӹǳ������</a></td>
                </tr>
                <tr>
                  <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                  <td><strong>��§ҹ</strong></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=10">��§ҹ��������´��ṹ������</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_summary_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=11">��§ҹ��������´������</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=12">��§ҹ��ػ����������</a></td>
                </tr>
                <tr>
                  <td colspan="2" >&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2" >&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2" >&nbsp;</td>
                </tr>                                
            </table>
 </td>
            
            
            
          </tr>
          <tr height=10>
          	<td></td>
          	<td></td>
          </tr>
	<tr>

            <td width="50%" height="28">
<table width="97%" border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" background="./images/bar_box.gif">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                  <td><strong>�ӹǳ�ٹ������</strong></td>
                </tr>
                <tr>
                  <td width="16%"  align="right">&nbsp;</td>
                  <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=18">�������ͺ��äӹǳ�ٹ������</a></td>
                </tr> 
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=19">�ӹǳ�ٹ������</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=20">ź��äӹǳ�ٹ������</a></td>
                </tr>
                <tr>
                  <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                  <td><strong>��§ҹ</strong></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=21">��§ҹ��������´��ṹ�ٹ������</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=22">��§ҹ��ػ�����ٹ������</a></td>
                </tr>
                <tr>
                  <td colspan="2" >&nbsp;</td>
                </tr>
            </table>
 </td>
            <td width="50%" height="28" valign="top">
 
<table width="97%" border="1" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="2" background="./images/bar_box.gif">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td align="right"><img src="./images/mon.gif" align="absmiddle"/>&nbsp;&nbsp;</td>
                  <td><strong>�ӹǳ�����ʪ�蹼���й�</strong></td>
                </tr>
                <tr>
                  <td width="16%"  align="right">&nbsp;</td>
                  <td width="84%"><img src="./images/round_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=13">�������ͺ��äӹǳ�����ʪ�蹼���й�</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/cal_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=14">�ӹǳ�����ʪ�蹼���й�</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/del_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=15">ź��äӹǳ�����ʪ�蹼���й�</a></td>
                </tr>
                <tr>
                  <td  align="right"><img src="./images/folder.gif" align="absmiddle" />&nbsp;&nbsp;</td>
                  <td><strong>��§ҹ</strong></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_detail_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=16">��§ҹ��è��¤����ʪ�蹼���й�</a></td>
                </tr>
                <tr>
                  <td  align="right">&nbsp;</td>
                  <td><img src="./images/rp_pay_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=17">��§ҹ��ػ���¤���й�</a></td>
                </tr>
                <tr>
                  <td colspan="2" >&nbsp;</td>
                </tr>
            </table>
     
            </td>			
			</tr>
            </table></td>
            <td width="50%" height="28"><table width="97%" border="0" bordercolor="#FF7F00" cellspacing="0" cellpadding="0">
            </td>
		  </tr>
		</table></td>
  </tr>
  </table>
<?
	}else{
?>
<table border="0" height="395"  width="99%"><tr valign="top">
<td width="50">
<a href="javascript:history.back()"><img border="0" src="./images/back.gif" height="40" width="40" alt="���٤���Ԫ���" /></a>
<? 	if(isset($_GET['sub']))
		$sub = $_GET['sub'];
	else if(isset($_POST['sub']))
		$sub = $_POST['sub'];
	$hl = "style='border:inset 1 #FF9933;'"; 
	if($sub>=1&&$sub<=6 || ($sub>=16 && $sub<=17)){		
?>

<a <?=($_GET['sub']==1?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=1"><img border="0" src="./images/round_b.gif" height="40" width="40" alt="�������ͺ��äӹǳ亹����" /></a>
<a <?=($_GET['sub']==2?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=2"><img border="0" src="./images/cal_b.gif" height="40" width="40" alt="�ӹǳ亹����" /></a>
<a <?=($_GET['sub']==3?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=3"><img border="0" src="./images/del_b.gif" height="40" width="40" alt="ź��äӹǳ亹����" /></a>
<a <?=($_GET['sub']==4?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=4"><img border="0" src="./images/rp_detail.gif" height="40" width="40" alt="��§ҹ��������´��ṹ" /></a>
<a <?=($_GET['sub']==5?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=5"><img border="0" src="./images/rp_detail.gif" height="40" width="40" alt="��§ҹ��������´��èѺ���Ẻ亹����" /></a>
<a <?=($_GET['sub']==6?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=6"><img border="0" src="./images/rp_detail.gif" height="40" width="40" alt="��§ҹ��ػ����亹����" /></a>
<a <?=($_GET['sub']==16?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=16"><img border="0" src="./images/rp_detail.gif" height="40" width="40" alt="��§ҹ��������´��è��¼���й�" /></a> 
<a <?=($_GET['sub']==17?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=17"><img border="0" src="./images/rp_detail.gif" height="40" width="40" alt="��§ҹ��ػ���¼���й�" /></a>

<? }else if($sub>=7&&$sub<=12){?>
<a <?=($_GET['sub']==7?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=7"><img border="0" src="./images/round_b.gif" height="40" width="40" alt="�������ͺ��äӹǳ������" /></a>
<a <?=($_GET['sub']==8?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=8"><img border="0" src="./images/cal_b.gif" height="40" width="40" alt="�ӹǳ������" /></a>
<a <?=($_GET['sub']==9?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=9"><img border="0" src="./images/del_b.gif" height="40" width="40" alt="ź��äӹǳ������" /></a>
<a <?=($_GET['sub']==10?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=10"><img border="0" src="./images/rp_detail.gif" height="40" width="40" alt="��§ҹ��������´��ṹ������" /></a>
<a <?=($_GET['sub']==11?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=11"><img border="0" src="./images/rp_summary.gif" height="40" width="40" alt="��§ҹ��ػ������⺹��" /></a>
<a <?=($_GET['sub']==12?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=12"><img border="0" src="./images/rp_pay.gif" height="40" width="40" alt="��§ҹ��ػ����������⺹��" /></a>
<?  }elseif($sub>=13&&$sub<=17){	 ?>

<a <?=($_GET['sub']==13?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=13"><img border="0" src="./images/round_b.gif" height="40" width="40" alt="�������ͺ��äӹǳ����й�" /></a>
<a <?=($_GET['sub']==14?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=14"><img border="0" src="./images/cal_b.gif" height="40" width="40" alt="�ӹǳ���¼���й�" /></a>
<a <?=($_GET['sub']==15?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=15"><img border="0" src="./images/del_b.gif" height="40" width="40" alt="ź��äӹǳ��è��¼���й�" /></a>
<a <?=($_GET['sub']==16?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=16"><img border="0" src="./images/rp_summary.gif" height="40" width="40" alt="��§ҹ��������´��è��¼���й�" /></a> 
<a <?=($_GET['sub']==17?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=17"><img border="0" src="./images/rp_pay.gif" height="40" width="40" alt="��§ҹ��ػ���¼���й�" /></a>

<? }elseif($sub>=18&&$sub<=22){	 ?>
<a <?=($_GET['sub']==18?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=18"><img border="0" src="./images/round_b.gif" height="40" width="40" alt="�������ͺ��äӹǳ�ٹ������" /></a>  
<a <?=($_GET['sub']==19?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=19"><img border="0" src="./images/cal_b.gif" height="40" width="40" alt="�ӹǳ�ٹ������" /></a>  
<a <?=($_GET['sub']==20?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=20"><img border="0" src="./images/del_b.gif" height="40" width="40" alt="ź��äӹǳ�ٹ������" /></a>  
<a <?=($_GET['sub']==21?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=21"><img border="0" src="./images/rp_summary.gif" height="40" width="40" alt="��§ҹ��������´��ṹ�ٹ������" /></a>  
<a <?=($_GET['sub']==22?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=22"><img border="0" src="./images/rp_pay.gif" height="40" width="40" alt="��§ҹ��ػ��ṹ�ٹ������" /></a>  
<? } ?>
</td>
<td align="left" width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			case 1:
				?>
				<legend>
		           <strong><font color="#666666">�������ͺ��äӹǳ亹����&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="�����������ͺ��äӹǳ亹����" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=1&state=2'>�����������ͺ��äӹǳ亹����</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_a/around.php");
				break;
			case 2:
				?>
				<legend>
		           <strong><font color="#666666">�ӹǳ亹����</font></strong></legend>
				<?
				include("./comsn/com_a/comsn_a_calc.php");
				break;
			case 3:
				?>
				<legend>
		           <strong><font color="#666666">ź��äӹǳ亹����</font></strong></legend>
				<?
				include("./comsn/com_a/comsn_a_delete.php");
				break;
			case 4:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��������´��ṹ</font></strong></legend>
				<?
				include("./comsn/com_a/rep_ad_comsn.php");
				break;
			case 5:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��������´��èѺ���Ẻ亹����</font></strong></legend>
				<?
				include("./comsn/com_a/rep_ambonus_comsn.php");
				break;
			case 6:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ����亹����</font></strong></legend>
				<?
				include("./comsn/com_a/rep_apay_comsn.php");
				break;
			case 7:
				?>
				<legend>
		           <strong><font color="#666666">�������ͺ��äӹǳ������&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="�����������ͺ��äӹǳ������" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=7&state=2'>�����������ͺ��äӹǳ������</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_b/bround.php");
				break;
			case 8:
				?>
				<legend>
		           <strong><font color="#666666">�ӹǳ������</font></strong></legend>
				<?
				include("./comsn/com_b/comsn_b_calc.php");
				break;
			case 9:
				?>
				<legend>
		           <strong><font color="#666666">ź��äӹǳ������</font></strong></legend>
				<?
				include("./comsn/com_b/comsn_b_delete.php");
				break;
			case 10:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��������´��ṹ������</font></strong></legend>
				<?
				include("./comsn/com_b/rep_bm_comsn.php");
				break;
			case 11:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ������⺹ѷ</font></strong></legend>
				<?
				include("./comsn/com_b/rep_bmbonus_comsn.php");
				break;
			case 12:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ����������⺹ѷ</font></strong></legend>
				<?
				include("./comsn/com_b/rep_bpay_comsn.php");
				break;
			case 14:
				?>
				<legend>
		           <strong><font color="#666666">�ӹǳ����Ԫ��蹼���й�</font></strong></legend>
				<?
				include("./comsn/com_c/comsn_c_calc.php");
				break;
			case 15:
				?>
				<legend>
		           <strong><font color="#666666">ź��äӹǳ����Ԫ��蹼���й�</font></strong></legend>
				<?
				include("./comsn/com_c/comsn_c_delete.php");
				break;
			case 16:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��������´����Ԫ���������й�</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cmbonus_comsn.php");
				break;
			case 17:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ���¼���й�</font></strong></legend>
				<?
				include("./comsn/com_c/rep_cpay_comsn.php");
				break;
			case 18:
				?>
				<legend>
		           <strong><font color="#666666">�ͺ�ӹǳ�ٹ������</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="�����������ͺ��äӹǳ�ٹ������" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=18&state=2'>�����������ͺ��äӹǳ�ٹ������</a>
                   <? }?>
				</legend>

				<?
				include("./comsn/com_d/dround.php");
				break;
			case 19:
				?>
				<legend>
		           <strong><font color="#666666">�ӹǳ�ٹ������</font></strong></legend>
				<?
				include("./comsn/com_d/comsn_d_calc.php");
				break;
			case 20:
				?>
				<legend>
		           <strong><font color="#666666">ź��äӹǳ�ٹ������</font></strong></legend>
				<?
				include("./comsn/com_d/comsn_d_delete.php");
				break;
			case 21:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��������´����Ԫ����ٹ������</font></strong></legend>
				<?
				include("./comsn/com_d/rep_dmbonus_comsn.php");
				break;
			case 22:
				?>
				<legend>
		           <strong><font color="#666666">��§ҹ��ػ�����ٹ������</font></strong></legend>
				<?
				include("./comsn/com_d/rep_dpay_comsn.php");
				break;
			case 13:
				?>
				<legend>
		           <strong><font color="#666666">�������ͺ��äӹǳ����Ԫ���������й�&nbsp;&nbsp;</font></strong>
                   <? if($acc->isAccess(2)){?>
                   <img border="0" src="./images/add.gif" alt="�����������ͺ��äӹǳ����Ԫ���������й�" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=4&sub=13&state=2'>�����������ͺ��äӹǳ����Ԫ���������й�</a>
                   <? }?>
                </legend>
				<?
				include("./comsn/com_c/cround.php");
				break;
				
			}
?>
</fieldset></td>
</tr></table>
<?
	}
?>
