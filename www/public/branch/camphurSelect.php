<? include("connectmysql.php");?>
<script language="javascript" type="text/javascript" src="./js/thaiaddress.js"></script>

<?

	mysql_query("SET NAMES 'utf8'");
	$sql = "SELECT * FROM amphur WHERE provinceId='".$_GET['val']."'  order by amphurName asc ";
	//echo $sql;
	$rs = mysql_query($sql);
	?>
    <input size="5" style="border:0; text-align:right;" type="text" value="&#3629;&#3635;&#3648;&#3616;&#3629;"/><font color="#ff0000">*</font>&nbsp;<select name="camphur" id="camphur" style="width:150px;" tabindex="60"  onChange="startAddressRQ('cdistrict',this.value)"><?
	for($i=0;$i<mysql_num_rows($rs);$i++){
		if($i==0){
			$defamphur = mysql_result($rs,$i,"amphurId");
		}
		echo "<option value='".mysql_result($rs,$i,"amphurId")."'>".mysql_result($rs,$i,"amphurName")."</option>";
	}
?>
	</select>
	<div id="cdistrictSection">
    <?
	mysql_query("SET NAMES 'utf8'");
	$sql = "SELECT * FROM district WHERE provinceId='".$_GET['val']."' AND amphurId='$defamphur'  order by districtName asc ";
	//echo $sql;
	$rs = mysql_query($sql);
	?>
    <input size="5" style="border:0; text-align:right;"  type="text" value="&#3605;&#3635;&#3610;&#3621;"/><font color="#ff0000">*</font>&nbsp;<select name="cdistrict" id="cdistrict" style="width:150px;" tabindex="61" ><?
	for($i=0;$i<mysql_num_rows($rs);$i++){
		echo "<option value='".mysql_result($rs,$i,"districtId")."'>".mysql_result($rs,$i,"districtName")."</option>";
	}
?>
	</select>
    </div>


