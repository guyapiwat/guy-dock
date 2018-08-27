<?
$fdate = $_POST['fdate']==""?$_GET['fdate']:$_POST['fdate'];
$tdate = $_POST['tdate']==""?$_GET['tdate']:$_POST['tdate'];

		
	if(isset($_POST["satype"]))
		$satype = $_POST["satype"];
	else if(isset($_GET["satype"]))
		$satype = $_GET["satype"];

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
	if(!empty($_GET['bills'])){$bills = $_GET['bills'];}else {if(!empty($_POST['bills'])){$bills = $_POST['bills'];}else{$bills='';}}
?>

<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<br />
<?
	$stype = $_POST['stype'];
	$stype = $stype==""?$_GET['stype']:$_POST['stype'];
	$stype = $stype==""?1:$stype;
	switch($stype){
		case 1:
			searchbox($dbprefix,$inv_code,$fdate,$tdate,$stype,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$locationbase,$vip);
			include("sale_bill_ewallet_odernum.php");
			break;
		case 2:
			searchbox($dbprefix,$inv_code,$fdate,$tdate,$stype,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$locationbase,$vip);
			include("sale_bill_ewallet_odernum1.php");
			break;
		case 3:
			searchbox($stype,$satype,$sbtype,$fdate,$tdate,$strSearch,$strtype,$spv,$sspv,$vip);
			include("sale_bill_amount_member.php");
			break;
	}
?>

<? function searchbox($dbprefix,$inv_code,$fdate,$tdate,$stype,$satype,$logistic,$strpv,$strtotal,$struid,$sspv,$strtype,$strSearch,$locationbase,$vip){
	global $wording_lan,$bills;
	include("../function/global_center.php");

	?>
<form style="margin-bottom:0;" action="index.php?sessiontab=3&sub=17&stype=<?=$stype?>" method="post">
     <table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
      <tr><td colspan="6" align="center">&nbsp;</td></tr> 
      <tr>    
       <td align="center">วันที่
        <input type="text" id="dateInput1" onkeypress="return chknum(window.event.keyCode)" name="fdate" size="10" maxlength="10" value="<?=$fdate?>" placeholder="2014-01-20"/>
        &nbsp;&nbsp;
        ถึง
        &nbsp;&nbsp;
        <input type="text" id="dateInput2" onkeypress="return chknum(window.event.keyCode)" name="tdate" size="10" maxlength="10" value="<?=$tdate?>" placeholder="2014-01-31"/>         
 
         <td align="right">สาขา</td>
         <td><select size="1" name="inv_code" id="inv_code" tabindex="63">
                  <option value="" <? if($inv=='')echo "selected"; ?> >ทั้งหมด</option>
             <?                    
                $result1=mysql_query("select * from ali_invent ");
                for ($i=1;$i<=mysql_num_rows($result1);$i++){
                    $row1 = mysql_fetch_object($result1);
                    //echo "<option value=\"\" ";
                    echo "<option value=\"".$row1->inv_code."\" ";
                     
                    if ($inv==$row1->inv_code) {echo "selected";}
                    echo ">".$row1->inv_desc."</option>";
                }
                ?>
         </select>
         </td>
 
 
       <td align="center"> 
        <select name="sale" id="sale">
            <option value="" >บิลทั้งหมด </option>     
            <option value="A" <?if($_REQUEST['sale']=='A')echo "selected"; ?>>บิลที่ไม่ยกเลิก</option>
            <option value="1" <?if($_REQUEST['sale']=='1')echo "selected"; ?>>บิลที่ยกเลิก</option>
       </select>    
       <input type="submit" name="Submit" value="ค้นหา">
        &nbsp;<!--input type="button" name="Submit" value="ดูรายงาน" onclick="checkround()" /--></td>
      </tr>
	   <tr <?if(($_GET['sessiontab'] == 3 and $_GET['sub'] == 17) or ($_GET['sessiontab'] == 3 and $_GET['sub'] == 10) or ($_GET['sessiontab'] == 6 and ($_GET['sub'] == 146 or $_GET['sub'] == 148 or $_GET['sub'] == 202))){}else{echo "style='display:none'";}?> >
		<td colspan="7" align="center">
			<br><?//echo $_GET['sessiontab']."  ".$_GET['sub'];?>
			ค้นเลขบิลหลายบิล&nbsp;<input type="text"  name="bills" id="bills" placeholder="ค้นหาหลายบิลให้คั่นด้วย ',' ค้นหาหว่างบิลคั่นด้วย '-' " style="width:80%;" value="<?=$bills;?>" >
		</td>
	</tr>
     <tr><td colspan="6" align="center">&nbsp;</td></tr>
    </table>

  <br/>
</form>
<? }?>
