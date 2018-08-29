<script language="javascript">
function checkround(){
	if(document.getElementById("ftrcode").value==""){
		alert("กรุณาใส่รอบการคำนวณ");
		document.getElementById("ftrcode").focus();
		return false;
	}
	document.rform.submit();
}
function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
}
</script>
<?
if(!isset($_POST["ftrcode"])){
	showdialog();
}else{ 
	$ro = $_POST["ftrcode"];
?><br />
<table width="95%" border="1" align="center">
  <tr>
    <td align="center"><br />
	<?
		$sql="select count(*) as cnt from ".$dbprefix."cround where rcode='$ro' ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)>0){
			$cnt = mysql_result($rs,0,"cnt");
		}
		if($cnt<1){
			echo "<FONT COLOR=\"ff0000\">ไม่พบ รอบ $ro ที่ต้องการลบ กรุณาใส่รอบที่ต้องการลบใหม่</FONT><BR>";
			showdialog();
			exit;
		}
		

		//bmbonus
		//ลบข้อมูลใน bmbonus ที่อยู่ในรอบ >=$ro
		$sql="delete from ".$dbprefix."cmbonus where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."cc where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."cm where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		$sql="delete from ".$dbprefix."cpv where rcode>= '$ro'  ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}

		//ปรับ CALC ให้เป็น ''
		$sql="update ".$dbprefix."cround set calc='' where rcode>= '$ro'   ";
		if(mysql_query($sql)){
			mysql_query("COMMIT");
		}else{
			echo "error $sql<BR>";
		}
	$sql = "select * from ".$dbprefix."voucher where rcode >= '$ro' and cancel =0  ";
	$rs1 = mysql_query($sql);
	for($j=0;$j<mysql_num_rows($rs1);$j++){
		$sqlObj1 = mysql_fetch_object($rs1);
		$txtMoney = $sqlObj1->txtMoney;
		$bprice = $sqlObj1->bprice;
		$idi = $sqlObj1->id;
		$mmcode = $sqlObj1->mcode;
		mysql_query("update ".$dbprefix."member set voucher = voucher-".$txtMoney.", bvoucher = bvoucher-".$bprice." where mcode = '$mmcode' ");
		mysql_query("delete from ".$dbprefix."voucher where id = '$idi' ");
	}

	$sql2 = "update ".$dbprefix."ambonus set pstatus =0 , prcode =0 WHERE prcode >='$ro' ";
	mysql_query($sql2);
	$sql2 = "update ".$dbprefix."bmbonus set pstatus =0 , prcode =0 WHERE prcode >='$ro' ";
	mysql_query($sql2);	
	$sql2 = "update ".$dbprefix."smbonus set pstatus =0 , prcode =0 WHERE prcode >='$ro' ";
	mysql_query($sql2);
	$sql2 = "update ".$dbprefix."ombonus set pstatus =0 , prcode =0 WHERE prcode >='$ro' ";
	mysql_query($sql2);
	$sql2 = "update ".$dbprefix."dmbonus set pstatus =0 , prcode =0 WHERE prcode >='$ro' ";
	mysql_query($sql2);
	
		echo "ลบการคำนวณ ตั้งแต่รอบที่ $ro เรียบร้อยแล้ว<BR><BR>";

	?>
	</td>
	</tr>
</table>
<br />
<?
}
function showdialog(){
?>
<table width="95%"><tr><td><br />
<form name="rform" method="post" action="./index.php?sessiontab=4&sub=27">
<table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">กรอกรอบการคำนวณรายได้จากการขยายธุรกิจที่ต้องการลบเช่น 1</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="40%" align="right">รอบ&nbsp;&nbsp;</td>
    <td width="60%">
      <input type="text" name="ftrcode" id="ftrcode" onkeypress="return chknum(window.event.keyCode)" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td colspan="2"><input type="button" name="Submit" value="ลบการคำนวณ" onClick="checkround()"></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</td></tr></table>
<?
}
?>