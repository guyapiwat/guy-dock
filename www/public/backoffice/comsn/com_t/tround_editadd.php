<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">var xmlHttp;function iaroundcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('rcode').value;
	var field = "rcode";
	var flag = "1-0-0-1-0";
	var errDesc = "รหัสรอบ";
	
	val = val + ","+document.getElementById('dateInput1').value;
	field = field +",rdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่เพิ่มรอบ";
	
	val = val + ","+document.getElementById('dateInput2').value;
	field = field +",fdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่เริ่มต้น";
	
	val = val + ","+document.getElementById('dateInput3').value;
	field = field +",tdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่สิ้นสุด";
	
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"promotion","checkstate");
}
function earoundcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('rcode').value;
	var skipval = document.getElementById('orcode').value;
	var field = "rcode";
	var flag = "1-0-0-1-0";
	var errDesc = "รหัสรอบ";
	
	val = val + ","+document.getElementById('dateInput1').value;
	skipval = skipval+",";
	field = field +",rdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่เพิ่มรอบ";
	
	val = val + ","+document.getElementById('dateInput2').value;
	skipval = skipval+",";
	field = field +",fdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่เริ่มต้น";
	
	val = val + ","+document.getElementById('dateInput3').value;
	skipval = skipval+",";
	field = field +",tdate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่สิ้นสุด";

	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);
	startRQ(field,val,skipval,flag,errDesc,"promotion","checkstate");
}
</script>
<?
if($_GET['rid']){
		$sql = "SELECT * FROM ".$dbprefix."promotion WHERE rid='".$_GET['rid']."' LIMIT 1";
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
			$firstseat = $row->firstseat;
			$secondseat = $row->secondseat;
			$rincrease = $row->rincrease;
			$rurl = $row->rurl;
			$strName = $row->name;
			$calc = $row->calc;
			$remark = $row->remark;
			$rtype = $row->rtype;
			$tshow = $row->tshow;
		}
}else{
		$sql = "SELECT MAX(rcode) AS maxs FROM ".$dbprefix."promotion ";
		$rs = mysql_query($sql);
		$rcode = mysql_result($rs,0,'maxs')+1;
		mysql_free_result($rs);
}
?>
<table width="95%" border="0">
   <tr>
     <td width="63%">
<form name="form1" method="post" action="./comsn/com_t/troundoperate.php?state=<?=$_GET['rid']==""?0:1?>">
<table width="98%" border="0">
  
  <tr>
    <td width="34%" align="right">รอบที่&nbsp;</td>
    <td width="66%">
      <input type="text" name="rcode" id="rcode" size="10" value="<?=$rcode?>"> <input type="hidden" name="orcode" id="orcode" size="10"  value="<?=$rcode?>"><input type="hidden" name="oid" id="oid" value="<?=$oid?>" ></td>
  </tr>
  <tr>
    <td align="right">วันที่&nbsp;</td>
    <td>

	<input type="text" id="dateInput1" name="rdate" value="<?=$rdate==""?date("Y-m-d"):$rdate?>">
	<input type="hidden" id="ordate" name="ordate" value="<?=$rdate==""?date("Y-m-d"):$rdate?>">
	 
	</td>
  </tr>
  <tr>
    <td align="right">ชื่อ&nbsp;</td>
    <td><input type="text" id="strName" name="strName" id="strName" value="<?=$strName?>" size="60"></td>
  </tr>
  <tr>

    <td align="right">วันที่เริ่มต้น&nbsp;</td>
    <td><input type="text" id="dateInput2" name="fdate" value="<?=$fdate?>"> 

	</td>
  </tr>
  <tr>
    <td align="right">วันที่สิ้นสุด&nbsp;</td>
    <td>
	
	<input type="text" id="dateInput3" name="tdate" value="<?=$tdate?>">
	
	</td>
  </tr>
   <tr style="display:none">
    <td align="right">First Seat&nbsp;</td>
    <td><input type="text" id="firstseat" name="firstseat"  value="<?=$firstseat?>" size="60"></td>
  </tr>
    <tr style="display:none">
    <td align="right">Second Seat&nbsp;</td>
    <td><input type="text" id="secondseat" name="secondseat"  value="<?=$secondseat?>" size="60"></td>
  </tr>
    <tr style="display:none">
    <td align="right">% Increase&nbsp;</td>
    <td><input type="text" id="rincrease" name="rincrease"  value="<?=$rincrease?>" size="60"></td>
  </tr>
    <tr>
    <td align="right">Full URL&nbsp;</td>
    <td><input type="text" id="rurl" name="rurl"  value="<?=$rurl?>" size="60"></td>
  </tr>
  </tr>
    <tr>
    <td align="right">Big Trip&nbsp;</td>
    <td>
      <input type="radio" name="rtype" id="rtype"  value="1" tabindex="10"  <? if($rtype=="1") echo "checked=\"checked\"";else echo "checked=\"checked\""  ?>>Big Trip
 </td>
  </tr>
     <tr>
    <td align="right">Show&nbsp;</td>
    <td><input type="radio"  name="tshow" id="tshow" value="0" tabindex="10"  <? if($tshow=="0" or empty($tshow)) echo "checked=\"checked\""; ?>>Not Show
      <input type="radio" name="tshow" id="tshow"  value="1" tabindex="10"  <? if($tshow=="1") echo "checked=\"checked\""; ?>>Show
 </td>
  </tr>

   <tr >
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
    <td><input name="button" id="button" type="button" onclick="<?=(isset($_GET['rid'])?"earoundcheck()":"iaroundcheck()")?>" value="ตรวจสอบ" />
             &nbsp;
             <input type="submit" value="บันทึก" name="ok" id="ok"  disabled="disabled" />
             &nbsp;
            <input name="reset" id="reset" type="reset"  onclick="window.location='index.php?sessiontab=4&sub=44'" value="ยกเลิก" /></td>
  </tr>
</table>
</form><td width="37%">
      <div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000"> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font></div></td>
   </tr>
 </table>
