<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."isaleh ";
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


}
if($_GET['state']==0){
	$mid = ++$sano;
	logtext(true,$_SESSION['adminuserid'],'เพิ่มบิล',$mid);
	if(empty($chkInternet))$txtInternet = 0;
	 $sql="insert into ".$dbprefix."isaleh (id,  sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv,tot_bv,tot_fv, uid,send,txtoption,chkCash,chkFuture,chkTransfer,chkCredit1,chkCredit2,chkCredit3,chkInternet,chkDiscount,chkOther,txtCash,txtFuture,txtTransfer,txtCredit1,txtCredit2,txtCredit3,txtInternet,txtDiscount,txtOther,
	optionCash,optionFuture,optionTransfer,optionCredit1,optionCredit2,optionCredit3,optionInternet,optionDiscount,optionOther ) values ('$mid' ,'$sano' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv','$tot_bv','$tot_fv' ,'".$_SESSION['adminusercode']."','$radsend','$txtoption','$chkCash','$chkFuture','$chkTransfer','$chkCredit1','$chkCredit2','$chkCredit3','$chkInternet','$chkDiscount','$chkOther','$txtCash','$txtFuture',
	'$txtTransfer','$txtCredit1','$txtCredit2','$txtCredit3','$txtInternet','$txtDiscount','$txtOther','$optionCash','$optionFuture','$optionTransfer','$optionCredit1','$optionCredit2','$optionCredit3','$optionInternet','$optionDiscount','$optionOther') ";

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
		$bv=$_POST['bv'];
		$fv=$_POST['fv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}
	for($i=0;$i<sizeof($pcode);$i++){
		$sql="insert into ".$dbprefix."isaled (sano,pcode,pdesc,price,pv,bv,fv,qty,amt,inv_code) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$bv[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]','$inv_code') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminuserid"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		if($satype == "I"){
			 $sql = "SELECT * from ".$dbprefix."product_invent  WHERE pcode='$pcode[$i]' and inv_code = '$inv_code' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				plusProduct2($dbprefix,$pcode[$i],$inv_code,$qty[$i]);
			}else{
			 	$sql="insert into ".$dbprefix."product_invent (pcode,qty,ud,inv_code) values ('$pcode[$i]','$qty[$i]','".$_SESSION['adminusercode']."','$inv_code') ";
				mysql_query($sql);
			}
		}
		minusProduct($dbprefix,$pcode[$i],$_SESSION['adminusercode'],$qty[$i]);
	}
	updateEwallet($dbprefix,$mcode,$txtInternet);
	//updatePos($dbprefix,$mcode,$sadate);
}else if($_GET['state']==1){
	logtext(true,$_SESSION['adminusercode'],'แก้ไขบิล',$id);
	if(empty($chkInternet))$txtInternet = 0;
	updateEwallet1($dbprefix,$mcode,$txtInternet,$id);
	$sql="update ".$dbprefix."isaleh set sano='$id', id='$id', ";
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
writelogfile($text);
//=================END LOG===========================
	mysql_query($sql);
	$sql = "select * from ".$dbprefix."isaled where sano='$id'";
	$result = mysql_query($sql);
	for($i=0;$i<mysql_num_rows($result);$i++){
		$data = mysql_fetch_object($result);
		$pcode =$data->pcode;
		$qty =$data->qty;
		$inv_codeold =$data->inv_code;
		plusProduct($dbprefix,$pcode,$_SESSION['adminusercode'],$qty);
		minusProduct1($dbprefix,$pcode,$inv_codeold,$qty);
	}
	mysql_query("DELETE FROM ".$dbprefix."isaled WHERE sano='$id'");
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
		$sql="insert into ".$dbprefix."isaled (sano,pcode,pdesc,price,pv,bv,fv,qty,amt) values ('$id','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$bv[$i]','$fv[$i]','$qty[$i]','$totalprice[$i]') ";
		//====================LOG===========================
$text="uid=".$_SESSION["adminusercode"]." action=saleoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		//echo $sql."<br />";
		mysql_query($sql);
		minusProduct($dbprefix,$pcode[$i],$_SESSION['adminusercode'],$qty[$i]);
		if($satype == "I"){
			$sql = "SELECT * from ".$dbprefix."product_invent  WHERE pcode='$pcode[$i]' and inv_code = '$inv_code' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				plusProduct2($dbprefix,$pcode[$i],$inv_code,$qty[$i]);
			}else{
				$sql="insert into ".$dbprefix."product_invent (pcode,qty,ud,inv_code) values ('$pcode[$i]','$qty[$i]','".$_SESSION['adminusercode']."','$inv_code') ";
				mysql_query($sql);
			}
		}
	}
	//updatePos($dbprefix,$mcode,$sadate);
}
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=138'</script>";	

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
	$sql = "select * from ".$dbprefix."isaleh where sano='$id'";
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
//update ตำแหน่ง แบบไม่สะสมคะแนน
	function updatePos($dbprefix,$mcode,$cur_date){
		$pos_piority = array('D'=>4,'P'=>3,'G'=>2,'S'=>1,'MB'=>0);
		$pos_exp = array('D'=>12000,'P'=>6000,'G'=>2000,'S'=>1000,'MB'=>0);
		$pv_exp=array(12000,6000,2000,1000);
		//-----เก็บคะแนนสูงสุดที่มีการซื้อ
		$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."isaleh WHERE mcode='$mcode' and sa_type='A' ";
		$rs = mysql_query($sql);
		$mexp = 0;
		if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
		$mexp = $mexp + gettotalpv($dbprefix,$mcode);
		mysql_free_result($rs);
		//-----เก็บตำแหน่งปัจจุบัน
		$sql = "SELECT pos_cur from ".$dbprefix."member WHERE mcode='$mcode' ";
		$rs = mysql_query($sql);
		$pos_old = '';
		if(mysql_num_rows($rs)>0) $pos_old = mysql_result($rs,0,'pos_cur');
		mysql_free_result($rs);
		//คำนวณตำแหน่ง
		$flg=false;
		switch ($pos_old){
			case 'S':
				$flg=true;
				break;
			case 'G':
				$flg=false;
				break;
			case 'P':
				$flg=false;
				break;
			case 'DD':
				$flg=false;
				break;
			case 'EDM':
				$flg=false;
				break;
			case 'GDM':
				$flg=false;
				break;
			default:
				$flg=true;
				break;
		}
			if($flg==true){
				$pos_new = $pos_old;
				foreach(array_keys($pos_exp) as $key){
					//echo $key;
					if($mexp>=$pos_exp[$key]){ $pos_new = $key; break;}
				}
				//echo $pos_old."=>".$pos_new;
				if($pos_new != $pos_old && $pos_piority[$pos_new]>$pos_piority[$pos_old]){
					$sql = "UPDATE ".$dbprefix."member SET pos_cur='$pos_new' WHERE mcode='$mcode' LIMIT 1 ";
					//====================LOG===========================
					$text="uid=".$_SESSION["adminusercode"]." action=saleoperate =>$sql";
					writelogfile($text);
					//=================END LOG===========================
					mysql_query($sql);
					$sql = "INSERT INTO ".$dbprefix."poschange (mcode,pos_before,pos_after,date_change) ";
					$sql .= "VALUES('".$mcode."','".$pos_old."','".$pos_new."','".$cur_date."')";
					//====================LOG===========================
					$text="uid=".$_SESSION["adminusercode"]." action=saleoperate =>$sql";
					writelogfile($text);
					//=================END LOG===========================
					mysql_query($sql);
				}
			}
	}
?>