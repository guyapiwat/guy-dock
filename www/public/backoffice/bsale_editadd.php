<?
$_SESSION["perbuy"] = 1;
?>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<!--<script type="text/javascript"> 
var wait_time=300;  // กำหนดเวลานับถอยหลัง เป็นวินาที  
window.onload=function(){  
    var vela=setInterval("decrease_num()",1000);  
    setTimeout("clearInterval("+vela+")",(wait_time+1)*1000);  
}  
function decrease_num(){  
    if(wait_time>0){  
    var show_place=document.getElementById('show_text');  
    show_place.innerHTML="<font color='#FF0000'><b>เหลือเวลาในการสั่งซื้อ "+wait_time+" วินาที</b></font>";  
    wait_time = wait_time-1;  
    }else{  
        if(wait_time==0){  
            alert("หมดเวลา ");   // คำสั่งหลังจากนับถอยหลังถึง 0 แล้ว  
window.location="index.php"
//   window.location.href ="http://www.sadung.com"; //ไปยัง url ที่ต้องการ
        }     
    }  
}  
</script> 
<Script Language="JavaScript">
///ตัวเลข 10000 มีค่าเท่ากับ 10 วินาทีครับ
function next() 
{
	  alert("หมดเวลา ");  
window.location="index.php"
}
self.setTimeout('next()', 300000)

</Script>-->
<script type="text/javascript">
function chknum(key){
	if(key>=48&&key<=57)
		return true;
	else
		return false;
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
     req.open('GET', 'search_member.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('mcode').value="";
					document.getElementById("mname").innerHTML="ไม่ได้อยู่ในสายงาน";
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
function sendget_invent(value) {
     var req = Inint_AJAX(); //สร้าง Object
	// alert(value)
	//value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_invent_ewallet.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
			//		alert(req.responseText);
					if(data == 1234){
					document.getElementById('inv_code').value="";
					//document.getElementById("ewallet").value="0";
					document.getElementById("ok").disabled=true;
					}else{
					//	alert(req.responseText);
					document.getElementById('inv_code').value=value;
                  //  document.getElementById("ewallet").value=data; //แสดงผล
					//if(parseFloat(data) < parseFloat(document.getElementById('sumtotal').value)){
						document.getElementById("ok").disabled=false;
					//}
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
	var val = document.getElementById('sadate').value;
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "วันที่";
	
	val = val + ","+document.getElementById('mapping_code').value;
	field = field +",mapping_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",เลือกสาเหตุเบิกสินค้า";
	
	if(parseFloat(document.getElementById('ewallet').value) < parseFloat(document.getElementById('sumtotal').value)){
	//	alert('Ewallet ท่านไม่เพียงพอ');
	//	exit;
	}
	//val = val + ","+document.getElementById('inv_code').value;
	//field = field +",inv_code";
	//flag = flag+",1-0-0-0-0";
	//errDesc = errDesc + ",รหัสสาขา";
		
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"isaleh","checkstate");
}
function ebillcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sadate').value;
	var skipval = "";
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "วันที่";
/*	
	val = val + ","+document.getElementById('mcode').value;
	skipval = skipval+",";
	field = field +",mcode";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสสมาชิก";
*/	
	val = val + ","+document.getElementById('inv_code').value;
	skipval = skipval+",";
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสสาขา";

	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);
	startRQ(field,val,skipval,flag,errDesc,"isaleh","checkstate");
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
		var sumbv=0;
		var sumfv=0;
			var skip = 45;
		var bgskip = 10; //fix
		for(i=0;i<(tag.length-skip)/13;i++){
			step = i*13+bgskip;
			//step++;
			//alert(step);
			price = parseFloat(tag[step+1].value);
			pv = parseFloat(tag[step+2].value);
			bv = parseFloat(tag[step+3].value);
			fv = parseFloat(tag[step+4].value);
			num = parseFloat(tag[step+5].value);
			if(num>parseFloat(tag[step+6].value)){
				num = parseFloat(tag[step+6].value);
				alert("จำนวนสินค้ามีไม่เพียงพอ");
				tag[step+5].value = num;
			}
			tag[step+7].value = num * price;
			tag[step+8].value = num * pv;
			tag[step+9].value = num * bv;
			tag[step+10].value = num * fv;
			//document.getElementById('sumtotal').value=sumtotal;
			//document.getElementById('sumpv').value=sumpv;
			//alert(num +" " + pv +" "+ price);
			sumtotal = sumtotal + (price*num);
			sumpv = sumpv + (pv*num);
			sumbv = sumbv + (bv*num);
			sumfv = sumbv + (fv*num);
			//alert(sumtotal+ " " + price + " " + num);
		}
		document.getElementById('sumtotal').value=sumtotal;
		document.getElementById('sumpv').value=sumpv;
		document.getElementById('sumbv').value=sumbv;
		document.getElementById('sumfv').value=sumfv;
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font>";
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
		var skip = 45;
		var bgskip = 9; //fix
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
		var style_none = "display:none;";
		/*if(window.parent.document.getElementById('sale').innerHTML==""){
			window.parent.document.getElementById('sale').innerHTML = "";
		}*/
		tag = window.parent.document.frm.getElementsByTagName('input');
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;คลิกตรวจสอบเพื่อทำการตรวจสอบข้อมูล&nbsp; </font>";
		//alert(tag.length);
		place = "<table border='0' width='500' cellpading='0' cellspacing='0'>";
		place += "<tr align='center' bgcolor='#999999'>";
		place += "<td bgcolor='#99CCCC' style='"+style_l+style_t+style_b+"'>&nbsp;</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>ลำดับ</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รหัส</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รายละเอียด</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>ราคา</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>PV</td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"'>BV</td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"'>FV</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>จำนวน</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รวมราคา</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รวมPV</td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"'>รวมBV</td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"'>รวมFV</td>";
		place += "</tr>";
		for(i=0;i<(tag.length-skip)/13;i++,l++){
			step = i*13+bgskip;
			//step++;
			if(pcode == tag[i*13 +bgskip].value){
				l--;
				continue;
			}
			
			place += "<tr>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ลบ' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (l+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly style='"+hidden+ "text-align:center;' type='text' name='pcode[]' value='" + tag[step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly style='"+hidden+ "' type='text' name='pdesc[]' value='" + tag[++step].value + "'></td>";
			price = parseFloat(tag[++step].value);
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='price[]' value='" + price + "'></td>";
			pv = parseFloat(tag[++step].value);
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='pv[]' value='" + pv + "'></td>";
			bv = parseFloat(tag[++step].value);
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='bv[]' value='" + bv + "'></td>";
			fv = parseFloat(tag[++step].value);
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='fv[]' value='" + fv + "'></td>";
			num = parseFloat(tag[++step]. value);
			//alert(num);
			place += "<td style='"+style_l+style_bd+"' align='right'><input style='text-align:right;' name='qty[]'  onkeyup='cal()' type='text' size='5' value='" + num + "'></td>";
			place += "<input type='hidden' name='lmqty[]' value='" + tag[++step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalprice[]' value='" + (price*num) + "'></td>";
			//place += "</tr>";
			sumtotal = sumtotal + (price*num);
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalpv[]' value='" + (pv*num) + "'></td>";
			sumpv = sumpv + (pv*num);
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalbv[]' value='" + (bv*num) + "'></td>";
			sumbv = sumbv + (bv*num);
			place += "<td style='"+style_l+style_bd+style_none+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='totalfv[]' value='" + (fv*num) + "'></td>";
			sumfv = sumfv + (fv*num);

			place += "</tr>";
		}
		//alert(window.parent.document.mainsale.getElementsByTagName('input').length);
		//alert(sumtotal);
		place += "<tr bgcolor='#999999'>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='7'>รวม</td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumtotal' id='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumpv' value='" + sumpv + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumbv' value='" + sumbv + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+style_none+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumfv' value='" + sumfv + "'></td>";
		place += "</tr>";
		//place += "<tr><td colspan='9' align='right'><input type='submit' value='บันทึก'></td></tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='ตรวจสอบ' />&nbsp;<input type='submit' value='บันทึก' name='ok' id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=21'\" value='ยกเลิก' /></td></tr>";
		place += "</table>";
		//alert(place);
		window.parent.document.getElementById('sale').innerHTML = place;
		tag = window.parent.document.frm.getElementsByTagName('input');
		if(tag.length-skip<8){
			window.parent.document.getElementById('sale').innerHTML = "<table width='500' bgcolor='#009900'><tr><td align='center'><font color='#FFFFFF'>เลือกข้อมูลสอนค้าจากตารางขวามือ แล้วแก้ไขจำนวนตามต้องการ</font></td></tr></table>";
		}
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
</script> 
</head>

<body>
<span id="show_text"></span> 

<?
if($_GET["cmc"])$mcode = $_GET["cmc"];
if(isset($_GET['id'])){
		$sql = "SELECT * FROM ".$dbprefix."isaleh WHERE id='".$_GET['id']."' LIMIT 1";
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
			$mapping_code = mysql_result($rs,0,'mapping_code');
			//$inv_desc = mysql_result($rs,0,'inv_desc');
			//$mname = mysql_result($rs,0,'name_t');
			mysql_free_result($rs);
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

if(empty($rccode))$rccode = $_SESSION['rccode'];
//var_dump($_SESSION['rccode']);
?>
<form method="post" action="bsaleoperate.php?state=<?=$_GET['id']==""?0:1?>" name="frm" onsubmit="return checkForm(this)" onKeyDown="document.getElementById('ok').disabled=true;">
  <table border="0">
  <tr valign="top">
    <td>
    <table width="600" border="0">
      <tr valign="top">
        <td>
            <table border="1" width="100%" align="center">
            <tr>
              <td width="16%" align="right">เลขบิล</td>
            <td width="20%">
			<? 
				$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."isaleh ";
				$rs = mysql_query($sql);
				echo ($_GET['id']==""?mysql_result($rs,0,'id')+1:$_GET['id']);
				mysql_free_result($rs);
			?> <input type="hidden" value="<?=$_GET['id']?>" name="id"/></td>
            <td width="5%" align="right">วันที่</td>
            <td width="59%"><input type="text" id="sadate" name="sadate" value="<?=$sadate==""?date("Y-m-d"):$sadate?>" >
             <a href="javascript:NewCal('sadate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a>            </td>
            </tr>
            <tr valign="top" style="display:none">
              <td width="16%" align="right">&nbsp;</td>
              <td><input style="background-color:#FFFF99;display:none" readonly size="15" type="text" id="mcode" name="mcode" value="<?=$mcode?>">
                <input type="button" style="display:none" onClick="get_mem_listpicker_mcode()" value="เลือก"><div id="mname"></div> </td>
              <td align="right">&#3627;&#3609;&#3656;&#3623;&#3618;&#3591;&#3634;&#3609;</td>
              <td><input style="background-color:#FFFF99"  size="15" type="text" id="inv_code" name="inv_code" value="<?=$inv_code?>">
                <input name="button3" type="button"  onclick="sendget_invent(document.getElementById('inv_code').value)" value="ค้น" />
               
                 <input type="text"  style="display:none" id="ewallet" name="ewallet" readonly  value="0">                    <div id="inv_desc"></div></td>
            </tr>            
            <tr valign="top">
              <td align="right">&#3627;&#3609;&#3656;&#3623;&#3618;&#3591;&#3634;&#3609;</td>
              <td colspan="3"><select name="rccode" id="rccode">
                <?					
					$result1=mysql_query("select * from ".$dbprefix."rccode ");
						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->rccode."\" ";
							if ($rccode==$row1->rccode) {echo "selected";}
							echo ">".$row1->rccode_desc."</option>";
						}
						?>
              </select></td>
            </tr>
            <tr valign="top">
              <td align="right">&#3627;&#3617;&#3634;&#3618;&#3648;&#3627;&#3605;&#3640;&nbsp;</td>
              <td colspan="3"><select name="mapping_code" id="mapping_code">
             <option  value="" <?=($mapping_code==""?"selected":"")?>>เลือกสาเหตุการเบิกสินค้า</option>
<?					
					$result1=mysql_query("select * from ".$dbprefix."inventory_order where Mapping_type = 'BSALE' ");
						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->Mapping_Code."\" ";
							if ($mapping_code==$row1->Mapping_Code) {echo "selected";}
							echo ">".$row1->MLM_Inv_Type."</option>";
						}
						?>
    </select>
                <input style="display:none" type="radio" name="radsend" value="1" <?=($radsend=="1"?"checked":"")?>>                
                <!-- <input type="radio" name="radsend" value="2" <?=($radsend=="2"?"checked":"")?> >ไม่จัดส่ง--></td>
              </tr>
            <tr>
              <td colspan="4" align="left">          </td>
              </tr>
            </table>
    	</td>
      </tr>
      <tr>
        <td id="sale" align="center">
        <?
		if(isset($_GET['id'])){
			$sql = "SELECT * FROM ".$dbprefix."isaled WHERE sano='".$_GET['id']."' ";
			$rs = mysql_query($sql);
			if(mysql_num_rows($rs)>0){
				$style_l = "border-left:1 solid #FFFFFF;";
				$style_t = "border-top:1 solid #000000;";
				$style_b = "border-bottom:1 solid #000000;";
				$style_bd = "border-bottom:1 dashed #000000;";
				$hidden = "border-left-width:0;border-right-width:0;border-top-width:0;border-bottom-width:0;";
				$style_none = "display:none;";
				?><table  border="0" width="500" cellpadding="0" cellspacing="0">
					<tr align="center" bgcolor="#999999">
                    	<td bgcolor="#99CCCC" style="<?=$style_l.$style_t.$style_b?>">&nbsp;</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">ลำดับ</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">รหัส</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">รายละเอียด</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">ราคา</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">PV</td>
						 <td style="<?=$style_l.$style_t.$style_b.$style_none?>">BV</td>
						  <td style="<?=$style_l.$style_t.$style_b.$style_none?>">FV</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">จำนวน</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">รวมราคา</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">รามPV</td>
						 <td style="<?=$style_l.$style_t.$style_b.$style_none?>">รามBV</td>
						  <td style="<?=$style_l.$style_t.$style_b.$style_none?>">รามFV</td>
                    </tr>
  				<?
				$sumtotal = 0;
				$sumpv = 0;
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$proobj = mysql_fetch_object($rs);
					?>
					<tr>
                        <td  style="<?=$style_l.$style_bd?>"><!--<input type="button" value="ลบ" onClick="saledel('<?=$proobj->pcode?>','<?=$proobj->pdesc ?>','<?=$proobj->price?>','<?=$proobj->pv?>','<?=$proobj->bv?>','<?=$proobj->fv?>')">--></td>
                    	<td style="<?=$style_l.$style_bd?>"><?=($i+1)?></td>
                        <td style="<?=$style_l.$style_bd?>" align="center"><input readonly style="text-align:center;<?=$hidden?>" size="7" type="text" name="pcode[]" value="<?=$proobj->pcode?>"></td>
                        <td style="<?=$style_l.$style_bd?>"><input size="13" readonly style="<?=$hidden?>" type="text" name="pdesc[]" value="<?=$proobj->pdesc?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="price[]" value="<?=$proobj->price?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="pv[]" value="<?=$proobj->pv?>"></td>
						<td style="<?=$style_l.$style_bd.$style_none?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="bv[]" value="<?=$proobj->bv?>"></td>
						<td style="<?=$style_l.$style_bd.$style_none?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="fv[]" value="<?=$proobj->fv?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input size="5" onkeyup='cal()' style='text-align:right;' type="text" name="qty[]" value="<?=$proobj->qty?>" ></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalprice[]" value="<?=($proobj->qty*$proobj->price)?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalpv[]" value="<?=($proobj->qty*$proobj->pv)?>"></td>
						<td style="<?=$style_l.$style_bd.$style_none?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalbv[]" value="<?=($proobj->qty*$proobj->bv)?>"></td>
						<td style="<?=$style_l.$style_bd.$style_none?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalfv[]" value="<?=($proobj->qty*$proobj->fv)?>"></td>
                    </tr>
					<?
					$sumtotal += ($proobj->qty*$proobj->price);
					$sumpv += ($proobj->qty*$proobj->pv);
					$sumbv += ($proobj->qty*$proobj->bv);
					$sumfv += ($proobj->qty*$proobj->fv);
				}
				?>
					<tr bgcolor='#999999'>
					<td style="<?=style_l.style_t.style_b?>" align='right' colspan='7'>รวม</td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumtotal' value="<?=$sumtotal?>"></td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumpv' value="<?=$sumpv?>"></td>
					<td style="<?=style_l.style_t.style_b.$style_none?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumbv' value="<?=$sumbv?>"></td>
					<td style="<?=style_l.style_t.style_b.$style_none?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumfv' value="<?=$sumfv?>"></td>
					</tr>
					<tr style="display:none"><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='ตรวจสอบ' />&nbsp;<input type='submit' value='บันทึก' name='ok'  id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick="window.location='index.php?sessiontab=3&sub=28'" value='ยกเลิก' /></td></tr>
                </table>
				<?
			}else
				dialogbox("100%","#990000","ไม่พบรายการสินค้าของบิลเลขที่ ".$_GET['id'],"");
        }else{
			dialogbox("100%","#009900","เลือกข้อมูลจากรายการสินค้า และแก้ไขจำนวนตามต้องการ","");
		}
		?>
    	</td>
      </tr>
	  <tr><td><div id="checkstate" align="center"></div>  </td></tr>
    </table>    <table border="1" width="100%" style="display:none">
              
              <tr valign="top">
                <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>แผน A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>รักษายอด</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>ส่งศูนย์</option>
              </select>--><input type="checkbox" name="chkCash" <?=($chkCash=="on"?"checked":"")?>>
                  เงินสด                    </td>
                <td><input type="text" name="txtCash" size="10"  value="<?=$txtCash?>"></td>
                <td>รายละเอียด </td>
                <td><input name="optionCash" type="text" value="<?=$optionCash?>" size="70"  >
                </td>
              </tr>
              <tr valign="top">
              <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>แผน A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>รักษายอด</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>ส่งศูนย์</option>
              </select>-->
                <input type="checkbox" name="chkFuture" <?=($chkFuture=="on"?"checked":"")?>>
                เงินรับล่วงหน้า</td>
              <td><input type="text" name="txtFuture" size="10"  value="<?=$txtFuture?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionFuture"   value="<?=$optionFuture?>" type="text" size="70" ></td>
              </tr>
               <tr valign="top">
              <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>แผน A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>รักษายอด</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>ส่งศูนย์</option>
              </select>-->
                <input type="checkbox" name="chkTransfer" <?=($chkTransfer=="on"?"checked":"")?>>
                เงินโอน</td>
              <td><input type="text" name="txtTransfer" size="10"  value="<?=$txtTransfer?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionTransfer"   value="<?=$optionTransfer?>" type="text" size="70" ></td>
              </tr>
               <tr valign="top">
              <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>แผน A</option>
                <option value="Q" <?=($satype=="Q"?"selected":"")?>>รักษายอด</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>ส่งศูนย์</option>
              </select>-->
                <input type="checkbox" name="chkCredit1" <?=($chkCredit1=="on"?"checked":"")?>>
                บัครเครดิต1</td>
              <td><input type="text" name="txtCredit1" size="10"  value="<?=$txtCredit1?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionCredit1"   value="<?=$optionCredit1?>" type="text" size="70" ></td>
              </tr>
               <tr valign="top">
              <td><!--<select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>แผน A</option>

                <option value="Q" <?=($satype=="Q"?"selected":"")?>>รักษายอด</option>
              <option value="I" <?=($satype=="I"?"selected":"")?>>ส่งศูนย์</option>
              </select>-->
                <input type="checkbox" name="chkCredit2" <?=($chkCredit2=="on"?"checked":"")?>>
                บัครเครดิต2</td>
              <td><input type="text" name="txtCredit2" size="10"  value="<?=$txtCredit2?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionCredit2"   value="<?=$optionCredit2?>" type="text" size="70" ></td>
              </tr>
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkCredit3" <?=($chkCredit3=="on"?"checked":"")?>>
                บัครเครดิต3</td>
              <td><input type="text" name="txtCredit3" size="10"  value="<?=$txtCredit3?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionCredit3"   value="<?=$optionCredit3?>" type="text" size="70" ></td>
              </tr>
              <tr valign="top">
              <td>
                <input type="checkbox" name="chkCredit3" <?=($chkInternet=="on"?"checked":"")?>>
                Ewallet</td>
              <td><input type="text" name="txtInternet" size="10"  value="<?=$txtInternet?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionInternet"   value="<?=$optionInternet?>" type="text" size="70" ></td>
              </tr>
              <tr valign="top">
              <td>
                <input type="checkbox" name="chkDiscount" <?=($chkDiscount=="on"?"checked":"")?>>
                ส่วนลดบิลขาย</td>
              <td><input type="text" name="txtDiscount" size="10"  value="<?=$txtDiscount?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionDiscount"   value="<?=$optionDiscount?>" type="text" size="70" ></td>
              </tr>
                <tr valign="top">
              <td>
                <input type="checkbox" name="chkOther" <?=($chkOther=="on"?"checked":"")?>>
                อื่นๆ</td>
              <td><input type="text" name="txtOther" size="10"  value="<?=$txtOther?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionOther"   value="<?=$optionOther?>" type="text" size="70" ></td>
              </tr>
              </table><Br>
              หมายเหตุ : <br>
                <textarea name="txtoption" cols="100" rows="5"><?=$txtoption?></textarea>
    </td>
	<td><? include("product_tab4.php"); ?>
    <!--<iframe width="400" height="300" frameborder="0" src="./product_show4.php" ></iframe>
	<br><Br>
    <iframe width="400" height="200" frameborder="0"  src="./package_show2.php" ></iframe>--></td>
  </tr>
</table>
</form>


