<? session_start();
unset($_SESSION["cart_item"]);
unset($_SESSION["discount"]);

?>
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <style>
        .error {
            text-align: center;
            background-color: red;
            padding: 10px;
            color: #fff;
            font-weight: bolder;
            cursor: pointer;
        }

        .error2 {
            text-align: center;
            background-color: red;
            padding: 10px;
            color: #fff;
            font-weight: bolder;
        }

        .red {
            color: red;
        }

        .green {
            color: green;
        }

        .payment-item table {
            /* font-family: "Helvetica Neue", Helvetica, sans-serif;*/
            width: 100%;
        }

        .payment-item a {
            cursor: pointer;
        }

        .payment-item caption {
            text-align: left;
            color: silver;
            font-weight: bold;
            text-transform: uppercase;
            padding: 5px;
        }

        .payment-item thead {
            background: SteelBlue;
            color: white;
        }

        .payment-item th, .payment-item td {
            padding: 5px 10px;
        }

        .payment-item tbody tr:nth-child(even) {
            background: WhiteSmoke;
        }

        .payment-item tbody tr td:nth-child(2) {
            text-align: center;
        }

        .payment-item tbody tr td:nth-child(4), tbody tr td:nth-child(5) {
            /* text-align: right; */
            font-family: monospace;
        }

        .payment-item tfoot {
            background: SeaGreen;
            color: white;
            text-align: right;
        }

        .payment-item tfoot tr th:last-child {
            font-family: monospace;
        }

        .submit {
            background-color: #FDF5CE !important;
        }

        .waiting {
            text-align: center;
            /* background-color: #FFFFFF; */
            /* width: 81px; */
            padding: 10px;
            color: #5AC716;
            margin: 0 auto;
            font-weight: 900;
        }
    </style>
    <script type="text/javascript">

        function get_package_listpicker_mcode() {
            var wi = null;
            if (wi) wi.close();
            var namefiled = $('#namefiled').val();
            wi = window.open("member_listpicket.php?namefiled=" + namefiled, "list_picker_window", "menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
        }

    </script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            var texthtml = "<div class='error2'>Choose Product</div>";
            var texthtml2 = "<div class='error' onClick='get_package_listpicker_mcode()'  >Choose Member</div>";
            if ($('#cart-item').text() == '') {
                $('#cart-item').html(texthtml);
            }
            if ($('#member-item').text() == '') {
                dataType: 'application/json; charset=utf-8';
                queryString = 'action=set' + '&mcode=';
                link = '<?=$actual_link?>cart/member_branch_item.php';
                $.post(link, queryString, function (data) {

                    $('#member-item').html(data);
                });
            }

            var namefiled = $('#namefiled').val();
            var txt = namefiled.split(',');

            for (var i = 0; i < txt.length; i++) {
                $('#txt' + txt[i]).prop('disabled', true);
            }
        });

        function cartAction(action, product_code, qty) {

            //mcode
           var mcode= $('#mcode').val();
            //alert(mcode);
            if(mcode){
                //alert('mcode มี');
            }else{
                //alert('mcode ไม่มี');
            }

            checkinForm();
            var queryString = "";
            if (qty == '') qty = 1;
            if (action != "") {
                switch (action) {
                    case "add":
                        queryString = 'action=' + action + '&pcode=' + product_code + '&qty=' + qty;
                        break;
                    case "plus":
                        queryString = 'action=' + action + '&pcode=' + product_code + '&qty=' + qty;
                        break;
                    case "remove":
                        queryString = 'action=' + action + '&pcode=' + product_code;
                        break;
                    case "price":
                        queryString = 'action=' + action + '&pcode=' + product_code + '&qty=' + qty;
                        break;
                    case "pv":
                        queryString = 'action=' + action + '&pcode=' + product_code + '&qty=' + qty;
                        break;
                    case "free":
                        queryString = 'action=' + action + '&pcode=' + product_code;
                        break;
                    case "nofree":
                        queryString = 'action=' + action + '&pcode=' + product_code;
                        break;
                    case "empty":
                        queryString = 'action=' + action;
                        break;
                    case "refresh":
                        queryString = 'action=' + action + '&pcode=' + product_code;
                        ;
                        break;
                }
            }

            dataType: 'application/json; charset=utf-8';
            link = '<?=$actual_link?>cart/cart_branch.php';
            $.post(link, queryString, function (data) {
                $('#waiting-item').html('');
                $('#cart-item').html(data);
            });

        }

        function chkHold() {


            link = '<?=$actual_link?>branch/chksale.php';
            $.post(link, $('form[name=frm]').serialize(), function (data) {
                if (data.trim() != "") {
                    alert(data.trim());
                    //$('#waiting-item').addClass('text-red').html(data.trim());
                    $("#ok").prop('disabled', true);
                    $('#waiting-item').html("");
                    exit;
                    return false;

                } else {
                    //$('#waiting-item').removeClass('text-red');

                }
            });

        }

        function eproductcheck() {

            var mcode = $('#mcode').val();
            checkForm();
            if (typeof mcode === 'undefined') {
                alert('เลือก Member');
                return false;
                checkinForm();
            }

            var send = $('#radsend').val();
            var weight = $('#sumtotal').val();
            if (send == '1') {
                if (weight >= 0) {
                    queryString = 'action=resending' + '&weight=' + weight;
                    dataType: 'application/json; charset=utf-8';
                    link = '<?=$actual_link?>cart/cart_branch.php';
                    $.post(link, queryString, function (data) {
                        $('#cart-item').html(data);

                        var weightx = $('#sumweigh').val();
                        if (weightx >= 10000) {
                            // alert('สินค้าน้ำหนักเกิน 10Kg กรุณาติดต่อสอบถามฝ่ายสมาชิก');
                            // return false;
                        }
                        checkpay();
                    });
                }
            } else {
                if ($('#cremark1').val() == '') {
                    // alert('กรอกหมายเหตุการรับสินค้าด้วค่ะ');
                    //$('#ok').val("บันทึก");
                    // return false;
                }
                checkpay();
            }
            chkHold();
        }

        function checkpay() {

            var qty = $('#sumqty').val();
            var total = $('#sumtotal').val();
            var pv = $('#sumpv').val();

            var namefiled = $('#namefiled').val();
            var txt = namefiled.split(',');
            var sum = 0;
            for (var i = 0; i < txt.length; i++) {
                sum += sumtxt("txt" + txt[i]);
                if (sumtxt("txt" + txt[i]) > 0) {
                    if ($("#select" + txt[i]).val() == '') {
                        $("#select" + txt[i]).css('border', '1px solid #FF0000');
                        alert('รูปแบบการชำระ');
                        return false;
                    } else {
                        $("#select" + txt[i]).css('border', '1px solid #41A717');
                    }
                } else {
                    $("#select" + txt[i]).val("");
                    $("#select" + txt[i]).css('border', 'none ');
                }
            }

            if ($('#satype').val() == '') {
                alert('รูปแบบการซื้อ');
                return false;
            }

            if ($('#radsend').val() == '') {
                alert('การจัดส่ง');
                return false;
            }

            if ($('#radsend').val() == '1') {
                checkDataCaddress();
            }


            if (parseInt(sum) == parseInt(total)) {
                $('#waiting-item').html("PASS");
                $('#ok').val("บันทึก");
                $("#ok").prop('disabled', false);
                return true;
            } else {
                alert(" การจ่าย ไม่พอ  หรือ มากกว่าสืนค้า");
                checkinForm();
                return false;
            }


        }


        function checksatype(val) {
            var sa_type = val.value;
            if (sa_type != '') {
                $("#satype").css('border', '1px solid #41A717');
            } else {
                $("#satype").css('border', '1px solid #FF0000');
            }
            var product_code = 'DIS001'; //* set product discount //
            if (sa_type == 'D') {
                alert("Discount 30% and PV = 0 ");
                queryString = 'action=discount' + '&pcode=' + product_code;
                dataType: 'application/json; charset=utf-8';
                link = '<?=$actual_link?>cart/cart_branch.php';
                $.post(link, queryString, function (data) {
                    $('#cart-item').html(data);
                });
            } else {
                queryString = 'action=undiscount' + '&pcode=' + product_code;
                dataType: 'application/json; charset=utf-8';
                link = '<?=$actual_link?>cart/cart_branch.php';
                $.post(link, queryString, function (data) {
                    $('#cart-item').html(data);
                });
            }
        }

        function checksend(val) {
            var send = val.value;
            if (send != '') {
                $("#radsend").css('border', '1px solid #41A717');
            } else {
                $("#radsend").css('border', '1px solid #FF0000');
            }
            var weight = $('#sumtotal').val();
            if (send == '1') {
                $('#address-item').show();
                $('#address1-item').hide();
                $("#inv_code").prop('disabled', true);
                if (weight >= 0) {
                    queryString = 'action=sending' + '&weight=' + weight;
                    dataType: 'application/json; charset=utf-8';
                    link = '<?=$actual_link?>cart/cart_branch.php';
                    $.post(link, queryString, function (data) {
                        $('#cart-item').html(data);
                    });
                }
            } else {
                $('#address-item').hide();
                $('#address1-item').show();
                $("#inv_code").prop('disabled', false);
                if (weight >= 0) {
                    queryString = 'action=unsending' + '&weight=' + weight;
                    dataType: 'application/json; charset=utf-8';
                    link = '<?=$actual_link?>cart/cart_branch.php';
                    $.post(link, queryString, function (data) {
                        $('#cart-item').html(data);
                    });
                }
            }
        }

        function checkForm() {
            $('#waiting-item').html();
            $("#ok").prop('disabled', true);
            //$('#ok').val("Please wait...");
            return true;
        }

        function checkFormsubmit(frm) {
            $('#waiting-item').html();
            frm.ok.disabled = true;
            frm.ok.value = "Please wait...";
            return true;
        }


        function checkinForm() {
            $('#waiting-item').html('');
            $("#ok").prop('disabled', true);
            $('#ok').val("บันทึก");
            return true;
        }

        function caltotal(total, key, chk) {
            $('#' + key).prop('disabled', false);
            var all_total = $('#sumtotal').val();
            $('#' + key).val('0');
            var namefiled = $('#namefiled').val();
            var txt = namefiled.split(',');
            var sum = 0;
            for (var i = 0; i < txt.length; i++) {
                sum += sumtxt("txt" + txt[i]);
            }

            if (all_total == undefined) all_total = 0;
            $('#' + key).val(all_total - sum);

            if ($("#" + chk)[0].checked == false) {
                $('#' + key).val('0');
                $('#' + key).prop('disabled', true);
            }
        }

        function sumtxt(namefiled) {
            var sum = $('#' + namefiled).val();
            return parseInt(sum);
        }

        function getCaddress(datas) {
            var cprovince = $('#cprovince').val();
            var camphur = $('#camphur').val();
            var cdistrict = $('#cdistrict').val();
            queryString = 'action=' + datas + '&cprovince=' + cprovince + '&camphur=' + camphur + '&cdistrict=' + cdistrict;
            dataType: 'application/json; charset=utf-8';
            link = '<?=$actual_link?>cart/getCaddress.php';
            $.post(link, queryString, function (data) {
                if (data.trim() != "") {
                    if (datas != "czip") {
                        $('#' + datas).html(data)
                    }
                    ;
                    if (datas == "camphur") {
                        getCaddress("cdistrict");
                    }
                    if (datas == "cdistrict") {
                        getCaddress("czip");
                    }
                    if (datas == "czip") {
                        $('#' + datas).val(data.trim());
                    }
                }
                else {
                    alert("เกิดข้อผิดพลาด");
                }
            });
        }

        function getAllCaddress(status) {
            if (status) {
                var mcode = $('#mcode').val();
                queryString = 'action=all&mcode=' + mcode;
                dataType: 'application/json; charset=utf-8';
                link = '<?=$actual_link?>cart/getCaddress.php';
                $.post(link, queryString, function (data) {
                    var arr1 = data.split("|");
                    for (var i = 0; i < arr1.length; i++) {
                        var arr2 = arr1[i].split(":");
                        arr2[0] = arr2[0].trim();
                        arr2[1] = arr2[1].trim();
                        if (arr2[0] == "camphur") {
                            getCaddress(arr2[0]);
                            setTimeout($('#' + arr2[0]).val(arr2[1]), 1000);
                        }
                        else {
                            $('#' + arr2[0]).val(arr2[1]);
                        }
                    }
                    //alert(data);
                });
            }
        }

        function checkDataCaddress() {
            var arr_chk = ["cname", "cmobile", "caddress", "cprovince", "camphur", "cdistrict", "czip"];
            for (var i = 0; i < arr_chk.length; i++) {
                if ($('#' + arr_chk[i]).val() == "") {
                    alert("กรุณากรอกข้อมูลจัดส่งให้ครบถ้วนค่ะ");
                    $('#' + arr_chk[i]).focus();
                    exit;
                }
            }
        }

    </script>
<? require("./date_picker.php");

 ?>
    <form method="post" action="billb_operate.php?state=<?= $_GET['id'] == "" ? 0 : 1 ?>" name="frm"
          onsubmit="return checkFormsubmit(this)">
        <table border="0">
            <tr valign="top">
                <td>

                    <table width="780" border="0">
                        <tr>
                            <td>
                                <div id="member-item"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div id="cart-item"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class='waiting' id="waiting-item"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php $set_payment = query("*", 'ali_payment_branch pb ', "pb.inv_code = '{$_SESSION["admininvent"]}' ");
                                if (count($set_payment)) {
                                    ?>
                                    <div id="payment-item" class="payment-item">
                                        <table>
                                            <caption>Payment</caption>
                                            <thead>
                                            <tr>
                                                <th width="5%" align="center"><strong>เลือก</strong></th>
                                                <th width="25%"><strong>ประเภท</strong></th>
                                                <th width="5%"><strong>เงิน</strong></th>
                                                <th width="10%"><strong>รูปแบบ </strong></th>
                                                <th width="10%"><strong> หมายเหตุ</strong></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $payment_idx = explode(',', $set_payment[0]['payment_id']);


                                            //var_dump($payment_idx);

                                            foreach ($payment_idx as $key => $payment_id) {
                                                $charset = "SET NAMES 'UTF8'"; 
                                                mysql_query($charset) or die('Invalid query: ' . mysql_error()); 
                                
                                                $payment = query("*", 'ali_payment pm', "pm.id = '{$payment_id}' and pm.shows ='1' ");
                                                if (count($payment)) {
                                                    ?>
                                                    <tr>
                                                        <td align=center><input type="checkbox"
                                                                                name="chk<?= $payment[0]['payment_column'] ?>"
                                                                                id="chk<?= $payment[0]['payment_column'] ?>"
                                                                                onClick="caltotal(this.value,'txt<?= $payment[0]['payment_column'] ?>','chk<?= $payment[0]['payment_column'] ?>')">
                                                        </td>
                                                        <td><?= $payment[0]['payment_name'] ?></td>
                                                        <td align=right><input type='number' min='0' value="0"
                                                                               style="width: 62px;text-align:right;"
                                                                               onkeypress='checkinForm();'
                                                                               name="txt<?= $payment[0]['payment_column'] ?>"
                                                                               id="txt<?= $payment[0]['payment_column'] ?>">
                                                        </td>
                                                        <td>
                                                            <?php $paymem_option = query("*", 'ali_payment_type py ', "py.inv_code = '{$set_payment[0]['inv_code']}' and py.payment_id = '{$payment_id}' and py.shows ='1' ");
                                                            if (count($paymem_option)) { ?>
                                                                <select size="1"
                                                                        name="select<?= $payment[0]['payment_column'] ?>"
                                                                        onchange='checkinForm();'
                                                                        id="select<?= $payment[0]['payment_column'] ?>"
                                                                        tabindex="63">
                                                                    <option value="">กรุณาเลือกรูปแบบการชำระ</option>
                                                                    <?php foreach ($paymem_option as $keyx => $valx) { ?>
                                                                        <option value="<?= $valx['id'] ?>"><?= $valx['pay_desc'] ?></option>
                                                                    <?
                                                                    } ?>
                                                                </select>
                                                                <br/>
                                                            <?
                                                            } ?>
                                                        </td>
                                                        <td><input name="option<?= $payment[0]['payment_column'] ?>"
                                                                   id="option<?= $payment[0]['payment_column'] ?>"
                                                                   onchange='checkinForm();' value="" type="text"
                                                                   size="30"></td>
                                                    </tr>
                                                    <?php
                                                    $namefiled .= $payment[0]['payment_column'] . ",";

                                                }
                                            }
                                            ?>
                                            <input value="<?= substr($namefiled, 0, -1) ?>" type="hidden"
                                                   id="namefiled">
                                            </tbody>
                                        </table>
                                    </div>
                                <? } else {
                                    ?>
                                    <div class='error2'>Branch not have payment</div>
                                <? } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div id="address-item" class="payment-item">
                                    <table>
                                        <caption>Address</caption>
                                        <thead>
                                        <tr>
                                            <th width="10%" align="center"></th>
                                            <th width="60%" align="center">กรอกข้อมูลที่อยู่สำหรับจัดส่งใหม่ หรือ <input
                                                        type="checkbox" onchange="getAllCaddress(this.checked)">
                                                ส่งสินค้าตามที่อยู่ที่ได้แจ้งไว้กับบริษัทฯ
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td width="10%" align="right">ชื่อนาม-สกุล<font color="#ff0000">*</font>
                                            </td>
                                            <td width="60%" style="text-align:left;"><input value="" name="cname"
                                                                                            id="cname"></td>
                                        </tr>
                                        <tr>
                                            <td align="right">เบอร์โทรศัพท์<font color="#ff0000">*</font></td>
                                            <td style="text-align:left;"><input value="" name="cmobile" id="cmobile">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">ที่อยู่<font color="#ff0000">*</font></td>
                                            <td style="text-align:left;"><textarea
                                                        style="width:270px;height:60px;resize:none;" name="caddress"
                                                        id="caddress"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td align="right">จัดหวัด<font color="#ff0000">*</font></td>
                                            <td style="text-align:left;">
                                                <select name="cprovince" id="cprovince"
                                                        onchange="getCaddress('camphur')">
                                                    <option value="">กรุณาเลือก</option>
                                                    <?
                                                    $cprovince = query("*", 'province', " 1=1 ");
                                                    foreach ($cprovince as $keys => $values) {
                                                        echo "<option value='" . $values["provinceId"] . "'>" . $values["provinceName"] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">อำเภอ<font color="#ff0000">*</font></td>
                                            <td style="text-align:left;">
                                                <select name="camphur" id="camphur" onchange="getCaddress('cdistrict')">
                                                    <option value="">กรุณาเลือก</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">ตำบล<font color="#ff0000">*</font></td>
                                            <td style="text-align:left;">
                                                <select name="cdistrict" id="cdistrict" onchange="getCaddress('czip')">
                                                    <option value="">กรุณาเลือก</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">รหัสไปรษณีย์<font color="#ff0000">*</font></td>
                                            <td style="text-align:left;"><input value="" name="czip" id="czip"></td>
                                        </tr>
                                        <tr>
                                            <td align="right">หมายเหตุ</td>
                                            <td style="text-align:left;"><textarea style="width:270px;resize:none;"
                                                                                   name="cremark"
                                                                                   id="cremark"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div id="address1-item" style="display:none" class="payment-item">
                                    <table>
                                        <caption>Received</caption>
                                        <thead>
                                        <tr>
                                            <th width="10%" align="center"></th>
                                            <th width="60%" align="center">กรอกข้อมูลการรับสินค้า</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td align="right">หมายเหตุ</td>
                                            <td style="text-align:left;"><textarea style="width:270px;resize:none;"
                                                                                   name="cremark1"
                                                                                   id="cremark1"></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <? 
                    
                    include('product_tab_new.php'); 
                   
                    ?>
                </td>
            </tr>
        </table>
    </form>


<?
function dialogbox($width, $color, $msg, $link)
{
    ?>
    <table width=<?= $width ?> bgcolor="<?= $color ?>">
    <tr valign="top">
        <td align="center"><font color="#FFFFFF"><?= $msg ?></font></td>
    </tr>
    <?
    if ($link != "") {
        ?>
        <tr valign="top">
        <td align="center"><?= $link ?></td>
        </tr><?
    }
    ?>
    </table><?
}


?>