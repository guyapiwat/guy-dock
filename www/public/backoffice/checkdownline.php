<?
	if(isset($_POST["fdate"]))
		$fdate = $_POST["fdate"];
	else if(isset($_GET["fdate"]))
		$fdate = $_GET["fdate"];
	if(isset($_POST["tdate"]))
		$tdate = $_POST["tdate"];
	else if(isset($_GET["tdate"]))
		$tdate = $_GET["tdate"];

	if(isset($_POST["strSearch"]))
		$strSearch = $_POST["strSearch"];
	else if(isset($_GET["strSearch"]))
		$strSearch = $_GET["strSearch"];
	
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
	searchbox($stype,$satype,$sbtype,$fdate,$tdate,$strSearch,$strtype,$spv);
	//if($_POST){
		switch($stype){
			case 1:
				include("checkdownline1.php");
				break;
		}
	//}
?>

<? function searchbox($stype,$satype,$sbtype,$fdate,$tdate,$strSearch,$strtype,$spv){?>
<form style="margin-bottom:0;" action="index.php?sessiontab=5&sub=12" method="post">
<table style="margin-left:20;" width="650" border="0">
  <tr valign="top"><td width="1000" align="center" ><fieldset>
	<input size="14" type="text" name="fdate" id="fdate" value="<?=$fdate?>" />
	<a href="javascript:NewCal('fdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="เลือกวันที่" /></a>  ถึง
	<input size="14" type="text" name="tdate" id="tdate" value="<?=$tdate?>" />
	<a href="javascript:NewCal('tdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="เลือกวันที่" /></a>
   <!-- <select name="stype" id="stype">
    	<option value="1" <?=($stype=="1"?"selected":"")?>>เรียงตามเลขบิล</option>
    	<option value="2" <?=($stype=="2"?"selected":"")?>>เรียงตามสินค้า</option>
		<option value="3" <?=($stype=="3"?"selected":"")?>>เรียงตามสมาชิก</option>
    </select>-->
	<input type="text" name="strSearch" value="<?=$strSearch?>">
	<select name="strtype">
				<option value="mcode" <?=($strtype=="mcode"?"selected":"")?>>รหัสสมาชิก</option>
              </select>
    <input type="submit" value="ค้น" />
</fieldset></td>
<td align="center" width="110"><!--<fieldset>
	<? if($stype == 1){?>
        <a href="sell_print.php?fdate=<?=$fdate?>&tdate=<?=$tdate?>" target="_blank">
        <img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a>
    <? }?>
        
</fieldset>--></td>
</tr></table>
</form><br /><br /><br />
<? }?>
