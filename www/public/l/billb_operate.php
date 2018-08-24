<? 
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">

<?
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once("global.php");
require_once ("function.log.inc.php");
require_once ("checklogin.php");
include_once("wording".$_SESSION["lan"].".php");




if(isset($_GET['state'])){
	/*$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."transfersale_h ";
	$rs = mysql_query($sql);
	$mid = $sano = mysql_result($rs,0,'id');*/
	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
	if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
	if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
	if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
	if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
	if (isset($_POST["discount"])){$discount=$_POST["discount"];}else{$discount="";}
	if (isset($_POST["sumweight"])){$tot_weight=$_POST["sumweight"];}else{$tot_weight="";}
	if (isset($_POST["sumfv"])){$tot_fv=$_POST["sumfv"];}else{$tot_fv="";}
	if (isset($_POST["radsend"])){$radsend= $_POST["radsend"];}else{$radsend="";}
	if (isset($_POST["chkCash"])){$chkCash=$_POST["chkCash"];}else{$chkCash="";}
	if (isset($_POST["chkFuture"])){$chkFuture=$_POST["chkFuture"];}else{$chkFuture	="";}
	if (isset($_POST["chkTransfer"])){$chkTransfer=$_POST["chkTransfer"];}else{$chkTransfer="";}
	if (isset($_POST["chkCredit1"])){$chkCredit1=$_POST["chkCredit1"];}else{$chkCredit1="";}
	if (isset($_POST["chkCredit2"])){$chkCredit2=$_POST["chkCredit2"];}else{$chkCredit2="";}
	if (isset($_POST["chkCredit3"])){$chkCredit3=$_POST["chkCredit3"];}else{$chkCredit3="";}
	if (isset($_POST["chkInternet"])){$chkInternet=$_POST["chkInternet"];}else{$chkInternet="";}
	if (isset($_POST["chkDiscount"])){$chkDiscount=$_POST["chkDiscount"];}else{$chkDiscount="";}
	if (isset($_POST["chkOther"])){$chkOther=$_POST["chkOther"];}else{$chkOther="";}
	if (isset($_POST["txtCash"])){$txtCash=$_POST["txtCash"];}else{$txtCash="";}
	if (isset($_POST["txtFuture"])){$txtFuture=$_POST["txtFuture"];}else{$txtFuture="";}
	if (isset($_POST["txtTransfer"])){$txtTransfer=$_POST["txtTransfer"];}else{$txtTransfer="";}
	if (isset($_POST["txtCredit1"])){$txtCredit1=$_POST["txtCredit1"];}else{$txtCredit1="";}
	if (isset($_POST["txtCredit2"])){$txtCredit2=$_POST["txtCredit2"];}else{$txtCredit2="";}
	if (isset($_POST["txtCredit3"])){$txtCredit3=$_POST["txtCredit3"];}else{$txtCredit3="";}
	if (isset($_POST["txtInternet"])){$txtInternet=$_POST["txtInternet"];}else{$txtInternet="";}
	if (isset($_POST["txtDiscount"])){$txtDiscount=$_POST["txtDiscount"];}else{$txtDiscount="";}
	if (isset($_POST["txtOther"])){$txtOther=$_POST["txtOther"];}else{$txtOther="";}
	if (isset($_POST["optionCash"])){$optionCash=$_POST["optionCash"];}else{$optionCash="";}
	if (isset($_POST["optionFuture"])){$optionFuture=$_POST["optionFuture"];}else{$optionFuture="";}
	if (isset($_POST["optionTransfer"])){$optionTransfer=$_POST["optionTransfer"];}else{$optionTransfer="";}
	if (isset($_POST["optionCredit1"])){$optionCredit1=$_POST["optionCredit1"];}else{$optionCredit1="";}
	if (isset($_POST["optionCredit2"])){$optionCredit2=$_POST["optionCredit2"];}else{$optionCredit2="";}
	if (isset($_POST["optionCredit3"])){$optionCredit3=$_POST["optionCredit3"];}else{$optionCredit3="";}
	if (isset($_POST["optionInternet"])){$optionInternet=$_POST["optionInternet"];}else{$optionInternet="";}
	if (isset($_POST["optionDiscount"])){$optionDiscount=$_POST["optionDiscount"];}else{$optionDiscount="";}
	if (isset($_POST["optionOther"])){$optionOther=$_POST["optionOther"];}else{$optionOther="";}
	if (isset($_POST["txtoption"])){$txtoption=$_POST["txtoption"];}else{$txtoption="";}

	if (isset($_POST["caddress"])){$caddress=$_POST["caddress"];}else{$caddress="";}
	if (isset($_POST["cprovince"])){$cprovince=$_POST["cprovince"];}else{$cprovince="";}
	if (isset($_POST["camphur"])){$camphur=$_POST["camphur"];}else{$camphur="";}
	if (isset($_POST["cdistrict"])){$cdistrict=$_POST["cdistrict"];}else{$cdistrict="";}
	if (isset($_POST["czip"])){$czip=$_POST["czip"];}else{$czip="";}
	if (isset($_POST["chkaddress"])){$chkaddress=$_POST["chkaddress"];}else{$chkaddress="0";}
	if (isset($_POST["spayment"])){		
		/*$spayment=$_POST["spayment"];
			if ($spayment =='3'){$sanof='EW';}
			if($spayment =='2'){$sanof='ON';}
		}else{
			$spayment="0";
		} */
	if (isset($_POST["cname"])){$cname=$_POST["cname"];}else{$cname="";}
	if (isset($_POST["cmobile"])){$cmobile=$_POST["cmobile"];}else{$cmobile="";}

}


$sanof = "";
//$mcode = $_SESSION["usercode"];
if($mcode==""){
	echo "<script language='JavaScript'>alert('".$wording_lan['tab4']['1_74']."');window.location='index.php?sessiontab=4&sub=21&state=1'</script>";	
	exit;
}
$arr_member = searchmember($dbprefix,$mcode);
if($arr_member["locationbase"] != $_SESSION["m_locationbase"]){
	echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["3"]."');window.location='index.php?sessiontab=4&sub=21&state=1'</script>";	
	exit;
}

$cdistrict = getdistrict($cdistrict);
$camphur = getamphur($camphur);
$cprovince = getprovince($cprovince);



if(empty($chkInternet))$txtInternet = 0;
if(empty($chkFuture))$txtFuture = 0;


$cprovinceId = $cprovince;

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
mysql_free_result($rs);
 
$discount = func_first_billhold($mcode);
//echo $discount;exit;
if($satype == "H"){

	/*if($mtype == 0 ){
        echo "<script>alert('สมาชิกประเภท Member ไม่สามารถเปิดบิล Hold ได้');window.history.back();</script>";    
        exit;
	}
	if($mtype == 1 and $discount == "" and $tot_pv < 20000){
        echo "<script>alert('สมาชิกประเภท Franchise จะต้องเปิดบิล hold บิลแรกขั้นต่ำ 20,000pv');window.history.back();</script>";    
        exit;	
	}else if($mtype == 1 and $discount == 1 and $tot_pv < 2000){
        echo "<script>alert('สมาชิกประเภท Franchise จะต้องเปิดบิล hold ไม่ต่ำกว่า 2,000pv เท่านั้น');window.history.back();</script>"; 
		exit;
	}
	if($mtype == 2 and $discount == "" and $tot_pv < 200000){
        echo "<script>alert('สมาชิกประเภท Agency จะต้องเปิดบิล hold บิลแรกขั้นต่ำ 200,000pv');window.history.back();</script>";    
		exit;
	}else if($mtype == 2 and $discount == 1 and $tot_pv < 0){
        echo "<script>alert('สมาชิกประเภท Agency จะต้องเปิดบิล hold ไม่ต่ำกว่า  0pv เท่านั้น');window.history.back();</script>";    
		exit;
	} */
}



func_check_sale($dbprefix,$mcode,$tot_pv,$satype,$pos_cur,$sadate,$mtype,$total);
//if($spayment == '3'){
	$tot_base = 0;
	$tot_weight = 0;
	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$qty=$_POST['qty'];
		for($i=0;$i<sizeof($pcode);$i++){
			$sql="SELECT weight,bprice,customer_price FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
			//exit;
			$rs = mysql_query($sql);
			//echo "$sql<BR>";exit;
			if(mysql_num_rows($rs) > 0)
			{
				for($m=0;$m<mysql_num_rows($rs);$m++){
					
					$sqlObj = mysql_fetch_object($rs);
					$weight =$sqlObj->weight*$qty[$i];	
					$tot_weight = $tot_weight+$weight;
					$tot_base = $tot_base+($sqlObj->bprice*$qty[$i]);	
					$tot_cus = $tot_cus+($sqlObj->customer_price*$qty[$i]);	
					$tot_sppv =  $tot_sppv+($sqlObj->special_pv*$qty[$i]);
				}
			}else{
				$sql="SELECT weight,bprice,customer_price FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				//echo $sql;
				//exit;
				$rs = mysql_query($sql);
				//echo "$sql<BR>";
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight =$sqlObj->weight*$qty[$i];	
					$tot_weight = $tot_weight+$weight;
					$tot_base = $tot_base+($sqlObj->bprice*$qty[$i]);	
					$tot_cus = $tot_cus+($sqlObj->customer_price*$qty[$i]);	
					$tot_sppv =  $tot_sppv+($sqlObj->special_pv*$qty[$i]);
				}
			}
			//echo $qty[$i];
		}
	}

$tot_old = $total;
//var_dump($GLOBALS["sending"]);
//exit;
if($radsend == '1' and $GLOBALS["sending"] == '1' ){
	$tot_weight = $tot_weight+0.1;
	$inv_code = $GLOBALS["main_branch"];
	$arr_sending = array();
	$arr_sending = searchsending($dbprefix,$_SESSION["m_locationbase"],$stype,$tot_pv,$weight);
	//var_dump($arr_sending);
	if($cprovinceId == '1' or $cprovinceId == '2' or $cprovinceId == '3' or $cprovinceId == '4' or $cprovinceId == 'กรุงเทพมหานคร' or $cprovinceId == 'สมุทรปราการ' or $cprovinceId == 'นนทบุรี' or $cprovinceId == 'ปทุมธานี'){
		//echo $total;
		$total = $total+$arr_sending["inbound-pcode"]["price"];
		$tot_cus = $tot_cus+$arr_sending["inbound-pcode"]["price"];
		$tot_base = $tot_base+$arr_sending["inbound-pcode"]["bprice"];
	}else {
		$total = $total+$arr_sending["outbound-pcode"]["price"];
		$tot_cus = $tot_cus+$arr_sending["outbound-pcode"]["price"];
		$tot_base = $tot_base+$arr_sending["outbound-pcode"]["bprice"];
	}
	$tot_weight = $tot_weight-$arr_sending["maxweight"];
	if($tot_weight >0){
		$total = $total+$arr_sending["overweight-pcode"]["price"]*ceil($tot_weight);
		$tot_cus = $tot_cus+$arr_sending["overweight-pcode"]["price"]*ceil($tot_weight);
		$tot_base = $tot_base+$arr_sending["overweight-pcode"]["bprice"]*ceil($tot_weight);
	}
}
	if($total > $showewallet1){
		$stotal = $total-$tot_old;
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["7"].$stotal." ".$wording_lan["operate"]["13"]."');window.location='index.php?sessiontab=4&sub=21&state=1'</script>";	
		//			echo "<script language='JavaScript'>alert('ewallet ไม่เพียงพอ มีค่าการจัดส่ง ".$stot_weight." บาท');'</script>";	
		exit;
	}

	$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."asaleh   ";
	$rs = mysql_query($sql);
	$mid = mysql_result($rs,0,'id')+1;
	$sano = gencodesale('S');

	logtext(true,$_SESSION['usercode'],$wording_lan["operate"]["5"],$mid);

	if($mtype == 0){
		//	$timestamp = strtotime ( "+30 days" );
		//	$hdate = date("Y-m-d", $timestamp);
	}else if($mtype <> '0' and $discount == 1 and $tot_pv < 5000){
		//	$hdate = "";
	}



	if($_SESSION["m_locationbase"] == '0'){
		echo "<script language='JavaScript'>alert('Problem Please Try Again!');window.location='index.php?sessiontab=4&sub=21&state=1'</script>";	
		exit;
	}

	$sql="insert into ".$dbprefix."asaleh (id,  sano, sadate,  mcode,  sa_type, inv_code,  total,customer_total, tot_pv,tot_sppv,tot_weight,tot_fv, uid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther,trnf,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,online,checkportal,hpv,htotal,hdate,locationbase,bprice,name_f,mbase,cname,cmobile,crate ) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total','$tot_cus' ,'$tot_pv','$tot_sppv','$tot_weight','$tot_fv' ,'".$_SESSION['usercode']."','$radsend','$txtoption','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','1','$chkDiscount','$chkOther','$txtCash','$txtFuture',
	'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$total','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','$trnf','$name_t','$caddress','$cdistrict','$camphur','$cprovince','$czip','1','3','$tot_pv','$total','$hdate','".$_SESSION["m_locationbase"]."','$tot_base','$name_f','".$arr_member["locationbase"]."','$cname','$cmobile','".$_SESSION["m_crate"]."') ";

	if (! mysql_query($sql)) {
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."')window.location='index.php?sessiontab=4&sub=21&state=1'</script>";
		exit;
	}

	if($satype == "H"){
				$sql="UPDATE ali_asaleh SET  hdate =  '".$hdate."'   WHERE mcode ='".$mcode."' and  sa_type =  'H' and hdate > '".$_SESSION["datetimezone"]."'";
				mysql_query($sql);
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
				$sql="SELECT weight,bprice,customer_price,vat FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
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
		}
	}
	// UPDATE Vat ////////
	$total_net=$total_all-$total_vat;
	$total_vat=  round($total_vat,2); 
	$total_net= round($total_net,2); 
	$total_invat = round($total_invat,2); 
	$total_exvat = round($total_exvat,2); 
	$Qvat = "update ".$dbprefix."asaleh set total_vat= '$total_vat',total_net='$total_net',total_invat='$total_invat_sum',total_exvat='$total_exvat' where id = '$mid' ";
	mysql_query($Qvat);

	if($satype == 'A' or $satype=='B')updatePos($dbprefix,$mcode,$sadate,$tot_pv,$satype);   
	if($satype == 'A' )getInsert_bm('ali_bm1',$sano,$mcode,$pos_cur,$tot_pv,$sadate,$sadate);
	if($satype == 'H' )updatehpv1($dbprefix,$mcode,$tot_pv);

	if($radsend == '1' and $GLOBALS["sending"] == '1'){
		if($cprovinceId == '1' or $cprovinceId == '2' or $cprovinceId == '3' or $cprovinceId == '4' or $cprovinceId == 'กรุงเทพมหานคร' or $cprovinceId == 'สมุทรปราการ' or $cprovinceId == 'นนทบุรี' or $cprovinceId == 'ปทุมธานี'){
			$totalprice = $arr_sending["inbound-pcode"]["price"];
			$pcode = $arr_sending["inbound-pcode"]["pcode"];
		}
		else {
			$totalprice = $arr_sending["outbound-pcode"]["price"];
			$pcode = $arr_sending["outbound-pcode"]["pcode"];
		}
		$qty=1;
		if(!empty($pcode))keysend($dbprefix,$mid,$pcode,$inv_code,$qty,$weight,$totalprice, $arr_sending["outbound-pcode"]["price"],$sano,$satype,$mcode,$sadate);
		//$tot_weight = $tot_weight-5;
		$qty = ceil($tot_weight);
		if($tot_weight >0)
		{
			$totalprice = $arr_sending["overweight-pcode"]["price"]*$qty;
			$pcode = $arr_sending["overweight-pcode"]["pcode"];
		}
		if($tot_weight >0)keysend($dbprefix,$mid,$pcode,$inv_code,$qty,$tot_weight,$totalprice, $arr_sending["outbound-pcode"]["price"],$sano,$satype,$mcode,$sadate);
	}
	$object_stocks = new stocks ();
	$object_stocks->set_data($mid,"asale","sender","3");
	//exit;
	if($_SESSION["usercode"] == $mcode){
		//echo "<script language='JavaScript'>window.open('invoice_aprint.php?bid=".$mid."', '','height=500,width=1000,resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,location=yes');window.location='index.php?sessiontab=4&sub=1';</script>";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=1';</script>";

	}else{
		//echo "<script language='JavaScript'>window.open('invoice_aprint.php?bid=".$mid."', '','height=500,width=1000,resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,location=yes');window.location='index.php?sessiontab=4&sub=7';</script>";	
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=7';</script>";	

	}
	exit;
}

function keysend($dbprefix,$mid,$pcode,$inv_code,$qty,$weight,$totalprice,$price,$sano,$satype,$mcode,$sadate){
	if(!empty($pcode)){
		global $_SESSION;
		$sql="SELECT pdesc,price,pv,bprice,customer_price FROM ".$dbprefix."product_package where pcode = '".$pcode."'";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$pdesc =$sqlObj->pdesc;
				$price =$sqlObj->price;
				$bprice =$sqlObj->bprice;
				$cprice =$sqlObj->customer_price;
				$pv =$sqlObj->pv;
			}
		}else{
			$sql="SELECT pdesc,price,pv,bprice,customer_price  FROM ".$dbprefix."product where pcode = '".$pcode."'";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				$sqlObj = mysql_fetch_object($rs);
				$pdesc =$sqlObj->pdesc;
				$price =$sqlObj->price;
				$bprice =$sqlObj->bprice;
				$cprice =$sqlObj->customer_price;
				$pv =$sqlObj->pv;
			}
		}
		if($totalprice == 0){
			$totalprice = $price*$qty;
		}
		$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,weight,qty,amt,inv_code,locationbase,bprice,customer_price) values ('$mid','$pcode','$pdesc','$price' ,'$pv','$weight','$qty','$totalprice','$inv_code','".$_SESSION["m_locationbase"]."','$bprice','$cprice') ";
		mysql_query($sql);

		updatestockcard($dbprefix,$mcode,$inv_code,"ONLIN",$sano,$sanox,$sadate,$rccode,$satype,$pcode,$_SESSION["usercode"],$qty,$price,$totalprice);

		if(empty($inv_code))minusProduct($dbprefix,$pcode,$_SESSION['usercode'],$qty,$mid);
		else minusProduct1($dbprefix,$pcode,$inv_code,$qty,$sano,$_SESSION["usercode"],$inv_code);

		//calc_stock($dbprefix,$pcode,$inv_code,$qty,$sano,$_SESSION["inv_usercode"],$_SESSION["admininvent"],$satype,'0');
	}
}

function keysend1($dbprefix,$mid,$pcode,$inv_code,$qty,$weight,$totalprice){
	if(!empty($pcode)){
		$sql="SELECT pdesc,price,pv,bprice,customer_price FROM ".$dbprefix."product_package where pcode = '".$pcode."'";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$pdesc =$sqlObj->pdesc;
				$price =$sqlObj->price;
				$bprice =$sqlObj->bprice;
				$cprice =$sqlObj->customer_price;
				$pv =$sqlObj->pv;
			}
		}else{
			$sql="SELECT pdesc,price,pv,bprice,customer_price  FROM ".$dbprefix."product where pcode = '".$pcode."'";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				$sqlObj = mysql_fetch_object($rs);
				$pdesc =$sqlObj->pdesc;
				$price =$sqlObj->price;
				$bprice =$sqlObj->bprice;
				$cprice =$sqlObj->customer_price;
				$pv =$sqlObj->pv;
			}
		}
		$sql="insert into ".$dbprefix."transfersale_d (sano,pcode,pdesc,price,pv,weight,qty,amt,inv_code,bprice,customer_price) values ('$mid','$pcode','$pdesc','$price' ,'$pv','$weight','$qty','$totalprice','$inv_code','$bprice','$cprice') ";

		mysql_query($sql);
	}
}


function dateDiff($startDate, $endDate) { 
    $startArry = date_parse($startDate); 
    $endArry = date_parse($endDate); 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]); 
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]); 
    return round(($end_date - $start_date), 0); 

} 
function expdate($startdate,$datenum){
	 $startdatec=strtotime($startdate); // ทำให้ข้อความเป็นวินาที
	 $tod=$datenum*86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
	 $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
	 return $ndate; // ส่งค่ากลับ
}
function minusVoucher($dbprefix,$mcode,$total,$btotal){
     global $sano;    
	 $sql = "update ".$dbprefix."member set voucher = voucher-'$total'  WHERE mcode='$mcode' "; 
	 $rs = mysql_query($sql);
	 $option = "Shopping ($sano)";
     log_ewallet('voucher',$mcode,$sano,$total,'O',date("Y-m-d"),$option);         
}
function minusEwallet($dbprefix,$mcode,$total,$btotal){
    global $sano;
	$sql = "update ".$dbprefix."member set ewallet = ewallet-'$total'  WHERE mcode='$mcode' ";   
	$rs = mysql_query($sql);
	$option = "Shopping ($sano)";
    log_ewallet('ewallet',$mcode,$sano,$total,'O',date("Y-m-d"),$option); 
}
function minusProduct1($dbprefix,$pcode,$invent,$qty,$sano,$uid,$inv_code){

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

				$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode2."' and inv_code = '$invent'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before-$qty2;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','$inv_code','$invent','$pcode2','$qty_before','-$qty2','$qty_after','".$_SESSION["datetimezone"]."','".$_SESSION["datetimezone_time"]."','คีย์รับที่สาขา','$uid')";
				mysql_query($sql);

				
				$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode2' and inv_code = '$invent'";
				$rs1 = mysql_query($sql);
				if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty2 WHERE pcode='$pcode2' and inv_code = '$invent' ";
				else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode2','-$qty2','$invent')";
			//	echo $sql;
			//	exit;
				mysql_query($sql);
			
			}
		}else{


				$sqlewallet = " select qty from ".$dbprefix."product_invent where pcode = '".$pcode."' and inv_code = '$invent'";
				$rsewallet = mysql_query($sqlewallet);
				if(mysql_num_rows($rsewallet) > 0)$qty_before=mysql_result($rsewallet,0,'qty');else $qty_before=0;
				$qty_after=$qty_before-$qty;
				$sql = "insert into ".$dbprefix."stocks(sano,inv_code,inv_code1,pcode,yokma,qty,amt,sdate,stime,status,uid)
				  values('$sano','$inv_code','$invent','$pcode','$qty_before','-$qty','$qty_after','".$_SESSION["datetimezone"]."','".$_SESSION["datetimezone_time"]."','คีย์รับที่สาขา','$uid')";
				mysql_query($sql);



			$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
			$rs1 = mysql_query($sql);
			if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
			else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode','-$qty','$invent')";
			mysql_query($sql);

		}
}
function minusProduct($dbprefix,$pcode,$invent,$qty,$sano,$uid){
		$sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
		$rs = mysql_query($sql);
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
				  values('$sano','$invent','Head Office','$pcode2','$qty_before','-$qty2','$qty_after','".$_SESSION["datetimezone"]."','".$_SESSION["datetimezone_time"]."','บิลขาย','$uid')";
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
			  values('$sano','$invent','Head Office','$pcode','$qty_before','-$qty','$qty_after','".$_SESSION["datetimezone"]."','".$_SESSION["datetimezone_time"]."','บิลขาย','$uid')";
			mysql_query($sql);

			$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
			mysql_query($sql);
		}
}
?>

