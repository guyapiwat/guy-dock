
<?php
/**
 * Created by PhpStorm.
 * User: saintent
 * Date: 5/7/2018 AD
 * Time: 14:01
 */
include("../share/database.php");
include("../share/prefix.php");
include_once("../function/function_pos.php");

if (true) {
    if (isset($_POST["txtoption"])) {
        $txtoption = $_POST["txtoption"];
    } else {
        $txtoption = "";
    }
    if (isset($_POST["checksale"])) {
        $checksale = $_POST["checksale"];
    } else {
        $checksale = "";
    }
    if (isset($_POST["oid"])) {
        $oid = $_POST["oid"];
    } else {
        $oid = "";
    }
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
    } else {
        $id = "";
    }
    if (isset($_POST["hid"])) {
        $hid = $_POST["hid"];
    } else {
        $hid = "";
    }
    if (isset($_POST["fmcode"])) {
        $fmcode = $_POST["fmcode"];
    } else {
        $fmcode = "";
    }
    if (isset($_POST["mcode"])) {
        $mcode = $_POST["mcode"];
    } else {
        $mcode = "";
    }
    if (isset($_POST["profile_img"])) {
        $pathImgOld1 = $_POST["profile_img"];
    } else {
        $pathImgOld1 = "";
    }
    if (isset($_POST["name_f"])) {
        $name_f = iconv("utf-8","tis-620",$_POST["name_f"]);
    }
    if (isset($_POST["name_ff"])) {
        $name_f = iconv("utf-8","tis-620",$_POST["name_ff"]);
    } else {
        $name_f = "";
    }
    if (isset($_POST["name_t"])) {
        $name_t = iconv("utf-8","tis-620",$_POST["name_t"]);
    } else {
        $name_t = "";
    }
    if (isset($_POST["name_e"])) {
        $name_e = iconv("utf-8","tis-620",$_POST["name_e"]);
    } else {
        $name_e = "";
    }
    if (isset($_POST["name_b"])) {
        $name_b = iconv("utf-8","tis-620",$_POST["name_b"]);
    } else {
        $name_e = "";
    }
    if (isset($_POST["sex"])) {
        $sex = iconv("utf-8","tis-620",$_POST["sex"]);
    } else {
        $sex = "";
    }
    if (isset($_POST["sletter"])) {
        $sletter = $_POST["sletter"];
    } else {
        $sletter = "";
    }
    if (isset($_POST["sinv_code"])) {
        $sinv_code = $_POST["sinv_code"];
    } else {
        $sinv_code = "";
    }
    if (isset($_POST["birthday1"])) {
        $birthday1 = $_POST["birthday1"];
    } else {
        $birthday1 = "";
    }
    if (isset($_POST["birthday2"])) {
        $birthday2 = $_POST["birthday2"];
    } else {
        $birthday2 = "";
    }
    if (isset($_POST["birthday3"])) {
        $birthday3 = $_POST["birthday3"];
    } else {
        $birthday3 = "";
    }

    if (isset($_POST["cbirthday1"])) {
        $cbirthday1 = $_POST["cbirthday1"];
    } else {
        $cbirthday1 = "";
    }
    if (isset($_POST["cbirthday2"])) {
        $cbirthday2 = $_POST["cbirthday2"];
    } else {
        $cbirthday2 = "";
    }
    if (isset($_POST["cbirthday3"])) {
        $cbirthday3 = $_POST["cbirthday3"];
    } else {
        $cbirthday3 = "";
    }

    if (isset($_POST["cname_f"])) {
        $cname_f = iconv("utf-8","tis-620",$_POST["cname_f"]);
    } else {
        $cname_f = "";
    }
    if (isset($_POST["cname_ff"])) {
        $cname_f = iconv("utf-8","tis-620",$_POST["cname_ff"]);
    }
    if (isset($_POST["cname_t"])) {
        $cname_t = iconv("utf-8","tis-620",$_POST["cname_t"]);
    } else {
        $cname_t = "";
    }
    if (isset($_POST["cname_e"])) {
        $cname_e = iconv("utf-8","tis-620",$_POST["cname_e"]);
    } else {
        $cname_e = "";
    }
    if (isset($_POST["cname_b"])) {
        $cname_b = iconv("utf-8","tis-620",$_POST["cname_b"]);
    } else {
        $cname_b = "";
    }
    if (isset($_POST["csex"])) {
        $csex = iconv("utf-8","tis-620",$_POST["csex"]);
    } else {
        $csex = "";
    }
    if (isset($_POST["mdate"])) {
        $mdate = $_POST["mdate"];
    } else {
        $mdate = "";
    }
    if (isset($_POST["birthday"])) {
        $birthday = $_POST["birthday"];
    } else {
        $birthday = "";
    }
    if (isset($_POST["age"])) {
        $age = $_POST["age"];
    } else {
        $age = "";
    }
    if (isset($_POST["cage"])) {
        $cage = $_POST["cage"];
    } else {
        $cage = "";
    }

    if (isset($_POST["occupation"])) {
        $occupation = $_POST["occupation"];
    } else {
        $occupation = "";
    }
    if (isset($_POST["status"])) {
        $status = $_POST["status"];
    } else {
        $status = "";
    }
    if (isset($_POST["mar_name"])) {
        $mar_name = $_POST["mar_name"];
    } else {
        $mar_name = "";
    }
    if (isset($_POST["mar_age"])) {
        $mar_age = $_POST["mar_age"];
    } else {
        $mar_age = "";
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    } else {
        $email = "";
    }

    if (isset($_POST["cemail"])) {
        $cemail = $_POST["cemail"];
    } else {
        $cemail = "";
    }

    if (isset($_POST["beneficiaries"])) {
        $beneficiaries = $_POST["beneficiaries"];
    } else {
        $beneficiaries = "";
    }
    if (isset($_POST["relation"])) {
        $relation = $_POST["relation"];
    } else {
        $relation = "";
    }
    if (isset($_POST["national"])) {
        $national = $_POST["national"];
    } else {
        $national = "";
    }
    if (isset($_POST["id_tax"])) {
        $id_tax = $_POST["id_tax"];
    } else {
        $id_tax = "";
    }
    if (isset($_POST["id_card"])) {
        $id_card = $_POST["id_card"];
    } else {
        $id_card = "";
    }
    if (isset($_POST["address"])) {
        $address = iconv("utf-8","tis-620",$_POST["address"]);
    } else {
        $address = "";
    }
    if (isset($_POST["street"])) {
        $street = iconv("utf-8","tis-620",$_POST["street"]);
    } else {
        $street = "";
    }
    if (isset($_POST["building"])) {
        $building = iconv("utf-8","tis-620",$_POST["building"]);
    } else {
        $building = "";
    }
    if (isset($_POST["village"])) {
        $village = iconv("utf-8","tis-620",$_POST["village"]);
    } else {
        $village = "";
    }
    if (isset($_POST["soi"])) {
        $soi = iconv("utf-8","tis-620",$_POST["soi"]);
    } else {
        $soi = "";
    }
    if (isset($_POST["province"])) {
        $province = iconv("utf-8","tis-620",$_POST["province"]);
    } else {
        $province = "";
    }
    if (isset($_POST["amphur"])) {
        $amphur = iconv("utf-8","tis-620",$_POST["amphur"]);
    } else {
        $amphur = "";
    }
    if (isset($_POST["district"])) {
        $district = iconv("utf-8","tis-620",$_POST["district"]);
    } else {
        $district = "";
    }
    if (isset($_POST["zip"])) {
        $zip = $_POST["zip"];
    } else {
        $zip = "";
    }
    if (isset($_POST["home_t"])) {
        $home_t = $_POST["home_t"];
    } else {
        $home_t = "";
    }
    if (isset($_POST["mobile"])) {
        $mobile = $_POST["mobile"];
    } else {
        $mobile = "";
    }
    if (isset($_POST["cid_mobile"])) {
        $cid_mobile = $_POST["cid_mobile"];
    } else {
        $cid_mobile = "";
    }
    if (isset($_POST["fax"])) {
        $fax = $_POST["fax"];
    } else {
        $fax = "";
    }
    if (isset($_POST["cnational"])) {
        $cnational = $_POST["cnational"];
    } else {
        $cnational = "";
    }
    if (isset($_POST["cid_tax"])) {
        $cid_tax = $_POST["cid_tax"];
    } else {
        $cid_tax = "";
    }
    if (isset($_POST["cid_card"])) {
        $cid_card = $_POST["cid_card"];
    } else {
        $cid_card = "";
    }
    if (isset($_POST["caddress"])) {
        $caddress = iconv("utf-8","tis-620",$_POST["caddress"]);
    } else {
        $caddress = "";
    }
    if (isset($_POST["cstreet"])) {
        $cstreet = iconv("utf-8","tis-620",$_POST["cstreet"]);
    } else {
        $cstreet = "";
    }
    if (isset($_POST["cbuilding"])) {
        $cbuilding = iconv("utf-8","tis-620",$_POST["cbuilding"]);
    } else {
        $cbuilding = "";
    }
    if (isset($_POST["cvillage"])) {
        $cvillage = iconv("utf-8","tis-620",$_POST["cvillage"]);
    } else {
        $cvillage = "";
    }
    if (isset($_POST["csoi"])) {
        $csoi = iconv("utf-8","tis-620",$_POST["csoi"]);
    } else {
        $csoi = "";
    }
    if (isset($_POST["cprovince"])) {
        $cprovince = iconv("utf-8","tis-620",$_POST["cprovince"]);
    } else {
        $cprovince = "";
    }
    if (isset($_POST["camphur"])) {
        $camphur = iconv("utf-8","tis-620",$_POST["camphur"]);
    } else {
        $camphur = "";
    }
    if (isset($_POST["cdistrict"])) {
        $cdistrict = iconv("utf-8","tis-620",$_POST["cdistrict"]);
    } else {
        $cdistrict = "";
    }
    if (isset($_POST["czip"])) {
        $czip = $_POST["czip"];
    } else {
        $czip = "";
    }
    if (isset($_POST["chome_t"])) {
        $chome_t = $_POST["chome_t"];
    } else {
        $chome_t = "";
    }
    if (isset($_POST["cmobile"])) {
        $cmobile = $_POST["cmobile"];
    } else {
        $cmobile = "";
    }
    if (isset($_POST["cfax"])) {
        $cfax = $_POST["cfax"];
    } else {
        $cfax = "";
    }
    if (isset($_POST["mcode_acc"])) {
        $mcode_acc = iconv("utf-8","tis-620",$_POST["mcode_acc"]);
    } else {
        $mcode_acc = "";
    }
    if (isset($_POST["bonusrec"])) {
        $bonusrec = $_POST["bonusrec"];
    } else {
        $bonusrec = "";
    }
    if (isset($_POST["bankcode"])) {
        $bankcode = $_POST["bankcode"];
    } else {
        $bankcode = "";
    }
    if (isset($_POST["branch"])) {
        $branch = iconv("utf-8","tis-620",$_POST["branch"]);
    } else {
        $branch = "";
    }
    if (isset($_POST["acc_type"])) {
        $acc_type = iconv("utf-8","tis-620",$_POST["acc_type"]);
    } else {
        $acc_type = "";
    }
    if (isset($_POST["acc_no"])) {
        $acc_no = $_POST["acc_no"];
    } else {
        $acc_no = "";
    }
    if (isset($_POST["acc_name"])) {
        $acc_name = iconv("utf-8","tis-620",$_POST["acc_name"]);
    } else {
        $acc_name = "";
    }
    if (isset($_POST["acc_prov"])) {
        $acc_prov = $_POST["acc_prov"];
    } else {
        $acc_prov = "";
    }
    if (isset($_POST["sv_code"])) {
        $sv_code = $_POST["sv_code"];
    } else {
        $sv_code = "";
    }
    if (isset($_POST["sp_code"])) {
        $sp_code = iconv("utf-8","tis-620",$_POST["sp_code"]);
    } else {
        $sp_code = "";
    }
    if (isset($_POST["sp_name"])) {
        $sp_name = iconv("utf-8","tis-620",$_POST["sp_name"]);
    } else {
        $sp_name = "";
    }
    if (isset($_POST["upa_code"])) {
        $upa_code = $_POST["upa_code"];
    } else {
        $upa_code = "";
    }
    if (isset($_POST["upa_name"])) {
        $upa_name = iconv("utf-8","tis-620",$_POST["upa_name"]);
    } else {
        $upa_name = "";
    }
    if (isset($_POST["inv_code"])) {
        $inv_code = $_POST["inv_code"];
    } else {
        $inv_code = "";
    }
    if (isset($_POST["lr"])) {
        $lr = $_POST["lr"];
    } else {
        $lr = "";
    }
    if (isset($_POST["posid"])) {
        $posid = $_POST["posid"];
    } else {
        $posid = "";
    }
    if (isset($_POST["pos_cur"])) {
        $pos_cur = $_POST["pos_cur"];
    } else {
        $pos_cur = "MB";
    }
    if (isset($_POST["memdesc"])) {
        $memdesc = $_POST["memdesc"];
    } else {
        $memdesc = "";
    }
    if (isset($_POST["cmp2"])) {
        $cmp2 = $_POST["cmp2"];
    } else {
        $cmp2 = "";
    }
    if (isset($_POST["cmp3"])) {
        $cmp3 = $_POST["cmp3"];
    } else {
        $cmp3 = "";
    }
    if (isset($_POST["cmp"])) {
        $cmp = $_POST["cmp"];
    } else {
        $cmp = "";
    }
    if (isset($_POST["ccmp2"])) {
        $ccmp2 = $_POST["ccmp2"];
    } else {
        $ccmp2 = "";
    }
    if (isset($_POST["ccmp3"])) {
        $ccmp3 = $_POST["ccmp3"];
    } else {
        $ccmp3 = "";
    }
    if (isset($_POST["ccmp"])) {
        $ccmp = $_POST["ccmp"];
    } else {
        $ccmp = "";
    }
    if (isset($_POST["ncode"])) {
        $ncode = $_POST["ncode"];
    } else {
        $ncode = "";
    }
    if (isset($_POST["bmdate1"])) {
        $bmdate1 = $_POST["bmdate1"];
    } else {
        $bmdate1 = "";
    }
    if (isset($_POST["bmdate2"])) {
        $bmdate2 = $_POST["bmdate2"];
    } else {
        $bmdate2 = "";
    }
    if (isset($_POST["bmdate3"])) {
        $bmdate3 = $_POST["bmdate3"];
    } else {
        $bmdate3 = "";
    }
    if (isset($_POST["cbmdate1"])) {
        $cbmdate1 = $_POST["cbmdate1"];
    } else {
        $cbmdate1 = "";
    }
    if (isset($_POST["cbmdate2"])) {
        $cbmdate2 = $_POST["cbmdate2"];
    } else {
        $cbmdate2 = "";
    }
    if (isset($_POST["cbmdate3"])) {
        $cbmdate3 = $_POST["cbmdate3"];
    } else {
        $cbmdate3 = "";
    }
    if (isset($_POST["chkaddress"])) {
        $chkaddress = $_POST["chkaddress"];
    } else {
        $chkaddress = "";
    }
    if (isset($_POST["iname_t"])) {
        $iname_t = iconv("utf-8","tis-620",$_POST["iname_t"]);
    } else {
        $iname_t = "";
    }
    if (isset($_POST["iname_f"])) {
        $iname_f = iconv("utf-8","tis-620",$_POST["iname_f"]);
    } else {
        $iname_f = "";
    }
    if (isset($_POST["iname_ff"])) {
        $iname_f = iconv("utf-8","tis-620",$_POST["iname_ff"]);
    }
    if (isset($_POST["irelation"])) {
        $irelation = $_POST["irelation"];
    } else {
        $irelation = "";
    }
    if (isset($_POST["iphone"])) {
        $iphone = $_POST["iphone"];
    } else {
        $iphone = "";
    }
    if (isset($_POST["iid_card"])) {
        $iid_card = $_POST["iid_card"];
    } else {
        $iid_card = "";
    }
    if (isset($_POST["sbook"])) {
        $sbook = $_POST["sbook"];
    } else {
        $sbook = "";
    }
    if (isset($_POST["sbinv_code"])) {
        $sbinv_code = $_POST["sbinv_code"];
    } else {
        $sbinv_code = "";
    }
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
    } else {
        $id = "";
    }
    if (isset($_POST["mcode"])) {
        $mcode = $_POST["mcode"];
    } else {
        $mcode = "";
    }
    if (isset($_POST["inv_code"])) {
        $inv_code = $_POST["inv_code"];
    } else {
        $inv_code = "";
    }
    if (isset($_POST["satype"])) {
        $satype = $_POST["satype"];
    } else {
        $satype = "A";
    }
    if (isset($_POST["sadate"])) {
        $sadate = $_POST["sadate"];
    } else {
        $sadate = date("Y-m-d");
    }
    if (isset($_POST["sumtotal"])) {
        $total = $_POST["sumtotal"];
    } else {
        $total = 0;
    }
    if (isset($_POST["sumpv"])) {
        $tot_pv = $_POST["sumpv"];
    } else {
        $tot_pv = 0;
    }
    if (isset($_POST["sumbv"])) {
        $tot_bv = $_POST["sumbv"];
    } else {
        $tot_bv = "";
    }
    if (isset($_POST["sumfv"])) {
        $tot_fv = $_POST["sumfv"];
    } else {
        $tot_fv = "";
    }
    if (isset($_POST["radsend"])) {
        $radsend = $_POST["radsend"];
    } else {
        $radsend = "";
    }
    if (isset($_POST["line_id"])) {
        $line_id = $_POST["line_id"];
    } else {
        $line_id = "";
    }
    if (isset($_POST["facebook_name"])) {
        $facebook_name = $_POST["facebook_name"];
    } else {
        $facebook_name = "";
    }
    if (isset($_POST["cline_id"])) {
        $cline_id = $_POST["cline_id"];
    } else {
        $cline_id = "";
    }
    if (isset($_POST["cfacebook_name"])) {
        $cfacebook_name = $_POST["cfacebook_name"];
    } else {
        $cfacebook_name = "";
    }
}

$locationbase = '1';

$cdistrict = $district;
$camphur = $amphur;
$cprovince = $province;

$upa_code = lrMost($dbprefix, $sp_code, $lr);
//$birthday = "";

$caddress = $address;
$cstreet = $street;
$cbuilding = $building;
$cvillage = $village;
$csoi = $soi;
$cprovince = $province;
$camphur = $amphur;
$cdistrict = $district;
$czip = $zip;

$mcode = $fmcode . $mcode;



$caddress1 = $caddress . ' ' . $cbuilding . ' ' . $cvillage . ' ' . $csoi . ' ' . $cstreet;

//$upa_name = getMember($dbprefix, $upa_code);
$sp_name = getMember($dbprefix, $sp_code);


if ($id_card == '') {
    $gem = $mcode;
} else {
    $gem = $id_card;
}
$lr='';
$sv_code = substr($gem, -4, 4);
$sql = "insert into " . $dbprefix . "member (id,mcode ,name_f ,name_t ,name_e ,name_b ,sex ,mdate ,birthday ,age ,occupation ,status ,mar_name ,mar_age ,email ,beneficiaries ,relation ,national ,id_tax ,id_card ,address ,provinceId,amphurId,districtId ,zip ,home_t ,fax,mobile ,cid_mobile,mcode_acc, bonusrec ,bankcode ,branch ,acc_type ,acc_no ,acc_name ,acc_prov ,sv_code ,sp_code ,sp_name ,upa_code ,upa_name ,inv_code ,uid ,uidbase,posid,pos_cur,memdesc,lr,cmp,cmp2,cmp3,bmdate1,bmdate2,bmdate3,ccmp,ccmp2,ccmp3,cbmdate1,cbmdate2,cbmdate3,iname_f,iname_t,irelation,iphone,iid_card,sletter,sinv_code
		,cname_f,cname_t,cname_e,cname_b,cbirthday,cnational,cid_tax,cid_card,caddress,czip,chome_t,coffice_t,cmobile,csex,cemail,cdistrictId,camphurId,cprovinceId,cfax
		,street,building,village,soi,cstreet,cbuilding,cvillage,csoi,locationbase,line_id,facebook_name,cline_id,cfacebook_name
		) values ('','$mcode' ,'$name_f' ,'$name_t' ,'$name_e','$name_b' ,'$sex' ,'$mdate' ,'$birthday' ,'$age' ,'$occupation' ,'$status' ,'$mar_name' ,'$mar_age' ,'$email' ,'$beneficiaries' ,'$relation' ,'$national' ,'$id_tax' ,'$id_card' ,'$address'  ,'$province','$amphur','$district' ,'$zip' ,'$home_t' ,'$fax','$mobile' ,'$cid_mobile' , '$mcode_acc' ,'$bonusrec' ,'$bankcode' ,'$branch' ,'$acc_type' ,'$acc_no' ,'$acc_name' ,'$acc_prov' ,'$sv_code' ,'$sp_code' ,'$sp_name' ,'$upa_code' ,'$upa_name' ,'" . $sp_code . "' ,'" . $sp_code . "' ,'" . $locationbase . "','$posid','$pos_cur','$memdesc','$lr','$cmp','$cmp2','$cmp3','$bmdate1','$bmdate2','$bmdate3','$ccmp','$ccmp2','$ccmp3','$cbmdate1','$cbmdate2','$cbmdate3','$iname_f','$iname_t','$irelation','$iphone','$iid_card','$sletter','$sinv_code'
		
		,'$cname_f','$cname_t','$cname_e','$cname_b','$cbirthday','$cnational','$cid_tax','$cid_card','$caddress','$czip','$chome_t','$coffice_t','$cmobile','$csex','$cemail','$cdistrict','$camphur','$cprovince','$cfax'

		,'$street','$building','$village','$soi','$cstreet','$cbuilding','$cvillage','$csoi','" . $locationbase . "','$line_id','$facebook_name','$cline_id','$cfacebook_name'
		) ";



//====================LOG===========================
//$text = "uid=" . $sv_code . " action=memoperate =>$sql";
//writelogfile($text);
//=================END LOG===========================


if (!mysql_query($sql)) {
    echo "Fail!!";
    exit;
} else {
    require("member_reg.php");
}



function getMember($dbprefix, $mcode)
{
    $sql = "select * from " . $dbprefix . "member  where mcode='$mcode' ";
    $query = mysql_query($sql);
    if (mysql_num_rows($query) > 0) {
        $name = mysql_result(mysql_query($sql), 0, 'name_t');
    }
    return $name;
    //$vip_point = mysql_result(mysql_query($sql),0,'tot_pv');
    //return $vip_point;
}

function checkMember($dbprefix, $mcode)
{
    $sql = "select * from " . $dbprefix . "member  where mcode='$mcode' ";
    $query = mysql_query($sql);
    if (mysql_num_rows($query) > 0) {
        echo '
			<SCRIPT LANGUAGE="JavaScript">
			<!--
			    alert("Member Duplicated ' . $mcode . '");
				window.location = "index.php?sessiontab=1" ;
			//-->
			</SCRIPT>
			';
        exit;
    }
    //$vip_point = mysql_result(mysql_query($sql),0,'tot_pv');
    //return $vip_point;
}

function lrMost($dbprefix, $scode, $lr_val)
{
    $sql = "SELECT mcode,lr FROM " . $dbprefix . "member WHERE upa_code='$scode' AND lr='$lr_val' LIMIT 1 ";
    $rs = mysql_query($sql);
    if (mysql_num_rows($rs) <= 0)
        return $scode;
    else
        return lrMost($dbprefix, mysql_result($rs, 0, 'mcode'), $lr_val);

}

?>


