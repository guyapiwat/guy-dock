<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once("global.php");
require("adminchecklogin.php");
require_once ("function.log.inc.php");
require_once ("function_new.php");

if(isset($_GET['state'])){
	$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."holdhead ";
	$rs = mysql_query($sql);
	$mid = $hono = mysql_result($rs,0,'id');
	mysql_free_result($rs);
	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
	if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
	if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
	if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
	if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
	if (isset($_POST["chkchk"])){$chkchk=$_POST["chkchk"];}else{$chkchk="";}
	if (isset($_POST["txtoption"])){$txtoption=$_POST["txtoption"];}else{$txtoption="";}
	if (isset($_POST["selectPcoupon"])){$selectPcoupon=$_POST["selectPcoupon"];}else{$selectPcoupon="";}
}
//var_dump($total);

//echo $txtCash;
//exit;
$inv_ref = $_SESSION["admininvent"];

if(empty($redddd))$sadate = date("Y-m-d");
else $sadate = date('Y-m-t', strtotime("-1 month"));


$sql = "SELECT sano,mcode,name_t from ".$dbprefix."asaleh WHERE id='".$_POST['hid']."' ";
$rs = mysql_query($sql);
$pos_old = '';
if(mysql_num_rows($rs)>0) {
	$sano_ref = mysql_result($rs,0,'sano');
	$mcode = mysql_result($rs,0,'mcode');
	$name_t = mysql_result($rs,0,'name_t');

} 



$csano = substr($sano_ref,0,2);
if($csano == 'S1' or $csano == 'S5'){
	$sano_f = 'S6';
	$satype = 'E';
}
if($csano == 'K1'){
	$sano_f = 'K6';
	$satype = 'F';
}
//var_dump($sano_f);
//exit;



$tot_pv = 0;
$rccode = $_SESSION["rccode"];
$uid   = $_SESSION["inv_usercode"];
if(empty($inv_ref))$inv_ref = $_SESSION["admininvent"];
if(empty($inv_code))$inv_code =  $_SESSION["admininvent"];
$sano = gensano($dbprefix,$sadate,$inv_ref,$sano_f,$satype);


//var_dump($sano);
//exit;
if(!empty($stockist)){
	$sql = "SELECT inv_desc FROM ".$dbprefix."invent where inv_code = '$stockist'   ";
	$rsff = mysql_query($sql);
	$stockist_name = mysql_result($rsff,0,'inv_desc');
}

//exit;




if(empty($mcode)){
	echo "<script language='JavaScript'>alert('Please try agian');window.location='index.php?sessiontab=3&sub=28';</script>";	
	exit;
}
mysql_free_result($rs);


		$tot_weight = 0;
		if(isset($_POST['pcode'])){
			$pcode=$_POST['pcode'];
			$qty=$_POST['qty'];
			for($i=0;$i<sizeof($pcode);$i++){
				$sql="SELECT weight FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
				//exit;
				$rs = mysql_query($sql);
				//echo "$sql<BR>";
				if(mysql_num_rows($rs) > 0)
				{
					for($m=0;$m<mysql_num_rows($rs);$m++){
						
						$sqlObj = mysql_fetch_object($rs);
						$weight =$sqlObj->weight*$qty[$i];	
						$tot_weight = $tot_weight+$weight;
					}
				}else{
					$sql="SELECT weight FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
					//exit;
					$rs = mysql_query($sql);
					//echo "$sql<BR>";
					if(mysql_num_rows($rs) > 0)
					{
						$sqlObj = mysql_fetch_object($rs);
						$weight =$sqlObj->weight*$qty[$i];	
						$tot_weight = $tot_weight+$weight;
					}
				}
				//echo $qty[$i];
			}
		}

$sstotal = 0;
$_GET['state'] = 0;
if($_GET['state']==0){
//var_dump($_POST);
//exit;

$chkpcoupon = 'on';
$txt_pcoupon = $total;
$option_pcoupon = $txtoption;
$ccredit2 = 0;
$ccredit = $txtCredit1+$txtCredit2+$txtCredit3+$txtCredit4+$txtCash+$txtFuture+$txtTransfer+$txtInternet+$txtDiscount+$txtcreditweb+$txtmlm+$txt_pcoupon-$total;
$ccredit1 = $ccredit*100/(100+$GLOBALS["status_vat"]);
$ccredit2 = $ccredit- $ccredit1;

if(empty($ccredit))$ccredit = 0;
$total = $total+$ccredit ;

//echo $ccredit.' : '.$ccredit1.' : '.$ccredit2.' : '.$GLOBALS["status_vat"];
//exit;


$sstotal1 = round($sstotal*100/(100+$GLOBALS["status_vat"]),2);
$sstotal2 = $sstotal- $sstotal1;

$ctaxx = $GLOBALS["status_vat"];
$coupon = 'N';
if($chkCash == 'on'){
	$cpay_map .= $selectcash.'-*-';
	$tpay_map .= $txtCash.'-*-';
	$tpay_map .= $optionCash.'-*-';
}else{
	$selectcash = "";$txtCash = "";$optionCash = "";
}
if($chkFuture == 'on'){
	$cpay_map .= $selectFuture.'-*-';
	$tpay_map .= $txtFuture.'-*-';
	$opay_map .= $optionFuture.'-*-';
}else{
	$selectFuture = "";$txtFuture = "";$optionFuture = "";
}
if($chkTransfer == 'on'){
	$cpay_map .= $selectTransfer.'-*-';
	$tpay_map .= $txtTransfer.'-*-';
	$opay_map .= $optionTransfer.'-*-';
}else{
	$selectTransfer = "";$txtTransfer = "";$optionTransfer = "";
}
if($chkCredit1 == 'on'){
	$cpay_map .= $selectCredit1.'-*-';
	$tpay_map .= $txtCredit1.'-*-';
	$opay_map .= $optionCredit.'-*-';
}else{
	$selectCredit1 = "";$txtCredit1 = "";$optionCredit = "";
}
if($chkCredit2 == 'on'){
	$cpay_map .= $selectCredit2.'-*-';
	$tpay_map .= $txtCredit2.'-*-';
	$opay_map .= $optionCredit2.'-*-';
}else{
	$selectCredit2 = "";$txtCredit2 = "";$optionCredit2 = "";
}
if($chkCredit3 == 'on'){
	$cpay_map .= $selectCredit3.'-*-';
	$tpay_map .= $txtCredit3.'-*-';
	$opay_map .= $optionCredit3.'-*-';
}else{
	$selectCredit3 = "";$txtCredit3 = "";$optionCredit3 = "";
}
if($chkCredit4 == 'on'){
	$cpay_map .= $selectCredit4.'-*-';
	$tpay_map .= $txtCredit4.'-*-';
	$opay_map .= $optionCredit4.'-*-';
}else{
	$selectCredit4 = "";$txtCredit4 = "";$optionCredit4 = "";
}
if($chkInternet == 'on'){
	$cpay_map .= $selectInternet.'-*-';
	$tpay_map .= $txtInternet.'-*-';
	$opay_map .= $optionInternet.'-*-';
}else{
	$selectInternet = "";$txtInternet = "";$optionInternet = "";
}
if($chkDiscount == 'on'){
	$cpay_map .= $selectDiscount.'-*-';
	$coupon = 'Y'; 
	$tpay_map .= $txtDiscount.'-*-';
	$opay_map .= $optionDiscount.'-*-';
}else{
	$coupon = 'N';
	$selectDiscount = "";$txtDiscount = "";$optionDiscount = "";
}
if($chkcreditweb == 'on'){
	$cpay_map .= $selectCreditweb.'-*-';
	$tpay_map .= $txtcreditweb.'-*-';
	$opay_map .= $optioncreditweb.'-*-';
}else{
	$selectCreditweb = "";$txtcreditweb = "";$optioncreditweb = "";
}
if($chkmlm == 'on'){
	$cpay_map .= $selectMLM.'-*-';
	$tpay_map .= $txtmlm.'-*-';
	$opay_map .= $optionmlm.'-*-';
}else{
	$selectMLM = "";$txtmlm = "";$optionmlm = "";
}
if($chkpcoupon == 'on'){
	$cpay_map .= $selectPcoupon.'-*-';
	$tpay_map .= $txt_pcoupon.'-*-';
	$opay_map .= $optionpcoupon.'-*-';
}else{
	$selectPcoupon = "";$txt_pcoupon = "";$optionpcoupon = "";
}

	if(empty($chkInternet))$txtInternet = 0;
	if(empty($chkInternet))$txtInternet = 0;
//if($chkDiscount == 'on')$tot_pv = 0;
$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."asaleh   ";
$rsff = mysql_query($sql);
$mid = mysql_result($rsff,0,'id')+1;
logtext(true,$_SESSION['inv_usercode'],'เพิ่มบิล',$mid);


    	$hdate = date("Y-m", strtotime("+1 months")).'-25';
	 $sql="insert into ".$dbprefix."asaleh (id,  sano, sadate,  mcode,  sa_type, inv_code,inv_ref , total, tot_pv, uid,send,txtoption,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,stockist,stockist_name,hpv,htotal,hdate,cost_notax,total_notax,cost_tax,tax_tax,total_tax,cost_other,tax_other,total_other,cost_service,tax_service,total_service,kaset_notax,nostock_total,nostock_tax,nation,rccode,coupon,checkportal,ctax,
	 
	 pay_mapping_cash,pay_mapping_future,pay_mapping_transfer,pay_mapping_credit1,pay_mapping_credit2,pay_mapping_credit3,pay_mapping_credit4,pay_mapping_internet,pay_mapping_discount,pay_mapping_creditweb,pay_mapping_mlm,pay_mapping_coupon,
	 
	 txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtCredit4,txtInternet,txtDiscount,txtCreditweb,txtMLM,txtCoupon
	 
	 ,optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionCredit4,optionInternet,optionDiscount,optionCreditweb,optionMLM,optionCoupon,sano_ref
	 
	 
	 ) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code','".$_SESSION["admininvent"]."' ,'$total' ,'$tot_pv','".$_SESSION['inv_usercode']."','$radsend','$txtoption','$name_t','$caddress','$cdistrictId','$camphurId','$cprovinceId','$czip','$stockist','$stockist_name','$hpv','$total','$hdate','0','0','0','0','0','$ccredit1','$ccredit2','$ccredit','$sstotal1','$sstotal2','$sstotal','0','0','0','".$_SESSION["nation"]."','".$_SESSION["rccode"]."','$coupon','2','$ctaxx'
	 
	 ,'$selectcash','$selectFuture','$selectTransfer','$selectCredit1','$selectCredit2','$selectCredit3','$selectCredit4','$selectInternet','$selectDiscount','$selectCreditweb','$selectMLM','$selectPcoupon'
	 
	 ,'$txtCash','$txtFuture','$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$txtCredit4','$txtInternet','$txtDiscount','$txtcreditweb','$txtmlm','$txt_pcoupon'
	 
	 ,'$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionCredit4','$optionInternet','$optionDiscount','$optioncreditweb','$optionmlm','$option_pcoupon','$sano_ref') ";

	 
	//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	//mysql_query($sql);
	if (! mysql_query($sql)) {
		//	echo "<font color='#FF0000'>error</font><br>";
		//	echo  "$sql";		
			echo "<script language='JavaScript'>alert('พบข้อผิดพลาดในการบันทึกกรุณาลองใหม่อีกครั้ง');window.location='sessiontab=3&sub=139&state=2'</script>";	
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
			$ctax[$i] = 0;
			$sql="SELECT * FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				for($m=0;$m<mysql_num_rows($rs);$m++){
					
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$ctax[$i] =$sqlObj->ctax;	
					$cost[$i] =$sqlObj->cost;	
					$rccode[$i] =$sqlObj->rccode;	
					$unit[$i] =$sqlObj->unit;	
					$group_id[$i] =$sqlObj->group_id;	
				}
			}else{
				$sql="SELECT * FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$ctax[$i] =$sqlObj->ctax;	
					$cost[$i] =$sqlObj->cost;	
					$rccode[$i] =$sqlObj->rccode;	
					$unit[$i] =$sqlObj->unit;
					//exit;
					$group_id[$i] =$sqlObj->group_id;	
				}
			}
//echo $qty[$i].' : '.$price[$i].' : '.$ctax[$i].' : '.$pcode[$i].' : '.$group_id[$i].'<br>';
if($group_id[$i] == '5907'){
	$kaset_notax = $kaset_notax+($qty[$i]*$price[$i]);
}else if($group_id[$i] == '5999'){
	$nostock_total = $nostock_total+($qty[$i]*$price[$i]);
	$nostock_tax = $nostock_tax+($qty[$i]*$price[$i])-($qty[$i]*$price[$i]*100/(100+$ctax[$i]));
}else{
	if($ctax[$i] == '0'){
		$cost_notax=$cost_notax+($qty[$i]*$price[$i]);
		$total_notax= $total_notax+($qty[$i]*$price[$i]);
	}else{
		$total_tax= $total_tax+($qty[$i]*$price[$i]);
		$tax_tax=  $tax_tax+ ($qty[$i]*$price[$i]) - ($qty[$i]*$price[$i]*100/(100+$ctax[$i])); 
		$cost_tax=$cost_tax+($qty[$i]*$price[$i]*100/(100+$ctax[$i]));
	}
}




//kaset_notax='$kaset_notax',nostock_total='$nostock_total',nostock_tax='$nostock_tax'
				$sql="SELECT * FROM ".$dbprefix."freeproduct_package1 where package = '".$pcode[$i]."'";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0)
				{
					for($m=0;$m<mysql_num_rows($rs);$m++){
						
						$sqlObj = mysql_fetch_object($rs);
						$pcode1 =$sqlObj->pcode;	
						$pdesc1 =$sqlObj->pdesc;	
						$unit1 =$sqlObj->unit;	
						$group_id1 =$sqlObj->group_id;	
						$cost1 =$sqlObj->cost;	
						$price1 = $price[$i];	
						$rccode = $sqlObj->rccode;		
						$qty1 =$sqlObj->qty*$qty[$i];	
						$totalprice1 = 0;	
						$pv1= 0;
							$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,qty,amt,inv_code,inv_ref,rccode,unit,group_id,stockist,sadate,cost,mcode) values ('$mid','$pcode1','$pdesc1','$price1' ,'$pv1','$qty1','$totalprice1','$inv_ref','".$_SESSION["admininvent"]."' ,'$rccode','$unit1','$group_id1','$stockist','$sadate','$cost1','$mcode') ";
							//====================LOG===========================
							$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
							writelogfile($text);
							//=================END LOG===========================
						//echo $sql."<br />";
						mysql_query($sql);
	//				updatestockcard($dbprefix,$mcode,$inv_code,$_SESSION["admininvent"],$sano,$sanox,$sadate,$rccode,$satype,$pcode1,$_SESSION["inv_usercode"],$qty1,$price1,$totalprice1);
	//					minusProduct1($dbprefix,$pcode1,$_SESSION['admininvent'],$qty1,$sano,$_SESSION["inv_usercode"],$_SESSION["admininvent"]);
						updatestockcard($dbprefix,$mcode,$inv_code,$_SESSION["admininvent"],$sano,$sanox,$sadate,$rccode,$satype,$pcode1,$_SESSION["inv_usercode"],$qty1,$price1,$totalprice1);
					calc_stock($dbprefix,$pcode1,$_SESSION['admininvent'],$qty1,$sano,$_SESSION["inv_usercode"],$_SESSION["admininvent"],$satype,'0');
				}
				}else{
						$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,qty,amt,inv_code,inv_ref,rccode,unit,group_id,stockist,sadate,ctax,cost,mcode) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$qty[$i]','$totalprice[$i]','$inv_ref','".$_SESSION["admininvent"]."' ,'$rccode[$i]','$unit[$i]','$group_id[$i]','$stockist','$sadate','$ctax[$i]','$cost[$i]','$mcode') ";
						//====================LOG===========================
						//echo $sql;exit;
						$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
						writelogfile($text);
						//=================END LOG===========================
					//echo $sql."<br />";
					mysql_query($sql);
				//	updatestockcard($dbprefix,$mcode,$inv_code,$_SESSION["admininvent"],$sano,$sanox,$sadate,$rccode,$satype,$pcode[$i],$_SESSION["inv_usercode"],$qty[$i],$price[$i],$totalprice[$i]);

//						if(empty($_SESSION['admininvent']))minusProduct($dbprefix,$pcode[$i],$_SESSION['admininvent'],$qty[$i],$sano,$_SESSION["inv_usercode"]);
//						else minusProduct1($dbprefix,$pcode[$i],$_SESSION['admininvent'],$qty[$i],$sano,$_SESSION["inv_usercode"],$_SESSION["admininvent"]);
					updatestockcard($dbprefix,$mcode,$inv_code,$_SESSION["admininvent"],$sano,$sanox,$sadate,$rccode,$satype,$pcode[$i],$_SESSION["inv_usercode"],$qty[$i],$price[$i],$totalprice[$i]);


					calc_stock($dbprefix,$pcode[$i],$_SESSION['admininvent'],$qty[$i],$sano,$_SESSION["inv_usercode"],$_SESSION["admininvent"],$satype,'0');
				}
				//echo $sql;
				//exit;
	}
	//exit;
					$tax_tax=  round($tax_tax,2); 
				$cost_tax= round($cost_tax,2); 
				$nostock_tax = round($nostock_tax,2); 
	mysql_query("update ".$dbprefix."asaleh set cost_notax= '$cost_notax',total_notax='$total_notax',cost_tax='$cost_tax',tax_tax='$tax_tax',total_tax='$total_tax',kaset_notax='$kaset_notax',nostock_total='$nostock_total',nostock_tax='$nostock_tax' where id = '$mid' ");

	//updateEwallet($dbprefix,$mcode,$txtInternet);
	//if($satype != 'H')updatePos($dbprefix,$mcode,$sadate);
	//exit;
}

	mysql_query("update ".$dbprefix."asaleh set cost_notax= '$cost_notax',total_notax='$total_notax',cost_tax='$cost_tax',tax_tax='$tax_tax',total_tax='$total_tax',kaset_notax='$kaset_notax',nostock_total='$nostock_total',nostock_tax='$nostock_tax'  and where id = '$mid' ");
		
	mysql_query("update ".$dbprefix."asaleh set hcount = hcount+1 where id='".$_POST['hid']."'");

		$sql = "select * from (SELECT ad.pcode,ad.pdesc,ad.price,";
		$sql .= "ad.pv,ad.qty as qty1,SUM(ad1.qty) as qty2,(ad.qty-IFNULL(SUM(ad1.qty),0)) AS qty FROM ".$dbprefix."asaled as ad ";//,(".$dbprefix."asaled.qty-".$dbprefix."holddesc.qty)
		$sql .= "LEFT JOIN ".$dbprefix."asaleh as ah ON (ah.id=ad.sano) ";
		$sql .= "LEFT JOIN ".$dbprefix."asaleh as ah1 ON (ah.sano=ah1.sano_ref and ah1.cancel=0 ) ";
		$sql .= "LEFT JOIN ".$dbprefix."asaled as ad1 ";
		$sql .= "ON (ah1.id=ad1.sano AND ad1.pcode=ad.pcode) ";
		//$sql .= "LEFT JOIN ".$dbprefix."holddesc WHERE sano='".$_GET['bid']."' ";pcode,pdesc,price,pv,qty
		$sql .= "WHERE ad.sano='".$_POST['hid']."'  GROUP BY pcode) as a where a.qty > 0      ";//echo $sql;
//echo $sql;
	$rs12354 = mysql_query($sql);
	//echo "$sql<BR>";
	if(mysql_num_rows($rs12354) <= 0)
	{
	//	echo "update ".$dbprefix."asaleh set hcancel = '1' where id='".$_POST['hid']."'";
		mysql_query("update ".$dbprefix."asaleh set hcancel = '1' where id='".$_POST['hid']."'");

	}

	//exit;
	//updateEwallet($dbprefix,$mcode,$txtInternet);
	//updatePos($dbprefix,$mcode,$sadate);
		

//exit;
$_SESSION["perbuy"] = 0;
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=28&sano=".$_POST['hid']."';</script>";	
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
				  values('$sano','$inv_code','$invent','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','คีย์รับที่สาขา','$uid')";
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
				  values('$sano','$inv_code','$invent','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','คีย์รับที่สาขา','$uid')";
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
function updateEwallet($dbprefix,$mcode,$txtInternet){
	$sql3 = "update ".$dbprefix."member set ewallet = ewallet-$txtInternet where mcode = '$mcode' ";
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
	$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,weight,qty,amt,inv_code) values ('$mid','$pcode','$pdesc','$price' ,'$pv','$weight','$qty','$totalprice','$inv_code') ";
	mysql_query($sql);

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
function fnc_check_sp($dbprefix){
	
}
?>