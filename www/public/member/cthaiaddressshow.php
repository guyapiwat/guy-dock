<? include("connectmysql.php");?>
<script language="javascript" type="text/javascript" src="./js/thaiaddress.js"></script>

<?	$sql = "SELECT * FROM province order by provinceName asc ";
	$rs = mysql_query($sql);
	?>
    <div class="profile-info-row">
		<div class="profile-info-name"><?=$wording_lan["province"]?></div>
		<div class="profile-info-value">
			<div class="controls">
				<select class="span4" name="cprovince" id="cprovince"  tabindex="47" onchange="startAddressRQ('camphur',this.value)">
					<option value=''></option>
					<?
					for($i=0;$i<mysql_num_rows($rs);$i++){
						echo "<option value='".mysql_result($rs,$i,'provinceId')."' ".($cprovince==mysql_result($rs,$i,'provinceId')?"selected":"").">".mysql_result($rs,$i,'provinceName')."</option>";
					}
					?>
				</select>
			</div> 
		</div>
	</div>

<?
$sql = "SELECT * FROM amphur WHERE provinceId='$provinceId'  order by amphurName asc  ";
$rs = mysql_query($sql);
?>     
<div class="profile-info-row" id="camphurSection">
	<div class="profile-info-name"><?=$wording_lan["amphur"]?> </div>
	<div class="controls">
		<div class="profile-info-value">
			<select class="span4" name="camphur" id="camphur"  tabindex="48" onchange="startAddressRQ('cdistrict',this.value)">
			<? for($i=0;$i<mysql_num_rows($rs);$i++){
				echo "<option value='".mysql_result($rs,$i,'amphurId')."' ".($camphurId==mysql_result($rs,$i,'amphurId')?"selected":"").">".mysql_result($rs,$i,'amphurName')."</option>";
			}?>
			</select>
		</div>
	</div>
</div>
<?
$sql = "SELECT * FROM district WHERE provinceId='$provinceId' AND amphurId='$amphurId'  order by districtName asc  ";
//echo $sql;
$rs = mysql_query($sql);
?>     
<div class="profile-info-row" id="cdistrictSection">
		<div class="profile-info-name"><?=$wording_lan["district"]?></div>
		<div class="controls">
		<div class="profile-info-value">
			<select class="span4" name="cdistrict" id="cdistrict" tabindex="49">
				<? for($i=0;$i<mysql_num_rows($rs);$i++){
					echo "<option value='".mysql_result($rs,$i,'districtId')."' ".($cdistrictId==mysql_result($rs,$i,'districtId')?"selected":"").">".mysql_result($rs,$i,'districtName')."</option>";
				}?>
				</select>
			</div>
		</div>
</div>