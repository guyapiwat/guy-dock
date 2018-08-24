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
	errDesc = errDesc + ",ราคาขายสมาชิก";

	val = val + ","+document.getElementById('customer_price').value;
	field = field +",customer_price";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ราคาขายปลีก";

	val = val + ","+document.getElementById('bprice').value;
	field = field +",bprice";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ราคาขายสกุลเงินบาท";

	val = val + ","+document.getElementById('vat').value;
	field = field +",vat";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",vat";

	val = val + ","+document.getElementById('pv').value;
	field = field +",pv";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",PV";
	
	
	val = val + ","+document.getElementById('weight').value;
	field = field +",weight";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",น้ำหนัก";

    
   

	
/*	val = val + ","+document.getElementById('qty').value;
	field = field +",qty";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ยอดคงเหลือ";*/
	
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
	var errDesc = "รหัส package";
	
	val = val + ","+document.getElementById('pdesc').value;
	skipval = skipval+",";
	field = field +",pdesc";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รายละเอียด package";
	
	
	val = val + ","+document.getElementById('price').value;
	field = field +",price";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ราคาขายสมาชิก";

	val = val + ","+document.getElementById('customer_price').value;
	field = field +",customer_price";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ราคาขายปลีก";
	
	val = val + ","+document.getElementById('bprice').value;
	field = field +",bprice";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ราคาขายสกุลเงินบาท";

	val = val + ","+document.getElementById('vat').value;
	field = field +",vat";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",vat";

	val = val + ","+document.getElementById('pv').value;
	skipval = skipval+",";
	field = field +",pv";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",PV";
	
                         
   

	val = val + ","+document.getElementById('weight').value;
	skipval = skipval+",";
	field = field +",weight";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",น้ำหนัก";

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
		$sql = "SELECT * FROM ".$dbprefix."product_package WHERE pcode='".$_GET['pcode']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">ไม่พบข้อมูลตามเงื่อนไข</font></td></tr><tr>
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=6';">ไปหน้าสินค้า</a>]</td></tr></table><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$pcode = $row->pcode;
			$oid = $row->pcode;
			$pdesc = $row->pdesc;
			$unit = $row->unit;
			$price = $row->price;
			$bprice = $row->bprice;
			$customer_price = $row->customer_price;
			$pv = $row->pv;
			$special_pv =$row->special_pv;
			$bv = $row->bv;
			$fv = $row->fv;
			$st = $row->st;
			$sst = $row->sst;
			$bf = $row->bf;
			$ato = $row->ato;
			$qty = $row->qty;
			$cid = $row->locationbase;
			$barcode = $row->barcode;
            $weight = $row->weight;
			$sa_type = $row->sa_type;
			$vat=$row->vat;
		}
	}
?>
		<table width="95%" border="0">
   <tr>
     <td width="60%"><form action="packageoperate.php?state=<?=$_GET['pcode']==""?0:1?>" method="post" name="productform" id="productform">
       <input type="hidden" name="oid" id="oid" value="<?=$oid?>" />
       <table border="0" cellpadding="0" cellspacing="0" width="100%">
         <tr>
           <td width="43%" valign="top" align="right" ></td>
           <td width="57%"><font color="#808080"><u>หมายเหตุ</u></font> <font color="#ff0000">*</font><font color="#808080">=จำเป็นต้องกรอกข้อมูล</font><br />
               <input type="hidden" name="oid2" value="<?=$oid?>" />
               <br /></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >รหัส package <font color="#ff0000">*</font></td>
           <td width="57%">&nbsp;
               <input type="text" name="pcode" id="pcode" size="20" maxlength="20" value="<?=$pcode?>" /><input type="hidden" name="opcode" id="opcode" value="<?=$pcode?>" /></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >รายละเอียด package <font color="ff0000">*</font></td>
           <td width="57%">&nbsp;
               <input type="text" name="pdesc" id="pdesc" size="40" maxlength="40" value="<?=$pdesc?>" /></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >หน่วย </font></td>
           <td width="57%">&nbsp;
               <input type="text" name="unit" size="40" maxlength="40" value="<?=$unit?>" /></td>
         </tr>
		  <tr>
           <td width="43%" valign="top" align="right" >ราคาขายปลีก <font color="#ff0000">*</font></td>
           <td width="57%">&nbsp;
               <input type="text" name="customer_price" id="customer_price" size="40" maxlength="40" value="<?=$customer_price?>" /></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >ราคาขายสมาชิก <font color="#ff0000">*</font></td>
           <td width="57%">&nbsp;
               <input type="text" name="price" id="price" size="40" maxlength="40" value="<?=$price?>" /></td>
         </tr>
		
		<tr>
           <td width="43%" valign="top" align="right" >ราคาขายสกุลเงินบาท<font color="#ff0000">*</font></td>
           <td width="57%">&nbsp;
               <input type="text" name="bprice" id="bprice" size="40" maxlength="40" value="<?=$bprice?>" /></td>
         </tr>
		 <tr>
		   <td valign="top" align="right"  nowrap>สิ้นค้า vat<font color="#ff0000">*</font></td>
		   <td>&nbsp;
		     <input type="number" name="vat" id="vat" min="0" value="<?=$vat?>" step="1"  />
	      </tr>
         <tr>
           <td width="43%" valign="top" align="right" >PV <font color="#ff0000">*</font></td>
           <td width="57%">&nbsp;
               <input type="text" name="pv" id="pv" size="20" maxlength="20" value="<?=$pv?>" /></td>
         </tr>
		 <tr style="display:none">
           <td width="43%" valign="top" align="right" >ค่าแนะนำพิเศษ <font color="#ff0000">*</font></td>
           <td width="61%">&nbsp;
               <input type="text" name="special_pv" id="special_pv" size="20" maxlength="20" value="<?=$special_pv?>" /></td>
         </tr>
         <tr >
           <td valign="top" align="right" >&#3609;&#3657;&#3635;&#3627;&#3609;&#3633;&#3585;(กรัม)<font color="#ff0000">*</font> </font></td>
           <td>&nbsp;
               <input type="text" name="weight" id="weight" size="20" maxlength="20" value="<?=$weight?>" /></td>
         </tr>

         <tr style="display:none">
           <td width="43%" valign="top" align="right"  >ยอดคงเหลือ <font color="#ff0000">*</font></td>
           <td width="57%">&nbsp;
               <input type="text" name="qty" id="qty" size="20" maxlength="20" value="<?=$qty?>" /></td>
         </tr>
		  <tr  >
           <td width="43%" valign="top" align="right"  >Barcode </td>
           <td width="57%">&nbsp;
               <input type="text" name="barcode" id="barcode" size="20" maxlength="20" value="<?=$barcode?>" /></td>
         </tr>
         
         <!-- <tr  >
           <td width="43%" valign="top" align="right"  >ประเภทสินค้า </td>
           <td width="57%">&nbsp;
                <select name="sa_type" id="sa_type">
                    <option value="" >กรุณาเลือก</option>     
                    <option value="A" <?if($sa_type =='A')echo "selected"; ?>>  Upgrade</option>
                    <option value="Q" <?if($sa_type =='Q')echo "selected"; ?>> Maintain</option>
               </select>    
       </td>
         </tr> -->
         <!--tr> 
    <td width="23%" valign="top" align="right" >ข้อมูลถูกต้อง <font color="#ff0000">*</font></td>
    <td width="77%">&nbsp; <input type="checkbox" name="C1" value="ok"></td>
  </tr--><tr>
  		   <td valign="top" align="right" >Location Base </td>
  		   <td>&nbsp;<select size="1" name="locationbase" id="locationbase" tabindex="63">
         <?					
						$result1=mysql_query("select * from ".$dbprefix."location_base order  by cid desc");
						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->cid."\" ";
							if($cid==""&&$row1->cid==26) {echo "selected";}
							if ($cid==$row1->cid) {echo "selected";}
							echo ">".$row1->cname."</option>";
						}
						?>
     </select></td>
	      </tr><tr>
           <td width="43%" valign="top" align="right" >Show</td>
           <td width="57%">&nbsp;&nbsp;<input type="checkbox" name="st" value="1" <?=$st=="0"?"":"checked"?> />
           Member
             <input type="checkbox" name="bf" value="1" <?=$bf=="0"?"":"checked"?> /> 
            Branch/Backoffice
             <input type="checkbox" name="sst" value="1" <?=$sst=="0"?"":"checked"?> /> 
            แลกสินค้า
			</td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >&nbsp;</td>
           <td width="57%">&nbsp;</td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >&nbsp;</td>
           <td width="57%"><input name="button" id="button" type="button" onClick="<?=(isset($_GET['pcode'])?"eproductcheck()":"iproductcheck()")?>" value="ตรวจสอบ" />
             &nbsp;
             <input type="submit" value="บันทึก" name="ok" id="ok"  disabled="disabled" />
             &nbsp;
            <input name="reset" id="reset" type="reset"  onclick="window.location='index.php?sessiontab=6&sub=1'" value="ยกเลิก" /></td>
         </tr>
       </table>
     </form></td>
     <td width="40%">
      <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font></div></td>
   </tr>
 </table>

