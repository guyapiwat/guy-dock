<?
session_start();
include("connectmysql.php");
include("prefix.php");
include("gencode.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
if($_SESSION["chkselfregis"] == '1'){
//	echo "<script language='JavaScript'>window.location='http://www.cci-2016.com';</script>";	
}
//$_SESSION["chkselfregis"] = 1;

if(isset($_GET['state'])){
	if (isset($_POST["checksale"])){$checksale=$_POST["checksale"];}else{$checksale="";}
	if (isset($_POST["oid"])){$oid=$_POST["oid"];}else{$oid="";}
	if (isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
	if (isset($_POST["mcode"])){$mcode=$_POST["mcode"];}else{$mcode="";}
	if (isset($_POST["name_f"])){$name_f=$_POST["name_f"];}
	if (isset($_POST["name_ff"])){$name_f=$_POST["name_ff"];}else{$name_f="";}
	if (isset($_POST["name_t"])){$name_t=$_POST["name_t"];}else{$name_t="";}
	if (isset($_POST["name_e"])){$name_e=$_POST["name_e"];}else{$name_e="";}
	if (isset($_POST["name_b"])){$name_b=$_POST["name_b"];}else{$name_e="";}
	if (isset($_POST["sex"])){$sex=$_POST["sex"];}else{$sex="";}
	if (isset($_POST["sletter"])){$sletter=$_POST["sletter"];}else{$sletter="";}
	if (isset($_POST["sinv_code"])){$sinv_code=$_POST["sinv_code"];}else{$sinv_code="";}
	if (isset($_POST["birthday1"])){$birthday1=$_POST["birthday1"];}else{$birthday1="";}
	if (isset($_POST["birthday2"])){$birthday2=$_POST["birthday2"];}else{$birthday2="";}
	if (isset($_POST["birthday3"])){$birthday3=$_POST["birthday3"];}else{$birthday3="";}
	if (isset($_POST["fmcode"])){$fmcode=$_POST["fmcode"];}else{$fmcode="";}

	if (isset($_POST["cbirthday1"])){$cbirthday1=$_POST["cbirthday1"];}else{$cbirthday1="";}
	if (isset($_POST["cbirthday2"])){$cbirthday2=$_POST["cbirthday2"];}else{$cbirthday2="";}
	if (isset($_POST["cbirthday3"])){$cbirthday3=$_POST["cbirthday3"];}else{$cbirthday3="";}
	if (isset($_POST["scheck"])){$scheck=$_POST["scheck"];}else{$scheck="";}

	if (isset($_POST["cname_f"])){$cname_f=$_POST["cname_f"];}else{$cname_f="";}
	if (isset($_POST["cname_ff"])){$cname_f=$_POST["cname_ff"];}
	if (isset($_POST["cname_t"])){$cname_t=$_POST["cname_t"];}else{$cname_t="";}
	if (isset($_POST["cname_e"])){$cname_e=$_POST["cname_e"];}else{$cname_e="";}
	if (isset($_POST["cname_b"])){$cname_b=$_POST["cname_b"];}else{$cname_b="";}
	if (isset($_POST["csex"])){$csex=$_POST["csex"];}else{$csex="";}
	if (isset($_POST["mdate"])){$mdate=$_POST["mdate"];}else{$mdate=date("Y-m-d");}
	if (isset($_POST["birthday"])){$birthday=$_POST["birthday"];}else{$birthday="";}
	if (isset($_POST["age"])){$age=$_POST["age"];}else{$age="";}

	if (isset($_POST["cbirthday"])){$cbirthday=$_POST["cbirthday"];}else{$cbirthday="";}
	if (isset($_POST["cage"])){$cage=$_POST["cage"];}else{$cage="";}

	if (isset($_POST["occupation"])){$occupation=$_POST["occupation"];}else{$occupation="";}
	if (isset($_POST["status"])){$status=$_POST["status"];}else{$status="";}
	if (isset($_POST["mar_name"])){$mar_name=$_POST["mar_name"];}else{$mar_name="";}
	if (isset($_POST["mar_age"])){$mar_age=$_POST["mar_age"];}else{$mar_age="";}
	if (isset($_POST["email"])){$email=$_POST["email"];}else{$email="";}

	if (isset($_POST["cemail"])){$cemail=$_POST["cemail"];}else{$cemail="";}

	if (isset($_POST["beneficiaries"])){$beneficiaries=$_POST["beneficiaries"];}else{$beneficiaries="";}
	if (isset($_POST["relation"])){$relation=$_POST["relation"];}else{$relation="";}
	if (isset($_POST["national"])){$national=$_POST["national"];}else{$national="";}
	if (isset($_POST["id_tax"])){$id_tax=$_POST["id_tax"];}else{$id_tax="";}
	if (isset($_POST["id_card"])){$id_card=$_POST["id_card"];}else{$id_card="";}
	if (isset($_POST["address"])){$address=$_POST["address"];}else{$address="";}
	if (isset($_POST["street"])){$street=$_POST["street"];}else{$street="";}
	if (isset($_POST["building"])){$building=$_POST["building"];}else{$building="";}
	if (isset($_POST["village"])){$village=$_POST["village"];}else{$village="";}
	if (isset($_POST["soi"])){$soi=$_POST["soi"];}else{$soi="";}
	if (isset($_POST["province"])){$province=$_POST["province"];}else{$province="";}
	if (isset($_POST["amphur"])){$amphur=$_POST["amphur"];}else{$amphur="";}
	if (isset($_POST["district"])){$district=$_POST["district"];}else{$district="";}
	if (isset($_POST["zip"])){$zip=$_POST["zip"];}else{$zip="";}
	if (isset($_POST["zip_1"])){$zip_1=$_POST["zip_1"];}else{$zip_1="";}
	if (isset($_POST["zip_2"])){$zip_2=$_POST["zip_2"];}else{$zip_2="";}
	if (isset($_POST["zip_3"])){$zip_3=$_POST["zip_3"];}else{$zip_3="";}
	if (isset($_POST["zip_4"])){$zip_4=$_POST["zip_4"];}else{$zip_4="";}
	if (isset($_POST["zip_5"])){$zip_5=$_POST["zip_5"];}else{$zip_5="";}

	if (isset($_POST["home_t"])){$home_t=$_POST["home_t"];}else{$home_t="";}
	if (isset($_POST["mobile"])){$mobile=$_POST["mobile"];}else{$mobile="";}
	if (isset($_POST["fax"])){$fax=$_POST["fax"];}else{$fax="";}

	if (isset($_POST["cnational"])){$cnational=$_POST["cnational"];}else{$cnational="";}
	if (isset($_POST["cid_tax"])){$cid_tax=$_POST["cid_tax"];}else{$cid_tax="";}
	if (isset($_POST["cid_card"])){$cid_card=$_POST["cid_card"];}else{$cid_card="";}
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
	if (isset($_POST["czip_1"])){$czip_1=$_POST["czip_1"];}else{$czip_1="";}
	if (isset($_POST["czip_2"])){$czip_2=$_POST["czip_2"];}else{$czip_2="";}
	if (isset($_POST["czip_3"])){$czip_3=$_POST["czip_3"];}else{$czip_3="";}
	if (isset($_POST["czip_4"])){$czip_4=$_POST["czip_4"];}else{$czip_4="";}
	if (isset($_POST["czip_5"])){$czip_5=$_POST["czip_5"];}else{$czip_5="";}

	if (isset($_POST["mcode_acc"])){$mcode_acc=$_POST["mcode_acc"];}else{$mcode_acc="";}
	if (isset($_POST["bonusrec"])){$bonusrec=$_POST["bonusrec"];}else{$bonusrec="";}
	
	if (isset($_POST["bankcode"])){$bankcode=$_POST["bankcode"];}else{$bankcode="";}
	if (isset($_POST["branch"])){$branch=$_POST["branch"];}else{$branch="";}
	if (isset($_POST["acc_type"])){$acc_type=$_POST["acc_type"];}else{$acc_type="";}
	if (isset($_POST["acc_no"])){$acc_no=$_POST["acc_no"];}else{$acc_no="";}
	if (isset($_POST["acc_name"])){$acc_name=$_POST["acc_name"];}else{$acc_name="";}
	if (isset($_POST["acc_prov"])){$acc_prov=$_POST["acc_prov"];}else{$acc_prov="";}
	if (isset($_POST["sv_code"])){$sv_code=$_POST["sv_code"];}else{$sv_code="";}
	if (isset($_POST["sp_code"])){$sp_code=$_POST["sp_code"];}else{$sp_code="";}
	if (isset($_POST["sp_name"])){$sp_name=$_POST["sp_name"];}else{$sp_name="";}
	if (isset($_POST["upa_code"])){$upa_code=$_POST["upa_code"];}else{$upa_code="";}
	if (isset($_POST["upa_name"])){$upa_name=$_POST["upa_name"];}else{$upa_name="";}
	if (isset($_POST["inv_code"])){$inv_code=$_POST["inv_code"];}else{$inv_code="";}
	
	if (isset($_POST["lr"])){$lr=$_POST["lr"];}else{$lr="";}
	if (isset($_POST["posid"])){$posid=$_POST["posid"];}else{$posid="";}
	if (isset($_POST["pos_cur"])){$pos_cur=$_POST["pos_cur"];}else{$pos_cur="MB";}
	if (isset($_POST["memdesc"])){$memdesc=$_POST["memdesc"];}else{$memdesc="";}
	if (isset($_POST["cmp2"])){$cmp2=$_POST["cmp2"];}else{$cmp2="";}
	if (isset($_POST["cmp3"])){$cmp3=$_POST["cmp3"];}else{$cmp3="";}
	if (isset($_POST["cmp"])){$cmp=$_POST["cmp"];}else{$cmp="";}
	if (isset($_POST["ccmp2"])){$ccmp2=$_POST["ccmp2"];}else{$ccmp2="";}
	if (isset($_POST["ccmp3"])){$ccmp3=$_POST["ccmp3"];}else{$ccmp3="";}
	if (isset($_POST["ccmp"])){$ccmp=$_POST["ccmp"];}else{$ccmp="";}
	if (isset($_POST["ncode"])){$ncode=$_POST["ncode"];}else{$ncode="";}
	if (isset($_POST["bmdate1"])){$bmdate1=$_POST["bmdate1"];}else{$bmdate1="";}
	if (isset($_POST["bmdate2"])){$bmdate2=$_POST["bmdate2"];}else{$bmdate2="";}
	if (isset($_POST["bmdate3"])){$bmdate3=$_POST["bmdate3"];}else{$bmdate3="";}
	if (isset($_POST["cbmdate1"])){$cbmdate1=$_POST["cbmdate1"];}else{$cbmdate1="";}
	if (isset($_POST["cbmdate2"])){$cbmdate2=$_POST["cbmdate2"];}else{$cbmdate2="";}
	if (isset($_POST["cbmdate3"])){$cbmdate3=$_POST["cbmdate3"];}else{$cbmdate3="";}
	if (isset($_POST["chkaddress"])){$chkaddress=$_POST["chkaddress"];}else{$chkaddress="";}
	if (isset($_POST["iname_t"])){$iname_t=$_POST["iname_t"];}else{$iname_t="";}
	if (isset($_POST["iname_f"])){$iname_f=$_POST["iname_f"];}else{$iname_f="";}
	if (isset($_POST["iname_ff"])){$iname_f=$_POST["iname_ff"];}
	if (isset($_POST["irelation"])){$irelation=$_POST["irelation"];}else{$irelation="";}
	if (isset($_POST["iphone"])){$iphone=$_POST["iphone"];}else{$iphone="";}
	if (isset($_POST["iid_card"])){$iid_card=$_POST["iid_card"];}else{$iid_card="";}
	if (isset($_POST["sbook"])){$sbook=$_POST["sbook"];}else{$sbook="";}
	if (isset($_POST["sbinv_code"])){$sbinv_code=$_POST["sbinv_code"];}else{$sbinv_code="";}
	if (isset($_POST["cid_mobile"])){$cid_mobile=$_POST["cid_mobile"];}else{$cid_mobile="";}
	if (isset($_POST["locationbase"])){$locationbase=$_POST["locationbase"];}else{$locationbase="";}
}	   

$result1=mysql_query("select * from ".$dbprefix."member where id_card = '$id_card'");
if(mysql_num_rows($result1) > 0){
	echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["12"]."');window.location='index.php?sessiontab=1'</script>";	
	exit;
}
$birthday = $birthday3.'-'.$birthday2.'-'.$birthday1;
if(!empty($cbirthday3)){
$cbirthday = $cbirthday3.'-'.$cbirthday2.'-'.$cbirthday1;
}

//$cdistrict = getdistrict($cdistrict);
//$camphur = getamphur($camphur);
//$cprovince = getprovince($cprovince);

//$district = getdistrict($district);
//$amphur = getamphur($amphur);
//$province = getprovince($province);

$slr = $lr;
$upa_code = lrMost($dbprefix,$sp_code,$slr);
//$lr = $slr;
if($chkaddress == '1'){
	$caddress = $address;
	$cstreet = $street;
	$cbuilding = $building;
	$cvillage = $village;
	$csoi = $soi;
	$cprovince = $province;
	$camphur = $amphur;
	$cdistrict = $district;
	$czip = $zip;
}

$caddress1 = $caddress.' '.$cbuilding.' '.$cvillage.' '.$csoi.' '.$cstreet;

if($_GET['state']==0){
	if(strlen($mcode)<7 and is_numeric($mcode)){
		echo "<script language='JavaScript'>alert('".$wording_lan["info_main_1"]["40"]."');window.history.back();</script>";	
		exit;
	}
	$upa_code = strtoupper($upa_code);
	$sp_code = strtoupper($sp_code);
	$upa_name = getMember($dbprefix,$upa_code);
	$sp_name =  getMember($dbprefix,$sp_code);
	$sv_code =  substr($id_card, -4, 4); 

	$arr_member = array();
	$arr_member = searchlocationbase($dbprefix,$locationbase);
	$pcode = $arr_member["pcode_register"];
	$mcode = $fmcode.$mcode;
	checkMember($dbprefix,$mcode);

	$sql="insert into ".$dbprefix."member_tmp (id,mcode ,name_f ,name_t ,name_e ,name_b ,sex ,mdate ,birthday ,age ,occupation ,status ,mar_name ,mar_age ,email ,beneficiaries ,relation ,national ,id_tax ,id_card ,address ,provinceId,amphurId,districtId ,zip ,home_t ,fax,mobile ,mcode_acc, bonusrec ,bankcode ,branch ,acc_type ,acc_no ,acc_name ,acc_prov ,sv_code ,sp_code ,sp_name ,upa_code ,upa_name ,inv_code ,uid ,posid,pos_cur,memdesc,lr,cmp,cmp2,cmp3,bmdate1,bmdate2,bmdate3,ccmp,ccmp2,ccmp3,cbmdate1,cbmdate2,cbmdate3,iname_f,iname_t,irelation,iphone,iid_card,sletter,sinv_code
	,cname_f,cname_t,cname_e,cname_b,cbirthday,cnational,cid_tax,cid_card,caddress,czip,chome_t,coffice_t,cmobile,csex,cemail,cdistrictId,camphurId,cprovinceId,cfax
	,street,building,village,soi,cstreet,cbuilding,cvillage,csoi,sbook,sbinv_code,cid_mobile,locationbase
	) values ('','$mcode' ,'$name_f' ,'$name_t' ,'$name_e','$name_b' ,'$sex' ,'$mdate' ,'$birthday' ,'$age' ,'$occupation' ,'$status' ,'$mar_name' ,'$mar_age' ,'$email' ,'$beneficiaries' ,'$relation' ,'$national' ,'$id_tax' ,'$id_card' ,'$address'  ,'$province','$amphur','$district' ,'$zip' ,'$home_t' ,'$fax','$mobile' , '$mcode_acc' ,'$bonusrec' ,'$bankcode' ,'$branch' ,'$acc_type' ,'$acc_no' ,'$acc_name' ,'$acc_prov' ,'$sv_code' ,'$sp_code' ,'$sp_name' ,'$upa_code' ,'$upa_name' ,'' ,'$sp_code' ,'$posid','$pos_cur','$memdesc','$lr','$cmp','$cmp2','$cmp3','$bmdate1','$bmdate2','$bmdate3','$ccmp','$ccmp2','$ccmp3','$cbmdate1','$cbmdate2','$cbmdate3','$iname_f','$iname_t','$irelation','$iphone','$iid_card','$sletter','$sinv_code'
	
	,'$cname_f','$cname_t','$cname_e','$cname_b','$cbirthday','$cnational','$cid_tax','$cid_card','$caddress','$czip','$chome_t','$coffice_t','$cmobile','$csex','$cemail','$cdistrict','$camphur','$cprovince','$cfax'

	,'$street','$building','$village','$soi','$cstreet','$cbuilding','$cvillage','$csoi','$sbook','$sbinv_code','$cid_mobile','$locationbase'
	) ";
	//====================LOG===========================
	
	if (! mysql_query($sql)) {
		echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["6"]."');window.location='member_register.php';</script>";
		exit;
	}else {
		$select = "select max(id) as id from  ".$dbprefix."member_tmp";
		$rs = mysql_query($select);
		$idi = mysql_result($rs,0,'id');
		echo "<script language='JavaScript'>window.location='register_success.php'</script>";	
		exit;	
	}	
	echo "<script language='JavaScript'>window.location='http://www.cci-2016.com'</script>";	


}
function checkMember($dbprefix,$mcode){
	$sql = "select * from ".$dbprefix."member  where mcode='$mcode' ";
	$query = mysql_query($sql);
	if(mysql_num_rows($query) > 0){
					echo '
		<SCRIPT LANGUAGE="JavaScript">
			alert("Member Duplicated '.$mcode.'");
			window.location = "http://www.cci-2016.com" ;
		</SCRIPT>
		' ;
		exit;
	}
}
function getMember($dbprefix,$mcode){
	$sql = "select * from ".$dbprefix."member  where mcode='$mcode' ";
	$query = mysql_query($sql);
	if(mysql_num_rows($query) > 0){
		$name = mysql_result(mysql_query($sql),0,'name_t');
	}
	return $name;
}
function lrMost($dbprefix,$scode,$lr_val){
	$sql = "SELECT mcode,lr FROM ".$dbprefix."member WHERE upa_code='$scode' AND lr='$lr_val' LIMIT 1 ";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)<=0) return $scode;
	else return lrMost($dbprefix,mysql_result($rs,0,'mcode'),$lr_val);
}

function isLine($dbprefix,$mcode,$sp_code){
	$sql = "SELECT upa_code FROM ".$dbprefix."member WHERE mcode='$scode' LIMIT 1 ";
	$rs = mysql_query($sql);
	if($scode==$testcode)
		return true;
	if(mysql_num_rows($rs)<=0)
		return false;
	else if(mysql_result($rs,0,'upa_code')!=$testcode)
		return isLine($dbprefix,mysql_result($rs,0,'upa_code'),$testcode);
	else
		return true;
}
?>
