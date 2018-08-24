<? include("connectmysql.php");?>
<? include("../function/function_pos.php");?>
<?

exit;
//mysql_query("UPDATE ali_member SET pos_cur = 'MB' ");
//del('ali_calc_poschange',"1=1");
$dbprefix = 'ali_';
$sqlz="SELECT * FROM ali_member ";   
$rsz = mysql_query($sqlz);
for($cc=0;$cc<mysql_num_rows($rsz);$cc++){
    $sqlObjz = mysql_fetch_object($rsz);
    $mcodex= $sqlObjz->mcode;
   // $tot_pv= $sqlObjz->tot_pv;
     updatePosx($dbprefix,$mcodex,'','',$satype="");
}


function updatePosx($dbprefix,$mcode,$cur_date,$tot_pv,$satype=""){
	global $pos_piority,$pos_exp;
	$mexp=0;
    $pos_old = 'MB';


 
 	
    $where = "(sa_type = 'A' OR sa_type='B') and tot_pv > 0 and cancel=0  and  mcode='$mcode' ";     
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
    
    if(mysql_num_rows($rs) > 0)  
    {    
        $row = mysql_fetch_object($rs);        
        $tot_pv = $row->tot_pv;
		$saddate=$row->sadate;
    }		
	
	$sql1="SELECT ifnull(SUM(tot_pv),0) as tot FROM ali_special_point WHERE mcode='$mcode' and sa_type='VA'";
	
	$res=mysql_query($sql1);
	if(mysql_num_rows($res)>0){
		$obj = mysql_fetch_object($res);        
        $sp_mexp = $obj->tot;
	}

	 $mexp=$sp_mexp+$tot_pv;

	$pos_new = $pos_old;
	foreach(array_keys($pos_exp) as $key){
			if($mexp>=$pos_exp[$key]){ $pos_new = $key; break;}
	}

	if($pos_new != $pos_old && $pos_piority[$pos_new]>$pos_piority[$pos_old]){
		$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 ";    
		mysql_query($sql);
		$sql1 = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change,up_down) ";
		$sql1 .= "VALUES('','".$mcode."','".$pos_old."','".$pos_new."','".$saddate."','up')";    
		//$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";     
		mysql_query($sql1);
		
	}

}