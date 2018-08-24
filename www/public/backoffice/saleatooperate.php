<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	/*$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."atoasaleh ";
	$rs = mysql_query($sql);
	$mid = $sano = mysql_result($rs,0,'id');*/
	$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."atoasaleh ";
	$rs = mysql_query($sql);
	$mid = mysql_result($rs,0,'id')+1;
	$sano = mysql_result($rs,0,'sano')+1;
	//echo '<br>';
	$tsano = substr($sano, 0, 4);
	$sano = substr($sano, 4, 9);
	$year = date('Y');
	$month = date('m');
	$year = $year+543;
	$year = substr($year,2,2);
	$fsano = $year.$month;
	//echo $fsano.' '.$tsano;
	//exit;
	if($tsano != $fsano)$sano = '0000001';
	$sano = $year.$month.$sano;
	mysql_free_result($rs);
	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
	if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
	if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
	if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
	if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
	if (isset($_POST["sumbv"])){$tot_bv=$_POST["sumbv"];}else{$tot_bv="";}
	if (isset($_POST["sumfv"])){$tot_fv=$_POST["sumfv"];}else{$tot_fv="";}
	if (isset($_POST["radsend"])){$radsend=$_POST["radsend"];}else{$radsend="";}
	if (isset($_POST["txtoption"])){$txtoption=$_POST["txtoption"];}else{$txtoption="";}

	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
	if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
	if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
	if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
	if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
	if (isset($_POST["sumweight"])){$tot_weight=$_POST["sumweight"];}else{$tot_weight="";}
	if (isset($_POST["sumfv"])){$tot_fv=$_POST["sumfv"];}else{$tot_fv="";}
	if (isset($_POST["radsend"])){$radsend=$_POST["radsend"];}else{$radsend="";}
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

	
	if (isset($_POST["selectdate"])){$selectdate=$_POST["selectdate"];}else{$selectdate="";}
	if (isset($_POST["caddress"])){$caddress=$_POST["caddress"];}else{$caddress="";}
	if (isset($_POST["cprovince"])){$cprovince=$_POST["cprovince"];}else{$cprovince="";}
	if (isset($_POST["camphur"])){$camphur=$_POST["camphur"];}else{$camphur="";}
	if (isset($_POST["cdistrict"])){$cdistrict=$_POST["cdistrict"];}else{$cdistrict="";}
	if (isset($_POST["czip"])){$czip=$_POST["czip"];}else{$czip="";}
	if (isset($_POST["chkaddress"])){$chkaddress=$_POST["chkaddress"];}else{$chkaddress="0";}
}
if($_GET['state']==0){
	//$mid = ++$sano;
	logtext(true,$_SESSION['usercode'],'เพิ่มบิล',$mid);
	$sql = "SELECT pos_cur,name_t,caddress,czip,cdistrictId,camphurId,cprovinceId from ".$dbprefix."member WHERE mcode='$mcode' ";
	$rs = mysql_query($sql);
	$pos_old = '';
	if(mysql_num_rows($rs)>0) {
		$pos_old = mysql_result($rs,0,'pos_cur');
		$name_t = mysql_result($rs,0,'name_t');
		if($chkaddress != '1'){
			$caddress = '';
			$czip = '';
			$cdistrictId = '';
			$camphurId = '';
			$cprovinceId = '';
		}
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

$tot_old = $total;
if($radsend == '1'){
	if($tot_pv < 1500){//Send-Fee
		if($cprovinceId == '1' or $cprovinceId == '2' or $cprovinceId == '3' or $cprovinceId == '4')$total = $total+100;
		else $total = $total+150;
		$tot_weight = $tot_weight-5;
		if($tot_weight >0)$total = $total+70*ceil($tot_weight);
	}else if($tot_pv >= 1500 and $tot_pv<2499){
		$tot_weight = $tot_weight-5;
		if($tot_weight >0)$total = $total+70*ceil($tot_weight);
	}else if($tot_pv >= 2500 and $tot_pv<4499){
		$tot_weight = $tot_weight-10;
		if($tot_weight >0)$total = $total+70*ceil($tot_weight);
	}else if($tot_pv >= 4500){
		$tot_weight = $tot_weight-20;
		if($tot_weight >0)$total = $total+70*ceil($tot_weight);
	}
	$stot_weight = 70*ceil($tot_weight);
}
//echo $total.'dd'.$showewallet1;

if($_GET['state']==0){
		//$mid = ++$sano;
		logtext(true,$_SESSION['usercode'],'เพิ่มบิล',$mid);
		 $sql="insert into ".$dbprefix."atoasaleh (id,  sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv,tot_weight,tot_fv, uid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
		optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther,trnf,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,online,checkportal,hpv,htotal,selectdate ) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv','$tot_weight','$tot_fv' ,'".$_SESSION['usercode']."','$radsend','$txtoption','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','$chkInternet','$chkDiscount','$chkOther','$txtCash','$txtFuture',
		'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$txtInternet','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','$trnf','$name_t','$caddress','$cdistrictId','$camphurId','$cprovinceId','$czip','1','3','$tot_pv','$total','$selectdate') ";

			logtext(true,$_SESSION['usercode'],'ewallet',$total);
		//====================LOG===========================
	$text="uid=".$_SESSION["usercode"]." action=saleoperate =>$sql";
	writelogfile($text);
	//=================END LOG===========================
		mysql_query($sql);
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
				$sql="SELECT weight FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0)
				{
					for($m=0;$m<mysql_num_rows($rs);$m++){
						
						$sqlObj = mysql_fetch_object($rs);
						$weight[$i] =$sqlObj->weight;	
					}
				}else{
					$sql="SELECT weight FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
					$rs = mysql_query($sql);
					if(mysql_num_rows($rs) > 0)
					{
						$sqlObj = mysql_fetch_object($rs);
						$weight[$i] =$sqlObj->weight;	
					}
				}
			$sql="insert into ".$dbprefix."atoasaled (sano,pcode,pdesc,price,pv,weight,fv,qty,amt,inv_code) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$weight[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code') ";
			//====================LOG===========================
	$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
	writelogfile($text);
	//=================END LOG===========================
			//echo $sql."<br />";
			mysql_query($sql);
		}
		
		//updatePos($dbprefix,$mcode,$sadate);
	}
}
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=144'</script>";	

?>
