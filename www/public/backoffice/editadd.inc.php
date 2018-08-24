<?
if($call_from_editadd<>"1"){
	exit;
}
?>
<?
include_once "./datepicker/datepicker.inc.php";
datepicker();
?>

<?
include_once "function.php";
// connect to database 
require 'connectmysql.php';
get_size_maxlength();
?>

<?
function get_size_maxlength(){
	global $dbtable,$numoffield,$fields,$size,$maxlength;
	$result = mysql_query("select * from $dbtable");
	if (!$result) {
		die('Query failed: ' . mysql_error());
	}
	/* get column metadata */
	$i = 0;
	while ($i < mysql_num_fields($result)) {
		$meta = mysql_fetch_field($result, $i);
		if (!$meta) {
			for($j=0;$j<$numoffield;$j++){
				if($fields[$j]==$meta->name){
					$size[$j]='50';
					$maxlength[$j]="";
					break;
				}
			}
		}
		else{
			for($j=0;$j<$numoffield;$j++){
				if($fields[$j]==$meta->name){
					if($size[$j]==""){
						if($meta->type=="string"){
							$size[$j]=mysql_field_len ($result,$i);
							$maxlength[$j]=mysql_field_len ($result,$i);
							if($size[$j]>50){$size[$j]=50;}
							break;
						}
						if($meta->type=='int'){
							//int(1), tinyint(4)
							$size[$j]="20";
							$maxlength[$j]="";
							break;
						}
						if($meta->type=='real'){
							$size[$j]="20";
							$maxlength[$j]="";
							break;
						}
						if($meta->type=='blob'){
							$size[$j]="50";
							$maxlength[$j]="";
							break;
						}
					}
				}
			}
		}
		$i++;
	}
	mysql_free_result($result);
}

?>

<html>
<meta http-equiv="Content-Language" content="th">
<title><?=$htmlTitle?> <? if($edit=='1'){echo "edit";}else{echo "add";}?></title>
<body>
<? // include("header.php")?>
<?
// -------------------- SAVE EDIT --------------------
if ($dosave=="1" and $edit=="1"){		


?>
	<b><font size="+2">แก้ไข <?=$title?></font></b><br>
	<BR>
	[<a href="<?=$mlink?>?page=<?=$page?>">กลับไป รายการ <?=$title?></a>]<br>
	<br>
<?
	// อ่านค่าที่ส่งมาจากการ POST
	$oktosave=true;
	// ตรวจสอบ
	if($C1=='') {
		$oktosave=false;
		echo "<font color='#FF0000'>ไม่ได้ยืนยัน ข้อมูลถูกต้อง</font><br>";
	}
	for($k=0;$k<$numoffield;$k++){
		//ตรวจสอบความถูกต้องของข้อมูลก่อน save
		if(strstr($validatefield,$k)){
			checkvalidatefield($k);
		}
	}

	// บันทึกรายการแก้ไข
	if ($oktosave){
		$sql="update ".$dbtable." set ";
		for ($i=1;$i<$numoffield;$i++) {
			if($i==1){
				$comma="";
			}
			else{
				$comma=",";
			}
			$sql.=$comma." ".$fields[$i]."='".$fieldsval[$i]."' ";
		}
		$sql.= " where ".$fields[0]."=".$oid ;
	if (! mysql_query($sql)) {
				echo "<font color='#FF0000'>error $sql</font><br>";
			}
			else {
				mysql_query("COMMIT");
				echo "<script language='JavaScript'>self.location='$mlink?page=$page'</script>";
				exit; 
			}
	}
			else {
				echo "<font color='#FF0000'>ข้อมูลยังไม่ถูกต้อง กรุณาแก้ไข</font><br>";
			}
	}	
// -------------------- SAVE EDIT --------------------

// -------------------- SAVE ADD -------------------- 
if ($dosave=="1" and $edit==""){
	//echo "save ADD<BR>";
	?>
	<b><font size="+2"></font></b><br>
	<BR>
	[<a href="<?=$mlink?>?page=<?=$page?>">กลับไป รายการ<?=$title?></a>]<br>
	<br>
	<?
	// อ่านค่าที่ส่งมาจากการ POST
	$oktosave=true;
	// ตรวจสอบ
	if($C1=='') {
		$oktosave=false;
		echo "<font color='#FF0000'>ไม่ได้ยืนยัน ข้อมูลถูกต้อง</font><br>";
	}
	for($k=0;$k<$numoffield;$k++){
		//ตรวจสอบความถูกต้องของข้อมูลก่อน save
		if(strstr($validatefield,$k)){
			checkvalidatefield($k);
		}
	}

	// บันทึกรายการแก้ไข
	if ($oktosave){                   
		$sql="insert into ".$dbtable." (";
		for ($i=1;$i<$numoffield;$i++) {
			if($i==1){
				$comma="";
			}
			else{
				$comma=",";
			}
			$sql.=$comma.$fields[$i];
		}
		$sql.=") values (";
		for ($i=1;$i<$numoffield;$i++) {
			if($i==1){
				$comma="";
			}
			else{
				$comma=",";
			}
			$sql.=$comma."'".$fieldsval[$i]."'";
		}
		$sql.=")";
		
		if (! mysql_query($sql)) {
			echo "<font color='#FF0000'>error $sql</font><br>";
		}
		else {
			mysql_query("COMMIT");
			echo "<font color='#339900'>บันทึกข้อมูลแล้ว ... </font><img src='images/correctsign.gif' width='16' height='16'>&nbsp;<br>";
			// reset all fields
			$oid="";
				for ($i=0;$i<$numoffield;$i++) {
					$fieldsval[$i]="";
				}
		}
	}
	else {
		echo "<font color='#FF0000'>ข้อมูลยังไม่ถูกต้อง กรุณาแก้ไข</font><br>";
	}
}	
// -------------------- SAVE ADD -------------------- 

// -------------------- NO SAVE -------------------- 
if ($dosave<>"1"){
	?>
	<b><font size="+2"><? if ($edit=="1") {echo "แก้ไข";} else {echo "เพิ่ม";}?> <?=$title?></font></b><br>
	<BR>
	[<a href="<?=$mlink?>?page=<?=$page?>">กลับไป รายการ<?=$title?></a>]<br>
	<br>
	<?
	if ($edit=="1") {
		$sql="select * from ".$dbtable." where ".$fields[0]."='$oid'";
		$result=mysql_query($sql);
		if (mysql_num_rows($result) > 0) {
			$row = mysql_fetch_assoc($result);
			for ($i=0;$i<$numoffield;$i++) {
					$fieldsval[$i]=$row[$fields[$i]];
				}
		} 
		else {
			echo "เกิดข้อผิดพลาด ไม่พบข้อมูล ที่ต้องการแก้ไข";
			?>
			<br>
			[<a href="<?=$mlink?>?page=<?=$page?>">กลับไป รายการ<?=$title?></a>]&nbsp;&nbsp;
			<br>
			<?//include 'footer.php';?>
			<?
			exit;
		}
	}
	else {// edit="" ///////////////////////////////
		$oid="";
		for ($i=0;$i<$numoffield;$i++) {
			$fieldsval[$i]="";
		}
	}
}
// -------------------- NO SAVE -------------------- 

// แสดงรายการข้อมูล ใบเสนอราคา

?>
<table width="100%" cellpadding=0 cellspacing=0 border=0 bgcolor=80c0ff>
<tr><td align=center height='25'><font size="+2"><B><?=$title?></B></font></td></tr>
</table>
<form method="POST" name="frm" action="<?=$_SERVER["PHP_SELF"]?>?dosave=1<? if ($edit=="1"){echo "&edit=1";}?><? if ($oid<>""){echo "&oid=$oid";}?>&page=<?=$page?>">

  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td width="100%" align=left valign=top>

		  <table border="0" cellpadding="0" cellspacing="0" width="100%" >
			<tr>
			  <td width="<?=$colwidth0?>" align=right valign=top><?=$showname[0]?>&nbsp;</td>
			  <td width="<?=$colwidth0?>" align=left valign=top><input type="text" name="$fields[0]" size="10" readonly value="<?=$fieldsval[0]?>">  
			  <input type="hidden" name="oid" value="<?=$oid?>"></td> 
			</tr>

		<?
		for ($i=1;$i<$numoffield;$i++) {
				echo "<tr>";
				echo"<td width='".$colwidth0."' align='right' valign='top'>".$showname[$i]."&nbsp;</td>";
				if (strstr($optionfield, "$i")){
					echo "<td width='".$colwidth1."' align='left' valign='top'>";
					showoption($i);
					echo "</td>";
				}
				else{
					if (strstr($datefield, "$i")){
						echo"<td width='".$colwidth1."' align='left' valign='top'>";
						showdate($i);
						echo "</td>";
					}
					else{
						if (strstr($checkboxfield, "$i")){
							echo"<td width='".$colwidth1."' align='left' valign='top'>";
							showcheckbox($i);
							echo "</td>";
						}
						else{
							echo"<td width='".$colwidth1."' align='left' valign='top'>";
							echo "<input type='text' name='val$i' size='".$size[$i];
							if($maxlength[$i]<>""){
								echo " maxlength='".$maxlength[$i]."'";
							}
							echo "' value='".$fieldsval[$i]."'>";
							echo "</td>";
						}
					}
				}
				echo "</tr>";
				
		}
		?>
		  </table>

	  </td>
    </tr>
</table>
  <BR>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
	  <td width="<?=$colwidth0?>" align=right valign=top>&nbsp;</td>
      <td width="<?=$colwidth1?>" colspan=2 align=left><input type="checkbox" name="C1" value="ok"><FONT COLOR="ff0000">*</FONT>ข้อมูลถูกต้อง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="บันทึก" name="B1"></td>
    </tr>
  </table>
</form>
<?//include_once "footer.php"?>
</body>
</html>

