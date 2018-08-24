<?php
/**
 * Created by PhpStorm.
 * User: saintent
 * Date: 4/7/2018 AD
 * Time: 01:18
 */
include("../share/database.php");
include("../share/prefix.php");
include_once("../function/function_pos.php");


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
    $satype = "";
}
if (isset($_POST["sadate"])) {
    $sadate = $_POST["sadate"];
} else {
    $sadate = "";
}
if (isset($_POST["sumtotal"])) {
    $total = $_POST["sumtotal"];
} else {
    $total = "";
}
if (isset($_POST["sumpv"])) {
    $tot_pv = $_POST["sumpv"];
} else {
    $tot_pv = "";
}

if (isset($_POST["usercode"])) {
    $user_code = $_POST["usercode"];
} else {
    $user_code = "";
}

//$name_f = $_POST["name_f"];
//$name_t = $_POST["name_t"];

//function create_hold_statement($obj)

$sql = "SELECT pos_cur,name_t,caddress,czip,cdistrictId,camphurId,cprovinceId,name_f,mtype1,status_terminate from " . $dbprefix . "member WHERE mcode='$mcode' ";
$rs = mysql_query($sql);
$pos_old = '';
if (mysql_num_rows($rs) > 0) {
    $pos_old = mysql_result($rs, 0, 'pos_cur');
    $name_t = mysql_result($rs, 0, 'name_t');
    $name_f = mysql_result($rs, 0, 'name_f');
    $mtype1 = mysql_result($rs, 0, 'mtype1');
    $status_terminate = mysql_result($rs, 0, 'status_terminate');
}


//{
$sql = "SELECT MAX(id) AS id FROM  ali_holdhead";
$rs = mysql_query($sql);
$mid = $hono = mysql_result($rs, 0, 'id');
$mid = ++$hono;
$sql = "insert into  ali_holdhead (id, hono, sano, sadate, mcode, sa_type, inv_code, total,bprice, tot_pv, uid, locationbase, name_f,name_t ,crate,ref)";
$sql .= "values ('$mid' ,'$hono' , 0 ,'$sadate','$mcode', '$satype' ,'$inv_code' ,'$total' ,'$tot_base','$tot_pv','$user_code', 1 ,'$name_f','$name_t', 1,'$user_code')";
//exit;
//logtext(true,$_SESSION['adminusercode'],$wording_lan["tab1_mem_108"],$mid);

if (!mysql_query($sql)) {
    $response->code = '500';
    $response->err = 'Sql insert fail';
    print(json_encode($response));
    exit;
}
if ($satype == 'A') getInsert_bm('ali_bm1', $hono, $mcode, $pos_cur, $tot_pv, $sadate, $sadate);
if ($satype == 'A') updatePos($dbprefix, $mcode, $sadate, $tot_pv, $satype);

updatehpv2($dbprefix, $user_code, $tot_pv);


if ($satype == 'Y') $option = "Transfer Out ($hono)";
else $option = "PV Out ($hono)";
log_ewallet('hpv', $user_code, $hono, $tot_pv, 'O', date("Y-m-d"), $option);


if ($satype == 'Y') {
    if ($satype == 'Y') $option = "Transfer IN ($hono)";
    updatehpv1($dbprefix, $mcode, $tot_pv);
    log_ewallet('hpv', $mcode, $hono, $tot_pv, 'I', date("Y-m-d"), $option);
}

$response->code = '200';
$response->data = 'success';
print(json_encode($response));

?>