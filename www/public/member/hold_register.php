<?
if(isset($_GET['state'])){

	$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."holdhead ";
	$rs = mysql_query($sql);
	$mid = $hono = mysql_result($rs,0,'id');
	$mid = ++$hono;
	$hono = gencodesale_HO($sanof,'holdhead');

	mysql_free_result($rs);
}


if($_GET['state']==0){
	
	
	//koob 25/05/2009
	//list ( $year, $month, $day ) = split("-|:", $sadate);
	//$heal_mouth=$year.$month;
$arr_member = searchmember($dbprefix,$mcode);
if($arr_member["locationbase"] != $_SESSION["m_locationbase"]){
	echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["9"]."');window.location='index.php?sessiontab=4&sub=3'</script>";	
	exit;
}

$sadate = $_SESSION["datetimezone"];
$selectch = "select id as id from  ".$dbprefix."asaleh where id = '".$_POST['hid']."' and hpv >= '$tot_pv' and htotal >= '$total' ";
$rsch = mysql_query($selectch);
if(mysql_num_rows($rsch) <= 0){
	echo "<script language='JavaScript'>alert('This Process can not be success.Please try again.');window.location='index.php?sessiontab=4&sub=3'</script>";	
	exit;
}
	
	

	$sql = "SELECT pos_cur,name_t,mdate,caddress,czip,cdistrictId,camphurId,cprovinceId,pos_cur,name_f,sp_code,mtype1 from ".$dbprefix."member WHERE mcode='$mcode' ";
$rs = mysql_query($sql);
$pos_old = '';
if(mysql_num_rows($rs)>0) {
	$pos_old = mysql_result($rs,0,'pos_cur');
	$name_t = mysql_result($rs,0,'name_t');
	$name_f = mysql_result($rs,0,'name_f');
	$sp_code = mysql_result($rs,0,'sp_code');
	$pos_cur = mysql_result($rs,0,'pos_cur');
	$mdate = mysql_result($rs,0,'mdate');
	$mtype = mysql_result($rs,0,'mtype1');
}

	$tot_base = 0;
	$tot_weight = 0;
	//$tot_pv = 0;
	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$qty=$_POST['qty'];
		for($i=0;$i<sizeof($pcode);$i++){
			$sql="SELECT weight,bprice,special_pv FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
			//exit;
			$rs = mysql_query($sql);
			//echo "$sql<BR>";
			if(mysql_num_rows($rs) > 0)
			{
				for($m=0;$m<mysql_num_rows($rs);$m++){
					
					$sqlObj = mysql_fetch_object($rs);
					$weight =$sqlObj->weight*$qty[$i];	
					$tot_weight = $tot_weight+$weight;
					$tot_base = $tot_base+($sqlObj->bprice*$qty[$i]);	
					$tot_sppv =  $tot_sppv+($sqlObj->special_pv*$qty[$i]);	
				}
			}else{
				$sql="SELECT weight,bprice,special_pv FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				//exit;
				$rs = mysql_query($sql);
				//echo "$sql<BR>";
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight =$sqlObj->weight*$qty[$i];	
					$tot_weight = $tot_weight+$weight;
					$tot_base = $tot_base+($sqlObj->bprice*$qty[$i]);	
					$tot_sppv =  $tot_sppv+($sqlObj->special_pv*$qty[$i]);	
				}
			}
			//echo $qty[$i];
		}
	}


	$sql="insert into ".$dbprefix."holdhead (id, hono, sano, sadate,  mcode,sp_code,  sa_type, inv_code,  total,bprice, tot_pv,tot_sppv, uid,locationbase,name_f,name_t ,crate,ref) values ('$mid' ,'$hono' ,'".$_POST['hid']."' ,'$sadate' ,'$mcode','$sp_code', '$satype' ,'$inv_code' ,'$total' ,'$tot_base','$tot_pv','$tot_sppv' ,'".$_SESSION['usercode']."','".$_SESSION['m_locationbase']."','$name_f','$name_t','".$_SESSION["m_crate"]."','".$_SESSION['usercode']."') ";
	//logtext(true,$_SESSION['adminusercode'],$sql);
	//echo $sql;
	
	
	if (! mysql_query($sql)) {
		$sql_delete = "DELETE FROM ".$dbprefix."member WHERE mcode = '".$mcode."' ";
		mysql_query($sql_delete);
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."')window.location='index.php?sessiontab=4&sub=3'</script>";
		exit;
	}else{
	logtext(true,$_SESSION['usercode'],'แจงบิล Holdยอด Register',$mid);
	mysql_query("update ".$dbprefix."asaleh set hpv = hpv-$tot_pv,htotal = htotal-$total where id = '".$_POST['hid']."'");

	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}
	for($i=0;$i<sizeof($pcode);$i++){
				

						if($pcode[$i] == $GLOBALS["pcode_extend"]){
							$selectch = "select id as id,mdate from  ".$dbprefix."member where mcode = '$mcode'";
							$rsch = mysql_query($selectch);
							$idi = mysql_result($rsch,0,'id');
							$mdate = mysql_result($rsch,0,'mdate');
							$select = "SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate where mid='$idi' GROUP BY mid";
							$rs = mysql_query($select);
							if(mysql_num_rows($rs) > 0)	$exp_date = mysql_result($rs,0,'exp_date');
							if(empty($exp_date))$exp_date = $mdate;
							$sql = "INSERT INTO ".$dbprefix."expdate (mid,exp_date,date_change) VALUES('".$idi."',ADDDATE('".$exp_date."', INTERVAL 1 YEAR),'".date("Y-m-d")."')";
							mysql_query($sql);
						}

									$sql="SELECT weight,bprice,special_pv FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
									$rs = mysql_query($sql);
									if(mysql_num_rows($rs) > 0)
									{
										for($m=0;$m<mysql_num_rows($rs);$m++){
											
											$sqlObj = mysql_fetch_object($rs);
											//$weight[$i] =$sqlObj->weight;	
											$bprice[$i] =$sqlObj->bprice;	
											$special_pv[$i] = $sqlObj->special_pv;
										}
									}else{
										$sql="SELECT weight,bprice,special_pv FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
										$rs = mysql_query($sql);
										if(mysql_num_rows($rs) > 0)
										{
											$sqlObj = mysql_fetch_object($rs);
											//$weight[$i] =$sqlObj->weight;	
											$bprice[$i] =$sqlObj->bprice;	
											$special_pv[$i] = $sqlObj->special_pv;
										}
								}

						$sql="insert into ".$dbprefix."holddesc (hono,pcode,pdesc,price,bprice,pv,sppv,bv,qty,amt,locationbase,crate) values ('$hono','$pcode[$i]','$pdesc[$i]','$price[$i]','$bprice[$i]' ,'$pv[$i]','$special_pv[$i]','$bv[$i]','$qty[$i]','$totalprice[$i]','".$_SESSION["m_locationbase"]."','".$_SESSION["m_crate"]."') ";
						//logtext(true,$_SESSION['adminusercode'],$sql);
						logtext(true,$_SESSION['usercode'],'แจงบิล Holdยอด Register',$sql);
						//echo "$sql<br>";
						mysql_query($sql);
	
	}
	if($satype == 'A' OR $satype=='B')updatePos($dbprefix,$mcode,$sadate,$tot_pv,$satype); 
    if($satype == 'Q')func_status($dbprefix,$mcode,$tot_pv,$sadate,$pos_cur);
	if($satype == 'B')func_status_B($dbprefix,$mcode,$tot_pv,$sadate,$pos_cur);
	if($satype == 'A' OR $satype=='B')getInsert_bm('ali_bm1',$hono,$mcode,$pos_cur,$tot_pv,$sadate,$sadate);
	}
}
//exit;
//echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=5'</script>";	

?>

<?

function minusProduct($dbprefix,$pcode,$invent,$qty,$sano,$uid){

		 $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
		//exit;
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$pcode2 =$sqlObj->pcode;	
				$qty2 =$sqlObj->qty*$qty;

				$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode2."'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before-$qty2;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','$invent','Head Office','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','บิลขาย','$uid')";
				mysql_query($sql);


				$sql = "update ".$dbprefix."product set qty = qty-$qty2 WHERE pcode='$pcode2' ";
				$rs1 = mysql_query($sql);

			}
		}else{
			$sqlewallet = " select qty from ".$dbprefix."product where pcode = '".$pcode."'";
			$rsewallet = mysql_query($sqlewallet);
			if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
			$qty_after=$qty_before-$qty;
			$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
			  values('$sano','$invent','Head Office','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','บิลขาย','$uid')";
			mysql_query($sql);

			$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
			mysql_query($sql);


		}



}
function plusProduct1($dbprefix,$pcode,$invent,$qty){
	$pcode1 = explode('_',$pcode);
	if($pcode1[0] == 'PD'){
		$sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				$sqlObj = mysql_fetch_object($rs);
				$pcode2 =$sqlObj->pcode;	
				$qty =$sqlObj->qty*$qty;	
				$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
				$rs1 = mysql_query($sql);
			}
		}
	}else{
		$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
		$rs = mysql_query($sql);
	}
}
function updateEwallet($dbprefix,$mcode,$txtInternet){
	$sql3 = "update ".$dbprefix."invent set ewallet = $txtInternet-ewallet where inv_code = '$inv_code' ";
	$rs3=mysql_query($sql3);
} 
function updateEwallet1($dbprefix,$mcode,$oldInternet,$id){
	$sql = "select * from ".$dbprefix."asaleh where sano='$id'";
	$result = mysql_query($sql);
		$data = mysql_fetch_object($result);
		$txtInternet= $data->txtInternet;
	if($oldInternet > $txtInternet){
	$internet = $oldInternet-$txtInternet;
	$sql3 = "update ".$dbprefix."member set ewallet = ewallet+$internet where mcode = '$mcode' ";
	}
	else{
	$internet = $txtInternet-$oldInternet;
	$sql3 = "update ".$dbprefix."member set ewallet = ewallet-$internet where mcode = '$mcode' ";
	}
	$rs3=mysql_query($sql3);
} 
//update ตำแหน่ง แบบไม่สะสมคะแนน
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
