<?
ini_set("memory_limit","10000M");
require("connectmysql.php");
require("../function/function_pos.php");
$dbprefix = "ali_";
$global = query("*","ali_global","1=1");
if($global[0]['status_cron'] == 1){
	exit;
}else{
	mysql_query("UPDATE ali_global SET status_cron=1 WHERE 1=1");
}
$member = query("*","ali_member","1=1");
$array_sp = array();
$array_upa = array();
foreach($member as $key => $val){
	$array_sp[$val['sp_code']][] = $val['mcode'];
	$array_upa[$val['upa_code']][$val['lr']] = $val['mcode'];
}

set_time_limit (0);
$time_start = getmicrotime();
echo "Start ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
$sqlz = "select mcode,sum(tot_pv) as tot_pv from (
SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh WHERE cancel =0 and tot_pv != 0 and sa_type = 'A' GROUP BY mcode
UNION ALL
SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_holdhead WHERE cancel =0 and tot_pv != 0 and sa_type = 'A' GROUP BY mcode
UNION ALL
SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_special_point WHERE sa_type = 'VA' GROUP BY mcode
) as a where 1=1 group by mcode
";
$rsz = mysql_query($sqlz);
$numz =  mysql_num_rows($rsz);
if(mysql_num_rows($rsz) > 0){
	for($z=0;$z<$numz;$z++){
		$rowz = mysql_fetch_object($rsz);
		$mcodez = $rowz->mcode;
		$tot_pv[$mcodez] = $rowz->tot_pv;     
	}
}

//////////////// Structure Binary /////////////////////////////
$sql = "CREATE TABLE ali_structure_binary_tmp (
id INT(11) UNSIGNED AUTO_INCREMENT , 
mcode_index VARCHAR(1000) COLLATE tis620_thai_ci NOT NULL,
mcode_ref VARCHAR(255) COLLATE tis620_thai_ci NOT NULL,
tot_pv int(11) NOT NULL,
level int(11) NOT NULL ,
 PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=tis620 COLLATE=tis620_thai_ci AUTO_INCREMENT=1  ";
mysql_query($sql);

$sql = "CREATE TABLE ali_structure_sponsor_tmp (
id INT(11) UNSIGNED AUTO_INCREMENT , 
mcode_index VARCHAR(1000) COLLATE tis620_thai_ci NOT NULL,
mcode_ref VARCHAR(255) COLLATE tis620_thai_ci NOT NULL,
tot_pv int(11) NOT NULL,
level int(11) NOT NULL ,
 PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=tis620 COLLATE=tis620_thai_ci AUTO_INCREMENT=1  ";
mysql_query($sql);

$sql="SELECT mcode,lr FROM ".$dbprefix."member where mcode = 'TH0000001'  ";
$rsx = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rsx);$i++){
	$sqlObjxxx = mysql_fetch_object($rsx);
	$mcode_index = '1';
	$mcode_ref =$sqlObjxxx->mcode;			
	$xtot_pv = $tot_pv[$mcode_ref];
	$xbalance = $balance[$mcode_ref];
	mysql_query("insert into  ".$dbprefix."structure_binary_tmp (mcode_index,mcode_ref,level,tot_pv) values('$mcode_index','$mcode_ref','0','$xtot_pv') ");
	mysql_query("insert into  ".$dbprefix."structure_sponsor_tmp (mcode_index,mcode_ref,level,tot_pv) values('$mcode_index','$mcode_ref','0','$xtot_pv') ");
	isLine_structure($dbprefix,$mcode_ref,$mcode_index,$level,$tot_pv,$array_upa);	
	isLine_structures($dbprefix,$mcode_ref,$mcode_index,$level,$tot_pv,$array_sp);	
}
alert_time($time_start,"Done Re Structure");

mysql_query("ALTER TABLE ali_structure_binary_tmp ADD INDEX (mcode_ref),ADD INDEX (mcode_index),ADD INDEX (tot_pv),ADD INDEX (level);");	
mysql_query("ALTER TABLE ali_structure_binary_tmp ENGINE=InnoDB");
mysql_query("DROP TABLE ali_structure_binary");
mysql_query("RENAME TABLE ali_structure_binary_tmp TO ali_structure_binary");

//////////////////////////////////////////////////////////////////
mysql_query("ALTER TABLE ali_structure_sponsor_tmp ADD INDEX (mcode_ref),ADD INDEX (mcode_index),ADD INDEX (tot_pv),ADD INDEX (level);");	
mysql_query("ALTER TABLE ali_structure_sponsor_tmp ENGINE=InnoDB");
mysql_query("DROP TABLE ali_structure_sponsor");
mysql_query("RENAME TABLE ali_structure_sponsor_tmp TO ali_structure_sponsor");

mysql_query("UPDATE ali_global SET status_cron=0 WHERE 1=1");
alert_time($time_start,"Done Rename");
//////////////// Structure Binary /////////////////////////////

function isLine_structure($dbprefix,$mcode_ref,$mcode_index,$level,$tot_pv,$array_upa){

	if(count($array_upa[$mcode_ref])> 0){
		$omcode_index = $mcode_index;
		$level++;
		foreach($array_upa[$mcode_ref] as $key => $val){
			$mcode_ref = $val;
			$mcode_index = $omcode_index.''.$key;
			$xtot_pv = $tot_pv[$mcode_ref];
			mysql_query("insert into  ".$dbprefix."structure_binary_tmp (mcode_index,mcode_ref,level,tot_pv) values('$mcode_index','$mcode_ref','$level','$xtot_pv') ");
			isLine_structure($dbprefix,$mcode_ref,$mcode_index,$level,$tot_pv,$array_upa);
		}
	}
}

function isLine_structures($dbprefix,$mcode_ref,$mcode_index,$level,$tot_pv,$array_sp){

	if(count($array_sp[$mcode_ref])> 0){
		$omcode_index = $mcode_index;
		$level++;
		$index = 0;
		foreach($array_sp[$mcode_ref] as $key => $val){
			$mcode_ref = $val;
			$index++;
			$mcode_index = $omcode_index.':'.$index;
			$xtot_pv = $tot_pv[$mcode_ref];
			mysql_query("insert into ".$dbprefix."structure_sponsor_tmp (mcode_index,mcode_ref,level,tot_pv) values('$mcode_index','$mcode_ref','$level','$xtot_pv') ");
			isLine_structures($dbprefix,$mcode_ref,$mcode_index,$level,$tot_pv,$array_sp);
		}
	}
}

 function alert_time($time_start,$txtoption){
	$time_end = getmicrotime();
	$time = $time_end - $time_start;
	echo "<BR>Finished : ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
	echo "Time Spent : $time Seconds<BR>";
}
function getmicrotime() { 
    list($usec, $sec) = explode(" ", microtime()); 
    return ((float)$usec + (float)$sec); 
} 


?>