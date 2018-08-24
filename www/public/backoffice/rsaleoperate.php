<? 
session_start();
if($_SESSION["perbuy"] == 0){
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=39'</script>";
exit;
}
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."rsaleh ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)>0){
		$mid = mysql_result($rs,0,'id')+1;
		$sano = mysql_result($rs,0,'sano')+1;
		mysql_free_result($rs);
	}
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
	//echo $sano.'<br>';
	//exit;
	
//	mysql_free_result($rs);
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


}
if($_GET['state']==0){
	//$mid = ++$sano;
	//echo $sano;
	//exit;
	logtext(true,$_SESSION['adminusercode'],'à¾ÔèÁºÔÅ¤×¹',$mid);
	$sql = "SELECT pos_cur from ".$dbprefix."member WHERE mcode='$mcode' ";
	$rs = mysql_query($sql);
	$pos_old = '';
	if(mysql_num_rows($rs)>0) $pos_old = mysql_result($rs,0,'pos_cur');
	mysql_free_result($rs);
	if(empty($chkInternet))$txtInternet = 0;
	 $sql="insert into ".$dbprefix."rsaleh (id,  sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv,tot_bv,tot_fv, uid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
	optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther,trnf ) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv','$tot_bv','$tot_fv' ,'".$_SESSION['adminusercode']."','$radsend','$txtoption','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','$chkInternet','$chkDiscount','$chkOther','$txtCash','$txtFuture',
	'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$txtInternet','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','$trnf') ";
	
	//echo $sql;
	//exit;
	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=rsaleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$bv=$_POST['bv'];
		$fv=$_POST['fv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}
	
	for($i=0;$i<sizeof($pcode);$i++){
	/*	if($pcode[$i] == 'BM-300' or $pos_old == 'CM'){
			$sql="update ".$dbprefix."member set pos_cur = 'BM' where mcode = '$mcode'";
		//====================LOG===========================
			$text="uid=".$_SESSION["adminuserid"]." action=rsaleoperate =>$sql";
			mysql_query($sql);
			//$sql = "INSERT INTO ".$dbprefix."calc_poschange (rcode,mcode,pos_before,pos_after,date_change) ";
			//$sql .= "VALUES('0','".$mcode."','CM','BM','".$sadate."')";
			//mysql_query($sql);
		}*/
		$sql="insert into ".$dbprefix."rsaled (sano,pcode,pdesc,price,pv,bv,fv,qty,amt,inv_code) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$bv[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=rsaleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		plusProduct($dbprefix,$pcode[$i],$_SESSION['adminusercode'],$qty[$i]);
		minusInvent($dbprefix,$pcode[$i],$inv_code,$qty[$i]);
	}
//	exit;
	updateEwallet($dbprefix,$mcode,$txtInternet);
	//updatePos($dbprefix,$mcode,$sadate);
}else if($_GET['state']==1){
	logtext(true,$_SESSION['adminusercode'],'á¡éä¢ºÔÅ¤×¹',$id);
	if(empty($chkInternet))$txtInternet = 0;
	updateEwallet1($dbprefix,$mcode,$txtInternet,$id);
	$sql="update ".$dbprefix."rsaleh set  id='$id', ";
	$sql.="mcode='$mcode' ,sa_type='$satype' ,sadate='$sadate' , inv_code='$inv_code', total='$total', tot_pv='$tot_pv', tot_bv='$tot_bv', tot_fv='$tot_fv' ,send='$radsend', txtoption='$txtoption'
	, chkCash='$chkCash', txtCash='$txtCash', optionCash='$optionCash'
	, chkFuture='$chkFuture', txtFuture='$txtFuture', optionFuture='$optionFuture'
	, chkTransfer='$chkTransfer', txtTransfer='$txtTransfer', optionTransfer='$optionTransfer'
	, chkCredit1='$chkCredit1', txtCredit1='$txtCredit1', optionCredit1='$optionCredit1'
	, chkCredit2='$chkCredit2', txtCredit2='$txtCredit2', optionCredit2='$optionCredit2'
	, chkCredit3='$chkCredit3', txtCredit3='$txtCredit3', optionCredit3='$optionCredit3'
	, chkInternet='$chkInternet', chkDiscount='$chkDiscount', txtInternet='$txtInternet'
	, txtDiscount='$txtDiscount', optionInternet='$optionInternet', optionDiscount='$optionDiscount'
	, txtOther='$txtOther', optionOther='$optionOther', chkOther='$chkOther'
	where id= '$id' ";
	//echo $sql;
	//exit;
	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=rsaleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
	$sql = "select * from ".$dbprefix."rsaled where sano='$sano'";
	$result = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($result);$i++){
		$data = mysql_fetch_object($result);
		$pcode =$data->pcode;
		$qty =$data->qty;
		$inv_codeold =$data->inv_code;
		minusProduct($dbprefix,$pcode,$_SESSION['adminusercode'],$qty);
		//minusInvent($dbprefix,$pcode,$inv_code,$qty);
	}
	mysql_query("DELETE FROM ".$dbprefix."rsaled WHERE sano='$id'");
	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$bv=$_POST['bv'];
		$fv=$_POST['fv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}
	for($i=0;$i<sizeof($pcode);$i++){
		$sql="insert into ".$dbprefix."rsaled (sano,pcode,pdesc,price,pv,bv,fv,qty,amt,inv_code) values ('$id','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$bv[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=rsaleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		plusProduct($dbprefix,$pcode[$i],$_SESSION['adminusercode'],$qty[$i]);
	}
}
$_SESSION["perbuy"] = 0;
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=39'</script>";	

?>

<?
function minusProduct($dbprefix,$pcode,$invent,$qty){
		 $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$pcode2 =$sqlObj->pcode;	
				$qty2 =$sqlObj->qty*$qty;	
				$sql = "update ".$dbprefix."product set qty = qty-$qty2 WHERE pcode='$pcode2' ";
				$rs1 = mysql_query($sql);
			}
		}else{
			$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
			$rs = mysql_query($sql);
		}
	
}
function minusInvent($dbprefix,$pcode,$invent,$qty){
		
		$sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE inv_code = '$invent' and pcode='$pcode' ";
		//echo $sql.'<br>';
		//exit;
		$rs = mysql_query($sql);
}
function plusInvent($dbprefix,$pcode,$invent,$qty){
		
		$sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE inv_code = '$invent' and pcode='$pcode' ";
		$rs = mysql_query($sql);
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
	$sql3 = "update ".$dbprefix."member set ewallet = $txtInternet-ewallet where mcode = '$mcode' ";
	$rs3=mysql_query($sql3);
} 
function updateEwallet1($dbprefix,$mcode,$oldInternet,$id){
	$sql = "select * from ".$dbprefix."rsaleh where sano='$id'";
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
//update µÓáË¹è§ áººäÁèÊÐÊÁ¤Ðá¹¹
?>