<?
require("connectmysql.php");
$dbprefix = "ali_";
set_time_limit (0);
ini_set("memory_limit","1000M");
$time_start = getmicrotime();
echo "Start ".date("Y-m-d H:i:s")." ".strtotime("now"),"<BR>";
 
//////////////// Structure Binary /////////////////////////////
$sql = "CREATE TABLE ali_structure_sponsor_tmp (
id INT(11) UNSIGNED AUTO_INCREMENT , 
mcode_index VARCHAR(255) COLLATE tis620_bin NOT NULL,
mcode_ref VARCHAR(255) COLLATE tis620_bin NOT NULL,
tot_pv VARCHAR(255) COLLATE tis620_bin NOT NULL,
level int(11) ,
 PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=tis620 COLLATE=tis620_bin AUTO_INCREMENT=1  ";
mysql_query($sql);

$sql="SELECT mcode,lr FROM ".$dbprefix."member where mcode = 'TH0000001'  ";
$rsx = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rsx);$i++){
	$sqlObjxxx = mysql_fetch_object($rsx);
	$mcode_index = '1';
	$mcode_ref =$sqlObjxxx->mcode;			
	$tot_pv = gettotpv($dbprefix,$mcode_ref);
	mysql_query("insert into  ".$dbprefix."structure_sponsor_tmp (mcode_index,mcode_ref,level,tot_pv) values('$mcode_index','$mcode_ref','0','$tot_pv') ");
	isLine_structure($dbprefix,$mcode_ref,$mcode_index,$level);	
}
alert_time($time_start,"Done Re Structure");

mysql_query("ALTER TABLE ali_structure_sponsor_tmp ADD INDEX (mcode_ref),ADD INDEX (mcode_index);");	
mysql_query("ALTER TABLE ali_structure_sponsor_tmp ENGINE=InnoDB");
mysql_query("DROP TABLE ali_structure_sponsor");
mysql_query("RENAME TABLE ali_structure_sponsor_tmp TO ali_structure_sponsor");

alert_time($time_start,"Done Rename");
//////////////// Structure Binary /////////////////////////////

 function isLine_structure($dbprefix,$mcode_ref,$mcode_index,$level){
	$sql = "SELECT mcode FROM ".$dbprefix."member WHERE sp_code='$mcode_ref'  ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)> 0){
		$omcode_index = $mcode_index;
		$level++;
		for($i=0;$i<mysql_num_rows($rs);$i++){
			$sqlObj = mysql_fetch_object($rs);
			$mcode_ref = $sqlObj->mcode;
			$count = gencode33($i+1);
			$mcode_index = $omcode_index.''.$count;
			$tot_pv = gettotpv($dbprefix,$mcode_ref);
			mysql_query("insert into  ".$dbprefix."structure_sponsor_tmp (mcode_index,mcode_ref,level,tot_pv) values('$mcode_index','$mcode_ref','$level','$tot_pv') ");
			isLine_structure($dbprefix,$mcode_ref,$mcode_index,$level);
		}
	}
}
function gencode33($source){
	for($i=strlen($source);$i<3;$i++)
		$source = "0".$source;
	return $source;
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

function gettotpv($dbprefix,$mcode){
	$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_asaleh WHERE mcode='$mcode' and  (sa_type='A') and tot_pv != '0' and cancel = 0 ";
	//echo $sql;
	$rs = mysql_query($sql);
	$all_Apv = mysql_result($rs,0,'all_pv'); 
	mysql_free_result($rs);

	$sql = "SELECT sum(tot_pv) AS all_pv FROM ali_holdhead WHERE mcode='$mcode' and (sa_type='A') and cancel = 0  and tot_pv != '0' ";
	//echo $sql;
	$rs = mysql_query($sql);
	$all_Apv = ($all_Apv+mysql_result($rs,0,'all_pv')); 
	mysql_free_result($rs);


	$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ali_special_point WHERE  sa_type='VA' AND mcode='$mcode' group by mcode ";
	$rs3=mysql_query($sql3);
	if (mysql_num_rows($rs3)>0) {
		$sqlObj3 = mysql_fetch_object($rs3);
		$total_fv3= $sqlObj3->tot_pv;
		 mysql_free_result($rs3);
	}else{
		$total_fv3=0;
	}
	return $all_Apv = $all_Apv+$total_fv3;
}

?>