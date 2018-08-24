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

	if(isset($_POST["locationbase"]))
		$locationbase = $_POST["locationbase"];
	else if(isset($_GET["locationbase"]))
		$locationbase = $_GET["locationbase"];

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
	//var_dump($fdate);
	switch($stype){
		case 1:
			searchbox($dbprefix,$inv_code,$fdate,$tdate,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$locationbase,$stype);
			include("member_insure1.php");
			break;
		case 2:
			searchbox($dbprefix,$inv_code,$fdate,$tdate,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$locationbase,$stype);
			include("member_insure_extend.php");
			break;
	}
?>

<? function searchbox($dbprefix,$inv_code,$fdate,$tdate,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$locationbase,$stype){
	global $wording_lan;
	?>
<form style="margin-bottom:0;" action="index.php?sessiontab=1&sub=21" method="post">
  <table style="margin-left:20;" width="1100" border="0">
    <tr valign="top">
      <td width="1000" align="left" ><fieldset>
        &#3623;&#3633;&#3609;&#3607;&#3637;&#3656;
        <input size="10" type="text" name="fdate" id="fdate" value="<?=$fdate?>" />
        <a href="javascript:NewCal('fdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="&#3648;&#3621;&#3639;&#3629;&#3585;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;" /></a> &#3606;&#3638;&#3591;
        <input size="10" type="text" name="tdate" id="tdate" value="<?=$tdate?>" />
        <a href="javascript:NewCal('tdate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="14" height="16" border="0" alt="&#3648;&#3621;&#3639;&#3629;&#3585;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;" /></a> <!--&#3612;&#3641;&#3657;&#3610;&#3633;&#3609;&#3607;&#3638;&#3585;
		<select name="struid" id="struid"  >
          <option value="">&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</option>
          <?					
						$result1=mysql_query("select * from ".$dbprefix."user where usertype = 2 order by usercode");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->usercode."\" ";
							if ($struid==$row1->usercode) {echo "selected";}
							echo ">".$row1->usercode."</option>";
						}
						?>
        </select>
       &#3594;&#3656;&#3629;&#3591;&#3607;&#3634;&#3591;
        <select name="sspv">
          <option  value="" <?=($sspv==""?"selected":"")?>>&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</option>
          <option  value="1" <?=($sspv=="1"?"selected":"")?>>HQ</option>
          <option  value="4" <?=($sspv=="4"?"selected":"")?>>ATO</option>
          <option value="2" <?=($sspv=="2"?"selected":"")?>>Branch</option>
          <option value="3" <?=($sspv=="3"?"selected":"")?>>ONLINE</option>
        </select>
        &#3626;&#3634;&#3586;&#3634;
        <select name="inv_code" id="inv_code"  >
          <option value="">&#3607;&#3633;&#3657;&#3591;&#3627;&#3617;&#3604;</option>
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
        </select>-->
		<select size="1"  name="locationbase" id="locationbase" tabindex="10">
       <option  value="" <?=($locationbase==""?"selected":"")?>>ALL LB</option>
         <?					
						$result1=mysql_query("select * from ".$dbprefix."location_base order by cid");
						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->cid."\" ";
							if(!empty($locationbase)){
								if ($locationbase==$row1->cid) {echo "selected";}
							}
							echo ">".$row1->cname."</option>";
						}
						?>
      </select>
        <input name="submit" type="submit" value="&#3588;&#3657;&#3609;" />
        <input name="stype" id="stype" type="hidden" value="<?=$stype?>" />
      </fieldset></td>
    </tr>
  </table>
</form>
<? }?>
