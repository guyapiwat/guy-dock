	<script language="javascript" type="text/javascript">
	var wi=null;
    function get_mem_listpicker_invcode(){
		if (wi) wi.close();
		//alert(this.getElementById('mcode_acc_name').innerHTML);
		wi=window.open("invref_listpicker.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	}
		function get_mem_listpicker_mcode(){
		if (wi) wi.close();
		//alert(this.getElementById('mcode_acc_name').innerHTML);
		wi=window.open("mem_listpicker_mcode.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	}
    </script>
<?
	if($_GET['id']){
		//echo "--".$_GET['uid'];
		$sql = "SELECT * FROM ".$dbprefix."payment_type where id='".$_GET['id']."' LIMIT 1";
		
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">��辺�����ŵ�����͹�</font></td></tr><tr>
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=5&sub=4';">�˹�Ң����ż�����к�</a>]</td></tr></table><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$uid=$row->id;
			$oid=$row->id;
			$pay_name=$row->pay_name;
			$pay_type=$row->pay_type;
			$pay_desc=$row->pay_desc;
			$status=$row->status;
			$mapping_code=$row->mapping_code;
			$inv_ref=$row->inv_ref;
		}
	}else{
			$uid="";
			$oid="";
			$pay_name="";
			$pay_type="";
			$pay_desc="";
			$inv_code="";
			$mapping_code="";
			$inv_ref="";
			$status="1";
	}
?>		
		<form method="post" name="frm" id="frm" action="payment_type_operate.php?state=<?=$_GET['id']==""?0:1?>">
	<input type="hidden" name="oid" id="oid" value="<?=$oid?>">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
      <tr>
        <td colspan="2" align="center"><fieldset>
        <legend><b>�����š�ê����Թ�����Ң�</b></legend>
        <table align="center"><tr>
              <td width="34%" align="right" valign="top" >���͡�ê����Թ <font color="#ff0000">*</font></td>
              <td colspan="2" nowrap>&nbsp;<input type="text" name="pay_name" id="pay_name" size="30" value="<?=$pay_name?>" />  </td>
          </tr><tr>
              <td width="34%" align="right" valign="top" >��Դ��ê����Թ <font color="#ff0000">*</font></td>
              <td colspan="2">&nbsp;<select name="pay_type" id="pay_type">
                <option  value="" >���͡�ٻẺ��ê����Թ  </option>     
				<?php		
					foreach($arr_payment_type as $key => $value):			
					echo '<option value="'.$key.'"';
						if($pay_type==$key)echo "selected";
					echo'>'.$value.'</option>'; 
					endforeach;
				?>
              </select></td>
          </tr><tr>
              <td  nowrap width="34%" align="right" valign="top" >��������´��ê����Թ <font color="#ff0000">*</font></td>
              <td colspan="2">&nbsp;<input type="text" name="pay_desc" nidame="pay_desc" size="30"  value="<?=$pay_desc?>" /> </td>
        </tr><tr>
              <td width="34%" align="right" valign="top" >�Ң���ҧ�ԧ <font color="#ff0000">*</font></td>
              <td colspan="2">&nbsp;<input style="background-color:#FFFF99" readonly type="text" name="inv_ref" size="10" maxlength="8" value="<?=$inv_ref?>" /> 
              <input type="button" onClick="get_mem_listpicker_invcode()" value="���͡"> </td>
        </tr><tr>
              <td width="34%" align="right" valign="top" >������ҧ�ԧ<font color="#ff0000">* </font></td>
              <td colspan="2">&nbsp;<input size="20" type="text" id="mapping_code" name="mapping_code" value="<?=$mapping_code?>"></td>
        </tr>
		 <tr>
           <td width="43%" valign="top" align="right" >Show</td>
           <td width="61%" nowrap>&nbsp;&nbsp;<input type="checkbox" name="status" id="status" value="1" <?=$status=="0"?"":"checked"?> />
           
         </tr>
		</table>
        	<hr width="50%" /><font color="#808080"><u>�����˵�</u></font> <font color="#ff0000">*</font><font color="#808080">=���繵�ͧ��͡������</font> 
        </fieldset></td>
      </tr>
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