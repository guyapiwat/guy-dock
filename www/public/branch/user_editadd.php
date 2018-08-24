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
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">ไม่พบข้อมูลตามเงื่อนไข</font></td></tr><tr>
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=5&sub=4';">ไปหน้าข้อมูลผู้ใช้ระบบ</a>]</td></tr></table><?
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
        <legend><b>ข้อมูลผู้ใช้โปรแกรม</b></legend>
        <table align="center"><tr>
              <td width="34%" align="right" valign="top" >รหัสผู้ใช้ <font color="#ff0000">*</font></td>
              <td colspan="2">&nbsp;<input type="text" name="usercode" size="10" maxlength="10" value="<?=$usercode?>" /> &nbsp;กรอกรหัสผู้ใช้ ex. 999 &nbsp; </td>
          </tr><tr>
              <td width="34%" align="right" valign="top" >ชื่อผู้ใช้ <font color="#ff0000">*</font></td>
              <td colspan="2">&nbsp;<input type="text" name="username" size="10" maxlength="10" value="<?=$username?>" /> &nbsp;กรอกชื่อผู้ใช้ </td>
          </tr><tr>
              <td width="34%" align="right" valign="top" >รหัสผ่าน <font color="#ff0000">*</font></td>
              <td colspan="2">&nbsp;<input type="text" name="password" size="10" maxlength="8" value="<?=$password?>" /> &nbsp;กรอกรหัสผ่าน </td>
        </tr><tr>
              <td width="34%" align="right" valign="top" >สาขาอ้างอิง <font color="#ff0000">*</font></td>
            <td colspan="2">&nbsp;<input style="background-color:#FFFF99" readonly type="text" name="inv_ref" size="10" maxlength="8" value="<?=$inv_ref?>" /> 
            <input type="button" onClick="get_mem_listpicker_invcode()" value="เลือก"></td>
        </tr></table>
        	<hr width="50%" /><font color="#808080"><u>หมายเหตุ</u></font> <font color="#ff0000">*</font><font color="#808080">=จำเป็นต้องกรอกข้อมูล</font> 
        </fieldset></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr>
        <td colspan="3" valign="top" ><fieldset>
          <legend><b>สิทธิการใช้งานโปรแกรม</b></legend><br />
          <table border="1" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#CCCCCC" align="center">
              <td colspan="2">เมนู</td>
              <td>ดู</td>
              <td>เพิ่ม</td>
              <td>แก้ไข</td>
              <td>ลบ</td>
            </tr>
            <? 
			  $obj = array($object1,$object2,$object3,$object4,$object5);
			  $objdef = array("สมาชิก","vip","ขาย","คอมมิชชั่น","บริหารระบบ");
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
    <td width="21%" align="left">&nbsp; ข้อมูลถูกต้อง <font color="#ff0000">*</font>&nbsp;&nbsp; <input type="checkbox" name="C1" value="ok"></td>
    <td width="45%">&nbsp;</td>
    </tr-->
      <tr>
        <td width="34%" align="right" valign="top" >&nbsp;</td>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td width="34%" align="right" valign="top" >&nbsp;</td>
        <td colspan="2">&nbsp;
            <input type="submit" value="บันทึก" name="B1" />
          &nbsp;
            <input type="reset" value="ยกเลิก" name="B2" /></td>
      </tr>
    </table>
</form>