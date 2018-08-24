<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script><script language="javascript" type="text/javascript" src="./js/newcheck.js"></script><script language="javascript">var xmlHttp;function iaroundcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('rcode').value;
	var field = "rcode";
	var flag = "1-0-0-1-0";
	var errDesc = "รหัสรอบ";
	
	val = val + ","+document.getElementById('rdate').value;
	field = field +",rdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่เพิ่มรอบ";
	
	val = val + ","+document.getElementById('fdate').value;
	field = field +",fdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่เริ่มต้น";
	
	val = val + ","+document.getElementById('tdate').value;
	field = field +",tdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่สิ้นสุด";

	val = val + ","+document.getElementById('fpdate').value;
	field = field +",fpdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่เริ่มต้นการรักษายอด";
	
	val = val + ","+document.getElementById('tpdate').value;
	field = field +",tpdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่สิ้นสุดการรักษายอด";
	
	val = val + ","+document.getElementById('paydate').value;
	field = field +",paydate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่จ่าย";
	
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"pround","checkstate");
}
function earoundcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('rcode').value;
	var skipval = document.getElementById('orcode').value;
	var field = "rcode";
	var flag = "1-0-0-1-0";
	var errDesc = "รหัสรอบ";
	
	val = val + ","+document.getElementById('rdate').value;
	skipval = skipval+",";
	field = field +",rdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่เพิ่มรอบ";
	
	val = val + ","+document.getElementById('fdate').value;
	skipval = skipval+",";
	field = field +",fdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่เริ่มต้น";
	
	val = val + ","+document.getElementById('tdate').value;
	skipval = skipval+",";
	field = field +",tdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่สิ้นสุด";

	val = val + ","+document.getElementById('fpdate').value;
	skipval = skipval+",";
	field = field +",fpdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่เริ่มการรักษายอด";
	
	val = val + ","+document.getElementById('tpdate').value;
	skipval = skipval+",";
	field = field +",tpdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่สิ้นสุดการรักษายอด";
	
	val = val + ","+document.getElementById('paydate').value;
	skipval = skipval+",";
	field = field +",paydate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่จ่าย";

	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);
	startRQ(field,val,skipval,flag,errDesc,"pround","checkstate");
}
</script>
<?
if($_GET['rid']){
		$sql = "SELECT * FROM ".$dbprefix."pround WHERE rid='".$_GET['rid']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
		?><table width="50%" align="center"><tr><td bgcolor="#990000" align="center"><font color="#FFFFFF">ไม่พบข้อมูลตามเงื่อนไข</font></td></tr><tr>
		</tr><td align="center">[<a href="javascript:window.location='index.php?sessiontab=3';">ไปหน้าสินค้า</a>]</td></tr></table><?
			exit;
		}else{
			$row = mysql_fetch_object($rs);
			$rcode = $row->rcode;
			$oid = $row->rid;
			$rdate = $row->rdate;
			$fdate = $row->fdate;
			$tdate = $row->tdate;
			$fpdate = $row->fpdate;
			$tpdate = $row->tpdate;
			$paydate = $row->paydate;
			$calc = $row->calc;
			$remark = $row->remark;
		}
}else{
		$sql = "SELECT MAX(rcode) AS maxs FROM ".$dbprefix."pround ";
		$rs = mysql_query($sql);
		$rcode = mysql_result($rs,0,'maxs')+1;
		mysql_free_result($rs);
}
?>
<table width="95%" border="0">
   <tr>
     <td width="63%">
<form name="form1" method="post" action="./comsn/com_p/proundoperate.php?state=<?=$_GET['rid']==""?0:1?>">
<table width="98%" border="0">
  
  <tr>
    <td width="34%" align="right">รอบที่&nbsp;</td>
    <td width="66%">
      <input type="text" name="rcode" size="10" value="<?=$rcode?>"> <input type="hidden" name="orcode" size="10"  value="<?=$rcode?>"><input type="hidden" name="oid" value="<?=$oid?>" ></td>
  </tr>
  <tr>
    <td align="right">วันที่&nbsp;</td>
    <td><input type="text" id="rdate" name="rdate" value="<?=$rdate==""?date("Y-m-d"):$rdate?>">
	<input type="hidden" id="ordate" name="ordate" value="<?=$rdate==""?date("Y-m-d"):$rdate?>">
              <a href="javascript:NewCal('rdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a>	</td>
  </tr>
  <tr>
    <td align="right">วันที่เริ่มต้น&nbsp;</td>
    <td><input type="text" id="fdate" name="fdate" value="<?=$fdate?>"> <a href="javascript:NewCal('fdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a>	</td>
  </tr>
  <tr>
    <td align="right">วันที่สิ้นสุด&nbsp;</td>
    <td><input type="text" id="tdate" name="tdate" value="<?=$tdate?>">
	<a href="javascript:NewCal('tdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a>	</td>
  </tr>
  <tr style="display:none">
    <td align="right">วันที่เริ่มการรักษายอด&nbsp;</td>
    <td><input type="text" id="fpdate" name="fpdate" value="<?=$fpdate?>"> <a href="javascript:NewCal('fpdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a>	</td>
  </tr>
  <tr style="display:none">
    <td align="right">วันที่สิ้นสุดการรักษายอด&nbsp;</td>
    <td><input type="text" id="tpdate" name="tpdate" value="<?=$tpdate?>">
	<a href="javascript:NewCal('tpdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a>	</td>
  </tr>
  <tr>
    <td align="right">วันที่จ่าย&nbsp;</td>
    <td><input type="text" id="paydate" name="paydate" value="<?=$paydate?>">
	<a href="javascript:NewCal('paydate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a>	</td>
  </tr>
  <tr>
    <td align="right">คำนวนแล้ว&nbsp;</td>
    <td><input type="checkbox" name="calc" id="calc" value="1"  <?=($calc==1?"checked=\"checked\"":"")?>></td>
  </tr>
  <tr>
    <td align="right">หมายเหตุ&nbsp;</td>
    <td><input type="text" id="remark" name="remark" value="<?=$remark?>" size="60"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="button" type="button" onclick="<?=(isset($_GET['rid'])?"earoundcheck()":"iaroundcheck()")?>" value="ตรวจสอบ" />
             &nbsp;
             <input type="submit" value="บันทึก" name="ok"  disabled="disabled" />
             &nbsp;
            <input name="reset" type="reset"  onclick="window.location='index.php?sessiontab=4&sub=22'" value="ยกเลิก" /></td>
  </tr>
</table>
</form><td width="37%">
      <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font></div></td>
   </tr>
 </table>
