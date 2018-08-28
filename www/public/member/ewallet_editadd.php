<?
$_SESSION["perbuy"] = 1;
?>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script type="text/javascript">
function chknum(key){
    if(key>=48&&key<=57)
        return true;
    else
        return false;
}
 function checkForm(frm)
  {
    //
    // check form input values
    //

    frm.ok.disabled = true;
    frm.ok.value = "Please wait...";
    return true;
  }
function showHideNum(boxName,divName) { 

if(boxName.checked == true) { 
    document.getElementById(divName).value=parseFloat(document.getElementById('sumtotal').value);
    } 
    else { 
    document.getElementById(divName).value="0"; 
    } 
} 


function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest(); } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported")
   return null
}
function str_pad(input, pad_length, pad_string, pad_type){ 
for(i=input.length; i<pad_length; i++){ 
if(pad_type) 
input = input + pad_string; 
else 
input = pad_string + input; 
} 
return input; 
} 

function checkaddress(value) {
     var req = Inint_AJAX(); //สร้าง Object
    // alert(value)
    value = str_pad(value,7,0,false);
    //alert(value);
     req.open('GET', 'search_address.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
                    //alert(req.responseText);
                    if(data == 1234){
                    //document.getElementById("mname").innerHTML="ไม่ได้อยู่ในสายงาน หรือ <br>ไม่สามารถสั่งซื้อข้ามประเทศ";
                    }else{
                    //    alert(data);
                    document.getElementById("idchksaddress").innerHTML=data; //แสดงผล
                    }
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
}
function sendget_sponsor(value) {
     var req = Inint_AJAX(); //สร้าง Object
    // alert(value)
    value = str_pad(value,7,0,false);
    //alert(value);
    //if(value != <?=$_SESSION["usercode"]?>){
        //alert(test);
         req.open('GET', 'search_member.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
         req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
              if (req.readyState==4) {
                   if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                        var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
                        //alert(req.responseText);
                        if(data == 1234){
                        document.getElementById('mcode').value="";
                        document.getElementById("mname").innerHTML="<?=$wording_lan["not_sponser"]?>";
                        }else if(data.trim()=="memterminate"){
						document.getElementById('mcode').value="";
						aalert('<?=$wording_lan["rp"]["id"]?> '+value+' <?=$wording_lan["txt_terminate"]?>');
						
						}else{
                        document.getElementById('mcode').value=value;
                        document.getElementById("mname").innerHTML=data; //แสดงผล
                        }
                   }
              }
         };
         req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
         req.send(null); //ทำการส่ง
    //}else{
    //                    document.getElementById('mcode').value="";
    //                    document.getElementById("mname").innerHTML="ไม่ได้อยู่ในสายงาน หรือ <br>ไม่สามารถสั่งซื้อข้ามประเทศ";

    //}
};
function checkStatus(value,strUser,total) {
     var req = Inint_AJAX(); //สร้าง Object
    // alert(value)
    value = str_pad(value,7,0,false);
    //alert(test);
     req.open('GET', 'search_status.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
                    //alert(req.responseText);
                    if(data == 1){
                        if(strUser == 'C'){
                            alert("คุณได้รักษายอดครบคุณสมบัติไปแล้ว");
                            document.getElementById('ok').disabled = true;
                            exit;
                        };
                    }else{
                        if(strUser == 'C'){
                            //alert(total);alert(data);
                            if(total <  parseFloat(data) || total >  parseFloat(data)+500 ){
                                alert("คุณต้องรักษายอดทันที่เป็นจำนวน "+data+"PV และ รักษายอดทันทีได้ไม่เกิน "+(parseFloat(data)+500)+" PV");
                                document.getElementById('ok').disabled = true;
                                exit;
                            }
                        };
                    }
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
function checkStatusNew(value,strUser,total) {
     var req = Inint_AJAX(); //สร้าง Object
    // alert(value)
    value = str_pad(value,7,0,false);
    //alert(test);
     req.open('GET', 'search_status_new.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
                    if(data == 1){
                        if(strUser == 'Q'){
                            alert("คุณได้รักษายอดครบคุณสมบัติล่วงหน้าไปแล้ว");
                            document.getElementById('ok').disabled = true;
                            exit;
                        };
                    }else{
                        if(strUser == 'Q'){
                            //alert(total);alert(data);
                            if(total >  parseFloat(data)+100 ){
                            //if(total <  parseFloat(data) || total >  parseFloat(data)+100 ){
                                alert(" รักษายอดได้ไม่เกิน "+(parseFloat(data)+500)+" PV");
                                //alert("คุณต้องรักษายอดเป็นจำนวน "+data+"PV และ รักษายอดได้ไม่เกิน "+(parseFloat(data)+100)+" PV");
                                document.getElementById('ok').disabled = true;
                                exit;
                            }
                        };
                    }
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
function sendget_invent(value) {
     var req = Inint_AJAX(); //สร้าง Object
    // alert(value)
    //value = str_pad(value,7,0,false);
    //alert(test);
     req.open('GET', 'search_invent.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
                    //alert(req.responseText);
                    if(data == 1234){
                    document.getElementById('inv_code').value="";
                    document.getElementById("inv_desc").innerHTML="ไม่ได้อยู่ในระบบ";
                    }else{
                    document.getElementById('inv_code').value=value;
                    document.getElementById("inv_desc").innerHTML=data; //แสดงผล
                    }
                    //alert(data);
                    //if(data == "No Data"){
                    //    alert('a');
                    //    document.getElementById("mcode").innerHTML="";}
                    
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript">
        function checkUserName(){
                var u = document.getElementById('mcode').value;

                $.post("c.php", { userName: u}, checkUserNameCompleted);
        }

        function checkUserNameCompleted(data){
            //alert(data);
            
            if(data != 1){
                //alert(data);
                document.getElementById('showsend1').innerHTML = data;
                //clicktab(3);
            }
              //  alert("Server return: " + data);
        }
        function checkUserName1(){
                var u = document.getElementById('mcode').value;

                $.post("d.php", { userName: u}, checkUserNameCompleted1);
        }

        function checkUserNameCompleted1(data){
            //alert(data);
            
            //if(data != 1){
                //alert(data);
                var tott = 0;
                //alert(<?=$_SESSION["ewallet"]?>);
                //alert(data);
                document.getElementById('ajaxshipping').value = data;
                    if(<?=$_SESSION["ewallet"]?> < data){
                        //    alert('Ewallet ของท่านไม่เพียงพอ');
                        //    document.getElementById('ok').disabled=true;
                        //    document.getElementById('checkstate').innerHTML= '';
                            
                        //    exit;
                    }
            //alert(tott);
        //    if(parseFloat(document.getElementById('sumtotal').value)+parseFloat(document.getElementById('ajaxshipping').value)+parseFloat(document.getElementById('ajaxshipping').value) != tott){
            //    alert('ยอดเงิน '+tott+' บาท กรุณาเลือกวิธีชำระเงินให้ครบตามจำนวน');
            //    document.getElementById('ok').disabled=true;
            //    exit;
            //}
                //clicktab(3);
            //}
              //  alert("Server return: " + data);
        }
    function abc(){
        //alert(<?=$_SESSION["chkfree"]?>);
        //        var chkfree = '<?=$_SESSION["chkfree"]?>';
        //    if( chkfree != '1'){
                //alert('กรุณาเลือกสินค้าฟรี');
            //    document.getElementById("ok").disabled = true;
            //    clicktab(3);
        //    }
              //  alert("Server return: " + data);
        }
</script>
<script language="javascript">
var xmlHttp;
function ibillcheck(){
    var val = document.getElementById('sadate').value;
    var field = "sadate";
    var flag = "1-0-0-0-0";
    var errDesc = "<?=$wording_lan["Date"]?>";
    
    val = val + ","+document.getElementById('mcode').value;
    field = field +",mcode";
    flag = flag+",1-7-0-0-0";
    errDesc = errDesc + ",<?=$wording_lan["Report_1"]?>";

//alert(document.getElementById('txtMoney').value);
if(document.getElementById('txtMoney').value == ""){
document.getElementById('txtMoney').value = 0;

}

if(document.getElementById('txtMoney').value < 100){
    alert('<?=$wording_lan["mn"]?>');
document.getElementById('txtMoney').focus();
exit;
}
    /*
    val = val + ","+document.getElementById('inv_code').value;
    field = field +",inv_code";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",รหัสสาขา";*/    
        
//loop check
    document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
    startRQ(field,val,"",flag,errDesc,"asaleh","checkstate");
}
function ebillcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
    var val = document.getElementById('sadate').value;
    var skipval = "";
    var field = "sadate";
    var flag = "1-0-0-0-0";
    var errDesc = "<?=$wording_lan["Date"]?>";
    
    val = val + ","+document.getElementById('mcode').value;
    skipval = skipval+",";
    field = field +",mcode";
    flag = flag+",1-7-0-0-0";
    errDesc = errDesc + ",<?=$wording_lan["Report_1"]?>";

    if(document.getElementById('inv_code').value != ''){
        if(document.getElementById("inv_desc").innerHTML == ''){
            alert('<?=$wording_lan['tab4']['1_61'] ?>');
             frm.ok.disabled = true;
            exit;
        }
    }
/*    
    val = val + ","+document.getElementById('inv_code').value;
    skipval = skipval+",";
    field = field +",inv_code";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",รหัสสาขา";
*/
    document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
    //alert(skipval);
    startRQ(field,val,skipval,flag,errDesc,"transferewallet_h","checkstate");
}

</script>
<?
    function dialogbox($width,$color,$msg,$link){
        ?><table width=<?=$width?> bgcolor="<?=$color?>">
            <tr valign="top">
            <td align="center"><font color="#FFFFFF"><?=$msg?></font></td>
            </tr>
            <?
            if($link!=""){
                ?><tr valign="top">
                <td align="center"><?=$link?></td>
                </tr><?
            }
            ?>
        </table><? 
    }
?>
<script language="javascript" type="text/javascript" src="./datetimepick/datetimepicker.js"></script>
<script language="javascript" type="text/javascript">
var wi=null;
    function get_mem_listpicker_mcode(){
        if (wi) wi.close();
        //alert(this.getElementById('mcode_acc_name').innerHTML);
        wi=window.open("mem_listpicker_mcode.php?name="+document.frm.mcode.value,"list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
    }
    function get_mem_listpicker_invcode(){
        if (wi) wi.close();
        //alert(this.getElementById('mcode_acc_name').innerHTML);

        wi=window.open("invent_listpicker.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
    }
    function cal(){
        tag = window.parent.document.frm.getElementsByTagName('input');
        //alert(tag.length);
        var sumtotal=0;
        var sumpv=0;
        var skip = 45;
        var bgskip = 9;
        for(i=0;i<(tag.length-skip)/8;i++){
            step = i*8+bgskip;
            //step++;
        
            price = parseFloat(tag[step+2].value);
            pv = parseFloat(tag[step+3].value);
            num = parseFloat(tag[step+4].value);
            if(<?=$_SESSION["ewallet"]?> < sumtotal){
                //alert("point ของคุณไม่เพียงพอ");
                //tag[step+4].value = 0;
                //sumtotal = sumtotal - (price*num);
                //num = 0;
                //sumtotal = 0;
                //return;
            }
            //sumtotal = sumtotal + (price*num);

            tag[step+5].value = num * price;
            tag[step+6].value = num * pv;
            //document.getElementById('sumtotal').value=sumtotal;
            //document.getElementById('sumpv').value=sumpv;
            //alert(num +" " + pv +" "+ price);
            sumtotal = sumtotal + (price*num);
            sumpv = sumpv + (pv*num);
            //alert(sumtotal+ " " + price + " " + num);

        }
        document.getElementById('sumtotal').value=sumtotal;
        document.getElementById('sumpv').value=sumpv;
        window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font>";
        //alert(window.parent.document.mainsale.getElementsByTagName('input').length);
        //alert(sumtotal);
    }
    function saledel(pcode,pdesc,price,pv){
        var place;
        var step;
        var sumpv = 0;
        var sumtotal = 0;
        var out = true;
        var qp=0;
        var num;
        var skip = 45;
        var bgskip = 9;
        var l=0;

        //var fcus;
        var showprice = 0;
        var showpv = 0;
        var style_l = "border-left:1 solid #FFFFFF;";
        var style_t = "border-top:1 solid #000000;";
        var style_b = "border-bottom:1 solid #000000;";
        var style_bd = "border-bottom:1 dashed #000000;";
        var hidden = "border-left-width:0;border-right-width:0;border-top-width:0;border-bottom-width:0;";
        /*if(window.parent.document.getElementById('sale').innerHTML==""){
            window.parent.document.getElementById('sale').innerHTML = "";
        }*/
        tag = window.parent.document.frm.getElementsByTagName('input');
        window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font>";
        //alert(tag.length);
        place = "<table border='0' width='500' cellpading='0' cellspacing='0'>";
        place += "<tr align='center' bgcolor='#999999'>";
        place += "<td bgcolor='#99CCCC' style='"+style_l+style_t+style_b+"'>&nbsp;</td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan["tab4"]["1_28"]?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan["tab4"]["1_29"]?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan["tab4"]["1_30"]?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan["tab4"]["1_31"]?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan["tab4"]["1_32"]?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan["tab4"]["1_33"]?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan["tab4"]["1_34"]?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan["tab4"]["1_35"]?></td>";
        place += "</tr>";
        for(i=0;i<(tag.length-skip)/8;i++,l++){
            step = i*8+bgskip;
            //step++;
            if(pcode == tag[i*8 +bgskip].value){
                l--;
                continue;
            }
            
            place += "<tr>";
            place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ลบ' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";
            place += "<td style='"+style_l+style_bd+"' align='center'>" + (l+1) + "</td>";
            place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly style='"+hidden+ "text-align:center;' type='text' name='pcode[]' value='" + tag[step].value + "'></td>";
            place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly style='"+hidden+ "' type='text' name='pdesc[]' value='" + tag[++step].value + "'></td>";






            price = parseFloat(tag[++step].value);
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='price[]' value='" + price + "'></td>";
            pv = parseFloat(tag[++step].value);
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='pv[]' value='" + pv + "'></td>";
            num = parseFloat(tag[++step]. value);
            //alert(num);
            place += "<td style='"+style_l+style_bd+"' align='right'><input style='text-align:right;' name='qty[]'  onkeyup='cal()' type='text' size='5' value='" + num + "'></td>";
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalprice[]' value='" + (price*num) + "'></td>";
            //place += "</tr>";
            sumtotal = sumtotal + (price*num);
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalpv[]' value='" + (pv*num) + "'></td>";
            sumpv = sumpv + (pv*num);

            place += "</tr>";
        }
        //alert(window.parent.document.mainsale.getElementsByTagName('input').length);
        //alert(sumtotal);
        place += "<tr bgcolor='#999999'>";
        place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='7'>รวม</td>";
        place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' id='sumtotal' name='sumtotal' id='sumtotal' value='" + sumtotal + "'></td>";
        place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' id='sumpv' name='sumpv' id='sumpv' value='" + sumpv + "'></td>";
        place += "</tr>";
        //place += "<tr><td colspan='9' align='right'><input type='submit' value='บันทึก'></td></tr>";
        place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='ตรวจสอบ' />&nbsp;<input type='submit' value='บันทึก' name='ok' id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=6'\" value='ยกเลิก' /></td></tr>";
        place += "</table>";
        //alert(place);
        window.parent.document.getElementById('sale').innerHTML = place;
        tag = window.parent.document.frm.getElementsByTagName('input');
        if(tag.length-skip<8){
            window.parent.document.getElementById('sale').innerHTML = "<table width='500' bgcolor='#009900'><tr><td align='center'><font color='#FFFFFF'>เลือกข้อมูลสอนค้าจากตารางขวามือ แล้วแก้ไขจำนวนตามต้องการ</font></td></tr></table>";
        }
    }
</script> 
</head>

<body>
<?
if($_GET["cmc"])$mcode = $_GET["cmc"];

if(isset($_GET['id'])){

        $sql = "SELECT * FROM ".$dbprefix."transferewallet_h WHERE id='".$_GET['id']."'  LIMIT 1";
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs)<=0){
            $redirect = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">ไปหน้าสมาชิก</a>]";
            dialogbox("50%","#990000","ไม่พบข้อมูลตามเงื่อนไข",$redirect);
            exit;
        }else{
            $sadate = mysql_result($rs,0,'sadate');
            $cancel = mysql_result($rs,0,'cancel');
            $sqlC = "select calc from ".$dbprefix."around where fdate >= '$sadate' and tdate <= '$sadate' and calc = 1";
            $sqlSC = mysql_query($sqlC);
            if(mysql_num_rows($sqlSC) > 0 or $cancel == '1'){
                        echo "<script language='JavaScript'>alert('ไม่สามารถแก้ไขบิลนี้ได้');window.location='index.php?sessiontab=3&sub=6'</script>";    
                        exit;
                }        
            $inv_code = mysql_result($rs,0,'inv_code');
            $satype = mysql_result($rs,0,'sa_type');
            $mcode = mysql_result($rs,0,'mcode');
            $radsend = mysql_result($rs,0,'send');
            $txtoption = mysql_result($rs,0,'txtoption');
            $chkCash = mysql_result($rs,0,'chkCash');
            $chkFuture = mysql_result($rs,0,'chkFuture');
            $chkTransfer = mysql_result($rs,0,'chkTransfer');
            $chkCredit1 = mysql_result($rs,0,'chkCredit1');
            $chkCredit2 = mysql_result($rs,0,'chkCredit2');
            $chkCredit3 = mysql_result($rs,0,'chkCredit3');
            $chkInternet = mysql_result($rs,0,'chkInternet');
            $chkDiscount = mysql_result($rs,0,'chkDiscount');
            $chkOther = mysql_result($rs,0,'chkOther');
            $txtCash = mysql_result($rs,0,'txtCash');
            $txtFuture = mysql_result($rs,0,'txtFuture');
            $txtTransfer = mysql_result($rs,0,'txtTransfer');
            $txtCredit1 = mysql_result($rs,0,'txtCredit1');
            $txtCredit2 = mysql_result($rs,0,'txtCredit2');
            $txtCredit3 = mysql_result($rs,0,'txtCredit3');
            $txtInternet = mysql_result($rs,0,'txtInternet');
            $txtDiscount = mysql_result($rs,0,'txtDiscount');
            $txtOther = mysql_result($rs,0,'txtOther');
            $optionCash = mysql_result($rs,0,'optionCash');
            $optionFuture = mysql_result($rs,0,'optionFuture');
            $optionTransfer = mysql_result($rs,0,'optionTransfer');
            $optionCredit1 = mysql_result($rs,0,'optionCredit1');
            $optionCredit2 = mysql_result($rs,0,'optionCredit2');
            $optionCredit3 = mysql_result($rs,0,'optionCredit3');
            $optionInternet = mysql_result($rs,0,'optionInternet');
            $optionDiscount = mysql_result($rs,0,'optionDiscount');
            $optionOther = mysql_result($rs,0,'optionOther');
            $cprovinceId = mysql_result($rs,0,'cprovinceId');
            $camphurId = mysql_result($rs,0,'camphurId');
            $cdistrictId = mysql_result($rs,0,'cdistrictId');
            $czip = mysql_result($rs,0,'czip');
            $caddress = mysql_result($rs,0,'caddress');
            //$inv_desc = mysql_result($rs,0,'inv_desc');
            //$mname = mysql_result($rs,0,'name_t');
            mysql_free_result($rs);
            if(empty($txtCredit3))$txtCredit3 = 0;
            if(empty($txtCredit2))$txtCredit2 = 0;
            if(empty($txtCredit1))$txtCredit1 = 0;
            if(empty($txtTransfer))$txtTransfer = 0;
            if(empty($txtFuture))$txtFuture = 0;
            if(empty($txtCash))$txtCash = 0;
            if(empty($txtDiscount))$txtDiscount = 0;
            if(empty($txtOther))$txtOther = 0;
        }
}else{
        $txtCash = '0';
        $txtFuture = '0';
        $txtTransfer = '0';
        $txtCredit1 = '0';
        $txtCredit2 = '0';
        $txtCredit3 = '0';
        $txtInternet = '0';
        $txtDiscount = '0';
        $txtOther = '0';
}
?>
<form method="post" action="ewalletoperate.php?state=<?=$_GET['id']==""?0:1?>" id="frm" name="frm"  onsubmit="return checkForm(this)" onKeyDown="document.getElementById('ok').disabled=true;" >
<table border="0" width="100%">
  <tr valign="top">
    <td><table border="0" width="100%">
      <tr valign="top">
        <td><table border="1" width="100%" align="center">
          <tr>
            <td width="16%" align="right">&nbsp;</td>
            <td width="38%"><? 
                $sql = "SELECT MAX(id) AS id FROM ".$dbprefix."ewallet ";
                $rs = mysql_query($sql);
                //echo ($_GET['id']==""?mysql_result($rs,0,'id')+1:$_GET['id']);
                mysql_free_result($rs);
            ?>
                    <input type="hidden" value="<?=$_GET['id']?>" name="id"/></td>
            <td width="6%" align="right"><?=$wording_lan["tab4"]["5_2"]?></td>
            <td width="40%"><input type="text" id="sadate" name="sadate"  readonly="" value="<?=$sadate==""?$_SESSION["datetimezone"]:$sadate?>">
                  <a href="javascript:NewCal('sadate','yyyymmdd',false,24)"><img style="display:none" src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="&#3648;&#3621;&#3639;&#3629;&#3585;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;"></a> </td>
          </tr>
          <tr valign="top">
            <td align="right"><?=$wording_lan["tab4"]["5_1"]?></td>
            <td nowrap="nowrap"><input style="background-color:#FFFF99"   size="15" type="text" id="mcode" name="mcode" value=""><input name="button2"  type="button" onClick="sendget_sponsor(document.getElementById('mcode').value)" value="<?=$wording_lan["submit"]?>" />
                <!--<input type="button" onClick="get_mem_listpicker_mcode()" value="&#3648;&#3621;&#3639;&#3629;&#3585;">-->
              <? //echo ' '.$name_f." ".$_SESSION["username"].' <br>'.$wording_lan["tab4"]["5_3"].' '.number_format($ewallet,2,'.',',');?><div id="mname"></div></td>
            <td align="right" >&nbsp;</td>
            <td ><input style="background-color:#FFFF99;display:none" readonly size="15" type="text" id="inv_code" name="inv_code" value="<?=$inv_code?>">
                    <input name="button" type="button" style="display:none" onClick="get_mem_listpicker_invcode()" value="&#3648;&#3621;&#3639;&#3629;&#3585;">
              <div id="inv_desc"></div></td>
          </tr>
          <tr valign="top">
            <td align="right"><?=$wording_lan["tab4"]["5_4"]?></td>
            <td><input type="text" name="txtMoney" id="txtMoney"  onKeyPress="return chknum(window.event.keyCode)" value="0" ></td>
            <td nowrap="nowrap"><?=$wording_lan["tab4"]["5_5"]?></td>
            <td><select size="1" name="spayment" id="spayment" onChange="if(this.value == '1'){document.getElementById('chkpayment').checked = false;document.getElementById('showpayment').style.visibility='visible';document.getElementById('ok').disabled = true;document.getElementById('button').disabled = true;}else {document.getElementById('chkpayment').checked = false;document.getElementById('showpayment').style.visibility='visible';document.getElementById('ok').disabled = true;document.getElementById('button').disabled = true;}" >
              <option value="2">โอน Ewallet</option>
              
            </select></td>
          </tr>
          <tr valign="top">
            <td align="right"><?=$wording_lan["login_4"]?></td>
            <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>&#3649;&#3612;&#3609; A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>&#3626;&#3656;&#3591;&#3624;&#3641;&#3609;&#3618;&#3660;</option>
              </select>-->
              <input type="password" name="sv_code" id="sv_code"  ></td>
            <td nowrap="nowrap">&nbsp;</td>
            <td><!--  <input style="display:none" name="button3" type="button"  onclick="sendget_invent(document.getElementById('inv_code').value)" value="&#3588;&#3657;&#3609;" />-->
                <input name="button3" type="button" style="display:none" onClick="get_mem_listpicker_invcode()" value="&#3648;&#3621;&#3639;&#3629;&#3585;"  ></td>
          </tr>
        </table>
            </td>
      </tr>
      <tr>
        <td id="sale" align="center">
        <table id="showpayment"><tr  style="display:none"><td>
  <p align="left"><b><?=$wording_lan["tab4"]["5_6"]?> </b></p>
  <ol>
    <li><?=$wording_lan["tab4"]["5_7"]?></li>
    <li><?=$wording_lan["tab4"]["5_8"]?></li>
    <li><?=$wording_lan["tab4"]["5_9"]?></li>
    <li><?=$wording_lan["tab4"]["5_10"]?></li>
  </ol>
</td></tr>
          <tr>
            <td><br>
              <input type="checkbox" name="chkpayment" id="chkpayment" value="checkbox" onChange="if(this.checked == true){document.getElementById('button').disabled = false;document.getElementById('ok').disabled = true;}else{document.getElementById('button').disabled = true;document.getElementById('ok').disabled = true;}" /> <?=$wording_lan["tab4"]["5_20"]?></td></tr></table>
        <br>
        <input name='button'  id='button' type='button' disabled="disabled" onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='<?=$wording_lan["tab4"]["5_17"]?>' />
          &nbsp;
          <input type='submit' value='<?=$wording_lan["tab4"]["5_18"]?>' name='ok'  id='ok' disabled='disabled' />
          &nbsp;
          <input name='reset' type='reset'  onclick="window.location='index.php?sessiontab=3&sub=6'" value='<?=$wording_lan["tab4"]["5_19"]?>' />
         
        </td>
      </tr>
      <tr>
        <td><div id="checkstate" align="center"></div></td>
      </tr>
    </table></td>
  </tr>
</table>
<br>
</form>


  <input  type="hidden" id="ccaddress" name="ccaddress">
  <input  type="hidden" id="ccprovinceId" name="ccprovinceId">
  <input  type="hidden" id="ccdistrictId" name="ccdistrictId">
  <input  type="hidden" id="ccamphurId" name="ccamphurId">
  <input  type="hidden" id="cczip" name="cczip">
  <input  type="hidden" id="ccheckr" name="ccheckr" value="">
  <input  type="hidden" id="ajaxshipping" name="ajaxshipping" value="0">

