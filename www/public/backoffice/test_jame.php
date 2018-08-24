<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? require_once ("function.log.inc.php");?>
<? require_once ("function.php");?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
set_time_limit (0);
ini_set("memory_limit","100M");
exit;
//	global $pos_piority,$pos_exp,$table_bill,$mid_bill,$column_bill;
$fdate = '2017-09-15';
$tdate = '2017-09-21';

$sqlz = "select mcode,tot_pv as tot_pv,sadate from (
SELECT mcode,tot_pv as tot_pv,sadate  FROM ali_asaleh WHERE sadate  between '$fdate' and '$tdate'  and cancel =0 and tot_pv != 0 and sa_type = 'A' and tot_pv >= 2000 GROUP BY mcode
UNION ALL
SELECT mcode,tot_pv as tot_pv,sadate  FROM ali_holdhead WHERE sadate  between '$fdate' and '$tdate' and cancel =0 and tot_pv != 0 and sa_type = 'A' and tot_pv >= 2000 GROUP BY mcode
) as a where 1=1 group by mcode
";
$rsz = mysql_query($sqlz);
$numz =  mysql_num_rows($rsz);
if(mysql_num_rows($rsz) > 0)
{
	for($z=0;$z<$numz;$z++)
	{
		$rowz = mysql_fetch_object($rsz);
		$mcodez = $rowz->mcode;
		$sadate = $rowz->sadate;
		$tot_pv[$mcodez] = $rowz->tot_pv;
		$sql = "SELECT pos_cur,mdate from ".$dbprefix."member WHERE mcode='$mcodez' and pos_cur <> 'VIP' ";		 
	
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) >0){
			$pos_old = mysql_result($rs,0,'pos_cur');
			$pos_new = 'VIP';
			$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcodez' LIMIT 1 "; 
			echo $sql.'<br>';
			//mysql_query($sql);
			$sql1 = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change,up_down) ";
			$sql1 .= "VALUES('','".$mcodez."','".$pos_old."','VIP','".$sadate."','up')"; 
			echo $sql1.'<br>';
			//mysql_query($sql1);
		}
	}
}


exit;
$sql = "select * from ".$dbprefix."calc_poschange where 1=1 order by id asc ";
$rs11 = mysql_query($sql);
for($z=0;$z<mysql_num_rows($rs11);$z++){
	$sqlObj11 = mysql_fetch_object($rs11);
	$okmcode =$sqlObj11->mcode;
	$pos_cur[$okmcode] = $sqlObj11->pos_after;
}

$sqlz = "select mcode,sum(tot_pv) as tot_pv from (
SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_asaleh WHERE sadate  between '$fdate' and '$tdate'  and cancel =0 and tot_pv != 0 and sa_type = 'A' GROUP BY mcode
UNION ALL
SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_holdhead WHERE cancel =0 and tot_pv != 0 and sa_type = 'A' GROUP BY mcode
UNION ALL
SELECT mcode,SUM(tot_pv) as tot_pv  FROM ali_special_point WHERE tot_pv != 0 and sa_type = 'VA' GROUP BY mcode
) as a where 1=1 group by mcode
";
$rsz = mysql_query($sqlz);
$numz =  mysql_num_rows($rsz);
if(mysql_num_rows($rsz) > 0)
{
	for($z=0;$z<$numz;$z++)
	{
		$rowz = mysql_fetch_object($rsz);
		$mcodez = $rowz->mcode;
		$tot_pv[$mcodez] = $rowz->tot_pv;     
	}
}
$sql="select pos_cur,mcode from ali_member ";
$xx = 0;
$rsx = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rsx);$i++){
	$sqlObjx = mysql_fetch_object($rsx);
	$mcode = $sqlObjx->mcode;
	$pos_old = $sqlObjx->pos_cur;
	$pos_new = $pos_old;
	if($tot_pv[$mcode] == '')$tot_pv[$mcode] = 0;
	if($pos_cur[$mcode] == '')$pos_old = $sqlObjx->pos_cur;
	$mexp = $tot_pv[$mcode];
	foreach(array_keys($pos_exp) as $key){
		if($mexp>=$pos_exp[$key]){ $pos_new = $key; break;}
	}

	if($pos_piority[$pos_new] > $pos_piority[$pos_old]){
		echo $mcode.' : '.$pos_old.' : '.$pos_new.'<br>';
	}
}

exit;
$sql="select * from chkbmbonus ";
$xx = 0;
$rsx = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rsx);$i++){
	$sqlObjx = mysql_fetch_object($rsx);
	$mcode = $sqlObjx->mcode;
	$status_11 = $status_12 = $countsp = 0;
	$where = "cancel = 0 and sa_type = 'Z' and sadate like '%2016-12%' and mcode = '$mcode' ";
	$sql = " SELECT mcode,ifnull(SUM(tot_pv),0) as tot_pv,sctime,sadate FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT mcode,tot_pv as tot_pv,sctime as sctime ,sadate  FROM ali_asaleh ";
    $sql .= "    WHERE ".$where."  ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT mcode,tot_pv as tot_pv,sctime as sctime ,sadate  FROM ali_holdhead ";
    $sql .= "    WHERE ".$where." ";
    $sql .= " ) as tb ";   
    $sql .= " ORDER BY sctime ASC ";
    $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    $arr = array();
    if(mysql_num_rows($rs) > 0){    
        $row = mysql_fetch_object($rs);        
        $status_11 = $row->tot_pv;       
    }
	
	$where = "cancel = 0 and sa_type = 'Z' and sadate like '%2017-01%' and mcode = '$mcode' ";
	$sql = " SELECT mcode,ifnull(SUM(tot_pv),0) as tot_pv,sctime,sadate FROM  ";
    $sql .= " ( ";
    $sql .= " SELECT mcode,tot_pv as tot_pv,sctime as sctime ,sadate  FROM ali_asaleh ";
    $sql .= "    WHERE ".$where."  ";
    $sql .= " UNION ALL ";
    $sql .= " SELECT mcode,tot_pv as tot_pv,sctime as sctime ,sadate  FROM ali_holdhead ";
    $sql .= "    WHERE ".$where." ";
    $sql .= " ) as tb ";   
    $sql .= " ORDER BY sctime ASC ";
    $rs = mysql_query($sql);
    $num =  mysql_num_rows($rs);
    $arr = array();
    if(mysql_num_rows($rs) > 0){    
        $row = mysql_fetch_object($rs);        
        $status_12 = $row->tot_pv;       
    }

	$select = "select count(mcode) as cou from ali_member where pos_cur <> 'MB' and sp_code='$mcode' and mdate between '2016-11-01' and '2016-12-31' group by sp_code ";
	//echo $select;
	//exit;
	$rs = mysql_query($select);
	 if(mysql_num_rows($rs) > 0){    
        $row = mysql_fetch_object($rs);        
        $countsp = $row->cou;       
    }

	$sqlupdate = "update chkbmbonus set status_11 = '$status_11' ,status_12 = '$status_12' ,countsp = '$countsp' where mcode = '$mcode' ";
	echo $sqlupdate.'<br>'; 
	exit;
	//mysql_query($sqlupdate);



}
exit;
$sql="select mcode,tot_pv from ali_asaleh where sadate between '2017-01-01' and '2017-01-07' and cancel = 0 and tot_pv >= 2000 and sa_type = 'A' ";
$xx = 0;
$rsx = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rsx);$i++){
	$sqlObjx = mysql_fetch_object($rsx);
	$mcode =$sqlObjx->mcode;		
	$tot_pv =$sqlObjx->tot_pv;
	$cur_date = '2017-01-07';
	$pos_new = 'VIP';
	$sql = "SELECT pos_cur,mdate from ".$dbprefix."member WHERE mcode='$mcode' ";
    $rs = mysql_query($sql);
    $pos_old = '';
    if(mysql_num_rows($rs)>0) {
        $pos_old = mysql_result($rs,0,'pos_cur');
    }

	if($pos_old != 'VIP'){
		$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 ";
		//mysql_query($sql);
		
		$sql1 = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change,up_down) ";
		$sql1 .= "VALUES('','".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."','up')";  
		echo $sql1.'<br>';
		//mysql_query($sql1);
		$xx++;
	}
}

$sql="select mcode,tot_pv from ali_holdhead where  sadate between '2017-01-01' and '2017-01-07' and cancel = 0 and tot_pv >= 2000 and sa_type = 'A' ";

$rsx = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rsx);$i++){
	$sqlObjx = mysql_fetch_object($rsx);
	$mcode =$sqlObjx->mcode;		
	$tot_pv =$sqlObjx->tot_pv;	
	$cur_date = '2017-01-07';
	$pos_new = 'VIP';
	$sql = "SELECT pos_cur,mdate from ".$dbprefix."member WHERE mcode='$mcode' ";
    $rs = mysql_query($sql);
    $pos_old = '';
    if(mysql_num_rows($rs)>0) {
        $pos_old = mysql_result($rs,0,'pos_cur');
    }

	if($pos_old != 'VIP'){
		$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 ";
		//mysql_query($sql);
		$sql1 = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change,up_down) ";
		$sql1 .= "VALUES('','".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."','up')";  
		echo $sql1.'<br>';
		//mysql_query($sql1);
		$xx++;
	}
}
echo $xx.'ssssss';


exit;

$sql="SELECT id,mcode,sum(hpv) as hpv,htotal,total,tot_pv FROM ".$dbprefix."asaleh where sa_type = 'H' and cancel = 0 and hpv > 0  group by mcode ";

$rsx = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rsx);$i++){
	$sqlObjx = mysql_fetch_object($rsx);
	$mcode =$sqlObjx->mcode;		
	$hpv =$sqlObjx->hpv;	
	$sqlupdate = "update ali_member set hpv = '$hpv' where mcode = '$mcode'";
	echo $sqlupdate.'<br>';
	//mysql_query($sqlupdate);
}

exit;
$sql="SELECT id,mcode,hpv,htotal,total,tot_pv FROM ".$dbprefix."asaleh where sa_type = 'H' and cancel = 0  ";

$rsx = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rsx);$i++){
	$sqlObjx = mysql_fetch_object($rsx);
	$mcode =$sqlObjx->mcode;		
	$id =$sqlObjx->id;		
	$hpv =$sqlObjx->hpv;		
	$old_pv =$sqlObjx->tot_pv;		
	$old_total =$sqlObjx->total;		
	$htotal =$sqlObjx->htotal;	
	
	$sql = "select sum(tot_pv) as tot_pv , sum(total) as total from ali_holdhead where sano = '$id' and cancel = '0' group by sano ";
	//echo $sql.'<br>';
	$rs1 = mysql_query($sql);
	if(mysql_num_rows($rs1) > 0){
		$sqlObj1 = mysql_fetch_object($rs1);
		$tot_pv =$sqlObj1->tot_pv;		
		$total =$sqlObj1->total;
		$oktopup = $old_pv-$tot_pv;
		if($oktopup != 0){
			$sqlupdate = "update ali_asaleh set hpv = '$oktopup' where id = '$id'  ";
			echo $sqlupdate.'<br>';
			//mysql_query($sqlupdate);
		}
	}
}







exit;

$sql="SELECT mcode,pos_cur FROM ".$dbprefix."member where pos_cur != 'TN'  order by id desc ";

$rsx = mysql_query($sql);
for($i=0;$i<mysql_num_rows($rsx);$i++){
	$sqlObjx = mysql_fetch_object($rsx);
	$mcode[$i] =$sqlObjx->mcode;		
	$pos_cur[$mcode[$i]] =$sqlObjx->pos_cur;		
}//for($i=0;$i<mysql_num_rows($rs);$i++){
//========================จบเก็บลายระเอียดสมาชิกทุกคน====================================
for($j=0;$j<mysql_num_rows($rsx);$j++){
	//if($pos_cur[$mcode[$j]] != 'MB'){
		//echo "insert into ali_calc_poschange(mcode,pos_before,pos_after,date_change,date_update,up_down,uid) values('".$mcode[$j]."','MB','".$pos_cur[$mcode[$j]]."','2015-12-01','2015-12-01','1','cron')<br>";
		//exit;
		//mysql_query("insert into ali_calc_poschange(mcode,pos_before,pos_after,date_change,date_update,up_down,uid) values('".$mcode[$j]."','MB','".$pos_cur[$mcode[$j]]."','2015-12-01','2015-12-01','1','cron')");
	//	updatePos($dbprefix,$mcode[$j],date("Y-m-d"),'0','0');
	//}
}
	  
	
?>