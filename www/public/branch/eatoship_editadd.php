<?
$_SESSION["perbuy"] = 1;
?>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script type="text/javascript">
 function checkForm(frm)
  {
    //
    // check form input values
    //

    frm.ok.disabled = true;
    frm.ok.value = "Please wait...";
    return true;
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
function sendget_sponsor(value) {
     var req = Inint_AJAX(); //สร้าง Object
    // alert(value)
    value = str_pad(value,7,0,false);
    //alert(test);
     req.open('GET', 'search_eatoship.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
                    //alert(req.responseText);
                    if(data == 1234){
                    document.getElementById('mcode').value="";
                    document.getElementById("mname").innerHTML='<?=$wording_lan["ewallet_1"]?>';
                    }else{
                    document.getElementById('mcode').value=value;
                    document.getElementById("mname").innerHTML=data; //แสดงผล
                    }
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
  </script>
<script language="javascript">
var xmlHttp;
function ibillcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
    var val = document.getElementById('dateInput1').value;
    var field = "dateInput1";
    var flag = "1-0-0-0-0";
    var errDesc = '<?=$wording_lan["ewallet_5"]?>';
    
    val = val + ","+document.getElementById('mcode').value;
    field = field +",mcode";
    flag = flag+",1-9-0-0-0";
    errDesc = errDesc + ",<?=$wording_lan['ewallet_2']?>";
    var tott = 0;
    tott = parseFloat(document.getElementById('txtCash').value)+
            parseFloat(document.getElementById('txtFuture').value)+
            parseFloat(document.getElementById('txtTransfer').value)+
        parseFloat(document.getElementById('txtCredit1').value)+
        parseFloat(document.getElementById('txtCredit2').value)+
        parseFloat(document.getElementById('txtCredit3').value);
            
    //alert(tott);
    if(parseFloat(document.getElementById('txtMoney').value) != tott){
        alert('<?=$wording_lan["ewallet_3"]?> '+parseFloat(document.getElementById('txtMoney').value)+' <?=$wording_lan["ewallet_4"]?> ');
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
/*
function showHideNum(boxName,divName) { 

if(boxName.checked == true) { 
    document.getElementById(divName).value=parseFloat(document.getElementById('txtMoney').value);
    } 
    else { 
    document.getElementById(divName).value="0"; 
    } 
} */

function showHideNum(boxName,divName,cstatus) { 
//alert(cstatus);
var extax = 1;
var showtotal1 = 0;
//alert(cstatus);
//alert(divName);
//alert(document.getElementById('sumpv').value);
//alert(extax);
//alert(document.getElementById('ajaxshipping').value);
//showtotal1 = parseFloat(document.getElementById('txtMoney').value);
showtotal1 = parseFloat(document.getElementById('txtMoney').value);
if(divName != 'txtCash')showtotal1 = showtotal1-parseFloat(document.getElementById('txtCash').value);
//if(divName != 'txtFuture')showtotal1 = showtotal1-parseFloat(document.getElementById('txtFuture').value);
if(divName != 'txtTransfer')showtotal1 = showtotal1-parseFloat(document.getElementById('txtTransfer').value);
if(divName != 'txtCredit1')showtotal1 = showtotal1-(parseFloat(document.getElementById('txtCredit1').value));
if(divName != 'txtCredit2')showtotal1 = showtotal1-(parseFloat(document.getElementById('txtCredit2').value));
if(divName != 'txtCredit3')showtotal1 = showtotal1-(parseFloat(document.getElementById('txtCredit3').value));
//if(divName != 'txtCredit4')showtotal1 = showtotal1-(parseFloat(document.getElementById('txtCredit4').value));
//if(divName != 'txtInternet')showtotal1 = showtotal1-parseFloat(document.getElementById('txtInternet').value);
//if(divName != 'txtDiscount')showtotal1 = showtotal1-parseFloat(document.getElementById('txtDiscount').value);
//if(divName != 'txt_pcoupon')showtotal1 = showtotal1-parseFloat(document.getElementById('txt_pcoupon').value);

    if(boxName.checked == true) { 
        //if(showtotal1 < 0)showtotal1 = 0;
        document.getElementById(divName).value=showtotal1*extax;
    }else { 
        document.getElementById(divName).value="0"; 
    } 
}

function ebillcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
    var val = document.getElementById('dateInput1').value;
    var skipval = "";
    var field = "dateInput1";
    var flag = "1-0-0-0-0";
    var errDesc = '<?=$wording_lan["ewallet_5"]?>';
    
/*        val = val + ","+document.getElementById('mcode').value;
    skipval = skipval+",";
    field = field +",mcode";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",รหัสสมาชิก";
*/
    val = val + ","+document.getElementById('inv_code').value;
    skipval = skipval+",";
    field = field +",inv_code";
    flag = flag+",1-0-0-0-0";
    errDesc = errDesc + ",<?=$wording_lan['ewallet_6']?>";

    document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
    //alert(skipval);
    startRQ(field,val,skipval,flag,errDesc,"asaleh","checkstate");
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
        wi=window.open("invent_listpicker1.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
    }
    function cal(){
        tag = window.parent.document.frm.getElementsByTagName('input');
        //alert(tag.length);
        var sumtotal=0;
        var sumpv=0;
        var sumbv=0;
        var sumfv=0;
        var skip = 13;
        var bgskip = 8;
        for(i=0;i<(tag.length-skip)/12;i++){
            step = i*12+bgskip;
            //step++;
            //alert(step);
            price = parseInt(tag[step+1].value);
            pv = parseInt(tag[step+2].value);
            bv = parseInt(tag[step+3].value);
            fv = parseInt(tag[step+4].value);
            num = parseInt(tag[step+5].value);
            tag[step+6].value = num * price;
            tag[step+7].value = num * pv;
            tag[step+8].value = num * bv;
            tag[step+9].value = num * fv;
            //document.getElementById('sumtotal').value=sumtotal;
            //document.getElementById('sumpv').value=sumpv;
            //alert(num +" " + pv +" "+ price);
            sumtotal = sumtotal + (price*num);
            sumpv = sumpv + (pv*num);
            sumbv = sumbv + (bv*num);
            sumfv = sumfv + (fv*num);
            //alert(sumtotal+ " " + price + " " + num);
        }
        document.getElementById('sumtotal').value=sumtotal;
        document.getElementById('sumpv').value=sumpv;
        document.getElementById('sumbv').value=sumbv;
        document.getElementById('sumfv').value=sumfv;
        window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;<?=$wording_lan['ewallet_7']?>&nbsp; </font>";
        //alert(window.parent.document.mainsale.getElementsByTagName('input').length);
        //alert(sumtotal);
    }
    function saledel(pcode,pdesc,price,pv,bv,fv){
        var place;
        var step;
        var sumpv = 0;
        var sumbv = 0;
        var sumfv = 0;
        var sumtotal = 0;
        var out = true;
        var qp=0;
        var num;
        var skip = 15;
        var bgskip = 7;
        var l=0;

        //var fcus;
        var showprice = 0;
        var showpv = 0;
        var showbv = 0;
        var showfv = 0;
        var style_l = "border-left:1 solid #FFFFFF;";
        var style_t = "border-top:1 solid #000000;";
        var style_b = "border-bottom:1 solid #000000;";
        var style_bd = "border-bottom:1 dashed #000000;";
        var hidden = "border-left-width:0;border-right-width:0;border-top-width:0;border-bottom-width:0;";
        /*if(window.parent.document.getElementById('sale').innerHTML==""){
            window.parent.document.getElementById('sale').innerHTML = "";
        }*/
        tag = window.parent.document.frm.getElementsByTagName('input');
        window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;<?=$wording_lan['ewallet_7']?>&nbsp; </font>";
        //alert(tag.length);
        place = "<table border='0' width='500' cellpading='0' cellspacing='0'>";
        place += "<tr align='center' bgcolor='#999999'>";
        place += "<td bgcolor='#99CCCC' style='"+style_l+style_t+style_b+"'>&nbsp;</td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_8']?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_9']?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_10']?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_11']?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_12']?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_13']?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_14']?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_15']?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_16']?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_17']?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_18']?></td>";
        place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['ewallet_19']?></td>";
        place += "</tr>";
        for(i=0;i<(tag.length-skip)/12;i++,l++){
            step = i*12+bgskip;
            //step++;
            if(pcode == tag[i*12 +bgskip].value){
                l--;
                continue;
            }
            
            place += "<tr>";
            place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ลบ' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";
            place += "<td style='"+style_l+style_bd+"' align='center'>" + (l+1) + "</td>";
            place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly style='"+hidden+ "text-align:center;' type='text' name='pcode[]' value='" + tag[step].value + "'></td>";
            place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly style='"+hidden+ "' type='text' name='pdesc[]' value='" + tag[++step].value + "'></td>";
            price = parseInt(tag[++step].value);
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='price[]' value='" + price + "'></td>";
            pv = parseInt(tag[++step].value);
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='pv[]' value='" + pv + "'></td>";
            bv = parseInt(tag[++step].value);
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='bv[]' value='" + bv + "'></td>";
            fv = parseInt(tag[++step].value);
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='fv[]' value='" + fv + "'></td>";
            num = parseInt(tag[++step]. value);
            //alert(num);
            place += "<td style='"+style_l+style_bd+"' align='right'><input style='text-align:right;' name='qty[]'  onkeyup='cal()' type='text' size='5' value='" + num + "'></td>";
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalprice[]' value='" + (price*num) + "'></td>";
            //place += "</tr>";
            sumtotal = sumtotal + (price*num);
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalpv[]' value='" + (pv*num) + "'></td>";
            sumpv = sumpv + (pv*num);
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalbv[]' value='" + (bv*num) + "'></td>";
            sumbv = sumbv + (bv*num);
            place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalfv[]' value='" + (fv*num) + "'></td>";
            sumfv = sumfv + (fv*num);

            place += "</tr>";
        }
        //alert(window.parent.document.mainsale.getElementsByTagName('input').length);
        //alert(sumtotal);
        place += "<tr bgcolor='#999999'>";
        place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='9'>รวม</td>";
        place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumtotal' value='" + sumtotal + "'></td>";
        place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumpv' value='" + sumpv + "'></td>";
        place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumbv' value='" + sumbv + "'></td>";
        place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumfv' value='" + sumfv + "'></td>";
        place += "</tr>";
        //place += "<tr><td colspan='9' align='right'><input type='submit' value='บันทึก'></td></tr>";
        place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='<?=$wording_lan['check']?>' />&nbsp;<input type='submit' value='<?=$wording_lan['insert']?>' name='ok' id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=6&sub=147'\" value='<?=$wording_lan['cancel']?>' /></td></tr>";
        place += "</table>";
        //alert(place);
        window.parent.document.getElementById('sale').innerHTML = place;
        tag = window.parent.document.frm.getElementsByTagName('input');
        if(tag.length-skip<8){
            window.parent.document.getElementById('sale').innerHTML = "<table width='500' bgcolor='#009900'><tr><td align='center'><font color='#FFFFFF'><?=$wording_lan['ewallet_20']?></font></td></tr></table>";
        }
    }
</script> 
</head>

<body>
<?
if($_GET["cmc"])$mcode = $_GET["cmc"];
if(isset($_GET['id'])){
        $sql = "SELECT * FROM ".$dbprefix."ewallet WHERE id='".$_GET['id']."' LIMIT 1";
        $rs = mysql_query($sql);
        if(mysql_num_rows($rs)<=0){
            $redirect = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">ไปหน้าสมาชิก</a>]";
            dialogbox("50%","#990000","ไม่พบข้อมูลตามเงื่อนไข",$redirect);
            exit;
        }else{
            $sadate = mysql_result($rs,0,'sadate');
            $inv_code = mysql_result($rs,0,'inv_code');
            $satype = mysql_result($rs,0,'sa_type');
            $mcode = mysql_result($rs,0,'mcode');
            $radsend = mysql_result($rs,0,'send');
            $txtoption = mysql_result($rs,0,'txtoption');
            //$inv_desc = mysql_result($rs,0,'inv_desc');
            //$mname = mysql_result($rs,0,'name_t');
            mysql_free_result($rs);
        }
}
            if(empty($txtCredit3))$txtCredit3 = 0;
            if(empty($txtCredit2))$txtCredit2 = 0;
            if(empty($txtCredit1))$txtCredit1 = 0;
            if(empty($txtTransfer))$txtTransfer = 0;
            if(empty($txtFuture))$txtFuture = 0;
            if(empty($txtCash))$txtCash = 0;
            if(empty($txtDiscount))$txtDiscount = 0;
            if(empty($txtOther))$txtOther = 0;
            if(empty($txtMoney))$txtMoney = 0;
?>
<form method="post" action="eatoshipoperate.php?state=<?=$_GET['id']==""?0:1?>" name="frm" id="frm" onsubmit="return checkForm(this)">
  <table border="0" width="100%">
  <tr valign="top">
    <td>
    <table border="0" width="100%">
      <tr valign="top">
        <td>
            <table border="1" width="100%" align="center">
            <tr>
              <td width="16%" align="right">&nbsp;</td>
            <td width="38%">
            <? 
                $sql = "SELECT MAX(id) AS id FROM ".$dbprefix."ewallet ";
                $rs = mysql_query($sql);
                //echo ($_GET['id']==""?mysql_result($rs,0,'id')+1:$_GET['id']);
                mysql_free_result($rs);
            ?> <input type="hidden" value="<?=$_GET['id']?>" name="id"/></td>
            <td width="6%" align="right"><?=$wording_lan["ewallet_23"]?></td>
            <td width="40%"><input type="text" id="dateInput1" name="sadate" value="<?=$sadate==""?$_SESSION["datetimezone"]:$sadate?>">
             </td>
            </tr>
            <tr valign="top">
              <td width="16%" align="right" ><?=$wording_lan["ewallet_2"]?></td>
              <td  ><input style="background-color:#FFFF99;" size="15" type="text" id="mcode" name="mcode" value="<?=$mcode?>">
                <!--<input type="button" onClick="get_mem_listpicker_mcode()" value="เลือก">-->
                <input name="button2" type="button" onClick="sendget_sponsor(document.getElementById('mcode').value)" value="<?=$wording_lan["check"]?>" />
                <div id="mname"></div> </td>
              <td align="right" style="display:none">Stockist</td>
              <td style="display:none" ><input style="background-color:#FFFF99;" readonly size="15" type="text" id="inv_code" name="inv_code" value="<?=$inv_code?>">
                <input type="button" onClick="get_mem_listpicker_invcode()" value="เลือก"><div id="inv_desc"></div></td>
            </tr>            
            <tr valign="top">
              <td align="right"><?=$wording_lan["ewallet_24"]?></td>
              <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>แผน A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>รักษายอด</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>ส่งศูนย์</option>
              </select>--><input type="text" name="txtMoney" id="txtMoney" value="<?=$txtMoney?>"></td>
              <td>&nbsp;</td>
               <td>&nbsp;</td>
              </tr>
              </table>
              <table border="1" width="100%">
                <tr valign="top">
                  <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>&#3649;&#3612;&#3609; A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>&#3626;&#3656;&#3591;&#3624;&#3641;&#3609;&#3618;&#3660;</option>
              </select>-->
                      <input type="checkbox" name="chkCash" <?=($satype=="I"?"check":"")?> onClick="showHideNum(this,'txtCash')">
                  <?=$wording_lan["ewallet_25"]?></td>
                  <td><input type="text" name="txtCash" id="txtCash" size="10"  value="<?=$txtCash?>"></td>
                  <td><?=$wording_lan["ewallet_26"]?></td>
                  <td><input name="optionCash" type="text" value="<?=$optionCash?>" size="100"  >
                  </td>
                </tr>
                <tr style="display:none" valign="top">
                  <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>&#3649;&#3612;&#3609; A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>&#3626;&#3656;&#3591;&#3624;&#3641;&#3609;&#3618;&#3660;</option>
              </select>-->
                      <input type="checkbox" name="chkFuture" <?=($satype=="I"?"check":"")?> onClick="showHideNum(this,'txtFuture')">
                    &#3648;&#3591;&#3636;&#3609;&#3619;&#3633;&#3610;&#3621;&#3656;&#3623;&#3591;&#3627;&#3609;&#3657;&#3634;</td>
                  <td><input type="text" name="txtFuture" id="txtFuture" size="10"  value="<?=$txtFuture?>"></td>
                  <td>&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;</td>
                  <td><input name="optionFuture"   value="<?=$optionFuture?>" type="text" size="100" ></td>
                </tr>
                <tr valign="top" >
                  <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>&#3649;&#3612;&#3609; A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>&#3626;&#3656;&#3591;&#3624;&#3641;&#3609;&#3618;&#3660;</option>
              </select>-->
                      <input type="checkbox" name="chkTransfer" <?=($satype=="I"?"check":"")?> onClick="showHideNum(this,'txtTransfer')">
                   <?=$wording_lan["ewallet_27"]?></td>
                  <td><input type="text" name="txtTransfer" id="txtTransfer" size="10"  value="<?=$txtTransfer?>"></td>
                  <td><?=$wording_lan["ewallet_26"]?></td>
                  <td><input name="optionTransfer"   value="<?=$optionTransfer?>" type="text" size="100" ></td>
                </tr>
                <tr valign="top">
                  <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>&#3649;&#3612;&#3609; A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>&#3626;&#3656;&#3591;&#3624;&#3641;&#3609;&#3618;&#3660;</option>
              </select>-->
                      <input type="checkbox" name="chkCredit1" <?=($satype=="I"?"check":"")?> onClick="showHideNum(this,'txtCredit1')">
                  <?=$wording_lan["ewallet_28"]?></td>
                  <td><input type="text" name="txtCredit1" id="txtCredit1" size="10"  value="<?=$txtCredit1?>"></td>
                  <td><?=$wording_lan["ewallet_26"]?></td>
                  <td><input name="optionCredit1"   value="<?=$optionCredit1?>" type="text" size="100" ></td>
                </tr>
                <tr valign="top">
                  <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>&#3649;&#3612;&#3609; A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>&#3626;&#3656;&#3591;&#3624;&#3641;&#3609;&#3618;&#3660;</option>
              </select>-->
                      <input type="checkbox" name="chkCredit2" <?=($satype=="I"?"check":"")?> onClick="showHideNum(this,'txtCredit2')">
                   <?=$wording_lan["ewallet_29"]?></td>
                  <td><input type="text" name="txtCredit2" id="txtCredit2" size="10"  value="<?=$txtCredit2?>"></td>
                  <td><?=$wording_lan["ewallet_26"]?></td>
                  <td><input name="optionCredit2"   value="<?=$optionCredit2?>" type="text" size="100" ></td>
                </tr>
                <tr valign="top">
                  <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>&#3649;&#3612;&#3609; A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>&#3619;&#3633;&#3585;&#3625;&#3634;&#3618;&#3629;&#3604;</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>&#3626;&#3656;&#3591;&#3624;&#3641;&#3609;&#3618;&#3660;</option>
              </select>-->
                      <input type="checkbox" name="chkCredit3" <?=($satype=="I"?"check":"")?> onClick="showHideNum(this,'txtCredit3')">
                    <?=$wording_lan["ewallet_30"]?></td>
                  <td><input type="text" name="txtCredit3" id="txtCredit3" size="10"  value="<?=$txtCredit3?>"></td>
                  <td><?=$wording_lan["ewallet_26"]?></td>
                  <td><input name="optionCredit3"   value="<?=$optionCredit3?>" type="text" size="100" ></td>
                </tr>
              </table>
              <table border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="4" align="left"><?=$wording_lan["ewallet_31"]?> : <br>
                  <textarea name="txtoption" cols="100" rows="5"><?=$txtoption?>
                </textarea></td>
              </tr>

            </table>
        </td>
      </tr>
      <tr>
        <td id="sale" align="center">
        <?
        if(isset($_GET['id'])){
            $sql = "SELECT * FROM ".$dbprefix."asaled WHERE sano='".$_GET['id']."' ";
            $rs = mysql_query($sql);
            if(mysql_num_rows($rs)>0){
                $style_l = "border-left:1 solid #FFFFFF;";
                $style_t = "border-top:1 solid #000000;";
                $style_b = "border-bottom:1 solid #000000;";
                $style_bd = "border-bottom:1 dashed #000000;";
                $hidden = "border-left-width:0;border-right-width:0;border-top-width:0;border-bottom-width:0;";
                ?><table  border="0" width="500" cellpadding="0" cellspacing="0">
                    <tr align="center" bgcolor="#999999">
                        <td bgcolor="#99CCCC" style="<?=$style_l.$style_t.$style_b?>">&nbsp;</td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan["ewallet_8"]?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan["ewallet_9"]?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan["ewallet_10"]?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan["ewallet_11"]?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan["ewallet_12"]?></td>
                         <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan["ewallet_13"]?></td>
                          <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan["ewallet_14"]?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan["ewallet_15"]?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan["ewallet_16"]?></td>
                        <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan["ewallet_17"]?></td>
                         <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan["ewallet_18"]?></td>
                          <td style="<?=$style_l.$style_t.$style_b?>"><?=$wording_lan["ewallet_19"]?></td>
                    </tr>
                  <?
                $sumtotal = 0;
                $sumpv = 0;
                for($i=0;$i<mysql_num_rows($rs);$i++){
                    $proobj = mysql_fetch_object($rs);
                    ?>
                    <tr>
                        <td style="<?=$style_l.$style_bd?>"><input type="button" value="ลบ" onClick="saledel('<?=$proobj->pcode?>','<?=$proobj->pdesc ?>','<?=$proobj->price?>','<?=$proobj->pv?>','<?=$proobj->bv?>','<?=$proobj->fv?>')"></td>
                        <td style="<?=$style_l.$style_bd?>"><?=($i+1)?></td>
                        <td style="<?=$style_l.$style_bd?>" align="center"><input readonly style="text-align:center;<?=$hidden?>" size="7" type="text" name="pcode[]" value="<?=$proobj->pcode?>"></td>
                        <td style="<?=$style_l.$style_bd?>"><input size="13" readonly style="<?=$hidden?>" type="text" name="pdesc[]" value="<?=$proobj->pdesc?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="price[]" value="<?=$proobj->price?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="pv[]" value="<?=$proobj->pv?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="bv[]" value="<?=$proobj->bv?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="fv[]" value="<?=$proobj->fv?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input size="5" onkeyup='cal()' style='text-align:right;' type="text" name="qty[]" value="<?=$proobj->qty?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalprice[]" value="<?=($proobj->qty*$proobj->price)?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalpv[]" value="<?=($proobj->qty*$proobj->pv)?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalbv[]" value="<?=($proobj->qty*$proobj->bv)?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalfv[]" value="<?=($proobj->qty*$proobj->fv)?>"></td>
                    </tr>
                    <?
                    $sumtotal += ($proobj->qty*$proobj->price);
                    $sumpv += ($proobj->qty*$proobj->pv);
                    $sumbv += ($proobj->qty*$proobj->bv);
                    $sumfv += ($proobj->qty*$proobj->fv);
                }
                ?>
                    <tr bgcolor='#999999'>
                    <td style="<?=style_l.style_t.style_b?>" align='right' colspan='9'><?=$wording_lan["ewallet_32"]?></td>
                    <td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumtotal' value="<?=$sumtotal?>"></td>
                    <td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumpv' value="<?=$sumpv?>"></td>
                    <td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumbv' value="<?=$sumbv?>"></td>
                    <td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumfv' value="<?=$sumfv?>"></td>
                    </tr>
                    <tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='<?=$wording_lan["check"]?>' />&nbsp;<input type='submit' value='<?=$wording_lan["insert"]?>' name='ok'  id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick="window.location='index.php?sessiontab=6&sub=147'" value='<?=$wording_lan["cancel"]?>' /></td></tr>
                </table>
                <?
            }else
                dialogbox("100%","#990000",$wording_lan['w19'].$_GET['id'],"");
        }else{
            //dialogbox("100%","#009900","เลือกข้อมูลจากรายการสินค้า และแก้ไขจำนวนตามต้องการ","");
            ?> <input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='<?=$wording_lan["check"]?>' />&nbsp;<input type='submit' value='<?=$wording_lan["insert"]?>' name='ok'  id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick="window.location='index.php?sessiontab=6&sub=147'" value='<?=$wording_lan["cancel"]?>' /><?
        }
        ?>
        </td>
      </tr>
      <tr><td><div id="checkstate" align="center"></div>  </td></tr>
    </table>
    </td>
  </tr>
</table>
</form>


