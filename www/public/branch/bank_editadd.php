<SCRIPT language=Javascript1.2>
function Validate(form) {
	 	if (form.bankname.value == "")
		{ alert("กรุณาใส่ชื่อธนาคาร!"); form.bankname.focus(); return; }
	form.submit()
} 
</SCRIPT>
<?
	if($_GET['bankcode']){
		//echo "--".$_GET['uid'];
		$sql = "SELECT * FROM ".$dbprefix."bank WHERE bankcode='".$_GET['bankcode']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">ไม่พบข้อมูลตามเงื่อนไข</font></td></tr><tr>
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=5&sub=4';">ไปหน้าข้อมูลผู้ใช้ระบบ</a>]</td></tr></table><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$bankcode=$row->bankcode;
			$bank_oid=$row->bankcode;
			$bankname=$row->bankname;
		}
	}else{
			$bankcode="";
			$bank_oid="";
			$bankname="";
	}
?>		
		<form method="post" action="bankoperate.php?state=<?=$_GET['bankcode']==""?0:1?>">
	<input type="hidden" name="oid" value="<?=$bank_oid?>">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
      <tr>
        <td colspan="2" align="center"><fieldset>
        <legend><b>ข้อมูลธนาคาร</b></legend>
        <table align="center"><tr>
              <td width="34%" align="right" valign="top" >ชื่อธนาคาร <font color="#ff0000">*</font></td>
              <td colspan="2">&nbsp;<input type="text" name="bankname" value="<?=$bankname?>" /></td>
          </tr></table>
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