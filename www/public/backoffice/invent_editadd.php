<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript" type="text/javascript">
var wi=null;
	function get_mem_listpicker_mcode(){
		if (wi) wi.close();
		//alert(this.getElementById('mcode_acc_name').innerHTML);
		wi=window.open("mem_listpicker_mcode1.php?name="+document.inventform.mcode.value,"list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	}
</script>
<script language="javascript">
var xmlHttp;
function iinventcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('inv_code').value;
	var field = "inv_code";
	var flag = "1-0-0-1-0";
	var errDesc = "รหัสสาขา";
	
	val = val + ","+document.getElementById('inv_desc').value;
	field = field +",inv_desc";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ชื่อสาขา";
		
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"invent","checkstate");
}
function einventcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('inv_code').value;
	var skipval = document.getElementById('oinv_code').value;
	var field = "inv_code";
	var flag = "1-0-0-1-0";
	var errDesc = "รหัสสาขา";
	
	val = val + ","+document.getElementById('inv_desc').value;
	skipval = skipval+",";
	field = field +",inv_desc";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ชื่อสาขา";

	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);
	startRQ(field,val,skipval,flag,errDesc,"invent","checkstate");
}

</script>
<?
	if($_GET['inv_code']){
		$sql = "SELECT * FROM ".$dbprefix."invent WHERE inv_code='".$_GET['inv_code']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">ไม่พบข้อมูลตามเงื่อนไข</font></td></tr><tr>
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=3&sub=2';">ไปหน้าข้อมูลสาขา</a>]</td></tr></table><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$id=$row->id;
			$oid=$row->id;
			$inv_code=$row->inv_code;
			$inv_desc=$row->inv_desc;
			$inv_type=$row->inv_type;
			$address=$row->address;
			$mcode=$row->code_ref;
			$provinceId=$row->provinceId;
			$amphurId=$row->amphurId;
			$districtId=$row->districtId;
			$zip=$row->zip;
			$discount=$row->discount;
			$cid=$row->locationbase;
			$home_t=$row->home_t;
			$fax=$row->fax;
			$no_tax=$row->no_tax;
			$bill_ref=$row->bill_ref;
		}
	}
?>	
<table width="95%" border="0">
   <tr>
     <td width="60%">		
<form method="post" name="inventform" action="inventoperate.php?state=<?=$_GET['inv_code']==""?0:1?>">
	<input type="hidden" name="oid" id="oid" value="<?=$oid?>">
	
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr> 
      <td width="23%" valign="top" align="right" ></td>
      <td width="77%"><font color="#808080"><u>หมายเหตุ</u></font> <font color="#ff0000">*</font><font color="#808080">=จำเป็นต้องกรอกข้อมูล</font><br> 
        <br></td>
    </tr>
    <tr> 
      <td width="23%" valign="top" align="right" >รหัส<font color="#ff0000">*</font></td>
      <td width="77%">&nbsp; <input type="text" name="inv_code" id="inv_code" size="20" maxlength="7" value="<?=$inv_code?>">
	  <input type="hidden" name="oinv_code" id="oinv_code" value="<?=$inv_code?>">	  </td>
    </tr>

    <tr> 
      <td width="23%" valign="top" align="right" >ชื่อ <font color="#ff0000">*</font></td>
      <td width="77%">&nbsp; <input type="text" name="inv_desc" id="inv_desc" size="40" maxlength="40" value="<?=$inv_desc?>"></td>
    </tr>


    <!--tr> 
      <td width="23%" valign="top" align="right" >ข้อมูลถูกต้อง <font color="#ff0000">*</font></td>
      <td width="77%">&nbsp; <input type="checkbox" name="C1" value="ok"></td>
    </tr-->
    <tr>
      <td valign="top" align="right" >รหัสสมาชิก</td>
      <td>&nbsp;
        <input style="background-color:#FFFF99" readonly size="15" type="text" id="mcode" name="mcode" value="<?=$mcode?>">
                <input type="button" onClick="get_mem_listpicker_mcode()" value="เลือก"><div id="mname"></div></td>
    </tr>
    <tr> 
      <td width="23%" valign="top" align="right" >ประเภท </td>
      <td width="77%">&nbsp;
        <select name="inv_type" id="inv_type">
          <option value="1" <?=($inv_type=='1'?"selected":"")?> >Branch</option>
        </select></td>
    </tr>
    <tr> 
        <td width="23%" align="right">ที่อยู่ปัจจุบัน&nbsp;</td>
        <td width="77%">&nbsp; <textarea name="address" cols="50" rows="3"><?=$address?></textarea></td>
    </tr>
    <tr> 
        <td width="23%" align="right">&nbsp;</td>
        <td width="77%">
			<? 
                if($provinceId==""){
                    include("thaiaddress.php");
                }else{
                    include("thaiaddressShow.php");
                }
            ?>        </td>
    </tr>
    <tr>
      <td align="right">รหัสไปรษณีย์&nbsp;</td>
      <td>&nbsp; <input type="text" name="zip" size="10" maxlength="5" value="<?=$zip?>" /></td>
    </tr>
    <tr>
      <td align="right">เบอร์ติดต่อ &nbsp;</td>
      <td>&nbsp; <input type="text" name="home_t"  maxlength="20" value="<?=$home_t?>" tabindex="25"/></td>
    </tr>
	<tr>
      <td align="right">โทรสาร &nbsp;</td>
      <td>&nbsp; <input type="text" name="fax"  maxlength="20" value="<?=$fax?>" tabindex="25"/></td>
    </tr>
	<tr>
      <td align="right">เลขที่ผู้เสียภาษี &nbsp;</td>
      <td>&nbsp; <input type="text" name="no_tax"  maxlength="20" value="<?=$no_tax?>" tabindex="25"/></td>
    </tr>
    <tr  >
      <td align="right">Location Base </td>
      <td>&nbsp;<select size="1" name="locationbase" id="locationbase" tabindex="63">
         <?					
						$result1=mysql_query("select * from ".$dbprefix."location_base order by cid asc");
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
	 <tr> 
      <td width="23%" valign="top" align="right" >หัวบิล <font color="#ff0000"></font></td>
      <td width="77%">&nbsp; <input type="text" name="bill_ref" id="bill_ref" size="5" maxlength="5" value="<?=$bill_ref?>"></td>
    </tr>

    </tr>
    <tr style="display:none">
      <td align="right">ส่วนลด&nbsp;</td>
      <td>&nbsp; <input type="text" name="discount" size="10" maxlength="5" value="<?=$discount?>" />
        %</td>
    </tr>
    <tr> 
        <td width="23%" align="right">&nbsp;</td>
        <td width="77%">&nbsp;</td>
    </tr>
    <tr> 
      <td width="23%" valign="top" align="right" >&nbsp;</td>
      <td width="77%">
	  <input name="button" id="button" type="button" onClick="<?=(isset($_GET['inv_code'])?"einventcheck()":"iinventcheck()")?>" value="ตรวจสอบ" />
             &nbsp;
             <input type="submit" value="บันทึก"  name="ok"   id="ok"   disabled="disabled" />
             &nbsp;
          <input name="reset" id="reset" type="reset"  onclick="window.location='index.php?sessiontab=5&sub=2'" value="ยกเลิก" />    </tr>
  </table>

</form>
</td>
     <td width="40%">
      <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font></div></td>
   </tr>
 </table>
     