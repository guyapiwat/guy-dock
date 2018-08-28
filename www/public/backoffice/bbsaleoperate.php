<? 
session_start();

 //exit;
if($_SESSION["perbuy"] == 0){
//echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=138'</script>";
//exit;
}
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
//require_once("logtext.php");
require_once ("function.log.inc.php");
require_once("gencode.php");
require_once("global.php");
require("adminchecklogin.php");

if(isset($_GET['state'])){
	$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."istockh ";
	$rs = mysql_query($sql);
	$mid = $sano = mysql_result($rs,0,'id');
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
	if (isset($_POST["mapping_code"])){$mapping_code=$_POST["mapping_code"];}else{$mapping_code="";}
	if (isset($_POST["rccode"])){$rccode=$_POST["rccode"];}else{$rccode="";}


}
//var_dump($_SESSION);
//exit;
if($_GET['state']==0){
	$satype = 'BRHO';
	$mid = ++$sano;
	//logtext(true,$_SESSION['adminuserid'],'โอนบิล ศูนย์ : '.$sano,$mid);
	//
		if(empty($chkInternet))$txtInternet = 0;
//บอSใช้เลขsubinventory56110001
//ทุกสาขา run ต่อเนื้องกันหมด

$subinvent = $_SESSION["subinvent"];
$inv_ref = 'HQ';
$inv_code = $_SESSION["admininvent"];
$sano_f = 'บรS';
$sano  = gencode_bbsale($dbprefix,$subinvent,$sano_f);

//echo $sano;
//exit;
	$sql="insert into ".$dbprefix."istockh (id,  sano, sadate,  sa_type, inv_code,inv_coden,inv_ref,inv_refn,  total, tot_pv,uid,txtoption,mapping_code ,rccode,rrcode) values ('$mid' ,'$sano' ,'$sadate' ,'$satype' ,'$inv_ref','".$_SESSION["adminusername"]."','$inv_ref' ,'{$_SESSION["adminusername"]}' ,'$total' ,'$tot_pv','".$_SESSION['adminusercode']."','$txtoption','$mapping_code','$rccode','$rccode') ";


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
	//var_dump($pcode);
	//var_dump($inv_code);
	//exit;
	for($i=0;$i<sizeof($pcode);$i++){
	$sql="insert into ".$dbprefix."istockd (sano,pcode,pdesc,price,pv,qty,amt,inv_code,inv_ref) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$qty[$i]','$totalprice[$i]','".$inv_ref."','$inv_ref') ";
	$rs = mysql_query($sql);
		//updatestockcard($dbprefix,$mcode,$inv_code,$inv_ref,$sano,$sanox,$sadate,$rccode,$satype,$pcode[$i],$uid,$qty[$i],$price[$i],$totalprice[$i]);
		//calc_plusProduct($dbprefix,$pcode[$i],$inv_ref,$qty[$i],$sano,$_SESSION['inv_usercode'],'0');
		//updatestockcard($dbprefix,$_SESSION['adminusercode'],'',$inv_ref,$sano,$sanox,$sadate,$rccode,$satype,$pcode[$i],$_SESSION['adminusercode'],$qty[$i],$price[$i],$totalprice[$i]);
		//calc_plusProduct($dbprefix,$pcode[$i],'',$qty[$i],$sano,$_SESSION['adminusercode'],'0'); 

	}
		$object_stocks = new stocks ();
		$object_stocks->set_data($mid,"istock","receive","1"); 
		//====================LOG===========================
			$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
			//writelogfile($text);
	//updateEwallet($dbprefix,$mcode,$txtInternet);
	//updatePos($dbprefix,$mcode,$sadate);
}else if($_GET['state']==1){
	echo "NO";exit;
	logtext(true,$_SESSION['adminusercode'],'แก้ไขบิล',$id);
	if(empty($chkInternet))$txtInternet = 0;
	//updateEwallet1($dbprefix,$mcode,$txtInternet,$id);
	$sql="update ".$dbprefix."istockh set sano='$id', id='$id', ";
	$sql.="mcode='$mcode' ,sa_type='$satype' ,sadate='$sadate' , inv_code='$inv_code', total='$total', tot_pv='$tot_pv', tot_bv='$tot_bv', tot_fv='$tot_fv' ,send='$radsend', txtoption='$txtoption'
	, chkCash='$chkCash', txtCash='$txtCash', optionCash='$optionCash'
	, chkFuture='$chkFuture', txtFuture='$txtFuture', optionFuture='$optionFuture'
	, chkTransfer='$chkTransfer', txtTransfer='$txtTransfer', optionTransfer='$optionTransfer'
	, chkCredit1='$chkCredit1', txtCredit1='$txtCredit1', optionCredit1='$optionCredit1'
	, chkCredit2='$chkCredit2', txtCredit2='$txtCredit2', optionCredit2='$optionCredit2'
	, chkCredit3='$chkCredit3', txtCredit3='$txtCredit3', optionCredit3='$optionCredit3'
	, chkInternet='$chkInternet', chkDiscount='$chkDiscount', txtInternet='$txtInternet'
	, txtDiscount='$txtDiscount', optionInternet='$optionIntetnet', optionDiscount='$optionDiscount'
	, txtOther='$txtOther', optionOther='$optionOther', chkOther='$chkOther'
	where id= '$id' ";
	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=saleoperate =>$sql";
//writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
	$sql = "select * from ".$dbprefix."istockd where sano='$id'";
	$result = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($result);$i++){
		$data = mysql_fetch_object($result);
		$pcode =$data->pcode;
		$qty =$data->qty;
		$inv_codeold =$data->inv_code;
		plusProduct($dbprefix,$pcode,$_SESSION['adminusercode'],$qty);
		minusProduct($dbprefix,$pcode,$inv_codeold,$qty);
	}
	mysql_query("DELETE FROM ".$dbprefix."istockd WHERE sano='$id'");
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
		$sql="insert into ".$dbprefix."istockd (sano,pcode,pdesc,price,pv,bv,fv,qty,amt) values ('$id','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$bv[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=saleoperate =>$sql";
//writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		minusProduct($dbprefix,$pcode[$i],$_SESSION['adminusercode'],$qty[$i]);
		if($satype == "I"){
			$sql = "SELECT * from ".$dbprefix."product  WHERE pcode='$pcode[$i]' and inv_code = '$inv_code' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				plusProduct($dbprefix,$pcode[$i],$inv_code,$qty[$i]);
			}else{
				$sql="insert into ".$dbprefix."product (pcode,qty,ud,inv_code) values ('$pcode[$i]','$qty[$i]','".$_SESSION['adminusercode']."','$inv_code') ";
				mysql_query($sql);
			}
		}
	}
	//updatePos($dbprefix,$mcode,$sadate);
}
$_SESSION["perbuy"] = 0;
echo "<script language='JavaScript'>window.location='index.php?sessiontab=6&sub=23'</script>";	

?>

<?
function minusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	$pcode1 = explode('-',$pcode);
	if($pcode1[0] == 'package'){
		 $sql="SELECT * FROM ".$dbprefix."product_package1 where package = '$pcode'";
		//exit;
		$rs = mysql_query($sql);
		//echo "$sql<BR>";
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$pcode2 =$sqlObj->pcode;	
				$qty =$sqlObj->qty*$qty;	
				$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
				$rs1 = mysql_query($sql);
			}
		}
	}else{
		$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
		$rs = mysql_query($sql);
	}
	
}
function minusProduct1($dbprefix,$pcode,$invent,$qty){
 $sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	
	$rs = mysql_query($sql);
	//$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
	//$rs = mysql_query($sql);
}
function plusProduct2($dbprefix,$pcode,$invent,$qty){
	  $sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//exit;
	$rs = mysql_query($sql);
	//$sql = "update".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
	//$rs = mysql_query($sql);
}
function plusProduct($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
	$rs = mysql_query($sql);
}
function plusProduct1($dbprefix,$pcode,$invent,$qty){
	$pcode1 = explode('-',$pcode);
	if($pcode1[0] == 'package'){
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
	//$sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
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
function updateEwallet($dbprefix,$mcode,$txtInternet){
	$sql3 = "update ".$dbprefix."member set ewallet = $txtInternet-ewallet where mcode = '$mcode' ";
	$rs3=mysql_query($sql3);
} 
function updateEwallet1($dbprefix,$mcode,$oldInternet,$id){
	$sql = "select * from ".$dbprefix."istockh where sano='$id'";
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
?>