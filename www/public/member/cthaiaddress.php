<? include("connectmysql.php");?>
<script language="javascript" type="text/javascript" src="./js/thaiaddress.js"></script>
<?
	$sql = "SELECT * FROM province order by provinceName asc ";
	$rs = mysql_query($sql);
	?>
    <div class="profile-info-row">
		<div class="profile-info-name"><?=$wording_lan["province"]?> </div>
		<div class="profile-info-value">
			<div class="controls">
				<select class="span4" name="cprovince" id="cprovince"  tabindex="47" onchange="startAddressRQ('camphur',this.value)">
					<option value=''></option>
					<?
					for($i=0;$i<mysql_num_rows($rs);$i++){
						echo "<option value='".mysql_result($rs,$i,'provinceId')."'>".mysql_result($rs,$i,'provinceName')."</option>";
					}
					?>
				</select>
			</div>
		</div>
	</div>

	<div class="profile-info-row" id="camphurSection">
		<div class="profile-info-name"><?=$wording_lan["amphur"]?></div>
		<div class="controls">
		<div class="profile-info-value">
			<select class="span4" name="camphur" id="camphur"  tabindex="48"><option value=''></option></select>
		</div>
		</div>
	</div>

	<div class="profile-info-row" id="cdistrictSection">
		<div class="profile-info-name"><?=$wording_lan["district"]?> </div>
		<div class="controls">
		<div class="profile-info-value">
			<select class="span4" name="cdistrict" id="cdistrict"  tabindex="49"><option value=''></option></select>
		</div>
		</div>
	</div>