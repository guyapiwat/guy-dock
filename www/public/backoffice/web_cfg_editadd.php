<SCRIPT language=Javascript1.2>
function Validate(form) {
	 	if (form.web_cfg.value == "")
		{ alert("��س������͸�Ҥ��!"); form.web_cfg.focus(); return; }
	form.submit()
} 
</SCRIPT>
<?
	if($_GET['cid']){
		//echo "--".$_GET['uid'];
		$sql = "SELECT * FROM ".$dbprefix."webcfg WHERE cid='".$_GET['cid']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">��辺�����ŵ�����͹�</font></td></tr><tr>
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=5&sub=7';">�˹�Ң����ż�����к�</a>]</td></tr></table><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$cid=$row->cid;
			$web_cfg=$row->web_cfg;
		}
	}else{
			$sql = "SELECT * FROM ".$dbprefix."webcfg LIMIT 1";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				$row = mysql_fetch_object($rs);
				$cid=$row->cid;
				$web_cfg=$row->web_cfg;
			}else{
				$cid="";
				$web_cfg="";
			}
	}
?>		
		<form method="post" action="web_cfgoperate.php?state=<?=$_GET['cid']==""?0:1?>">
	<input type="hidden" name="cid" value="<?=$cid?>">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
      <tr>
        <td colspan="2" align="center"><fieldset>
        <legend><b>���������䫵�</b></legend>
        <table align="center"><tr>
              <td width="34%" align="right" valign="top" >�������䫵� <font color="#ff0000">* Ex.  www.alisio.com</font></td>
              <td colspan="2">&nbsp;<input type="text" name="web_cfg" value="<?=$web_cfg?>" /></td>
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