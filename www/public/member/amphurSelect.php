<? include("connectmysql.php");?>
<?

	mysql_query("SET NAMES 'utf8'");
	$sql = "SELECT * FROM amphur WHERE provinceId='".$_GET['val']."'  order by amphurName asc ";
	//echo $sql;
	$rs = mysql_query($sql);
	?>
	<div class="profile-info-name">อำเภอ</div>
	<div class="controls">
	<div class="profile-info-value">
		<select class="span4" name="amphur" id="amphur"  tabindex="48" onchange="startAddressRQ('district',this.value)">
		<option value="" ></option>
		<?
			for($i=0;$i<mysql_num_rows($rs);$i++){
				if($i==0){
					$defamphur = mysql_result($rs,$i,"amphurId");
				}
				echo "<option value='".mysql_result($rs,$i,"amphurId")."'>".mysql_result($rs,$i,"amphurName")."</option>";
			}
		?>
		</select>
	</div>
	</div>