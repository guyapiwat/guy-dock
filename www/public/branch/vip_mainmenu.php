<?
	if(!isset($_GET['sub'])){
?>
<table border="0" cellspacing="0" cellpadding="0" width="100%" height="395">
<tr>
<td width="5%" valign="top" >&nbsp;</td>
<td width="87%" align="left" valign="top" >
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr>
	<td  valign="top" colspan="2"><img src="./images/vip.gif" border="0" align="absmiddle" /><FONT SIZE="+2" ><B>VIP</B></FONT><br />
	  <br />
<tr >
<td width="50%" height="28"><img src="./images/user.gif" width="32" height="32" align="absmiddle">&nbsp;<? echo  "<strong>���ʼ���� :</strong> ".$_SESSION["adminusercode"]." <strong>���ͼ���� :</strong> ".$_SESSION["adminusername"]."<br /><br />";?> </td>
	<td width="50%" align="right">&nbsp;	</td>
</tr>
<tr><td valign="top">
	<table width="95%" border="1" bordercolor="#FF7F00" cellSpacing="0" cellPadding="0" >
	  <tr>
		<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
		</tr>
		 <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%">&nbsp;</td>
	  </tr>
	  <tr>
		<td width="16%" align="right"><img src="./images/pos_s.gif" width="24" height="24">&nbsp;&nbsp;</td>
		<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=1">��Ҫԡ��Т����ŵ��˹�</a></td>
	  </tr>
	<!--  <tr>
		<td width="16%" align="right"><img src="./images/point_s.gif" width="24" height="24">&nbsp;&nbsp;</td>
		<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=2">����ṹ��Ҫԡ</a></td>
	  </tr>
	  <tr>
		<td width="16%" align="right"><img src="./images/Animp.gif" width="19" height="18">&nbsp;&nbsp;</td>
		<td width="84%"><a href="./index.php?sessiontab=<?=$sesstab?>&sub=4">��ѺʶҹС���ѡ���ʹ�ͧ��Ҫԡ</a></td>
	  </tr>-->
	  <tr>
		<td width="16%">&nbsp;</td>
		<td width="84%">&nbsp;</td>
	  </tr>
	</table>
</td>
 <!-- <td valign="top">
	  <table width="90%" border="1" bordercolor="#FF7F00" cellSpacing="0" cellPadding="0" >
			  <tr>
				<td colspan="2"  background="./images/bar_box.gif">&nbsp;</td>
				</tr>
				 <tr>
				<td width="16%">&nbsp;</td>
				<td width="84%">&nbsp;</td>
			  </tr>
			  <tr>
				<td width="16%" align="right"><img src="./images/folder.gif" align="absmiddle">&nbsp;&nbsp;</td>
				<td width="84%"><strong>��§ҹ</strong></td>
			  </tr>
			  <tr>
				<td width="16%" align="right">&nbsp;</td>
				<td width="84%"><img src="./images/report_s.gif" align="absmiddle" />&nbsp;&nbsp;<a href="./index.php?sessiontab=<?=$sesstab?>&sub=3">��ػ ��ṹ������Ѻ��Ҫԡ (vip) </A></td>
			  </tr>
			  
			  <tr>
				<td width="16%">&nbsp;</td>
				<td width="84%">&nbsp;</td>
			  </tr>
			  </table>
  </td>-->
</tr>
</table>
<br>
<br></td>
<td width="8%"></td>
</tr>
</table>


<?
	}else{
?>
<table border="0" height="395" width="99%"><tr valign="top">
<td width="50">
<? $hl = "style='border:inset 1 #FF9933;'"; ?>
<a href="javascript:history.back()"><img border="0" src="./images/back.gif" height="40" width="40" alt="������Ҫԡ" /></a>
<a <?=($_GET['sub']==1?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=1"><img border="0" src="./images/pos.gif" height="40" width="40" alt="���˹�" /></a>
<a <?=($_GET['sub']==2?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=2"><img border="0" src="./images/point.gif" height="40" width="40" alt="��ṹ" /></a>
<a <?=($_GET['sub']==3?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=3"><img border="0" src="./images/report.gif" height="40" width="40" alt="��§ҹ��Ҫԡ vip" /></a>
<a <?=($_GET['sub']==4?$hl:"")?> href="./index.php?sessiontab=<?=$sesstab?>&sub=4"><img border="0" src="./images/report.gif" height="40" width="40" alt="��ѺʶҹС���ѡ���ʹ�ͧ��Ҫԡ" /></a>
</td>
<td align="left" width="100%">
<fieldset>
<?
		switch($_GET['sub']){
			case 1:
				?><legend><strong><font color="#666666">���˹�</font></strong></legend><?
				include("./member_pos.php");
				break;
			case 2:
				?><legend><strong><font color="#666666">��ṹ</font></strong></legend><?
				include("./special_vip_point.php");
				break;
			case 3:
				?><legend>
				      <strong><font color="#666666">��§ҹ��Ҫԡ vip</font></strong>
					    <img border="0" src="./images/add.gif" alt="������ṹ��Ҫԡ" align="absmiddle" width="16" height="16" />&nbsp;&nbsp;<a href='./index.php?sessiontab=<?=$sesstab?>&sub=2'>������ṹ��Ҫԡ</a>
					 </legend><?
				include("./special_vip_report.php");
				break;
			case 4:
				?><legend><strong><font color="#666666">��ѺʶҹС���ѡ���ʹ�ͧ��Ҫԡ</font></strong></legend><?
				include("./mypv.php");
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
