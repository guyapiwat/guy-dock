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
				<select name="province" id="province" onchange="startAddressRQ('amphur',this.value)">
					<option></option>
					<?
					for($i=0;$i<mysql_num_rows($rs);$i++){
						echo "<option value='".mysql_result($rs,$i,'provinceId')."'>".mysql_result($rs,$i,'provinceName')."</option>";
					}
					?>
				</select>
			</div>
		</div>
	</div>

	<div class="profile-info-row" id="amphurSection">
		<div class="profile-info-name"><?=$wording_lan["amphur"]?> </div>
		<div class="controls">
		<div class="profile-info-value">
			<select  class="span4" name="amphur" id="amphur"  tabindex="48"><option></option></select>
		</div>
		</div>
	</div>

	<div class="profile-info-row" id="districtSection">
		<div class="profile-info-name"><?=$wording_lan["district"]?> </div>
		<div class="controls">
		<div class="profile-info-value">
			<select  class="span4" name="district" id="district" tabindex="49"><option></option></select>
		</div>
		</div>
	</div>