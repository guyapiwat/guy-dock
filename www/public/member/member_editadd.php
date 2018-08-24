<?
session_start();
if ($GLOBALS["status_regis_mb"] <> '1') {
    echo ' <font style="font-size:1.7em" color="#FF0000" ><b><center>' . $GLOBALS["status_remark"] . ' 
	</b></center>
	</font>';
    exit;
}
$tt1 = $wording_lan["tab1_mem_15"];
$tt2 = $wording_lan["tab1_mem_16"];
$tt3 = $wording_lan["tab1_mem_17"];
$_SESSION["type_regist"] = 1;//  ��Ѥ� 300
include("global.php");
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
        echo "<script language='JavaScript'>alert('Ewallet �����§����Ѥ���Ҫԡ');window.location='index.php?sessiontab=1'</script>";
        exit;
    }
}

func_check();
$result1 = mysql_query("select * from " . $dbprefix . "member where mcode = '{$_SESSION["usercode"]}'");

//echo "select * from ".$dbprefix."member where mcode = '{$_SESSION["usercode"]}'";
if (mysql_num_rows($result1) > 0) {
    $row1 = mysql_fetch_object($result1);
    $ewallet = $row1->ewallet;
    $sql1 = "SELECT *  FROM " . $dbprefix . "product where pcode = '0001' ";
    $rs1 = mysql_query($sql1);
    $total = @mysql_result($rs1, 0, 'price');
    $pdesc = @mysql_result($rs1, 0, 'pdesc');
    $tot_pv = @mysql_result($rs1, 0, 'pv');

}


$result1 = mysql_query("select * from " . $dbprefix . "member where mcode = '{$_SESSION["usercode"]}'");
if (mysql_num_rows($result1) > 0) {
    $row1 = mysql_fetch_object($result1);
    $ewallet = $row1->ewallet;
    $sql1 = "SELECT *  FROM " . $dbprefix . "product where pcode = '" . $GLOBALS["pcode_register"] . "' ";
    $rs1 = mysql_query($sql1);
    $total = @mysql_result($rs1, 0, 'price');
    $pdesc = @mysql_result($rs1, 0, 'pdesc');
    $tot_pv = @mysql_result($rs1, 0, 'pv');
    if ($ewallet < $total) {
        echo "<script language='JavaScript'>aalert('" . $wording_lan["operate"]["11"] . "');window.location='index.php?sessiontab=1'</script>";
        exit;
    }
}

if (!empty($_GET["upa_code"])) $upa_code = $_GET["upa_code"];
if (!empty($_GET["upa_name"])) $upa_name = $_GET["upa_name"];
if (!empty($_GET["lr"])) $lr = $_GET["lr"];
?>
<script type="text/javascript">

    function check_dash(ele) {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar < '0' || vchar > '9')) return false;
        ele.onKeyPress = vchar;
    }

    function getRadioValueByName(name) {
        if (name == '���' || name == 'Mr.') document.forms[0].sex[0].checked = true;
        if (name == '�ҧ���' || name == 'Miss.') document.forms[0].sex[1].checked = true;
        if (name == '�ҧ' || name == 'Mrs.') document.forms[0].sex[1].checked = true;
    }

    function getRadioValueByName1(name) {
        if (name == '���' || name == 'Mr.') document.forms[0].csex[0].checked = true;
        if (name == '�ҧ���' || name == 'Miss.') document.forms[0].csex[1].checked = true;
        if (name == '�ҧ' || name == 'Mrs.') document.forms[0].csex[1].checked = true;
    }

    function checkForm(frm) {

        frm.ok.disabled = true;
        frm.ok.value = "Please wait...";
        return true;
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
        aalert("XMLHttpRequest not supported")
        return null
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

    function sendget_sponsor(value) {
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
                    if (data == 1234) {
                        document.getElementById('sp_code').value = "";
                        document.getElementById("sp_name").value = "<?=$wording_lan["tab1_mem_88"];?>";
                        document.getElementById("l1").innerHTML = "";//�ʴ���
                        document.getElementById("l2").innerHTML = "";
                        //document.getElementById("l3").innerHTML="";

                    } else {
                        document.getElementById('sp_code').value = value;
                        document.getElementById("sp_name").value = myarr[0].trim();
                        document.getElementById("l1").innerHTML = "<?=$wording_lan["upa_code"];?> " + myarr[1];//�ʴ���
                        document.getElementById("l2").innerHTML = "<?=$wording_lan["upa_code"];?> " + myarr[2];
                        //document.getElementById("l3").innerHTML="���� "+myarr[3];

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

    function sendget_sponsor1(value, value1) {
        if (value1 == '') {
            aalert('Please Choose Sponser First');
            document.getElementById('upa_code').value = "";
            exit;
        }
        var req = Inint_AJAX(); //���ҧ Object
        // aalert(value)
        value = str_pad(value, 7, 0, false);
        value1 = str_pad(value1, 7, 0, false);
        //aalert(value);
        //aalert(value1);

        req.open('GET', 'search_member11.php?value=' + encodeURIComponent(value) + '&value1=' + encodeURIComponent(value1), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
        req.onreadystatechange = function () { //�˵ء�ó�������ա�õͺ��Ѻ
            if (req.readyState == 4) {
                if (req.status == 200) { //���Ѻ��õͺ��Ѻ���º����
                    var data = req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
                    //aalert(req.responseText);
                    if (data == 1234) {
                        document.getElementById('upa_code').value = "";
                        document.getElementById("upa_name").value = "������������§ҹ";
                    } else {
                        var myArray = data.split(':');
                        var left = myArray[0];
                        var right = myArray[1];
                        var name = myArray[2];
                        var left = left.trim();

                        if (left == '1' && right == '1') {
                            aalert('�Ѿ�Ź��բ� 2 ��ҹ����');
                            document.getElementById('upa_code').value = "";
                            document.forms[0].lr[0].disabled = true;
                            document.forms[0].lr[0].checked = false;
                            document.forms[0].lr[1].disabled = true;
                            document.forms[0].lr[1].checked = false;
                        } else {
                            var l_alert = document.forms[0].lr[0].checked;
                            var r_alert = document.forms[0].lr[1].checked;
                            if (left == '1') {
                                if (l_alert == true) aalert('�Ѿ�Ź��մ�ҹ���� ������');
                                document.forms[0].lr[0].disabled = true;
                                document.forms[0].lr[0].checked = false;
                            }
                            else {
                                document.forms[0].lr[0].disabled = false;
                            }

                            if (right == '1') {
                                if (r_alert == true) aalert('�Ѿ�Ź��մ�ҹ��� ������');
                                document.forms[0].lr[1].disabled = true;
                                document.forms[0].lr[1].checked = false;
                            }
                            else {
                                document.forms[0].lr[1].disabled = false;
                            }
                            document.getElementById('upa_code').value = value;
                            document.getElementById("upa_name").value = name; //�ʴ���
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
</script>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script language="javascript">
    function onclickaddress() {

//aalert(document.forms[0].chkaddress.checked);
        if (document.forms[0].chkaddress.checked == true) {
            document.getElementById('caddress').value = document.getElementById('address').value;
            document.getElementById('caddress').value = document.getElementById('address').value;
            document.getElementById('cbuilding').value = document.getElementById('building').value;
            document.getElementById('cvillage').value = document.getElementById('village').value;
            document.getElementById('csoi').value = document.getElementById('soi').value;
            document.getElementById('cstreet').value = document.getElementById('street').value;
            checkaddress(document.getElementById('cprovince').value = document.getElementById('province').value, document.getElementById('camphur').value = document.getElementById('amphur').value, document.getElementById('cdistrict').value = document.getElementById('district').value);

            var x = document.getElementById("camphur");
            var option = document.createElement("option");
            var skillsSelect = document.getElementById("amphur");
            option.text = skillsSelect.options[skillsSelect.selectedIndex].text;
            option.value = document.getElementById('amphur').value;
            x.add(option);
            x.remove('');

            var x = document.getElementById("cdistrict");
            var option = document.createElement("option");
            var skillsSelect = document.getElementById("district");
            option.text = skillsSelect.options[skillsSelect.selectedIndex].text;
            option.value = document.getElementById('district').value;
            x.add(option);
            x.remove('');

            document.getElementById('czip').value = document.getElementById('zip').value;
        } else {
            document.getElementById('caddress').value = '';
            document.getElementById('caddress').value = '';
            document.getElementById('cbuilding').value = '';
            document.getElementById('cvillage').value = '';
            document.getElementById('csoi').value = '';
            document.getElementById('cstreet').value = '';
            checkaddress('', '', '');
            document.getElementById('czip').value = '';

        }
    }

    function onclickcmems() {

        if (document.forms[0].chkcmem.checked == true) {
            document.getElementById('cname_e').removeAttribute("disabled");
            document.getElementById('cname_b').removeAttribute("disabled");
            document.getElementById('cname_t').removeAttribute("disabled");
            document.getElementById('cname_f').removeAttribute("disabled");
            document.forms[0].csex[0].removeAttribute("disabled");
            document.forms[0].csex[1].removeAttribute("disabled");
            document.getElementById('cbirthday1').removeAttribute("disabled");
            document.getElementById('cbirthday2').removeAttribute("disabled");
            document.getElementById('cbirthday3').removeAttribute("disabled");
            document.getElementById('cnational').removeAttribute("disabled");
            document.getElementById('cid_card').removeAttribute("disabled");
            document.getElementById('cid_tax').removeAttribute("disabled");
            document.getElementById('cline_id').removeAttribute("disabled");
            document.getElementById('chome_t').removeAttribute("disabled");
            document.getElementById('cfacebook_name').removeAttribute("disabled");
            document.getElementById('cmobile').removeAttribute("disabled");
            document.getElementById('cfax').removeAttribute("disabled");
            document.getElementById('cemail').removeAttribute("disabled");
        } else {
            document.getElementById('cname_e').setAttribute("disabled", "disabled");
            document.getElementById('cname_b').setAttribute("disabled", "disabled");
            document.getElementById('cname_t').setAttribute("disabled", "disabled");
            document.getElementById('cname_f').setAttribute("disabled", "disabled");
            document.forms[0].csex[0].setAttribute("disabled", "disabled");
            document.forms[0].csex[1].setAttribute("disabled", "disabled");
            document.getElementById('cbirthday1').setAttribute("disabled", "disabled");
            document.getElementById('cbirthday2').setAttribute("disabled", "disabled");
            document.getElementById('cbirthday3').setAttribute("disabled", "disabled");
            document.getElementById('cnational').setAttribute("disabled", "disabled");
            document.getElementById('cid_card').setAttribute("disabled", "disabled");
            document.getElementById('cid_tax').setAttribute("disabled", "disabled");
            document.getElementById('cline_id').setAttribute("disabled", "disabled");
            document.getElementById('chome_t').setAttribute("disabled", "disabled");
            document.getElementById('cfacebook_name').setAttribute("disabled", "disabled");
            document.getElementById('cmobile').setAttribute("disabled", "disabled");
            document.getElementById('cfax').setAttribute("disabled", "disabled");
            document.getElementById('cemail').setAttribute("disabled", "disabled");
        }
    }

    function check_zipcode(value, value1, value2) {
        var req = Inint_AJAX(); //���ҧ Object
        // aalert(value)
        //value = str_pad(value,7,0,false);
        //aalert(value);
        //aalert(value);aalert(value1);aalert(value2);
        req.open('GET', 'search_zipcode.php?value=' + encodeURIComponent(value) + '&value1=' + encodeURIComponent(value1) + '&value2=' + encodeURIComponent(value2), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
        req.onreadystatechange = function () { //�˵ء�ó�������ա�õͺ��Ѻ
            if (req.readyState == 4) {
                if (req.status == 200) { //���Ѻ��õͺ��Ѻ���º����
                    var data = req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
                    //	aalert(req.responseText);
                    //aalert(data);
                    if (data == 1234) {
                        document.getElementById("zip").value = ''; //�ʴ���
                    } else {
                        //	aalert(data);
                        document.getElementById("zip").value = data.replace(/^\s+|\s+$/g, ""); //�ʴ���
                    }
                }
            }
        };
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
        req.send(null); //�ӡ����
    }

    function check_zipcode1(value, value1, value2) {
        var req = Inint_AJAX(); //���ҧ Object
        // aalert(value)
        //value = str_pad(value,7,0,false);
        //aalert(value);
        //aalert(value);aalert(value1);aalert(value2);
        req.open('GET', 'search_zipcode.php?value=' + encodeURIComponent(value) + '&value1=' + encodeURIComponent(value1) + '&value2=' + encodeURIComponent(value2), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
        req.onreadystatechange = function () { //�˵ء�ó�������ա�õͺ��Ѻ
            if (req.readyState == 4) {
                if (req.status == 200) { //���Ѻ��õͺ��Ѻ���º����
                    var data = req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
                    //	aalert(req.responseText);
                    //aalert(data);
                    if (data == 1234) {
                        document.getElementById("czip").value = ''; //�ʴ���
                    } else {
                        //	aalert(data);
                        document.getElementById("czip").value = data.replace(/^\s+|\s+$/g, ""); //�ʴ���
                    }
                }
            }
        };
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
        req.send(null); //�ӡ����
    }

    function checkaddress(value, value1, value2) {
        var req = Inint_AJAX(); //���ҧ Object
        // aalert(value)
        //value = str_pad(value,7,0,false);
        //aalert(value);
        //aalert(value1);
        //aalert(value2);
        req.open('GET', 'search_addressm.php?value=' + encodeURIComponent(value) + '&value1=' + encodeURIComponent(value1) + '&value2=' + encodeURIComponent(value2), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
        req.onreadystatechange = function () { //�˵ء�ó�������ա�õͺ��Ѻ
            if (req.readyState == 4) {
                if (req.status == 200) { //���Ѻ��õͺ��Ѻ���º����
                    var data = req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
                    //	aalert(req.responseText);
                    if (data == 1234) {
                        //document.getElementById("mname").innerHTML="������������§ҹ";
                    } else {
                        //	aalert(data);
                        document.getElementById("idchksaddress").innerHTML = data; //�ʴ���
                    }
                }
            }
        };
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
        req.send(null); //�ӡ����
    }

    function checkMemberExit() {
        var mcode = $('input[name=mcode]').val();
        var fmcode = $('select[name=fmcode]').val();
        queryString = 'mcode=' + mcode + '&fmcode=' + fmcode;
        link = '<?=$actual_link?>member/checkMemberExit.php';
        $.post(link, queryString, function (data) {
            if (data.trim() == 1) {
                $('.chekMemberAlert').html('<img src="./images/false.gif"/>');
            } else {
                $('.chekMemberAlert').html('<img src="./images/true.gif"/>');
            }
        });
    }

    function checkMemberRamdom() {
        var mcode = $('input[name=mcode]').val();
        var fmcode = $('select[name=fmcode]').val();
        queryString = 'mcode=' + mcode + '&fmcode=' + fmcode;
        link = '<?=$actual_link?>member/checkMemberRandom.php';
        $.post(link, queryString, function (data) {
            //alert(data);
            if (data.trim() != '') {
                //$('.chekMemberAlert').html('<img src="./images/false.gif"/>');
                document.getElementById("mcode").value = value = str_pad(data.trim(), 7, 0, false);
                document.getElementById("mcid_img").value =  document.getElementById("fmcode").value + document.getElementById("mcode").value;
                checkMemberExit();
            } else {
                //$('.chekMemberAlert').html('<img src="./images/true.gif"/>');
                document.getElementById("mcode").value = '';
                checkMemberExit();
            }
        });
    }

    function imembercheck() {
        //sendget_sponsor1(document.getElementById('upa_code').value,document.getElementById('sp_code').value);

        var val = '';
        var field = "";
        var flag = "";
        var errDesc = '';

//id_card_img
        // var val = document.getElementById('id_card_img').value;
        // var field = "mcode";
        // var flag = "1-0-0-0-0";
        // var errDesc = 'กรุณาตรวจสอบเอกสารที่ต้องการส่งด้วยค่ะ';

        var val = document.getElementById('mcode').value;
        var field = "mcode";
        var flag = "1-7-0-0-0";
        var errDesc = '<?=$wording_lan["mcode"]?>';

        /*
        var val = document.getElementById('upa_name').value;
        var field = "upa_name";
        var flag = "1-0-0-0-0";
        var errDesc = '�����Ѿ�Ź�';

        val = val + ","+document.getElementById('upa_code').value;
        field = field +",upa_code";
        flag = flag+",1-7-0-0-0-0";
        errDesc = errDesc + ",�����Ѿ�Ź�"; // 
        */


        val = val + "," + document.getElementById('sp_code').value;
        field = field + ",sp_code";
        flag = flag + ",1-9-0-0-0-0";
        errDesc = errDesc + ",<?=$wording_lan["sp_code"]?>";

        val = val + "," + document.getElementById('sp_name').value;
        field = field + ",sp_name";
        flag = flag + ",1-0-0-0-0-0";
        errDesc = errDesc + ",<?=$wording_lan["sp_name"]?>";

        val = val + "," + document.getElementById('id_card_img').value;
        field = field + ",id_card_img";
        flag = flag + ",1-0-0-0-0-0";
        errDesc = errDesc + ",<?="กรุณาตรวจสอบเอกสารที่ต้องการส่งด้วยค่ะ";?>";


        val = val + "," + document.getElementById('name_f').value;
        field = field + ",name_f";
        flag = flag + ",1-0-0-0-0";
        errDesc = errDesc + ",<?=$wording_lan["tab1_mem_13"]?>";

        val = val + "," + document.getElementById('name_t').value;
        field = field + ",name_t";
        flag = flag + ",1-0-0-0-0";
        errDesc = errDesc + ",<?=$wording_lan["tab1_mem_20"]?>";

        val = val + "," + document.getElementById('id_card').value;
        field = field + ",id_card";
        flag = flag + ",1-0-0-1-0";
        errDesc = errDesc + ",<?=$wording_lan["tab1_mem_26"]?>";

        if (document.getElementById('national').value == 'Thailand') {
            var a = document.getElementById('id_card').value;
            var id_card = "";
            var t = a.split("-");  //�������äᵡ��ŧ array t
            for (var i = 0; i < t.length; i++) {
                id_card = id_card + t[i];
            }
            var id = document.getElementById('id_card').value;

            if (id.charAt(0) < 1 || id.charAt(0) > 8) {
                alert("<?=$wording_lan["tab1_mem_105"]?>");
                document.getElementById('ok').disabled = true;
                document.getElementById('id_card').focus();
                exit;
            }
            for (i = 0, sum = 0; i < 12; i++) {
                sum += parseInt(id.charAt(i)) * (13 - i);
            }
            sum = sum % 11;
            if (sum <= 1)
                sum = 1 - sum;
            else
                sum = 11 - sum;
            if (sum != parseInt(id.charAt(12))) {
                alert("<?=$wording_lan["tab1_mem_105"]?>");
                document.getElementById('ok').disabled = true;
                document.getElementById('id_card').focus();
                exit;
            }


            val = val + "," + document.getElementById('id_card').value;
            field = field + ",id_card";
            flag = flag + ",1-13-0-0-0";
            errDesc = errDesc + ",<?=$wording_lan["tab1_mem_105"]?>";


        }
        val = val + "," + document.getElementById('mobile').value;
        field = field + ",mobile";
        flag = flag + ",1-0-0-0-0";
        errDesc = errDesc + ",<?=$wording_lan["tab1_mem_29"] ?>";

        val = val + "," + document.getElementById('birthday1').value;
        field = field + ",birthday1";
        flag = flag + ",1-0-0-0-0";
        errDesc = errDesc + ",<?=$wording_lan["tab1_mem_82"] ?>";

        val = val + "," + document.getElementById('birthday2').value;
        field = field + ",birthday2";
        flag = flag + ",1-0-0-0-0";
        errDesc = errDesc + ",<?=$wording_lan["tab1_mem_83"] ?>";

        val = val + "," + document.getElementById('birthday3').value;
        field = field + ",birthday3";
        flag = flag + ",1-0-0-0-0";
        errDesc = errDesc + ",<?=$wording_lan["tab1_mem_84"] ?>";

        val = val + "," + document.getElementById('birthday3').value;
        field = field + ",birthday3";
        flag = flag + ",1-0-0-0-0";
        errDesc = errDesc + ",<?=$wording_lan["tab1_mem_84"] ?>";
        if(document.getElementById('national').value == 'Thailand'){
		val = val + ","+document.getElementById('address').value;
		field = field +",address";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",เลขที่/ห้อง";

		val = val + ","+document.getElementById('province').value;
		field = field +",province";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",จังหวัด ";

		val = val + ","+document.getElementById('amphur').value;
		field = field +",amphur";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",อำเภอ ";

		val = val + ","+document.getElementById('district').value;
		field = field +",district";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ตำบล ";

		val = val + ","+document.getElementById('caddress').value;
		field = field +",caddress";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ที่อยู่สำหรับจัดส่ง / ส่งเอกสาร(เลขที่/ห้อง)";

		val = val + ","+document.getElementById('cprovince').value;
		field = field +",cprovince";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ที่อยู่สำหรับจัดส่ง / ส่งเอกสาร(จังหวัด) ";

		val = val + ","+document.getElementById('camphur').value;
		field = field +",camphur";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ที่อยู่สำหรับจัดส่ง / ส่งเอกสาร(อำเภอ) ";

		val = val + ","+document.getElementById('cdistrict').value;
		field = field +",cdistrict";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",ที่อยู่สำหรับจัดส่ง / ส่งเอกสาร(ตำบล) ";
	}
        /*
        if(document.getElementById('national').value == 'Thailand'){
            var a = document.getElementById('id_card').value;
            var id_card = "";
            var t = a.split("-");  //�������äᵡ��ŧ array t
            for(var i=0; i<t.length ; i++){
                id_card = id_card+ t[i];
            }
            var id = document.getElementById('id_card').value;

                if( id.charAt(0) < 1 || id.charAt(0) > 8 ) {alert("�Ţ�ѵû�ЪҪ����������"); document.getElementById('ok').disabled = true;document.getElementById('id_card').focus();exit;}
                for(i=0,sum=0;i<12;i++){
                    sum += parseInt(id.charAt(i))*(13-i);
                }
                sum = sum%11;
                if(sum <= 1)
                    sum = 1-sum;
                else
                    sum = 11-sum;
                if(sum != parseInt(id.charAt(12))){alert("�Ţ�ѵû�ЪҪ����������");document.getElementById('ok').disabled = true;document.getElementById('id_card').focus();
                exit;}


            val = val + ","+document.getElementById('id_card').value;
            field = field +",id_card";
            flag = flag+",1-13-0-1-0";
            errDesc = errDesc + ",�Ţ�ѵû�ЪҪ����������";


        }*/


        var lrval = "";
        var object = eval(document.frm.lr);
        for (i = 0; i < object.length; i++) {
            if (object[i].checked == true)
                lrval = object[i].value;
        }

        if (lrval == '') {
            //	document.getElementById('lr').focus();
            //alert('<?=$wording_lan["tab1_mem_103"]?>5');
            //exit;
        }

       
        document.getElementById('checkstate').innerHTML = "<img align='center' src='./images/loading.gif' />";
        startRQ(field, val, "", flag, errDesc, "member", "checkstate");
    }

    function chknum(key) {
        if (key >= 48 && key <= 57)
            return true;
        else
            return false;
    }

    function maxleng() {
        document.getElementById('id_card').value = '';
        var nation = document.getElementById('national').value;


        if (nation == 'Thailand') {
            //alert(nation);
            document.getElementById('id_card').setAttribute("maxlength", "13")
        } else {
            document.getElementById('id_card').setAttribute("maxlength", "50")
        }


    }


</script>





<?

$sql = "SELECT MAX(mcode) AS code FROM " . $dbprefix . "member";
$rs = mysql_query($sql);
$code = mysql_result($rs, 0, 'code');
$code = substr($code, 1);
//$mcode = gencode($code+1);
//$sv_code = substr($mcode,3,strlen($mcode));
mysql_free_result($rs);
if ($_GET['id']) {
    exit;
} else {
    if (isset($_GET["sp_code"])) {
        $sp_code = $_GET["sp_code"];
    }
    if (isset($_GET["sp_name"])) {
        $sp_name = $_GET["sp_name"];
    }
    if (isset($_GET["upa_code"])) {
        $upa_code = $_GET["upa_code"];
    }
    if (isset($_GET["upa_name"])) {
        $upa_name = $_GET["upa_name"];
    }
    if (isset($_GET["lr"])) {
        $lr = $_GET["lr"];
    }
}
?>
<?
include("../function/global_center.php");
//var_dump($_GET);
//exit;
if (empty($_GET["cmc"])) $cmc = $_SESSION["usercode"];
else $cmc = $_GET["cmc"];
if (!empty($_GET["bid"])) {
    $bid = $_GET["bid"];
    $sql = "SELECT *  FROM " . $dbprefix . "member_tmp ";
    $sql .= " WHERE id='" . $bid . "' and uid = '" . $_SESSION["usercode"] . "' ";
    $rs = mysql_query($sql);
    if (mysql_num_rows($rs) <= 0 and $cmc != $_SESSION["usercode"]) {
        echo "<script language='JavaScript'>window.location='index.php?sessiontab=1&sub=8&cmc=$mcode&bid=$mid'</script>";
        exit;
    }
    $datax = get_detail_meber_tmp($bid);
    $fmcode = substr($mcode, 0, 2);
    $sql = "SELECT concat('" . $fmcode . "',FLOOR( RAND( ) *10000000)) AS random_number FROM " . $dbprefix . "member WHERE  'random_number' NOT IN ( SELECT mcode FROM " . $dbprefix . "member ) Limit 0,1 ";
    $rs = mysql_query($sql);
    if (mysql_num_rows($rs) > 0) {
        $data = mysql_fetch_object($rs);
        $random_number = gencode($data->random_number);
    }
    $provinceId = $datax["provinceId"];
    $amphurId = $datax["amphurId"];
    $districtId = $datax["districtId"];
    //echo $provinceId.' : '.$amphurId.' : '.$districtId;
    $birthday = explode('-', $datax["birthday"]);
    $birthday3 = $birthday[0];
    $birthday2 = $birthday[1];
    $birthday1 = $birthday[2];
    //echo $birthday1.' : '.$birthday2.' : '.$birthday3.' : ';
    $cbirthday = explode('-', $datax["cbirthday"]);
    $cbirthday3 = $cbirthday[0];
    $cbirthday2 = $cbirthday[1];
    $cbirthday1 = $cbirthday[2];

}
$data = get_detail_meber($cmc);
$data_spcode = get_detail_meber($data["sp_code"]);
$data_upacode = get_detail_meber($data["sp_code"]);
$imgphoto = posimg($data["pos_cur"]);
$status = get_status($cmc, date('Y-m-d'), $data['pos_cur']);

$point = new point_member;
$bmbonus = $point->get_bmbonus($dbprefix, $cmc);
$pos_cur = $point->position($dbprefix, 'calc_poschange', 'pos_cur', $cmc);
$pos_cur2 = $point->position($dbprefix, 'calc_poschange2', 'pos_cur2', $cmc);
$mtype1 = $arr_mtype1[$data["mtype"]];

?>
<div id="err">

</div>
<form name='frm' method="post" onKeyDown="document.getElementById('ok').disabled=true;"
      action="memoperate.php?state=<?= $_GET['id'] == "" ? 0 : 1 ?>" onSubmit="return checkForm(this)"
      enctype="multipart/form-data">

    <div class="row">

        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="clearfix">
                <div>
                    <div id="user-profile-1" class="user-profile row">
                        <div class="col-xs-12 col-sm-6 ">
                            <!-- #section:pages/profile.info -->
                            <div class="profile-user-info profile-user-info-striped ">

                                <div class="profile-info-row table-header">
                                    <div class="profile-info-value"><?= $wording_lan["tab1_mem_1"] ?></div>

                                    <div class="profile-info-value">
                                    </div>
                                </div>


                                <div class="profile-info-row">
                                    <!--?if($mcode != ''){?-->
                                    <div class="profile-info-name"> <?= $wording_lan["tab2_1_5"] ?>&nbsp;<font
                                                color="#ff0000">*</font></div>

                                    <div class="profile-info-value">
								<span class="editable" id="age">						
							<select id="fmcode" name="fmcode">
								<option value="TH">TH</option>
								<option value="AC">AC</option>
								<option value="CN">CN</option>
								<option value="DZ">DZ</option>
								<option value="LA">LA</option>
								<option value="MM">MM</option>
								<option value="KH">KH</option>
								<option value="SG">SG</option>
								<option value="PH">PH</option>
								<option value="SW">SW</option>
								<option value="MY">MY</option>
							</select>
							<button class="btn btn-sm btn-default" type="button" onclick="checkMemberRamdom()">
									<i class="ace-icon fa fa-search bigger-110"></i>
									Random
								</button>
							<input class="span4" type="text" id="mcode" name="mcode" value="<?= $random_number ?>"
                                   style="width:100px" maxlength="7"
                                   onKeyPress="checkMemberExit(); return chknum(window.event.keyCode);"
                                   onChange="checkMemberExit();"/> <span class="chekMemberAlert"></span>
                                    <!--?}?--></td>
						</span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_4"] ?>&nbsp; <font
                                                color="#ff0000">*</font></div>

                                    <div class="input-group">
                                        <input class="form-control" type="text" id="sp_code" name="sp_code"
                                               value="<?= $datax["sp_code"] ?>" maxlength="9">
                                        <span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="button"
                                        onclick="sendget_sponsor(document.getElementById('sp_code').value)">
								<? if (!empty($datax["sp_code"])) {
                                    echo "<script> sendget_sponsor('" . $datax["sp_code"] . "')</script>";
                                } ?>
                                    <i class="ace-icon fa fa-search bigger-110"></i>
									Search
								</button>
								</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_6"] ?>&nbsp;<font
                                                color="#ff0000">*</font></div>

                                    <div class="input-group col-sm-9 col-xs-9">
                                        <input type="text" id="sp_name" name="sp_name" readonly placeholder=""
                                               class="form-control">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-6"   >
                            <div class="profile-user-info profile-user-info-striped"  >

                             <div class="profile-info-row table-header" >
                                    <div class="profile-info-value" >Upload File เอกสร</div>

                                    <div class="profile-info-value">
                                    </div>
                            </div>

                            <div class="profile-info-row">
                                    <div class="profile-info-name"> บัตรประชาชน&nbsp;<font
                                                color="#ff0000">*</font></div>

                                    <div class="input-group col-sm-9 col-xs-9">
                                        <div class="space-6"></div>
                                        <div class="space-6"></div>
                                        
                                        <div style="clear:both">
                                     
                                        <br>
  
  
                                      <a onclick="$('#uploadcitizenid').modal('toggle');" class="btn btn-primary">UPload file </a>
                                        
                                        <br><br>
                                        <br><br>
                                        </div>
                                   </div>     
                                   <div class="space-6"></div>
                                    <div class="space-6"></div>
                                    <div class="space-6"></div>
                                    <div class="space-6"></div>
                            </div>
                           
                            
                           

                            </div>
                        </div>

                         
                        <div class="col-xs-12 col-sm-6" style="display:none;" >
                            <!-- #section:pages/profile.info -->
                            <div class="profile-user-info profile-user-info-striped"  >

                                <div class="profile-info-row table-header" >
                                    <div class="profile-info-value" ><?= $wording_lan["tab1_mem_2"] ?></div>

                                    <div class="profile-info-value">
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_9"] ?>&nbsp;<font
                                                color="#ff0000">*</font></div>

                                    <div class="input-group col-sm-9 col-xs-9">
                                        <div class="space-6"></div>
                                        <div class="space-6"></div>

                                        <?
                                        $rs = mysql_query("SELECT * FROM " . $dbprefix . "lr_def");
                                        for ($i = 0; $i < mysql_num_rows($rs); $i++) {
                                            if (mysql_result($rs, $i, 'lr_id') == 1) {
                                                $name_lr = $wording_lan["endleft"];
                                            } else if (mysql_result($rs, $i, 'lr_id') == 2) {
                                                $name_lr = $wording_lan["endright"];
                                            }
                                            ?>
                                            <div style="clear:both">
                                                <div class="lr" style=" width: 100px;   float: left;">
                                                    &nbsp;&nbsp;<input tabindex="6"
                                                                       onClick="document.getElementById('ok').disabled=true;"
                                                                       type="radio" name="lr"
                                                                       id="lr" <?= $datax["lr"] == mysql_result($rs, $i, 'lr_id') ? "checked" : "" ?>
                                                                       value="<?= mysql_result($rs, $i, 'lr_id') ?>"/>&nbsp;&nbsp;<?= $name_lr; ?>
                                                    <br><br>
                                                </div>
                                                <div id="l<?= mysql_result($rs, $i, 'lr_id') ?>"></div>
                                            </div>
                                            <?
                                        }
                                        mysql_free_result($rs);
                                        ?>
                                        <input type="hidden" name="olr" id="olr" value="<?= $olr ?>"/>
                                        </span>
                                    </div>
                                    <div class="space-6"></div>
                                    <div class="space-6"></div>
                                </div>


                            </div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                        </div>

                        <!-- Col 2 -->

                        <!-- Row 2 -->
                        <div class="col-xs-12 col-sm-6">
                            <!-- #section:pages/profile.info -->
                            <div class="profile-user-info profile-user-info-striped">

                                <div class="profile-info-row table-header">
                                    <div class="profile-info-value"><?= $wording_lan["tab1_mem_11"] ?></div>

                                    <div class="profile-info-value">
                                    </div>
                                </div>
                                <div class="profile-info-row" style="display:none">
                                    <div class="profile-info-name"> �ٻ�Ҿ</div>

                                    <div class="profile-info-value">
                                        <div class="controls">
                                            <? if ($pathImg != "") { ?>

                                                <input type="text" name="profile_img" id="profile_img"
                                                       value='<?= $pathImg; ?>' readonly placeholder="None">
                                                <input type="button" name="reset" id="reset" value='��ҧ'
                                                       onclick="resetpic()">
                                                </br></br>
                                            <? } ?>

                                            <input type="file" name="profileimg" id="profileimg"
                                                   accept="image/png,image/jpeg,image/gif">

                                        </div>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_13"] ?> <font
                                                color="#ff0000">*</font></div>

                                    <div class="profile-info-value">
                                        <div class="controls">
                                            <select class="span2" name="name_f" id="name_f"
                                                    onchange="getRadioValueByName(this.value);document.getElementById('name_ff').value=this.value;if(this.value == '123'){document.getElementById('name_ff').value = '';document.getElementById('name_ff').readOnly  = false;document.getElementById('name_ff').focus();}else {document.getElementById('name_ff').readOnly = true;}">

                                                <option value="" selected=""><?= $wording_lan["tab1_mem_87"]; ?>&nbsp;
                                                </option>
                                                <option value=<?php echo $tt1; ?>
                                                        <? if ($datax["name_f"] == "$tt1") echo "selected"; ?>
                                                ><?= $wording_lan["tab1_mem_15"]; ?></option>
                                                <option value=<?php echo $tt2; ?>
                                                        <? if ($datax["name_f"] == "$tt2") echo "selected"; ?>
                                                ><?= $wording_lan["tab1_mem_16"]; ?></option>
                                                <option value=<?php echo $tt3; ?>
                                                    <? if ($datax["name_f"] == "$tt3") echo "selected"; ?>><?= $wording_lan["tab1_mem_17"]; ?></option>
                                                <option value="123"><?= $wording_lan["tab1_mem_80"]; ?></option>
                                            </select>&nbsp;&nbsp;
                                            <input class="span4" type="text" name="name_ff" readonly id="name_ff"
                                                   value="<?= $datax["name_ff"] ?>" tabindex="24">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_20"] ?> <font
                                                color="#ff0000">*</font></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="name_t" name="name_t"
                                                   value="<?= $datax["name_t"] ?>"
                                                   onKeyUp="document.getElementById('acc_name').value=document.getElementById('name_ff').value+' '+this.value;document.getElementById('name_b').value=this.value;">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Name & LastName or Company Name</div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="name_e" name="name_e"
                                                   value="<?= $datax["name_e"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_22"] ?>  </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="name_b" name="name_b"
                                                   value="<?= $datax["name_b"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_23"] ?> <font
                                                color="#ff0000">*</font>
                                               <?=$datax["sex"];?> 
                                                </div>

                                    <div class="control-group">

                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="ace" id='sex' name='sex'
                                                       value="&#3594;&#3634;&#3618;"
                                                    <? if ($datax["sex"] == "���") echo "checked=\"checked\""; ?>
                                                ></input>
                                                <span class="lbl">&nbsp&nbsp <?= $wording_lan["tab1_mem_32"] ?> </span>
                                            </label>
                                            <label>
                                                <input type="radio" class="ace" id='sex' name='sex'
                                                    <? if ($datax["sex"] == "���") echo "checked=\"checked\""; ?>
                                                       value="&#3627;&#3597;&#3636;&#3591;"/>
                                                <span class="lbl">&nbsp&nbsp <?= $wording_lan["tab1_mem_33"] ?> </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_24"] ?> <font
                                                color="#ff0000">*</font></div>

                                    <div class="profile-info-value">
                                        <div class="controls">
                                            <select class="span2" name="birthday1" id="birthday1">
                                                <option value=""><?= $wording_lan["tab1_mem_82"] ?></option>
                                                <?PHP
                                                $year = 1;
                                                for ($i = 0; $i <= 30; $i++) {
                                                    echo "<option " . (gencode2($birthday1) == gencode2($year) ? "selected" : "") . " value='" . gencode2($year) . "' >" . gencode2($year) . "</option>";
                                                    $year++;
                                                }
                                                ?>
                                            </select>
                                            <select class="span2" name="birthday2" id="birthday2">
                                                <option value=""><?= $wording_lan["tab1_mem_83"] ?></option>
                                                <?PHP
                                                $year = 1;
                                                for ($i = 0; $i <= 11; $i++) {
                                                    echo "<option " . (gencode2($birthday2) == gencode2($year) ? "selected" : "") . " value='" . gencode2($year) . "' >" . gencode2($year) . "</option>";
                                                    $year++;
                                                }
                                                ?>
                                            </select>
                                            <select class="span2" name="birthday3" id="birthday3">
                                                <option value=""><?= $wording_lan["tab1_mem_84"] ?></option>
                                                <?PHP
                                                if ($_SESSION["m_locationbase"] == '1') {
                                                    $year = date("Y") + 543 - 18;
                                                    for ($i = 0; $i <= 62; $i++) {
                                                        echo "<option " . ($birthday3 == $year ? "selected" : "") . " value='$year'>$year</option>";
                                                        $year--;
                                                    }
                                                } else {
                                                    $year = date("Y") - 18;
                                                    for ($i = 0; $i <= 62; $i++) {
                                                        echo "<option " . ($birthday3 == $year ? "selected" : "") . " value='$year'>$year</option>";
                                                        $year--;
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_25"] ?> <font
                                                color="#ff0000">*</font></div>

                                    <div class="profile-info-value">
                                        <div class="controls">
                                            <select name="national" id="national" onchange="maxleng()" tabindex="20"
                                                    class="span4">
                                                <?

                                                $result1 = mysql_query("select * from " . $dbprefix . "nation order by nation");
                                                echo "<option value='' selected>-" . $wording_lan["tab1_mem_25"] . "-</option>";
                                                for ($i = 1; $i <= mysql_num_rows($result1); $i++) {
                                                    $row1 = mysql_fetch_object($result1);
                                                    //echo "<option value=\"\" ";

                                                    echo "<option value=\"" . $row1->nation . "\" ";
                                                    if ($datax["national"] == $row1->nation) echo 'selected';
                                                    echo ">";
                                                    if ($row1->nation == 'Thailand') {
                                                        echo 'ไทย';
                                                    } else {
                                                        echo $row1->nation;
                                                    }
                                                    echo "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_26"] ?> <font
                                                color="#ff0000">*</font></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="id_card" name="id_card"
                                                   value="<?= $datax["id_card"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_27"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="id_tax" name="id_tax"
                                                   value="<?= $datax["id_tax"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_28"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="home_t" name="home_t"
                                                   value="<?= $datax["home_t"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_29"] ?> <font
                                                color="#ff0000">*</font></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="mobile" name="mobile"
                                                   value="<?= $datax["mobile"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_30"] ?>     </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="fax" name="fax"
                                                   value="<?= $datax["fax"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_31"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="email" name="email"
                                                   value="<?= $datax["email"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Line ID</div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="line_id" name="line_id"
                                                   value="<?= $datax["line_id"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Facebook</div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="facebook_name"
                                                   name="facebook_name" value="<?= $datax["facebook_name"] ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <!-- #section:pages/profile.info -->
                            <div class="profile-user-info profile-user-info-striped">

                                <div class="profile-info-row table-header">
                                    <div class="profile-info-value"><?= $wording_lan["tab1_mem_12"] ?>
                                        <input type="checkbox" name="chkcmem" id="chkcmem" value="1" tabindex="53"
                                               onClick="onclickcmems(this.value);"/></div>

                                    <div class="profile-info-value">
                                    </div>
                                </div>
                                <div class="profile-info-row" style="display:none">
                                    <div class="profile-info-name">&nbsp</div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="age">&nbsp</span>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_13"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="controls">
                                            <select class="span2" name="cname_f" id="cname_f" disabled
                                                    onchange="getRadioValueByName1(this.value);document.getElementById('cname_ff').value=this.value;if(this.value == '123'){document.getElementById('cname_ff').value = ''; document.getElementById('cname_ff').readOnly  = false;document.getElementById('cname_ff').focus();}else {document.getElementById('cname_ff').readOnly  = true;}">

                                                <option value=""
                                                        selected=""><?= $wording_lan["tab1_mem_13"]; ?></option>
                                                <option value=<?php echo $tt1; ?>><?= $wording_lan["tab1_mem_15"]; ?></option>
                                                <option value=<?php echo $tt2; ?>><?= $wording_lan["tab1_mem_16"]; ?></option>
                                                <option value=<?php echo $tt3; ?>><?= $wording_lan["tab1_mem_17"]; ?></option>
                                                <option value="123"><?= $wording_lan["tab1_mem_80"]; ?></option>
                                            </select>
                                            <input class="span4" type="text" name="cname_ff" id="cname_ff" value=""
                                                   tabindex="24" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_20"] ?></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="cname_t" name="cname_t" value=""
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Name & LastName or Company Name</div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="cname_e" name="cname_e" value=""
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_22"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="cname_b" name="cname_b"
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_23"] ?> </div>

                                    <div class="control-group">

                                        <div class="radio">
                                            <label>
                                                <input type="radio" id="csex" name="csex" class="ace"
                                                       value="&#3594;&#3634;&#3618;" disabled/>
                                                <span class="lbl">&nbsp&nbsp <?= $wording_lan["tab1_mem_32"] ?></span>
                                            </label>
                                            <label>
                                                <input type="radio" id="csex" name="csex" class="ace"
                                                       value="&#3627;&#3597;&#3636;&#3591;" disabled/>
                                                <span class="lbl">&nbsp&nbsp <?= $wording_lan["tab1_mem_33"] ?></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_24"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="controls">
                                            <select class="span2" name="cbirthday1" id="cbirthday1" disabled>
                                                <option value=""><?= $wording_lan["tab1_mem_82"] ?></option>
                                                <?PHP
                                                $year = 1;
                                                for ($i = 0; $i <= 30; $i++) {
                                                    echo "<option " . (gencode2($birthday1) == gencode2($year) ? "selected" : "") . " value='" . gencode2($year) . "' >" . gencode2($year) . "</option>";
                                                    $year++;
                                                }
                                                ?>
                                            </select>
                                            <select class="span2" name="cbirthday2" id="cbirthday2" disabled>
                                                <option value=""><?= $wording_lan["tab1_mem_83"] ?></option>
                                                <?PHP
                                                $year = 1;
                                                for ($i = 0; $i <= 11; $i++) {
                                                    echo "<option " . (gencode2($birthday2) == gencode2($year) ? "selected" : "") . " value='" . gencode2($year) . "' >" . gencode2($year) . "</option>";
                                                    $year++;
                                                }
                                                ?>
                                            </select>
                                            <select class="span2" name="cbirthday3" id="cbirthday3" disabled>
                                                <option><?= $wording_lan["tab1_mem_84"] ?></option>
                                                <?PHP
                                                if ($_SESSION["m_locationbase"] == '1') {
                                                    $year = date("Y") + 543 - 18;
                                                    for ($i = 0; $i <= 62; $i++) {
                                                        echo "<option " . ($birthday3 == $year ? "selected" : "") . " value='$year'>$year</option>";
                                                        $year--;
                                                    }
                                                } else {
                                                    $year = date("Y") - 18;
                                                    for ($i = 0; $i <= 62; $i++) {
                                                        echo "<option " . ($birthday3 == $year ? "selected" : "") . " value='$year'>$year</option>";
                                                        $year--;
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_25"]; ?> </div>

                                    <div class="profile-info-value">
                                        <div class="controls">
                                            <select class="span4" name="cnational" id="cnational" disabled>
                                                <?
                                                if (empty($cnational)) $cnational = $_SESSION["m_cname"];
                                                $result1 = mysql_query("select * from " . $dbprefix . "nation order by nation");
                                                echo "<option value='' selected>-" . $wording_lan["tab1_mem_25"] . "-</option>";
                                                for ($i = 1; $i <= mysql_num_rows($result1); $i++) {
                                                    $row1 = mysql_fetch_object($result1);
                                                    echo "<option value=\"" . $row1->nation . "\" >";

                                                    if ($row1->nation == 'Thailand') {
                                                        echo 'ไทย';
                                                    } else {
                                                        echo $row1->nation;
                                                    }
                                                    echo "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_26"] ?></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="cid_card" name="cid_card"
                                                   value="" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_27"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="cid_tax" name="cid_tax" value=""
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_28"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="chome_t" name="chome_t" value=""
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_29"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="cmobile" name="cmobile" value=""
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_30"] ?>     </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="cfax" name="cfax" value=""
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_31"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="cemail" name="cemail" value=""
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Line ID</div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="cline_id" name="cline_id"
                                                   value="" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Facebook</div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="cfacebook_name"
                                                   name="cfacebook_name" value="" disabled>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                        </div>

                        <!-- Col 2 -->

                        <!-- Row 3 -->
                        <div class="col-xs-12 col-sm-6">
                            <!-- #section:pages/profile.info -->
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row table-header">
                                    <div class="profile-info-value"><?= $wording_lan["tab1_mem_37"] ?></div>

                                    <div class="profile-info-value">
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_39"] ?><font
                                                color="#ff0000">*</font></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="address" name="address"
                                                   value="<?= $datax["address"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_40"] ?></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="building" name="building"
                                                   value="<?= $datax["building"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_41"] ?></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="village" name="village"
                                                   value="<?= $datax["village"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_42"] ?></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="soi" name="soi"
                                                   value="<?= $datax["soi"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_43"] ?></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="street" name="street"
                                                   value="<?= $datax["street"] ?>">
                                        </div>
                                    </div>
                                </div>
                                <?

                                if ($_SESSION["m_locationbase"] == '1') {
                                    if ($provinceId == "") {
                                        include("thaiaddress.php");
                                    } else {
                                        include("thaiaddressshow.php");
                                    }
                                } else {
                                    ?>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"><?= $wording_lan["province"] ?><font
                                                    color="#ff0000">*</font></div>

                                        <div class="profile-info-value">
                                            <div class="input-group col-sm-9 col-xs-9">
                                                <input class="form-control" type="text" id="provinceId"
                                                       name="provinceId" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"><?= $wording_lan["amphur"] ?><font
                                                    color="#ff0000">*</font></div>

                                        <div class="profile-info-value">
                                            <div class="input-group col-sm-9 col-xs-9">
                                                <input class="form-control" type="text" id="amphurId" name="amphurId"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"><?= $wording_lan["district"] ?> <font
                                                    color="#ff0000">*</font></div>

                                        <div class="profile-info-value">
                                            <div class="input-group col-sm-9 col-xs-9">
                                                <input class="form-control" type="text" id="districtId"
                                                       name="districtId" value="">
                                            </div>
                                        </div>
                                    </div>
                                <? } ?>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_47"] ?></div>

                                    <div class="input-group">
                                        <input class="form-control" type="text" id="zip" name="zip"
                                               value="<?= $datax["zip"] ?>">
                                        <span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="button"
                                        onClick="check_zipcode(document.getElementById('province').value,document.getElementById('amphur').value,document.getElementById('district').value)">
									<i class="ace-icon fa fa-search bigger-110"></i>
									Search
								</button>
								</span>
                                    </div>
                                </div>

                            </div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <!-- #section:pages/profile.info -->
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row table-header">
                                    <div class="profile-info-value"><?= $wording_lan["tab1_mem_38"] ?></div>

                                    <div class="profile-info-value">
                                        <label class="inline">
                                            <input type="checkbox" class="ace" name="chkaddress" id="chkaddress"
                                                   value="1" tabindex="53" onClick="onclickaddress(this.value);"/>
                                            <span class="lbl"> <?= $wording_lan["tab1_mem_75"] ?></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_39"] ?><font
                                                color="#ff0000">*</font></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="caddress" name="caddress"
                                                   value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_40"] ?></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="cbuilding" name="cbuilding"
                                                   value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_41"] ?></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="cvillage" name="cvillage"
                                                   value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_42"] ?></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="cstreet" name="cstreet"
                                                   value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_43"] ?></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="csoi" name="csoi" value="">
                                        </div>
                                    </div>
                                </div>
                                <?
                                if ($_SESSION["m_locationbase"] == '1') {
                                    if ($cprovinceId == "") {
                                        include("cthaiaddress.php");
                                    } else {
                                        include("cthaiaddressshow.php");
                                    }
                                } else {
                                    ?>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"><?= $wording_lan["province"] ?> <font
                                                    color="#ff0000">*</font></div>

                                        <div class="profile-info-value">
                                            <div class="input-group col-sm-9 col-xs-9">
                                                <input class="form-control" type="text" id="cprovince" name="cprovince"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"><?= $wording_lan["amphur"] ?> </div>

                                        <div class="profile-info-value">
                                            <div class="input-group col-sm-9 col-xs-9">
                                                <input class="form-control" type="text" id="camphur" name="camphur"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"><?= $wording_lan["district"] ?></div>

                                        <div class="profile-info-value">
                                            <div class="input-group col-sm-9 col-xs-9">
                                                <input class="form-control" type="text" id="cdistrict" name="cdistrict"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                <? } ?>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"><?= $wording_lan["tab1_mem_47"] ?></div>

                                    <div class="input-group">
                                        <input class="form-control" type="text" id="czip" name="czip" value="">
                                        <span class="input-group-btn">
								<button class="btn btn-sm btn-default" type="button"
                                        onClick="check_zipcode1(document.getElementById('cprovince').value,document.getElementById('camphur').value,document.getElementById('cdistrict').value)">
									<i class="ace-icon fa fa-search bigger-110"></i>
									Search
								</button>
								</span>
                                    </div>
                                </div>

                            </div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                        </div>

                        <!-- Col 2 -->

                        <!-- Row 4 -->
                        <div class="col-xs-12 col-sm-6">
                            <!-- #section:pages/profile.info -->
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row table-header">
                                    <div class="profile-info-value"><?= $wording_lan["tab1_mem_48"] ?></div>

                                    <div class="profile-info-value">
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_50"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="controls">
                                            <select class="span4" size="1" name="bankcode" id="bankcode" tabindex="28">
                                                <?
                                                $result1 = mysql_query("select * from " . $dbprefix . "bank order by bankname");
                                                for ($i = 1; $i <= mysql_num_rows($result1); $i++) {
                                                    $row1 = mysql_fetch_object($result1);
                                                    //echo "<option value=\"\" ";
                                                    echo "<option value=\"" . $row1->bankcode . "\" ";
                                                    if ($bankcode == "" && $row1->bankcode == 26) {
                                                        echo "selected";
                                                    }
                                                    if ($datax["bankcode"] == $row1->bankcode) {
                                                        echo "selected";
                                                    }
                                                    echo ">" . $row1->bankname . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_51"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="branch" name="branch"
                                                   value="<?= $datax["branch"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_52"] ?>     </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" readonly type="text" id="acc_type"
                                                   name="acc_type" value="<?= $wording_lan["tab1_mem_70"]; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_53"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="acc_no" name="acc_no"
                                                   value="<?= $datax["acc_no"] ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_54"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="acc_name" name="acc_name"
                                                   value="<?= $datax["acc_name"] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <!-- #section:pages/profile.info -->
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row table-header">
                                    <div class="profile-info-value"><?= $wording_lan["tab1_mem_49"] ?></div>

                                    <div class="profile-info-value">
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_13"] ?></div>

                                    <div class="profile-info-value">
                                        <div class="controls">
                                            <select class="span2" name="iname_f" id="iname_f"
                                                    onChange="document.getElementById('iname_ff').value=this.value;if(this.value == '123'){document.getElementById('iname_ff').value = ''; document.getElementById('iname_ff').readOnly  = false;document.getElementById('iname_ff').focus();}else {document.getElementById('iname_ff').readOnly  = true;}">
                                                <option value=""
                                                        selected=""><?= $wording_lan["tab1_mem_13"]; ?></option>
                                                <option value=<?php echo $tt1; ?>><?= $wording_lan["tab1_mem_15"]; ?></option>
                                                <option value=<?php echo $tt2; ?>><?= $wording_lan["tab1_mem_16"]; ?></option>
                                                <option value=<?php echo $tt3; ?>><?= $wording_lan["tab1_mem_17"]; ?></option>
                                                <option value="123"><?= $wording_lan["tab1_mem_80"]; ?></option>
                                            </select>
                                            <input class="span4" type="text" name="iname_ff" id="iname_ff" readonly
                                                   value="" tabindex="24">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_56"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="iname_t" name="iname_t"
                                                   value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_57"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="irelation" name="irelation"
                                                   value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_58"] ?></div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="iphone" name="iphone" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> <?= $wording_lan["tab1_mem_79"] ?> </div>

                                    <div class="profile-info-value">
                                        <div class="input-group col-sm-9 col-xs-9">
                                            <input class="form-control" type="text" id="iid_card" name="iid_card"
                                                   value="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                            <div class="space-6"></div>
                        </div>

                        <!-- Col 2 -->
                    </div>
                </div>
                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
        <center>
            <!--input type="checkbox" name="chkpayment" id="chkpayment" value="checkbox" onChange="if(this.checked == true){document.getElementById('button').disabled = false;document.getElementById('ok').disabled = true;}else{document.getElementById('button').disabled = true;document.getElementById('ok').disabled = true;}" />
                          <a href="#">���͹䢡����Ѥ�</a><br/><br/><br/-->


            <button class="btn btn-info" name='button' id='button' type='button'
                    onClick="imembercheck();sendget_sponsor(document.getElementById('sp_code').value)">
                <i class="ace-icon fa-dot-circle-o bigger-110"></i>
                <?= $wording_lan["tab4"]["5_17"] ?>
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
<input type="hidden" id="id_card_img" name="id_card_img" value="">
</form>

<div id="uploadcitizenid" class="modal fade" role="dialog" style="display: none;">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-body">

				

		<div id="upload-wrapper">
		<div align="center">
        
		<form action="imge_upload_citizenid_action.php" method="post" enctype="multipart/form-data" id="MyUploadForm">
		<input name="image_file" id="imageInput" type="file" class="btn btn-default">
		<input name="mcid_img" id="mcid_img" type="hidden" value=""><br>
		<input type="submit" id="submit-btn" value="Upload" class="btn btn-default">
		<a class="btn btn-danger" href="javascript:$('#uploadcitizenid').modal('toggle');">ปิด</a>

		<img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait">
		</form>
        <div id="output">
		<img src="">
		</div>
         
		
		</div>
		</div>



</div>
</div>
</div>	
</div>



<div class="space-6"></div>
<div class="space-6"></div>
<div class="space-6"></div>


<br/>
<div id="checkstate" align="center"><font color="#FFFFFF" style="background:#990000">
        &nbsp;<?= $wording_lan["tab1_mem_86"] ?>&nbsp; </font></div>
<div class="space-6"></div>
<div class="space-6"></div>
<div class="space-6"></div>
<div class="space-6"></div>
<div class="space-6"></div>
<div class="space-6"></div>
<div class="space-6"></div>
<div class="space-6"></div>
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->


<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript">
		

		
		function afterSuccess()
		{
			$('#submit-btn').show(); //hide submit button
			$('#loading-img').hide(); //hide submit button
		    $('.pull-right').css("display", "block");
			//list_image();
		
		}
		
		//function to check file size before uploading.
		function beforeSubmit(){
			//check whether browser fully supports all File API
		   if (window.File && window.FileReader && window.FileList && window.Blob)
			{
				
				if( !$('#imageInput').val()) //check empty input filed
				{
					$("#output").html("file not found try one more ?");
					return false
				}
				
				var fsize = $('#imageInput')[0].files[0].size; //get file size
				var ftype = $('#imageInput')[0].files[0].type; // get file type
				
		
				//allow only valid image file types 
				switch(ftype)
				{
					case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
						break;
					default:
						$("#output").html("<b>"+ftype+"</b> Unsupported file type!");
						return false
				}
				
				//Allowed file size is less than 1 MB (1048576)
				if(fsize>1048576) 
				{
					$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
					return false
				}
						
				$('#submit-btn').hide(); //hide submit button
				$('#loading-img').show(); //hide submit button
				//$("#output").html("");  
				 
			}
			else
			{
				//Output error to older browsers that do not support HTML5 File API
				$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
				return false;
			}
		}
		
		//function to format bites bit.ly/19yoIPO
		function bytesToSize(bytes) {
		   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
		   if (bytes == 0) return '0 Bytes';
		   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
		   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
		}
		 
 
		$(document).ready(function() { 
			var options = { 
					target: '#output',   // target element(s) to be updated with server response 
					beforeSubmit: beforeSubmit,  // pre-submit callback 
					success: afterSuccess,  // post-submit callback 
					resetForm: true        // reset the form after successful submit 
				}; 
				
			 $('#MyUploadForm').submit(function() { 
					$(this).ajaxSubmit(options);  			
					// always return false to prevent standard browser submit and page navigation 
					return false; 
				}); 
		}); 


		 </script>