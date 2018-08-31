<? session_start(); ?>
<?
if ($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])) {
    if (empty($_GET["lan"])) $_SESSION["lan"] = "TH";
    else $_SESSION["lan"] = $_GET["lan"];
} else {
    if (empty($_SESSION["lan"])) $_SESSION["lan"] = "TH";
}
include_once("../member/wording" . $_SESSION["lan"] . ".php");
header("Expires: Sat, 1 Jan 2005 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

//��˹� header �͹�Ѻ
header("content-type: application/x-javascript; charset=utf8");

include("prefix.php");
include("connectmysql.php");
include("../api/settings.php");

$value = (isset($_POST["value"])) ? $_POST["value"] : $_GET["value"];
$mcode1 = $_SESSION["usercode"];

//$value = "0000005";
//  if(!empty($value) and isLine($dbprefix,$value,$_SESSION["usercode"])){
// if(!empty($value) and (isLine($dbprefix,$_SESSION["usercode"],$value) or isLine($dbprefix,$value,$_SESSION["usercode"])) ){
$sql = "SELECT mtype1 ";
$sql .= " FROM " . $dbprefix . "member  where mcode = '$mcode1' ";
$sql .= " limit 0,1";
$result = mysql_query($sql) or die("ระบบไม่สามารถค้นหาได้");
$data = mysql_fetch_object($result);
$mtype1 = $data->mtype1;

if ($mtype1 == 0) $chkline = isLine("ali_", $value, $_SESSION["usercode"]);

else $chkline = true;

if (!empty($value)) {
    $sql = "SELECT locationbase,ewallet,pos_cur,pos_cur1,name_t,name_f,mcode,
    caddress,cbuilding,cvillage,csoi,cstreet,czip,cprovinceId,cdistrictId,camphurId,
    status_terminate, cmp, mdate, id_card_img ";
    $sql .= $sqlmtype;

    $sql .= " FROM " . $dbprefix . "member  where mcode = '$value'  limit 0,1";

    $result = mysql_query($sql) or die("ระบบไม่สามารถค้นหาได้");
    if (mysql_num_rows($result) > 0 and $chkline == true) {
        $data = mysql_fetch_object($result);
        $cmc = $data->mcode;
        $caddress = $data->caddress;
        $cbuilding = $data->cbuilding;
        $cvillage = $data->cvillage;
        $csoi = $data->csoi;
        $ewallet = $data->ewallet;
        $cstreet = $data->cstreet;
        $caddress = $caddress . ' ' . $cbuilding . ' ' . $cvillage . ' ' . $csoi . ' ' . $cstreet;
        $cprovinceId = $data->cprovinceId;
        $cdistrictId = $data->cdistrictId;
        $camphurId = $data->camphurId;
        $pos_cur = $data->pos_cur;
        $mtype1 = $data->mtype;
        $pos_cur2 = $data->pos_cur2;
        $locationbase = $data->locationbase;
        $terminate = $data->status_terminate;
        $czip = $data->czip;
        $cmp = $data->cmp;
        $chkshow = "";

        if (!empty($data->name_f)) $chkshow .= $data->name_f . ' ';
        $chkshow .= $data->name_t . ' <br>';

        $chkshow .= $wording_lan["tab2_1_8"] . ': ' . $pos_cur . '<br>';
        $chkshow .= $wording_lan["tab1_1_5"] . ': ' . $mtype1 . '<br>';

        if ($terminate != 0) {
            echo "memterminate";
            exit;
        }
        if ($cmp == "") {
            if ($data->id_card_img != "") {
                echo $chkshow;
            } else {
                $currentDate = date_create(date('Y-m-d'));
                $regDate = date_create($data->mdate);
                $diff = date_diff($currentDate, $regDate);
                if ($diff->days > $REG_DATE_GAP) {
                    echo "idCard";
                    exit;
                }
                echo $chkshow;
            }
        }
        if ($locationbase != $_SESSION["m_locationbase"]) {
            echo "1234";
            exit;
        }
        echo $chkshow;
    } else {
        echo "1234";
    }

} else {
    echo '1234';
}

function isLine($dbprefix, $scode, $testcode)
{
    $sql = "SELECT upa_code FROM " . $dbprefix . "member WHERE mcode='$scode' LIMIT 1 ";
    $rs = mysql_query($sql);
    if ($scode == $testcode)
        return true;
    if (mysql_num_rows($rs) <= 0)
        return false;
    else if (mysql_result($rs, 0, 'upa_code') != $testcode)
        return isLine($dbprefix, mysql_result($rs, 0, 'upa_code'), $testcode);
    else
        return true;
}

function gettotalpv($dbprefix, $mcode)
{
    $sql3 = "select mcode, SUM(tot_pv) AS tot_pv from " . $dbprefix . "special_point WHERE  sa_type='VA' AND mcode='$mcode' group by mcode ";
    //if($mcode == '0000075')echo "$sql3<BR>";
    $rs3 = mysql_query($sql3);
    if (mysql_num_rows($rs3) > 0) {
        $sqlObj3 = mysql_fetch_object($rs3);
        $total_fv3 = $sqlObj3->tot_pv;
    } else {
        $total_fv3 = 0;
    }
    mysql_free_result($rs3);
    //if($mcode == '0000075')echo "$total_fv3<BR>";
    return $total_fv3;
}

?>