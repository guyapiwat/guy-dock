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
					//document.getElementById("mname").innerHTML="ไม่ได้อยู่ในสายงาน";
					}else{
					//	alert(data);
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
					//	alert('a');
					//	document.getElementById("mcode").innerHTML="";}
					
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
							//alert('Ewallet ของท่านไม่เพียงพอ');
							//document.getElementById('ok').disabled=true;
							//document.getElementById('checkstate').innerHTML= '';
							
							//exit;
					}
			//alert(tott);
		//	if(parseFloat(document.getElementById('sumtotal').value)+parseFloat(document.getElementById('ajaxshipping').value)+parseFloat(document.getElementById('ajaxshipping').value) != tott){
			//	alert('ยอดเงิน '+tott+' บาท กรุณาเลือกวิธีชำระเงินให้ครบตามจำนวน');
			//	document.getElementById('ok').disabled=true;
			//	exit;
			//}
				//clicktab(3);
			//}
              //  alert("Server return: " + data);
        }
	function abc(){
		//alert(<?=$_SESSION["chkfree"]?>);
		//		var chkfree = '<?=$_SESSION["chkfree"]?>';
		//	if( chkfree != '1'){
				//alert('กรุณาเลือกสินค้าฟรี');
			//	document.getElementById("ok").disabled = true;
			//	clicktab(3);
		//	}
              //  alert("Server return: " + data);
        }
</script>
<script language="javascript">
var xmlHttp;
function ibillcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sadate').value;
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "วันที่";
	
	val = val + ","+document.getElementById('mcode').value;
	field = field +",mcode";
	flag = flag+",1-7-0-0-0";
	errDesc = errDesc + ",รหัสสมาชิก";

	if(document.getElementById('cprovince').value != '' && document.getElementById('ccheckr').value == '1'){
			document.getElementById('ok').disabled = true;document.getElementById('frm').target = '_blank';document.getElementById('frm').action='b.php'; 
			document.getElementById('frm').submit();
			setTimeout("checkUserName()",500);
			setTimeout("checkUserName1()",0);
	}else if(document.getElementById('ccheckr').value == '2'){
				
					if(<?=$_SESSION["ewallet"]?> < document.getElementById('sumtotal').value){
							//alert('Ewallet ของท่านไม่เพียงพอ');
							//document.getElementById('ok').disabled=true;
							//document.getElementById('showsend1').innerHTML='';
							//exit;
					}
	}

document.getElementById('frm').target = '_self';
document.getElementById('frm').action='saleatooperate.php?state=0';


		val = val + ","+document.getElementById('ccheckr').value;
		field = field +",ccheckr";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",กรุณาเลือกรูปแบบการจัดส่ง";

	if(document.getElementById('ccheckr').value == '1'){
		val = val + ","+document.getElementById('caddress').value;
		field = field +",caddress";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",กรุณาใส่ที่อยู่";

		val = val + ","+document.getElementById('cprovince').value;
		field = field +",cprovinceId";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",กรุณาเลือกจังหวัด";
		val = val + ","+document.getElementById('camphur').value;
		field = field +",camphurId";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",กรุณาเลือกอำเภอ";
		val = val + ","+document.getElementById('cdistrict').value;
		field = field +",cdistrictId";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",กรุณาเลือกตำบลห";

		val = val + ","+document.getElementById('czip').value;
		field = field +",czip";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",กรุณารหัสไปรษณีย์";
	}

/*	
	val = val + ","+document.getElementById('inv_code').value;
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสสาขา";
*/		
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"atoasaleh","checkstate");
}
function ebillcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sadate').value;
	var skipval = "";
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "วันที่";
	
	val = val + ","+document.getElementById('mcode').value;
	skipval = skipval+",";
	field = field +",mcode";
	flag = flag+",1-7-0-0-0";
	errDesc = errDesc + ",รหัสสมาชิก";

	if(document.getElementById('inv_code').value != ''){
		if(document.getElementById("inv_desc").innerHTML == ''){
			alert('กรุณากดค้นสาขา');
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
	startRQ(field,val,skipval,flag,errDesc,"atoasaleh","checkstate");
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
		place += "<td style='"+style_l+style_t+style_b+"'>ลำดับ</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รหัส</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รายละเอียด</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>ราคา</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>PV</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>จำนวน</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รวมราคา</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>รวมPV</td>";
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

		$sql = "SELECT * FROM ".$dbprefix."atoasaleh WHERE id='".$_GET['id']."'  LIMIT 1";
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
<form method="post" action="saleatooperate.php?state=<?=$_GET['id']==""?0:1?>" id="frm" name="frm"  onsubmit="return checkForm(this)" onKeyDown="document.getElementById('ok').disabled=true;" >
  <table border="0">
  <tr valign="top">
    <td>				
    <table width="625" border="0">
      <tr valign="top">
        <td><table border="1" width="100%" align="center">
            <tr>
              <td width="16%" nowrap="nowrap" align="right">รูปแบบการซื้อ</td>
            <td width="38%"><select name="satype" id="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>
                  <?=$wording_lan["word"]["sale_editadd"]["typea"]?>
                  </option>
              </select>
              <input type="hidden" value="<?=$_GET['id']?>" name="id"/></td>
            <td width="6%" align="right" nowrap="nowrap">&#3623;&#3633;&#3609;&#3607;&#3637;&#3656; Set Autoship</td>
            <td width="40%"><input type="text" id="sadate" name="sadate" readonly="" value="<?=$sadate==""?date("Y-m-d"):$sadate?>">
              <a href="javascript:NewCal('sadate','yyyymmdd',false,24)"><img style="display:none" src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a>            </td>
            </tr>
            <tr valign="top">
              <td align="right">&#3619;&#3627;&#3633;&#3626;&#3626;&#3617;&#3634;&#3594;&#3636;&#3585;</td>
              <td nowrap="nowrap"><input style="background-color:#FFFF99" size="15" type="text" id="mcode" name="mcode" value="<?=$mcode?>">
                <input name="button2" type="button" onClick="sendget_sponsor(document.getElementById('mcode').value)" value="ตกลง" /><div id="mname"></div> </td>
              <td align="right" nowrap="nowrap">Autoship &#3607;&#3640;&#3585;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;</td>
              <td><select name="selectdate" id="selectdate">
                  <?					
						//for ($i=1;$i<=28;$i++){
						//	echo "<option value=\"".$i."\" ";
						//	echo ">".$i."</option>";
						//}
						?>
						<option value=5>5</option><option value=20>20</option>

                </select><a href="javascript:NewCal('sadate','yyyymmdd',false,24)"><img style="display:none" src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="&#3648;&#3621;&#3639;&#3629;&#3585;&#3623;&#3633;&#3609;&#3607;&#3637;&#3656;"></a> </td>
            </tr>
            <tr valign="top">
              <td width="16%" align="right">&nbsp;</td>
              <td nowrap="nowrap"><!--<input type="button" onClick="get_mem_listpicker_mcode()" value="เลือก">--></td>
              <td colspan="2" align="left" valign="top" nowrap="nowrap"><input checked="checked" type="radio" name="radsend" value="1" onClick="document.getElementById('inv_code').disabled = true;document.getElementById('ccheckr').value = '1';document.getElementById('inv_code').value = '';" <?=($radsend=="1"?"checked":"")?>>
&#3592;&#3633;&#3604;&#3626;&#3656;&#3591;
<input type="radio" name="radsend" value="2"  onClick="document.getElementById('inv_code').disabled = false;document.getElementById('ccheckr').value = '2';"  <?=($radsend=="2"?"checked":"")?> >
&#3652;&#3617;&#3656;&#3592;&#3633;&#3604;&#3626;&#3656;&#3591;<br>
&#3619;&#3633;&#3610;&#3607;&#3637;&#3656;&#3626;&#3634;&#3586;&#3634;
<select size="1" name="inv_code" id="inv_code"  disabled="disabled">
  <option value="">สำนักงานใหญ่</option>
  <?					
						$result1=mysql_query("select * from ".$dbprefix."invent order by inv_code");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->inv_code."\" ";
							if ("BKK1"==$row1->inv_code) {echo "selected";}
							echo ">".$row1->inv_desc."</option>";
						}
						?>
</select>
<input style="background-color:#FFFF99;display:none" size="15" readonly="" type="text" id="inv_code1" name="inv_code1" value="<?=$inv_code?>">
              <!--  <input style="display:none" name="button3" type="button"  onclick="sendget_invent(document.getElementById('inv_code').value)" value="ค้น" />-->
                <input style="display:none" type="button" onClick="get_mem_listpicker_invcode()" value="เลือก"  >                <div id="inv_desc" name="inv_desc"></div></td>
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
		if(!empty($_GET['id'])){
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
                        <td style="<?=$style_l.$style_t.$style_b?>">ลำดับ</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">รหัส</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">รายละเอียด</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">ราคา</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">PV</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">จำนวน</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">รวมราคา</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">รามPV</td>
                    </tr>
  				<?
				$sumtotal = 0;
				$sumpv = 0;
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$proobj = mysql_fetch_object($rs);
					?>
					<tr>
                        <td style="<?=$style_l.$style_bd?>"><input  type="button" value="ลบ" onClick="saledel('<?=$proobj->pcode?>','<?=$proobj->pdesc ?>','<?=$proobj->price?>','<?=$proobj->pv?>')"></td>
                    	<td style="<?=$style_l.$style_bd?>"><?=($i+1)?></td>
                        <td style="<?=$style_l.$style_bd?>" align="center"><input readonly style="text-align:center;<?=$hidden?>" size="7" type="text" name="pcode[]" value="<?=$proobj->pcode?>"></td>
                        <td style="<?=$style_l.$style_bd?>"><input size="13" readonly style="<?=$hidden?>" type="text" name="pdesc[]" value="<?=$proobj->pdesc?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="price[]" value="<?=$proobj->price?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="pv[]" value="<?=$proobj->pv?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input size="5" onkeyup='cal()' style='text-align:right;' type="text" name="qty[]" value="<?=$proobj->qty?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalprice[]" value="<?=($proobj->qty*$proobj->price)?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="totalpv[]" value="<?=($proobj->qty*$proobj->pv)?>"></td>

                    </tr>
					<?
					$sumtotal += ($proobj->qty*$proobj->price);
					$sumpv += ($proobj->qty*$proobj->pv);
				}
				?>
					<tr bgcolor='#999999'>
					<td style="<?=style_l.style_t.style_b?>" align='right' colspan='7'>รวม</td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumtotal' id='sumtotal' value="<?=$sumtotal?>"></td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" id='sumpv' name='sumpv' value="<?=$sumpv?>"></td>
					</tr>
					<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='ตรวจสอบ' />&nbsp;<input type='submit' value='บันทึก' name='ok'  id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick="window.location='index.php?sessiontab=3&sub=6'" value='ยกเลิก' /></td></tr>
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
	  <tr><td align=center><div id="checkstate" align="center"></div>   <div id="showsend1" align="center"> </div><font color="#FF0000">ในการสั่งซื้อ สินค้า ระบบจะตัดเงินจาก Ewallet เท่านั้น</font></td></tr>
    </table>    <table border="1" width="100%" >
              
              <tr valign="top">

                <td colspan="4"><table style="display:none"><tr><td><input type="checkbox" name="chkCash" <?=($chkCash=="on"?"checked":"")?> onClick="showHideNum(this,'txtCash')">  
                  เงินสด                    </td>
                <td><input type="text" name="txtCash" id="txtCash" size="5"  value="<?=$txtCash?>"></td>
                <td>รายละเอียด </td>
                <td><input name="optionCash" type="text" value="<?=$optionCash?>" size="60"  >                </td>
              </tr>
              <tr valign="top">
              <td>
                <input type="checkbox" name="chkFuture" <?=($chkFuture=="on"?"checked":"")?> onClick="showHideNum(this,'txtFuture')">
                เงินรับล่วงหน้า</td>
              <td><input type="text" name="txtFuture" id="txtFuture" size="5"  value="<?=$txtFuture?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionFuture"   value="<?=$optionFuture?>" type="text" size="60" ></td>
              </tr>
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkTransfer" <?=($chkTransfer=="on"?"checked":"")?> onClick="showHideNum(this,'txtTransfer')">
                เงินโอน</td>
              <td><input type="text" name="txtTransfer" id="txtTransfer" size="5"  value="<?=$txtTransfer?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionTransfer"   value="<?=$optionTransfer?>" type="text" size="60" ></td>
              </tr>
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkCredit1" <?=($chkCredit1=="on"?"checked":"")?> onClick="showHideNum(this,'txtCredit1')"> บัตรเครดิต 1</td>
              <td><input type="text" name="txtCredit1" id="txtCredit1" size="5"  value="<?=$txtCredit1?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionCredit1"   value="<?=$optionCredit1?>" type="text" size="60" ></td>
              </tr>
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkCredit2" <?=($chkCredit2=="on"?"checked":"")?> onClick="showHideNum(this,'txtCredit2')">
บัตรเครดิต 2</td>
              <td><input type="text" name="txtCredit2" id="txtCredit2" size="5"  value="<?=$txtCredit2?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionCredit2"   value="<?=$optionCredit2?>" type="text" size="60" ></td>
              </tr>
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkCredit3" <?=($chkCredit3=="on"?"checked":"")?> onClick="showHideNum(this,'txtCredit3')">
บัตรเครดิต 3</td>
              <td><input type="text" name="txtCredit3" id="txtCredit3" size="5"  value="<?=$txtCredit3?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionCredit3"   value="<?=$optionCredit3?>" type="text" size="60" ></td>
              </tr>
              <tr  style="display:none" valign="top">
              <td>
                <input type="checkbox" name="chkCredit3" <?=($chkInternet=="on"?"checked":"")?> onClick="showHideNum(this,'txtInternet')">
                Ewallet</td>
              <td><input type="text" name="txtInternet" id="txtInternet" size="5"  value="<?=$txtInternet?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionInternet"   value="<?=$optionInternet?>" type="text" size="60" ></td>
              </tr>
              <tr valign="top">
              <td>
                <input type="checkbox" name="chkDiscount" <?=($chkDiscount=="on"?"checked":"")?> onClick="showHideNum(this,'txtDiscount')">
                Voucher </td>
              <td><input type="text" name="txtDiscount" id="txtDiscount" size="5"  value="<?=$txtDiscount?>"></td>
              <td>รายละเอียด</td>
               <td><input name="optionDiscount"   value="<?=$optionDiscount?>" type="text" size="60" ></td>
              </tr>
                <tr valign="top">
                  <td><input type="checkbox" name="chkOther" <?=($chkOther=="on"?"checked":"")?> onClick="showHideNum(this,'txtOther')">
                    &#3629;&#3639;&#3656;&#3609;&#3654;</td>
                  <td><input type="text" name="txtOther" id="txtOther" size="5"  value="<?=$txtOther?>"></td>
                  <td>&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;</td>
                  <td><input name="optionOther"   value="<?=$optionOther?>" type="text" size="60" ></td></tr></table></td>
                </tr>
                <tr valign="top">
                  <td colspan="4" ><table width="100%"> <tr valign="top" bgcolor="#FFCC33">
                  <td colspan="4"><b>&#3585;&#3619;&#3629;&#3585;&#3586;&#3657;&#3629;&#3617;&#3641;&#3621;&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;&#3626;&#3635;&#3627;&#3619;&#3633;&#3610;&#3592;&#3633;&#3604;&#3626;&#3656;&#3591;&#3651;&#3627;&#3617;&#3656; &#3627;&#3619;&#3639;&#3629;
                      <input type="checkbox" name="chkaddress" id="chkaddress" onClick="checkaddress(document.getElementById('mcode').value)" value="1"  tabindex="34" />
                  &#3626;&#3656;&#3591;&#3626;&#3636;&#3609;&#3588;&#3657;&#3634;&#3605;&#3634;&#3617;&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;&#3607;&#3637;&#3656;&#3652;&#3604;&#3657;&#3649;&#3592;&#3657;&#3591;&#3652;&#3623;&#3657;&#3585;&#3633;&#3610;&#3610;&#3619;&#3636;&#3625;&#3633;&#3607;&#3631;</b></td>
                </tr>
				<tr><td>
				<div id="idchksaddress">
				<table>
				<tr valign="top">
                        <td colspan="2" align="right">&#3607;&#3637;&#3656;&#3629;&#3618;&#3641;&#3656;</td>
                        <td colspan="2"><textarea name="caddress" id="caddress" cols="50" rows="3" tabindex="14"><?=$caddress?></textarea></td>
                      </tr>
                    <tr valign="top">
                  <td colspan="2" align="right">&nbsp;</td>
                  <td colspan="2"><? 
		if($cprovinceId==""){
			include("cthaiaddress.php");

		}else{
			include("cthaiaddressShow.php");

		}
	?></td>
                </tr>
                
                <tr valign="top">
                  <td height="29" colspan="2" align="right">&#3619;&#3627;&#3633;&#3626;&#3652;&#3611;&#3619;&#3625;&#3603;&#3637;&#3618;&#3660;</td>
                  <td colspan="2"><input name="czip" tabindex="18" type="text" id="czip" value="<?=$czip?>" /></td>
                </tr>
				</table>
				</div>
				</td></tr>
                      </table></td>
                </tr>
               
        </table>
    <Br>
              หมายเหตุ : <br>
                <textarea name="txtoption" cols="100" rows="5"><?=$txtoption?></textarea>
    </td>
    <td><iframe width="400" height="400" frameborder="0" src="./product_ato.php" ></iframe>
	<br><Br></td>
  </tr>
</table>
  <br>
</form>


  <input  type="hidden" id="ccaddress" name="ccaddress">
  <input  type="hidden" id="ccprovinceId" name="ccprovinceId">
  <input  type="hidden" id="ccdistrictId" name="ccdistrictId">
  <input  type="hidden" id="ccamphurId" name="ccamphurId">
  <input  type="hidden" id="cczip" name="cczip">
  <input  type="hidden" id="ccheckr" name="ccheckr" value="1">
  <input  type="hidden" id="ajaxshipping" name="ajaxshipping" value="0">
