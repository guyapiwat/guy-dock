<script language="javascript">
var wi=null;
function get_mem_listpicker_fpcode(){
		if (wi) wi.close();
		wi=window.open("mem_listpicker_fpcode.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
function get_mem_listpicker_tpcode(){
		if (wi) wi.close();
		wi=window.open("mem_listpicker_tpcode.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
}
</script><?
	if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
	if(isset($_POST["tdate"]))
		$tdate = $_POST["tdate"];
	else if(isset($_GET["tdate"]))
		$tdate = $_GET["tdate"];
  
if(empty($fdate))$fdate = date("Y-m-d", mktime(date("H"), date("i"), date("s"), date("m"), date("d")+1, date("Y")));
if(empty($tdate))$tdate = date("Y-m-d", mktime(date("H"), date("i"), date("s"), date("m"), date("d")+1, date("Y")));
		
	if(isset($_POST["satype"]))
		$satype = $_POST["satype"];
	else if(isset($_GET["satype"]))
		$satype = $_GET["satype"];
		$okok = $_GET["okok"];
 

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



	if(isset($_POST["strtype"]))
		$strtype = $_POST["strtype"];
	else if(isset($_GET["strtype"]))
		$strtype = $_GET["strtype"];

	if(isset($_POST["strSearch"]))
		$strSearch = $_POST["strSearch"];
	else if(isset($_GET["strSearch"]))
		$strSearch = $_GET["strSearch"];

	if(isset($_POST["fpcode"]))
		$fpcode = $_POST["fpcode"];
	else if(isset($_GET["fpcode"]))
		$fpcode = $_GET["fpcode"];

	if(isset($_POST["tpcode"]))
		$tpcode = $_POST["tpcode"];
	else if(isset($_GET["tpcode"]))
		$tpcode = $_GET["tpcode"];

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

<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<br />
<?
	$stype = $_POST['stype'];
	$stype = $stype==""?$_GET['stype']:$_POST['stype'];
	$stype = $stype==""?1:$stype;
	switch($stype){
		case 1:
			searchbox($dbprefix,$inv_code,$inv_code1,$fdate,$tdate,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$sregister,$fpcode,$tpcode);
			$sregister = 0;
			//echo $okok.'d';
			//exit;	/
			//or $okok == '1'
			if($_POST or $_GET){
				include("sale_bill_product_date1.php");
				break;
			}
	}
?>

<? function searchbox($dbprefix,$inv_code,$inv_code1,$fdate,$tdate,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$sregister,$fpcode,$tpcode){
	global $wording_lan;

	?>
<form style="margin-bottom:0;" action="index.php?sessiontab=<?=$_GET["sessiontab"]?>&sub=53" method="post" id="frm" name="frm">
<table style="margin-left:20;" width="1100" border="0">
  <tr valign="top"><td width="855" align="left" ><fieldset>
	&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;
	<input size="14" type="text" name="fdate" id="fdate" value="<?=$fdate?>" />
	<a href="javascript:NewCal('fdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="เลือกวันที่" /></a><!--  ถึง
	<input size="14" type="text" name="tdate" id="tdate" value="<?=$tdate?>" />
	<a href="javascript:NewCal('tdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="เลือกวันที่" /></a>
   --><!-- <select name="stype" id="stype">
    	<option value="1" <?=($stype=="1"?"selected":"")?>>เรียงตามเลขบิล</option>
    	<option value="2" <?=($stype=="2"?"selected":"")?>>เรียงตามสินค้า</option>
		<option value="3" <?=($stype=="3"?"selected":"")?>>เรียงตามสมาชิก</option>
    </select>-->&#3626;&#3634;&#3586;&#3634; 
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
  <!--  <br>
    <input tabindex="2" style="background-color:#FFFFFF" readonly="" type="text" name="fpcode" id="fpcode" size="20"  maxlength="20" value="<?=$fpcode?>" />
    <input name="button2"  tabindex="4" type="button" onClick="get_mem_listpicker_fpcode()" value="&#3648;&#3621;&#3639;&#3629;&#3585;" />
    <input tabindex="2" style="background-color:#FFFFFF" readonly type="text" name="tpcode" id="tpcode" size="20"  maxlength="20" value="<?=$tpcode?>" />
    <input name="button22"  tabindex="4" type="button" onClick="get_mem_listpicker_tpcode()" value="&#3648;&#3621;&#3639;&#3629;&#3585;" />
    --><input type="submit" value="ค้น" />
</fieldset></td>
<td align="left" style="display:none" width="235" ><fieldset>
			       <a href="report_stock1.php" target="_blank">
        <img border="0" src="./images/Amber-Printer.gif">พิมพ์รายงาน Stock </a>
		 <br>
		        <a href="report_stock.php" target="_blank">
        <img border="0" src="./images/Amber-Printer.gif">พิมพ์รายงานตรวจสอบ Stock </a>
	
		<br>
      </fieldset></td>
</tr></table>
</form><? }?>
