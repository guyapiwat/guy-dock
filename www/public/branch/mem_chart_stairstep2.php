<? include("global.php");
if (isset($_GET["smc"])){$smc=$_GET["smc"];}else{$smc="";}
if ($cmc==""){
    $cmc = $GLOBALS["defmcode"];
}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc = $GLOBALS["defmcode"];}
set_time_limit (0);
ini_set("memory_limit","1000M");

if(isset($_POST["key"])){
    if($_POST["cause"]==""){
        $cmc = $GLOBALS["defmcode"];
    }else{ 
        if($_POST["key"]=="code"){
            $sql = "select * from ".$dbprefix."member where mcode like '".trim($_POST["cause"])."%' limit 0,1";
            $rs = mysql_query($sql);
            if(mysql_num_rows($rs)>0){
                $cmc = mysql_result($rs,0,"mcode");
            }else{
                $cmc = $_POST["cause"];
            }
            mysql_free_result($rs);
        }else if($_POST["key"]=="name"){
            $sql = "select * from ".$dbprefix."member where name_t like '".trim($_POST["cause"])."%' limit 0,1";
            $rs = mysql_query($sql);
            if(mysql_num_rows($rs)>0){
                $cmc = mysql_result($rs,0,"mcode");
            }else{
                ?>
                <table width="100%" border="0">
                  <tr align="center">
                    <td><font color="#c00000"><br>ไม่สามารถดูข้อมูลได้เพราะไม่พบชื่อสมาชิก <?=$_POST["cause"]?></font></td>
                  </tr>
                  <tr align="center">
                    <td><br><img src="./images/sp_s.gif" width="24" height="24" align="absmiddle" />[<a href="./index.php?sessiontab=1&sub=55">กลับไปยังแผนภูมิสายงานผู้แนะนำ</a>]</td>
                  </tr>
                </table>
                <?
                exit;
            }
        }
    }
}
// ตรวจสอบว่า $cmc อยู่ในสายงานของ $smc หรือไม่
$cmc = gencode($cmc);
$cur=$cmc;
$abs_lev=0;                // level จาก $smc ถึง $cmc; ถ้า $smc=$cmc, abs_lev=0



$result=mysql_query("select * from ".$dbprefix."member where mcode='".$cmc."' ");
if (mysql_num_rows($result)>0) {
    $row = mysql_fetch_object($result);
    $cmc_name=$row->name_b." ";
        if(empty($row->name_b))$cmc_name = $row->name_t." ";
    $cmc_name = $row->name_f.' '.$cmc_name;

    $cmc_upb_code=$row->upb_code;
    $cmc_sp_code=$row->sp_code;
    $oid=$row->id;
    $sql = "SELECT mid,max(exp_date) AS exp_date FROM ".$dbprefix."expdate WHERE mid='$oid' GROUP BY mid ";
    //echo $sql;
    $result=mysql_query($sql);
    if(mysql_num_rows($result)>0){
        $cmc_expdate=mysql_result($result,0,'exp_date');
        //mysql_free_result($result);
    }
}else{
    ?>
    <table width="100%" border="0">
      <tr align="center">
        <td><br><font color="#c00000">ไม่สามารถดูข้อมูลได้เพราะไม่พบรหัส <?=$cmc?></font></td>
      </tr>
      <tr align="center">
        <td><br><img src="./images/sp_s.gif" width="24" height="24" align="absmiddle" />[<a href="./index.php?sessiontab=1&sub=55">กลับไปยังแผนภูมิสายงานผู้แนะนำของ <?=$GLOBALS["defmcode"]?></a>]</td>
      </tr>
    </table>
    <?
    exit;
}

mysql_free_result($result);
?>

<table width="100%" border="0">
  <tr>
	<td colspan="3">
		<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td width="50%" align="left" valign="top">
    <form method="post" action="./index.php?sessiontab=1&sub=5">
        <input type="text" name="cause">
        <select name="key">
            <option value="code">รหัสสมาชิก</option>
            <option value="name">ชื่อ</option>
        </select>
        <input type="submit" value="ค้น">
    </form></td></tr></table>
	</td>
  </tr>
  <tr>
    <td width="30%" valign="top">
    <?
    $rs = mysql_query("SELECT * FROM ".$dbprefix."position ORDER BY posid ASC");
    for($i=0;$i<mysql_num_rows($rs);$i++){
        $posid[$i] = mysql_result($rs,$i,'posshort');
        $imgPosDef[mysql_result($rs,$i,'posshort')] = "./images/".mysql_result($rs,$i,'posimg');
        $tabUPosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posutab');
        //$tabDPosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posdtab');
        $namePosDef[mysql_result($rs,$i,'posshort')] = mysql_result($rs,$i,'posname');
    }
    $posid[$i] = "null";
    $imgPosDef[$posid[$i]] = "./images/balls_11.gif";
    $tabUPosDef[$posid[$i]] = "#EEEEEE";
    //$tabDPosDef[$posid[$i]] = mysql_result($rs,$i,'posdtab');
    $namePosDef[$posid[$i]] = "ไม่มีสมาชิก";
    mysql_free_result($rs);
    ?>
        <?php include_once("../backoffice/redialog_member.php"); ?>
      </td>
	  <td valign="top">
		<?php include_once("../backoffice/redialog_point.php"); ?>
	  </td>
    <td width="42%" valign="top">
    <table>

    <?
    for($i=0;$i<sizeof($posid)/2;$i++){
        echo "<tr>";
        echo "<td align='right' width='20' bgcolor='".($GLOBALS["treeformat"]=="sqare"?$tabUPosDef[$posid[2*$i]]:"")."'>";
        if($GLOBALS["treeformat"]!="sqare")
            echo "<img src='".$imgPosDef[$posid[2*$i]]."' width='50%'>";
        echo "</td><td>";
        echo "=".$namePosDef[$posid[2*$i]];
        if(!($posid[2*$i]=="" || $posid[2*$i]=="null"))
            echo " (".$posid[2*$i].")";
        echo "</td>";
        if((2*$i+1)>=sizeof($posid)){
            echo "<td>&nbsp;</td><td>&nbsp;</td></tr>";
            break;
        }
        echo "<td align='right' width='20' bgcolor='".($GLOBALS["treeformat"]=="sqare"?$tabUPosDef[$posid[2*$i+1]]:"")."'>";
        if($GLOBALS["treeformat"]!="sqare")
            echo "<img src='".$imgPosDef[$posid[2*$i+1]]."' width='50%'>";
        echo "</td><td>";
        echo "=".$namePosDef[$posid[2*$i+1]];
        if(!($posid[2*$i+1]=="" || $posid[2*$i+1]=="null"))
            echo " (".$posid[2*$i+1].")";
        echo "</td>";
        echo "</tr>";
    }
    ?>
    </table>
</td>
  </tr>
  <tr align="center" height="20">
      <td colspan="3"><b><div id="divname" align="center"></div></b></td>
  </tr>
  <tr align="center">
    <td colspan="3"><iframe src="./mem_chart_stairstep_frame2.php?cmc=<?=$cmc?>" width="100%" height="500"></iframe></td>
  </tr>
</table>

<?
function getpositionname($p){
    global $dbprefix;
    // connect to database 
    include_once "connectmysql.php";
    $sql="select * from ".$dbprefix."position where posid=".$p." ";
    //echo "$sql<BR>";
    if ($p==""){return "ไม่มีตำแหน่ง";}
    $result=mysql_query($sql);
    if (mysql_num_rows($result)>0) {
        $row = mysql_fetch_object($result);
        return $row->posname;
    }else{
        return "ไม่มีตำแหน่ง";
    }
}

?>
