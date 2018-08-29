<? include("./global.php");?>
<script language="javascript" type="text/javascript" src="../backoffice/datetimepick/datetimepicker.js"></script>
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
	.border 	{ border-bottom-color:#333333; border-bottom-style:solid; border-bottom-width:1;
					border-left-color:#FFFFFF; border-left-style:solid; border-left-width:1;}
</style>

<br />
<?
	// รหัสของ mcode ที่ login คือ $smc
	include("connectmysql.php");
	?>
	<table width="95%" border="0" align="center">
	  <tr valign="top">
		<td width="20%" align="center">
		
		<fieldset>
		<table width="150" border="0">
	  <tr align="center">
		<td bgcolor="#CCCCCC" class="border"><b>เดือน-ปี</b></td>
	  </tr>
	<?
	$rs = mysql_query("SELECT min(sadate) AS min ,max(sadate) AS max FROM ".$dbprefix."asaleh  ");
	if(mysql_num_rows($rs)>0){
		$dmax = explode("-",mysql_result($rs,0,'max'));
		$dmin = explode("-",mysql_result($rs,0,'min'));
		for($i=$dmax[0];$i>=$dmin[0];$i--){
			$mend = $dmin[0]==$i?$dmin[1]:1;
			$mstart = $dmax[0]==$i?$dmax[1]:12;
			for($j=$mstart;$j>=$mend;$j--){
			?>
			<tr align="center">
				<td><a href="<?=$PHP_SELF."?sessiontab=5&sub=2&ym=".$i."-".(strlen($j)==1?("0".$j):$j)?>"><?=strlen($j)==1?("0".$j):$j; echo "-".$i;?>
			    </a>&gt;&gt;</td>
		  	</tr>
				<?
			}
		}
		
	}else{
		echo "ไม่พบข้อมูล การซื้อขายใดๆ";
	}
	?></table>
	</fieldset>
	</td>
    <td width="80%">
	<?
	if(isset($_GET['ym'])) $dslc = $_GET['ym'];
	else $dslc = date("Y-m");
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
	$sql = "SELECT ".$dbprefix."around.*, ".$dbprefix."ambonus.* FROM ".$dbprefix."around, ".$dbprefix."ambonus WHERE (".$dbprefix."around.tdate LIKE '$dslc%') AND ";
	$sql .= "(".$dbprefix."around.rcode=".$dbprefix."ambonus.rcode) AND (".$dbprefix."ambonus.mcode='$smc') ORDER BY tdate DESC ";
	//echo $sql."<br>";
	$rs = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$obj = mysql_fetch_object($rs);
		$amb_fdate[$i] = $obj->fdate;
		$amb_tdate[$i] = $obj->tdate;
		$amb_l[$i] = $obj->tdate;
	}
	$sql = "SELECT * FROM ".$dbprefix."asaleh,".$dbprefix."member WHERE $cond AND ( sadate LIKE '".$dslc."%') AND ".$dbprefix."asaleh.mcode = ".$dbprefix."member.mcode  ORDER BY ".$dbprefix."asaleh.sadate DESC";
	//echo $sql;
	$rs = mysql_query($sql);
	?>
	ข้อมูลคะแนนเข้าในช่วง <?=$dslc?>
	<table border="0" width="95%" cellpadding="0" cellspacing="0">
	  <tr class="border" align="center" bgcolor="#CCCCCC">
		<td width="15%" class="border"><b>วันที่</b></td>
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
		if($odate!=$obj->sadate && $odate!=""){ 
			list($y,$m,$d) = explode("-",$odate);
		?><tr bgcolor="#CCCCCC">
  <td align="center" style="<?=$style_b?>"><?=$d."-".$m."-".$y?></td>
  <? 
			$odate = $obj->sadate;
			for($k=1;$k<=$GLOBALS["numofchild"];$k++){  ?>
			<td align="right" style="<?=$style_b.$style_l?>"><?=number_format($sum[$k],0,'.',',')." PV &nbsp;"?></td>
			<? $sum[$k] = 0;
			}?>
		  <td align="center" style="<?=$style_b.$style_l?>">&nbsp;</td>
			<td style="<?=$style_b.$style_l?>">&nbsp;</td>
			<td style="<?=$style_b.$style_l?>" align="center"><b>รวม</b></td>
		  </tr>
		<?		
		}else if($odate==""){
			$odate = $obj->sadate;
		}
	list($y,$m,$d) = explode("-",$obj->sadate);
?>	<tr>
    <td align="center" style="<?=$style_b?>"><?=$d."-".$m."-".$y?></td>
   <? 
	for($k=1;$k<=$GLOBALS["numofchild"];$k++){  ?>
    <td align="right" style="<?=$style_b.$style_l?>"><?=($lr[$obj->mcode]==$k? number_format($obj->tot_pv,0,'.',','):"0")." PV &nbsp;"?></td>
	<? 
		$sum[$k] += $lr[$obj->mcode]==$k?$obj->tot_pv:0;
		//echo "<td>".$sum[$k]."</td>";
	}?>
    <td align="center" style="<?=$style_b.$style_l?>"><?=$obj->mcode?></td>
	<td style="<?=$style_b.$style_l?>">&nbsp;&nbsp;&nbsp;<?=$obj->name_t?></td>
	<td style="<?=$style_b.$style_l?>">&nbsp;<?=$satype_def[$obj->sa_type]?></td>
  </tr>
<?
	}
	mysql_free_result($rs);
	//--------------------------
			list($y,$m,$d) = explode("-",$odate);
		?><tr bgcolor="#CCCCCC">
  <td align="center" style="<?=$style_b?>"><?=$d."-".$m."-".$y?></td>
  <? 
			$odate = $obj->sadate;
			for($k=1;$k<=$GLOBALS["numofchild"];$k++){  ?>
			<td align="right" style="<?=$style_b.$style_l?>"><?=number_format($sum[$k],0,'.',',')." PV &nbsp;"?></td>
			<? $sum[$k] = 0;
			}?>
		  <td align="center" style="<?=$style_b.$style_l?>">&nbsp;</td>
			<td style="<?=$style_b.$style_l?>">&nbsp;</td>
			<td style="<?=$style_b.$style_l?>" align="center"><b>รวม</b></td>
		  </tr>
		<?
	//--------------------------
	?>	</table></td>
  </tr>
</table>
