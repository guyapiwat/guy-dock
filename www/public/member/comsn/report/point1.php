<?
	if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
	if(isset($_POST["tdate"]))
		$tdate = $_POST["tdate"];
	else if(isset($_GET["tdate"]))
		$tdate = $_GET["tdate"];

if(empty($fdate))$fdate = date("Y-m-d");
if(empty($tdate))$tdate = date("Y-m-d");
		
	if(isset($_POST["satype"]))
		$satype = $_POST["satype"];
	else if(isset($_GET["satype"]))
		$satype = $_GET["satype"];


	if(isset($_POST["inv_code"]))
		$inv_code = $_POST["inv_code"];
	else if(isset($_GET["inv_code"]))
		$inv_code = $_GET["inv_code"];

	if(isset($_POST["strpv"]))
		$strpv = $_POST["strpv"];
	else if(isset($_GET["strpv"]))
		$strpv = $_GET["strpv"];

	if(isset($_POST["strtotal"]))
		$strtotal = $_POST["strtotal"];
	else if(isset($_GET["strtotal"]))
		$strtotal = $_GET["strtotal"];

	if(isset($_POST["struid"]))
		$struid = $_POST["struid"];
	else if(isset($_GET["struid"]))
		$struid = $_GET["struid"];

	if(isset($_POST["sspv"]))
		$sspv = $_POST["sspv"];
	else if(isset($_GET["sspv"]))
		$sspv = $_GET["sspv"];
if(empty($sspv))$sspv = '6';

	if(isset($_POST["inv_code"]))
		$inv_code = $_POST["inv_code"];
	else if(isset($_GET["inv_code"]))
		$inv_code = $_GET["inv_code"];


	if(isset($_POST["strtype"]))
		$strtype = $_POST["strtype"];
	else if(isset($_GET["strtype"]))
		$strtype = $_GET["strtype"];

	if(isset($_POST["strSearch"]))
		$strSearch = $_POST["strSearch"];
	else if(isset($_GET["strSearch"]))
		$strSearch = $_GET["strSearch"];

	if(isset($_POST["sregister"]))
		$sregister = $_POST["sregister"];
	else if(isset($_GET["sregister"]))
		$sregister = $_GET["sregister"];
	if(isset($_POST["locationbase"]))
		$locationbase = $_POST["locationbase"];
	else if(isset($_GET["locationbase"]))
		$locationbase = $_GET["locationbase"];
	if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
	}


	if(isset($_POST["ftrcode"]))
		$ftrcode = $_POST["ftrcode"];
	else if(isset($_GET["ftrcode"]))
		$ftrcode = $_GET["ftrcode"];

	

?>

<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<br />
<?
	$stype = $_POST['stype'];
	$stype = $stype==""?$_GET['stype']:$_POST['stype'];
	$stype = $stype==""?1:$stype;
	//var_dump($locationbase);
	//exit;
	switch($stype){
		case 1:
			searchbox($dbprefix,$inv_code,$fdate,$tdate,$stype,$satype,$ftrcode,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$sregister,$locationbase);
			include("point11.php");
			break;
	}
?>

<? function searchbox($dbprefix,$inv_code,$fdate,$tdate,$stype,$satype,$ftrcode,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$sregister,$locationbase){
	global $wording_lan;

	?>
<form style="margin-bottom:0;" action="index.php?sessiontab=5&sub=118&stype=<?=$stype?>" method="post">
<table style="margin-left:20;" width="1100" border="0">
  <tr valign="top"><td width="1000" align="left" ><fieldset>

<?=$wording_lan["travel2"]?>
<select name="ftrcode" id="ftrcode"  >
			<!--  <option value="">ทั้งหมด</option>
    -->   <?					
						$result1=mysql_query("select * from ".$dbprefix."promotion where tshow=1 order by rcode");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->rcode."\" ";
							if ($ftrcode==$row1->inv_code) {echo "selected";}
							echo ">".$row1->name."</option>";
						}
						?>
    </select><!--
<input type="text" name="strSearch" value="<?=$strSearch?>" style="width:100px">
	<select name="strtype">
				 <option  value="sano" <?=($strtype=="sano"?"selected":"")?>>เลขบิล</option>
				  <option value="strinvent" <?=($strtype=="strinvent"?"selected":"")?>>สาขา</option>
                <option value="sadate" <?=($strtype=="sadate"?"selected":"")?>>วันที่</option>
				<option value="mcode" <?=($strtype=="mcode"?"selected":"")?>>รหัสผู้ซื้อ</option>
	<option value="uid" <?=($strtype=="uid"?"selected":"")?>>ผู้บันทึก</option>
        </select>-->
    <input type="submit" value="<?=$wording_lan["Show Report"]?>" />
</fieldset></td>
</tr></table>
</form><? }?>
