<SCRIPT language=Javascript1.2>
function Validate(form) {
	 	if (form.groupname.value == "")
		{ alert("��س��������š�����Թ���!"); form.groupname.focus(); return; }
	form.submit()
} 
</SCRIPT>
<?
	if($_GET['id']){
		//echo "--".$_GET['uid'];
		$sql = "SELECT * FROM ".$dbprefix."productgroup WHERE id='".$_GET['id']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">��辺�����ŵ�����͹�</font></td></tr><tr>
		</tr></table><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			$groupname=$row->groupname;
		}
	}else{
			$id="";
			$groupname="";
	}
?>		
		<form method="post" action="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$_GET['sub']?>&state=3&operate=<?=$_GET['id']==""?0:1?>">
	<input type="hidden" name="oid" value="<?=$id?>">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
      <tr>
        <td colspan="2" align="center"><fieldset>
        <legend><b>��������Ǵ�����Թ���</b></legend>
        <table align="center"><tr>
              <td width="34%" align="right" valign="top" >������Թ��� <font color="#ff0000">*</font></td>
              <td colspan="2">&nbsp;<input type="text" name="groupname" id="groupname" value="<?=$groupname?>" /></td>
          </tr></table>
        	<hr width="50%" /><font color="#808080"><u>�����˵�</u></font> <font color="#ff0000">*</font><font color="#808080">=���繵�ͧ��͡������</font> 
        </fieldset></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr>
        <td width="34%" align="right" valign="top" >&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td width="34%" align="right" valign="top" >&nbsp;</td>
        <td colspan="2">&nbsp;
            <input onclick=Validate(form) type=button value="�ѹ�֡" name="B1" />
          &nbsp;
            <input type="reset" value="¡��ԡ" name="B2" /></td>
      </tr>
    </table>
</form>