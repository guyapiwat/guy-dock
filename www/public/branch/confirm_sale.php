<? require "adminchecklogin.php";?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php");?>
<script language="javascript" type="text/javascript" src="datetimepick/datetimepicker.js"></script>
<script language="javascript">
var wi=null;
function get_sales_listpicker_mcode(){
		if (wi) wi.close();
		wi=window.open("sales_a_listpicker_mcode.php?name=" + "กz" + "","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_sales_listpicker_pcode(idx){
		if (wi) wi.close();
		wi=window.open("sales_a_listpicker_pcode.php?idx=" + idx + "","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
</script>

<script language="javascript">
function isnumeric(expression) {
	var nums = "0123456789.-,";
	if (expression.length==0)return(false);
	for (var n=0; n < expression.length; n++){
		if(nums.indexOf(expression.charAt(n))==-1)return(false);
	}
	return(true);
}

function calc_total(idx){
	var total=0;
	var total_pv=0;
	if(isnumeric(document.frm.elements["price[]"][idx].value) && isnumeric(document.frm.elements["qty[]"][idx].value)){
		document.frm.elements["amt[]"][idx].value = (document.frm.elements["price[]"][idx].value) * (document.frm.elements["qty[]"][idx].value);
	}
	//$max_item=20
	for(var i=0;i<10;i++){
		if(isnumeric(document.frm.elements["price[]"][i].value) && isnumeric(document.frm.elements["qty[]"][i].value)){
			document.frm.elements["amt[]"][i].value = (document.frm.elements["price[]"][i].value) * (document.frm.elements["qty[]"][i].value);
			total+=(document.frm.elements["price[]"][i].value) * (document.frm.elements["qty[]"][i].value);
		}
		if(isnumeric(document.frm.elements["pv[]"][i].value) && isnumeric(document.frm.elements["qty[]"][i].value)){
			total_pv+=(document.frm.elements["pv[]"][i].value) * (document.frm.elements["qty[]"][i].value);
		}
	}
	document.frm.total.value=total;
	document.frm.tot_pv.value=total_pv;
}
function check(arg){
	alert(arg);
}
</script>

<? 
require_once 'function.php';?>
<?php
if (isset($_GET["edit"])){$edit=$_GET["edit"];}else{$edit="";}
if (isset($_GET["sid"])){$oid=$_GET["sid"];}else{$oid="";}
if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}
if (isset($_GET["dosave"])){$dosave=$_GET["dosave"];}else{$dosave="";}
if (isset($_GET["page"])){$page=$_GET["page"];}else{$page="";}
// connect to database 
require 'connectmysql.php';
if($_GET['dosave']==1){
	$oktosave=true;
	// ตรวจสอบ
	if($C1=='') {
		$oktosave=false;
		echo "<font color='#FF0000'>ไม่ได้ยืนยัน ข้อมูลถูกต้อง</font><br>";
	}
	if($mcode=='') {
		$oktosave=false;
		echo "<font color='#FF0000'>รหัสสมาชิก ไม่ได้ป้อน</font><br>";
	}else{
		//for ($i=strlen($mcode);$i<7;$i++) {$mcode="0".$mcode;}
		// ตรวจสอบว่ามี member ว่าอยู่ฐานข้อมูลหรือไม่
		$result1=mysql_query("select * from ".$dbprefix."member where mcode='$mcode'");
		if (mysql_num_rows($result1) == 0) {
				$oktosave=false;
				echo "<font color='#FF0000'>รหัสสมาชิก $mcode ไม่มีอยู่ในฐานข้อมูล</font><br>";
		}
		mysql_free_result($result1);
	}
	if($sadate=='') {
		$oktosave=false;
		echo "<font color='#FF0000'>วันที่บิล ไม่ได้ป้อน</font><br>";
	}
	else{
		if (! isvaliddate($sadate)) {
			$oktosave=false;
			echo "<font color='#FF0000'>วันที่บิล ไม่ถูกต้อง</font><br>";
		}
	}
	for ($i=0;$i<$max_item;$i++) {
		if( $pcode[$i]<>""){
			if (get_data("pdesc","product","pcode='".$pcode[$i]."' ")===false){
				$oktosave=false;
				echo "<font color='#FF0000'>ไม่พบ สินค้า ".$pcode[$i]."</font><br>";
			}
			if( $price[$i] <>""){
				if (! is_numeric($price[$i])){
					$oktosave=false;
					echo "<font color='#FF0000'>สินค้า ".$pcode[$i]." ราคา ไม่ถูกต้อง</font><br>";
				}
			}
			if( $pv[$i] <>""){
				if (! is_numeric($pv[$i])){
					$oktosave=false;
					echo "<font color='#FF0000'>สินค้า ".$pcode[$i]." pv ไม่ถูกต้อง</font><br>";
				}
			}
			if( $qty[$i] <>""){
				if (! is_numeric($qty[$i])){
					$oktosave=false;
					echo "<font color='#FF0000'>สินค้า ".$pcode[$i]." จำนวน ไม่ถูกต้อง</font><br>";
				}
			}
		}
	}

	// บันทึกรายการเพิ่ม
	if ($oktosave){
		// หัวบิล
		//คำนวณ total, tot_pv
		$total=0;
		$tot_pv=0;
		for ($i=0;$i<$max_item;$i++) {
			if( $pcode[$i]<>""){
				$amt[$i]=$qty[$i]*$price[$i];
				$total+=$qty[$i]*$price[$i];
				$tot_pv+=$qty[$i]*$pv[$i];
			}
		}
		$sql="insert into ".$dbprefix."asaleh (sano,sadate,sa_type,inv_code,mcode,total,tot_pv,tot_bv,remark,uid,dl) values ('$sano','$sadate','$sa_type','$inv_code','$mcode','".$_POST['total']."','".$_POST['tot_pv']."','$tot_bv','$remark','".$_SESSION["adminuserid"]."','') ";
		//echo $sql;
		//====================LOG===========================
		$text="uid=".$_SESSION["adminuserid"]." action=confirm_sale =>$sql";
		writelogfile($text);
		//=================END LOG===========================
		if (! mysql_query($sql)) {
			echo "<font color='#FF0000'>Error sql=$sql</font><br>";
			echo "<font color='#FF0000'>มีข้อผิดพลาด ในคำสั่ง SQL บันทึกไม่ได้</font><br>";
		}
		else {
			$preoid = $oid;
			$oid=mysql_insert_id();
			mysql_query("COMMIT");
			// รายละเอียดในบิล
			$sql="delete from ".$dbprefix."asaled where sano='$oid' ";
			//====================LOG===========================
		$text="uid=".$_SESSION["adminuserid"]." action=confirm_sale =>$sql";
		writelogfile($text);
		//=================END LOG===========================
			mysql_query($sql);
			for ($i=0;$i<$max_item;$i++) {
				if ($pcode[$i]<>""){
					$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,bv,qty,amt) values ('$oid','".$pcode[$i]."','".$pdesc[$i]."','".$price[$i]."','".$pv[$i]."','".$bv[$i]."','".$qty[$i]."','".$amt[$i]."') ";
					//====================LOG===========================
		$text="uid=".$_SESSION["adminuserid"]." action=confirm_sale =>$sql";
		writelogfile($text);
		//=================END LOG===========================
					mysql_query($sql);
				}
			}
			//====================LOG===========================
		$text="uid=".$_SESSION["adminuserid"]." action=confirm_sale =>DELETE FROM ".$dbprefix."preasaleh WHERE id='$preoid'";
		writelogfile($text);
		//=================END LOG===========================
			mysql_query("DELETE FROM ".$dbprefix."preasaleh WHERE id='$preoid' ");
			//echo "DELETE FROM ".$dbprefix."preasaleh WHERE id='$oid' ";
			//====================LOG===========================
		$text="uid=".$_SESSION["adminuserid"]." action=confirm_sale =>DELETE FROM ".$dbprefix."preasaled WHERE sano='$preoid' ";
		writelogfile($text);
		//=================END LOG===========================
			mysql_query("DELETE FROM ".$dbprefix."preasaled WHERE sano='$preoid' ");

			echo "<br /><br /><br /><br /><br /><br /><p align='center'><font color='#339900'>บันทึกข้อมูลการสั่งซื้อของสมาชิก $mcode ชื่อ $name_t แล้ว ... </font><img src='images/correctsign.gif' width='16' height='16'></p><br>";
			echo "<script language='JavaScript'>opener.location.reload()</script>";
			$rs = mysql_query("SELECT id FROM ".$dbprefix."preasaleh WHERE id>'$preoid' AND sadate='".$_GET['dt']."' ORDER BY sadate LIMIT 1");//
			//echo "SELECT id FROM ".$dbprefix."premember WHERE mdate='".$_GET['dt']."' ORDER BY mdate LIMIT 1";
			if(mysql_num_rows($rs)>0)
				echo "<p align='center'>[<a href=\"./confirm_sale.php?dt=".$_GET['dt']."&sid=".mysql_result($rs,0,'id')."\">ถัดไป</a>]</p>";
			else
				echo "<p align='center'>[<a href=\"javascript:window.close();\">ปิดหน้านี้</a>]</p>";
			// แสดงใบสั่งซื้อสินค้า เพื่อพิมพ์
			exit;

			// reset all fields
			$oid="";
			$sano="";
			//$sadate=date("Y-m-d");
			$sa_type="";
			$inv_code="";
			$mcode="";
			$total=0;
			$tot_pv=0;
			$tot_bv=0;
			$remark="";
			for ($i=0;$i<=$max_item;$i++) {
				$pcode[$i]="";
				$pdesc[$i]="";
				$price[$i]="";
				$pv[$i]="";
				$qty[$i]="";
				$amt[$i]="";
			}
		}
	}
	else {
		echo "<font color='#FF0000'>ข้อมูลยังไม่ถูกต้อง กรุณาแก้ไข</font><br>";
	}
}	

$sid = $_GET['sid'];
$result=mysql_query("select * from ".$dbprefix."preasaleh where id='$sid'");
if (mysql_num_rows($result) > 0) {
	$row = mysql_fetch_object($result);
	$sano=$row->sano;
	$sadate=$row->sadate;
	$sa_type=$row->sa_type;
	$inv_code=$row->inv_code;
	$mcode=$row->mcode;
	$total=$row->total;
	$tot_pv=$row->tot_pv;
	$tot_bv=$row->tot_bv;
	$remark=$row->remark;
	$dl=$row->dl;
	
	// อ่านรายละเอียด
	$result1=mysql_query("select * from ".$dbprefix."preasaled where sano='$sid' order by id");
	for ($i=0;$i<=mysql_num_rows($result1);$i++){
		$row1 = mysql_fetch_object($result1);
		$pcode[$i]=$row1->pcode;
		$pdesc[$i]=$row1->pdesc;
		$price[$i]=$row1->price;
		$pv[$i]=$row1->pv;
		$bv[$i]=$row1->bv;
		$qty[$i]=$row1->qty;
		$amt[$i]=$row1->amt;
	}
	mysql_free_result($result1);
}
//ตรวจสอบว่า $cmc อยู่ใน INV_CODE นี้หรือไม่

?>
<form name="frm" method="post" action="<? $_SERVER["PHP_SELF"]?>?dt=<?=$_GET['dt']?>&dosave=1">
  <table border="0" cellpadding="0" cellspacing="0" width="100%" >
    <tr>
      <td width="11%" align="right">เลขที่บิล &nbsp;</td>
      <td width="16%" align="left"><input type="text" name="sano" size="10" value="<?=$sano?>"><input type="hidden" name="oid" value="<?=$sid?>"></td>
      <td width="7%" align="right">วันที่ &nbsp;</td>
      <td width="41%" align="left"><input type="text" name="sadate" size="10" maxlength=10 value="<?=$sadate?>">&nbsp;<a href="javascript:NewCal('sadate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a> <font color="808080">(ปปปป-ดด-วว)</font></td>
      <td width="25%">&nbsp;</td>
    </tr>
    <tr>
      <td width="11%" align="right">รหัสสมาชิก &nbsp;</td>
	  <td valign="top" align="left" colspan="3"><input type="text" name="mcode" size="20" maxlength="20" value="<?=$mcode?>"> <input type="button" value="เลือก" onClick="get_sales_listpicker_mcode()"> &nbsp;<div id="name_t"><?=$name_t?></div></td>
	  <td width="25%">&nbsp;	  </td>
	</tr> 	
    <tr>
      <td width="11%" align="right">&nbsp;</td>
      <td align="left" colspan="4">
		<input type="radio" name="sa_type" value="T" <? if($sa_type=='T' or $sa_type=='' ){echo " checked";}?>> ไตรนารี่ &nbsp;&nbsp;
		<input type="radio" name="sa_type" value="QM" <? if($sa_type=='QM'){echo " checked";}?>> รักษายอด Matching &nbsp;&nbsp;
		<input type="radio" name="sa_type" value="U" <? if($sa_type=='U'){echo " checked";}?>> ซื้อ Unilevel &nbsp;&nbsp;
	  </td>
    </tr>
    <tr>
      <td width="11%" align="right">หมายเหตุ &nbsp;</td>
      <td align="left" colspan="4"><input type="text" name="remark" size="80" value="<?=$remark?>"><BR><BR></td>
    </tr>
  </table>

<?/////////////////////////// รายการ ///////////////////////////?>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr bgcolor="#80c0ff">
      <td width="5%" align="center">ลำดับ</td>
      <td width="30%" align="center">รหัสสินค้า</td>
      <td width="10%" align="center">รายละเอียดสินค้า</td>
      <td width="5%" align="center">ราคา</td>
      <td width="5%" align="center">PV</td>
      <td width="5%" align="center">จำนวน</td>
      <td width="10%" align="left">จำนวนเงิน</td>
    </tr>
	<?
    $max_item = 10;
	for ($i=0;$i<$max_item;$i++){
		?>
		<tr <? if (($i % 2)<>1) {echo "bgcolor=d0e0ff";}?>>
		  <td width="5%" align="center"><?=$i+1?></td>
		  <td width="30%" align="center"><input type="text" name="pcode[]" size="20" maxlength=20 value="<?=$pcode[$i]?>"> <input type="button" value="เลือก" onClick="get_sales_listpicker_pcode(<?=$i?>)"> </td>
		  <td width="10%" align="center"><input type="text" name="pdesc[]" size="40" value="<?=$pdesc[$i]?>"></td>
		  <td width="5%" align="center"><input style="text-align:right" type="text" name="price[]" size="7" value="<?=$price[$i]?>"></td>
		  <td width="5%" align="center"><input style="text-align:right" onChange="check(<?=$i?>)" type="text" name="pv[]" size="7" value="<?=$pv[$i]?>"></td>
		  <td width="5%" align="center"><input style="text-align:right" type="text" name="qty[]" size="7" value="<?=$qty[$i]?>" autocomplete="off"  onKeyUp="calc_total(<?=$i?>)" onBlur="calc_total(<?=$i?>)"></td>
		  <td width="10%" align="left"><input style="text-align:right" type="text" name="amt[]" size="8" value="<?=$amt[$i]?>" autocomplete="off" onFocus="calc_total(<?=$i?>)" onBlur="calc_total(<?=$i?>)"></td>
		</tr>
		<?
	}
	?>
    <tr bgcolor="#d0e0ff">
      <td width="50%" align="right" colspan="4">รวม</td>
      <td width="5%" align="center"><input style="text-align:right " type="text" name="tot_pv" size="7" value="<?=$tot_pv?>"></td>
      <td width="5%" align="center">&nbsp;</td>
      <td width="10%" align="left" colspan="2"><input style="text-align:right " type="text" name="total" size="8" value="<?=$total?>"></td>
    </tr>
  </table>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td width="370" align="right" valign="top" ><input type="checkbox" name="C1" value="ok" onClick="calc_total('1')">
      ข้อมูลถูกต้อง&nbsp;</td>
      <td width="588">&nbsp;
          <input type="submit" value="บันทึก" name="B1" onClick="calc_total('1')>
        &nbsp;
          <input type="button" value="ลบ" name="del" onClick="window.open('./delpremem.php?dt=<?=$_GET['dt']?>&did=<?=$oid?>','del','width=200 height=100')" >
        &nbsp;
          <input type="reset" value="ยกเลิก" name="B2">
        &nbsp;
          <? 
					//echo "SELECT id FROM ".$dbprefix."premember WHERE mdate='".$_GET['dt']."' ORDER BY mdate LIMIT 1";
					$rs = mysql_query("SELECT id FROM ".$dbprefix."preasaleh WHERE id>'$sid' AND sadate='".$_GET['dt']."' ORDER BY id LIMIT 1");
					if(mysql_num_rows($rs)>0)
						echo "<input type='button' value='ถัดไป' onclick=\"window.location='./confirm_sale.php?dt=".$_GET['dt']."&sid=".mysql_result($rs,0,'id')."'\" >";
						//echo "window.location='./confirm.php?dt=".$_GET['dt']."&mid=".mysql_result($rs,0,'id');
						mysql_free_result($rs);
					?>
          <? 
					$rs = mysql_query("SELECT id FROM ".$dbprefix."preasaleh WHERE id<'$sid' AND sadate='".$_GET['dt']."' ORDER BY id DESC LIMIT 1");
					//echo "SELECT id FROM ".$dbprefix."premember WHERE id<'$oid' AND mdate='".$_GET['dt']."' ORDER BY id,mdate DESC LIMIT 1";
					if(mysql_num_rows($rs)>0)
						echo "<input type='button' value='ก่อนหน้า' onclick=\"window.location='./confirm_sale.php?dt=".$_GET['dt']."&sid=".mysql_result($rs,0,'id')."'\" >";
						//echo "window.location='./confirm.php?dt=".$_GET['dt']."&mid=".mysql_result($rs,0,'id');
						mysql_free_result($rs);
					?>      </td>
    </tr>
  </table>
</form>

</body>                       
</html> 

<?
function get_data($field,$table,$field_and_value){
	//อ่านค่า จาก  select $field from $table where $field_and_value
	// $field=field name to get data
	// table=scm_xxxxxx ไม่ต้องใส่ scm
	// $field_and_value="fieldname='value' "
	global $dbprefix;
	$sql="select * from ".$dbprefix."$table where $field_and_value ";
	$result=mysql_query($sql);
	if($result){
		if($row=mysql_fetch_object($result)){
			return $row->$field;
		}
	}
	return false;
}
?>