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


	if(isset($_POST["strtype"]))
		$strtype = $_POST["strtype"];
	else if(isset($_GET["strtype"]))
		$strtype = $_GET["strtype"];

	if(isset($_POST["strSearch"]))
		$strSearch = $_POST["strSearch"];
	else if(isset($_GET["strSearch"]))
		$strSearch = $_GET["strSearch"];

	if($fdate==""){
		$fdate = $tdate;
	}else if($tdate==""){
		$tdate = $fdate;
	}
$inv_code = $_SESSION["admininvent"];
$sspv = 2;
?>

<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<br />
<?
	$stype = $_POST['stype'];
	$stype = $stype==""?$_GET['stype']:$_POST['stype'];
	$stype = $stype==""?1:$stype;
	switch($stype){
		case 1:
			searchbox($dbprefix,$inv_code,$fdate,$tdate,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch);
			include("sale_bill_stockcard_sum1.php");
			break;
	}
?>

<? function searchbox($dbprefix,$inv_code,$fdate,$tdate,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch){
	global $wording_lan;
		include("../function/global_center.php");
	?>
<form style="margin-bottom:0;" action="index.php?sessiontab=5&sub=557" method="post">
  <table style="margin-left:20;" width="1100" border="0">
    <tr valign="top">
      <td width="1000" align="left" ><fieldset>
        <?=$wording_lan["tab2_report_1"]?>
        <input size="10" type="text" name="fdate" id="fdate" value="<?=$fdate?>" />
        <a href="javascript:NewCal('fdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="&#3648;&#3621;&#3639;&#3629;&#3585;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;" /></a>
        <?=$wording_lan["tab2_report_2"]?>
        <input size="10" type="text" name="tdate" id="tdate" value="<?=$tdate?>" />
        <a href="javascript:NewCal('tdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="&#3648;&#3621;&#3639;&#3629;&#3585;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;" /></a>
        <?=$wording_lan["tab2_report_16"]?>
        <!--  <input type="text" name="struid" value="<?=$struid?>" style="width:70px"> -->
	  		<select name="struid" id="struid"  >
          <option value=""><?=$wording_lan["word"]["all"]?></option>
          <?					echo 
						$result1=mysql_query("select * from ".$dbprefix."user where usertype = 2 and inv_ref = '".$inv_code."' order by usercode");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->usercode."\" ";
							if ($struid==$row1->usercode) {echo "selected";}
							echo ">".$row1->usercode."</option>";
						}
						?>
        </select>
	  		<?=$wording_lan["tab2_report_17"]?>
           <select name="sspv">
			   <?php		
		foreach($arr_sspv1 as $key => $value):			
		echo '<option value="'.$key.'"';
				if($sspv==$key)echo "selected";
		echo'>'.$value.'</option>'; //close your tags!!
		endforeach;
		?>
        </select>
          <?=$wording_lan["tab2_report_24"]?>
  		  <select name="inv_code" id="inv_code" disabled  >
          <option value=""><?=$wording_lan["word"]["all"]?></option>
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
  		  <input type="submit" value="<?=$wording_lan["search"]?>" />
      </fieldset><br></td>
    </tr>
  </table>
</form>
<? }?>
