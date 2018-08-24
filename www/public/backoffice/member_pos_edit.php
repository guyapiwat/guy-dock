<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<?
    $id = $_GET['id'];
    $sql = "SELECT * FROM ".$dbprefix."member WHERE id='$id' LIMIT 1";
    //echo $sql;
    $rs = mysql_query($sql);
    $pos_cur = mysql_result($rs,0,'pos_cur');
    $pos_cur1 = mysql_result($rs,0,'pos_cur2');

    $mcode = mysql_result($rs,0,'mcode');
    $sql1 = "select carry_l,carry_c from ".$dbprefix."bmbonus  where mcode='$mcode' order by cid desc limit 1";
    $query = mysql_query($sql1);
    if(mysql_num_rows($query)>0) list($carry_l ,$carry_c) = mysql_fetch_row($query);
?>
<form action="memposoperate.php?state=1" method="post" name="posedit">
<table align="center" width="70%" border="0">
    <tr>
      <td colspan="6">รหัส <?=mysql_result($rs,0,'mcode')?>&nbsp;&nbsp;&nbsp;&nbsp;ชื่อ <?=mysql_result($rs,0,'name_t')?>
      <input type='hidden' name='id' id='id' value='<?=$id?>'>
      <input type='hidden' name='opos' id='opos' value='<?=$pos_cur?>'>
       <input type='hidden' name='opos1' id='opos1' value='<?=$pos_cur2?>'>
      </td>
    </tr>
    
<tr bgcolor="#FFCC33" >
 <td colspan="6">
ตำแหน่ง
</td>
<tr>    <?
    mysql_free_result($rs);
    $rs = mysql_query("SELECT * FROM ".$dbprefix."position where posid <= 10 order by posid asc");
    for($i=0;$i<mysql_num_rows($rs);$i++){
        $posid[$i] = mysql_result($rs,$i,'posshort');
        $imgPosDef[mysql_result($rs,$i,'posshort')] = "./images/".mysql_result($rs,$i,'posimg');
        $tabUPosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posutab');
        //$tabDPosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posdtab');
        $namePosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posname');
    }
     mysql_free_result($rs);
    ?>
    <?
    for($i=0;$i<sizeof($posid)/2;$i++){
        
        echo "<tr>";
        echo "<td align='right' style='padding: 5px;'><input type='radio' name='pos' id='pos' value='".($posid[2*$i])."' ".($posid[2*$i]==$pos_cur?"checked":"")."></td>";
        echo "<td align='right' width='20' style='padding: 5px; bgcolor='".($GLOBALS["treeformat"]=="sqare"?$tabUPosDef[$posid[2*$i]]:"")."'>";
        if($GLOBALS["treeformat"]!="sqare")
            echo "<img src='".$imgPosDef[$posid[2*$i]]."' >";
        echo "</td><td >";
        echo "&nbsp;&nbsp;=&nbsp;&nbsp;".$namePosDef[$posid[2*$i]];
        if(!($posid[2*$i]=="" || $posid[2*$i]=="null"))
            echo " (".$posid[2*$i].")";
        echo "</td>";
        if(($i*2)+1>=sizeof($posid)){
            echo "<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
            break;
        }
        echo "<td align='right'  style='padding: 5px;'><input type='radio' name='pos' id='pos' value='".($posid[2*$i+1])."' ".($posid[2*$i+1]==$pos_cur?"checked":"")."></td>";
        echo "<td align='right' width='20'  style='padding: 5px;' bgcolor='".($GLOBALS["treeformat"]=="sqare"?$tabUPosDef[$posid[2*$i+1]]:"")."'>";
        if($GLOBALS["treeformat"]!="sqare")
            echo "<img src='".$imgPosDef[$posid[2*$i+1]]."' >";
        echo "</td><td>";
        echo "&nbsp;&nbsp;=&nbsp;&nbsp;".$namePosDef[$posid[2*$i+1]];
        if(!($posid[2*$i+1]=="" || $posid[2*$i+1]=="null"))
            echo " (".$posid[2*$i+1].")";
        echo "</td>";
        echo "</tr>";
    }
    ?>


<tr bgcolor="#FFCC33" >
 <td colspan="6" >
เกียรติยศ
</td>
<tr>

     <?

    $rs = mysql_query("SELECT * FROM ".$dbprefix."position where posid  > 30 and posid !=57  order by posid asc");
    for($k=0;$k<mysql_num_rows($rs);$k++){
        $posid1[$k] = mysql_result($rs,$k,'posshort');
        $kmgPosDef1[mysql_result($rs,$k,'posshort')] = "./images/".mysql_result($rs,$k,'posimg');
        $tabUPosDef1[mysql_result($rs,$k,'posshort')] = mysql_result($rs,$k,'posutab');
        //$tabDPosDef[mysql_result($rs,$k,'posshort')] = mysql_result($rs,$k,'posdtab');
        $namePosDef1[mysql_result($rs,$k,'posshort')] = mysql_result($rs,$k,'posname');
    }
     mysql_free_result($rs);
	echo "<tr align='right'  >";
    echo "<td align='right' style='padding: 5px;' ><input type='radio' name='pos1' id='pos1' value='' ".($posid1[2*$k]==''?"checked":"")."></td>";
	echo "<td align='right' width='20' style='padding: 5px;' ><img src='./images/balls_11.gif' width='35px'></td><td align='left'>&nbsp;&nbsp;=&nbsp;&nbsp;none</td>";
	echo "</tr>";
    for($k=0;$k<sizeof($posid1)/2;$k++){
        
       echo "<tr>";
        echo "<td align='right' style='padding: 5px;' ><input type='radio' name='pos1' id='pos1' value='".($posid1[2*$k])."' ".($posid1[2*$k]==$pos_cur1?"checked":"")."></td>";
        echo "<td align='right' width='20'  style='padding: 5px;' bgcolor='".($GLOBALS["treeformat"]=="sqare"?$tabUPosDef1[$posid1[2*$k]]:"")."'>";
        if($GLOBALS["treeformat"]!="sqare")
            echo "<img src='".$kmgPosDef1[$posid1[2*$k]]."' >";
        echo "</td><td>";
        echo "&nbsp;&nbsp;=&nbsp;&nbsp;".$namePosDef1[$posid1[2*$k]];
        if(!($posid1[2*$k]=="" || $posid1[2*$k]=="null"))
            echo " (".$posid1[2*$k].")";
        echo "</td>";
        if(($k*2)+1>=sizeof($posid1)){
            echo "<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
            break;
        }
        echo "<td align='right'  style='padding: 5px;'><input type='radio' name='pos1' id='pos1' value='".($posid1[2*$k+1])."' ".($posid1[2*$k+1]==$pos_cur1?"checked":"")."></td>";
        echo "<td align='right' width='20'  style='padding: 5px; bgcolor='".($GLOBALS["treeformat"]=="sqare"?$tabUPosDef1[$posid1[2*$k+1]]:"")."'>";
        if($GLOBALS["treeformat"]!="sqare")
            echo "<img src='".$kmgPosDef1[$posid1[2*$k+1]]."' >";
        echo "</td><td>";
        echo "&nbsp;&nbsp;=&nbsp;&nbsp;".$namePosDef1[$posid1[2*$k+1]];
        if(!($posid1[2*$k+1]=="" || $posid1[2*$k+1]=="null"))
            echo " (".$posid1[2*$k+1].")";
        echo "</td>";
        echo "</tr>";
    }
    ?>
 

    <tr><td align="center" colspan="6"><input type="submit" value="ตกลง"></td></tr>
</table>
</form>
