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
	
	val = val + ","+document.getElementById('customer_price').value;
	field = field +",customer_price";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ราคาขายปลีก";

	val = val + ","+document.getElementById('price').value;
	field = field +",price";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ราคาขายสมาชิก";

	val = val + ","+document.getElementById('bprice').value;
	field = field +",bprice";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ราคาขายสกุลเงินบาท";

	//val = val + ","+document.getElementById('special_pv').value;
	//field = field +",special_pv";
	//flag = flag+",1-0-0-0-0";
	//errDesc = errDesc + ",ค่าแนะนำพิเศษ";
		
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
	errDesc = errDesc + ",weight";

	/*val = val + ","+document.getElementById('qty').value;
	field = field +",qty";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ยอดคงเหลือ";
	*/
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"product_package","checkstate");
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
	
	val = val + ","+document.getElementById('customer_price').value;
	field = field +",customer_price";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ราคาขายปลีก";

	val = val + ","+document.getElementById('price').value;
	field = field +",price";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ราคาขายสมาชิก";

	val = val + ","+document.getElementById('bprice').value;
	field = field +",bprice";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ราคาขายสกุลเงินบาท";
	
	//val = val + ","+document.getElementById('special_pv').value;
	//field = field +",special_pv";
	//flag = flag+",1-0-0-0-0";
	//errDesc = errDesc + ",ค่าแนะนำพิเศษ";
	
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
	errDesc = errDesc + ",weight";
	/*
	val = val + ","+document.getElementById('qty').value;
	skipval = skipval+",";
	field = field +",qty";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ยอดคงเหลือ";
*/
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);
	startRQ(field,val,skipval,flag,errDesc,"product_package","checkstate");
}

</script>
<?
$mcode = gencode($code+1);
$sv_code = substr($mcode,3,strlen($mcode));
//echo $mcode." " ;
//echo $sv_code;



	if($_GET['pcode']){
		$sql = "SELECT * FROM ".$dbprefix."product WHERE pcode='".$_GET['pcode']."' LIMIT 1";
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
			$cost_price = $row->cost_price;
			$price = $row->price;
			$bprice = $row->bprice;
            $personel_price = $row->personel_price;
            $customer_price = $row->customer_price;
			$pv = $row->pv;
			//$special_pv =$row->special_pv;
			$bv = $row->bv;
			$fv = $row->fv;
			$bf = $row->bf;
			$weight = $row->weight;
			$qty = $row->qty;
			$qty_stock = $row->qty_stock;
			$cid = $row->locationbase;
			$sst = $row->sst;
			$barcode = $row->barcode;
				$st = $row->st;
						$group_id = $row->group_id;		

			$checkpcode = $row->pcode;
			$checkimg = $row->product_img;
			$vat=$row->vat;
			$pathImg=$row->product_img;
		}

		$sql_regis="SELECT * FROM ".$dbprefix."location_base WHERE cid='1' LIMIT 1";
		$result = mysql_query($sql_regis) or die(mysql_error());
		   if(mysql_num_rows($result)>0){
			$obj = mysql_fetch_object($result);
				$pcode_register=$obj->pcode_register;
		   }
	}
?>
		<table width="95%" border="0">
   <tr>
     <td width="60%"><form action="productoperate.php?state=<?=$_GET['pcode']==""?0:1?>" method="post" name="productform" id="productform" enctype="multipart/form-data" >
       <input type="hidden" name="oid" value="<?=$oid?>" />
       <table border="0" cellpadding="0" cellspacing="0" width="100%">
         <tr>
           <td width="43%" valign="top" align="right" ></td>
           <td width="61%"><font color="#808080"><u>หมายเหตุ</u></font> <font color="#ff0000">*</font><font color="#808080">=จำเป็นต้องกรอกข้อมูล</font><br />
               <input type="hidden" name="oid2" value="<?=$oid?>" />
               <br /></td>
         </tr>
		  <tr>
                  <td align="right" width="43%" <?=$sy?>>เลือกหมวดสินค้า&nbsp;</td>
                  <td align="left" width="61%">&nbsp;
                   <?
				  	$sql = "SELECT * FROM ".$dbprefix."productgroup ";
						$res = mysql_query($sql);
						echo " <select name=\"product_group\" id=\"product_group\">";
						echo "<option value=''>-  เลือกหมวดหมู่สินค้า -</option>";
						for($i = 0 ; $i < mysql_num_rows($res) ; $i++){
							$info = mysql_fetch_object($res);
							echo "<option value='".$info->id."' ".(($group_id==$info->id)?"selected":"").">".$info->groupname."</option>";
						}
						echo "</select>";
				  ?>                  </td>
                </tr>
         <tr>
           <td width="43%" valign="top" align="right" >รหัสสินค้า <font color="#ff0000">*</font></td>
           <td width="61%">&nbsp;
		   	<? if($_GET['pcode'] == '0001' or $_GET['pcode'] == 'AS001' or $_GET['pcode'] == 'SE0011'){ ?>
		               <input type="text" name="pcode" id="pcode" size="20" maxlength="20" value="<?=$pcode?>" onchange="document.getElementById('pcode_register').value=document.getElementById('pcode').value;"  readonly/>&nbsp;&nbsp;<font color="#ff0000">ไม่สามารถเปลี่ยนรหัสสินค้านี้ได้</font>
					   <input type="hidden" name="opcode" id="opcode" value="<?=$pcode?>" /></td>	   
			<?}else{?>
               <input type="text" name="pcode" id="pcode" size="20" maxlength="20" value="<?=$pcode?>" onchange="document.getElementById('pcode_register').value=document.getElementById('pcode').value;" /><input type="hidden" name="opcode" id="opcode" value="<?=$pcode?>" /></td>
			<?}?>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >รายละเอียดสินค้า <font color="ff0000">*</font></td>
           <td width="61%">&nbsp;
               <input type="text" name="pdesc" id="pdesc" size="40" maxlength="70" value="<?=$pdesc?>" /></td>
         </tr>
           <td width="43%" valign="top" align="right" >หน่วย </font></td>
           <td width="61%">&nbsp;
             <input type="text" name="unit" size="40" maxlength="40" value="<?=$unit?>" /></td>
         </tr>
		 <tr>
           <td width="43%" valign="top" align="right" nowrap >ราคาขายปลีก <font color="#ff0000">*</font></td>
           <td width="61%">&nbsp;
               <input type="text" name="customer_price" id="customer_price" size="40" maxlength="40" value="<?=$customer_price?>"  <?if($_GET['sessiontab']=='3'){?>disabledd<?}?> /></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" nowrap >ราคาขายสมาชิก <font color="#ff0000">*</font></td>
           <td width="61%">&nbsp;
               <input type="text" name="price" id="price" size="40" maxlength="40" value="<?=$price?>" /></td>
         </tr>
		 <tr>
           <td width="43%" valign="top" align="right"  nowrap>ราคาขายสกุลเงินบาท<font color="#ff0000">*</font></td>
           <td width="61%">&nbsp;
               <input type="text" name="bprice" id="bprice" size="40" maxlength="40" value="<?=$bprice?>" /></td>
         </tr>
		 <tr style="display:none">
		   <td valign="top" align="right"  nowrap>ราคาขายพนักงาน<font color="#ff0000">*</font></td>
		   <td>&nbsp;
		     <input type="text" name="personel_price" id="personel_price" size="40" maxlength="40" value="<?=$personel_price?>" /></td>
	      </tr>
		  <tr>
		   <td valign="top" align="right"  nowrap>สินค้า vat<font color="#ff0000">*</font></td>
		   <td>&nbsp;
		     <input type="number" name="vat" id="vat" min="0" step="1" value="<?=$vat?>"   />
	      </tr>
		 <tr>
		   <td valign="top" align="right"  nowrap>&nbsp;</td>
		   <td>&nbsp;</td>
	      </tr>
         <tr>
           <td width="43%" valign="top" align="right" >PV <font color="#ff0000">*</font></td>
           <td width="61%">&nbsp;
               <input type="text" name="pv" id="pv" size="20" maxlength="20" value="<?=$pv?>" /></td>
         </tr>
		 <tr style="display:none">
           <td width="43%" valign="top" align="right" >ค่าแนะนำพิเศษ <font color="#ff0000">*</font></td>
           <td width="61%">&nbsp;
               <input type="text" name="special_pv" id="special_pv" size="20" maxlength="20" value="<?=$special_pv?>" /></td>
         </tr>
         <tr >
           <td width="43%" valign="top" align="right" >น้ำหนัก(กรัม) </font></td>
           <td width="61%">&nbsp;
               <input type="text" name="weight" id="weight" size="20" maxlength="20" value="<?=$weight?>" /></td>
         </tr>
         <tr style="display:none">
           <td valign="top" align="right" >FV&nbsp;</td>
           <td>&nbsp;&nbsp;<input type="text" name="fv" size="20" maxlength="20" value="<?=$fv?>" /></td>
         </tr>
         <tr style="display:none">
           <td valign="top" align="right" >สินค้าคงคลัง</td>
           <td>&nbsp;
             <input type="text" name="qty_stock" id="qty_stock"  size="20" maxlength="20"  value="<?=$qty_stock?>" /></td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >ยอดคงเหลือ</td>
           <td width="61%">&nbsp;
             <input type="text" name="qty" id="qty" disabled size="20" maxlength="20"  value="<?=$qty?>" /></td>
         </tr>
		  <tr>
           <td width="43%" valign="top" align="right" >Barcode</td>
           <td width="61%">&nbsp;
               <input type="text" name="barcode" id="barcode" size="20" maxlength="20"  value="<?=$barcode?>" /></td>
         </tr>
         <!--tr> 
    <td width="23%" valign="top" align="right" >ข้อมูลถูกต้อง <font color="#ff0000">*</font></td>
    <td width="77%">&nbsp; <input type="checkbox" name="C1" value="ok"></td>
  </tr-->
  		 <tr>
  		   <td valign="top" align="right" >Location Base </td>
  		   <td>&nbsp;<select size="1" name="locationbase" id="locationbase" tabindex="63">
         <?					
						$result1=mysql_query("select * from ".$dbprefix."location_base order by cid");
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
	      </tr>
		  
		  </tr>
		  <tr style='display:none'>
    <td align="right" valign="top">รูปสินค้า</td>
    <td valign="top">
		  <?php
				if(@file_exists("uploads/product_img/$pathImg.jpg"))
				{
					echo "<br/>";
					echo "<img src='uploads/product_img/$pathImg.jpg' width='120px' height='120px' class='profile_img'/>";
				}
				else
				{
					echo "<br/>";
					echo "<img src='uploads/product_img/product.jpg' width='80px' class='profile_img'/>";
				}
			?>
			<p>
			<input type="hidden" name="checkPCode" id="checkPCode" value="<?=$checkpcode?>" />
			<input type="hidden" name="checkImg" id="checkImg" value="<?=$checkimg?>" />
				  <input type="file" name="myfile" id="myfile" >
				   <input type="hidden" name="myfile1" id="myfile1" value='<?=$pathImg;?>' >
				</p>
			</td>
		<td align="right">&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
		  
		  
  		 <tr>
           <td width="43%" valign="top" align="right" >Show</td>
           <td width="61%" nowrap>&nbsp;&nbsp;
		   <input type="checkbox" name="st" value="1" <?=$st=="0"?"":"checked"?> />
           Member
           <input type="checkbox" name="bf" value="1" <?=$bf=="0"?"":"checked"?> /> 
           Branch/Backoffice
		   <input type="checkbox" name="sst" value="1" <?=$sst=="0"?"":"checked"?> /> 
            แลกสินค้า
		
              </td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >&nbsp;</td>
           <td width="61%">&nbsp;</td>
         </tr>
         <tr>
           <td width="43%" valign="top" align="right" >&nbsp;</td>
           <td width="61%"><input name="button" id="button" type="button" onClick="<?=(isset($_GET['pcode'])?"eproductcheck()":"iproductcheck()")?>" value="ตรวจสอบ" />
             &nbsp;
             <input type="submit" value="บันทึก" name="ok" id="ok"  disabled="disabled" />
             &nbsp;
            <input name="reset" type="reset" id="reset"   onclick="window.location='index.php?sessiontab=6&sub=1'" value="ยกเลิก" /></td>
         </tr>
       </table>
     </form></td>
     <td width="40%">
      <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font></div></td>
   </tr>
 </table>

