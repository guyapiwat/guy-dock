<?
set_time_limit(0);
ini_set("memory_limit", "1024M");
ob_start();
session_start();
if ($_SESSION["adminusercode"] != '') {
    header('Content-type: application/pdf');
    ?>
    <? include("../backoffice/connectmysql.php"); ?>
    <? include("../function/function_pos.php"); ?>
    <? include("money2text.php"); ?>
    <? include("inc.wording.php"); ?>
    <? ob_start(); ?>
    <?
    if (isset($_GET['bid']))
        $id = $_GET['bid'];
    $mcode = $_GET['mcode'];
    $fdate = $_GET['fdate'];
    $tdate = $_GET['tdate'];
    $type = $_GET['type'];
    $sale = $_GET['sale'];
    $total = $_GET['$total'];
    $inv = $_GET['inv'];
    $send = $_GET['send'];
    $logistic = $_GET['logistic'];
    $sender = $_GET['sender'];
    $receive = $_GET['receive'];
    $sregister = $_GET['sregister'];
    $sspv = $_GET['sspv'];
    $uid = $_GET['uid'];
    $total_x = $_GET['total_x'];

    $tttt = explode('-', $total_x);
    $total1 = $tttt[0];
    $total2 = $tttt[1];

    $dbprefix = "ali_";
    $employee_name = $wording_lan["company_name"];
    $wherexx = findBills("sano", "ali_asaleh", $id);
    if (!empty($wherexx)) $andxx = 'and';
    ?>
    <?

    $sql = "SELECT *," . $dbprefix . "asaleh.id as isis," . $dbprefix . "asaleh.uid as uidd FROM " . $dbprefix . "asaleh ";
//$sql .= " LEFT JOIN district ON (".$dbprefix."asaleh.cdistrictId=district.districtId)";
//$sql .= " LEFT JOIN amphur ON (".$dbprefix."asaleh.camphurId=amphur.amphurId)";
//$sql .= " LEFT JOIN province ON (".$dbprefix."asaleh.cprovinceId=province.provinceId)   ";
    $sql .= " LEFT JOIN " . $dbprefix . "invent ON (" . $dbprefix . "asaleh.inv_code=" . $dbprefix . "invent.inv_code) WHERE 1=1 $andxx $wherexx ";
    $sql .= "and sa_type <> 'TI' and sa_type <> 'TO' ";
    if (!empty($sale)) {
        if ($sale == 'A') $sql .= " and cancel = '0' ";
        else $sql .= " and cancel = '$sale' ";
    }
    if (!empty($fdate)) {
        $sql .= " and sadate >= '$fdate'  and sadate <= '$tdate'  ";
    }
    if ($mcode != "") {
        $sql .= " and mcode ='$mcode' ";
    }
    if ($type != "") {
        $sql .= " and sa_type ='$type' ";
    }
    if ($total > 0) {
        $sql .= " and total ='$total' ";
    }
    if ($sender <> '') {
        $sql .= " and sender ='$sender' ";
    }
    if ($send <> '') {
        $sql .= " and send ='$send' ";
    }
    if ($logistic <> '') {
        $sql .= " and send ='$logistic' ";
    }
    if ($receive <> '') {
        $sql .= " and receive ='$receive' ";
    }
    if ($inv != "") {
        $sql .= " and ali_asaleh.lid ='$inv' ";
    }
    if ($uid != "") {
        $sql .= " and ali_asaleh.uid ='$uid' ";
    }
    if ($sregister != "") {
        $sql .= " and ali_asaleh.scheck ='$sregister' ";
    }
    if ($sspv != "") {
        $sql .= " and ali_asaleh.checkportal ='$sspv' ";
    }
    if ($total_x != "") {
        $sql .= " and total >= '$total1'  and total <= '$total2'  ";
    }
    $sqlLog1 = "SELECT sys_id,logdate,logtime FROM " . $dbprefix . "log  WHERE object ='$sano' and subject = 'เพิ่มบิล' order by id desc";
    $sqlLog2 = "SELECT sys_id,logdate,logtime  FROM " . $dbprefix . "log  WHERE object ='$sano' and subject = 'แก้ไขบิล' order by id desc";


    $rs = mysql_query($sql);
    if (mysql_num_rows($rs) <= 0) {
        ?>
        <table width="300" align="center" bgcolor="#990000">
        <tr>
            <td align="center">ไม่พบข้อมูลของบิลเลขที่ <?= $sano ?>
                <br/><input type="button" value="ปิดหน้านี้" onClick="window.close()"/></td>
        </tr></table><?
        exit;
    }


    $typedef = $arr_satype_show_bill;
    for ($i = 0; $i < mysql_num_rows($rs); $i++) {
        $obj = mysql_fetch_object($rs);
        $bill[$i] = $obj->isis;
        $sano[$i] = $obj->sano;
        $mcode[$i] = $obj->mcode;
        $id_card[$i] = $obj->id_card;
        $name_f[$i] = $obj->name_f;
        $name_t[$i] = $obj->name_t;
        $name_all[$i] = $name_f[$i] . $name_t[$i];
        if ($obj->cname != '' and $obj->cname != $name_all[$i]) {
            $cmobile[$i] = $obj->cmobile . " ( ชื่อผู้รับ : " . $obj->cname . " )";
        } else {
            $cmobile[$i] = $obj->cmobile;
        }
        $uid[$i] = $obj->uidd;
        $refer[$i] = $obj->ref;
        $selectqq = "select * from " . $dbprefix . "user where usercode = '$uid[$i]' ";
        $query = mysql_query($selectqq);
        $objse = mysql_fetch_object($query);
        //$uid[$i] = $objse->username;
        $sa_type[$i] = $obj->sa_type;

        $pv[$i] = $obj->tot_pv;
        $total[$i] = $obj->total;
        $sadate[$i] = $obj->sadate;
        $sctime[$i] = $obj->sctime;
        $date_time[$i] = explode(" ", $sctime[$i]);
        //$sadate = explode('-',$sadate[$i]);
        //$sadate = $sadate[2].'-'.$sadate[1].'-'.$sadate[0];
        $txtoption[$i] = $obj->txtoption;
        $remark[$i] = $obj->remark;
        //if(!empty($txtoption[$i]))
        $send[$i] = $obj->send;
        //if($send[$i] == '1')$send[$i] = '';else $send[$i]  = "";
        $chkCash[$i] = $obj->chkCash;
        $chkFuture[$i] = $obj->chkFuture;
        $chkTransfer[$i] = $obj->chkTransfer;
        $chkCredit1[$i] = $obj->chkCredit1;
        $chkCredit2[$i] = $obj->chkCredit2;
        $chkCredit3[$i] = $obj->chkCredit3;
        $inv_code[$i] = $obj->inv_code;
        if (empty($inv_code[$i])) $inv_code[$i] = 'Head Office';

        $add[$mcode[$i]] = $obj->caddress;
        $add[$mcode[$i]] .= $obj->cdistrictId == "" ? "" : " ต." . $obj->cdistrictId;
        $add[$mcode[$i]] .= $obj->camphurId == "" ? "" : " อ." . $obj->camphurId;
        $add[$mcode[$i]] .= $obj->cprovinceId == "" ? "" : " จ." . $obj->cprovinceId;
        $add[$mcode[$i]] .= " " . $obj->czip;


        $rs1 = mysql_query($sqlLog1);
        if (mysql_num_rows($rs1) > 0) {
            $obj1 = mysql_fetch_object($rs1);
            $uid1[$i] = $obj1->sys_id;
            $selectqq = "select * from " . $dbprefix . "user where usercode = '$uid1[$i]' ";
            $query = mysql_query($selectqq);
            $objse = mysql_fetch_object($query);
            $uid1[$i] = $objse->username;
            $logdate1[$i] = $obj1->logdate;
            $logdate11 = explode('-', $logdate1[$i]);
            $logdate11 = $logdate11[2] . '-' . $logdate11[1] . '-' . $logdate11[0];
            $logtime1[$i] = $obj1->logtime;
        }
        $rs2 = mysql_query($sqlLog2);
        if (mysql_num_rows($rs2) > 0) {
            $obj2 = mysql_fetch_object($rs2);
            $uid2[$i] = $obj2->sys_id;
            $selectqq = "select * from " . $dbprefix . "user where usercode = '$uid2[$i]' ";
            $query = mysql_query($selectqq);
            $objse = mysql_fetch_object($query);
            $uid2[$i] = $objse->username;
            $logdate2[$i] = $obj2->logdate;
            $logdate21 = explode('-', $logdate2[$i]);
            $logdate21 = $logdate21[2] . '-' . $logdate21[1] . '-' . $logdate21[0];
            $logtime2[$i] = $obj2->logtime;
        }


        $txtCash[$i] = $obj->txtCash;
        $txtVoucher[$i] = $obj->txtVoucher;
        $txtFuture[$i] = $obj->txtFuture;
        $txtTransfer[$i] = $obj->txtTransfer;
        $txtInternet[$i] = $obj->txtInternet;
        $txtCredit1[$i] = $obj->txtCredit1;
        $txtCredit2[$i] = $obj->txtCredit2;
        $txtCredit3[$i] = $obj->txtCredit3;
        $txtOther[$i] = $obj->txtOther;
        $optionCash[$i] = $obj->optionCash;
        $optionFuture[$i] = $obj->optionFuture;
        $optionTransfer[$i] = $obj->optionTransfer;
        $optionInternet[$i] = $obj->optionInternet;
        $optionCredit1[$i] = $obj->optionCredit1;
        $optionCredit2[$i] = $obj->optionCredit2;
        $optionCredit3[$i] = $obj->optionCredit3;
        $optionOther[$i] = $obj->optionOther;

        /////////////////// vet ///////////////
        $total_vat[$i] = $obj->total_vat;
        $total_invat[$i] = $obj->total_invat;
        /////////////////// vet ///////////////

        if ($refer[$i] != "") {
            $sql = "SELECT name_t FROM ali_member WHERE mcode='$refer[$i]'";
            //echo $sql;
            $rs = mysql_query($sql);
            if (mysql_num_rows($rs) > 0) {
                $name_ref = mysql_result($rs, 0, 'name_t');
            } else {
                $name_ref = "";
            }
        } else {
            $name_ref = "";
        }

        $txtAllCredit[$i] = $txtCredit1[$i] + $txtCredit2[$i] + $txtCredit3[$i];
        $txtShow[$i] = "";
        $kk = 0;
        $set_payment = query("*", 'ali_payment ash ', " 1=1 and shows = 1 ");
        foreach ($set_payment as $key => $val):
            $text = 'txt' . $val['payment_column'];
            $option = 'option' . $val['payment_column'];
            $select = 'select' . $val['payment_column'];
            $chk_payment = query(" {$text},{$option},{$select} ", 'ali_asaleh ash ', " ash.{$text} > 0 and ash.sano = '{$obj->sano}' ");

            if (count($chk_payment) > 0):
                $select_payment = query(" pay_desc,pm.payment_name ", 'ali_payment_type pmt ', " pmt.id = '{$chk_payment[0][$select]}' ", "LEFT JOIN ali_payment pm ON(pm.id = pmt.payment_id)");
                $textshows[$obj->sano][$kk]['text'] = $val['payment_name'];
                $textshows[$obj->sano][$kk]['total'] = $chk_payment[0][$text];
                if ($chk_payment[0][$option]) $textshows[$obj->sano][$kk]['option'] = "(" . $chk_payment[0][$option] . ")";
                $textshows[$obj->sano][$kk]['select'] = $select_payment[0]['pay_desc'];
                $kk++;
            endif;
        endforeach;


        $sql2 = "SELECT * FROM " . $dbprefix . "member m ";
        /*     $sql2 .= "LEFT JOIN district ON (m.districtId=district.districtId)";
            $sql2 .= "LEFT JOIN amphur ON (m.amphurId=amphur.amphurId)";
            $sql2 .= "LEFT JOIN province ON (m.provinceId=province.provinceId)"; */
        $sql2 .= "WHERE m.mcode='" . $mcode[$i] . "' LIMIT 1 ";

        $rs2 = mysql_query($sql2);
        if (mysql_num_rows($rs2) > 0) {
            $id_card[$mcode[$i]] = mysql_result($rs2, 0, 'id_card');
            $name[$mcode[$i]] = mysql_result($rs2, 0, 'name_t');
            $sp_code[$mcode[$i]] = mysql_result($rs2, 0, 'sp_code');
            $sp_name[$mcode[$i]] = mysql_result($rs2, 0, 'sp_name');
            $mobile = mysql_result($rs2, 0, 'mobile');
            if ($send[$i] <> "1") {
                $districtId = mysql_result($rs2, 0, 'cdistrictId');
                $amphurId = mysql_result($rs2, 0, 'camphurId');
                $provinceId = mysql_result($rs2, 0, 'cprovinceId');
                /* 			$districtName=mysql_result($rs2,0,'districtName');
                            $amphurName=mysql_result($rs2,0,'amphurName');
                            $provinceName=mysql_result($rs2,0,'provinceName'); */

                $add[$mcode[$i]] = mysql_result($rs2, 0, 'caddress');
                $add[$mcode[$i]] .= $districtId == "" ? "" : " ต." . $districtId;
                $add[$mcode[$i]] .= $amphurId == "" ? "" : " อ." . $amphurId;
                $add[$mcode[$i]] .= $provinceId == "" ? "" : " จ." . $provinceId;
                $add[$mcode[$i]] .= mysql_result($rs2, 0, 'czip');

            }
        }
        mysql_free_result($rs2);


        $sql2 = "SELECT * FROM " . $dbprefix . "member ";
        $sql2 .= "WHERE mcode='" . $uid[$i] . "' LIMIT 1 ";

        $rs2 = mysql_query($sql2);
        if (mysql_num_rows($rs2) > 0) {
            $uid_name[$i] = mysql_result($rs2, 0, 'name_t');
            mysql_free_result($rs2);
        }
    }

    $nitem = 25;
    $xpage[0] = 0;
    for ($i = 0; $i < sizeof($bill); $i++) {
        $okpage = 1;
        $sql = "SELECT * FROM " . $dbprefix . "asaled WHERE sano='$bill[$i]' ";
        $rs = mysql_query($sql);
        for ($ii = 0; $ii < mysql_num_rows($rs); $ii++) {
            $obj = mysql_fetch_object($rs);
            $xpcode = $obj->pcode;
            $chkplus++;
            $sqlxx = "SELECT * FROM ali_product_package1 WHERE package = '$xpcode' ";
            $rsxx = mysql_query($sqlxx);
            $chkplus += mysql_num_rows($rsxx);
            //echo $chkplus.'<br>';
            if ($chkplus > $nitem) {
                $xpage[$okpage] = $ii;
                $okpage++;
                $chkplus = mysql_num_rows($rsxx);
            }
        }
        $npage = $okpage;
    }
    if ($chkplus > 0) $xpage[$okpage] = $ii;

    list($y, $m, $d) = explode('-', date("Y-m-d"));
    mysql_free_result($rs);
    define('FPDF_FONTPATH', '../backoffice/fpdf/font/');
//require('../backoffice/fpdf/fpdf.php'); 
//$pdf=new FPDF('P','mm','A4');
    require('../backoffice/fpdf/FpdfBarcode.php');
    $pdf = new FpdfBarcode('P', 'mm', 'A4');

    $pdf->AddFont('angsa', '', 'angsa.php');
    $rem = 0;
    for ($i = 0; $i < sizeof($bill); $i++) {
        $sql = "SELECT * FROM " . $dbprefix . "asaled WHERE sano='$bill[$i]' ";

        $rs = mysql_query($sql);
        $ddddd = testxx($rs) + mysql_num_rows($rs);
        //$npage = ceil(mysql_num_rows($rs)/$nitem);
        mysql_free_result($rs);
        $sum = 0;
        $sumpv = 0;
        for ($k = 0; $k < $npage; $k++) {
            //$sql="SELECT * FROM ".$dbprefix."asaled WHERE sano='$bill[$i]' LIMIT ".($k*$nitem).", $nitem ";
            $sql = "SELECT * FROM " . $dbprefix . "asaled WHERE sano='$bill[$i]'  ORDER BY id ASC   LIMIT " . $xpage[$k] . ", " . ($xpage[$k + 1] - $xpage[$k]) . " ";
            $rs = mysql_query($sql);

            $sql_dis = "SELECT * FROM " . $dbprefix . "asaled WHERE sano='$bill[$i]' and pcode = 'D001' LIMIT 0,1";
            $rs_dis = mysql_query($sql_dis);

            $pdf->AddPage();
            $pdf->SetTopMargin(0);
            $pdf->SetRightMargin(0);
            $offsetx = 0;
            $offsety = 0;
            $offsettab = 19;
            $offsetnline = 4;
            $pdf->SetFont('angsa', '', 14);
            $pdf->SetY($offsety + $offsetnline + 5);
            $pdf->SetX($offsetx + $offsettab);
            $pdf->Cell($offsettab, 10, $logo, 0, 0, "L");
            $pdf->Image('../logo.jpg', $offsetx + $offsettab - 10, $offsety + $offsetnline, 20);

            $pdf->SetFont('angsa', '', 14);
            $pdf->SetY($offsety + $offsetnline - 1);
            $pdf->SetX($offsetx + (2 * $offsettab) + 5);
            switch ($inv_code[$i]) {
                case 'BKK01':
                    $pdf->Cell((4 * $offsettab), 10, "$employee_name" . " (สนญ.)", 0, 0, "L");
                    $c_address_1 = $wording_lan["company_address"];
                    $c_address_2 = $wording_lan["company_address2"];
                    break;
                case 'HY01':
                    $pdf->Cell((4 * $offsettab), 10, "$employee_name" . " (สาขาหาดใหญ่)", 0, 0, "L");
                    $c_address_1 = $wording_lan["company_address_hdy"];
                    $c_address_2 = $wording_lan["company_address2_hdy"];
                    break;
                case 'KL01':
                    $pdf->Cell((4 * $offsettab), 10, "$employee_name" . " (สาขาโคราช)", 0, 0, "L");
                    $c_address_1 = $wording_lan["company_address_kl"];
                    $c_address_2 = $wording_lan["company_address2_kl"];
                    break;
                case 'CRI01':
                    $pdf->Cell((4 * $offsettab), 10, "$employee_name" . " (สาขาเชียงราย)", 0, 0, "L");
                    $c_address_1 = $wording_lan["company_address_cri"];
                    $c_address_2 = $wording_lan["company_address2_cri"];
                    break;
                default:
                    $pdf->Cell((4 * $offsettab), 10, "$employee_name" . " (สนญ.)", 0, 0, "L");
                    $c_address_1 = $wording_lan["company_address"];
                    $c_address_2 = $wording_lan["company_address2"];
                    break;
            }

            $pdf->SetY($offsety + 2 * $offsetnline - 0.5);
            $pdf->SetX($offsetx + (2 * $offsettab) + 5);
            $pdf->Cell((4 * $offsettab), 10, $c_address_1, 0, 0, "L");

            $pdf->SetY($offsety + 2 * $offsetnline + 4);
            $pdf->SetX($offsetx + (2 * $offsettab) + 5);
            $pdf->Cell((4 * $offsettab), 10, $c_address_2, 0, 0, "L");

            $pdf->SetY($offsety + 3 * $offsetnline);
            $pdf->SetX($offsetx + (2 * $offsettab) + 5);
            $pdf->Cell((4 * $offsettab), 10, $wording_lan["company_phone"], 0, 0, "L");

            $pdf->SetY($offsety + 3 * $offsetnline + 5.5);
            $pdf->SetX($offsetx + (2 * $offsettab) + 5);
            $pdf->Cell((4 * $offsettab), 10, "เลขประจำตัวผู้เสียภาษี 0-1055-59080-08-9", 0, 0, "L");
            $pdf->SetFont('angsa', '', 17);
            $pdf->SetY($offsety + $offsetnline);
            $pdf->SetX($offsetx + (9 * $offsettab) - 10);
            $pdf->Cell($offsettab, 10, "ใบส่งของ", 0, 0, "C");
            //กรอบบน
            $pdf->SetY($offsety + (15 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab - 10);
            $pdf->Cell(10 * $offsettab - 7, 0, "", 1, 0, "L");
            $pdf->SetY($offsety + (15 * $offsetnline) + 6);
            $pdf->SetX($offsetx + $offsettab - 10);
            $pdf->Cell(10 * $offsettab - 7, 0, "", 1, 0, "L");
            //กรอบล่าง
            $pdf->SetY($offsety + (44 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab - 10);
            $pdf->Cell(10 * $offsettab - 7, 0, "", 1, 0, "L");
            $pdf->SetY($offsety + (44 * $offsetnline) + 7);
            $pdf->SetX($offsetx + $offsettab - 10);
            $pdf->Cell(10 * $offsettab - 7, 0, "", 1, 0, "L");
            // กรอบความสูง
            $pdf->SetY($offsety + (15 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab - 10);
            $pdf->Cell($offsettab - 9, (30.8 * $offsetnline), "", 1, 0, "L");
            $pdf->SetY($offsety + (15 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab - 10);
            $pdf->Cell(2 * $offsettab + 4, (30.8 * $offsetnline), "", 1, 0, "L");
            $pdf->SetY($offsety + (15 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab - 10);
            $pdf->Cell(5 * $offsettab + 10, (30.8 * $offsetnline), "", 1, 0, "L");
            $pdf->SetY($offsety + (15 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab - 10);
            $pdf->Cell(6 * $offsettab + 12, (30 * $offsetnline) + 3, "", 1, 0, "L");
            $pdf->SetY($offsety + (15 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab - 10);
            $pdf->Cell(7 * $offsettab + 12, (30 * $offsetnline) + 3, "", 1, 0, "L");
            $pdf->SetY($offsety + (15 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab + 173);
            $pdf->Cell(8 * $offsettab - 171, (30 * $offsetnline) + 3, "", 1, 0, "L");
            //-------------------table---------------------
            $pdf->SetFont('angsa', '', 14);
            $pdf->SetY($offsety + $offsetnline + 5);
            $pdf->SetX($offsetx + (7 * $offsettab) - 5);
            //$pdf->Cell((3*$offsettab),10,$send[$i],0,0,"R");
            $offsety = 10;
            $pdf->SetFont('angsa', '', 14);
            $pdf->SetY($offsety + (5 * $offsetnline) - 5);
            $pdf->SetX($offsetx + (7 * $offsettab) + 1);
            $pdf->Cell((3 * $offsettab), 10, "สาขา.............................................", 0, 0, "R");
            $pdf->SetY($offsety + (5 * $offsetnline));
            $pdf->SetX($offsetx + (7 * $offsettab) + 1);
            $pdf->Cell((3 * $offsettab), 10, "เลขที่.............................................", 0, 0, "R");
            $pdf->SetY($offsety + (6 * $offsetnline));
            $pdf->SetX($offsetx + (7 * $offsettab) + 1);
            $pdf->Cell((3 * $offsettab), 10, "วันที่.............................................", 0, 0, "R");
            $pdf->SetY($offsety + (7 * $offsetnline));
            $pdf->SetX($offsetx + (7 * $offsettab) + 1);
            $pdf->Cell((3 * $offsettab), 10, "ซื้อเพื่อ.............................................", 0, 0, "R");
            $pdf->SetY($offsety + (5 * $offsetnline) - 6);
            $pdf->SetX($offsetx + (9 * $offsettab) - 12);
            $pdf->Cell((3 * $offsettab), 10, $inv_code[$i], 0, 0, "L");
            $pdf->SetY($offsety + (5 * $offsetnline) - 1);
            $pdf->SetX($offsetx + (9 * $offsettab) - 12);
            $pdf->Cell((3 * $offsettab), 10, $sano[$i], 0, 0, "L");
            $pdf->SetY($offsety + (6 * $offsetnline) - 1);
            $pdf->SetX($offsetx + (9 * $offsettab) - 12);
            $pdf->Cell((3 * $offsettab), 10, $sadate[$i], 0, 0, "L");
            $pdf->SetY($offsety + (7 * $offsetnline) - 1);
            $pdf->SetX($offsetx + (9 * $offsettab) - 12);
            $pdf->Cell((3 * $offsettab), 10, $typedef[$sa_type[$i]], 0, 0, "L");
            $pdf->SetFont('angsa', '', 14);

            $pdf->SetY($offsety + (4 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab);
            $pdf->Cell((2 * $offsettab), 10, "รหัสสมาชิก", 0, 0, "L");
            $pdf->SetY($offsety + (5 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab);
            $pdf->Cell((2 * $offsettab), 12, "ชื่อ-สกุล ", 0, 0, "L");
            $pdf->SetY($offsety + (6 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab);
            $pdf->Cell((2 * $offsettab), 15, "เบอร์โทร", 0, 0, "L");
            $pdf->SetY($offsety + (7 * $offsetnline) + 1);
            $pdf->SetX($offsetx + $offsettab);
            $pdf->Cell((2 * $offsettab), 15, "ที่อยู่", 0, 0, "L");
//info---------------------------------------
            $pdf->SetY($offsety + (4 * $offsetnline));
            $pdf->SetX($offsetx + (2 * $offsettab) + 5);
            $pdf->Cell((2 * $offsettab), 10, $mcode[$i], 0, 0, "L");
            $pdf->SetY($offsety + (5 * $offsetnline));
            $pdf->SetX($offsetx + (2 * $offsettab) + 5);
            $pdf->Cell((2 * $offsettab), 12, $name[$mcode[$i]] . " (" . $id_card[$mcode[$i]] . ")", 0, 0, "L");
            $pdf->SetY($offsety + (6 * $offsetnline) + 1);
            $pdf->SetX($offsetx + (2 * $offsettab) + 5);
            $pdf->Cell((2 * $offsettab), 12, $cmobile[$i], 0, 0, "L");
            $pdf->SetY($offsety + (7 * $offsetnline) + 3);
            $pdf->SetX($offsetx + (2 * $offsettab) + 5);
            $pdf->MultiCell((5 * $offsettab), 9, $add[$mcode[$i]], 0, "L");

            $pdf->SetY($offsety + (7 * $offsetnline) + 14);
            $pdf->SetX($offsetx + ($offsettab));
            $pdf->Cell($offsettab, 10, "หมายเหตุ.", 0, 0, "L");

            $pdf->SetY($offsety + (8 * $offsetnline) + 10);
            $pdf->SetX($offsetx + (2 * $offsettab) + 5);
            $pdf->Cell((2 * $offsettab), 10, $txtoption[$i], 0, 0, "L");

            $pdf->SetY($offsety + (10 * $offsetnline) + 2);
            $pdf->SetX($offsetx + ($offsettab));
            $pdf->SetY($offsety + (10 * $offsetnline) + 2);
            $pdf->SetX($offsetx + (2 * $offsettab));

            $offsetx = -3;
            $offsety = 3;
            $pdf->SetY($offsety + (14 * $offsetnline) - 1);
            $pdf->SetX($offsetx + $offsettab - 5);
            $pdf->Cell($offsettab, 10, "No.", 0, 0, "L");

            $pdf->SetY($offsety + (14 * $offsetnline) - 1);
            $pdf->SetX($offsetx - 10 + (2 * $offsettab) - 5);
            $pdf->Cell($offsettab, 10, "Product Code", 0, 0, "L");

            $pdf->SetY($offsety + (14 * $offsetnline) - 1);
            $pdf->SetX($offsetx + (3 * $offsettab));
            $pdf->Cell($offsettab, 10, "Description", 0, 0, "C");

            $pdf->SetY($offsety + (14 * $offsetnline) - 1);
            $pdf->SetX($offsetx + (6 * $offsettab) + 8);
            $pdf->Cell($offsettab, 10, "Quantity", 0, 0, "L");

            $pdf->SetY($offsety + (14 * $offsetnline) - 1);
            $pdf->SetX($offsetx + (7 * $offsettab) + 8);
            $pdf->Cell($offsettab, 10, "Unit Price", 0, 0, "L");

            $pdf->SetY($offsety + (14 * $offsetnline) - 1);
            $pdf->SetX($offsetx + (8 * $offsettab) + 11);
            $pdf->Cell($offsettab, 10, "(PV)", 0, 0, "L");

            $pdf->SetY($offsety + (14 * $offsetnline) - 1);
            $pdf->SetX($offsetx + (9 * $offsettab) + 10);
            $pdf->Cell($offsettab, 10, "Amount", 0, 0, "L");

            $pdf->SetFont('angsa', '', 10);
            $pdf->SetY($offsety + (41 * $offsetnline));
            $pdf->SetX($offsetx + (4 * $offsettab) - 3);
            $pdf->Cell($offsettab, 11, "ผิดตกยกเว้น E.& O.E.", 0, 0, "C");

            $pdf->SetFont('angsa', '', 14);

            $offsety = 94; // ส่วนล่าง
            $pdf->SetY($offsety + (22 * $offsetnline));
            $pdf->SetX($offsetx + (6.7 * $offsettab));
            $pdf->Cell($offsettab, 10, "มูลค่าสินค้า", 0, 0, "L");

            $offsety = 110; // ส่วนล่าง
            $pdf->SetY($offsety + (26 * $offsetnline) + 3);
            $pdf->SetX($offsetx + $offsettab);
            $pdf->Cell((2 * $offsettab), 40, ".............................", 0, 0, "C");
            $pdf->SetY($offsety + (28 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab);
            $pdf->Cell((2 * $offsettab), 40, "ผู้รับสินค้า", 0, 0, "C");
            $pdf->SetY($offsety + (29 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab);
            $pdf->Cell((2 * $offsettab), 40, "วันที่ ......../......../........", 0, 0, "C");
            $pdf->SetY($offsety + (30 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab);
            $pdf->Cell((2 * $offsettab), 40, "Operator : " . $uid[$i], 0, 0, "C");
            $pdf->SetY($offsety + (31 * $offsetnline));
            $pdf->SetX($offsetx + $offsettab);
            $pdf->Cell((2 * $offsettab), 40, "Date : " . $date_time[$i][0] . " Time : " . $date_time[$i][1], 0, 0, "C");

            $pdf->SetY($offsety + (26 * $offsetnline) + 3);
            $pdf->SetX($offsetx + (3 * $offsettab) + 10);
            $pdf->Cell((2 * $offsettab), 40, ".............................", 0, 0, "C");
            $pdf->SetY($offsety + (28 * $offsetnline));
            $pdf->SetX($offsetx + (3 * $offsettab) + 10);
            $pdf->Cell((2 * $offsettab), 40, "ผู้จ่ายสินค้า", 0, 0, "C");
            $pdf->SetY($offsety + (29 * $offsetnline));
            $pdf->SetX($offsetx + (3 * $offsettab) + 10);
            $pdf->Cell((2 * $offsettab), 40, "วันที่ ......../......../........", 0, 0, "C");

            $pdf->SetY($offsety + (26 * $offsetnline) + 3);
            $pdf->SetX($offsetx + (9 * $offsettab) - 15 - 40);
            $pdf->Cell((2 * $offsettab), 40, ".............................", 0, 0, "C");
            $pdf->SetY($offsety + (28 * $offsetnline));
            $pdf->SetX($offsetx + (9 * $offsettab) - 15 - 40);
            $pdf->Cell((2 * $offsettab), 40, "ผู้รับเงิน", 0, 0, "C");
            $pdf->SetY($offsety + (29 * $offsetnline));
            $pdf->SetX($offsetx + (9 * $offsettab) - 15 - 40);
            $pdf->Cell((2 * $offsettab), 40, "วันที่ ......../......../........", 0, 0, "C");

            $pdf->SetY($offsety + (26 * $offsetnline) + 3);
            $pdf->SetX($offsetx + (9 * $offsettab) - 8);
            $pdf->Cell((2 * $offsettab), 40, ".............................", 0, 0, "C");
            $pdf->SetY($offsety + (28 * $offsetnline));
            $pdf->SetX($offsetx + (9 * $offsettab) - 8);
            $pdf->Cell((2 * $offsettab), 40, "ผู้มีอำนาจลงนาม", 0, 0, "C");
            $pdf->SetY($offsety + (29 * $offsetnline));
            $pdf->SetX($offsetx + (9 * $offsettab) - 8);
            $pdf->Cell((2 * $offsettab), 40, "วันที่ ......../......../........", 0, 0, "C");

            $pdf->SetY($offsety + (18 * $offsetnline));
            $pdf->SetX($offsetx + ($offsettab));
            if (!empty($uid_name[$i])) $username1 = '   ' . $uid[$i] . ' ' . $uid_name[$i];
            $pdf->Cell($offsettab, 10, "ชำระโดย", 0, 0, "L");
            $tab = 0;
            if (!empty($textshows[$sano[$i]])) {
                if (count($textshows[$sano[$i]])) {
                    foreach ($textshows[$sano[$i]] as $keyxx => $valxx):
                        $pdf->SetY($offsety + (18 * $offsetnline) + $tab);
                        $pdf->SetX($offsetx + (2 * $offsettab));
                        $pdf->Cell($offsettab, 10, '-' . $valxx['text'] . " : " . number_format($valxx['total'], '2', '.', ',') . ' -' . $valxx['select'] . " " . '' . $valxx['option'] . "", 0, 0, "L");
                        $tab = $tab + 5;
                    endforeach;
                }
            } else {
                if ($sum > 0) {
                    $pdf->SetY($offsety + (18 * $offsetnline) + $tab);
                    $pdf->SetX($offsetx + (2 * $offsettab));
                    $pdf->Cell($offsettab, 10, '-' . "Ewallet-" . "", 0, 0, "L");
                } else if ($valxx['text'] == "") {
                    $pdf->SetY($offsety + (18 * $offsetnline) + $tab);
                    $pdf->SetX($offsetx + (2 * $offsettab));
                    $pdf->Cell($offsettab, 10, '-' . "Ewallet-" . "", 0, 0, "L");
                }

            }


            $pdf->SetFont('angsa', '', 10);
            $pdf->SetY($offsety + (22 * $offsetnline) + 33);
            $pdf->SetX($offsetx + ($offsettab));
            $pdf->SetFont('angsa', '', 10);
            $pdf->SetY($offsety + (23 * $offsetnline) + 1);
            $pdf->SetX($offsetx + ($offsettab));
            $pdf->Cell($offsettab, 35, "ข้าพเจ้าได้รับสินค้าตามรายการที่ระบุไว้ข้างต้นครบถ้วนและสมบูรณ์เรียบร้อยแล้ว", 0, 0, "L");
            $pdf->SetY($offsety + (23 * $offsetnline) + 5);
            $pdf->SetX($offsetx + ($offsettab));
            $pdf->Cell($offsettab, 35, "สินค้าโปรโมชั่น ไม่สามารถเปลี่ยนหรือคืนได้", 0, 0, "L");
            $pdf->SetFont('angsa', '', 14);

            $offsety = 28;

            $jj = 0;
            for ($j = 0; $j < mysql_num_rows($rs); $j++) {
                $obj = mysql_fetch_object($rs);
                if ($obj->pcode <> 'D001') {
                    $pdf->SetY($offsety + ((9 + $jj) * $offsetnline));
                    $pdf->SetX($offsetx + $offsettab - 5);
                    $pdf->Cell($offsettab, 10, $x + 1, 0, 0, "L");

                    $pdf->SetY($offsety + ((9 + $jj) * $offsetnline));
                    $pdf->SetX($offsetx - 10 + (2 * $offsettab) - 5);
                    $pdf->Cell($offsettab, 10, $obj->pcode, 0, 0, "L");

                    $pdf->SetY($offsety + ((9 + $jj) * $offsetnline));
                    $pdf->SetX($offsetx + (3 * $offsettab));
                    $pdf->Cell($offsettab, 10, $obj->pdesc, 0, 0, "L");

                    $pdf->SetY($offsety + ((9 + $jj) * $offsetnline));
                    $pdf->SetX($offsetx + (6 * $offsettab) + 2);
                    $pdf->Cell($offsettab, 10, number_format($obj->qty, 0, '.', ','), 0, 0, "R");

                    $pdf->SetY($offsety + ((9 + $jj) * $offsetnline));
                    $pdf->SetX($offsetx + (7 * $offsettab) + 4);
                    $pdf->Cell($offsettab, 10, number_format($obj->price, 2, '.', ','), 0, 0, "R");

                    $pdf->SetY($offsety + ((9 + $jj) * $offsetnline));
                    $pdf->SetX($offsetx + (8 * $offsettab) + 3);
                    $pdf->Cell($offsettab, 10, number_format(($obj->pv * $obj->qty), 2, '.', ','), 0, 0, "R");

                    $pdf->SetY($offsety + ((9 + $jj) * $offsetnline));
                    $pdf->SetX($offsetx + (9 * $offsettab) + 4);
                    $pdf->Cell($offsettab, 10, number_format(($obj->price * $obj->qty), 2, '.', ','), 0, 0, "R");
                    $sum += $obj->price * $obj->qty;
                    $sumpv += $obj->pv * $obj->qty;

                    $sqlxx = "SELECT * FROM ali_product_package1 WHERE package = '" . $obj->pcode . "' ";
                    $rsxx = mysql_query($sqlxx);
                    if (mysql_num_rows($rsxx) > 0) {
                        for ($v = 0; $v < mysql_num_rows($rsxx); $v++) {
                            $jj += 1;
                            $objxx = mysql_fetch_object($rsxx);
                            $pdf->SetY($offsety + ((9 + $jj) * $offsetnline));
                            $pdf->SetX($offsetx + (3 * $offsettab));
                            $pdf->Cell($offsettab, 10, "  - (" . $objxx->pcode . ") " . $objxx->pdesc . "(" . ($objxx->qty * $obj->qty) . ")", 0, 0, "L");
                        }
                    }
                    $x++;
                    $jj++;
                }
            }
            if ($k == $npage - 1) {

                $obj_dis = mysql_fetch_object($rs_dis);

                $pdf->SetY($offsety + ((9 + $jj) * $offsetnline));
                $pdf->SetX($offsetx + (3 * $offsettab + 40));
                $pdf->Cell($offsettab, 10, $obj_dis->pdesc, 0, 0, "R");


                if ($obj_dis->price != 0) {
                    $pdf->SetY($offsety + ((9 + $jj) * $offsetnline));
                    $pdf->SetX($offsetx + (9 * $offsettab) + 4);
                    $pdf->Cell($offsettab, 10, number_format(($obj_dis->price * $obj_dis->qty), 2, '.', ','), 0, 0, "R");
                }

                $offsety = 94;

                $pdf->SetY($offsety + (20 * $offsetnline));
                $pdf->SetX($offsetx + (9 * $offsettab) + 3);
                $pdf->Cell($offsettab, 10, number_format($total[$i], 2, '.', ','), 0, 0, "R");
                $pdf->SetY($offsety + (20 * $offsetnline));
                $pdf->SetX($offsetx + (8 * $offsettab) + 3);
                $pdf->Cell($offsettab, 10, number_format($sumpv, 2, '.', ','), 0, 0, "R");

                $pdf->SetY($offsety + (22 * $offsetnline));
                $pdf->SetX($offsetx + (9 * $offsettab) + 3);
                $pdf->Cell($offsettab, 10, number_format($total[$i], 2, '.', ','), 0, 0, "R");

                /*    $pdf->SetY($offsety+(22*$offsetnline)+7);
                   $pdf->SetX($offsetx+(9*$offsettab)+3);
                   $pdf->Cell($offsettab,10,number_format($total_vat[$i],2,'.',','),0,0,"R");

                   $pdf->SetY($offsety+(22*$offsetnline)+14);
                   $pdf->SetX($offsetx+(9*$offsettab)+3);
                   $pdf->Cell($offsettab,10,number_format($total_invat[$i],2,'.',','),0,0,"R");  */

                $pdf->SetY($offsety + (20 * $offsetnline));
                $pdf->SetX($offsetx + (4 * $offsettab) - 3);
                $pdf->Cell($offsettab, 11, moneytotext($total[$i]), 0, 0, "C");
            }
        }
    }
    $pdf->code128(10, 262, $_GET['bid'], 85, 20, false);
    $pdf->SetY(254);
    $pdf->SetX(35);
    $pdf->Cell(10, 10, $_GET['bid']);
//$pdf->QR($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], 170, 265);
    $pdf->Output("pdf/doc.pdf");
    ob_end_flush();
    readfile('pdf/doc.pdf');
} else {
    echo "<center>Please log in to print. <a href='index.php'>Click to Login</a></center>";
}

function testxx($rs)
{
    $sum_num = 0;
    for ($i = 0; $i < mysql_num_rows($rs); $i++) {
        $object = mysql_fetch_object($rs);
        $pcode = $object->pcode;
        $sql = "SELECT COUNT(pcode) as num_pp FROM ali_product_package1 WHERE package = '" . $pcode . "' ";
        //echo $sql."<br>";
        $rsx = mysql_query($sql);
        if (mysql_num_rows($rsx) > 0) {
            $obj = mysql_fetch_object($rsx);
            $num_pp = $obj->num_pp;
        } else {
            $num_pp = 0;
        }
        $sum_num += $num_pp;
    }
    return $sum_num;
}


