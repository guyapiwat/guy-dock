<?
	if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
	if(isset($_POST["tdate"]))
		$tdate = $_POST["tdate"];
	else if(isset($_GET["tdate"]))
		$tdate = $_GET["tdate"];
		
	if(isset($_POST["satype"]))
		$satype = $_POST["satype"];
	else if(isset($_GET["satype"]))
		$satype = $_GET["satype"];

	if(isset($_POST["sbtype"]))
		$sbtype = $_POST["sbtype"];
	else if(isset($_GET["sbtype"]))
		$sbtype = $_GET["sbtype"];

	if(isset($_POST["strtype"]))
		$strtype = $_POST["strtype"];
	else if(isset($_GET["strtype"]))
		$strtype = $_GET["strtype"];

	if(isset($_POST["strSearch"]))
		$strSearch = $_POST["strSearch"];
	else if(isset($_GET["strSearch"]))
		$strSearch = $_GET["strSearch"];
	
	
	//var_dump($_POST["strSearch"]);
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
	searchbox($stype,$satype,$sbtype,$fdate,$tdate,$strSearch,$strtype);
	include("member_sp1.php");
	
	exit;
	//break;
?>

<? function searchbox($stype,$satype,$sbtype,$fdate,$tdate,$strSearch,$strtype){?>
<form style="margin-bottom:0;" action="index.php?sessiontab=1&sub=15" method="post">
<table style="margin-left:20;" width="1000" border="0">
  <tr valign="top"><td width="850" align="center" ><fieldset>
	<input size="14" type="text" name="fdate" value="<?=$fdate?>" />
	<a href="javascript:NewCal('fdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="เลือกวันที่" /></a>   <!-- ถึง
	<input size="14" type="text" name="tdate" value="<?=$tdate?>" />
	<a href="javascript:NewCal('tdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="เลือกวันที่" /></a>
  <select name="stype" id="stype">
    	<option value="1" <?=($stype=="1"?"selected":"")?>>เรียงตามเลขบิล</option>
    	<option value="2" <?=($stype=="2"?"selected":"")?>>เรียงตามสินค้า</option>
		<option value="3" <?=($stype=="3"?"selected":"")?>>เรียงตามสมาชิก</option>
    </select>
	แผน
	<select name="satype">
				 <option  value="" <?=($satype==""?"selected":"")?>>ทั้งหมด</option>
                <option  value="A" <?=($satype=="A"?"selected":"")?>>แผน A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>รักษายอด</option>
				<option value="C" <?=($satype=="C"?"selected":"")?>>รักษายอดทันที</option>
              </select>
	ชนิด
	<select name="sbtype">
				 <option  value="" <?=($sbtype==""?"selected":"")?>>ทั้งหมด</option>
                <option  value="บิลออนไลน์" <?=($sbtype=="บิลออนไลน์"?"selected":"")?>>บิลออนไลน์</option>
                <option value="บิลขายปกติ" <?=($sbtype=="บิลขายปกติ"?"selected":"")?>>บิลขายปกติ</option>
				<option value="บิลแจงยอด" <?=($sbtype=="บิลแจงยอด"?"selected":"")?>>บิลแจงยอด</option>
              </select>-->
	<input type="text" name="strSearch" value="<?=$strSearch?>">
	<select name="strtype">
				<option value="mcode" <?=($strtype=="mcode"?"selected":"")?>>รหัสสมาชิก</option>
              </select>
    <input type="submit" value="ค้น" />
</fieldset></td>
<td align="center" width="110"></td>
</tr></table>
</form>
<? }?>
