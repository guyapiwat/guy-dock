<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once ("function.log.inc.php");
require_once ("checklogin.php");
include_once("wording".$_SESSION["lan"].".php");
	exit;
if(isset($_GET['state'])){
	/*$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."asaleh ";
	$rs = mysql_query($sql);
	$mid = $sano = mysql_result($rs,0,'id');*/
	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
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

			if (isset($_POST["caddress"])){$caddress=$_POST["caddress"];}else{$caddress="";}
			if (isset($_POST["cprovince"])){$cprovince=$_POST["cprovince"];}else{$cprovince="";}
			if (isset($_POST["camphur"])){$camphur=$_POST["camphur"];}else{$camphur="";}
			if (isset($_POST["cdistrict"])){$cdistrict=$_POST["cdistrict"];}else{$cdistrict="";}
			if (isset($_POST["czip"])){$czip=$_POST["czip"];}else{$czip="";}
			if (isset($_POST["chkaddress"])){$chkaddress=$_POST["chkaddress"];}else{$chkaddress="0";}

}

	/*$selectch = "select name_f from  ".$dbprefix."member where mcode = '$mcode'";
	$rsch = mysql_query($selectch);
	$name_f = mysql_result($rsch,0,'name_f');

	if($name_f == '��ҧ�����ǹ�ӡѴ' or $name_f == '����ѷ�ӡѴ' )$sano_f = 'IV1';
	else $sano_f = 'IV2';
	$pcode=$_POST['pcode'];
	for($i=0;$i<sizeof($pcode);$i++){
		$sql="SELECT weight FROM ".$dbprefix."product where pcode = '".$pcode[$i]."' and group_id ='2' ";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0)
		{
			$sano_f = 'IV3';
		}
	}*/

	$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."asaleh   ";
	$rs = mysql_query($sql);
	$mid = mysql_result($rs,0,'id')+1;

	$sano = gencodesale1();

//echo $sano;
//exit;
$cprovinceId = $cprovince;
$sql = "SELECT pos_cur,name_t,caddress,czip,cdistrictId,camphurId,cprovinceId from ".$dbprefix."member WHERE mcode='$mcode' ";
$rs = mysql_query($sql);
$pos_old = '';
if(mysql_num_rows($rs)>0) {
	$pos_old = mysql_result($rs,0,'pos_cur');
	$name_t = mysql_result($rs,0,'name_t');
/*	if($chkaddress == '1'){
		$caddress = mysql_result($rs,0,'caddress');
		$czip = mysql_result($rs,0,'czip');
		$cdistrictId = mysql_result($rs,0,'cdistrictId');
		$camphurId = mysql_result($rs,0,'camphurId');
		$cprovinceId = mysql_result($rs,0,'cprovinceId');
	}*/
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
	$inv_code = "";
}


//echo $total.'dd'.$showewallet1;
//exit;
if($total > $showewallet1){
	$stotal = $total-$tot_old;
echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["7"]." ".$stotal."".$wording_lan["operate"]["13"]."');window.location='index.php?sessiontab=4&sub=1&state=2'</script>";	
//			echo "<script language='JavaScript'>alert('ewallet �����§�� �դ�ҡ�èѴ�� ".$stot_weight." �ҷ');'</script>";	
exit;}

if($_GET['state']==0){
	//$mid = ++$sano;
	logtext(true,$_SESSION['usercode'],$wording_lan["operate"]["5"],$mid);
    	$hdate = date("Y-m", strtotime("+1 months")).'-20';

	 $sql="insert into ".$dbprefix."asaleh (id,  sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv,tot_weight,tot_fv, uid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
	optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther,trnf,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,online,checkportal,hpv,htotal,hdate ) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv','$tot_weight','$tot_fv' ,'".$_SESSION['usercode']."','$radsend','$txtoption','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','1','$chkDiscount','$chkOther','$txtCash','$txtFuture',
	'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$total','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','$trnf','$name_t','$caddress','$cdistrict','$camphur','$cprovince','$czip','1','3','$tot_pv','$total','$hdate') ";

	minusEwallet($dbprefix,$_SESSION['usercode'],$total);
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
		$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,weight,fv,qty,amt,inv_code) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$weight[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		
		if($pcode[$i] == '0002'){
			$selectch = "select id as id,mdate from  ".$dbprefix."member where mcode = '$mcode'";
			$rsch = mysql_query($selectch);
			$idi = mysql_result($rsch,0,'id');
			$mdate = mysql_result($rsch,0,'mdate');
			$select = "SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate where mid='$idi' GROUP BY mid";
			$rs = mysql_query($select);
			if(mysql_num_rows($rs) > 0)	$exp_date = mysql_result($rs,0,'exp_date');
			if(empty($exp_date))$exp_date = $mdate;
			$sql = "INSERT INTO ".$dbprefix."expdate (mid,exp_date,date_change) VALUES('".$idi."',ADDDATE('".$exp_date."', INTERVAL 1 YEAR),'".date("Y-m-d")."')";
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

/*		if(!empty($inv_code)){
			minusProduct1($dbprefix,$pcode[$i],$inv_code,$qty[$i]);
		}else{
			minusProduct($dbprefix,$pcode[$i],$inv_code,$qty[$i]);
		}*/
	}
	if($satype != 'H')updatePos($dbprefix,$mcode,$sadate,$tot_pv);
}else if($_GET['state']==1){
	logtext(true,$_SESSION['usercode'],$wording_lan["tab1_10"],$mid);
	$sql="update ".$dbprefix."asaleh set sano='$id', id='$id', ";
	$sql.="mcode='$mcode' ,sa_type='$satype' ,sadate='$sadate' , inv_code='$inv_code', total='$total', tot_pv='$tot_pv', tot_bv='$tot_bv', tot_fv='$tot_fv' ,send='$radsend', txtoption='$txtoption' where id= '$id' ";
	//====================LOG===========================
$text="uid=".$_SESSION["usercode"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
	$sql = "select * from ".$dbprefix."asaled where sano='$id'";
	$result = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($result);$i++){
		$data = mysql_fetch_object($result);
		$pcode =$data->pcode;
		$qty =$data->qty;
		$inv_codeold =$data->inv_code;
		plusProduct($dbprefix,$pcode,$_SESSION['usercode'],$qty);
		minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
	}
	mysql_query("DELETE FROM ".$dbprefix."asaled WHERE sano='$id'");
	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$pv=$_POST['bv'];
		$pv=$_POST['fv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}
	for($i=0;$i<sizeof($pcode);$i++){
		$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,bv,fv,qty,amt) values ('$id','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$bv[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]') ";
		//====================LOG===========================
$text="uid=".$_SESSION["usercode"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		minusProduct($dbprefix,$pcode[$i],$_SESSION['usercode'],$qty[$i]);
		if($satype == "I"){
			$sql = "SELECT * from ".$dbprefix."product_invent  WHERE pcode='$pcode[$i]' and inv_code = '$inv_code' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				plusProduct1($dbprefix,$pcode[$i],$inv_code,$qty[$i]);
			}else{
				$sql="insert into ".$dbprefix."product_invent (pcode,qty,ud,inv_code) values ('$pcode[$i]','$qty[$i]','".$_SESSION['usercode']."','$inv_code') ";
				mysql_query($sql);
			}
		}
	}
	//updatePos($dbprefix,$mcode,$sadate);
}

	/////// send to address  ///////
	if($radsend == '1'){
		if($tot_pv < 1500){//Send-Fee
			if($cprovinceId == '1' or $cprovinceId == '2' or $cprovinceId == '3' or $cprovinceId == '4'){
				$totalprice = 100;
				$pcode = "0004";
			}
			else {
				$totalprice = 150;
				$pcode = "0005";
			}
			$qty=1;
			keysend($dbprefix,$mid,$pcode,$inv_code,$qty,$weight,$totalprice);
			//$tot_weight = $tot_weight-5;
			$qty = ceil($tot_weight);
			if($tot_weight >0)
			{
				$totalprice = 70*$qty;
				$pcode = "0006";
			}
			
		}else if($tot_pv >= 1500 and $tot_pv<2499){
			//$tot_weight = $tot_weight-5;
			$qty = ceil($tot_weight);
			if($tot_weight >0){
				$totalprice = 70*$qty;
				$pcode = "0006";
			}

		}else if($tot_pv >= 2500 and $tot_pv<4499){
			//$tot_weight = $tot_weight-10;
			$qty = ceil($tot_weight);
			if($tot_weight >0){
				$totalprice = 70*$qty;
				$pcode = "0006";
			}
		}else if($tot_pv >= 4500){
			//$tot_weight = $tot_weight-20;
			$qty = ceil($tot_weight);
			if($tot_weight >0){
				$totalprice = 70*$qty;
				$pcode = "0006";
			}
		}
		if($tot_weight >0)keysend($dbprefix,$mid,$pcode,$inv_code,$qty,$tot_weight,$totalprice);
	}
	/////// send to address ////////



echo "<script language='JavaScript'>window.open('invoice_aprint.php?bid=".$mid."', '','height=500,width=1000,resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,location=yes');window.location='index.php?sessiontab=4&sub=1';</script>";	
exit;

?>

<?

function minusEwallet($dbprefix,$mcode,$total){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	 $sql = "update ".$dbprefix."member set ewallet = ewallet-$total WHERE mcode='$mcode' ";
	//exit;
	$_SESSION["ewallet"] = 	$_SESSION["ewallet"]-$total;
	$rs = mysql_query($sql);
}


function plusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
	$rs = mysql_query($sql);
}
function plusProduct1($dbprefix,$pcode,$invent,$qty){
	$sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	$rs = mysql_query($sql);
	//$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
//	$rs = mysql_query($sql);
}
function gettotalpv($dbprefix,$mcode){
	$sql3 = "select mcode, SUM(tot_pv) AS tot_pv from ".$dbprefix."special_point WHERE  sa_type='VA' AND mcode='$mcode' group by mcode ";
				//if($mcode == '0000075')echo "$sql3<BR>";
				$rs3=mysql_query($sql3);
				if (mysql_num_rows($rs3)>0) {
					$sqlObj3 = mysql_fetch_object($rs3);
					$total_fv3= $sqlObj3->tot_pv;
				}else{
					$total_fv3=0;
				}
				mysql_free_result($rs3);
				//if($mcode == '0000075')echo "$total_fv3<BR>";
	return $total_fv3;
} 

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
		//-----�纤�ṹ�٧�ش����ա�ë���
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
			$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and sadate like '%".date("Y-m")."%' and cancel=0 ";
		//echo $sql.'<br>';
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		//mysql_free_result($rs);

		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode."' and sa_type='A' and sadate like '%".date("Y-m")."%'  and cancel=0 ";
		$rs = mysql_query($sql);
		//echo $sql.'<br>';
		$mexph = 0;
		if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
		mysql_free_result($rs);
		$mexp=($mexp+$mexph);
		//$mexp = $tot_pv;
	}
//exit;
	//-----�纵��˹觻Ѩ�غѹ
	//mysql_free_result($rs);
	//�ӹǳ���˹�
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
 $startdatec=strtotime($startdate); // ������ͤ������Թҷ�
 $tod=$datenum*86400; // �Ѻ�ӹǹ�ѹ�Ҥٳ�Ѻ�Թҷյ���ѹ
 $ndate=$startdatec+$tod; // �Ѻ�ǡ��ա����ӹǹ�ѹ����Ѻ��
 return $ndate; // �觤�ҡ�Ѻ
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
				  values('$sano','$inv_code','$invent','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','".$wording_lan["tab4"]["7_18"]."','$uid')";
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
				  values('$sano','$inv_code','$invent','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','�����Ѻ����Ң�','$uid')";
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
				  values('$sano','$invent','Head Office','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','��Ţ��','$uid')";
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
			  values('$sano','$invent','Head Office','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','��Ţ��','$uid')";
			mysql_query($sql);

			$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
			mysql_query($sql);


		}



}

?>