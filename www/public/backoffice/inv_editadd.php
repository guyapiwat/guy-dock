<?
$_SESSION["perbuy"] = 1;
if(empty($_GET['id'])){
	//echo '�������ö�����������ҡ Backoffice';
	//exit;
}
?>
<script language="javascript" type="text/javascript" src="./js/newcheck.js"></script>
<script type="text/javascript">
function getpoint(){
		if (wi) wi.close();
		wi=window.open("getpoint.php","list_picker_window","menubar=no,width=500,height=100,toolbar=no,scrollbars=1");
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

	var showtotal1 = parseFloat(document.getElementById('sumtotal').value)+parseFloat(document.getElementById('ajaxshipping').value);
	
	if(divName != 'txtCash')showtotal1 = showtotal1-parseFloat(document.getElementById('txtCash').value);
	if(divName != 'txtFuture')showtotal1 = showtotal1-parseFloat(document.getElementById('txtFuture').value);
	if(divName != 'txtTransfer')showtotal1 = showtotal1-parseFloat(document.getElementById('txtTransfer').value);
	if(divName != 'txtInternet')showtotal1 = showtotal1-parseFloat(document.getElementById('txtInternet').value);
	if(divName != 'txtDiscount')showtotal1 = showtotal1-parseFloat(document.getElementById('txtDiscount').value);
	if(divName != 'txtOther')showtotal1 = showtotal1-parseFloat(document.getElementById('txtOther').value);
	if(divName != 'txtCredit1')showtotal1 = showtotal1-parseFloat(document.getElementById('txtCredit1').value);
	if(divName != 'txtCredit2')showtotal1 = showtotal1-parseFloat(document.getElementById('txtCredit2').value);
	if(divName != 'txtCredit3')showtotal1 = showtotal1-parseFloat(document.getElementById('txtCredit3').value);

if(boxName.checked == true) { 
	document.getElementById(divName).value= showtotal1;
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
					//document.getElementById("mname").innerHTML="������������§ҹ";
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
					document.getElementById("mname").innerHTML="������������§ҹ";
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
							alert("�س���ѡ���ʹ�ú�س���ѵ������");
							document.getElementById('ok').disabled = true;
							exit;
						};
					}else{
						if(strUser == 'C'){
							//alert(total);alert(data);
							if(total <  parseFloat(data) || total >  parseFloat(data)+500 ){
								alert("�س��ͧ�ѡ���ʹ�ѹ����繨ӹǹ "+data+"PV ��� �ѡ���ʹ�ѹ��������Թ "+(parseFloat(data)+500)+" PV");
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
							alert("�س���ѡ���ʹ�ú�س���ѵ���ǧ˹�������");
							document.getElementById('ok').disabled = true;
							exit;
						};
					}else{
						if(strUser == 'Q'){
							//alert(total);alert(data);
							if(total >  parseFloat(data)+100 ){
							//if(total <  parseFloat(data) || total >  parseFloat(data)+100 ){
								alert(" �ѡ���ʹ������Թ "+(parseFloat(data)+500)+" PV");
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
					document.getElementById('inv_ref').value="";
					document.getElementById("inv_desc").innerHTML="�����������к�";
					}else{
					document.getElementById('inv_ref').value=value;
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
				document.getElementById('ajaxshipping').value = data;
				tott = parseFloat(document.getElementById('txtCash').value)+
				parseFloat(document.getElementById('txtFuture').value)+
				parseFloat(document.getElementById('txtTransfer').value)+
				parseFloat(document.getElementById('txtCredit1').value)+
				parseFloat(document.getElementById('txtCredit2').value)+
				parseFloat(document.getElementById('txtCredit3').value)+
				parseFloat(document.getElementById('txtInternet').value)+
				parseFloat(document.getElementById('txtDiscount').value)+
				parseFloat(data)+
				parseFloat(document.getElementById('txtOther').value);
					
			//alert(tott);
			if(parseFloat(document.getElementById('sumtotal').value)+parseFloat(document.getElementById('ajaxshipping').value)+parseFloat(document.getElementById('ajaxshipping').value) != tott){
				alert('�ʹ�Թ '+tott+' �ҷ ��س����͡�Ըժ����Թ���ú����ӹǹ');
				document.getElementById('ok').disabled=true;
				exit;
			}
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
	document.getElementById('showsend1').innerHTML= "";
//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sadate').value;
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "�ѹ���";
	
	val = val + ","+document.getElementById('inv_code').value;
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�����Ң��Ѻ";
	
	/*if(document.getElementById('inv_ref').value != ''){
		if(document.getElementById("inv_desc").innerHTML == ''){
			alert('��سҡ����Ң�');
			 frm.ok.disabled = true;
			exit;
		}
	}*/
	var e = document.getElementById("satype");
	var strUser = e.options[e.selectedIndex].value;
//	checkStatus(document.getElementById('mcode').value,strUser,parseFloat(document.getElementById('sumpv').value));
//	checkStatusNew(document.getElementById('mcode').value,strUser,parseFloat(document.getElementById('sumpv').value));
	var tott = 0;
	tott = parseFloat(document.getElementById('txtCash').value)+
			parseFloat(document.getElementById('txtFuture').value)+
			parseFloat(document.getElementById('txtTransfer').value)+
		parseFloat(document.getElementById('txtCredit1').value)+
		parseFloat(document.getElementById('txtCredit2').value)+
		parseFloat(document.getElementById('txtCredit3').value)+
		parseFloat(document.getElementById('txtInternet').value)+
		parseFloat(document.getElementById('txtDiscount').value)+
		parseFloat(document.getElementById('txtOther').value);
			
	//alert(tott);
	//alert(document.getElementById('cstockist').value);
	/*if(parseFloat(document.getElementById('sumtotal').value)+parseFloat(document.getElementById('ajaxshipping').value) != tott){
		alert('�ʹ�Թ '+tott+' �ҷ ��س����͡�Ըժ����Թ���ú����ӹǹ');
		exit;
	}else{
		//alert(document.getElementById('cewallet').value);

		if(document.getElementById('cstockist').value == '2'){
		//alert(document.getElementById('cvoucher').value);
			if(parseFloat(document.getElementById('cvoucher').value) < parseFloat(document.getElementById('txtFuture').value) ){
				frm.ok.disabled = true;
				alert('Voucher �ͧ�س�����§��');
				exit;
			}
			if(parseFloat(document.getElementById('cewallet').value) < parseFloat(document.getElementById('txtInternet').value) ){
				frm.ok.disabled = true;
				alert('Ewallet �ͧ�س�����§��');
				exit;
			}
				
			if(document.getElementById('ccheckr').value == '1'){
				if(document.getElementById('sumpv').value < 4500){
					frm.ok.disabled = true;
					alert('�óը��觵�ͧ���ʹ�ҡ���� 4,500 PV');
					exit;

				}

			}
		}
		/*if(document.getElementById('cprovince').value != ''){
			document.getElementById('ok').disabled = true;document.getElementById('frm').target = '_blank';document.getElementById('frm').action='b.php'; 
			document.getElementById('frm').submit();
			setTimeout("checkUserName()",500);
			setTimeout("checkUserName1()",0);
				
		}
	}
*/
		val = val + ","+document.getElementById('ccheckr').value;
		field = field +",ccheckr";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",��س����͡�ٻẺ��èѴ��";
	//	val = val + ","+document.getElementById('satype').value;
	//	field = field +",satype";
	//	flag = flag+",1-0-0-0-0";
	//	errDesc = errDesc + ",�ٻẺ��ë���";

/*	if(document.getElementById('ccheckr').value == '1'){
		val = val + ","+document.getElementById('caddress').value;
		field = field +",caddress";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",��س����������";

		val = val + ","+document.getElementById('cprovince').value;
		field = field +",cprovince";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",��س����͡�ѧ��Ѵ";
		val = val + ","+document.getElementById('camphur').value;
		field = field +",camphur";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",��س����͡�����";
		val = val + ","+document.getElementById('cdistrict').value;
		field = field +",cdistrict";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",��س����͡�Ӻ��";

		val = val + ","+document.getElementById('czip').value;
		field = field +",czip";
		flag = flag+",1-0-0-0-0";
		errDesc = errDesc + ",��س�������ɳ���";
	}
*/
/*	
	val = val + ","+document.getElementById('inv_ref').value;
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�����Ң�";
*/		
//loop check
document.getElementById('frm').target = '_self';
document.getElementById('frm').action='invoperate.php?state=0';
//alert(document.getElementById('frm').target);
//alert(document.getElementById('frm').action);

	document.getElementById('checkstate').innerHTML= "<img align='center' src='./images/loading.gif' />";
	startRQ(field,val,"",flag,errDesc,"isaleh","checkstate");
}
function ebillcheck(){

//check(nullCheck, sizeCheck, formatCheck, dupCheck, realCheck, idName, errmsg)
	var val = document.getElementById('sadate').value;
	var skipval = "";
	var field = "sadate";
	var flag = "1-0-0-0-0";
	var errDesc = "�ѹ���";
	
	val = val + ","+document.getElementById('mcode').value;
	skipval = skipval+",";
	field = field +",mcode";
	flag = flag+",1-7-0-0-0";
	errDesc = errDesc + ",������Ҫԡ";

	if(document.getElementById('inv_ref').value != ''){
		if(document.getElementById("inv_desc").innerHTML == ''){
			alert('��سҡ����Ң�');
			 frm.ok.disabled = true;
			exit;
		}
	}
/*	
	val = val + ","+document.getElementById('inv_ref').value;
	skipval = skipval+",";
	field = field +",inv_code";
	flag = flag+",1-0-0-0-0";
	errDesc = errDesc + ",�����Ң�";
*/
document.getElementById('frm').target = '_blank';
document.getElementById('frm').action='invoperate.php?state=1';
//alert(document.getElementById('frm').target);
//alert(document.getElementById('frm').action);
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
		wi=window.open("inv_listpicker.php","list_picker_window","menubar=no,width=500,height=600,toolbar=no,scrollbars=1");
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
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;��ԡ��Ǩ�ͺ���ͷӡ�õ�Ǩ�ͺ������&nbsp; </font>";
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
		window.parent.document.getElementById('checkstate').innerHTML = "<font color='#FFFFFF' style='background:#990000'> &nbsp;��ԡ��Ǩ�ͺ���ͷӡ�õ�Ǩ�ͺ������&nbsp; </font>";
		//alert(tag.length);
		place = "<table border='0' width='500' cellpading='0' cellspacing='0'>";
		place += "<tr align='center' bgcolor='#999999'>";
		place += "<td bgcolor='#99CCCC' style='"+style_l+style_t+style_b+"'>&nbsp;</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>�ӴѺ</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>����</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>��������´</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>�Ҥ�</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>PV</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>�ӹǹ</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>����Ҥ�</td>";
		place += "<td style='"+style_l+style_t+style_b+"'>���PV</td>";
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
		place += "<td style='"+style_l+style_t+style_b+"' align='right' colspan='7'>���</td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' id='sumtotal' name='sumtotal' id='sumtotal' value='" + sumtotal + "'></td>";
		place += "<td style='"+style_l+style_t+style_b+"' align='right'><input size='8' readonly style='text-align:right;' type='text' id='sumpv' name='sumpv' id='sumpv' value='" + sumpv + "'></td>";
		place += "</tr>";
		//place += "<tr><td colspan='9' align='right'><input type='submit' value='�ѹ�֡'></td></tr>";
		place += "<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='��Ǩ�ͺ' />&nbsp;<input type='submit' value='�ѹ�֡' name='ok' id='ok' disabled='disabled' />&nbsp;<input name='reset' type='reset'  onclick=\"window.location='index.php?sessiontab=3&sub=6'\" value='¡��ԡ' /></td></tr>";
		place += "</table>";
		//alert(place);
		window.parent.document.getElementById('sale').innerHTML = place;
		tag = window.parent.document.frm.getElementsByTagName('input');
		if(tag.length-skip<8){
			window.parent.document.getElementById('sale').innerHTML = "<table width='500' bgcolor='#009900'><tr><td align='center'><font color='#FFFFFF'>���͡�������͹��Ҩҡ���ҧ������ ������䢨ӹǹ�����ͧ���</font></td></tr></table>";
		}
	}
</script> 
</head>

<body>
<?
if($_GET["cmc"])$mcode = $_GET["cmc"];

if(isset($_GET['id'])){

		$sql = "SELECT * FROM ".$dbprefix."isaleh WHERE id='".$_GET['id']."'  LIMIT 1";
		$rs = mysql_query($sql);
		if(mysql_num_rows($rs)<=0){
			$redirect = "[<a href=\"javascript:window.location='index.php?sessiontab=1';\">�˹����Ҫԡ</a>]";
			dialogbox("50%","#990000","��辺�����ŵ�����͹�",$redirect);
			exit;
		}else{
			$sadate = mysql_result($rs,0,'sadate');
			$cancel = mysql_result($rs,0,'cancel');
			$sqlC = "select calc from ".$dbprefix."around where fdate >= '$sadate' and tdate <= '$sadate' and calc = 1";
			$sqlSC = mysql_query($sqlC);
			if(mysql_num_rows($sqlSC) > 0 or $cancel == '1'){
						echo "<script language='JavaScript'>alert('�������ö��䢺�Ź����');window.location='index.php?sessiontab=3&sub=6'</script>";	
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
<form method="post" action="invoperate.php?state=<?=$_GET['id']==""?0:1?>" id="frm" name="frm"  onsubmit="return checkForm(this)" onKeyDown="document.getElementById('ok').disabled=true;" >
  <table border="0">
  <tr valign="top">
    <td>				
    <table width="600" border="0">
      <tr valign="top">
        <td><table border="1" width="100%" align="center">
            <tr>
              <td width="16%" align="right">�ٻẺ��ë���</td>
            <td width="38%"><select name="satype" id="satype">
���͡�ٻẺ��ë���                  </option>                <option  value="I" <?=($satype=="T"?"selected":"")?>>

                  �͹�Թ���
                  </option>
              </select>
              <input type="hidden" value="<?=$_GET['id']?>" name="id"/></td>
            <td width="6%" align="right">�ѹ���</td>
            <td width="40%"><input type="text" id="sadate" name="sadate" value="<?=$sadate==""?date("Y-m-d"):$sadate?>">
              <a href="javascript:NewCal('sadate','yyyymmdd',false,24)"><img src="./datetimepick/images/cal.gif" width="16" height="16" border="0" alt="���͡�ѹ���"></a>            </td>
            </tr>
            <tr valign="top">
              <td width="16%" align="right">&#3626;&#3634;&#3586;&#3634;&#3607;&#3637;&#3656;&#3619;&#3633;&#3610;</td>
              <td><input style="background-color:#FFFF99" size="15" type="text" id="inv_code"  readonly="" name="inv_code" value="<?=$inv_code?>">
               <input name="button2" type="button" style="display:none"  onClick="sendget_sponsor(document.getElementById('mcode').value)" value="��Ǩ�ͺ" />
               <input type="button" onClick="get_mem_listpicker_invcode()" value="���͡">
<div id="inv_desc"></div> </td>
              <td align="right" valign="bottom" nowrap="nowrap">&nbsp;�Ѻ����Ң�</td>
              <td nowrap="nowrap">
			    <input type="radio" name="radsend" id="radsend" value="1"  onClick="document.getElementById('inv_ref').disabled = true;document.getElementById('ccheckr').value = '1';document.getElementById('inv_ref').value = '';" <?=($radsend=="1"?"checked":"")?>>
			    &#3592;&#3633;&#3604;&#3626;&#3656;&#3591;
                <input type="radio" name="radsend" id="radsend" value="2"   onClick="document.getElementById('inv_ref').disabled = false;document.getElementById('ccheckr').value = '2';"  <?=($radsend=="2"?"checked":"")?> >
&#3652;&#3617;&#3656;&#3592;&#3633;&#3604;&#3626;&#3656;&#3591; <br>
<br>
<select name="inv_ref" id="inv_ref"  disabled="disabled">
			  <option value="">�ӹѡ�ҹ�˭�</option>
        <?					
						/*$result1=mysql_query("select * from ".$dbprefix."invent order by inv_code");

						for ($i=1;$i<=mysql_num_rows($result1);$i++){
							$row1 = mysql_fetch_object($result1);
							//echo "<option value=\"\" ";
							echo "<option value=\"".$row1->inv_code."\" ";
							if ($inv_code==$row1->inv_code) {echo "selected";}
							echo ">".$row1->inv_desc."</option>";
						}*/
						?>
    </select>
			  <input style="background-color:#FFFF99;display:none" size="15" readonly="" type="text" id="inv_code1" name="inv_code1" value="<?=$inv_code?>"><div id="showsend" ></div>
              <!--  <input style="display:none" name="button3" type="button"  onclick="sendget_invent(document.getElementById('inv_ref').value)" value="��" />
                <input style="display:none" type="button" onClick="get_mem_listpicker_invcode()" value="���͡"  >--></td>
            </tr>            
            
            <tr>
              <td colspan="4" align="left">          </td>
              </tr>
            </table>    	</td>
      </tr>
      <tr>
        <td id="sale" align="center">

        <? 
		if(!empty($_GET['id'])){
			$sql = "SELECT * FROM ".$dbprefix."isaled WHERE sano='".$_GET['id']."' ";
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
                        <td style="<?=$style_l.$style_t.$style_b?>">�ӴѺ</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">����</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">��������´</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">�Ҥ�</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">PV</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">�ӹǹ</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">����Ҥ�</td>
                        <td style="<?=$style_l.$style_t.$style_b?>">���PV</td>
                    </tr>
  				<?
				$sumtotal = 0;
				$sumpv = 0;
				for($i=0;$i<mysql_num_rows($rs);$i++){
					$proobj = mysql_fetch_object($rs);
					?>
					<tr>
                        <td style="<?=$style_l.$style_bd?>"><input  type="button" value="ź" onClick="saledel('<?=$proobj->pcode?>','<?=$proobj->pdesc ?>','<?=$proobj->price?>','<?=$proobj->pv?>')"></td>
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
					<td style="<?=style_l.style_t.style_b?>" align='right' colspan='7'>���</td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" name='sumtotal' id='sumtotal' value="<?=$sumtotal?>"></td>
					<td style="<?=style_l.style_t.style_b?>" align='right'><input size='8' readonly type='text' style="text-align:right;" id='sumpv' name='sumpv' value="<?=$sumpv?>"></td>
					</tr>
					<tr><td colspan='9' align='right'><input name='button' type='button' onclick='<?=(isset($_GET['id'])?"ebillcheck()":"ibillcheck()")?>' value='��Ǩ�ͺ' />&nbsp;<input type='submit' value='�ѹ�֡' name='ok'  id='ok' disabled='disabled'  />&nbsp;<input name='reset' type='reset'  onclick="window.location='index.php?sessiontab=3&sub=6'" value='¡��ԡ' /></td></tr>
                </table>
				<?
			}else
				dialogbox("100%","#990000","��辺��¡���Թ��Ңͧ����Ţ��� ".$_GET['id'],"");
        }else{
			dialogbox("100%","#009900","���͡�����Ũҡ��¡���Թ��� �����䢨ӹǹ�����ͧ���","");
		}
		?>    	</td>
      </tr>
	  <tr><td><div id="checkstate" align="center"></div> <br>
	  <div id="showsend1" align="center"></div> 
	  </td></tr>
    </table>  
    <table border="1" width="100%" style="display:none">
              
              <tr valign="top">
                <td><input type="checkbox" name="chkCash" <?=($chkCash=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtCash');">  
                  �Թʴ                    </td>
                <td><input type="text" name="txtCash" id="txtCash" size="5"  value="<?=$txtCash?>"></td>
                <td>��������´ </td>
                <td><input name="optionCash" type="text" value="<?=$optionCash?>" size="60"  >                </td>
              </tr>
             
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkTransfer" <?=($chkTransfer=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtTransfer');">
                �Թ�͹</td>
              <td><input type="text" name="txtTransfer" id="txtTransfer" size="5"  value="<?=$txtTransfer?>"></td>
              <td>��������´</td>
               <td><input name="optionTransfer"   value="<?=$optionTransfer?>" type="text" size="60" ></td>
              </tr>
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkCredit1" <?=($chkCredit1=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtCredit1');"> �ѵ��ôԵ 1</td>
              <td><input type="text" name="txtCredit1" id="txtCredit1" size="5"  value="<?=$txtCredit1?>"></td>
              <td>��������´</td>
               <td><input name="optionCredit1"   value="<?=$optionCredit1?>" type="text" size="60" ></td>
              </tr>
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkCredit2" <?=($chkCredit2=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtCredit2');">
�ѵ��ôԵ 2</td>
              <td><input type="text" name="txtCredit2" id="txtCredit2" size="5"  value="<?=$txtCredit2?>"></td>
              <td>��������´</td>
               <td><input name="optionCredit2"   value="<?=$optionCredit2?>" type="text" size="60" ></td>
              </tr>
               <tr valign="top">
              <td>
                <input type="checkbox" name="chkCredit3" <?=($chkCredit3=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtCredit3');">
�ѵ��ôԵ 3</td>
              <td><input type="text" name="txtCredit3" id="txtCredit3" size="5"  value="<?=$txtCredit3?>"></td>
              <td>��������´</td>
               <td><input name="optionCredit3"   value="<?=$optionCredit3?>" type="text" size="60" ></td>
              </tr>
              <tr   valign="top">
              <td>
                <input type="checkbox" name="chkCredit3" <?=($chkInternet=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtInternet');">
                Ewallet</td>
              <td><input type="text" name="txtInternet" id="txtInternet" size="5"  value="<?=$txtInternet?>"></td>
              <td>��������´</td>
               <td><input name="optionInternet"   value="<?=$optionInternet?>" type="text" size="60" ></td>
              </tr>
			   <tr valign="top" >
              <td>
                <input type="checkbox" name="chkFuture" <?=($chkFuture=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtFuture');">
Voucher</td>
              <td><input type="text" name="txtFuture" id="txtFuture" size="5"  value="<?=$txtFuture?>"></td>
              <td>��������´</td>
               <td><input name="optionFuture"   value="<?=$optionFuture?>" type="text" size="60" ></td>
              </tr>
              <tr valign="top" style="display:none">
              <td>
                <input type="checkbox" name="chkDiscount" <?=($chkDiscount=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtDiscount');">
                Discount </td>
              <td><input type="text" name="txtDiscount" id="txtDiscount" size="5"  value="<?=$txtDiscount?>"></td>
              <td>��������´</td>
               <td><input name="optionDiscount"   value="<?=$optionDiscount?>" type="text" size="60" ></td>
              </tr>
                <tr valign="top"  style="display:none;">
                  <td><input type="checkbox" name="chkOther" <?=($chkOther=="on"?"checked":"")?> onClick="document.getElementById('ok').disabled=true;showHideNum(this,'txtOther');">
                    Loan</td>
                  <td><input type="text" name="txtOther" id="txtOther" size="5"  value="<?=$txtOther?>"></td>
                  <td>&#3619;&#3634;&#3618;&#3621;&#3632;&#3648;&#3629;&#3637;&#3618;&#3604;</td>
                  <td><input name="optionOther"   value="<?=$optionOther?>" type="text" size="60" ></td>
                </tr>
                <tr valign="top">
                  <td colspan="4" >&nbsp;</td>
                </tr>
        </table>
    <Br>
      �����˵� : <br>
      <textarea name="txtoption" cols="100" rows="5"><?=$txtoption?></textarea></td>
    <td>
     <td>
		<? include('product_tab.php'); ?>
	</td>
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
  <input  type="hidden" id="cewallet" name="cewallet" value="0">
  <input  type="hidden" id="cvoucher" name="ccheckr" value="0">
  <input  type="hidden" id="cstockist" name="ccheckr" value="0">
  <input  type="hidden" id="ajaxshipping" name="ajaxshipping" value="0">
