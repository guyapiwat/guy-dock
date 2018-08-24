<? 
include("prefix.php");
include("connectmysql.php");
//header ("Content-Type: text/html; charset=tis-620");
//header ("Content-Type: text/html; charset=utf-8");
//header("Content-type: text/html; charset=windows-874");
?>
<?

$arrpos = array('P'=>"Platinum",'G'=>"Gold",'D'=>"Diamond",'V'=>"ไม่มีตำแหน่ง",''=>"ไม่มีตำแหน่ง");
$imgpos = array('P'=>"./images/mcode_platinum_2.gif",'D'=>"./images/mcode_diamond_2.gif",'G'=>"./images/mcode_gold_2.gif",'V'=>"./images/mcode_green_2.gif",''=>"./images/mcode_red_2.gif");
$imgStat = array('+'=>"./images/plus.gif",'-'=>"./images/minus.gif",'o'=>"./images/stop.gif");
$mc = $_GET['pmc'];
mysql_query("SET NAMES 'utf8'");
$rs = mysql_query("SELECT * FROM ".$dbprefix."member WHERE mcode='$mc' LIMIT 1");
$mcode = mysql_result($rs,0,'mcode');
$mname = mysql_result($rs,0,'name_t');
$mpos = mysql_result($rs,0,'pos_cur');
	   	$result1=mysql_query("select * from ".$dbprefix."member where upa_code='".$mcode."' order by lr desc");
		$tabAttr = "cellpadding='0' cellspacing='0'";
		$tstat	=	"-";
		$useScript .= "onclick=\"createTree('".$mcode."')\"";
		echo "<div id='h_".$mcode."'>";
		echo "<table border='0' align='left' valign='top' ".$tabAttr."><tr>";
		echo "<td  width='12' id='s_".$mcode."'  my='".$tstat."'><img style=\"cursor:pointer; \" src='".$imgStat[$tstat]."' ".$useScript."></td>";
		echo "<td> รหัส <a href='index.php?sessiontab=1&sub=8&cmc=$mcode'>".$mcode."</a> ชื่อ ".$mname." </td></tr>";
		$row = mysql_num_rows($result1);
		$imgb = "<img src='./images/tlineb.gif'></img>";
		for($i=0;$i<mysql_num_rows($result1);$i++){
			$bg = "";
			if(!($i==mysql_num_rows($result1)-1))
				$bg = "background='./images/tline.gif'";
			
			//if($row == 1)
				//$imgb = "<img src='./images/b1.gif'></img>";
			//else if($row == 2 && $i==1)
				
			
			$ccode = mysql_result($result1,$i,'mcode');
			$cname = mysql_result($result1,$i,'name_t');
			$cpos = mysql_result($result1,$i,'pos_cur');
			$result2=mysql_query("select * from ".$dbprefix."member where upa_code='".$ccode."' order by lr desc");
			$useScript = "";
			$tabAttr = "cellpadding='0' cellspacing='0'";
			$tstat	=	"o";

			if(mysql_num_rows($result2)>0){
				$useScript .= "onclick=\"createTree('".$ccode."')\"";
				$tstat	=	"+";
			}

			echo "<tr valign='top'><td width='12' ".$bg.">".$imgb."</td><td>";
			echo "<div id='h_".$ccode."'>";
			echo "<table  border='0' valign='top' ".$tabAttr."><tr>";
			echo "<td  width='12' id='s_".$ccode."'  my='".$tstat."'><img  ".($tstat=='o'?"":"style=\"cursor:pointer; \"")." src='".$imgStat[$tstat]."' ".$useScript."></td>";
			echo "<td> รหัส <a href='index.php?sessiontab=1&sub=8&cmc=$ccode'>".$ccode."</a> ชื่อ ".$cname." </td>";
			echo "</tr></table></div>";
			echo "</td></tr>";
		}
		echo "</table></div>";
		mysql_free_result($result2);
		mysql_free_result($result1);
		mysql_free_result($rs);
//<img src='".$imgStat[$tstat]."'></img>

?>



