<? session_start(); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        .red {
            color: red;
        }

        .green {
            color: green;
        }

        .satype {
            border: 1px solid #FF0000;
        }

        .member a {
            cursor: pointer;
        }

        .box {
            background-color: #fdf5ce !important;
            width: 100%;
            height: 190px;
            border-color: #2e6e9e;
            border: 4px solid #5c9ccc;
        }

        .member {

            padding: 10px;
            width: 45%;
            float: left;
        }

        .detail {

            padding: 10px;
            width: 45%;
            float: left;
        }

        .member label, .member input, .member select {
            display: block;
            width: 120px;
            float: left;
            margin-bottom: 5px;
        }

        .radio input {
            display: block;
            /*  width: 120px;
              float: left;
              */
            margin-bottom: 5px;
        }

        .member label {
            text-align: right;
            padding-right: 10px;
        }

        br {
            clear: left;
        }

    </style>
<?
include("../backoffice/connectmysql.php");
require_once("../share/textConverter.php");
?>
<? include("../function/function_pos.php"); ?>
<? include("../function/global_centeru.php"); ?>
<? include("../function/date_picker_new.php"); ?>
<?
if ($_SESSION["checkbackdate"] == '1') include("../function/date_picker_new.php");
?>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/base/jquery-ui.css">
    <SCRIPT LANGUAGE="JavaScript">

        function selectitem(mcode) {

            $('#waiting-item').html('');
            $("#ok").prop('disabled', true);
            $('#ok').val("บันทึก");

            var mcode = $('#mcode').val();
            if (mcode == '') {
                alert("กรุณใส่รหัสสมาชิก");
            }
            //
            dataType: 'application/json; charset=tis-620';
            queryString = 'action=set' + '&mcode=' + mcode;
            link = '<?=$actual_link?>cart/member_branch_item.php';
            $.post(link, queryString, function (data) {
                // alert(data);
                $('#member-item').html(data);
            });
        }
    </script>


<?php
if ($_POST['mcode']) {
    $mcode = genmcode($_POST['mcode']);
    $member = get_detail_meber($mcode, date("Y-m-d"));
    //var_dump($member);
    //echo $member['name_t'] ;

    if ($member['terminate'] == '1') {
        echo "<script language='JavaScript'>alert('รหัสสมาชิก " . $member['mcode'] . " ติดสถานะ Terminate');</script>";
        unset($member);
    } elseif ($member['cmp'] == '') {
        echo "<script language='JavaScript'>alert('รหัสสมาชิก " . $member['mcode'] . " ติดสถานะ ค้างส่งเอกสาร');</script>";
        unset($member);
    }
}

//if(count($member) > 0){
//foreach ($member as $key => $value){
//   $member[$key] = iconv("TIS-620", "UTF-8", $value);
//}
//}

if (count($member) >= 0) {
    //echo "m".$member['lr'];

    ?>
    <div class='box'>
        <div class='member'>
            <label>รหัสสมาชิก</label>
            <? $check = (count($member) > 0 ? 'check' : 'check-box-empty'); ?>
            <input id="mcode" name="mcode" onchange="selectitem()" value="<?= $member['mcode'] ?>" maxlength="9"> &nbsp;
            <input type="button" style="width:50px" onClick='selectitem()' value="ตรวจ">
            <a><img src="../images/font-awesome/open-folder.png" onClick='get_package_listpicker_mcode()'
                    alt="open-folder" width="20px"></a>
            <input id="mcode" name="mcode" type='hidden' value="<?= $member['mcode'] ?>">
            <!--<a>
			<img src="../images/font-awesome/<?= $check ?>.png" onClick='selectitem()' alt="open-folder" width="50px"></a>-->
            <!--input id="mcode" name="mcode" type='hidden'  value="<?= $member['mcode'] ?>"-->

            <br>
            <label>ชื่อ-นามสกุล</label>
            <input disabled="" value="<?= $member['name_t'] ?>"><br>
            <label>ตำแหน่ง</label>
            <input disabled="" value="<?= $member['pos_cur'] ?>"><br>
            <label>ประเภท</label>
            <input disabled="" value="<?= $arr_mtype1[$member['mtype']] ?>"><br>
            <label>Ewallet</label>
            <input disabled="" value="<?= $member['ewallet'] ?>"><br>
            <label>Evoucher</label>
            <input disabled="" value="<?= $member['voucher'] ?>"><br>
        </div>
        <div class='member'>
            <label>วันที่ซื้อ</label>
            <input type="text" id="dateInput1" name="sadate" onkeypress="return chknum(window.event.keyCode)"
                   value="<?= date("Y-m-d") ?>" placeholder="2014-01-20"/><br>
            <label>รูปแบบการซื้อ</label>
            <select name="satype" id="satype" onchange="checksatype(this)" class="satype">


                <?php
                ?>
                <option value="">เลือก</option>
                <?
                foreach ($arr_satype1 as $key => $value):
                    //if($member['pos_cur1'] == '' and $key == 'H' ){
                    ///** pos_cur1 < S member not have Hold
                    //}else{
                    if ($member['lr'] . "x" == "x") {
                        if ($key == "B") {
                            echo '<option value="' . $key . '"';
                            if (true) echo "selected";
                            echo '>' . $value . '</option>';
                        }

                    } else {
                        echo '<option value="' . $key . '"';
                        if ($satype == $key) echo "selected";
                        echo '>' . $value . '</option>';

                    }
                    // }
                endforeach;

                ?>
            </select><br>

            <label>จัดส่ง</label>
            <select name="radsend" id="radsend" onchange="checksend(this)" class="satype">
                <option value="">เลือก</option>
                <option value="2">ไม่จัดส่ง</option>
                <option value="1">จัดส่ง</option>
            </select>
            <br>
            <label>รับที่สาขา</label>
            <select name="inv_code" id="inv_code">
                <?
                $result1 = mysql_query("select *,inv_desc from ali_invent where locationbase = '" . $_SESSION["inv_locationbase"] . "' order by inv_code");

                for ($i = 1; $i <= mysql_num_rows($result1); $i++) {
                    $row1 = mysql_fetch_object($result1);

                    if ($_SESSION["lan"] == 'EN') {
                        $row1->inv_desc = $row1->inv_desc_eng;
                    } else {
                        $row1->inv_desc = $row1->inv_desc;
                    }
                    $row1->inv_desc = iconv("TIS-620", "UTF-8", $row1->inv_desc);
                    echo "<option value=\"" . $row1->inv_code . "\" ";
                    if ($_SESSION["admininvent"] == $row1->inv_code) {
                        echo "selected";
                    }
                    echo ">" . $row1->inv_desc . "</option>";
                }
                ?>
            </select>
            <br> <label></label><?php
            if (func_first_billhold($member['mcode']) == '1') {
                echo "<font color='red'>";
                //echo "บิลที่สองขึ้นไป";
                echo "<input type='hidden' name='discount' id='discount' value = '1'>";
                echo "</font>";

            }

            ?>
        </div>
    </div>
    <?php
} else { ?>
    <div class='error' onClick='get_package_listpicker_mcode()'>ไม่พบข้อมูล สมาชิก</div>
<? } ?>