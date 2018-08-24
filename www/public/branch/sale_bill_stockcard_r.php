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


	if(isset($_POST["logistic"]))
		$logistic = $_POST["logistic"];
	else if(isset($_GET["logistic"]))
		$logistic = $_GET["logistic"];

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

	if(isset($_POST["inv_code"]))
		$inv_code = $_POST["inv_code"];
	else if(isset($_GET["inv_code"]))
		$inv_code = $_GET["inv_code"];

	if(isset($_POST["inv_code1"]))
		$inv_code1 = $_POST["inv_code1"];
	else if(isset($_GET["inv_code1"]))
		$inv_code1 = $_GET["inv_code1"];

	if(isset($_POST["pcode"]))
		$pcode = $_POST["pcode"];
	else if(isset($_GET["pcode"]))
		$pcode = $_GET["pcode"];

	if(isset($_POST["pcode1"]))
		$pcode1 = $_POST["pcode1"];
	else if(isset($_GET["pcode1"]))
		$pcode1 = $_GET["pcode1"];

	if(isset($_POST["group_id"]))
		$group_id = $_POST["group_id"];
	else if(isset($_GET["group_id"]))
		$group_id = $_GET["group_id"];

	if(isset($_POST["group_id1"]))
		$group_id1 = $_POST["group_id1"];
	else if(isset($_GET["group_id1"]))
		$group_id1 = $_GET["group_id1"];



	if(isset($_POST["strtype"]))
		$strtype = $_POST["strtype"];
	else if(isset($_GET["strtype"]))
		$strtype = $_GET["strtype"];

	if(isset($_POST["strSearch"]))
		$strSearch = $_POST["strSearch"];
	else if(isset($_GET["strSearch"]))
		$strSearch = $_GET["strSearch"];

	if(isset($_POST["strSearch1"]))
		$strSearch1 = $_POST["strSearch1"];
	else if(isset($_GET["strSearch1"]))
		$strSearch1 = $_GET["strSearch1"];

	if(isset($_POST["strSearch2"]))
		$strSearch2 = $_POST["strSearch2"];
	else if(isset($_GET["strSearch2"]))
		$strSearch2 = $_GET["strSearch2"];

	if(isset($_POST["sregister"]))
		$sregister = $_POST["sregister"];
	else if(isset($_GET["sregister"]))
		$sregister = $_GET["sregister"];
	if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
	}

	if(!empty($_SESSION["admininvent"])){
		$inv_code  = $_SESSION["admininvent"];
		$inv_code1 = $_SESSION["admininvent"];
	}
	
?>


<br />
<?
	include("date_picker.php");
	$stype = $_POST['stype'];
	$stype = $stype==""?$_GET['stype']:$_POST['stype'];
	$stype = $stype==""?1:$stype;
	switch($stype){
		case 1:
			searchbox($dbprefix,$inv_code,$inv_code1,$pcode,$pcode1,$group_id,$group_id1,$fdate,$tdate,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$strSearch1,$strSearch2,$sregister);
			include("sale_bill_stockcard_r1.php");
			break;
	}
?>

<? function searchbox($dbprefix,$inv_code,$inv_code1,$pcode,$pcode1,$group_id,$group_id1,$fdate,$tdate,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$strSearch1,$strSearch2,$sregister){
	global $wording_lan;

	?>
<form style="margin-bottom:0;" action="index.php?sessiontab=<?=$_GET["sessiontab"]?>&sub=556" method="post">
<table style="margin-left:20;" width="1200" border="0">
  <tr valign="top"><td width="1200" align="left" ><fieldset> 
	&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;
	<input size="14" type="text" name="fdate" id="dateInput1" value="<?=$fdate?>" />
	 ถึง
	<input size="14" type="text" name="tdate" id="dateInput2" value="<?=$tdate?>" />
	
   <!-- <select name="stype" id="stype">
    	<option value="1" <?=($stype=="1"?"selected":"")?>>เรียงตามเลขบิล</option>
    	<option value="2" <?=($stype=="2"?"selected":"")?>>เรียงตามสินค้า</option>
		<option value="3" <?=($stype=="3"?"selected":"")?>>เรียงตามสมาชิก</option>
    </select>-->
	&#3626;&#3634;&#3586;&#3634; 
<select name="inv_code" id="inv_code" disabled >
			  <option value="">ทั้งหมด</option>
      <?					
						$result1=mysql_query("select * from ".$dbprefix."invent  where inv_type = '1' order by inv_code");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->inv_code."\" ";
							if ($inv_code==$row1->inv_code) {echo "selected";}
							echo ">".$row1->inv_desc." ( ".$row1->inv_code." ) </option>";
						}
						?>
    </select>
	ระหว่าง
	<select name="inv_code1" id="inv_code1" disabled >
			  <option value="">ทั้งหมด</option>
        <?					
						$result1=mysql_query("select * from ".$dbprefix."invent  where inv_type = '1' order by inv_code");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->inv_code."\" ";
							if ($inv_code1==$row1->inv_code) {echo "selected";}
							echo ">".$row1->inv_desc." ( ".$row1->inv_code." ) </option>";
						}
						?>

    </select>

		
	<!--<br>ระหว่างกลุ่มสินค้า
<select name="group_id" id="group_id"  >
			  <option value="">ทั้งหมด</option>
      <?					
						$result1=mysql_query("select * from ".$dbprefix."productgroup  order by idi");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->id."\" ";
							if ($group_id==$row1->id) {echo "selected";}
							echo ">".$row1->groupname." ( ".$row1->id." ) </option>";
						}
						?>
    </select>
	ระหว่าง
<select name="group_id1" id="group_id1"  >
			  <option value="">ทั้งหมด</option>
      <?					
						$result1=mysql_query("select * from ".$dbprefix."productgroup  order by idi");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->id."\" ";
							if ($group_id1==$row1->id) {echo "selected";}
							echo ">".$row1->groupname." ( ".$row1->id." ) </option>";
						}
						?>
    </select>
	<br>ระหว่างสินค้า
<select name="pcode" id="pcode"  >
			  <option value="">ทั้งหมด</option>
      <?					
						$result1=mysql_query("select * from ".$dbprefix."product order by pcode");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->pcode."\" ";
							if ($pcode==$row1->pcode) {echo "selected";}
							echo ">".$row1->pdesc." ( ".$row1->pcode." ) </option>";
						}
						?>
    </select>
	<br>ถึงสินค้า
	<select name="pcode1" id="pcode1"  >
			  <option value="">ทั้งหมด</option>
        <?					
						$result1=mysql_query("select * from ".$dbprefix."product order by pcode");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->pcode."\" ";
							if ($pcode1==$row1->pcode) {echo "selected";}
							echo ">".$row1->pdesc." ( ".$row1->pcode." ) </option>";
						}
						?>
    </select>-->
รหัสสินค้า <input type="text" name="strSearch1" value="<?=$strSearch1?>" style="width:100px">
เลขบิล <input type="text" name="strSearch2" value="<?=$strSearch2?>" style="width:100px">

	<input type="submit" value="ค้น" />
</fieldset></td>
<!--<td align="center" width="110"><fieldset>
	        <a href="sell_print_stockcard.php?fdate=<?=$fdate?>&inv_code=<?=$inv_code?>&inv_code1=<?=$inv_code1?>&pcode=<?=$pcode?>&pcode1=<?=$pcode1?>&group_id=<?=$group_id?>&group_id1=<?=$group_id1?>&tdate=<?=$tdate?>&satype=<?=$satype?>&logistic=<?=$logistic?>&strpv=<?=$strpv?>&strtotal=<?=$strtotal?>&struid=<?=$struid?>&sspv=<?=$sspv?>&strSearch=<?=$strSearch?>&strSearch1=<?=$strSearch1?>&strSearch2=<?=$strSearch2?>&strtype=<?=$strtype?>&sregister=<?=$sregister?>" target="_blank">
        <img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a>

</fieldset></td>-->
</tr></table>
</form><? }?>
