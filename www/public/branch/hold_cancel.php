<?
require_once("logtext.php");

	$bid = $_GET['bid'];
	$remark = $_GET['remark'];
	if(empty($bid) or empty($remark)){
		echo "<script language='JavaScript'>alert('�Դ��ͼԴ��Ҵ���');window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."'</script>";	
		exit;
	}
	//echo $bid;
	//exit;
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
	$sa_type =$data->sa_type;
	$uid =$data->uid;
	

	$sqlS = "select * from ".$dbprefix."holdhead where id='$bid' and cancel = 1";
	$sqlSS = mysql_query($sqlS);
	 $sqlC = "select calc from ".$dbprefix."around where '$sadate' between fdate and tdate  and calc = 1";
	$sqlSC = mysql_query($sqlC);

	if(mysql_num_rows($sqlSS) > 0 or mysql_num_rows($sqlSC) > 0){
			echo "<script language='JavaScript'>alert('�������ö¡��ԡ��Ź����');window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."'</script>";	
			exit;
	}	

	if($cancel == 0){
		$sqlUpdate = "UPDATE ".$dbprefix."holdhead SET cancel='1',uid_cancel = '".$_SESSION["inv_usercode"]."',cancel_date = '".$_SESSION["datetimezone"]."',remark='".$remark."' WHERE id='$bid' ";
		//logtext(true,$_SESSION['adminusercode'],'¡��ԡ ���ᨧ�ٹ��',$sql);
		logtext(true,$_SESSION['inv_usercode'],'¡��ԡ ���ᨧ�ٹ  �Ţ��� :'.$hono,$bid);
		//echo $sql;
		
		
		 $sql = "select * from ".$dbprefix."holddesc where hono='$bid'";
		$result = mysql_query($sql);
		for($i=0;$i<mysql_num_rows($result);$i++){
			$data = mysql_fetch_object($result);
			$pcode =$data->pcode;
			$qty =$data->qty;
			$inv_codeold =$data->inv_code;
			//plusProduct1($dbprefix,$pcode,$inv_code,$qty);
			//minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
		}

		mysql_query($sqlUpdate);
		mysql_query("delete from ".$dbprefix."calc_poschange where mcode ='$mcode' and date_change = '$sadate' ");
		mysql_query("update ".$dbprefix."asaleh set htotal = htotal+$total,hpv = hpv+$tot_pv,bmcauto=0 where id = '$asalehid'  ");
		forget_point($dbprefix,$hono); 		

		updatehpv1($dbprefix,$uid,$tot_pv);
		if($sa_type == 'Y')$option = "Canel : Transfer Out ($hono)";
		else $option = "Canel : PV Out ($hono)"; 
		log_ewallet('hpv',$uid,$hono,$tot_pv,'I',date("Y-m-d"),$option); 

		if($sa_type == 'A')downdatePos($dbprefix,$mcode,$sadate,$tot_pv);
		if($sa_type == 'Y'){
			if($sa_type == 'Y')$option = "Cancel : Transfer IN ($hono)";
			updatehpv2($dbprefix,$mcode,$tot_pv);
			log_ewallet('hpv',$mcode,$hono,$tot_pv,'O',date("Y-m-d"),$option); 
		}

		echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_GET["sessiontab"]."&sub=".$_GET["sub"]."'</script>";	
	}else{

		echo "�������ö¡��ԡ��ū����";
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
 $startdatec=strtotime($startdate); // ������ͤ������Թҷ�
 $tod=$datenum*86400; // �Ѻ�ӹǹ�ѹ�Ҥٳ�Ѻ�Թҷյ���ѹ
 $ndate=$startdatec+$tod; // �Ѻ�ǡ��ա����ӹǹ�ѹ����Ѻ��
 return $ndate; // �觤�ҡ�Ѻ
}

?>