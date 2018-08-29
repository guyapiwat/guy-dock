<? include("connectmysql.php");?>
<? include("prefix.php");?>
<? include("global.php");?>
<? include("function.php");?>
<? require_once ("function.log.inc.php");?>
<?
include("gencode.php");

set_time_limit (0);
ini_set("memory_limit","100M");
$arr_member = array();

$locationbase =1;
$locationbase = $_GET["lb"];
$arr_member = searchlocationbase($dbprefix,$locationbase);

//echo $arr_member["datetimezone"];

$cdate = date("Y-m-d");
$cdate1 = date("Y-m");
	//$cdate = "2013-05-20";

	//$sql="SELECT * FROM ".$dbprefix."asaleh where sa_type = 'H' and hdate = '".$cdate."' and (hpv >0 or htotal >0) and bmcauto <> '1' ";
	$sql="SELECT * FROM ".$dbprefix."asaleh where sa_type = 'H' and hdate = DATE_SUB('".$cdate."',INTERVAL 1 DAY) and (hpv >0 or htotal >0) and cancel = 0 and locationbase = '$locationbase' ";
	$rs = mysql_query($sql);
	//echo $sql;
	//exit;
	for($i=0;$i<mysql_num_rows($rs);$i++){
		$sqlObj = mysql_fetch_object($rs);
		$sano =$sqlObj->id;		
		$smcode =$sqlObj->mcode;
		$shpv =$sqlObj->hpv;
		$shtotal =$sqlObj->htotal;
		$cdate = $sqlObj->hdate;

		$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."holdhead ";
		$rs2 = mysql_query($sql);
		$mid = $hono = mysql_result($rs2,0,'id');
		$mid = ++$hono;
		$sql="insert into ".$dbprefix."holdhead (id, hono, sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv, uid,bmcauto ,locationbase) values ('$mid' ,'$hono' ,'".$sano."' ,'".$cdate."' ,'$smcode', 'A' ,'' ,'$shtotal' ,'$shpv' ,'system','1','$locationbase') ";
		//echo $sql;
		//exit;
		mysql_query($sql);
		//logtext(true,"system",'แจงบิล Hold Auto',$sql);

		$sql = "SELECT ".$dbprefix."asaled.pcode,".$dbprefix."asaled.pdesc,".$dbprefix."asaled.price,";
		$sql .= $dbprefix."asaled.pv,(".$dbprefix."asaled.qty-IFNULL(SUM(".$dbprefix."holddesc.qty),0)) AS qty FROM ".$dbprefix."asaled ";
		$sql .= "LEFT JOIN ".$dbprefix."holdhead ON (".$dbprefix."asaled.sano=".$dbprefix."holdhead.sano and ".$dbprefix."holdhead.cancel=0 ) ";
		$sql .= "LEFT JOIN ".$dbprefix."holddesc ";
		$sql .= "ON (".$dbprefix."holdhead.hono=".$dbprefix."holddesc.hono AND ".$dbprefix."holddesc.pcode=".$dbprefix."asaled.pcode) ";
		$sql .= "WHERE ".$dbprefix."asaled.sano='".$sano."'  GROUP BY pcode";
		$rs1 = mysql_query($sql);
		for($j=0;$j<mysql_num_rows($rs1);$j++){
			$sqlObj1 = mysql_fetch_object($rs1);
				$pcode =$sqlObj1->pcode;
				$pdesc =$sqlObj1->pdesc;
				$price =$sqlObj1->price;
				$pv =$sqlObj1->pv;
				$qty =$sqlObj1->qty;
				$totalprice = $price*$qty;
				$sql="insert into ".$dbprefix."holddesc (hono,pcode,pdesc,price,pv,qty,amt) values ('$mid','$pcode','$pdesc','$price' ,'$pv','$qty','$totalprice') ";
			//	echo $sql;
			//	exit;
				mysql_query($sql);
			//	logtext(true,"system",'แจงบิล Hold Auto',$sql);
		}
		//echo $smcode.' : '.$cdate.' : '.$shpv;
		//exit;
		//$cdate = '2013-05-21';
		updatePos1($dbprefix,$smcode,$cdate,$shpv);
		//exit;
		
		mysql_query("update ".$dbprefix."asaleh set hpv=0,htotal=0,bmcauto=1 where id = '$sano'");
	}


function dateDiff1($startDate, $endDate) { 
    // Parse dates for conversion 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 

    // Return difference 
    return round(($end_date - $start_date), 0); 

} 
function expdate1($startdate,$datenum){
 $startdatec=strtotime($startdate); // ทำให้ข้อความเป็นวินาที
 $tod=$datenum*86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
 $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
 return $ndate; // ส่งค่ากลับ
}
function updatePos1($dbprefix,$mcode,$cur_date,$tot_pv){

	$pos_piority = array('EX'=>2,'SU'=>1,'MB'=>0);
	$pos_exp = array('EX'=>3000,'SU'=>750,'MB'=>0);

	$chkmonth=explode("-",$cur_date);
	$chkmonth= $chkmonth[0].'-'.$chkmonth[1];
	$sql = "SELECT pos_cur,mdate from ".$dbprefix."member WHERE mcode='$mcode' ";
	$rs = mysql_query($sql);
	$pos_old = '';
	if(mysql_num_rows($rs)>0) {
		$pos_old = mysql_result($rs,0,'pos_cur');
		$mdate = mysql_result($rs,0,'mdate');
		$expmdte = date('Y-m-d',expdate1($mdate,'60'));
			$month=explode("-",$mdate);
			$thismonth = $month[0].'-'.$month[1];
			if($month[1] >= 12){
			  $month_1 = $month[0]+1;
			  $month_2 = '01';
				$nextmonth = $month_1.'-'.$month_2;

			}else if($month[1] >= 9){
			  $month_1 = $month[0];
			  $month_2 = $month[1]+1;
				$nextmonth = $month_1.'-'.$month_2;

			}else{
				$month_1 = $month[0];
				$month_2 = $month[1]+1;
				$month_2 = '0'.$month_2;
				$nextmonth = $month_1.'-'.$month_2;
			}
	}
//	echo $expmdte.' : '.$cur_date.' : '.$nextmonth.' : '.$mdate;
//	exit;
	//if($chkmonth == $thismonth or $chkmonth == $nextmonth ){
	if($expmdte > $cur_date ){
		//-----เก็บคะแนนสูงสุดที่มีการซื้อ
		//$sql = "SELECT MAX(tot_pv) as pv from ".$dbprefix."asaleh WHERE mcode='$mcode' ";
		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and (sadate <= '$cur_date') and cancel=0 ";
		//echo $sql.'<br>';
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		//mysql_free_result($rs);

		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode."' and sa_type='A' and (sadate <= '$cur_date')  and cancel=0 ";
		$rs = mysql_query($sql);
		//echo $sql.'<br>';
		$mexph = 0;
		if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
		mysql_free_result($rs);
		$mexp=($mexp+$mexph);
		//echo 'sss'.$mexp.'<br>';
	}else{
		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and sadate like  '%".$cdate1."%' and cancel=0 ";
		//echo $sql.'<br>';
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		//mysql_free_result($rs);

		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode."' and sa_type='A' and sadate like  '%".$cdate1."%'  and cancel=0 ";
		$rs = mysql_query($sql);
		//echo $sql.'<br>';
		$mexph = 0;
		if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
		mysql_free_result($rs);
		$mexp=($mexp+$mexph);
		//$mexp = $tot_pv;
	}
//exit;
	//-----เก็บตำแหน่งปัจจุบัน
	//mysql_free_result($rs);
	//คำนวณตำแหน่ง
	$pos_new = $pos_old;
	foreach(array_keys($pos_exp) as $key){
		//echo $key;
		if($mexp>=$pos_exp[$key]){ $pos_new = $key; break;}
	}
	//echo $mexp.' : '.$mexph.' : '.$pos_old."=>".$pos_new;
	if($pos_new != $pos_old && $pos_piority[$pos_new]>$pos_piority[$pos_old]){
		$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 ";	
		mysql_query($sql);
		$sql = "INSERT INTO ".$dbprefix."poschange (mcode,pos_before,pos_after,date_change) ";
		$sql .= "VALUES('".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
		mysql_query($sql);

		$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
		$sql .= "VALUES('0','".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
		mysql_query($sql);
		//====================LOG===========================
		$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
		//writelogfile($text);
		//=================END LOG===========================
		
		
	}

}
?>