<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript">
var wi=null;
function get_mem_listpicker_sp_code(){
		if (wi) wi.close();
		wi=window.open("product_show2.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_mem_listpicker_upa_code(){
		if (wi) wi.close();
	wi=window.open("mem_listpicker_upa_code.php?name="+document.frm.upa_name.value+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_mem_listpicker_mcode_acc(){
		if (wi) wi.close();
	//alert(this.getElementById('mcode_acc_name').innerHTML);
	wi=window.open("mem_listpicker_mcode_acc.php?name=?","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	//wi=window.open("mem_listpicker_mcode_acc.php?name="+this.getElementById('mcode_acc_name').innerHTML+"","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
</script>

<script language="javascript">
var xmlHttp;
function iproductcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('pcode').value;
	var field = "pcode";
	var flag = "1-0-0-1-0";
	var errDesc = "รหัสสินค้า";
	
	
	
	val = val + ","+document.getElementById('bQty').value;
	field = field +",qty";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ยอดคงเหลือ";
	
	val = val + ","+document.getElementById('txtoption').value;
	field = field +",txtoption";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",หมายเหตุ";
	
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"product","checkstate");
}
function eproductcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('pcode').value;
	var skipval = document.getElementById('opcode').value;
	var field = "pcode";
	var flag = "1-0-0-1-0";
	var errDesc = "รหัสสินค้า";

	
	val = val + ","+document.getElementById('bQty').value;
	skipval = skipval+",";
	field = field +",qty";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ยอดคงเหลือ";

	val = val + ","+document.getElementById('txtoption').value;
	field = field +",txtoption";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",หมายเหตุ";
	
	
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);
	startRQ(field,val,skipval,flag,errDesc,"product","checkstate");
}

</script>
<?
	if($_GET['pcode']){
		$sql = "SELECT * FROM ".$dbprefix."product WHERE pcode='".$_GET['pcode']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">ไม่พบข้อมูลตามเงื่อนไข</font></td></tr><tr>
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=3';">ไปหน้าสินค้า</a>]</td></tr></table><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$pcode = $row->pcode;
			$oid = $row->pcode;
			$pdesc = $row->pdesc;
			$unit = $row->unit;
			$price = $row->price;
			$pv = $row->pv;
			$bv = $row->bv;
			$qty = $row->qty;
				$txtoption = $row->txtoption;
		}
	}
?>
		<table width="95%" border="0">
   <tr>
     <td width="60%"><form action="bproductoperate.php?state=<?=$_GET['pcode']==""?0:1?>" method="post" name="frm" id="frm">
       <input type="hidden" name="oid" value="<?=$oid?>" />
       <table border="0" cellpadding="0" cellspacing="0" width="100%">
         <tr>
           <td width="43%" valign="top" align="right" ></td>
           <td width="57%"><font color="#808080"><u>หมายเหตุ</u></font> <font color="#ff0000">*</font><font color="#808080">=จำเป็นต้องกรอกข้อมูล</font><br />
               <input type="hidden" name="oid2" value="<?=$oid?>" />
               <br /></td>
         </tr>
        <tr>
    <td width="43%" align="right">&#3619;&#3627;&#3633;&#3626;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634; <font color="#ff0000">*</font> </td>
    <td width="57%">&nbsp;
      <input style="background-color:#FFFF99" readonly type="text" name="p_code" id="p_code" size="20"  maxlength="20" value="<?=$p_code?>" />
          <input name="button2" type="button" onclick="get_mem_listpicker_sp_code()" value="เลือก" />
          <input name="button2" type="button" onclick="document.getElementById('sp_code').value='';document.getElementById('sp_name').value='';" value="ลบ" />      &nbsp;&nbsp;<input style="background-color:#FFFF99" readonly type="text" name="p_desc" id="p_desc" size="20"  maxlength="20" value="<?=$pdesc?>" />    </td>
    </tr>
  <tr>
    <td align="right">ยอดคงเหลือ <font color="#ff0000">*</font> </td>
    <td>&nbsp;
      <input style="background-color:#FFFF99" readonly type="text" name="p_qty" id="p_qty" size="40"  maxlength="40" value="<?=$p_qty?>" /></td>
  </tr>
         <tr>
           <td width="43%" valign="top" align="right" >&#3592;&#3635;&#3609;&#3623;&#3609;&#3585;&#3634;&#3619;&#3595;&#3639;&#3657;&#3629;/นำออก <font color="#ff0000">*</font></td>
           <td width="57%">&nbsp;
               <input type="text" name="txtBuy" id="txtBuy" size="40" maxlength="40" value="<?=$price?>" /></td>
         </tr>
         <!--tr> 
    <td width="23%" valign="top" align="right" >ข้อมูลถูกต้อง <font color="#ff0000">*</font></td>
    <td width="77%">&nbsp; <input type="checkbox" name="C1" value="ok"></td>
  </tr-->
         <tr>
           <td width="43%" valign="top" align="right" >&#3623;&#3633;&#3609;&#3607;&#3637;&#3656; <font color="#ff0000">*</font> </td>
           <td width="57%">&nbsp; <input type="text" id="mdate" name="mdate" size="10" maxlength="10" value="<?=($mdate==""?date("Y-m-d"):$mdate)?>" />
&nbsp;<a href="javascript:NewCal('mdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="&#3648;&#3621;&#3639;&#3629;&#3585;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;" /></a><font color="#808080">(&#3611;&#3611;&#3611;&#3611;-&#3604;&#3604;-&#3623;&#3623;)</font></td>
         </tr>
         <tr>
           <td align="right">หมายเหตุ <font color="#ff0000">*</font> </td>
           <td>&nbsp;
               <textarea name="txtoption" cols="40" rows="5" id="txtoption" ><?=$txtoption?></textarea></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >&nbsp;</td>
           <td width="57%">&nbsp;
             <input type="submit" value="บันทึก" name="ok" id="ok" />
             &nbsp;
            <input name="reset" type="reset"  onclick="window.location='index.php?sessiontab=3&sub=1'" value="ยกเลิก" /></td>
         </tr>
       </table>
     </form></td>
     <td width="40%">
    <!--  <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font></div>--></td>
   </tr>
 </table>

