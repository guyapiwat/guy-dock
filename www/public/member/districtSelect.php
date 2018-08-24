<? include("connectmysql.php");?>
<?
	mysql_query("SET NAMES 'utf8'");
	$sql = "SELECT * FROM district WHERE amphurId='".$_GET['val']."'  order by districtName asc  ";
	$rs = mysql_query($sql);
	?>
		<div class="profile-info-name">ตำบล</div>
		<div class="controls">
		<div class="profile-info-value">
			<select class="span4" name="district" id="district"  tabindex="49"><?
			for($i=0;$i<mysql_num_rows($rs);$i++){
				echo "<option value='".mysql_result($rs,$i,"districtId")."'>".mysql_result($rs,$i,"districtName")."</option>";
			}
		?>
			</select>
		</div>
		</div>