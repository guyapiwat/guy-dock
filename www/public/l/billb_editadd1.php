<?
 $_SESSION["perbuy"] = 1;
//echo 'update �к�����š�ͧ ��سҡ�Ѻ�������ա ������� �ͺ�س���';
//exit;
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
function check_zipcode1(value,value1,value2) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	//value = str_pad(value,7,0,false);
	//alert(value);
	//alert(value);alert(value1);alert(value2);
     req.open('GET', 'search_zipcode.php?value='+encodeURIComponent(value)+'&value1='+encodeURIComponent(value1)+'&value2='+encodeURIComponent(value2), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
				//	alert(req.responseText);
					//alert(data);
					if(data == 1234){
						 document.getElementById("czip").value=''; //�ʴ���
					}else{
					//	alert(data);
						 document.getElementById("czip").value=data; //�ʴ���
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
}
function checkaddress(value) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(value);
     req.open('GET', 'search_address.php?value='+encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					//alert(req.responseText);
					if(data == 1234){
					//document.getElementById("mname").innerHTML="������������§ҹ ���� <br>�������ö��觫��͢��������";
					}else{
					//	alert(data);
                    document.getElementById("idchksaddress").innerHTML=data; //�ʴ���
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
}
function sendget_sponsor(value) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_member.php?value='+encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('mcode').value="";
					document.getElementById("mname").innerHTML="<?=$wording_lan['tab4']['1_27']?>";
					}else{
					document.getElementById('mcode').value=value;
                    document.getElementById("mname").innerHTML=data; //�ʴ���
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
};
function checkStatus(value,strUser,total) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_status.php?value='+encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
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
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
};
function checkStatusNew(value,strUser,total) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_status_new.php?value='+encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					if(data == 1){
						if(strUser == 'Q'){
							alert("<?=$wording_lan['tab4']['1_44']?>");
							document.getElementById('ok').disabled = true;
							exit;
						};
					}else{
						if(strUser == 'Q'){
							//alert(total);alert(data);
							if(total >  parseFloat(data)+100 ){
							//if(total <  parseFloat(data) || total >  parseFloat(data)+100 ){
								alert(" <?=$wording_lan['tab4']['1_45']?> "+(parseFloat(data)+500)+" PV");
								//alert("�س��ͧ�ѡ���ʹ�繨ӹǹ "+data+"PV ��� �ѡ���ʹ������Թ "+(parseFloat(data)+100)+" PV");
								document.getElementById('ok').disabled = true;
								exit;
							}
						};
					}
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
};
function sendget_invent(value) {
     var req = Inint_AJAX(); //���ҧ Object
	// alert(value)
	//value = str_pad(value,7,0,false);
	//alert(test);
     req.open('GET', 'search_invent.php?value='+encodeURIComponent(value), true); //��˹� ʶҹС�÷ӧҹ�ͧ AJAX Ẻ GET ����觢����ż�ҹ�ҧ URL
     req.onreadystatechange = function() { //�˵ء�ó�������ա�õͺ��Ѻ
          if (req.readyState==4) {
               if (req.status==200) { //���Ѻ��õͺ��Ѻ���º����
                    var data=req.responseText; //��ͤ���������Ҩҡ��÷ӧҹ�ͧ test3.php
					//alert(req.responseText);
					if(data == 1234){
					document.getElementById('inv_code').value="";
					document.getElementById("inv_desc").innerHTML="<?=$wording_lan['tab4']['1_46']?>";
					}else{
					document.getElementById('inv_code').value=value;
                    document.getElementById("inv_desc").innerHTML=data; //�ʴ���
					}
					//alert(data);
					//if(data == "No Data"){
					//	alert('a');
					//	document.getElementById("mcode").innerHTML="";}
					
               }
          }
     };
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Header ������
     req.send(null); //�ӡ����
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
			}else{
				document.getElementById('showsend1').innerHTML = '';

			}
              //  alert("Server return: " + data);
        }
        function checkUserName1(){
                var u = document.getElementById('mcode').value;
				//alert('s');
                $.post("d.php", { userName: u}, checkUserNameCompleted1);
        }

        function checkUserNameCompleted1(data){
			//alert(data);
			
			//if(data != 1){
				//alert(data);
				var tott = 0;
				//alert(<?=$_SESSION["ewallet"]?>);
				//alert(data);
				//alert(<?=$_SESSION["ewallet"]?>);
				//alert(data);
				//alert(data);
				document.getElementById('ajaxshipping').value = data;
				//alert(data);
					if(<?=$_SESSION["ewallet"]?> < data){
							alert("<?=$wording_lan['tab4']['1_48']?>");
							document.getElementById('ok').disabled=true;
							document.getElementById('checkstate').innerHTML= '';
							
						//	exit;
					}
			//alert(tott);
		//	if(parseFloat(document.getElementById('sumtotal').value)+parseFloat(document.getElementById('ajaxshipping').value)+parseFloat(document.getElementById('ajaxshipping').value) != tott){
			//	alert('�ʹ�Թ '+tott+' �ҷ ��س����͡�Ըժ����Թ���ú����ӹǹ');
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
				//alert('��س����͡�Թ��ҿ��');
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
calfinal();
document.getElementById('showsend1').innerHTML = '';
	var val = document.getElementById('sadate').value;
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = '<?=$wording_lan["tab4"]["1_3"]?>';
	//alert(document.getElementById('ccheckr').value);
	val = val + ","+document.getElementById('mcode').value;
	field = field +",mcode";
	flag = flag+",1-0-0-0-0";
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

	if(<?=$_SESSION["voucher"]?> < document.getElementById('sumtotal').value){
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

	//setTimeout("checkUserName1()",0);
}

	if(document.getElementById('cprovince').value != '' && document.getElementById('ccheckr').value == '1'){
			document.getElementById('ok').disabled = true;document.getElementById('frm').target = '_blank';document.getElementById('frm').action='b.php'; 
			document.getElementById('frm').submit();
			setTimeout("checkUserName()",500);
			
	}else if(document.getElementById('ccheckr').value == '2'){
				
					if(<?=$_SESSION["ewallet"]?> < document.getElementById('sumtotal').value){
						//	alert('Ewallet �ͧ��ҹ�����§��');
						//	document.getElementById('ok').disabled=true;
						//	document.getElementById('showsend1').innerHTML='';
						//	exit;
					}
	}

document.getElementById('frm').target = '_self';
document.getElementById('frm').action='billb_operate1.php?state=0';







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

/*	
	val = val + ","+document.getElementById('inv_code').value;
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�����Ң�";
*/		
//loop check
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"transfersale_h","checkstate");
}
function ebillcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sadate').value;
	var skipval = "";
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "<?=$wording_lan['tab4']['1_3']?>";
	
	val = val + ","+document.getElementById('mcode').value;
	skipval = skipval+",";
	field = field +",mcode";
	flag = flag+",1-7-0-0-0";
	errDesc = errDesc + ",<?=$wording_lan['tab4']['1_2']?>";

	if(document.getElementById('inv_code').value != ''){
		if(document.getElementById("inv_desc").innerHTML == ''){
			alert("<?=$wording_lan['tab4']['1_61']?>");
			 frm.ok.disabled = true;
			exit;
		}
	}
/*	
	val = val + ","+document.getElementById('inv_code').value;
	skipval = skipval+",";
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�����Ң�";
*/
	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	//alert(skipval);
	startRQ(field,val,skipval,flag,errDesc,"transfersale_h","checkstate");
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
		var skip = 50;
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
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;��ԡ��Ǩ�ͺ���ͷӡ�õ�Ǩ�ͺ������&nbsp; </font>";
		//alert(tag.length);
		place = "<table border='0' width='500' cellpading='0' cellspacing='0'>";
		place += "<tr align='center' bgcolor='#999999'>";
		place += "<td bgcolor='#99CCCC' style='"+style_l+style_t+style_b+"'>&nbsp;</td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_28']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_29']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_30']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_31']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"'><?=$wording_lan['tab4']['1_32']?></td>";
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
			place += "<td style='"+style_l+style_bd+"' align='center'><input type='button' value='ź' onclick=\"saledel('" + tag[step].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "','" + tag[step+1].value + "')\"></td>";
			place += "<td style='"+style_l+style_bd+"' align='center'>" + (l+1) + "</td>";
			place += "<td style='"+style_l+style_bd+"' align='center'><input size='7' readonly style='"+hidden+ "text-align:center;' type='text' name='pcode[]' value='" + tag[step].value + "'></td>";
			place += "<td style='"+style_l+style_bd+"' align='left'><input size='13' readonly style='"+hidden+ "' type='text' name='pdesc[]' value='" + tag[++step].value + "'></td>";






			price = parseFloat(tag[++step].value);
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='price[]' value='" + price + "'></td>";
			pv = parseFloat(tag[++step].value);
			place += "<td style='"+style_l+style_bd+"' align='right'><input size='8' readonly style='"+hidden+ "text-align:right;' type='text' name='pv[]' value='" + pv + "'></td>";
			num = parseFloat(tag[++step]. value);
			//alert(num);
			place += "<td style='"+style_l+style_bd+"' align='right'><input style='text-align:right;' name='qty[]'  onkeyup='cal()' type='text' size='5' value='" + num + "'  onKeyPress='return chknum(window.event.keyCode)' onChange=\"if(this.value == '' || this.value.substring(0,1) == '0'){alert('<?=$wording_lan['tab4']['1_40']?>');this.value=1;cal();}\"></td>";
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
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='7'><?=$wording_lan['tab5']['3_15']?></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' id='sumtotal' name='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text'  name='sumpv' id='sumpv' value='" + sumpv + "'></td>";
		place += "</tr>";
		//place += "<tr><td colspan='9' align='right'><input type='submit' value='�ѹ�֡'></td></tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='��Ǩ�ͺ' />&nbsp;<input type='submit' value='<?=$wording_lan['tab4']['5_18']?>' name='ok' id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=6'\" value='<?=$wording_lan['tab4']['5_19']?>' /></td></tr>";
		place += "</table>";


		//alert(place);
		window.parent.document.getElementById('sale').innerHTML = place;
		tag = window.parent.document.frm.getElementsByTagName('input');
		if(tag.length-skip<8){
			window.parent.document.getElementById('sale').innerHTML = "<table width='500' bgcolor='#009900'><tr><td align='center'><font color='#FFFFFF'><?=$wording_lan['tab4']['1_62']?></font></td></tr></table>";
		}
	}
</script> 
</head>

<body>
<?

//var_dump($_SESSION);
if($_GET["cmc"])$mcode = $_GET["cmc"];

if(isset($_GET['id'])){

		$sql = "SELECT * FROM ".$dbprefix."transfersale_h WHERE id='".$_GET['id']."'  LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
			$redirect = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">".$wording_lan['tab4']['1_63']."</a>]";
			dialogbox("50%","#990000",$wording_lan['w14'],$redirect);
			exit;
		}else{
			$sadate = mysql_result($rs,0,'sadate');
			$cancel = mysql_result($rs,0,'cancel');
			$sqlC = "select calc from ".$dbprefix."around where fdate >= '$sadate' and tdate <= '$sadate' and calc = 1";
			$sqlSC = mysql_query($sqlC);
			if(mysql_num_rows($sqlSC) > 0 or $cancel == '1'){
						echo "<script language='JavaScript'>alert('".$wording_lan['tab4']['1_64']."');window.location='index.php?sessiontab=3&sub=6'</script>";	
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
<form method="post" action="billb_operate1.php?state=<?=$_GET['id']==""?0:1?>" id="frm" name="frm"  onsubmit="return checkForm(this)" onKeyDown="document.getElementById('ok').disabled=true;"   >
  <table border="0">
  <tr valign="top">
    <td>				
    <table width="625" border="0">
      <tr valign="top">
        <td><table border="1" width="100%" align="center">
            <tr>
              <td width="16%" align="right"><?=$wording_lan["tab4"]["1_1"]?></td>
            <td width="38%"> 
              
              <select name="satype" id="satype" onChange="document.getElementById('ok').disabled=true;">
				<?php		

					
					foreach($arr_satype_xy as $key => $value):			
					echo '<option value="'.$key.'"';
						if($satype==$key)echo "selected";
					echo'>'.$value.'</option>'; 
					endforeach;
				?>
              </select>
              <input type="hidden" value="<?=$_GET['id']?>" name="id"/></td>
            <td width="6%" align="right"><?=$wording_lan["tab4"]["1_3"]?></td>
            <td width="40%"><input type="text" id="sadate" name="sadate" readonly="" value="<?=$sadate==""?$_SESSION["datetimezone"]:$sadate?>">            </td>
            </tr>
            <tr valign="top">
              <td width="16%" align="right"><?=$wording_lan["tab4"]["1_2"]?></td>
              <td nowrap="nowrap"><input style="background-color:#FFFF99" size="15" type="text" id="mcode" name="mcode" value="<?=$_SESSION["usercode"]?>" readonly>
               <input style="display:none" name="button2" type="button" onClick="sendget_sponsor(document.getElementById('mcode').value);document.getElementById('ok').disabled=true;" value="<?=$wording_lan["tab4"]["1_26"]?>" />
<!--<input type="button" onClick="get_mem_listpicker_mcode()" value="���͡">--><div id="mname"></div> </td>
              <td colspan="2" align="left" valign="top" nowrap="nowrap">
			  <? if($GLOBALS["sending"] == '1'){?>
			  <input type="radio" name="radsend" value="1" onClick="document.getElementById('inv_code').disabled = true;document.getElementById('ccheckr').value = '1';document.getElementById('inv_code').value = '';document.getElementById('showsend1').innerHTML='';document.getElementById('ok').disabled=true;" <?=($radsend=="1"?"checked":"")?>>
<?=$wording_lan["tab4"]["1_4"]?>
<input type="radio" name="radsend" value="2"  onClick="document.getElementById('inv_code').disabled = false;document.getElementById('ccheckr').value = '2';document.getElementById('showsend1').innerHTML='';document.getElementById('ok').disabled=true;"  <?=($radsend=="2"?"checked":"")?> >
<?=$wording_lan["tab4"]["1_5"]?><br><?=$wording_lan["tab4"]["1_6"]?>
<select size="1" name="inv_code" id="inv_code" onChange="document.getElementById('ok').disabled=true;" >
 <option  value="" ></option>  
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
<input style="background-color:#FFFF99;display:none" size="15" readonly="" type="text" id="inv_code1" name="inv_code1" value="<?=$inv_code?>">
<? }else {?>
<input type="radio" style="display:none" name="radsend" value="1" onClick="document.getElementById('inv_code').disabled = true;document.getElementById('ccheckr').value = '1';document.getElementById('inv_code').value = '';document.getElementById('showsend1').innerHTML='';document.getElementById('ok').disabled=true;" <?=($radsend=="1"?"checked":"")?>>
<input type="radio" name="radsend" value="2"  onClick="document.getElementById('inv_code').disabled = false;document.getElementById('ccheckr').value = '2';document.getElementById('showsend1').innerHTML='';document.getElementById('ok').disabled=true;"  <?=($radsend=="2"?"checked":"")?> >
&#3652;&#3617;&#3656;&#3592;&#3633;&#3604;&#3626;&#3656;&#3591;<br>
&#3619;&#3633;&#3610;&#3607;&#3637;&#3656;&#3626;&#3634;&#3586;&#3634;
<select size="1" name="inv_code" id="inv_code" onChange="document.getElementById('ok').disabled=true;" >
 <option  value="" ></option>  
  <?					
						$result1=mysql_query("select * from ".$dbprefix."invent where locationbase = '".$_SESSION["m_locationbase"]."' order by inv_code");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->inv_code."\" ";
							if (""==$row1->inv_code) {echo "selected";}
							echo ">".$row1->inv_desc."</option>";
						}
						?>
</select>
<input style="background-color:#FFFF99;display:none" size="15" readonly="" type="text" id="inv_code1" name="inv_code1" value="<?=$inv_code?>">
                
				<? }?>
				
				<div id="inv_desc" name="inv_desc"></div><br>
<?=$wording_lan["tab4"]["1_7"]?>
                <select size="1" name="spayment" id="spayment"  onChange="document.getElementById('ok').disabled=true;">
                 <option value="4"><?=$wording_lan["tab4"]["1_12"]?></option> 
				
                 <!--option value="2"><?=$wording_lan["tab4"]["1_13"]?></option--> 
         <!--      <? if($_SESSION["m_locationbase"] == '1'){?>       <option value="1"><?=$wording_lan["tab4"]["1_14"]?></option>
             <? }?>   --></select>
                <!--  <input style="display:none" name="button3" type="button"  onclick="sendget_invent(document.getElementById('inv_code').value)" value="��" />-->
                <input name="button3" type="button" style="display:none" onClick="get_mem_listpicker_invcode()" value="<?=$wording_lan['tab4']['1_65']?>"  >
                <div id="inv_desc" name="inv_desc"></div></td></tr>            
            
            <tr>
              <td colspan="4" align="left">          </td>
              </tr>
            </table>
    	</td>
      </tr>
      <tr>
        <td id="sale" align="center">

        
    	</td>
      </tr>
	  <tr><td align=center><div id="checkstate" align="center"></div>   <div id="showsend1" align="center"></div></td></tr>
    </table>    <table border="1" width="100%" >
              
              <tr valign="top">
                <td colspan="4"><table style="display:none"><tr><td><input type="checkbox" name="chkCash" <?=($chkCash=="on"?"checked":"")?> onClick="showHideNum(this,'txtCash')">  

<?=$wording_lan["tab4"]["7_6"]?>                    </td>
                <td><input type="text" name="txtCash" id="txtCash" size="5"  value="<?=$txtCash?>"></td>
                <td>��������´ </td>
                <td><input name="optionCash" type="text" value="<?=$optionCash?>" size="60"  >                </td>
              </tr>
              <tr valign="top">
              <td>
                <input type="checkbox" name="chkFuture" <?=($chkFuture=="on"?"checked":"")?> onClick="showHideNum(this,'txtFuture')">
<?=$wording_lan["tab4"]["7_11"]?></td>
              <td><input type="text" name="txtFuture" id="txtFuture" size="5"  value="<?=$txtFuture?>"></td>
              <td>��������´</td>
               <td><input name="optionFuture"   value="<?=$optionFuture?>" type="text" size="60" ></td>
              </tr>
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkTransfer" <?=($chkTransfer=="on"?"checked":"")?> onClick="showHideNum(this,'txtTransfer')">
<?=$wording_lan["tab4"]["7_11"]?></td>
              <td><input type="text" name="txtTransfer" id="txtTransfer" size="5"  value="<?=$txtTransfer?>"></td>
              <td>��������´</td>
               <td><input name="optionTransfer"   value="<?=$optionTransfer?>" type="text" size="60" ></td>
              </tr>
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkCredit1" <?=($chkCredit1=="on"?"checked":"")?> onClick="showHideNum(this,'txtCredit1')"><?=$wording_lan["tab4"]["7_12"]?></td>
              <td><input type="text" name="txtCredit1" id="txtCredit1" size="5"  value="<?=$txtCredit1?>"></td>
              <td>��������´</td>
               <td><input name="optionCredit1"   value="<?=$optionCredit1?>" type="text" size="60" ></td>
              </tr>
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkCredit2" <?=($chkCredit2=="on"?"checked":"")?> onClick="showHideNum(this,'txtCredit2')">
<?=$wording_lan["tab4"]["7_13"]?></td>
              <td><input type="text" name="txtCredit2" id="txtCredit2" size="5"  value="<?=$txtCredit2?>"></td>
              <td>��������´</td>
               <td><input name="optionCredit2"   value="<?=$optionCredit2?>" type="text" size="60" ></td>
              </tr>
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkCredit3" <?=($chkCredit3=="on"?"checked":"")?> onClick="showHideNum(this,'txtCredit3')">
<?=$wording_lan["tab4"]["7_14"]?></td>
              <td><input type="text" name="txtCredit3" id="txtCredit3" size="5"  value="<?=$txtCredit3?>"></td>
              <td><?=$wording_lan["tab4"]["1_30"]?></td>
               <td><input name="optionCredit3"   value="<?=$optionCredit3?>" type="text" size="60" ></td>
              </tr>
              <tr  style="display:none" valign="top">
              <td>
                <input type="checkbox" name="chkCredit3" <?=($chkInternet=="on"?"checked":"")?> onClick="showHideNum(this,'txtInternet')">
<?=$wording_lan["tab4"]["7_15"]?></td>
              <td><input type="text" name="txtInternet" id="txtInternet" size="5"  value="<?=$txtInternet?>"></td>
              <td><?=$wording_lan["tab4"]["1_30"]?></td>
               <td><input name="optionInternet"   value="<?=$optionInternet?>" type="text" size="60" ></td>
              </tr>
              <tr valign="top">
              <td>
                <input type="checkbox" name="chkDiscount" <?=($chkDiscount=="on"?"checked":"")?> onClick="showHideNum(this,'txtDiscount')">
<?=$wording_lan["tab4"]["7_16"]?></td>
              <td><input type="text" name="txtDiscount" id="txtDiscount" size="5"  value="<?=$txtDiscount?>"></td>
              <td><?=$wording_lan["tab4"]["1_30"]?></td>
               <td><input name="optionDiscount"   value="<?=$optionDiscount?>" type="text" size="60" ></td>
              </tr>
                <tr valign="top">
                  <td><input type="checkbox" name="chkOther" <?=($chkOther=="on"?"checked":"")?> onClick="showHideNum(this,'txtOther')">
                    &#3629;&#3639;&#3656;&#3609;&#3654;</td>
                  <td><input type="text" name="txtOther" id="txtOther" size="5"  value="<?=$txtOther?>"></td>
                  <td>&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;</td>
                  <td>&nbsp;</td>
                </tr></table></td>
          </tr>
                <tr valign="top">
                  <td colspan="4" ><table <? if($GLOBALS["sending"] != '1')echo "style='display:none'";?>  width="100%"> <tr valign="top" bgcolor="#FFCC33">
                  <td colspan="4"><b><?=$wording_lan["tab4"]["1_15"]?>
                      <input type="checkbox" name="chkaddress" id="chkaddress" onClick="checkaddress(document.getElementById('mcode').value)" value="1"  tabindex="34" />
                  <?=$wording_lan["tab4"]["1_16"]?></b></td>
                </tr>
				<tr><td>
				<div id="idchksaddress">
				<table>
				<tr valign="top">
				  <td colspan="2" align="right"><?=$wording_lan["tab4"]["1_17"]?></td>
				  <td colspan="2">&nbsp;<input type="text" name='cname' id="cname"></td>
				  </tr>
				<tr valign="top">
				  <td colspan="2" align="right"><?=$wording_lan["tab4"]["1_18"]?>&nbsp;</td>
				  <td colspan="2">&nbsp;<input type="text" name='cmobile' id="cmobile"></td>
				  </tr>
				<tr valign="top">
                        <td colspan="2" align="right"><?=$wording_lan["tab4"]["1_19"]?></td>
                        <td colspan="2"><textarea name="caddress" id="caddress" cols="50" rows="3" tabindex="14"><?=$caddress?></textarea></td>
                      </tr>
                    <tr valign="top">
                  <td colspan="2" align="right">&nbsp;</td>
                  <td colspan="2"><? 
				  if($_SESSION["m_locationbase"] == '1'){
						if($cprovinceId==""){
							include("cthaiaddress.php");
				
						}else{
							include("cthaiaddressShow.php");
				
						}
					}else{?>
					<table cellpadding="0" cellspacing="0" border="0"><tr>
					<td><?=$wording_lan["tab4"]["1_19"]?></td><td><input type="text" name="cdistrict" id="cdistrict"></td></tr><tr>
					<td><?=$wording_lan["tab4"]["1_21"]?></td><td><input type="text" name="camphur" id="camphur"></td></tr><tr>
					<td><?=$wording_lan["tab4"]["1_20"]?></td><td><input type="text" name="cprovince" id="cprovince"></td>
					</tr></table>
					
					<?
					
					}
	?></td>
                </tr>
                
                <tr valign="top">
                  <td height="29" colspan="2" align="right"><?=$wording_lan["tab4"]["1_23"]?></td>
                  <td colspan="2"><input name="czip"   tabindex="18" type="text" id="czip" value="<?=$czip?>" /><input <?  if($_SESSION["m_locationbase"] != '1')echo 'style="display:none"';?> name="button4"  tabindex="48" type="button" onClick="check_zipcode1(document.getElementById('cprovince').value,document.getElementById('camphur').value,document.getElementById('cdistrict').value)" value="<?=$wording_lan["tab4"]["1_24"]?>" /></td>
                </tr>
				</table>
				</div>
				</td></tr>
                      </table></td>
                </tr>
               
        </table>
    <Br>
<?=$wording_lan["tab4"]["1_25"]?> : <br>
                <textarea name="txtoption" id="txtoption" cols="100" rows="5"><?=$txtoption?></textarea>
    </td>
    <td><iframe width="400" height="400" frameborder="0" src="./product_show_voucher.php" >
	</iframe>
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
  <input  type="hidden" id="ccheckr" name="ccheckr" value="">
  <input  type="hidden" id="ajaxshipping" name="ajaxshipping" value="0">
