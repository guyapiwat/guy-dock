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
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=5&sub=4';">�˹�Ң����ż�����к�</a>]</td></tr></table><?
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
?>		
		<form method="post" name="frm" action="sysuseroperate.php?state=<?=$_GET['uid']==""?0:1?>">
	<input type="hidden" name="oid" value="<?=$oid?>">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
      <tr>
        <td colspan="2" align="center"><fieldset>
        <legend><b>�����ż���������</b></legend>
        <table align="center"><tr>
              <td width="34%" align="right" valign="top" >���ʼ���� <font color="#ff0000">*</font></td>
              <td colspan="2">&nbsp;<input type="text" name="usercode" size="10" maxlength="10" value="<?=$usercode?>" /> &nbsp;��͡���ʼ���� ex. 999 &nbsp; </td>
          </tr><tr>
              <td width="34%" align="right" valign="top" >���ͼ���� <font color="#ff0000">*</font></td>
              <td colspan="2">&nbsp;<input type="text" name="username" size="10" maxlength="10" value="<?=$username?>" /> &nbsp;��͡���ͼ���� </td>
          </tr><tr>
              <td width="34%" align="right" valign="top" >���ʼ�ҹ <font color="#ff0000">*</font></td>
              <td colspan="2">&nbsp;<input type="text" name="password" size="10" maxlength="8" value="<?=$password?>" /> &nbsp;��͡���ʼ�ҹ </td>
        </tr><tr>
              <td width="34%" align="right" valign="top" >�Ң���ҧ�ԧ <font color="#ff0000">*</font></td>
            <td colspan="2">&nbsp;<input style="background-color:#FFFF99" readonly type="text" name="inv_ref" size="10" maxlength="8" value="<?=$inv_ref?>" /> 
            <input type="button" onClick="get_mem_listpicker_invcode()" value="���͡"></td>
        </tr></table>
        	<hr width="50%" /><font color="#808080"><u>�����˵�</u></font> <font color="#ff0000">*</font><font color="#808080">=���繵�ͧ��͡������</font> 
        </fieldset></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr>
        <td colspan="3" valign="top" ><fieldset>
          <legend><b>�Է�ԡ����ҹ�����</b></legend><br />
          <table border="1" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#CCCCCC" align="center">
              <td colspan="2">����</td>
              <td>��</td>
              <td>����</td>
              <td>���</td>
              <td>ź</td>
            </tr>
            <? 
			  $obj = array($object1,$object2,$object3,$object4,$object5);
			  $objdef = array("��Ҫԡ","vip","���","����Ԫ���","�������к�");
			  for($i=0;$i<5;$i++){
            	echo "<tr>";
              	echo "<td><!--input type='checkbox' name='object".($i+1)."' value='1' ".($obj[$i]>0?"checked":"")."/--></td>";
              	echo "<td>$objdef[$i]</td>";
			 	$acc->calc($obj[$i]);
              		foreach(array_keys($acc->getAllAccess()) as $key){
              			echo "<td width='50' align='center'><input type='checkbox' name='accobj".($i+1).$key."' value='$key' ".($acc->isAccess($key)==true?"checked":"")." /></td>";
              		}
           		echo "</tr>";
			  }
            
            ?>
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