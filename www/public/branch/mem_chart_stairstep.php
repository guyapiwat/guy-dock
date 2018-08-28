<? include("global.php");
if (isset($_GET["smc"])){$smc=$_GET["smc"];}else{$smc="";}
if ($cmc==""){
	$cmc = $GLOBALS["defmcode"];
}
if (isset($_GET["cmc"])){$cmc=$_GET["cmc"];}else{$cmc = "TH0000001";}
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
					<td><br><img src="./images/sp_s.gif" width="24" height="24" align="absmiddle" />[<a href="./index.php?sessiontab=1&sub=5">กลับไปยังแผนภูมิสายงานผู้แนะนำ</a>]</td>
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
$abs_lev=0;				// level จาก $smc ถึง $cmc; ถ้า $smc=$cmc, abs_lev=0



$result=mysql_query("select * from ".$dbprefix."member where mcode='".$cmc."' ");
if (mysql_num_rows($result)>0) {
	$row = mysql_fetch_object($result);
	$cmc_name=$row->name_b." ";
		if(empty($row->name_b))$cmc_name = $row->name_t." ";
	$cmc_name = $row->name_f.' '.$cmc_name;
	$cmc_pos=$row->pos_cur;
	$cmc_pos1=$row->pos_cur2;
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
		<td><br><img src="./images/sp_s.gif" width="24" height="24" align="absmiddle" />[<a href="./index.php?sessiontab=1&sub=5">กลับไปยังแผนภูมิสายงานผู้แนะนำของ <?=$GLOBALS["defmcode"]?></a>]</td>
	  </tr>
	</table>
	<?
	exit;
}

mysql_free_result($result);
?>

<table width="100%" cellspacing="0" cellpadding="0" border="0"><tr><td width="50%" align="left" valign="top">
         <form method="post" action="./index.php?sessiontab=1&sub=5">
            <input type="text" name="cause" value="<?=$$cmc?>">
            <select name="key">
                <option value="code">รหัสสมาชิก</option>
                <option value="name">ชื่อ</option>
            </select>
          <!--  <input type="text" name="cause1">-->
            <input type="submit" value="ค้นหา">
</table>
<table width="100%" border="0">
  <tr>
	<table width="100%" border="0">
	  <tr>
		<td width="42%" valign="top">
		<table width="100%" border="0">
		  <tr>
			 <td  width="30%" valign="top"><?php include_once("../backoffice/redialog_member.php"); ?> </td>      
			 <td  width="1%" valign="top"> </td>
			 
			 <td  width="30%" valign="top"><?php include_once("../backoffice/redialog_point.php"); ?> </td>   
			  <td  width="1%" valign="top"> </td>  
			 <td  width="40%" valign="top"><?php include_once("../backoffice/redialog_icon.php"); ?> </td>  

		 </tr>
		</table>
	</td>
	  </tr>
	  <tr align="center" height="20">
		<td colspan="2"><b><div id="divname" align="center"></div></b></td>
	  </tr>
	  <tr align="center">
		<td colspan="2"><iframe src="./mem_chart_stairstep_frame.php?cmc=<?=$cmc?>" width="100%" height="500"></iframe></td>
	  </tr>
	</table>
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
