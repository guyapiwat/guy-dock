<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>
<html>
<head>
<title>Import Member</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>body{background-color:black;color:#008000;font-size:17px;font-family:tahoma;}</style>
</head>
<body>


<?php
set_time_limit (0);
ini_set("memory_limit","2000M");
$time_start = getmicrotime();
echo "เริ่มการคำนวณ ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน around<BR><BR>";

$cfdate = date('Y-m-01');  
$ctdate = date('Y-m-d');    
$dbprefix = 'ali_'  ;

del("ali_bm1"," 1=1 ");
$iff =1;
while (strtotime($cfdate) <= strtotime($ctdate)) {
	//echo $cfdate."d";
	if($iff =='1'){$fdate = $tdate = $cfdate;}
	getAllbill_to_bmx("ali_bm1",$fdate,$tdate);
	$cfdate = $fdate = $tdate = date ("Y-m-d", strtotime("+1 day", strtotime($cfdate)));
	$iff++;
}

$time_end = getmicrotime();
$time = $time_end - $time_start;
echo "getAllbill_to_bm :  ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR><BR>";

function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
}
