<? include("connectmysql.php");?>
<script language="javascript" type="text/javascript" src="./js/thaiaddress.js"></script>
<?
	$sql = "SELECT * FROM province order by provinceName asc";
	$rs = mysql_query($sql);
	?>
    <input size="5" style="border:0; text-align:right;" type="text" value="<?=$wording_lan["word"]["province"]?>"/><font color="#ff0000">*</font>&nbsp;<select name="cprovince" id="cprovince" style="width:150px;"  tabindex="59"  onchange="startAddressRQ('camphur',this.value)"><option></option><?
	for($i=0;$i<mysql_num_rows($rs);$i++){
		echo "<option value='".mysql_result($rs,$i,'provinceId')."'>".mysql_result($rs,$i,'provinceName')."</option>";
	}
?>
	</select>
<div id="camphurSection">
	<input size="5" style="border:0; text-align:right;" type="text" value="<?=$wording_lan["word"]["amper"]?>"/><font color="#ff0000">*</font>&nbsp;<select name="camphur" id="camphur" style="width:150px;"  tabindex="60" ><option></option>
	</select>

	<div id="cdistrictSection">
    <input size="5" style="border:0; text-align:right;" type="text" value="<?=$wording_lan["word"]["tumbon"]?>"/><font color="#ff0000">*</font>&nbsp;<select name="cdistrict" id="cdistrict" style="width:150px;"  tabindex="61" ><option></option>
        </select>
	</div>
</div>