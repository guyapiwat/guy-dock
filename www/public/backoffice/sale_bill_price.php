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
	searchbox($stype,$satype,$fdate,$tdate);
	include("sale_bill_price1.php");
			
	/*switch($stype){
		case 1:
			searchbox($stype,$satype,$fdate,$tdate);
			include("sale_bill_amount_odernum.php");
			break;
		case 2:
			searchbox($stype,$satype,$fdate,$tdate);
			include("sale_bill_amount_product.php");
			break;
		case 3:
			searchbox($stype,$satype,$fdate,$tdate);
			include("sale_bill_amount_member.php");
			break;
	}*/
?>

<? function searchbox($stype,$satype,$fdate,$tdate){?>
<form style="margin-bottom:0;" action="index.php?sessiontab=3&sub=24" method="post">
<table style="margin-left:20;" width="562" border="0">
  <tr valign="top"><td width="442" align="center" ><fieldset>
	<input size="15" type="text" name="fdate" id="fdate" value="<?=$fdate?>" />
	<a href="javascript:NewCal('fdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a>  ถึง
	<input size="15" type="text" name="tdate" id="tdate" value="<?=$tdate?>" />
	<a href="javascript:NewCal('tdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่" /></a>
	<!--<br>แผน
	<select name="satype">
				 <option  value="" <?=($satype==""?"selected":"")?>>ทั้งหมด</option>
                <option  value="A" <?=($satype=="A"?"selected":"")?>>แผน A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>รักษายอด</option>
              </select>-->
    <input type="submit" value="ค้น" />
</fieldset></td>
<td align="center" width="110"><fieldset>
	<? if(1){?>
        <a href="sale_bill_print.php?fdate=<?=$fdate?>&tdate=<?=$tdate?>" target="_blank">
        <img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a>
    <? }else if(2){?>
         <a href="sale_bill_print.php?fdate=<?=$fdate?>&tdate=<?=$tdate?>" target="_blank">
        <img border="0" src="./images/Amber-Printer.gif">พิมพ์ทั้งหมด</a>
   
    <? }?>
</fieldset></td>
</tr></table>
</form>
<? }?>
