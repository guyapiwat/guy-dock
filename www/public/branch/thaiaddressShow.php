<? include("connectmysql.php");?>
<script language="javascript" type="text/javascript" src="./js/thaiaddress.js"></script>

<?
	$sql = "SELECT * FROM province  order by provinceName asc ";
	$rs = mysql_query($sql);
	?>
    <input size="5" style="border:0; text-align:right;" type="text" value="จังหวัด"/><font color="#ff0000">*</font>&nbsp;
    <select name="province" id="province" style="width:150px;" tabindex="47"  onchange="startAddressRQ('amphur',this.value)"><option></option><?
	for($i=0;$i<mysql_num_rows($rs);$i++){
		echo "<option value='".mysql_result($rs,$i,'provinceId')."' ".($provinceId==mysql_result($rs,$i,'provinceId')?"selected":"").">".mysql_result($rs,$i,'provinceName')."</option>";
	}
?>
	</select>
<?
	$sql = "SELECT * FROM amphur WHERE provinceId='$provinceId'  order by amphurName asc ";
	$rs = mysql_query($sql);
	?>     
<div id="amphurSection">
	<input size="5" style="border:0; text-align:right;" type="text" value="<?=$wording_lan["word"]["amper"]?>"/><font color="#ff0000">*</font>&nbsp;
    <select name="amphur" id="amphur" style="width:150px;" tabindex="48"  onchange="startAddressRQ('district',this.value)"><option></option>
	<? for($i=0;$i<mysql_num_rows($rs);$i++){
		echo "<option value='".mysql_result($rs,$i,'amphurId')."' ".($amphurId==mysql_result($rs,$i,'amphurId')?"selected":"").">".mysql_result($rs,$i,'amphurName')."</option>";
	}?>
	</select>
<?
	$sql = "SELECT * FROM district WHERE provinceId='$provinceId' AND amphurId='$amphurId'  order by districtName asc ";
	//echo $districtId.' : '.$sql;
	$rs = mysql_query($sql);
	?>     
	<div id="districtSection">
    <input size="5" style="border:0; text-align:right;" type="text" value="<?=$wording_lan["word"]["tumbon"]?>"/><font color="#ff0000">*</font>&nbsp;
    <select name="district" id="district" style="width:150px;" tabindex="49" ><option></option>
	<? for($i=0;$i<mysql_num_rows($rs);$i++){
		echo "<option value='".mysql_result($rs,$i,'districtId')."' ".($districtId==mysql_result($rs,$i,'districtId')?"selected":"").">".mysql_result($rs,$i,'districtName')."</option>";
	}?>
        </select>
	</div>
</div>