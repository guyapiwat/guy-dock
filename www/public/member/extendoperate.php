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
	if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="A";}
	if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
	if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
	if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
	if (isset($_POST["sumweight"])){$tot_weight=$_POST["sumweight"];}else{$tot_weight="";}
	if (isset($_POST["sumfv"])){$tot_fv=$_POST["sumfv"];}else{$tot_fv="";}
	if (isset($_POST["radsend"])){$radsend=$_POST["radsend"];}else{$radsend="2";}
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
	if (isset($_POST["yextend"])){$yextend=$_POST["yextend"];}else{$yextend="1";}

			if (isset($_POST["caddress"])){$caddress=$_POST["caddress"];}else{$caddress="";}
			if (isset($_POST["cprovince"])){$cprovince=$_POST["cprovince"];}else{$cprovince="";}
			if (isset($_POST["camphur"])){$camphur=$_POST["camphur"];}else{$camphur="";}
			if (isset($_POST["cdistrict"])){$cdistrict=$_POST["cdistrict"];}else{$cdistrict="";}
			if (isset($_POST["czip"])){$czip=$_POST["czip"];}else{$czip="";}
			if (isset($_POST["chkaddress"])){$chkaddress=$_POST["chkaddress"];}else{$chkaddress="0";}
			if (isset($_POST["spayment"])){$spayment=$_POST["spayment"];}else{$spayment="0";}
	if (isset($_POST["cname"])){$cname=$_POST["cname"];}else{$cname="";}
	if (isset($_POST["cmobile"])){$cmobile=$_POST["cmobile"];}else{$cmobile="";}
	if (isset($_POST["checkexpdate"])){$checkexpdate=$_POST["checkexpdate"];}else{$checkexpdate="";}
	if (isset($_POST["expiredate"])){$expiredate=$_POST["expiredate"];}else{$expiredate="";}

}


$arr_member = searchmember($dbprefix,$mcode);
if($arr_member["locationbase"] != $_SESSION["m_locationbase"]){
	echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["3"]."');window.location='index.php?sessiontab=4&sub=25&state=2'</script>";	
	exit;
}
//echo $expiredate.' : '.$_SESSION["datetimezone"];

$scheckd = dateDiff($_SESSION["datetimezone"],$expiredate);

if($scheckd > 90){
	echo "<script language='JavaScript'>alert('".$wording_lan["system allow to renew member 90 days before expire"]."');window.location='index.php?sessiontab=4&sub=25&state=2'</script>";	
	exit;

}
//echo $checkexpdate.' : '.$_SESSION["datetimezone"];
//exit;

$cdistrict = getdistrict($cdistrict);
$camphur = getamphur($camphur);
$cprovince = getprovince($cprovince);

$pcode1 = $GLOBALS["pcode_extend"];
$pcode = array();
$pdesc = array();
//$pcode = array();
//$pcode = array();
$_POST["pcode"] = $pcode1;
$sql1 = "SELECT *  FROM ".$dbprefix."product where pcode = '$pcode1' ";
$rs1 = mysql_query($sql1);
$total  = mysql_result($rs1,0,'price')*$yextend;
$btotal  = mysql_result($rs1,0,'bprice')*$yextend;
$pdesc["0"]  = mysql_result($rs1,0,'pdesc');
$tot_pv  = mysql_result($rs1,0,'pv')*$yextend;
$pcode["0"] = $pcode1;
$price["0"] = $total;
$bprice["0"] = $btotal;
//=$pdesc;
$pv["0"]=$tot_pv;
$qty["0"]=$yextend;
$totalprice["0"]=$total;
				

if(empty($chkInternet))$txtInternet = 0;
if(empty($chkFuture))$txtFuture = 0;


$cprovinceId = $cprovince;
$sql = "SELECT pos_cur,name_t,caddress,czip,cdistrictId,camphurId,cprovinceId,name_f from ".$dbprefix."member WHERE mcode='$mcode' ";
$rs = mysql_query($sql);
$pos_old = '';
if(mysql_num_rows($rs)>0) {
	$pos_old = mysql_result($rs,0,'pos_cur');
	$name_t = mysql_result($rs,0,'name_t');
	$name_f = mysql_result($rs,0,'name_f');
}
mysql_free_result($rs);

if(!empty($inv_code))$radsend = 2;
else $radsend=1;
$radsend == '0';
$inv_code = $GLOBALS["main_branch"];

//echo $total.'dd'.$showewallet1;
//exit;
if($spayment == '4'){

	$tot_base = 0;
	$tot_weight = 0;
	if(isset($_POST['pcode'])){
		//$pcode=$_POST['pcode'];
		//$qty=$_POST['qty'];
		for($i=0;$i<sizeof($pcode);$i++){
			$sql="SELECT weight,bprice FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
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
				}
			}else{
				$sql="SELECT weight,bprice FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				//exit;
				$rs = mysql_query($sql);
				//echo "$sql<BR>";
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight =$sqlObj->weight*$qty[$i];	
					$tot_weight = $tot_weight+$weight;
					$tot_base = $tot_base+($sqlObj->bprice*$qty[$i]);	
				}
			}
			//echo $qty[$i];
		}
	}

$tot_old = $total;
//var_dump($GLOBALS["sending"]);
//exit;
$radsend = 0;
if($radsend == '1' and $GLOBALS["sending"] == '1' ){
	$tot_weight = $tot_weight+0.1;
	$inv_code = $GLOBALS["main_branch"];
	$arr_sending = array();
	$arr_sending = searchsending($dbprefix,$_SESSION["m_locationbase"],$stype,$tot_pv,$weight);
	//var_dump($arr_sending);
	if($cprovinceId == '1' or $cprovinceId == '2' or $cprovinceId == '3' or $cprovinceId == '4' or $cprovinceId == 'กรุงเทพมหานคร' or $cprovinceId == 'สมุทรปราการ' or $cprovinceId == 'นนทบุรี' or $cprovinceId == 'ปทุมธานี'){
		//echo $total;
		$total = $total+$arr_sending["inbound-pcode"]["price"];
		$tot_base = $tot_base+$arr_sending["inbound-pcode"]["bprice"];
	}else {
		$total = $total+$arr_sending["outbound-pcode"]["price"];
		$tot_base = $tot_base+$arr_sending["outbound-pcode"]["bprice"];
	}
	$tot_weight = $tot_weight-$arr_sending["maxweight"];
	if($tot_weight >0){
		$total = $total+$arr_sending["overweight-pcode"]["price"]*ceil($tot_weight);
		$tot_base = $tot_base+$arr_sending["overweight-pcode"]["bprice"]*ceil($tot_weight);
	}
}

	if($total > $showvoucher1+$showewallet1){
		$stotal = $total-$tot_old;
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["4"].' '.$stotal." บาท');window.location='index.php?index.php?sessiontab=4&sub=21&state=2'</script>";	
		//			echo "<script language='JavaScript'>alert('ewallet ไม่เพียงพอ มีค่าการจัดส่ง ".$stot_weight." บาท');'</script>";	
		exit;
	}

	$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."asaleh   ";
	$rs = mysql_query($sql);
	$mid = mysql_result($rs,0,'id')+1;

	$sano = gencodesale();


logtext(true,$_SESSION['usercode'],$wording_lan["operate"]["5"],$mid);
    //	$hdate = date("Y-m", strtotime("+1 months")).'-20';
	//	$hdate = date('Y-m-t');
		$hdate = $_SESSION["datetimezone_last"];
$txtInternet  = $total;
if($total > $showvoucher1){
	$chkFuture = 'on';
	$chkInternet = 'on';
	$txtInternet = $total-$showvoucher1;
	$txtFuture = $showvoucher1;
}else{
	$chkFuture = 'on';
	$txtFuture = $total;
}

if($_SESSION["m_locationbase"] == '0'){
	echo "<script language='JavaScript'>alert('Problem Please Try Again!');window.location='index.php?sessiontab=sessiontab=4&sub=25&state=2'</script>";	
	exit;
}
	 $sql="insert into ".$dbprefix."asaleh (id,  sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv,tot_weight,tot_fv, uid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
	optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther,trnf,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,online,checkportal,hpv,htotal,hdate,locationbase,bprice,name_f,mbase,cname,cmobile,crate,scheck ) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv','$tot_weight','$tot_fv' ,'".$_SESSION['usercode']."','$radsend','$txtoption','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','$chkInternet','$chkDiscount','$chkOther','$txtCash','$txtFuture',
	'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$txtInternet','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','$trnf','$name_t','$caddress','$cdistrict','$camphur','$cprovince','$czip','1','3','$tot_pv','$total','$hdate','".$_SESSION["m_locationbase"]."','$tot_base','$name_f','".$arr_member["locationbase"]."','$cname','$cmobile','".$_SESSION["m_crate"]."','extend') ";

	
		logtext(true,$_SESSION['usercode'],'ewallet',$total);
	//====================LOG===========================
$text="uid=".$_SESSION["usercode"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	if (! mysql_query($sql)) {
//			echo "<font color='#FF0000'>error</font><br>";
//			echo  "$sql";		
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."')window.location='index.php?sessiontab=4&sub=21&state=2'</script>";
		exit;
	}

	$sql="select * from ".$dbprefix."member where mcode = '".$_SESSION['usercode']."' and voucher < $txtInternet ";
	$result=mysql_query($sql);
	if (mysql_num_rows($result)>0) {
		$row = mysql_fetch_object($result);
	
		$txtFuture = $row->voucher;			
		$txtInternet = $txtInternet-$row->voucher;		
		$cvoucher1 =  $tot_base-$row->bvoucher;		
		$sql3 = "update ".$dbprefix."member set voucher = 0,bvoucher = 0 where mcode = '$mcode' ";
		$rs3=mysql_query($sql3);
		minusEwallet($dbprefix,$_SESSION['usercode'],$txtInternet,$cvoucher1);
		$chkFuture = 'on';
		$chkInternet = 'on';
	}else{
		$chkFuture = 'on';
		updateVoucher($dbprefix,$_SESSION['usercode'],$total,$tot_base);
	}
	
	$weight = array();
	for($i=0;$i<sizeof($pcode);$i++){
			$sql="SELECT weight,bprice FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				for($m=0;$m<mysql_num_rows($rs);$m++){
					
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$bprice[$i] =$sqlObj->bprice;	
				}
			}else{
				$sql="SELECT weight,bprice FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$bprice[$i] =$sqlObj->bprice;	
				}
			}
		$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,bprice,pv,weight,fv,qty,amt,inv_code,locationbase) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$bprice[$i]' ,'$pv[$i]','$weight[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code','".$_SESSION["m_locationbase"]."') ";
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
			$sql = "INSERT INTO ".$dbprefix."expdate (mid,exp_date,date_change,exp_type,sano) VALUES('".$idi."',ADDDATE('".$exp_date."', INTERVAL 1 YEAR),'".$_SESSION["datetimezone"]."','extend','$mid')";
			//echo $sql;
			//exit;
			mysql_query($sql);
			//$sql="update ".$dbprefix."expdate set exp_date=ADDDATE(exp_date, INTERVAL 1 YEAR) where mid=$idi ";
				//exit;	//====================LOG===========================
			//$text="uid=".$_SESSION["adminuserid"]." action=memoperate =>$sql";
			//mysql_query($sql);
		}
		if(empty($inv_code))minusProduct($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION["usercode"]);
		else minusProduct1($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION["usercode"],$inv_code);

	}
	//if($satype != 'H')updatePos($dbprefix,$mcode,$sadate,$tot_pv);
$radsend = 0;
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
			if(!empty($pcode))keysend($dbprefix,$mid,$pcode,$inv_code,$qty,$weight,$totalprice);
			//$tot_weight = $tot_weight-5;
			$qty = ceil($tot_weight);
			if($tot_weight >0)
			{
				$totalprice = $arr_sending["overweight-pcode"]["price"]*$qty;
				$pcode = $arr_sending["overweight-pcode"]["pcode"];
			}
		if($tot_weight >0)keysend($dbprefix,$mid,$pcode,$inv_code,$qty,$tot_weight,$totalprice);
	}

	if($_SESSION["usercode"] == $mcode){
		echo "<script language='JavaScript'>window.open('invoice_aprint.php?bid=".$mid."', '','height=500,width=1000,resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,location=yes');window.location='index.php?sessiontab=4&sub=1';</script>";	
		exit;
	}else{
		echo "<script language='JavaScript'>window.open('invoice_aprint.php?bid=".$mid."', '','height=500,width=1000,resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,location=yes');window.location='index.php?sessiontab=4&sub=7';</script>";	
		exit;

	}
}


if($spayment == '3'){
	$tot_base = 0;
	$tot_weight = 0;
	if(isset($_POST['pcode'])){
		for($i=0;$i<sizeof($pcode);$i++){
			$sql="SELECT weight,bprice FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
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
				}
			}else{
				$sql="SELECT weight,bprice FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				//exit;
				$rs = mysql_query($sql);
				//echo "$sql<BR>";
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight =$sqlObj->weight*$qty[$i];	
					$tot_weight = $tot_weight+$weight;
					$tot_base = $tot_base+($sqlObj->bprice*$qty[$i]);	
				}
			}
			//echo $qty[$i];
		}
	}

$tot_old = $total;
//var_dump($GLOBALS["sending"]);
//exit;
$radsend = 0;
if($radsend == '1' and $GLOBALS["sending"] == '1' ){
	$tot_weight = $tot_weight+0.1;
	$inv_code = $GLOBALS["main_branch"];
	$arr_sending = array();
	$arr_sending = searchsending($dbprefix,$_SESSION["m_locationbase"],$stype,$tot_pv,$weight);
	//var_dump($arr_sending);
	if($cprovinceId == '1' or $cprovinceId == '2' or $cprovinceId == '3' or $cprovinceId == '4' or $cprovinceId == 'กรุงเทพมหานคร' or $cprovinceId == 'สมุทรปราการ' or $cprovinceId == 'นนทบุรี' or $cprovinceId == 'ปทุมธานี'){
		//echo $total;
		$total = $total+$arr_sending["inbound-pcode"]["price"];
		$tot_base = $tot_base+$arr_sending["inbound-pcode"]["bprice"];
	}else {
		$total = $total+$arr_sending["outbound-pcode"]["price"];
		$tot_base = $tot_base+$arr_sending["outbound-pcode"]["bprice"];
	}
	$tot_weight = $tot_weight-$arr_sending["maxweight"];
	if($tot_weight >0){
		$total = $total+$arr_sending["overweight-pcode"]["price"]*ceil($tot_weight);
		$tot_base = $tot_base+$arr_sending["overweight-pcode"]["bprice"]*ceil($tot_weight);
	}
}
	if($total > $showewallet1){
		$stotal = $total-$tot_old;
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["7"].$stotal." บาท');window.location='index.php?index.php?sessiontab=4&sub=21&state=2'</script>";	
		//			echo "<script language='JavaScript'>alert('ewallet ไม่เพียงพอ มีค่าการจัดส่ง ".$stot_weight." บาท');'</script>";	
		exit;
	}

	$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."asaleh   ";
	$rs = mysql_query($sql);
	$mid = mysql_result($rs,0,'id')+1;

	$sano = gencodesale();


logtext(true,$_SESSION['usercode'],$wording_lan["operate"]["5"],$mid);
		$hdate = $_SESSION["datetimezone_last"];

if($_SESSION["m_locationbase"] == '0'){
	echo "<script language='JavaScript'>alert('Problem Please Try Again!');window.location='index.php?sessiontab=sessiontab=4&sub=25&state=2'</script>";	
	exit;
}
	 $sql="insert into ".$dbprefix."asaleh (id,  sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv,tot_weight,tot_fv, uid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
	optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther,trnf,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,online,checkportal,hpv,htotal,hdate,locationbase,bprice,name_f,mbase,cname,cmobile,crate,scheck) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv','$tot_weight','$tot_fv' ,'".$_SESSION['usercode']."','$radsend','$txtoption','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','1','$chkDiscount','$chkOther','$txtCash','$txtFuture',
	'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$total','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','$trnf','$name_t','$caddress','$cdistrict','$camphur','$cprovince','$czip','1','3','$tot_pv','$total','$hdate','".$_SESSION["m_locationbase"]."','$tot_base','$name_f','".$arr_member["locationbase"]."','$cname','$cmobile','".$_SESSION["m_crate"]."','extend') ";


	if (! mysql_query($sql)) {
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."')window.location='index.php?sessiontab=4&sub=21&state=2'</script>";
		exit;
	}
			logtext(true,$_SESSION['usercode'],'ewallet',$total);
	//====================LOG===========================
	$text="uid=".$_SESSION["usercode"]." action=saleoperate =>$sql";
	writelogfile($text);
	//=================END LOG===========================
	minusEwallet($dbprefix,$_SESSION['usercode'],$total,$tot_base);

	$weight = array();
	for($i=0;$i<sizeof($pcode);$i++){
			$sql="SELECT weight,bprice FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				for($m=0;$m<mysql_num_rows($rs);$m++){
					
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$bprice[$i] =$sqlObj->bprice;	
				}
			}else{
				$sql="SELECT weight,bprice FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$bprice[$i] =$sqlObj->bprice;	
				}
			}
		$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,bprice,pv,weight,fv,qty,amt,inv_code,locationbase) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$bprice[$i]' ,'$pv[$i]','$weight[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code','".$_SESSION["m_locationbase"]."') ";
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
			$sql = "INSERT INTO ".$dbprefix."expdate (mid,exp_date,date_change,exp_type,sano) VALUES('".$idi."',ADDDATE('".$exp_date."', INTERVAL 1 YEAR),'".$_SESSION["datetimezone"]."','extend','$mid')";
			//echo $sql;
			//exit;
			mysql_query($sql);
			//$sql="update ".$dbprefix."expdate set exp_date=ADDDATE(exp_date, INTERVAL 1 YEAR) where mid=$idi ";
				//exit;	//====================LOG===========================
			//$text="uid=".$_SESSION["adminuserid"]." action=memoperate =>$sql";
			//mysql_query($sql);
		}
		if(empty($inv_code))minusProduct($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION["usercode"]);
		else minusProduct1($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION["usercode"],$inv_code);

	}
	if($satype != 'H')updatePos($dbprefix,$mcode,$sadate,$tot_pv);
$radsend = 0;
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
			if(!empty($pcode))keysend($dbprefix,$mid,$pcode,$inv_code,$qty,$weight,$totalprice);
			//$tot_weight = $tot_weight-5;
			$qty = ceil($tot_weight);
			if($tot_weight >0)
			{
				$totalprice = $arr_sending["overweight-pcode"]["price"]*$qty;
				$pcode = $arr_sending["overweight-pcode"]["pcode"];
			}
		if($tot_weight >0)keysend($dbprefix,$mid,$pcode,$inv_code,$qty,$tot_weight,$totalprice);
	}

	if($_SESSION["usercode"] == $mcode){
		echo "<script language='JavaScript'>window.open('invoice_aprint.php?bid=".$mid."', '','height=500,width=1000,resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,location=yes');window.location='index.php?sessiontab=4&sub=1';</script>";	
		exit;
	}else{
		echo "<script language='JavaScript'>window.open('invoice_aprint.php?bid=".$mid."', '','height=500,width=1000,resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,location=yes');window.location='index.php?sessiontab=4&sub=7';</script>";	
		exit;
	}
}

/////////////////////////// EWALLET ///////////////////////////////////////////////////////////////////////
//$spayment = 1;
if($_GET['state']==0){
	$tot_base = 0;
	$tot_weight = 0;
	if(isset($_POST['pcode'])){
		
		for($i=0;$i<sizeof($pcode);$i++){
			$sql="SELECT weight,bprice FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
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
				}
			}else{
				$sql="SELECT weight,bprice FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				//exit;
				$rs = mysql_query($sql);
				//echo "$sql<BR>";
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight =$sqlObj->weight*$qty[$i];	
					$tot_weight = $tot_weight+$weight;
					$tot_base = $tot_base+($sqlObj->bprice*$qty[$i]);	
				}
			}
			//echo $qty[$i];
		}
	}

$tot_old = $total;
//var_dump($GLOBALS["sending"]);
//exit;
$radsend = 0;
if($radsend == '1' and $GLOBALS["sending"] == '1' ){
	$tot_weight = $tot_weight+0.1;
	//echo $weight;
	//exit;
	$inv_code = $GLOBALS["main_branch"];
	$arr_sending = array();
	$arr_sending = searchsending($dbprefix,$_SESSION["m_locationbase"],$stype,$tot_pv,$weight);
	//var_dump($arr_sending);
	if($cprovinceId == '1' or $cprovinceId == '2' or $cprovinceId == '3' or $cprovinceId == '4' or $cprovinceId == 'กรุงเทพมหานคร' or $cprovinceId == 'สมุทรปราการ' or $cprovinceId == 'นนทบุรี' or $cprovinceId == 'ปทุมธานี'){
		//echo $total;
		$total = $total+$arr_sending["inbound-pcode"]["price"];
		$tot_base = $tot_base+$arr_sending["inbound-pcode"]["bprice"];
	}else {
		$total = $total+$arr_sending["outbound-pcode"]["price"];
		$tot_base = $tot_base+$arr_sending["outbound-pcode"]["bprice"];
	}
	$tot_weight = $tot_weight-$arr_sending["maxweight"];
	if($tot_weight >0){
		$total = $total+$arr_sending["overweight-pcode"]["price"]*ceil($tot_weight);
		$tot_base = $tot_base+$arr_sending["overweight-pcode"]["bprice"]*ceil($tot_weight);
	}
}

	//$mid = ++$sano;
	$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."transfersale_h   ";
	$rs = mysql_query($sql);
	$mid = mysql_result($rs,0,'id')+1;
	logtext(true,$_SESSION['usercode'],$wording_lan["operate"]["5"],$mid);
    //	$hdate = date("Y-m", strtotime("+1 months")).'-20';
		$hdate = $_SESSION["datetimezone_last"];
	 $sql="insert into ".$dbprefix."transfersale_h (id,  sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv,tot_weight,tot_fv, uid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
	optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther,trnf,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,online,checkportal,hpv,htotal,hdate,bprice,locationbase,mbase,cname,cmobile,name_f,crate,scheck) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv','$tot_weight','$tot_fv' ,'".$_SESSION['usercode']."','$radsend','$txtoption','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','1','$chkDiscount','$chkOther','$txtCash','$txtFuture',
	'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$total','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','$trnf','$name_t','$caddress','$cdistrict','$camphur','$cprovince','$czip','1','3','$tot_pv','$total','$hdate','$tot_base','".$_SESSION['m_locationbase']."','".$arr_member["locationbase"]."','$cname','$cmobile','$name_f','".$_SESSION["m_crate"]."','extend') ";

	//minusEwallet($dbprefix,$_SESSION['usercode'],$total);
		logtext(true,$_SESSION['usercode'],'ewallet',$total);
	//====================LOG===========================
$text="uid=".$_SESSION["usercode"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	if (! mysql_query($sql)) {
//			echo "<font color='#FF0000'>error</font><br>";
//			echo  "$sql";		
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."')window.location='index.php?sessiontab=4&sub=21&state=2'</script>";
		exit;
	}
	$weight = array();
	for($i=0;$i<sizeof($pcode);$i++){
			$sql="SELECT weight,bprice FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				for($m=0;$m<mysql_num_rows($rs);$m++){
					
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$bprice[$i] =$sqlObj->bprice;	
				}
			}else{
				$sql="SELECT weight,bprice FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$bprice[$i] =$sqlObj->bprice;	
				}
			}
		$sql="insert into ".$dbprefix."transfersale_d (sano,pcode,pdesc,price,pv,weight,fv,qty,amt,inv_code,bprice,locationbase) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$weight[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code','$inv_code','".$_SESSION['m_locationbase']."') ";
		
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		
		if($pcode[$i] == $GLOBALS["pcode_extend"]){
			/*$selectch = "select id as id,mdate from  ".$dbprefix."member where mcode = '$mcode'";
			$rsch = mysql_query($selectch);
			$idi = mysql_result($rsch,0,'id');
			$mdate = mysql_result($rsch,0,'mdate');
			$select = "SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate where mid='$idi' GROUP BY mid";
			$rs = mysql_query($select);
			if(mysql_num_rows($rs) > 0)	$exp_date = mysql_result($rs,0,'exp_date');
			if(empty($exp_date))$exp_date = $mdate;
			$sql = "INSERT INTO ".$dbprefix."expdate (mid,exp_date,date_change) VALUES('".$idi."',ADDDATE('".$exp_date."', INTERVAL 1 YEAR),'".$_SESSION["datetimezone"]."')";
			mysql_query($sql);*/
		}
	}
	
}

	/////// send to address  ///////
	$radsend = 0;
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
			if(!empty($pcode))keysend1($dbprefix,$mid,$pcode,$inv_code,$qty,$weight,$totalprice);
			//$tot_weight = $tot_weight-5;
			$qty = ceil($tot_weight);
			if($tot_weight >0)
			{
				$totalprice = $arr_sending["overweight-pcode"]["price"]*$qty;
				$pcode = $arr_sending["overweight-pcode"]["pcode"];
			}
		if($tot_weight >0)keysend1($dbprefix,$mid,$pcode,$inv_code,$qty,$tot_weight,$totalprice);
	}

	//exit;
	/////// send to address ////////

if($spayment == '2'){
	$link1 = 'http://www.successmore1.com/member/index.php?sessiontab=99&sub=4';
	$link2 = 'http://www.successmore1.com/member/index.php?sessiontab=99&sub=5';
	$link3 = 'http://www.successmore1.com/member/index.php?sessiontab=99&sub=6';
	$sano = 'sale-'.$mid;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Successmore</title>
</head>
<body onload="Javascript:frm11.submit()" style="display:none;">
<form name="frm11" id="frm11" method="post" action="https://paygate.ktc.co.th/ktc/eng/payment/payForm.jsp">
<input type="hidden" name="merchantId" value="981300005">  
<input type="hidden" name="amount" value="<?=$tot_base?>" > 
<input type="hidden" name="orderRef" value="<?=$sano?>"> 
<input type="hidden" name="currCode" value="764" > 
<input type="hidden" name="successUrl" value="<?=$link1?>">
<input type="hidden" name="failUrl" value="<?=$link2?>"> 
<input type="hidden" name="cancelUrl" value="<?=$link3?>"> 
<input type="hidden" name="payType" value="N"> 
<input type="hidden" name="lang" value="E"> 
</form>             
 </body>
</html>
<?
	exit;
}
if($_SESSION["usercode"] == $mcode){
echo "<script language='JavaScript'>window.open('invoice_aprint.php?bid=".$mid."', '','height=500,width=1000,resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,location=yes');window.location='index.php?sessiontab=4&sub=21';</script>";
}else{
echo "<script language='JavaScript'>window.open('invoice_aprint.php?bid=".$mid."', '','height=500,width=1000,resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,location=yes');window.location='index.php?sessiontab=4&sub=7';</script>";
}
//echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=21';</script>";	
//exit;

?>

<?

function keysend($dbprefix,$mid,$pcode,$inv_code,$qty,$weight,$totalprice){
	global $_SESSION;
	$sql="SELECT pdesc,price,pv FROM ".$dbprefix."product_package where pcode = '".$pcode."'";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0)
	{
		for($m=0;$m<mysql_num_rows($rs);$m++){
			
			$sqlObj = mysql_fetch_object($rs);
			$pdesc =$sqlObj->pdesc;
			$price =$sqlObj->price;
			$pv =$sqlObj->pv;
		}
	}else{
		$sql="SELECT pdesc,price,pv  FROM ".$dbprefix."product where pcode = '".$pcode."'";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0)
		{
			$sqlObj = mysql_fetch_object($rs);
			$pdesc =$sqlObj->pdesc;
			$price =$sqlObj->price;
			$pv =$sqlObj->pv;
		}
	}
	$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,weight,qty,amt,inv_code,locationbase) values ('$mid','$pcode','$pdesc','$price' ,'$pv','$weight','$qty','$totalprice','$inv_code','".$_SESSION["m_locationbase"]."') ";
	mysql_query($sql);
	if(empty($inv_code))minusProduct($dbprefix,$pcode,$_SESSION['usercode'],$qty,$mid);
	else minusProduct1($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION["usercode"],$inv_code);


}

function keysend1($dbprefix,$mid,$pcode,$inv_code,$qty,$weight,$totalprice){
	$sql="SELECT pdesc,price,pv FROM ".$dbprefix."product_package where pcode = '".$pcode."'";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0)
	{
		for($m=0;$m<mysql_num_rows($rs);$m++){
			
			$sqlObj = mysql_fetch_object($rs);
			$pdesc =$sqlObj->pdesc;
			$price =$sqlObj->price;
			$pv =$sqlObj->pv;
		}
	}else{
		$sql="SELECT pdesc,price,pv  FROM ".$dbprefix."product where pcode = '".$pcode."'";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0)
		{
			$sqlObj = mysql_fetch_object($rs);
			$pdesc =$sqlObj->pdesc;
			$price =$sqlObj->price;
			$pv =$sqlObj->pv;
		}
	}
	$sql="insert into ".$dbprefix."transfersale_d (sano,pcode,pdesc,price,pv,weight,qty,amt,inv_code) values ('$mid','$pcode','$pdesc','$price' ,'$pv','$weight','$qty','$totalprice','$inv_code') ";

	mysql_query($sql);

}


function updatePos($dbprefix,$mcode,$cur_date,$tot_pv){

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
		$expmdte = date('Y-m-d',expdate($mdate,'61'));
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
	}else{
			$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and sadate like '%".$_SESSION["datetimezone_Ym"]."%' and cancel=0 ";
		//echo $sql.'<br>';
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		//mysql_free_result($rs);

		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode."' and sa_type='A' and sadate like '%".$_SESSION["datetimezone_Ym"]."%'  and cancel=0 ";
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
		$sql .= "VALUES('','".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
		//====================LOG===========================
		$text="uid=".$_SESSION["adminusercode"]." action=calcposition =>$sql";
		//writelogfile($text);
		//=================END LOG===========================
		mysql_query($sql);
		
	}

}
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
function minusEwallet($dbprefix,$mcode,$total,$btotal){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	 $sql = "update ".$dbprefix."member set ewallet = ewallet-$total,bewallet = bewallet-$btotal WHERE mcode='$mcode' ";
	//echo $sql;exit;
	//$_SESSION["ewallet"] = 	$_SESSION["ewallet"]-$total;
	$rs = mysql_query($sql);
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
?>

