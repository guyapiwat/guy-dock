<?
require_once("logtext.php");

	$bid = $_GET['bid'];
	$sql = "select * from ".$dbprefix."holdhead where id='$bid'";
	$result = mysql_query($sql);
	$data = mysql_fetch_object($result);
	$inv_code =$data->inv_code;
	$cancel =$data->cancel;
	$sadate =$data->sadate;
	$tot_pv =$data->tot_pv;
	$total =$data->total;
	$asalehid =$data->sano;
	$hono =$data->hono;
	$mcode =$data->mcode;
	

	$sqlS = "select * from ".$dbprefix."holdhead where id='$bid' and cancel = 1";
	$sqlSS = mysql_query($sqlS);
	 $sqlC = "select calc from ".$dbprefix."around where '$sadate' between fdate and tdate  and calc = 1";
	$sqlSC = mysql_query($sqlC);

	if(mysql_num_rows($sqlSS) > 0 or mysql_num_rows($sqlSC) > 0){
			echo "<script language='JavaScript'>alert('ไม่สามารถยกเลิกบิลนี้ได้');window.location='index.php?sessiontab=3&sub=10'</script>";	
			exit;
	}	

	if($cancel == 0){
		$sqlUpdate = "UPDATE ".$dbprefix."holdhead SET cancel='1' WHERE id='$bid' ";
		logtext(true,$_SESSION['adminusercode'],'ยกเลิก บิลแจงศูนย์',$sql);
		//echo $sql;
		
		
		 $sql = "select * from ".$dbprefix."holddesc where hono='$bid'";
		$result = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($result);$i++){
			$data = mysql_fetch_object($result);
			$pcode =$data->pcode;
			$qty =$data->qty;
			$inv_codeold =$data->inv_code;
			plusProduct1($dbprefix,$pcode,$inv_code,$qty);
			//minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
		}

		mysql_query($sqlUpdate);
		mysql_query("delete from ".$dbprefix."calc_poschange where mcode ='$mcode' and date_change = '$sadate' ");
		mysql_query("update ".$dbprefix."asaleh set htotal = htotal+$total,hpv = hpv+$tot_pv,bmcauto=0 where id = '$asalehid'  ");
	//	mysql_query("update ".$dbprefix."calc_poschange set pos_cur = 'MB' ");
			if($sa_type == 'A')downdatePos($dbprefix,$mcode,$sadate,$tot_pv);
			if($sa_type == 'Q')downdatePosQ($dbprefix,$mcode,$sadate,$tot_pv,$hono);
	
	
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=10'</script>";	
	}else{

		echo "ไม่สามารถยกเลิกบิลซ้ำได้";
	}
function plusProduct1($dbprefix,$pcode,$invent,$qty){
	$sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	$rs = mysql_query($sql);
	//$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
//	$rs = mysql_query($sql);
}


?>

<?
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

?>