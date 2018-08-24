<? 
session_start();
if($_SESSION["perbuy"] == 0){
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=138&state=2'</script>";
exit;
}
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require("adminchecklogin.php");
require_once("global.php");
require_once("gencode.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){

	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["ewallet"])){$ewallet=$_POST["ewallet"];}else{$ewallet="0";}
	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code='';}
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
	if (isset($_POST["inv_ref"])){$inv_ref=$_POST["inv_ref"];}else{$inv_ref=$GLOBALS["main_inv_code"];}
	if (isset($_POST["txtoption"])){$txtoption=$_POST["txtoption"];}else{$txtoption="";}


}
if($_GET['state']==0){
	$sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM ".$dbprefix."isaleh   ";
	$rs = mysql_query($sql);
	$mid = mysql_result($rs,0,'id')+1;
	$sano = gencodesale('I','isaleh');
	mysql_free_result($rs);
	$mid = ++$mid;


	$sql = "SELECT inv_desc,address,districtId,	amphurId,provinceId,zip from ".$dbprefix."invent WHERE inv_code='$inv_code' ";
	$rs = mysql_query($sql);
	$pos_old = '';
	if(mysql_num_rows($rs)>0) {
		$name_t = mysql_result($rs,0,'inv_desc');
		if($radsend == '1'){
			$caddress = mysql_result($rs,0,'address');
			$cdistrictId = mysql_result($rs,0,'districtId');
			$camphurId = mysql_result($rs,0,'amphurId');
			$cprovinceId = mysql_result($rs,0,'provinceId');
			$czip = mysql_result($rs,0,'zip');
		}
	}
	mysql_free_result($rs);


	$arr_invent = searchbranch($dbprefix,$inv_code);
	$barr_invent = searchlocationbase($dbprefix,$arr_invent["locationbase"]);
	
	$bprice = $barr_invent["crate"]*$total;
	logtext(true,$_SESSION['admininvent'],'เพิ่มบิล ID '.$mid.' สาขา : '.$inv_code,$mid);
	if(empty($chkInternet))$txtInternet = 0;
	 $sql="insert into ".$dbprefix."isaleh (id,  sano, sadate,  mcode,  sa_type, inv_code, inv_from, total, tot_pv,tot_bv,tot_fv, uid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
	optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther ,checkportal,locationbase,crate,bprice,mbase,lid,name_f,name_t,caddress,cdistrictId,camphurId,cprovinceId,czip) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$inv_ref' ,'$total' ,'$tot_pv','$tot_bv','$tot_fv' ,'".$_SESSION['inv_usercode']."','$radsend','$txtoption','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','$chkInternet','$chkDiscount','$chkOther','$txtCash','$txtFuture',
	'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$txtInternet','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther','2','".$arr_invent["locationbase"]."','".$barr_invent["crate"]."','$bprice','".$arr_invent["locationbase"]."','".$_SESSION["admininvent"]."','$name_f','$name_t','$caddress','$cdistrictId','$camphurId','$cprovinceId','$czip') ";
	//echo $sql;
	//exit;


	//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=isaleoperate =>$sql";
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
	$bprice = "";
	$bprice = array();
	
	for($i=0;$i<sizeof($pcode);$i++){
		
		$sql="SELECT weight,bprice FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0)
		{
			$sqlObj = mysql_fetch_object($rs);
			$weight[$i] =$sqlObj->weight;	
			$bprice[$i] =$sqlObj->bprice;	
		}

		$sql="insert into ".$dbprefix."isaled (sano,pcode,pdesc,price,bprice,pv,bv,fv,qty,amt,inv_code,uidbase,locationbase) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$bprice[$i]' ,'$pv[$i]','$bv[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code','1','".$arr_invent["locationbase"]."') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
	}
	//minusEwallet($dbprefix,$inv_code,$txtInternet);
	$bewallet = $barr_invent["crate"]*$txtInternet;
	if($txtInternet > 0)updateEwallet($dbprefix,$inv_code,$txtInternet,$bewallet);
	$bvoucher = $barr_invent["crate"]*$txtFuture;
	if($txtFuture > 0)updateVoucher($dbprefix,$inv_code,$txtFuture,$bewallet);

}else if($_GET['state']==1){
}
$_SESSION["perbuy"] = 0;
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=138'</script>";	
function minusEwallet($dbprefix,$inv_code,$total){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	 $sql = "update ".$dbprefix."invent set ewallet = ewallet-$total WHERE inv_code='$inv_code' ";
	//exit;
	$_SESSION["inv_ewallet"] = 	$_SESSION["inv_ewallet"]-$total;
	$rs = mysql_query($sql);
}
function updateEwallet($dbprefix,$inv_code,$txtInternet,$bewallet){
	$sql3 = "update ".$dbprefix."invent set ewallet = ewallet-$txtInternet,bewallet = bewallet-$bewallet where inv_code = '$inv_code' ";
	$rs3=mysql_query($sql3);
} 
?>