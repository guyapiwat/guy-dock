	<script language="javascript" type="text/javascript">
	var wi=null;
    function get_mem_listpicker_invcode(){
		if (wi) wi.close();
		//alert(this.getElementById('mcode_acc_name').innerHTML);
		wi=window.open("invref_listpicker.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	}
    </script>
<?
	if($_GET['uid']){
		//echo "--".$_GET['uid'];
		$sql = "SELECT * FROM ".$dbprefix."user WHERE uid='".$_GET['uid']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">��辺�����ŵ�����͹�</font></td></tr><tr>
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=5&sub=7';">�˹�Ң����ż�����к�</a>]</td></tr></table><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$uid=$row->uid;
			$oid=$row->uid;
			$usercode=$row->usercode;
			$username=$row->username;
			$password=DecodePwd($row->password);
			$inv_ref=$row->inv_ref;
			$object1=$row->object1;
			$object2=$row->object2;
			$object3=$row->object3;
			$object4=$row->object4;
			$object5=$row->object5;
		}
	}else{
			$uid="";
			$oid="";
			$usercode="";
			$username="";
			$password="";
			$inv_ref="";
			$object1="";
			$object2="";
			$object3="";
			$object4="";
			$object5="";
	}
?>		<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
		<form method="post" name="frm" action="syscomm_operate.php?state=<?=$_GET['uid']==""?0:1?>">
	<input type="hidden" name="oid" value="<?=$oid?>">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
      
      <tr>
        <td colspan="2" valign="top" ><fieldset>
          <legend><b>������͡��äӹǳ</b></legend><br />
          <table width="400" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#CCCCCC" align="center">
              <td colspan="2">������͡��äӹǳ</td>
              <td width="80">�Դ��ҹ</td>
              <td width="20">�Դ</td>
            </tr>
            <tr align="center">
              <td colspan="2"><div align="left">1. ����й� (Inviting Bonus) </div></td>
              <td><input name="FStart" type="radio" value="FStart"></td>
              <td><input name="FStart" type="radio" value="FStart"></td>
            </tr>
            <tr align="center">
              <td colspan="2"><div align="left">2. ��ҵͺ᷹�ҡ������ (Sales Team Bonus) </div></td>
              <td><input name="Bi" type="radio" value="Bi"></td>
              <td><input name="Bi" type="radio" value="Bi"></td>
            </tr>
            <tr align="center">
              <td colspan="2"><div align="left">3. ���᷹�ҡ��þѲ�ҷ����� (Sales Volume Bonus) </div></td>
              <td><input name="Ws" type="radio" value="Ws"></td>
              <td><input name="Ws" type="radio" value="Ws"></td>
            </tr>
            <tr align="center">
              <td colspan="2"><div align="left">4. ������ (Matching Bonus) </div></td>
              <td><input name="Ti" type="radio" value="Ti"></td>
              <td><input name="Ti" type="radio" value="Ti"></td>
            </tr>
            <!--tr align="center">
              <td colspan="2"><div align="left">5. �ٹ������ (Unilevel)</div></td>
              <td><input name="Uni" type="radio" value="Uni"></td>
              <td><input name="Uni" type="radio" value="Uni"></td>
            </tr>
            <tr align="center">
              <td colspan="2"><div align="left">6. ������ (Matching)</div></td>
              <td><input name="Mc" type="radio" value="Mc"></td>
              <td><input name="Mc" type="radio" value="Mc"></td>
            </tr-->
            
          </table>
       <br /></fieldset></td>
      </tr>
      <!--tr> 
    <td width="34%" valign="top" align="right" >&nbsp;</td>
    <td width="21%" align="left">&nbsp; �����Ŷ١��ͧ <font color="#ff0000">*</font>&nbsp;&nbsp; <input type="checkbox" name="C1" value="ok"></td>
    <td width="45%">&nbsp;</td>
    </tr-->
      <tr>
        <td width="34%" align="right" valign="top" >&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td width="34%" align="right" valign="top" >&nbsp;</td>
        <td colspan="2">&nbsp;
            <input type="submit" value="�ѹ�֡" name="B1" />
          &nbsp;
            <input type="reset" value="¡��ԡ" name="B2" /></td>
      </tr>
    </table>
</form>