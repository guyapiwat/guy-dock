<? session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<? 

if($_SESSION["perbuy"] == 0){
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=6';</script>";
exit;
}
$_SESSION["perbuy"] = 0;

include("connectmysql.php");
include("prefix.php");
include("wordingTH.php");
require("adminchecklogin.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once("global.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code=$GLOBALS["main_inv_code"];}
	if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
	if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
	if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
	if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
	if (isset($_POST["sumweight"])){$tot_weight=$_POST["sumweight"];}else{$tot_weight="";}
	if (isset($_POST["sumfv"])){$tot_fv=$_POST["sumfv"];}else{$tot_fv="";}
	if (isset($_POST["radsend"])){$radsend=$_POST["radsend"];}else{$radsend="";}
 	if (isset($_POST["chkFuture"])){$chkFuture=$_POST["chkFuture"];}else{$chkFuture	="";}
  	if (isset($_POST["chkDiscount"])){$chkDiscount=$_POST["chkDiscount"];}else{$chkDiscount="";}
	if (isset($_POST["chkOther"])){$chkOther=$_POST["chkOther"];}else{$chkOther="";}
	if (isset($_POST["selectcash"])){$selectcash=$_POST["selectcash"];}else{$selectcash="";}
	if (isset($_POST["selectFuture"])){$selectFuture=$_POST["selectFuture"];}else{$selectFuture="";}
	if (isset($_POST["selectTransfer"])){$selectTransfer=$_POST["selectTransfer"];}else{$selectTransfer="";}
	if (isset($_POST["selectCredit1"])){$selectCredit1=$_POST["selectCredit1"];}else{$selectCredit1="";}
	if (isset($_POST["selectCredit2"])){$selectCredit2=$_POST["selectCredit2"];}else{$selectCredit2="";}
	if (isset($_POST["selectCredit3"])){$selectCredit3=$_POST["selectCredit3"];}else{$selectCredit3="";}
	if (isset($_POST["selectCredit4"])){$selectCredit4=$_POST["selectCredit4"];}else{$selectCredit4="";}
	if (isset($_POST["selectInternet"])){$selectInternet=$_POST["selectInternet"];}else{$selectInternet="";}
	if (isset($_POST["selectDiscount"])){$selectDiscount=$_POST["selectDiscount"];}else{$selectDiscount="";}
	if (isset($_POST["selectCreditweb"])){$selectCreditweb=$_POST["selectCreditweb"];}else{$selectCreditweb="";}
	if (isset($_POST["selectMLM"])){$selectMLM=$_POST["selectMLM"];}else{$selectMLM="";}
	if (isset($_POST["selectPcoupon"])){$selectPcoupon=$_POST["selectPcoupon"];}else{$selectPcoupon="";}	
	if (isset($_POST["txtCash"])){$txtCash=$_POST["txtCash"];}else{$txtCash="";}
	if (isset($_POST["txtFuture"])){$txtFuture=$_POST["txtFuture"];}else{$txtFuture="";}
	if (isset($_POST["txtTransfer"])){$txtTransfer=$_POST["txtTransfer"];}else{$txtTransfer="";}
	if (isset($_POST["txtCredit1"])){$txtCredit1=$_POST["txtCredit1"];}else{$txtCredit1="";}
	if (isset($_POST["txtCredit2"])){$txtCredit2=$_POST["txtCredit2"];}else{$txtCredit2="";}
	if (isset($_POST["txtCredit3"])){$txtCredit3=$_POST["txtCredit3"];}else{$txtCredit3="";}
	if (isset($_POST["txtCredit4"])){$txtCredit4=$_POST["txtCredit4"];}else{$txtCredit4="";}
	if (isset($_POST["txtInternet"])){$txtInternet=$_POST["txtInternet"];}else{$txtInternet="";}
	if (isset($_POST["txtDiscount"])){$txtDiscount=$_POST["txtDiscount"];}else{$txtDiscount="";}
	if (isset($_POST["txtOther"])){$txtOther=$_POST["txtOther"];}else{$txtOther="";}
	if (isset($_POST["optionCash"])){$optionCash=$_POST["optionCash"];}else{$optionCash="";}
	if (isset($_POST["optionFuture"])){$optionFuture=$_POST["optionFuture"];}else{$optionFuture="";}
 	if (isset($_POST["optionCredit1"])){$optionCredit1=$_POST["optionCredit1"];}else{$optionCredit1="";}
	if (isset($_POST["optionCredit2"])){$optionCredit2=$_POST["optionCredit2"];}else{$optionCredit2="";}
	if (isset($_POST["optionCredit3"])){$optionCredit3=$_POST["optionCredit3"];}else{$optionCredit3="";}
	if (isset($_POST["optionCredit4"])){$optionCredit4=$_POST["optionCredit4"];}else{$optionCredit4="";}
	if (isset($_POST["optionInternet"])){$optionInternet=$_POST["optionInternet"];}else{$optionInternet="";}
	if (isset($_POST["optionDiscount"])){$optionDiscount=$_POST["optionDiscount"];}else{$optionDiscount="";}
	if (isset($_POST["optionOther"])){$optionOther=$_POST["optionOther"];}else{$optionOther="";}
	if (isset($_POST["txtoption"])){$txtoption=$_POST["txtoption"];}else{$txtoption="";}
	if (isset($_POST["cname"])){$cname=$_POST["cname"];}else{$cname="";}
	if (isset($_POST["cmobile"])){$cmobile=$_POST["cmobile"];}else{$cmobile="";}
	if (isset($_POST["caddress"])){$caddress=$_POST["caddress"];}else{$caddress="";}
	if (isset($_POST["cprovince"])){$cprovinceId=$_POST["cprovince"];}else{$cprovinceId="";}
	if (isset($_POST["camphur"])){$camphurId=$_POST["camphur"];}else{$camphurId="";}
	if (isset($_POST["cdistrict"])){$cdistrictId=$_POST["cdistrict"];}else{$cdistrictId="";}
	if (isset($_POST["czip"])){$czip=$_POST["czip"];}else{$czip="";}
	if (isset($_POST["chkaddress"])){$chkaddress=$_POST["chkaddress"];}else{$chkaddress="0";}

    if (isset($_POST["chkInternet"])){$chkInternet=$_POST["chkInternet"];$sanof='EW';}else{$chkInternet="";}
	if (isset($_POST["chkCash"])){$chkCash=$_POST["chkCash"];$sanof='CA';}else{$chkCash="";}	
	if (isset($_POST["chkTransfer"])){
		$chkTransfer=$_POST["chkTransfer"];
			if (isset($_POST["selectTransfer"])){
				$optionTransfer=$_POST["selectTransfer"];
				if ($optionTransfer =='3193'){$sanof='TK';}else{$sanof='TR';}
			}else{$optionTransfer="";}
	}else{
		$chkTransfer="";
	}
	if (isset($_POST["chkCredit1"])){$chkCredit1=$_POST["chkCredit1"];$sanof='CC';}else{$chkCredit1="";}
	if (isset($_POST["chkCredit2"])){$chkCredit2=$_POST["chkCredit2"];$sanof='CC';}else{$chkCredit2="";}
	if (isset($_POST["chkCredit3"])){$chkCredit3=$_POST["chkCredit3"];$sanof='CC';}else{$chkCredit3="";}
	if (isset($_POST["chkCredit4"])){$chkCredit4=$_POST["chkCredit4"];$sanof='CC';}else{$chkCredit4="";}

}
if($total > $_SESSION["limitcredit"]){
   echo "<script language='JavaScript'>alert('คุณคีย์เกินกำหนดของคุณค่ะ กรุณาตรวจสอบอีกครั้ง');window.location='index.php?sessiontab=3&sub=139&state=8'</script>";	
	exit;
}

if(empty($mcode)){
	echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."');window.location='index.php?sessiontab=3&sub=139&state=8'</script>";
		exit;
}


$sadate  = $sadate;
if(empty($chkInternet))$txtInternet = 0;
if(empty($chkFuture))$txtFuture = 0;

$arr_member = array();
$arr_member = searchmember($dbprefix,$mcode);

if($arr_member["locationbase"] != $_SESSION["inv_locationbase"]){
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["14"]."');window.location='index.php?sessiontab=3&sub=139&state=8'</script>";	
		exit;
	}
if(!empty($chkInternet)){
	$sql = "SELECT * FROM ".$dbprefix."member where mcode = '$mcode' and  ewallet >= '$txtInternet'   ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) <=0 ){
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["15"]."');window.location='index.php?sessiontab=3&sub=139&state=8'</script>";	
		exit;
	}
}


$cdistrictId = getdistrict($cdistrictId);
$camphurId = getamphur($camphurId);
$cprovinceId = getprovince($cprovinceId);
 


//echo $sano;
//exit;

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
	$mtype1 = mysql_result($rs,0,'mtype1');
	mysql_free_result($rs);

}
 
func_check_sale($dbprefix,$mcode,$tot_pv,$satype,$pos_cur,$sadate,$mtype1);


$tot_base = 0;
$tot_weight = 0;
if(isset($_POST['pcode'])){
	$pcode=$_POST['pcode'];
	$qty=$_POST['qty'];
 
	for($i=0;$i<sizeof($pcode);$i++){
		$sql="SELECT weight,bprice,bv,special_pv,customer_price FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
		//exit;
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$weight =$sqlObj->weight*$qty[$i];	
				$tot_base = $tot_base+($sqlObj->bprice*$qty[$i]);	
				$tot_cus = $tot_cus+($sqlObj->customer_price*$qty[$i]);	
				$tot_sppv =  $tot_sppv+($sqlObj->special_pv*$qty[$i]);		
				$tot_weight = $tot_weight+$weight;
				$tot_bv = $sqlObj->bv*$qty[$i];
			}
		}else{
			$sql="SELECT weight,bprice,bv,special_pv,customer_price FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
			//exit;
			$rs = mysql_query($sql);
			
			if(mysql_num_rows($rs) > 0)
			{
				$sqlObj = mysql_fetch_object($rs);
				$weight =$sqlObj->weight*$qty[$i];	
				$tot_base = $tot_base+($sqlObj->bprice*$qty[$i]);	
				$tot_cus = $tot_cus+($sqlObj->customer_price*$qty[$i]);	
				$tot_sppv =  $tot_sppv+($sqlObj->special_pv*$qty[$i]);	
				$tot_weight = $tot_weight+$weight;
				$tot_bv = $sqlObj->bv*$qty[$i];
			}
		}
		//echo $qty[$i];
	}
	
}


if($arr_member["locationbase"] != $_SESSION["inv_locationbase"] and $mcode != '0000001' and $mcode != '0000002' and $mcode != '0000003'){
	$arr_charge = '0.25';
	$total_charge = $total*$arr_charge;
	$tot_basecharge = $tot_base*$arr_charge;
	$tot_cuscharge = $tot_cus*$arr_charge;
}else{
	$arr_charge = '0';
	$total_charge = 0;
	$tot_basecharge = 0;
	$tot_cuscharge = 0;

}

if($radsend == '1' and $GLOBALS["sending"] == '1' ){
	$tot_weight = $tot_weight+0.1;
	$arr_sending = array();
	$arr_sending = searchsending($dbprefix,$_SESSION["inv_locationbase"],$stype,$tot_pv,$weight);
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


$total = $total + $total_charge;
$tot_base = $tot_base + $tot_basecharge;
$tot_cus = $tot_cus + $tot_cuscharge;

if($_GET['state']==0 ){
if(empty($mcode)){
	echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."');window.location='index.php?sessiontab=3&sub=139&state=8'</script>";
		exit;
}
	logtext(true,$_SESSION['inv_usercode'],'เพิ่มบิล',$mid);
 //  if($chkCredit3 == 'on')$tot_pv = 0;
	$chdate  = explode('-',date("Y-m-15", strtotime("+1 months")));


	$hdate =  hdate($mtype1);
 $sql2 = "SELECT MAX(id) AS id FROM ".$dbprefix."asaleh   ";
$rs2 = mysql_query($sql2);
$mid = mysql_result($rs2,0,'id')+1;
$sano = gencodesale_IV($sanof);		
        
    $sql1="insert into ".$dbprefix."asaleh (id,  sano,  pano, sadate,  mcode,sp_code,  sa_type, inv_code,  total,customer_total, tot_pv,tot_sppv, tot_bv,tot_weight,tot_fv, uid,lid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkCredit4,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtCredit4,txtInternet,txtDiscount,txtOther,
	optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionCredit4,optionInternet,optionDiscount,optionOther,trnf,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,hpv,htotal,hdate,checkportal,locationbase,bprice ,name_f,cname,cmobile,mbase,crate) values ('$mid' ,'$sano' ,'$pano' ,'$sadate' ,'$mcode','$sp_code', '$satype' ,'$inv_code' ,'$total' ,'$tot_cus' ,'$tot_pv','$tot_sppv','$tot_bv','$tot_weight','$tot_fv' ,'".$_SESSION['inv_usercode']."','".$_SESSION['admininvent']."','$radsend','$txtoption','$chkcash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','$chkCredit4','$chkInternet','$chkDiscount','$chkOther','$txtCash','$txtFuture',
	'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$txtCredit4','$txtInternet','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionCredit4','$optionInternet','$optionDiscount','$optionOther','$trnf','$name_t','$caddress','$cdistrictId','$camphurId','$cprovinceId','$czip','$tot_pv','$total','$hdate','2','".$_SESSION["inv_locationbase"]."','$tot_base','$name_f','$cname','$cmobile','".$arr_member["locationbase"]."','".$_SESSION["inv_crate"]."') ";
///	echo $sql;

//	exit;

	//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=saleoperate =>$sql1";
writelogfile($text);
//=================END LOG===========================
if (!mysql_query($sql1)) {
//			echo "<font color='#FF0000'>error</font><br>";
		//echo  "$sql1";		
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."');window.location='index.php?sessiontab=3&sub=139&state=8'</script>";
		exit;
	}	
	
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
			$sql="SELECT weight,bprice,special_pv,bv,customer_price,vat FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				for($m=0;$m<mysql_num_rows($rs);$m++){
					
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$bprice[$i] =$sqlObj->bprice;	
					$cprice[$i] =$sqlObj->customer_price;	
					$bv[$i] = $sqlObj->bv;
					$vat = $sqlObj->vat;
					$special_pv[$i] = $sqlObj->special_pv;
				}
			}else{
				$sql="SELECT weight,bprice,special_pv,bv,customer_price,vat  FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$bprice[$i] =$sqlObj->bprice;	
					$cprice[$i] =$sqlObj->customer_price;	
					$bv[$i] = $sqlObj->bv;
					$vat = $sqlObj->vat;
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

		$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,bprice,customer_price,pv,sppv,bv,weight,fv,qty,amt,inv_code,locationbase,vat) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]','$bprice[$i]' ,'$cprice[$i]' ,'$pv[$i]','$special_pv[$i]','$bv[$i]','$weight[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code','".$_SESSION["inv_locationbase"]."','$vat') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		
		updatestockcard($dbprefix,$mcode,$inv_code,$_SESSION["admininvent"],$sano,$sanox,$sadate,$rccode,$satype,$pcode[$i],$_SESSION["inv_usercode"],$qty[$i],$price[$i],$totalprice[$i]);
		calc_stock($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION["inv_usercode"],$_SESSION["admininvent"],$satype,'0');
	
	
	}

	// UPDATE Vat ////////
	$total_net=$total_all-$total_vat;
	$total_vat=  round($total_vat,2); 
	$total_net= round($total_net,2); 
	$total_invat = round($total_invat,2); 
	$total_exvat = round($total_exvat,2); 
	$Qvat = "update ".$dbprefix."asaleh set total_vat= '$total_vat',total_net='$total_net',total_invat='$total_invat_sum',total_exvat='$total_exvat' where id = '$mid' ";
	mysql_query($Qvat);
	
	//$bvoucher = $GLOBALS["crate"]*$txtFuture;
	if($txtFuture > 0)updateVoucher($dbprefix,$mcode,$txtFuture,$bewallet);

    if($satype == 'A')updatePos($dbprefix,$mcode,$sadate,$tot_pv,$satype);   
	if($satype == 'B')func_status_B($dbprefix,$mcode,$tot_pv,$sadate,$pos_cur);
	if($satype == 'A' )getInsert_bm('ali_bm1',$sano,$mcode,$pos_old,$tot_pv,$sadate,$sadate);
    if($txtInternet > 0)updateEwallet($dbprefix,$mcode,$txtInternet,$bewallet);

}
	/////// send to address  ///////

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
	if($total_charge > 0){
		$pcode = $GLOBALS["pcode_charge"];
		$qty = $total_charge;
		keysend($dbprefix,$mid,$pcode,$inv_code,$qty,'0','0','0',$sano,$satype,$mcode,$sadate);
	}
	/////// send to address ////////

		

$_SESSION["perbuy"] = 0;
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=139&sanoo=".$mid."';window.open('invoice_aprint_sale1.php?bid=".$mid."&chkprint=1', '_blank');</script>";	
exit;
?>

<?
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
function plusProduct($dbprefix,$pcode,$invent,$qty){
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
				$sql = "update ".$dbprefix."product set qty = qty+$qty2 WHERE pcode='$pcode2' ";
				$rs1 = mysql_query($sql);
			}
		}else{
			$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
			$rs = mysql_query($sql);
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
				$qty2 =$sqlObj->qty*$qty;	
				$sql = "update ".$dbprefix."product set qty = qty+$qty2 WHERE pcode='$pcode2' ";
				$rs1 = mysql_query($sql);
			}
		}
	}else{
		$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
		$rs = mysql_query($sql);
	}
}

function updateEwallet($dbprefix,$mcode,$txtInternet,$bewallet){
	//global $sano;
	$sql3 = "update ".$dbprefix."member set ewallet = ewallet-$txtInternet where mcode = '$mcode' ";
	$rs3=mysql_query($sql3);
	//log_ewallet('ewallet',$mcode,$sano,$txtInternet,'O',DATE("Y-m-d"),'');
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
		$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,weight,qty,amt,inv_code,bprice,locationbase,customer_price) values ('$mid','$pcode','$pdesc','$price' ,'$pv','$weight','$qty','$totalprice','$inv_code','$bprice','".$_SESSION["inv_locationbase"]."','$cprice') ";
		mysql_query($sql);

		updatestockcard($dbprefix,$mcode,$inv_code,$_SESSION["admininvent"],$sano,$sanox,$sadate,$rccode,$satype,$pcode,$_SESSION["inv_usercode"],$qty,$price,$totalprice);
		calc_stock($dbprefix,$pcode,$inv_code,$qty,$sano,$_SESSION["inv_usercode"],$_SESSION["admininvent"],$satype,'0');
	}
}

//update ตำแหน่ง แบบไม่สะสมคะแนน
?>
 