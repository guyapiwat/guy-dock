<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript" type="text/javascript">
var wi=null;
	function get_mem_listpicker_mcode(){
		if (wi) wi.close();
		//alert(this.getElementById('mcode_acc_name').innerHTML);
		wi=window.open("mem_listpicker_mcode1.php?name="+document.supplierform.mcode.value,"list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	}
</script>
<script language="javascript">
var xmlHttp;
function isupentcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sup_code').value;
	var field = "sup_code";
	var flag = "1-0-0-1-0";
	var errDesc = "รหัสผู้จำหน่ายสินค้า";
	
	val = val + ","+document.getElementById('sup_desc').value;
	field = field +",sup_desc";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ชื่อผู้จำหน่ายสินค้า";
		
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"supplier","checkstate");
}
function esupentcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sup_code').value;
	var skipval = document.getElementById('osup_code').value;
	var field = "sup_code";
	var flag = "1-0-0-1-0";
	var errDesc = "รหัสผู้จำหน่ายสินค้า";
	
	val = val + ","+document.getElementById('sup_desc').value;
	skipval = skipval+",";
	field = field +",sup_desc";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ชื่อผู้จำหน่ายสินค้า";

	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);
	startRQ(field,val,skipval,flag,errDesc,"supplier","checkstate");
}

</script>
<?
	if($_GET['sup_code']){
		$sql = "SELECT * FROM ".$dbprefix."supplier WHERE sup_code='".$_GET['sup_code']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">ไม่พบข้อมูลตามเงื่อนไข</font></td></tr><tr>
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=3&sub=2';">ไปหน้าข้อมูลสาขา</a>]</td></tr></table><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			$oid=$row->id;
			$sup_code=$row->sup_code;
			$sup_desc=$row->sup_desc;
			$sup_type=$row->sup_type;
			$address=$row->address;
			$provinceId=$row->provinceId;
			$amphurId=$row->amphurId;
			$districtId=$row->districtId;
			$zip=$row->zip;
		}
	}
?>	
<table width="95%" border="0">
   <tr>
     <td width="60%">		
<form method="post" name="supplierform" action="supplieroperate.php?state=<?=$_GET['sup_code']==""?0:1?>">
	<input type="hidden" name="oid" value="<?=$oid?>">
	
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr> 
      <td width="23%" valign="top" align="right" ></td>
      <td width="77%"><font color="#808080"><u>หมายเหตุ</u></font> <font color="#ff0000">*</font><font color="#808080">=จำเป็นต้องกรอกข้อมูล</font><br> 
        <br></td>
    </tr>
    <tr> 
      <td width="23%" valign="top" align="right" >รหัส<font color="#ff0000">*</font></td>
      <td width="77%">&nbsp; <input type="text" name="sup_code" id="sup_code" size="20" maxlength="7" value="<?=$sup_code?>">
	  <input type="hidden" name="osup_code" id="osup_code"o value="<?=$sup_code?>">
	  </td>
    </tr>
    <tr> 
      <td width="23%" valign="top" align="right" >ชื่อ <font color="#ff0000">*</font></td>
      <td width="77%">&nbsp; <input type="text" name="sup_desc" id="sup_desc"  maxlength="100" value="<?=$sup_desc?>"></td>
    </tr>
    <!--tr> 
      <td width="23%" valign="top" align="right" >ข้อมูลถูกต้อง <font color="#ff0000">*</font></td>
      <td width="77%">&nbsp; <input type="checkbox" name="C1" value="ok"></td>
    </tr-->
    <tr> 
        <td width="23%" align="right">ที่อยู่ปัจจุบัน&nbsp;</td>
        <td width="77%">&nbsp; <textarea name="address" cols="50" rows="3"><?=$address?></textarea></td>
    </tr>
    <tr> 
      <td width="23%" align="right">&nbsp;</td>
      <td width="77%">&nbsp;</td>
    </tr>
    <tr> 
      <td width="23%" valign="top" align="right" >&nbsp;</td>
      <td width="77%">
	  <input name="button" type="button" onclick="<?=(isset($_GET['sup_code'])?"esupentcheck()":"isupentcheck()")?>" value="ตรวจสอบ" />
             &nbsp;
             <input type="submit" value="บันทึก" name="ok"  disabled="disabled" />
             &nbsp;
            <input name="reset" type="reset"  onclick="window.location='index.php?sessiontab=3&sub=2'" value="ยกเลิก" />
    </tr>
  </table>

</form>
</td>
     <td width="40%">
      <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font></div></td>
   </tr>
 </table>
     