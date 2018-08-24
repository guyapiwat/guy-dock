<?session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
if($_SESSION["perbuy"] == 0){
echo "<script language='JavaScript'>window.location='index.php?sessiontab=1&sub=2'</script>";
exit;
}
$_SESSION["perbuy"] = '0';
include("connectmysql.php");
include("prefix.php");
include("gencode.php");
require_once("function.php");
require_once("logtext.php");
require_once ("function.log.inc.php");
include("global.php");
if(isset($_GET['state'])){

	/*$sql = "SELECT MAX(mcode) AS code FROM ".$dbprefix."member ";
	$rs = mysql_query($sql);
	$code = mysql_result($rs,0,'code');
	$mcode = gencode($code+1);
	$sv_code = substr($mcode,3,strlen($mcode));
	mysql_free_result($rs);*/

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

			if (isset($_POST["cname_f"])){$cname_f=$_POST["cname_f"];}else{$cname_f="";}
			if (isset($_POST["cname_ff"])){$cname_f=$_POST["cname_ff"];}
			if (isset($_POST["cname_t"])){$cname_t=$_POST["cname_t"];}else{$cname_t="";}
			if (isset($_POST["cname_e"])){$cname_e=$_POST["cname_e"];}else{$cname_e="";}
			if (isset($_POST["cname_b"])){$cname_b=$_POST["cname_b"];}else{$cname_b="";}
			if (isset($_POST["csex"])){$csex=$_POST["csex"];}else{$csex="";}
			if (isset($_POST["mvat"])){$mvat=$_POST["mvat"];}else{$mvat="0";}
//var_dump($_POST);
//echo $name_f;
//echo $cname_f;
//exit;
	if (isset($_POST["mdate"])){$mdate=$_POST["mdate"];}else{$mdate="";}
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
	if (isset($_POST["type_com"])){$type_com=$_POST["type_com"];}else{$type_com="";}

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
	if (isset($_POST["zip_1"])){$zip_1=trim($_POST["zip_1"]);}else{$zip_1="";}
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
			if (isset($_POST["czip"])){$czip=trim($_POST["czip"]);}else{$czip="";}
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
	if (isset($_POST["pos_cur"])){$pos_cur=$_POST["pos_cur"];}else{$pos_cur="";}
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
	if (isset($_POST["mtype"])){$mtype=$_POST["mtype"];}else{$mtype="";}
	if (isset($_POST["mtype1"])){$mtype1=$_POST["mtype1"];}else{$mtype1="";}
	if (isset($_POST["mtype2"])){$mtype2=$_POST["mtype2"];}else{$mtype2="";}
	if (isset($_POST["payment"])){$payment=$_POST["payment"];}else{$payment="";}
	if (isset($_POST["txtoption"])){$txtoption=$_POST["txtoption"];}else{$txtoption="";}

		if (isset($_POST["birthday1"])){$birthday1=$_POST["birthday1"];}else{$birthday1="";}
	if (isset($_POST["birthday2"])){$birthday2=$_POST["birthday2"];}else{$birthday2="";}
	if (isset($_POST["birthday3"])){$birthday3=$_POST["birthday3"];}else{$birthday3="";}

	if (isset($_POST["cbirthday1"])){$cbirthday1=$_POST["cbirthday1"];}else{$cbirthday1="";}
	if (isset($_POST["cbirthday2"])){$cbirthday2=$_POST["cbirthday2"];}else{$cbirthday2="";}
	if (isset($_POST["cbirthday3"])){$cbirthday3=$_POST["cbirthday3"];}else{$cbirthday3="";}
	if (isset($_POST["locationbase"])){$locationbase=$_POST["locationbase"];}else{$locationbase="1";}
	if (isset($_POST["line_id"])){$line_id=$_POST["line_id"];}else{$line_id="";}
	if (isset($_POST["facebook_name"])){$facebook_name=$_POST["facebook_name"];}else{$facebook_name="";}
	if (isset($_POST["atocom"])){$atocom=$_POST["atocom"];}else{$atocom="";}

}
//var_dump($sletter);
//var_dump($sinv_code);

//exit;//exit;
//var_dump($GLOBALS);
//exit;
//var_dump($_POST);
//exit;
					
			$zip = $zip_1.$zip_2.$zip_3.$zip_4.$zip_5;
		$czip = $czip_1.$czip_2.$czip_3.$czip_4.$czip_5;

/*$birthday1 = explode("-",$birthday);
$birthday1[0] = $birthday1[0]-543;
$birthday = $birthday1[0].'-'.$birthday1[1].'-'.$birthday1[2];
if(!empty($cbirthday)){
	$cbirthday1 = explode("-",$cbirthday);
	$cbirthday1[0] = $cbirthday1[0]-543;
	$cbirthday = $cbirthday1[0].'-'.$cbirthday1[1].'-'.$cbirthday1[2];
}*/
//$birthday1 = explode("-",$birthday);

if($locationbase == '1')$birthday3 = $birthday3-543;
$birthday = $birthday3.'-'.$birthday2.'-'.$birthday1;
if(!empty($cbirthday3)){
	if($locationbase == '1')$cbirthday3 = $cbirthday3-543;
	$cbirthday = $cbirthday3.'-'.$cbirthday2.'-'.$cbirthday1;
}

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

$cdistrict = getdistrict($cdistrict);
$camphur = getamphur($camphur);
$cprovince = getprovince($cprovince);

$district = getdistrict($district);
$amphur = getamphur($amphur);
$province = getprovince($province);


$chk_id_card = chk_id_card($mcode,$id_card);
if($chk_id_card){
	echo "<script language='JavaScript'>alert('เลขบัตรประชาชนใช้ไม่ได้ค่ะ');window.location='index.php?sessiontab=1&sub=2'</script>";	
	exit;	
}
//$id_card1 = explode('-',$id_card);
//$id_card = $id_card1[0].$id_card1[1].$id_card1[2].$id_card1[3].$id_card1[4];
	if($_GET['state']==0){

	}else if($_GET['state']==1 && !system_code($mcode)){

		$sql_chk = "SELECT * FROM ali_member WHERE mcode='$mcode' limit 0,1";
		$sql_chk_row = mysql_query($sql_chk);
		
		$chk_id_card = mysql_result($sql_chk_row,0,'id_card');
		$chk_mobile = mysql_result($sql_chk_row,0,'mobile');
		$chk_sp_code = mysql_result($sql_chk_row,0,'sp_code');
		$chk_upa_code = mysql_result($sql_chk_row,0,'upa_code');
		$chk_acc_no = mysql_result($sql_chk_row,0,'acc_no');

		if($mobile!=$chk_mobile){$chkk_mobile = '1';}
		if($id_card!=$chk_id_card){$chkk_id_card = '1';}
		if($sp_code!=$chk_sp_code){$chkk_sp_code = '1';}
		if($upa_code!=$chk_upa_code){$chkk_upa_code = '1';}
		if($acc_no!=$chk_acc_no){$chkk_acc_no = '1';}

		//echo $mobile.'|'.$chk_mobile.'|'.$chkk_mobile;exit;
		$objtext = "mcode : $mcode <br>";
		$objtext .= "name_ff : $name_f <br>";
		$objtext .= "name_t : $name_t <br>";
		$objtext .= "name_e : $name_e <br>";
		$objtext .= "name_b : $name_b <br>";
		$objtext .= "sex : $sex <br>";
		$objtext .= "cname_ff : $cname_f <br>";
		$objtext .= "cname_e : $cname_e <br>";
		$objtext .= "cname_b : $cname_b <br>";
		$objtext .= "csex : $csex <br>";
		$objtext .= "mdate : $mdate <br>";
		$objtext .= "birthday : $birthday <br>";
		$objtext .= "age : $age <br>";
		$objtext .= "cbirthday : $cbirthday <br>";
		$objtext .= "cage : $cage <br>";
		$objtext .= "occupation : $occupation <br>";
		$objtext .= "status : $status <br>";
		$objtext .= "mar_name : $mar_name <br>";
		$objtext .= "mar_age : $mar_age <br>";
		$objtext .= "email : $email <br>";
		$objtext .= "line_id : $line_id <br>";
		$objtext .= "facebook_name : $facebook_name <br>";
		$objtext .= "cemail : $cemail <br>";
		$objtext .= "beneficiaries : $beneficiaries <br>";
		$objtext .= "relation : $relation <br>";
		$objtext .= "national : $national <br>";
		$objtext .= "id_tax : $id_tax <br>";
		$objtext .= "id_card : $id_card <br>";
		$objtext .= "address : $address <br>";
		$objtext .= "street : $street <br>";
		$objtext .= "building : $building <br>";
		$objtext .= "village : $village <br>";
		$objtext .= "soi : $soi <br>";
		$objtext .= "province : $province <br>";
		$objtext .= "amphur : $amphur <br>";
		$objtext .= "district : $district <br>";
		$objtext .= "zip : $zip_1 $zip_2 $zip_3 $zip_4 $zip_5 <br>";
		$objtext .= "home_t : $home_t <br>";
		$objtext .= "mobile : $mobile <br>";
		$objtext .= "cnational : $cnational <br>";
		$objtext .= "cid_tax : $cid_tax <br>";
		$objtext .= "cid_card : $cid_card <br>";
		$objtext .= "caddress : $caddress <br>";
		$objtext .= "cstreet : $cstreet <br>";
		$objtext .= "cbuilding : $cbuilding <br>";
		$objtext .= "cvillage : $cvillage <br>";
		$objtext .= "camphur : $camphur <br>";
		$objtext .= "cdistrict : $cdistrict <br>";
		$objtext .= "czip : $czip <br>";
		$objtext .= "chome_t : $chome_t <br>";
		$objtext .= "cmobile : $cmobile <br>";
		$objtext .= "cfax : $cfax <br>";
		$objtext .= "czip_1 : $czip_1 $czip_2 $czip_3 $czip_4 $czip_5 <br>";
		$objtext .= "mcode_acc : $mcode_acc <br>";
		$objtext .= "bonusrec : $bonusrec <br>";
		$objtext .= "bankcode : $bankcode <br>";
		$objtext .= "branch : $branch <br>";
		$objtext .= "acc_type : $acc_type <br>";
		$objtext .= "acc_no : $acc_no <br>";
		$objtext .= "acc_name : $acc_name <br>";
		$objtext .= "acc_prov : $acc_prov <br>";
		$objtext .= "sv_code : $sv_code <br>";
		$objtext .= "sp_code : $sp_code <br>";
		$objtext .= "sp_name : $sp_name <br>";
		$objtext .= "upa_code : $upa_code <br>";
		$objtext .= "upa_name : $upa_name <br>";
		$objtext .= "inv_code : $inv_code <br>";
		$objtext .= "lr : $lr <br>";
		$objtext .= "posid : $posid <br>";
		$objtext .= "pos_cur : $pos_cur <br>";
		$objtext .= "memdesc : $memdesc <br>";
		$objtext .= "cmp2 : $cmp2 <br>";
		$objtext .= "cmp3 : $cmp3 <br>";
		$objtext .= "cmp : $cmp <br>";
		$objtext .= "ccmp2 : $ccmp2 <br>";
		$objtext .= "ccmp3 : $ccmp3 <br>";
		$objtext .= "ccmp : $ccmp <br>";
		$objtext .= "bmdate1 : $bmdate1 <br>";
		$objtext .= "bmdate2 : $bmdate2 <br>";
		$objtext .= "bmdate3 : $bmdate3 <br>";
		$objtext .= "cbmdate1 : $cbmdate1 <br>";
		$objtext .= "cbmdate2 : $cbmdate2 <br>";
		$objtext .= "cbmdate3 : $cbmdate3 <br>";
		$objtext .= "chkaddress : $chkaddress <br>";
		$objtext .= "iname_f : $iname_f <br>";
		$objtext .= "iname_t : $iname_t <br>";
		$objtext .= "irelation : $irelation <br>";
		$objtext .= "iphone : $iphone <br>";
		$objtext .= "iid_card : $iid_card <br>";
		$objtext .= "atocom : $atocom <br>";
		if(empty($lr)){

			//echo "<font color='#FF0000'>error</font><br>";
				//echo  "$sql";		
			//exit;

		}
	
	
		logtext1(true,$_SESSION['inv_username'],'แก้ไขสมาชิก รหัส : '.$mcode,$oid,$objtext,$chkk_mobile,$chkk_id_card,$chkk_sp_code,$chkk_upa_code,$chkk_acc_no);
		//$acc_no = $acc_no_1.$acc_no_2.$acc_no_3.$acc_no_4.$acc_no_5.$acc_no_6.$acc_no_7.$acc_no_8.$acc_no_9.$acc_no_10;
		//echo $zip;
	//	echo $_SESSION["inv_username"];
//exit;
		$sql="update ".$dbprefix."member set mcode='$mcode', name_f='$name_f', name_t='$name_t', name_b='$name_b', name_e='$name_e' where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_username"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
		$sql="update ".$dbprefix."member set  birthday='$birthday',bmdate1 = '$bmdate1',bmdate2 = '$bmdate2', bmdate3 = '$bmdate3',cbmdate1 = '$cbmdate1',cbmdate2 = '$cbmdate2', cbmdate3 = '$cbmdate3', national='$national', id_tax='$id_tax', id_card='$id_card',line_id='$line_id',facebook_name='$facebook_name',type_com='$type_com'  where id=$oid ";																	
		//====================LOG===========================
$text="uid=".$_SESSION["inv_username"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
		$sql="update ".$dbprefix."member set sex='$sex', age='$age', occupation='$occupation', status='$status', mar_name='$mar_name' where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_username"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
		$sql="update ".$dbprefix."member set mar_age='$mar_age',sletter='$sletter',sinv_code='$sinv_code', email='$email', beneficiaries='$beneficiaries', relation='$relation' where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_username"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
		$sql="update ".$dbprefix."member set address='$address' , provinceId='$province' , amphurId='$amphur' , districtId='$district', posid='$posid'  where id=$oid ";//, pos_cur='$pos_cur'
		mysql_query($sql);
		$sql="update ".$dbprefix."member set zip='$zip', home_t='$home_t',fax='$fax', mobile='$mobile', bonusrec='$bonusrec', bankcode='$bankcode' where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_username"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================
		mysql_query($sql);
		$sql="update ".$dbprefix."member set branch='$branch', acc_type='$acc_type', acc_no='$acc_no', acc_name='$acc_name',txtoption = '$txtoption', acc_prov='$acc_prov' where id=$oid ";
		//====================LOG===========================
$text="uid=".$_SESSION["inv_username"]." action=memoperate =>$sql";
writelogfile($text); 
mysql_query($sql);
//=================END LOG===========================
	
		$sql="update ".$dbprefix."member set mcode_acc='$mcode_acc' where id=$oid ";
		//====================LOG===========================
		$text="uid=".$_SESSION["inv_username"]." action=memoperate =>$sql";
		writelogfile($text);
		mysql_query($sql);
	


		if(!empty($cname_t)){
				if($cmp == 'ครบ' and $cmp2 =='ครบ' and $cmp3 =='ครบ' and  $ccmp == 'ครบ'){
					$sql="update ".$dbprefix."member set status_doc = 1 where id=$oid  ";
					mysql_query($sql);

				}else{
					$sql="update ".$dbprefix."member set status_doc = 0 where id=$oid  ";
					mysql_query($sql);

				}
			}else{
				if($cmp == 'ครบ' and $cmp2 =='ครบ' and $cmp3 =='ครบ'){
					$sql="update ".$dbprefix."member set status_doc = 1 where id=$oid  ";
					mysql_query($sql);

				}else{
					$sql="update ".$dbprefix."member set status_doc = 0 where id=$oid  ";
					mysql_query($sql);

				}
			}
		$sql="update ".$dbprefix."member set memdesc='$memdesc',cmp='$cmp',cmp2='$cmp2' ,cmp3='$cmp3',ccmp='$ccmp',ccmp2='$ccmp2' ,ccmp3='$ccmp3' ,iname_f='$iname_f',iname_t='$iname_t',irelation='$irelation',iphone='$iphone',iid_card='$iid_card' 
		
		,cname_f = '$cname_f',cname_t = '$cname_t',cname_e='$cname_e',cbirthday='$cbirthday',cnational='$cnational',cid_tax='$cid_tax',cid_card='$cid_card',caddress='$caddress',czip='$czip',chome_t='$chome_t',coffice_t='$coffice_t',cmobile='$cmobile',csex='$csex',cemail='$cemail',cdistrictId='$cdistrict',camphurId='$camphur',cprovinceId='$cprovince',cname_b='$cname_b',cfax='$cfax'

		,street='$street',building='$building',village='$village',soi='$soi',cstreet='$cstreet',cbuilding='$cbuilding',cvillage='$cvillage',csoi='$csoi',locationbase='$locationbase',mtype='$mtype',mtype1='$mtype1',mtype2='$mtype2',mvat='$mvat',line_id='$line_id',facebook_name='$facebook_name',atocom='$atocom' 
		
		
		where id=$oid ";
		//echo $sql;
		///exit;
		//====================LOG===========================
$text="uid=".$_SESSION["inv_username"]." action=memoperate =>$sql";
writelogfile($text);
//=================END LOG===========================

		//$sql = "UPDATE ".$dbprefix."expdate SET exp_date=ADDDATE('".$mdate."', INTERVAL 1 MONTH) WHERE mid='".."' "
		//echo $sql;
		if (!mysql_query($sql)) {
			ob_end_flush();
			echo "<font color='#FF0000'>error</font><br>";
			echo "$sql<br>";
		}
		else {
			/*if (isset($_FILES["myfile"])) { 
				if ($_FILES["myfile"]["error"] > 0) {
					
				} else {
					move_uploaded_file($_FILES["myfile"]["tmp_name"], "../uploads/profile_img/".$mcode.".jpg");
					//$date_add = date("Y-m-d");
					//$sql_idcard="update ".$dbprefix."member set  profile_img='ครบ' ,bmdate1='$date_add'where mcode=$mcode ";
					//mysql_query($sql_idcard);
				}
			}*/

			mysql_query("COMMIT");
			ob_end_clean();
			//include "mem_main.php";
			echo "<script language='JavaScript'>window.location='index.php?sessiontab=1&sub=2'</script>";	
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
	function genformorecode($start,$ncode){
		$stk[0] = $start;
		$k=0;
		for($i=1;$i<$ncode;$i++){
			$mcodelist[$i-1] = gencode($start+$i);//"TH"."".""
			$stk[sizeof($stk)] = $mcodelist[$i-1];
			$upa_codelist[$mcodelist[$i-1]] = $stk[$k];
			$lrlist[$mcodelist[$i-1]] = ($i%2==0?1:0)+1;
			if($i%2==0) $k++;			
		}
		//print_r($mcodelist);
		//print_r($upa_codelist);
		return array($mcodelist,$upa_codelist,$lrlist);
	}
function minusProduct1($dbprefix,$pcode,$invent,$qty,$sano,$uid,$inv_code){

		$sql = "update ".$dbprefix."product set qty = qty-1 WHERE pcode='$pcode' ";
		mysql_query($sql);
}

 
?>


