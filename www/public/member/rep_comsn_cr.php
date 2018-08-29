<? include("./global.php");?>
<script language="javascript" type="text/javascript" src="../backoffice/datetimepick/datetimepicker.js"></script>
<script language="javascript" type="text/javascript">
	function newcarlender(y,m,d){
	//alert(document.getElementById('year').value)
		if(y=="") y = document.getElementById('year').value;
		if(m=="") m = document.getElementById('month').value;
		if(d=="") d = document.getElementById('day').value;
		window.location = "index.php?sessiontab=5&sub=99&year="+y+"&month="+m+"&day="+d;
	}
	function redirect(key){
		if(key==13)
			newcarlender('','','');
	}
</script>
<?
if (isset($_SESSION["usercode"])){$smc=$_SESSION["usercode"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if (isset($_POST["pmc"])){$cmc=$_POST["pmc"];}
if ($cmc=="") {$cmc=$smc;}
if ($cmc=="") {
	$cmc=$_SESSION["usercode"];
}

?>

<style>
	.border 	{ border-bottom:#333333 solid 1; border-left:#333333 solid 1;}
	.hline 		{ border-left:#333333 solid 1;}
</style>

<br />
<table width="95%" border="0" align="center">
  <tr valign="top">
		
<?
require("connectmysql.php");
require("./cls/repGenerator.php");

$sdate = isset($_POST['year'])?$_POST['year']:$_GET['year']; 
$sdate .= "-".(isset($_POST['month'])?$_POST['month']:$_GET['month']); 
$sdate .= "-".(isset($_POST['day'])?$_POST['day']:$_GET['day']);
list($y,$m,$d) = explode("-",$sdate); 
if($y=='' || $m=='' || $d=='')
	$sdate = "'".date("Y-m-d")."'";
else
	$sdate = checkdate($m,$d,$y)==true?"'$sdate'":"'".date("Y-m-d")."'";//"CURRENT_DATE()"
$sql = "SELECT DAYOFMONTH($sdate) AS today,MONTH($sdate) AS  tomonth,YEAR($sdate) AS  toyear,";
$sql .= "DAYNAME(CONCAT(YEAR($sdate),'-',MONTH($sdate),'-01')) AS startdate,";
$sql .= "DAYOFMONTH(ADDDATE(ADDDATE(CONCAT(YEAR($sdate),'-',MONTH($sdate),'-01'),INTERVAL 1 MONTH),INTERVAL -1 DAY)) AS enddate,";
$sql .= "CONCAT(YEAR($sdate),'-',MONTH($sdate),'-01')";
//echo "<br>".$sql;
$sdate = str_replace("'","",$sdate);
$rs = mysql_query($sql);
$day = 0;
$start = false;
$start_day_name = mysql_result($rs,0,'startdate');
$num_day = mysql_result($rs,0,'enddate');
$today = mysql_result($rs,0,'today');
$tomonth = mysql_result($rs,0,'tomonth');
$toyear = mysql_result($rs,0,'toyear');
?>
    <td width="80%">
	<?
	$k=0;
	$ucode[$k] = $smc;
	$cond = "( ";
	$satype_def = array('A'=>"ทำคุณสมบัติ",'Q'=>"รักษายอด");
	$style_b = "border-bottom:dashed #000000 1;";
	$style_l = "border-left:solid #000000 1;";
	while($ucode[$k]!=""){
		$sql = "SELECT mcode, lr FROM ".$dbprefix."member WHERE upa_code='$ucode[$k]'";
		//echo $sql."<br>";
		$rs = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$obj = mysql_fetch_object($rs);
			$ucode[sizeof($ucode)] = $obj->mcode;
			//print_r($ucode);
			if($k==0) {
				if($i==0)
					$cond .= " ".$dbprefix."asaleh.mcode='".$ucode[sizeof($ucode)-1];
				else
					$cond .= "' OR ".$dbprefix."asaleh.mcode='".$ucode[sizeof($ucode)-1];
				$lr[$obj->mcode] = $obj->lr;
				//echo  $obj->mcode." ".$lr[$obj->mcode]."<br />";
			}else{
				$cond .= "' OR ".$dbprefix."asaleh.mcode='".$ucode[sizeof($ucode)-1];
				$lr[$obj->mcode] = $lr[$ucode[$k]];
				//echo  $obj->mcode." ".$lr[$obj->mcode]."<br />";
			}
		}	
		mysql_free_result($rs);
		$k++;
		//echo $k." $cond <br>";
	}
	$cond .= "' )";
	if($cond == "( ' )")
		$cond = "('')";
	$sql = "SELECT ".$dbprefix."around.*, ".$dbprefix."bmbonus.* FROM ".$dbprefix."around, ".$dbprefix."bmbonus WHERE (".$dbprefix."around.tdate BETWEEN '$toyear-$tomonth-01' AND '$toyear-$tomonth-$num_day') AND ";
	$sql .= "(".$dbprefix."around.rcode=".$dbprefix."bmbonus.rcode) AND (".$dbprefix."bmbonus.mcode='$smc') ORDER BY ".$dbprefix."around.tdate DESC ";
	//echo $sql."<br>";
	$rs = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$obj = mysql_fetch_object($rs);
		$amb_fdate[$i] = $obj->fdate;
		$amb_tdate[$i] = $obj->tdate;
		$amb_l[$i] = $obj->tdate;
	}
	//LIKE '".$dslc."%'
	$sql = "SELECT * FROM ".$dbprefix."asaleh,".$dbprefix."member WHERE $cond AND ( sadate BETWEEN '$toyear-$tomonth-01' AND '$toyear-$tomonth-$num_day') AND ".$dbprefix."asaleh.mcode = ".$dbprefix."member.mcode  ORDER BY ".$dbprefix."asaleh.sadate ASC";
	//echo $sql;
	$rs = mysql_query($sql);
	?>
	<table border="0" width="95%" cellpadding="0" cellspacing="0">
	  <tr class="border" align="center" bgcolor="#CCCCCC">
		<td width="15%" style="border-bottom:#333333 solid 1;"><b>วันที่</b></td>
		<? for($k=0;$k<$GLOBALS["numofchild"];$k++){?>
			<td width="<?=(24/$GLOBALS["numofchild"])?>%" class="border"><b><?
			if($GLOBALS["numofchild"]==2||$GLOBALS["numofchild"]==3) 
				echo $GLOBALS["mem_def"][$k];
			else 
				echo $k;		
			?></b></td>
		<? }?>
		<td width="18%" class="border"><b>ได้จาก</b></td>
		<td width="27%" class="border"><b>ชื่อ</b></td>	
		<td width="15%" class="border"><b>หมายเหตุ</b></td>	
	  </tr>
<?
	$j=0;
	$odate = "";
	$sum[1] = 0;
	$sum[2] = 0;
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$obj = mysql_fetch_object($rs);
		if( $odate=="")
			$odate = $obj->sadate;
		if( $odate!=""){ 
			list($y,$m,$d) = explode("-",$odate);
			if($odate!=$obj->sadate){
				for($k=1;$k<=$GLOBALS["numofchild"];$k++)
					$sum[$k] = 0;
			}
			$odate = $obj->sadate;
			for($k=1;$k<=$GLOBALS["numofchild"];$k++){ 
				$sum[$k] += $lr[$obj->mcode]==$k?$obj->tot_pv:0;
				list($y,$m,$d) = explode("-",$obj->sadate);
				$datesum[$d."-".$m."-".$y][$k] = $sum[$k];
				//echo "<td>".$sum[$k]."</td>";
			}
			if($obj->sadate!=$sdate) continue;
		}else if($odate==""){
			$odate = $obj->sadate;
		}
		
		list($y,$m,$d) = explode("-",$obj->sadate);
	?>	<tr>
		  <td align="center" style="<?=$style_b?>"><?=$d."-".$m."-".$y?></td>
	   <? 
		  for($k=1;$k<=$GLOBALS["numofchild"];$k++){  ?>
		    <td align="right" style="<?=$style_b.$style_l?>"><?=($lr[$obj->mcode]==$k? number_format($obj->tot_pv,0,'.',','):"0")." PV &nbsp;"?></td>
		<? }?>
          <td align="center" style="<?=$style_b.$style_l?>"><?=$obj->mcode?></td>
          <td style="<?=$style_b.$style_l?>">&nbsp;&nbsp;&nbsp;<?=$obj->name_t?></td>
          <td style="<?=$style_b.$style_l?>">&nbsp;<?=$satype_def[$obj->sa_type]?></td>
	    </tr>
	<?
		}
		mysql_free_result($rs);
		//--------------------------
		list($y,$m,$d) = explode("-",$sdate);
	?><tr bgcolor="#CCCCCC">
		<td align="center" style="<?=$style_b?>"><?=$d."-".$m."-".$y?></td>
	  <? 
		for($k=1;$k<=$GLOBALS["numofchild"];$k++){  ?>
		<td align="right" style="<?=$style_b.$style_l?>"><?=number_format($datesum[$d."-".$m."-".$y][$k],0,'.',',')." PV &nbsp;"?></td>
		<? }?>
	  <td align="center" style="<?=$style_b.$style_l?>">&nbsp;</td>
		<td style="<?=$style_b.$style_l?>">&nbsp;</td>
		<td style="<?=$style_b.$style_l?>" align="center"><b>รวม</b></td>
	  </tr>
<?
	//--------------------------
	?>	</table></td>
    <td><fieldset>
<?
//-------------------------carlender-----------------------------
//---------------------------------------------------------------
$day_name = array("Sunday"=>"Sun","Monday"=>"Mon","Tuesday"=>"Tue","Wednesday"=>"Wed","Thursday"=>"Thu","Friday"=>"Fri","Saturday"=>"Sat");
$day_color = array("Sunday"=>"#999999","Monday"=>"#FFFFFF","Tuesday"=>"#FFFFFF","Wednesday"=>"#FFFFFF","Thuesday"=>"#FFFFFF","Friday"=>"#FFFFFF","Saturday"=>"#999999");
$month_name = array('01'=>"Jan",'02'=>"Feb",'03'=>"Mar",'04'=>"Apr",'05'=>"May",'06'=>"Jun",'07'=>"Jul",'08'=>"Aug",'09'=>"Sep",'10'=>"Oct",'11'=>"Nov",'12'=>"Dec");


echo "<table width='220' cellspacing='0' cellpadding='0'><tr valign='middle'>";
echo "<td><input style='text-align:right;' size='2' type='text' name='day' id='day' value='$today'></td>";
echo "<td><select name='month' id='month'>";
foreach(array_keys($month_name) as $key){
	echo "<option value='$key' ".($tomonth==$key?"selected":"").">".$month_name[$key]."</option>";
}
echo "</select></td>";
echo "<td align='right'><img style='cursor:pointer;' src='./images/previous.gif' onclick=\"newcarlender(document.getElementById('year').value-1,'','')\">";
echo "<input style='text-align:right;' size='7' type='text' name='year' id='year' onkeyup=\"redirect(event.keyCode)\" value='$toyear'>";
echo "<img style='cursor:pointer;' src='./images/next.gif' onclick=\"newcarlender(parseInt(document.getElementById('year').value)+1,'','')\">";
echo "&nbsp;&nbsp;<img style='cursor:pointer;' src='./images/gogo.gif' onclick=\"newcarlender('','','')\">";
echo "</td></tr></table>";

echo "<table border='1' cellspacing='0' cellpadding='0'><tr>";
foreach(array_keys($day_name) as $key){
	echo "<td align='center' width='30' bgcolor='".$day_color[$key]."'>".$day_name[$key]."</td>";
}
echo "</tr>";
for($i=0;$i<6;$i++){
	if($day>$num_day) break;
	echo "<tr>";
	foreach(array_keys($day_name) as $key){
		if(!$start && $start_day_name==$key){ $start=true;$day++;}
		echo "<td align='right' width='30' bgcolor='";
		if($day==$today)
			echo "#FFCC00";
		else if($day==date("d"))
			if($tomonth==date("m"))
				echo "#66EE00";
			else echo "#99EE99";
		else 
			echo $day_color[$key];
		echo "'>";
		if($day!=0 && $day<=$num_day)
			echo "<a href=\"javascript:newcarlender('','','".(strlen($day)<2?"0".$day:$day)."')\">";
		echo ($start==true&&$day<=$num_day?$day++:"&nbsp;");
		if($day!=0 && $day<=$num_day)
			echo "</a>";
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";
//-------------------------carlender-----------------------------
//---------------------------------------------------------------
 ?>   
    </fieldset>
    <fieldset>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr align="center"><td style="border-bottom:#333333 solid 1">วันที่</td>
 <?
	 for($k=0;$k<$GLOBALS["numofchild"];$k++){?>
		<td class="border"><?
		if($GLOBALS["numofchild"]==2||$GLOBALS["numofchild"]==3) 
			echo "รวม PV ".$GLOBALS["mem_def"][$k];
		else 
			echo $k;		
		?></td>
	<? }?>
    </tr>
    <?
	if(isset($datesum)){
		foreach(array_keys($datesum) as $key){
			list($d,$m,$y) = explode("-",$key);
			echo "<tr><td><a href=\"javascript:newcarlender('$y','$m','$d')\">$key</a></td>";
			for($k=0;$k<$GLOBALS["numofchild"];$k++){
				echo "<td class='hline' align='right'>".number_format($datesum[$key][$k+1],0,'.',',')."</td>";
			}
			echo "</tr>";
		}
	}
 ?>   
    </table></fieldset></td>
  </tr>
</table>
