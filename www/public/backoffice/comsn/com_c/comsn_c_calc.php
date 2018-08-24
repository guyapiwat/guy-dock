<script language="javascript">
    function checkround() {
        if (document.getElementById("ftrcode").value == "") {
            alert("กรุณาใส่รอบการคำนวณ");
            document.getElementById("ftrcode").focus();
            return false;
        } else {
            var numCheck = document.getElementById("ftrcode").value;
            var numVal = numCheck.split("-");
            if (numVal.length > 2) {
                alert("กรุณากรอกรูปแบบรอบการคำนวณให้ถูกต้อง");
                return false;
            }
        }
        document.rform.submit();
    }

    function chknum(key) {
        if ((key >= 48 && key <= 57) || key == 45)
            return true;
        else
            return false;
    }
</script>
<? include("connectmysql.php"); ?>
<? include("prefix.php"); ?>
<? include("global.php"); ?>
<? require_once("function.log.inc.php");
require_once("function.php"); ?>
<?
set_time_limit(0);
ini_set("memory_limit", "2000M");
ob_start();
?><font color="#ff0000"><br/></font><?
//showdialog();
//exit;
if (!isset($_REQUEST["ftrcode"])) {
    showdialog();
} else { ?>
    <br/>
    <table width="95%" border="0" align="center">
        <tr>
            <td align="center">
                <?
                $ftrcode = $_REQUEST["ftrcode"];
                if (strpos($ftrcode, "-") === false) {
                    //รอบเริ่มต้น == รอบสิ้นสุด
                    $ftrc[0] = $ftrcode;
                    $ftrc[1] = $ftrcode;
                } else {
                    $ftrc = explode('-', $ftrcode);
                }
                if ($ftrc[0] > $ftrc[1]) {
                    ?><FONT COLOR="#ff0000">รอบเริ่มต้น ต้องน้อยกว่าหรือเท่ากับ รอบสิ้นสุด
                        กรุณาใส่รอบการคำนวณใหม่</FONT><?
                    showdialog();
                    exit;
                } else {
                    $rof = $ftrc[0];
                    $rot = $ftrc[1];

//================================================================================
                    $sql = "select * from " . $dbprefix . "cround where rcode between '" . $rof . "' and '" . $rot . "' and calc='1'";
                    $result = mysql_query($sql);
                    for ($i = 0; $i < mysql_num_rows($result); $i++) {
                        $data = mysql_fetch_object($result);
                        ?><font color="#ff0000">รอบ <?= $data->rcode ?> คำนวณไปแล้ว <br/></font><?
                    }
                    mysql_free_result($result);
                    if ($i > 0) {
                        ?><font color="#ff0000">ต้องลบการคำนวณคอมมิชชั่น รอบนี้ก่อน จึงจะคำนวณใหม่ได้<br/></font><?
                        showdialog();
                        exit;
                    }
                    $step = "1";
                    $time_start = getmicrotime();
                    echo "เริ่มการคำนวณ " . date("Y-m-d H:i:s") . " " . strtotime("now"), "<BR>";
                    echo "1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน cround<BR>";
                    $text = "uid=" . $_SESSION["adminuserid"] . " action=binary calc rcode=$ftrc[0]-$ftrc[1]";
                    writelogfile($text);
//       1.สำหรับแต่ละรอบ Ro ระหว่าง Frcode-Trcode ใน around
//           1.1 อ่าน Ro, FSaNo, TSaNo
//           1.2 สร้างไฟล์ BM+rcode, BC+rcode
//           1.3 ลบข้อมูล BTOTSALE ในรอบ RO นี้ออกก่อน
                    for ($ro = $ftrc[0]; $ro <= $ftrc[1]; $ro++) {

                        ///////////////////////////////////////////////////////////////////////
                        //$ro ระหว่าง Frcode-Trcode/////////////////////////////////////////
                        //           1.1 อ่าน ro, FSaNo, TSaNo
                        $step = "1.1";
                        $bonusperpair = 500;
                        $cpercenD = 0.05;
                        $cpercenS = 0.07;
                        $cpercenP = 0.09;
                        $sql = "select * from " . $dbprefix . "cround where  rcode='" . $ro . "'  ";
                        $result = mysql_query($sql);
                        if (mysql_num_rows($result) > '0') {
                            $row = mysql_fetch_array($result, MYSQL_ASSOC);
                            $fsano = $row["fsano"];
                            $tsano = $row["tsano"];
                            $tdate = $row["tdate"];
                            $fdate = $row["fdate"];
                            $tpdate = $row["tpdate"];
                            $fpdate = $row["fpdate"];
                            $rdate = $row["rdate"];
                            $cstatus = $row["cstatus"];
                            $paydate = $row["paydate"];
                            //เริ่มต้น
                            $pfdate = explode("-", $fdate);
                            $pfyear = $pfdate[0];
                            $pfmonth = $pfdate[1];
                            $pfday = $pfdate[2];
                            //สิ้นสุด
                            $ptdate = explode("-", $tdate);
                            $ptyear = $ptdate[0];
                            $ptmonth = $ptdate[1];
                            $ptday = $ptdate[2];
                            //ปีัเดือน
                            $psmonth = $pfdate[0] . $pfdate[1];
                            ///////////////////////////////////////////////////////////////////////
                            echo "<BR><BR>คำนวณโบนัสรอบที่ $ro<BR>";
                            echo "<font color=green>สมบูรณ์ </font><BR>";


                            $option = "Re-cal - Transfer to pay(Withdraw) Date : $fdate";
                            $sql = "SELECT txtWithdraw,mcode from " . $dbprefix . "ewallet  where rcode >= '$ro' and cals = 'V' and txtWithdraw > 0 and cancel = 0 ";

                            $rsxx = mysql_query($sql);
                            if (mysql_num_rows($rsxx) > 0) {
                                for ($xx = 0; $xx < mysql_num_rows($rsxx); $xx++) {
                                    $sqlObjxx = mysql_fetch_object($rsxx);
                                    $ewallet = $sqlObjxx->txtWithdraw;
                                    $mcode = $sqlObjxx->mcode;
                                    mysql_query("update ali_member set ewallet=ewallet+'$ewallet' where mcode = '$mcode' ");
                                    log_ewallet('ewallet', $mcode, $ro, $ewallet, 'TI', date("Y-m-d"), $option);

                                }
                            }
                            mysql_query("update " . $dbprefix . "ewallet set cancel = '1',uid='" . $_SESSION['adminusercode'] . "'  where rcode >= '$ro' and cals = 'V' ");

                            ///////////////////////////////////////////////////////////////////
                            del_cals($dbprefix, $ro, array('cpv', 'cmbonus'));
                            // exit;
                            echo "         2. สำหรับบิลของ sMC ทุกคนใน asaleh ในรอบ $ro นี้<BR>";

                            fnc_calc_status($dbprefix, $ro, $fdate, $tdate, $fpdate, $tpdate, $mcode, $paydate, $cstatus);
                            //exit;
                            //ปรับ calc ของ around ให้เป็น '1'

                            $time_end = getmicrotime();
                            $time = $time_end - $time_start;
                            //exit;
                            //ปรับ calc ของ around ให้เป็น '1'
                            $sql = "update " . $dbprefix . "cround set calc='1' , calc_date = '" . date("Y-m-d H:i:s") . "',timequery='" . $time . "' where rcode='$ro' ";
                            if (mysql_query($sql)) {
                                mysql_query("COMMIT");
                            } else {
                                echo "error $sql<BR>";
                                //}
                            }

                        }
                        //คำนวณ แต่ละรอบ $ro
                        ///////////////////////////////////////////////////////////////////////
                        mysql_free_result($result);
                        //$ro ระหว่าง Frcode-Trcode/////////////////////////////////////////
                        ///////////////////////////////////////////////////////////////////////
                    }

                    echo '<b><font color=green>';
                    echo "สิ้นสุดการคำนวณ " . date("Y-m-d H:i:s") . " " . strtotime("now"), "<BR>";
                    echo "การคำนวณใช้เวลาทั้งสิ้น $time วินาที<BR>";
                    echo '</font></b>';

                } //end else
                ?>
            </td>
        </tr>
    </table>
    <br/>
    <?
}//end else
function showdialog()
{
    ?>
    <table width="95%">
        <tr>
            <td><br/>
                <form name="rform" method="post" action="./index.php?sessiontab=4&sub=26">
                    <table width="60%" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF7F00" align="center">
                        <tr>
                            <td colspan="2" align="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">กรอกรอบการคำนวณรอบการจ่าย แผน A ที่ต้องการคำนวนเช่น 1-12</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="40%" align="right">รอบ&nbsp;&nbsp;</td>
                            <td width="60%">
                                <input type="text" name="ftrcode" id="ftrcode"
                                       onkeypress="return chknum(window.event.keyCode)"/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr align="center">
                            <td colspan="2"><input type="button" name="Submit" value="คำนวณรายได้"
                                                   onClick="checkround()"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
    <?
}


function fnc_calc_status($dbprefix, $ro, $fdate, $tdate, $fpdate, $tpdate, $fmcode, $paydate, $cstatus)
{
    $cpaydate = explode('-', $paydate);
    $whereclass = " AND fdate>= '$fdate' and tdate<= '$tdate' ";

    $sqlselect = "select sum(ewallet) as ewallet,mcode from ali_log_wallet where tdate between '$fdate' and '$tdate' and ewallet <> 0 group by mcode ";
    $rsx = mysql_query($sqlselect);
    for ($j = 0; $j < mysql_num_rows($rsx); $j++) {
        $sqlObjxx = mysql_fetch_object($rsx);
        $xewallet[$sqlObjxx->mcode] = $sqlObjxx->ewallet;
    }
    /*
    $sqlselect = "select ewallet,mcode from ali_member where ewallet <> 0";
    $rsx = mysql_query($sqlselect);
    for($j=0;$j<mysql_num_rows($rsx);$j++){
        $sqlObjxx = mysql_fetch_object($rsx);
        $xewallet[$sqlObjxx->mcode] =$sqlObjxx->ewallet;
    }*/

    //echo $ewallet[$j].' : ';
    //exit;

    $sql = "SELECT m.mcode,m.locationbase,m.name_t,m.status_suspend,m.status_terminate,m.mtype,m.ewallet,m.mvat,m.pos_cur,m.sp_code,m.cmp,m.status,m.cmp2,m.cmp3,m.acc_no,m.name_f as title,m.id_tax,m.id_card 
	from " . $dbprefix . "member m ";
    $sql .= "where  m.status_terminate <> '1' and atocom = '0' ";
//	$sql .= "where  m.status_terminate <> '1' and mcode = 'YCD1111' ";
    $rs1 = mysql_query($sql);

    $monthmonth = explode("-", $strtdate);
    $name_t = array();
    $name_f = array();
    $id_card = array();
    $id_tax = array();
    if (mysql_num_rows($rs1) > 0) {
        for ($j = 0; $j < mysql_num_rows($rs1); $j++) {

            $sqlObj1 = mysql_fetch_object($rs1);
            $mcode[$j] = $sqlObj1->mcode;
            //$com_transfer_chagre = 30;
            $totalamt1[$j] = 0;
            $totalamt[$j] = 0;
            $mtype[$j] = $sqlObj1->mtype;
            $mvat[$j] = $sqlObj1->mvat;
            $totalamt[$j] = 0;
            $locationbase[$j] = $sqlObj1->locationbase;
            $atocom[$j] = $sqlObj1->atocom;

            $ewallet[$j] = $sqlObj1->ewallet;
            if ($xewallet[$mcode[$j]] == '') $xewallet[$mcode[$j]] = 0;

            if ($xewallet[$mcode[$j]] < $ewallet[$j]) $ewallet[$j] = $xewallet[$mcode[$j]];

            $totalamt1[$j] = $ewallet[$j];
            $totalamt[$j] = $ewallet[$j];
            ////////////////////////////////

            if ($ewallet[$j] > 0) fnc_wd_ewallet_bonus($dbprefix, $mcode[$j], $ewallet[$j], $tdate);

            ////////////////////////////
            $status_suspend[$j] = $sqlObj1->status_suspend;
            $name_t[$j] = $sqlObj1->name_t;
            $name_f[$j] = $sqlObj1->title;
            $id_card[$j] = $sqlObj1->id_card;
            $id_tax[$j] = $sqlObj1->id_tax;
            $total12 = 0;
            $pos_cur[$j] = $sqlObj1->pos_cur;
            $sp_code[$mcode[$j]] = $sqlObj1->sp_code;
            $acc_no[$j] = $sqlObj1->acc_no;
            $cmp[$j] = $sqlObj1->cmp;
            $cmp2[$j] = $sqlObj1->cmp2;
            $cmp3[$j] = $sqlObj1->cmp3;
            $mstatus[$j] = $sqlObj1->status;
            $moneyb[$j] = 0;
            $moneyb[$j] = backmonthpv($dbprefix, $mcode[$j], $ro);
            $total12 = $totaly = backallpv($dbprefix, $mcode[$j], $ro, $paydate);
            $exp_date[$j] = $sqlObj1->exp_date;
            $mem_cntday[$j] = dateDiff($paydate, $exp_date[$j]);
            //$totalamt =$sqlObj->totalamt;
            $totalamt1[$j] = $moneyb[$j] + $totalamt[$j];
            $crate[$j] = '1';

            $vat[$j] = 0;
            $name_t[$j] = $sqlObj1->name_t;
            $title[$j] = $sqlObj1->title;
            if ($mtype[$j] == '1') {
                $tax[$j] = $totalamt1[$j] * 0.05;
            } else {
                $tax[$j] = $totalamt1[$j] * 0.05;
            }


            $com_transfer_chagre = 0;
            $totalpv = 1;
            //if($mcode[$j] == 'KH8557128')echo $mcode[$j].' : '.$cmp[$j].' : '.$cmp2[$j].' : '.$cmp3[$j].' : '.$acc_no[$j].' : '.$status_suspend[$j].' : '.$totalamt1[$j].'<br>';
            if ($totalpv >= 0) {
                if ($totalamt1[$j] > 0) {
                    if ($cmp[$j] == 'ครบ' and $cmp2[$j] == 'ครบ' and $cmp3[$j] == 'ครบ' and !empty($acc_no[$j]) and $status_suspend[$j] <> '1') {
                        if ($totalpv >= 0) {
                            if ($totalamt1[$j] >= 100) {
                                $total12 = $total12 + $totalamt1[$j];
                                if ($mtype[$j] == '1') {
                                    $totalamt[$j] = $totalamt[$j];
                                    $totalamt1[$j] = $totalamt1[$j] + $vat[$j] - $tax[$j];
                                    $btotal = $btotal + $vat[$j] - $tax[$j];
                                } else {
                                    $totalamt[$j] = $totalamt[$j];
                                    $totalamt1[$j] = $totalamt1[$j] - $tax[$j];
                                    $btotal = $btotal - $tax[$j];
                                }
                                if ($cmp[$j] == 'ครบ') $c_note1 = 1; else $c_note1 = "";
                                if ($cmp2[$j] == 'ครบ') $c_note2 = 1; else $c_note2 = "";
                                if ($cmp3[$j] == 'ครบ') $c_note5 = 1; else $c_note5 = "";
                                if (!empty($acc_no[$j])) $c_note3 = 1; else $c_note3 = "";
                                $com_transfer_chagre = 30;
                                $sql = "INSERT INTO " . $dbprefix . "cmbonus (rcode,mcode,status,pv,pvb,pvh,ewallet,total,totaly,mdate,month_pv,mpos,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,name_f,name_t,id_card,id_tax,atoship,fdate,tdate) ";
                                $sql .= "VALUES('$ro','" . $mcode[$j] . "','1','" . $moneyb[$j] . "','" . $totalamt[$j] . "','0','" . $ewallet[$j] . "','" . $totalamt1[$j] . "','" . $total12 . "','" . $strfdate . "','" . $month[0] . $month[1] . "','" . $pos_cur[$j] . "','" . $vat[$j] . "','" . $tax[$j] . "','" . $title[$j] . "','$paydate','$totalpv','" . $locationbase[$j] . "','" . $crate[$j] . "','" . $mtype[$j] . "','$com_transfer_chagre','" . $name_f[$j] . "','" . $name_t[$j] . "','" . $id_card[$j] . "','" . $id_tax[$j] . "','" . $allplan[$j] . "','$fdate','$tdate')";
                                //if($mcode[$j] == 'KH8557128')echo $sql.'<br>';
                            } else {
                                $btotal = $total12;
                                $tax[$j] = 0;
                                $vat[$j] = 0;
                                if ($cmp[$j] == 'ครบ') $c_note1 = 1; else $c_note1 = "";
                                if ($cmp2[$j] == 'ครบ') $c_note2 = 1; else $c_note2 = "";
                                if ($cmp3[$j] == 'ครบ') $c_note5 = 1; else $c_note5 = "";
                                if (!empty($acc_no[$j])) $c_note3 = 1; else $c_note3 = "";
                                if ($mem_cntday[$j] <= -90) {
                                    $c_note4 = 1;
                                    //mysql_query("update ".$dbprefix."member set status = '1' where mcode = '".$mcode[$j]."'");
                                } else $c_note4 = "";
                                $sql = "INSERT INTO " . $dbprefix . "cmbonus (rcode,mcode,status,pv,pvb,pvh,ewallet,total,totaly,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,c_note5,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,name_f,name_t,id_card,id_tax,atoship,fdate,tdate) ";
                                $sql .= "VALUES('$ro','" . $mcode[$j] . "','0','" . $moneyb[$j] . "','0','" . $totalamt1[$j] . "','" . $ewallet[$j] . "','0','" . $btotal . "','" . $strfdate . "','" . $month[0] . $month[1] . "','" . $pos_cur[$j] . "','" . $c_note1 . "','" . $c_note2 . "','" . $c_note3 . "','" . $c_note4 . "','" . $c_note5 . "','" . $vat[$j] . "','" . $tax[$j] . "','" . $title[$j] . "','','$totalpv','" . $locationbase[$j] . "','" . $crate[$j] . "','" . $mtype[$j] . "','$com_transfer_chagre','" . $name_f[$j] . "','" . $name_t[$j] . "','" . $id_card[$j] . "','" . $id_tax[$j] . "','" . $allplan[$j] . "','$fdate','$tdate')";
                                //echo $sql.'<br>';
                            }
                            mysql_query($sql);

                        }
                    } else {

                        $tax[$j] = 0;
                        $vat[$j] = 0;
                        if ($cmp[$j] == 'ครบ') $c_note1 = 1; else $c_note1 = "";
                        if ($cmp2[$j] == 'ครบ') $c_note2 = 1; else $c_note2 = "";
                        if ($cmp3[$j] == 'ครบ') $c_note5 = 1; else $c_note5 = "";
                        if (!empty($acc_no[$j])) $c_note3 = 1; else $c_note3 = "";

                        $btotal = backmonthpv3($dbprefix, $mcode[$j], $ro, $tdate);


                        $c_note4 = "";

                        $sql = "INSERT INTO " . $dbprefix . "cmbonus (rcode,mcode,status,pv,pvb,pvh,ewallet,total,totaly,mdate,month_pv,mpos,c_note1,c_note2,c_note3,c_note4,c_note5,tot_vat,tot_tax,title,paydate,status_pv,locationbase,crate,mtype,com_transfer_chagre,name_f,name_t,id_card,id_tax,atoship,fdate,tdate) ";
                        $sql .= "VALUES('$ro','" . $mcode[$j] . "','0','" . $moneyb[$j] . "','0','" . $totalamt1[$j] . "','" . $ewallet[$j] . "','0','" . $btotal . "','" . $strfdate . "','" . $month[0] . $month[1] . "','" . $pos_cur[$j] . "','" . $c_note1 . "','" . $c_note2 . "','" . $c_note3 . "','" . $c_note4 . "','" . $c_note5 . "','" . $vat[$j] . "','" . $tax[$j] . "','" . $title[$j] . "','','$totalpv','" . $locationbase[$j] . "','" . $crate[$j] . "','" . $mtype[$j] . "','$com_transfer_chagre','" . $name_f[$j] . "','" . $name_t[$j] . "','" . $id_card[$j] . "','" . $id_tax[$j] . "','" . $allplan[$j] . "','$fdate','$tdate')";
                        //	echo $sql.'<br>';
                        mysql_query($sql);
                    }
                }
            }
        }
    }
}

function fnc_wd_ewallet_bonus($dbprefix, $mcode, $totalamt, $fdate)
{
    global $ro;
    $allplan = $totalamt;
    $crate = '1';
    if ($allplan > 0) {
        //////////////   EWALLET  ///////////////
        $sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM " . $dbprefix . "ewallet ";
        $rssss = mysql_query($sql);
        $mid = mysql_result($rssss, 0, 'id') + 1;
        $sano = gencodesale_news_hq('V', 'ali_ewallet', 'HQ001', '', $fdate);
        $bprice = $allplan;
        $sql = "insert into " . $dbprefix . "ewallet (id,  sano, sadate,  mcode,  sa_type, inv_code,  total,bprice, uid,lid,send,txtoption,
			txtMoney,chkWithdraw,txtWithdraw,optionWithdraw,checkportal,locationbase,name_f,name_t,mbase,crate,rcode,cals				
			) values ('' ,'$sano' ,'$fdate' ,'" . $mcode . "', '' ,'' ,'$allplan','$bprice' ,'" . $_SESSION['adminusercode'] . "','','$radsend','$txtoption'
			,'$allplan','on','$allplan','1','8','" . $_SESSION["adminusercode"] . "','$name_f','$name_t','" . $location . "','" . $crate . "','$ro','V'
			) ";
        //echo $sql;
        mysql_query($sql);

        $sql2 = "update " . $dbprefix . "member set ewallet=ewallet-'$allplan'  where mcode = '" . $mcode . "' ";
        mysql_query($sql2);
        $option = "Cal - Transfer to pay(Withdraw) Date : $fdate";
        log_ewallet('ewallet', $mcode, $ro, $allplan, 'TO', date("Y-m-d"), $option);

        //////////////   EWALLET  ///////////////
    }
}

function fnc_ewallet_bonus($dbprefix, $ro, $mcode, $totalamt, $fdate)
{
    $allplan = $totalamt;
    if ($allplan > 0) {
        $sql2 = "update " . $dbprefix . "member set ewallet=ewallet+'$allplan'  where mcode = '" . $mcode . "' ";
        mysql_query($sql2);
        //////////////   EWALLET  ///////////////
        $sql = "SELECT MAX(id) AS id ,MAX(sano) as sano FROM " . $dbprefix . "ewallet ";
        $rssss = mysql_query($sql);
        $mid = mysql_result($rssss, 0, 'id') + 1;
        $sano = gencodesale('E', 'ewallet');
        $bprice = $allplan * $crate;
        $sql = "insert into " . $dbprefix . "ewallet (id,  sano, sadate,  mcode,  sa_type, inv_code,  total,bprice,  uid,lid,send,txtoption,
			txtMoney,chkCommission,txtCommission,optionCommission,checkportal,locationbase,name_f,name_t,mbase,crate,rcode,cals				
			) values ('' ,'$sano' ,'$fdate' ,'" . $mcode . "', '' ,'' ,'$allplan','$bprice' ,'" . $_SESSION['adminusercode'] . "','','$radsend','$txtoption'
			,'$allplan','on','$allplan','1','9','" . $_SESSION["adminusercode"] . "','$name_f','$name_t','" . $location . "','" . $crate . "','$ro','C'
			) ";
        //echo $sql;
        mysql_query($sql);
        //////////////   EWALLET  ///////////////
    }
}


function backmonthpv($dbprefix, $mcode, $ro)
{
    $sql2 = "select mcode,pvh,status from " . $dbprefix . "cmbonus WHERE  mcode='$mcode'  order by rcode desc limit 0,1 ";

    //if($mcode == '0007243')echo $sql2.'<br>';
    $rs2 = mysql_query($sql2);
    if (mysql_num_rows($rs2) > 0) {
        $sqlObj2 = mysql_fetch_object($rs2);
        if ($sqlObj2->status == '0') $pv = $sqlObj2->pvh;
        else $pv = 0;
        //$pv= $sqlObj2->pvh;
    } else {
        $pv = 0;
    }
    //echo $mcode.' : '.$pv.'<br>';
    return $pv;
}

function backallpv($dbprefix, $mcode, $ro, $tdate)
{
    $chkdate = explode('-', $tdate);
    $chkdate1 = $chkdate[0];
    $sql2 = "select totaly from " . $dbprefix . "cmbonus WHERE  mcode='$mcode' and paydate like '%" . $chkdate1 . "%' order by id desc limit 0,1 ";
    //if($mcode == '0000008')echo $sql2.'<br>';
    $rs2 = mysql_query($sql2);
    if (mysql_num_rows($rs2) > 0) {
        $sqlObj2 = mysql_fetch_object($rs2);
        $pv = $sqlObj2->totaly;
    } else {
        $pv = 0;
    }
    //echo $mcode.' : '.$pv.'<br>';
    return $pv;
}

function backmonthpv1($dbprefix, $mcode, $fpdate, $tpdate)
{
    $sql2 = "select sum(fob+cycle+smb+matching+onetime) as total_y from " . $dbprefix . "cmbonus WHERE  mcode='$mcode'  and rcode <= '$ro' order by rcode desc limit 0,1 ";
    //echo $sql2.'<br>';
    $rs2 = mysql_query($sql2);
    if (mysql_num_rows($rs2) > 0) {
        $sqlObj2 = mysql_fetch_object($rs2);
        //	if($sqlObj2->status == '0')$pv= $sqlObj2->pvh;
        //	else $pv=0;
        $pv = $sqlObj2->total_y;
    } else {
        $pv = 0;
    }
    //echo $mcode.' : '.$pv.'<br>';
    return $pv;
}

function backmonthpv2($dbprefix, $mcode, $ro)
{
    $sql2 = "select pvh as total_y from " . $dbprefix . "cmbonus WHERE  mcode='$mcode'  and rcode <= $ro-2 order by rcode desc limit 0,1 ";
    if ($mcode == '0006437') echo $sql2 . '<br>';
    $rs2 = mysql_query($sql2);
    if (mysql_num_rows($rs2) > 0) {
        $sqlObj2 = mysql_fetch_object($rs2);
        //	if($sqlObj2->status == '0')$pv= $sqlObj2->pvh;
        //	else $pv=0;
        $pv = $sqlObj2->total_y;
    } else {
        $pv = 0;
    }
    //echo $mcode.' : '.$pv.'<br>';
    return $pv;
}

function backmonthpvb($dbprefix, $mcode, $ro)
{
    $sql2 = "select fob+cycle+smb+matching+onetime as total_y from " . $dbprefix . "cmbonus WHERE  mcode='$mcode'  and rcode < $ro order by rcode desc limit 0,1 ";
    if ($mcode == '0006437') echo $sql2 . '<br>';
    $rs2 = mysql_query($sql2);
    if (mysql_num_rows($rs2) > 0) {
        $sqlObj2 = mysql_fetch_object($rs2);
        //	if($sqlObj2->status == '0')$pv= $sqlObj2->pvh;
        //	else $pv=0;
        $pv = $sqlObj2->total_y;
    } else {
        $pv = 0;
    }
    //echo $mcode.' : '.$pv.'<br>';
    return $pv;
}

function backmonthpv3($dbprefix, $mcode, $ro, $paydate)
{
    $chkdate = explode('-', $tdate);
    $chkdate1 = $chkdate[0];
    $sql2 = "select totaly as total_y from " . $dbprefix . "cmbonus WHERE  mcode='$mcode' and paydate like '%" . $chkdate1 . "%'   and rcode <= $ro order by rcode desc limit 0,1 ";
    //if($mcode[$j] == '0000007')
    if ($mcode == '0000007') {
        //echo $sql2.'<br>';
        //exit;
    }
    $rs2 = mysql_query($sql2);
    if (mysql_num_rows($rs2) > 0) {
        $sqlObj2 = mysql_fetch_object($rs2);
        //	if($sqlObj2->status == '0')$pv= $sqlObj2->pvh;
        //	else $pv=0;
        $pv = $sqlObj2->total_y;
    } else {
        $pv = 0;
    }
    //echo $mcode.' : '.$pv.'<br>';
    return $pv;
}

function get_sp_code($dbprefix, $n_mcode, $pos_cur)
{
    $sql4 = "SELECT COUNT(mcode) as cnt FROM " . $dbprefix . "member where sp_code='" . $n_mcode . "' and pos_cur='$pos_cur' ";
    //echo "$sql4<br>";
    $rs4 = mysql_query($sql4);
    if (mysql_num_rows($rs4) > 0) {
        $row4 = mysql_fetch_object($rs4);
        $cnt = $row4->cnt;
        return $cnt;
    } else {
        return 0;
    }
}

function get_data_sql($field, $sql)
{
    //อ่านค่า จาก  select $field from $table where $field_and_value
    $result = mysql_query($sql);
    if ($result) {
        if ($row = mysql_fetch_object($result)) {
            $value = $row->$field;
            mysql_free_result($result);
            return $value;
        }
    }
    return false;
}

function get_data_object($field, $sql)
{
    //อ่านค่า จาก  select $field from $table where $field_and_value
    $result = mysql_query($sql);
    if ($result) {
        if ($row = mysql_fetch_object($result)) {
            $value = $row;
            mysql_free_result($result);
            return $value;
        }
    }
    return false;
}


function getmicrotime()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function createTree($ro, $mcode)
{
    //ฟังก์ชั่นสำหรับคำนวณ
    global $dbprefix, $ro;

    $sql = "select mcode from " . $dbprefix . " where upa_code = '$mcode' ";
    for ($i = 0; $i < 2; $i++) {

    }
}

function checkpvformcode($pvmcode, $dbpre)
{
    global $gpv_new, $pv_new;
    $sql = "SELECT mcode,gpv,pv FROM " . $dbpre . "cm Where mcode='$pvmcode' ";
    $rs = mysql_query($sql);
    if (mysql_num_rows($rs) > 0) {
        $row = mysql_fetch_object($rs);
        $gpv_new = $row->gpv;
        $pv_new = $row->pv;
        echo "คำแนน : สะสม  $gpv_new ใหม $pv_new รหัส $pvmcode<BR> ";
    } else {
        $gpv_new = 0;
        $pv_new = 0;
    }
    //mysql_free_result($sql);
}

function getpositionnow($posmcode, $dbpre)
{
    global $pos_new;
    $sql = "SELECT mcode,pos_cur FROM " . $dbpre . "member Where mcode='$posmcode' ";
    $rs = mysql_query($sql);
    if (mysql_num_rows($rs) > 0) {
        $row = mysql_fetch_object($rs);
        $pos_new = $row->pos_cur;
        echo "ตำแหน่งปัจจุบัน : $pos_new รหัส $posmcode <BR>";
    } else {
        $pos_new = "";
    }
    //mysql_free_result($sql);
}

function getlastpvcmbonus($pmcode, $prcode, $dbpre)
{
    global $pcarry_l, $pcarry_r;
    $sql = "SELECT rcode,mcode,carry_l,carry_r FROM " . $dbpre . "cmbonus WHERE rcode=(SELECT max(rcode) FROM " . $dbpre . "cmbonus WHERE rcode<" . $prcode . ") and mcode='$pmcode' ";
    //echo "ตรวจสอบ คะแนนก่อนหน้า : $sql <BR>";
    $rs = mysql_query($sql);
    if (mysql_num_rows($rs) > 0) {
        $row = mysql_fetch_object($rs);
        $pcarry_l = $row->carry_l;
        $pcarry_r = $row->carry_r;
        echo "คะแนนคงเหลือก่อนหน้า : $pcarry_l   $pcarry_r รหัส $pmcode<BR> ";
    } else {
        $pcarry_l = 0;
        $pcarry_r = 0;
        echo "ไม่มีคะแนนคงเหลือ : $pcarry_l   $pcarry_r รหัส $pmcode<BR>";
    }
    //mysql_free_result($sql);
}

function getPair($cur_r, $cur_l, $remain_r, $remain_l)
{
    global $cut, $tot_l, $tot_r, $strongside, $sumright, $sumleft;
    $sumleft = ($cur_l + $remain_l);
    $sumright = ($cur_r + $remain_r);
    $lsum = floor(($sumleft - fmod($sumleft, 1000)) / 1000);
    $rsum = floor(($sumright - fmod($sumright, 1000)) / 1000);

    $cut = min($lsum, $rsum);

    if ($lsum == $rsum) {
        //------ 2:1 สลับ 1:2 ---------//
        $t1 = floor($lsum / 3);
        $tot_l = $sumleft - ($t1 * 3) * 1000;
        $tot_r = $sumright - ($t1 * 3) * 1000;
        $cut = $t1 * 2;
        if (($lsum - ($t1 * 3)) == 2) { // left high priority
            $tot_l = 0;
            $tot_r = 1000;
            $cut += 1;
        }
        echo "จากฝั่งซ้าย $lsum ฝั่งขวา $rsum ตัด $cut เหลือซ้าย $tot_l เหลือขวา $tot_r <br>";
        $strongside = "E";

    } else if ($lsum > $rsum) {

        $t1 = floor($lsum / 2);
        if ($t1 > $rsum) $t1 = $rsum;
        $tot_l = $sumleft - ($t1 * 2) * 1000;
        $tot_r = $sumright - ($t1) * 1000;
        $cut = $t1;
        $strongside = "L";
        echo "จากฝั่งซ้าย $lsum ,ฝั่งขวา $rsum ตัด $cut เหลือซ้าย $tot_l เหลือขวา $tot_r <br>";

    } else { // rsum > lsum
        $t1 = floor($rsum / 2);
        if ($t1 > $lsum) $t1 = $lsum;
        $tot_r = $sumright - ($t1 * 2) * 1000;
        $tot_l = $sumleft - ($t1) * 1000;
        $cut = $t1;
        $strongside = "R";
        echo "จากฝั่งซ้าย $lsum  , ฝั่งขวา $rsum ตัด $cut เหลือซ้าย $tot_l เหลือขวา $tot_r <br>";
    }

}


function dateDiff($startDate, $endDate)
{
    // Parse dates for conversion 
    $startArry = date_parse($startDate);
    $endArry = date_parse($endDate);

    // Convert dates to Julian Days 
    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]);
    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]);

    // Return difference 
    return round(($end_date - $start_date), 0);

}


function del_cals($dbprefix, $ro, $name = array())
{
    foreach ($name as $key => $value):
        $sql = "delete from " . $dbprefix . $value . " where rcode >= '" . $ro . "'";
        if ($value == 'ewallet') $sql .= " and (cals = 'C'  or cals = 'V') ";
        //echo $sql.'<br>';
        if (mysql_query($sql)) {
            mysql_query("COMMIT");
        } else {
            echo "error $sql<BR>";
        }
    endforeach;
}

?>