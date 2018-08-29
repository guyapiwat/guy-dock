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
if(empty($_SESSION["inv_ref"])){
echo "<script langquage='javascript'>
window.location='login.php';
</script>
";
exit;
}
require("adminchecklogin.php");
if(isset($_GET['state'])){
	$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."holdhead ";
	$rs = mysql_query($sql);
	$mid = $hono = mysql_result($rs,0,'id');
	if(empty($mid)){
		$mid = 0;$hono=0;
	}
	mysql_free_result($rs);
	//exit;
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
	//if($satype == "I"){$inv_code1 = $inv_code;}
	$inv_code = $_SESSION["inv_ref"];
}
if($_GET['state']==0){
	$mid = ++$hono;

	$tot_bv = 0;
		if(isset($_POST['pcode'])){
			$pcode=$_POST['pcode'];
			$qty=$_POST['qty'];
			for($i=0;$i<sizeof($pcode);$i++){
				$sql="SELECT bv FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
				//exit;
				$rs = mysql_query($sql);
				//echo "$sql<BR>";
				if(mysql_num_rows($rs) > 0)
				{
					for($m=0;$m<mysql_num_rows($rs);$m++){
						
						$sqlObj = mysql_fetch_object($rs);
						$bv =$sqlObj->bv*$qty[$i];	
						$tot_bv = $tot_bv+$bv;
					}
				}else{
					$sql="SELECT bv FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
					//exit;
					$rs = mysql_query($sql);
					//echo "$sql<BR>";
					if(mysql_num_rows($rs) > 0)
					{
						$sqlObj = mysql_fetch_object($rs);
						$bv =$sqlObj->bv*$qty[$i];	
						$tot_bv = $tot_bv+$bv;
					}
				}
				//echo $qty[$i];
			}
		}

	
	logtext(true,$_SESSION['adminuserid'],'เพิ่มบิล',$mid);
	if(empty($chkInternet))$txtInternet = 0;
	$sql="insert into ".$dbprefix."holdhead (id, hono, sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv,tot_bv, uid ) values ('$mid' ,'$hono' ,'".$_POST['hid']."' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv' ,'$tot_bv' ,'".$_SESSION['inv_usercode']."') ";


	//$sql="insert into ".$dbprefix."holdhead (id,  sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv,tot_bv,tot_fv, uid ) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv','$tot_bv','$tot_fv' ,'".$_SESSION['inv_usercode']."') ";

	//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=saleoperate =>$sql";
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
		$sql="SELECT bv FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				for($m=0;$m<mysql_num_rows($rs);$m++){
					
					$sqlObj = mysql_fetch_object($rs);
					$bv[$i] =$sqlObj->bv;	
				}
			}else{
				$sql="SELECT bv FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$bv[$i] =$sqlObj->bv;	
				}
			}
		$sql="insert into ".$dbprefix."holddesc (hono,pcode,pdesc,price,pv,qty,amt) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$qty[$i]','$totalprice[$i]') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		minusProduct($dbprefix,$pcode[$i],$inv_code,$qty[$i]);
	}
	if($satype != 'H')updatePos($dbprefix,$mcode,$sadate,$tot_pv);
}else if($_GET['state']==1){
	logtext(true,$_SESSION['inv_usercode'],'แก้ไขบิล',$mid);
	$sql="update ".$dbprefix."holdhead set sano='$id', id='$id', ";
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
	//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
		$sql = "select * from ".$dbprefix."holddesc where sano='$id'";
	$result = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($result);$i++){
		$data = mysql_fetch_object($result);
		$pcode =$sqlObj->pcode;
		$qty =$sqlObj->qty;
		plusProduct($dbprefix,$pcode,$inv_code,$qty);
	}
	mysql_query("DELETE FROM ".$dbprefix."holddesc WHERE sano='$id'");
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
		$sql="SELECT bv FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				for($m=0;$m<mysql_num_rows($rs);$m++){
					
					$sqlObj = mysql_fetch_object($rs);
					$bv[$i] =$sqlObj->bv;	
				}
			}else{
				$sql="SELECT bv FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				$rs = mysql_query($sql);
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$bv[$i] =$sqlObj->bv;	
				}
			}
		$sql="insert into ".$dbprefix."holddesc (sano,pcode,pdesc,price,pv,bv,fv,qty,amt) values ('$id','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$bv[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]') ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_usercode"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		minusProduct($dbprefix,$pcode[$i],$inv_code,$qty[$i]);
	}
	//updatePos($dbprefix,$mcode,$sadate);
}
$_SESSION["perbuy"] = 0;
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=6'</script>";	

?>

<?
function minusProduct($dbprefix,$pcode,$invent,$qty){
	 $sql = "update ".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	$rs = mysql_query($sql);
	//$sql = "update".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
	//$rs = mysql_query($sql);
}
function plusProduct($dbprefix,$pcode,$invent,$qty){
	$sql = "update ".$dbprefix."product_invent set qty = qty+$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	$rs = mysql_query($sql);
	//$sql = "update".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
	//$rs = mysql_query($sql);
}
function minusProduct1($dbprefix,$pcode,$invent,$qty){
	//$sql = "update".$dbprefix."product_invent set qty = qty-$qty WHERE pcode='$pcode' and inv_code = '$invent' ";
	//$rs = mysql_query($sql);
	//$pcode1 = explode('_',$pcode);
	//if($pcode1[0] == 'PD'){
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
		}else{
			$sql = "update ".$dbprefix."product set qty = qty-$qty WHERE pcode='$pcode' ";
			$rs = mysql_query($sql);
		}
	
}
function plusProduct1($dbprefix,$pcode,$invent,$qty){
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
				$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
				$rs1 = mysql_query($sql);
			}
		}else{
			$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
			$rs = mysql_query($sql);
		}
}

//update ตำแหน่ง แบบไม่สะสมคะแน
?>