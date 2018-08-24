<? 
include("connectmysql.php");
include("../function/function_pos.php");
include("comsn/com_a/comsn_a_calc_func.php");

$time_start = getmicrotime();
echo "Start ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";

$datetime_start = date("Y-m-d H:i:s");
$sql = "INSERT INTO ali_report_cron (start_cron_cal) VALUES ('".$datetime_start."');";
mysql_query($sql);

$dbprefix = "ali_";
$ro = "0";
$date = date("Y-m-d");
$fdate = date("Y-m-d",strtotime("-1 days",strtotime($date)));
$tdate = date("Y-m-d",strtotime("-1 days",strtotime($date)));

$sql = "SELECT date_change FROM ali_calc_poschange WHERE date_change >= '{$tdate}' and type = '2' ";
$rs = mysql_query($sql);
if(mysql_num_rows($rs) > 0){
	$sql="delete from ali_calc_poschange where date_change >= '{$tdate}' and type = '2'";
	if(mysql_query($sql)){
		mysql_query("COMMIT");
		func_Pos_cur($dbprefix,$ro,$fdate,$tdate);
	}else{
		echo "error $sql<BR>";
	}	
}

//del_cals($dbprefix,$ro,array('calc_poschange'));				
del_cals($dbprefix,$ro,array('structure_binary_rcode'));				

func_structure_binary_rcode($dbprefix,$ro,$fdate,$tdate);
check_time("func_structure_binary_rcode",$time_start); 

func_position_first($dbprefix,$ro,$fdate,$tdate);
check_time("func_position_first",$time_start); 

func_position_secord($dbprefix,$ro,$fdate,$tdate);	
check_time("func_position_secord",$time_start); 

$datetime_finish = date("Y-m-d H:i:s");
$sql="update ali_report_cron set finish_cron_cal = '".$datetime_finish."' WHERE finish_cron_cal = '0000-00-00 00:00:00' ";
mysql_query($sql);

echo '<br>'; echo "Success";


?>