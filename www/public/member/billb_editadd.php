<?
$_SESSION["perbuy"] = 1;

if($GLOBALS["status_sale_mb"] <> '1'){
	echo ' <font style="font-size:1.7em" color="#FF0000" ><b><center>'.$GLOBALS["status_remark"].' 
	</b></center>
	</font>';
	exit;
}
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
    frm.ok.disabled = true;
    //frm.ok.value = "บันทึก";
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
function check_zipcode1(value,value1,value2) {
     var req = Inint_AJAX(); //สร้าง Object
     req.open('GET', 'search_zipcode.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					if(data == 1234){
						 document.getElementById("czip").value=''; //แสดงผล
					}else{
					//	alert(data);
						 document.getElementById("czip").value=data.trim(); //แสดงผล
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
}
function checkaddress(value) {
     var req = Inint_AJAX(); //สร้าง Object
	 //value = str_pad(value,7,0,false);
     req.open('GET', 'search_address_new.php?value='+encodeURIComponent(value), true); 
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; 
					   
					if(data == 1234){

					}else{
						var myArray = data.split(':');
						var caddress = myArray[0].trim();
						var cdistrictId = myArray[1];
						var camphurId = myArray[2];
						var cprovinceId = myArray[3];
						var czip = myArray[4];
						var name_t = myArray[5];
						var mobile = myArray[6];
						document.getElementById('caddress').value=caddress;
						document.getElementById('cname').value=name_t;
						document.getElementById('cmobile').value=mobile;
						document.getElementById('czip').value=czip;
						
						 for (var i = 0; i < document.getElementById("cprovince").options.length; i++) {
							if (document.getElementById("cprovince").options[i].text== cprovinceId) {
								document.getElementById("cprovince").options[i].selected = true;
								//return;
							}
						}

						var x = document.getElementById("camphur");
						var option = document.createElement("option");
						option.text = camphurId;
						option.value = camphurId;
						x.add(option);
						x.remove('');
						var x = document.getElementById("cdistrict");
						var option = document.createElement("option");
						option.text = cdistrictId;
						option.value = cdistrictId;
						x.add(option);
						x.remove('');
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
     req.open('GET', 'search_member_h.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(req.responseText);
					if(data == 1234){
						document.getElementById('mcode').value="";
						document.getElementById("mname").innerHTML="<?=$wording_lan["tab4"]["1_27"]?>";
					}else if(data.trim()=="memterminate"){
						document.getElementById('mcode').value="";
						aalert('<?=$wording_lan["rp"]["id"]?> '+value+' <?=$wording_lan["txt_terminate"]?>');
					}else{									
						document.getElementById('mcode').value=value;
						document.getElementById("mname").innerHTML=data; //แสดงผล
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
function checkStatus(value,strUser,total) {
     var req = Inint_AJAX(); //สร้าง Object
	// alert(value)
	//value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_status.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					//alert(req.responseText);
					if(data == 1){
						if(strUser == 'C'){
							alert("<?=$wording_lan['tab4']['1_47']?>");
							document.getElementById('ok').disabled = true;
							exit;
						};
					}else{
						if(strUser == 'C'){
							//alert(total);alert(data);
							if(total <  parseFloat(data) || total >  parseFloat(data)+500 ){
								alert("<?=$wording_lan['tab4']['1_42']?> "+data+"PV <?=$wording_lan['tab4']['1_43']?> "+(parseFloat(data)+500)+" PV");
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
	//value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_status_new.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ test3.php
					if(data == 1){
						if(strUser == 'Q'){
							alert("<?=$wording_lan['tab4']['1_44']?>");
							document.getElementById('ok').disabled = true;
							exit;
						};
					}else{
						if(strUser == 'Q'){
							if(total >  parseFloat(data)+100 ){
								alert(" <?=$wording_lan['tab4']['1_45']?> "+(parseFloat(data)+500)+" PV");
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
     req.open('GET', 'search_invent.php?value='+encodeURIComponent(value), true); //กำหนด สถานะการทำงานของ AJAX แบบ GET และส่งข้อมูลผ่านทาง URL
     req.onreadystatechange = function() { //เหตุการณ์เมื่อมีการตอบกลับ
          if (req.readyState==4) {
               if (req.status==200) { //ได้รับการตอบกลับเรียบร้อย
                    var data=req.responseText; //ข้อความที่ได้มาจากการทำงานของ 
					if(data == 1234){
					document.getElementById('inv_code').value="";
					document.getElementById("inv_desc").innerHTML="<?=$wording_lan['tab4']['1_46']?>";
					}else{
					document.getElementById('inv_code').value=value;
                    document.getElementById("inv_desc").innerHTML=data; 
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ที่ส่งไป
     req.send(null); //ทำการส่ง
};
</script>

<script type="text/javascript">
	function checkUserName(){
			var u = document.getElementById('mcode').value;
			$.post("c.php", { userName: u}, checkUserNameCompleted);
	}

	function checkUserNameCompleted(data){
		if(data != 1){
			document.getElementById('showsend1').innerHTML = data;
		}else{
			document.getElementById('showsend1').innerHTML = '';

		}
	}
	function checkUserName1(){
			var u = document.getElementById('mcode').value;
			$.post("d.php", { userName: u}, checkUserNameCompleted1);
	}

	function checkUserNameCompleted1(data){
		var tott = 0;
		document.getElementById('ajaxshipping').value = data;
		if(<?=$_SESSION["ewallet"]?> < data){
				alert("<?=$wording_lan['tab4']['1_48']?>");
				document.getElementById('ok').disabled=true;
				document.getElementById('checkstate').innerHTML= '';

		}
	}
</script>
<script language="javascript">
var xmlHttp;
function chkStatusHold(){
	var mcode = $('#mcode').val();
    link = '<?=$actual_link?>member/checkhold.php'; 
    $.post(link,'mcode='+mcode,function(data){  
         var fist_status = data.trim();
		if(fist_status==1){
					//alert(data);
					$("#checkstate").val('');
					document.getElementById('discount').value=fist_status;
					//document.getElementById("discount").innerHTML=1;
		}else{
					//alert(data);
					document.getElementById('discount').value="";
                   // document.getElementById("discount").innerHTML=0; //แสดงผล
		}   
    });
}
function chkHold(){
	$("#checkstate").html('');
	link = '<?=$actual_link?>branch/chksale.php'; 
	$.post(link,$('form[name=frm]').serialize(),function(data){
	if(data.trim() != ""){
		alert(data.trim());
		
		//$('#waiting-item').addClass('text-red').html(data.trim());
		document.getElementById('ok').disabled = true;
		//$("#ok").prop('disabled', true);
		$("#checkstate").html('');
		return false;
	}else{
		//$('#waiting-item').removeClass('text-red');   
		$("#ok").prop('disabled', false);
		$("#checkstate").html('');
		return true;
	}
   });  
	
}

function ibillcheck(){
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)

//calfinal();
//chkHold();
//alert($('form[name=frm]').serialize());
$("#checkstate").html('');
link = '<?=$actual_link?>branch/chksale.php'; 
$.post(link,$('form[name=frm]').serialize(),function(data){ 

if(data.trim() != ""){
	alert(data.trim());
	//alert('s');
	//$('#waiting-item').addClass('text-red').html(data.trim());
	//document.getElementById('ok').disabled = true;
	$("#ok").prop('disabled', true);
	$("#checkstate").html('');
	exit;
}else{
	//$('#waiting-item').removeClass('text-red');   
	$("#ok").prop('disabled', false);
	$("#checkstate").html('');
	document.getElementById('showsend1').innerHTML = '';
	
	var val = document.getElementById('sadate').value;
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = '<?=$wording_lan["tab4"]["1_3"]?>';
	//alert(document.getElementById('ccheckr').value);
	val = val + ","+document.getElementById('mcode').value;
	field = field +",mcode";
	flag = flag+",1-9-0-0-0";
	errDesc = errDesc + ",<?=$wording_lan['tab5']['1_4']?>";
if(document.getElementById('ccheckr').value == ''){
	document.getElementById('ccheckr').value = '2';
}
if(document.getElementById('spayment').value == '4'){
	//alert(<?=$_SESSION["usercode"]?>);
	//alert(document.getElementById('mcode').value);
	if(<?=$_SESSION["usercode"]?> != document.getElementById('mcode').value){
		alert('<?=$wording_lan["tab4"]["1_49"]?> '+<?=$_SESSION["usercode"]?>+' <?=$wording_lan["tab4"]["1_50"]?>');
		exit;
	}

	if(<?=$_SESSION["evwallet"]?> < document.getElementById('sumtotal').value){
		alert("<?=$wording_lan['tab4']['1_51']?>");
		document.getElementById('ok').disabled=true;
		document.getElementById('showsend1').innerHTML='';
		exit;
	}
}

if(document.getElementById('spayment').value == '3'){
	if(<?=$_SESSION["ewallet"]?> < document.getElementById('sumtotal').value){
		alert("<?=$wording_lan['tab4']['1_48']?>");
		document.getElementById('ok').disabled=true;
		document.getElementById('showsend1').innerHTML='';
		exit;
	}

	setTimeout("checkUserName1()",0);
}

	if(document.getElementById('cprovince').value != '' && document.getElementById('ccheckr').value == '1'){
			document.getElementById('ok').disabled = true;document.getElementById('frm').target = '_blank';document.getElementById('frm').action='b.php'; 
			document.getElementById('frm').submit();
			setTimeout("checkUserName()",1500);
			
	}

document.getElementById('frm').target = '_self';
document.getElementById('frm').action='billb_operate.php?state=0';

		sendget_sponsor(document.getElementById('mcode').value);


		val = val + ","+document.getElementById('satype').value;
		field = field +",satype";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab4']['1_1']?>";

		val = val + ","+document.getElementById('ccheckr').value;
		field = field +",ccheckr";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab4']['1_52']?>";

	if(document.getElementById('ccheckr').value == '1'){
		val = val + ","+document.getElementById('cname').value;
		field = field +",cname";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab4']['1_53']?>";

		val = val + ","+document.getElementById('cmobile').value;
		field = field +",cmobile";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab4']['1_54']?>";

		
		val = val + ","+document.getElementById('caddress').value;
		field = field +",caddress";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab4']['1_55']?>";

		val = val + ","+document.getElementById('cprovince').value;
		field = field +",cprovinceId";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab4']['1_56']?>";

		val = val + ","+document.getElementById('camphur').value;
		field = field +",camphurId";
		flag = flag+",1-0-0-0-0";

		errDesc = errDesc + ",<?=$wording_lan['tab4']['1_57']?>";
		val = val + ","+document.getElementById('cdistrict').value;
		field = field +",cdistrictId";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab4']['1_58']?>";

		val = val + ","+document.getElementById('czip').value;
		field = field +",czip";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab4']['1_59']?>";
	}else{
		val = val + ","+document.getElementById('inv_code').value;
		field = field +",inv_code";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",<?=$wording_lan['tab4']['1_60']?>";
	}
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"transfersale_h","checkstate");
}
});  
	
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
		var skip = 33; //--
		var bgskip = 9;
		for(i=0;i<(tag.length-skip)/8;i++){
			step = i*8+bgskip;
			price = parseFloat(tag[step+2].value);
			pv = parseFloat(tag[step+3].value);
			num = parseFloat(tag[step+4].value);
			tag[step+5].value = num * price;
			tag[step+6].value = num * pv;
			sumtotal = sumtotal + (price*num);
			sumpv = sumpv + (pv*num);
		}
		document.getElementById('sumtotal').value=sumtotal;
		document.getElementById('sumpv').value=sumpv;
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;<?=$wording_lan['tab4']['1_41']?>&nbsp; </font>";
		//alert(window.parent.document.mainsale.getElementsByTagName('input').length);
		//alert(sumtotal);
	}
	function calfinal(){
		tag = window.parent.document.frm.getElementsByTagName('input');
		//alert(tag.length);
		var sumtotal=0;
		var sumpv=0;
		var skip = 50;
		var bgskip = 9;
		for(i=0;i<(tag.length-skip)/8;i++){
			step = i*8+bgskip;
			price = parseFloat(tag[step+2].value);
			pv = parseFloat(tag[step+3].value);
			num = parseFloat(tag[step+4].value);
			tag[step+5].value = num * price;

			tag[step+6].value = num * pv;
			sumtotal = sumtotal + (price*num);
			sumpv = sumpv + (pv*num);
		}
		document.getElementById('sumtotal').value=sumtotal;
		document.getElementById('sumpv').value=sumpv;
	}
	function saledel(pcode,pdesc,price,pv){
		var place;
		var step;
		var sumpv = 0;
		var sumtotal = 0;
		var out = true;
		var qp=0;
		var num;
		var skip = 28; //--
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
		tag = window.parent.document.frm.getElementsByTagName('input');
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'  > &nbsp;<?=$wording_lan["tab4"]["1_41"]?>&nbsp; </font>";
		//alert(tag.length);
		place = "<table border='0' width='500' cellpading='0' cellspacing='0'class=' table table-striped table-condensed table-bordered table-hover cf'>";
		place += "<tr align='center' bgcolor='#999999'>";
		place += "<td bgcolor='#99CCCC' style='"+style_l+style_t+style_b+"'>&nbsp;</td>";
		place += "<td style='"+style_l+style_t+style_b+"' class='visible-lg visible-md visible-sm'><?=$wording_lan['tab4']['1_28']?></td>";

		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_29']?></td>";

		place += "<td style='"+style_l+style_t+style_b+"' class='visible-lg visible-md visible-sm'><?=$wording_lan['tab4']['1_30']?></td>";

		place += "<td style='"+style_l+style_t+style_b+"' class='visible-lg visible-md visible-sm'><?=$wording_lan['tab4']['1_31']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"' class='visible-lg visible-md visible-sm'><?=$wording_lan['tab4']['1_32']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_33']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_34']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_35']?></td>";
		place += "</tr>";
		for(i=0;i<(tag.length-skip)/8;i++,l++){
			step = i*8+bgskip;
			//step++;
			if(pcode == tag[i*8 +bgskip].value){
				l--;
				continue;
			}
			
			place += "<tr>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='<?=$wording_lan["tab4"]["1_36"]?>' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' class='visible-lg visible-md visible-sm' align='center'>" + (l+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='6' readonly style='"+hidden+ "text-align:center;' type='text' name='pcode[]' value='" + tag[step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' class='visible-lg visible-md visible-sm' align='left'><input size='13' readonly style='"+hidden+ "' type='text' name='pdesc[]' value='" + tag[++step].value + "'></td>";


			price = parseFloat(tag[++step].value);
			place += "<td style='"+style_l+style_bd+"' align='right' class='visible-lg visible-md visible-sm'><input size='5' readonly style='"+hidden+ "text-align:right;' type='text' name='price[]' value='" + price + "'></td>";
			pv = parseFloat(tag[++step].value);
			place += "<td style='"+style_l+style_bd+"' align='right' class='visible-lg visible-md visible-sm'><input size='5' readonly style='"+hidden+ "text-align:right;' type='text' name='pv[]' value='" + pv + "'></td>";
			num = parseFloat(tag[++step]. value);
			//alert(num);
			place += "<td style='"+style_l+style_bd+"' align='right'><input style='text-align:right;' name='qty[]'  onkeyup='cal()' type='text' size='4' value='" + num + "'  onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('<?=$wording_lan['tab4']['1_40']?>');this.value=1;cal();}\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='5' readonly style='"+hidden+ "text-align:right;' type='text' name='totalprice[]' value='" + (price*num) + "'></td>";
			//place += "</tr>";
			sumtotal = sumtotal + (price*num);
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='5' readonly style='"+hidden+ "text-align:right;' type='text' name='totalpv[]' value='" + (pv*num) + "'></td>";
			sumpv = sumpv + (pv*num);

			place += "</tr>";
		}
		//alert(window.parent.document.mainsale.getElementsByTagName('input').length);
		//alert(sumtotal);
		place += "<tr>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' class='visible-lg visible-md visible-sm'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' class='visible-lg visible-md visible-sm'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' class='visible-lg visible-md visible-sm'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' class='visible-lg visible-md visible-sm'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='3'><?=$wording_lan['tab5']['3_15']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='5' readonly style='text-align:right;' type='text' id='sumtotal' name='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='5' readonly style='text-align:right;' type='text'  name='sumpv' id='sumpv' value='" + sumpv + "'></td>";
		place += "</tr>";
		//place += "<tr><td colspan='9' align='right'><input type='submit' value='บันทึก'></td></tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='ตรวจสอบ' />&nbsp;<input type='submit' value='<?=$wording_lan['tab4']['5_18']?>' name='ok' id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=6'\" value='<?=$wording_lan['tab4']['5_19']?>' /></td></tr>";
		place += "</table>";

		window.parent.document.getElementById('sale').innerHTML = place;
		tag = window.parent.document.frm.getElementsByTagName('input');
		if(tag.length-skip<8){
			window.parent.document.getElementById('sale').innerHTML = 
				"<div class='alert alert-danger'><?=$wording_lan['tab4']['1_62']?></div>";
		}
	}
</script> 
</head>

<body>
<?

//var_dump($_SESSION);
if($_GET["cmc"])$mcode = $_GET["cmc"];
$txtCash = '0';
$txtFuture = '0';
$txtTransfer = '0';
$txtCredit1 = '0';
$txtCredit2 = '0';
$txtCredit3 = '0';
$txtInternet = '0';
$txtDiscount = '0';
$txtOther = '0';
?>
<form method="post" action="billb_operate.php?state=0" id="frm" name="frm"  onsubmit="return checkForm(this)" onKeyDown="document.getElementById('ok').disabled=true;"   >
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="clearfix">
		<div>
			<div id="user-profile-1" class="user-profile row">
				<div class="col-xs-12 col-sm-7">
					<div class="profile-user-info profile-user-info-striped ">
						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab4_15"]?></div>
							<div class="profile-info-value"></div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab4"]["1_3"]?> </div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="text" id="sadate" name="sadate" value="<?=$sadate==""?$_SESSION["datetimezone"]:$sadate?>" readonly="" class="form-control">
								</div>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab4"]["1_1"]?> </div>
							<div class="profile-info-value">
								<div class="controls">
									<select name="satype" id="satype" onChange="document.getElementById('ok').disabled=true;">
									<?
										if($_SESSION["mtype1"] == '0')$chktype = $arr_satype_m0;
										else $chktype = $arr_satype_mh;
										foreach($chktype as $key => $value):			
										echo '<option value="'.$key.'"';
											if($satype==$key)echo "selected";
										echo'>'.$value.'</option>'; 
										endforeach;
									?>
								  </select>
								</div>
							</div>
						</div>	

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["rep_28"]?> </div>

							<div class="control-group">
								
								<div class="radio">
									<label>
										<input type="radio" class="ace"  name="radsend" id="radsend" value="1" onClick="document.getElementById('inv_code').disabled = true;document.getElementById('ccheckr').value = '1';document.getElementById('inv_code').value = '';document.getElementById('showsend1').innerHTML='';document.getElementById('ok').disabled=true;" <?=($radsend=="1"?"checked":"")?>></input>
										<span class="lbl">&nbsp&nbsp <?=$wording_lan["tab1_mem_66"]?></span>
									</label>
									<label>
										<input type="radio" class="ace" name="radsend" id="radsend" value="2"  onClick="document.getElementById('inv_code').disabled = false;document.getElementById('ccheckr').value = '2';document.getElementById('showsend1').innerHTML='';document.getElementById('ok').disabled=true;"  <?=($radsend=="2"?"checked":"")?> />
										<span class="lbl">&nbsp&nbsp <?=$wording_lan["tab4"]["1_5"]?></span>
									</label>
									<select size="1" name="inv_code" id="inv_code" onChange="document.getElementById('ok').disabled=true;" >
									 <option  value="" ><?=$wording_lan["info_main_1"]["39"]?></option>  
									  <?					
										$result1=mysql_query("select * from ".$dbprefix."invent where locationbase = '".$_SESSION["m_locationbase"]."' and inv_type=1 order by inv_code");
										for ($i=1;$i<=mysql_num_rows($result1);$i++){
											$row1 = mysql_fetch_object($result1);
											//echo "<option value=\"\" ";
											echo "<option value=\"".$row1->inv_code."\" ";
											if (""==$row1->inv_code) {echo "selected";}
											echo ">".$row1->inv_desc."</option>";
										}
									?>
									</select>
									<input type="hidden"  value="<?=$_GET['id']?>" name="id"/>
									<input readonly style="border:none;" size="5" type="hidden" value="<?=$_GET['bid']?>" name="hid"/>
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan['tab4']['1_78']?> </div>
							<div class="profile-info-value">
								<div class="input-group col-sm-12 col-xs-12">
									<select size="1" name="spayment" id="spayment"  onChange="document.getElementById('ok').disabled=true;">
									   <option value="3"><?=$wording_lan["tab4"]["1_11"]?></option> 
									</select>
								</div>
							</div>
						</div>


						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab5"]['1_4']?> </div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="text" id="mcode" name="mcode"  class="form-control" maxlength="9">
									<span class="input-group-btn">
									<button class="btn btn-sm btn-default" type="button" onClick="sendget_sponsor(document.getElementById('mcode').value)" >
										<i class="ace-icon fa fa-search bigger-110"></i>
										Search
									</button>
									</span>
								</div>
							</div>
							<input type="hidden"  value="<?=$_GET['id']?>" name="id"/>
							<input readonly style="border:none;" size="5" type="hidden" value="<?=$_GET['bid']?>" name="hid"/>
							<div id="inv_desc"></div>	
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name">							
							</div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
								<div id="mname"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="profile-user-info profile-user-info-striped ">
						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab4"]["4_10"]?></div>
							<div class="profile-info-value">
							</div>
						</div>
						<div style="padding:5px;background-color: #fff;" id="sale" class="text-center ">
							<div class="alert alert-danger">
								<?=$wording_lan["tab4"]["4_11"]?>
							</div>
						</div>
					</div>
					<div class="space-6"></div>
					<div class="space-6"></div>
					<div class="input-group col-sm-12 col-xs-12" id="checkstate"></div>
					<div class="input-group col-sm-12 col-xs-12" id="showsend1"></div>
					<div class="profile-user-info profile-user-info-striped ">
						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan["tab4"]["1_15"]?></div>
							<div class="profile-info-value"><input type="checkbox" class="ace" name="chkaddress" id="chkaddress" onClick="checkaddress(document.getElementById('mcode').value)" value="1"  /><span class="lbl"> <?=$wording_lan["tab4"]["1_16"]?></span></div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab4"]["1_17"]?> <font color="#ff0000">*</font></div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="text" id="cname" name="cname"  class="form-control">
								</div>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab4"]["1_18"]?> <font color="#ff0000">*</font></div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="text" id="cmobile" name="cmobile" class="form-control">
								</div>
							</div>
						</div>
						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["address"]?> <font color="#ff0000">*</font></div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="text" id="caddress" name="caddress" class="form-control">
								</div>
							</div>
						</div>
						<? 
						if($_SESSION["m_locationbase"] == '1'){
							if($provinceId==""){
								include("cthaiaddress.php");
							}else{
								include("cthaiaddressshow.php");
							}
						}else{
						?>
						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["province"]?> <font color="#ff0000">*</font></div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cprovince" name="cprovince" value="<?=$data["cprovince"]?>">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab4"]["1_21"]?> <font color="#ff0000">*</font></div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="camphur" name="camphur" value="<?=$data["camphur"]?>">
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"><?=$wording_lan["tab4"]["1_22"]?> <font color="#ff0000">*</font> </div>

							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input class="form-control" type="text" id="cdistrict" name="cdistrict" value="<?=$data["cdistrict"]?>">
								</div>
							</div>
						</div>
						<? } ?>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab4"]["1_23"]?> <font color="#ff0000">*</font> </div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="text" id="czip" name="czip"  class="form-control">
									<span class="input-group-btn">
									<button class="btn btn-sm btn-default" type="button" type="button" onClick="check_zipcode1(document.getElementById('cprovince').value,document.getElementById('camphur').value,document.getElementById('cdistrict').value)"  >
										<i class="ace-icon fa fa-search bigger-110"></i>
										Search
									</button>
									</span>
								</div>
							</div>
						</div>

						<div class="profile-info-row">
							<div class="profile-info-name"> <?=$wording_lan["tab4"]["1_25"]?> </div>
							<div class="profile-info-value">
								<div class="input-group col-sm-9 col-xs-9">
									<input type="text" id="txtoption" name="txtoption" class="form-control">
								</div>
							</div>
						</div>

					</div>

				</div>
				<div class="col-xs-12 col-sm-5">
					<div class="profile-user-info profile-user-info-striped ">
						<div class="profile-info-row table-header">
							<div class="profile-info-value"><?=$wording_lan['tab4']['1_79']?></div>
							<div class="profile-info-value"></div>
						</div>
					</div>
					<div class="profile-user-info profile-user-info-striped ">

						<div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
							<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
								<li class="ui-state-default ui-corner-top ui-state-hover ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tabs-1" aria-labelledby="ui-id-29" aria-selected="true" aria-expanded="true">
									<a href="#tabs-1" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-29"><?=$wording_lan['tab4']['1_80']?></a>
								</li>
								<li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-2" aria-labelledby="ui-id-30" aria-selected="false" aria-expanded="false">
									<a href="#tabs-2" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-30"><?=$wording_lan["promotion"]?></a>
								</li>
							</ul>

							<div id="tabs-1" aria-labelledby="ui-id-29" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-hidden="false" style="display: block;">
								 <iframe id="product_show" width="100%" height="935" frameborder="0" src="./product_show.php" ></iframe>
							</div>
							<div id="tabs-2" aria-labelledby="ui-id-30" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-hidden="true" style="display: none;">
								 <iframe id="package_show" width="100%" height="935" frameborder="0" src="./package_show1.php" ></iframe>
							</div>
						</div>

					</div>
				 </div>
			</div>
		</div>
	</div>
</div>
</form>
<input  type="hidden" id="ccaddress" name="ccaddress">
<input  type="hidden" id="ccname" name="ccname">
<input  type="hidden" id="ccmobile" name="ccmobile">
<input  type="hidden" id="ccprovinceId" name="ccprovinceId">
<input  type="hidden" id="ccdistrictId" name="ccdistrictId">
<input  type="hidden" id="ccamphurId" name="ccamphurId">
<input  type="hidden" id="cczip" name="cczip">
<input  type="hidden" id="ccheckr" name="ccheckr" value="">
<input  type="hidden" id="ajaxshipping" name="ajaxshipping" value="0">
<div style="clear:both"></div>
