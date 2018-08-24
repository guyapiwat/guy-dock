<? include("connectmysql.php");?>
<script language="javascript" type="text/javascript" src="./js/thaiaddress.js"></script>

<?
	$sql = "SELECT * FROM province  order by provinceName asc";
	$rs = mysql_query($sql);
	?>
    <input size="5" style="border:0; text-align:right;" type="text" value="¨Ñ§ËÇÑ´"/>&nbsp;<select name="cprovince" id="cprovince" style="width:150px;"  tabindex="59"  onchange="startAddressRQ('camphur',this.value)"><option></option><?
	for($i=0;$i<mysql_num_rows($rs);$i++){
		echo "<option value='".mysql_result($rs,$i,'provinceId')."' ".($cprovinceId==mysql_result($rs,$i,'provinceId')?"selected":"").">".mysql_result($rs,$i,'provinceName')."</option>";
	}
?>
	</select>
<?
	$sql = "SELECT * FROM amphur WHERE provinceId='$cprovinceId'  order by amphurName asc ";
	$rs = mysql_query($sql);
	//echo mysql_result($rs,2,'amphurId');
	//exit;
	?>     
<div id="camphurSection">
	<input size="5" style="border:0; text-align:right;" type="text" value="ÍÓàÀÍ"/>&nbsp;<select name="camphur" id="camphur" style="width:150px;"  tabindex="60"  onchange="startAddressRQ('cdistrict',this.value)"><option></option>
	<? for($i=0;$i<mysql_num_rows($rs);$i++){
		echo "<option value='".mysql_result($rs,$i,'amphurId')."' ".($camphurId==mysql_result($rs,$i,'amphurId')?"selected":"").">".mysql_result($rs,$i,'amphurName')."</option>";
	}?>
	</select>
<?
	$sql = "SELECT * FROM district WHERE provinceId='$cprovinceId' AND amphurId='$camphurId'  order by districtName asc ";
	$rs = mysql_query($sql);
	?>     
	<div id="cdistrictSection">
    <input size="5" style="border:0; text-align:right;" type="text" value="µÓºÅ"/>&nbsp;<select name="cdistrict" id="cdistrict" style="width:150px;"  tabindex="61"  ><option></option>
	<? for($i=0;$i<mysql_num_rows($rs);$i++){
		echo "<option value='".mysql_result($rs,$i,'districtId')."' ".($cdistrictId==mysql_result($rs,$i,'districtId')?"selected":"").">".mysql_result($rs,$i,'districtName')."</option>";
	}?>
        </select>
	</div>
</div>