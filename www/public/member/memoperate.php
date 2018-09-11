<?
session_start();
include_once("wording" . $_SESSION["lan"] . ".php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<?
include("connectmysql.php");
include("../api/line_notify.php");
include("prefix.php");
include("gencode.php");
require_once("function.php");
require_once("logtext.php");
require_once("function.log.inc.php");
include("global.php");
require("checklogin.php");
include("../api/HttpClient.php");

if (isset($_GET['state'])) {

    //id_card_img
    if (isset($_POST["id_card_img"])) {
        $id_card_img = $_POST["id_card_img"];
    } else {
        $id_card_img = "";
    }

    //id_bookbank_img2
    if (isset($_POST["id_bookbank_img2"])) {
        $id_bookbank_img2 = $_POST["id_bookbank_img2"];
    } else {
        $id_bookbank_img2 = "";
    }


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
        $name_f = $_POST["name_f"];
    }
    if (isset($_POST["name_ff"])) {
        $name_f = $_POST["name_ff"];
    } else {
        $name_f = "";
    }
    if (isset($_POST["name_t"])) {
        $name_t = $_POST["name_t"];
    } else {
        $name_t = "";
    }
    if (isset($_POST["name_e"])) {
        $name_e = $_POST["name_e"];
    } else {
        $name_e = "";
    }
    if (isset($_POST["name_b"])) {
        $name_b = $_POST["name_b"];
    } else {
        $name_e = "";
    }
    if (isset($_POST["sex"])) {
        $sex = $_POST["sex"];
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
        $cname_f = $_POST["cname_f"];
    } else {
        $cname_f = "";
    }
    if (isset($_POST["cname_ff"])) {
        $cname_f = $_POST["cname_ff"];
    }
    if (isset($_POST["cname_t"])) {
        $cname_t = $_POST["cname_t"];
    } else {
        $cname_t = "";
    }
    if (isset($_POST["cname_e"])) {
        $cname_e = $_POST["cname_e"];
    } else {
        $cname_e = "";
    }
    if (isset($_POST["cname_b"])) {
        $cname_b = $_POST["cname_b"];
    } else {
        $cname_b = "";
    }
    if (isset($_POST["csex"])) {
        $csex = $_POST["csex"];
    } else {
        $csex = "";
    }
//var_dump($_POST);
//echo $name_f;
//echo $cname_f;
//exit;
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
        $address = $_POST["address"];
    } else {
        $address = "";
    }
    if (isset($_POST["street"])) {
        $street = $_POST["street"];
    } else {
        $street = "";
    }
    if (isset($_POST["building"])) {
        $building = $_POST["building"];
    } else {
        $building = "";
    }
    if (isset($_POST["village"])) {
        $village = $_POST["village"];
    } else {
        $village = "";
    }
    if (isset($_POST["soi"])) {
        $soi = $_POST["soi"];
    } else {
        $soi = "";
    }
    if (isset($_POST["province"])) {
        $province = $_POST["province"];
    } else {
        $province = "";
    }
    if (isset($_POST["amphur"])) {
        $amphur = $_POST["amphur"];
    } else {
        $amphur = "";
    }
    if (isset($_POST["district"])) {
        $district = $_POST["district"];
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
        $cid_mobile = $_SESSION["m_locationbase"];
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
        $caddress = $_POST["caddress"];
    } else {
        $caddress = "";
    }
    if (isset($_POST["cstreet"])) {
        $cstreet = $_POST["cstreet"];
    } else {
        $cstreet = "";
    }
    if (isset($_POST["cbuilding"])) {
        $cbuilding = $_POST["cbuilding"];
    } else {
        $cbuilding = "";
    }
    if (isset($_POST["cvillage"])) {
        $cvillage = $_POST["cvillage"];
    } else {
        $cvillage = "";
    }
    if (isset($_POST["csoi"])) {
        $csoi = $_POST["csoi"];
    } else {
        $csoi = "";
    }
    if (isset($_POST["cprovince"])) {
        $cprovince = $_POST["cprovince"];
    } else {
        $cprovince = "";
    }
    if (isset($_POST["camphur"])) {
        $camphur = $_POST["camphur"];
    } else {
        $camphur = "";
    }
    if (isset($_POST["cdistrict"])) {
        $cdistrict = $_POST["cdistrict"];
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
        $mcode_acc = $_POST["mcode_acc"];
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
        $branch = $_POST["branch"];
    } else {
        $branch = "";
    }
    if (isset($_POST["acc_type"])) {
        $acc_type = $_POST["acc_type"];
    } else {
        $acc_type = "";
    }
    if (isset($_POST["acc_no"])) {
        $acc_no = $_POST["acc_no"];
    } else {
        $acc_no = "";
    }
    if (isset($_POST["acc_name"])) {
        $acc_name = $_POST["acc_name"];
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
        $sp_code = $_POST["sp_code"];
    } else {
        $sp_code = "";
    }
    if (isset($_POST["sp_name"])) {
        $sp_name = $_POST["sp_name"];
    } else {
        $sp_name = "";
    }
    if (isset($_POST["upa_code"])) {
        $upa_code = $_POST["upa_code"];
    } else {
        $upa_code = "";
    }
    if (isset($_POST["upa_name"])) {
        $upa_name = $_POST["upa_name"];
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
        $iname_t = $_POST["iname_t"];
    } else {
        $iname_t = "";
    }
    if (isset($_POST["iname_f"])) {
        $iname_f = $_POST["iname_f"];
    } else {
        $iname_f = "";
    }
    if (isset($_POST["iname_ff"])) {
        $iname_f = $_POST["iname_ff"];
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

if (is_numeric($mcode)) {
    if (strlen($mcode) < 7) {
        echo "<script language='JavaScript'>alert('" . $wording_lan["info_main_1"]["40"] . "');window.history.back();</script>";
        exit;
    }
    $mcode = $fmcode . $mcode;
    $sql = "SELECT mcode FROM " . $dbprefix . "member where mcode = '$mcode' ";
    $rs = mysql_query($sql);
    if (mysql_num_rows($rs) > 0) {
        echo "<script language='JavaScript'>alert('" . $wording_lan["info_main_1"]["41"] . "');window.history.back();</script>";
        exit;
    }
} else {
    echo "<script language='JavaScript'>alert('" . $wording_lan["info_main_1"]["42"] . "');window.history.back();</script>";
    exit;
}
$chk_id_card = chk_id_card($mcode, $id_card);
if ($chk_id_card) {
    echo "<script language='JavaScript'>alert('เลขบัตรประชาชนใช้ไม่ได้ค่ะ');window.location='index.php?sessiontab=1&sub=2'</script>";
    exit;
}

function uploadProductImages($file_new, $file_old, $oid)
{
    if (!$file_new['error']) {
        $name_new = generateNewName(10);
        $name_old = $file_old;
        $size = $file_new['size'];
        $type = strrchr($file_new['name'], ".");
        $tmp_name = $file_new["tmp_name"];
        $path = "uploads/";
        if ($size > 1024000) {
            checkValues("ขนาดของไฟล์อัพโหลดต้องมีขนาดไม่เกิน 200Kb ค่ะ");
        }
        if (($type != ".jpg") and ($type != ".jpeg") and ($type != ".gif") and ($type != ".png")) {
            checkValues("นามสกุลไฟล์ต้องเป็น(.jpg .jpeg .gif .png)เท่านั้น");
        }
        if (!empty($name_old)) {
            @unlink($path . $name_old);
        }

        move_uploaded_file($tmp_name, $path . $name_new . $type);
        mysql_query("UPDATE ali_member SET profile_img = '" . $name_new . $type . "' WHERE id = '" . $oid . "' ");

    } else {
        if ($file_old == "") {
            mysql_query("UPDATE ali_member SET profile_img = '' WHERE id = '" . $oid . "' ");
        }
    }
}

function generateNewName($length = 6)
{
    $str = "";
    $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}

function checkValues($remark)
{
    echo "<script language='JavaScript'>alert('" . $remark . "'); window.history.back()</script>";
    exit;
}

function func_check()
{
    $sqll = "SELECT price FROM ali_product WHERE pcode='" . $GLOBALS["pcode_register"] . "'";
    $res = mysql_query($sqll);
    if (mysql_num_rows($res) > 0) {
        $price = mysql_result($res, 0, 'price');
    }

    $sql = "SELECT ewallet FROM ali_member WHERE mcode='" . $_SESSION["usercode"] . "' HAVING ewallet >= '$price'";
    $rs = mysql_query($sql);
    if (mysql_num_rows($rs) < 1) {
        echo "<script language='JavaScript'>alert('" . $wording_lan["operate"]["17"] . "');window.history.back();</script>";
        exit;
    }
}

func_check();
if ($_SESSION["chkdouble"] == '1') {
    $_SESSION["chkdouble"] = 0;
} else {
    echo "<script language='JavaScript'>alert('" . $wording_lan["operate"]["8"] . "');history.back();</script>";
    exit;
}

$locationbase = $_SESSION["m_locationbase"];
if ($locationbase != $_SESSION["m_locationbase"]) {
    //echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["10"]."');window.location='index.php?sessiontab=1'</script>";
    //exit;
}

$mdate = $_SESSION["datetimezone"];
$cmdate = $_SESSION["datetimezone"];

$cdistrict = getdistrict($cdistrict);
$camphur = getamphur($camphur);
$cprovince = getprovince($cprovince);

$district = getdistrict($district);
$amphur = getamphur($amphur);
$province = getprovince($province);


$upa_code = lrMost($dbprefix, $sp_code, $lr);


$result1 = mysql_query("select * from " . $dbprefix . "member where mcode = '{$_SESSION["usercode"]}'");

if (mysql_num_rows($result1) > 0) {
    $row1 = mysql_fetch_object($result1);
    $ewallet = $row1->ewallet;
    //$sql1 = "SELECT *  FROM ".$dbprefix."product where pcode = '".$GLOBALS["pcode_register"]."' ";
    //$rs1 = mysql_query($sql1);
    //$total  = mysql_result($rs1,0,'price');
    //$pdesc  = mysql_result($rs1,0,'pdesc');
    //$tot_pv  = mysql_result($rs1,0,'pv');

    /*if($ewallet < $total){
        echo "<script language='JavaScript'>alert('".$wording_lan["operate"]["11"]."');window.location='index.php?sessiontab=1'</script>";
        exit;
    }*/
}
$result1 = mysql_query("select * from " . $dbprefix . "member where id_card = '$id_card' and id_card <> '' ");
if (mysql_num_rows($result1) > 0) {
    //echo "<script language='JavaScript'>alert('รหัสบัตรประชาขนนี้ได้ทำการสมัครไปเรียบร้อยแล้ว');window.history.back();</script>";
    //exit;
}

//$birthday1 = explode("-",$birthday);
//$birthday1[0] = substr($birthday,4,4);
//$birthday1[1] = substr($birthday,2,2);
//$birthday1[2] = substr($birthday,0,2);
$birthday3 = $birthday3 - 543;
$birthday = $birthday3 . '-' . $birthday2 . '-' . $birthday1;
if (!empty($cbirthday3)) {
    $cbirthday3 = $cbirthday3 - 543;
    $cbirthday = $cbirthday3 . '-' . $cbirthday2 . '-' . $cbirthday1;
} else $cbirthday = "";


if ($chkaddress == '1') {

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

$caddress1 = $caddress . ' ' . $cbuilding . ' ' . $cvillage . ' ' . $csoi . ' ' . $cstreet;

if ($_GET['state'] == 0) {
    $upa_code = strtoupper($upa_code);
    $sp_code = strtoupper($sp_code);
    $upa_name = getMember($dbprefix, $upa_code);
    $sp_name = getMember($dbprefix, $sp_code);
    $sql = "SELECT MAX(mcode) AS code FROM " . $dbprefix . "member";
    $rs = mysql_query($sql);
    $code = mysql_result($rs, 0, 'code');
    //$mcode = gencode_new('',$code+1);
    checkMember($dbprefix, $mcode);
    if ($mcode != 'TH0000001') {
        if (empty($name_t) or empty($upa_code) or empty($sp_code) or ($mcode == $upa_code) or ($mcode == $sp_code)) {
            echo "<script language='JavaScript'>alert('" . $wording_lan["info_main_1"]["57"] . "');window.history.back();</script>";
            exit;
        }
    }
    if (empty($id_card)) {
        echo "<script language='JavaScript'>alert('" . $wording_lan["info_main_1"]["47"] . "');window.history.back();</script>";
        exit;
    }
    if ($id_card == '') {
        $gem = $mcode;
    } else {
        $gem = $id_card;
    }
    $sv_code = substr($gem, -4, 4);
    
    $sql = "insert into " . $dbprefix . "member (id,mcode ,name_f ,name_t ,name_e ,name_b ,sex ,mdate ,birthday ,age ,occupation ,status ,mar_name ,mar_age ,email ,beneficiaries ,relation ,national ,id_tax ,id_card ,address ,provinceId,amphurId,districtId ,zip ,home_t ,fax,mobile ,cid_mobile,mcode_acc, bonusrec ,bankcode ,branch ,acc_type ,acc_no ,acc_name ,acc_prov ,sv_code ,sp_code ,sp_name ,upa_code ,upa_name ,inv_code ,uid ,uidbase,posid,pos_cur,memdesc,lr,cmp,cmp2,cmp3,bmdate1,bmdate2,bmdate3,ccmp,ccmp2,ccmp3,cbmdate1,cbmdate2,cbmdate3,iname_f,iname_t,irelation,iphone,iid_card,sletter,sinv_code
		,cname_f,cname_t,cname_e,cname_b,cbirthday,cnational,cid_tax,cid_card,caddress,czip,chome_t,coffice_t,cmobile,csex,cemail,cdistrictId,camphurId,cprovinceId,cfax
		,street,building,village,soi,cstreet,cbuilding,cvillage,csoi,locationbase,line_id,facebook_name,cline_id,cfacebook_name,id_card_img,acc_no_img
		) values ('','$mcode' ,'$name_f' ,'$name_t' ,'$name_e','$name_b' ,'$sex' ,'$mdate' ,'$birthday' ,'$age' ,'$occupation' ,'$status' ,'$mar_name' ,'$mar_age' ,'$email' ,'$beneficiaries' ,'$relation' ,'$national' ,'$id_tax' ,'$id_card' ,'$address'  ,'$province','$amphur','$district' ,'$zip' ,'$home_t' ,'$fax','$mobile' ,'$cid_mobile' , '$mcode_acc' ,'$bonusrec' ,'$bankcode' ,'$branch' ,'$acc_type' ,'$acc_no' ,'$acc_name' ,'$acc_prov' ,'$sv_code' ,'$sp_code' ,'$sp_name' ,'' ,'' ,'" . $_SESSION["usercode"] . "' ,'" . $_SESSION["usercode"] . "' ,'" . $_SESSION["m_locationbase"] . "','$posid','$pos_cur','$memdesc','$lr','$cmp','$cmp2','$cmp3','$bmdate1','$bmdate2','$bmdate3','$ccmp','$ccmp2','$ccmp3','$cbmdate1','$cbmdate2','$cbmdate3','$iname_f','$iname_t','$irelation','$iphone','$iid_card','$sletter','$sinv_code'
		
		,'$cname_f','$cname_t','$cname_e','$cname_b','$cbirthday','$cnational','$cid_tax','$cid_card','$caddress','$czip','$chome_t','$coffice_t','$cmobile','$csex','$cemail','$cdistrict','$camphur','$cprovince','$cfax'

		,'$street','$building','$village','$soi','$cstreet','$cbuilding','$cvillage','$csoi','" . $_SESSION["m_locationbase"] . "','$line_id','$facebook_name','$cline_id','$cfacebook_name','$id_card_img','$id_bookbank_img2'
		) ";
// echo $sql;
// exit;
    //====================LOG===========================
    $text = "uid=" . $_SESSION["usercode"] . " action=memoperate =>$sql";
    writelogfile($text);
    //=================END LOG===========================
    //$link =  mysql_query($sql);
    if (!mysql_query($sql)) {
        echo "<script language='JavaScript'>alert('" . $wording_lan["operate"]["6"] . "');window.location='index.php?sessiontab=1&sub=3'</script>";
        exit;
    } else {
        //mysql_free_result($rs);

        if (!empty($mobile)) {
            $msisdn = $mobile;
            $subname = substr($name_t, 0, 17);
            $message = $wording_lan["sms"]["company"] . "" . $wording_lan["tab1_7"] . "$subname " . $wording_lan["tab3_3"] . " $mcode " . $wording_lan["login_4"] . " $sv_code";
            sendsms($dbprefix, $msisdn, $message, $ScheduledDelivery = "", $mcode);

        }

        $select = "select max(id) as id from  " . $dbprefix . "member";
        $rs = mysql_query($select);
        $idi = mysql_result($rs, 0, 'id');

        uploadProductImages($_FILES['profileimg'], $_POST["profile_img"], $idi);


        if ($_SESSION["type_regist"] == 3) {
            require('sale_register.php');  // sale register
        } else if ($_SESSION["type_regist"] == 2) {
            require("hold_register.php"); // hold register
        } else if ($_SESSION["type_regist"] == 1) {
            //open
            require("register.php");
        }
        if (!empty($email)) {
            send_email_register($email, $name_f, $name_t, $mcode);
            //send_email_register($email,"",$sp_name,$sp_code);
            //send_email_register($email,"",$upa_name,$upa_code);
        }
        //logtext(true,$_SESSION['usercode'],$wording_lan["tab1_4"],$insert_id);

        #Request to p-enterpriser.com/api/member/main/ticker?mcode=TH1234568
        $tickData->mcode = $hono;
        $tickData->action = 'add';
        echo json_encode($tickData);

        $client = new HttpClient("/members/main/ticker/");
        $client->push($tickData);

        LineNotify::notify_message('สมัครสมาชิก' . $mcode . 'กรุณาเข้าไปทำการตรวจเอกสาร');

        //====================LOG===========================
        $text = "uid=" . $_SESSION["usercode"] . " action=memoperate =>$sql";
        writelogfile($text);
        //=================END LOG===========================
        //mysql_query($sql);
        ob_end_clean();
        //include "mem_main.php";

        //func_first_register($mcode,$sadate);
        //exit;

        echo "<script language='JavaScript'>window.location='index.php?sessiontab=1&sub=8&cmc=$mcode&bid=$mid'</script>";
    }


} else if ($_GET['state'] == 1 && !system_code($mcode)) {
    //logtext(true,$_SESSION['usercode'],'".$wording_lan["tab1_mem_98"]."',$oid);
    session_destroy();
}
function system_code($code)
{
    $sys_code = array('');
    $code = strtoupper($code);
    for ($i = 0; $i < sizeof($sys_code); $i++) {
        if ($sys_code === $code)
            return true;
    }
    return false;
}

function genformorecode($start, $ncode)
{
    $stk[0] = $start;
    $k = 0;
    for ($i = 1; $i < $ncode; $i++) {
        $mcodelist[$i - 1] = gencode($start + $i);//"TH"."".""
        $stk[sizeof($stk)] = $mcodelist[$i - 1];
        $upa_codelist[$mcodelist[$i - 1]] = $stk[$k];
        $lrlist[$mcodelist[$i - 1]] = ($i % 2 == 0 ? 1 : 0) + 1;
        if ($i % 2 == 0) $k++;
    }
    //print_r($mcodelist);
    //print_r($upa_codelist);
    return array($mcodelist, $upa_codelist, $lrlist);
}

//ผมเอง
function chkTranslateReceiptID($id)
{
    $TypeFormat = "0000";
    if (!empty($id)) {
        $newVal = genCounterInt($id, $TypeFormat);
    } else {
        $newVal = "0001";
    }
    return $newVal;
}

function genCounterInt($Val, $TypeFormat)
{
    $nFormat = $TypeFormat;
    $nSize = strlen($nFormat);
    $numShow = substr($nFormat, 0, $nSize - strlen((string)(intval($Val + 1)))) . (int)(intval($Val) + 1);

    return $numShow;
}

function getVIP($dbprefix, $mcode)
{
    $sql = "select sum(tot_pv) as tot_pv from " . $dbprefix . "special_point  where mcode='$mcode' group by mcode";
    $vip_point = mysql_result(mysql_query($sql), 0, 'tot_pv');
    return $vip_point;
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

