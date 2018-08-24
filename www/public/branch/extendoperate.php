<? 
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">

<?
include("connectmysql.php");
include("prefix.php");
require("adminchecklogin.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once("global.php");
//echo $GLOBALS["crate"];
//exit;
require_once ("function.log.inc.php");
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
//var_dump($arr_member);

if($arr_member["locationbase"] != $_SESSION["inv_locationbase"]){
	echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["3"]."');window.location='index.php?sessiontab=4&sub=115&state=2'</script>";	
	exit;
}
					//if(datedate <= cdate){


$scheckd = dateDiff($_SESSION["datetimezone"],$expiredate);

if($scheckd > 90){
	echo "<script language='JavaScript'>alert('".$wording_lan["system allow to renew member 90 days before expire"]."');window.location='index.php?sessiontab=4&sub=115&state=2'</script>";	
	exit;

}

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
//var_dump($_POST["pcode"]);
//exit;

$sql = "SELECT pos_cur,name_t,caddress,czip,cdistrictId,camphurId,cprovinceId,name_f from ".$dbprefix."member WHERE mcode='$mcode' ";
$rs = mysql_query($sql);
$pos_old = '';
if(mysql_num_rows($rs)>0) {
	$pos_old = mysql_result($rs,0,'pos_cur');
	$name_t = mysql_result($rs,0,'name_t');
	$name_f = mysql_result($rs,0,'name_f');
}
mysql_free_result($rs);

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
				$tot_base = $tot_base+($sqlObj->bprice*$qty[$i]);	
				$tot_weight = $tot_weight+$weight;
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
				$tot_base = $tot_base+($sqlObj->bprice*$qty[$i]);	
				$tot_weight = $tot_weight+$weight;
			}
		}
		//echo $qty[$i];
	}
}

//var_dump($_POST["pcode"]);
//exit;

				
if($spayment == '3'){
	$sql = "SELECT * FROM ".$dbprefix."member where mcode = '$mcode' and  ewallet >= '$total'   ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) <=0 ){
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["15"]."');window.location='index.php?sessiontab=4&sub=115&state=2'</script>";	
		exit;
	}
	$chkInternet = 'on';
	$txtInternet = $total;
}

if($spayment == '2'){
	$chkCredit1 = 'on';
	$txtCredit1 = $total;
}

if($spayment == '1'){
	$chkCash = 'on';
	$txtCash = $total;
}

if($spayment == '4'){
	$chkTransfer = 'on';
	$txtTransfer = $total;
}

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

/*if(!empty($inv_code))$radsend = 2;
else $radsend=1;
$radsend == '0';*/
$radsend = 0;
$inv_ref = $inv_code = $_SESSION["admininvent"];




//echo $total.'dd'.$showewallet1;
//exit;

	$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."asaleh   ";
	$rs = mysql_query($sql);
	$mid = mysql_result($rs,0,'id')+1;
	$sano = gencodesale();
//echo $sano;
//exit;
	mysql_free_result($rs);






if($arr_member["locationbase"] != $_SESSION["inv_locationbase"] and $mcode != '0000001' and $mcode != '0000002' and $mcode != '0000003'){
	$arr_charge = '0.25';
	$total_charge = $total*$arr_charge;
	$tot_basecharge = $tot_base*$arr_charge;
}else{
	$arr_charge = '0';
	$total_charge = 0;
	$tot_basecharge = 0;

}


	logtext(true,$_SESSION['inv_usercode'],'เพิ่มบิล',$mid);


if($chkDiscount == 'on')$tot_pv = 0;

	//$chdate = explode('-',date("Y-m-15", strtotime("+1 months")));
		$hdate = $_SESSION["datetimezone_last"];
	 $sql="insert into ".$dbprefix."asaleh (id,  sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv,tot_weight,tot_fv, uid,lid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
	optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther,trnf,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,hpv,htotal,hdate,checkportal,locationbase,bprice ,name_f,cname,cmobile,mbase,crate,scheck) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv','$tot_weight','$tot_fv' ,'".$_SESSION['inv_usercode']."','".$_SESSION['admininvent']."','$radsend','$txtoption','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','$chkInternet','$chkDiscount','$chkOther','$txtCash','$txtFuture',
	'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$txtInternet','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','$trnf','$name_t','$caddress','$cdistrictId','$camphurId','$cprovinceId','$czip','$tot_pv','$total','$hdate','2','".$_SESSION["inv_locationbase"]."','$tot_base','$name_f','$cname','$cmobile','".$arr_member["locationbase"]."','".$_SESSION["inv_crate"]."','extend') ";
	//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
if (! mysql_query($sql)) {
//			echo "<font color='#FF0000'>error</font><br>";
//			echo  "$sql";		
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."')window.location='index.php?sessiontab=3&sub=139&state=2'</script>";
		exit;
	}	
	
	/*if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$weight=$_POST['weight'];
		$fv=$_POST['fv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}*/
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
			}

		$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,bprice,pv,weight,fv,qty,amt,inv_code,locationbase) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]','$bprice[$i]' ,'$pv[$i]','$weight[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code','".$_SESSION["inv_locationbase"]."') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		if(empty($inv_code))minusProduct($dbprefix,$pcode[$i],$_SESSION['admininvent'],$qty[$i],$sano,$_SESSION["inv_usercode"]);
		else minusProduct1($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION["inv_usercode"],$_SESSION["admininvent"]);
	}
	$bewallet = $GLOBALS["crate"]*$txtInternet;
	if($txtInternet > 0)updateEwallet($dbprefix,$mcode,$txtInternet,$bewallet);
	//$bvoucher = $GLOBALS["crate"]*$txtFuture;
	//if($txtFuture > 0)updateVoucher($dbprefix,$mcode,$txtFuture,$bewallet);

	//if($satype != 'H')updatePos($dbprefix,$mcode,$sadate,$tot_pv);

echo "<script language='JavaScript'>window.open('invoice_aprint_sale.php?bid=".$mid."', '','height=500,width=1000,resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,location=yes');window.location='index.php?sessiontab=3&sub=139';</script>";
//echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=21';</script>";	
//exit;

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
	$sql3 = "update ".$dbprefix."member set ewallet = ewallet-$txtInternet,bewallet = bewallet-$bewallet where mcode = '$mcode' ";
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
function keysend($dbprefix,$mid,$pcode,$inv_code,$qty,$weight,$totalprice){
	$sql="SELECT pdesc,price,pv,bprice FROM ".$dbprefix."product_package where pcode = '".$pcode."'";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs) > 0)
	{
		for($m=0;$m<mysql_num_rows($rs);$m++){
			
			$sqlObj = mysql_fetch_object($rs);
			$pdesc =$sqlObj->pdesc;
			$price =$sqlObj->price;
			$bprice =$sqlObj->bprice;
			$pv =$sqlObj->pv;
		}
	}else{
		$sql="SELECT pdesc,price,pv,bprice  FROM ".$dbprefix."product where pcode = '".$pcode."'";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0)
		{
			$sqlObj = mysql_fetch_object($rs);
			$pdesc =$sqlObj->pdesc;
			$price =$sqlObj->price;
			$bprice =$sqlObj->bprice;
			$pv =$sqlObj->pv;
		}
	}
	if($totalprice == 0){
		$totalprice = $price*$qty;
	}
	$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,weight,qty,amt,inv_code,bprice,locationbase) values ('$mid','$pcode','$pdesc','$price' ,'$pv','$weight','$qty','$totalprice','$inv_code','$bprice','".$_SESSION["inv_locationbase"]."') ";
	mysql_query($sql);

}

//update ตำแหน่ง แบบไม่สะสมคะแนน
?>

<?
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
		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and sadate like  '%".$_SESSION["datetimezone_Ym"]."%' and cancel=0 ";
		//echo $sql.'<br>';
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		//mysql_free_result($rs);

		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode."' and sa_type='A' and sadate like  '%".$_SESSION["datetimezone_Ym"]."%'  and cancel=0 ";
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
function fnc_check_sp($dbprefix){
	
}
?>