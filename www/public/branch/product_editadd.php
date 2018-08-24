<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">
var xmlHttp;
function iproductcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('pcode').value;
	var field = "pcode";
	var flag = "1-0-0-1-0";
	var errDesc = "รหัสสินค้า";
	
	val = val + ","+document.getElementById('pdesc').value;
	field = field +",pdesc";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รายละเอียดสินค้า";
	
	val = val + ","+document.getElementById('price').value;
	field = field +",price";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ราคาขาย";
	
	val = val + ","+document.getElementById('pv').value;
	field = field +",pv";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",PV";
	
	val = val + ","+document.getElementById('qty').value;
	field = field +",qty";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ยอดคงเหลือ";
	
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
	
	val = val + ","+document.getElementById('pdesc').value;
	skipval = skipval+",";
	field = field +",pdesc";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รายละเอียดสินค้า";
	
	val = val + ","+document.getElementById('price').value;
	skipval = skipval+",";
	field = field +",price";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ราคาขาย";
	
	val = val + ","+document.getElementById('pv').value;
	skipval = skipval+",";
	field = field +",pv";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",PV";
	
	val = val + ","+document.getElementById('qty').value;
	skipval = skipval+",";
	field = field +",qty";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ยอดคงเหลือ";

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
			$fv = $row->fv;
			$qty = $row->qty;
		}
	}
?>
		<table width="95%" border="0">
   <tr>
     <td width="60%"><form action="productoperate.php?state=<?=$_GET['pcode']==""?0:1?>" method="post" name="productform" id="productform">
       <input type="hidden" name="oid" value="<?=$oid?>" />
       <table border="0" cellpadding="0" cellspacing="0" width="100%">
         <tr>
           <td width="43%" valign="top" align="right" ></td>
           <td width="57%"><font color="#808080"><u>หมายเหตุ</u></font> <font color="#ff0000">*</font><font color="#808080">=จำเป็นต้องกรอกข้อมูล</font><br />
               <input type="hidden" name="oid2" value="<?=$oid?>" />
               <br /></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >รหัสสินค้า <font color="#ff0000">*</font></td>
           <td width="57%">&nbsp;
               <input type="text" name="pcode" id="pcode" size="20" maxlength="20" value="<?=$pcode?>" /><input type="hidden" name="opcode" id="opcode" value="<?=$pcode?>" /></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >รายละเอียดสินค้า <font color="ff0000">*</font></td>
           <td width="57%">&nbsp;
               <input type="text" name="pdesc" id="pdesc" size="40" maxlength="40" value="<?=$pdesc?>" /></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >หน่วย </font></td>
           <td width="57%">&nbsp;
               <input type="text" name="unit" size="40" maxlength="40" value="<?=$unit?>" /></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >ราคาขาย <font color="#ff0000">*</font></td>
           <td width="57%">&nbsp;
               <input type="text" name="price" id="price" size="40" maxlength="40" value="<?=$price?>" /></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >PV <font color="#ff0000">*</font></td>
           <td width="57%">&nbsp;
               <input type="text" name="pv" id="pv" size="20" maxlength="20" value="<?=$pv?>" /></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >BV </font></td>
           <td width="57%">&nbsp;
               <input type="text" name="bv" id="bv" size="20" maxlength="20" value="<?=$bv?>" /></td>
         </tr>
         <tr>
           <td valign="top" align="right" >FV&nbsp;</td>
           <td>&nbsp;&nbsp;<input type="text" name="fv" size="20" maxlength="20" value="<?=$fv?>" /></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >ยอดคงเหลือ <font color="#ff0000">*</font></td>
           <td width="57%">&nbsp;
           <input type="text" name="qty" id="qty" size="20" maxlength="20" value="<?=$qty?>" /></td>
         </tr>
         <!--tr> 
    <td width="23%" valign="top" align="right" >ข้อมูลถูกต้อง <font color="#ff0000">*</font></td>
    <td width="77%">&nbsp; <input type="checkbox" name="C1" value="ok"></td>
  </tr-->
         <tr>
           <td width="43%" valign="top" align="right" >&nbsp;</td>
           <td width="57%">&nbsp;</td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >&nbsp;</td>
           <td width="57%"><input name="button" id="button" type="button" onclick="<?=(isset($_GET['pcode'])?"eproductcheck()":"iproductcheck()")?>" value="ตรวจสอบ" />
             &nbsp;
             <input type="submit" value="บันทึก" name="ok" id="ok"  disabled="disabled" />
             &nbsp;
            <input name="reset"  id="reset" type="reset"  onclick="window.location='index.php?sessiontab=3&sub=1'" value="ยกเลิก" /></td>
         </tr>
       </table>
     </form></td>
     <td width="40%">
      <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font></div></td>
   </tr>
 </table>

