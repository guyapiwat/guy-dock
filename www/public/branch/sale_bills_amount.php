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
	if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
	}
//$inv_code = $_SESSION['admininvent'];
?>

<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<br />
<?
	$stype = $_POST['stype'];
	$stype = $stype==""?$_GET['stype']:$_POST['stype'];
	$stype = $stype==""?1:$stype;
	switch($stype){
		case 1:
			searchbox($dbprefix,$inv_code,$fdate,$tdate,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$sregister);
			include("sale_bills_amount_ordernum.php");
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

<? function searchbox($dbprefix,$inv_code,$fdate,$tdate,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$sregister){
	global $wording_lan;

	?>
<form style="margin-bottom:0;" action="index.php?sessiontab=6&sub=8" method="post">
<table style="margin-left:20;" width="1100" border="0">
  <tr valign="top"><td width="1000" align="left" ><fieldset>
	<?=$wording_lan["tab2_report_1"]?>
	<input size="14" type="text" name="fdate" id="fdate" value="<?=$fdate?>" />
	<a href="javascript:NewCal('fdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="<?=$wording_lan["tab2_report_2"]?>" /></a>  <?=$wording_lan["tab2_report_2"]?>
	<input size="14" type="text" name="tdate" id="tdate" value="<?=$tdate?>" />
	<a href="javascript:NewCal('tdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="<?=$wording_lan["tab2_report_2"]?>" /></a>
   <!-- <select name="stype" id="stype">
    	<option value="1" <?=($stype=="1"?"selected":"")?>>เรียงตามเลขบิล</option>
    	<option value="2" <?=($stype=="2"?"selected":"")?>>เรียงตามสินค้า</option>
		<option value="3" <?=($stype=="3"?"selected":"")?>>เรียงตามสมาชิก</option>
    </select>-->
	<?=$wording_lan["tab2_report_3"]?>
	<select name="satype">
				 <option  value="" <?=($satype==""?"selected":"")?>><?=$wording_lan["word"]["all"]?></option>
                <option  value="A" <?=($satype=="A"?"selected":"")?>><?=$wording_lan["word"]["sale_editadd"]["typea"]?></option>
                <option value="H" <?=($satype=="Q"?"selected":"")?>><?=$wording_lan["word"]["sale_editadd"]["typeb"]?></option>
        </select>
	<?=$wording_lan["tab2_report_15"]?>
	<select name="logistic">
      <option  value="" <?=($logistic==""?"selected":"")?>><?=$wording_lan["word"]["all"]?></option>
      <option  value="0" <?=($logistic=="0"?"selected":"")?>><?=$wording_lan["tab2_report_8"]?></option>
      <option value="1" <?=($logistic=="1"?"selected":"")?>><?=$wording_lan["tab2_report_9"]?></option>
    </select>
	<?=$wording_lan["tab2_report_10"]?>
	<input type="text" name="strpv" value="<?=$strpv?>" style="width:100px">
	<?=$wording_lan["tab2_report_11"]?>
	<select name="sregister">
      <option  value="" <?=($sregister==""?"selected":"")?>><?=$wording_lan["word"]["all"]?></option>
      <option  value="register" <?=($sregister=="register"?"selected":"")?>><?=$wording_lan["tab2_report_12"]?></option>
       <option value="extend" <?=($sregister=="extend"?"selected":"")?>><?=$wording_lan["tab2_report_13"]?></option>
     <option value="3" <?=($sregister=="3"?"selected":"")?>><?=$wording_lan["tab2_report_14"]?></option>
    </select>
	<br> 
	<?=$wording_lan["tab2_report_15"]?>
	<input type="text" name="strtotal" value="<?=$strtotal?>" style="width:100px">
	<?=$wording_lan["tab2_report_16"]?> 
	<input type="text" name="struid" value="<?=$struid?>" style="width:100px">
<?=$wording_lan["tab2_report_24"]?> 
<select name="inv_code" id="inv_code" >
			  <option value=""><?=$wording_lan["word"]["all"]?></option>
        <?					
						$result1=mysql_query("select * from ".$dbprefix."invent where inv_type = '2' and locationbase = '".$_SESSION["inv_locationbase"]."' order by inv_code");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->inv_code."\" ";
							if ($inv_code==$row1->inv_code) {echo "selected";}
							echo ">".$row1->inv_desc."</option>";
						}
						?>
    </select>
<input type="text" name="strSearch" value="<?=$strSearch?>" style="width:100px">
	<select name="strtype">
				 <option  value="sano" <?=($strtype=="sano"?"selected":"")?>><?=$wording_lan["tab2_report_22"]?></option>
				  <option value="strinvent" <?=($strtype=="strinvent"?"selected":"")?>><?=$wording_lan["tab2_report_24"]?></option>
                <option value="sadate" <?=($strtype=="sadate"?"selected":"")?>><?=$wording_lan["tab2_report_25"]?></option>
				<option value="mcode" <?=($strtype=="mcode"?"selected":"")?>><?=$wording_lan["tab2_report_26"]?></option>
				<!--<option value="sp_code" <?=($strtype=="sp_code"?"selected":"")?>><?=$wording_lan["tab2_report_27"]?></option>-->
				<option value="uid" <?=($strtype=="uid"?"selected":"")?>><?=$wording_lan["tab2_report_28"]?></option>
        </select>
    <input type="submit" value="<?=$wording_lan["search"]?>" />
</fieldset></td>
</tr></table>
</form><? }?>
