<SCRIPT language=Javascript1.2>
function Validate(form) {
	 	if (form.mcode.value == "")
		{ alert("กรุณาใส่รหัสสมาชิก!"); form.mcode.focus(); return; }
	form.submit()
} 
</SCRIPT>
<?
	if($_GET['id']){
		//echo "--".$_GET['uid'];
		$sql = "SELECT * FROM ".$dbprefix."my_pv WHERE id='".$_GET['id']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">ไม่พบข้อมูลตามเงื่อนไข</font></td></tr><tr>
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=5&sub=4';">ไปหน้าข้อมูลผู้ใช้ระบบ</a>]</td></tr></table><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			$oid=$row->id;
			$mcode=$row->mcode;
			$status=$row->status;
		}
	}else{
			$id="";
			$oid="";
			$mcode="";
			$status="0";
	}
?>		
		<form method="post" action="mypvoperate.php?state=<?=$_GET['id']==""?0:1?>">
	<input type="hidden" name="oid" value="<?=$oid?>">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
      <tr>
        <td colspan="2" align="center"><fieldset>
        <legend><b>ข้อมูลสมาชิก</b></legend>
        <table align="center"><tr>
              <td width="34%" align="right" valign="top" >รหัสสมาชิก&nbsp; <font color="#ff0000">*</font></td>
              <td colspan="2">&nbsp;<input type="text" name="mcode" value="<?=$mcode?>" readonly /></td>
          </tr>
		  <tr>
			  <td width="34%" align="right">ชนิดของคะแนน&nbsp;<font color="#ff0000">*</font>&nbsp;</td>
			  <td width="40%">&nbsp;
				<input type="radio" name="status" value="1" <? if($status=="1") echo "checked=\"checked\""; ?>>รักษายอด
				<input type="radio" name="status" value="0" <? if($status=="0") echo "checked=\"checked\""; ?>>ไม่รักษายอด
			</td>
			</tr>
		  </table>
        	<hr width="50%" /><font color="#808080"><u>หมายเหตุ</u></font> <font color="#ff0000">*</font><font color="#808080">=จำเป็นต้องกรอกข้อมูล</font> 
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
            <input onclick=Validate(form) type=button value="บันทึก" name="B1" />
          &nbsp;
            <input type="reset" value="ยกเลิก" name="B2" /></td>
      </tr>
    </table>
</form>