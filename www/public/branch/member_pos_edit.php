<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<?
	$id = $_GET['id'];
	$sql = "SELECT * FROM ".$dbprefix."member WHERE id='$id' LIMIT 1";
	//echo $sql;
	$rs = mysql_query($sql);
	$pos_cur = mysql_result($rs,0,'pos_cur');
	$mcode = mysql_result($rs,0,'mcode');
	$sql1 = "select carry_l,carry_r from ".$dbprefix."bmbonus  where mcode='$mcode' order by cid desc limit 1";
	$query = mysql_query($sql1);
	if(mysql_num_rows($query)>0) list($carry_l ,$carry_r) = mysql_fetch_row($query);
?>
<form action="memposoperate.php?state=1" method="post" name="posedit">
<table align="center" width="70%" border="0">
	<tr>
	  <td colspan="6">รหัส <?=mysql_result($rs,0,'mcode')?>&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ <?=mysql_result($rs,0,'name_t')?>
      <input type='hidden' name='id' id='id' value='<?=$id?>'>
      <input type='hidden' name='opos' id='opos' value='<?=$pos_cur?>'>
      </td>
    </tr>
	<tr><td colspan="6">&nbsp;</td>
    </tr>
    <?
	mysql_free_result($rs);
	$rs = mysql_query("SELECT * FROM ".$dbprefix."position ");
    for($i=0;$i<mysql_num_rows($rs);$i++){
		$posid[$i] = mysql_result($rs,$i,'posshort');
		$imgPosDef[mysql_result($rs,$i,'posshort')] = "./images/".mysql_result($rs,$i,'posimg');
		$tabUPosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posutab');
		//$tabDPosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posdtab');
		$namePosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posname');
	}
	//$posid[$i] = "null";
	//$imgPosDef[$posid[$i]] = "./images/balls_11.gif";
	//$tabUPosDef[$posid[$i]] = "#EEEEEE";
	//$tabDPosDef[$posid[$i]] = mysql_result($rs,$i,'posdtab');
	//$namePosDef[$posid[$i]] = "ไม่มีสมาชิก";
	mysql_free_result($rs);
	?>
    <?
    for($i=0;$i<sizeof($posid)/2;$i++){
		
		echo "<tr>";
		echo "<td align='right'><input type='radio' name='pos' id='pos' value='".($posid[2*$i])."' ".($posid[2*$i]==$pos_cur?"checked":"")."></td>";
		echo "<td align='right' width='20' bgcolor='".($GLOBALS["treeformat"]=="sqare"?$tabUPosDef[$posid[2*$i]]:"")."'>";
		if($GLOBALS["treeformat"]!="sqare")
			echo "<img src='".$imgPosDef[$posid[2*$i]]."' >";
		echo "</td><td>";
		echo "=".$namePosDef[$posid[2*$i]];
		if(!($posid[2*$i]=="" || $posid[2*$i]=="null"))
			echo " (".$posid[2*$i].")";
		echo "</td>";
		if(($i*2)+1>=sizeof($posid)){
			echo "<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
			break;
		}
		echo "<td align='right'><input type='radio' name='pos' id='pos' value='".($posid[2*$i+1])."' ".($posid[2*$i+1]==$pos_cur?"checked":"")."></td>";
		echo "<td align='right' width='20' bgcolor='".($GLOBALS["treeformat"]=="sqare"?$tabUPosDef[$posid[2*$i+1]]:"")."'>";
		if($GLOBALS["treeformat"]!="sqare")
			echo "<img src='".$imgPosDef[$posid[2*$i+1]]."' >";
		echo "</td><td>";
		echo "=".$namePosDef[$posid[2*$i+1]];
		if(!($posid[2*$i+1]=="" || $posid[2*$i+1]=="null"))
			echo " (".$posid[2*$i+1].")";
		echo "</td>";
		echo "</tr>";
	}
	?>
	<tr><td colspan="6" align="center" width="38%">&nbsp;</td></tr>
    <tr>
      <td colspan="6" align="center">ซ้าย
        <input type="text" size="15" id="carry_l" name="carry_l"  value="<?=$carry_l?>">
      ขวา
      <input type="text" size="15" id="carry_r" name="carry_r" value="<?=$carry_r?>" ></td>
    </tr>
    <tr>
      <td colspan="6" align="center" width="38%">วันที่ตำแหน่งมีผล:
        <input type="text" size="15" id="posdate" name="posdate" value="<?=date("Y-m-d")?>">
              <a href="javascript:NewCal('posdate','yyyymmdd',false,24)">
              <img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a>
    </td></tr>
    <tr><td align="center" colspan="6"><input type="submit" value="ตกลง"></td></tr>
</table>
</form>
