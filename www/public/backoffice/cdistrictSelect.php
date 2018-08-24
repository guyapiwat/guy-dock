<? include("connectmysql.php");?>
<?
	mysql_query("SET NAMES 'utf8'");
	$sql = "SELECT * FROM district WHERE amphurId='".$_GET['val']."'   order by districtName asc ";
	$rs = mysql_query($sql);
	?>
    <input size="5" style="border:0; text-align:right;" type="text" value="ตำบล"/>&nbsp;<select name="cdistrict" id="cdistrict" style="width:150px;" tabindex="61" ><?
	for($i=0;$i<mysql_num_rows($rs);$i++){
		echo "<option value='".mysql_result($rs,$i,"districtId")."'>".mysql_result($rs,$i,"districtName")."</option>";
	}
?>
	</select>

