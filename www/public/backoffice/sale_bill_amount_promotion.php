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

	if(isset($_POST["bank_pay"]))
		$bank_pay = $_POST["bank_pay"];
	else if(isset($_GET["bank_pay"]))
		$bank_pay = $_GET["bank_pay"];

	if(isset($_POST["vip"]))
		$vip = $_POST["vip"];

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
	if(isset($_POST["locationbase"]))
		$locationbase = $_POST["locationbase"];
	else if(isset($_GET["locationbase"]))
		$locationbase = $_GET["locationbase"];

		if(isset($_POST["sp_pos"]))
		$sp_pos = $_POST["sp_pos"];
	else if(isset($_GET["sp_pos"]))
		$sp_pos = $_GET["sp_pos"];


if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
	}

if(empty($strpv))$strpv = ' >= 2000';
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
			searchbox($dbprefix,$inv_code,$fdate,$tdate,$stype,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$sregister,$locationbase,$vip,$sp_pos);
			include("sale_bill_amount_promotion1.php");
			break;
		case 2:
			searchbox($dbprefix,$inv_code,$fdate,$tdate,$stype,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$sregister,$locationbase,$vip);
			include("sale_bill_amount_odernum1.php");
			break;
		case 3:
			searchbox($stype,$satype,$sbtype,$fdate,$tdate,$strSearch,$strtype,$spv,$sspv,$vip);
			include("sale_bill_amount_promotion1.php");
			break;
	}
?>

<? function searchbox($dbprefix,$inv_code,$fdate,$tdate,$stype,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$sregister,$locationbase,$vip,$sp_pos){
	global $wording_lan;
	include("../global_center.php");
	include("date_picker.php");
	?>
<form style="margin-bottom:0;" action="index.php?sessiontab=3&sub=177&stype=<?=$stype?>" method="post">
<table style="margin-left:20;" width="95%" border="0">
  <tr valign="top"><td width="100%" align="left" ><fieldset>
	&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;
	<input size="14" type="text" name="fdate" id="dateInput1" value="<?=$fdate?>" />
	  �֧
	<input size="14" type="text" name="tdate" id="dateInput2" value="<?=$tdate?>" />
	<input type='hidden' id='stype' name = 'stype' value= '<?=$stype?>'>
   <!-- <select name="stype" id="stype">
    	<option value="1" <?=($stype=="1"?"selected":"")?>>���§����Ţ���</option>
    	<option value="2" <?=($stype=="2"?"selected":"")?>>���§����Թ���</option>
		<option value="3" <?=($stype=="3"?"selected":"")?>>���§�����Ҫԡ</option>
    </select>-->
	

	<select name="satype" >		
		<option  value="" <?=($satype==""?"selected":"")?>> ����Ẻ������</option>
		<?php		
		foreach($arr_satype as $key => $value):			
		echo '<option value="'.$key.'"';
				if($satype==$key)echo "selected";
		echo'>'.$value.'</option>'; //close your tags!!
		endforeach;
		?>
	</select>
	<!--select name="satype">
				 <option  value="" <?=($satype==""?"selected":"")?>>������</option>
                <option  value="A" <?=($satype=="A"?"selected":"")?>><?=$wording_lan["word"]["sale_editadd"]["typea"]?></option>
                <option value="H" <?=($satype=="H"?"selected":"")?>><?=$wording_lan["word"]["sale_editadd"]["typeb"]?></option>
        </select-->

  <select name="logistic">
      <option  value="" <?=($logistic==""?"selected":"")?>>��èѴ�觷�����</option>
	   <?php		
		foreach($arr_logistic as $key => $value):			
		echo '<option value="'.$key.'"';
				if($logistic==$key)echo "selected";
		echo'>'.$value.'</option>'; //close your tags!!
		endforeach;
		?>
       </select>

	<input type="text" name="strtotal" value="<?=$strtotal?>" placeholder="�ӹǹ�Թ���"  style="width:100px">
	<input type="text" name="strpv" value="<?=$strpv?>" placeholder="PV" style="width:100px">

	<input type="text" name="struid" value="<?=$struid?>"  placeholder="���ѹ�֡" style="width:100px">


	<br> 
		<select name="sspv">
			   <?php		
		foreach($arr_sspv as $key => $value):			
		echo '<option value="'.$key.'"';
				if($sspv==$key)echo "selected";
		echo'>'.$value.'</option>'; //close your tags!!
		endforeach;
		?>
        </select>

<select name="inv_code" id="inv_code"  >
			  <option value="">�Ңҷ�����</option>
        <?					
						$result1=mysql_query("select * from ".$dbprefix."invent order by inv_code");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->inv_code."\" ";
							if ($inv_code==$row1->inv_code) {echo "selected";}
							echo ">".$row1->inv_desc."</option>";
						}
						?>
    </select>

<select name="locationbase" id="locationbase"  >
			  <option value="">Locationbase ������</option>
        <?					
						$result1=mysql_query("select * from ".$dbprefix."location_base order by cid");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->cshort."\" ";
							if ($locationbase==$row1->cshort) {echo "selected";}
							echo ">".$row1->cshort."</option>";
						}
						?>
    </select>

<input type="text" name="strSearch" value="<?=$strSearch?>" style="width:100px">
	<select name="strtype">
				 <option  value="sano" <?=($strtype=="sano"?"selected":"")?>>�Ţ���</option>
				  <option value="strinvent" <?=($strtype=="strinvent"?"selected":"")?>>�Ң�</option>
                <option value="sadate" <?=($strtype=="sadate"?"selected":"")?>>�ѹ���</option>
				<option value="mcode" <?=($strtype=="mcode"?"selected":"")?>>���ʼ�����</option>
	<!--			<option value="sp_code" <?=($strtype=="sp_code"?"selected":"")?>>���ʼ��ʻ͹����</option>
		-->		<option value="uid" <?=($strtype=="uid"?"selected":"")?>>���ѹ�֡</option>
        </select>
���µ���
	<select name="sp_pos">
				 <option  value="" <?=($sp_pos==""?"selected":"")?>>������</option>
				<?					
						$result1=mysql_query("select * from ".$dbprefix."position1 order by posid");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->posshort."\" ";
							if ($sp_pos==$row1->posshort) {echo "selected";}
							echo ">".$row1->posshort." ( ".$row1->posname." )</option>";
						}
						?>
					</select>
    <input type="submit" value="  ��  " />

</fieldset></td>
</tr></table>
</form><? }?>
