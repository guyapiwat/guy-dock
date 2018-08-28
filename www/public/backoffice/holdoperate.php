<? 
session_start();
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
exit;
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
}
if($_GET['state']==0){
	$mid = ++$hono;
	if($_SESSION["chkhold"] != 0){
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=10'</script>";	

	}else{
		$_SESSION["chkhold"] = 1;
	}
	//koob 25/05/2009
	list ( $year, $month, $day ) = split("-|:", $sadate);
	$heal_mouth=$year.$month;
	
	if($satype != 'H')
	$sql="insert into ".$dbprefix."holdhead (id, hono, sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv, uid ) values ('$mid' ,'$hono' ,'".$_POST['hid']."' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv' ,'".$_SESSION['adminusercode']."') ";
	else
	$sql="insert into ".$dbprefix."holdhead1 (id, hono, sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv, uid ,ref) values ('$mid' ,'$hono' ,'".$_POST['hid']."' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_pv' ,'".$_SESSION['adminusercode']."','".$_SESSION['inventinvent']."') ";
	//logtext(true,$_SESSION['adminusercode'],$sql);
	logtext(true,$_SESSION['adminusercode'],'แจงบิล Holdยอด',$mid);
		//echo "$sql<br>";
	mysql_query($sql);
	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
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

		if($satype != 'H')
		$sql="insert into ".$dbprefix."holddesc (hono,pcode,pdesc,price,pv,bv,qty,amt) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$bv[$i]','$qty[$i]','$totalprice[$i]') ";
		else
		$sql="insert into ".$dbprefix."holddesc1 (hono,pcode,pdesc,price,pv,qty,amt) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]',$bv[$i]','$qty[$i]','$totalprice[$i]') ";
		//logtext(true,$_SESSION['adminusercode'],$sql);
		logtext(true,$_SESSION['adminusercode'],'แจงบิล Holdยอด',$sql);
		//echo "$sql<br>";
		mysql_query($sql);
		updatePos($dbprefix,$mcode,$sadate);
	}
}else if($_GET['state']==1){
	
	//koob 25/05/2009
	list ( $year, $month, $day ) = split("-|:", $sadate);
	$heal_mouth=$year.$month;
	
	$sql="update ".$dbprefix."holdhead set hono='$id', id='$id', ";
	$sql.="mcode='$mcode' ,sa_type='$satype' ,sadate='$sadate' , inv_code='$inv_code', total='$total', tot_pv='$tot_pv' where id= '$id' ";
	//$sql="update ".$dbprefix."holdhead set ";
	//$sql.="sa_type='$satype'  where id= '$id' ";
	//echo $sql;exit;
	//logtext(true,$_SESSION['adminusercode'],'แก้บิลHOLD',$sql);
	logtext(true,$_SESSION['adminusercode'],'แก้แจงบิล Holdยอด',$sql);
	mysql_query($sql);
	/*$sql = "DELETE FROM ".$dbprefix."holddesc WHERE hono='$id'";
	logtext(true,$_SESSION['adminusercode'],$sql);
	mysql_query($sql);
	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}
	for($i=0;$i<sizeof($pcode);$i++){
		$sql="insert into ".$dbprefix."holddesc (hono,pcode,pdesc,price,pv,qty,amt) values ('$id','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$qty[$i]','$totalprice[$i]') ";
		logtext(true,$_SESSION['adminusercode'],$sql);
		mysql_query($sql);
	}*/
}
//exit;
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=10'</script>";	

?>

<?
function minusProduct($dbprefix,$pcode,$invent,$qty){
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
				$qty =$sqlObj->qty*$qty;	
				$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
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
				$qty =$sqlObj->qty*$qty;	
				$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
				$rs1 = mysql_query($sql);
			}
		}
	}else{
		$sql = "update ".$dbprefix."product set qty = qty+$qty WHERE pcode='$pcode' ";
		$rs = mysql_query($sql);
	}
}
function updateEwallet($dbprefix,$mcode,$txtInternet){
	$sql3 = "update ".$dbprefix."invent set ewallet = $txtInternet-ewallet where inv_code = '$inv_code' ";
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
//update ตำแหน่ง แบบไม่สะสมคะแนน
?>
<?
function updatePos($dbprefix,$mcode,$cur_date){

	$pos_piority = array('EX'=>2,'SU'=>1,'MB'=>0);
	$pos_exp = array('EX'=>3000,'SU'=>750,'MB'=>0);
	//-----เก็บคะแนนสูงสุดที่มีการซื้อ
	//$sql = "SELECT MAX(tot_pv) as pv from ".$dbprefix."asaleh WHERE mcode='$mcode' ";
	$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."asaleh WHERE sa_type='A' and mcode='$mcode' and cancel=0 ";
	$rs = mysql_query($sql);
	$mexp = 0;
	if(mysql_num_rows($rs)>0) $mexp = mysql_result($rs,0,'pv');
	//mysql_free_result($rs);

	$sql = "SELECT SUM(tot_pv) as pv from ".$dbprefix."holdhead WHERE mcode='".$mcode."' and sa_type='A' and cancel=0 ";
	$rs = mysql_query($sql);
	$mexph = 0;
	if(mysql_num_rows($rs)>0) $mexph = mysql_result($rs,0,'pv');
	mysql_free_result($rs);
	$mexp=($mexp+$mexph);
//	$mexp = $mexp+gettotalpv($dbprefix,$mcode[$j]);


	//-----เก็บตำแหน่งปัจจุบัน
	$sql = "SELECT pos_cur from ".$dbprefix."member WHERE mcode='$mcode' ";
	$rs = mysql_query($sql);
	$pos_old = '';
	if(mysql_num_rows($rs)>0) $pos_old = mysql_result($rs,0,'pos_cur');
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
?>