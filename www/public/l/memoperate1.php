<?
session_start();?>
<meta http-equiv="Content-Language" content="th">
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
include("connectmysql.php");
include("prefix.php");
include("gencode.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");

if(isset($_GET['state'])){
	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}
	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["email"])){$email=$_POST["email"];}else{$email="";}
	if (isset($_POST["address"])){$address=$_POST["address"];}else{$address="";}
	if (isset($_POST["province"])&&($_POST['province'])){$province=$_POST["province"];}else{$province="0";}
	if (isset($_POST["amphur"])&&($_POST['amphur']!='')){$amphur=$_POST["amphur"];}else{$amphur="0";}
	if (isset($_POST["district"])&&($_POST['district']!='')){$district=$_POST["district"];}else{$district="0";}
	if (isset($_POST["zip"])&&($_POST['zip']!='')){$zip=$_POST["zip"];}else{$zip="";}
	if (isset($_POST["home_t"])){$home_t=$_POST["home_t"];}else{$home_t="";}
	if (isset($_POST["mobile"])){$mobile=$_POST["mobile"];}else{$mobile="";}
	if (isset($_POST["fax"])){$fax=$_POST["fax"];}else{$fax="";}
	if (isset($_POST["sletter"])){$sletter=$_POST["sletter"];}else{$sletter="";}
	if (isset($_POST["sinv_code"])){$sinv_code=$_POST["sinv_code"];}else{$sinv_code="";}
	if (isset($_POST["zip_1"])){$zip_1=$_POST["zip_1"];}else{$zip_1="";}
	if (isset($_POST["zip_2"])){$zip_2=$_POST["zip_2"];}else{$zip_2="";}
	if (isset($_POST["zip_3"])){$zip_3=$_POST["zip_3"];}else{$zip_3="";}
	if (isset($_POST["zip_4"])){$zip_4=$_POST["zip_4"];}else{$zip_4="";}
	if (isset($_POST["zip_5"])){$zip_5=$_POST["zip_5"];}else{$zip_5="";}
	if (isset($_POST["cemail"])){$cemail=$_POST["cemail"];}else{$cemail="";}
	if (isset($_POST["caddress"])){$caddress=$_POST["caddress"];}else{$caddress="";}
	if (isset($_POST["cstreet"])){$cstreet=$_POST["cstreet"];}else{$cstreet="";}
	if (isset($_POST["cbuilding"])){$cbuilding=$_POST["cbuilding"];}else{$cbuilding="";}
	if (isset($_POST["cvillage"])){$cvillage=$_POST["cvillage"];}else{$cvillage="";}
	if (isset($_POST["csoi"])){$csoi=$_POST["csoi"];}else{$csoi="";}
	if (isset($_POST["cprovince"])){$cprovince=$_POST["cprovince"];}else{$cprovince="";}
	if (isset($_POST["camphur"])){$camphur=$_POST["camphur"];}else{$camphur="";}
	if (isset($_POST["cdistrict"])){$cdistrict=$_POST["cdistrict"];}else{$cdistrict="";}
	if (isset($_POST["czip"])){$czip=$_POST["czip"];}else{$czip="";}
	if (isset($_POST["chome_t"])){$chome_t=$_POST["chome_t"];}else{$chome_t="";}
	if (isset($_POST["cmobile"])){$cmobile=$_POST["cmobile"];}else{$cmobile="";}
	if (isset($_POST["cfax"])){$cfax=$_POST["cfax"];}else{$cfax="";}
	if (isset($_POST["line_id"])){$line_id=$_POST["line_id"];}else{$line_id="";}
	if (isset($_POST["facebook_name"])){$facebook_name=$_POST["facebook_name"];}else{$facebook_name="";}
	if (isset($_POST["cline_id"])){$cline_id=$_POST["cline_id"];}else{$cline_id="";}
	if (isset($_POST["cfacebook_name"])){$cfacebook_name=$_POST["cfacebook_name"];}else{$cfacebook_name="";}
}
$cdistrict = getdistrict($cdistrict);
$camphur = getamphur($camphur);
$cprovince = getprovince($cprovince);

if($_GET['state']==0){

}else if($_GET['state']==1 && !system_code($mcode)){

	logtext(true,$_SESSION['usercode'],'แก้ไขสมาชิก',$oid);
	$sql="update ".$dbprefix."member set email='$email',home_t='$home_t',fax='$fax',mobile = '$mobile'
	,caddress='$caddress',cstreet='$cstreet',cbuilding='$cbuilding',cvillage='$cvillage',csoi='$csoi',cemail='$cemail',czip='$czip',chome_t='$chome_t',cfax='$cfax',cdistrictId='$cdistrict',camphurId='$camphur',cprovinceId='$cprovince',cmobile = '$cmobile'
	,line_id='$line_id',facebook_name='$facebook_name'
	,cline_id='$cline_id',cfacebook_name='$cfacebook_name'
	where mcode='".$_SESSION["usercode"]."' ";
	//echo $sql;exit;
	//====================LOG===========================
	$text="uid=".$_SESSION["usercode"]." action=memoperate =>$sql";
	writelogfile($text);
	if (!mysql_query($sql)) {
		ob_end_flush();
		echo "<font color='#FF0000'>error</font><br>";
		//echo "$sql<br>";
	}
	else {
		mysql_query("COMMIT");
		ob_end_clean();
		//include "mem_main.php";
		echo "<script language='JavaScript'>window.location='index.php?sessiontab=1&sub=7'</script>";	
		exit;  // done in MEMBEReditadd.php
	}
}
function system_code($code){
	$sys_code = array('');
	$code = strtoupper($code);
	for($i=0;$i<sizeof($sys_code);$i++){
		if($sys_code===$code)
			return true;
	}
	return false;
}
?>
