<? 
session_start();
$_REQUEST['sessiontab'] =	$_SESSION["sessiontab"] ;
$_REQUEST['sub'] = $_SESSION["sub"] ;
$_REQUEST['chktype'] = $_SESSION["chktype"];
$_REQUEST['page'] = $_SESSION["page"] ;
$_REQUEST['send'] = $_SESSION["send"] ;
// var_dump($_GET);
//exit;
	if($_SESSION["rsaleoperate"] == '1'){
		$_SESSION["rsaleoperate"] = 0;
	}else{
		echo "<script language='JavaScript'>alert('This Process can not be success.Please try again.');window.location='index.php?sessiontab=".$_REQUEST["sessiontab"]."&sub=".$_REQUEST["sub"]."&page=".$_REQUEST["page"]."&chktype=".$_REQUEST["chktype"]."''</script>";	
		exit;
	}


include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");

if(isset($_REQUEST['state'])){
	$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."risaleh ";
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
	if (isset($_POST["remark"])){$remark=$_POST["remark"];}else{$remark="";}
	if (isset($_POST["array_serial"])){$array_serial=$_POST["array_serial"];}else{$array_serial="";}
}
if($_REQUEST['state']==0){
	$mid = ++$hono;
	
	//koob 25/05/2009
	//list ( $year, $month, $day ) = split("-|:", $sadate);
	//$heal_mouth=$year.$month;

	$sadate = $_SESSION["datetimezone"];
	$selectch = "select * from  ".$dbprefix."isaleh where id = '".$_POST['hid']."' and cancel =0 ";
	
	$rsch = mysql_query($selectch);
	if(mysql_num_rows($rsch) > 0){
		$inv_code = mysql_result($rsch,0,'inv_code');
		$sanox = mysql_result($rsch,0,'sano');
		$caddress = mysql_result($rsch,0,'caddress');
		$cdistrictId = mysql_result($rsch,0,'cdistrictId');
		$camphurId = mysql_result($rsch,0,'camphurId');
		$cprovinceId = mysql_result($rsch,0,'cprovinceId');
		$czip = mysql_result($rsch,0,'czip');
		$send = mysql_result($rsch,0,'send');
		$inv_code = mysql_result($rsch,0,'inv_code');
		$htotal = mysql_result($rsch,0,'rtotal');
		$hpv = mysql_result($rsch,0,'rpv');
		$name_f = mysql_result($rsch,0,'name_f');
		$name_t = mysql_result($rsch,0,'name_t');
		if($hpv <= 0 and $htotal <= 0){
			echo "<script language='JavaScript'>alert('This Process can not be success.Please try again.');window.location='index.php?sessiontab=".$_REQUEST["sessiontab"]."&sub=".$_REQUEST["sub"]."&page=".$_REQUEST["page"]."&chktype=".$_REQUEST["chktype"]."'</script>";	
			exit;
		}
	}else{
		echo "<script language='JavaScript'>alert('This Process can not be success.Please try again.');window.location='index.php?sessiontab=".$_REQUEST["sessiontab"]."&sub=".$_REQUEST["sub"]."&page=".$_REQUEST["page"]."&chktype=".$_REQUEST["chktype"]."'</script>";	
		exit;
	}
	

/*	$sql = "SELECT * from ".$dbprefix."invent WHERE inv_code='$inv_code' ";
	$rs = mysql_query($sql);
	$pos_old = '';
	if(mysql_num_rows($rs)>0) {
		$pos_old = mysql_result($rs,0,'pos_cur');
		$name_t = mysql_result($rs,0,'name_t');
		$name_f = mysql_result($rs,0,'name_f');
	}
*/
	//$sql="insert into ".$dbprefix."risaleh (id,name_f,name_t, hono, sano, sadate,  mcode,  sa_type, inv_code,  total, tot_pv, uid ) values ('$mid' ,'$name_f' ,'$name_t' ,'$hono' ,'".$_POST['hid']."' ,'$sadate' ,'$mcode', '$satype' ,'".$inv_code."' ,'$total' ,'$tot_pv' ,'".$_SESSION['inv_usercode']."') ";

	$arr_invent = searchbranch($dbprefix,$inv_code);
	$barr_invent = searchlocationbase($dbprefix,$arr_invent["locationbase"]);

	$sql="insert into ".$dbprefix."risaleh (id, hono, sano, sadate,  mcode,  sa_type, inv_code,inv_code_to,  total,bprice, tot_pv, uid,locationbase,name_f,name_t ,crate,caddress,cdistrictId,camphurId,cprovinceId,czip,send,remark) values ('$mid' ,'$hono' ,'".$_POST['hid']."' ,'$sadate' ,'$mcode', '$satype' ,'$inv_code','' ,'$total' ,'$tot_base','$tot_pv' ,'".$_SESSION['adminusercode']."','".$arr_invent["locationbase"]."','$name_f','".$arr_invent["name_t"]."','".$barr_invent["crate"]."','$caddress','$cdistrictId','$camphurId','$cprovinceId','$czip','$send','$remark') ";

	
	
	logtext(true,$_SESSION['inv_usercode'],'เปิดบิล รับส่งของStockist',$mid);
		//echo "$sql<br>";
	if (! mysql_query($sql)) {
		echo "<script language='JavaScript'>alert('This Process can not be success.Please try again.');window.location='index.php?sessiontab=".$_REQUEST["sessiontab"]."&sub=".$_REQUEST["sub"]."&page=".$_REQUEST["page"]."&chktype=".$_REQUEST["chktype"]."''</script>";	
		exit;
	}
	mysql_query("update ".$dbprefix."isaleh set rpv = rpv-$tot_pv,rtotal = rtotal-$total where id = '".$_POST['hid']."'");

	if(isset($_POST['pcode'])){
		$pcode=$_POST['pcode'];
		$pdesc=$_POST['pdesc'];
		$price=$_POST['price'];
		$pv=$_POST['pv'];
		$qty=$_POST['qty'];
		$totalprice=$_POST['totalprice'];
	}
	for($i=0;$i<sizeof($pcode);$i++){
		$sql="SELECT weight,bprice FROM ".$dbprefix."product_package where pcode = '".$pcode[$i]."'";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs) > 0)
		{
			for($m=0;$m<mysql_num_rows($rs);$m++){
				
				$sqlObj = mysql_fetch_object($rs);
				$weight[$i] =$sqlObj->weight;	
				$bprice[$i] =$sqlObj->bprice;	
			}
		}else{
			$sql="SELECT weight,bprice FROM ".$dbprefix."product where pcode = '".$pcode[$i]."'";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs) > 0)
			{
				$sqlObj = mysql_fetch_object($rs);
				$weight[$i] =$sqlObj->weight;	
				$bprice[$i] =$sqlObj->bprice;	
			}
		}
		//$sql="insert into ".$dbprefix."risaled (hono,pcode,pdesc,price,pv,qty,amt) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]' ,'$pv[$i]','$qty[$i]','$totalprice[$i]') ";
		$sql="insert into ".$dbprefix."risaled (hono,pcode,pdesc,price,bprice,pv,bv,qty,amt,locationbase,crate) values ('$mid','$pcode[$i]','$pdesc[$i]','$price[$i]','$bprice[$i]' ,'$pv[$i]','$bv[$i]','$qty[$i]','$totalprice[$i]','".$_SESSION["inv_locationbase"]."','".$_SESSION["inv_crate"]."') ";

		logtext(true,$_SESSION['inv_usercode'],'เปิดบิลรับส่งของ',$mid);
		//echo "$sql<br>";
		mysql_query($sql);
		$inv_ref = $_SESSION["admininvent"];
	//	$inv_code = $_SESSION["admininvent"];

		$satype = 'A';
		//Stockist
		updatestockcard1($dbprefix,$inv_code,$inv_code,$inv_ref,'RI'.$hono,$sano,$sadate,$rccode,$satype,$pcode[$i],$_SESSION["inv_usercode"],$qty[$i],$price[$i],$totalprice[$i]);
		calc_plusProduct($dbprefix,$pcode[$i],$inv_code,$qty[$i],'RI'.$hono,$_SESSION['inv_usercode'],'0');
		
		updatestockcardr1($dbprefix,$inv_code,$inv_code,$inv_ref,'RI'.$hono,$sano,$sadate,$rccode,$satype,$pcode[$i],$_SESSION["inv_usercode"],$qty[$i],$price[$i],$totalprice[$i]);
		calc_plusProductr($dbprefix,$pcode[$i],$inv_code,$qty[$i],'RI'.$hono,$_SESSION['inv_usercode'],'0');
		//Stockist

		// Branch
		updatestockcardr($dbprefix,$inv_code,$inv_ref,$inv_ref,'RI'.$hono,$sano,$sadate,$rccode,$satype,$pcode[$i],$_SESSION["inv_usercode"],$qty[$i],$price[$i],$totalprice[$i]);
		calc_minusProductr($dbprefix,$pcode[$i],$inv_ref,$qty[$i],'RI'.$hono,$_SESSION['inv_usercode'],'0');
		// Branch


		/*updatestockcardr($dbprefix,$inv_code,$inv_ref,$inv_ref,'RI'.$hono,$_POST['hid'],$sadate,$rccode,$satype,$pcode[$i],$_SESSION['inv_usercode'],$qty[$i],$price[$i],$totalprice[$i]);
		calc_minusProductr($dbprefix,$pcode[$i],$inv_ref,$qty[$i],'RI'.$hono,$_SESSION['inv_usercode'],$inv_code);*/

	}
	$array_serial1 = explode(",",$array_serial);
	for($i=0;$i<sizeof($array_serial1);$i++){
		mysql_query("update ".$dbprefix."aging set sano = '".$_POST['hid']."',sano_r = '$hono',mcode='$mcode'   where serial = '".$array_serial1[$i]."' ");


	}
	//updatePos($dbprefix,$mcode,$sadate);
}
//echo "<script language='JavaScript'>window.location='index.php?sessiontab=5&sub=17&chktype=$chktype'</script>";	
echo "<script language='JavaScript'>window.location='index.php?sessiontab=".$_REQUEST["sessiontab"]."&sub=".$_REQUEST["sub"]."&page=".$_REQUEST["page"]."&chktype=".$_REQUEST["chktype"]."&send=".$_REQUEST["send"]."'</script>";	
$_SESSION["sessiontab"] = "";
$_SESSION["sub"] = "";
$_SESSION["chktype"] = "";
$_SESSION["page"] = "";
$_SESSION["send"] = "";
?>
