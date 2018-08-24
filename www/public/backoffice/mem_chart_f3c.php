<?	include("global.php");
ini_set("memory_limit","1000M");

if (isset($_GET["smc"])){$smc=$_GET["smc"];}else{$smc="";}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc="";}
if ($cmc==""){
	$cmc = "TH0000001";
}
if(isset($_POST["key"])){
	if($_POST["cause"]==""){
		$cmc = $GLOBALS["defmcode"];
	}else{ 
		if($_POST["key"]=="code"){
			$sql = "select * from ".$dbprefix."member where mcode like '%".trim($_POST["cause"])."' limit 0,1";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				$cmc = mysql_result($rs,0,"mcode");
			}else{
				$cmc = $_POST["cause"];
			}
			mysql_free_result($rs);
		}else if($_POST["key"]=="name"){
			$sql = "select * from ".$dbprefix."member where name_t like '%".$_POST["cause"]."%' limit 0,1";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				$cmc = mysql_result($rs,0,"mcode");
			}else{
				?>
				<table width="100%" border="0">
				  <tr align="center">
					<td><br><font color="#c00000">ไม่สามารถดูข้อมูลได้เพราะไม่พบชื่อสมาชิก <?=$_POST["cause"]?></font></td>
				  </tr>
				  <tr align="center">
					<td><br><img src="./images/upa_s.gif" width="24" height="24" align="absmiddle" />[<a href="./index.php?sessiontab=1&sub=4">กลับไปยังแผนภูมิสายงานสมาชิก</a>]</td>
				  </tr>
				</table>
				<?
				exit;
			}
		}
	}
}
// ตรวจสอบว่า $cmc อยู่ในสายงานของ $smc หรือไม่
$cmc = $cmc;
$chk = $_POST["cause1"];


$cur=$cmc;
 

$abs_lev=0;				// level จาก $smc ถึง $cmc; ถ้า $smc=$cmc, abs_lev=0

$result=mysql_query("select *,DATE_FORMAT(".$dbprefix."member.mdate, '%d-%m-%Y') as mdate from ".$dbprefix."member where mcode='".$cmc."' ");
if (mysql_num_rows($result)>0) {
 
}else{
		?>
	<table width="100%" border="0">
	  <tr align="center">
		<td><br><font color="#c00000">ไม่สามารถดูข้อมูลได้เพราะไม่พบรหัส <?=$cmc?></font></td>
	  </tr>
	  <tr align="center">
		<td><br><img src="./images/upa_s.gif" width="24" height="24" align="absmiddle" />[<a href="./index.php?sessiontab=1&sub=4">กลับไปยังแผนภูมิสายงานสมาชิกของ <?=$GLOBALS["defmcode"]?></a>]</td>
	  </tr>
	</table>
	<?
		exit;
}

//mysql_free_result($result);

if($_POST){
	$_SESSION['chkSet'] = $_POST["cause"];
}
?>

<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td width="50%" align="left" valign="top">
         <form method="post" action="./index.php?sessiontab=1&sub=4">
            <input type="text" name="cause" value="<?=$_SESSION["chkSet"]?>">
            <select name="key">
                <option value="code">รหัสสมาชิก</option>
                <option value="name">ชื่อ</option>
            </select>
          <!--  <input type="text" name="cause1">-->
            <input type="submit" value="ค้นหา">
</table>

<table width="100%" border="0">
  <tr>
     <td  width="30%" valign="top"><?php include_once("../backoffice/redialog_member.php"); ?> </td>      
     <td  width="1%" valign="top"> </td>
     
     <td  width="30%" valign="top"><?php include_once("../backoffice/redialog_point.php"); ?> </td>   
      <td  width="1%" valign="top"> </td>  
     <td  width="40%" valign="top"><?php include_once("../backoffice/redialog_icon.php"); ?> </td>  

 </tr>
  <tr align="center" height="20" style="display:none">
  	<td colspan="5"><b><div id="divname" align="center"></div></b></td>
  </tr>
  <tr align="center">
    <td colspan="5" align="left"><iframe src="./mem_chart_f3c_frame.php?cmc=<?=$cmc?>&chk=<?=$chk?>" width="100%" height="600"></iframe></td>
  </tr>
</table>


<?

function getpositionname($p){
	global $dbprefix;
	// connect to database 
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
function gettotalpv($dbprefix,$mcode){
	$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ".$dbprefix."special_point WHERE  sa_type='VA' AND mcode='$mcode' group by mcode ";
				//if($mcode == '0000075')echo "$sql3<BR>";
				$rs3=mysql_query($sql3);
				if (mysql_num_rows($rs3)>0) {
					$sqlObj3 = mysql_fetch_object($rs3);
					$total_fv3= $sqlObj3->tot_pv;
				}else{
					$total_fv3=0;
				}
				mysql_free_result($rs3);
				//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_fv3;
} 
function LCR($mc){
	global $dbprefix;
	$sql="select * from ".$dbprefix."ambonus where mcode='$mc' order by rcode desc ";
	$result=mysql_query($sql);
	if($result){
		if (mysql_num_rows($result)>0) {
			$row = mysql_fetch_object($result);
			//return "\n(".$row->carry_l.",".$row->carry_c.",".$row->carry_r.") [".number_format($row->quota)."]";
		}
	}
	return "";
}
function dateDiff($startDate, $endDate) { 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 

} 
function expdate($startdate,$datenum){
 $startdatec=strtotime($startdate); // ทำให้ข้อความเป็นวินาที
 $tod=$datenum*86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
 $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
 return $ndate; // ส่งค่ากลับ
}
function fnc_check_sp($dbprefix){
	
}

function posname($pos_cur) {
	
	$sql = "SELECT posname FROM ali_position WHERE posshort ='".$pos_cur."' ";
		//echo $sql;
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0){
		$posname = mysql_result($rs,0,'posname'); 
			mysql_free_result($rs);
		}
		if($posname =='')$posname='-';
	return $posname;
}
 
?>
