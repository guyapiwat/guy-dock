<?
if(isset($_GET['state'])){

	$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."asaleh   ";
	$rs = mysql_query($sql);
	$mid = mysql_result($rs,0,'id')+1;

	//$sano = gencodesale($sanof,'asaleh','sano',$inv_code);
	$sano = gencodesale("");


logtext(true,$_SESSION['usercode'],'เพิ่มบิล',$mid);
		$hdate = $_SESSION["datetimezone_last"];

if($_SESSION["m_locationbase"] == '0'){
	echo "<script language='JavaScript'>alert('Problem Please Try Again!');window.location='index.php?sessiontab=4&sub=21&state=1'</script>";	
	exit;
}
	 $sql="insert into ".$dbprefix."asaleh (id,  sano, sadate,  mcode,  sa_type, inv_code,  total,customer_total, tot_pv,tot_sppv,tot_weight,tot_fv, uid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
	optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther,trnf,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,online,checkportal,hpv,htotal,hdate,locationbase,bprice,name_f,mbase,cname,cmobile,crate ) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total','$tot_cus' ,'$tot_pv','$tot_sppv','$tot_weight','$tot_fv' ,'".$_SESSION['usercode']."','$radsend','$txtoption','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','1','$chkDiscount','$chkOther','$txtCash','$txtFuture',
	'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$total','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','$trnf','$name_t','$caddress','$cdistrict','$camphur','$cprovince','$czip','1','3','$tot_pv','$total','$hdate','".$_SESSION["m_locationbase"]."','$tot_base','$name_f','".$arr_member["locationbase"]."','$cname','$cmobile','".$_SESSION["m_crate"]."') ";


	if (! mysql_query($sql)) {
//			echo "<font color='#FF0000'>error</font><br>";
//			echo  "$sql";		
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."')window.location='index.php?sessiontab=4&sub=21&state=1'</script>";
		exit;
	}
			logtext(true,$_SESSION['usercode'],'ewallet',$total);
	//====================LOG===========================
$text="uid=".$_SESSION["usercode"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	minusEwallet($dbprefix,$_SESSION['usercode'],$total,$tot_base);

	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$weight=$_POST['weight'];
		$fv=$_POST['fv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}
	for($i=0;$i<sizeof($pcode);$i++){
			$sql="SELECT weight,bprice,special_pv,customer_price,vat FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
			//echo $sql."<br>";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				for($m=0;$m<mysql_num_rows($rs);$m++){
					
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$bprice[$i] =$sqlObj->bprice;	
					$cprice[$i] =$sqlObj->customer_price;	
					$vat =$sqlObj->vat;
					$special_pv[$i] = $sqlObj->special_pv;
				}
			}else{
				$sql="SELECT weight,bprice,special_pv,customer_price,vat FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				//echo $sql;
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$bprice[$i] =$sqlObj->bprice;	
					$cprice[$i] =$sqlObj->customer_price;	
					$vat =$sqlObj->vat;
					$special_pv[$i] = $sqlObj->special_pv;
				}
			}

			// Sum Vat ////////
			if($vat == '0'){
				$total_exvat+=($qty[$i]*$price[$i]); //รราคา ไม่รวม vat
			}else{
				$vat_sum = ($qty[$i]*$price[$i]*$vat/(100+$vat));
				//$total_invat+= ($qty[$i]*$price[$i]) - $vat; 	//รราคาก่อน vat
				$total_vat+=($qty[$i]*$price[$i]*$vat/(100+$vat));
				//$total_vat+=($qty[$i]*$price[$i]*100/(100+$vat[$i]));
				$total_invat_sum+= ($qty[$i]*$price[$i])-$vat_sum;
			}
			$total_all+=($qty[$i]*$price[$i]);

		$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,bprice,customer_price,pv,sppv,weight,fv,qty,amt,inv_code,locationbase,vat) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$bprice[$i]' ,'$cprice[$i]' ,'$pv[$i]','$special_pv[$i]','$weight[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code','".$_SESSION["m_locationbase"]."','$vat') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		
		if($pcode[$i] == $GLOBALS["pcode_extend"]){
			$selectch = "select id as id,mdate from  ".$dbprefix."member where mcode = '$mcode'";
			$rsch = mysql_query($selectch);
			$idi = mysql_result($rsch,0,'id');
			$mdate = mysql_result($rsch,0,'mdate');
			$select = "SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate where mid='$idi' GROUP BY mid";
			$rs = mysql_query($select);
			if(mysql_num_rows($rs) > 0)	$exp_date = mysql_result($rs,0,'exp_date');
			if(empty($exp_date))$exp_date = $mdate;
			$sql = "INSERT INTO ".$dbprefix."expdate (mid,exp_date,date_change) VALUES('".$idi."',ADDDATE('".$exp_date."', INTERVAL 1 YEAR),'".$_SESSION["datetimezone"]."')";
			//echo $sql;
			//exit;
			mysql_query($sql);
			//$sql="update ".$dbprefix."expdate set exp_date=ADDDATE(exp_date, INTERVAL 1 YEAR) where mid=$idi ";
				//exit;	//====================LOG===========================
			//$text="uid=".$_SESSION["adminuserid"]." action=memoperate =>$sql";
			//mysql_query($sql);
		}
		//updatestockcard($dbprefix,$mcode,$inv_code,"ONLIN",$sano,$sanox,$sadate,$rccode,$satype,$pcode[$i],$_SESSION["usercode"],$qty[$i],$price[$i],$totalprice[$i]);
		//calc_stock($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION["usercode"],$inv_code,$satype,'0');

		//if(empty($inv_code))minusProduct($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION["usercode"]);
		//else minusProduct1($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION["usercode"],$inv_code);

	}
		$object_stocks = new stocks ();
		$object_stocks->set_data($mid,"asale","sender","3");
	// UPDATE Vat ////////
	$total_net=$total_all-$total_vat;
	$total_vat=  round($total_vat,2); 
	$total_net= round($total_net,2); 
	$total_invat = round($total_invat,2); 
	$total_exvat = round($total_exvat,2); 
	$Qvat = "update ".$dbprefix."asaleh set total_vat= '$total_vat',total_net='$total_net',total_invat='$total_invat_sum',total_exvat='$total_exvat' where id = '$mid' ";
	mysql_query($Qvat);

	if($satype == 'A' OR $satype=='B')updatePos($dbprefix,$mcode,$sadate,$tot_pv,$satype);   
    if($satype == 'Q')func_status($dbprefix,$mcode,$tot_pv,$sadate,$pos_cur,$satype);
	if($satype == 'B')func_status_B($dbprefix,$mcode,$tot_pv,$sadate,$pos_cur);
	if($satype == 'A' OR $satype=='B')getInsert_bm('ali_bm1',$sano,$mcode,$pos_cur,$tot_pv,$sadate,$sadate);

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
