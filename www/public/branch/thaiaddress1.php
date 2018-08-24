<? include("connectmysql.php");?>
<script language="javascript" type="text/javascript" src="./js/thaiaddress.js"></script>
<?
	$sql = "SELECT * FROM province  order by provinceName asc";
	$rs = mysql_query($sql);
	?>
    <input size="5" style="border:0; text-align:right;" type="text" value="<?=$wording_lan["word"]["province"]?>"/>&nbsp;
    <select name="province" id="province" style="width:150px;" disabled="disabled" tabindex="47" onchange="startAddressRQ('amphur',this.value)"><option></option><?
	for($i=0;$i<mysql_num_rows($rs);$i++){
		echo "<option value='".mysql_result($rs,$i,'provinceId')."'>".mysql_result($rs,$i,'provinceName')."</option>";
	}
?>
	</select>
<div id="amphurSection">
	<input size="5" style="border:0; text-align:right;" type="text" value="<?=$wording_lan["word"]["amper"]?>"/>&nbsp;
    <select name="amphur" id="amphur" style="width:150px;" disabled="disabled" tabindex="48"><option></option>
	</select>

	<div id="districtSection">
    <input size="5" style="border:0; text-align:right;" type="text" value="<?=$wording_lan["word"]["tumbon"]?>"/>&nbsp;
    <select name="district" id="district" style="width:150px;" disabled="disabled" tabindex="49"><option></option>
        </select>
	</div>
</div>