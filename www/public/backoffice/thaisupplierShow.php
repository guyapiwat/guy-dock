<? include("connectmysql.php");?>
<?
	$sql = "SELECT * FROM ".$dbprefix."supplier";
	$rs = mysql_query($sql);
	?>&nbsp;
    <select name="sup_code" style="width:300px;" ><?
	for($i=0;$i<mysql_num_rows($rs);$i++){
		echo "<option value='".mysql_result($rs,$i,'sup_code')."' ".($sup_code==mysql_result($rs,$i,'sup_code')?"selected":"").">".mysql_result($rs,$i,'sup_desc')."</option>";
	}
?>
	</select>
