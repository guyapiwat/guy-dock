<? 
session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
if($_SESSION["perbuy"] == 0){
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=9'</script>";
exit;
}
$_SESSION["perbuy"] = 0;

include("connectmysql.php");
include("prefix.php");
require("adminchecklogin.php");
require_once("function.php");
require_once("logtext.php");
require_once("gencode.php");
require_once("global.php");
//echo $GLOBALS["crate"];
//exit;
require_once ("function.log.inc.php");
if(isset($_GET['state'])){
	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
	if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
	if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
	if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
	if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
}

$sql = "SELECT pos_cur,name_t,mdate,caddress,czip,cdistrictId,camphurId,cprovinceId,pos_cur,name_f,sp_code,mtype1 from ".$dbprefix."member WHERE mcode='$mcode' ";
$rs = mysql_query($sql);
$pos_old = '';
if(mysql_num_rows($rs)>0) {
	$pos_old = mysql_result($rs,0,'pos_cur');
	$name_t = mysql_result($rs,0,'name_t');
	$name_f = mysql_result($rs,0,'name_f');
	$sp_code = mysql_result($rs,0,'sp_code');
	$pos_cur = mysql_result($rs,0,'pos_cur');
	$mdate = mysql_result($rs,0,'mdate');
	$mtype1 = mysql_result($rs,0,'mtype1');
}
mysql_free_result($rs);
func_check_sale($dbprefix,$mcode,$tot_pv,$satype,$pos_cur,$sadate,$mtype1,$total);

if($_GET['state']==0){	
$sadate = $_SESSION["datetimezone"];
$selectch = "select id as id from  ".$dbprefix."asaleh where id = '".$_POST['hid']."' and hpv >= '$tot_pv' and htotal >= '$total' ";
$rsch = mysql_query($selectch);
if(mysql_num_rows($rsch) <= 0){
	echo "<script language='JavaScript'>alert('This Process can not be success.Please try again.');window.location='index.php?sessiontab=3&sub=9'</script>";	
	exit;
}
	
	

	$sql = "SELECT pos_cur,name_t,mdate,caddress,czip,cdistrictId,camphurId,cprovinceId,pos_cur,name_f,sp_code,mtype1 from ".$dbprefix."member WHERE mcode='$mcode' ";
$rs = mysql_query($sql);
$pos_old = '';
if(mysql_num_rows($rs)>0) {
	$pos_old = mysql_result($rs,0,'pos_cur');
	$name_t = mysql_result($rs,0,'name_t');
	$name_f = mysql_result($rs,0,'name_f');
	$sp_code = mysql_result($rs,0,'sp_code');
	$pos_cur = mysql_result($rs,0,'pos_cur');
	$mdate = mysql_result($rs,0,'mdate');
	$mtype = mysql_result($rs,0,'mtype1');
}

	$tot_base = 0;
	$tot_weight = 0;
	//$tot_pv = 0;
	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$qty=$_POST['qty'];
		for($i=0;$i<sizeof($pcode);$i++){
			$sql="SELECT weight,bprice,special_pv FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
			//exit;
			$rs = mysql_query($sql);
			//echo "$sql<BR>";
			if(mysql_num_rows($rs) > 0)
			{
				for($m=0;$m<mysql_num_rows($rs);$m++){
					
					$sqlObj = mysql_fetch_object($rs);
					$weight =$sqlObj->weight*$qty[$i];	
					$tot_weight = $tot_weight+$weight;
					$tot_base = $tot_base+($sqlObj->bprice*$qty[$i]);	
					$tot_sppv =  $tot_sppv+($sqlObj->special_pv*$qty[$i]);	
				}
			}else{
				$sql="SELECT weight,bprice,special_pv FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
				//exit;
				$rs = mysql_query($sql);
				//echo "$sql<BR>";
				if(mysql_num_rows($rs) > 0)
				{
					$sqlObj = mysql_fetch_object($rs);
					$weight =$sqlObj->weight*$qty[$i];	
					$tot_weight = $tot_weight+$weight;
					$tot_base = $tot_base+($sqlObj->bprice*$qty[$i]);	
					$tot_sppv =  $tot_sppv+($sqlObj->special_pv*$qty[$i]);	
				}
			}
			//echo $qty[$i];
		}
	}

	$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."holdhead ";
	$rs = mysql_query($sql);
	$mid = $hono = mysql_result($rs,0,'id');
	$mid = ++$hono;
	$sql="insert into ".$dbprefix."holdhead (id, hono, sano, sadate,  mcode,sp_code,  sa_type, inv_code,  total,bprice, tot_pv,tot_sppv, uid,locationbase,name_f,name_t ,crate) values ('$mid' ,'$hono' ,'".$_POST['hid']."' ,'$sadate' ,'$mcode','$sp_code', '$satype' ,'$inv_code' ,'$total' ,'$tot_base','$tot_pv','$tot_sppv' ,'".$_SESSION['inv_usercode']."','".$_SESSION['inv_locationbase']."','$name_f','$name_t','".$_SESSION["inv_crate"]."') ";
	logtext(true,$_SESSION['usercode'],'แจงบิล Holdยอด',$mid);
	if (! mysql_query($sql)) {
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."')window.location='index.php?sessiontab=3&sub=9'</script>";
		exit;
	}
	$sqlupdate = "update ".$dbprefix."asaleh set hpv = hpv-$tot_pv,htotal = htotal-$total where id = '".$_POST['hid']."'";
	mysql_query($sqlupdate);

	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}
	for($i=0;$i<sizeof($pcode);$i++){
				

		if($pcode[$i] == $GLOBALS["pcode_extend"]){
			$selectch = "select id as id,mdate from  ".$dbprefix."member where mcode = '$mcode'";
			$rsch = mysql_query($selectch);
			$idi = mysql_result($rsch,0,'id');
			$mdate = mysql_result($rsch,0,'mdate');
			$select = "SELECT mid,MAX(exp_date) AS exp_date FROM ".$dbprefix."expdate where mid='$idi' GROUP BY mid";
			$rs = mysql_query($select);
			if(mysql_num_rows($rs) > 0)	$exp_date = mysql_result($rs,0,'exp_date');
			if(empty($exp_date))$exp_date = $mdate;
			$sql = "INSERT INTO ".$dbprefix."expdate (mid,exp_date,date_change) VALUES('".$idi."',ADDDATE('".$exp_date."', INTERVAL 1 YEAR),'".date("Y-m-d")."')";
			mysql_query($sql);
		}

		$sql="SELECT weight,bprice,special_pv FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$bprice[$i] =$sqlObj->bprice;	
				$special_pv[$i] = $sqlObj->special_pv;
			}
		}else{
			$sql="SELECT weight,bprice,special_pv FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				$sqlObj = mysql_fetch_object($rs);
				$bprice[$i] =$sqlObj->bprice;	
				$special_pv[$i] = $sqlObj->special_pv;
			}
		}

		$sql="insert into ".$dbprefix."holddesc (hono,pcode,pdesc,price,bprice,pv,sppv,bv,qty,amt,locationbase) values ('$hono','$pcode[$i]','$pdesc[$i]','$price[$i]','$bprice[$i]' ,'$pv[$i]','$special_pv[$i]','$bv[$i]','$qty[$i]','$totalprice[$i]','".$_SESSION["inv_locationbase"]."') ";
		//logtext(true,$_SESSION['adminusercode'],$sql);
		logtext(true,$_SESSION['adminusercode'],'แจงบิล Holdยอด',$sql);
		//echo "$sql<br>";
		mysql_query($sql);
	
  
	}
	
	if($satype == 'A')updatePos($dbprefix,$mcode,$sadate,$tot_pv);   
    if($satype == 'Q')func_status($dbprefix,$mcode,$tot_pv,$sadate,$pos_cur,$satype);
    if($satype == 'B')func_status_B($dbprefix,$mcode,$tot_pv,$sadate,$pos_cur);
	if($satype == 'A' )getInsert_bm('ali_bm1',$hono,$mcode,$pos_old,$tot_pv,$sadate,$sadate);

}
//exit;
echo "<script language='JavaScript'>window.location='index.php?sessiontab=3&sub=9'</script>";	

?>

?>