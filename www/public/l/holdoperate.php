<? 
session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
include("connectmysql.php");
include("prefix.php");
require_once("function.php");
require_once("logtext.php");
require_once("global.php");
include("gencode.php");
require("checklogin.php");
include_once("wording".$_SESSION["lan"].".php"); 
if(isset($_GET['state'])){

	if($_SESSION["holdoperate"] == '1'){
		$_SESSION["holdoperate"] = 0;
	}else{
		//echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["8"]."');window.location='index.php?sessiontab=4&sub=3'</script>";	
		//exit;
	}
	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}	
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
	if (isset($_POST["satype"])){$satype=$_POST["satype"];}else{$satype="";}
	if (isset($_POST["sadate"])){$sadate=$_POST["sadate"];}else{$sadate="";}
	if (isset($_POST["sumtotal"])){$total=$_POST["sumtotal"];}else{$total="";}
	if (isset($_POST["sumpv"])){$tot_pv=$_POST["sumpv"];}else{$tot_pv="";}
	if (isset($_POST["sv_code"])){$sv_code=$_POST["sv_code"];}else{$sv_code="";}
}


if($_GET['state']==0){
	$mcode = trim($mcode);
	if(empty($tot_pv) or $tot_pv <=0){
		echo "<script language='JavaScript'>alert('".$wording_lan["tab1_mem_110"]."');window.location='index.php?sessiontab=4&sub=3'</script>";	
		exit;
	}
	
	if($tot_pv < 15 ){
		echo "<script language='JavaScript'>alert('".$wording_lan["tab1_mem_106"]."');window.location='index.php?sessiontab=4&sub=3'</script>";	
		exit;
	}
	$sadate = $_SESSION["datetimezone"];

	$sql = "SELECT mcode from ".$dbprefix."member WHERE mcode='".$_SESSION["usercode"]."' and hpv >= '$tot_pv' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)<=0) {
		echo "<script language='JavaScript'>alert('".$wording_lan["tab1_mem_110"]."');window.location='index.php?sessiontab=4&sub=3'</script>";	
		exit;
	}


	/*$sql = "SELECT mcode from ".$dbprefix."member WHERE mcode='".$_SESSION["usercode"]."' and sv_code = '$sv_code' ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)<=0) {
		echo "<script language='JavaScript'>alert('This Process can not be success.Please try again.');window.location='index.php?sessiontab=4&sub=3'</script>";	
		exit;
	} */
	$sql = "SELECT pos_cur,name_t,caddress,czip,cdistrictId,camphurId,cprovinceId,name_f,mtype1 from ".$dbprefix."member WHERE mcode='$mcode' ";
	$rs = mysql_query($sql);
	$pos_old = '';
	if(mysql_num_rows($rs)>0) {
		$pos_old = mysql_result($rs,0,'pos_cur');
		$name_t = mysql_result($rs,0,'name_t');
		$name_f = mysql_result($rs,0,'name_f');
		$mtype1 = mysql_result($rs,0,'mtype1');
	}

	if($_SESSION["m_mtype1"] <=  $mtype1 and $satype == 'Y'){
		echo "<script language='JavaScript'>alert('".$wording_lan["tab1_mem_107"]."');window.location='index.php?sessiontab=4&sub=3'</script>";	
		exit;
	}
		
	if($tot_pv <=0){
		echo "<script language='JavaScript'>alert('".$wording_lan["tab1_mem_110"]."');window.location='index.php?sessiontab=4&sub=3'</script>";	
		exit;
	}

	if(empty($mcode)){
		echo "<script language='JavaScript'>alert('".$wording_lan["tab1_mem_110"]."');window.location='index.php?sessiontab=4&sub=3'</script>";	
		exit;
	}

	$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."holdhead ";
	$rs = mysql_query($sql);
	$mid = $hono = mysql_result($rs,0,'id');
	$mid = ++$hono;

	$sql="insert into ".$dbprefix."holdhead (id, hono, sano, sadate, mcode,  sa_type, inv_code,  total,bprice, tot_pv, uid,locationbase,name_f,name_t ,crate,ref) values ('$mid' ,'$hono' ,'".$_POST['hid']."' ,'$sadate','$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_base','$tot_pv','".$_SESSION['usercode']."','".$_SESSION['m_locationbase']."','$name_f','$name_t','".$_SESSION["m_crate"]."','".$_SESSION['usercode']."') ";
	//echo $sql;
	//exit;
	logtext(true,$_SESSION['adminusercode'],$wording_lan["tab1_mem_108"],$mid);
	if (! mysql_query($sql)) {
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."');window.location='index.php?sessiontab=4&sub=3'</script>";
		exit;
	}
	if($satype == 'A' )getInsert_bm('ali_bm1',$hono,$mcode,$pos_cur,$tot_pv,$sadate,$sadate);
	if($satype == 'A')updatePos($dbprefix,$mcode,$sadate,$tot_pv,$satype);   

	updatehpv2($dbprefix,$_SESSION["usercode"],$tot_pv);
	if($satype == 'Y')$option = "Transfer Out ($hono)";
	else $option = "PV Out ($hono)"; 
    log_ewallet('hpv',$_SESSION["usercode"],$hono,$tot_pv,'O',date("Y-m-d"),$option); 
	if($satype=='Y'){
		if($satype == 'Y')$option = "Transfer IN ($hono)";
		updatehpv1($dbprefix,$mcode,$tot_pv);
		log_ewallet('hpv',$mcode,$hono,$tot_pv,'I',date("Y-m-d"),$option); 
	}
}
//echo "<script language='JavaScript'>alert('ᨧ�������  $mcode �ӹǹ $tot_pv ��ṹ  ��������ó�����')</script>";	

echo "<script language='JavaScript'>window.location='index.php?sessiontab=4&sub=5'</script>";	

?>