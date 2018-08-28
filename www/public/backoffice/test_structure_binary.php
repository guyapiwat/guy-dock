<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php");?>
<? require_once ("function.php");?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
set_time_limit (0);
ini_set("memory_limit","100M");
$time_start = getmicrotime();
echo "เริ่มการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน around<BR><BR>";

	mysql_query("TRUNCATE TABLE ali_structure_binary");

	$sql="SELECT mcode,lr FROM ".$dbprefix."member where mcode = '0000001'  ";
	$rsx = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($rsx);$i++){
		$sqlObjxxx = mysql_fetch_object($rsx);
		$mcode_index = '1';
		$mcode_ref =$sqlObjxxx->mcode;	
		$mcode_level = strlen($mcode_index);
		mysql_query("insert into  ".$dbprefix."structure_binary (mcode_index,mcode_ref,mcode_level) values('$mcode_index','$mcode_ref','$mcode_level') ");
		isLine($dbprefix,$mcode_ref,$mcode_index);	
	}

$time_end = getmicrotime();
$time = $time_end - $time_start;
echo "สิ้นสุดการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR><BR>";

function isLine($dbprefix,$mcode_ref,$mcode_index){
	$sql = "SELECT mcode,lr FROM ".$dbprefix."member WHERE sp_code2='$mcode_ref'  ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)> 0){
		$omcode_index = $mcode_index;
		//$olevel = $level+1;
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$j = $j+1;
			$sqlObj = mysql_fetch_object($rs);
			$mcode_ref = $sqlObj->mcode;
			$mcode_index = $omcode_index.''.$j;
			$mcode_level = strlen($mcode_index);
			mysql_query("insert into  ".$dbprefix."structure_binary (mcode_index,mcode_ref,mcode_level) values('$mcode_index','$mcode_ref','$mcode_level') ");
			isLine($dbprefix,$mcode_ref,$mcode_index);
		}
	}
}
	
function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
}
?>