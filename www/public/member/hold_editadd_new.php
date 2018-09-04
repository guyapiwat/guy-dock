<?
$_SESSION["holdoperate"] = '1';
if ($GLOBALS["status_hold_mb"] <> '1') {
    echo ' <font style="font-size:1.7em" color="#FF0000" ><b><center>' . $GLOBALS["status_remark"] . ' 
	</b></center>
	</font>';
    exit;
}
?>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">
    <?
    session_start();

    if ($_SESSION["lan"] != $_GET["lan"] and !empty($_GET["lan"])) {
        if (empty($_GET["lan"])) $_SESSION["lan"] = "TH";
        else $_SESSION["lan"] = $_GET["lan"];
    } else {
        if (empty($_SESSION["lan"])) $_SESSION["lan"] = "TH";
    }
    include_once("wording" . $_SESSION["lan"] . ".php");
    mysql_query("SET NAMES UTF8");

    ?>
    function chknum(key) {
        if (key >= 48 && key <= 57)
            return true;
        else
            return false;
    }

    function Inint_AJAX() {
        try {
            return new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
        } //IE
        try {
            return new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
        } //IE
        try {
            return new XMLHttpRequest();
        } catch (e) {
        } //Native Javascript
        alert("XMLHttpRequest not supported")
        return null
    }

    function chknum(key) {
        //alert(key);
        if (key >= 48 && key <= 57)
            return true;
        else
            return false;
    }

    function checktype(id) {
        if (id == 'R') {
            $('#divmemberfreemain').show();
            $('#divlr').show();
            $('#type-display').text("รหัสผู้แนะนำ");
        } else {
            $('#divmemberfreemain').hide();
            $('#divlr').hide();
            $('#type-display').text("รหัสสมาชิก");
        }

    }

    function checkForm(frm) {
        //
        // check form input values
        //
        //alert($( "#satype" ).val(););

        frm.ok.disabled = true;
        frm.ok.value = "Please wait...";
        return true;
    }

    function str_pad(input, pad_length, pad_string, pad_type) {
        for (i = input.length; i < pad_length; i++) {
            if (pad_type)
                input = input + pad_string;
            else
                input = pad_string + input;
        }
        return input;
    }

    //sendget_sponsor1('<?echo($_SESSION['usercode']);?>');

    function sendget_sponsor1(value) {
        var req = Inint_AJAX(); //���ҧ Object
        // aalert(value)
        value = str_pad(value, 7, 0, false);
        value = value.toUpperCase();

        req.open('GET', 'search_memberm.php?value=' + encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
        req.onreadystatechange = function () { //�˵ء�ó�������ա�õͺ��Ѻ
            if (req.readyState == 4) {
                if (req.status == 200) { //���Ѻ��õͺ��Ѻ���º����
                    var data = req.responseText;
                    var myarr = data.split("|");

                    //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
                    //aalert(req.responseText);

                    if (data == '') {
                        document.getElementById('sp_code').value = "";
                        document.getElementById("sp_name").value = "ไม่ได้อยู่ในสายงาน";
                        document.getElementById("l1").innerHTML = "";//�ʴ���
                        document.getElementById("l2").innerHTML = "";
                    }

                    if (data == 1234) {
                        document.getElementById('sp_code').value = "";
                        document.getElementById("sp_name").value = "ไม่ได้อยู่ในสายงาน";
                        document.getElementById("l1").innerHTML = "";//�ʴ���
                        document.getElementById("l2").innerHTML = "";
                        //document.getElementById("l3").innerHTML="";

                    } else {
                        //document.getElementById('sp_code').value = value;
                        //document.getElementById("sp_name").value = myarr[0].trim();
                        document.getElementById("l1").innerHTML = "รหัสอัพไลน์    " + myarr[1];//�ʴ���
                        document.getElementById("l2").innerHTML = "รหัสอัพไลน์    " + myarr[2];

                        var data1 = myarr[1];
                        var data1 = data1.split(' ');
                        var data1mcode = data1[0];
                        var data1name = data1[1] + ' ' + data1[3];
                        console.log(data1mcode);
                        $('#lr1code').val(data1mcode);

                        var data2 = myarr[2];
                        var data2 = data2.split(' ');
                        var data2mcode = data2[0];
                        var data2name = data2[1] + ' ' + data2[3];
                        console.log(data2mcode);
                        $('#lr2code').val(data2mcode);
                        //document.getElementById("l3").innerHTML="���� "+myarr[3];
                        if ($('#satype')[0].value == 'R') {
                            get_memberfree(value);
                        }
                    }
                    //aalert(data);
                    //if(data == "No Data"){
                    //	aalert('a');
                    //	document.getElementById("mcode").innerHTML="";}

                }
            }
        };
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
        req.send(null); //�ӡ����
    };


    function get_memberfree(value) {
        var req = Inint_AJAX(); //���ҧ Object
        // aalert(value)
        value = str_pad(value, 7, 0, false);
        value = value.toUpperCase();

        req.open('GET', 'getmemberfree.php?value=' + encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
        req.onreadystatechange = function () { //�˵ء�ó�������ա�õͺ��Ѻ
            if (req.readyState == 4) {
                if (req.status == 200) { //���Ѻ��õͺ��Ѻ���º����
                    var data = req.responseText;
                    var myarr = data.split("|");
                    
                    data = data.trim();
                    console.log(data);
                    //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
                    //aalert(req.responseText);
                    if (data== '1234') {
                        // document.getElementById('sp_code').value = "";
                        // document.getElementById("sp_name").value = "ไม่ได้อยู่ในสายงาน";
                        // document.getElementById("l1").innerHTML = "";//�ʴ���
                        // document.getElementById("l2").innerHTML = "";
                        document.getElementById("divmemberfree").innerHTML="ไม่พบข้อมูลลงทะเบียน";

                    } else {
                        //document.getElementById('sp_code').value = value;
                        //document.getElementById("sp_name").value = myarr[0].trim();
                        //document.getElementById("l1").innerHTML = "รหัสอัพไลน์    " + myarr[1];//�ʴ���
                        //document.getElementById("l2").innerHTML = "รหัสอัพไลน์    " + myarr[2];
                        //document.getElementById("l3").innerHTML="���� "+myarr[3];
                        document.getElementById("divmemberfree").innerHTML = data;
                        //console.log(data);

                    }
                    //aalert(data);
                    //if(data == "No Data"){
                    //	aalert('a');
                    //	document.getElementById("mcode").innerHTML="";}

                }
            }
        };
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
        req.send(null); //�ӡ����
    };


    function sendget_sponsor(value) {
        var req = Inint_AJAX(); //สร้าง Object
        // alert(value)
        //value = str_pad(value,7,0,false);
        value = value.toUpperCase();
        //alert(test);
        req.open('GET', 'search_member_h.php?value=' + encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
        req.onreadystatechange = function () { //เหตุการณ์เมื่อมีการตอบกลับ
            if (req.readyState == 4) {
                if (req.status == 200) { //ได้รับการตอบกลับเรียบร้อย
                    var data = req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
                    //alert(data);
                    if (data == 1234) {
                        document.getElementById('mcode').value = "";
                        //document.getElementById("mname").innerHTML = "<?=$wording_lan['tab4']['1_27']?>";
                        document.getElementById("mname").innerHTML = "ไม่ได้อยู่ในสายงาน";
                        //chkStatusHold();
                    }
                    else if (data.trim() == "idCard") {
                        document.getElementById('mcode').value = "";
                        document.getElementById("mname").innerHTML = "สมาชิก " + value + " ค้างส่งเอกสาร";
                    }
                    else if (data.trim() == "memterminate") {
                        document.getElementById('mcode').value = "";
                        aalert('<?=$wording_lan["rp"]["id"]?> ' + value + ' <?=$wording_lan["txt_terminate"]?>');

                    } else {
                        document.getElementById('mcode').value = value;
                        document.getElementById("mname").innerHTML = data; //แสดงผล
                        //chkStatusHold();
                    }
                }
            }
        };
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
        req.send(null); //ทำการส่ง
    };
    var xmlHttp;

    function ibillcheck() {


//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
        var val = document.getElementById('sadate').value;
        var field = "sadate";
        var flag = "1-0-0-0-0";
        var errDesc = "วันที่";

        val = val + "," + document.getElementById('mcode').value;
        field = field + ",mcode";
        flag = flag + ",1-9-0-0-0";
        errDesc = errDesc + ",<?=$wording_lan["tab2_1_5"]?>";

        val = val + "," + document.getElementById('satype').value;
        field = field + ",satype";
        flag = flag + ",1-0-0-0-0";
        errDesc = errDesc + ",รูปแบบการซื้อ";


        //  val = val + "," + document.getElementById('memberfreeid').value;
        // field = field + ",memberfreeid";
        // flag = flag + ",1-0-0-0-0";
        // errDesc = errDesc + ",กรุณาเลือกสมาชิกที่ต้องการก่อนค่ะ";
   

        document.getElementById('checkstate').innerHTML = "<img align='center' src='./images/loading.gif' />";

        if ($("#satype").val() == 'R') {
            if($("#sumpv").val()<400){
               
            if(document.getElementById('memberfreeid').value){
            }else{
                pPanel='checkstate';
            saveResult("" + '<div class=\'alert alert-danger center\'> ไม่พบสมาชิกที่สมัครเข้ามาค่ะ</br> </div>');
            status1=false; 
            document.getElementById('ok').disabled=true;   
            }


           
            if(document.getElementById('memberfreeid').value+"x"=="x" && status1){
            pPanel='checkstate';
            document.getElementById('ok').disabled=true;
            saveResult("" + '<div class=\'alert alert-danger center\'> คะแนนต้อง 400 ขึ้นไป</br> </div>');
            status1=false;   
                }

          


            if($("#sumpv").val()<400 && status1){
            pPanel='checkstate';
            document.getElementById('ok').disabled=true;
            saveResult("" + '<div class=\'alert alert-danger center\'> คะแนนต้อง 400 ขึ้นไป</br> </div>');
            status1=false;   
            }

            if(status1){
                startRQ(field, val, "", flag, errDesc, "asaleh", "checkstate");

            }

         }else{


     var hpv =<?=$_SESSION["hpv"];?>;
        if($("#sumpv").val()>hpv){
            pPanel='checkstate';
            document.getElementById('ok').disabled=true;
            saveResult("" + '<div class=\'alert alert-danger center\'> คะแนน Hold PV ในระบบไม่เพียงพอ</br> </div>');
             
        }else{
             startRQ(field, val, "", flag, errDesc, "asaleh", "checkstate");
        }
           

        }
    }

    function calfinal() {
        tag = window.parent.document.frm.getElementsByTagName('input');
        //alert(tag.length);
        var sumtotal = 0;
        var sumpv = 0;
        var skip = 12;
        var bgskip = 8;
        for (i = 0; i < (tag.length - skip) / 9; i++) {
            step = i * 9 + bgskip;
            //step++;

            price = parseFloat(tag[step + 2].value);
            pv = parseFloat(tag[step + 3].value);
            num = parseFloat(tag[step + 4].value);
            if (num > parseFloat(tag[step + 5].value)) {
                num = parseFloat(tag[step + 5].value);
                alert("จำนวนสินค้ามีไม่เพียงพอ");
                tag[step + 4].value = num;
            }
            tag[step + 6].value = num * price;
            tag[step + 7].value = num * pv;
            sumtotal = sumtotal + (price * num);
            sumpv = sumpv + (pv * num);

        }
        document.getElementById('sumtotal').value = sumtotal;
        document.getElementById('sumpv').value = sumpv;
    }
</script>
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
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript" type="text/javascript">
    var wi = null;

    function get_mem_listpicker_mcode() {
        if (wi) wi.close();
        //alert(this.getElementById('mcode_acc_name').innerHTML);
        wi = window.open("mem_listpicker_mcode.php?name=" + document.frm.mcode.value, "list_picker_window", "menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
    }

    function get_mem_listpicker_invcode() {
        if (wi) wi.close();
        //alert(this.getElementById('mcode_acc_name').innerHTML);
        wi = window.open("invent_listpicker.php", "list_picker_window", "menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
    }

    function cal() {
        tag = window.parent.document.frm.getElementsByTagName('input');
        //alert(tag.length);
        var sumtotal = 0;
        var sumpv = 0;
        var skip = 12;
        var bgskip = 8;
        for (i = 0; i < (tag.length - skip) / 9; i++) {
            step = i * 9 + bgskip;
            //step++;

            price = parseFloat(tag[step + 2].value);
            pv = parseFloat(tag[step + 3].value);
            num = parseFloat(tag[step + 4].value);
            if (num > parseFloat(tag[step + 5].value)) {
                num = parseFloat(tag[step + 5].value);
                alert("จำนวนสินค้ามีไม่เพียงพอ");
                tag[step + 4].value = num;
            }
            tag[step + 6].value = num * price;
            tag[step + 7].value = num * pv;
            //document.getElementById('sumtotal').value=sumtotal;
            //document.getElementById('sumpv').value=sumpv;
            //alert(num +" " + pv +" "+ price);
            sumtotal = sumtotal + (price * num);
            sumpv = sumpv + (pv * num);
            //alert(sumtotal+ " " + price + " " + num);

        }
        document.getElementById('sumtotal').value = sumtotal;
        document.getElementById('sumpv').value = sumpv;
        window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font>";
        //alert(window.parent.document.mainsale.getElementsByTagName('input').length);
        //alert(sumtotal);
    }

</script>
</head>

<body>
<?
if ($_SESSION['usercode'] == 'TH6581377') {
    //echo '<pre>'; print_r($_SESSION); echo '</pre>';
}

$sql = "SELECT hpv FROM " . $dbprefix . "asaleh WHERE id='" . $_GET['bid'] . "' LIMIT 1";
$rs = mysql_query($sql);
if (mysql_num_rows($rs) > 0) {
    $hpv = mysql_result($rs, 0, 'hpv');
} else $hpv = 0;


?>
<!--
<div class="row">
	<div class="col-xs-3">
	</div>
	<div class="col-xs-6 alert alert-danger">
	<center>ระบบมีการ Update Version 2.0 </center>
	</div>

<center><img src="./images/logo.png" width=50%></center>

	<div class="col-xs-3">
	</div>
	<div class="col-xs-6 alert alert-danger">
	<center>ระบบมีการ Update Version 2.0 </center>
	</div>
</div>
-->
<? //exit;?>
<form method="post" action="holdoperate.php?state=0" id="frm" name="frm" onsubmit="return checkForm(this)"
      onKeyDown="document.getElementById('ok').disabled=true;">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="clearfix">
                <div>
                    <div id="user-profile-1" class="user-profile row">
                        <div class="col-xs-12 col-sm-2 ">&nbsp;</div>
                        <div class="col-xs-12 col-sm-7">
                            <div class="profile-user-info profile-user-info-striped ">
                                <div class="profile-info-row table-header">
                                    <div class="profile-info-value">&nbsp;</div>
                                    <div class="profile-info-value"></div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab4"]["1_3"] ?> </div>
                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input type="text" id="sadate" name="sadate"
                                                   value="<?= $sadate == "" ? $_SESSION["datetimezone"] : $sadate ?>"
                                                   readonly="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab4"]["1_1"] ?>     </div>
                                    <div class="profile-info-value">
                                        <div class="controls">

                                            <?
                                            //var_dump($_SESSION['usercode']);
                                            //var_dump($arr_satypeh2);?>

                                            <select name="satype" id="satype"
                                                    onChange="document.getElementById('ok').disabled=true;checktype(this.options[this.selectedIndex].value);">
                                                <?


                                                if ($_SESSION["mtype1"] == '0') $chktype = $arr_satypeh2;
                                                else $chktype = $arr_satypeh1;
                                                foreach ($chktype as $key => $value):
                                                    echo '<option value="' . $key . '"';
                                                    if ($satype == $key) echo "selected";
                                                    echo '>' . $value . '</option>';
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["productshow"]["4"] ?> </div>
                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input type="number" min=0 id="sumpv" name="sumpv"
                                                   onkeypress="return chknum(window.event.keyCode)" class="form-control"
                                                   value=0>
                                        </div>
                                    </div>
                                </div>


                                <div class="profile-info-row">
                                    <div id="type-display" class="profile-info-name">
                                        รหัสสมาชิก<? //= $wording_lan["tab5"]['1_4'] ?> </div>
                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input type="text" id="mcode" name="mcode" class="form-control"
                                                   maxlength="9">
                                            <span class="input-group-btn">
									<button class="btn btn-sm btn-default" type="button"
                                            onClick="sendget_sponsor(document.getElementById('mcode').value);sendget_sponsor1(document.getElementById('mcode').value);">
										<i class="ace-icon fa fa-search bigger-110"></i>
										ค้นหา
									</button>
									</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name">
                                    </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <div id="mname"><br><br><br></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row" id="divmemberfreemain" style="display:none;">
                                    <div class="profile-info-name"> สมาชิกที่ยังไม่ลงผัง</div>
                                    <div class="profile-info-value" id="divmemberfree">
                                        <div class="input-group col-sm-9 col-xs-9">

                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row" id="divlr" style="display:none;">
                                    <div class="profile-info-name"> ด้าน&nbsp;
                                        <input type="hidden" name="lrmcode" id="lrmcode" value="">
                                    </div>

                                    <div class="input-group col-sm-9 col-xs-9">
                                        <div class="space-6"></div>
                                        <div class="space-6"></div>

                                        <div style="clear:both">
                                            <div class="lr" style=" width: 100px;   float: left;">
                                                &nbsp;&nbsp;<input tabindex="6"
                                                                   onclick="document.getElementById('ok').disabled=true;$('#lrmcode').val($('#lr2code').val())"
                                                                   type="radio" name="lr" id="lr" value="2">&nbsp;&nbsp;ขวา
                                                <br><br>
                                                <input type="hidden" name="lr2code" id="lr2code" value="">
                                            </div>
                                            <div id="l2"></div>
                                        </div>
                                        <div style="clear:both">
                                            <div class="lr" style=" width: 100px;   float: left;">
                                                <input type="hidden" name="lr1code" id="lr1code" value="">
                                                &nbsp;&nbsp;<input tabindex="6"
                                                                   onclick="document.getElementById('ok').disabled=true;$('#lrmcode').val($('#lr1code').val())"
                                                                   type="radio" name="lr" id="lr" value="1">&nbsp;&nbsp;ซ้าย
                                                <br><br>
                                            </div>
                                            <div id="l1"></div>
                                        </div>
                                        <input type="hidden" name="olr" id="olr" value="">

                                    </div>
                                    <div class="space-6"></div>
                                    <div class="space-6"></div>
                                </div>

                            </div>
                            <div class="space-6"></div>
                            <div id="checkstate" class="text-center"></div>
                            <div class="space-6"></div>
                        </div>
                        <div class="col-xs-12 col-sm-2 ">&nbsp;</div>
                    </div>
                </div>
            </div>
        </div>
        <center>
            <!--<input type="checkbox" name="chkpayment" id="chkpayment" value="checkbox" onChange="if(this.checked == true){document.getElementById('button').disabled = false;document.getElementById('ok').disabled = true;}else{document.getElementById('button').disabled = true;document.getElementById('ok').disabled = true;}"  />
                      <a href="#">ยืนยันการโอน Ecom เข้า Ewallet</a><br/><br/>--><br/>


            <button class="btn btn-info" name='button' id='button' type='button' onClick="ibillcheck()">
                <i class="ace-icon fa-dot-circle-o bigger-110"></i>
                <?= $wording_lan["tab1_mem_85"] ?>
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn btn-info" name="ok" id="ok" disabled type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                <?= $wording_lan["tab4"]["5_18"] ?>
            </button>
            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                <?= $wording_lan["tab4"]["5_19"] ?>
            </button>
        </center>
</form>
<div style="clear:both"></div>

