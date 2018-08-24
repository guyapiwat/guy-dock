<?
$_SESSION["perbuy"] = 1;
$_SESSION["sessiontab"] = $_GET['sessiontab'];
$_SESSION["sub"] = $_GET['sub'];
$_SESSION["chktype"] = $_GET['chktype'];
$_SESSION["page"] = $_GET['page'];
$_SESSION["send"] = $_GET['send'];


?>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP"); } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest(); } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported")
   return null
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
function add_product(value,value1,key) {
	//alert('s');
	if(key == 13){
		if(document.getElementById("array_serial").value.indexOf(value) == '-1'){
			document.getElementById("aproductddd").value = '';
			 var req = Inint_AJAX(); //สร้าง Object
			// req.open('GET', 'add_product_ajax.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
			 req.open('GET', 'add_product_stockist_ajax.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
			 req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
				  if (req.readyState==4) {
					   if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
							var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
						//	alert(req.responseText);
							//alert(data);
							if(data == 1234){
								 document.getElementById("aproductddd").value=''; //แสดงผล
								exit;
							}else{
								//alert(data);
								var myArray = data.split(':');
								holdadd1(myArray[5],myArray[1],myArray[2],myArray[3],myArray[4],myArray[7]);			
								document.getElementById("aproductddd").value=''; //แสดงผล
								exit;
							}
					   }
				  }
			 };
			 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
			 req.send(null); //ทำการส่ง
		}
	}
}
	function holdadd1(pcode,pdesc,price,pv,qty,serial){
		var place;
		var step;
		//var serial;
		var skip = 12; //--
		var bgskip = 8; //fix
		var sumpv = 0;
		var sumtotal = 0;
		var out = true;
		var qp=0;
		var i=0;
		var num;
	//	var_dump(serial);
	//	exit;
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
		for(i=0;i<(tag.length-skip)/9;i++){
			showprice = 0;
			showpv = 0;
			step = i*9+bgskip;
			place += "<tr>";
			place += "<td style='"+style_l+style_bd+"' align='center'>"
			place += "<input type='button' value='ลบ' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (i+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly type='text' style='text-align:center;"+hidden+ "' name='pcode[]' value='" + tag[step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + tag[++step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='"+hidden+ "text-align:right;' name='price[]' value='" + tag[++step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='"+hidden+ "text-align:right;' name='pv[]' value='" + tag[++step].value + "'></td>";
			num = parseInt(tag[++step]. value);
			//alert(num);

			if(pcode == tag[i*9 +bgskip].value){
				out = false;
				qp=1;
				if(num<qty){
					num+=qp;
					sumpv = sumpv + parseInt(pv);
					sumtotal = sumtotal + parseInt(price);
				}else{
					alert("จำนวนสินค้ามีไม่เพียงพอ");
					exit;
					//num = qty;
				}
				//fcus = tag[i*8 +1];
				showprice = num*parseInt(price);
				showpv = num*parseInt(pv);
			}
			
			
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' style='text-align:right;' name='qty[]' type='text' size='5' value='" + num + "'>";
			step++;
			place += "<input type='hidden' name='lmqty[]' value='" + tag[step].value + "'></td>";
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' style='"+hidden+"' name='totalprice[]' value='" + (showprice==0?tag[step].value:showprice) + "'></td>";
			//place += "</tr>";
			sumtotal = sumtotal + parseInt(tag[step].value);
			step++;
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='text-align:right;"+hidden+ "' type='text' name='totalpv[]' value='" + (showpv==0?tag[step].value:showpv) + "'></td>";
			sumpv = sumpv + parseInt(tag[step].value);

			place += "</tr>";
		}
		if(out){
		//alert(tag.length)
			if(qty<=0){
				alert("จำนวนสินค้าไม่เพียวพอ");
				return;
			}
			//document.getElementById("array_serial").value=document.getElementById("array_serial").value+','+pcode;
			//document.getElementById("array_serial").value=document.getElementById("array_serial").value+','+pcode; //แสดงผล

			
			place += "<tr>";//ssaledel(pcode,pdesc,price,pv)
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ลบ' onclick=\"saledel('" + pcode + "','" + pdesc + "','" + price + "','" + pv + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (i+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly type='text' style='text-align:center;"+hidden+ "' name='pcode[]' value='" + pcode + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly type='text' style='"+hidden+ "' name='pdesc[]' value='" + pdesc + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='price[]' value='" + price + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='pv[]' value='" + pv + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input onkeyup='cal()' name='qty[]' style='text-align:right;' type='text' size='5' value='1'>";
			place += "<input type='hidden' name='lmqty[]' value='" + qty + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalprice[]' value='" + price + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly type='text' style='text-align:right;"+hidden+ "' name='totalpv[]' value='" + pv + "'></td>";
			place += "</tr>";
			sumpv = sumpv + parseInt(pv);
			sumtotal = sumtotal + parseInt(price);
		}
		place += "<tr bgcolor='#999999'>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='7'>รวม</td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' name='sumtotal'  id='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly type='text' style='text-align:right;' name='sumpv' id='sumpv' value='" + sumpv + "'></td>";
		place += "</tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='ตรวจสอบ' />&nbsp;<input type='submit' value='บันทึก' name='ok' id='ok'  disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=6'\" value='ยกเลิก' /></td></tr>";
		place += "</table>";
		if(serial != ''){
			document.getElementById("array_serial").value=document.getElementById("array_serial").value+','+serial;
		}
		window.parent.document.getElementById('sale').innerHTML = place;
		//fcus.focus();
		//alert(place);
	}
</script> 
<script language="javascript">
window.onload=function(){  
document.getElementById('aproductddd').focus();
} 
var xmlHttp;
function ibillcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sadate').value;
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "วันที่";
	
	val = val + ","+document.getElementById('inv_code').value;
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",Stockist";
/*	
	val = val + ","+document.getElementById('inv_code').value;
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสสาขา";
*/		
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
	
	val = val + ","+document.getElementById('mcode').value;
	skipval = skipval+",";
	field = field +",mcode";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสสมาชิก";
/*	
	val = val + ","+document.getElementById('inv_code').value;
	skipval = skipval+",";
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",รหัสสาขา";
*/
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
		wi=window.open("invent_listpicker1.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
	}
	function cal(){
		tag = window.parent.document.frm.getElementsByTagName('input');
		//alert(tag.length);
		var sumtotal=0;
		var sumpv=0;
		var skip = 12;
		var bgskip = 8;
		for(i=0;i<(tag.length-skip)/9;i++){
			step = i*9+bgskip;
			//step++;
		
			price = parseFloat(tag[step+2].value);
			pv = parseFloat(tag[step+3].value);
			num = parseFloat(tag[step+4].value);
			if(num>parseFloat(tag[step+5].value)){
				num = parseFloat(tag[step+5].value);
				alert("จำนวนสินค้ามีไม่เพียงพอ");
				tag[step+4].value = num;
			}
			tag[step+6].value = num * price;
			tag[step+7].value = num * pv;
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
		var skip = 12;
		var bgskip = 8;
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
		for(i=0;i<(tag.length-skip)/9;i++,l++){
			step = i*9+bgskip;
			//step++;
			if(pcode == tag[i*9 +bgskip].value){
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
			place += "<td style='"+style_l+style_bd+"' align='right'><input style='text-align:right;' name='qty[]'  onkeyup='cal()' type='text' size='5' value='" + num + "'>";
			place += "<input type='hidden' name='lmqty[]' value='" + tag[++step].value + "'></td>";
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
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumtotal' id='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' name='sumpv' id='sumpv' value='" + sumpv + "'></td>";
		place += "</tr>";
		//place += "<tr><td colspan='9' align='right'><input type='submit' value='บันทึก'></td></tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='ตรวจสอบ' />&nbsp;<input type='submit' value='บันทึก' name='ok'  disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=6'\" value='ยกเลิก' /></td></tr>";
		place += "</table>";
		//alert(place);
		window.parent.document.getElementById('sale').innerHTML = place;
		tag = window.parent.document.frm.getElementsByTagName('input');
		if(tag.length-skip<9){
			window.parent.document.getElementById('sale').innerHTML = "<table width='500' bgcolor='#009900'><tr><td align='center'><font color='#FFFFFF'>เลือกข้อมูลสอนค้าจากตารางขวามือ แล้วแก้ไขจำนวนตามต้องการ</font></td></tr></table>";
		}
	}
</script> 
</head>

<body>
<span id="show_text"></span> 

<?
if(isset($_GET['bid'])){
		$sql = "SELECT * FROM ".$dbprefix."isaleh WHERE id='".$_GET['bid']."' LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
			$redirect = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">ไปหน้าสมาชิก</a>]";
			dialogbox("50%","#990000","ไม่พบข้อมูลตามเงื่อนไข",$redirect);
			exit;
		}else{
		//	$sadate = mysql_result($rs,0,'sadate');
		//	$inv_code = mysql_result($rs,0,'inv_code');
		//	$satype = mysql_result($rs,0,'sa_type');
			$inv_code = mysql_result($rs,0,'inv_code');
			//$inv_desc = mysql_result($rs,0,'inv_desc');
			//$mname = mysql_result($rs,0,'name_t');
			mysql_free_result($rs);
		}
}
if(isset($_GET['id'])){
		$sql = "SELECT * FROM ".$dbprefix."risaleh WHERE id='".$_GET['id']."' LIMIT 1";
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
			//$inv_desc = mysql_result($rs,0,'inv_desc');
			//$mname = mysql_result($rs,0,'name_t');
			mysql_free_result($rs);
		}
}
?>
<form method="post" action="ssaleoperate_stockist.php?state=<?=$_GET['id']==""?0:1?>" name="frm" id="frm"  onsubmit="return checkForm(this)" onKeyDown="document.getElementById('ok').disabled=true;" >
  <table border="0">
  <tr valign="top">
    <td>
    <table width="500" border="0">
      <tr valign="top">
        <td>
            <table border="1" width="100%" align="center">
            <tr>
              <td width="16%" align="right">เลขบิล</td>
            <td width="16%">
			<? 
				$sql = "SELECT MAX(id) AS id FROM ".$dbprefix."holdhead ";
				$rs = mysql_query($sql);
				echo ($_GET['id']==""?mysql_result($rs,0,'id')+1:$_GET['id']);
				mysql_free_result($rs);
			?> <input type="hidden" value="<?=$_GET['id']?>" name="id"/></td>
            <td width="22%" nowrap>จากบิล 
              <input readonly style="border:none;" size="5" type="text" value="<?=$_GET['bid']?>" name="hid"/></td>
            <td width="6%" align="right">วันที่</td>
            <td width="40%"><input type="text" id="sadate" name="sadate" value="<?=$sadate==""?date("Y-m-d"):$sadate?>" readonly>
            <!--  <a href="javascript:NewCal('sadate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="เลือกวันที่"></a>    -->        </td>
            </tr>
            <tr valign="top">
              <td width="16%" align="right">รหัส Stockist</td>
              <td colspan="2"><input style="background-color:#FFFF99;" readonly size="15" type="text" id="inv_code" name="inv_code" value="<?=$inv_code?>">
                <input type="button"  onClick="get_mem_listpicker_invcode()" value="เลือก"></td>
              <input type="button" style="display:none" onClick="get_mem_listpicker_mcode()" value="เลือก"><div id="mname"></div> <td align="right" nowrap>&nbsp;</td>
              <td>Auto :
                <input style="background-color:#FFFF99;" size="15" type="text" id="aproductddd" name="aproductddd" value="" onKeyUp="javascript:add_product(this.value,'<?=$_GET["bid"]?>',window.event.keyCode);"></td>
            </tr>            
            <tr valign="top">
              <td align="right">แผน&nbsp;</td>
              <td colspan="2"><select name="satype">
                <option  value="A" <?=($satype=="A"?"selected":"")?>>รับสินค้า</option>
              </select></td>
              <td colspan="2">&nbsp;</td>
              </tr>
            <!--tr>
              <td colspan="4" align="right">&nbsp;</td>
              </tr-->
            </table>
    	</td>
      </tr>
      <tr>
        <td id="sale" align="center">
        <?
		if(isset($_GET['id'])){
			$sql = "SELECT * FROM ".$dbprefix."holddesc WHERE hono='".$_GET['id']."' ";
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
                        <td style="<?=$style_l.$style_bd?>"><input type="button" value="ลบ" onClick="saledel('<?=$proobj->pcode?>','<?=$proobj->pdesc ?>','<?=$proobj->price?>','<?=$proobj->pv?>')"></td>
                    	<td style="<?=$style_l.$style_bd?>"><?=($i+1)?></td>
                        <td style="<?=$style_l.$style_bd?>" align="center"><input readonly style="text-align:center;<?=$hidden?>" size="7" type="text" name="pcode[]" value="<?=$proobj->pcode?>"></td>
                        <td style="<?=$style_l.$style_bd?>"><input size="13" readonly style="<?=$hidden?>" type="text" name="pdesc[]" value="<?=$proobj->pcode?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="price[]" value="<?=$proobj->price?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input readonly style="text-align:right;<?=$hidden?>" size="8" type="text" name="pv[]" value="<?=$proobj->pv?>"></td>
                        <td style="<?=$style_l.$style_bd?>" align="right"><input size="5" onkeyup='cal()' style='text-align:right;' type="text" name="qty[]" value="<?=$proobj->qty?>"><input type="hidden" name="lmqty[]" value="<?=$proobj->qty?>"></td>
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
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumtotal' value="<?=$sumtotal?>"></td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumpv' value="<?=$sumpv?>"></td>
					</tr>
					<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='ตรวจสอบ' />&nbsp;<input type='submit' value='บันทึก' name='ok'  disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick="window.location='index.php?sessiontab=3&sub=6'" value='ยกเลิก' /></td></tr>
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
    </table>
    </td>
    <td><iframe width="400" height="340" frameborder="0" src="./product_shows_stockist.php?bid=<?=$_GET['bid']?>" ></iframe></td>
  </tr>
</table>
Remark:<br>
<textarea name="remark" id="remark" cols="140" rows="5"></textarea>
<br>
Serial:<br><textarea name="array_serial" id="array_serial" cols="140" rows="5"></textarea>
</form>

