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
	<a href="javascript:NewCal('fdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="���͡�ѹ���" /></a>   <!-- �֧
	<input size="14" type="text" name="tdate" value="<?=$tdate?>" />
	<a href="javascript:NewCal('tdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="���͡�ѹ���" /></a>
  <select name="stype" id="stype">
    	<option value="1" <?=($stype=="1"?"selected":"")?>>���§����Ţ���</option>
    	<option value="2" <?=($stype=="2"?"selected":"")?>>���§����Թ���</option>
		<option value="3" <?=($stype=="3"?"selected":"")?>>���§�����Ҫԡ</option>
    </select>
	Ἱ
	<select name="satype">
				 <option  value="" <?=($satype==""?"selected":"")?>>������</option>
                <option  value="A" <?=($satype=="A"?"selected":"")?>>Ἱ A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>�ѡ���ʹ</option>
				<option value="C" <?=($satype=="C"?"selected":"")?>>�ѡ���ʹ�ѹ��</option>
              </select>
	��Դ
	<select name="sbtype">
				 <option  value="" <?=($sbtype==""?"selected":"")?>>������</option>
                <option  value="����͹�Ź�" <?=($sbtype=="����͹�Ź�"?"selected":"")?>>����͹�Ź�</option>
                <option value="��Ţ�»���" <?=($sbtype=="��Ţ�»���"?"selected":"")?>>��Ţ�»���</option>
				<option value="���ᨧ�ʹ" <?=($sbtype=="���ᨧ�ʹ"?"selected":"")?>>���ᨧ�ʹ</option>
              </select>-->
	<input type="text" name="strSearch" value="<?=$strSearch?>">
	<select name="strtype">
				<option value="mcode" <?=($strtype=="mcode"?"selected":"")?>>������Ҫԡ</option>
              </select>
    <input type="submit" value="��" />
</fieldset></td>
<td align="center" width="110"></td>
</tr></table>
</form>
<? }?>
