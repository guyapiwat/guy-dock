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

	if(isset($_POST["selectsano"]))$selectsano = $_POST["selectsano"];
	else if(isset($_GET["selectsano"]))$selectsano = $_GET["selectsano"];


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

	if(isset($_POST["inv_code"]))$inv_code = $_POST["inv_code"];
	else if(isset($_GET["inv_code"]))$inv_code = $_GET["inv_code"];

	if(isset($_POST["inv_code1"]))$inv_code1 = $_POST["inv_code1"];
	else if(isset($_GET["inv_code1"]))$inv_code1 = $_GET["inv_code1"];

	if(isset($_POST["txtpcode"]))$txtpcode = $_POST["txtpcode"];
	else if(isset($_GET["txtpcode"]))$txtpcode = $_GET["txtpcode"];

	if(isset($_POST["typcode"]))$typcode = $_POST["typcode"];
	else if(isset($_GET["typcode"]))$typcode = $_GET["typcode"];

	if(isset($_POST["strtype"]))
		$strtype = $_POST["strtype"];
	else if(isset($_GET["strtype"]))
		$strtype = $_GET["strtype"];

	if(isset($_POST["strSearch"]))
		$strSearch = $_POST["strSearch"];
	else if(isset($_GET["strSearch"]))
		$strSearch = $_GET["strSearch"];

	if(isset($_POST["mapping_code"]))
		$mapping_code = $_POST["mapping_code"];
	else if(isset($_GET["mapping_code"]))
		$mapping_code = $_GET["mapping_code"];

	if(isset($_POST["sregister"]))
		$sregister = $_POST["sregister"];
	else if(isset($_GET["sregister"]))
		$sregister = $_GET["sregister"];
	if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
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
			searchbox($dbprefix,$inv_code,$fdate,$tdate,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$sregister,$selectsano,$inv_code1,$mapping_code,$txtpcode,$typcode);
			include("sale_bil_bb1.php");
			break;
		case 2:
			searchbox($stype,$satype,$sbtype,$fdate,$tdate,$strSearch,$strtype,$spv,$sspv);
			include("sale_bill_amount_product.php");
			break;
		case 3:
			searchbox($stype,$satype,$sbtype,$fdate,$tdate,$strSearch,$strtype,$spv,$sspv);
			include("sale_bill_amount_member.php");
			break;
	}
?>

<? function searchbox($dbprefix,$inv_code,$fdate,$tdate,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$sregister,$selectsano,$inv_code1,$mapping_code,$txtpcode,$typcode){
	global $wording_lan;

	?>
<form style="margin-bottom:0;" action="index.php?sessiontab=<?=$_GET["sessiontab"]?>&sub=56" method="post">
<fieldset style="width:800;margin-left:100;">
<table style="margin-left:100;" width="900" border="0">
  <tr valign="top"><td width="900" align="left" >
	&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;
	<input size="14" type="text" name="fdate" id="dateInput1" value="<?=$fdate?>" />
  ถึง
	<input size="14" type="text" name="tdate" id="dateInput2" value="<?=$tdate?>" />

   &#3626;&#3634;&#3586;&#3634; 
<select name="inv_code" id="inv_code"  >
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
	<select name="inv_code1" id="inv_code1"  >
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
</tr>
<tr>
<td>
	หน่วยงาน
	<select name="mapping_code" id="mapping_code">
             <option  value="" <?=($mapping_code==""?"selected":"")?>>เลือกสาเหตุการเบิกสินค้า</option>
<?					
					$result1=mysql_query("select * from ".$dbprefix."inventory_order where Mapping_type = 'BSALE' ");
						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->Mapping_Code."\" ";
							if ($mapping_code==$row1->Mapping_Code) {echo "selected";}
							echo ">".$row1->MLM_Inv_Type."</option>";
						}
						?>
    </select> 
<input type="text" name="selectsano" value="<?=$selectsano?>" style="width:100px">
	<select name="strtype">
				 <option  value="sano" <?=($strtype=="sano"?"selected":"")?>>เลขบิล</option>
        </select>
	<input type="text" name="txtpcode" value="<?=$txtpcode?>" style="width:100px">
	<select name="typcode">
				 <option  value="pcode" <?=($typcode=="pcode"?"selected":"")?>>รหัสสินค้า</option>
        </select>
    <input type="submit" value="ค้น" />
</td>
<!--<td align="center" width="110" ><fieldset>
	        <a href="sell_print_taxs.php?fdate=<?=$fdate?>&inv_code=<?=$inv_code?>&tdate=<?=$tdate?>&satype=<?=$satype?>&logistic=<?=$logistic?>&strpv=<?=$strpv?>&strtotal=<?=$strtotal?>&struid=<?=$struid?>&sspv=<?=$sspv?>&inv_code=<?=$inv_code?>&inv_code1=<?=$inv_code1?>&strSearch=<?=$strSearch?>&strtype=<?=$strtype?>&sregister=<?=$sregister?>&selectsano=<?=$selectsano?>" target="_blank">
        <img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a>

</fieldset></td>-->
</tr></table></fieldset>
</form><? }?>
