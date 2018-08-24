<? include("connectmysql.php");?>
<?

	mysql_query("SET NAMES 'utf8'");
	$sql = "SELECT * FROM amphur WHERE provinceId='".$_GET['val']."' order by amphurName asc  ";
	//echo $sql;
	$rs = mysql_query($sql);
	?>
    <input size="5" style="border:0; text-align:right;" type="text" value="อำเภอ"/>&nbsp;
    <select name="amphur" id="amphur" style="width:150px;" tabindex="48" onchange="startAddressRQ('district',this.value)"><?
	for($i=0;$i<mysql_num_rows($rs);$i++){
		if($i==0){
			$defamphur = mysql_result($rs,$i,"amphurId");
		}
		echo "<option value='".mysql_result($rs,$i,"amphurId")."'>".mysql_result($rs,$i,"amphurName")."</option>";
	}
?>
	</select>
	<div id="districtSection">
    <?
	mysql_query("SET NAMES 'utf8'");
	$sql = "SELECT * FROM district WHERE provinceId='".$_GET['val']."' AND amphurId='$defamphur' order by districtName asc  ";
	//echo $sql;
	$rs = mysql_query($sql);
	?>
    <input size="5" style="border:0; text-align:right;" type="text" value="ตำบล"/>&nbsp;
    <select name="district" id="district" style="width:150px;" tabindex="49"><?
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$zip = mysql_result($rs,$i,"zipcode");
		echo "<option value='".mysql_result($rs,$i,"districtId")."'>".mysql_result($rs,$i,"districtName")."</option>";
	}
?>
	</select>

    </div>
	<? 			
	//echo "<script language='JavaScript'>document.getElementById('zip_1').value = $zip;</script>";	
?>


