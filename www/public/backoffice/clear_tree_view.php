<? 
include("prefix.php");
include("connectmysql.php");
//header ("Content-Type: text/html; charset=utf-8");
//header ("Content-Type: text/html; charset=utf-8");
//header("Content-type: text/xml; charset=windows-874");
$mc = $_GET['pmc'];
$imgStat = array('+'=>"./images/plus.gif",'-'=>"./images/minus.gif",'o'=>"./images/stop.gif");
	$arrpos = array('EDM'=>"EDM",'DD'=>"DD",'P'=>"Platinum",'G'=>"Gold",'S'=>"Star",'MB'=>"Member",''=>"ไม่มีตำแหน่ง");
$imgpos = array('P'=>"./images/mcode_platinum_2.gif",'D'=>"./images/mcode_diamond_2.gif",'G'=>"./images/mcode_gold_2.gif",'V'=>"./images/mcode_green_2.gif",''=>"./images/mcode_red_2.gif");
mysql_query("SET NAMES 'utf8'");
$rs = mysql_query("SELECT * FROM ".$dbprefix."member WHERE mcode='$mc' LIMIT 1");
$mcode = mysql_result($rs,0,'mcode');
$mname = mysql_result($rs,0,'name_t');
$mpos = mysql_result($rs,0,'pos_cur');
$sql = "SELECT sum(tot_pv) AS all_pv FROM ".$dbprefix."asaleh WHERE mcode='$mcode' and  sa_type='A' ";
			//echo $sql;
			$rs1 = mysql_query($sql);
			$all_pv = mysql_result($rs1,0,'all_pv'); 
			mysql_free_result($rs1);

			$sql = "SELECT sum(tot_pv) AS all_pv FROM ".$dbprefix."holdhead WHERE mcode='$mcode' and sa_type='A' ";
			//echo $sql;
			$rs1 = mysql_query($sql);
			$all_pv = ($all_pv+mysql_result($rs1,0,'all_pv')); 
			mysql_free_result($rs1);
$result1=mysql_query("select * from ".$dbprefix."member where upa_code='".$mcode."' order by lr desc");
$useScript = "";
$tabAttr = "cellpadding='0' cellspacing='0'";
$tstat	=	"o";
if(mysql_num_rows($result1)>0){
	$useScript .= "onclick=\"createTree('".$mcode."')\"";
	$tstat	=	"+";
}
echo "<div id='h_".$mcode."'>";
echo "<table align='left' valign='top' ".$tabAttr."><tr>";
echo "<td  width='12' ".$bg." id='s_".$mcode."'  my='".$tstat."'><img  style=\"cursor:pointer; \" src='".$imgStat[$tstat]."' ".$useScript."></td>";
echo "<td> รหัส <a href='index.php?sessiontab=1&sub=8&cmc=$mcode'>".$mcode."</a> ชื่อ ".$mname." ตำแหน่ง ".$arrpos[$mpos]." คะแนน topup ".$all_pv." </td>";
echo "</tr></table></div>";
mysql_free_result($result1);
mysql_free_result($rs);

?>

