<br />
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">

function check(){
	var val = document.getElementById('sendby').value;
	//alert(val);
	var field = "sendby";
	var flag = "1-0-0-0-0";
	var errDesc = "ส่งสินค้าโดย";
	
	val = val + ","+document.getElementById('senddate').value;
	field = field +",senddate";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",วันที่ส่งสินค้า";

	val = val + ","+document.getElementById('sendcode').value;
	field = field +",sendcode";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสที่ส่งสินค้า";

	val = val + ","+document.getElementById('sendname').value;
	field = field +",sendname";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",ชื่อผู้ส่งสินค้า";	
	//alert(val);
//loop check
	document.getElementById('errormsg').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"onlinepoint_h","errormsg","posfrm");
}

</script>
<?
if($_GET['id']){
	$sql = "SELECT * FROM ".$dbprefix."onlinepoint_h  ";
	$sql .= "WHERE id = '".$_GET['id']."' ";
	//echo $sql."<br />";
	$rs = mysql_query($sql);
	$row = mysql_num_rows($rs);
	if($row > 0){
		$info = mysql_fetch_object($rs);
		$sendby = $info->sendby;
		$senddate  = $info->senddate;
		$sendcode  = $info->sendcode;
		$sendname= $info->sendname;
	}
}
?>
<form method="post" name="posfrm" id="posfrm" action="index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$_GET['sub']?>&state=3&operate=<?=$_GET['id']==""?0:1?>"><br />
<input type="hidden" name="refresh_handle" id="refresh_handle" value="<?=microtime()?>" />
<input type="hidden" name="oid" id="oid" value="<?=$_GET['id']?>" />
  <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
    <tr>
      <td align="center">
       <br />
         <table align="center" width="80%">
         <tr>
            <td bgcolor="#EDEDED" align="right" width="120">ส่งสินค้าโดย<font color="#ff0000">*</font></td>
            <td align="left">
            <select name="sendby" id="sendby">
            <option value="" <?=(($sendby=="")?"selected":"")?> >ส่งสินค้าโดย</option>
            <option value="ไม่ระบุ" <?=(($sendby=="ไม่ระบุ")?"selected":"")?> >ไม่ระบุ</option>
            <option value="SMS" <?=(($sendby=="SMS")?"selected":"")?> >SMS</option>
            <option value="รถทัวร์" <?=(($sendby=="รถทัวร์")?"selected":"")?> >รถทัวร์</option>
             <option value="มอเตอร์ไซต์" <?=(($sendby=="มอเตอร์ไซต์")?"selected":"")?> >มอเตอร์ไซต์</option>
            </select>
            </td>
          </tr>
         <tr>
            <td bgcolor="#EDEDED" align="right" >วันที่ส่งสินค้า<font color="#ff0000">*</font></td>
            <td align="left"><input type="text" name="senddate" id="senddate" value="<?=$senddate?>" />&nbsp;<a href="javascript:NewCal('senddate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a> <font color="#808080">(ปปปป-ดด-วว)</font></td>
          </tr>
          <tr>
            <td bgcolor="#EDEDED" align="right">&nbsp;รหัสที่ส่งสินค้า<font color="#ff0000">*</font></td>
            <td align="left">
              <input type="text" name="sendcode" id="sendcode" value="<?=$sendcode?>" />
            </td>
          </tr>
          <tr>
            <td bgcolor="#EDEDED" align="right">ชื่อผู้ส่งสินค้า<font color="#ff0000">*</font></td>
            <td align="left"><input type="text" name="sendname" id="sendname" value="<?=$sendname?>" /></td>
          </tr>
        </table>
        <hr width="50%" />
        <font color="#808080"><u>หมายเหตุ</u></font> <font color="#ff0000">*</font><font color="#808080">=จำเป็นต้องกรอกข้อมูล</font>
        </td>
    </tr>
    <tr>
      <td align="center" ><br /><div id="errormsg"></div><br /></td>
    </tr>
    <tr>
      <td align="center">&nbsp;
        <input type="button" name="b1" id="b1" value="ตรวจสอบ" onclick="check()"  />
      	&nbsp;
         <input type="submit" name="ok" id="ok" value="บันทึก" disabled="disabled" />
        &nbsp;
        <input name="reset" type="reset"  onclick="window.location='index.php?sessiontab=<?=$_GET['sessiontab']?>&sub=<?=$_GET['sub']?>'" value="ยกเลิก" /></td>
    </tr>
  </table>
</form>
<br /><br />