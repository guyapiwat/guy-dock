<? include("connectmysql.php");?>
<script language="javascript" type="text/javascript" src="./js/thaiaddress.js"></script>

<?	$sql = "SELECT * FROM province  order by provinceName asc ";
	$rs = mysql_query($sql);
	?>
    <div class="profile-info-row">
		<div class="profile-info-name"><?=$wording_lan["province"]?></div>
		<div class="profile-info-value">
			<div class="controls">
				<select name="province" id="province"  tabindex="47" onchange="startAddressRQ('amphur',this.value)"><option></option>
					<?
						for($i=0;$i<mysql_num_rows($rs);$i++){
							echo "<option value='".mysql_result($rs,$i,'provinceId')."' ".($provinceId==mysql_result($rs,$i,'provinceId')?"selected":"").">".mysql_result($rs,$i,'provinceName')."</option>";
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
 <div class="profile-info-row" id="amphurSection">
		<div class="profile-info-name"><?=$wording_lan["amphur"]?> </div>
		<div class="controls">
			<div class="profile-info-value">
				<select class="span4" name="amphur" id="amphur"  tabindex="48"onchange="startAddressRQ('district',this.value)"><option></option>
				<? for($i=0;$i<mysql_num_rows($rs);$i++){
					echo "<option value='".mysql_result($rs,$i,'amphurId')."' ".($amphurId==mysql_result($rs,$i,'amphurId')?"selected":"").">".mysql_result($rs,$i,'amphurName')."</option>";
				}?>
				</select>
			</div>
		</div>
	</div>


	<?
	$sql = "SELECT * FROM district WHERE provinceId='$provinceId' AND amphurId='$amphurId'  order by districtName asc  ";
	$rs = mysql_query($sql);
	?>     
	<div class="profile-info-row" id="districtSection">
			<div class="profile-info-name"><?=$wording_lan["district"]?></div>
			<div class="profile-info-value">
				<div class="controls">
					<select class="span4" name="district" id="district" tabindex="49" ><option></option>
					<? for($i=0;$i<mysql_num_rows($rs);$i++){
						echo "<option value='".mysql_result($rs,$i,'districtId')."' ".($districtId==mysql_result($rs,$i,'districtId')?"selected":"").">".mysql_result($rs,$i,'districtName')."</option>";
					}?>
					</select>
				</div>
			</div>
		</div>