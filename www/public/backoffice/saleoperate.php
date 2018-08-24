<? 
session_start();
if($_SESSION["perbuy"] == 0){
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=6'</script>";
exit;
}
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){

	//echo $sano.'<br>';
	//exit;
	
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
			if (isset($_POST["cprovince"])){$cprovinceId=$_POST["cprovince"];}else{$cprovinceId="";}
			if (isset($_POST["camphur"])){$camphurId=$_POST["camphur"];}else{$camphurId="";}
			if (isset($_POST["cdistrict"])){$cdistrictId=$_POST["cdistrict"];}else{$cdistrictId="";}
			if (isset($_POST["czip"])){$czip=$_POST["czip"];}else{$czip="";}
			if (isset($_POST["chkaddress"])){$chkaddress=$_POST["chkaddress"];}else{$chkaddress="0";}

}




	$selectch = "select name_f from  ".$dbprefix."member where mcode = '$mcode'";
	$rsch = mysql_query($selectch);
	$name_f = mysql_result($rsch,0,'name_f');

/*	if($name_f == 'ห้างหุ้นส่วนจำกัด' or $name_f == 'บริษัทจำกัด' )$sano_f = 'IV1';
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
	$sql = "SELECT MAX(id) AS id  FROM ".$dbprefix."asaleh   ";
	$rs = mysql_query($sql);
	$mid = mysql_result($rs,0,'id')+1;

	$sano = gencodesale();
//echo $sano;
//exit;

$sql = "SELECT pos_cur,name_t,caddress,czip,cdistrictId,camphurId,cprovinceId from ".$dbprefix."member WHERE mcode='$mcode' ";
$rs = mysql_query($sql);
$pos_old = '';
if(mysql_num_rows($rs)>0) {
	$pos_old = mysql_result($rs,0,'pos_cur');
	$name_t = mysql_result($rs,0,'name_t');
	/*if($chkaddress == '1'){
		$caddress = mysql_result($rs,0,'caddress');
		$czip = mysql_result($rs,0,'czip');
		$cdistrictId = mysql_result($rs,0,'cdistrictId');
		$camphurId = mysql_result($rs,0,'camphurId');
		$cprovinceId = mysql_result($rs,0,'cprovinceId');
		//$caddress = '';
		//$czip = '';
		//$cdistrictId = '';
		//$camphurId = '';
		//$cprovinceId = '';
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

$tot_weight = $tot_weight+0.1;

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
}

if($_GET['state']==0){
//var_dump($_POST);
//exit;

if($chkDiscount == 'on')$tot_pv = 0;
	$chdate = explode('-',date("Y-m-15", strtotime("+1 months")));
	$hdate = $chdate[0].'-'.$chdate[1].'-20';
		$hdate = date('Y-m-t');
	//$chdate = explode('-',$sadate);
	logtext(true,$_SESSION['adminusercode'],'เพิ่มบิล',$mid);
	if(empty($chkInternet))$txtInternet = 0;
	 $sql="insert into ".$dbprefix."asaleh (id,  sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv,tot_weight,tot_fv, uid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
	optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther,trnf,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip,hpv,htotal,hdate,checkportal) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv','$tot_weight','$tot_fv' ,'".$_SESSION['adminusercode']."','$radsend','$txtoption','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','$chkInternet','$chkDiscount','$chkOther','$txtCash','$txtFuture',
	'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$txtInternet','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','$trnf','$name_t','$caddress','$cdistrictId','$camphurId','$cprovinceId','$czip','$tot_pv','$total','$hdate','1') ";

	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=saleoperate =>$sql";
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
			$sql="SELECT weight,unit FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				for($m=0;$m<mysql_num_rows($rs);$m++){
					
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$unit[$i] =$sqlObj->unit;	
				}
			}else{
				$sql="SELECT weight,unit FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$unit[$i] =$sqlObj->unit;	
				}
			}

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

		$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,weight,fv,qty,amt,inv_code,unit) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$weight[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code','$unit[$i]') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		if(empty($inv_code))minusProduct($dbprefix,$pcode[$i],$_SESSION['adminusercode'],$qty[$i],$sano);
		else minusProduct1($dbprefix,$pcode[$i],$inv_code,$qty[$i],$sano,$_SESSION['adminusercode']);
	}
	updateEwallet($dbprefix,$mcode,$txtInternet);
	if($satype != 'H')updatePos($dbprefix,$mcode,$sadate,$tot_pv);
}else if($_GET['state']==1){
	logtext(true,$_SESSION['adminusercode'],'แก้ไขบิล',$id);
	if(empty($chkInternet))$txtInternet = 0;
	updateEwallet1($dbprefix,$mcode,$txtInternet,$id);


	$sql="update ".$dbprefix."asaleh set  id='$id', ";
	$sql.="mcode='$mcode' ,sa_type='$satype' ,sadate='$sadate' , inv_code='$inv_code', total='$total', tot_pv='$tot_pv', tot_weight='$tot_weight', tot_fv='$tot_fv' ,send='$radsend', txtoption='$txtoption'
	, chkCash='$chkCash', txtCash='$txtCash', optionCash='$optionCash'
	, chkFuture='$chkFuture', txtFuture='$txtFuture', optionFuture='$optionFuture'
	, chkTransfer='$chkTransfer', txtTransfer='$txtTransfer', optionTransfer='$optionTransfer'
	, chkCredit1='$chkCredit1', txtCredit1='$txtCredit1', optionCredit1='$optionCredit1'
	, chkCredit2='$chkCredit2', txtCredit2='$txtCredit2', optionCredit2='$optionCredit2'
	, chkCredit3='$chkCredit3', txtCredit3='$txtCredit3', optionCredit3='$optionCredit3'
	, chkInternet='$chkInternet', chkDiscount='$chkDiscount', txtInternet='$txtInternet'
	, txtDiscount='$txtDiscount', optionInternet='$optionInternet', optionDiscount='$optionDiscount'
	, txtOther='$txtOther', optionOther='$optionOther', chkOther='$chkOther', name_t='$name_t', caddress='$caddress', cdistrictId='$cdistrictId', camphurId='$camphurId', cprovinceId='$cprovinceId', czip='$czip'
	where id= '$id' ";
	//echo $sql;
	//exit;
	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
	$sql = "select * from ".$dbprefix."asaled where sano='$sano'";
	$result = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($result);$i++){
		$data = mysql_fetch_object($result);
		$pcode =$data->pcode;
		$qty =$data->qty;
		$inv_codeold =$data->inv_code;
		plusProduct($dbprefix,$pcode,$_SESSION['adminusercode'],$qty);
	}
	mysql_query("DELETE FROM ".$dbprefix."asaled WHERE sano='$id'");
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
		$sql="SELECT weight,unit FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				for($m=0;$m<mysql_num_rows($rs);$m++){
					
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$unit[$i] =$sqlObj->unit;	
				}
			}else{
				$sql="SELECT weight,unit FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight[$i] =$sqlObj->weight;	
					$unit[$i] =$sqlObj->unit;	
				}
			}
		$sql="insert into ".$dbprefix."asaled (sano,pcode,pdesc,price,pv,weight,fv,qty,amt,inv_code,unit) values ('$id','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$weight[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code','$unit[$i]') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		minusProduct($dbprefix,$pcode[$i],$_SESSION['adminusercode'],$qty[$i]);
	}
}

	/////// send to address  ///////
	if($radsend == '1'){
		if($tot_pv < 1500){//Send-Fee
			if($cprovinceId == '1' or $cprovinceId == '2' or $cprovinceId == '3' or $cprovinceId == '4'){
				/// กรุงเทพ นนทบุรี ปทุมธานี สมุทรปราการ

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

		

$_SESSION["perbuy"] = 0;
echo "<script language='JavaScript'>window.open('invoice_aprint_sale.php?bid=".$mid."');window.location='index.php?sessiontab=3&sub=6&sanoo=".$mid."&chkprint=1';</script>";	
//echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=6';</script>";	
exit;
?>

<?
function minusProduct1($dbprefix,$pcode,$invent,$qty,$sano,$uid){

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
				  values('$sano','Head Office','$invent','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','คีย์รับที่สาขา','$uid')";
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
				  values('$sano','Head Office','$invent','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','คีย์รับที่สาขา','$uid')";
				mysql_query($sql);



			$sql = "select * from ".$dbprefix."product_invent  where pcode='$pcode' and inv_code = '$invent'";
			$rs1 = mysql_query($sql);
			if(mysql_num_rows($rs1) > 0) $sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
			else $sql = "insert into ".$dbprefix."product_invent(pcode,qty,inv_code) values('$pcode','-$qty','$invent')";
			mysql_query($sql);

		}
}

function minusProduct($dbprefix,$pcode,$invent,$qty,$sano){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	//$pcode1 = explode('_',$pcode);
	//if($pcode1[0] == 'PD'){

	//$ewallet_after = $ewallet_before-$total;
	

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
				  values('$sano','Head Office','Head Office','$pcode2','$qty_before','-$qty2','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','บิลขาย','$invent')";
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
			  values('$sano','Head Office','Head Office','$pcode','$qty_before','-$qty','$qty_after','".date('Y-m-d')."','".date('H:i:s')."','บิลขาย','$invent')";
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